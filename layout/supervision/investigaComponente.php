<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<section class="content">
    <div class="container-fluid"></br>
        <div class="row col-12">
            <div class="col-1"></div>
            <div class="col-10 colorBackgroundApp"></br></br></br>
                <div class="row">&nbsp; &nbsp;
                    <div>
                        <a onclick="fntDibujoInvestigaCasos()" class="alert alert-info"><i class="fal fa-search"></i></a>
                    </div>
                    <div class="col-4">
                        <input class="form-control form-control-sm" name="buscarInvestigaCasos" id="buscarInvestigaCasos" type="text"></br>
                    </div>
                </div></br>

                <div class="tabla_investiga_casos" id="tabla_investiga_casos" name='tabla_investiga_casos' style="text-transform: uppercase;">
                    <!---------------- TABLA INVESTIGA CASOS-------------------------->
                </div><br>

                <div class="form-group col-12 row ">

                    <div class="form-group col-6 row ">
                        <a for="investiga_nombre" class="col-sm-3 col-form-label">NOMBRE</a>
                        <div class="col-sm-9">
                            <input class="form-control form-control-sm " name="investiga_nombre" id="investiga_nombre" type="text" disabled>
                        </div>
                        <a for="investiga_identificacion" class="col-sm-3 col-form-label">IDENTIFICACION</a>
                        <div class="col-sm-4">
                            <input class="form-control form-control-sm " name="investiga_identificacion" id="investiga_identificacion" type="text" disabled>
                        </div>
                        <div class="col-5"></div>
                        <a for="investiga__nit" class="col-sm-3 col-form-label">NIT</a>
                        <div class="col-sm-4">
                            <input class="form-control form-control-sm " name="investiga__nit" id="investiga__nit" type="text" disabled>
                        </div>
                    </div>

                    <div class="form-group col-6 row ">
                        <tr class="nav nav-pills nav-fill btn-secondary">
                            <td class="nav-item">
                                <button type="button" data-toggle="modal" id="investiga_casos_telefonos" data-target="#investiga_telefonos" class="btn btn-secondary btn-block">Telefonos</button>
                            </td>
                            <td class="nav-item">
                                <button type="button" data-toggle="modal" id="investiga_casos_direcciones" data-target="#investiga_direcciones" class="btn btn-secondary btn-block">Direccion</button>
                            </td>
                            <td class="nav-item">
                                <button type="button" data-toggle="modal" id="investiga_casos_correos" data-target="#investiga_correos" class="btn btn-secondary btn-block">Correos</button>
                            </td>
                        </tr>
                    </div>

                </div>

                <input name="InvestigaFormulario" id="InvestigaFormulario" type="hidden"></br>
                <div class="tabla_investiga_formulario" id="tabla_investiga_formulario" name='tabla_investiga_casos' style="text-transform: uppercase;">
                    <!---------------- TABLA INVESTIGA CASOS-------------------------->
                </div>
                <!----------------------------------------------------------- MODALES---------------------------------------------------------------------->
                <input name="investiga_codiclie" id="investiga_codiclie" type="hidden"></br>


                <div class="modal fade" id="investiga_telefonos" tabindex="-1" role="dialog" aria-labelledby="investiga_telefonos" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TELEFONOS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tabla_investiga_telefonos" id="tabla_investiga_telefonos" name="tabla_investiga_telefonos">
                                    <!---------------- TABLA TELEFONOS---------------------------------------------------------->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="investiga_direcciones" tabindex="-1" role="dialog" aria-labelledby="investiga_direcciones" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DIRECCIONES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formDataDireccionInvestiga" method="POST">
                                    <input name="a_direcciones" id="a_direcciones" type="hidden">
                                    <input name="a_niu" id="a_niu" type="hidden">
                                </form>
                                <div class="tabla_investiga_direcciones" id="tabla_investiga_direcciones" name="tabla_investiga_direcciones">
                                    <!---------------- TABLA DIRECCIONES---------------------------------------------------------->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="investiga_correos" tabindex="-1" role="dialog" aria-labelledby="investiga_correos" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">CORREOS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tabla_investiga_correo" id="tabla_investiga_correo" name="tabla_investiga_correo">
                                    <!---------------- TABLA CORREOS---------------------------------------------------------->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            //////////////////////////////SELECCION DE SUBMENU INVESTIGA ///////////////////////////////

            document.getElementById("investiga_casos_telefonos").disabled = true;
            document.getElementById("investiga_casos_direcciones").disabled = true;
            document.getElementById("investiga_casos_correos").disabled = true;



            function fntSelectInvestigaFormulario(intParametro) {

                intParametro = !intParametro ? 0 : intParametro;
                if (intParametro > 0) {
                    var strCasosId = $("#hid_investiga_casos_id" + intParametro).val();
                    var strCasosNombre = $("#hid_investiga_casos_nombre" + intParametro).val();
                    var strCasosDpi = $("#hid_investiga_casos_dpi" + intParametro).val();
                    var strCasosNit = $("#hid_investiga_casos_nit" + intParametro).val();

                    var strCasosCodiclie = $("#hid_investiga_casos_codiclie" + intParametro).val();

                    //alert(strCasosNit + "                         strCasosNit");
                    $("#InvestigaFormulario").val(strCasosId);
                    $("#investiga_nombre").val(strCasosNombre);
                    $("#investiga_identificacion").val(strCasosDpi);
                    $("#investiga__nit").val(strCasosNit);

                    $("#investiga_codiclie").val(strCasosCodiclie);

                    document.getElementById("investiga_casos_telefonos").disabled = false;
                    document.getElementById("investiga_casos_direcciones").disabled = false;
                    document.getElementById("investiga_casos_correos").disabled = false;

                    fntDibujoInvestigaFormulario()

                    fntDibujoInvestigaTelefono()

                    fntDibujoInvestigaDireccion()

                    fntDibujoInvestigaCorreo()

                }
            }

            function fntSelectCheked_a(intParametro) {

                intParametro = !intParametro ? 0 : intParametro;
                if (intParametro > 0) {
                    var strHidCheckdA = $("#hid_check_a_" + intParametro).val();
                    var strHidCheckdNiu = $("#hid_check_niu_" + intParametro).val();
                    //alert(strCasosNit + "                         strCasosNit");
                    $("#a_direcciones").val(strHidCheckdA);
                    $("#a_niu").val(strHidCheckdNiu);
                }
                fntUpdateActiveDireccion()
            }

            function fntSelectCheked_a_telefonos(intParametro) {

                intParametro = !intParametro ? 0 : intParametro;
                if (intParametro > 0) {
                    var strHidCheckdA = $("#hid_a_telefono_" + intParametro).val();
                    var strHidCheckdNiu = $("#hid_tel_niu_" + intParametro).val();
                    //alert(strCasosNit + "                         strCasosNit");
                    $("#a_telefono").val(strHidCheckdA);
                    $("#a_niu_telefono").val(strHidCheckdNiu);
                }
                fntUpdateActiveTelefonoBoton()
            }
        </script>


        <style>
            .colorBackgroundApp {
                background: #FDFFFD !important;
            }

            .full-screen {
                width: 250%;
                height: 100%;
                margin: 0;
                top: 5px;
                left: 15%;
            }

            div.textoDerecha {
                text-align: right;
                list-style: none;
            }

            .table-sm td,
            .table-sm th {
                padding: .1rem;
            }

            .colorTab {
                background: #546C57;
            }

            .nav-tabs .nav-item.show .nav-link,
            .nav-tabs .nav-link.active {
                background-color: #323830;
            }

            .form-control:disabled,
            .form-control[readonly] {
                background-color: #D4EFDF;
                opacity: 1;
            }

            .modal-content {
                background-color: #F7FFFA;
            }

            #myProgress {
                position: relative;
                width: 100%;
                height: 30px;
                background-color: #ddd;
            }

            #myBar {
                position: absolute;
                width: 1%;
                height: 100%;
                background-color: #4CAF50;
            }

            div.tableFixHeadInvestiga {
                height: 200px;
                overflow: scroll;
            }

            div.tableFixHead {
                width: 1180px;
                height: 326px;
                overflow: scroll;
            }

            .tableFixHead thead th {
                position: sticky;
                top: 0;
            }

            .tableFixHeadInvestiga thead th {
                position: sticky !important;
                top: 0;
            }
        </style>