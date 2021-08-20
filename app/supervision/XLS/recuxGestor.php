<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=recuperacionXgestor.xls");
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
if ($buscarTipoFecha == 1) {
    $strFilter11 = "WHERE C.FASIG BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE)   ";
}
//RECEPCION	FILTRO11 
else if ($buscarTipoFecha == 2) {
    $strFilter11 = "WHERE C.FRECEPCI BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE) ";
}
//GESTION FILTRO11 
else if ($buscarTipoFecha == 3) {
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
    $strFilter55 = "AND C.CODICLIE LIKE '$buscarCliente' ";
}
//NOMBRE FILTRO44 
$strFilter44 = "";
if (!empty($buscarNombre)) {
    $strFilter44 = " AND C.NOMBRE LIKE '$buscarNombre'  ";
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
$stmt = "SELECT ENCA2.GESTORD, ENCA2.TCUENTAS, ENCA2.TSALDO, ENCA2.TCUENTASREC, ENCA2.TSALDOREC, CAST((ENCA2.TCUENTASREC * 100 / ENCA2.TCUENTAS) AS NUMERIC(12,2)) AS PCASOSRE, CAST((ENCA2.TSALDOREC * 100 / ENCA2.TSALDO) AS NUMERIC(12,2)) AS PSALDORE
        FROM (	SELECT ENCA.GESTORD, ENCA.TCUENTAS, ENCA.TSALDO, CAST(COUNT(C.GESTORD) AS NUMERIC(12,0)) AS TCUENTASREC, SUM(C.PAGOS) AS TSALDOREC
        FROM GC000001 C
        LEFT JOIN (	SELECT C.GESTORD, CAST(COUNT(C.GESTORD) AS NUMERIC(12,0)) AS TCUENTAS, SUM(C.SALDO) AS TSALDO
        FROM GC000001 C
        WHERE FASIG BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta'
        GROUP BY C.GESTORD
        ORDER BY C.GESTORD) ENCA
        ON C.GESTORD = ENCA.GESTORD
        WHERE FASIG BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta' AND C.PAGOS > 0.00
        GROUP BY ENCA.GESTORD, ENCA.TCUENTAS, ENCA.TSALDO
        ORDER BY ENCA.GESTORD) ENCA2
        ORDER BY ENCA2.GESTORD";
//print_r($stmt);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestion[$rTMP["GESTORD"]]["GESTORD"]             = $rTMP["GESTORD"];
    $arrGestion[$rTMP["GESTORD"]]["TCUENTAS"]             = $rTMP["TCUENTAS"];
    $arrGestion[$rTMP["GESTORD"]]["TSALDO"]             = $rTMP["TSALDO"];
    $arrGestion[$rTMP["GESTORD"]]["TCUENTASREC"]             = $rTMP["TCUENTASREC"];
    $arrGestion[$rTMP["GESTORD"]]["TSALDOREC"]             = $rTMP["TSALDOREC"];
    $arrGestion[$rTMP["GESTORD"]]["PCASOSRE"]             = $rTMP["PCASOSRE"];
    $arrGestion[$rTMP["GESTORD"]]["PSALDORE"]             = $rTMP["PSALDORE"];
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
            <td width=35%>Gestor</td>
            <td class="text" width=15%>Cuentas</td>
            <td width=15%>Asignado</td>
            <td class="text" width=15%>Cuentas Rec</td>
            <td width=20%>Monto REC</td>
            <td width=20%>%Ctas. Rec</td>
            <td width=20%>%Saldo Rec</td>

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
                    <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                    <td><?php echo  $rTMP["value"]['TCUENTAS']; ?></td>
                    <td><?php echo  $rTMP["value"]['TSALDO']; ?></td>
                    <td><?php echo  $rTMP["value"]['TCUENTASREC']; ?></td>
                    <td><?php echo  $rTMP["value"]['TSALDOREC']; ?></td>
                    <td><?php echo  $rTMP["value"]['PCASOSRE']; ?></td>
                    <td><?php echo  $rTMP["value"]['PSALDORE']; ?></td>

                </tr>

        <?PHP
                $intContador++;
            }
        }
        ?>
    </tbody>
</table>