<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
  $connect = conectar();

  //VARIABLES DE GET
  $numCaso = isset($_POST["ID_POST"]) ? $_POST["ID_POST"]  : 0;
  $TELACTIVO = isset($_GET["TN"]) ? $_GET["TN"]  : '';
  $TN_POST = isset($_POST["POST_TN"]) ? $_POST["POST_TN"]  : 0;
  if ($TN_POST == 0) {
    $_TN = $TELACTIVO;
  } else {
    $_TN = $TN_POST;
  }

  $USUA = trim($username);

  $CTIPOLOG = isset($_POST["POST_CTIPOLOG"]) ? $_POST["POST_CTIPOLOG"]  : '';
  $TIPOLOGI = isset($_POST["POST_TIPOLOGI"]) ? $_POST["POST_TIPOLOGI"]  : '';
  $CPLACE = isset($_POST["POST_CPLACE"]) ? $_POST["POST_CPLACE"]  : '';
  $PLACE = isset($_POST["POST_PLACE"]) ? trim($_POST["POST_PLACE"])  : '';
  $CCONCLUS = isset($_POST["POST_CCONCLUS"]) ? $_POST["POST_CCONCLUS"]  : '';
  $CONCLUSI = isset($_POST["POST_CONCLUSI"]) ? $_POST["POST_CONCLUSI"]  : '';
  $CSUBCONC = isset($_POST["POST_CSUBCONC"]) ? $_POST["POST_CSUBCONC"]  : '';
  $SUBCONCL = isset($_POST["POST_SUBCONCL"]) ? trim($_POST["POST_SUBCONCL"])  : '';
  $CRTESTAD = isset($_POST["POST_CRTESTAD"]) ? $_POST["POST_CRTESTAD"]  : '';
  $RTESTADO = isset($_POST["POST_RTESTADO"]) ? trim($_POST["POST_RTESTADO"])  : '';
  $NUMSUBC = 0;
  $FULTGEST = isset($_POST["POST_FECHAINIDIA"]) ? $_POST["POST_FECHAINIDIA"]  : '';
  $CRDM = isset($_POST["POST_CRDM"]) ? $_POST["POST_CRDM"]  : '';
  $RDM = isset($_POST["POST_RDM"]) ? $_POST["POST_RDM"]  : '';
  $MONTOPP = isset($_POST["monto_pp"]) ? trim($_POST["monto_pp"]) : 0;

  $PONDERACION = isset($_POST["POST_PONDERACION"]) ? $_POST["POST_PONDERACION"]  : '';

  $FECHABOL = isset($_POST["fecha_pago"]) ? $_POST["fecha_pago"]  : '';
  $MONTO = isset($_POST["monto_pago"]) ? $_POST["monto_pago"]  : '';
  $BOLETA = isset($_POST["boleta"]) ? $_POST["boleta"]  : '';
  $PORDESC = isset($_POST["descuento"]) ? $_POST["descuento"]  : '';
  $TOKEN = isset($_POST["token"]) ? $_POST["token"]  : '';
  $OBSERVAC = isset($_POST["observaciones"]) ? $_POST["observaciones"]  : '';

  $CODICLIE = isset($_POST["POST_CODICLIE"]) ? trim($_POST["POST_CODICLIE"])  : '';
  $NUMEMPRE = isset($_POST["POST_NUMEMPRE"]) ? $_POST["POST_NUMEMPRE"]  : '';
  $NUMENV =  isset($_POST["POST_NUMENV"]) ? $_POST["POST_NUMENV"]  : '';
  $CODIEMPR = isset($_POST["POST_CODIEMPR"]) ? $_POST["POST_CODIEMPR"]  : '';

  $FECHADIA = isset($_POST["POST_FECHAINIDIA"]) ? $_POST["POST_FECHAINIDIA"]  : '';
  $TIME = isset($_POST["POST_HORA_FIN"]) ? $_POST["POST_HORA_FIN"]  : '';

  $HPROPAGO = isset($_POST["hora_pp"]) ? trim($_POST["hora_pp"]) : '00:00:00';
  $HPROPAGO_A = isset($_POST["hora"]) ? trim($_POST["hora"])  : '00:00:00';
  $FPROPAGO_A = isset($_POST["fecha"]) ? trim($_POST["fecha"])  : '0001-01-01';
  $FPROPAGO = isset($_POST["fecha_pp"]) ? trim($_POST["fecha_pp"])  : '0001-01-01';



  if (!empty($HPROPAGO)) {
    $HORA = $HPROPAGO;
    $FECHA = $FPROPAGO;
  } else {
    $HORA = $HPROPAGO_A;
    $FECHA = $FPROPAGO_A;
  }

  if ($HORA == '') {
    $HORA = '00:00:00';
    $FECHA = '0001-01-01';
    $MONTOPP = 0;
  }

  if ($MONTOPP == '') {
    $MONTOPP = 0;
  }



  $HORAINI = isset($_POST["TIME"]) ? $_POST["TIME"]  : '';
  $TIEMPO = 0;
  $strTiempoFinal = isset($_POST["POST_HORA_FIN"]) ? trim($_POST["POST_HORA_FIN"]) : '00:00:00';
  $strTiempo = isset($_POST["number_segundos_"]) ? trim($_POST["number_segundos_"]) : '0';


  $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

  if ($strTipoValidacion == "insert_gestion_") {
    header('Content-Type: application/json');

    $LLAMADA = 0;
    $arrNUMCALL = array();
    $stmt = "SELECT  NUMTRANS,NUMCALL FROM GC000001 WHERE NUMTRANS = $numCaso";
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrNUMCALL[$rTMP["NUMTRANS"]]["NUMCALL"]              = $rTMP["NUMCALL"];
    }
    if (is_array($arrNUMCALL) && (count($arrNUMCALL) > 0)) {
      reset($arrNUMCALL);
      foreach ($arrNUMCALL as $rTMP['key'] => $rTMP['value']) {
        $NUMCALL =  $rTMP["value"]['NUMCALL'];
      }
    }
    if ($TIPOLOGI == "LLAMADA SALIENTE") {
      $LLAMADA = $NUMCALL + 1;
    }

    $arrCANTGEST = array();
    $stmt = "SELECT NUMTRANS,CANTGEST FROM GC000001 WHERE NUMTRANS = $numCaso ";
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrCANTGEST[$rTMP["NUMTRANS"]]["CANTGEST"]              = $rTMP["CANTGEST"];
    }
    if (is_array($arrCANTGEST) && (count($arrCANTGEST) > 0)) {
      reset($arrCANTGEST);
      foreach ($arrCANTGEST as $rTMP['key'] => $rTMP['value']) {
        $CANTGEST_ =  $rTMP["value"]['CANTGEST'];
      }
    }

    $CANTGEST = $CANTGEST_ + 1;

    if ($numCaso) {
      $var_consulta = "UPDATE GC000001 SET CTIPOLOG = '$CTIPOLOG',TIPOLOGI = '$TIPOLOGI',CPLACE = '$CPLACE',PLACE = '$PLACE',CCONCLUS = '$CCONCLUS',CONCLUSI = '$CONCLUSI',CSUBCONC = '$CSUBCONC',SUBCONCL = '$SUBCONCL',CRTESTAD = '$CRTESTAD',RTESTADO = '$RTESTADO',NUMSUBC = '$NUMSUBC',FPROPAGO = '$FECHA',HPROPAGO = '$HORA',NUMCALL = $LLAMADA,FULTGEST = '$FULTGEST',CANTGEST = $CANTGEST ,CRDM = '$CRDM',RDM = '$RDM' WHERE NUMTRANS = $numCaso";
      $query = ibase_prepare($var_consulta);
      $val = 1;
      if ($v_query = ibase_execute($query)) {
        $arrInfo['status'] = $val;
      } else {
        $arrInfo['status'] = 0;
        $arrInfo['error'] = $var_consulta;
      }
      // print_r($var_consulta);
      // print json_encode($arrInfo);
    }


    if ($numCaso) {
      $var_consulta = "INSERT INTO GM000001 (NIU, NUMTRANS, FGESTION, CTIPOLOG, TIPOLOGI, CPLACE, PLACE, CCONCLUS, CONCLUSI, CSUBCONC, SUBCONCL, CRTESTAD, RTESTADO, TELACTIV, OBSERVAC, OWNER, NUMENV, CODICLIE, NUMEMPRE, CODIEMPR, HORAINI, TIEMPO, PONDERACION, FECHAPP1, HORAPP, MONTOPP) VALUES (0, $numCaso, '$FECHADIA', '$CTIPOLOG', '$TIPOLOGI', '$CPLACE', '$PLACE', '$CCONCLUS', '$CONCLUSI', '$CSUBCONC', '$SUBCONCL', '$CRTESTAD', '$RTESTADO', '$_TN', '$OBSERVAC', '$USUA', $NUMENV, '$CODICLIE', $NUMEMPRE, '$CODIEMPR', '$HORAINI', $strTiempo, $PONDERACION, '$FECHA','$HORA', $MONTOPP)";
      $query = ibase_prepare($var_consulta);
      $val = 2;
      if ($v_query = ibase_execute($query)) {
        $arrInfo['status'] = $val;
      } else {
        $arrInfo['status'] = 0;
        $arrInfo['error'] = $var_consulta;
      }
      //print_r($var_consulta);

      print json_encode($arrInfo);
    }

    if ($MONTO) {
      $var_consulta = "INSERT INTO PAGXCONF (NIU, CODICLIE, NUMTRANS, FECHABOL, FECHAING, MONTO, BOLETA, OBSERVAC, PORDESC, TOKEN) VALUES (0, '$CODICLIE', '$numCaso', '$FECHABOL', '$FECHADIA', $MONTO, '$BOLETA', '$OBSERVAC', $PORDESC, $TOKEN )";
      $query = ibase_prepare($var_consulta);
      $val = 3;
      if ($v_query = ibase_execute($query)) {
        $arrInfo['status'] = $val;
      } else {
        $arrInfo['status'] = 0;
        $arrInfo['error'] = $var_consulta;
      }
      //print_r($var_consulta);

      // print json_encode($arrInfo);
    }


    die();
  } else if ($strTipoValidacion == "insert_ini_window_trabajo") {

    $rs = ibase_query("SELECT NIU FROM ACTIVIDAD WHERE USUARIO = '$USUA' ORDER BY NIU DESC ROWS 1");
    if ($row = ibase_fetch_row($rs)) {
      $idRow = trim($row[0]);
    }
    $id = isset($idRow) ? $idRow  : 0;

    $strTiempoFinal = isset($_POST["POST_HORA_FIN"]) ? trim($_POST["POST_HORA_FIN"]) : '00:00:00';
    $strTiempo = 0;
    $strObservac = '';
    $strIdeBase = $id;

    $tiempo = isset($_POST["tiempo"]) ? trim($_POST["tiempo"]) : 0;

    $strProdNiu = 0;
    $strNiuTareas = 1;
    $strFechaDia = $arrFechaIniDiaInt;
    $strTiempoInicial = $strTiempoFinal;
    $strUsuario = $USUA;
    $strTiempoFuera = 0;

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
  } else if ($strTipoValidacion == "insert_end_window") {

    $rs = ibase_query("SELECT NIU FROM ACTIVIDAD WHERE USUARIO = '$USUA' ORDER BY NIU DESC ROWS 1");
    if ($row = ibase_fetch_row($rs)) {
      $idRow = trim($row[0]);
    }
    $id = isset($idRow) ? $idRow  : 0;

    $strTiempoFinal = isset($_POST["POST_HORA_FIN"]) ? trim($_POST["POST_HORA_FIN"]) : '00:00:00';
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
    // print_r($niu);
    print json_encode($arrInfo);
    die();
  }else if ($strTipoValidacion == "insert_ini_window") {

    $tiempo = isset($_POST["tiempo"]) ? trim($_POST["tiempo"]) : '';

    $strProdNiu = 0;
    $strNiuTareas = 2;
    $strFechaDia = $arrFechaIniDiaInt;
    $strTiempoInicial = isset($_POST["TIME"]) ? trim($_POST["TIME"]) : '00:00:00';
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
  } else if ($strTipoValidacion == "update_telefono") {

    $NIU = isset($_POST["niu_tel"]) ? $_POST["niu_tel"]  : 0;
    $VNUMERO = isset($_POST["numero_tel"]) ? $_POST["numero_tel"]  : 0;
    $VORIGEN = isset($_POST["owner_tel"]) ? $_POST["owner_tel"]  : '';
    $VPROPIETARIO = isset($_POST["propietario_tel"]) ? $_POST["propietario_tel"]  : '';
    $VOBSERVAC = isset($_POST["observaciones_tel"]) ? $_POST["observaciones_tel"]  : '';

    header('Content-Type: application/json');

    $var_consulta = "UPDATE TELEFONOS SET ORIGEN = '$VORIGEN', PROPIETARIO = '$VPROPIETARIO', OBSERVAC = '$VOBSERVAC' WHERE NIU = $NIU";
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
  } else if ($strTipoValidacion == "insert_telefono") {

    $CODICLIE = isset($_POST["codiclie_tel"]) ? $_POST["codiclie_tel"]  : 0;
    $VNUMERO = isset($_POST["numero"]) ? $_POST["numero"]  : 0;
    $VPROVSERV = isset($_POST["proServ"]) ? $_POST["proServ"]  : '';
    $VORIGEN = isset($_POST["owner"]) ? $_POST["owner"]  : '';
    $VPROPIETARIO = isset($_POST["propietario"]) ? $_POST["propietario"]  : '';
    $VOBSERVAC = isset($_POST["observaciones"]) ? $_POST["observaciones"]  : '';

    if ($VPROVSERV == '') {
      $VPROVSERV = 0;
    }

    header('Content-Type: application/json');

    $var_consulta = "INSERT INTO TELEFONOS (NIU, CODICLIE, NUMERO, PROVSERV, ORIGEN, PROPIETARIO, OBSERVAC) VALUES (0, '$CODICLIE', '$VNUMERO', $VPROVSERV, '$VORIGEN', '$VPROPIETARIO', '$VOBSERVAC')";
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
  } else if ($strTipoValidacion == "insert_direccion") {

    $CODICLIE = isset($_POST["codiclie_dir"]) ? $_POST["codiclie_dir"]  : '';
    $VDIRECCION = isset($_POST["direccion"]) ? $_POST["direccion"]  : '';
    $VORIGEN = isset($_POST["owner_dir"]) ? $_POST["owner_dir"]  : '';
    $VPROPIETARIO = isset($_POST["propietario_dir"]) ? $_POST["propietario_dir"]  : '';

    header('Content-Type: application/json');

    $var_consulta = "INSERT INTO DIRECCIONES (NIU, CODICLIE, DIRECCION, ORIGEN, PROPIETARIO) VALUES (0, '$CODICLIE', '$VDIRECCION', '$VORIGEN', '$VPROPIETARIO')";
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
  } else if ($strTipoValidacion == "insert_correo") {

    $CODICLIE = isset($_POST["codiclie_mail"]) ? $_POST["codiclie_mail"]  : '';
    $VDIRECCION = isset($_POST["correo"]) ? $_POST["correo"]  : '';

    header('Content-Type: application/json');

    $var_consulta = "INSERT INTO EMAILS (NIU, CODICLIE, EMAIL) VALUES (0, '$CODICLIE', '$VDIRECCION')";
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
  } else if ($strTipoValidacion == "validacion_insert_telefono") {

    $CODICLIE = isset($_GET["codiclie_tel"]) ? $_GET["codiclie_tel"]  : '';
    $VNUMERO = isset($_GET["numero"]) ? $_GET["numero"]  : '';

    if ($VNUMERO) {
      header('Content-Type: application/json');
      $rsTel = ibase_query("SELECT COUNT(*) FROM TELEFONOS WHERE CODICLIE = '$CODICLIE' AND NUMERO = '$VNUMERO'");
      if ($row = ibase_fetch_row($rsTel)) {
        $idRowTel = trim($row[0]);
      }
      //print_r($idRowTel);
      $countTel = isset($idRowTel) ? $idRowTel : 0;
      $val = 1;
      if ($countTel >= 1) {
        $arrInfo['status'] = $val;
      } else {
        $arrInfo['status'] = 0;
        $arrInfo['error'] = $rsTel;
      }
      print json_encode($arrInfo);
    }
    die();
  } else if ($strTipoValidacion == "update_direccion_investiga") {

    $ACTIVO = isset($_POST["a_direcciones"]) ? $_POST["a_direcciones"]  : '';
    $NIU = isset($_POST["a_niu"]) ? $_POST["a_niu"]  : '';

    header('Content-Type: application/json');

    if ($ACTIVO == 1) {
      $var_consulta = "UPDATE DIRECCIONES SET ACTIVO = 0 WHERE NIU = $NIU";
    }
    if ($ACTIVO == 0) {
      $var_consulta = "UPDATE DIRECCIONES SET ACTIVO = 1 WHERE NIU = $NIU";
    }
    //print_r($var_consulta);
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
  } else if ($strTipoValidacion == "update_telefono_boton") {

    $ACTIVO = isset($_POST["a_telefono"]) ? $_POST["a_telefono"]  : '';
    $NIU = isset($_POST["a_niu_telefono"]) ? $_POST["a_niu_telefono"]  : '';

    header('Content-Type: application/json');

    if ($ACTIVO == 1) {
      $var_consulta = "UPDATE TELEFONOS SET ACTIVO = 0 WHERE NIU = $NIU";
    }
    if ($ACTIVO == 0) {
      $var_consulta = "UPDATE TELEFONOS SET ACTIVO = 1 WHERE NIU = $NIU";
    }
    //print_r($var_consulta);
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
  } else if ($strTipoValidacion == "update_direccion_mas_informacion") {

    $ACTIVO = isset($_POST["a_direccion_m_info"]) ? $_POST["a_direccion_m_info"]  : '';
    $NIU = isset($_POST["id_direccion_m_info"]) ? $_POST["id_direccion_m_info"]  : '';

    header('Content-Type: application/json');

    if ($ACTIVO == 1) {
      $var_consulta = "UPDATE DIRECCIONES SET ACTIVO = 0 WHERE NIU = $NIU";
    }
    if ($ACTIVO == 0) {
      $var_consulta = "UPDATE DIRECCIONES SET ACTIVO = 1 WHERE NIU = $NIU";
    }
    //print_r($var_consulta);
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
  } else if ($strTipoValidacion == "update_expediente") {

    $ACTIVO = isset($_POST["a_Expediente"]) ? $_POST["a_Expediente"]  : '';
    $NUMCASO = isset($_POST["num_Expediente"]) ? $_POST["num_Expediente"]  : '';

    header('Content-Type: application/json');

    if ($ACTIVO == 1) {
      $var_consulta = "UPDATE GC000001 SET EXPEDIEN = 0 WHERE NUMTRANS = $NUMCASO";
    }
    if ($ACTIVO == 0) {
      $var_consulta = "UPDATE GC000001 SET EXPEDIEN = 1 WHERE NUMTRANS = $NUMCASO";
    }
    //print_r($var_consulta);
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
  } else if ($strTipoValidacion == "update_correo_informacion") {

    $ACTIVO = isset($_POST["a_correos_m_info"]) ? $_POST["a_correos_m_info"]  : '';
    $NIU = isset($_POST["id_correos_m_info"]) ? $_POST["id_correos_m_info"]  : '';

    header('Content-Type: application/json');

    if ($ACTIVO == 1) {
      $var_consulta = "UPDATE EMAILS SET ACTIVO = 0 WHERE NIU = $NIU";
    }
    if ($ACTIVO == 0) {
      $var_consulta = "UPDATE EMAILS SET ACTIVO = 1 WHERE NIU = $NIU";
    }
    //print_r($var_consulta);
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
  }

  //////////////////////////////////////////////////////////////////////////////DIBUJO/////////////////////////////////////////////////////////////////////////////////////////////////
  else if ($strTipoValidacion == "tabla_movimiento_gestion") {

    $numCaso = isset($_POST["numCasoPdf"]) ? $_POST["numCasoPdf"]  : '';

    $arrMovGestion = array();
    $stmt = "SELECT FGESTION, HORA, TIPOLOGI, CONCLUSI, RTESTADO, SUBCONCL, OBSERVAC, OWNER, NIU, NUMTRANS FROM GM000001 WHERE NUMTRANS = $numCaso ORDER BY NIU";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrMovGestion[$rTMP["NIU"]]["NIU"]                      = $rTMP["NIU"];
      $arrMovGestion[$rTMP["NIU"]]["FGESTION"]              = $rTMP["FGESTION"];
      $arrMovGestion[$rTMP["NIU"]]["HORA"]              = $rTMP["HORA"];
      $arrMovGestion[$rTMP["NIU"]]["TIPOLOGI"]              = $rTMP["TIPOLOGI"];
      $arrMovGestion[$rTMP["NIU"]]["CONCLUSI"]              = $rTMP["CONCLUSI"];
      $arrMovGestion[$rTMP["NIU"]]["RTESTADO"]              = $rTMP["RTESTADO"];
      $arrMovGestion[$rTMP["NIU"]]["SUBCONCL"]              = $rTMP["SUBCONCL"];
      $arrMovGestion[$rTMP["NIU"]]["OBSERVAC"]              = $rTMP["OBSERVAC"];
      $arrMovGestion[$rTMP["NIU"]]["OWNER"]              = $rTMP["OWNER"];
      $arrMovGestion[$rTMP["NIU"]]["NUMTRANS"]              = $rTMP["NUMTRANS"];
    }
    //ibase_free_result($v_query);
