<?php 

class Produto extends AppModel {
    
    public $name = 'Produto';
    public $useTable = 'produtos';
    public $order = array('Produto.id' => 'ASC');
    
    
}

?>
