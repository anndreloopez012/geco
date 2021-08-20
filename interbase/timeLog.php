<?php
    if(isset($_SESSION['tiempo']) ) {
        $inactivo = 20*60;
        $vida_session = time() - $_SESSION['tiempo'];

            if($vida_session > $inactivo)
            {
                session_unset();
                session_destroy();              
                header("Location:irims_adm/../../../index.php");
                exit();
            }
    }
    $_SESSION['tiempo'] = time();

?>
