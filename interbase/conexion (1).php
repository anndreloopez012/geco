<?php
 
function conectar(){ 
  //$host = 'localhost:C:\GEKO\SIGECO.FDB';
    //PRODUCCION
   //$host = '192.168.100.129:C:\SIGECO\SIGECODA\SIGECOANT.FDB';
    //TEST
    $host = '192.168.100.129:C:\sigeco\SIGECODA\SIGECO.FDB';

    $username = "SYSDBA"; 
    $password = "bawjdr"; 
    //$dbh = ibase_connect( $host, $username, $password ,'UTF8' ) or die ("Acceso Denegado!"); 

    if ( !($dbh = ibase_connect( $host, $username, $password ,'WIN1252' ))  ) {
        //echo 'Connected to the database.';
        //ibase_close($dbh);
        echo 'Connection failed.';
    } 
}
?>