?>

    <div class="col-md-12 tableFixHead">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <th style="width:10%">Fecha</th>
            <th style="width:5%">Hora</th>
            <th style="width:15%">Origen</th>
            <th style="width:15%">Receptor</th>
            <th style="width:20%">Tipologia</th>
            <th style="width:15%">Categoria</th>
            <th style="width:5%">Obser.</th>
            <th style="width:10%">Owner</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrMovGestion) && (count($arrMovGestion) > 0)) {
            $intContador = 1;
            reset($arrMovGestion);
            foreach ($arrMovGestion as $rTMP['key'] => $rTMP['value']) {
              $date = $rTMP["value"]['FGESTION'];
              $date_ = date('d-m-Y', strtotime($date));
          ?>
              <tr>
                <td><?php echo  $date_; ?></td>
                <td><?php echo  $rTMP["value"]['HORA']; ?></td>
                <td><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                <td><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                <td><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                <td style="cursor:pointer;" data-toggle="modal" data-target="#mov_gestion_obser_<?php echo  $rTMP["value"]['NIU']; ?>"><i class="fad fa-eye"></i></td>
                <td><?php echo  $rTMP["value"]['OWNER']; ?></td>
              </tr>
              <input type="hidden" name="hid_codigo_des<?php print $intContador; ?>" id="hid_codigo_des<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['OBSERVAC']; ?>">

              <div class="modal fade" id="mov_gestion_obser_<?php echo  $rTMP["value"]['NIU']; ?>" tabindex="-1" role="dialog" aria-labelledby="mov_gestion_obser_<?php echo  $rTMP["value"]['NIU']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">OBSERVACIONES</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-4"></div>
                      <div class="col-sm-12">
                        <textarea class="form-control" name="observaciones_contenido_<?php echo  $rTMP["value"]['NIU']; ?>" id="observaciones_contenido_<?php echo  $rTMP["value"]['NIU']; ?>" rows="5" disabled><?php echo  $rTMP["value"]['OBSERVAC']; ?></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>

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
  } else if ($strTipoValidacion == "tabla_telefonos") {

    $codiclie = isset($_POST["codiclie"]) ? $_POST["codiclie"]  : '';

    $arrTelefonos = array();
    $stmt = "SELECT T.ACTIVO, T.NUMERO, T.PROPIETARIO, C.NOMBRE, T.ORIGEN, T.OBSERVAC, E.CODCOL, E.CODCOLWEB, T.NIU
            FROM TELEFONOS T 
            LEFT JOIN COMPATEL C 
            ON T.PROVSERV = C.CODIGO 
            LEFT JOIN EMPRETEL E
            ON T.PROVSERV = E.CODIGO 
            WHERE T.CODICLIE = '$codiclie'
            GROUP BY 1,2,3,4,5,6,7,8,9";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTelefonos[$rTMP["NIU"]]["NIU"]                      = $rTMP["NIU"];
      $arrTelefonos[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
      $arrTelefonos[$rTMP["NIU"]]["NUMERO"]              = $rTMP["NUMERO"];
      $arrTelefonos[$rTMP["NIU"]]["PROPIETARIO"]              = $rTMP["PROPIETARIO"];
      $arrTelefonos[$rTMP["NIU"]]["NOMBRE"]              = $rTMP["NOMBRE"];
      $arrTelefonos[$rTMP["NIU"]]["ORIGEN"]              = $rTMP["ORIGEN"];
      $arrTelefonos[$rTMP["NIU"]]["OBSERVAC"]              = $rTMP["OBSERVAC"];
      $arrTelefonos[$rTMP["NIU"]]["CODCOL"]              = $rTMP["CODCOL"];
      $arrTelefonos[$rTMP["NIU"]]["CODCOLWEB"]              = $rTMP["CODCOLWEB"];
    }
    //ibase_free_result($v_query);
  ?>

    <div class="col-md-12 tableFixHead">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <th style="width:5%;">Call</th>
            <th style="width:3%">&nbsp;&nbsp;A</th>
            <th style="width:5%">Telefono</th>
            <th style="width:30%">Titular-Casa-Propietario</th>
            <th style="width:5%">ET</th>
            <th style="width:5%">TT</th>
            <th style="width:47%">Observaciones</th>
            <th style="width:52%">.</th>
          </tr>
        </thead>
        <tbody>
          <form id="formDataTelefono" method="POST">

            <?php
            if (is_array($arrTelefonos) && (count($arrTelefonos) > 0)) {
              $intContador = 1;
              reset($arrTelefonos);
              foreach ($arrTelefonos as $rTMP['key'] => $rTMP['value']) {
            ?>
                <tr style="cursor:pointer;">
                  <td><a style="text-aline:center;" href="<?php echo  $rTMP["value"]['NUMERO']; ?>" target="_blank"><i class="fad fa-2x fa-phone-square"></i></a></td>
                  <td>
                    <?PHP
                    if ($rTMP["value"]['ACTIVO'] == 1) {
                    ?>
                      <input class="form-control form-control-sm " name="activo_chek_telefono_boton_" id="activo_chek_telefono_boton_" onclick="fntSelectCheked_a_telefonos('<?php print $intContador; ?>')" type="checkbox" checked>
                    <?PHP
                    } else {
                    ?>
                      <input class="form-control form-control-sm " name="activo_chek_telefono_boton_" id="activo_chek_telefono_boton_" onclick="fntSelectCheked_a_telefonos('<?php print $intContador; ?>')" type="checkbox">
                    <?PHP
                    }
                    ?>
                  </td>
                  <td><?php echo  $rTMP["value"]['NUMERO']; ?></td>
                  <td><?php echo  $rTMP["value"]['PROPIETARIO']; ?></td>
                  <td style="background:#<?php echo  $rTMP["value"]['CODCOLWEB']; ?>;"></td>
                  <td><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                  <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
                  <td style="cursor:pointer;" onclick="fntSelectEditTelefono('<?php print $intContador; ?>')"><i class="fal fa-2x fa-file-edit"></i></td>
                </tr>
                <input type="hidden" name="hid_tel_niu_<?php print $intContador; ?>" id="hid_tel_niu_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NIU']; ?>">
                <input type="hidden" name="hid_a_telefono_<?php print $intContador; ?>" id="hid_a_telefono_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ACTIVO']; ?>">
                <input type="hidden" name="hid_tel_numero_<?php print $intContador; ?>" id="hid_tel_numero_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NUMERO']; ?>">
                <input type="hidden" name="hid_tel_propietario_<?php print $intContador; ?>" id="hid_tel_propietario_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['PROPIETARIO']; ?>">
                <input type="hidden" name="hid_tel_origen_<?php print $intContador; ?>" id="hid_tel_origen_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ORIGEN']; ?>">
                <input type="hidden" name="hid_tel_obserbac_<?php print $intContador; ?>" id="hid_tel_obserbac_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['OBSERVAC']; ?>">

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
  } else if ($strTipoValidacion == "tabla_cuentas") {

    $IDENTIFI = isset($_POST["IDENTIFI"]) ? $_POST["IDENTIFI"]  : '';

    $arrCuentas = array();
    $stmt = "SELECT G.MARCA, E.EMPRESA, G.CODICLIE, G.NUMTRANS
            FROM GC000001 G 
            JOIN EM000001 E
            ON G.NUMEMPRE = E.NUMEMPRE
            WHERE G.IDENTIFI = '$IDENTIFI' 
            AND G.IDENTIFI <> ''
            ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrCuentas[$rTMP["NUMTRANS"]]["NUMTRANS"]                      = $rTMP["NUMTRANS"];
      $arrCuentas[$rTMP["NUMTRANS"]]["MARCA"]              = $rTMP["MARCA"];
      $arrCuentas[$rTMP["NUMTRANS"]]["EMPRESA"]              = $rTMP["EMPRESA"];
      $arrCuentas[$rTMP["NUMTRANS"]]["CODICLIE"]              = $rTMP["CODICLIE"];
    }
    //ibase_free_result($v_query);
  ?>

    <div class="col-md-12 tableFixHead">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <th>Cuentas</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrCuentas) && (count($arrCuentas) > 0)) {
            $intContador = 1;
            reset($arrCuentas);
            foreach ($arrCuentas as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr style="cursor:pointer;">
                <td><?php echo  $rTMP["value"]['EMPRESA']; ?></td>
              </tr>
              <input type="hidden" name="hid_marca<?php print $intContador; ?>" id="hid_marca<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['MARCA']; ?>">

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
  } else if ($strTipoValidacion == "var_tiempos_empresa") {

    $numempre = isset($_POST["numempre"]) ? $_POST["numempre"]  : '';

    $arrTiempoEmpresa = array();
    $stmt = "SELECT EMPRESA, TMAC, NUMEMPRE, NTXE FROM EM000001 WHERE NUMEMPRE = $numempre";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTiempoEmpresa[$rTMP["NUMEMPRE"]]["EMPRESA"]              = $rTMP["EMPRESA"];
      $arrTiempoEmpresa[$rTMP["NUMEMPRE"]]["TMAC"]              = $rTMP["TMAC"];
      $arrTiempoEmpresa[$rTMP["NUMEMPRE"]]["NTXE"]              = $rTMP["NTXE"];
    }

    if (is_array($arrTiempoEmpresa) && (count($arrTiempoEmpresa) > 0)) {
      reset($arrTiempoEmpresa);
      foreach ($arrTiempoEmpresa as $rTMP['key'] => $rTMP['value']) {

        $nombreEmpresa =  $rTMP["value"]['EMPRESA'];
        $tiempoBarra =  $rTMP["value"]['TMAC'];
        //echo $tiempoBarra;
    ?>
        <input name="tiempo_de_barra" id="tiempo_de_barra" type="hidden" value="<?php echo $tiempoBarra ?>">
        <input name="hid_ntxe" id="hid_ntxe" type="hidden" value="<?php echo  $rTMP["value"]['NTXE']; ?>">
    <?php

      }
    }
    die();
  } else if ($strTipoValidacion == "tabla_tipologia_origen") {

    $buscarOrigen = isset($_POST["buscarOrigen"]) ? $_POST["buscarOrigen"]  : '';

    $strFilter = "";
    if (!empty($buscarOrigen)) {
      $strFilter = " WHERE ( UPPER(TIPOLOGI) LIKE UPPER('%{$buscarOrigen}%') ) ";
    }

    $arrTipologiaOrigen = array();
    $stmt = "SELECT TIPOLOGI, CTIPOLOG, NUMTIPO FROM TI000001 $strFilter ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTipologiaOrigen[$rTMP["NUMTIPO"]]["NUMTIPO"]              = $rTMP["NUMTIPO"];
      $arrTipologiaOrigen[$rTMP["NUMTIPO"]]["CTIPOLOG"]              = $rTMP["CTIPOLOG"];
      $arrTipologiaOrigen[$rTMP["NUMTIPO"]]["TIPOLOGI"]              = $rTMP["TIPOLOGI"];
    }
    ?>
    <select onchange="fntSelectOrigen()" class="form-control-sm col-sm-12" name="origen" id="origen">
      <option value="0">Origen</option>
      <?php

      if (is_array($arrTipologiaOrigen) && (count($arrTipologiaOrigen) > 0)) {
        $intContador = 1;
        reset($arrTipologiaOrigen);
        foreach ($arrTipologiaOrigen as $rTMP['key'] => $rTMP['value']) {
      ?>

          <option value="<?php echo  $intContador; ?>"><?php echo  $rTMP["value"]['TIPOLOGI']; ?></option>

      <?PHP
          $intContador++;
        }
      }
      ?>
    </select>
    <?PHP
    if (is_array($arrTipologiaOrigen) && (count($arrTipologiaOrigen) > 0)) {
      $intContador = 1;
      reset($arrTipologiaOrigen);
      foreach ($arrTipologiaOrigen as $rTMP['key'] => $rTMP['value']) {
    ?>
        <input type="hidden" name="hid_origen_<?php print $intContador; ?>" id="hid_origen_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['TIPOLOGI']; ?>">
        <input type="hidden" name="hid_origen_id_<?php print $intContador; ?>" id="hid_origen_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CTIPOLOG']; ?>">
    <?php
        $intContador++;
      }
      die();
    }
    ?>
  <?php
    die();
  } else if ($strTipoValidacion == "tabla_tipologia_place") {

    $buscarPlace = isset($_POST["buscarPlace"]) ? $_POST["buscarPlace"]  : '';

    $strFilter = "";
    if (!empty($buscarPlace)) {
      $strFilter = " WHERE ( UPPER(PLACE) LIKE UPPER('%{$buscarPlace}%') ) ";
    }

    $arrTipologiaPlace = array();
    $stmt = "SELECT PLACE, CPLACE, NUMPLACE FROM PL000001  $strFilter ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTipologiaPlace[$rTMP["NUMPLACE"]]["NUMPLACE"]              = $rTMP["NUMPLACE"];
      $arrTipologiaPlace[$rTMP["NUMPLACE"]]["PLACE"]              = $rTMP["PLACE"];
      $arrTipologiaPlace[$rTMP["NUMPLACE"]]["CPLACE"]              = $rTMP["CPLACE"];
    }
  ?>
    <select onchange="fntSelectPlace()" class="form-control-sm col-sm-12" name="place" id="place">
      <option value="0">Place</option>
      <?php

      if (is_array($arrTipologiaPlace) && (count($arrTipologiaPlace) > 0)) {
        $intContador = 1;
        reset($arrTipologiaPlace);
        foreach ($arrTipologiaPlace as $rTMP['key'] => $rTMP['value']) {
      ?>
          <option value="<?php echo  $intContador; ?>"><?php echo  $rTMP["value"]['PLACE']; ?></option>

      <?PHP
          $intContador++;
        }
      }
      ?>
    </select>
    <?PHP
    if (is_array($arrTipologiaPlace) && (count($arrTipologiaPlace) > 0)) {
      $intContador = 1;
      reset($arrTipologiaPlace);
      foreach ($arrTipologiaPlace as $rTMP['key'] => $rTMP['value']) {
    ?>

        <input type="hidden" name="hid_place_<?php print $intContador; ?>" id="hid_place_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['PLACE']; ?>">
        <input type="hidden" name="hid_place_id_<?php print $intContador; ?>" id="hid_place_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CPLACE']; ?>">

    <?PHP
        $intContador++;
      }
      die();
    }

    die();
  } else if ($strTipoValidacion == "tabla_tipologia_receptor") {

    $buscarReceptor = isset($_POST["buscarReceptor"]) ? $_POST["buscarReceptor"]  : '';

    $strFilter = "";
    if (!empty($buscarReceptor)) {
      $strFilter = " WHERE ( UPPER(CONCLUSI) LIKE UPPER('%{$buscarReceptor}%') ) ";
    }

    $arrTipologiaReceptor = array();
    $stmt = "SELECT CONCLUSI, CCONCLUS, NUMCONC FROM CO000001  $strFilter ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTipologiaReceptor[$rTMP["NUMCONC"]]["NUMCONC"]              = $rTMP["NUMCONC"];
      $arrTipologiaReceptor[$rTMP["NUMCONC"]]["CONCLUSI"]              = $rTMP["CONCLUSI"];
      $arrTipologiaReceptor[$rTMP["NUMCONC"]]["CCONCLUS"]              = $rTMP["CCONCLUS"];
    }

    ?>
    <select onchange="fntSelectReceptor()" class="form-control-sm col-sm-12" name="receptor" id="receptor">
      <option value="0">Receptor</option>
      <?php
      if (is_array($arrTipologiaReceptor) && (count($arrTipologiaReceptor) > 0)) {
        $intContador = 1;
        reset($arrTipologiaReceptor);
        foreach ($arrTipologiaReceptor as $rTMP['key'] => $rTMP['value']) {
      ?>

          <option value="<?php echo  $intContador; ?>"><?php echo  $rTMP["value"]['CONCLUSI']; ?></option>

      <?PHP
          $intContador++;
        }
      }
      ?>
    </select>
    <?PHP
    if (is_array($arrTipologiaReceptor) && (count($arrTipologiaReceptor) > 0)) {
      $intContador = 1;
      reset($arrTipologiaReceptor);
      foreach ($arrTipologiaReceptor as $rTMP['key'] => $rTMP['value']) {
    ?>

        <input type="hidden" name="hid_receptor_<?php print $intContador; ?>" id="hid_receptor_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CONCLUSI']; ?>">
        <input type="hidden" name="hid_receptor_id_<?php print $intContador; ?>" id="hid_receptor_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CCONCLUS']; ?>">

    <?PHP
        $intContador++;
      }
      die();
    }

    die();
  } else if ($strTipoValidacion == "tabla_tipologia_") {

    $buscarTipologia = isset($_POST["buscarTipologia"]) ? $_POST["buscarTipologia"]  : '';
    $ntxe = isset($_POST["ntxe"]) ? $_POST["ntxe"]  : '';

    $strFilter = "";
    if (!empty($buscarTipologia)) {
      $strFilter = " AND ( UPPER(RTESTADO) LIKE UPPER('%{$buscarTipologia}%') ) ";
    }

    $arrTipologia = array();
    $stmt = "SELECT RTESTADO, CRTESTAD, SUBCONCL, CSUBCONC, PONDERACION, NUMRTE FROM RT000002 WHERE NTXE = $ntxe  $strFilter ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTipologia[$rTMP["NUMRTE"]]["NUMRTE"]              = $rTMP["NUMRTE"];
      $arrTipologia[$rTMP["NUMRTE"]]["RTESTADO"]              = $rTMP["RTESTADO"];
      $arrTipologia[$rTMP["NUMRTE"]]["CRTESTAD"]              = $rTMP["CRTESTAD"];
      $arrTipologia[$rTMP["NUMRTE"]]["SUBCONCL"]              = $rTMP["SUBCONCL"];
      $arrTipologia[$rTMP["NUMRTE"]]["CSUBCONC"]              = $rTMP["CSUBCONC"];
      $arrTipologia[$rTMP["NUMRTE"]]["PONDERACION"]              = $rTMP["PONDERACION"];
    }

    ?>
    <select onchange="fntSelectTipologia()" class="form-control-sm col-sm-12" name="tipologia" id="tipologia">
      <option value="0">Tipologia</option>
      <?php
      if (is_array($arrTipologia) && (count($arrTipologia) > 0)) {
        $intContador = 1;
        reset($arrTipologia);
        foreach ($arrTipologia as $rTMP['key'] => $rTMP['value']) {
      ?>

          <option value="<?php echo  $intContador; ?>"><?php echo  $rTMP["value"]['RTESTADO']; ?></option>

      <?PHP
          $intContador++;
        }
      }
      ?>
    </select>
    <?PHP
    if (is_array($arrTipologia) && (count($arrTipologia) > 0)) {
      $intContador = 1;
      reset($arrTipologia);
      foreach ($arrTipologia as $rTMP['key'] => $rTMP['value']) {
    ?>

        <input type="hidden" name="hid_tipologia_<?php print $intContador; ?>" id="hid_tipologia_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['RTESTADO']; ?>">
        <input type="hidden" name="hid_tipologia_crtestad_<?php print $intContador; ?>" id="hid_tipologia_crtestad_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CRTESTAD']; ?>">
        <input type="hidden" name="hid_tipologia_subconcl_<?php print $intContador; ?>" id="hid_tipologia_subconcl_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['SUBCONCL']; ?>">
        <input type="hidden" name="hid_tipologia_csubconc_<?php print $intContador; ?>" id="hid_tipologia_csubconc_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CSUBCONC']; ?>">
        <input type="hidden" name="hid_tipologia_ponderacion_<?php print $intContador; ?>" id="hid_tipologia_ponderacion_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['PONDERACION']; ?>">

    <?PHP
        $intContador++;
      }
      die();
    }

    die();
  } else if ($strTipoValidacion == "tabla_tipologia_rdm_") {

    $buscarRdm = isset($_POST["buscarRdm"]) ? $_POST["buscarRdm"]  : '';
    $ntxe = isset($_POST["ntxe"]) ? $_POST["ntxe"]  : '';

    $strFilter = "";
    if (!empty($buscarRdm)) {
      $strFilter = " WHERE ( UPPER(RDM) LIKE UPPER('%{$buscarRdm}%') ) ";
    }

    $arrRdm = array();
    $stmt = "SELECT RDM, CRDM, NUMRDM FROM RDMS  $strFilter ORDER BY 1";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrRdm[$rTMP["NUMRDM"]]["NUMRDM"]              = $rTMP["NUMRDM"];
      $arrRdm[$rTMP["NUMRDM"]]["RDM"]              = $rTMP["RDM"];
      $arrRdm[$rTMP["NUMRDM"]]["CRDM"]              = $rTMP["CRDM"];
    }

    ?>
    <select onchange="fntSelectRdm()" class="form-control-sm col-sm-12" name="rdm" id="rdm">
      <option value="0">RDM</option>
      <?php
      if (is_array($arrRdm) && (count($arrRdm) > 0)) {
        $intContador = 1;
        reset($arrRdm);
        foreach ($arrRdm as $rTMP['key'] => $rTMP['value']) {
      ?>

          <option value="<?php echo  $intContador; ?>"><?php echo  $rTMP["value"]['RDM']; ?></option>

      <?PHP
          $intContador++;
        }
      }
      ?>
    </select>
    <?PHP
    if (is_array($arrRdm) && (count($arrRdm) > 0)) {
      $intContador = 1;
      reset($arrRdm);
      foreach ($arrRdm as $rTMP['key'] => $rTMP['value']) {
    ?>
        <input type="hidden" name="hid_rmd_<?php print $intContador; ?>" id="hid_rmd_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['RDM']; ?>">
        <input type="hidden" name="hid_rdm_id_<?php print $intContador; ?>" id="hid_rdm_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CRDM']; ?>">

        <?PHP
        $intContador++;
      }
      die();
    }

    die();
  } else if ($strTipoValidacion == "var_codigo_servicio") {

    $numeroDig = isset($_POST["numeroDig"]) ? $_POST["numeroDig"]  : '';

    if ($numeroDig) {
      $arrProServ = array();
      $stmt = "SELECT R.CODIGO, E.CODCOL 
              FROM COMPATEL R
              LEFT JOIN EMPRETEL E
              ON R.CODIGO = E.CODIGO
              WHERE RANGO = $numeroDig";
      //print_r($stmt);
      $query = ibase_prepare($stmt);
      $v_query = ibase_execute($query);
      while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrProServ[$rTMP["CODIGO"]]["CODIGO"]              = $rTMP["CODIGO"];
        $arrProServ[$rTMP["CODIGO"]]["CODCOL"]              = $rTMP["CODCOL"];
      }

      if (is_array($arrProServ) && (count($arrProServ) > 0)) {
        reset($arrProServ);
        foreach ($arrProServ as $rTMP['key'] => $rTMP['value']) {

        ?>
          <input name="proServ" id="proServ" type="hidden" value="<?php echo  $rTMP["value"]['CODIGO']; ?>">
      <?php
        }
      }
    }
  }

  //////////////////////////////////////////////////////////////// SUB MENU INVESTIGA//////////////////////////////////////////////////////////////////////////////////////////////
  else if ($strTipoValidacion == "tabla_sub_menu_investiga_casos") {

    $buscarInvestigaCasos = isset($_POST["buscarInvestigaCasos"]) ? $_POST["buscarInvestigaCasos"]  : '';

    $strFilter = "";
    if (!empty($buscarInvestigaCasos)) {
      $strFilter = " WHERE ( UPPER(CODICLIE) LIKE UPPER('%{$buscarInvestigaCasos}%') OR UPPER(NOMBRE) LIKE UPPER('%{$buscarInvestigaCasos}%') OR UPPER(IDENTIFI) LIKE UPPER('%{$buscarInvestigaCasos}%') OR UPPER(NIT) LIKE UPPER('%{$buscarInvestigaCasos}%') ) ";
    }

    if ($buscarInvestigaCasos) {
      $arrInvestigaCasos = array();
      $stmt = "SELECT CODICLIE, NOMBRE, IDENTIFI, NIT, CLAPROD, FASIG, DEPTO, MUNI, ZONA, NUMEMPRE, NUMTRANS, GESTORD 
              FROM GC000001 $strFilter
              UNION
              SELECT CODICLIE, NOMBRE, IDENTIFI, NIT, CLAPROD, FASIG, DEPTO, MUNI, ZONA, NUMEMPRE, NUMTRANS, GESTORD 
              FROM GH000001 $strFilter";
      //print_r($stmt);
      $query = ibase_prepare($stmt);
      $v_query = ibase_execute($query);
      while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["CODICLIE"]              = $rTMP["CODICLIE"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["NOMBRE"]              = $rTMP["NOMBRE"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["IDENTIFI"]              = $rTMP["IDENTIFI"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["NIT"]              = $rTMP["NIT"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["CLAPROD"]              = $rTMP["CLAPROD"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["FASIG"]              = $rTMP["FASIG"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["DEPTO"]              = $rTMP["DEPTO"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["MUNI"]              = $rTMP["MUNI"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["ZONA"]              = $rTMP["ZONA"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["NUMEMPRE"]              = $rTMP["NUMEMPRE"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["NUMTRANS"]              = $rTMP["NUMTRANS"];
        $arrInvestigaCasos[$rTMP["CODICLIE"]]["GESTORD"]              = $rTMP["GESTORD"];
      }

      ?>

      <div class="col-md-12 tableFixHeadInvestiga">
        <table id="tableData" class="table table-hover table-sm">
          <thead>
            <tr class="table-info">
              <td>Codigo Del Cliente</td>
              <td>Nombre</td>
              <td>Identificacion</td>
              <td>No. De Nit</td>
            </tr>
          </thead>
          <tbody>
            <?php
            if (is_array($arrInvestigaCasos) && (count($arrInvestigaCasos) > 0)) {
              $intContador = 1;
              reset($arrInvestigaCasos);
              foreach ($arrInvestigaCasos as $rTMP['key'] => $rTMP['value']) {
            ?>
                <tr style="cursor:pointer;" onclick="fntSelectInvestigaFormulario('<?php print $intContador; ?>')">
                  <td><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                  <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                  <td><?php echo  $rTMP["value"]['IDENTIFI']; ?></td>
                  <td><?php echo  $rTMP["value"]['NIT']; ?></td>
                </tr>
                <input type="hidden" name="hid_investiga_casos_id<?php print $intContador; ?>" id="hid_investiga_casos_id<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NUMTRANS']; ?>">
                <input type="hidden" name="hid_investiga_casos_nombre<?php print $intContador; ?>" id="hid_investiga_casos_nombre<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NOMBRE']; ?>">
                <input type="hidden" name="hid_investiga_casos_dpi<?php print $intContador; ?>" id="hid_investiga_casos_dpi<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['IDENTIFI']; ?>">
                <input type="hidden" name="hid_investiga_casos_nit<?php print $intContador; ?>" id="hid_investiga_casos_nit<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NIT']; ?>">

                <input type="hidden" name="hid_investiga_casos_codiclie<?php print $intContador; ?>" id="hid_investiga_casos_codiclie<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CODICLIE']; ?>">

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
    }

    die();
  } else if ($strTipoValidacion == "tabla_sub_menu_investiga_formulario") {

    $InvestigaFormulario = isset($_POST["InvestigaFormulario"]) ? $_POST["InvestigaFormulario"]  : '';

    $arrInvestigaFormulario = array();
    $stmt = "SELECT NIU, NUMTRANS, FGESTION, OBSERVAC FROM GM000001 WHERE NUMTRANS = $InvestigaFormulario";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaFormulario[$rTMP["NIU"]]["NUMTRANS"]              = $rTMP["NUMTRANS"];
      $arrInvestigaFormulario[$rTMP["NIU"]]["FGESTION"]              = $rTMP["FGESTION"];
      $arrInvestigaFormulario[$rTMP["NIU"]]["OBSERVAC"]              = $rTMP["OBSERVAC"];
    }

    ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td>Fecha</td>
            <td>Observaciones</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaFormulario) && (count($arrInvestigaFormulario) > 0)) {
            $intContador = 1;
            reset($arrInvestigaFormulario);
            foreach ($arrInvestigaFormulario as $rTMP['key'] => $rTMP['value']) {
              $date = $rTMP["value"]['FGESTION'];
              $date_ = date('d-m-Y', strtotime($date));
          ?>
              <tr>
                <td><?php echo $date_; ?></td>
                <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
              </tr>

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
  } else if ($strTipoValidacion == "tabla_sub_menu_investiga_telefonos") {

    $investiga_codiclie = isset($_POST["investiga_codiclie"]) ? $_POST["investiga_codiclie"]  : '';

    $arrTelefonosInvestigacion = array();
    $stmt = "SELECT T.ACTIVO, T.NUMERO, T.PROPIETARIO, C.NOMBRE, T.ORIGEN, T.OBSERVAC, E.CODCOL, T.NIU
            FROM TELEFONOS T 
            LEFT JOIN COMPATEL C 
            ON T.PROVSERV = C.CODIGO 
            LEFT JOIN EMPRETEL E
            ON T.PROVSERV = E.CODIGO 
            WHERE T.CODICLIE = '$investiga_codiclie'
            GROUP BY 1,2,3,4,5,6,7,8";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["NIU"]                      = $rTMP["NIU"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["NUMERO"]              = $rTMP["NUMERO"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["PROPIETARIO"]              = $rTMP["PROPIETARIO"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["NOMBRE"]              = $rTMP["NOMBRE"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["ORIGEN"]              = $rTMP["ORIGEN"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["OBSERVAC"]              = $rTMP["OBSERVAC"];
      $arrTelefonosInvestigacion[$rTMP["NIU"]]["CODCOL"]              = $rTMP["CODCOL"];
    }
    //ibase_free_result($v_query);
  ?>

    <div class="col-md-12 tableFixHead">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <th style="width:5%;">Call</th>
            <th style="width:5%">Telefono</th>
            <th style="width:25%">Titular-Casa-Propietario</th>
            <th style="width:5%">ET</th>
            <th style="width:5%">TT</th>
            <th style="width:52%">Observaciones</th>
          </tr>
        </thead>
        <tbody>
          <form id="formDataTelefono" method="POST">

            <?php
            if (is_array($arrTelefonosInvestigacion) && (count($arrTelefonosInvestigacion) > 0)) {
              $intContador = 1;
              reset($arrTelefonosInvestigacion);
              foreach ($arrTelefonosInvestigacion as $rTMP['key'] => $rTMP['value']) {
            ?>
                <tr style="cursor:pointer;">
                  <td><a style="text-aline:center;" href="<?php echo  $rTMP["value"]['NUMERO']; ?>" target="_blank"><i class="fad fa-2x fa-phone-square"></i></a></td>
                  <td><?php echo  $rTMP["value"]['NUMERO']; ?></td>
                  <td><?php echo  $rTMP["value"]['PROPIETARIO']; ?></td>
                  <td style="background:#<?php echo  $rTMP["value"]['CODCOLWEB']; ?>;"></td>
                  <td><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                  <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
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
  } else if ($strTipoValidacion == "tabla_sub_menu_investiga_direcciones") {

    $investiga_codiclie = isset($_POST["investiga_codiclie"]) ? $_POST["investiga_codiclie"]  : '';

    $arrInvestigaCorreo = array();
    $stmt = "SELECT ACTIVO, DIRECCION, PROPIETARIO, ORIGEN, NIU
            FROM DIRECCIONES
            WHERE CODICLIE = '$investiga_codiclie'";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaCorreo[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["DIRECCION"]              = $rTMP["DIRECCION"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["PROPIETARIO"]              = $rTMP["PROPIETARIO"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["ORIGEN"]              = $rTMP["ORIGEN"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
    }

  ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td style="width:7%;">A</td>
            <td style="width:40%;">Direccion</td>
            <td style="width:40%;">Nombre</td>
            <td style="width:5%;">TT</td>
            <td style="width:8%;">Id</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaCorreo) && (count($arrInvestigaCorreo) > 0)) {
            $intContador = 1;
            reset($arrInvestigaCorreo);
            foreach ($arrInvestigaCorreo as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr>
                <td>
                  <?PHP
                  if ($rTMP["value"]['ACTIVO'] == 1) {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_direccion_investiga_" id="activo_chek_direccion_investiga_" onclick="fntSelectCheked_a('<?php print $intContador; ?>')" type="checkbox" value="1" checked>
                  <?PHP
                  } else {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_direccion_investiga_" id="activo_chek_direccion_investiga_" onclick="fntSelectCheked_a('<?php print $intContador; ?>')" type="checkbox" value="1">
                  <?PHP
                  }
                  ?>
                </td>
                <td><?php echo  $rTMP["value"]['DIRECCION']; ?></td>
                <td><?php echo  $rTMP["value"]['PROPIETARIO']; ?></td>
                <td><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                <td><?php echo  $rTMP["value"]['NIU']; ?></td>
              </tr>

              <input type="hidden" name="hid_direccion_investiga_<?php print $intContador; ?>" id="hid_direccion_investiga_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ACTIVO']; ?>">
              <input type="hidden" name="hid_check_a_<?php print $intContador; ?>" id="hid_check_a_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ACTIVO']; ?>">
              <input type="hidden" name="hid_check_niu_<?php print $intContador; ?>" id="hid_check_niu_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NIU']; ?>">


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
  } else if ($strTipoValidacion == "tabla_sub_menu_investiga_correos") {

    $investiga_codiclie = isset($_POST["investiga_codiclie"]) ? $_POST["investiga_codiclie"]  : '';

    $arrInvestigaCorreo = array();
    $stmt = "SELECT ACTIVO, EMAIL, NIU
              FROM EMAILS
              WHERE CODICLIE = '$investiga_codiclie'";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaCorreo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["EMAIL"]              = $rTMP["EMAIL"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
    }

  ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td style="width:40%;">Correos</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaCorreo) && (count($arrInvestigaCorreo) > 0)) {
            $intContador = 1;
            reset($arrInvestigaCorreo);
            foreach ($arrInvestigaCorreo as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr>
                <td><?php echo  $rTMP["value"]['EMAIL']; ?></td>
              </tr>
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

  //////////////////////////////////////////////////////////////// SUB MENU MAS INFORMACION////////////////////////////////////////////////////////////////////////////////////////

  else if ($strTipoValidacion == "tabla_sub_menu_informacion_direcciones") {

    $mInfoCodiclie = isset($_POST["mInfoCodiclie"]) ? $_POST["mInfoCodiclie"]  : '';

    $arrInvestigaCorreo = array();
    $stmt = "SELECT ACTIVO, DIRECCION, PROPIETARIO, ORIGEN, NIU
            FROM DIRECCIONES
            WHERE CODICLIE = '$mInfoCodiclie'";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaCorreo[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["DIRECCION"]              = $rTMP["DIRECCION"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["PROPIETARIO"]              = $rTMP["PROPIETARIO"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["ORIGEN"]              = $rTMP["ORIGEN"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
    }

  ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td style="width:7%;">A</td>
            <td style="width:40%;">Direccion</td>
            <td style="width:40%;">Nombre</td>
            <td style="width:5%;">TT</td>
            <td style="width:8%;">Id</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaCorreo) && (count($arrInvestigaCorreo) > 0)) {
            $intContador = 1;
            reset($arrInvestigaCorreo);
            foreach ($arrInvestigaCorreo as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr>
                <td>
                  <?PHP
                  if ($rTMP["value"]['ACTIVO'] == 1) {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_direccion_info_" id="activo_chek_direccion_info_" onclick="fntSelectCheked_info_a_dire_m_info('<?php print $intContador; ?>')" type="checkbox" value="1" checked>
                  <?PHP
                  } else {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_direccion_info_" id="activo_chek_direccion_info_" onclick="fntSelectCheked_info_a_dire_m_info('<?php print $intContador; ?>')" type="checkbox" value="1">
                  <?PHP
                  }
                  ?>
                </td>
                <td><?php echo  $rTMP["value"]['DIRECCION']; ?></td>
                <td><?php echo  $rTMP["value"]['PROPIETARIO']; ?></td>
                <td><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                <td><?php echo  $rTMP["value"]['NIU']; ?></td>
              </tr>

              <input type="hidden" name="hid_a_mas_info_direc_<?php print $intContador; ?>" id="hid_a_mas_info_direc_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ACTIVO']; ?>">
              <input type="hidden" name="hid_niu_mas_info_direc<?php print $intContador; ?>" id="hid_niu_mas_info_direc<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NIU']; ?>">

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
  } else if ($strTipoValidacion == "tabla_sub_menu_informacion_correos") {

    $CorreoInfoCodiclie = isset($_POST["CorreoInfoCodiclie"]) ? $_POST["CorreoInfoCodiclie"]  : '';

    $arrInvestigaCorreo = array();
    $stmt = "SELECT ACTIVO, EMAIL, NIU
              FROM EMAILS
              WHERE CODICLIE = '$CorreoInfoCodiclie'";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaCorreo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["EMAIL"]              = $rTMP["EMAIL"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["ACTIVO"]              = $rTMP["ACTIVO"];
    }

  ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td style="width:5%;">&nbsp;&nbsp;A</td>
            <td style="width:950%;">Correos</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaCorreo) && (count($arrInvestigaCorreo) > 0)) {
            $intContador = 1;
            reset($arrInvestigaCorreo);
            foreach ($arrInvestigaCorreo as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr>
                <td>
                  <?PHP
                  if ($rTMP["value"]['ACTIVO'] == 1) {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_correo_info_" id="activo_chek_correo_info_" onclick="fntSelectCheked_info_a_correo_info('<?php print $intContador; ?>')" type="checkbox" value="1" checked>
                  <?PHP
                  } else {
                  ?>
                    <input class="form-control form-control-sm " name="activo_chek_correo_info_" id="activo_chek_correo_info_" onclick="fntSelectCheked_info_a_correo_info('<?php print $intContador; ?>')" type="checkbox" value="1">
                  <?PHP
                  }
                  ?>
                </td>
                <td><?php echo  $rTMP["value"]['EMAIL']; ?></td>
              </tr>

              <input type="hidden" name="hid_a_mas_info_correo_<?php print $intContador; ?>" id="hid_a_mas_info_correo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ACTIVO']; ?>">
              <input type="hidden" name="hid_niu_mas_info_correo_<?php print $intContador; ?>" id="hid_niu_mas_info_correo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['NIU']; ?>">
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


  //////////////////////////////////////////////////////////////// SUB MENU ESTADO DE CUENTA///////////////////////////////////////////////////////////////////////////////////////

  else if ($strTipoValidacion == "tabla_estado_de_cuenta") {

    $numCasoPdf = isset($_POST["numCasoPdf"]) ? $_POST["numCasoPdf"]  : '';

    $arrRegistroCliente = array();
    $stmt = "SELECT G.*, A.EXTENCION
            FROM GC000001 G
            LEFT JOIN AXESO A
            ON G.GESTORD = A.USUARIO
            WHERE G.NUMTRANS = $numCasoPdf";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["NOMBRE"]              = $rTMP["NOMBRE"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODICLIE"]              = $rTMP["CODICLIE"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODIEMPR"]              = $rTMP["CODIEMPR"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["CLAPROD"]              = $rTMP["CLAPROD"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVEQ"]              = $rTMP["CICLOVEQ"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVED"]              = $rTMP["CICLOVED"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["EXTRAFIN"]              = $rTMP["EXTRAFIN"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGO"]              = $rTMP["FULTPAGO"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGD"]              = $rTMP["FULTPAGD"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["DIAPAGO"]              = $rTMP["DIAPAGO"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMCALL"]              = $rTMP["NUMCALL"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVEQ"]              = $rTMP["SALDOVEQ"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMINQ"]              = $rTMP["PAGOMINQ"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDO"]              = $rTMP["SALDO"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOS"]              = $rTMP["PAGOS"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACT"]              = $rTMP["SALDOACT"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVED"]              = $rTMP["SALDOVED"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMIND"]              = $rTMP["PAGOMIND"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOD"]              = $rTMP["SALDOD"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOSD"]              = $rTMP["PAGOSD"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACD"]              = $rTMP["SALDOACD"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMEMPRE"]              = $rTMP["NUMEMPRE"];
      $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMENV"]              = $rTMP["NUMENV"];
    }

    if (is_array($arrRegistroCliente) && (count($arrRegistroCliente) > 0)) {
      reset($arrRegistroCliente);
      foreach ($arrRegistroCliente as $rTMP['key'] => $rTMP['value']) {

        $nombre =  $rTMP["value"]['NOMBRE'];
        $codiclie =  $rTMP["value"]['CODICLIE'];

        $claprod =  $rTMP["value"]['CLAPROD'];

        $saldo =  $rTMP["value"]['SALDO'];
        $saldo = number_format($saldo, 2);

        $saldoact =  $rTMP["value"]['SALDOACT'];
        $saldoact = number_format($saldoact, 2);
      }
    }

    $arrDetalle = array();
    $stmt = "SELECT NIU,NUMTRANS, FGESTION, SUBCONCL, OBSERVAC, PAGOS, BOLETA FROM GM000001 WHERE NUMTRANS = $numCasoPdf AND PAGOS > 0.00 ORDER BY 1 ";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrDetalle[$rTMP["NIU"]]["NUMTRANS"] = $rTMP["NUMTRANS"];
      $arrDetalle[$rTMP["NIU"]]["FGESTION"] = $rTMP["FGESTION"];
      $arrDetalle[$rTMP["NIU"]]["SUBCONCL"] = $rTMP["SUBCONCL"];
      $arrDetalle[$rTMP["NIU"]]["OBSERVAC"] = $rTMP["OBSERVAC"];
      $arrDetalle[$rTMP["NIU"]]["PAGOS"] = $rTMP["PAGOS"];
      $arrDetalle[$rTMP["NIU"]]["BOLETA"] = $rTMP["BOLETA"];
    }
    $fecha = date("d-m-Y");

  ?>
    <div class="form-group col-12 row ">
      <div class="col-sm-5">
        <img src="../logo.jpg" alt="">
      </div>
      <div class="col-sm-5" style="text-align:center;">
        <b for="COMPORTAMIENTO" class="col-sm-1 col-form-label">COMPORTAMIENTO DE PAGO</b></br>
      </div>
      <div class="col-2"></div>
      <div class="col-7"></div>
      <div class="col-sm-5" style="text-align:right;">
        <a for="Guatemala" class="col-sm-1 col-form-label">Guatemala <?php echo  $fecha; ?></a>
      </div>

      <div class="col-4"></div>
      <div class="col-sm-4">
        <b for="Nombre" class="col-sm-1 col-form-label">Nombre</b>
        <a for="nombre" class="col-sm-1 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo  $nombre; ?></a>
      </div>
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-sm-4">
        <b for="Nombre" class="col-sm-1 col-form-label">No.Cuenta</b>
        <a for="nombre" class="col-sm-1 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp; <?php echo  $codiclie; ?></a>
      </div>
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-sm-4">
        <b for="Nombre" class="col-sm-1 col-form-label">Tipo Producto</b>
        <a for="nombre" class="col-sm-1 col-form-label"><?php echo  $claprod; ?></a>
      </div>
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-sm-4">
        <b for="Nombre" class="col-sm-1 col-form-label">Saldo Inicial</b>
        <a for="nombre" class="col-sm-1 col-form-label">&nbsp; &nbsp; &nbsp; <?php echo  $saldo; ?></a>
      </div>
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-sm-4">
        <b for="Nombre" class="col-sm-1 col-form-label">Saldo Actual</b>
        <a for="nombre" class="col-sm-1 col-form-label">&nbsp; &nbsp; &nbsp; <?php echo  $saldoact; ?></a>
      </div>
      <div class="col-4"></div>

    </div>
    <div class="col-md-12 tableEstadoCuenta">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info">
            <td style="width:5%;">Fecha</td>
            <td style="width:5%;">P/DB</td>
            <td style="width:10%;">No.Documento</td>
            <td style="width:10%;">Valor</td>
            <td style="width:7%;">Observaciones</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrDetalle) && (count($arrDetalle) > 0)) {
            reset($arrDetalle);
            foreach ($arrDetalle as $rTMP['key'] => $rTMP['value']) {
          ?>
              <tr>
                <td><?php echo  $rTMP["value"]['FGESTION']; ?></td>
                <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                <td><?php echo  $rTMP["value"]['BOLETA']; ?></td>
                <td><?php echo  $rTMP["value"]['PAGOS']; ?></td>
                <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
              </tr>
          <?PHP
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

  //////////////////////////////////////////////////////////////// SUB MENU DOCUMENTOS DIGITALIZADOS///////////////////////////////////////////////////////////////////////////////
  else if ($strTipoValidacion == "tabla_documentos_digitales") {

    $codiclie_archivo = isset($_POST["codiclie_archivo"]) ? $_POST["codiclie_archivo"]  : '';


    $arrInvestigaCorreo = array();
    $stmt = "SELECT CODICLIE, NOMDOC, NIU, DOCTO, EXTENCION 
              FROM DOCUMENTS 
              WHERE CODICLIE = '$codiclie_archivo'";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
      $arrInvestigaCorreo[$rTMP["NIU"]]["NIU"]              = $rTMP["NIU"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["NOMDOC"]              = $rTMP["NOMDOC"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["DOCTO"]              = $rTMP["DOCTO"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["EXTENCION"]              = $rTMP["EXTENCION"];
      $arrInvestigaCorreo[$rTMP["NIU"]]["CODICLIE"]              = $rTMP["CODICLIE"];
    }

  ?>
    <div class="col-md-12 tableFixHeadInvestiga">
      <table id="tableData" class="table table-hover table-sm">
        <thead>
          <tr class="table-info" style="text-aline:center;">
            <td style="width:950%;">Documento</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($arrInvestigaCorreo) && (count($arrInvestigaCorreo) > 0)) {
            $intContador = 1;
            reset($arrInvestigaCorreo);
            foreach ($arrInvestigaCorreo as $rTMP['key'] => $rTMP['value']) {
              $codiclie = trim($rTMP["value"]['CODICLIE']);

          ?>
              <tr style="cursor:pointer;">
              <td><a  href="../../asset/img/docs-pdf/<?php echo  $rTMP["value"]['NIU']; ?>-<?php echo  $codiclie; ?>.pdf" target="_blank"><?php echo  $rTMP["value"]['NOMDOC']; ?></a></td>
              </tr>

          <?PHP
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
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  die();
}
?>
<?php
$connect = conectar();
$numCaso = $_GET["id"];
$TN =  $_GET["tn"];
$gt =  isset($_GET["gt"]) ? $_GET["gt"]  : '';

$arrRegistroCliente = array();
$stmt = "SELECT G.*, A.EXTENCION
            FROM GC000001 G
            LEFT JOIN AXESO A
            ON G.GESTORD = A.USUARIO
            WHERE G.NUMTRANS = $numCaso";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NOMBRE"]              = $rTMP["NOMBRE"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODICLIE"]              = $rTMP["CODICLIE"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODIEMPR"]              = $rTMP["CODIEMPR"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CLAPROD"]              = $rTMP["CLAPROD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVEQ"]              = $rTMP["CICLOVEQ"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVED"]              = $rTMP["CICLOVED"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["EXTRAFIN"]              = $rTMP["EXTRAFIN"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGO"]              = $rTMP["FULTPAGO"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGD"]              = $rTMP["FULTPAGD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["DIAPAGO"]              = $rTMP["DIAPAGO"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMCALL"]              = $rTMP["NUMCALL"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVEQ"]              = $rTMP["SALDOVEQ"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMINQ"]              = $rTMP["PAGOMINQ"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDO"]              = $rTMP["SALDO"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOS"]              = $rTMP["PAGOS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACT"]              = $rTMP["SALDOACT"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVED"]              = $rTMP["SALDOVED"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMIND"]              = $rTMP["PAGOMIND"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOD"]              = $rTMP["SALDOD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOSD"]              = $rTMP["PAGOSD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACD"]              = $rTMP["SALDOACD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMEMPRE"]              = $rTMP["NUMEMPRE"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMENV"]              = $rTMP["NUMENV"];

  $arrRegistroCliente[$rTMP["NUMTRANS"]]["IDENTIFI"]             = $rTMP["IDENTIFI"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["NIT"]             = $rTMP["NIT"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MUNI"]             = $rTMP["MUNI"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["DEPTO"]             = $rTMP["DEPTO"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["EXPEDIEN"]             = $rTMP["EXPEDIEN"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["DEUDOR"]             = $rTMP["DEUDOR"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODEUDOR"]             = $rTMP["CODEUDOR"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["JUICIO"]             = $rTMP["JUICIO"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV1Q"]             = $rTMP["CICLOV1Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV2Q"]             = $rTMP["CICLOV2Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV3Q"]             = $rTMP["CICLOV3Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV4Q"]             = $rTMP["CICLOV4Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV5Q"]             = $rTMP["CICLOV5Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV6Q"]             = $rTMP["CICLOV6Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV7Q"]             = $rTMP["CICLOV7Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV8Q"]             = $rTMP["CICLOV8Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV9Q"]             = $rTMP["CICLOV9Q"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV1D"]             = $rTMP["CICLOV1D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV2D"]             = $rTMP["CICLOV2D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV3D"]             = $rTMP["CICLOV3D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV4D"]             = $rTMP["CICLOV4D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV5D"]             = $rTMP["CICLOV5D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV6D"]             = $rTMP["CICLOV6D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV7D"]             = $rTMP["CICLOV7D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOV8D"]             = $rTMP["CICLOV8D"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES3"]             = $rTMP["MESES3"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES6"]             = $rTMP["MESES6"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES9"]             = $rTMP["MESES9"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES12"]             = $rTMP["MESES12"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES18"]             = $rTMP["MESES18"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES24"]             = $rTMP["MESES24"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES36"]             = $rTMP["MESES36"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MESES48"]             = $rTMP["MESES48"];

  $arrRegistroCliente[$rTMP["NUMTRANS"]]["TIPOPROD"]             = $rTMP["TIPOPROD"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["FECHAPER"]             = $rTMP["FECHAPER"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["FECHAFIN"]             = $rTMP["FECHAFIN"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["FECHACOR"]             = $rTMP["FECHACOR"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["PLAZCRED"]             = $rTMP["PLAZCRED"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["CAPATRAS"]             = $rTMP["CAPATRAS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["TOTATRAS"]             = $rTMP["TOTATRAS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MONTOTOR"]             = $rTMP["MONTOTOR"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["INTATRAS"]             = $rTMP["INTATRAS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["MORATRAS"]             = $rTMP["MORATRAS"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["TASACRED"]             = $rTMP["TASACRED"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["QOTRENEG"]             = $rTMP["QOTRENEG"];
  $arrRegistroCliente[$rTMP["NUMTRANS"]]["QOTCONVE"]             = $rTMP["QOTCONVE"];

  $arrRegistroCliente[$rTMP["NUMTRANS"]]["EXTENCION"]              = $rTMP["EXTENCION"];
}

if (is_array($arrRegistroCliente) && (count($arrRegistroCliente) > 0)) {
  reset($arrRegistroCliente);
  foreach ($arrRegistroCliente as $rTMP['key'] => $rTMP['value']) {

    $nombre =  $rTMP["value"]['NOMBRE'];
    $codiclie =  $rTMP["value"]['CODICLIE'];

    $codiempr =  $rTMP["value"]['CODIEMPR'];
    $claprod =  $rTMP["value"]['CLAPROD'];
    $cicloveq =  $rTMP["value"]['CICLOVEQ'];
    $cicloved =  $rTMP["value"]['CICLOVED'];

    $extrafin =  $rTMP["value"]['EXTRAFIN'];
    $extrafin = number_format($extrafin, 2);

    $fultpago =  $rTMP["value"]['FULTPAGO'];
    $fultpagd =  $rTMP["value"]['FULTPAGD'];
    $diapago =  $rTMP["value"]['DIAPAGO'];
    $numcall =  $rTMP["value"]['NUMCALL'];

    $saldoveq =  $rTMP["value"]['SALDOVEQ'];
    $saldoveq = number_format($saldoveq, 2);

    $pagominq =  $rTMP["value"]['PAGOMINQ'];
    $pagominq = number_format($pagominq, 2);

    $saldo =  $rTMP["value"]['SALDO'];
    $saldo = number_format($saldo, 2);

    $pagos =  $rTMP["value"]['PAGOS'];
    $pagos = number_format($pagos, 2);

    $saldoact =  $rTMP["value"]['SALDOACT'];
    $saldoact = number_format($saldoact, 2);

    $saldoved =  $rTMP["value"]['SALDOVED'];
    $saldoved = number_format($saldoved, 2);

    $pagomind =  $rTMP["value"]['PAGOMIND'];
    $pagomind = number_format($pagomind, 2);

    $saldod =  $rTMP["value"]['SALDOD'];
    $saldod = number_format($saldod, 2);

    $pagosd =  $rTMP["value"]['PAGOSD'];
    $pagosd = number_format($pagosd, 2);

    $saldoacd =  $rTMP["value"]['SALDOACD'];
    $saldoacd = number_format($saldoacd, 2);

    $numempre =  $rTMP["value"]['NUMEMPRE'];
    $numenv =  $rTMP["value"]['NUMENV'];

    ///////////MAS INFORMACION

    $IDENTIFI =  $rTMP["value"]['IDENTIFI'];
    $NIT  =  $rTMP["value"]['NIT'];
    $MUNI =  $rTMP["value"]['MUNI'];
    $DEPTO =  $rTMP["value"]['DEPTO'];
    $EXPEDIEN =  $rTMP["value"]['EXPEDIEN'];
    $DEUDOR =  $rTMP["value"]['DEUDOR'];
    $CODEUDOR =  $rTMP["value"]['CODEUDOR'];
    $JUICIO =  $rTMP["value"]['JUICIO'];

    $CICLOV1Q =  $rTMP["value"]['CICLOV1Q'];
    $CICLOV1Q = number_format($CICLOV1Q, 2);

    $CICLOV2Q =  $rTMP["value"]['CICLOV2Q'];
    $CICLOV2Q = number_format($CICLOV2Q, 2);

    $CICLOV3Q =  $rTMP["value"]['CICLOV3Q'];
    $CICLOV3Q = number_format($CICLOV3Q, 2);

    $CICLOV4Q =  $rTMP["value"]['CICLOV4Q'];
    $CICLOV4Q = number_format($CICLOV4Q, 2);

    $CICLOV5Q =  $rTMP["value"]['CICLOV5Q'];
    $CICLOV5Q = number_format($CICLOV5Q, 2);

    $CICLOV6Q =  $rTMP["value"]['CICLOV6Q'];
    $CICLOV6Q = number_format($CICLOV6Q, 2);

    $CICLOV7Q =  $rTMP["value"]['CICLOV7Q'];
    $CICLOV7Q = number_format($CICLOV7Q, 2);

    $CICLOV8Q =  $rTMP["value"]['CICLOV8Q'];
    $CICLOV8Q = number_format($CICLOV8Q, 2);

    $CICLOV9Q =  $rTMP["value"]['CICLOV9Q'];
    $CICLOV9Q = number_format($CICLOV9Q, 2);

    $CICLOV1D =  $rTMP["value"]['CICLOV1D'];
    $CICLOV1D = number_format($CICLOV1D, 2);

    $CICLOV2D =  $rTMP["value"]['CICLOV2D'];
    $CICLOV2D = number_format($CICLOV2D, 2);

    $CICLOV3D =  $rTMP["value"]['CICLOV3D'];
    $CICLOV3D = number_format($CICLOV3D, 2);

    $CICLOV4D =  $rTMP["value"]['CICLOV4D'];
    $CICLOV4D = number_format($CICLOV4D, 2);

    $CICLOV5D =  $rTMP["value"]['CICLOV5D'];
    $CICLOV5D = number_format($CICLOV5D, 2);

    $CICLOV6D =  $rTMP["value"]['CICLOV6D'];
    $CICLOV6D = number_format($CICLOV6D, 2);

    $CICLOV7D =  $rTMP["value"]['CICLOV7D'];
    $CICLOV7D = number_format($CICLOV7D, 2);

    $CICLOV8D =  $rTMP["value"]['CICLOV8D'];
    $CICLOV8D = number_format($CICLOV8D, 2);

    $MESES3 =  $rTMP["value"]['MESES3'];
    $MESES3 = number_format($MESES3, 2);

    $MESES6 =  $rTMP["value"]['MESES6'];
    $MESES6 = number_format($MESES6, 2);

    $MESES9 =  $rTMP["value"]['MESES9'];
    $MESES9 = number_format($MESES9, 2);

    $MESES12 =  $rTMP["value"]['MESES12'];
    $MESES12 = number_format($MESES12, 2);

    $MESES18 =  $rTMP["value"]['MESES18'];
    $MESES18 = number_format($MESES18, 2);

    $MESES24 =  $rTMP["value"]['MESES24'];
    $MESES24 = number_format($MESES24, 2);

    $MESES36 =  $rTMP["value"]['MESES36'];
    $MESES36 = number_format($MESES36, 2);

    $MESES48 =  $rTMP["value"]['MESES48'];
    $MESES48 = number_format($MESES48, 2);

    $EXTENCION =  $rTMP["value"]['EXTENCION'];

    ////////////////////////////////////////////
    $TIPOPROD = $rTMP["value"]['TIPOPROD'];
    $FECHAPER = $rTMP["value"]['FECHAPER'];
    $FECHAFIN = $rTMP["value"]['FECHAFIN'];
    $FECHACOR = $rTMP["value"]['FECHACOR'];
    $PLAZCRED = $rTMP["value"]['PLAZCRED'];

    $CAPATRAS = $rTMP["value"]['CAPATRAS'];
    $CAPATRAS = number_format($CAPATRAS, 2);

    $TOTATRAS = $rTMP["value"]['TOTATRAS'];
    $TOTATRAS = number_format($TOTATRAS, 2);

    $MONTOTOR = $rTMP["value"]['MONTOTOR'];
    $MONTOTOR = number_format($MONTOTOR, 2);

    $INTATRAS = $rTMP["value"]['INTATRAS'];
    $INTATRAS = number_format($INTATRAS, 2);

    $MORATRAS = $rTMP["value"]['MORATRAS'];
    $MORATRAS = number_format($MORATRAS, 2);

    $TASACRED = $rTMP["value"]['TASACRED'];
    $TASACRED = number_format($TASACRED, 2);

    $QOTRENEG = $rTMP["value"]['QOTRENEG'];
    $QOTRENEG = number_format($QOTRENEG, 2);

    $QOTCONVE = $rTMP["value"]['QOTCONVE'];
    $QOTCONVE = number_format($QOTCONVE, 2);


?>
    <input class="form-control form-control-sm " name="numempre" id="numempre" value="<?php echo $numempre ?>" type="hidden">
    <input class="form-control form-control-sm " name="codiclie" id="codiclie" value="<?php echo $codiclie ?>" type="hidden">
    <input class="form-control form-control-sm " name="IDENTIFI" id="IDENTIFI" value="<?php echo $IDENTIFI ?>" type="hidden">
    <input class="form-control form-control-sm " name="numenv" id="numenv" value="<?php echo $numenv ?>" type="hidden">
    <input class="form-control form-control-sm " name="codiempr" id="codiempr" value="<?php echo $codiempr ?>" type="hidden">


<?php
    //echo $numempre;
  }
}

$stmtGestion = ibase_query("SELECT COUNT(*) FROM GM000001 WHERE NUMTRANS = $numCaso");
if ($rowGestionCont = ibase_fetch_row($stmtGestion)) {
  $idRowGestion = trim($rowGestionCont[0]);
}
//print_r($idRowTel);
$contadorGestiones = isset($idRowGestion) ? $idRowGestion : 0;



$arrClaveTelefono = array();
$stmt = "SELECT CLAVE, DESCRIP FROM ORIGENES ORDER BY 1";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
  $arrClaveTelefono[$rTMP["CLAVE"]]["CLAVE"]              = $rTMP["CLAVE"];
  $arrClaveTelefono[$rTMP["CLAVE"]]["DESCRIP"]              = $rTMP["DESCRIP"];
}
