<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<div class="content-wrapper">
    <div class="container-fluid textoCentro ">
        <form id="formGeneral" method="POST">
            <div class="row">
                <div class="col-12">
                    </br>
                </div>
                <div class="col-12">
                    </br>
                </div>
                <div class="col-3">
                </div>
                <div class="col-6 fondo">
                    <div class="row">
                        <div class="col-md-12 row">
                            <input type="hidden" class="form-control" id="valTabla" name="valTabla">

                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label class="col-form-label" for="inputSuccess"></i> Rango Fecha de</label>
                                </div>
                                <div class="col-md-7 row">
                                    <input type="text" class="form-control col-md-6" id="buscarFechaDe" name="buscarFechaDe" placeholder="DD.MM.YYYY">
                                    <input type="text" class="form-control col-md-6" id="buscarFechaHasta" name="buscarFechaHasta" placeholder="DD.MM.YYYY">
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label class="col-form-label" for="inputSuccess"></i>Mora</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="buscarMora" name="buscarMora" value="">
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar13()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Empresa</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_empresa" id="dropdown_empresa" name="dropdown_empresa">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar2()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label class="col-form-label" for="inputSuccess"></i>Ciclo Vencido</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="buscarSaldoVencido" name="buscarSaldoVencido">
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar3()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label class="col-form-label" for="inputSuccess"></i> Saldo inicial de</label>
                                </div>
                                <div class="col-md-6 row">
                                    <input type="text" class="form-control col-md-6" id="buscarSaldoDe" name="buscarSaldoDe" value="">
                                    <input type="text" class="form-control col-md-6" id="buscarSaldoHasta" name="buscarSaldoHasta" value="">
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar4()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Gestor</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_gestor_dibujo" id="dropdown_gestor_dibujo" name="dropdown_gestor_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar14()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Owner Telefono</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_owner_telefono_dibujo" id="dropdown_owner_telefono_dibujo" name="dropdown_owner_telefono_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar15()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Origen</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_origen_dibujo" id="dropdown_origen_dibujo" name="dropdown_origen_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar7()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Receptor</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_receptor_dibujo" id="dropdown_receptor_dibujo" name="dropdown_receptor_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar8()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Tipologia</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_tipologia_dibujo" id="dropdown_tipologia_dibujo" name="dropdown_tipologia_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar9()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Categoria</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_categoria_dibujo" id="dropdown_categoria_dibujo" name="dropdown_categoria_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar10()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>Estado</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_estado_dibujo" id="dropdown_estado_dibujo" name="dropdown_estado_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar11()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <label>RDM</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="dropdown_rdm_" id="dropdown_rdm_" name="dropdown_rdm_">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                                <div class="col-md-1 limpiar" style="text-align: right;">
                                    <button type="button" onclick="borrar12()" class="btn btn-danger btn-block"><i class="fad fa-minus-circle"></i></button>
                                </div>
                            </div>
                     
                            <div class="col-12 textoCentro"><br>
                                <ul class="nav nav-pills nav-fill btn-success AGREGAR">
                                    <li class="nav-item" id="btnInsert">
                                        <button type="button" onclick="fntDibujoEstadoDeCuenta()" class="btn btn-success btn-block">Generar Campaña</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-md-12 fondo">
                        <div class="form-group">
                            <div class="tablaEstadoDeCuenta" id="tablaEstadoDeCuenta" name="tablaEstadoDeCuenta">
                                <!-- /.CONTENIDO -->
                            </div>
                        </div>
                    </div>
                    </br>
        </form>
    </div>
</div>
<script>
    function close_window() {
        window.close()
    }

    function LlenarCampoProd() {

        var strhid_buscarBaseC = 'GC000001';
        var strhid_buscarBaseG = 'GM000001';

        // alert(strhid_niu + "                         strhid_niu");

        $("#buscarBaseC").val(strhid_buscarBaseC);
        $("#buscarBaseG").val(strhid_buscarBaseG);
    }

    function LlenarCampoHistori() {
        var strhid_buscarBaseC = 'GH000001';
        var strhid_buscarBaseG = 'GM000002';

        $("#buscarBaseC").val(strhid_buscarBaseC);
        $("#buscarBaseG").val(strhid_buscarBaseG);

    }

    ///////////////////////////////////////////////////////////


    function LlenarCampoAsignacion() {
        var strDato = '1';
        $("#buscarTipoFecha").val(strDato);

    }

    function LlenarCampoRecepcion() {
        var strDato = '2';
        $("#buscarTipoFecha").val(strDato);

    }

    function LlenarCampoGestion() {
        var strDato = '3';
        $("#buscarTipoFecha").val(strDato);

    }

    ///////////////////////////////////////////////////////////

    function borrar() {
        $("#buscarFechaDe").val(strNull);
        $("#buscarFechaHasta").val(strNull);
    }

    function borrar1() {
        var strNull = '';

        $("#buscarMora").val(strNull);
    }

    function borrar2() {
        var strNull = '';

        $("#buscarEmpresa").val(strNull);
    }

    function borrar3() {
        var strNull = '';

        $("#buscarSaldoVencido").val(strNull);
    }

    function borrar4() {
        var strNull = '';

        $("#buscarSaldoDe").val(strNull);
        $("#buscarSaldoHasta").val(strNull);
    }

    function borrar5() {
        var strNull = '';

        $("#buscarCliente").val(strNull);
    }

    function borrar7() {
        var strNull = '';

        $("#buscarOrigen").val(strNull);
    }

    function borrar8() {
        var strNull = '';

        $("#buscarReceptor").val(strNull);
    }

    function borrar9() {
        var strNull = '';

        $("#buscarTipologia").val(strNull);
    }

    function borrar10() {
        var strNull = '';

        $("#buscarCategoria").val(strNull);
    }

    function borrar11() {
        var strNull = '';

        $("#buscarEstado").val(strNull);
    }

    function borrar12() {
        var strNull = '';

        $("#supervisor").val(strNull);
    }

    function borrar13() {
        var strNull = '';

        $("#buscarFechaDe").val(strNull);
        $("#buscarFechaHasta").val(strNull);
    }

    function borrar14() {
        var strNull = '';

        $("#gestor").val(strNull);
    }

    function borrar15() {
        var strNull = '';

        $("#ownerTel").val(strNull);
    }

    window.addEventListener('load', LlenarCampoAsignacion, false)
    window.addEventListener('load', LlenarCampoProd, false)
</script>
<style>
    .fondo {
        background: white !important;
    }

    .limpiar {
        text-align: right;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    div.tableFixHeadInvestiga {
        width: 100%;
        height: 270px;
        overflow: scroll;
    }

    div.tableFixHead {
        width: 100%;
        height: 800px;
        overflow: scroll;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
    }

    .tableFixHeadInvestiga thead th {
        position: sticky;
        top: 0;
    }

    label {
        text-align: left !important;
    }

    @media (min-width: 992px) {

        .sidebar-mini.sidebar-collapse .content-wrapper,
        .sidebar-mini.sidebar-collapse .main-footer,
        .sidebar-mini.sidebar-collapse .main-header {
            margin-left: 0 !important;
        }
    }

    @media (min-width: 576px) {

        .sidebar-collapse .content-wrapper,
        .sidebar-collapse .main-footer,
        .sidebar-collapse .main-header {
            margin-left: 0 !important;
        }
    }
</style>