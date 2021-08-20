<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=gestionxGestorxHora.xls");
header("Pragma: no-cache");
header("Expires: 0");
require_once '../../../interbase/conexion.php';

$conectar = conectar();

$username  = $_GET["username"];
//print_r($username ."----------username </br>" );
$rt = isset($_GET["rt"]) ? $_GET["rt"]  : '';

$buscarFechaDe = isset($_GET["buscarFechaDe"]) ? $_GET["buscarFechaDe"]  : '';
$buscarFechaHasta = isset($_GET["buscarFechaHasta"]) ? $_GET["buscarFechaHasta"]  : '';

$buscarHoraDe = isset($_GET["buscarHoraDe"]) ? trim($_GET["buscarHoraDe"])  : 0;
$buscarHoraHasta = isset($_GET["buscarHoraHasta"]) ? trim($_GET["buscarHoraHasta"])  : 0;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$arrHoras = array();
$intHrDel = intval($buscarHoraDe);
$intHrHasta = intval($buscarHoraHasta);
for ($i = $intHrDel; $i <= $intHrHasta; $i++) {
    $arrHoras[$i] = true;
}
if (!empty($buscarHoraDe) || !empty($buscarHoraHasta) || !empty($buscarFechaDe) || !empty($buscarFechaHasta)) {

    $arrGestion = array();
    $stmt = "SELECT  distinct PRODUCCION.NIU,
                    A.NOMBRE,
                    A.USUARIO,  
                    SUBSTRING(HORA FROM 1 FOR 2) AS HORA, 
                    OWNER
        FROM AXESO A
        LEFT JOIN  GM000001 PRODUCCION 
            ON A.USUARIO = PRODUCCION.OWNER
            AND PRODUCCION.FGESTION BETWEEN CAST('$buscarFechaDe' as DATE) AND CAST('$buscarFechaHasta' as DATE)
            AND CAST( (SUBSTRING(HORA FROM 1 FOR 2)) as INTEGER ) BETWEEN '$buscarHoraDe' AND '$buscarHoraHasta' 
            AND HORA != ' '
        ORDER BY NOMBRE,USUARIO,HORA";
        //print_r($stmt);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if (!empty($buscarFechaDe) || !empty($buscarFechaHasta) || !empty($buscarHoraDe) || !empty($buscarHoraHasta)) {
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrGestion[$rTMP["USUARIO"]]["NOMBRE"]             = $rTMP["NOMBRE"];
            $arrGestion[$rTMP["USUARIO"]]["USUARIO"]             = $rTMP["USUARIO"];
            $arrGestion[$rTMP["USUARIO"]]["OWNER"]             =  $rTMP["OWNER"];
            if (!isset($arrGestion[$rTMP["USUARIO"]]["HORAS"])) {
                reset($arrHoras);
                foreach ($arrHoras as $key => $value) {
                    $arrGestion[$rTMP["USUARIO"]]["HORAS"][$key] = 0;
                }
            }
            $intHora = intval($rTMP["HORA"]);
            if ($intHora >  0) {
                $arrGestion[$rTMP["USUARIO"]]["HORAS"][$intHora]++;
            }
        }

        ibase_free_result($v_query);

?>

        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr style="background:#D6EAF8; color:black;">
                    <td width=20%>NOMBRE</td>
                    <td width=50%>USUARIO</td>
                    <?php
                    reset($arrHoras);
                    foreach ($arrHoras as $key => $value) {
                    ?>
                        <td width=10%>H<?php print $key; ?>00</td>
                    <?php
                    }
                    ?>
                    <td width=10%>TOTAL</td>

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
                            <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                            <td><?php echo  $rTMP["value"]['USUARIO']; ?></td>
                            <?php
                            reset($arrHoras);
                            $intTotalHoras = 0;

                            foreach ($arrHoras as $key => $value) {
                                $intTotalHora = isset($rTMP["value"]['HORAS'][$key]) ? intval($rTMP["value"]['HORAS'][$key]) : 0;
                            ?>
                                <td width=10%><?php print $intTotalHora; ?></td>
                            <?php
                                $intTotalHoras += $intTotalHora;
                            }
                            ?>

                            <td><?php echo  $intTotalHoras; ?></td>

                        </tr>

        <?PHP

                    }
                }
            }
        }
        ?>
            </tbody>
        </table>