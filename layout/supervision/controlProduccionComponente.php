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
                                <input type="text" class="form-control col-md-6" id="buscarFechaDe" name="buscarFechaDe" placeholder="DD.MM.YYYY">
                                <input type="text" class="form-control col-md-6" id="buscarFechaHasta" name="buscarFechaHasta" placeholder="DD.MM.YYYY">
                            </div>
                        </div>
                         <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label>Empresa</label>
                            </div>
                            <div class="col-md-6">
                                <div class="dropdown_empresa" id="dropdown_empresa" name="dropdown_empresa">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Meta</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="buscarMeta" name="buscarMeta">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Datros de Proyeccion</label>
                            </div>
                            <div class="col-md-6 row">
                                <input type="text" class="form-control col-md-6" id="buscarDatosProyecUno" name="buscarDatosProyecUno">
                                <input type="text" class="form-control col-md-6" id="buscarDatosProyecDos" name="buscarDatosProyecDos">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Tasa de cambio $</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="buscarTasaCambio" name="buscarTasaCambio">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Fecha dia anterior</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="buscarFechaAnterior" name="buscarFechaAnterior" placeholder="DD.MM.YYYY">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="inputSuccess"></i>Fecha Generacion</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="buscarFechaGeneracion" name="buscarFechaGeneracion" placeholder="DD.MM.YYYY">
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