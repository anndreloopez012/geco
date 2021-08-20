<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=gestion.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../../../interbase/conexion.php';

$conectar = conectar();

$username  = $_GET["username"];
//print_r($username ."----------username </br>" );
$rt = isset($_GET["rt"]) ? $_GET["rt"]  : '';

$buscarOrigen = isset($_GET["buscarOrigen"]) ? $_GET["buscarOrigen"]  : '';

$strFilterOrigen = "";
if (!empty($buscarOrigen)) {
    $strFilterOrigen = " AND ( UPPER(C.TIPOLOGI) LIKE UPPER('%{$buscarOrigen}%') ) ";
}

$buscarReceptor = isset($_GET["buscarReceptor"]) ? $_GET["buscarReceptor"]  : '';

$strFilterReceptor = "";
if (!empty($buscarReceptor)) {
    $strFilterReceptor = " AND ( UPPER(C.CONCLUSI) LIKE UPPER('%{$buscarReceptor}%') ) ";
}

$buscarTipologia = isset($_GET["buscarTipologia"]) ? $_GET["buscarTipologia"]  : '';

$strFilterTipologia = "";
if (!empty($buscarTipologia)) {
    $strFilterTipologia = " AND ( UPPER(C.RTESTADO) LIKE UPPER('%{$buscarTipologia}%') ) ";
}

$buscarCategoria = isset($_GET["buscarCategoria"]) ? $_GET["buscarCategoria"]  : '';

$strFilterCategoria = "";
if (!empty($buscarCategoria)) {
    $strFilterCategoria = " AND ( UPPER(C.SUBCONCL) LIKE UPPER('%{$buscarCategoria}%') ) ";
}

$buscarEstado = isset($_GET["buscarEstado"]) ? $_GET["buscarEstado"]  : '';

$strFilterEstado = "";
if (!empty($buscarEstado)) {
    $strFilterEstado = " AND ( UPPER(C.ESTADO) LIKE UPPER('%{$buscarEstado}%') ) ";
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$buscargeneral = isset($_GET["buscargeneral"]) ? $_GET["buscargeneral"]  : '';

$strFilterGeneral = "";
if (!empty($buscargeneral)) {
    $strFilterGeneral = " AND ( UPPER(C.NOMBRE) LIKE UPPER('%{$buscargeneral}%') 
                            OR UPPER(C.CODICLIE) LIKE UPPER('%{$buscargeneral}%')
                            OR UPPER(C.CLAPROD) LIKE UPPER('%{$buscargeneral}%') ) ";
}

