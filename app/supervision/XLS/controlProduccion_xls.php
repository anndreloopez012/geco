<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=controlProduccion.xls");
header("Pragma: no-cache");
header("Expires: 0");
require_once '../../../interbase/conexion.php';

$conectar = conectar();

$strFecha1 = isset($_GET["strFecha1"]) ? $_GET["strFecha1"]  : '';
$strFecha2 = isset($_GET["strFecha2"]) ? $_GET["strFecha2"]  : '';

$intEmpresa = isset($_GET["intEmpresa"]) ? intval($_GET["intEmpresa"])  : 0;
$sinMeta = isset($_GET["sinMeta"]) ? intval($_GET["sinMeta"])  : 0;
$sinDatoProy1 = isset($_GET["sinDatoProy1"]) ? intval($_GET["sinDatoProy1"])  : 0;
$sinDatoProy2 = isset($_GET["sinDatoProy2"]) ? intval($_GET["sinDatoProy2"])  : 0;

$sinTasaCambio = isset($_GET["sinTasaCambio"]) ? floatval($_GET["sinTasaCambio"])  : 0;

$strFechaDiaAnt = isset($_GET["strFechaDiaAnt"]) ? $_GET["strFechaDiaAnt"]  : '';
$buscarFechaGeneracion = isset($_GET["buscarFechaGeneracion"]) ? $_GET["buscarFechaGeneracion"]  : '';


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



$arrGestion = array();
/*
$strFechaDiaAnt = '31.10.2020';
$strFecha1 = '01.11.2020';
$strFecha2 = '11.11.2020';
$intEmpresa = 17;
$sinTasaCambio = 7.71;
$sinDatoProy1 = 10;
$sinDatoProy2 = 15;
$sinMeta = 50;*/

$sinDatoProyectado  =  ($sinDatoProy1 > 0 &&  $sinDatoProy2 > 0)? ($sinDatoProy1 / $sinDatoProy2):0;
$strFiltroEmpresa = ($intEmpresa > 0)? "AND G.NUMEMPRE = {$intEmpresa}" : '';
$intTPDA = 0;
$intTPDAR = 0;
$intTPDAV = 0;

$strQueryFiltros = "SELECT  COALESCE(TPDA,0.00) AS TPDA, 
                            COALESCE(TPDAR,0.00) AS TPDAR, 
                            COALESCE(TPDAV,0.00) AS TPDAV 
                    FROM MONTODIARI 
                    WHERE FECHA = CAST('$strFechaDiaAnt' as DATE) 
                    AND  NUMEMP = {$intEmpresa}";


$query = ibase_prepare($strQueryFiltros);
$v_query = ibase_execute($query);
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $intTPDA = floatval($rTMP['TPDA']);
    $intTPDAR = floatval($rTMP['TPDAR']);
    $intTPDAV = floatval($rTMP['TPDAV']);
}


$strQuery1 = "SELECT   G.GESTORD, 
                        SUM(G.SALDO) AS CORRI, 
                        COUNT(*) AS CCORRI, 
                        SUM(G.PAGOS) + SUM(G.PAGOSD) * CAST({$sinTasaCambio} AS NUMERIC(12,2)) AS PCORRI
                FROM GC000001 G
                WHERE ESTADO = 'CORRIMIENTO' 
                AND G.FASIG BETWEEN CAST('{$strFecha1}' as DATE) AND CAST('{$strFecha2}' as DATE) 
                {$strFiltroEmpresa}	
                GROUP BY G.GESTORD";

