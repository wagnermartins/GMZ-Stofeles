<section id="content">
    <h2>Editar vendedor</h2>
    
    <?php echo $this->Form->create('Vendedor', array('class' => 'wymupdate', 'inputDefaults' => array('label' => false))); ?>
    <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    <div class="column left">
        <section>
            <label>Nome</label>
            <?php echo $this->Form->input('nome', array('class' => 'required', 'placeholder' => 'Nome')); ?>
            <label>Sobrenome</label>
            <?php echo $this->Form->input('sobrenome', array('class' => 'required', 'placeholder' => 'Sobrenome')); ?>
        </section>
        
        <section>
            <label>
                Nome de usuário
                <small>O nome de usuário precisa ter no mínimo 3 caracteres.</small>
            </label>
            <div>
                <?php echo $this->Form->input('username', array('class' => 'required', 'minlength' => '3', 'placeholder' => 'Apenas letras')); ?>
            </div>
        </section>
        
        <section>
            <label>
                Senha
                <small>A senha precisa ter no mínimo 6 caracteres</small>
            </label>
            <div>
                <?php echo $this->Form->input('password', array('class' => 'required', 'minlength' => '6', 'placeholder' => 'Senha')); ?>
                <?php echo $this->Form->input('confirm_password', array('class' => 'required', 'type' => 'password', 'minlength' => '6', 'placeholder' => 'Digite sua senha novamente')); ?>
            </div>
        </section>
    </div>
    
    <div class="column right">
        <section>
            <label>E-mail</label>
            <?php echo $this->Form->input('email', array('placeholder' => 'Endereço de e-mail')); ?>
        </section>        
        
        <section>
            <label>Nascimento</label>
            <?php echo $this->Form->input('nascimento', array('monthNames' => 'false', 'separator' => ' ', 'style' => 'width:60px', 'dateFormat' => 'DMY', 'minYear' => 1940, 'maxYear' => date('Y'))); ?>            
        </section>
        
        <section>
            <label>Telefone</label>
            <?php echo $this->Form->input('telefone', array('placeholder' => '(00) 0000-0000')); ?>
            <label for="label">Celular</label>
            <?php echo $this->Form->input('celular', array('placeholder' => '(00) 0000-0000')); ?>
        </section>
      
        <section>
            <label>Endereço</label>
            <div>
                <?php echo $this->Form->input('endereco', array('value' => $rua, 'class' => 'large', 'placeholder' => 'Rua Lorem Ipsum', 'div' => false)); ?>
                <?php echo $this->Form->input('numero', array('value' => $numero, 'class' => 'small', 'placeholder' => '123', 'div' => false)); ?>
            </div>
            <label>Cidade</label>
            <?php echo $this->Form->input('cidade', array('placeholder' => 'Cidade')); ?>
            <label>Estado</label>
            <?php echo $this->Form->input('estado', array('type' => 'select', 'options' => $Estados, 'placeholder' => 'Cidade')); ?>
        </section>
        
        <section>
            <label>CPF</label>
            <?php echo $this->Form->input('cpf', array('placeholder' => '')); ?>
            <label for="label">RG</label>
            <?php echo $this->Form->input('rg', array('placeholder' => '')); ?>
        </section>
    </div>
    <div class="clear"></div>
    <?php echo $this->Form->submit('Editar', array('class' => 'button primary submit', 'div' => false)); ?>
    <?php echo $this->Form->reset('Limpar', array('class' => 'button remove danger', 'value' => 'Limpar dados', 'div' => false)); ?>
    <?php echo $this->Form->end(); ?>