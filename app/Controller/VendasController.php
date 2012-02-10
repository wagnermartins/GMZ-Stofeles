<?php

class VendasController extends AppController {
    
    public $name = 'Vendas';
    public $uses = array('Venda','Produto');
    public $helpers = array('Time','Number');
    
    public function index() {
        $data = $this->Venda->find('all');
        $this->set('vendas', $data);
    }
    
    public function add() {

        $data = $this->Produto->find('all');
        $this->set('produtos', $data);

        if($this->request->data) {
            if($this->Produto->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendas', 'action' => 'index'));
            }
        }
    }
    
}

?>
