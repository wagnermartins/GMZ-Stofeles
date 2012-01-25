<?php 

    echo $this->Form->create('Vendedor');
    echo $this->Form->input('nome', array('label' => false, 'placeholder' => 'Nome:'));
    echo $this->Form->input('sobrenome', array('label' => false, 'placeholder' => 'Sobrenome:'));
    echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Username:'));
    echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Senha:'));
    echo $this->Form->input('telefone', array('label' => false, 'placeholder' => 'Telefone:'));
    echo $this->Form->input('celular', array('label' => false, 'placeholder' => 'Celular:'));
    echo $this->Form->input('endereco', array('label' => false, 'placeholder' => 'Endereço:'));
    echo $this->Form->input('cidade', array('label' => false, 'placeholder' => 'Cidade:'));
    echo $this->Form->input('estado', array('label' => false, 'placeholder' => 'Estado:'));
    echo $this->Form->input('cpf', array('label' => false, 'placeholder' => 'CPF:'));
    echo $this->Form->input('rg', array('label' => false, 'placeholder' => 'RG:'));
    echo $this->Form->input('nascimento', array('label' => false, 'type' => 'date', 'dateFormat' => 'DMY', 'minYear' => 1980, 'maxYear' => date('Y')));
    echo $this->Form->submit('Cadastrar', array('label' => false));
    echo $this->Form->end();

?>
