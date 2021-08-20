<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $niu = isset($_POST["ID_POST"]) ? $_POST["ID_POST"]  : 0;
    $feecha_trabajo = isset($_POST["feecha_trabajo"]) ? $_POST["feecha_trabajo"]  : '';
    $fecha_actual = isset($_POST["fecha_actual"]) ? $_POST["fecha_actual"]  : '';

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "update") {
        header('Content-Type: application/json');
        if ($feecha_trabajo) {
            $var_consulta = "UPDATE IF000001 SET FECHA = '$feecha_trabajo' ";
            $query = ibase_prepare($var_consulta);
            $val = 1;
            if ($v_query = ibase_execute($query)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            //print_r($var_consulta);
        } else {
            $arrInfo['status'] = 0;
        }
        print json_encode($arrInfo);

        die();
    }

    die();
}
$conectar = conectar();

$arrFechaIniDia = array();
$stmt = "SELECT CAST(0 AS NUMERIC(1,0)) AS NIU, FECHA FROM IF000001";
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrFechaIniDia[$rTMP["NIU"]]["FECHA"]             = $rTMP["FECHA"];
    $arrFechaIniDia[$rTMP["NIU"]]["NIU"]             = $rTMP["NIU"];
}

if (is_array($arrFechaIniDia) && (count($arrFechaIniDia) > 0)) {
    reset($arrFechaIniDia);
    foreach ($arrFechaIniDia as $rTMP['key'] => $rTMP['value']) {

        $arrFechaIniDiaInt = $rTMP["value"]['FECHA'];
    }
}
