<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=gestionXnombre.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../../../interbase/conexion.php';

$conectar = conectar();

$username  = $_GET["username"];
//print_r($username ."----------username </br>" );
$rt = isset($_GET["rt"]) ? $_GET["rt"]  : '';

$buscarOrigen = isset($_GET["buscarOrigen"]) ? $_GET["buscarOrigen"]  : '';
$buscarReceptor = isset($_GET["buscarReceptor"]) ? $_GET["buscarReceptor"]  : '';
$buscarTipologia = isset($_GET["buscarTipologia"]) ? $_GET["buscarTipologia"]  : '';
$buscarCategoria = isset($_GET["buscarCategoria"]) ? $_GET["buscarCategoria"]  : '';
$buscarEstado = isset($_GET["buscarEstado"]) ? $_GET["buscarEstado"]  : '';

$buscarBaseC = isset($_GET["buscarBaseC"]) ? $_GET["buscarBaseC"]  : '';
$buscarBaseG = isset($_GET["buscarBaseG"]) ? $_GET["buscarBaseG"]  : '';
$buscarTipoFecha = isset($_GET["buscarTipoFecha"]) ? $_GET["buscarTipoFecha"]  : '';
$buscarFechaDe = isset($_GET["buscarFechaDe"]) ? $_GET["buscarFechaDe"]  : '';
$buscarFechaHasta = isset($_GET["buscarFechaHasta"]) ? $_GET["buscarFechaHasta"]  : '';
$buscarMora = isset($_GET["buscarMora"]) ? $_GET["buscarMora"]  : '';
$buscarEmpresa = isset($_GET["buscarEmpresa"]) ? $_GET["buscarEmpresa"]  : '';
$buscarSaldoVencido = isset($_GET["buscarSaldoVencido"]) ? $_GET["buscarSaldoVencido"]  : '';
$buscarSaldoDe = isset($_GET["buscarSaldoDe"]) ? $_GET["buscarSaldoDe"]  : '';
$buscarSaldoHasta = isset($_GET["buscarSaldoHasta"]) ? $_GET["buscarSaldoHasta"]  : '';
$buscarCliente = isset($_GET["buscarCliente"]) ? $_GET["buscarCliente"]  : '';
$buscarNombre = isset($_GET["buscarNombre"]) ? $_GET["buscarNombre"]  : '';

