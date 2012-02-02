<?php 

class Venda extends AppModel {
    
    public $name = 'Venda';
    public $useTable = 'vendas';
    public $belongsTo = array('Vendedor' => array('fields' => 'nome, sobrenome'));
    
    
    
}

?>
