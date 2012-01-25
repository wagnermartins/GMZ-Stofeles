<?php 

class VendedoresController extends AppController {
    
    public $name = 'Vendedores';
    public $uses = array('Vendedor');
    
    function add() {
        if($this->request->data) {
            if($this->Vendedor->save($this->request->data)) {
                $this->redirect('/');
            }
        }
    }
    
}

?>
