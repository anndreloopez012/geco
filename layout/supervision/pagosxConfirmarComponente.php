<div id="loading-screen" style="display:none">
    <img src="../../../asset/img/gif/spinning-circles.svg">
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
                <div class="col-1">
                </div>
                <div class="col-lg-10 fondo">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                                <li class="nav-item">
                                    <button type="button" onclick="fntDibujoEstadoDeCuenta()" class="btn btn-secondary btn-block">CONSULTAR</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i> Rango Fecha de</label>
                            </div>
                            <div class="col-md-6 row">
                                <input type="text" class="form-control col-md-6" id="buscarFechaDe" name="buscargeneral" placeholder="DD.MM.YYYY">
                                <input type="text" class="form-control col-md-6" id="buscarFechaHasta" name="buscargeneral" placeholder="DD.MM.YYYY">
                            </div>
                        </div>
                         <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label>Empresa</label>
                            </div>
                            <div class="col-md-5">
                                <div class="dropdown_empresa" id="dropdown_empresa" name="dropdown_empresa">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Reporto</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="buscarReporto" name="buscarReporto">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Asignacion</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="buscarAsignacion" name="buscarAsignacion">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Estado</label>
                            </div>
                            <div class="col-md-6 row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="buscarTipoEstado" id="inlineRadio1" value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1">Todos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="buscarTipoEstado" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Confirmados</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="buscarTipoEstado" id="inlineRadio3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">Pendientes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="buscarTipoEstado" id="inlineRadio4" value="3">
                                    <label class="form-check-label" for="inlineRadio3">Inexistentes en Produccion</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-1">
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
        height: 600px;
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