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
        <div id="container" class="logincontainer">
        
          <header>
          
            <!-- Logo -->
            <h1 id="logo">GMZ Stofeles</h1>
   
          </header>
        
          <!-- The application "window" -->
          <div id="application">
          
            <?php echo $content_for_layout; ?>
            
          </div>
        
          <footer id="copyright">GMZ Stofeles</footer>
        </div>
      </div>
    </div>
     <?php echo $this->Html->script(array('notifications.js')); ?>
  </body>
</html>