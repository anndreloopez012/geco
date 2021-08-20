<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $USUA = trim($username);

    $empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : 0;
    $fechaOp = isset($_POST["FRECEPCI"]) ? $_POST["FRECEPCI"] : 0;


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert") {

        $Search = isset($_POST["CodePlantilla"]) ? $_POST["CodePlantilla"]  : '';
        $arrCarga = array();
        $stmt = "SELECT     C.CAMPO, 
                            C.NOMCAMPO, 
                            C.TIPO, 
                            C.ANCHO
                    FROM CARGACTU C
                    JOIN PLANCARGA P
                        ON P.CODIGO = C.CODIGO
                    WHERE CODIGOPLA = $Search
                    AND STATUS = 1
                    ORDER BY P.ORDEN";

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        $intContadorCampos = 1;
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrCarga[$intContadorCampos]["CAMPO"]               = $rTMP["CAMPO"];
            $arrCarga[$intContadorCampos]["TIPO"]               = $rTMP["TIPO"];
            $intContadorCampos++;
        }
        ibase_free_result($v_query);

        $CAMPOS = '';
        if (is_array($arrCarga) && (count($arrCarga) > 0)) {
            $intContadorLimite = count($arrCarga);
            reset($arrCarga);
            foreach ($arrCarga as $rTMP['key'] => $rTMP['value']) {
                $CAMPOS .= $rTMP["value"]['CAMPO'] . ',';
            }
        }

        $fileContacts = $_FILES['fileContacts'];
        $fileContacts = file_get_contents($fileContacts['tmp_name']);
        $fileContacts = str_replace(';;',";NULL;",$fileContacts);
        $fileContacts = str_replace(',', '', $fileContacts);
        $fileContacts = str_replace('/', '.', $fileContacts);
        $fileContacts = explode(";", $fileContacts);
        $fileContacts = array_filter($fileContacts);
        $intKey = 0;
        $intControl = 1;
        foreach ($fileContacts as $contact) {
            
            if( $intControl == $intContadorLimite  ){
                $keyRow = 0;               
                $arrCtrl = explode(PHP_EOL,$contact);
                if( count($arrCtrl) == 2 ){
                    //print_r($arrCtrl);
                    $contact = $arrCtrl[0];
                    $keyRow = $arrCtrl[1];                     
                }
                else{
                    $contact = '';
                    for($i=0; $i < count($arrCtrl); $i++ ){
                        $contact .= $arrCtrl[$i];                    
                    }
                    $keyRow = $arrCtrl[ ( count($arrCtrl) -1) ];
                }
            }

            $strTexto = trim(preg_replace( "/\r|\n/", "", $contact));
            $contactList[$intKey][$intControl] = $strTexto;            
            $intControl++;
            
            if( $intControl == ($intContadorLimite + 1)  ){
                $intKey++; 
                if( $keyRow != 0){
                    $contactList[$intKey][1] = $keyRow;                            
                }
                $intControl = 2;                               
            }
        }


        //header('Content-Type: application/json');       
        //print_r($arrCarga);
        foreach ($contactList as $key => $contactData) {
           // $contactData[0] = str_replace(" ", "", "$contactData[0]");
           //print 'contactData0    '.$contactData[1].'<br>       ';

           $strCampos = '';
           reset($arrCarga);
           foreach ($arrCarga as $key => $rTMP['value']) {
               $strCampoTmp = '';
               $strDato = isset( $contactData[$key] )?$contactData[$key]:'';
               if( $strDato != 'NULL'){                        
                   if( $rTMP["value"]['TIPO'] == 'N' ){
                       $strDato = str_replace(',','',$strDato);
                       $strCampoTmp = $rTMP["value"]['CAMPO']."=".round($strDato, 2).",";
                   } 
                   else if( $rTMP["value"]['TIPO'] == 'F' ){
                       $strDato = str_replace('/','.',$strDato);
                       $strCampoTmp = $rTMP["value"]['CAMPO']."= '".$strDato."',";
                   }
                   else{
                       $strCampoTmp = $rTMP["value"]['CAMPO']."='".$strDato."',";
                   }
               }
               else{
                   $strCampoTmp = $rTMP["value"]['CAMPO'] ."=".round($strDato, 2).",";
               }
               $strCampos .= $strCampoTmp;
           }


            $rsNIUU = ibase_query("SELECT NUMTRANS FROM GC000001 WHERE CODICLIE = '$contactData[1]' AND NUMEMPRE = $empresa");
            if ($row = ibase_fetch_row($rsNIUU)) {
                $idRow0 = trim($row[0]);
            }
            $NUMTRANS = isset($idRow0) ? $idRow0 : 0;
         
            $rsNIU = ibase_query("SELECT COUNT(NUMTRANS) FROM GC000001 WHERE CODICLIE = '$contactData[1]' AND NUMEMPRE = $empresa");
            if ($row = ibase_fetch_row($rsNIU)) {
                $idRow0 = trim($row[0]);
            }
            $bollExiste = isset($idRow0) ? $idRow0 : 0;
 
            if ($bollExiste >= 1) {
                $var_consulta = "UPDATE GC000001 SET {$strCampos} ORG = 0 WHERE NUMTRANS = '$NUMTRANS'";
                $query = ibase_prepare($var_consulta);
                $val = 1;
                if ($v_query = ibase_execute($query)) {
                    echo $val;
                } else {
                    echo '0';
                    echo $var_consulta;
                }
                // print $var_consulta.'<br>';
            }

            // print 'bollExiste     '.$bollExiste.'<br>       ';
            // print 'NUMTRANS     '.$NUMTRANS.'<br>       ';
            // print 'contactData1   '.$contactData[1].'<br>       ';
            // print 'contactData2  '.$contactData[2].'<br>       ';
            // print 'contactData3   '.$contactData[3].'<br><br><br>       ';
            //print 'strCampos   ' . $strCampos . '<br><br><br>       ';
            //print 'VSALDOACT   ' . $VSALDOACT . '<br>       ';
            //print 'SALDO   ' . $SALDO . '<br>       ';
           
        }

        die();
    }  else if ($strTipoValidacion == "dropdown_empresa") {

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
    } else if ($strTipoValidacion == "dropdown_plantillas") {

        $arrBarVarPlantilla = array();
        $stmt = "SELECT CODIGOPLA, DESCRIP FROM PC000001";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarPlantilla[$rTMP["CODIGOPLA"]]["CODIGOPLA"]             = $rTMP["CODIGOPLA"];
            $arrBarVarPlantilla[$rTMP["CODIGOPLA"]]["DESCRIP"]             = $rTMP["DESCRIP"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="NUMEMPRE" name="NUMEMPRE" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarPlantilla) && (count($arrBarVarPlantilla) > 0)) {
                $intContador = 1;
                reset($arrBarVarPlantilla);
                foreach ($arrBarVarPlantilla as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['CODIGOPLA']; ?>" onclick="fntSelectPlantiila('<?php print $intContador; ?>');"><?php echo  $rTMP["value"]['DESCRIP']; ?> </option>

            <?PHP
                    $intContador++;
                }
            }
            ?>
        </select>

        <?PHP
        if (is_array($arrBarVarPlantilla) && (count($arrBarVarPlantilla) > 0)) {
            $intContador = 1;
            reset($arrBarVarPlantilla);
            foreach ($arrBarVarPlantilla as $rTMP['key'] => $rTMP['value']) {
        ?>
                <input type="hidden" class="form-control" id="hid_plan_<?php print $intContador; ?>" name="hid_plan_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CODIGOPLA']; ?>">
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