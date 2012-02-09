<?php 

class ProdutosController extends AppController {
    
    public $name = 'Produtos';
    public $uses = array('Produto');
    public $helpers = array('Number');
    
    public function index() {
        $data = $this->Produto->find('all');
        $this->set('produtos', $data);
    }
    
    public function add() {
        if($this->request->data) {
            if($this->Produto->save($this->request->data)) {
                $this->redirect(array('controller' => 'produtos', 'action' => 'index'));
            }
        }
    }
    
    public function edit($id = null) {
        if($this->request->data) {
            if($this->Produto->save($this->request->data)) {
                $this->redirect(array('controller' => 'produtos', 'action' => 'index'));
            }
        } else {
            if($id) {
                $this->request->data = $this->Produto->read(null, $id);
            } else {
                $this->redirect(array('controller' => 'produtos', 'action' => 'index'));
            }
        }
    }
    
    public function delete($id = null) {
        if ($this->Produto->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }        
    }
    
    public function view($id = null) {
        if($id) {
            $this->request->data = $this->Produto->read(null, $id);
        } else {
            $this->redirect(array('controller' => 'produtos', 'action' => 'index'));
        }
    }
    
}

?>
