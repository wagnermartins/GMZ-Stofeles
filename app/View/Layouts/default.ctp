<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title><?php echo $title_for_layout; ?></title>

    <?php echo $this->Html->css('css.css'); ?>
    <!--[if lt IE 9]>
        <?php echo $this->Html->css('ie.css'); ?>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <?php echo $this->Html->script(array(
            'excanvas.js', 
            'jquery.js',
            'jquery.livesearch.js',
            'jquery.visualize.js',
            'jquery.datatables.js',
            'jquery.placeholder.js',
            'jquery.selectskin.js',
            'jquery.checkboxes.js',
            'jquery.wymeditor.js',
            'jquery.validate.js',
            'jquery.inputtags.js',
            'application.js',
        )); 
    ?>
  </head>

  <body>
    <div id="gradient">
      <div id="stars">
        <div id="container">
        
          <header>
          
            <!-- Logo -->
            <h1 id="logo">GMZ Stofeles</h1>
   
          </header>
        
          <!-- The application "window" -->
          <div id="application">
          
            <!-- Primary navigation -->
            <nav id="primary">
              <ul>
                <li>
                    <?php echo $this->Html->link('<span class="icon dashboard"></span>Vendas (F1)', array('controller' => 'vendas', 'action' => 'index'), array('escape' => false)) ?>
                </li>
                
                <li>
                    <?php echo $this->Html->link('<span class="icon pencil"></span>Vendedores (F2)', array('controller' => 'vendedores', 'action' => 'index'), array('escape' => false)) ?>
                </li>
                
                <li>
                    <?php echo $this->Html->link('<span class="icon tables"></span>Produtos (F3)', array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)) ?>
                </li>

                <li>
                    <?php echo $this->Html->link('<span class="icon chart"></span>Estatísticas', array('controller' => '', 'action' => 'stats'), array('escape' => false)) ?>
                </li>

                <li>
                    <?php echo $this->Html->link('<span class="icon modal"></span>Logout', array('controller' => '', 'action' => 'logout'), array('escape' => false)) ?>
                </li>
              </ul>
                
            </nav>
            <?php echo $content_for_layout; ?>
            
          </div>
        
          <footer id="copyright">GMZ Stofeles</footer>
        </div>
      </div>
    </div>
     <?php echo $this->Html->script(array('notifications.js')); ?>
  </body>
</html>