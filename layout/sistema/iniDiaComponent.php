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
                                <label class="col-form-label" for="inputSuccess"></i>Este proceso prepara el sistema para trabajar con la fecha que usted especifique Asegurese de que ningun usuario este adentro del sistema.</label>
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Fecha del dia a trabajar</span>
                                    </div>
                                    <input type="date" class="form-control" id="feecha_trabajo" name="feecha_trabajo" aria-describedby="basic-addon3" >
                                </div>
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Fecha actual del sistema</span>
                                    </div>
                                    <input disabled type="date" class="form-control" id="fecha_actual" name="fecha_actual" aria-describedby="basic-addon3" value="<?php echo $arrFechaIniDiaInt ?>">
                                </div> 
                            </div>
                            <div class="col-12 textoCentro"><br>
                                <ul class="nav nav-pills nav-fill btn-success AGREGAR">
                                    <li class="nav-item" id="btnInsert">
                                        <button type="button" onclick="fntUpdate()" class="btn btn-success btn-block">Guardar</button>
                                    </li>
                                </ul>
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