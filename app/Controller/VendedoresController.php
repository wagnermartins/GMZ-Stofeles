<?php 

class VendedoresController extends AppController {
    
    public $name = 'Vendedores';
    public $uses = array('Vendedor');
    
    public function login() {
        $this->layout = 'login';

        if($this->Auth->loggedIn()) {
            $this->redirect(array('controller' => 'vendas', 'action' => 'add'));    
        } else {            
            if ($this->request->data) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());   
                } else {
                    $this->Session->setFlash('Seu username ou password estão incorretos');
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
      
    public function index() {
        $data = $this->Vendedor->find('all');
        $this->set('vendedores', $data);
    }
    
    public function add() {
        $this->set('Estados', $this->Vendedor->estadosBrasil);
        if($this->request->data) {
            if($this->Vendedor->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        }
    }
    
    public function edit($id = null) {
        $this->set('Estados', $this->Vendedor->estadosBrasil);
        if($this->request->data) {
            if($this->Vendedor->save($this->request->data)) {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        } else {
            if($id) {
                $this->request->data = $this->Vendedor->read(null, $id);
                $this->preencheEndereco();
            } else {
                $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
            }
        }
    }
    
    public function delete($id = null) {
        if ($this->Vendedor->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }        
    }
    
    public function view($id = null) {
        $this->set('Estados', $this->Vendedor->estadosBrasil);
        if($id) {
            $this->request->data = $this->Vendedor->read(null, $id);
            $this->preencheEndereco();
        } else {
            $this->redirect(array('controller' => 'vendedores', 'action' => 'index'));
        }
    }
         
    private function preencheEndereco() {
        if(!empty($this->request->data['Vendedor']['endereco'])) {
            $endereco = explode(',', $this->request->data['Vendedor']['endereco']);
            $this->set(array('rua' => $endereco[0], 'numero' => $endereco[1]));
        } else {
            $this->set(array('rua' => '', 'numero' => ''));
        }        
    }
    
}

?>