$strQuery2 = "SELECT    LC1.GESTORD, 
                        LC1.CORRI, 
                        LC1.CCORRI, 
                        LC1.PCORRI, SUM(G.SALDO) AS GEST, 
                        COUNT(*) AS CGEST, 
                        SUM(G.PAGOS) + SUM(G.PAGOSD) * CAST({$sinTasaCambio} AS NUMERIC(12,2)) AS PGEST
                FROM ( 
                        {$strQuery1}
                
                ) LC1
                LEFT JOIN GC000001 G
                    ON LC1.GESTORD = G.GESTORD
                WHERE  ESTADO = 'GESTION' 
                AND G.FASIG BETWEEN  CAST('{$strFecha1}' as DATE) AND CAST('{$strFecha2}' as DATE)  
                {$strFiltroEmpresa}
                GROUP BY LC1.GESTORD, LC1.CORRI, LC1.CCORRI, LC1.PCORRI";

$strQuery3 = "SELECT    LC2.GESTORD, 
                        LC2.CORRI, 
                        LC2.CCORRI, 
                        LC2.PCORRI, 
                        LC2.GEST, 
                        LC2.CGEST, 
                        LC2.PGEST, 
                        SUM(G.SALDO) AS RETEN,
                        COUNT(*) AS CRETEN, 
                        SUM(G.PAGOS) + SUM(G.PAGOSD) * CAST({$sinTasaCambio} AS NUMERIC(12,2)) AS PRETEN
                FROM (

                    {$strQuery2} 

                ) LC2
                LEFT JOIN GC000001 G
                    ON LC2.GESTORD = G.GESTORD
                WHERE  ESTADO = 'RETENCION' 
                AND G.FASIG BETWEEN CAST('{$strFecha1}' as DATE) AND CAST('{$strFecha2}' as DATE) 
                {$strFiltroEmpresa}
                GROUP BY LC2.GESTORD, LC2.CORRI, LC2.CCORRI, LC2.PCORRI, LC2.GEST, LC2.CGEST, LC2.PGEST";

$strQuery4 = "SELECT LC3.GESTORD, LC3.CORRI, LC3.CCORRI, LC3.PCORRI, LC3.GEST, LC3.CGEST, LC3.PGEST, LC3.RETEN, LC3.CRETEN, LC3.PRETEN, SUM(G.SALDO) AS VIGEN, COUNT(*) AS CVIGEN, SUM(G.PAGOS) + SUM(G.PAGOSD) * CAST({$sinTasaCambio} AS NUMERIC(12,2)) AS PVIGEN
                FROM (

                    {$strQuery3} 

                )  LC3
                LEFT JOIN GC000001 G
                    ON LC3.GESTORD = G.GESTORD
                WHERE G.FASIG BETWEEN CAST('{$strFecha1}' as DATE) AND CAST('{$strFecha2}' as DATE) 
                AND ESTADO = 'VIGENTE' 
                {$strFiltroEmpresa}
                GROUP BY LC3.GESTORD, LC3.CORRI, LC3.CCORRI, LC3.PCORRI, LC3.GEST, LC3.CGEST, LC3.PGEST, LC3.RETEN, LC3.CRETEN, LC3.PRETEN";

$strQuery5 = "SELECT LC4.GESTORD, LC4.CORRI, LC4.CCORRI, LC4.PCORRI, LC4.GEST, LC4.CGEST, LC4.PGEST, LC4.RETEN, LC4.CRETEN, LC4.PRETEN, LC4.VIGEN, LC4.CVIGEN, LC4.PVIGEN, A.NOMBRE AS NOMBRE
                FROM (

                    {$strQuery4}

                ) LC4
                LEFT JOIN AXESO A
                    ON LC4.GESTORD = A.USUARIO";

$strQuery6 = "SELECT LC5.GESTORD, LC5.CORRI, LC5.CCORRI, LC5.PCORRI, LC5.GEST, LC5.CGEST, LC5.PGEST, LC5.RETEN, LC5.CRETEN, LC5.PRETEN, LC5.VIGEN, LC5.CVIGEN, LC5.PVIGEN, LC5.NOMBRE, COALESCE(P.PORDIA,0.00) AS PORDIAANT
                FROM (

                    {$strQuery5}

                ) LC5
                LEFT JOIN PORDIARIO P 
                    ON LC5.GESTORD = P.GESTORD 
                    AND P.FECHA = CAST('{$strFechaDiaAnt}' as DATE) 
                    AND P.NUMEMP = {$intEmpresa}";

