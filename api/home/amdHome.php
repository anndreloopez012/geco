

<?php

$connect = conectar(); 

$arrModulo = array();
$stmt = "SELECT *
         FROM CMPRINCIPAL
         ORDER BY POSICION";

$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {

    $arrModulo[$rTMP["NIU"]]["NIU"]               = $rTMP["NIU"];
    $arrModulo[$rTMP["NIU"]]["DESCRIP"]             = $rTMP["DESCRIP"];
    $arrModulo[$rTMP["NIU"]]["URL"]              = $rTMP["URL"];
    $arrModulo[$rTMP["NIU"]]["AUTORIZADO"]               = $rTMP["AUTORIZADO"];
    $arrModulo[$rTMP["NIU"]]["BTN"]               = $rTMP["BTN"];
    $arrModulo[$rTMP["NIU"]]["ITEM"]               = $rTMP["ITEM"];
}
//ibase_free_result($v_query);
?>