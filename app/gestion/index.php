<?php

session_start();

//if (isset($_SESSION['tiempo'])) {
//    $inactivo = 30;
//    $vida_session = time() - $_SESSION['tiempo'];
//
//    if ($vida_session > $inactivo) {
//        session_unset();
//        session_destroy();
//        header("Location:../../index.php");
//        exit();
//    }
//}
//$_SESSION['tiempo'] = time();

if (!isset($_SESSION["USUARIO"])) {
    header("Location: ../../index.php");
    exit();
}
$rt =  isset($_GET["rt"]) ? $_GET["rt"]  : '';
?>

<?php
$logout = '../../interbase/logout.php';

//btn nav
//$user = $_SESSION['username'];
$windowHome = '../../home.php';
$NIUMENU = 7;
$title = 'GESTION';

require_once '../../interbase/conexion.php';

require_once '../dependenciasHead.php';

require_once '../../api/admMenu.php';

require_once '../../api/gestion/admGestion.php';

require_once '../../layout/nav.php';

require_once '../../layout/menu.php';

require_once '../../layout/gestion/gestionComponent.php';

require_once '../dependenciasFooter.php';

?>