$strQuery7 = "SELECT LC6.GESTORD, LC6.CORRI, LC6.CCORRI, LC6.PCORRI, LC6.GEST, LC6.CGEST, LC6.PGEST, LC6.RETEN, LC6.CRETEN, LC6.PRETEN, LC6.VIGEN, LC6.CVIGEN, LC6.PVIGEN, LC6.NOMBRE, LC6.PORDIAANT, LC6.CORRI + LC6.GEST + LC6.RETEN + LC6.VIGEN AS MONTOASI, LC6.RETEN + LC6.VIGEN AS RETENIDO, LC6.PCORRI + LC6.PGEST + LC6.PRETEN + LC6.PVIGEN AS PAGOS
                FROM (

                    {$strQuery6}

                ) LC6";

$strQuery8 = "SELECT SUM(LC7.MONTOASI) AS TMONTOASI, SUM(LC7.RETENIDO) AS TRETENIDO, SUM(LC7.RETEN) AS TRRETENIDO, SUM(LC7.VIGEN) AS TVRETENIDO, SUM(LC7.PAGOS) AS TPAGOS 
                FROM (

                    {$strQuery7}
                    
                ) LC7   ";

$strQuery9 = "SELECT LC7.GESTORD, LC7.CORRI, LC7.CCORRI, LC7.PCORRI, LC7.GEST, LC7.CGEST, LC7.PGEST, LC7.RETEN, LC7.CRETEN, LC7.PRETEN, LC7.VIGEN, LC7.CVIGEN, LC7.PVIGEN, LC7.NOMBRE, LC7.PORDIAANT, LC7.MONTOASI, LC7.RETENIDO, LC7.PAGOS, (LC7.RETENIDO * 100)/LC7.MONTOASI AS PORRETEN, (LC7.RETEN * 100)/LC7.MONTOASI AS PORRRETEN, (LC7.VIGEN * 100)/LC7.MONTOASI AS PORVRETEN 
                FROM (

                    {$strQuery7}        
                
                ) LC7";

$strQuery10 = "SELECT LC8.TMONTOASI, LC8.TRETENIDO, LC8.TRRETENIDO, LC8.TVRETENIDO, LC8.TPAGOS, (LC8.TRETENIDO * 100)/LC8.TMONTOASI AS TPORRETEN, (LC8.TRRETENIDO * 100)/LC8.TMONTOASI AS TPORRRETEN, (LC8.TVRETENIDO * 100)/LC8.TMONTOASI AS TPORVRETEN
                FROM (

                    {$strQuery8}

                ) LC8";

$strQuery11 = "SELECT LC9.GESTORD, LC9.CORRI, LC9.CCORRI, LC9.PCORRI, LC9.GEST, LC9.CGEST, LC9.PGEST, LC9.RETEN, LC9.CRETEN, LC9.PRETEN, LC9.VIGEN, LC9.CVIGEN, LC9.PVIGEN, LC9.NOMBRE, LC9.PORDIAANT, LC9.MONTOASI, LC9.RETENIDO, LC9.PAGOS, LC9.PORRETEN, LC9.PORRRETEN, LC9.PORVRETEN, (LC9.RETENIDO * 100)/CAST(LC10.TMONTOASI AS NUMERIC(12,2)) AS PORGLOBAL, LC9.RETENIDO * CAST({$sinDatoProyectado} AS NUMERIC(12,8)) AS PROYE
                FROM (

                    {$strQuery9}

                ) LC9
                LEFT JOIN (

                        {$strQuery10}

                        ) LC10
                    ON LC9.GESTORD <> ' '";

