<?php 

    echo $this->Form->create('Produto', array('inputDefaults' => array('label' => false)));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('nome', array('placeholder' => 'Nome:'));
    echo $this->Form->input('descricao', array('placeholder' => 'Descrição:'));
    echo $this->Form->input('valor', array('placeholder' => 'Valor:'));
    echo $this->Form->end('Cadastrar produto');

?>
