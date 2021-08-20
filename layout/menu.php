<aside class="main-sidebar sidebar-dark-primary elevation-4 fondoColor">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../geco-metal.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">GECO 2.0</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php
        if (is_array($arrModulo) && (count($arrModulo) > 0)) {
          reset($arrModulo);
          foreach ($arrModulo as $rTMP['key'] => $rTMP['value']) {
            if ($_SESSION[$rTMP["value"]['ITEM']] == 1) {
        ?>

              <li class="nav-item textTop">
                <a href="<?php echo  $rTMP["value"]['URL']; ?>" class="nav-link">
                  <?php echo  $rTMP["value"]['BTN']; ?>
                  <p>
                    <?php echo  $rTMP["value"]['DESCRIP']; ?>
                     <?php //echo $_SESSION[$rTMP["value"]['ITEM']] ; ?>
                     <?php //echo  $rTMP["value"]['ITEM']; ?>
                  </p>
                </a>
              </li>

        <?PHP
            }
          }
        }
        ?>

      </ul>
    </nav>

  </div>
</aside>

<style>

</style>
</br>