$strQuery12 = "SELECT LC10.TMONTOASI, LC10.TRETENIDO, LC10.TRRETENIDO, LC10.TVRETENIDO, LC10.TPAGOS, LC10.TPORRETEN, LC10.TPORRRETEN, LC10.TPORVRETEN, SUM(LC11.PORGLOBAL) AS TPORGLOBAL, SUM(LC11.PROYE) AS TPROYE, SUM(LC11.RETEN) * CAST({$sinDatoProyectado} AS NUMERIC(12,2)) AS TRPROYE, SUM(LC11.VIGEN) * CAST({$sinDatoProyectado} AS NUMERIC(12,2)) AS TVPROYE
                FROM (

                    {$strQuery10}

                ) LC10
                LEFT JOIN (

                        {$strQuery11}

                        ) LC11
                    ON LC10.TMONTOASI <> -1000
                GROUP BY LC10.TMONTOASI, LC10.TRETENIDO, LC10.TRRETENIDO, LC10.TVRETENIDO, LC10.TPAGOS, LC10.TPORRETEN, LC10.TPORRRETEN, LC10.TPORVRETEN";

$strQuery13 = "SELECT LC11.GESTORD, LC11.CORRI, LC11.CCORRI, LC11.PCORRI, LC11.GEST, LC11.CGEST, LC11.PGEST, LC11.RETEN, LC11.CRETEN, LC11.PRETEN, LC11.VIGEN, LC11.CVIGEN, LC11.PVIGEN, LC11.NOMBRE, LC11.PORDIAANT, LC11.MONTOASI, LC11.RETENIDO, LC11.PAGOS, LC11.PORRETEN, LC11.PORRRETEN, LC11.PORVRETEN, LC11.PORGLOBAL, LC11.PROYE, (LC11.PROYE * 100)/LC11.MONTOASI AS PORPROYEC 
                FROM (

                    {$strQuery11}

                ) LC11
                WHERE LC11.MONTOASI > 0.00";
                
$strQuery14 = "SELECT LC12.TMONTOASI, LC12.TRETENIDO, LC12.TRRETENIDO, LC12.TVRETENIDO, LC12.TPAGOS, LC12.TPORRETEN, LC12.TPORRRETEN, LC12.TPORVRETEN, LC12.TPORGLOBAL, LC12.TPROYE, LC12.TRPROYE, LC12.TVPROYE, (LC12.TPROYE * 100)/LC12.TMONTOASI AS TPORPROYEC, (LC12.TRPROYE * 100)/LC12.TMONTOASI AS TRPORPROYEC, (LC12.TVPROYE * 100)/LC12.TMONTOASI AS TVPORPROYEC
                FROM (

                    {$strQuery12}

                ) LC12";

$strQuery15 = "SELECT LC13.GESTORD, LC13.CORRI, LC13.CCORRI, LC13.PCORRI, LC13.GEST, LC13.CGEST, LC13.PGEST, LC13.RETEN, LC13.CRETEN, LC13.PRETEN, LC13.VIGEN, LC13.CVIGEN, LC13.PVIGEN, LC13.NOMBRE, LC13.PORDIAANT, LC13.MONTOASI, LC13.RETENIDO, LC13.PAGOS, LC13.PORRETEN, LC13.PORRRETEN, LC13.PORVRETEN, LC13.PORGLOBAL, LC13.PROYE, LC13.PORPROYEC, LC13.CCORRI + LC13.CGEST + LC13.CRETEN + LC13.CVIGEN AS ASIGNADA, LC13.CRETEN + LC13.CVIGEN AS RECUPERADA 
                FROM (

                    {$strQuery13}

                ) LC13";

