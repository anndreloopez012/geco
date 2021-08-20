<?php

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=previsionPromesaPago.xls");
header("Pragma: no-cache");
header("Expires: 0");
require_once '../../../interbase/conexion.php';

$conectar = conectar();

$username  = $_GET["username"];
//print_r($username ."----------username </br>" );
$rt = isset($_GET["rt"]) ? $_GET["rt"]  : '';


$buscarFechaDe = isset($_GET["buscarFechaDe"]) ? $_GET["buscarFechaDe"]  : '';
$buscarFechaHasta = isset($_GET["buscarFechaHasta"]) ? $_GET["buscarFechaHasta"]  : '';

$buscarHoraDe = isset($_GET["buscarHoraDe"]) ? $_GET["buscarHoraDe"]  : '';
$buscarHoraHasta = isset($_GET["buscarHoraHasta"]) ? $_GET["buscarHoraHasta"]  : '';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*         Filtros Adicionales       */
$strSupervisor = isset($_GET["supervisor"]) ? trim($_GET["supervisor"])  : '';
$buscarResumen = isset($_GET["buscarResumen"]) ? intval($_GET["buscarResumen"])  : 1;
$boolConteo = ($buscarResumen == 2)?true:false;

$strFiltroSupervisor = "";
if ( trim($strSupervisor) != '' ) {
    $strFiltroSupervisor = "WHERE A.SUPERVISOR = '{$strSupervisor}' ";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$arrHoras = array();
$intHrDel = intval($buscarHoraDe);
$intHrHasta = intval($buscarHoraHasta);
for( $i = $intHrDel ; $i <= $intHrHasta ; $i++ ){
    $arrHoras[$i]= true;
}

$strFechaStart = date("d-m-Y",strtotime(  str_replace('-','/',$buscarFechaDe) ) );
$strFechaEnd = date("d-m-Y",strtotime(  str_replace('-','/',$buscarFechaHasta) ) );
$arrFechas = array();
$arrFechasTotales = array();
while( date("Ymd",strtotime($strFechaEnd)) >=  date("Ymd",strtotime($strFechaStart)) ){
    $arrFechas[$strFechaStart] = $strFechaStart;
    $arrFechasTotales[$strFechaStart] = 0;
    $strFechaStart = date("d-m-Y",strtotime($strFechaStart."+ 1 days"));    
}
$arrGestion = array();
$stmt = "SELECT     distinct PRODUCCION.NIU,
                    A.NOMBRE,
                    A.USUARIO,  
                    PRODUCCION.MONTOPP,
                    PRODUCCION.FECHAPP1,
                    A.SUPERVISOR
        FROM AXESO A
        LEFT JOIN  GM000001 PRODUCCION 
            ON A.USUARIO = PRODUCCION.OWNER
            AND PRODUCCION.FECHAPP1 BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta'    
            AND PRODUCCION.MONTOPP > 0
        {$strFiltroSupervisor}        
        ORDER BY NOMBRE,USUARIO,NIU";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//print '<pre>';
//print $stmt;
//print '</pre>';
if(!empty($buscarFechaDe) ||!empty($buscarFechaHasta) ||!empty($buscarHoraDe) ||!empty($buscarHoraHasta) ){
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrGestion[$rTMP["USUARIO"]]["NOMBRE"]             = $rTMP["NOMBRE"];
        $arrGestion[$rTMP["USUARIO"]]["USUARIO"]             = $rTMP["USUARIO"];
        $arrGestion[$rTMP["USUARIO"]]["SUPERVISOR"]             = $rTMP["SUPERVISOR"];
        if( !isset($arrGestion[$rTMP["USUARIO"]]["FECHAS"]) ){
            reset($arrFechas);
            foreach($arrFechas as $key => $value){
                $arrGestion[$rTMP["USUARIO"]]["FECHAS"][$key] = 0;
            }    
        }
        $strKey = '';
        if( strlen($rTMP["FECHAPP1"]) > 0  ){
            $arrExplode = explode('-',$rTMP["FECHAPP1"]);
            $strKey = $arrExplode[2].'-'.$arrExplode[1].'-'.$arrExplode[0]; 
        }
         
        if( isset($arrGestion[$rTMP["USUARIO"]]["FECHAS"][ $strKey ])    ){
            if( $boolConteo ){
                $arrGestion[$rTMP["USUARIO"]]["FECHAS"][ $strKey ]++;
                if( isset($arrFechasTotales[ $strKey ]) ){
                    $arrFechasTotales[ $strKey ]++;
                }
                
            }
            else{
                $arrGestion[$rTMP["USUARIO"]]["FECHAS"][ $strKey ] += floatval($rTMP["MONTOPP"]);
                if( isset($arrFechasTotales[ $strKey ]) ){
                    $arrFechasTotales[ $strKey ] += floatval($rTMP["MONTOPP"]);
                }
            }
        }
    }
    
    //print '<pre>';
    //print_r($arrGestion);
    //print '</pre>';
    //ibase_free_result($v_query);
    //die();
    ?>
    
    <table cellspacing="0" cellpadding="0" border="1"> 
        <thead>
            <tr style="background:#D6EAF8; color:black;">
                <td width=20%>NOMBRE</td>
                <td width=50%>USUARIO</td>
                <td width=50%>SUPERVISOR</td>                
                <?php 
                reset($arrFechas);
                foreach( $arrFechas as $key => $value ){
                    ?>
                    <td width=10%><?php print $key; ?></td>            
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
                        <td><?php echo  $rTMP["value"]['SUPERVISOR']; ?></td>
                        <?php 
                        reset($arrHoras);
                        $intTotales = 0;
                        
                        foreach( $arrFechas as $key => $value ){
                            $intTotal = isset($rTMP["value"]['FECHAS'][$key] )? $rTMP["value"]['FECHAS'][$key] : 0;
                            ?>
                            <td width=10%>
                            <?php 
                            if( $boolConteo ){
                                print intval($intTotal);
                            }
                            else{
                                print 'Q '.number_format(floatval($intTotal),2);
                            }
                            ?>
                            </td>            
                            <?php
                            $intTotales += $intTotal;
                        }
                        ?>
                        
                        <td>
                            <?php
                            if( $boolConteo ){
                                print $intTotales;
                            }
                            else{
                                print 'Q '.number_format($intTotales,2);
                            }
                            ?>
                        </td>
    
                    </tr>
    
            <?PHP
                    
                }
                ?>
                <tr style="background:#D6EAF8; color:black;">
                    <td width=20%>&nbsp;</td>
                    <td width=50%>&nbsp;</td>
                    <td width=50%>&nbsp;</td>
                    <?php 
                    reset($arrFechasTotales);
                    foreach( $arrFechasTotales as $key => $value ){
                        ?>
                        <td width=10%>
                            <?php
                            if( $boolConteo ){
                                print intval($value);
                            }
                            else{
                                print 'Q '.number_format(floatval($value),2);
                            }
                            ?>
                        </td>            
                        <?php
                    }
                    ?>
                    <td width=10%>&nbsp;</td>
        
                </tr>
                <?php
            }
}
        ?>
    </tbody>
</table>