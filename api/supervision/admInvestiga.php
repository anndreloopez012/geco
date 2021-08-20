<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
  $connect = conectar();

  $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';
   if ($strTipoValidacion == "update_direccion_investiga") {

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
  }

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
  
  die();
}
?>
