<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=telefonos.xls");
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
////////////////// FALTAN ESTOS FILTROS 
//$strFilter11S
//$strFilter22S
//$strFilter33S
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$arrGestion = array();
$stmt = "SELECT C.CODIEMPR, C.CODICLIE, C.CLAPROD, C.NOMBRE, C.TIPOLOGI, C.CONCLUSI, C.RTESTADO, C.SUBCONCL, C.ESTADO, C.IDENTIFI, C.NIT, T.NUMERO, T.ACTIVO, T.ORIGEN, T.PROPIETARIO, T.NIU, C.GESTORD
        FROM $buscarBaseC c
        LEFT JOIN TELEFONOS T
        ON C.CODICLIE = T.CODICLIE
        $strFilter11
        $strFilter22
        $strFilter33
        $strFilter44
        $strFilter55
        $strFilter77
        $strFilter88
        $strFilter44S
        $strFilter55S
        $strFilter66S
        ORDER BY 3,4";
        //print_r($stmt);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestion[$rTMP["NIU"]]["CODIEMPR"]             = $rTMP["CODIEMPR"];
    $arrGestion[$rTMP["NIU"]]["CODICLIE"]             = $rTMP["CODICLIE"];
    $arrGestion[$rTMP["NIU"]]["CLAPROD"]             = $rTMP["CLAPROD"];
    $arrGestion[$rTMP["NIU"]]["NOMBRE"]             = $rTMP["NOMBRE"];
    $arrGestion[$rTMP["NIU"]]["TIPOLOGI"]             = $rTMP["TIPOLOGI"];
    $arrGestion[$rTMP["NIU"]]["CONCLUSI"]             = $rTMP["CONCLUSI"];
    $arrGestion[$rTMP["NIU"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
    $arrGestion[$rTMP["NIU"]]["RTESTADO"]             = $rTMP["RTESTADO"];
    $arrGestion[$rTMP["NIU"]]["ESTADO"]             = $rTMP["ESTADO"];
    $arrGestion[$rTMP["NIU"]]["IDENTIFI"]             = $rTMP["IDENTIFI"];
    $arrGestion[$rTMP["NIU"]]["NIT"]             = $rTMP["NIT"];
    $arrGestion[$rTMP["NIU"]]["NUMERO"]             = $rTMP["NUMERO"];
    $arrGestion[$rTMP["NIU"]]["ACTIVO"]             = $rTMP["ACTIVO"];
    $arrGestion[$rTMP["NIU"]]["ORIGEN"]             = $rTMP["ORIGEN"];
    $arrGestion[$rTMP["NIU"]]["PROPIETARIO"]             = $rTMP["PROPIETARIO"];
    $arrGestion[$rTMP["NIU"]]["GESTORD"]             = $rTMP["GESTORD"];
   
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
            <td width=%30>CODIGO CLIENTE</td>
            <td width=%30>CLAVE DE PRODUCTO</td>
            <td width=%30>NOMBRE</td>
            <td width=%30>ORIGEN</td>
            <td width=%30>RECEPTOR</td>
            <td width=%30>CATEGORIA</td>
            <td width=%30>TIPOLOGIA</td>
            <td width=%15>ESTADO</td>
            <td width=%20>IDENTIFICACION</td>
            <td width=%25>No.DE NIT</td>
            <td width=%10>No.TELEFONO</td>
            <td width=%10>ACTIVO</td>
            <td width=%10>TT</td>
            <td width=%50>OWNER TELEFONO</td>
            <td width=%10>GESTOR</td>
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
                    <td class='text'><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
                    <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                    <td><?php echo  $rTMP["value"]['TIPOLOGI']; ?></td>
                    <td><?php echo  $rTMP["value"]['CONCLUSI']; ?></td>
                    <td><?php echo  $rTMP["value"]['RTESTADO']; ?></td>
                    <td><?php echo  $rTMP["value"]['SUBCONCL']; ?></td>
                    <td><?php echo  $rTMP["value"]['ESTADO']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['IDENTIFI']; ?></td>
                    <td><?php echo  $rTMP["value"]['NIT']; ?></td>
                    <td><?php echo  $rTMP["value"]['NUMERO']; ?></td>
                    <td><?php echo  $rTMP["value"]['ACTIVO']; ?></td>
                    <td><?php echo  $rTMP["value"]['ORIGEN']; ?></td>
                    <td><?php echo  $rTMP["value"]['PROPIETARIO']; ?></td>
                    <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                </tr>

        <?PHP
                $intContador++;
            }
        }
        ?>
    </tbody>
</table>