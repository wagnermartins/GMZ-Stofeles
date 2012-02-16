<?php echo $this->Html->script(array('jquery.maskmoney', 'jquery.formrestrict', 'jquery.alphanumeric')); ?>
<script>
$(document).ready(function() {
   $(".quantidade").numeric();
});
</script><section id="content">
    <h2>Editar produto</h2>
    
    <?php echo $this->Form->create('Produto', array('class' => 'wymupdate', 'inputDefaults' => array('label' => false))); ?>
    <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    <div class="column left">
        <section>
            <label>Nome</label>
            <?php echo $this->Form->input('nome', array('class' => 'required', 'placeholder' => 'Nome')); ?>
        </section>
               
        <section>
            <label>Valor</label>
            <div><?php echo $this->Form->input('valor', array('type' => 'text', 'class' => 'required valor', 'placeholder' => 'Valor')); ?></div>
        </section>

        <section>
            <label>Quantidade</label>
            <div><?php echo $this->Form->input('quantidade', array('type' => 'text', 'class' => 'required quantidade', 'placeholder' => 'Disponibilidade em estoque')); ?></div>
        </section>
    </div>
    
    <div class="column right">
        <section>
            <label>
                Descrição
                <small>Escreva informações sobre o produto.</small>
            </label>
            <div>
                <?php echo $this->Form->textarea('descricao'); ?>
            </div>
        </section>
    </div>
    <div class="clear"></div>
    <?php echo $this->Form->submit('Editar', array('class' => 'button primary submit', 'div' => false)); ?>
    <?php echo $this->Form->end(); ?>