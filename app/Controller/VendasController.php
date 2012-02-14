<?php

class VendasController extends AppController {
    
    public $name = 'Vendas';
    public $uses = array('Venda','Produto');
    public $helpers = array('Time','Number');
    public $components = array("RequestHandler");
    
    public function index() {
        $data = $this->Venda->find('all');
        $this->set('vendas', $data);
    }
    
    public function add() {

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
            $total = $data['forma_pagamento'];
            $check_total = 0;

               foreach($data['cart'] as $c) {
                    $v = explode(",",$c);
                    $id = trim($v[0]);
                    $valor = $v[1].$v[2];
                    $quantidade = $v[3];
                    $nome = $v[4];

                    var_dump($quantidade);
                    $this->Produto->create();


                    // Atualiza estoque
                    $data = $this->Produto->read('quantidade', $id);
                    $qtd_estoque = ($data['Produto']['quantidade']-$quantidade);
                    // $this->Produto->set(array('quantidade' => $qtd_estoque));
                    //$this->Produto->save();

                    // DESCOBRIR PQ ZERA O VALOR QNDO DA O SAVE!

                    $data = array('id' => $id, 'quantidade' => $qtd_estoque, 'valor' => 500);
                    $this->Produto->save($data);

                    //$check_total = $check_total+(($quantidade*$valor)/100)*$desconto;
                    //var_dump($desconto);
               }
           }
        }
    }
    
}

?>
