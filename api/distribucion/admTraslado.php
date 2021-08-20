<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $USUA = trim($username);


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert_gestion_") {
        $DATE = date("d.m.Y");
        $USUARIO = isset($_POST["USUARIO"]) ? $_POST["USUARIO"]  : '';
        $GESTORD = isset($_POST["GESTORD"]) ? $_POST["GESTORD"]  : '';
        $empresa = isset($_POST["empresa"]) ? $_POST["empresa"]  : '';
        $buscarNUMEMPRE = isset($_POST["NUMEMPRE"]) ? $_POST["NUMEMPRE"]  : '';
        $buscarNUMENV = isset($_POST["NUMENV"]) ? $_POST["NUMENV"]  : '';
        $buscarCLAPROD = isset($_POST["CLAPROD"]) ? $_POST["CLAPROD"]  : '';
        $buscarNOMBRE = isset($_POST["NOMBRE"]) ? $_POST["NOMBRE"]  : '';
        $buscarNUMTRANSDEL = isset($_POST["NUMTRANSDEL"]) ? $_POST["NUMTRANSDEL"]  : '';
        $buscarNUMTRANSAL = isset($_POST["NUMTRANSAL"]) ? $_POST["NUMTRANSAL"]  : '';

        $strFilterNUMEMPRE = "";
        if (!empty($buscarNUMEMPRE)) {
            $strFilterNUMEMPRE = " AND ( NUMEMPRE = $buscarNUMEMPRE ) ";
        }

        $strFilterNUMENV = "";
        if (!empty($buscarNUMENV)) {
            $strFilterNUMENV = " AND ( NUMENV = $buscarNUMENV ) ";
        }

        $strFilterCLAPROD = "";
        if (!empty($buscarCLAPROD)) {
            $strFilterCLAPROD = " AND ( UPPER(CLAPROD) LIKE UPPER('%{$buscarCLAPROD}%') ) ";
        }

        $strFilterNOMBRE = "";
        if (!empty($buscarNOMBRE)) {
            $strFilterNOMBRE = " AND ( UPPER(NOMBRE) LIKE UPPER('%{$buscarNOMBRE}%') ) ";
        }

        $strFilterNUMTRANSDEL = "";
        $strFilterNUMTRANSAL = "";
        $strFilterNUMTRANS = "";
        if (!empty($buscarNUMTRANSDEL) && !empty($buscarNUMTRANSAL)) {
            $strFilterNUMTRANS = " AND ( NUMTRANS BETWEEN $buscarNUMTRANSDEL AND $buscarNUMTRANSAL) ";
        }

        $arrGestion = array();
        $stmt = "SELECT NUMEMPRE, NUMENV, CLAPROD, NOMBRE, FASIG, FVENCE, GESTORD, NUMTRANS 
        FROM GC000001 
        WHERE NUMTRANS > 0
        $strFilterNUMEMPRE
        $strFilterNUMENV
        $strFilterCLAPROD
        $strFilterNOMBRE
        $strFilterNUMTRANS";
        //print_r($stmt);

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
        }
        //ibase_free_result($v_query);

        if (is_array($arrGestion) && (count($arrGestion) > 0)) {
            $intContador = 1;
            reset($arrGestion);
            foreach ($arrGestion as $rTMP['key'] => $rTMP['value']) {
                $NUMTRANS = $rTMP["value"]['NUMTRANS'];

                $var_consulta = "UPDATE GC000001 SET NUMEMPRE = $empresa WHERE NUMTRANS = $NUMTRANS";
                $query = ibase_prepare($var_consulta);
                $val = 2;
                if ($v_query = ibase_execute($query)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }

                // print $var_consulta . '<br>';

                $intContador++;
            }
        }
        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "tabla_gestion") {

        $USUARIO = isset($_POST["USUARIO"]) ? $_POST["USUARIO"]  : '';
        $buscarGESTORD = isset($_POST["GESTORD"]) ? $_POST["GESTORD"]  : '';
        $buscarNUMEMPRE = isset($_POST["buscarNUMEMPRE"]) ? $_POST["buscarNUMEMPRE"]  : '';
        $buscarNUMENV = isset($_POST["buscarNUMENV"]) ? $_POST["buscarNUMENV"]  : '';
        $buscarCLAPROD = isset($_POST["buscarCLAPROD"]) ? $_POST["buscarCLAPROD"]  : '';
        $buscarNOMBRE = isset($_POST["buscarNOMBRE"]) ? $_POST["buscarNOMBRE"]  : '';
        $buscarNUMTRANSDEL = isset($_POST["buscarNUMTRANSDEL"]) ? $_POST["buscarNUMTRANSDEL"]  : '';
        $buscarNUMTRANSAL = isset($_POST["buscarNUMTRANSAL"]) ? $_POST["buscarNUMTRANSAL"]  : '';

        $strFilterGESTORD = "";
        if (!empty($buscarGESTORD)) {
            $strFilterGESTORD = " AND ( NUMEMPRE = $buscarGESTORD ) ";
        }

        $strFilterNUMEMPRE = "";
        if (!empty($buscarNUMEMPRE)) {
            $strFilterNUMEMPRE = " AND ( NUMEMPRE = $buscarNUMEMPRE ) ";
        }

        $strFilterNUMENV = "";
        if (!empty($buscarNUMENV)) {
            $strFilterNUMENV = " AND ( NUMENV = $buscarNUMENV ) ";
        }

        $strFilterCLAPROD = "";
        if (!empty($buscarCLAPROD)) {
            $strFilterCLAPROD = " AND ( UPPER(CLAPROD) LIKE UPPER('%{$buscarCLAPROD}%') ) ";
        }

        $strFilterNOMBRE = "";
        if (!empty($buscarNOMBRE)) {
            $strFilterNOMBRE = " AND ( UPPER(NOMBRE) LIKE UPPER('%{$buscarNOMBRE}%') ) ";
        }

        $strFilterNUMTRANSDEL = "";
        $strFilterNUMTRANSAL = "";
        $strFilterNUMTRANS = "";
        if (!empty($buscarNUMTRANSDEL) && !empty($buscarNUMTRANSAL)) {
            $strFilterNUMTRANS = " AND ( NUMTRANS BETWEEN $buscarNUMTRANSDEL AND $buscarNUMTRANSAL) ";
        }

        $arrGestion = array();
        $stmt = "SELECT NUMEMPRE, NUMENV, CLAPROD, NOMBRE, FASIG, FVENCE, GESTORD, NUMTRANS ,GESTORD
        FROM GC000001 
        WHERE NUMTRANS > 0
        $strFilterNUMEMPRE
        $strFilterNUMENV
        $strFilterCLAPROD
        $strFilterNOMBRE
        $strFilterNUMTRANS";
        //print_r($stmt);

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["NUMTRANS"]]["NUMEMPRE"]             = $rTMP["NUMEMPRE"];
            $arrGestion[$rTMP["NUMTRANS"]]["NUMENV"]             = $rTMP["NUMENV"];
            $arrGestion[$rTMP["NUMTRANS"]]["CLAPROD"]             = $rTMP["CLAPROD"];
            $arrGestion[$rTMP["NUMTRANS"]]["NOMBRE"]             = $rTMP["NOMBRE"];
            $arrGestion[$rTMP["NUMTRANS"]]["FASIG"]             = $rTMP["FASIG"];
            $arrGestion[$rTMP["NUMTRANS"]]["FVENCE"]             = $rTMP["FVENCE"];
            $arrGestion[$rTMP["NUMTRANS"]]["GESTORD"]             = $rTMP["GESTORD"];
            $arrGestion[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
        }
        //ibase_free_result($v_query);