//ASIGNACION FILTRO11 
$strFilter11 = "";
//if ($buscarTipoFecha == 1) {
//    $strFilter11 = "WHERE C.FASIG BETWEEN '$buscarFechaDe 'AND '$buscarFechaHasta'  ";
//}
////RECEPCION	FILTRO11 
//else if ($buscarTipoFecha == 2) {
//    $strFilter11 = "WHERE C.FRECEPCI BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta' ";
//}
//GESTION FILTRO11 
 if ($buscarTipoFecha) {
    $strFilter11 = "WHERE G.FGESTION BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE) ";
}
//MORA FILTRO22 
$strFilter22 = "";
if (!empty($buscarMora)) {
    $strFilter22 = " AND C.MORA = $buscarMora";
}
//EMPRESA FILTRO33
$strFilter33 = "";
if (!empty($buscarEmpresa)) {
    $strFilter33 = "AND C.NUMEMPRE = '$buscarEmpresa' ";
}
//CICLO VENCIDO FILTRO77
$strFilter77 = "";
if (!empty($buscarSaldoVencido)) {
    $strFilter77 = "AND C.CICLOVEQ = $buscarSaldoVencido";
}
//SALDO INICIAL FILTRO88
$strFilter88 = "";
if (!empty($buscarSaldoDe) || !empty($buscarSaldoHasta)) {
    $strFilter88 = "AND C.SALDO BETWEEN $buscarSaldoDe AND $buscarSaldoHasta";
}
//CODIGO CLIENTE FILTRO55
$strFilter55 = "";
if (!empty($buscarCliente)) {
    $strFilter55 = "AND UPPER(C.CODICLIE) LIKE UPPER('$buscarCliente%') ";
}
//NOMBRE FILTRO44 
$strFilter44 = "";
if (!empty($buscarNombre)) {
    $strFilter44 = " AND UPPER(C.NOMBRE) LIKE UPPER('$buscarNombre%')  ";
}
//ORIGEN FILTRO11S
$strFilter115 = "";
if (!empty($buscarOrigen)) {
    $strFilter115 = " AND C.TIPOLOGI = '$buscarOrigen'  ";
}
//ORIGEN FILTRO11S
$strFilter11G = "";
if (!empty($buscarOrigen)) {
    $strFilter11G = " AND G.TIPOLOGI = '$buscarOrigen'  ";
}
// ORIGEN FILTRO1SG 
$strFilter15G = "";
if (!empty($buscarOrigen)) {
    $strFilter15G = " AND G.TIPOLOGI = '$buscarOrigen' ";
}
//RECEPTOR FILTRO22S
$strFilter225 = "";
if (!empty($buscarReceptor)) {
    $strFilter225 = " AND C.CONCLUSI = '$buscarReceptor' ";
}
// RECEPTOR FILTRO22G 
$strFilter22G = "";
if (!empty($buscarReceptor)) {
    $strFilter22G = "AND G.CONCLUSI = '$buscarReceptor' ";
}
//TIPOLOGIA FILTRO33S 
$strFilter335 = "";
if (!empty($buscarTipologia)) {
    $strFilter335 = "AND C.RTESTADO = '$buscarTipologia'";
}
//TIPOLOGIA FILTRO33G
$strFilter33G = "";
if (!empty($buscarTipologia)) {
    $strFilter33G = " AND G.RTESTADO = '$buscarTipologia' ";
}
//CATEGORIA FILTRO44S 
$strFilter44S = "";
if (!empty($buscarCategoria)) {
    $strFilter44S = "AND C.SUBCONCL = '$buscarCategoria'";
}
//CATEGORIA FILTRO44G 
$strFilter44G = "";
if (!empty($buscarCategoria)) {
    $strFilter44G = "AND G.SUBCONCL = '$buscarCategoria'";
}
//ESTADO FILTRO55S 
$strFilter55S = "";
if (!empty($buscarEstado)) {
    $strFilter55S = " AND C.ESTADO = '$buscarEstado'";
}
//RDM FILTRO66S
$strFilter66S = "";
if (!empty($BRDM)) {
    $strFilter66S = "AND C.RDM = '$BRDM' ";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$arrGestion = array();
$stmt = "SELECT G.NIU,C.CODIEMPR, C.CODICLIE, C.TELEFONO, C.CLAPROD, C.NOMBRE, C.DIREC, C.MUNI, C.DEPTO, C.FASIG, C.SALDO, C.SALDOVEQ, C.PAGOMINQ, 
     C.CAPATRAS, C.TOTATRAS, C.SALDOD, C.SALDOVED, C.PAGOMIND, C.PAGOS, C.PAGOSD, C.SALDOACT, C.SALDOACD, C.CICLOVEQ, C.OWNER, G.TIPOLOGI, G.CONCLUSI, 
     G.SUBCONCL, G.RTESTADO, G.FGESTION, SUBSTRING(G.HORA FROM 1 FOR 8) AS HORA, G.OBSERVAC, C.CANTGEST, C.GESTORD, C.GESTORN, C.EXPEDIEN, C.NUMTRANS
	FROM $buscarBaseC C
	LEFT JOIN $buscarBaseG G
	ON C.NUMTRANS = G.NUMTRANS 
    $strFilter11
    $strFilter44
    $strFilter55
    $strFilter77
    $strFilter88
    $strFilter11G
    $strFilter22G
    $strFilter33G
    $strFilter44G
	ORDER BY 5,4,27,28";
//print_r($stmt);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestion[$rTMP["NIU"]]["CODIEMPR"]             = $rTMP["CODIEMPR"];
    $arrGestion[$rTMP["NIU"]]["CODICLIE"]             = $rTMP["CODICLIE"];
    $arrGestion[$rTMP["NIU"]]["TELEFONO"]             = $rTMP["TELEFONO"];
    $arrGestion[$rTMP["NIU"]]["CLAPROD"]             = $rTMP["CLAPROD"];
    $arrGestion[$rTMP["NIU"]]["NOMBRE"]             = $rTMP["NOMBRE"];
    $arrGestion[$rTMP["NIU"]]["DIREC"]             = $rTMP["DIREC"];
    $arrGestion[$rTMP["NIU"]]["MUNI"]             = $rTMP["MUNI"];
    $arrGestion[$rTMP["NIU"]]["DEPTO"]             = $rTMP["DEPTO"];
    $arrGestion[$rTMP["NIU"]]["FASIG"]             = $rTMP["FASIG"];
    $arrGestion[$rTMP["NIU"]]["SALDO"]             = $rTMP["SALDO"];
    $arrGestion[$rTMP["NIU"]]["CAPATRAS"]             = $rTMP["CAPATRAS"];
    $arrGestion[$rTMP["NIU"]]["PAGOMINQ"]             = $rTMP["PAGOMINQ"];
    $arrGestion[$rTMP["NIU"]]["TOTATRAS"]             = $rTMP["TOTATRAS"];
    $arrGestion[$rTMP["NIU"]]["SALDOD"]             = $rTMP["SALDOD"];
    $arrGestion[$rTMP["NIU"]]["SALDOVED"]             = $rTMP["SALDOVED"];
    $arrGestion[$rTMP["NIU"]]["PAGOMIND"]             = $rTMP["PAGOMIND"];
    $arrGestion[$rTMP["NIU"]]["PAGOS"]             = $rTMP["PAGOS"];
    $arrGestion[$rTMP["NIU"]]["PAGOSD"]             = $rTMP["PAGOSD"];
    $arrGestion[$rTMP["NIU"]]["SALDOACT"]             = $rTMP["SALDOACT"];
    $arrGestion[$rTMP["NIU"]]["SALDOACD"]             = $rTMP["SALDOACD"];
    $arrGestion[$rTMP["NIU"]]["CICLOVEQ"]             = $rTMP["CICLOVEQ"];
    $arrGestion[$rTMP["NIU"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
    $arrGestion[$rTMP["NIU"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
    $arrGestion[$rTMP["NIU"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
    $arrGestion[$rTMP["NIU"]]["RTESTADO"]             = $rTMP["RTESTADO"];
    $arrGestion[$rTMP["NIU"]]["FGESTION"]             = $rTMP["FGESTION"];
    $arrGestion[$rTMP["NIU"]]["HORA"]             = $rTMP["HORA"];
    $arrGestion[$rTMP["NIU"]]["OBSERVAC"]             = $rTMP["OBSERVAC"];
    $arrGestion[$rTMP["NIU"]]["CANTGEST"]             = $rTMP["CANTGEST"];
    $arrGestion[$rTMP["NIU"]]["GESTORD"]             = $rTMP["GESTORD"];
    $arrGestion[$rTMP["NIU"]]["OWNER"]             = $rTMP["OWNER"];
    $arrGestion[$rTMP["NIU"]]["EXPEDIEN"]             = $rTMP["EXPEDIEN"];
    $arrGestion[$rTMP["NIU"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
    $arrGestion[$rTMP["NIU"]]["SALDOVEQ"]             = $rTMP["SALDOVEQ"];
  
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
           <td width=10%>CODIEMPR</td>
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
           <td width=14% >PAGO MINIMO Q.</td>
           <td width=17%>CAPITAL ATRAZADO</td>
           <td width=16%>TOTAL ATRAZADO</td>
           <td width=16%>SALDO $.</td>
           <td width=16%>SALDO VENCIDO $.</td>
           <td width=16%>PAGO MINIMO $.</td>
           <td width=16%>PAGOS</td>
           <td width=16%>PAGOS $.</td>
           <td width=16%>SALDO ACTUAL</td>
           <td width=16%>SALDO ACTUAL $.</td>
           <td width=16% >CICLO VENCIDO Q.</td>
           <td width=22%>ORIGEN</td>
           <td width=22%>RECEPTOR</td>
           <td width=37%>CATEGORIA</td>
           <td width=21%>TIPOLOGIA</td>
           <td width=14%>FECHA GESTION</td>
           <td width=10%>HORA</td>
           <td width=255%>OBSERVACIONES</td>
           <td width=10%>GESTIONES</td>
           <td width=13%>GESTOR</td>
           <td width=13%>OWNER</td>
           <td width=11%>EXPEDIENTE</td>
           <td width=13%>TRANSACCION</td>
         
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
                    <td class='text'><?php echo  $rTMP["value"]['CODIEMPR']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['TELEFONO']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
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
                    <td><?php echo  $rTMP["value"]['HORA']; ?></td>
                    <td><?php echo  $rTMP["value"]['OBSERVAC']; ?></td>
                    <td><?php echo  $rTMP["value"]['CANTGEST']; ?></td>
                    <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                    <td><?php echo  $rTMP["value"]['OWNER']; ?></td>
                    <td><?php echo  $rTMP["value"]['EXPEDIEN']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['NUMTRANS']; ?></td>
                  
                </tr>

        <?PHP
                $intContador++;
            }
        }
        ?>
    </tbody>
</table>