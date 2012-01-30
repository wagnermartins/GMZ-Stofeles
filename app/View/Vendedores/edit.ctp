<?php 

    echo $this->Form->create('Vendedor', array('inputDefaults' => array('label' => false)));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('nome', array('placeholder' => 'Nome:'));
    echo $this->Form->input('sobrenome', array('placeholder' => 'Sobrenome:'));
    echo $this->Form->input('username', array('placeholder' => 'Username:'));
    echo $this->Form->input('password', array('placeholder' => 'Senha:'));
    echo $this->Form->input('telefone', array('placeholder' => 'Telefone:'));
    echo $this->Form->input('celular', array('placeholder' => 'Celular:'));
    echo $this->Form->input('endereco', array('placeholder' => 'Endereço:'));
    echo $this->Form->input('cidade', array('placeholder' => 'Cidade:'));
    echo $this->Form->input('estado', array('placeholder' => 'Estado:'));
    echo $this->Form->input('cpf', array('placeholder' => 'CPF:'));
    echo $this->Form->input('rg', array('placeholder' => 'RG:'));
    echo $this->Form->input('nascimento', array('type' => 'date', 'dateFormat' => 'DMY', 'minYear' => 1980, 'maxYear' => date('Y')));
    echo $this->Form->submit('Cadastrar', array('label' => false));
    echo $this->Form->end();

?>
