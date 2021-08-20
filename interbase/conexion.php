<?php
 
function conectar(){ 
   //$host = 'localhost:C:\GEKO\SIGECO.FDB';
    //$host = '192.168.100.129:C:\SIGECO\SIGECODA\SIGECO.FDB';
   $host = '192.168.100.129:C:\testSigeco\SIGECODA\SIGECO.FDB';

    $username = "SYSDBA"; 
    $password = "bawjdr"; 
    $dbh = ibase_connect( $host, $username, $password ,'UTF8' ) or die ("Acceso Denegado!"); 
    
}
$conectar = conectar();

$rsNIU = ibase_query("SELECT FIRST 1 KEY_ENCRYPT,COD_ENCRYPT FROM ADMCONFIG");
    if ($row = ibase_fetch_row($rsNIU)) {
        $idRow0 = trim($row[0]);
        $idRow1 = trim($row[1]);
    }
    $KEY_ENCRYPT = isset($idRow0) ? $idRow0 : '';
    $COD_ENCRYPT = isset($idRow1) ? $idRow1 : '';

    define("KEY",$KEY_ENCRYPT);
    define("COD",$COD_ENCRYPT);