
<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: irims_adm/../../../index.php");
exit(); }
?>
