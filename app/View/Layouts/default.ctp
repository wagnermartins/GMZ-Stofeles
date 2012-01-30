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
            'notifications.js',
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
            <h1 id="logo">Admin Control Panel</h1>
          
            <!-- User info -->
            <div id="userinfo">
              <img src="img/avatar.png" alt="Bram Jetten" />
              <div class="intro">
                Welcome Bram<br />
                You have <a href="#">3 new messages</a>
              </div>
            </div>
          
          </header>
        
          <!-- The application "window" -->
          <div id="application">
          
            <!-- Primary navigation -->
            <nav id="primary">
              <ul>
                <li class="current">
                  <a href="/">
                    <span class="icon dashboard"></span>
                    Dashboard
                  </a>
                </li>
                
                <li>
                  <a href="/forms">
                    <span class="icon pencil"></span>
                    Forms
                  </a>
                </li>
                
                <li>
                  <a href="/tables">
                    <span class="icon tables"></span>
                    DataTables
                  </a>
                </li>

                <li>
                  <a href="/charts">
                    <span class="icon chart"></span>
                    <span class="badge">4</span>
                    Charts
                  </a>
                </li>
                
                <li>
                  <a href="/notifications">
                    <span class="icon modal"></span>
                    Notifcations
                  </a>
                </li>
                
                <li>
                  <a href="/gallery">
                    <span class="icon gallery"></span>
                    Gallery
                  </a>
                </li>

                <li>
                  <a href="/buttons">
                    <span class="icon anchor"></span>
                    Icons/buttons
                  </a>
                </li>               
              </ul>
            
              <input type="text" id="search" placeholder="Realtime search..." />
            </nav>
            
            <?php echo $content_for_layout; ?>

          </div>
        
          <footer id="copyright">Theme design &amp; development by Bram Jetten in 2011</footer>
        </div>
      </div>
    </div>
  </body>
</html>