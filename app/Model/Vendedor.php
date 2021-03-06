<?php 

class Vendedor extends AppModel {
    
    public $name = 'Vendedor';
    public $useTable = 'vendedores';
    //public $hasMany = array('Venda');
    //public $displayField = 'nome';
     
    public $validate = array(
        'username' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Este nome de usuário já está em uso!'
            ),
            'regex' => array(
                'rule' => '/^[a-zA-Z0-9_]+$/',
                'message' => 'Somente letras, números e underlines!'
            )
        )
    );
    
    public function beforeSave() {
        if(isset($this->data['Vendedor']['endereco']) && isset($this->data['Vendedor']['numero'])) {
            $this->data['Vendedor']['endereco'] = $this->data['Vendedor']['endereco'] . ',' . $this->data['Vendedor']['numero'];
        }
        if (isset($this->data['Vendedor']['password'])) {
            $this->data['Vendedor']['password'] = AuthComponent::password($this->data['Vendedor']['password']);
        }
        return true;
    }
    
}

?>
