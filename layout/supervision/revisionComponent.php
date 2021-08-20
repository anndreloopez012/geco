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
                <div class="col-1"></div>
                <div class="col-lg-10 fondo">
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-12"></br></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Origen</label>
                                    <div class="dropdown_origen_dibujo" id="dropdown_origen_dibujo" name="dropdown_origen_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Receptor</label>
                                    <div class="dropdown_receptor_dibujo" id="dropdown_receptor_dibujo" name="dropdown_receptor_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tipologia</label>
                                    <div class="dropdown_tipologia_dibujo" id="dropdown_tipologia_dibujo" name="dropdown_tipologia_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <div class="dropdown_categoria_dibujo" id="dropdown_categoria_dibujo" name="dropdown_categoria_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <div class="dropdown_estado_dibujo" id="dropdown_estado_dibujo" name="dropdown_estado_dibujo">
                                        <!-- /.CONTENIDO -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess"></i> Buscar</label></br>

                                    <button type="button" class="btn btn-info" onclick="fntDibujoEstadoDeCuenta()"><i class="fal fa-2x fa-search"></i></button>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess"></i> Buscador General</label>
                                    <input type="text" class="form-control " id="buscargeneral" name="buscargeneral" placeholder="Ingrese el dato a buscar...!">
                                </div>
                            </div>
        </form>

        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="inputSuccess"></i> Buscador Telefono</label>
                <input type="text" class="form-control " id="buscarTelefono" name="buscarTelefono" onfocus="limpiarFormulario()" placeholder="Ingrese el telefono a buscar...!">
            </div>
        </div>



        <div class="col-md-12"></br></div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="tablaEstadoDeCuenta" id="tablaEstadoDeCuenta" name="tablaEstadoDeCuenta">
                    <!-- /.CONTENIDO -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" id="numero_caso" name="numero_caso" class="numero_caso">
            <div class="form-group">
                <div class="dibujo_tabla_movimientos" id="dibujo_tabla_movimientos" name="dibujo_tabla_movimientos">
                    <!-- /.CONTENIDO -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
<script>
    function limpiarFormulario() {
        document.getElementById("formGeneral").reset();
    }

    function fntSelectId(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strHid = $("#hid_mov_id_" + intParametro).val();
            //alert(strHid + "                         strHid");
            $("#numero_caso").val(strHid);
        }
        fntDibujoMovimiento()
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
        width: 1900px;
        height: 250px;
        overflow: scroll;
    }

    div.tableFixHead {
        width: 1900px;
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

   
</style>