$strQuery16 = "SELECT LC14.TMONTOASI, LC14.TRETENIDO, LC14.TRRETENIDO, LC14.TVRETENIDO, LC14.TPAGOS, LC14.TPORRETEN, LC14.TPORRRETEN, LC14.TPORVRETEN, LC14.TPORGLOBAL, LC14.TPROYE, LC14.TRPROYE, LC14.TVPROYE, LC14.TPORPROYEC, LC14.TRPORPROYEC, LC14.TVPORPROYEC, SUM(LC15.ASIGNADA) AS TASIGNADA, SUM(LC15.RECUPERADA) AS TRECUPERADA, SUM(LC15.CRETEN) AS TRRECUPERADA,SUM(LC15.CVIGEN) AS TVRECUPERADA
                FROM (

                    {$strQuery14}

                ) LC14
                LEFT JOIN (

                        {$strQuery15}

                        ) LC15
                    ON LC14.TMONTOASI <> -1000
                GROUP BY LC14.TMONTOASI, LC14.TRETENIDO, LC14.TRRETENIDO, LC14.TVRETENIDO, LC14.TPAGOS, LC14.TPORRETEN, LC14.TPORRRETEN, LC14.TPORVRETEN, LC14.TPORGLOBAL, LC14.TPROYE, LC14.TRPROYE, LC14.TVPROYE, LC14.TPORPROYEC, LC14.TRPORPROYEC, LC14.TVPORPROYEC";

$strQuery17 = "SELECT LC15.GESTORD, LC15.CORRI, LC15.CCORRI, LC15.PCORRI, LC15.GEST, LC15.CGEST, LC15.PGEST, LC15.RETEN, LC15.CRETEN, LC15.PRETEN, LC15.VIGEN, LC15.CVIGEN, LC15.PVIGEN, LC15.NOMBRE, LC15.PORDIAANT, LC15.MONTOASI, LC15.RETENIDO, LC15.PAGOS, LC15.PORRETEN, LC15.PORRRETEN, LC15.PORVRETEN, LC15.PORGLOBAL, LC15.PROYE, LC15.PORPROYEC, LC15.ASIGNADA, LC15.RECUPERADA, (CAST(LC15.RECUPERADA AS NUMERIC(12,8)) * 100)/CAST(LC15.ASIGNADA AS NUMERIC(12,8)) AS PORASIGNA 
                FROM (

                    {$strQuery15}

                ) LC15
                WHERE LC15.ASIGNADA > 0.00";

$strQuery18 = "SELECT LC16.TMONTOASI, LC16.TRETENIDO, LC16.TRRETENIDO, LC16.TVRETENIDO, LC16.TPAGOS, LC16.TPORRETEN, LC16.TPORRRETEN, LC16.TPORVRETEN, LC16.TPORGLOBAL, LC16.TPROYE, LC16.TRPROYE, LC16.TVPROYE, LC16.TPORPROYEC, LC16.TRPORPROYEC, LC16.TVPORPROYEC, LC16.TASIGNADA, LC16.TRECUPERADA, LC16.TRRECUPERADA, LC16.TVRECUPERADA, (LC16.TRECUPERADA * 100)/LC16.TASIGNADA AS TPORASIGNA, (LC16.TRRECUPERADA * 100)/LC16.TASIGNADA AS TRPORASIGNA, (LC16.TVRECUPERADA * 100)/LC16.TASIGNADA AS TVPORASIGNA
                FROM (

                    {$strQuery16}

                ) LC16"; 
$strQuery19 = "SELECT LC17.GESTORD, LC17.CORRI, LC17.CCORRI, LC17.PCORRI, LC17.GEST, LC17.CGEST, LC17.PGEST, LC17.RETEN, LC17.CRETEN, LC17.PRETEN, LC17.VIGEN, LC17.CVIGEN, LC17.PVIGEN, LC17.NOMBRE, LC17.PORDIAANT, LC17.MONTOASI, LC17.RETENIDO, LC17.PAGOS, LC17.PORRETEN, LC17.PORRRETEN, LC17.PORVRETEN, LC17.PORGLOBAL, LC17.PROYE, LC17.PORPROYEC, LC17.ASIGNADA, LC17.RECUPERADA, LC17.PORASIGNA, LC17.PORRETEN - LC17.PORDIAANT AS DIFERENCIA, CAST({$sinMeta} AS NUMERIC(12,2)) - LC17.PORRETEN AS DIFEVRSMET, CAST(' ' AS VARCHAR(1)) AS INDICE
                FROM (

                    {$strQuery17}

                ) LC17
                WHERE LC17.MONTOASI > 0.00
                ORDER BY LC17.RETENIDO DESCENDING";

