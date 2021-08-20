<?php
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/conexion.php';

    $conectar = conectar();
    $username = $_SESSION["USUARIO"];
    $username = trim($username);

    $descripPlantilla = isset($_POST["descripPlantilla"]) ? $_POST["descripPlantilla"]  : '';

    $CODIEMPR = isset($_POST["CODIEMPR"]) ? $_POST["CODIEMPR"] : 0;
    $CODICLIE = isset($_POST["CODICLIE"]) ? $_POST["CODICLIE"] : 0;
    $CLAPROD = isset($_POST["CLAPROD"]) ? $_POST["CLAPROD"] : 0;
    $NOMBRE = isset($_POST["NOMBRE"]) ? $_POST["NOMBRE"] : 0;
    $FASIG = isset($_POST["FASIG"]) ? $_POST["FASIG"] : 0;
    $SALDO = isset($_POST["SALDO"]) ? $_POST["SALDO"] : 0;
    $MORA = isset($_POST["MORA"]) ? $_POST["MORA"] : 0;
    $FVENCE = isset($_POST["FVENCE"]) ? $_POST["FVENCE"] : 0;
    $TIPOPROD = isset($_POST["TIPOPROD"]) ? $_POST["TIPOPROD"] : 0;
    $GESTORD = isset($_POST["GESTORD"]) ? $_POST["GESTORD"] : 0;
    $FPROPAGO = isset($_POST["FPROPAGO"]) ? $_POST["FPROPAGO"] : 0;
    $IDENTIFI = isset($_POST["IDENTIFI"]) ? $_POST["IDENTIFI"] : 0;
    $NIT = isset($_POST["NIT"]) ? $_POST["NIT"] : 0;
    $PAGOS = isset($_POST["PAGOS"]) ? $_POST["PAGOS"] : 0;
    $PAGOXVER = isset($_POST["PAGOXVER"]) ? $_POST["PAGOXVER"] : 0;
    $BOLETA = isset($_POST["BOLETA"]) ? $_POST["BOLETA"] : 0;
    $FULTPAGO = isset($_POST["FULTPAGO"]) ? $_POST["FULTPAGO"] : 0;
    $DIAPAGO = isset($_POST["DIAPAGO"]) ? $_POST["DIAPAGO"] : 0;
    $SALDOVEQ = isset($_POST["SALDOVEQ"]) ? $_POST["SALDOVEQ"] : 0;
    $PAGOMINQ = isset($_POST["PAGOMINQ"]) ? $_POST["PAGOMINQ"] : 0;
    $SALDOD = isset($_POST["SALDOD"]) ? $_POST["SALDOD"] : 0;
    $SALDOVED = isset($_POST["SALDOVED"]) ? $_POST["SALDOVED"] : 0;
    $PAGOMIND = isset($_POST["PAGOMIND"]) ? $_POST["PAGOMIND"] : 0;
    $FULTPAGD = isset($_POST["FULTPAGD"]) ? $_POST["FULTPAGD"] : 0;
    $CICLOVEQ = isset($_POST["CICLOVEQ"]) ? $_POST["CICLOVEQ"] : 0;
    $CICLOVED = isset($_POST["CICLOVED"]) ? $_POST["CICLOVED"] : 0;
    $PAGOSD = isset($_POST["PAGOSD"]) ? $_POST["PAGOSD"] : 0;
    $MONTOUPQ = isset($_POST["MONTOUPQ"]) ? $_POST["MONTOUPQ"] : 0;
    $PORDESC = isset($_POST["PORDESC"]) ? $_POST["PORDESC"] : 0;
    $SALDEXTQ = isset($_POST["SALDEXTQ"]) ? $_POST["SALDEXTQ"] : 0;
    $SALDEXTD = isset($_POST["SALDEXTD"]) ? $_POST["SALDEXTD"] : 0;
    $GENERO = isset($_POST["GENERO"]) ? $_POST["GENERO"] : 0;
    $ESTCIVIL = isset($_POST["ESTCIVIL"]) ? $_POST["ESTCIVIL"] : 0;
    $NOMTRAB = isset($_POST["NOMTRAB"]) ? $_POST["NOMTRAB"] : 0;
    $MONTOTOR = isset($_POST["MONTOTOR"]) ? $_POST["MONTOTOR"] : 0;
    $CAPATRAS = isset($_POST["CAPATRAS"]) ? $_POST["CAPATRAS"] : 0;
    $INTATRAS = isset($_POST["INTATRAS"]) ? $_POST["INTATRAS"] : 0;
    $MORATRAS = isset($_POST["MORATRAS"]) ? $_POST["MORATRAS"] : 0;
    $TOTATRAS = isset($_POST["TOTATRAS"]) ? $_POST["TOTATRAS"] : 0;
    $QOTRENEG = isset($_POST["QOTRENEG"]) ? $_POST["QOTRENEG"] : 0;
    $TASACRED = isset($_POST["TASACRED"]) ? $_POST["TASACRED"] : 0;
    $QOTCONVE = isset($_POST["QOTCONVE"]) ? $_POST["QOTCONVE"] : 0;
    $EXTRAFIN = isset($_POST["EXTRAFIN"]) ? $_POST["EXTRAFIN"] : 0;
    $MESES3 = isset($_POST["MESES3"]) ? $_POST["MESES3"] : 0;
    $MESES6 = isset($_POST["MESES6"]) ? $_POST["MESES6"] : 0;
    $MESES9 = isset($_POST["MESES9"]) ? $_POST["MESES9"] : 0;
    $MESES12 = isset($_POST["MESES12"]) ? $_POST["MESES12"] : 0;
    $MESES18 = isset($_POST["MESES18"]) ? $_POST["MESES18"] : 0;
    $MESES24 = isset($_POST["MESES24"]) ? $_POST["MESES24"] : 0;
    $MESES36 = isset($_POST["MESES36"]) ? $_POST["MESES36"] : 0;
    $MESES48 = isset($_POST["MESES48"]) ? $_POST["MESES48"] : 0;
    $CICLOV1Q = isset($_POST["CICLOV1Q"]) ? $_POST["CICLOV1Q"] : 0;
    $CICLOV2Q = isset($_POST["CICLOV2Q"]) ? $_POST["CICLOV2Q"] : 0;
    $CICLOV3Q = isset($_POST["CICLOV3Q"]) ? $_POST["CICLOV3Q"] : 0;
    $CICLOV4Q = isset($_POST["CICLOV4Q"]) ? $_POST["CICLOV4Q"] : 0;
    $CICLOV5Q = isset($_POST["CICLOV5Q"]) ? $_POST["CICLOV5Q"] : 0;
    $CICLOV6Q = isset($_POST["CICLOV6Q"]) ? $_POST["CICLOV6Q"] : 0;
    $CICLOV7Q = isset($_POST["CICLOV7Q"]) ? $_POST["CICLOV7Q"] : 0;
    $CICLOV8Q = isset($_POST["CICLOV8Q"]) ? $_POST["CICLOV8Q"] : 0;
    $CICLOV9Q = isset($_POST["CICLOV9Q"]) ? $_POST["CICLOV9Q"] : 0;
    $CICLOV1D = isset($_POST["CICLOV1D"]) ? $_POST["CICLOV1D"] : 0;
    $CICLOV2D = isset($_POST["CICLOV2D"]) ? $_POST["CICLOV2D"] : 0;
    $CICLOV3D = isset($_POST["CICLOV3D"]) ? $_POST["CICLOV3D"] : 0;
    $CICLOV4D = isset($_POST["CICLOV4D"]) ? $_POST["CICLOV4D"] : 0;
    $CICLOV5D = isset($_POST["CICLOV5D"]) ? $_POST["CICLOV5D"] : 0;
    $CICLOV6D = isset($_POST["CICLOV6D"]) ? $_POST["CICLOV6D"] : 0;
    $CICLOV7D = isset($_POST["CICLOV7D"]) ? $_POST["CICLOV7D"] : 0;
    $CICLOV8D = isset($_POST["CICLOV8D"]) ? $_POST["CICLOV8D"] : 0;
    $FECHAPER = isset($_POST["FECHAPER"]) ? $_POST["FECHAPER"] : 0;
    $FECHAFIN = isset($_POST["FECHAFIN"]) ? $_POST["FECHAFIN"] : 0;
    $FECHACOR = isset($_POST["FECHACOR"]) ? $_POST["FECHACOR"] : 0;
    $EXPEDIEN = isset($_POST["EXPEDIEN"]) ? $_POST["EXPEDIEN"] : 0;
    $CICLO = isset($_POST["CICLO"]) ? $_POST["CICLO"] : 0;
    $SALDOD2 = isset($_POST["SALDOD2"]) ? $_POST["SALDOD2"] : 0;
    $FULTGEST = isset($_POST["FULTGEST"]) ? $_POST["FULTGEST"] : 0;
    $PLAZCRED = isset($_POST["PLAZCRED"]) ? $_POST["PLAZCRED"] : 0;
    $NOMAGENTE = isset($_POST["NOMAGENTE"]) ? $_POST["NOMAGENTE"] : 0;
    $EXTENCION = isset($_POST["EXTENCION"]) ? $_POST["EXTENCION"] : 0;
    $DEUDOR = isset($_POST["DEUDOR"]) ? $_POST["DEUDOR"] : 0;
    $CODEUDOR = isset($_POST["CODEUDOR"]) ? $_POST["CODEUDOR"] : 0;
    $JUICIO = isset($_POST["JUICIO"]) ? $_POST["JUICIO"] : 0;
    $AGENTE = isset($_POST["AGENTE"]) ? $_POST["AGENTE"] : 0;
    $CORRELAT = isset($_POST["CORRELAT"]) ? $_POST["CORRELAT"] : 0;
    $DIREC = isset($_POST["DIREC"]) ? $_POST["DIREC"] : 0;
    $EMAIL = isset($_POST["EMAIL"]) ? $_POST["EMAIL"] : 0;
    $PAIS = isset($_POST["PAIS"]) ? $_POST["PAIS"] : 0;
    $CANAL = isset($_POST["CANAL"]) ? $_POST["CANAL"] : 0;
    $SUCURSAL = isset($_POST["SUCURSAL"]) ? $_POST["SUCURSAL"] : 0;
    $FOLIO = isset($_POST["FOLIO"]) ? $_POST["FOLIO"] : 0;
    $IDCAMPANA = isset($_POST["IDCAMPANA"]) ? $_POST["IDCAMPANA"] : 0;
    $CODIEMPR_ord = isset($_POST["ord_CODIEMPR"]) ? $_POST["ord_CODIEMPR"] : 0;
    $CODICLIE_ord = isset($_POST["ord_CODICLIE"]) ? $_POST["ord_CODICLIE"] : 0;
    $CLAPROD_ord = isset($_POST["ord_CLAPROD"]) ? $_POST["ord_CLAPROD"] : 0;
    $NOMBRE_ord = isset($_POST["ord_NOMBRE"]) ? $_POST["ord_NOMBRE"] : 0;
    $FASIG_ord = isset($_POST["ord_FASIG"]) ? $_POST["ord_FASIG"] : 0;
    $SALDO_ord = isset($_POST["ord_SALDO"]) ? $_POST["ord_SALDO"] : 0;
    $MORA_ord = isset($_POST["ord_MORA"]) ? $_POST["ord_MORA"] : 0;
    $FVENCE_ord = isset($_POST["ord_FVENCE"]) ? $_POST["ord_FVENCE"] : 0;
    $TIPOPROD_ord = isset($_POST["ord_TIPOPROD"]) ? $_POST["ord_TIPOPROD"] : 0;
    $GESTORD_ord = isset($_POST["ord_GESTORD"]) ? $_POST["ord_GESTORD"] : 0;
    $FPROPAGO_ord = isset($_POST["ord_FPROPAGO"]) ? $_POST["ord_FPROPAGO"] : 0;
    $IDENTIFI_ord = isset($_POST["ord_IDENTIFI"]) ? $_POST["ord_IDENTIFI"] : 0;
    $NIT_ord = isset($_POST["ord_NIT"]) ? $_POST["ord_NIT"] : 0;
    $PAGOS_ord = isset($_POST["ord_PAGOS"]) ? $_POST["ord_PAGOS"] : 0;
    $PAGOXVER_ord = isset($_POST["ord_PAGOXVER"]) ? $_POST["ord_PAGOXVER"] : 0;
    $BOLETA_ord = isset($_POST["ord_BOLETA"]) ? $_POST["ord_BOLETA"] : 0;
    $FULTPAGO_ord = isset($_POST["ord_FULTPAGO"]) ? $_POST["ord_FULTPAGO"] : 0;
    $DIAPAGO_ord = isset($_POST["ord_DIAPAGO"]) ? $_POST["ord_DIAPAGO"] : 0;
    $SALDOVEQ_ord = isset($_POST["ord_SALDOVEQ"]) ? $_POST["ord_SALDOVEQ"] : 0;
    $PAGOMINQ_ord = isset($_POST["ord_PAGOMINQ"]) ? $_POST["ord_PAGOMINQ"] : 0;
    $SALDOD_ord = isset($_POST["ord_SALDOD"]) ? $_POST["ord_SALDOD"] : 0;
    $SALDOVED_ord = isset($_POST["ord_SALDOVED"]) ? $_POST["ord_SALDOVED"] : 0;
    $PAGOMIND_ord = isset($_POST["ord_PAGOMIND"]) ? $_POST["ord_PAGOMIND"] : 0;
    $FULTPAGD_ord = isset($_POST["ord_FULTPAGD"]) ? $_POST["ord_FULTPAGD"] : 0;
    $CICLOVEQ_ord = isset($_POST["ord_CICLOVEQ"]) ? $_POST["ord_CICLOVEQ"] : 0;
    $CICLOVED_ord = isset($_POST["ord_CICLOVED"]) ? $_POST["ord_CICLOVED"] : 0;
    $PAGOSD_ord = isset($_POST["ord_PAGOSD"]) ? $_POST["ord_PAGOSD"] : 0;
    $MONTOUPQ_ord = isset($_POST["ord_MONTOUPQ"]) ? $_POST["ord_MONTOUPQ"] : 0;
    $PORDESC_ord = isset($_POST["ord_PORDESC"]) ? $_POST["ord_PORDESC"] : 0;
    $SALDEXTQ_ord = isset($_POST["ord_SALDEXTQ"]) ? $_POST["ord_SALDEXTQ"] : 0;
    $SALDEXTD_ord = isset($_POST["ord_SALDEXTD"]) ? $_POST["ord_SALDEXTD"] : 0;
    $GENERO_ord = isset($_POST["ord_GENERO"]) ? $_POST["ord_GENERO"] : 0;
    $ESTCIVIL_ord = isset($_POST["ord_ESTCIVIL"]) ? $_POST["ord_ESTCIVIL"] : 0;
    $NOMTRAB_ord = isset($_POST["ord_NOMTRAB"]) ? $_POST["ord_NOMTRAB"] : 0;
    $MONTOTOR_ord = isset($_POST["ord_MONTOTOR"]) ? $_POST["ord_MONTOTOR"] : 0;
    $CAPATRAS_ord = isset($_POST["ord_CAPATRAS"]) ? $_POST["ord_CAPATRAS"] : 0;
    $INTATRAS_ord = isset($_POST["ord_INTATRAS"]) ? $_POST["ord_INTATRAS"] : 0;
    $MORATRAS_ord = isset($_POST["ord_MORATRAS"]) ? $_POST["ord_MORATRAS"] : 0;
    $TOTATRAS_ord = isset($_POST["ord_TOTATRAS"]) ? $_POST["ord_TOTATRAS"] : 0;
    $QOTRENEG_ord = isset($_POST["ord_QOTRENEG"]) ? $_POST["ord_QOTRENEG"] : 0;
    $TASACRED_ord = isset($_POST["ord_TASACRED"]) ? $_POST["ord_TASACRED"] : 0;
    $QOTCONVE_ord = isset($_POST["ord_QOTCONVE"]) ? $_POST["ord_QOTCONVE"] : 0;
    $EXTRAFIN_ord = isset($_POST["ord_EXTRAFIN"]) ? $_POST["ord_EXTRAFIN"] : 0;
    $MESES3_ord = isset($_POST["ord_MESES3"]) ? $_POST["ord_MESES3"] : 0;
    $MESES6_ord = isset($_POST["ord_MESES6"]) ? $_POST["ord_MESES6"] : 0;
    $MESES9_ord = isset($_POST["ord_MESES9"]) ? $_POST["ord_MESES9"] : 0;
    $MESES12_ord = isset($_POST["ord_MESES12"]) ? $_POST["ord_MESES12"] : 0;
    $MESES18_ord = isset($_POST["ord_MESES18"]) ? $_POST["ord_MESES18"] : 0;
    $MESES24_ord = isset($_POST["ord_MESES24"]) ? $_POST["ord_MESES24"] : 0;
    $MESES36_ord = isset($_POST["ord_MESES36"]) ? $_POST["ord_MESES36"] : 0;
    $MESES48_ord = isset($_POST["ord_MESES48"]) ? $_POST["ord_MESES48"] : 0;
    $CICLOV1Q_ord = isset($_POST["ord_CICLOV1Q"]) ? $_POST["ord_CICLOV1Q"] : 0;
    $CICLOV2Q_ord = isset($_POST["ord_CICLOV2Q"]) ? $_POST["ord_CICLOV2Q"] : 0;
    $CICLOV3Q_ord = isset($_POST["ord_CICLOV3Q"]) ? $_POST["ord_CICLOV3Q"] : 0;
    $CICLOV4Q_ord = isset($_POST["ord_CICLOV4Q"]) ? $_POST["ord_CICLOV4Q"] : 0;
    $CICLOV5Q_ord = isset($_POST["ord_CICLOV5Q"]) ? $_POST["ord_CICLOV5Q"] : 0;
    $CICLOV6Q_ord = isset($_POST["ord_CICLOV6Q"]) ? $_POST["ord_CICLOV6Q"] : 0;
    $CICLOV7Q_ord = isset($_POST["ord_CICLOV7Q"]) ? $_POST["ord_CICLOV7Q"] : 0;
    $CICLOV8Q_ord = isset($_POST["ord_CICLOV8Q"]) ? $_POST["ord_CICLOV8Q"] : 0;
    $CICLOV9Q_ord = isset($_POST["ord_CICLOV9Q"]) ? $_POST["ord_CICLOV9Q"] : 0;
    $CICLOV1D_ord = isset($_POST["ord_CICLOV1D"]) ? $_POST["ord_CICLOV1D"] : 0;
    $CICLOV2D_ord = isset($_POST["ord_CICLOV2D"]) ? $_POST["ord_CICLOV2D"] : 0;
    $CICLOV3D_ord = isset($_POST["ord_CICLOV3D"]) ? $_POST["ord_CICLOV3D"] : 0;
    $CICLOV4D_ord = isset($_POST["ord_CICLOV4D"]) ? $_POST["ord_CICLOV4D"] : 0;
    $CICLOV5D_ord = isset($_POST["ord_CICLOV5D"]) ? $_POST["ord_CICLOV5D"] : 0;
    $CICLOV6D_ord = isset($_POST["ord_CICLOV6D"]) ? $_POST["ord_CICLOV6D"] : 0;
    $CICLOV7D_ord = isset($_POST["ord_CICLOV7D"]) ? $_POST["ord_CICLOV7D"] : 0;
    $CICLOV8D_ord = isset($_POST["ord_CICLOV8D"]) ? $_POST["ord_CICLOV8D"] : 0;
    $FECHAPER_ord = isset($_POST["ord_FECHAPER"]) ? $_POST["ord_FECHAPER"] : 0;
    $FECHAFIN_ord = isset($_POST["ord_FECHAFIN"]) ? $_POST["ord_FECHAFIN"] : 0;
    $FECHACOR_ord = isset($_POST["ord_FECHACOR"]) ? $_POST["ord_FECHACOR"] : 0;
    $EXPEDIEN_ord = isset($_POST["ord_EXPEDIEN"]) ? $_POST["ord_EXPEDIEN"] : 0;
    $CICLO_ord = isset($_POST["ord_CICLO"]) ? $_POST["ord_CICLO"] : 0;
    $SALDOD2_ord = isset($_POST["ord_SALDOD2"]) ? $_POST["ord_SALDOD2"] : 0;
    $FULTGEST_ord = isset($_POST["ord_FULTGEST"]) ? $_POST["ord_FULTGEST"] : 0;
    $PLAZCRED_ord = isset($_POST["ord_PLAZCRED"]) ? $_POST["ord_PLAZCRED"] : 0;
    $NOMAGENTE_ord = isset($_POST["ord_NOMAGENTE"]) ? $_POST["ord_NOMAGENTE"] : 0;
    $EXTENCION_ord = isset($_POST["ord_EXTENCION"]) ? $_POST["ord_EXTENCION"] : 0;
    $DEUDOR_ord = isset($_POST["ord_DEUDOR"]) ? $_POST["ord_DEUDOR"] : 0;
    $CODEUDOR_ord = isset($_POST["ord_CODEUDOR"]) ? $_POST["ord_CODEUDOR"] : 0;
    $JUICIO_ord = isset($_POST["ord_JUICIO"]) ? $_POST["ord_JUICIO"] : 0;
    $AGENTE_ord = isset($_POST["ord_AGENTE"]) ? $_POST["ord_AGENTE"] : 0;
    $CORRELAT_ord = isset($_POST["ord_CORRELAT"]) ? $_POST["ord_CORRELAT"] : 0;
    $DIREC_ord = isset($_POST["ord_DIREC"]) ? $_POST["ord_DIREC"] : 0;
    $EMAIL_ord = isset($_POST["ord_EMAIL"]) ? $_POST["ord_EMAIL"] : 0;
    $PAIS_ord = isset($_POST["ord_PAIS"]) ? $_POST["ord_PAIS"] : 0;
    $CANAL_ord = isset($_POST["ord_CANAL"]) ? $_POST["ord_CANAL"] : 0;
    $SUCURSAL_ord = isset($_POST["ord_SUCURSAL"]) ? $_POST["ord_SUCURSAL"] : 0;
    $FOLIO_ord = isset($_POST["ord_FOLIO"]) ? $_POST["ord_FOLIO"] : 0;
    $IDCAMPANA_ord = isset($_POST["ord_IDCAMPANA"]) ? $_POST["ord_IDCAMPANA"] : 0;
    $CODIEMPR_cod = isset($_POST["cod_CODIEMPR"]) ? $_POST["cod_CODIEMPR"] : '';
    $CODICLIE_cod = isset($_POST["cod_CODICLIE"]) ? $_POST["cod_CODICLIE"] : '';
    $CLAPROD_cod = isset($_POST["cod_CLAPROD"]) ? $_POST["cod_CLAPROD"] : '';
    $NOMBRE_cod = isset($_POST["cod_NOMBRE"]) ? $_POST["cod_NOMBRE"] : '';
    $FASIG_cod = isset($_POST["cod_FASIG"]) ? $_POST["cod_FASIG"] : '';
    $SALDO_cod = isset($_POST["cod_SALDO"]) ? $_POST["cod_SALDO"] : '';
    $MORA_cod = isset($_POST["cod_MORA"]) ? $_POST["cod_MORA"] : '';
    $FVENCE_cod = isset($_POST["cod_FVENCE"]) ? $_POST["cod_FVENCE"] : '';
    $TIPOPROD_cod = isset($_POST["cod_TIPOPROD"]) ? $_POST["cod_TIPOPROD"] : '';
    $GESTORD_cod = isset($_POST["cod_GESTORD"]) ? $_POST["cod_GESTORD"] : '';
    $FPROPAGO_cod = isset($_POST["cod_FPROPAGO"]) ? $_POST["cod_FPROPAGO"] : '';
    $IDENTIFI_cod = isset($_POST["cod_IDENTIFI"]) ? $_POST["cod_IDENTIFI"] : '';
    $NIT_cod = isset($_POST["cod_NIT"]) ? $_POST["cod_NIT"] : '';
    $PAGOS_cod = isset($_POST["cod_PAGOS"]) ? $_POST["cod_PAGOS"] : '';
    $PAGOXVER_cod = isset($_POST["cod_PAGOXVER"]) ? $_POST["cod_PAGOXVER"] : '';
    $BOLETA_cod = isset($_POST["cod_BOLETA"]) ? $_POST["cod_BOLETA"] : '';
    $FULTPAGO_cod = isset($_POST["cod_FULTPAGO"]) ? $_POST["cod_FULTPAGO"] : '';
    $DIAPAGO_cod = isset($_POST["cod_DIAPAGO"]) ? $_POST["cod_DIAPAGO"] : '';
    $SALDOVEQ_cod = isset($_POST["cod_SALDOVEQ"]) ? $_POST["cod_SALDOVEQ"] : '';
    $PAGOMINQ_cod = isset($_POST["cod_PAGOMINQ"]) ? $_POST["cod_PAGOMINQ"] : '';
    $SALDOD_cod = isset($_POST["cod_SALDOD"]) ? $_POST["cod_SALDOD"] : '';
    $SALDOVED_cod = isset($_POST["cod_SALDOVED"]) ? $_POST["cod_SALDOVED"] : '';
    $PAGOMIND_cod = isset($_POST["cod_PAGOMIND"]) ? $_POST["cod_PAGOMIND"] : '';
    $FULTPAGD_cod = isset($_POST["cod_FULTPAGD"]) ? $_POST["cod_FULTPAGD"] : '';
    $CICLOVEQ_cod = isset($_POST["cod_CICLOVEQ"]) ? $_POST["cod_CICLOVEQ"] : '';
    $CICLOVED_cod = isset($_POST["cod_CICLOVED"]) ? $_POST["cod_CICLOVED"] : '';
    $PAGOSD_cod = isset($_POST["cod_PAGOSD"]) ? $_POST["cod_PAGOSD"] : '';
    $MONTOUPQ_cod = isset($_POST["cod_MONTOUPQ"]) ? $_POST["cod_MONTOUPQ"] : '';
    $PORDESC_cod = isset($_POST["cod_PORDESC"]) ? $_POST["cod_PORDESC"] : '';
    $SALDEXTQ_cod = isset($_POST["cod_SALDEXTQ"]) ? $_POST["cod_SALDEXTQ"] : '';
    $SALDEXTD_cod = isset($_POST["cod_SALDEXTD"]) ? $_POST["cod_SALDEXTD"] : '';
    $GENERO_cod = isset($_POST["cod_GENERO"]) ? $_POST["cod_GENERO"] : '';
    $ESTCIVIL_cod = isset($_POST["cod_ESTCIVIL"]) ? $_POST["cod_ESTCIVIL"] : '';
    $NOMTRAB_cod = isset($_POST["cod_NOMTRAB"]) ? $_POST["cod_NOMTRAB"] : '';
    $MONTOTOR_cod = isset($_POST["cod_MONTOTOR"]) ? $_POST["cod_MONTOTOR"] : '';
    $CAPATRAS_cod = isset($_POST["cod_CAPATRAS"]) ? $_POST["cod_CAPATRAS"] : '';
    $INTATRAS_cod = isset($_POST["cod_INTATRAS"]) ? $_POST["cod_INTATRAS"] : '';
    $MORATRAS_cod = isset($_POST["cod_MORATRAS"]) ? $_POST["cod_MORATRAS"] : '';
    $TOTATRAS_cod = isset($_POST["cod_TOTATRAS"]) ? $_POST["cod_TOTATRAS"] : '';
    $QOTRENEG_cod = isset($_POST["cod_QOTRENEG"]) ? $_POST["cod_QOTRENEG"] : '';
    $TASACRED_cod = isset($_POST["cod_TASACRED"]) ? $_POST["cod_TASACRED"] : '';
    $QOTCONVE_cod = isset($_POST["cod_QOTCONVE"]) ? $_POST["cod_QOTCONVE"] : '';
    $EXTRAFIN_cod = isset($_POST["cod_EXTRAFIN"]) ? $_POST["cod_EXTRAFIN"] : '';
    $MESES3_cod = isset($_POST["cod_MESES3"]) ? $_POST["cod_MESES3"] : '';
    $MESES6_cod = isset($_POST["cod_MESES6"]) ? $_POST["cod_MESES6"] : '';
    $MESES9_cod = isset($_POST["cod_MESES9"]) ? $_POST["cod_MESES9"] : '';
    $MESES12_cod = isset($_POST["cod_MESES12"]) ? $_POST["cod_MESES12"] : '';
    $MESES18_cod = isset($_POST["cod_MESES18"]) ? $_POST["cod_MESES18"] : '';
    $MESES24_cod = isset($_POST["cod_MESES24"]) ? $_POST["cod_MESES24"] : '';
    $MESES36_cod = isset($_POST["cod_MESES36"]) ? $_POST["cod_MESES36"] : '';
    $MESES48_cod = isset($_POST["cod_MESES48"]) ? $_POST["cod_MESES48"] : '';
    $CICLOV1Q_cod = isset($_POST["cod_CICLOV1Q"]) ? $_POST["cod_CICLOV1Q"] : '';
    $CICLOV2Q_cod = isset($_POST["cod_CICLOV2Q"]) ? $_POST["cod_CICLOV2Q"] : '';
    $CICLOV3Q_cod = isset($_POST["cod_CICLOV3Q"]) ? $_POST["cod_CICLOV3Q"] : '';
    $CICLOV4Q_cod = isset($_POST["cod_CICLOV4Q"]) ? $_POST["cod_CICLOV4Q"] : '';
    $CICLOV5Q_cod = isset($_POST["cod_CICLOV5Q"]) ? $_POST["cod_CICLOV5Q"] : '';
    $CICLOV6Q_cod = isset($_POST["cod_CICLOV6Q"]) ? $_POST["cod_CICLOV6Q"] : '';
    $CICLOV7Q_cod = isset($_POST["cod_CICLOV7Q"]) ? $_POST["cod_CICLOV7Q"] : '';
    $CICLOV8Q_cod = isset($_POST["cod_CICLOV8Q"]) ? $_POST["cod_CICLOV8Q"] : '';
    $CICLOV9Q_cod = isset($_POST["cod_CICLOV9Q"]) ? $_POST["cod_CICLOV9Q"] : '';
    $CICLOV1D_cod = isset($_POST["cod_CICLOV1D"]) ? $_POST["cod_CICLOV1D"] : '';
    $CICLOV2D_cod = isset($_POST["cod_CICLOV2D"]) ? $_POST["cod_CICLOV2D"] : '';
    $CICLOV3D_cod = isset($_POST["cod_CICLOV3D"]) ? $_POST["cod_CICLOV3D"] : '';
    $CICLOV4D_cod = isset($_POST["cod_CICLOV4D"]) ? $_POST["cod_CICLOV4D"] : '';
    $CICLOV5D_cod = isset($_POST["cod_CICLOV5D"]) ? $_POST["cod_CICLOV5D"] : '';
    $CICLOV6D_cod = isset($_POST["cod_CICLOV6D"]) ? $_POST["cod_CICLOV6D"] : '';
    $CICLOV7D_cod = isset($_POST["cod_CICLOV7D"]) ? $_POST["cod_CICLOV7D"] : '';
    $CICLOV8D_cod = isset($_POST["cod_CICLOV8D"]) ? $_POST["cod_CICLOV8D"] : '';
    $FECHAPER_cod = isset($_POST["cod_FECHAPER"]) ? $_POST["cod_FECHAPER"] : '';
    $FECHAFIN_cod = isset($_POST["cod_FECHAFIN"]) ? $_POST["cod_FECHAFIN"] : '';
    $FECHACOR_cod = isset($_POST["cod_FECHACOR"]) ? $_POST["cod_FECHACOR"] : '';
    $EXPEDIEN_cod = isset($_POST["cod_EXPEDIEN"]) ? $_POST["cod_EXPEDIEN"] : '';
    $CICLO_cod = isset($_POST["cod_CICLO"]) ? $_POST["cod_CICLO"] : '';
    $SALDOD2_cod = isset($_POST["cod_SALDOD2"]) ? $_POST["cod_SALDOD2"] : '';
    $FULTGEST_cod = isset($_POST["cod_FULTGEST"]) ? $_POST["cod_FULTGEST"] : '';
    $PLAZCRED_cod = isset($_POST["cod_PLAZCRED"]) ? $_POST["cod_PLAZCRED"] : '';
    $NOMAGENTE_cod = isset($_POST["cod_NOMAGENTE"]) ? $_POST["cod_NOMAGENTE"] : '';
    $EXTENCION_cod = isset($_POST["cod_EXTENCION"]) ? $_POST["cod_EXTENCION"] : '';
    $DEUDOR_cod = isset($_POST["cod_DEUDOR"]) ? $_POST["cod_DEUDOR"] : '';
    $CODEUDOR_cod = isset($_POST["cod_CODEUDOR"]) ? $_POST["cod_CODEUDOR"] : '';
    $JUICIO_cod = isset($_POST["cod_JUICIO"]) ? $_POST["cod_JUICIO"] : '';
    $AGENTE_cod = isset($_POST["cod_AGENTE"]) ? $_POST["cod_AGENTE"] : '';
    $CORRELAT_cod = isset($_POST["cod_CORRELAT"]) ? $_POST["cod_CORRELAT"] : '';
    $DIREC_cod = isset($_POST["cod_DIREC"]) ? $_POST["cod_DIREC"] : '';
    $EMAIL_cod = isset($_POST["cod_EMAIL"]) ? $_POST["cod_EMAIL"] : '';
    $PAIS_cod = isset($_POST["cod_PAIS"]) ? $_POST["cod_PAIS"] : '';
    $CANAL_cod = isset($_POST["cod_CANAL"]) ? $_POST["cod_CANAL"] : '';
    $SUCURSAL_cod = isset($_POST["cod_SUCURSAL"]) ? $_POST["cod_SUCURSAL"] : '';
    $FOLIO_cod = isset($_POST["cod_FOLIO"]) ? $_POST["cod_FOLIO"] : '';
    $IDCAMPANA_cod = isset($_POST["cod_IDCAMPANA"]) ? $_POST["cod_IDCAMPANA"] : '';

    $USR_STATUS = 1;
    $stat = 1;

    $fecha = date('Y-m-d H:i:s');

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "insert_data") {

        ///////////////////////////////////////////////////////////////////////////////////////
        ///////////////NUMERO DE ENVIO ///////////////////////////////////////////////////////

        $rsNIU = ibase_query("SELECT CORRPAQ FROM CG000001");
        if ($row = ibase_fetch_row($rsNIU)) {
            $idRow = trim($row[0]);
        }
        $CORRPAQ = isset($idRow) ? $idRow : 0;
        $CORRPAQ = $CORRPAQ + 1;

        $var_consulta = "UPDATE CG000001 SET CORRPAQ = $CORRPAQ";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            echo $val;
        } else {
            echo '0';
            //echo $var_consulta;
        }

        //print json_encode($arrInfo);

        //////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////// GRABAR TRABAJO/////////////////////////////////////////////////

        $VNUMEMPRE = isset($_POST["CodePlantilla"]) ? $_POST["CodePlantilla"] : '';
        $NUMEMPRE = isset($_POST["NUMEMPRE"]) ? $_POST["NUMEMPRE"] : '';
        $NUMENV = $CORRPAQ;
        $FOPERA = isset($_POST["FRECEPCI"]) ? $_POST["FRECEPCI"] : '';
        $FASIG = isset($_POST["FASIG"]) ? $_POST["FASIG"] : '';
        $FVENCE = isset($_POST["FVENCE"]) ? $_POST["FVENCE"] : '';

        $var_consulta = "INSERT INTO EN000001 (NUMEMPRE, EMPRESA, NUMENV, FRECPAQ, OWNER,  FASIG, FVENCE ) VALUES ($VNUMEMPRE, '$NUMEMPRE', $NUMENV, '$FOPERA', '$username', '$FASIG', '$FVENCE');";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            echo $val;
        } else {
            echo '0';
            //echo $var_consulta;
        }

        //print json_encode($arrInfo);

        //////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////// GRABAR TRABAJO/////////////////////////////////////////////////

        $Search = isset($_POST["CodePlantilla"]) ? $_POST["CodePlantilla"]  : '';
        $arrCarga = array();
        $stmt = "SELECT     C.CAMPO, 
                            C.NOMCAMPO, 
                            C.TIPO, 
                            C.ANCHO
                    FROM CARGACTU C
                    JOIN PLANCARGA P
                        ON P.CODIGO = C.CODIGO
                    WHERE CODIGOPLA = $Search
                    AND STATUS = 1
                    ORDER BY P.ORDEN";

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        $intContadorCampos = 1;
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrCarga[$intContadorCampos]["CAMPO"]               = $rTMP["CAMPO"];
            $arrCarga[$intContadorCampos]["TIPO"]               = $rTMP["TIPO"];
            $intContadorCampos++;
        }
        ibase_free_result($v_query);

        $CAMPOS = '';
        if (is_array($arrCarga) && (count($arrCarga) > 0)) {
            $intContadorLimite = count($arrCarga);
            reset($arrCarga);
            foreach ($arrCarga as $rTMP['key'] => $rTMP['value']) {
                $CAMPOS .= $rTMP["value"]['CAMPO'] . ',';
            }
        }

        $fileContacts = $_FILES['fileContacts'];
        $fileContacts = file_get_contents($fileContacts['tmp_name']);
        $fileContacts = str_replace(';;', ";NULL;", $fileContacts);
        $fileContacts = str_replace(',', '', $fileContacts);
        $fileContacts = str_replace('/', '.', $fileContacts);
        $fileContacts = explode(";", $fileContacts);
        $fileContacts = array_filter($fileContacts);
        $intKey = 0;
        $intControl = 1;
        foreach ($fileContacts as $contact) {

            if ($intControl == $intContadorLimite) {
                $keyRow = 0;
                $arrCtrl = explode(PHP_EOL, $contact);
                if (count($arrCtrl) == 2) {
                    //print_r($arrCtrl);
                    $contact = $arrCtrl[0];
                    $keyRow = $arrCtrl[1];
                } else {
                    $contact = '';
                    for ($i = 0; $i < count($arrCtrl); $i++) {
                        $contact .= $arrCtrl[$i];
                    }
                    $keyRow = $arrCtrl[(count($arrCtrl) - 1)];
                }
            }

            $strTexto = trim(preg_replace("/\r|\n/", "", $contact));
            $contactList[$intKey][$intControl] = $strTexto;
            $intControl++;

            if ($intControl == ($intContadorLimite + 1)) {
                $intKey++;
                if ($keyRow != 0) {
                    $contactList[$intKey][1] = $keyRow;
                }
                $intControl = 2;
            }
        }


        //header('Content-Type: application/json');       
        //print_r($arrCarga);
        $username = trim($username);
        foreach ($contactList as $key => $contactData) {
            $strCampos = '';
            reset($arrCarga);
            foreach ($arrCarga as $key => $rTMP['value']) {
                $strCampoTmp = '';
                $strDato = isset($contactData[$key]) ? $contactData[$key] : '';
                if ($strDato != 'NULL') {
                    if ($rTMP["value"]['TIPO'] == 'N') {
                        $strDato = str_replace(',', '', $strDato);
                        $strCampoTmp = "$strDato,";
                    } else if ($rTMP["value"]['TIPO'] == 'F') {
                        $strDato = str_replace('/', '.', $strDato);
                        $strCampoTmp = "'$strDato',";
                    } else {
                        $strDato = str_replace(',', '', $strDato);
                        $strCampoTmp = "'$strDato',";
                    }
                } else {
                    $strDato = str_replace(',', '', $strDato);
                    $strCampoTmp = "$strDato,";
                }
                $strCampos .= $strCampoTmp;
            }

           //print 'contactData   '.$contactData[1].'<br>       ';
           //print 'contactData   '.$contactData[2].'<br>       ';
           //print 'contactData   '.$contactData[3].'<br>       ';
           //print 'contactData   '.$contactData[4].'<br>       ';
           //print 'contactData   '.$contactData[5].'<br>       ';
           //print 'contactData   '.$contactData[6].'<br>       ';
           //print 'contactData   '.$contactData[7].'<br>       ';
           //print 'contactData   '.$contactData[8].'<br>       ';
           //print 'contactData   '.$contactData[9].'<br>       ';
           //print 'contactData   '.$contactData[10].'<br>  <br>      ';

            //$strCampos = str_replace("''NULL''","NULL",$strCampos);

            //$strCampos = str_replace("''","'",$strCampos);
            $var_consulta = "INSERT INTO GC000001(NUMTRANS, $CAMPOS  FRECEPCI, FASIG, FVENCE, NUMEMPRE, OWNER, NUMENV) VALUES(0, {$strCampos}  '$FOPERA', '$FASIG', '$FVENCE', $NUMEMPRE, '$username', $NUMENV);";
            //print $var_consulta.'<br>';
            $query = ibase_prepare($var_consulta);
            $val = 1;
            if ($v_query = ibase_execute($query)) {
                echo $val;
            } else {
                echo '0';
                echo $var_consulta;
            }
        }

        //print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "insert_plantilla") {
        header('Content-Type: application/json');

        $rsNIU = ibase_query("SELECT CORRPAQ FROM CG000001");
        if ($row = ibase_fetch_row($rsNIU)) {
            $idRow = trim($row[0]);
        }
        $NIU = isset($idRow) ? $idRow : 0;
        $NIU = $NIU + 1;

        $var_consulta = "UPDATE CG000001 SET CORRPAQ = $NIU + 1";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PC000001 (CODIGOPLA, DESCRIP) VALUES ($NIU, '$descripPlantilla');";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CODIEMPR_cod, $NIU, $CODIEMPR_ord, $CODIEMPR);";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CODICLIE_cod, $NIU, $CODICLIE_ord, $CODICLIE);";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CLAPROD_cod, $NIU, $CLAPROD_ord, $CLAPROD);";
        $query = ibase_prepare($var_consulta);
        $val = 3;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($NOMBRE_cod, $NIU, $NOMBRE_ord, $NOMBRE);";
        $query = ibase_prepare($var_consulta);
        $val = 4;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FASIG_cod, $NIU, $FASIG_ord, $FASIG);";
        $query = ibase_prepare($var_consulta);
        $val = 5;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDO_cod, $NIU, $SALDO_ord, $SALDO);";
        $query = ibase_prepare($var_consulta);
        $val = 6;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MORA_cod, $NIU, $MORA_ord, $MORA);";
        $query = ibase_prepare($var_consulta);
        $val = 7;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FVENCE_cod, $NIU, $FVENCE_ord, $FVENCE);";
        $query = ibase_prepare($var_consulta);
        $val = 8;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($TIPOPROD_cod, $NIU, $TIPOPROD_ord, $TIPOPROD);";
        $query = ibase_prepare($var_consulta);
        $val = 9;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($GESTORD_cod, $NIU, $GESTORD_ord, $GESTORD);";
        $query = ibase_prepare($var_consulta);
        $val = 10;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FPROPAGO_cod, $NIU, $FPROPAGO_ord, $FPROPAGO);";
        $query = ibase_prepare($var_consulta);
        $val = 11;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($IDENTIFI_cod, $NIU, $IDENTIFI_ord, $IDENTIFI);";
        $query = ibase_prepare($var_consulta);
        $val = 12;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($NIT_cod, $NIU, $NIT_ord, $NIT);";
        $query = ibase_prepare($var_consulta);
        $val = 13;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAGOS_cod, $NIU, $PAGOS_ord, $PAGOS);";
        $query = ibase_prepare($var_consulta);
        $val = 14;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAGOXVER_cod, $NIU, $PAGOXVER_ord, $PAGOXVER);";
        $query = ibase_prepare($var_consulta);
        $val = 15;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($BOLETA_cod, $NIU, $BOLETA_ord, $BOLETA);";
        $query = ibase_prepare($var_consulta);
        $val = 16;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FULTPAGO_cod, $NIU, $FULTPAGO_ord, $FULTPAGO);";
        $query = ibase_prepare($var_consulta);
        $val = 17;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($DIAPAGO_cod, $NIU, $DIAPAGO_ord, $DIAPAGO);";
        $query = ibase_prepare($var_consulta);
        $val = 18;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDOVEQ_cod, $NIU, $SALDOVEQ_ord, $SALDOVEQ);";
        $query = ibase_prepare($var_consulta);
        $val = 19;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAGOMINQ_cod, $NIU, $PAGOMINQ_ord, $PAGOMINQ);";
        $query = ibase_prepare($var_consulta);
        $val = 20;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDOVED_cod, $NIU, $SALDOVED_ord, $SALDOVED);";
        $query = ibase_prepare($var_consulta);
        $val = 21;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAGOMIND_cod, $NIU, $PAGOMIND_ord, $PAGOMIND);";
        $query = ibase_prepare($var_consulta);
        $val = 22;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FULTPAGD_cod, $NIU, $FULTPAGD_ord, $FULTPAGD);";
        $query = ibase_prepare($var_consulta);
        $val = 23;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOVEQ_cod, $NIU, $CICLOVEQ_ord, $CICLOVEQ);";
        $query = ibase_prepare($var_consulta);
        $val = 24;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOVED_cod, $NIU, $CICLOVED_ord, $CICLOVED);";
        $query = ibase_prepare($var_consulta);
        $val = 25;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAGOSD_cod, $NIU, $PAGOSD_ord, $PAGOSD);";
        $query = ibase_prepare($var_consulta);
        $val = 26;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MONTOUPQ_cod, $NIU, $MONTOUPQ_ord, $MONTOUPQ);";
        $query = ibase_prepare($var_consulta);
        $val = 27;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PORDESC_cod, $NIU, $PORDESC_ord, $PORDESC);";
        $query = ibase_prepare($var_consulta);
        $val = 28;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDEXTQ_cod, $NIU, $SALDEXTQ_ord, $SALDEXTQ);";
        $query = ibase_prepare($var_consulta);
        $val = 29;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDEXTD_cod, $NIU, $SALDEXTD_ord, $SALDEXTD);";
        $query = ibase_prepare($var_consulta);
        $val = 30;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($GENERO_cod, $NIU, $GENERO_ord, $GENERO);";
        $query = ibase_prepare($var_consulta);
        $val = 31;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($ESTCIVIL_cod, $NIU, $ESTCIVIL_ord, $ESTCIVIL);";
        $query = ibase_prepare($var_consulta);
        $val = 32;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($NOMTRAB_cod, $NIU, $NOMTRAB_ord, $NOMTRAB);";
        $query = ibase_prepare($var_consulta);
        $val = 33;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MONTOTOR_cod, $NIU, $MONTOTOR_ord, $MONTOTOR);";
        $query = ibase_prepare($var_consulta);
        $val = 34;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CAPATRAS_cod, $NIU, $CAPATRAS_ord, $CAPATRAS);";
        $query = ibase_prepare($var_consulta);
        $val = 35;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($INTATRAS_cod, $NIU, $INTATRAS_ord, $INTATRAS);";
        $query = ibase_prepare($var_consulta);
        $val = 36;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MORATRAS_cod, $NIU, $MORATRAS_ord, $MORATRAS);";
        $query = ibase_prepare($var_consulta);
        $val = 37;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($TOTATRAS_cod, $NIU, $TOTATRAS_ord, $TOTATRAS);";
        $query = ibase_prepare($var_consulta);
        $val = 38;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($QOTRENEG_cod, $NIU, $QOTRENEG_ord, $QOTRENEG);";
        $query = ibase_prepare($var_consulta);
        $val = 39;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($TASACRED_cod, $NIU, $TASACRED_ord, $TASACRED);";
        $query = ibase_prepare($var_consulta);
        $val = 40;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($QOTCONVE_cod, $NIU, $QOTCONVE_ord, $QOTCONVE);";
        $query = ibase_prepare($var_consulta);
        $val = 41;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($EXTRAFIN_cod, $NIU, $EXTRAFIN_ord, $EXTRAFIN);";
        $query = ibase_prepare($var_consulta);
        $val = 42;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES3_cod, $NIU, $MESES3_ord, $MESES3);";
        $query = ibase_prepare($var_consulta);
        $val = 43;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES6_cod, $NIU, $MESES6_ord, $MESES6);";
        $query = ibase_prepare($var_consulta);
        $val = 44;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES9_cod, $NIU, $MESES9_ord, $MESES9);";
        $query = ibase_prepare($var_consulta);
        $val = 45;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES12_cod, $NIU, $MESES12_ord, $MESES12);";
        $query = ibase_prepare($var_consulta);
        $val = 46;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES18_cod, $NIU, $MESES18_ord, $MESES18);";
        $query = ibase_prepare($var_consulta);
        $val = 47;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES24_cod, $NIU, $MESES24_ord, $MESES24);";
        $query = ibase_prepare($var_consulta);
        $val = 48;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES36_cod, $NIU, $MESES36_ord, $MESES36);";
        $query = ibase_prepare($var_consulta);
        $val = 49;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($MESES48_cod, $NIU, $MESES48_ord, $MESES48);";
        $query = ibase_prepare($var_consulta);
        $val = 50;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV1Q_cod, $NIU, $CICLOV1Q_ord, $CICLOV1Q);";
        $query = ibase_prepare($var_consulta);
        $val = 51;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV2Q_cod, $NIU, $CICLOV2Q_ord, $CICLOV2Q);";
        $query = ibase_prepare($var_consulta);
        $val = 52;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV3Q_cod, $NIU, $CICLOV3Q_ord, $CICLOV3Q);";
        $query = ibase_prepare($var_consulta);
        $val = 53;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV4Q_cod, $NIU, $CICLOV4Q_ord, $CICLOV4Q);";
        $query = ibase_prepare($var_consulta);
        $val = 54;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV5Q_cod, $NIU, $CICLOV5Q_ord, $CICLOV5Q);";
        $query = ibase_prepare($var_consulta);
        $val = 55;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV7Q_cod, $NIU, $CICLOV7Q_ord, $CICLOV7Q);";
        $query = ibase_prepare($var_consulta);
        $val = 56;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV8Q_cod, $NIU, $CICLOV8Q_ord, $CICLOV8Q);";
        $query = ibase_prepare($var_consulta);
        $val = 57;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV9Q_cod, $NIU, $CICLOV9Q_ord, $CICLOV9Q);";
        $query = ibase_prepare($var_consulta);
        $val = 58;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV1D_cod, $NIU, $CICLOV1D_ord, $CICLOV1D);";
        $query = ibase_prepare($var_consulta);
        $val = 59;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV2D_cod, $NIU, $CICLOV2D_ord, $CICLOV2D);";
        $query = ibase_prepare($var_consulta);
        $val = 60;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV3D_cod, $NIU, $CICLOV3D_ord, $CICLOV3D);";
        $query = ibase_prepare($var_consulta);
        $val = 61;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV4D_cod, $NIU, $CICLOV4D_ord, $CICLOV4D);";
        $query = ibase_prepare($var_consulta);
        $val = 62;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV5D_cod, $NIU, $CICLOV5D_ord, $CICLOV5D);";
        $query = ibase_prepare($var_consulta);
        $val = 63;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV6D_cod, $NIU, $CICLOV6D_ord, $CICLOV6D);";
        $query = ibase_prepare($var_consulta);
        $val = 64;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV7D_cod, $NIU, $CICLOV7D_ord, $CICLOV7D);";
        $query = ibase_prepare($var_consulta);
        $val = 65;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLOV8D_cod, $NIU, $CICLOV8D_ord, $CICLOV8D);";
        $query = ibase_prepare($var_consulta);
        $val = 66;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FECHAPER_cod, $NIU, $FECHAPER_ord, $FECHAPER);";
        $query = ibase_prepare($var_consulta);
        $val = 67;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FECHAFIN_cod, $NIU, $FECHAFIN_ord, $FECHAFIN);";
        $query = ibase_prepare($var_consulta);
        $val = 68;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FECHACOR_cod, $NIU, $FECHACOR_ord, $FECHACOR);";
        $query = ibase_prepare($var_consulta);
        $val = 69;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($EXPEDIEN_cod, $NIU, $EXPEDIEN_ord, $EXPEDIEN);";
        $query = ibase_prepare($var_consulta);
        $val = 70;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CICLO_cod, $NIU, $CICLO_ord, $CICLO);";
        $query = ibase_prepare($var_consulta);
        $val = 71;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDOD2_cod, $NIU, $SALDOD2_ord, $SALDOD2);";
        $query = ibase_prepare($var_consulta);
        $val = 72;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FULTGEST_cod, $NIU, $FULTGEST_ord, $FULTGEST);";
        $query = ibase_prepare($var_consulta);
        $val = 73;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PLAZCRED_cod, $NIU, $PLAZCRED_ord, $PLAZCRED);";
        $query = ibase_prepare($var_consulta);
        $val = 74;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($NOMAGENTE_cod, $NIU, $NOMAGENTE_ord, $NOMAGENTE);";
        $query = ibase_prepare($var_consulta);
        $val = 75;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($EXTENCION_cod, $NIU, $EXTENCION_ord, $EXTENCION);";
        $query = ibase_prepare($var_consulta);
        $val = 76;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($DEUDOR_cod, $NIU, $DEUDOR_ord, $DEUDOR);";
        $query = ibase_prepare($var_consulta);
        $val = 77;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CODEUDOR_cod, $NIU, $CODEUDOR_ord, $CODEUDOR);";
        $query = ibase_prepare($var_consulta);
        $val = 78;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($JUICIO_cod, $NIU, $JUICIO_ord, $JUICIO);";
        $query = ibase_prepare($var_consulta);
        $val = 79;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($AGENTE_cod, $NIU, $AGENTE_ord, $AGENTE);";
        $query = ibase_prepare($var_consulta);
        $val = 80;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CORRELAT_cod, $NIU, $CORRELAT_ord, $CORRELAT);";
        $query = ibase_prepare($var_consulta);
        $val = 81;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($DIREC_cod, $NIU, $DIREC_ord, $DIREC);";
        $query = ibase_prepare($var_consulta);
        $val = 82;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($EMAIL_cod, $NIU, $EMAIL_ord, $EMAIL);";
        $query = ibase_prepare($var_consulta);
        $val = 83;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($PAIS_cod, $NIU, $PAIS_ord, $PAIS);";
        $query = ibase_prepare($var_consulta);
        $val = 84;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($CANAL_cod, $NIU, $CANAL_ord, $CANAL);";
        $query = ibase_prepare($var_consulta);
        $val = 85;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SUCURSAL_cod, $NIU, $SUCURSAL_ord, $SUCURSAL);";
        $query = ibase_prepare($var_consulta);
        $val = 86;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($FOLIO_cod, $NIU, $FOLIO_ord, $FOLIO);";
        $query = ibase_prepare($var_consulta);
        $val = 87;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($IDCAMPANA_cod, $NIU, $IDCAMPANA_ord, $IDCAMPANA);";
        $query = ibase_prepare($var_consulta);
        $val = 88;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDOD_cod, $NIU, $SALDOD_ord, $SALDOD);";
        $query = ibase_prepare($var_consulta);
        $val = 89;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "INSERT INTO PLANCARGA (CODIGO, CODIGOPLA, ORDEN, STATUS) VALUES ($SALDOD_cod, $NIU, $SALDOD_ord, $SALDOD);";
        $query = ibase_prepare($var_consulta);
        $val = 90;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        // print json_encode($arrInfo);

        print json_encode($arrInfo);

        die();
    } else if ($strTipoValidacion == "update_plantilla") {
        $CodePlantillaUpdate = isset($_POST["CodePlantillaUpdate"]) ? $_POST["CodePlantillaUpdate"]  : '';

        //header('Content-Type: application/json');

        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CODIEMPR_ord, STATUS = $CODIEMPR WHERE CODIGO = $CODIEMPR_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CODICLIE_ord, STATUS = $CODICLIE WHERE CODIGO = $CODICLIE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 2;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CLAPROD_ord, STATUS = $CLAPROD WHERE CODIGO = $CLAPROD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 3;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $NOMBRE_ord, STATUS = $NOMBRE WHERE CODIGO = $NOMBRE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 4;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FASIG_ord, STATUS = $FASIG WHERE CODIGO = $FASIG_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 5;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDO_ord, STATUS = $SALDO WHERE CODIGO = $SALDO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 6;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MORA_ord, STATUS = $MORA WHERE CODIGO = $MORA_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 7;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FVENCE_ord, STATUS = $FVENCE WHERE CODIGO = $FVENCE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 8;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $TIPOPROD_ord, STATUS = $TIPOPROD WHERE CODIGO = $TIPOPROD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 9;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $GESTORD_ord, STATUS = $GESTORD WHERE CODIGO = $GESTORD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 10;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FPROPAGO_ord, STATUS = $FPROPAGO WHERE CODIGO = $FPROPAGO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 11;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $IDENTIFI_ord, STATUS = $IDENTIFI WHERE CODIGO = $IDENTIFI_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 12;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $NIT_ord, STATUS = $NIT WHERE CODIGO = $NIT_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 13;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAGOS_ord, STATUS = $PAGOS WHERE CODIGO = $PAGOS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 14;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAGOXVER_ord, STATUS = $PAGOXVER WHERE CODIGO = $PAGOXVER_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 15;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $BOLETA_ord, STATUS = $BOLETA WHERE CODIGO = $BOLETA_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 16;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FULTPAGO_ord, STATUS = $FULTPAGO WHERE CODIGO = $FULTPAGO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 17;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $DIAPAGO_ord, STATUS = $DIAPAGO WHERE CODIGO = $DIAPAGO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 18;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDOVEQ_ord, STATUS = $SALDOVEQ WHERE CODIGO = $SALDOVEQ_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 19;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAGOMINQ_ord, STATUS = $PAGOMINQ WHERE CODIGO = $PAGOMINQ_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 20;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDOVED_ord, STATUS = $SALDOVED WHERE CODIGO = $SALDOVED_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 21;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAGOMIND_ord, STATUS = $PAGOMIND WHERE CODIGO = $PAGOMIND_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 22;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FULTPAGD_ord, STATUS = $FULTPAGD WHERE CODIGO = $FULTPAGD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 23;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOVEQ_ord, STATUS = $CICLOVEQ WHERE CODIGO = $CICLOVEQ_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 24;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOVED_ord, STATUS = $CICLOVED WHERE CODIGO = $CICLOVED_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 25;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAGOSD_ord, STATUS = $PAGOSD WHERE CODIGO = $PAGOSD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 26;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MONTOUPQ_ord, STATUS = $MONTOUPQ WHERE CODIGO = $MONTOUPQ_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 27;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PORDESC_ord, STATUS = $PORDESC WHERE CODIGO = $PORDESC_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 28;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDEXTQ_ord, STATUS = $SALDEXTQ WHERE CODIGO = $SALDEXTQ_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 29;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDEXTD_ord, STATUS = $SALDEXTD WHERE CODIGO = $SALDEXTD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 30;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $GENERO_ord, STATUS = $GENERO WHERE CODIGO = $GENERO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 31;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $ESTCIVIL_ord, STATUS = $ESTCIVIL WHERE CODIGO = $ESTCIVIL_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 32;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $NOMTRAB_ord, STATUS = $NOMTRAB WHERE CODIGO = $NOMTRAB_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 33;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MONTOTOR_ord, STATUS = $MONTOTOR WHERE CODIGO = $MONTOTOR_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 34;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CAPATRAS_ord, STATUS = $CAPATRAS WHERE CODIGO = $CAPATRAS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 35;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $INTATRAS_ord, STATUS = $INTATRAS WHERE CODIGO = $INTATRAS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 36;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MORATRAS_ord, STATUS = $MORATRAS WHERE CODIGO = $MORATRAS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 37;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $TOTATRAS_ord, STATUS = $TOTATRAS WHERE CODIGO = $TOTATRAS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 38;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $QOTRENEG_ord, STATUS = $QOTRENEG WHERE CODIGO = $QOTRENEG_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 39;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $TASACRED_ord, STATUS = $TASACRED WHERE CODIGO = $TASACRED_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 40;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $QOTCONVE_ord, STATUS = $QOTCONVE WHERE CODIGO = $QOTCONVE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 41;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $EXTRAFIN_ord, STATUS = $EXTRAFIN WHERE CODIGO = $EXTRAFIN_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 42;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES3_ord, STATUS = $MESES3 WHERE CODIGO = $MESES3_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 43;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES6_ord, STATUS = $MESES6 WHERE CODIGO = $MESES6_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 44;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES9_ord, STATUS = $MESES9 WHERE CODIGO = $MESES9_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 45;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES12_ord, STATUS = $MESES12 WHERE CODIGO = $MESES12_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 46;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES18_ord, STATUS = $MESES18 WHERE CODIGO = $MESES18_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 47;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES24_ord, STATUS = $MESES24 WHERE CODIGO = $MESES24_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 48;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES36_ord, STATUS = $MESES36 WHERE CODIGO = $MESES36_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 49;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $MESES48_ord, STATUS = $MESES48 WHERE CODIGO = $MESES48_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 50;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV1Q_ord, STATUS = $CICLOV1Q WHERE CODIGO = $CICLOV1Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 51;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV2Q_ord, STATUS = $CICLOV2Q WHERE CODIGO = $CICLOV2Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 52;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV3Q_ord, STATUS = $CICLOV3Q WHERE CODIGO = $CICLOV3Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 53;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV4Q_ord, STATUS = $CICLOV4Q WHERE CODIGO = $CICLOV4Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 54;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV5Q_ord, STATUS = $CICLOV5Q WHERE CODIGO = $CICLOV5Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 55;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV7Q_ord, STATUS = $CICLOV7Q WHERE CODIGO = $CICLOV7Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 56;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV8Q_ord, STATUS = $CICLOV8Q WHERE CODIGO = $CICLOV8Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 57;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV9Q_ord, STATUS = $CICLOV9Q WHERE CODIGO = $CICLOV9Q_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 58;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV1D_ord, STATUS = $CICLOV1D WHERE CODIGO = $CICLOV1D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 59;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV2D_ord, STATUS = $CICLOV2D WHERE CODIGO = $CICLOV2D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 60;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV3D_ord, STATUS = $CICLOV3D WHERE CODIGO = $CICLOV3D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 61;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV4D_ord, STATUS = $CICLOV4D WHERE CODIGO = $CICLOV4D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 62;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV5D_ord, STATUS = $CICLOV5D WHERE CODIGO = $CICLOV5D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 63;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV6D_ord, STATUS = $CICLOV6D WHERE CODIGO = $CICLOV6D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 64;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV7D_ord, STATUS = $CICLOV7D WHERE CODIGO = $CICLOV7D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 65;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLOV8D_ord, STATUS = $CICLOV8D WHERE CODIGO = $CICLOV8D_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 66;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FECHAPER_ord, STATUS = $FECHAPER WHERE CODIGO = $FECHAPER_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 67;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FECHAFIN_ord, STATUS = $FECHAFIN WHERE CODIGO = $FECHAFIN_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 68;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FECHACOR_ord, STATUS = $FECHACOR WHERE CODIGO = $FECHACOR_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 69;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $EXPEDIEN_ord, STATUS = $EXPEDIEN WHERE CODIGO = $EXPEDIEN_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 70;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CICLO_ord, STATUS = $CICLO WHERE CODIGO = $CICLO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 71;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDOD2_ord, STATUS = $SALDOD2 WHERE CODIGO = $SALDOD2_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 72;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FULTGEST_ord, STATUS = $FULTGEST WHERE CODIGO = $FULTGEST_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 73;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PLAZCRED_ord, STATUS = $PLAZCRED WHERE CODIGO = $PLAZCRED_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 74;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $NOMAGENTE_ord, STATUS = $NOMAGENTE WHERE CODIGO = $NOMAGENTE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 75;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $EXTENCION_ord, STATUS = $EXTENCION WHERE CODIGO = $EXTENCION_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 76;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $DEUDOR_ord, STATUS = $DEUDOR WHERE CODIGO = $DEUDOR_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 77;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CODEUDOR_ord, STATUS = $CODEUDOR WHERE CODIGO = $CODEUDOR_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 78;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $JUICIO_ord, STATUS = $JUICIO WHERE CODIGO = $JUICIO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 79;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $AGENTE_ord, STATUS = $AGENTE WHERE CODIGO = $AGENTE_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 80;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CORRELAT_ord, STATUS = $CORRELAT WHERE CODIGO = $CORRELAT_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 81;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $DIREC_ord, STATUS = $DIREC WHERE CODIGO = $DIREC_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 82;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $EMAIL_ord, STATUS = $EMAIL WHERE CODIGO = $EMAIL_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 83;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $PAIS_ord, STATUS = $PAIS WHERE CODIGO = $PAIS_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 84;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $CANAL_ord, STATUS = $CANAL WHERE CODIGO = $CANAL_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 85;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SUCURSAL_ord, STATUS = $SUCURSAL WHERE CODIGO = $SUCURSAL_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 86;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $FOLIO_ord, STATUS = $FOLIO WHERE CODIGO = $FOLIO_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 87;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $IDCAMPANA_ord, STATUS = $IDCAMPANA WHERE CODIGO = $IDCAMPANA_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 88;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDOD_ord, STATUS = $SALDOD WHERE CODIGO = $SALDOD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 89;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }


        $var_consulta = "UPDATE PLANCARGA SET ORDEN = $SALDOD_ord, STATUS = $SALDOD WHERE CODIGO = $SALDOD_cod AND CODIGOPLA = $CodePlantillaUpdate;";
        $query = ibase_prepare($var_consulta);
        $val = 90;
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }

        print json_encode($arrInfo);
        die();
    } else if ($strTipoValidacion == "delete_plantilla") {
        header('Content-Type: application/json');
        $var_consulta = "DELETE FROM AXESO WHERE NIU = $NIU;";
        $query = ibase_prepare($var_consulta);
        $val = 1;
        if ($v_query = ibase_execute($query)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }



        $SUPERSN = isset($_POST["SUPERVISOR_SLT_"]) ? $_POST["SUPERVISOR_SLT_"]  : 0;

        if ($SUPERSN == 1) {
            $var_consulta = "DELETE FROM SUPERVISORES WHERE NIU_AXESO = $NIU;";
            $query = ibase_prepare($var_consulta);
            $val = 1;
            if ($v_query = ibase_execute($query)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
        }
        print json_encode($arrInfo);
        die();
    } else if ($strTipoValidacion == "tabla_carga_datos") {

        $Search = isset($_POST["Search"]) ? $_POST["Search"]  : '';
        if ($Search) {
            $arrCarga = array();
            $stmt = "SELECT C.CAMPO, C.NOMCAMPO, C.TIPO, C.ANCHO
                    FROM CARGACTU C
                    JOIN PLANCARGA P
                    ON P.CODIGO = C.CODIGO
                    WHERE CODIGOPLA = $Search
                    AND STATUS = 1
                    ORDER BY P.ORDEN";

            $query = ibase_prepare($stmt);
            $v_query = ibase_execute($query);
            while ($rTMP = ibase_fetch_assoc($v_query)) {

                $arrCarga[$rTMP["CAMPO"]]["CAMPO"]               = $rTMP["CAMPO"];
                $arrCarga[$rTMP["CAMPO"]]["NOMCAMPO"]             = $rTMP["NOMCAMPO"];
            }
            ibase_free_result($v_query);

            if (is_array($arrCarga) && (count($arrCarga) > 0)) {
                $intContador = 1;
                reset($arrCarga);
                foreach ($arrCarga as $rTMP['key'] => $rTMP['value']) {
?>
                    <div class="col-12 row">
                        <b><?php echo  $rTMP["value"]['NOMCAMPO']; ?></b>
                    </div>

        <?PHP
                    $intContador++;
                }
            }

            die();
        }
    } else if ($strTipoValidacion == "tabla_plantillas") {

        $arrPlantilla = array();
        $stmt = "SELECT CODIGOPLA, DESCRIP FROM PC000001";

        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {

            $arrPlantilla[$rTMP["CODIGOPLA"]]["CODIGOPLA"]               = $rTMP["CODIGOPLA"];
            $arrPlantilla[$rTMP["CODIGOPLA"]]["DESCRIP"]             = $rTMP["DESCRIP"];
        }
        ibase_free_result($v_query);
        ?>
        <div class="col-md-12 tableFixHeadPlantilla">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>PLANTILLA DE CARGA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrPlantilla) && (count($arrPlantilla) > 0)) {
                        $intContador = 1;
                        reset($arrPlantilla);
                        foreach ($arrPlantilla as $rTMP['key'] => $rTMP['value']) {
                    ?>
                            <tr>
                                <td>
                                    <b><?php echo  $rTMP["value"]['DESCRIP']; ?></b>
                                </td>
                                <td style="cursor: pointer;" onclick="fntSelectEditPlant('<?php print $intContador; ?>')">
                                    <b>EDITAR</b>
                                </td>
                            </tr>
                            <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CODIGOPLA']; ?>">

                    <?PHP
                            $intContador++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
        die();
    } else if ($strTipoValidacion == "dropdown_empresa") {

        $arrBarVarEmpresa = array();
        $stmt = "SELECT * FROM EM000001";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["NUMEMPRE"]             = $rTMP["NUMEMPRE"];
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["EMPRESA"]             = $rTMP["EMPRESA"];
            $arrBarVarEmpresa[$rTMP["NUMEMPRE"]]["CODIGOPLA"]             = $rTMP["CODIGOPLA"];
        }
        //ibase_free_result($v_query);
    ?>
        <select class="form-control select2" id="NUMEMPRE" name="NUMEMPRE" style="width: 100%;">
            <option selected="selected" value="">Seleccionar</option>
            <?PHP
            if (is_array($arrBarVarEmpresa) && (count($arrBarVarEmpresa) > 0)) {
                $intContador = 1;
                reset($arrBarVarEmpresa);
                foreach ($arrBarVarEmpresa as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <option value="<?php echo  $rTMP["value"]['NUMEMPRE']; ?>" onclick="fntSelectViewPlantiila('<?php print $intContador; ?>');"><?php echo  $rTMP["value"]['EMPRESA']; ?> </option>

            <?PHP
                    $intContador++;
                }
            }
            ?>
        </select>

        <?PHP
        if (is_array($arrBarVarEmpresa) && (count($arrBarVarEmpresa) > 0)) {
            $intContador = 1;
            reset($arrBarVarEmpresa);
            foreach ($arrBarVarEmpresa as $rTMP['key'] => $rTMP['value']) {
        ?>
                <input type="hidden" class="form-control" id="hid_plantilla_<?php print $intContador; ?>" name="hid_plantilla_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['CODIGOPLA']; ?>">
        <?PHP
                $intContador++;
            }
        }
        ?>
    <?PHP

        die();
    } else if ($strTipoValidacion == "dropdown_campos") {

        $arrBarVarCampos = array();
        $stmt = "SELECT ACTUALIZA,CAMPO, NOMCAMPO, CODIGO, ORDEN FROM CARGACTU";
        //print_r($stmt);
        $query = ibase_prepare($stmt);
        $v_query = ibase_execute($query);
        while ($rTMP = ibase_fetch_assoc($v_query)) {
            $arrBarVarCampos[$rTMP["CODIGO"]]["CODIGO"]             = $rTMP["CODIGO"];
            $arrBarVarCampos[$rTMP["CODIGO"]]["NOMCAMPO"]             = $rTMP["NOMCAMPO"];
            $arrBarVarCampos[$rTMP["CODIGO"]]["CAMPO"]             = $rTMP["CAMPO"];
        }
        //ibase_free_result($v_query);

    ?>
        <div class="col-sm-12 row">
            <?PHP
            if (is_array($arrBarVarCampos) && (count($arrBarVarCampos) > 0)) {
                reset($arrBarVarCampos);
                foreach ($arrBarVarCampos as $rTMP['key'] => $rTMP['value']) {
            ?>
                    <div class="col-sm-6 row">
                        <!-- checkbox -->
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="ord_<?php echo  $rTMP["value"]['CAMPO']; ?>" name="ord_<?php echo  $rTMP["value"]['CAMPO']; ?>" value="0">
                            <input type="hidden" class="form-control" id="cod_<?php echo  $rTMP["value"]['CAMPO']; ?>" name="cod_<?php echo  $rTMP["value"]['CAMPO']; ?>" value="<?php echo  $rTMP["value"]['CODIGO']; ?>">
                        </div>&nbsp
                        <div class="form-group clearfix row">
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="<?php echo  $rTMP["value"]['CAMPO']; ?>" name="<?php echo  $rTMP["value"]['CAMPO']; ?>" value="1">
                                <label for="<?php echo  $rTMP["value"]['CAMPO']; ?>">
                                    <?php echo  $rTMP["value"]['NOMCAMPO']; ?>
                                </label>
                            </div>

                        </div>
                    </div>
            <?PHP
                }
            }
            ?>
        </div>

        <?PHP

        die();
    } else if ($strTipoValidacion == "view_edit_plan") {

        $Search = isset($_POST["Search"]) ? $_POST["Search"]  : '';
        if ($Search) {
            $arrCarga = array();
            $stmt = "SELECT C.CAMPO, C.NOMCAMPO, C.TIPO, C.ANCHO, P.STATUS ,P.ORDEN
                    FROM CARGACTU C
                    JOIN PLANCARGA P
                    ON P.CODIGO = C.CODIGO
                    WHERE CODIGOPLA = $Search
                    ORDER BY P.ORDEN";

            $query = ibase_prepare($stmt);
            $v_query = ibase_execute($query);
            while ($rTMP = ibase_fetch_assoc($v_query)) {

                $arrCarga[$rTMP["CAMPO"]]["CAMPO"]               = $rTMP["CAMPO"];
                $arrCarga[$rTMP["CAMPO"]]["NOMCAMPO"]             = $rTMP["NOMCAMPO"];
                $arrCarga[$rTMP["CAMPO"]]["STATUS"]             = $rTMP["STATUS"];
                $arrCarga[$rTMP["CAMPO"]]["ORDEN"]             = $rTMP["ORDEN"];
            }
            ibase_free_result($v_query);

            if (is_array($arrCarga) && (count($arrCarga) > 0)) {
                $intContador = 1;
                reset($arrCarga);
                foreach ($arrCarga as $rTMP['key'] => $rTMP['value']) {
        ?>
                    <input type="hidden" id="hid_<?php echo  $rTMP["value"]['CAMPO']; ?>_ord" name="hid_<?php echo  $rTMP["value"]['CAMPO']; ?>_ord" value="<?php echo  $rTMP["value"]['ORDEN']; ?>">
                    <input type="hidden" id="hid_<?php echo  $rTMP["value"]['CAMPO']; ?>" name="hid_<?php echo  $rTMP["value"]['CAMPO']; ?>" value="<?php echo  $rTMP["value"]['STATUS']; ?>">

<?PHP
                    $intContador++;
                }
            }

            die();
        }
    }

    die();
}

?>