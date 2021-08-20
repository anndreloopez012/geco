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

    if ($strTipoValidacion == "dropdown_empresa") {

        $arrBarVarEmpresa = array();
        $stmt = "SELECT * FROM EM000001";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["NUMEMPRE"]             = $rTMP["NUMEMPRE"];
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["EMPRESA"]             = $rTMP["EMPRESA"];
        }
        //ibase_free_result($v_query);
?>
        <select class="form-control select2" id="buscarEmpresa" name="buscarEmpresa" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarEmpresa) && (count($arrBarVarEmpresa) > 0)) {
                reset($arrBarVarEmpresa);
                foreach ($arrBarVarEmpresa as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['NUMEMPRE']; ?>"><?php echo  $rTMP["value"]['EMPRESA']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

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
    } else if ($strTipoValidacion == "dropdown_rdm") {

        $arrBarVarRdm = array();
        $stmt = "SELECT NUMRDM,RDM FROM RDMS ORDER BY RDM";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarRdm[$rTMP["NUMRDM"]]["NUMRDM"] = $rTMP["NUMRDM"];
            $arrBarVarRdm[$rTMP["NUMRDM"]]["RDM"] = $rTMP["RDM"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="rdm" name="rdm" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarRdm) && (count($arrBarVarRdm) > 0)) {
                reset($arrBarVarRdm);
                foreach ($arrBarVarRdm as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  trim($rTMP["value"]['RDM']); ?>"><?php echo  $rTMP["value"]['RDM']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_gestor") {

        $arrBarVaruS = array();
        $stmt = "SELECT NIU,USUARIO FROM AXESO ORDER BY USUARIO";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVaruS[$rTMP["NIU"]]["NIU"] = $rTMP["NIU"];
            $arrBarVaruS[$rTMP["NIU"]]["USUARIO"] = $rTMP["USUARIO"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="gestor" name="gestor" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVaruS) && (count($arrBarVaruS) > 0)) {
                reset($arrBarVaruS);
                foreach ($arrBarVaruS as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  trim($rTMP["value"]['USUARIO']); ?>"><?php echo  $rTMP["value"]['USUARIO']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_owner_telefono") {

        $arrBarVarTel = array();
        $stmt = "SELECT DESCRIP, CLAVE FROM ORIGENES ORDER BY DESCRIP";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarTel[$rTMP["CLAVE"]]["CLAVE"] = $rTMP["CLAVE"];
            $arrBarVarTel[$rTMP["CLAVE"]]["DESCRIP"] = $rTMP["DESCRIP"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="ownerTel" name="ownerTel" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarTel) && (count($arrBarVarTel) > 0)) {
                reset($arrBarVarTel);
                foreach ($arrBarVarTel as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  trim($rTMP["value"]['CLAVE']); ?>"><?php echo  $rTMP["value"]['DESCRIP']; ?> </option>
            <?PHP
                }
            }
            ?>
        </select>
        <?PHP

        die();
    } else if ($strTipoValidacion == "tabla_gestion") {

        $buscarFechaDe = isset($_POST["buscarFechaDe"]) ? $_POST["buscarFechaDe"]  : '';
        $buscarFechaHasta = isset($_POST["buscarFechaHasta"]) ? $_POST["buscarFechaHasta"]  : '';
        $FILTRO13 = "";
        if (!empty($buscarFechaDe) && !empty($buscarFechaHasta)) {
            $FILTRO13 = " C.FASIG BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta'";
        }

        $buscarMora = isset($_POST["buscarMora"]) ? $_POST["buscarMora"]  : '';
        $FILTRO1 = "";
        if (!empty($buscarMora)) {
            $FILTRO1 = "AND C.MORA = $buscarMora'";
        }

        $buscarEmpresa = isset($_POST["buscarEmpresa"]) ? $_POST["buscarEmpresa"]  : '';
        $FILTRO2 = "";
        if (!empty($buscarEmpresa)) {
            $FILTRO2 = "AND C.NUMEMPRE = $buscarEmpresa";
        }

        $buscarSaldoVencido = isset($_POST["buscarSaldoVencido"]) ? $_POST["buscarSaldoVencido"]  : '';
        $FILTRO5 = "";
        if (!empty($buscarSaldoVencido)) {
            $FILTRO5 = "AND C.CICLOVEQ = $buscarSaldoVencido";
        }

        $buscarSaldoDe = isset($_POST["buscarSaldoDe"]) ? $_POST["buscarSaldoDe"]  : '';
        $buscarSaldoHasta = isset($_POST["buscarSaldoHasta"]) ? $_POST["buscarSaldoHasta"]  : '';
        $FILTRO6 = "";
        if (!empty($buscarSaldoDe) && !empty($buscarSaldoHasta)) {
            $FILTRO6 = "AND C.SALDO BETWEEN $buscarSaldoDe AND $buscarSaldoHasta";
        }

        $buscargestor = isset($_POST["gestor"]) ? $_POST["gestor"]  : '';
        $FILTRO3 = "";
        if (!empty($buscargestor)) {
            $FILTRO3 = "AND C.GESTORD = $buscargestor";
        }

        $buscarownerTel = isset($_POST["ownerTel"]) ? $_POST["ownerTel"]  : '';
        $FILTRO4 = "";
        if (!empty($buscarownerTel)) {
            $FILTRO4 = "AND T.ORIGEN = $buscarownerTel";
        }

        $buscarOrigen = isset($_POST["buscarOrigen"]) ? $_POST["buscarOrigen"]  : '';
        $FILTRO7 = "";
        if (!empty($buscarOrigen)) {
            $FILTRO7 = "AND C.TIPOLOGI = $buscarOrigen";
        }

        $buscarReceptor = isset($_POST["buscarReceptor"]) ? $_POST["buscarReceptor"]  : '';
        $FILTRO8 = "";
        if (!empty($buscarReceptor)) {
            $FILTRO8 = "AND C.CONCLUSI = $buscarReceptor";
        }

        $buscarTipologia = isset($_POST["buscarTipologia"]) ? $_POST["buscarTipologia"]  : '';
        $FILTRO9 = "";
        if (!empty($strFilterOrigen)) {
            $FILTRO9 = "AND C.RTESTADO = $strFilterOrigen";
        }

        $buscarCategoria = isset($_POST["buscarCategoria"]) ? $_POST["buscarCategoria"]  : '';
        $FILTRO10 = "";
        if (!empty($buscarCategoria)) {
            $FILTRO10 = "AND C.SUBCONCL = $buscarCategoria ";
        }

        $buscarEstado = isset($_POST["buscarEstado"]) ? $_POST["buscarEstado"]  : '';
        $FILTRO11 = "";
        if (!empty($buscarEstado)) {
            $FILTRO11 = "AND C.ESTADO = $buscarEstado";
        }

        $buscarRdm = isset($_POST["rdm"]) ? $_POST["rdm"]  : '';
        $FILTRO12 = "";
        if (!empty($buscarRdm)) {
            $FILTRO12 = "AND C.RDM = $buscarRdm";
        }

        if ($FILTRO13) {
            $arrGestion = array();
            $stmt = "SELECT C.NOMBRE,C.IDENTIFI,C.NIT,C.FECHANAC, C.SUBCONCL, C.LIMITE, C.SALDOACT,C.SALDOACD,C.PAGOMINQ,C.PAGOMIND, T.NUMERO, T.ORIGEN, C.NUMTRANS, C.GESTORD, T.ACTIVO, E.PLANGEST AS PL          
                    FROM GC000001 C
                    LEFT JOIN TELEFONOS T
                    ON C.CODICLIE = T.CODICLIE
                    LEFT JOIN EM000001 E
                    ON C.NUMEMPRE = E.NUMEMPRE
                    WHERE $FILTRO13
                    $FILTRO1
                    $FILTRO2
                    $FILTRO3
                    $FILTRO4
                    $FILTRO5
                    $FILTRO6
                    $FILTRO7
                    $FILTRO8
                    $FILTRO9
                    $FILTRO10
                    $FILTRO11
                    $FILTRO12
                    ORDER BY 14,13,15 DESC";
            //print_r($stmt);
            $query = ibase_prepare($stmt);
            $v_query = ibase_execute($query);
            while ($rTMP = ibase_fetch_assoc($v_query)) {
                $arrGestion[$rTMP["NOMBRE"]]["NOMBRE"]             = $rTMP["NOMBRE"];
                $arrGestion[$rTMP["NOMBRE"]]["NIT"]             = $rTMP["NIT"];
                $arrGestion[$rTMP["NOMBRE"]]["IDENTIFI"]             = $rTMP["IDENTIFI"];
                $arrGestion[$rTMP["NOMBRE"]]["FECHANAC"]             = $rTMP["FECHANAC"];
                $arrGestion[$rTMP["NOMBRE"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
                $arrGestion[$rTMP["NOMBRE"]]["SALDOACT"]             = $rTMP["SALDOACT"];
                $arrGestion[$rTMP["NOMBRE"]]["LIMITE"]             = $rTMP["LIMITE"];
                $arrGestion[$rTMP["NOMBRE"]]["SALDOACD"]             = $rTMP["SALDOACD"];
                $arrGestion[$rTMP["NOMBRE"]]["PAGOMINQ"]             = $rTMP["PAGOMINQ"];
                $arrGestion[$rTMP["NOMBRE"]]["PAGOMIND"]             = $rTMP["PAGOMIND"];
                $arrGestion[$rTMP["NOMBRE"]]["NUMERO"]             = $rTMP["NUMERO"];
                $arrGestion[$rTMP["NOMBRE"]]["ORIGEN"]             = $rTMP["ORIGEN"];
                $arrGestion[$rTMP["NOMBRE"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
                $arrGestion[$rTMP["NOMBRE"]]["GESTORD"]             = $rTMP["GESTORD"];
                $arrGestion[$rTMP["NOMBRE"]]["ACTIVO"]             = $rTMP["ACTIVO"];
                $arrGestion[$rTMP["NOMBRE"]]["PL"]             = $rTMP["PL"];
            }
            //ibase_free_result($v_query);
        ?>

            <div class="col-md-12 tableFixHead">
                <td>
                    <a class="btn btn-secondary btn-block" target="_blank" href="XLS/generacionCampanas.php?buscarFechaDe=<?php echo  $buscarFechaDe; ?>&buscarFechaHasta=<?php echo $buscarFechaHasta; ?>&buscarMora=<?php echo  $buscarMora; ?>&buscarEmpresa=<?php echo  $buscarEmpresa; ?>&buscarSaldoVencido=<?php echo  $buscarSaldoVencido; ?>&buscarSaldoDe=<?php echo  $buscarSaldoDe; ?>&buscarSaldoHasta=<?php echo  $buscarSaldoHasta; ?>&buscargestor=<?php echo  $buscargestor; ?>&buscarownerTel=<?php echo  $buscarownerTel; ?>&buscarOrigen=<?php echo  $buscarOrigen; ?>&buscarReceptor=<?php echo  $buscarReceptor; ?>&buscarTipologia=<?php echo  $buscarTipologia; ?>&buscarCategoria=<?php echo  $buscarCategoria; ?>&buscarEstado=<?php echo  $buscarEstado; ?>&buscarRdm=<?php echo  $buscarRdm; ?>"><i class="fad fa-file-excel"></i></a>
                </td>
                <table id="tableData" class="table table-hover table-sm">
                    <thead>
                        <tr class="table-info">
                            <td>NOMBRE</td>
                            <td>NUMERO</td>
                            <td>ORIGEN</td>
                            <td>NUMTRANS</td>
                            <td>GESTORD</td>
                            <td>ACTIVO</td>
                            <td>PL</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($arrGestion) && (count($arrGestion) > 0)) {
                            $intContador = 1;
                            reset($arrGestion);
                            foreach ($arrGestion as $rTMP['key'] => $rTMP['value']) {
                        ?>
                                <tr>
                                    <td width=10%;><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['NUMERO']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['NUMTRANS']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['ACTIVO']; ?></td>
                                    <td width=10%;><?php echo  $rTMP["value"]['PL']; ?></td>
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
        }

        die();
    }

    die();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>