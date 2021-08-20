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
                    <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                        <li class="nav-item">
                            <button type="button" onclick="fntRestartTable()" class="btn btn-secondary btn-block">Refresh</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" data-toggle="modal" data-target="#cola" class="btn btn-secondary btn-block">Cola de Trabajo</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" onclick="fntDibujoTareas()" data-toggle="modal" data-target="#tareas" class="btn btn-secondary btn-block">Tareas</button>
                        </li>
                    </ul>
                </div>
                <div class="col-9 fondo">
                    </br>
                    <div class="col-md-12">
                        <?php $rt =  isset($_GET["rt"]) ? $_GET["rt"]  : ''; ?>
                        <input type="hidden" id="rtBoton" name="rtBoton" value="<?php echo $rt ?>">

                        <input type="hidden" id="horaInicial" name="horaInicial">
                        <input type="hidden" id="horaFinal" name="horaFinal">
                        <div class="contador___segundos" id="contador___segundos" name="contador___segundos">
                            <textarea name="number_segundos_" id="number_segundos_" type="hidden"></textarea>
                        </div>
                        <input type="hidden" id="numero_caso" name="numero_caso" class="numero_caso">

                        <input type="hidden" id="codigo" name="codigo">
                        <input type="hidden" id="autoriza" name="autoriza">
                        <input type="hidden" id="tiempo" name="tiempo">
                        <input type="hidden" id="niu" name="niu">
                        <input type="hidden" id="supervisor" name="supervisor">

                        <input type="hidden" id="id_alarma" name="id_alarma">


                        <div class="modal fade" id="ModalSupervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">SUPERVISOR</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="password" id="claveSupervisor" name="claveSupervisor">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a type="button" class="btn btn-primary" onclick="fntAutorizaSupervisor()">Aceptar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" id="nombredetarea" name="nombredetarea" style="border: none; background:white; font-weight: bold; font-size: 20px; color: green;" disabled>
                                    </div>
                                    <i class="fad fa-3x fa-pause" style="color:red;"></i>
                                    <h5 class="modal-title" id="exampleModalLongTitle">FINALIZAR TAREA / ACTIVIDAD</h5>
                                    <div class="modal-body">
                                        <input type="password" id="claveUsuario" name="claveUsuario">
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-primary" onclick="fntAutorizaUser()">Aceptar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="dibujo_tabla_movimientos" id="dibujo_tabla_movimientos" name="dibujo_tabla_movimientos">
                                <!-- /.CONTENIDO -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 fondo">
                    <br>
                    <div>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorMeta ?>" role="progressbar" style="width: <?php echo $porcentageGestirones ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorGestiones ?> / <?php echo $metaDia ?> - META</b></div>
                        </div>
                    </div></br>
                    <div>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorEfectividad ?>" role="progressbar" style="width: <?php echo $porcentagePonderacion ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorPonderacion ?> / <?php echo $efectividad ?> - EFECTIVIDAD</b></div>
                        </div>
                    </div></br>
                    <div>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorRetencion ?>" role="progressbar" style="width: <?php echo $porcentageV_reten ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorRetencion ?>% - RETENCION</b> </div>
                        </div>
                    </div>
                    <hr>
                    </hr>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control " id="buscarTelefono" name="buscarTelefono" onfocus="limpiarFormulario()" placeholder="Ingrese el telefono a buscar...!">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control " id="buscarIdentificacion" name="buscarIdentificacion" onfocus="limpiarFormulario()" placeholder="Ingrese la identificacion a buscar...!">
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-12">
                    </br>
                </div>
                <div class="col-lg-12 fondo">
                    <div class="row">
                        <div class="col-md-12"></br></div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> Buscar</label></br>

                                <button type="button" class="btn btn-info" onclick="fntDibujoEstadoDeCuenta()"><i class="fal fa-2x fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> NOMBRE</label>
                                <input type="text" class="form-control " id="buscarNOMBRE" name="buscarNOMBRE" placeholder="Ingrese el dato ...!">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> CODICLIE</label>
                                <input type="text" class="form-control " id="buscarCODICLIE" name="buscarCODICLIE" placeholder="Ingrese el dato ...!">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"></i> CLAPROD</label>
                                <input type="text" class="form-control " id="buscarCLAPROD" name="buscarCLAPROD" placeholder="Ingrese el dato ...!">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Origen</label>
                                <div class="dropdown_origen_dibujo" id="dropdown_origen_dibujo" name="dropdown_origen_dibujo">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Receptor</label>
                                <div class="dropdown_receptor_dibujo" id="dropdown_receptor_dibujo" name="dropdown_receptor_dibujo">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Tipologia</label>
                                <div class="dropdown_tipologia_dibujo" id="dropdown_tipologia_dibujo" name="dropdown_tipologia_dibujo">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Categoria</label>
                                <div class="dropdown_categoria_dibujo" id="dropdown_categoria_dibujo" name="dropdown_categoria_dibujo">
                                    <!-- /.CONTENIDO -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Estado</label>
                                <div class="dropdown_estado_dibujo" id="dropdown_estado_dibujo" name="dropdown_estado_dibujo">
                                    <!-- /.CONTENIDO -->
                                </div>
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
                        <!-- /.MODALES DE MENU PRINCIPAL ----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="cola" tabindex="-1" role="dialog" aria-labelledby="tareasLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cola De Trabajo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="date" class="form-control " onchange="fntDibujoTrabajo()" id="buscarFecha" name="buscarFecha">
                                        <div class="tabla_cola_rabajo" id="tabla_cola_rabajo" name="tabla_cola_rabajo">
                                            <!-- /.CONTENIDO -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="tareas" tabindex="-1" role="dialog" aria-labelledby="tareasLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tareas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tabla_tareas" id="tabla_tareas" name="tabla_tareas">
                                            <!-- /.CONTENIDO -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="prorroga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Posponer</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="time" id="prorroga_" name="prorroga_">
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" onclick="fntInsertPostAlarma()" class="btn btn-primary">Guardar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        </form>

    </div>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
