<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $USUA = trim($username);

    $empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : 0;
    $fechaOp = isset($_POST["FRECEPCI"]) ? $_POST["FRECEPCI"] : 0;


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert") {

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

            if ($intControl == 1) {
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

            if ($intControl == 2) {
                $intKey++;
                if ($keyRow != '') {
                    $contactList[$intKey][0] = $keyRow;
                }
                $intControl = 1;
            }
        }

        //print $fileContacts[0].'<br>';

        $var_consulta = "DELETE FROM REVISA_SALDOACT";
        $query = ibase_prepare($var_consulta);
        $val = 0;
        if ($v_query = ibase_execute($query)) {
            echo $val;
        } else {
            echo '0';
            echo $var_consulta;
        }

        foreach ($contactList as $key => $contactData) {

            $contactData[0] = str_replace(" ", "", "$contactData[0]");
            $contactData[1] = str_replace(array("Q", " ", ","), "", $contactData[1]);

            $rsNIUU = ibase_query("SELECT SALDOACT FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
            if ($row = ibase_fetch_row($rsNIUU)) {
                $idRow0 = trim($row[0]);
            }
            $SALDOACT = isset($idRow0) ? $idRow0 : 0;


            $rsNIU = ibase_query("SELECT COUNT(SALDOACT) FROM GC000001 WHERE NUMEMPRE = $empresa AND CODICLIE = '$contactData[0]'");
            if ($row = ibase_fetch_row($rsNIU)) {
                $idRow0 = trim($row[0]);
            }
            $bollExiste = isset($idRow0) ? $idRow0 : 0;

            if ($bollExiste >= 1) {
                $DIFERENCIA = $contactData[1] - $SALDOACT;

                if ($DIFERENCIA > 0) {
                    $var_consulta = "INSERT INTO REVISA_SALDOACT (NIU, CODICLIE, SALDO, SALDO_SIS, DIFERENCIA, ESTADO ) VALUES (0,'$contactData[0]', $contactData[1], $SALDOACT, $DIFERENCIA,  'Incongruencia'); ";
                    $query = ibase_prepare($var_consulta);
                    $val = 2;
                    if ($v_query = ibase_execute($query)) {
                        echo $val;
                    } else {
                        echo '0';
                        echo $var_consulta;
                    }
                }

                // print $var_consulta.'<br>';
            } else {

                $var_consulta = "INSERT INTO REVISA_SALDOACT (NIU, CODICLIE, SALDO, SALDO_SIS, DIFERENCIA, ESTADO ) VALUES (0,'$contactData[0]', $contactData[1], 0, 0,  'Caso no existe'); ";
                $query = ibase_prepare($var_consulta);
                $val = 1;
                if ($v_query = ibase_execute($query)) {
                    echo $val;
                } else {
                    echo '0';
                    echo $var_consulta;
                }
            }

            // print 'bollExiste     '.$bollExiste.'<br>       ';
            // print 'empresa     '.$empresa.'<br>       ';
            // print 'contactData     '.$contactData[0].'<br>       ';
            // print 'contactData0    '.$contactData[0].'<br>       ';
            // print 'contactData1   '.$contactData[1].'<br>       ';
        }
        die();
    } else if ($strTipoValidacion == "tabla_reporte") {

?>
        <div class="col-12">
            <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                <li class="nav-item">
                    <a type="button" href="report/report_saldos.php" target="_blank" class="btn btn-secondary btn-block">Reporte De Saldos</a>
                </li>
            </ul>
        </div><br>
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