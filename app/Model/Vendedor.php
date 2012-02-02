<?php 

class Vendedor extends AppModel {
    
    public $name = 'Vendedor';
    public $useTable = 'vendedores';
    //public $hasMany = array('Venda');
    //public $displayField = 'nome';
   
    public $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório!'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Este nome de usuário já está em uso!'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 32),
                'message' => 'Usuário deve conter entre 4 e 32 caracteres!'
            ),
            'minLength' => array(
                'rule' => array('minLength', 4),
                'message' => 'Usuário deve conter entre 4 e 32 caracteres!'
            ),
            'regex' => array(
                'rule' => '/^[a-zA-Z0-9_]+$/',
                'message' => 'Usuário deve conter somente letras, números e underlines!'
            )
        ),

        'senha' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório!'
            ),
            'minLength' => array(
                'rule' => array('minLength', 4),
                'message' => 'Senha deve conter no mínimo 4 caracteres!'
            )
        ),

        'nome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório!'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3),
                'message' => 'Nome deve conter no mínimo 3 caracteres!'
            )
        ),

        'sobrenome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório!'
            )
        ),

        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Campo obrigatório!'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Este e-mail já está cadastrado!'
            ),
            'email' => array(
                'rule' => array('email', true),
                'message' => 'E-mail inválido!'
            )
        )
    );
    
}

?>
