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

                    foreach($data['cart'] as $c) {
                        $v = explode(",",$c);
                        $id = trim($v[0]);
                        $valor = str_replace("R$ ","",$v[1].".".$v[2]);
                        $quantidade = $v[3];
                        $nome = $v[4];

                        // Atualiza estoque
                        $data = $this->Produto->read(array("quantidade", "valor"), $id);
                        $qtd_estoque = ($data['Produto']['quantidade']-$quantidade);

                        $data = array('id' => $id, 'quantidade' => $qtd_estoque);
                        $this->Produto->save($data);
                        

                        // Inserir itens_vendas
                        $data = array('id' => '', 'produto_id' => $id ,'venda_id' => $this->Venda->getLastInsertID(), 'quantidade' => $quantidade);
                        $this->ItensVenda->save($data);
                    }
                     echo $html->url(array("controller" => "vendas", "action" => "index"), true);
                }
                return false;
           }
        }
    }
    
}

?>
