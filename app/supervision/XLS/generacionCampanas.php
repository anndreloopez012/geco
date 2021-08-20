<?PHP




require_once '../../../interbase/conexion.php';

$conectar = conectar();

$buscarFechaDe = isset($_GET["buscarFechaDe"]) ? $_GET["buscarFechaDe"]  : '';
$buscarFechaHasta = isset($_GET["buscarFechaHasta"]) ? $_GET["buscarFechaHasta"]  : '';
$FILTRO13 = "";
if (!empty($buscarFechaDe) && !empty($buscarFechaHasta)) {
    $FILTRO13 = " C.FASIG BETWEEN '$buscarFechaDe' AND '$buscarFechaHasta'";
}

$buscarMora = isset($_GET["buscarMora"]) ? $_GET["buscarMora"]  : '';
$FILTRO1 = "";
if (!empty($buscarMora)) {
    $FILTRO1 = "AND C.MORA = $buscarMora'";
}

$buscarEmpresa = isset($_GET["buscarEmpresa"]) ? $_GET["buscarEmpresa"]  : '';
$FILTRO2 = "";
if (!empty($buscarEmpresa)) {
    $FILTRO2 = "AND C.NUMEMPRE = $buscarEmpresa";
}

$buscarSaldoVencido = isset($_GET["buscarSaldoVencido"]) ? $_GET["buscarSaldoVencido"]  : '';
$FILTRO5 = "";
if (!empty($buscarSaldoVencido)) {
    $FILTRO5 = "AND C.CICLOVEQ = $buscarSaldoVencido";
}

$buscarSaldoDe = isset($_GET["buscarSaldoDe"]) ? $_GET["buscarSaldoDe"]  : '';
$buscarSaldoHasta = isset($_GET["buscarSaldoHasta"]) ? $_GET["buscarSaldoHasta"]  : '';
$FILTRO6 = "";
if (!empty($buscarSaldoDe) && !empty($buscarSaldoHasta)) {
    $FILTRO6 = "AND C.SALDO BETWEEN $buscarSaldoDe AND $buscarSaldoHasta";
}

$buscargestor = isset($_GET["gestor"]) ? $_GET["gestor"]  : '';
$FILTRO3 = "";
if (!empty($buscargestor)) {
    $FILTRO3 = "AND C.GESTORD = $buscargestor";
}

$buscarownerTel = isset($_GET["ownerTel"]) ? $_GET["ownerTel"]  : '';
$FILTRO4 = "";
if (!empty($buscarownerTel)) {
    $FILTRO4 = "AND T.ORIGEN = $buscarownerTel";
}

$buscarOrigen = isset($_GET["buscarOrigen"]) ? $_GET["buscarOrigen"]  : '';
$FILTRO7 = "";
if (!empty($buscarOrigen)) {
    $FILTRO7 = "AND C.TIPOLOGI = $buscarOrigen";
}

$buscarReceptor = isset($_GET["buscarReceptor"]) ? $_GET["buscarReceptor"]  : '';
$FILTRO8 = "";
if (!empty($buscarReceptor)) {
    $FILTRO8 = "AND C.CONCLUSI = $buscarReceptor";
}

$buscarTipologia = isset($_GET["buscarTipologia"]) ? $_GET["buscarTipologia"]  : '';
$FILTRO9 = "";
if (!empty($strFilterOrigen)) {
    $FILTRO9 = "AND C.RTESTADO = $strFilterOrigen";
}

$buscarCategoria = isset($_GET["buscarCategoria"]) ? $_GET["buscarCategoria"]  : '';
$FILTRO10 = "";
if (!empty($buscarCategoria)) {
    $FILTRO10 = "AND C.SUBCONCL = $buscarCategoria ";
}

$buscarEstado = isset($_GET["buscarEstado"]) ? $_GET["buscarEstado"]  : '';
$FILTRO11 = "";
if (!empty($buscarEstado)) {
    $FILTRO11 = "AND C.ESTADO = $buscarEstado";
}

$buscarRdm = isset($_GET["rdm"]) ? $_GET["rdm"]  : '';
$FILTRO12 = "";
if (!empty($buscarRdm)) {
    $FILTRO12 = "AND C.RDM = $buscarRdm";
}

