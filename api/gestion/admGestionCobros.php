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

    //VARIABLES DE POST
    $USUA = trim($username);

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert_window") {

        $rs2 = ibase_query("SELECT TMAC FROM EM000001 WHERE NUMEMPRE = '$NUMEMPRE' ORDER BY NUMEMPRE DESC ROWS 1");
        if ($row = ibase_fetch_row($rs2)) {
            $idRow2 = trim($row[0]);
        }
        $TM = isset($idRow2) ? $idRow2  : 0;

        $strProdNiu = 0;
        $strNiuTareas = 2;
        $strFechaDia = $arrFechaIniDiaInt;
        $strTiempoInicial = $HORAINI;
        $strUsuario = $USUA;
        $strTiempoFuera = $TM * 60;

        header('Content-Type: application/json');

        $var_consulta = "EXECUTE PROCEDURE GRABAR_ACTIVIDAD_INI ({$strProdNiu},{$strNiuTareas},'{$strFechaDia}','{$strTiempoInicial}','{$strUsuario}',{$strTiempoFuera})";
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
    } else if ($strTipoValidacion == "insert_end_window") {

        $rs = ibase_query("SELECT NIU FROM ACTIVIDAD WHERE USUARIO = '$USUA' ORDER BY NIU DESC ROWS 1");
        if ($row = ibase_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
        $id = isset($idRow) ? $idRow  : 0;

        $strTiempoFinal = isset($_POST["horaFinal"]) ? trim($_POST["horaFinal"]) : '00:00:00';
        $strTiempo = isset($_POST["number_segundos_"]) ? trim($_POST["number_segundos_"]) : '0';
        $strObservac = '';
        $strIdeBase = $id;

        header('Content-Type: application/json');
        $var_consulta = "EXECUTE PROCEDURE GRABAR_ACTIVIDAD_FIN ('{$strTiempoFinal}',{$strTiempo},'{$strObservac}','{$strIdeBase}')";
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
    } else if ($strTipoValidacion == "insert_ini_window") {

        $tiempo = isset($_POST["tiempo"]) ? trim($_POST["tiempo"]) : '';

        $strProdNiu = 0;
        $strNiuTareas = 1;
        $strFechaDia = $arrFechaIniDiaInt;
        $strTiempoInicial = isset($_POST["horaInicial"]) ? trim($_POST["horaInicial"]) : '00:00:00';
        $strUsuario = $USUA;
        $strTiempoFuera = 0;

        $var_consulta = "EXECUTE PROCEDURE GRABAR_ACTIVIDAD_INI ({$strProdNiu},{$strNiuTareas},'{$strFechaDia}','{$strTiempoInicial}','{$strUsuario}',{$strTiempoFuera})";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }

        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "insert_ini_window_trabajo") {

        $rs = ibase_query("SELECT NIU FROM ACTIVIDAD WHERE USUARIO = '$USUA' ORDER BY NIU DESC ROWS 1");
        if ($row = ibase_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
        $id = isset($idRow) ? $idRow  : 0;

        $strTiempoFinal = isset($_POST["horaFinal"]) ? trim($_POST["horaFinal"]) : '00:00:00';
        $strTiempo = isset($_POST["number_segundos_"]) ? trim($_POST["number_segundos_"]) : '0';
        $strObservac = '';
        $strIdeBase = $id;

        $tiempo = isset($_POST["tiempo"]) ? trim($_POST["tiempo"]) : '';
        $niu = isset($_POST["niu"]) ? trim($_POST["niu"]) : '';

        $strProdNiu = 0;
        $strNiuTareas = $niu;
        $strFechaDia = $arrFechaIniDiaInt;
        $strTiempoInicial = isset($_POST["horaInicial"]) ? trim($_POST["horaInicial"]) : '00:00:00';
        $strUsuario = $USUA;
        $strTiempoFuera = $tiempo * 60;

        header('Content-Type: application/json');
        $var_consulta = "EXECUTE PROCEDURE GRABAR_ACTIVIDAD_FIN ('{$strTiempoFinal}',{$strTiempo},'{$strObservac}','{$strIdeBase}')";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        // print_r($niu);
        //print json_encode($arrInfo);

        $var_consulta = "EXECUTE PROCEDURE GRABAR_ACTIVIDAD_INI ({$strProdNiu},{$strNiuTareas},'{$strFechaDia}','{$strTiempoInicial}','{$strUsuario}',{$strTiempoFuera})";
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
    } else if ($strTipoValidacion == "insert_prorroga") {

        $strProrroga = isset($_POST["prorroga_"]) ? trim($_POST["prorroga_"]) : '00:00:00';
        $id = isset($_POST["id_alarma"]) ? trim($_POST["id_alarma"]) : '0';

        header('Content-Type: application/json');
        $var_consulta = "UPDATE GC000001 SET HPROPAGO = '{$strProrroga}' WHERE NUMTRANS = '$id'; ";
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
    } else if ($strTipoValidacion == "consulta_usuario_trabajo") {

        $claveUsuario = isset($_POST["claveUsuario"]) ? trim($_POST["claveUsuario"]) : '';

        header('Content-Type: application/json');
        $rs = ibase_query("SELECT USUARIO, SUPERGRAL FROM AXESO WHERE CLAVE = '$claveUsuario'");
        if ($row = ibase_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
        $id = isset($idRow) ? $idRow  : '';
        $val = 1;
        if ($id) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            //$arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);

        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "consulta_supervisor_trabajo") {

        $claveSupervisor = isset($_POST["claveSupervisor"]) ? trim($_POST["claveSupervisor"]) : '';

        header('Content-Type: application/json');
        $rs = ibase_query("SELECT USUARIO, SUPERGRAL FROM AXESO WHERE CLAVE = '$claveSupervisor'");
        if ($row = ibase_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
        $id = isset($idRow) ? $idRow  : '';
        $val = 1;
        if ($id) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            // $arrInfo['error'] = $rs;
        }
        //print_r($var_consulta);

        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "dropdown_origen") {

        $arrBarVarOrigen = array();
        $stmt = "SELECT * FROM TI000001 ORDER BY TIPOLOGI";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarOrigen[$rTMP["NUMTIPO"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
        }
        //ibase_free_result($v_query);
?>
        <select class="form-control select2" id="buscarOrigen" name="buscarOrigen" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarOrigen) && (count($arrBarVarOrigen) > 0)) {
                reset($arrBarVarOrigen);
                foreach ($arrBarVarOrigen as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['TIPOLOGI']; ?>"><?php echo  $rTMP["value"]['TIPOLOGI']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_receptor") {

        $arrBarVarReceptor = array();
        $stmt = "SELECT * FROM CO000001 ORDER BY CONCLUSI";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarReceptor[$rTMP["NUMCONC"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="buscarReceptor" name="buscarReceptor" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarReceptor) && (count($arrBarVarReceptor) > 0)) {
                reset($arrBarVarReceptor);
                foreach ($arrBarVarReceptor as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['CONCLUSI']; ?>"><?php echo  $rTMP["value"]['CONCLUSI']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_tipologia") {

        $arrBarVarTipologia = array();
        $stmt = "SELECT  RTESTADO FROM RT000001 GROUP BY RTESTADO ORDER BY RTESTADO ";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarTipologia[$rTMP["RTESTADO"]]["RTESTADO"]             = $rTMP["RTESTADO"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="buscarTipologia" name="buscarTipologia" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarTipologia) && (count($arrBarVarTipologia) > 0)) {
                reset($arrBarVarTipologia);
                foreach ($arrBarVarTipologia as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['RTESTADO']; ?>"><?php echo  $rTMP["value"]['RTESTADO']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_categoria") {

        $arrBarVarCategoria = array();
        $stmt = "SELECT * FROM SC000001 ORDER BY SUBCONCL";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarCategoria[$rTMP["NUMSUBC"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="buscarCategoria" name="buscarCategoria" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarCategoria) && (count($arrBarVarCategoria) > 0)) {
                reset($arrBarVarCategoria);
                foreach ($arrBarVarCategoria as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['SUBCONCL']; ?>"><?php echo  $rTMP["value"]['SUBCONCL']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_estado") {

        $arrBarVarEstado = array();
        $stmt = "SELECT  ESTADO FROM ESTADOS GROUP BY ESTADO  ORDER BY ESTADO";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarEstado[$rTMP["ESTADO"]]["ESTADO"]             = $rTMP["ESTADO"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="buscarEstado" name="buscarEstado" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarEstado) && (count($arrBarVarEstado) > 0)) {
                reset($arrBarVarEstado);
                foreach ($arrBarVarEstado as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['ESTADO']; ?>"><?php echo  $rTMP["value"]['ESTADO']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "tabla_gestion_creditos") {
        $rt = isset($_POST["rt"]) ? $_POST["rt"]  : '';

        $buscarOrigen = isset($_POST["buscarOrigen"]) ? $_POST["buscarOrigen"]  : '';

        $strFilterOrigen = "";
        if (!empty($buscarOrigen)) {
            $strFilterOrigen = " AND ( UPPER(C.TIPOLOGI) = UPPER('$buscarOrigen') ) ";
        }

        $buscarReceptor = isset($_POST["buscarReceptor"]) ? $_POST["buscarReceptor"]  : '';

        $strFilterReceptor = "";
        if (!empty($buscarReceptor)) {
            $strFilterReceptor = " AND ( UPPER(C.CONCLUSI) = UPPER('$buscarReceptor') ) ";
        }

        $buscarTipologia = isset($_POST["buscarTipologia"]) ? $_POST["buscarTipologia"]  : '';

        $strFilterTipologia = "";
        if (!empty($buscarTipologia)) {
            $strFilterTipologia = " AND ( UPPER(C.RTESTADO) = UPPER('$buscarTipologia') ) ";
        }

        $buscarCategoria = isset($_POST["buscarCategoria"]) ? $_POST["buscarCategoria"]  : '';

        $strFilterCategoria = "";
        if (!empty($buscarCategoria)) {
            $strFilterCategoria = " AND ( UPPER(C.SUBCONCL) = UPPER('$buscarCategoria') ) ";
        }

        $buscarEstado = isset($_POST["buscarEstado"]) ? $_POST["buscarEstado"]  : '';

        $strFilterEstado = "";
        if (!empty($buscarEstado)) {
            $strFilterEstado = " AND ( UPPER(C.ESTADO) = UPPER('$buscarEstado') ) ";
        }


        //////////////////////////////////////////////////////////////////TELEFONO//////////////////////////////////////////////////////////////////

        $buscarTelefono = isset($_POST["buscarTelefono"]) ? $_POST["buscarTelefono"]  : '';

        $strFilterNum = "";
        if (!empty($buscarTelefono)) {
            $strFilterNum = " WHERE ( UPPER(T.NUMERO) LIKE UPPER('%{$buscarTelefono}%') ) ";
        }

        if (!empty($strFilterNum)) {
            $stmt = "SELECT C.FASIG, C.CODICLIE, C.CLAPROD, C.NOMBRE, C.TIPOLOGI, C.CONCLUSI, C.RTESTADO, C.SUBCONCL, C.ESTADO, C.IDENTIFI, T.NUMERO, C.NUMTRANS, C.NUMEMPRE, C.GESTORD, C.TELEFONO, E.PLANGEST 
            FROM GC000001 C
            LEFT JOIN TELEFONOS T
            ON C.CODICLIE = T.CODICLIE
            INNER JOIN EM000001 E
            ON C.NUMEMPRE = E.NUMEMPRE
            $strFilterNum";
        }

        /////////////////////////////////////////////////////////////IDENTIFICACION///////////////////////////////////////////////////////////////////////

        $buscarIdentificacion = isset($_POST["buscarIdentificacion"]) ? $_POST["buscarIdentificacion"]  : '';

        $strFilterIdentifi = "";
        if (!empty($buscarIdentificacion)) {
            $strFilterIdentifi = " WHERE ( UPPER(C.IDENTIFI) LIKE UPPER('%{$buscarIdentificacion}%') ) ";
        }

        if (!empty($strFilterIdentifi)) {
            $stmt = "SELECT C.FASIG, C.CODICLIE, C.CLAPROD, C.NOMBRE, C.TIPOLOGI, C.CONCLUSI, C.RTESTADO, C.SUBCONCL, C.ESTADO, C.IDENTIFI, C.NUMTRANS, C.NUMEMPRE, C.GESTORD, C.TELEFONO, E.PLANGEST 
             FROM GC000001 C
             INNER JOIN EM000001 E
            ON C.NUMEMPRE = E.NUMEMPRE
             $strFilterIdentifi";
            // print_r($stmt);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $buscarNOMBRE = isset($_POST["buscarNOMBRE"]) ? $_POST["buscarNOMBRE"]  : '';
        $buscarCODICLIE = isset($_POST["buscarCODICLIE"]) ? $_POST["buscarCODICLIE"]  : '';
        $buscarCLAPROD = isset($_POST["buscarCLAPROD"]) ? $_POST["buscarCLAPROD"]  : '';

        $strFilterNOMBRE = "";
        if (!empty($buscarNOMBRE)) {
            $strFilterNOMBRE = " AND ( UPPER(C.NOMBRE) LIKE UPPER('%{$buscarNOMBRE}%') ) ";
        }

        $strFilterCODICLIE = "";
        if (!empty($buscarCODICLIE)) {
            $strFilterCODICLIE = " AND (  UPPER(C.CODICLIE) LIKE UPPER('%{$buscarCODICLIE}%')) ";
        }

        $strFilterCLAPROD = "";
        if (!empty($buscarCLAPROD)) {
            $strFilterCLAPROD = " AND (UPPER(C.CLAPROD) LIKE UPPER('%{$buscarCLAPROD}%') ) ";
        }

        $arrGestion = array();
        if (!empty($strFilterGeneral) || !empty($strFilterOrigen) || !empty($buscarReceptor) || !empty($buscarTipologia) || !empty($buscarCategoria) || !empty($strFilterEstado) || $strFilterNOMBRE == "" && $strFilterCODICLIE == "" && $strFilterCLAPROD == "" && $strFilterNum == "" && $strFilterIdentifi == "") {
            $stmt = "SELECT C.FASIG, C.CODICLIE, C.CLAPROD, C.NOMBRE, C.TIPOLOGI, C.CONCLUSI, C.RTESTADO, C.SUBCONCL, C.ESTADO, C.IDENTIFI, C.TELEFONO, C.NUMTRANS, C.NUMEMPRE, C.GESTORD, E.PLANGEST  
            FROM GC000001 C
            INNER JOIN EM000001 E
            ON C.NUMEMPRE = E.NUMEMPRE
            WHERE GESTORD = '$username'
            $strFilterOrigen
            $strFilterReceptor
            $strFilterTipologia
            $strFilterCategoria
            $strFilterEstado
            $strFilterNOMBRE
            $strFilterCODICLIE
            $strFilterCLAPROD";
            //print_r($stmt);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
            $arrGestion[$rTMP["NUMTRANS"]]["FASIG"]             = $rTMP["FASIG"];
            $arrGestion[$rTMP["NUMTRANS"]]["CODICLIE"]             = $rTMP["CODICLIE"];
            $arrGestion[$rTMP["NUMTRANS"]]["CLAPROD"]             = $rTMP["CLAPROD"];
            $arrGestion[$rTMP["NUMTRANS"]]["NOMBRE"]             = $rTMP["NOMBRE"];
            $arrGestion[$rTMP["NUMTRANS"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
            $arrGestion[$rTMP["NUMTRANS"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
            $arrGestion[$rTMP["NUMTRANS"]]["RTESTADO"]             = $rTMP["RTESTADO"];
            $arrGestion[$rTMP["NUMTRANS"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
            $arrGestion[$rTMP["NUMTRANS"]]["ESTADO"]             = $rTMP["ESTADO"];
            $arrGestion[$rTMP["NUMTRANS"]]["IDENTIFI"]             = $rTMP["IDENTIFI"];
            $arrGestion[$rTMP["NUMTRANS"]]["TELEFONO"]             = $rTMP["TELEFONO"];
            $arrGestion[$rTMP["NUMTRANS"]]["PLANGEST"]             = $rTMP["PLANGEST"];
        }
        //ibase_free_result($v_query);

    ?>

        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td>                            
                            <a class="btn btn-secondary btn-block" href="reportes/gestion.php?rt=<?php echo  $rt; ?>&username=<?php echo $USUA; ?>&buscarOrigen=<?php echo  $buscarOrigen; ?>&buscarTipologia=<?php echo  $buscarTipologia; ?>&buscarCategoria=<?php echo  $buscarCategoria; ?>&buscarEstado=<?php echo  $buscarEstado; ?>&buscarTelefono=<?php echo  $buscarTelefono; ?>&buscarIdentificacion=<?php echo  $buscarIdentificacion; ?>&buscargeneral=<?php echo  $buscargeneral; ?>"><i class="fad fa-file-excel"></i></a>
                        </td>
                        <td>Asignado</td>
                        <td>Cod. Cliente</td>
                        <td>Producto</td>
                        <td>Nombre</td>
                        <td>Origen</td>
                        <td>Receptor</td>
                        <td>Tipologia</td>
                        <td>Categoria</td>
                        <td>Estado</td>
                        <td>Identificacion</td>
                        <td>Telefono</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrGestion) && (count($arrGestion) > 0)) {
                        $intContador = 1;
                        reset($arrGestion);
                        foreach ($arrGestion as $rTMP['key'] => $rTMP['value']) {
                            $date = $rTMP["value"]['FASIG'];
                            $date_ = date('d-m-Y', strtotime($date));
                    ?>
                            <tr>
                                <td style="cursor:pointer; width:3%;"><a class="btn btn-info" onclick="myTimeEnd()" href="../gestion/gestionOmniLeads.php?pl=<?php echo  $rTMP["value"]['PLANGEST']; ?>&rt=2&tn=0&id=<?php echo  $rTMP["value"]['NUMTRANS']; ?>&gt=1" target="_blank" rel="noopener noreferrer"><i class="fas fa-2x fa-user-headset"></i></a></td>
                                <td><?php echo  $date_; ?></td>
                                <td><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                                <td><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
                                <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                                <td><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                                <td><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                                <td><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                                <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                                <td><?php echo  $rTMP["value"]['ESTADO']; ?></td>
                                <td><?php echo  $rTMP["value"]['IDENTIFI']; ?></td>
                                <td><?php echo  $rTMP["value"]['TELEFONO']; ?></td>
                            </tr>

                            <input type="hidden" name="hid_mov_id_<?php print $intContador; ?>" id="hid_mov_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NUMTRANS']; ?>">

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
    } else if ($strTipoValidacion == "tabla_movimientos") {

        $numero_caso = isset($_POST["numero_caso"]) ? $_POST["numero_caso"]  : '';

        $arrMovimiento = array();
        $stmt = "SELECT A.NUMTRANS, A.NOMBRE, A.FPROPAGO, A.HPROPAGO, A.SUBCONCL, A.NUMEMPRE, E.PLANGEST    
        FROM GC000001 A
        INNER JOIN EM000001 E
        ON A.NUMEMPRE = E.NUMEMPRE
        WHERE FPROPAGO > '2000/01/01' AND FPROPAGO <= '$arrFechaIniDiaInt' AND FPROPAGO IS NOT NULL AND GESTORD = '$username' 
        ORDER BY 3,4";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrMovimiento[$rTMP["NUMTRANS"]]["NUMTRANS"]              = $rTMP["NUMTRANS"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["NOMBRE"]              = $rTMP["NOMBRE"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["FPROPAGO"]              = $rTMP["FPROPAGO"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["HPROPAGO"]              = $rTMP["HPROPAGO"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["SUBCONCL"]              = $rTMP["SUBCONCL"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["NUMEMPRE"]              = $rTMP["NUMEMPRE"];
            $arrMovimiento[$rTMP["NUMTRANS"]]["PLANGEST"]              = $rTMP["PLANGEST"];
        }

    ?>

        <div class="col-md-12 tableFixHeadInvestiga">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td>Posponer</td>
                        <td>Llamar</td>
                        <td>No. Transac.</td>
                        <td>Nombre</td>
                        <td>Fecha Seguimiento</td>
                        <td>Hora</td>
                        <td>Categoria</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrMovimiento) && (count($arrMovimiento) > 0)) {
                        $intContador = 1;
                        reset($arrMovimiento);
                        foreach ($arrMovimiento as $rTMP['key'] => $rTMP['value']) {
                            $date = $rTMP["value"]['FPROPAGO'];
                            $date_ = date('d-m-Y', strtotime($date));
                    ?>
                            <tr>
                                <td width="5%" style="cursor:pointer;"><i class="fad fa-2x fa-user-clock" onclick="fntSelectIdAlarmaPosponer(<?php echo  $intContador; ?>)"></i></td>
                                <td width="5%" style="cursor:pointer;"><a class="btn btn-info" id='alink_<?php echo  $intContador; ?>' onclick="fntSelectIdAlarma(<?php echo  $intContador; ?>)" href="../gestion/gestionOmniLeads.php?pl=<?php echo  $rTMP["value"]['PLANGEST']; ?>&tn=0&id=<?php echo  $rTMP["value"]['NUMTRANS']; ?>&gt=1" target="_blank" rel="noopener noreferrer"><i style="color: white;" class="fas fa-2x fa-user-headset"></i></a></td>
                                <td width="5%"><?php echo  $rTMP["value"]['NUMTRANS']; ?></td>
                                <td width="40%"><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                                <td width="10%"><?php echo  $date_; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['HPROPAGO']; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                                <td width="5%"><?php echo  $rTMP["value"]['NUMEMPRE']; ?></td>
                            </tr>

                            <input type="hidden" id="horapago_<?php echo  $intContador; ?>" id="horapago_<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['HPROPAGO']; ?>">
                            <input type="hidden" id="nombre_<?php echo  $intContador; ?>" id="nombre_<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['NOMBRE']; ?>">
                            <input type="hidden" id="id_<?php echo  $intContador; ?>" id="id_<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['NUMTRANS']; ?>">



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
    } else if ($strTipoValidacion == "tabla_cola_trabajo_") {

        $buscarFecha = isset($_POST["buscarFecha"]) ? $_POST["buscarFecha"]  : '';

        $arrTrabajo = array();
        $stmt = "SELECT MARCA,FPROPAGO, COUNT(GESTORD) CANTIDAD    
        FROM GC000001
        WHERE FPROPAGO BETWEEN '2000-01-01' AND '$buscarFecha' 
        AND GESTORD ='$USUA'
        GROUP BY FPROPAGO,MARCA";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrTrabajo[$rTMP["MARCA"]]["FPROPAGO"]              = $rTMP["FPROPAGO"];
            $arrTrabajo[$rTMP["MARCA"]]["CANTIDAD"]              = $rTMP["CANTIDAD"];
        }
        //ibase_free_result($v_query);
    ?>

        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th style="width:50%;">Fecha</th>
                        <th style="width:50%">Casos</th>

                    </tr>
                </thead>
                <tbody>
                    <form id="formDataTelefono" method="POST">

                        <?php
                        if (is_array($arrTrabajo) && (count($arrTrabajo) > 0)) {
                            $intContador = 1;
                            reset($arrTrabajo);
                            foreach ($arrTrabajo as $rTMP['key'] => $rTMP['value']) {
                        ?>
                                <tr style="cursor:pointer;">
                                    <td><?php echo  $rTMP["value"]['FPROPAGO']; ?></td>
                                    <td><?php echo  $rTMP["value"]['CANTIDAD']; ?></td>
                                </tr>

                        <?PHP
                                $intContador++;
                            }

                            die();
                        }
                        ?>
                    </form>

                </tbody>
            </table>
        </div>
    <?PHP
        die();
    } else if ($strTipoValidacion == "tabla_cola_tareas_") {

        $arrTrabajo = array();
        $stmt = "SELECT CODIGO, DESCRIP, AUTORIZA, TIEMPOAU, NIU FROM TAREAS WHERE NIU > 2 ORDER BY 2";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrTrabajo[$rTMP["NIU"]]["CODIGO"]              = $rTMP["CODIGO"];
            $arrTrabajo[$rTMP["NIU"]]["DESCRIP"]              = $rTMP["DESCRIP"];
            $arrTrabajo[$rTMP["NIU"]]["AUTORIZA"]              = $rTMP["AUTORIZA"];
            $arrTrabajo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
            $arrTrabajo[$rTMP["NIU"]]["TIEMPOAU"]              = $rTMP["TIEMPOAU"];
        }
        ibase_free_result($v_query);
        //AUTORIZA 1 = SI 2= NO
    ?>

        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th style="width:40%;">Codigo</th>
                        <th style="width:60%">Tarea / Actividad</th>

                    </tr>
                </thead>
                <tbody>
                    <form id="formDataTelefono" method="POST">

                        <?php
                        if (is_array($arrTrabajo) && (count($arrTrabajo) > 0)) {
                            $intContador = 1;
                            reset($arrTrabajo);
                            foreach ($arrTrabajo as $rTMP['key'] => $rTMP['value']) {
                                $strTiempo = isset($_POST["horaInicial"]) ? trim($_POST["horaInicial"]) : '00:00:00';
                                if ($rTMP["value"]['AUTORIZA'] == 1) {
                        ?>
                                    <tr onclick="fntValidarSupervisor(<?php echo  $intContador; ?>)" style="cursor:pointer;">
                                        <td><?php echo  $rTMP["value"]['CODIGO']; ?></td>
                                        <td><?php echo  $rTMP["value"]['DESCRIP']; ?></td>
                                    </tr>

                                <?PHP
                                } else {
                                ?>
                                    <tr onclick="fntSelectTareasEfectuadasSup(<?php echo  $intContador; ?>)" style="cursor:pointer;">
                                        <td><?php echo  $rTMP["value"]['CODIGO']; ?></td>
                                        <td><?php echo  $rTMP["value"]['DESCRIP']; ?></td>
                                    </tr>
                                <?PHP
                                }
                                ?>
                                <input type="hidden" id="hid_codigo<?php echo  $intContador; ?>" name="hid_codigo<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['CODIGO']; ?>">
                                <input type="hidden" id="hid_autoriza<?php echo  $intContador; ?>" name="hid_autoriza<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['AUTORIZA']; ?>">
                                <input type="hidden" id="hid_tiempo<?php echo  $intContador; ?>" name="hid_tiempo<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['TIEMPOAU']; ?>">
                                <input type="hidden" id="hid_niu<?php echo  $intContador; ?>" name="hid_niu<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['NIU']; ?>">
                                <input type="hidden" id="hid_descrip<?php echo  $intContador; ?>" name="hid_descrip<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['DESCRIP']; ?>">
                        <?PHP
                                $intContador++;
                            }
                        }

                        ?>
                    </form>

                </tbody>
            </table>
            <?PHP
            $arrTrabajo = array();
            $stmt = "SELECT NIU,SUPERVISOR FROM AXESO WHERE USUARIO = '$USUA' ROWS 1";
            //print_r($stmt);
            $query = ibase_prepare($stmt);
            $v_query = ibase_execute($query);
            while ($rTMP = ibase_fetch_assoc($v_query)) {
                $arrTrabajo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
                $arrTrabajo[$rTMP["NIU"]]["SUPERVISOR"]              = $rTMP["SUPERVISOR"];
            }
            ibase_free_result($v_query);

            if (is_array($arrTrabajo) && (count($arrTrabajo) > 0)) {
                $intContador = 1;
                reset($arrTrabajo);
                foreach ($arrTrabajo as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <input type="hidden" id="hid_supervisor<?php echo  $intContador; ?>" name="hid_supervisor<?php echo  $intContador; ?>" value="<?php echo  $rTMP["value"]['USUARIO']; ?>">
            <?PHP
                    $intContador++;
                }

                die();
            }
            ?>
        </div>
    <?PHP
        die();
    } else if ($strTipoValidacion == "validar_supervisor_existe") {

        header('Content-Type: application/json');
        $rs = ibase_query("SELECT NIU,SUPERVISOR FROM AXESO WHERE USUARIO = '$USUA' ROWS 1");
        if ($row = ibase_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
        $id = isset($idRow) ? $idRow  : '';
        $val = 1;
        if ($id) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            //$arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);

        print json_encode($arrInfo);

        die();
    }

    die();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$connect = conectar();

$username = $_SESSION["USUARIO"];

$arrFechaIniDia = array();
$stmt = "SELECT CAST(0 AS NUMERIC(1,0)) AS NIU, FECHA FROM IF000001";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrFechaIniDia[$rTMP["NIU"]]["FECHA"]             = $rTMP["FECHA"];
}

if (is_array($arrFechaIniDia) && (count($arrFechaIniDia) > 0)) {
    reset($arrFechaIniDia);
    foreach ($arrFechaIniDia as $rTMP['key'] => $rTMP['value']) {

        $arrFechaIniDiaInt = $rTMP["value"]['FECHA'];

    ?>
        <input type="hidden" id="fechaIniDiaInt" id="fechaIniDiaInt" value="<?php echo  $arrFechaIniDiaInt; ?>">
<?php
    }
}


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


$rt =  isset($_GET["rt"]) ? $_GET["rt"]  : '';


$numCaso = isset($_GET["id"]) ? $_GET["id"]  : '';;
$TN =  isset($_GET["tn"]) ? $_GET["tn"]  : '';;

if ($usernameNum == 1) {
    header("location: m90.php?id=$numCaso&tn=$TN");
    exit;
} else if ($usernameNum == 3) {
    header("location: tarjetas.php?id=$numCaso&tn=$TN ");
    exit;
} else if ($usernameNum == 4) {
    header("location: prinCons.php?id=$numCaso&tn=$TN ");
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