$arrGestion = array();
$stmt = "SELECT ENCA.CODIEMPR, ENCA.CODICLIE, ENCA.TELEFONO, ENCA.CLAPROD, ENCA.NOMBRE, ENCA.DIREC, ENCA.MUNI, ENCA.DEPTO, ENCA.FASIG, ENCA.SALDO, ENCA.SALDOVEQ, ENCA.PAGOMINQ, ENCA.CAPATRAS, ENCA.TOTATRAS, ENCA.SALDOD, ENCA.SALDOVED, ENCA.PAGOMIND, ENCA.PAGOS, ENCA.PAGOSD, ENCA.SALDOACT, ENCA.SALDOACD, ENCA.CICLOVEQ, ENCA.TIPOLOGI, ENCA.CONCLUSI, ENCA.SUBCONCL, ENCA.RTESTADO, G.FGESTION, ENCA.DIASINGESTION, ENCA.THORA, G.OBSERVAC AS TOBSERVAC, ENCA.CANTGEST, ENCA.GESTORD, G.OWNER, ENCA.EXPEDIEN, ENCA.NUMTRANS, ENCA.ESTADO, ENCA.RDM, G.FECHAPP1, G.MONTOPP, ENCA.RESALTAD
FROM (	SELECT C.CODIEMPR, C.CODICLIE, C.TELEFONO, C.CLAPROD, C.NOMBRE, C.DIREC, C.MUNI, C.DEPTO, C.FASIG, C.SALDO, C.SALDOVEQ, C.PAGOMINQ, C.CAPATRAS, C.TOTATRAS, C.SALDOD, C.SALDOVED, C.PAGOMIND, C.PAGOS, C.PAGOSD, C.SALDOACT, C.SALDOACD, C.CICLOVEQ, C.TIPOLOGI, C.CONCLUSI, C.SUBCONCL, C.RTESTADO, CAST(0 AS INT) AS DIASINGESTION, MAX(G.HORA) AS THORA, C.CANTGEST, C.GESTORD, C.EXPEDIEN, C.NUMTRANS, C.ESTADO, C.RDM, S.RESALTAD, MAX(G.NIU) AS NIU
FROM GC000001 C
LEFT JOIN GM000001 G
ON C.NUMTRANS = G.NUMTRANS AND C.FULTGEST = G.FGESTION
LEFT JOIN SC000001 S
ON C.SUBCONCL = S.SUBCONCL
WHERE C.GESTORD = '$username'
$strFilterGeneral
$strFilterOrigen
$strFilterReceptor
$strFilterTipologia
$strFilterCategoria
$strFilterEstado
GROUP BY C.CODIEMPR, C.CODICLIE, C.TELEFONO, C.CLAPROD, C.NOMBRE, C.DIREC, C.MUNI, C.DEPTO, C.FASIG, C.SALDO, C.SALDOVEQ, C.PAGOMINQ, C.CAPATRAS, C.TOTATRAS, C.SALDOD, C.SALDOVED, C.PAGOMIND, C.PAGOS, C.PAGOSD, C.SALDOACT, C.SALDOACD, C.CICLOVEQ, C.TIPOLOGI, C.CONCLUSI, C.SUBCONCL, C.RTESTADO, DIASINGESTION, C.CANTGEST, C.GESTORD, C.EXPEDIEN, C.NUMTRANS, C.ESTADO, C.RDM, S.RESALTAD
ORDER BY 5,4,28,29) ENCA
LEFT JOIN GM000001 G
ON G.NIU = ENCA.NIU";
//print_r($stmt);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestion[$rTMP["CODICLIE"]]["CODIEMPR"]             = $rTMP["CODIEMPR"];
    $arrGestion[$rTMP["CODICLIE"]]["CODICLIE"]             = $rTMP["CODICLIE"];
    $arrGestion[$rTMP["CODICLIE"]]["TELEFONO"]             = $rTMP["TELEFONO"];
    $arrGestion[$rTMP["CODICLIE"]]["CLAPROD"]             = $rTMP["CLAPROD"];
    $arrGestion[$rTMP["CODICLIE"]]["NOMBRE"]             = $rTMP["NOMBRE"];
    $arrGestion[$rTMP["CODICLIE"]]["DIREC"]             = $rTMP["DIREC"];
    $arrGestion[$rTMP["CODICLIE"]]["MUNI"]             = $rTMP["MUNI"];
    $arrGestion[$rTMP["CODICLIE"]]["DEPTO"]             = $rTMP["DEPTO"];
    $arrGestion[$rTMP["CODICLIE"]]["FASIG"]             = $rTMP["FASIG"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDO"]             = $rTMP["SALDO"];
    $arrGestion[$rTMP["CODICLIE"]]["CAPATRAS"]             = $rTMP["CAPATRAS"];
    $arrGestion[$rTMP["CODICLIE"]]["PAGOMINQ"]             = $rTMP["PAGOMINQ"];
    $arrGestion[$rTMP["CODICLIE"]]["TOTATRAS"]             = $rTMP["TOTATRAS"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDOD"]             = $rTMP["SALDOD"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDOVED"]             = $rTMP["SALDOVED"];
    $arrGestion[$rTMP["CODICLIE"]]["PAGOMIND"]             = $rTMP["PAGOMIND"];
    $arrGestion[$rTMP["CODICLIE"]]["PAGOS"]             = $rTMP["PAGOS"];
    $arrGestion[$rTMP["CODICLIE"]]["PAGOSD"]             = $rTMP["PAGOSD"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDOACT"]             = $rTMP["SALDOACT"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDOACD"]             = $rTMP["SALDOACD"];
    $arrGestion[$rTMP["CODICLIE"]]["CICLOVEQ"]             = $rTMP["CICLOVEQ"];
    $arrGestion[$rTMP["CODICLIE"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
    $arrGestion[$rTMP["CODICLIE"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
    $arrGestion[$rTMP["CODICLIE"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
    $arrGestion[$rTMP["CODICLIE"]]["RTESTADO"]             = $rTMP["RTESTADO"];
    $arrGestion[$rTMP["CODICLIE"]]["FGESTION"]             = $rTMP["FGESTION"];
    $arrGestion[$rTMP["CODICLIE"]]["CANTGEST"]             = $rTMP["CANTGEST"];
    $arrGestion[$rTMP["CODICLIE"]]["GESTORD"]             = $rTMP["GESTORD"];
    $arrGestion[$rTMP["CODICLIE"]]["OWNER"]             = $rTMP["OWNER"];
    $arrGestion[$rTMP["CODICLIE"]]["EXPEDIEN"]             = $rTMP["EXPEDIEN"];
    $arrGestion[$rTMP["CODICLIE"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
    $arrGestion[$rTMP["CODICLIE"]]["FECHAPP1"]             = $rTMP["FECHAPP1"];
    $arrGestion[$rTMP["CODICLIE"]]["MONTOPP"]             = $rTMP["MONTOPP"];
    $arrGestion[$rTMP["CODICLIE"]]["DIASINGESTION"]             = $rTMP["DIASINGESTION"];
    $arrGestion[$rTMP["CODICLIE"]]["THORA"]             = $rTMP["THORA"];
    $arrGestion[$rTMP["CODICLIE"]]["TOBSERVAC"]             = $rTMP["TOBSERVAC"];
    $arrGestion[$rTMP["CODICLIE"]]["ESTADO"]             = $rTMP["ESTADO"];
    $arrGestion[$rTMP["CODICLIE"]]["RDM"]             = $rTMP["RDM"];
    $arrGestion[$rTMP["CODICLIE"]]["RESALTAD"]             = $rTMP["RESALTAD"];
    $arrGestion[$rTMP["CODICLIE"]]["SALDOVEQ"]             = $rTMP["SALDOVEQ"];
}
//ibase_free_result($v_query);

?>
<style>
    .num {
        mso-number-format:General;
    }
    .text{
        mso-number-format:"\@";/*force text*/
    }
</style>
<table cellspacing="0" cellpadding="0">
    <thead>
        <tr style="background:#D6EAF8; color:black;">
            <td width=10%>CODIGO EMPRESA</td>
            <td width=17%>CODIGO CLIENTE</td>
            <td width=13%>TELEFONO</td>
            <td width=24%>CLAVE DE PRODUCTO</td>
            <td width=53%>NOMBRE</td>
            <td width=96%>DIRECCION</td>
            <td width=19%>MUNICIPIO</td>
            <td width=19%>DEPARTAMENTO</td>
            <td width=10%>ASIGNADO</td>
            <td width=11%>SALDO</td>
            <td width=16%>SALDO VENCIDO Q.</td>
            <td width=14%>PAGO MINIMO Q.</td>
            <td width=17%>CAPITAL ATRAZADO</td>
            <td width=16%>TOTAL ATRAZADO</td>
            <td width=16%>SALDO $.</td>
            <td width=16%>SALDO VENCIDO $.</td>
            <td width=16%>PAGO MINIMO $.</td>
            <td width=16%>PAGOS</td>
            <td width=16%>PAGOS $.</td>
            <td width=16%>SALDO ACTUAL</td>
            <td width=16%>SALDO ACTUAL $.</td>
            <td width=16%>CICLO VENCIDO Q.</td>
            <td width=22%>ORIGEN</td>
            <td width=22%>RECEPTOR</td>
            <td width=37%>CATEGORIA</td>
            <td width=21%>TIPOLOGIA</td>
            <td width=14%>FECHA GESTION</td>
            <td width=10%>DIAS SIN GESTION</td>
            <td width=10%>HORA</td>
            <td width=255%>OBSERVACIONES</td>
            <td width=10%>GESTIONES</td>
            <td width=13%>GESTOR D</td>
            <td width=13%>OWNER</td>
            <td width=11%>EXPEDIENTE</td>
            <td width=13%>TRANSACCION</td>
            <td width=13%>ESTADO</td>
            <td width=13%>RDM</td>
            <td width=18%>F.PROMESA/ALARMA</td>
            <td width=18%>MONTO PROMESA</td>
            <td width=18%>CODCOL</td>
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
                    <td class='text' ><?php echo  $rTMP["value"]['CODIEMPR']; ?>  </td>
                    <td class='text' ><?php echo  $rTMP["value"]['CODICLIE']; ?>  </td>
                    <td><?php echo  $rTMP["value"]['TELEFONO']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CLAPROD']; ?>  </td>
                    <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                    <td><?php echo  $rTMP["value"]['DIREC']; ?></td>
                    <td><?php echo  $rTMP["value"]['MUNI']; ?></td>
                    <td><?php echo  $rTMP["value"]['DEPTO']; ?></td>
                    <td><?php echo  $rTMP["value"]['FASIG']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDO']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDOVEQ']; ?></td>
                    <td><?php echo  $rTMP["value"]['PAGOMINQ']; ?></td>
                    <td><?php echo  $rTMP["value"]['CAPATRAS']; ?></td>
                    <td><?php echo  $rTMP["value"]['TOTATRAS']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDOD']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDOVED']; ?></td>
                    <td><?php echo  $rTMP["value"]['PAGOMIND']; ?></td>
                    <td><?php echo  $rTMP["value"]['PAGOS']; ?></td>
                    <td><?php echo  $rTMP["value"]['PAGOSD']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDOACT']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDOACD']; ?></td>
                    <td><?php echo  $rTMP["value"]['CICLOVEQ']; ?></td>
                    <td><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                    <td><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                    <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                    <td><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                    <td><?php echo  $rTMP["value"]['FGESTION']; ?></td>
                    <td><?php echo  $rTMP["value"]['DIASINGESTION']; ?></td>
                    <td><?php echo  $rTMP["value"]['THORA']; ?></td>
                    <td><?php echo  $rTMP["value"]['TOBSERVAC']; ?></td>
                    <td><?php echo  $rTMP["value"]['CANTGEST']; ?></td>
                    <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                    <td><?php echo  $rTMP["value"]['OWNER']; ?></td>
                    <td><?php echo  $rTMP["value"]['EXPEDIEN']; ?></td>
                    <td><?php echo  $rTMP["value"]['NUMTRANS']; ?></td>
                    <td><?php echo  $rTMP["value"]['ESTADO']; ?></td>
                    <td><?php echo  $rTMP["value"]['RDM']; ?></td>
                    <td><?php echo  $rTMP["value"]['FECHAPP1']; ?></td>
                    <td><?php echo  $rTMP["value"]['MONTOPP']; ?></td>
                    <td><?php echo  $rTMP["value"]['RESALTAD']; ?></td>
                </tr>

        <?PHP
                $intContador++;
            }
        }
    
        ?>
    </tbody>
</table>