<?php

class VendasController extends AppController {
    
    public $name = 'Vendas';
    public $uses = array('Venda','Produto','ItensVenda');
    public $helpers = array('Time','Number');
    public $components = array("RequestHandler");
    
    public function index() {
        $data = $this->Venda->find('all');
        $this->set('vendas', $data);
    }

     public function view($id = null) {
        $data = $this->ItensVenda->findAllByVendaId($id);
        $this->set('vendas', $data);

        /*foreach($data as $d) {
            //var_dump($d);
                $data_produto[] = $this->Produto->read('nome', $d['ItensVenda']['produto_id']);
        }*/

        //$this->set('produto', $data_produto);
    }

    public function delete($id = null) {
        $data = $this->ItensVenda->findAllByVendaId($id);

        foreach($data as $d) {
            $produto_id = $d['ItensVenda']['produto_id'];
            $quantidade = $d['ItensVenda']['quantidade'];

            
            // Atualiza estoque
            $data = $this->Produto->read(array("quantidade", "valor"), $produto_id);
            $qtd_estoque = ($data['Produto']['quantidade']+$quantidade);

            $data = array('id' => $produto_id, 'quantidade' => $qtd_estoque);
            $this->Produto->save($data);

            if ($this->Venda->delete($id)) {
                $this->redirect(array('controller' => 'vendas', 'action' => 'index'));
            }    
        }
    }
    
    public function add() {

        $view = new View($this);
        $html = $view->loadHelper('Html');
        $number = $view->loadHelper('Number');

        $data = $this->Produto->find('all');
        $this->set('produtos', $data);

        if($this->request->data) {
            $data = $this->request->data;
            $this->autoRender = false;
 
           if($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);

            $forma_pagamento = $data['forma_pagamento'];
            $desconto = $data['desconto'];
            $subtotal = $data['subtotal'];
            $total = $data['total'];
            $check_total = 0;

                foreach($data['cart'] as $k => $c) {
                    $v = explode(",",$c);
                    $valor = str_replace("R$ ","",$v[1].".".$v[2]);
                    $quantidade = $v[3];
                
                    $check_total = $check_total+($quantidade*$valor); 
                }

                $total_calc = $check_total-(($check_total/100)*$desconto); 

                if($total_calc == $total) {

                    $user = $this->Auth->user();
                    $data_venda = array('id' => '', 'vendedor_id' => $user['id'], 'forma_pagamento' => $forma_pagamento, 'valor_subtotal' => $subtotal, 'valor_total' => $total, 'desconto' => $desconto);

                    $this->Venda->save($data_venda);
                    
                    $itens_nf = ""; // Armazena produtos a serem impressos na nota fiscal
                    
                    foreach($data['cart'] as $c) {
                        $v = explode(",",$c);
                        $id = trim($v[0]);
                        $valor_virgula = str_replace("R$ ","",$v[1].",".$v[2]);
                        $valor = str_replace("R$ ","",$v[1].".".$v[2]);
                        $quantidade = $v[3];
                        $nome = $v[4];

                        // Atualiza estoque
                        $data = $this->Produto->read(array("quantidade", "valor", "nome"), $id);
                        $nome = $data['Produto']['nome'];
                        
                        $qtd_estoque = ($data['Produto']['quantidade']-$quantidade);
                        
                        if($qtd_estoque > 0) {

                        $data = array('id' => $id, 'quantidade' => $qtd_estoque);
                        $this->Produto->save($data);
                        
                        $nome = strtoupper($nome);
                        $itens_nf .= "$id<tb></tb>$quantidade<tb></tb>".mb_convert_encoding($nome, 'ISO-8859-1')."<tb></tb><tb></tb> $valor_virgula<l></l>";
                        $venda_id = $this->Venda->getLastInsertID();
                        // Inserir itens_vendas
                        $data = array('id' => '', 'produto_id' => $id ,'venda_id' => $this->Venda->getLastInsertID(), 'quantidade' => $quantidade);
                        $this->ItensVenda->save($data);
                        
                        } else {
                        $nome = strtoupper($nome);
                        $itens_nf .= "TIRAGEM SUPERIOR AO ESTOQUE VENDA COMPROMETIDA - REALIZAR VENDA NOVAMENTE ABATENDO QTD.($quantidade) DO PRODUTO #$id<l></l>";
                        $venda_id = $this->Venda->getLastInsertID();
                        }
                    }
                    
                    // Impressão da nota fiscal
                    
                    //regTermica_DUAL_DarumaFramework('1');
                   // regPortaComunicacao_DUAL_DarumaFramework('COM3');
                    //regVelocidade_DUAL_DarumaFramework('115200');
                    //regLinhasGuilhotina_DUAL_DarumaFramework('1');
                    //iConfigurarGuilhotina_DUAL_DarumaFramework('1', '10');
                    //iEnviarBMP_DUAL_DarumaFramework
                    
                       
                    $nota_fiscal = "<bmp></bmp><ce><fe><b>ZAMS Moda Rio</b></fe></ce>
<dt></dt> <hr></hr><l></l>
<tb></tb><tb></tb><fe><da>REGISTRO DE VENDA #".$venda_id."</da></fe><l></l>
ITEM COD.<tb></tb>QTD.<tb></tb>DESCRIÇÃO<tb></tb>VL(R$)<l></l>
".$itens_nf."
<sn></sn>
<fe><da>TOTAL<tb></tb>R$</da></fe><tb></tb><tb></tb><tb></tb> ".$number->format($total, array('decimals' => ',', 'thousands' => '.'))."
<fe>SUBTOTAL</fe><tb></tb><tb></tb><tb></tb> ".$number->format($subtotal, array('decimals' => ',', 'thousands' => '.'))."
<fe>DESCONTO</fe><tb></tb><tb></tb><tb></tb> ".$desconto."%
<fe>".mb_convert_encoding(strtoupper($forma_pagamento), 'ISO-8859-1')."</fe>
<sl>1</sl>
<tc>.</tc>
<sl>1</sl>
<sn></sn>
<bmp></bmp><ce><fe><b>ZAMS Moda Rio</b></fe></ce>
Rod. Washington Luiz 6, 720 loja: 65<l></l>J. Gramacho - Saída 120(ao lado da Volvo)<l></l><c>(21)3661-0169 / (21)3552-9588 (loja) </c>
<sn></sn>
<tc>-</tc>
<dt></dt> <hr></hr> <b>#".$venda_id."</b><l></l>
<tb></tb><tb></tb><fe><da>SEM VALOR FISCAL</da></fe><l></l>
ITEM COD.<tb></tb>QTD.<tb></tb>DESCRIÇÃO<tb></tb>VL(R$)<l></l>
".$itens_nf."
<sn></sn>
<fe><da>TOTAL<tb></tb>R$</da></fe><tb></tb><tb></tb><tb></tb> ".$number->format($total, array('decimals' => ',', 'thousands' => '.'))."
<fe>SUBTOTAL</fe><tb></tb><tb></tb><tb></tb> ".$number->format($subtotal, array('decimals' => ',', 'thousands' => '.'))."
<fe>DESCONTO</fe><tb></tb><tb></tb><tb></tb> ".$desconto."%
<fe>".mb_convert_encoding(strtoupper($forma_pagamento), 'ISO-8859-1')."</fe>
<l></l>
<ce>OBRIGADO PELA PREFERÊNCIA!</ce>
<sl>2</sl>
";
                    
                    iImprimirTexto_DUAL_DarumaFramework($nota_fiscal, '0');
                    
                    echo $html->url(array("controller" => "vendas", "action" => "index"), true);
                     
                }
                return false;
           }
        }
    }
    
}

?>
