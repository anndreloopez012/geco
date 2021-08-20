<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=pagosXconfirmar.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../../../interbase/conexion.php';

$conectar = conectar();

$buscarFechaDe = isset($_GET["buscarFechaDe"]) ? $_GET["buscarFechaDe"]  : '';
$buscarFechaHasta = isset($_GET["buscarFechaHasta"]) ? $_GET["buscarFechaHasta"]  : '';
$buscarEmpresa = isset($_GET["buscarEmpresa"]) ? $_GET["buscarEmpresa"]  : '';
$buscarReporto = isset($_GET["buscarReporto"]) ? $_GET["buscarReporto"]  : '';
$buscarAsignacion = isset($_GET["buscarAsignacion"]) ? $_GET["buscarAsignacion"]  : '';
$buscarTipoEstado = isset($_GET["buscarTipoEstado"]) ? $_GET["buscarTipoEstado"]  : '';

$strfilterTipoEstado = "";
if ($buscarTipoEstado == 1) {
    $strfilterTipoEstado = "";
} else if ($buscarTipoEstado == 2) {
    $strfilterTipoEstado = 'AND P.CONFIRMADO IS NOT NULL';
} else if ($buscarTipoEstado == 3) {
    $strfilterTipoEstado = 'AND P.CONFIRMADO IS NULL';
} else if ($buscarTipoEstado == 4) {
    $strfilterTipoEstado = 'AND G.CODICLIE IS NULL';
}
$strfilterEmpresa = "";
if ($buscarEmpresa) {
    $strfilterEmpresa = " AND G.NUMEMPRE = '$buscarEmpresa'";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$arrGestion = array();
$stmt = "SELECT LC3.FECHAING, LC3.CLAPROD, LC3.CODICLIE, LC3.EMPRESA, LC3.NOMBRE, LC3.BOLETA, LC3.MONTO, 
                        LC3.FECHABOL, COALESCE(B.NUMCTA, '') AS NUMCTA, LC3.REPORTO, LC3.ASIGNACION, 
                        LC3.PORDESC, LC3.MONTOXDESC, LC3.MONTO + LC3.MONTOXDESC AS RECUPERA, LC3.GESTORD, 
                        LC3.CONFIRMADO, LC3.TOKEN, LC3.SALDOACT, LC3.BIN
                FROM (	SELECT  LC2.FECHAING, LC2.CLAPROD, LC2.CODICLIE, LC2.EMPRESA, LC2.NOMBRE, LC2.BOLETA, 
                                LC2.MONTO, LC2.FECHABOL, LC2.REPORTO, LC2.ASIGNACION, LC2.PORDESC, LC2.MONTOXDESC, LC2.MONTO + LC2.MONTOXDESC AS RECUPERA, 
                                LC2.GESTORD, LC2.CONFIRMADO, LC2.TOKEN, LC2.SALDOACT, SUBSTRING(CODICLIE FROM 1 FOR 4) AS BIN
                        FROM (	SELECT LC1.FECHAING, LC1.CLAPROD, LC1.CODICLIE, LC1.EMPRESA, LC1.NOMBRE, LC1.BOLETA, 
                                        LC1.MONTO, LC1.FECHABOL, LC1.REPORTO, LC1.ASIGNACION, LC1.PORDESC, LC1.MONTOXDESC, 
                                        LC1.MONTO + LC1.MONTOXDESC AS RECUPERA, LC1.GESTORD, LC1.CONFIRMADO, LC1.TOKEN, LC1.SALDOACT
                                FROM (	SELECT  P.FECHAING, G.CLAPROD, G.CODICLIE, E.EMPRESA, G.NOMBRE, P.BOLETA, P.MONTO, P.FECHABOL, CAST('1' AS VARCHAR(40)) AS REPORTO, CAST('2' AS VARCHAR(40)) AS ASIGNACION, 
                                                P.PORDESC, (G.SALDOACT * P.PORDESC) / 100 AS MONTOXDESC, G.GESTORD, COALESCE(P.CONFIRMADO, '') AS CONFIRMADO, P.TOKEN, G.SALDOACT
                                        FROM GC000001 G
                                        LEFT JOIN PAGXCONF P
                                            ON G.CODICLIE = P.CODICLIE
                                        LEFT JOIN EM000001 E
                                            ON G.NUMEMPRE = E.NUMEMPRE
                                        WHERE FECHAING BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE)
                                        $strfilterEmpresa
                                ) AS LC1
                        ) AS LC2
                    $strfilterTipoEstado
                WHERE char_length(TRIM(LC2.CODICLIE)
                ) = 16
                        
                UNION
                
                SELECT LC2.FECHAING, LC2.CLAPROD, LC2.CODICLIE, LC2.EMPRESA, LC2.NOMBRE, LC2.BOLETA, LC2.MONTO, LC2.FECHABOL, LC2.REPORTO, LC2.ASIGNACION, LC2.PORDESC, LC2.MONTOXDESC, LC2.MONTO + LC2.MONTOXDESC AS RECUPERA, LC2.GESTORD, LC2.CONFIRMADO, LC2.TOKEN, LC2.SALDOACT, SUBSTRING(CODICLIE FROM 1 FOR 2) AS BIN
                FROM (	SELECT LC1.FECHAING, LC1.CLAPROD, LC1.CODICLIE, LC1.EMPRESA, LC1.NOMBRE, LC1.BOLETA, LC1.MONTO, LC1.FECHABOL, LC1.REPORTO, LC1.ASIGNACION, LC1.PORDESC, LC1.MONTOXDESC, LC1.MONTO + LC1.MONTOXDESC AS RECUPERA, LC1.GESTORD, LC1.CONFIRMADO, LC1.TOKEN, LC1.SALDOACT
                FROM (	SELECT P.FECHAING, G.CLAPROD, G.CODICLIE, E.EMPRESA, G.NOMBRE, P.BOLETA, P.MONTO, P.FECHABOL, CAST('1' AS VARCHAR(40)) AS REPORTO, CAST('2' AS VARCHAR(40)) AS ASIGNACION, P.PORDESC, (G.SALDOACT * P.PORDESC) / 100 AS MONTOXDESC, G.GESTORD, COALESCE(P.CONFIRMADO, '') AS CONFIRMADO, P.TOKEN, G.SALDOACT
                FROM GC000001 G
                LEFT JOIN PAGXCONF P
                ON G.CODICLIE = P.CODICLIE
                LEFT JOIN EM000001 E
                ON G.NUMEMPRE = E.NUMEMPRE
                WHERE FECHAING BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE) 
                $strfilterEmpresa) AS LC1) AS LC2
                $strfilterTipoEstado
                WHERE char_length(TRIM(LC2.CODICLIE)) <= 13) AS LC3
                LEFT JOIN BINES B
                ON LC3.BIN = B.BIN";
