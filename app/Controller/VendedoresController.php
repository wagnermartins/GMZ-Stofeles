<?php 

class VendedoresController extends AppController {
    
    public $name = 'Vendedores';
    public $uses = array('Vendedor');
    
    function index() {
        $this->paginate = array('limit' => 10);
        $data = $this->paginate('Vendedor');
        $this->set('vendedores', $data);
    }
    
    function add() {
        if($this->request->data) {
            if($this->Vendedor->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        }
    }
    
    function edit($id = null) {
        if($this->request->data) {
            if($this->Vendedor->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        } else {
            if($id) {
                $this->request->data = $this->Vendedor->read(null, $id);
            } else {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        }
    }
    
}

?>
