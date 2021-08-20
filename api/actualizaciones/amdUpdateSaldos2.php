<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $USUA = trim($username);

    $empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : 0;
    $fechaOp = isset($_POST["FRECEPCI"]) ? $_POST["FRECEPCI"] : 0;


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert") {

        $rsNIU = ibase_query("SELECT CORRPAQ FROM CG000001");
        if ($row = ibase_fetch_row($rsNIU)) {
            $idRow = trim($row[0]);
        }
        $NUMENV = isset($idRow) ? $idRow : 0;
        $NUMENV = $NUMENV + 1;

        $var_consulta = "UPDATE CG000001 SET CORRPAQ = $NUMENV";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }

        $fileContacts = $_FILES['fileContacts'];
        $fileContacts = file_get_contents($fileContacts['tmp_name']);
        $fileContacts = explode(";", $fileContacts);
        $fileContacts = array_filter($fileContacts);
        $intKey = 0;
        $intControl = 0;
        foreach ($fileContacts as $contact) {

            if ($intControl == 4) {
                $keyRow = '';
                $arrCtrl = explode(PHP_EOL, $contact);
                if (count($arrCtrl) == 2) {
                    $contact = $arrCtrl[0];
                    $keyRow = $arrCtrl[1];
                } else {
                    $contact = '';
                    for ($i = 0; $i < count($arrCtrl); $i++) {
                        $contact .= $arrCtrl[$i];
                    }
                    $keyRow = $arrCtrl[(count($arrCtrl) - 1)];
                }
            }

            $contactList[$intKey][$intControl] = preg_replace("/\r|\n/", "", $contact);
            $intControl++;

            if ($intControl == 5) {
                $intKey++;
                if ($keyRow != '') {
                    $contactList[$intKey][0] = $keyRow;
                }
                $intControl = 1;
            }
        }

        //print $fileContacts[0].'<br>';

        foreach ($contactList as $key => $contactData) {
            $contactData[0] = str_replace(" ", "", "$contactData[0]");
            $contactData[1] = str_replace("/", ".", "$contactData[1]");
            $contactData[3] = str_replace(array("Q", " ", ","), "", $contactData[3]);

            if ($contactData[2] == 'QUE') {
                $rsNIUU = ibase_query("SELECT NUMTRANS, CODIEMPR, PAGOS, SALDO  FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
                if ($row = ibase_fetch_row($rsNIUU)) {
                    $idRow0 = trim($row[0]);
                    $idRow1 = trim($row[1]);
                    $idRow2 = trim($row[2]);
                    $idRow3 = trim($row[3]);
                }
                $NUMTRANS = isset($idRow0) ? $idRow0 : 0;
                $CODIEMPR = isset($idRow1) ? $idRow1 : 0;
                $PAGOS = isset($idRow2) ? $idRow2 : 0;
                $SALDO = isset($idRow3) ? $idRow3 : 0;

                $VPAGOS = $PAGOS + $contactData[3];
                $VSALDOACT = $SALDO - $VPAGOS;

                $rsNIU = ibase_query("SELECT COUNT(NUMTRANS) FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
                if ($row = ibase_fetch_row($rsNIU)) {
                    $idRow0 = trim($row[0]);
                }
                $bollExiste = isset($idRow0) ? $idRow0 : 0;
            } else {
                $rsNIUU = ibase_query("SELECT NUMTRANS, CODIEMPR, PAGOSD, SALDOD  FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
                if ($row = ibase_fetch_row($rsNIUU)) {
                    $idRow0 = trim($row[0]);
                    $idRow1 = trim($row[1]);
                    $idRow2 = trim($row[2]);
                    $idRow3 = trim($row[3]);
                }
                $NUMTRANS = isset($idRow0) ? $idRow0 : 0;
                $CODIEMPR = isset($idRow1) ? $idRow1 : 0;
                $PAGOSD = isset($idRow2) ? $idRow2 : 0;
                $SALDOD = isset($idRow3) ? $idRow3 : 0;

                $VPAGOSD = $PAGOS + $contactData[3];
                $VSALDOACTD = $VPAGOSD - $PAGOSD;

                $rsNIU = ibase_query("SELECT COUNT(NUMTRANS) FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
                if ($row = ibase_fetch_row($rsNIU)) {
                    $idRow0 = trim($row[0]);
                }
                $bollExiste = isset($idRow0) ? $idRow0 : 0;
            }

            if ($bollExiste >= 1) {

                if ($contactData[2] == 'QUE') {
                    $var_consulta = "UPDATE GC000001 SET PAGOS = $VPAGOS, SALDOACT = $VSALDOACT, BOLETA = '$contactData[4]', FULTPAGO = '$contactData[1]' WHERE NUMTRANS = '$NUMTRANS';";
                    $query = ibase_prepare($var_consulta);
                    $val = 1;
                    $valt = 'GCQ';
                    if ($v_query = ibase_execute($query)) {
                        echo $val;
                        echo $valt;
                    } else {
                        echo '0';
                        echo $var_consulta;
                    }
                    // print $var_consulta.'<br>';
                } else {
                    $var_consulta = "UPDATE GC000001 SET PAGOSD = $VPAGOSD, SALDOACD = $VSALDOACTD, BOLETA = '$contactData[4]', FULTPAGO = '$contactData[1]' WHERE NUMTRANS = '$NUMTRANS';";
                    $query = ibase_prepare($var_consulta);
                    $val = 1;
                    $valt = 'GCD';
                    if ($v_query = ibase_execute($query)) {
                        echo $val;
                        echo $valt;
                    } else {
                        echo '0';
                        echo $var_consulta;
                    }
                }

                $DATE = date("d.m.Y");
                $HOURS = date("H:i:s");

                if ($contactData[2] == 'QUE') {
                    $SOBSERVAC = "Pago aplicado por valor de Q." . $contactData[3] . " No. Boleta: " . $contactData[4] . " operado en sistema el día " . $DATE;
                } else {
                    $SOBSERVAC = "Pago aplicado por valor de $." . $contactData[3] . " No. Boleta: " . $contactData[4] . " operado en sistema el día " . $DATE;
                }

                $var_consulta = "INSERT INTO GM000001 (NIU, NUMTRANS, FGESTION, HORA, TIPOLOGI, CONCLUSI, RTESTADO, SUBCONCL, PAGOS, OBSERVAC, OWNER, NUMENV, CODICLIE, NUMEMPRE,CODIEMPR, BOLETA) 
                VALUES (0, $NUMTRANS, '$contactData[1]', '$HOURS', 'BANCO', 'OPERACIONES', 'PAGO REALIZADO', 'NEGOCIANDO CUENTA', $contactData[3], '$SOBSERVAC', 'OPERACIONES', $NUMENV, '$contactData[0]', $empresa, $CODIEMPR, '$contactData[4]')";
                $query = ibase_prepare($var_consulta);
                $val = 1;
                $valt = 'GM1';
                if ($v_query = ibase_execute($query)) {
                    echo $valt;
                    echo $val;
                } else {
                    echo '0';
                    echo $var_consulta;
                }
            }

            //print 'NUMTRANS    '.$NUMTRANS.'<br>       ';
            //print 'empresa    '.$empresa.'<br>       ';
            //print 'codiclie    '.$contactData[0].'<br>       ';
            //print 'contactData1   '.$contactData[1].'<br>       ';
            //print 'contactData2  '.$contactData[2].'<br>       ';
            //print 'contactData3   '.$contactData[3].'<br>       ';
            //print 'contactData4   '.$contactData[4].'<br>       ';
        }

        die();
    } else if ($strTipoValidacion == "tabla_gestion") {

        $rs2 = ibase_query("SELECT FIRST 1 NUMENV FROM GM000001 ORDER BY NUMENV DESC");
        if ($row = ibase_fetch_row($rs2)) {
            $idRow2 = trim($row[0]);
        }
        $NUMENV = isset($idRow2) ? $idRow2  : 0;

        $arrGestion = array();
        $stmt = "SELECT CODICLIE, FGESTION, HORA, TIPOLOGI, PLACE, CONCLUSI, RTESTADO, SUBCONCL, OBSERVAC  
            FROM GM000001 C
            WHERE NUMENV = '$NUMENV'";
        //print_r($stmt);

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["NUMTRANS"]]["CODICLIE"]             = $rTMP["CODICLIE"];
            $arrGestion[$rTMP["NUMTRANS"]]["FGESTION"]             = $rTMP["FGESTION"];
            $arrGestion[$rTMP["NUMTRANS"]]["HORA"]             = $rTMP["HORA"];
            $arrGestion[$rTMP["NUMTRANS"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
            $arrGestion[$rTMP["NUMTRANS"]]["PLACE"]             = $rTMP["PLACE"];
            $arrGestion[$rTMP["NUMTRANS"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
            $arrGestion[$rTMP["NUMTRANS"]]["RTESTADO"]             = $rTMP["RTESTADO"];
            $arrGestion[$rTMP["NUMTRANS"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
            $arrGestion[$rTMP["NUMTRANS"]]["OBSERVAC"]             = $rTMP["OBSERVAC"];
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
                        <td>Cod. Cliente</td>
                        <td>Fecha Gestion</td>
                        <td>Hora</td>
                        <td>Origen</td>
                        <td>Place</td>
                        <td>Receptor</td>
                        <td>Tipologia</td>
                        <td>Categoria</td>
                        <td>Gestion</td>
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
                                <td><?php echo  $rTMP["value"]['FGESTION']; ?></td>
                                <td><?php echo  $rTMP["value"]['HORA']; ?></td>
                                <td><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                                <td><?php echo  $rTMP["value"]['PLACE']; ?></td>
                                <td><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                                <td><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                                <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                                <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
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