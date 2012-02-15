<section id="content">

  <br /><br />
  <?php echo $this->Form->create('Vendedor', array('inputDefaults' => array('label' => false, 'error' => array('attributes' => array('wrap' => 'label', 'class' => 'error'))))); ?>
    <section>
      <label for="username">Usuário</label>

      <div>
          <?php echo $this->Form->input('username', array('class' => 'required', 'placeholder' => 'Usuário')); ?>
      </div>
    </section>

    <section>
      <label for="password">Senha</label>

      <div>
        <?php echo $this->Form->input('password', array('class' => 'required', 'id' => 'password', 'placeholder' => 'Senha')); ?>
        <br /><br />
        <?php echo $this->Form->input('Login', array('type' => 'submit', 'class' => 'button primary')); ?>
      </div>
    </section>
  <?php echo $this->Form->end(); ?>

</section>