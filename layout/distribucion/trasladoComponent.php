<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<div class="content-wrapper">
    <div class="container-fluid textoCentro ">
        <form method="post" id="formGeneral" name="formGeneral">
            <div class="row">
                <div class="col-12">
                    </br>
                </div>
                <div class="col-2">
                </div>
                <div class="col-8 fondo">

                    <div class="col-md-12">
                        <div class="col-12">
                            <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                                <li class="nav-item">
                                    <button type="button" onclick="fntInsert()" data-toggle="modal" data-target="#tareas" class="btn btn-secondary btn-block">Asignar Casos</button>
                                </li>
                            </ul>
                        </div><br>

                        <div class="col-xl-12 col-md-10 ">
                            <div class="card-body">
                                <div class="collapsed-card">
                                    <div class="card-body ">
                                        <div class="row col-12">
                                            <br>
                                            <div class="row col-12"></div>
                                            <div class="form-group row col-sm-12">
                                                <label>Seleccion de Empresa </label>&nbsp
                                                <div class="form-group col-1 row">
                                                    <input type="text" class="form-control" id="empresa" name="empresa">
                                                </div>
                                                <div id="dropdown_empresa" class="form-group col-sm-8 row" name="dropdown_empresa">
                                                    <!-- DIBUJO DE DROPDOWN EMPRESA -->
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                                                    <li class="nav-item">
                                                        <button type="button" onclick="fntDibujoTabla()" data-toggle="modal" data-target="#tareas" class="btn btn-secondary btn-block">Recoger Casos</button>
                                                    </li>
                                                </ul>
                                            </div><br>
                                            <div class="form-group row col-sm-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="NUMEMPRE" name="NUMEMPRE" placeholder="Cliente">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="NUMENV" name="NUMENV" placeholder="No Trabajo">
                                                </div>
                                                <div class="form-group">
                                                    <input type="texto" class="form-control" id="CLAPROD" name="CLAPROD" placeholder="Clave Producto">
                                                </div>
                                                <div class="form-group">
                                                    <input type="texto" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Nombre">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="NUMTRANSDEL" name="NUMTRANSDEL" placeholder="De">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="NUMTRANSAL" name="NUMTRANSAL" placeholder="Hasta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 fondo">
                    </br>
                    <div class="col-md-12"></div>
                    <div class="form-group">
                        <div class="dibujo_tabla" id="dibujo_tabla_" name="dibujo_tabla_">
                            <!-- /.CONTENIDO -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    function fntSelectViewPlantiila(intParametro) {
        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strSupervisor = $("#hid_emp_" + intParametro).val();
            // alert(strDPI + "                         strDPI");
            $("#empresa").val(strSupervisor);
        }
    }
</script>

<style>
    .fondo {
        background: white !important;
    }

    .textoCentro {
        text-align: center;
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
        height: 400px !important;
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