<?php

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array('Form' => array('userModel' => 'Vendedor')),
            'loginRedirect' => array('controller' => 'vendedores', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'vendedores', 'action' => 'display', 'home')
        )
    );
       
    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'add');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        
        // Action da tela de login
        $this->Auth->loginAction = array(
            'controller' => 'vendedores',
            'action' => 'login'
        );
    }
}

?>