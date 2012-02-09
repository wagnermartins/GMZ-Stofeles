<?php 

class Produto extends AppModel {
    
    public $name = 'Produto';
    public $useTable = 'produtos';
    
    public function beforeSave() {
        $this->data['Produto']['valor'] = str_replace(',', '.', $this->data['Produto']['valor']);
        $this->data['Produto']['valor'] = str_replace('R$', '', $this->data['Produto']['valor']);
        return true;
    }
    
}

?>
