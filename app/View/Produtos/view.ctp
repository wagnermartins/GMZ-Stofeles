<section id="content">
    <h2>Editar produto</h2>
    
    <?php echo $this->Form->create('Produto', array('class' => 'wymupdate', 'inputDefaults' => array('label' => false, 'disabled' => 'disabled'))); ?>
    <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    <div class="column left">
        <section>
            <label>Nome</label>
            <?php echo $this->Form->input('nome', array('class' => 'required', 'placeholder' => 'Nome')); ?>
        </section>
               
        <section>
            <label>Valor</label>
            <div><span style="position:relative; top:20px; right:20px;">R$</span><?php echo $this->Form->input('valor', array('type' => 'text', 'class' => 'required valor', 'placeholder' => 'Valor')); ?></div>
        </section>

        <section>
            <label>Quantidade</label>
            <div><?php echo $this->Form->input('quantidade', array('type' => 'text', 'class' => 'required', 'placeholder' => 'Valor')); ?></div>
        </section>
    </div>
    
    <div class="column right">
        <section>
            <label>
                Descrição
                <small>Escreva informações sobre o produto.</small>
            </label>
            <div>
                <?php echo $this->Form->textarea('descricao', array('disabled' => 'disabled')); ?>
            </div>
        </section>
    </div>
    <div class="clear"></div>
    <?php echo $this->Form->end(); ?>