// print_r($stmt);


$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
$i = 0;
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $i++;
    $key = $i;
    $arrGestion[$key]["NIU"]             =  $key;
    $arrGestion[$key]["FECHAING"]             = $rTMP["FECHAING"];
    $arrGestion[$key]["CLAPROD"]             = $rTMP["CLAPROD"];
    $arrGestion[$key]["CODICLIE"]             = $rTMP["CODICLIE"];
    $arrGestion[$key]["EMPRESA"]             = $rTMP["EMPRESA"];
    $arrGestion[$key]["NOMBRE"]             = $rTMP["NOMBRE"];
    $arrGestion[$key]["BOLETA"]             = $rTMP["BOLETA"];
    $arrGestion[$key]["MONTO"]             = $rTMP["MONTO"];
    $arrGestion[$key]["FECHABOL"]             = $rTMP["FECHABOL"];
    $arrGestion[$key]["NUMCTA"]             = $rTMP["NUMCTA"];
    $arrGestion[$key]["REPORTO"]             = $rTMP["REPORTO"];
    $arrGestion[$key]["ASIGNACION"]             = $rTMP["ASIGNACION"];
    $arrGestion[$key]["PORDESC"]             = $rTMP["PORDESC"];
    $arrGestion[$key]["MONTOXDESC"]             = $rTMP["MONTOXDESC"];
    $arrGestion[$key]["RECUPERA"]             = $rTMP["RECUPERA"];
    $arrGestion[$key]["GESTORD"]             = $rTMP["GESTORD"];
    $arrGestion[$key]["TOKEN"]             = $rTMP["TOKEN"];
}
//ibase_free_result($v_query);

?>
<style>
    .num {
        mso-number-format: General;
    }

    .text {
        mso-number-format: "\@";
        /*force text*/
    }
</style>
<table id="tableData" class="table table-hover table-sm">
    <thead>
        <tr style="background:#D6EAF8; color:black;">
            <td width=25%>FECHA ING.INFO</td>
            <td width=25%>CLAVE DE PRODUCTO</td>
            <td width=18%>TARJETA/CONVENIO</td>
            <td width=25%>MARCA</td>
            <td width=50%>NOMBRE</td>
            <td width=20%>NUM.BOLETA</td>
            <td width=15%>MONTO BOLETA</td>
            <td width=15%>FECHA DE PAGO</td>
            <td width=20%>CUENTA MONETARIA</td>
            <td width=25%>REPORTO</td>
            <td width=15%>ASIGNACION</td>
            <td width=15%>% DESCUENTO</td>
            <td width=22%>MONTO POR DESCUENTO</td>
            <td width=20%>RECUPERACION REAL</td>
            <td width=20%>GESTOR</td>
            <td width=10%>TOKEN</td>
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
                    <td><?php echo  $rTMP["value"]['FECHAING']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CLAPROD']; ?></td>
                    <td class='text'><?php echo  $rTMP["value"]['CODICLIE']; ?></td>
                    <td><?php echo  $rTMP["value"]['EMPRESA']; ?></td>
                    <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                    <td><?php echo  $rTMP["value"]['BOLETA']; ?></td>
                    <td><?php echo  $rTMP["value"]['MONTO']; ?></td>
                    <td><?php echo  $rTMP["value"]['FECHABOL']; ?></td>
                    <td><?php echo  $rTMP["value"]['NUMCTA']; ?></td>
                    <td><?php echo  $buscarReporto; ?></td>
                    <td><?php echo  $buscarAsignacion; ?></td>
                    <td><?php echo  $rTMP["value"]['PORDESC']; ?></td>
                    <td><?php echo  $rTMP["value"]['MONTOXDESC']; ?></td>
                    <td><?php echo  $rTMP["value"]['RECUPERA']; ?></td>
                    <td><?php echo  $rTMP["value"]['GESTORD']; ?></td>
                    <td><?php echo  $rTMP["value"]['TOKEN']; ?></td>
                </tr>
        <?PHP
                $intContador++;
            }
        }
        ?>
    </tbody>
</table>