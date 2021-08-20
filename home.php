<?php
session_start();

   // if(isset($_SESSION['tiempo']) ) {
   //     $inactivo = 30;
   //     $vida_session = time() - $_SESSION['tiempo'];
//
   //         if($vida_session > $inactivo)
   //         {
   //             session_unset();
   //             session_destroy();              
   //             header("Location:index.php");
   //             exit();
   //         }
   // }
   // $_SESSION['tiempo'] = time();

    if (!isset($_SESSION["USUARIO"])) {
        header("Location: index.php");
        exit();
    }
?>
<?php
    //SESSION
    $blank = 'home.php';
    
    $logout = 'interbase/logout.php';

    $title = "BIENVENIDO -".$_SESSION["NOMBRE"];
    
    require_once 'interbase/conexion.php';
    
    require_once 'dependenciasHead.php';
    
    require_once 'api/home/amdHome.php';

    require_once 'layout/home/nav.php';

    require_once 'layout/home/menu.php';

    require_once 'layout/home/homeComponent.php';
    
    require_once 'dependenciasFooter.php';

?>
