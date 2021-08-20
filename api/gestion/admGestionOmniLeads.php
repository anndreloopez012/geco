
<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $connect = conectar();

    //VARIABLES DE POST

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "proces_update") {
        require_once '../../interbase/tmfUser.php';
        if ($estatus == 1) {
            header('Content-Type: application/json');
            $status = 1;
            $var_consulta = "UPDATE vus_usuarios_solicitud_registro SET vus_solreg_estatus_aut = '$fechaIng', vus_solreg_estatus = '1'WHERE vus_solreg_id = $userId ;";
            $val = 1;
            if (pg_query($rmfUser, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            //print_r($var_consulta);
            print json_encode($arrInfo);

            die();
        }
    } else if ($strTipoValidacion == "proces_insert_usuarios") {

        die();
    }

    die();
}

$connect = conectar();

$arrBarVar = array();
$stmt = "SELECT META_DIA, EFECTIVIDAD, AUTENTIC  FROM AXESO WHERE USUARIO = '$username'";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrBarVar[$rTMP["AUTENTIC"]]["META_DIA"]             = $rTMP["META_DIA"];
    $arrBarVar[$rTMP["AUTENTIC"]]["EFECTIVIDAD"]              = $rTMP["EFECTIVIDAD"];
}
//ibase_free_result($v_query);



if (is_array($arrBarVar) && (count($arrBarVar) > 0)) {
    reset($arrBarVar);
    foreach ($arrBarVar as $rTMP['key'] => $rTMP['value']) {

        $metaDia = $rTMP["value"]['META_DIA'];
        $efectividad = $rTMP["value"]['EFECTIVIDAD'];
    }
}

$arrGestiones = array();
$stmt = "SELECT COUNT(NIU) AS GESTIONESS FROM GM000001 WHERE FGESTION = '$arrFechaIniDiaInt' AND OWNER = '$username'";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestiones[$rTMP["GESTIONESS"]]["GESTIONESS"]             = $rTMP["GESTIONESS"];
}

if (is_array($arrGestiones) && (count($arrGestiones) > 0)) {
    reset($arrGestiones);
    foreach ($arrGestiones as $rTMP['key'] => $rTMP['value']) {

        $ContadorGestiones = $rTMP["value"]['GESTIONESS'];
    }
}

$arrEfectividad = array();
$stmt = "SELECT SUM(PONDERACION) AS PONDERACIONES FROM GM000001 WHERE FGESTION = '$arrFechaIniDiaInt' AND OWNER = '$username'";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrEfectividad[$rTMP["PONDERACIONES"]]["PONDERACIONES"]             = $rTMP["PONDERACIONES"];
}

if (is_array($arrEfectividad) && (count($arrEfectividad) > 0)) {
    reset($arrEfectividad);
    foreach ($arrEfectividad as $rTMP['key'] => $rTMP['value']) {

        $ContadorPonderacion = $rTMP["value"]['PONDERACIONES'];
    }
}


$arrRetenciones = array();
$stmt = "SELECT SUM(SALDO) AS VALOR FROM GC000001 WHERE GESTORD = '$username' AND ESTADO = 'RETENCION'";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrRetenciones[$rTMP["VALOR"]]["VALOR"]             = $rTMP["VALOR"];
}

if (is_array($arrRetenciones) && (count($arrRetenciones) > 0)) {
    reset($arrRetenciones);
    foreach ($arrRetenciones as $rTMP['key'] => $rTMP['value']) {

        $ContadorRetencion = $rTMP["value"]['VALOR'];
    }
}


$arrVigentes = array();
$stmt = "SELECT SUM(SALDO) AS VALOR FROM GC000001 WHERE GESTORD = '$username' AND ESTADO = 'VIGENTE'";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrVigentes[$rTMP["VALOR"]]["VALOR"]             = $rTMP["VALOR"];
}

if (is_array($arrVigentes) && (count($arrVigentes) > 0)) {
    reset($arrVigentes);
    foreach ($arrVigentes as $rTMP['key'] => $rTMP['value']) {

        $ContadorVigentes = $rTMP["value"]['VALOR'];
    }
}

$arrMontoAsi = array();
$stmt = "SELECT SUM(SALDO) AS VALOR FROM GC000001 WHERE GESTORD = '$username' ";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrMontoAsi[$rTMP["VALOR"]]["VALOR"]             = $rTMP["VALOR"];
}

