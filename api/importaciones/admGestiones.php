<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $USUA = trim($username);

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert") {

        $rs2 = ibase_query("SELECT CORRPAQ FROM CG000001");
        if ($row = ibase_fetch_row($rs2)) {
            $idRow2 = trim($row[0]);
        }
        $NUMENV = isset($idRow2) ? $idRow2  : 0;
        $NUMENV = $NUMENV + 1;

        $var_consulta = "UPDATE CG000001 SET CORRPAQ = CORRPAQ + 1;";
        $query = ibase_prepare($var_consulta);
        if ($v_query = ibase_execute($query)) {
            $val = 1;
            $arrInfo['status'] = $val;
        } else {

            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
            //print_r($var_consulta);
        }

        $fileContacts = $_FILES['fileContacts'];
        $fileContacts = file_get_contents($fileContacts['tmp_name']);
        $fileContacts = explode(";", $fileContacts);
        $fileContacts = str_replace(';;',";NULL;",$fileContacts);
        $fileContacts = str_replace(',', '', $fileContacts);
        $fileContacts = str_replace('/', '.', $fileContacts);
        $fileContacts = array_filter($fileContacts);

        $intKey = 0;
        $intControl = 0;
        foreach ($fileContacts as $contact) {

            if ($intControl == 8) {
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

            $contactList[$intKey][$intControl] = preg_replace("/\r|\n/", "", $contact);;
            $intControl++;

            if ($intControl == 9) {
                $intKey++;
                if ($keyRow != '') {
                    $contactList[$intKey][0] = $keyRow;
                }
                $intControl = 1;
            }
        }

        foreach ($contactList as $key => $contactData) {
            //print $contactData[0].'<br>';           

            $contactData[0] = trim($contactData[0]);
            $contactData[0] = str_replace(" ", "", "$contactData[0]");

            $rs2 = ibase_query("SELECT NUMTRANS, NUMENV, NUMEMPRE, CODIEMPR FROM GC000001 WHERE CODICLIE = '{$contactData[0]}'");
            if ($row = ibase_fetch_row($rs2)) {
                $idRow1 = trim($row[0]);
                $idRow2 = trim($row[1]);
                $idRow3 = trim($row[2]);
                $idRow4 = trim($row[3]);
            }
            $NUMTRANS = isset($idRow1) ? $idRow1  : 0;
            $NUMEMPRE = isset($idRow3) ? $idRow3  : 0;
            $CODIEMPR = isset($idRow4) ? $idRow4  : 0;
            $val = '';
            $var_consulta = "INSERT INTO GM000001 (NIU, CODICLIE, FGESTION, HORA, TIPOLOGI, PLACE, CONCLUSI, RTESTADO, SUBCONCL, OBSERVAC , NUMTRANS, NUMENV, NUMEMPRE, CODIEMPR, OWNER, CPLACE,CRTESTAD,CTIPOLOG,CCONCLUS,CSUBCONC) VALUES(0,'{$contactData[0]}','{$contactData[1]}', '{$contactData[2]}','{$contactData[3]}','{$contactData[4]}','{$contactData[5]}','{$contactData[6]}','{$contactData[7]}','{$contactData[8]}', '$NUMTRANS', '$NUMENV', '$NUMEMPRE', '$CODIEMPR','OPERACIONES',' ',' ',' ',' ',' ');";
            $query = ibase_prepare($var_consulta);
            
            if ($v_query = ibase_execute($query)) {
                $val = 1;
            } else {
                echo '0';
                echo $var_consulta;
            }
            //print 'contactData0    '.$contactData[0].'<br>       ';
            //print 'contactData1   '.$contactData[1].'<br>       ';
            //print 'contactData2  '.$contactData[2].'<br>       ';
            //print 'contactData3   '.$contactData[3].'<br>       ';
            //print 'contactData4   '.$contactData[4].'<br>       ';
            //print 'contactData5   '.$contactData[5].'<br>    ';
            //print 'contactData6   '.$contactData[6].'<br>   <br>    ';
        }
        echo $val;

        // print json_encode($arrInfo);


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
    }

    die();
}

////////////////////////////////////////////////////////////////////////////////FINAL DE CONSULTAS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>