?>
        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td>Cod. Cliente</td>
                        <td>No. Trabajo</td>
                        <td>Clave Producto</td>
                        <td>Nombre</td>
                        <td>Asignado</td>
                        <td>Vence</td>
                        <td>Gestor Dia</td>
                        <td>Transaccion</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrGestion) && (count($arrGestion) > 0)) {
                        $intContador = 1;
                        reset($arrGestion);
                        foreach ($arrGestion as $rTMP['key'] => $rTMP['value']) {
                            $date1 = $rTMP["value"]['FVENCE'];
                            $date1_ = date('d-m-Y', strtotime($date1));
                            $date2 = $rTMP["value"]['FASIG'];
                            $date2_ = date('d-m-Y', strtotime($date2));
                    ?>
                            <tr>
                                <td><?php echo  $rTMP["value"]['NUMEMPRE']; ?></td>
                                <td><?php echo  $rTMP["value"]['NUMENV']; ?></td>
                                <td><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
                                <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                                <td><?php echo  $date2_; ?></td>
                                <td><?php echo  $date1_; ?></td>
                                <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                                <td><?php echo  $rTMP["value"]['NUMTRANS']; ?></td>
                            </tr>
                    <?PHP
                            $intContador++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>


    <?php

        die();
    } else if ($strTipoValidacion == "dropdown_empresa") {

        $arrBarVarEmpresa = array();
        $stmt = "SELECT * FROM EM000001";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["NUMEMPRE"]             = $rTMP["NUMEMPRE"];
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["EMPRESA"]             = $rTMP["EMPRESA"];
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["CODIGOPLA"]             = $rTMP["CODIGOPLA"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="NUMEMPRE" name="NUMEMPRE" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarEmpresa) && (count($arrBarVarEmpresa) > 0)) {
                $intContador = 1;
                reset($arrBarVarEmpresa);
                foreach ($arrBarVarEmpresa as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['NUMEMPRE']; ?>" onclick="fntSelectViewPlantiila('<?php print $intContador; ?>');"><?php echo  $rTMP["value"]['EMPRESA']; ?> </option>

            <?PHP
                    $intContador++;
                }
            }
            ?>
        </select>

        <?PHP
        if (is_array($arrBarVarEmpresa) && (count($arrBarVarEmpresa) > 0)) {
            $intContador = 1;
            reset($arrBarVarEmpresa);
            foreach ($arrBarVarEmpresa as $rTMP['key'] => $rTMP['value']) {
        ?>
                <input type="hidden" class="form-control" id="hid_emp_<?php print $intContador; ?>" name="hid_emp_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NUMEMPRE']; ?>">
        <?PHP
                $intContador++;
            }
        }
        ?>
<?PHP

        die();
    }

    die();
}

////////////////////////////////////////////////////////////////////////////////FINAL DE CONSULTAS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>