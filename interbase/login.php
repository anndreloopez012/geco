<?php

require_once '../interbase/conexion.php';
session_start();
$connect = conectar();

function validarUsuario($usuario, $pass)
{
    $v_result = 0;

    if (($pass <> '') && ($usuario <> '')) {
        $pass = openssl_encrypt($pass, COD, KEY);
        $pass = openssl_decrypt($pass, COD, KEY);
        $pass = str_replace("'", "''", $pass);
        $usuario = str_replace("'", "''", $usuario);

        $stmt = "SELECT * FROM AXESO WHERE USUARIO  = '$usuario' AND CLAVE = '$pass' ";
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        $v_reg = ibase_fetch_row($v_query);
        ibase_free_query($query);

        if (is_array($v_reg)  &&  count($v_reg) > 0) {
            //$pass = openssl_encrypt($pass, COD, KEY);
            $_SESSION['logged'] = true;
            $_SESSION['USUARIO'] = $v_reg[1];
            $_SESSION['CLAVE'] = $v_reg[2];
            $_SESSION['NOMBRE'] = $v_reg[0];
            //$_SESSION['PASSWEB'] = $pass;
            //$pass = openssl_decrypt($pass, COD, KEY);
            //$_SESSION['PASSWEB_DECRYPT'] = $pass;

            $i = 1;
            $j = 131;
            $intContadorCampos = 5;
            for ($x = $i; $x <= $j; $x++) {

                $_SESSION['A' . $x] = isset($v_reg[$intContadorCampos]) ? $v_reg[$intContadorCampos] : "NO se encontro";
                $intContadorCampos++;
            }
            $v_result = 1;
        }

        //die();
    }
    return $v_result;
}

if (validarUsuario($_POST['user'], $_POST['password']) == 1) {
    header('Location:../home.php');
} else {
    header('Location:../index.php?error=1');
}