$strQuery20 = "SELECT LC18.TMONTOASI, LC18.TRETENIDO, LC18.TRRETENIDO, LC18.TVRETENIDO, LC18.TPAGOS, LC18.TPORRETEN, LC18.TPORRRETEN, LC18.TPORVRETEN, LC18.TPORGLOBAL, LC18.TPROYE, LC18.TRPROYE, LC18.TVPROYE, LC18.TPORPROYEC, LC18.TRPORPROYEC, LC18.TVPORPROYEC, LC18.TASIGNADA, LC18.TRECUPERADA, LC18.TRRECUPERADA, LC18.TVRECUPERADA, LC18.TPORASIGNA, LC18.TRPORASIGNA, LC18.TVPORASIGNA, LC18.TPORRETEN - CAST($intTPDA AS NUMERIC(12,2)) AS TDIFERENCIA, LC18.TPORRRETEN - CAST($intTPDAR AS NUMERIC(12,2)) AS TDIFERENCIAR, LC18.TPORVRETEN - CAST($intTPDAV AS NUMERIC(12,2)) AS TDIFERENCIAV, CAST({$sinMeta} AS NUMERIC(12,2)) - LC18.TPORRETEN AS TDIFEVRSMET
                FROM (

                    {$strQuery18}

                ) LC18";

$strQuery21 = "SELECT   CAST('RETENCION' AS VARCHAR(80)) AS NOMBRE, 	
                        CAST(0.00 AS NUMERIC(12,2)) AS MONTOASI, 
                        LC20.TRRETENIDO AS RETENIDO, 
                        CAST(0.00 AS NUMERIC(12,2)) AS PAGOS,
                        LC20.TPORRRETEN AS PORRETEN, 
                        CAST(0.00 AS NUMERIC(12,2)) AS PORGLOBAL,
                        LC20.TRPROYE AS PROYE, 
                        LC20.TRPORPROYEC AS PORPROYEC, 
                        CAST(0.00 AS NUMERIC(12,2)) AS ASIGNADA, 
                        LC20.TRRECUPERADA AS RECUPERADA, 
                        LC20.TRPORASIGNA AS PORASIGNA, 
                        CAST($intTPDAR AS NUMERIC(12,2)) AS PORDIAANT, LC20.TDIFERENCIAR AS DIFERENCIA, CAST(0.00 AS NUMERIC(12,2)) AS DIFEVRSMET, CAST('X' AS VARCHAR(1)) AS INDICE
                    FROM ( 

                        {$strQuery20}

                    ) LC20

                    UNION
                    
                    SELECT CAST('VIGENTE' AS VARCHAR(80)) AS NOMBRE, CAST(0.00 AS NUMERIC(12,2)) AS MONTOASI, LC20.TVRETENIDO AS RETENIDO, CAST(0.00 AS NUMERIC(12,2)) AS PAGOS, LC20.TPORVRETEN AS PORRETEN, CAST(0.00 AS NUMERIC(12,2)) AS PORGLOBAL, LC20.TVPROYE AS PROYE, LC20.TVPORPROYEC AS PORPROYEC, CAST(0.00 AS NUMERIC(12,2)) AS ASIGNADA, LC20.TVRECUPERADA AS RECUPERADA, LC20.TVPORASIGNA AS PORASIGNA, CAST($intTPDAV AS NUMERIC(12,2)) AS PORDIAANT, LC20.TDIFERENCIAV AS DIFERENCIA, CAST(0.00 AS NUMERIC(12,2)) AS DIFEVRSMET, CAST('Y' AS VARCHAR(1)) AS INDICE
                    FROM ( 

                        {$strQuery20}

                    ) LC20
                    
                    UNION
                    
                    SELECT  CAST('TOTAL CARTERA' AS VARCHAR(80)) AS NOMBRE,
                            LC20.TMONTOASI AS MONTOASI, 
                            LC20.TRETENIDO AS RETENIDO,
                            LC20.TPAGOS AS PAGOS, 
                            LC20.TPORRETEN AS PORRETEN, 
                            LC20.TPORGLOBAL AS PORGLOBAL, 
                            LC20.TPROYE AS PROYE, 
                            LC20.TPORPROYEC AS PORPROYEC, 
                            LC20.TASIGNADA AS ASIGNADA, 
                            LC20.TRECUPERADA AS RECUPERADA, 
                            LC20.TPORASIGNA AS PORASIGNA, 
                            CAST($intTPDA AS NUMERIC(12,2)) AS PORDIAANT, 
                            LC20.TDIFERENCIA AS DIFERENCIA, 
                            LC20.TDIFEVRSMET AS DIFEVRSMET, 
                            CAST('Z' AS VARCHAR(1)) AS INDICE
                    FROM ( 

                        {$strQuery20}

                    ) LC20
                    ORDER BY 15";

