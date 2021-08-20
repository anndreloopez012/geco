<!DOCTYPE html>
<html>

<head>

    <style>
        h2 {
            text-align: center;
        }

        .rec {
            padding: 0px 30px 0px 60px;
        }

        .recc {
            padding: 0px 30px 0px 90px;
        }

        table {
            border: 1px;
            width: 100%;
        }

        .table {
            width: 90%;
            padding: 10px 10px 10px 10px;
        }

        tr {
            border: 10px;
            text-align: center;
        }

        .conteiner {
            border: 1px;
            text-align: center;
        }

        .cont {
            display: block;
            width: 100%;
        }
        .border_encabezado{
            border: 1px;
            display: block;
            width: 50%;
            
        }
    </style>
</head>

<body>
    <?php
    require_once 'interbase/conexion.php';

    $connect = conectar();
    $numCaso = 509547;

    $arrRegistroCliente = array();
    $stmt = "SELECT G.*, A.EXTENCION
            FROM GC000001 G
            LEFT JOIN AXESO A
            ON G.GESTORD = A.USUARIO
            WHERE G.NUMTRANS = $numCaso";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMTRANS"]             = $rTMP["NUMTRANS"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["NOMBRE"]              = $rTMP["NOMBRE"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODICLIE"]              = $rTMP["CODICLIE"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["CODIEMPR"]              = $rTMP["CODIEMPR"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["CLAPROD"]              = $rTMP["CLAPROD"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVEQ"]              = $rTMP["CICLOVEQ"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["CICLOVED"]              = $rTMP["CICLOVED"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["EXTRAFIN"]              = $rTMP["EXTRAFIN"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGO"]              = $rTMP["FULTPAGO"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["FULTPAGD"]              = $rTMP["FULTPAGD"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["DIAPAGO"]              = $rTMP["DIAPAGO"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMCALL"]              = $rTMP["NUMCALL"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVEQ"]              = $rTMP["SALDOVEQ"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMINQ"]              = $rTMP["PAGOMINQ"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDO"]              = $rTMP["SALDO"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOS"]              = $rTMP["PAGOS"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACT"]              = $rTMP["SALDOACT"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOVED"]              = $rTMP["SALDOVED"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOMIND"]              = $rTMP["PAGOMIND"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOD"]              = $rTMP["SALDOD"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["PAGOSD"]              = $rTMP["PAGOSD"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["SALDOACD"]              = $rTMP["SALDOACD"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMEMPRE"]              = $rTMP["NUMEMPRE"];
        $arrRegistroCliente[$rTMP["NUMTRANS"]]["NUMENV"]              = $rTMP["NUMENV"];
    }

    if (is_array($arrRegistroCliente) && (count($arrRegistroCliente) > 0)) {
        reset($arrRegistroCliente);
        foreach ($arrRegistroCliente as $rTMP['key'] => $rTMP['value']) {

            $nombre =  $rTMP["value"]['NOMBRE'];
            $codiclie =  $rTMP["value"]['CODICLIE'];

            $claprod =  $rTMP["value"]['CLAPROD'];

            $saldo =  $rTMP["value"]['SALDO'];
            $saldo = number_format($saldo, 2);

            $saldoact =  $rTMP["value"]['SALDOACT'];
            $saldoact = number_format($saldoact, 2);
        }
    }

    $arrDetalle = array();
    $stmt = "SELECT FGESTION, SUBCONCL, OBSERVAC, PAGOS, BOLETA FROM GM000001 WHERE NUMTRANS = $numCaso AND PAGOS > 0.00 ORDER BY 1 ";
    //print_r($stmt);
    $query = ibase_prepare($stmt);
    $v_query = ibase_execute($query);
    while ($rTMP = ibase_fetch_assoc($v_query)) {
        $arrDetalle[$rTMP["NUMTRANS"]]["NUMTRANS"] = $rTMP["NUMTRANS"];
    }

    if (is_array($arrDetalle) && (count($arrDetalle) > 0)) {
        reset($arrDetalle);
        foreach ($arrDetalle as $rTMP['key'] => $rTMP['value']) {

            $NUMTRANS = $rTMP["value"]['NUMTRANS'];
        }
    }
    ?>
    <div class="cont">
        <div class="rec">
            <h1>RECERVACION</h1>
        </div>


        <?php if (is_array($arrRegistroCliente) && (count($arrRegistroCliente) > 0)) {
            reset($arrRegistroCliente);
            foreach ($arrRegistroCliente as $rTMP['key'] => $rTMP['value']) { ?>

                <div class="border_encabezado">
                    <div >
                        Nombre

                        <?php echo  $rTMP["value"]['NOMBRE']; ?>
                    </div>
                    <div >
                        No.Cuenta

                        <?php echo  $rTMP["value"]['CODICLIE']; ?>
                    </div>
                    <div >
                        Tipo Producto

                        <?php echo  $rTMP["value"]['CLAPROD']; ?>
                    </div>
                    <div >
                        Saldo Inicial

                        <?php echo  $rTMP["value"]['SALDO']; ?>
                    </div>
                    <div >
                        Saldo Actual

                        <?php echo  $rTMP["value"]['SALDOACT']; ?>
                    </div>
                </div>

        <?PHP
            }
        }
        ?>

        <div class="recc">
            <h5>Presentar el dia del evento.</h5>
        </div>

        <h6>______________________________Recortar______________________________</h6>
    </div>
</body>

</html>