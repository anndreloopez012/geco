<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=report_revicion_saldos.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../../../interbase/conexion.php';
$conectar = conectar();

$arrGestion = array();
$stmt = "SELECT NIU, CODICLIE, SALDO, SALDO_SIS, DIFERENCIA, ESTADO FROM REVISA_SALDOACT";
//print_r($stmt);
$query = ibase_prepare($stmt);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $arrGestion[$rTMP["NIU"]]["CODICLIE"]             = $rTMP["CODICLIE"];
    $arrGestion[$rTMP["NIU"]]["SALDO"]             = $rTMP["SALDO"];
    $arrGestion[$rTMP["NIU"]]["SALDO_SIS"]             = $rTMP["SALDO_SIS"];
    $arrGestion[$rTMP["NIU"]]["DIFERENCIA"]             = $rTMP["DIFERENCIA"];
    $arrGestion[$rTMP["NIU"]]["ESTADO"]             = $rTMP["ESTADO"];

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
            <td>CODIGO DE CLIENTE</td>
            <td>SALDO BANCO</td>
            <td>SALDO SISTEMA</td>
            <td>DIFERENCIA</td>
            <td>OBSERVACIONES</td>
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
                    <td><?php echo  $rTMP["value"]['SALDO']; ?></td>
                    <td><?php echo  $rTMP["value"]['SALDO_SIS']; ?></td>
                    <td><?php echo  $rTMP["value"]['DIFERENCIA']; ?></td>
                    <td><?php echo  $rTMP["value"]['ESTADO']; ?></td>
                </tr>

        <?PHP
                $intContador++;
            }
        }
        ?>
    </tbody>
</table>