<script>
    document.getElementById('contador___segundos').style.display = 'none';

    var n = 0;
    var l = document.getElementById("number_segundos_");
    window.setInterval(function() {
        l.innerHTML = n;
        n++;
    }, 1000);

    function limpiarFormulario() {
        document.getElementById("formGeneral").reset();
    }

    function fntSelectId(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strHid = $("#hid_mov_id_" + intParametro).val();

            $("#numero_caso").val(strHid);
        }
        fntDibujoMovimiento()
    }

    function fntSelectIdAlarma(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strHid = $("#id_" + intParametro).val();

            $("#id_alarma").val(strHid);
        }
        myTimeEnd()
    }

    function fntSelectIdAlarmaPosponer(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strHid = $("#id_" + intParametro).val();

            $("#id_alarma").val(strHid);
        }
        $("#prorroga").modal()

        myTimeEnd()
    }


    function fntSelectTareasEfectuadasSup(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strhid_codigo = $("#hid_codigo" + intParametro).val();
            var strhid_autoriza = $("#hid_autoriza" + intParametro).val();
            var strhid_tiempo = $("#hid_tiempo" + intParametro).val();
            var strhid_niu = $("#hid_niu" + intParametro).val();
            var strhid_supervisor = $("#hid_supervisor" + intParametro).val();
            var strhid_descript = $("#hid_descrip" + intParametro).val();
        }
        // alert(strhid_niu + "                         strhid_niu");

        $("#codigo").val(strhid_codigo);
        $("#autoriza").val(strhid_autoriza);
        $("#tiempo").val(strhid_tiempo);
        $("#niu").val(strhid_niu);
        $("#supervisor").val(strhid_supervisor);
        $("#nombredetarea").val(strhid_descript);

        myTimeEnd()

        myTimeTrabajo()
    }

    function close_window() {
        window.close()
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