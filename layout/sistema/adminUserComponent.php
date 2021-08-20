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
                <div class="col-4">
                </div>
                <div class="col-4 fondo">
                    <div class="col-md-12">
                        <div class="col-lg-12 fondo">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> Buscar</label></br>
                                <button type="button" class="btn btn-info" onclick="fntDibujoMovimiento()"><i class="fal fa-2x fa-search"></i></button>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> Nombres de Usuarios</label>
                                <input type="text" class="form-control " id="buscar" name="buscar" placeholder="Ingrese el dato a buscar...!">
                                <input type="hidden" class="form-control " id="ID_POST" name="ID_POST">
                            </div>
                            <div class="form-group">
                                <div class="dibujo_tabla" id="dibujo_tabla" name="dibujo_tabla">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                    </div>

                    <div class="col-12">
                        </br>
                    </div>

                </div>
        </form>
    </div>
</div>


<script>
    function fntSelectId(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strHid = $("#id_" + intParametro).val();

            $("#ID_POST").val(strHid);
        }
        fntUpdate()
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
        height: 700px;
        overflow: scroll;
    }

    div.tableFixHead {
        width: 100%;
        height: 326px;
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