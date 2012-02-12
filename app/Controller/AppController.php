<?php

class AppController extends Controller {
  
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'vendedores', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'vendedores', 'action'=>'login'),
            'authError'=>"You can't access that page",
            'authorize'=>array('Controller'),
            'userModel'=>'Vendedor',
            'loginAction'=>array('controller' => 'vendedores','action' => 'login')
        )
    );
       
    public function isAuthorized($user) {
        return true;
    }
    
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }        
    
}

?>
