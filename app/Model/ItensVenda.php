<?php 

class ItensVenda extends AppModel {
    
    public $name = 'ItensVenda';
    public $useTable = 'itens_vendas';
    
    public function beforeSave() {
        return true;
    }
    
}

?>
