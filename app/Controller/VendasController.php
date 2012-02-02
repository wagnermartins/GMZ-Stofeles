<?php

class VendasController extends AppController {
    
    public $name = 'Vendas';
    public $uses = array('Venda');
    public $helpers = array('Time');
    
    public function index() {
        $data = $this->Venda->find('all');
        $this->set('vendas', $data);
    }
    
    public function add() {
        if($this->request->data) {
            if($this->Produto->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendas', 'action' => 'index'));
            }
        }
    }
    
}

?>
