<body class="hold-transition sidebar-mini layout-fixed">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link"><b><?php echo $title?></b></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="New Window">
        <div id="window">
        <a class="nav-link"  href="<?php echo $blank?>" target="_blank">
          <i class="far fa-window-restore"></i>
        </a>
        </div>
      </li>
      
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Log out">
        <div id="logout">
          <a class="nav-link"  href="interbase/logout.php">
            <i class="fas fa-times-circle"></i>
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <style>
  div.scrmenu{
    text-align: right !important;
  }
  </style>