if (is_array($arrMontoAsi) && (count($arrMontoAsi) > 0)) {
    reset($arrMontoAsi);
    foreach ($arrMontoAsi as $rTMP['key'] => $rTMP['value']) {

        $ContadorMontoAsi = $rTMP["value"]['VALOR'];
    }
}
////////////////////////////////////////////////////////////////////////////////FINAL DE CONSULTAS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////CARGA DE MODULO DE TRABAJO////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$numCaso = isset($_GET["id"]) ? $_GET["id"]  : '';
$TN =  isset($_GET["tn"]) ? $_GET["tn"]  : '';
$gt =  isset($_GET["gt"]) ? $_GET["gt"]  : 0;

$rt =  isset($_GET["rt"]) ? $_GET["rt"]  : '';


if ($usernameNum == 1) {
    header("location: m90.php?id=$numCaso&tn=$TN&gt=$gt&rt=$rt");
    exit;
} else if ($usernameNum == 3) {
    header("location: tarjetas.php?id=$numCaso&tn=$TN&gt=$gt&rt=$rt");
    exit;
} else if ($usernameNum == 4) {
    header("location: prinCons.php?id=$numCaso&tn=$TN&gt=$gt&rt=$rt");
    exit;
}else if ($usernameNum == 6) {
    header("location: azteca.php?id=$numCaso&tn=$TN&gt=$gt&rt=$rt");
    exit;
}


////////////////////////////////////CARGA DE BARRAS DE ESTADO///////////////////////////////////////////////////////////////////////////////////////////////////// 
$valContadorGestiones = $ContadorGestiones;
$porcentageGestirones = $valContadorGestiones * 100 / $metaDia;

if ($valContadorGestiones <= round($metaDia / 4, 0)) {
    $colorMeta = 'alert-danger';
} else if ($valContadorGestiones >= $metaDia) {
    $colorMeta = 'alert-success';
} else if ($valContadorGestiones >= round($metaDia / 4 + 1, 0) and $valContadorGestiones <= round($metaDia / 2, 0)) {
    $colorMeta = 'alert-warning';
} else if ($valContadorGestiones >= round($metaDia / 2 + 1, 0) and $valContadorGestiones < $metaDia) {
    $colorMeta = 'alert-info';
}

$valContadorPonderacion = $ContadorPonderacion;

if (!$valContadorPonderacion) {
    $valContadorPonderacion = 0;
} else {
    $valContadorPonderacion = intval($valContadorPonderacion);
}

$porcentagePonderacion = $valContadorPonderacion * 100 / $efectividad;

if ($valContadorPonderacion <= round($efectividad / 4, 0)) {

    $colorEfectividad = 'alert-danger';
} else if ($valContadorPonderacion >= $efectividad) {

    $colorEfectividad = 'alert-success';
} else if ($valContadorPonderacion >= round($efectividad / 4 + 1, 0) and $valContadorPonderacion <= round($efectividad / 2, 0)) {

    $colorEfectividad = 'alert-warning';
} else if ($valContadorPonderacion >= round($efectividad / 2 + 1, 0) and $valContadorPonderacion < $efectividad) {

    $colorEfectividad = 'alert-info';
}

//SELEO DE VARIABLES PARA CONTROL DE BARRA RETENCION
$valContadorRetencion = $ContadorRetencion;

if (!$valContadorRetencion) {
    $valContadorRetencion = 0;
} else {
    $valContadorRetencion = intval($valContadorRetencion);
}

$valContadorVigentes = $ContadorVigentes;

if (!$valContadorVigentes) {
    $valContadorVigentes = 0;
} else {
    $valContadorVigentes = intval($valContadorVigentes);
}

$valContadorMontoAsi = $ContadorMontoAsi;

if (!$valContadorMontoAsi) {
    $valContadorMontoAsi = 0;
} else {
    $valContadorMontoAsi = intval($valContadorMontoAsi);
}

//OPERACION PARA VARIABLE DE RETENCION 

if ($valContadorMontoAsi == 0) {
    $v_reten = 0;
} else {
    $v_reten = round((($valContadorRetencion + $valContadorVigentes) * 100) / $valContadorMontoAsi, 2);
}

$porcentageV_reten = $v_reten * 100 / 100;


if ($v_reten <= round(100 / 4, 0)) {

    $colorRetencion = 'alert-danger';
} else if ($v_reten > 100) {

    $colorRetencion = 'alert-success';
} else if ($v_reten >= round(100 / 4 + 1, 0) and $v_reten <= round(100 / 2, 0)) {

    $colorRetencion = 'alert-warning';
} else if ($v_reten >= ROUND(100 / 2 + 1, 0) and $v_reten <= 100) {

    $colorRetencion = 'alert-info';
}
//FIN DE OPERACIONES PARA DATOS DE BARRAS DE CARGA
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