$strQuery22 = " SELECT   LC19.NOMBRE, 
                        LC19.MONTOASI, 
                        LC19.RETENIDO, 
                        LC19.PAGOS,
                        LC19.PORRETEN, 
                        LC19.PORGLOBAL, 
                        LC19.PROYE, 
                        LC19.PORPROYEC, 
                        LC19.ASIGNADA, 
                        LC19.RECUPERADA, 
                        LC19.PORASIGNA,
                        LC19.PORDIAANT, 
                        LC19.DIFERENCIA, 
                        LC19.DIFEVRSMET, 
                        LC19.INDICE
                FROM (

                        {$strQuery19}

                ) LC19
                
                UNION

                SELECT  LC21.NOMBRE, 
                        LC21.MONTOASI, 
                        LC21.RETENIDO, 
                        LC21.PAGOS, 
                        LC21.PORRETEN, 
                        LC21.PORGLOBAL, 
                        LC21.PROYE, 
                        LC21.PORPROYEC, 
                        LC21.ASIGNADA, 
                        LC21.RECUPERADA, 
                        LC21.PORASIGNA, 
                        LC21.PORDIAANT, 
                        LC21.DIFERENCIA, 
                        LC21.DIFEVRSMET, 
                        LC21.INDICE
                FROM (

                    {$strQuery21}


                ) LC21	
                ORDER BY 15
                ";

$strQueryLast = "SELECT LC22.NOMBRE, ROUND(CAST(LC22.MONTOASI AS NUMERIC(12,2)),2) AS MONTOASI, ROUND(CAST(LC22.RETENIDO AS NUMERIC(12,2)),2) AS RETENIDO, ROUND(CAST(LC22.PAGOS AS NUMERIC(12,2)),2) AS PAGOS, ROUND(CAST(LC22.PORRETEN AS NUMERIC(12,2)),2) AS PORRETEN, ROUND(CAST(LC22.PORGLOBAL AS NUMERIC(12,2)),2) AS PORGLOBAL, ROUND(CAST(LC22.PROYE AS NUMERIC(12,2)),2) AS PROYE, ROUND(CAST(LC22.PORPROYEC AS NUMERIC(12,2)),2) AS PORPROYEC, LC22.ASIGNADA, LC22.RECUPERADA, ROUND(CAST(LC22.PORASIGNA AS NUMERIC(12,2)),2) AS PORASIGNA, ROUND(CAST(LC22.PORDIAANT AS NUMERIC(12,2)),2) AS PORDIAANT, ROUND(CAST(LC22.DIFERENCIA AS NUMERIC(12,2)),2) AS DIFERENCIA, ROUND(CAST(LC22.DIFEVRSMET AS NUMERIC(12,2)),2) AS DIFEVRSMET 
                    FROM ( 

                        {$strQuery22}

                     ) LC22";



