<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];

    $arrFechaIniDia = array();
    $stmt = "SELECT CAST(0 AS NUMERIC(1,0)) AS NIU, FECHA FROM IF000001";
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrFechaIniDia[$rTMP["NIU"]]["FECHA"]             = $rTMP["FECHA"];
    }

    if (is_array($arrFechaIniDia) && (count($arrFechaIniDia) > 0)) {
        reset($arrFechaIniDia);
        foreach ($arrFechaIniDia as $rTMP['key'] => $rTMP['value']) {

            $arrFechaIniDiaInt = $rTMP["value"]['FECHA'];
        }
    }

    $niu = isset($_POST["ID_POST"]) ? $_POST["ID_POST"]  : 0;

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "update") {
        header('Content-Type: application/json');

        $var_consulta = "UPDATE AXESO SET USR_STATUS = 1 WHERE USUARIO  = '$niu'";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
       
        //print_r($var_consulta);

        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "tabla_movimientos") {

        $buscar = isset($_POST["buscar"]) ? $_POST["buscar"]  : '';

        $strFilter = "";
        if (!empty($buscar)) {
            $strFilter = " AND ( UPPER(USUARIO) LIKE UPPER('%{$buscar}%') ) ";
        }

        $arrMovimiento = array();
        $stmt = "SELECT  USUARIO FROM AXESO WHERE USR_STATUS = 0 $strFilter";
       // print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrMovimiento[$rTMP["USUARIO"]]["USUARIO"]              = $rTMP["USUARIO"];
        }

?>

        <div class="col-md-12 tableFixHeadInvestiga">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td>Activar</td>
                        <td>Nombre</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrMovimiento) && (count($arrMovimiento) > 0)) {
                        $intContador = 1;
                        reset($arrMovimiento);
                        foreach ($arrMovimiento as $rTMP['key'] => $rTMP['value']) {
                    ?>
                            <tr>
                                <td width="5%" style="cursor:pointer;"><i class="fas fa-2x fa-chart-line" onclick="fntSelectId(<?php echo  $intContador; ?>)"></i></td>
                                <td width="95%"><?php echo  $rTMP["value"]['USUARIO']; ?></td>
                            </tr>

                            <input type="hidden" id="id_<?php echo  $intContador; ?>" id="id_<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['USUARIO']; ?>">



                    <?PHP
                            $intContador++;
                        }
                        die();
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?PHP
        die();
    }

    die();
}

?>