if ($FILTRO13) {
    $arrGestion = array();
    $stmt = "SELECT C.NOMBRE,C.IDENTIFI,C.NIT,C.FECHANAC, C.SUBCONCL, C.LIMITE, C.SALDOACT,C.SALDOACD,C.PAGOMINQ,C.PAGOMIND, T.NUMERO, T.ORIGEN, C.NUMTRANS, C.GESTORD, T.ACTIVO, E.PLANGEST AS PL          
                    FROM GC000001 C
                    LEFT JOIN TELEFONOS T
                    ON C.CODICLIE = T.CODICLIE
                    LEFT JOIN EM000001 E
                    ON C.NUMEMPRE = E.NUMEMPRE
                    WHERE $FILTRO13
                    $FILTRO1
                    $FILTRO2
                    $FILTRO3
                    $FILTRO4
                    $FILTRO5
                    $FILTRO6
                    $FILTRO7
                    $FILTRO8
                    $FILTRO9
                    $FILTRO10
                    $FILTRO11
                    $FILTRO12
                    ORDER BY C.NUMTRANS,14,13,15 DESC";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    $intContador = 0;
    $intNumTrans = 0;
    while ($rTMP = ibase_fetch_assoc($v_query)) {
        if( $intNumTrans != $rTMP["NUMTRANS"] ){
            $intContador = 0;
        }
        
        $arrGestion[$rTMP["NUMTRANS"]]["NOMBRE"]             = $rTMP["NOMBRE"];
        $arrGestion[$rTMP["NUMTRANS"]]["NIT"]             = $rTMP["NIT"];
        $arrGestion[$rTMP["NUMTRANS"]]["IDENTIFI"]             = $rTMP["IDENTIFI"];
        $arrGestion[$rTMP["NUMTRANS"]]["FECHANAC"]             = $rTMP["FECHANAC"];
        $arrGestion[$rTMP["NUMTRANS"]]["SUBCONCL"]             = $rTMP["SUBCONCL"];
        $arrGestion[$rTMP["NUMTRANS"]]["SALDOACT"]             = $rTMP["SALDOACT"];
        $arrGestion[$rTMP["NUMTRANS"]]["LIMITE"]             = $rTMP["LIMITE"];
        $arrGestion[$rTMP["NUMTRANS"]]["SALDOACD"]             = $rTMP["SALDOACD"];
        $arrGestion[$rTMP["NUMTRANS"]]["PAGOMINQ"]             = $rTMP["PAGOMINQ"];
        $arrGestion[$rTMP["NUMTRANS"]]["PAGOMIND"]             = $rTMP["PAGOMIND"];
        $arrGestion[$rTMP["NUMTRANS"]]["ORIGEN"]             = $rTMP["ORIGEN"];
        $arrGestion[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
        $arrGestion[$rTMP["NUMTRANS"]]["GESTORD"]             = $rTMP["GESTORD"];
        $arrGestion[$rTMP["NUMTRANS"]]["ACTIVO"]             = $rTMP["ACTIVO"];
        $arrGestion[$rTMP["NUMTRANS"]]["PL"]             = $rTMP["PL"];        
        $arrGestion[$rTMP['NUMTRANS']]['CONT'][$intContador] = $rTMP['NUMERO'];
        $intNumTrans = $rTMP["NUMTRANS"];
        $intContador++;
    }
    //ibase_free_result($v_query);
    
    header("Cache-Control: must-revalidate");
    header("Pragma: must-revalidate");
    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=controlProduccion.csv");
    header("Expires: 0");
    
?>
<?PHP echo 'NOMBRE,IDENTIFICACION,NIT,FECHA_NACIMIENTO,CATEGORIA,LIMITE,SALDOACTUAL_Q,SALDOACTUALD,ORIGEN,NUMTRANS,GESTOR,ACTIVO,PL,TELEFONO,TELEFONO2,TELEFONO3,TELEFONO4,TELEFONO5,TELEFONO6,TELEFONO7,TELEFONO8,TELEFONO9,TELEFONO10,TELEFONO11,TELEFONO12,TELEFONO13,TELEFONO14,TELEFONO15,TELEFONO16,TELEFONO17,TELEFONO18,TELEFONO19,TELEFONO20' ?>;
<?php
    $NUMEROS = '';
    if (is_array($arrGestion) && (count($arrGestion) > 0)) {
        reset($arrGestion);
        foreach ($arrGestion as $keyC => $valueC) {
            
            for( $i = 0; $i < 20; $i++) {
                $strNum = isset($valueC["CONT"][$i])?trim($valueC["CONT"][$i]):'';
                $strNum = ($strNum != '')?$strNum:'';
                $strSplit = ($i != 19)?',':'';
                $NUMEROS .= trim($strNum).$strSplit;

            }
?>
<?php 
print trim($valueC['NOMBRE']) . ',' . trim($valueC['IDENTIFI']) . ',' . trim($valueC['NIT']) . ',' . trim($valueC['FECHANAC']) . ',' . trim($valueC['SUBCONCL']) . ',' . trim($valueC['LIMITE']) . ',' . trim($valueC['SALDOACT']) . ',' . trim($valueC['SALDOACD']) . ',' . trim($valueC['ORIGEN']) . ',' . trim($valueC['NUMTRANS']) . ',' . trim($valueC['GESTORD']) . ',' . trim($valueC['ACTIVO']) . ',' . trim($valueC['PL']). ',' . trim($NUMEROS); 
?>;
<?PHP
            $NUMEROS = '';
        }
    }
    ?>
<?php
}