$query = ibase_prepare($strQueryLast);
$v_query = ibase_execute($query);
$i = 1;
while ($rTMP = ibase_fetch_assoc($v_query)) {
    $key = $i;
    $arrGestion[$key]["NIU"]             =  $key;
    $arrGestion[$key]["NOMBRE"]             = $rTMP["NOMBRE"];
    $arrGestion[$key]["MONTOASI"]             = $rTMP["MONTOASI"];
    $arrGestion[$key]["RETENIDO"]             = $rTMP["RETENIDO"];
    $arrGestion[$key]["PAGOS"]             = $rTMP["PAGOS"];
    $arrGestion[$key]["PORRETEN"]             = $rTMP["PORRETEN"];
    $arrGestion[$key]["PORGLOBAL"]             = $rTMP["PORGLOBAL"];
    $arrGestion[$key]["PROYE"]             = $rTMP["PROYE"];
    $arrGestion[$key]["PORPROYEC"]             = $rTMP["PORPROYEC"];
    $arrGestion[$key]["ASIGNADA"]             = $rTMP["ASIGNADA"];
    $arrGestion[$key]["RECUPERADA"]             = $rTMP["RECUPERADA"];
    $arrGestion[$key]["PORASIGNA"]             = $rTMP["PORASIGNA"];
    $arrGestion[$key]["PORDIAANT"]             = $rTMP["PORDIAANT"];
    $arrGestion[$key]["DIFERENCIA"]             = $rTMP["DIFERENCIA"];
    $arrGestion[$key]["DIFEVRSMET"]             = $rTMP["DIFEVRSMET"];
    $i++;
                 
}


//ibase_free_result($v_query);
header ('Content-type: text/html; charset=iso-8859-1');
?>
<div class="col-md-12 tableFixHead">
    <table id="tableData" class="table table-hover table-sm">
        <thead>
            <tr  style="background:#D6EAF8; color:black;">
                <td width=40%>GESTOR</td>
                <td width=15%>MONTO ASIGNADO</td>
                <td width=15%>RETENCION</td>
                <td width=15%>PAGOS</td>
                <td width=13%>%RETENCION</td>
                <td width=13%>%GLOBAL</td>
                <td width=15%>PROYECCION</td>
                <td width=13%>%PROYECCION</td>
                <td width=15%>CUENTAS ASIGNADAS</td>
                <td width=15%>CUENTAS RECUPERADAS</td>
                <td width=15%>%CUENTAS RECUPERADAS</td>
                <td width=13%>%DIA ANTERIOR</td>
                <td width=13%>DIFERENCIA</td>
                <td width=10%>DIFERENCIA VRS META</td>

            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($arrGestion) && (count($arrGestion) > 0)) {
                reset($arrGestion);
                foreach ($arrGestion as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <tr>
                        <td><?php echo  $rTMP["value"]['NOMBRE']; ?></td>
                        <td><?php echo  $rTMP["value"]['MONTOASI']; ?></td>
                        <td><?php echo  $rTMP["value"]['RETENIDO']; ?></td>
                        <td><?php echo  $rTMP["value"]['PAGOS']; ?></td>
                        <td><?php echo  $rTMP["value"]['PORRETEN']; ?></td>
                        <td><?php echo  $rTMP["value"]['PORGLOBAL']; ?></td>
                        <td><?php echo  $rTMP["value"]['PROYE']; ?></td>
                        <td><?php echo  $rTMP["value"]['PORPROYEC']; ?></td>
                        <td><?php echo  $rTMP["value"]['ASIGNADA']; ?></td>
                        <td><?php echo  $rTMP["value"]['RECUPERADA']; ?></td>
                        <td><?php echo  $rTMP["value"]['PORASIGNA']; ?></td>
                        <td><?php echo  $rTMP["value"]['PORDIAANT']; ?></td>
                        <td><?php echo  $rTMP["value"]['DIFERENCIA']; ?></td>
                        <td><?php echo  $rTMP["value"]['DIFEVRSMET']; ?></td>
                    </tr>
            <?PHP
                }
            }
            ?>

        </tbody>
    </table>
</div>
