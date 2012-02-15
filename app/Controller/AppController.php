<?php

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array('Form' => array('userModel' => 'Vendedor')),
            'loginRedirect' => array('controller' => 'vendas', 'action' => 'add'),
            'logoutRedirect' => array('controller' => 'vendedores', 'action' => 'login')
        )
    );
    
    public function isAuthorized($user) {

        if ($user['role'] == 'admin') {
            return true;
        }
        if (in_array($this->action, array('edit', 'delete', 'add'))) {
            if ($user['role'] != 'admin') {
                return false;
            }
        }
        return true;
    }

    public function beforeFilter() {
        $this->Auth->authorize = 'controller';
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        
        $this->Auth->allow("add");
        // Action da tela de login
        $this->Auth->loginAction = 'login';
    }
}

?>