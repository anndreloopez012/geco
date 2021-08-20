<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    $connect = conectar();

    //VARIABLES DE POST

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "dropdown_origen") {

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
        $buscarOrigen = isset($_POST["buscarOrigen"]) ? $_POST["buscarOrigen"]  : '';

        $strFilterOrigen = "";
        if (!empty($buscarOrigen)) {
            $strFilterOrigen = " AND ( UPPER(G.TIPOLOGI) LIKE UPPER('%{$buscarOrigen}%') ) ";
        }

        $buscarReceptor = isset($_POST["buscarReceptor"]) ? $_POST["buscarReceptor"]  : '';

        $strFilterReceptor = "";
        if (!empty($buscarReceptor)) {
            $strFilterReceptor = " AND ( UPPER(G.CONCLUSI) LIKE UPPER('%{$buscarReceptor}%') ) ";
        }

        $buscarTipologia = isset($_POST["buscarTipologia"]) ? $_POST["buscarTipologia"]  : '';

        $strFilterTipologia = "";
        if (!empty($buscarTipologia)) {
            $strFilterTipologia = " AND ( UPPER(G.RTESTADO) LIKE UPPER('%{$buscarTipologia}%') ) ";
        }

        $buscarCategoria = isset($_POST["buscarCategoria"]) ? $_POST["buscarCategoria"]  : '';

        $strFilterCategoria = "";
        if (!empty($buscarCategoria)) {
            $strFilterCategoria = " AND ( UPPER(G.SUBCONCL) LIKE UPPER('%{$buscarCategoria}%') ) ";
        }

        $buscarEstado = isset($_POST["buscarEstado"]) ? $_POST["buscarEstado"]  : '';

        $strFilterEstado = "";
        if (!empty($buscarEstado)) {
            $strFilterEstado = " AND ( UPPER(G.ESTADO) LIKE UPPER('%{$buscarEstado}%') ) ";
        }


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $buscarTelefono = isset($_POST["buscarTelefono"]) ? $_POST["buscarTelefono"]  : '';

        $strFilterNum = "";
        if (!empty($buscarTelefono)) {
            $strFilterNum = " WHERE ( UPPER(T.NUMERO) LIKE UPPER('%{$buscarTelefono}%') ) ";
        }

        if (!empty($strFilterNum)) {
            $stmt = "SELECT G.NUMEMPRE, G.CODICLIE, G.CLAPROD, G.NOMBRE, G.FASIG, G.FVENCE, G.GESTORD, G.ESTADO, G.NUMTRANS, G.MARCA, T.NUMERO , E.PLANGEST AS PL  
            FROM GC000001 G
            LEFT JOIN EM000001 E
            ON G.NUMEMPRE = E.NUMEMPRE
            LEFT JOIN TELEFONOS T
            ON G.CODICLIE = T.CODICLIE
            $strFilterNum";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $buscargeneral = isset($_POST["buscargeneral"]) ? $_POST["buscargeneral"]  : '';

        $strFilterGeneral = "";
        if (!empty($buscargeneral)) {
            $strFilterGeneral = " AND ( UPPER(G.NUMEMPRE) LIKE UPPER('%{$buscargeneral}%') 
                                    OR UPPER(G.CODICLIE) LIKE UPPER('%{$buscargeneral}%')
                                    OR UPPER(G.CLAPROD) LIKE UPPER('%{$buscargeneral}%')
                                    OR UPPER(G.NOMBRE) LIKE UPPER('%{$buscargeneral}%')
                                    OR UPPER(G.IDENTIFI) LIKE UPPER('%{$buscargeneral}%')
                                    OR UPPER(G.GESTORD) LIKE UPPER('%{$buscargeneral}%') ) ";
        }

        $arrGestion = array();
        if (!empty($strFilterGeneral) || !empty($strFilterOrigen) || !empty($buscarReceptor) || !empty($buscarTipologia) || !empty($buscarCategoria) || !empty($strFilterEstado)) {
            $stmt = "SELECT  G.NUMEMPRE, G.CODICLIE, G.CLAPROD, G.NOMBRE, G.FASIG, G.FVENCE, G.GESTORD, G.ESTADO, G.NUMTRANS, G.MARCA, E.PLANGEST AS PL   
            FROM GC000001 G
            LEFT JOIN EM000001 E
            ON G.NUMEMPRE = E.NUMEMPRE
            WHERE G.NUMTRANS > 0 
            $strFilterOrigen
            $strFilterReceptor
            $strFilterTipologia
            $strFilterCategoria
            $strFilterEstado
            $strFilterGeneral";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
            $arrGestion[$rTMP["NUMTRANS"]]["NUMEMPRE"]             = $rTMP["NUMEMPRE"];
            $arrGestion[$rTMP["NUMTRANS"]]["CODICLIE"]             = $rTMP["CODICLIE"];
            $arrGestion[$rTMP["NUMTRANS"]]["CLAPROD"]             = $rTMP["CLAPROD"];
            $arrGestion[$rTMP["NUMTRANS"]]["NOMBRE"]             = $rTMP["NOMBRE"];
            $arrGestion[$rTMP["NUMTRANS"]]["FASIG"]             = $rTMP["FASIG"];
            $arrGestion[$rTMP["NUMTRANS"]]["FVENCE"]             = $rTMP["FVENCE"];
            $arrGestion[$rTMP["NUMTRANS"]]["GESTORD"]             = $rTMP["GESTORD"];
            $arrGestion[$rTMP["NUMTRANS"]]["ESTADO"]             = $rTMP["ESTADO"];
            $arrGestion[$rTMP["NUMTRANS"]]["PL"]             = $rTMP["PL"];
        }
        //ibase_free_result($v_query);

    ?>

        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td></td>
                        <td>Cliente</td>
                        <td>Cod. Cliente</td>
                        <td>Clave Producto</td>
                        <td>Nombre</td>
                        <td>Asignado</td>
                        <td>Vence</td>
                        <td>Gestor</td>
                        <td>Estado</td>
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
                                <td style="cursor:pointer; width:3%;"><a href="../gestion/gestionOmniLeads.php?pl=<?php echo  $rTMP["value"]['PL']; ?>&tn=0&id=<?php echo  $rTMP["value"]['NUMTRANS']; ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-2x fa-user-headset"></i></a></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['NUMEMPRE']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['FASIG']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['FVENCE']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                                <td style="cursor:pointer;" onclick="fntSelectId('<?php print $intContador; ?>')"><?php echo  $rTMP["value"]['ESTADO']; ?></td>
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
        $stmt = "SELECT NIU, NUMTRANS, FGESTION, HORA, TIPOLOGI, CONCLUSI, RTESTADO, SUBCONCL, OBSERVAC, OWNER FROM GM000001 WHERE NUMTRANS = $numero_caso ORDER BY 1,2";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrMovimiento[$rTMP["NIU"]]["NUMTRANS"]              = $rTMP["NUMTRANS"];
            $arrMovimiento[$rTMP["NIU"]]["FGESTION"]              = $rTMP["FGESTION"];
            $arrMovimiento[$rTMP["NIU"]]["HORA"]              = $rTMP["HORA"];
            $arrMovimiento[$rTMP["NIU"]]["TIPOLOGI"]              = $rTMP["TIPOLOGI"];
            $arrMovimiento[$rTMP["NIU"]]["CONCLUSI"]              = $rTMP["CONCLUSI"];
            $arrMovimiento[$rTMP["NIU"]]["RTESTADO"]              = $rTMP["RTESTADO"];
            $arrMovimiento[$rTMP["NIU"]]["SUBCONCL"]              = $rTMP["SUBCONCL"];
            $arrMovimiento[$rTMP["NIU"]]["OBSERVAC"]              = $rTMP["OBSERVAC"];
            $arrMovimiento[$rTMP["NIU"]]["OWNER"]              = $rTMP["OWNER"];
        }

    ?>

        <div class="col-md-12 tableFixHeadInvestiga">
            <table id="tableData" class="table table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Origen</td>
                        <td>Receptor</td>
                        <td>Tipologia</td>
                        <td>Categoria</td>
                        <td>Observaciones</td>
                        <td>Owner</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrMovimiento) && (count($arrMovimiento) > 0)) {
                        reset($arrMovimiento);
                        foreach ($arrMovimiento as $rTMP['key'] => $rTMP['value']) {
                            $date = $rTMP["value"]['FGESTION'];
                            $date_ = date('d-m-Y', strtotime($date));
                    ?>
                            <tr style="cursor:pointer;">
                                <td width="10%"><?php echo  $date_; ?></td>
                                <td width="5%"><?php echo  $rTMP["value"]['HORA']; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                                <td width="10%"><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                                <td width="40%"><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
                                <td width="5%"><?php echo  $rTMP["value"]['OWNER']; ?></td>
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

    die();
}

?>