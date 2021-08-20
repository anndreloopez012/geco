<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<div class="content-wrapper">

        <div class="container-fluid">
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
                                    <button type="button" onclick="fntModalPlantillas()" class="btn btn-secondary btn-block">Plantillas</button>
                                </li>
                            </ul>
                        </div><br>
                        <form method="post" enctype="multipart/form-data" id="filesForm">

                        <input type="hidden" class="form-control" id="editPlan" name="editPlan">
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
                                                    <input type="text" class="form-control" id="CodePlantilla" name="CodePlantilla">
                                                </div>
                                                <div id="dropdown_empresa" class="form-group col-sm-8 row" name="dropdown_empresa">
                                                    <!-- DIBUJO DE DROPDOWN EMPRESA -->
                                                </div>
                                            </div>
                                            <div class="form-group col-3 row">
                                                <label>Fecha de Operacion </label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="FRECEPCI" name="FRECEPCI">
                                                </div>
                                            </div>

                                            <div class="form-group col-3 row">
                                                <label>Asignacion</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="FASIG" name="FASIG">
                                                </div>
                                            </div>
                                            <div class="form-group col-3 row">
                                                <label>Vencimiento</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="FVENCE" name="FVENCE">
                                                </div>
                                            </div>

                                            <div class="col-10">
                                                <input class="form-control" type="file" name="fileContacts">
                                            </div>
                                            <br>

                                            <div class="col-12">
                                                <ul class="nav nav-pills nav-fill btn-info AGREGAR">
                                                    <li class="nav-item">
                                                        <button type="button" onclick="fntInsert()" class="btn btn-secondary btn-block">IMPORTAR DATA ASIGNADA</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form id="formData" method="POST">
                    <div class="modal fade" id="plantillas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title w-100" id="myModalLabel">PLANTILLAS</h4>
                                    <button type="button" class="CERRAR" data-dismiss="modal" aria-label="CERRAR">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                                            <li class="nav-item">
                                                <button type="button" onclick="newPlantilla()" class="btn btn-secondary btn-block">Nuevo</button>
                                            </li>
                                            <li class="nav-item">
                                                <button data-dismiss="modal" class="btn btn-secondary btn-block">Salir</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <div id="TablaPlantillas" name="TablaPlantillas">
                                                <!-- DIBUJO DE TABLA -->
                                            </div><br><br>
                                            <input type="hidden" class="form-control" id="CodePlantillaUpdate" name="CodePlantillaUpdate">

                                            <div class="form-group row col-sm-12" style="display: none;" id="descripPlantilla_" name="descripPlantilla_">
                                                <label>Nombre de Plantilla </label>&nbsp&nbsp
                                                <div class="form-group col-8 row">
                                                    <input type="text" class="form-control" id="descripPlantilla" name="descripPlantilla">
                                                </div>
                                            </div>

                                            <div id="dropdown_campos" name="dropdown_campos">
                                                <!-- DIBUJO DE INPUT -->
                                            </div>
                                            <div id="view_edit_plan" name="view_edit_plan">
                                                <!-- DIBUJO DE INPUT -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="guardarPlantilla" name="guardarPlantilla" style="display: none;">
                                        <a type="button" class="btn btn-info col-sm-12" onclick="fntSavePlantilla() "><i class="fad fa-2x fa-save"></i></a>
                                    </div>
                                    <div class="col-sm-12" id="editPlantilla" name="editPlantilla" style="display: none;">
                                        <a type="button" class="btn btn-info col-sm-12" onclick="fntEditPlantilla() "><i class="fad fa-2x fa-edit"></i></a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CERRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-2"></div>
                <div class="col-3"></div>
                <div class="col-md-6 fondo2">
                    <div class="div1 fondo2">
                        <div id="Tabla" name="Tabla">
                            <!-- DIBUJO DE TABLA -->
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    </br>
                </div>

            </div>
    
</div>
</div>


<script>
    function fntViewSelectPlant() {

        var strCODIEMPR = $("#hid_CODIEMPR").val();
        var strCODICLIE = $("#hid_CODICLIE").val();
        var strCLAPROD = $("#hid_CLAPROD").val();
        var strNOMBRE = $("#hid_NOMBRE").val();
        var strFASIG = $("#hid_FASIG").val();
        var strSALDO = $("#hid_SALDO").val();
        var strMORA = $("#hid_MORA").val();
        var strFVENCE = $("#hid_FVENCE").val();
        var strTIPOPROD = $("#hid_TIPOPROD").val();
        var strGESTORD = $("#hid_GESTORD").val();
        var strFPROPAGO = $("#hid_FPROPAGO").val();
        var strIDENTIFI = $("#hid_IDENTIFI").val();
        var strNIT = $("#hid_NIT").val();
        var strPAGOS = $("#hid_PAGOS").val();
        var strPAGOXVER = $("#hid_PAGOXVER").val();
        var strBOLETA = $("#hid_BOLETA").val();
        var strFULTPAGO = $("#hid_FULTPAGO").val();
        var strDIAPAGO = $("#hid_DIAPAGO").val();
        var strSALDOVEQ = $("#hid_SALDOVEQ").val();
        var strPAGOMINQ = $("#hid_PAGOMINQ").val();
        var strSALDOD = $("#hid_SALDOD").val();
        var strSALDOVED = $("#hid_SALDOVED").val();
        var strPAGOMIND = $("#hid_PAGOMIND").val();
        var strFULTPAGD = $("#hid_FULTPAGD").val();
        var strCICLOVEQ = $("#hid_CICLOVEQ").val();
        var strCICLOVED = $("#hid_CICLOVED").val();
        var strPAGOSD = $("#hid_PAGOSD").val();
        var strMONTOUPQ = $("#hid_MONTOUPQ").val();
        var strPORDESC = $("#hid_PORDESC").val();
        var strSALDEXTQ = $("#hid_SALDEXTQ").val();
        var strSALDEXTD = $("#hid_SALDEXTD").val();
        var strGENERO = $("#hid_GENERO").val();
        var strESTCIVIL = $("#hid_ESTCIVIL").val();
        var strNOMTRAB = $("#hid_NOMTRAB").val();
        var strMONTOTOR = $("#hid_MONTOTOR").val();
        var strCAPATRAS = $("#hid_CAPATRAS").val();
        var strINTATRAS = $("#hid_INTATRAS").val();
        var strMORATRAS = $("#hid_MORATRAS").val();
        var strTOTATRAS = $("#hid_TOTATRAS").val();
        var strQOTRENEG = $("#hid_QOTRENEG").val();
        var strTASACRED = $("#hid_TASACRED").val();
        var strQOTCONVE = $("#hid_QOTCONVE").val();
        var strEXTRAFIN = $("#hid_EXTRAFIN").val();
        var strMESES3 = $("#hid_MESES3").val();
        var strMESES6 = $("#hid_MESES6").val();
        var strMESES9 = $("#hid_MESES9").val();
        var strMESES12 = $("#hid_MESES12").val();
        var strMESES18 = $("#hid_MESES18").val();
        var strMESES24 = $("#hid_MESES24").val();
        var strMESES36 = $("#hid_MESES36").val();
        var strMESES48 = $("#hid_MESES48").val();
        var strCICLOV1Q = $("#hid_CICLOV1Q").val();
        var strCICLOV2Q = $("#hid_CICLOV2Q").val();
        var strCICLOV3Q = $("#hid_CICLOV3Q").val();
        var strCICLOV4Q = $("#hid_CICLOV4Q").val();
        var strCICLOV5Q = $("#hid_CICLOV5Q").val();
        var strCICLOV6Q = $("#hid_CICLOV6Q").val();
        var strCICLOV7Q = $("#hid_CICLOV7Q").val();
        var strCICLOV8Q = $("#hid_CICLOV8Q").val();
        var strCICLOV9Q = $("#hid_CICLOV9Q").val();
        var strCICLOV1D = $("#hid_CICLOV1D").val();
        var strCICLOV2D = $("#hid_CICLOV2D").val();
        var strCICLOV3D = $("#hid_CICLOV3D").val();
        var strCICLOV4D = $("#hid_CICLOV4D").val();
        var strCICLOV5D = $("#hid_CICLOV5D").val();
        var strCICLOV6D = $("#hid_CICLOV6D").val();
        var strCICLOV7D = $("#hid_CICLOV7D").val();
        var strCICLOV8D = $("#hid_CICLOV8D").val();
        var strFECHAPER = $("#hid_FECHAPER").val();
        var strFECHAFIN = $("#hid_FECHAFIN").val();
        var strFECHACOR = $("#hid_FECHACOR").val();
        var strEXPEDIEN = $("#hid_EXPEDIEN").val();
        var strCICLO = $("#hid_CICLO").val();
        var strSALDOD2 = $("#hid_SALDOD2").val();
        var strFULTGEST = $("#hid_FULTGEST").val();
        var strPLAZCRED = $("#hid_PLAZCRED").val();
        var strNOMAGENTE = $("#hid_NOMAGENTE").val();
        var strEXTENCION = $("#hid_EXTENCION").val();
        var strDEUDOR = $("#hid_DEUDOR").val();
        var strCODEUDOR = $("#hid_CODEUDOR").val();
        var strJUICIO = $("#hid_JUICIO").val();
        var strAGENTE = $("#hid_AGENTE").val();
        var strCORRELAT = $("#hid_CORRELAT").val();
        var strDIREC = $("#hid_DIREC").val();
        var strEMAIL = $("#hid_EMAIL").val();
        var strPAIS = $("#hid_PAIS").val();
        var strCANAL = $("#hid_CANAL").val();
        var strSUCURSAL = $("#hid_SUCURSAL").val();
        var strFOLIO = $("#hid_FOLIO").val();
        var strIDCAMPANA = $("#hid_IDCAMPANA").val();

        var strCODIEMPR_cod = $("#hid_CODIEMPR_cod").val();
        var strCODICLIE_cod = $("#hid_CODICLIE_cod").val();
        var strCLAPROD_cod = $("#hid_CLAPROD_cod").val();
        var strNOMBRE_cod = $("#hid_NOMBRE_cod").val();
        var strFASIG_cod = $("#hid_FASIG_cod").val();
        var strSALDO_cod = $("#hid_SALDO_cod").val();
        var strMORA_cod = $("#hid_MORA_cod").val();
        var strFVENCE_cod = $("#hid_FVENCE_cod").val();
        var strTIPOPROD_cod = $("#hid_TIPOPROD_cod").val();
        var strGESTORD_cod = $("#hid_GESTORD_cod").val();
        var strFPROPAGO_cod = $("#hid_FPROPAGO_cod").val();
        var strIDENTIFI_cod = $("#hid_IDENTIFI_cod").val();
        var strNIT_cod = $("#hid_NIT_cod").val();
        var strPAGOS_cod = $("#hid_PAGOS_cod").val();
        var strPAGOXVER_cod = $("#hid_PAGOXVER_cod").val();
        var strBOLETA_cod = $("#hid_BOLETA_cod").val();
        var strFULTPAGO_cod = $("#hid_FULTPAGO_cod").val();
        var strDIAPAGO_cod = $("#hid_DIAPAGO_cod").val();
        var strSALDOVEQ_cod = $("#hid_SALDOVEQ_cod").val();
        var strPAGOMINQ_cod = $("#hid_PAGOMINQ_cod").val();
        var strSALDOD_cod = $("#hid_SALDOD_cod").val();
        var strSALDOVED_cod = $("#hid_SALDOVED_cod").val();
        var strPAGOMIND_cod = $("#hid_PAGOMIND_cod").val();
        var strFULTPAGD_cod = $("#hid_FULTPAGD_cod").val();
        var strCICLOVEQ_cod = $("#hid_CICLOVEQ_cod").val();
        var strCICLOVED_cod = $("#hid_CICLOVED_cod").val();
        var strPAGOSD_cod = $("#hid_PAGOSD_cod").val();
        var strMONTOUPQ_cod = $("#hid_MONTOUPQ_cod").val();
        var strPORDESC_cod = $("#hid_PORDESC_cod").val();
        var strSALDEXTQ_cod = $("#hid_SALDEXTQ_cod").val();
        var strSALDEXTD_cod = $("#hid_SALDEXTD_cod").val();
        var strGENERO_cod = $("#hid_GENERO_cod").val();
        var strESTCIVIL_cod = $("#hid_ESTCIVIL_cod").val();
        var strNOMTRAB_cod = $("#hid_NOMTRAB_cod").val();
        var strMONTOTOR_cod = $("#hid_MONTOTOR_cod").val();
        var strCAPATRAS_cod = $("#hid_CAPATRAS_cod").val();
        var strINTATRAS_cod = $("#hid_INTATRAS_cod").val();
        var strMORATRAS_cod = $("#hid_MORATRAS_cod").val();
        var strTOTATRAS_cod = $("#hid_TOTATRAS_cod").val();
        var strQOTRENEG_cod = $("#hid_QOTRENEG_cod").val();
        var strTASACRED_cod = $("#hid_TASACRED_cod").val();
        var strQOTCONVE_cod = $("#hid_QOTCONVE_cod").val();
        var strEXTRAFIN_cod = $("#hid_EXTRAFIN_cod").val();
        var strMESES3_cod = $("#hid_MESES3_cod").val();
        var strMESES6_cod = $("#hid_MESES6_cod").val();
        var strMESES9_cod = $("#hid_MESES9_cod").val();
        var strMESES12_cod = $("#hid_MESES12_cod").val();
        var strMESES18_cod = $("#hid_MESES18_cod").val();
        var strMESES24_cod = $("#hid_MESES24_cod").val();
        var strMESES36_cod = $("#hid_MESES36_cod").val();
        var strMESES48_cod = $("#hid_MESES48_cod").val();
        var strCICLOV1Q_cod = $("#hid_CICLOV1Q_cod").val();
        var strCICLOV2Q_cod = $("#hid_CICLOV2Q_cod").val();
        var strCICLOV3Q_cod = $("#hid_CICLOV3Q_cod").val();
        var strCICLOV4Q_cod = $("#hid_CICLOV4Q_cod").val();
        var strCICLOV5Q_cod = $("#hid_CICLOV5Q_cod").val();
        var strCICLOV6Q_cod = $("#hid_CICLOV6Q_cod").val();
        var strCICLOV7Q_cod = $("#hid_CICLOV7Q_cod").val();
        var strCICLOV8Q_cod = $("#hid_CICLOV8Q_cod").val();
        var strCICLOV9Q_cod = $("#hid_CICLOV9Q_cod").val();
        var strCICLOV1D_cod = $("#hid_CICLOV1D_cod").val();
        var strCICLOV2D_cod = $("#hid_CICLOV2D_cod").val();
        var strCICLOV3D_cod = $("#hid_CICLOV3D_cod").val();
        var strCICLOV4D_cod = $("#hid_CICLOV4D_cod").val();
        var strCICLOV5D_cod = $("#hid_CICLOV5D_cod").val();
        var strCICLOV6D_cod = $("#hid_CICLOV6D_cod").val();
        var strCICLOV7D_cod = $("#hid_CICLOV7D_cod").val();
        var strCICLOV8D_cod = $("#hid_CICLOV8D_cod").val();
        var strFECHAPER_cod = $("#hid_FECHAPER_cod").val();
        var strFECHAFIN_cod = $("#hid_FECHAFIN_cod").val();
        var strFECHACOR_cod = $("#hid_FECHACOR_cod").val();
        var strEXPEDIEN_cod = $("#hid_EXPEDIEN_cod").val();
        var strCICLO_cod = $("#hid_CICLO_cod").val();
        var strSALDOD2_cod = $("#hid_SALDOD2_cod").val();
        var strFULTGEST_cod = $("#hid_FULTGEST_cod").val();
        var strPLAZCRED_cod = $("#hid_PLAZCRED_cod").val();
        var strNOMAGENTE_cod = $("#hid_NOMAGENTE_cod").val();
        var strEXTENCION_cod = $("#hid_EXTENCION_cod").val();
        var strDEUDOR_cod = $("#hid_DEUDOR_cod").val();
        var strCODEUDOR_cod = $("#hid_CODEUDOR_cod").val();
        var strJUICIO_cod = $("#hid_JUICIO_cod").val();
        var strAGENTE_cod = $("#hid_AGENTE_cod").val();
        var strCORRELAT_cod = $("#hid_CORRELAT_cod").val();
        var strDIREC_cod = $("#hid_DIREC_cod").val();
        var strEMAIL_cod = $("#hid_EMAIL_cod").val();
        var strPAIS_cod = $("#hid_PAIS_cod").val();
        var strCANAL_cod = $("#hid_CANAL_cod").val();
        var strSUCURSAL_cod = $("#hid_SUCURSAL_cod").val();
        var strFOLIO_cod = $("#hid_FOLIO_cod").val();
        var strIDCAMPANA_cod = $("#hid_IDCAMPANA_cod").val();

        var strCODIEMPR_ord = $("#hid_CODIEMPR_ord").val();
        var strCODICLIE_ord = $("#hid_CODICLIE_ord").val();
        var strCLAPROD_ord = $("#hid_CLAPROD_ord").val();
        var strNOMBRE_ord = $("#hid_NOMBRE_ord").val();
        var strFASIG_ord = $("#hid_FASIG_ord").val();
        var strSALDO_ord = $("#hid_SALDO_ord").val();
        var strMORA_ord = $("#hid_MORA_ord").val();
        var strFVENCE_ord = $("#hid_FVENCE_ord").val();
        var strTIPOPROD_ord = $("#hid_TIPOPROD_ord").val();
        var strGESTORD_ord = $("#hid_GESTORD_ord").val();
        var strFPROPAGO_ord = $("#hid_FPROPAGO_ord").val();
        var strIDENTIFI_ord = $("#hid_IDENTIFI_ord").val();
        var strNIT_ord = $("#hid_NIT_ord").val();
        var strPAGOS_ord = $("#hid_PAGOS_ord").val();
        var strPAGOXVER_ord = $("#hid_PAGOXVER_ord").val();
        var strBOLETA_ord = $("#hid_BOLETA_ord").val();
        var strFULTPAGO_ord = $("#hid_FULTPAGO_ord").val();
        var strDIAPAGO_ord = $("#hid_DIAPAGO_ord").val();
        var strSALDOVEQ_ord = $("#hid_SALDOVEQ_ord").val();
        var strPAGOMINQ_ord = $("#hid_PAGOMINQ_ord").val();
        var strSALDOD_ord = $("#hid_SALDOD_ord").val();
        var strSALDOVED_ord = $("#hid_SALDOVED_ord").val();
        var strPAGOMIND_ord = $("#hid_PAGOMIND_ord").val();
        var strFULTPAGD_ord = $("#hid_FULTPAGD_ord").val();
        var strCICLOVEQ_ord = $("#hid_CICLOVEQ_ord").val();
        var strCICLOVED_ord = $("#hid_CICLOVED_ord").val();
        var strPAGOSD_ord = $("#hid_PAGOSD_ord").val();
        var strMONTOUPQ_ord = $("#hid_MONTOUPQ_ord").val();
        var strPORDESC_ord = $("#hid_PORDESC_ord").val();
        var strSALDEXTQ_ord = $("#hid_SALDEXTQ_ord").val();
        var strSALDEXTD_ord = $("#hid_SALDEXTD_ord").val();
        var strGENERO_ord = $("#hid_GENERO_ord").val();
        var strESTCIVIL_ord = $("#hid_ESTCIVIL_ord").val();
        var strNOMTRAB_ord = $("#hid_NOMTRAB_ord").val();
        var strMONTOTOR_ord = $("#hid_MONTOTOR_ord").val();
        var strCAPATRAS_ord = $("#hid_CAPATRAS_ord").val();
        var strINTATRAS_ord = $("#hid_INTATRAS_ord").val();
        var strMORATRAS_ord = $("#hid_MORATRAS_ord").val();
        var strTOTATRAS_ord = $("#hid_TOTATRAS_ord").val();
        var strQOTRENEG_ord = $("#hid_QOTRENEG_ord").val();
        var strTASACRED_ord = $("#hid_TASACRED_ord").val();
        var strQOTCONVE_ord = $("#hid_QOTCONVE_ord").val();
        var strEXTRAFIN_ord = $("#hid_EXTRAFIN_ord").val();
        var strMESES3_ord = $("#hid_MESES3_ord").val();
        var strMESES6_ord = $("#hid_MESES6_ord").val();
        var strMESES9_ord = $("#hid_MESES9_ord").val();
        var strMESES12_ord = $("#hid_MESES12_ord").val();
        var strMESES18_ord = $("#hid_MESES18_ord").val();
        var strMESES24_ord = $("#hid_MESES24_ord").val();
        var strMESES36_ord = $("#hid_MESES36_ord").val();
        var strMESES48_ord = $("#hid_MESES48_ord").val();
        var strCICLOV1Q_ord = $("#hid_CICLOV1Q_ord").val();
        var strCICLOV2Q_ord = $("#hid_CICLOV2Q_ord").val();
        var strCICLOV3Q_ord = $("#hid_CICLOV3Q_ord").val();
        var strCICLOV4Q_ord = $("#hid_CICLOV4Q_ord").val();
        var strCICLOV5Q_ord = $("#hid_CICLOV5Q_ord").val();
        var strCICLOV6Q_ord = $("#hid_CICLOV6Q_ord").val();
        var strCICLOV7Q_ord = $("#hid_CICLOV7Q_ord").val();
        var strCICLOV8Q_ord = $("#hid_CICLOV8Q_ord").val();
        var strCICLOV9Q_ord = $("#hid_CICLOV9Q_ord").val();
        var strCICLOV1D_ord = $("#hid_CICLOV1D_ord").val();
        var strCICLOV2D_ord = $("#hid_CICLOV2D_ord").val();
        var strCICLOV3D_ord = $("#hid_CICLOV3D_ord").val();
        var strCICLOV4D_ord = $("#hid_CICLOV4D_ord").val();
        var strCICLOV5D_ord = $("#hid_CICLOV5D_ord").val();
        var strCICLOV6D_ord = $("#hid_CICLOV6D_ord").val();
        var strCICLOV7D_ord = $("#hid_CICLOV7D_ord").val();
        var strCICLOV8D_ord = $("#hid_CICLOV8D_ord").val();
        var strFECHAPER_ord = $("#hid_FECHAPER_ord").val();
        var strFECHAFIN_ord = $("#hid_FECHAFIN_ord").val();
        var strFECHACOR_ord = $("#hid_FECHACOR_ord").val();
        var strEXPEDIEN_ord = $("#hid_EXPEDIEN_ord").val();
        var strCICLO_ord = $("#hid_CICLO_ord").val();
        var strSALDOD2_ord = $("#hid_SALDOD2_ord").val();
        var strFULTGEST_ord = $("#hid_FULTGEST_ord").val();
        var strPLAZCRED_ord = $("#hid_PLAZCRED_ord").val();
        var strNOMAGENTE_ord = $("#hid_NOMAGENTE_ord").val();
        var strEXTENCION_ord = $("#hid_EXTENCION_ord").val();
        var strDEUDOR_ord = $("#hid_DEUDOR_ord").val();
        var strCODEUDOR_ord = $("#hid_CODEUDOR_ord").val();
        var strJUICIO_ord = $("#hid_JUICIO_ord").val();
        var strAGENTE_ord = $("#hid_AGENTE_ord").val();
        var strCORRELAT_ord = $("#hid_CORRELAT_ord").val();
        var strDIREC_ord = $("#hid_DIREC_ord").val();
        var strEMAIL_ord = $("#hid_EMAIL_ord").val();
        var strPAIS_ord = $("#hid_PAIS_ord").val();
        var strCANAL_ord = $("#hid_CANAL_ord").val();
        var strSUCURSAL_ord = $("#hid_SUCURSAL_ord").val();
        var strFOLIO_ord = $("#hid_FOLIO_ord").val();
        var strIDCAMPANA_ord = $("#hid_IDCAMPANA_ord").val();

        var boolCheck = (strCODIEMPR == 1) ? true : false;
        $("[name=CODIEMPR]").prop('checked', boolCheck);
        $("#ord_CODIEMPR").val(strCODIEMPR_ord);

        var boolCheck = (strCODICLIE == 1) ? true : false;
        $("[name=CODICLIE]").prop('checked', boolCheck);
        $("#ord_CODICLIE").val(strCODICLIE_ord);

        var boolCheck = (strCLAPROD == 1) ? true : false;
        $("[name=CLAPROD]").prop('checked', boolCheck);
        $("#ord_CLAPROD").val(strCLAPROD_ord);

        var boolCheck = (strNOMBRE == 1) ? true : false;
        $("[name=NOMBRE]").prop('checked', boolCheck);
        $("#ord_NOMBRE").val(strNOMBRE_ord);

        var boolCheck = (strFASIG == 1) ? true : false;
        $("[name=FASIG]").prop('checked', boolCheck);
        $("#ord_FASIG").val(strFASIG_ord);

        var boolCheck = (strSALDO == 1) ? true : false;
        $("[name=SALDO]").prop('checked', boolCheck);
        $("#ord_SALDO").val(strSALDO_ord);

        var boolCheck = (strMORA == 1) ? true : false;
        $("[name=MORA]").prop('checked', boolCheck);
        $("#ord_MORA").val(strMORA_ord);

        var boolCheck = (strFVENCE == 1) ? true : false;
        $("[name=FVENCE]").prop('checked', boolCheck);
        $("#ord_FVENCE").val(strFVENCE_ord);

        var boolCheck = (strTIPOPROD == 1) ? true : false;
        $("[name=TIPOPROD]").prop('checked', boolCheck);
        $("#ord_TIPOPROD").val(strTIPOPROD_ord);

        var boolCheck = (strGESTORD == 1) ? true : false;
        $("[name=GESTORD]").prop('checked', boolCheck);
        $("#ord_GESTORD").val(strGESTORD_ord);

        var boolCheck = (strFPROPAGO == 1) ? true : false;
        $("[name=FPROPAGO]").prop('checked', boolCheck);
        $("#ord_FPROPAGO").val(strFPROPAGO_ord);

        var boolCheck = (strIDENTIFI == 1) ? true : false;
        $("[name=IDENTIFI]").prop('checked', boolCheck);
        $("#ord_IDENTIFI").val(strIDENTIFI_ord);

        var boolCheck = (strNIT == 1) ? true : false;
        $("[name=NIT]").prop('checked', boolCheck);
        $("#ord_NIT").val(strNIT_ord);

        var boolCheck = (strPAGOS == 1) ? true : false;
        $("[name=PAGOS]").prop('checked', boolCheck);
        $("#ord_PAGOS").val(strPAGOS_ord);

        var boolCheck = (strPAGOXVER == 1) ? true : false;
        $("[name=PAGOXVER]").prop('checked', boolCheck);
        $("#ord_PAGOXVER").val(strPAGOXVER_ord);

        var boolCheck = (strBOLETA == 1) ? true : false;
        $("[name=BOLETA]").prop('checked', boolCheck);
        $("#ord_BOLETA").val(strBOLETA_ord);

        var boolCheck = (strFULTPAGO == 1) ? true : false;
        $("[name=FULTPAGO]").prop('checked', boolCheck);
        $("#ord_FULTPAGO").val(strFULTPAGO_ord);

        var boolCheck = (strDIAPAGO == 1) ? true : false;
        $("[name=DIAPAGO]").prop('checked', boolCheck);
        $("#ord_DIAPAGO").val(strDIAPAGO_ord);

        var boolCheck = (strSALDOVEQ == 1) ? true : false;
        $("[name=SALDOVEQ]").prop('checked', boolCheck);
        $("#ord_SALDOVEQ").val(strSALDOVEQ_ord);

        var boolCheck = (strPAGOMINQ == 1) ? true : false;
        $("[name=PAGOMINQ]").prop('checked', boolCheck);
        $("#ord_PAGOMINQ").val(strPAGOMINQ_ord);

        var boolCheck = (strSALDOD == 1) ? true : false;
        $("[name=SALDOD]").prop('checked', boolCheck);
        $("#ord_SALDOD").val(strSALDOD_ord);

        var boolCheck = (strSALDOVED == 1) ? true : false;
        $("[name=SALDOVED]").prop('checked', boolCheck);
        $("#ord_SALDOVED").val(strSALDOVED_ord);

        var boolCheck = (strPAGOMIND == 1) ? true : false;
        $("[name=PAGOMIND]").prop('checked', boolCheck);
        $("#ord_PAGOMIND").val(strPAGOMIND_ord);

        var boolCheck = (strFULTPAGD == 1) ? true : false;
        $("[name=FULTPAGD]").prop('checked', boolCheck);
        $("#ord_FULTPAGD").val(strFULTPAGD_ord);

        var boolCheck = (strCICLOVEQ == 1) ? true : false;
        $("[name=CICLOVEQ]").prop('checked', boolCheck);
        $("#ord_CICLOVEQ").val(strCICLOVEQ_ord);

        var boolCheck = (strCICLOVED == 1) ? true : false;
        $("[name=CICLOVED]").prop('checked', boolCheck);
        $("#ord_CICLOVED").val(strCICLOVED_ord);

        var boolCheck = (strPAGOSD == 1) ? true : false;
        $("[name=PAGOSD]").prop('checked', boolCheck);
        $("#ord_PAGOSD").val(strPAGOSD_ord);

        var boolCheck = (strMONTOUPQ == 1) ? true : false;
        $("[name=MONTOUPQ]").prop('checked', boolCheck);
        $("#ord_MONTOUPQ").val(strMONTOUPQ_ord);

        var boolCheck = (strPORDESC == 1) ? true : false;
        $("[name=PORDESC]").prop('checked', boolCheck);
        $("#ord_PORDESC").val(strPORDESC_ord);

        var boolCheck = (strSALDEXTQ == 1) ? true : false;
        $("[name=SALDEXTQ]").prop('checked', boolCheck);
        $("#ord_SALDEXTQ").val(strSALDEXTQ_ord);

        var boolCheck = (strSALDEXTD == 1) ? true : false;
        $("[name=SALDEXTD]").prop('checked', boolCheck);
        $("#ord_SALDEXTD").val(strSALDEXTD_ord);

        var boolCheck = (strGENERO == 1) ? true : false;
        $("[name=GENERO]").prop('checked', boolCheck);
        $("#ord_GENERO").val(strGENERO_ord);

        var boolCheck = (strESTCIVIL == 1) ? true : false;
        $("[name=ESTCIVIL]").prop('checked', boolCheck);
        $("#ord_ESTCIVIL").val(strESTCIVIL_ord);

        var boolCheck = (strNOMTRAB == 1) ? true : false;
        $("[name=NOMTRAB]").prop('checked', boolCheck);
        $("#ord_NOMTRAB").val(strNOMTRAB_ord);

        var boolCheck = (strMONTOTOR == 1) ? true : false;
        $("[name=MONTOTOR]").prop('checked', boolCheck);
        $("#ord_MONTOTOR").val(strMONTOTOR_ord);

        var boolCheck = (strCAPATRAS == 1) ? true : false;
        $("[name=CAPATRAS]").prop('checked', boolCheck);
        $("#ord_CAPATRAS").val(strCAPATRAS_ord);

        var boolCheck = (strINTATRAS == 1) ? true : false;
        $("[name=INTATRAS]").prop('checked', boolCheck);
        $("#ord_INTATRAS").val(strINTATRAS_ord);

        var boolCheck = (strMORATRAS == 1) ? true : false;
        $("[name=MORATRAS]").prop('checked', boolCheck);
        $("#ord_MORATRAS").val(strMORATRAS_ord);

        var boolCheck = (strTOTATRAS == 1) ? true : false;
        $("[name=TOTATRAS]").prop('checked', boolCheck);
        $("#ord_TOTATRAS").val(strTOTATRAS_ord);

        var boolCheck = (strQOTRENEG == 1) ? true : false;
        $("[name=QOTRENEG]").prop('checked', boolCheck);
        $("#ord_QOTRENEG").val(strQOTRENEG_ord);

        var boolCheck = (strTASACRED == 1) ? true : false;
        $("[name=TASACRED]").prop('checked', boolCheck);
        $("#ord_TASACRED").val(strTASACRED_ord);

        var boolCheck = (strQOTCONVE == 1) ? true : false;
        $("[name=QOTCONVE]").prop('checked', boolCheck);
        $("#ord_QOTCONVE").val(strQOTCONVE_ord);

        var boolCheck = (strEXTRAFIN == 1) ? true : false;
        $("[name=EXTRAFIN]").prop('checked', boolCheck);
        $("#ord_EXTRAFIN").val(strEXTRAFIN_ord);

        var boolCheck = (strMESES3 == 1) ? true : false;
        $("[name=MESES3]").prop('checked', boolCheck);
        $("#ord_MESES3").val(strMESES3_ord);

        var boolCheck = (strMESES6 == 1) ? true : false;
        $("[name=MESES6]").prop('checked', boolCheck);
        $("#ord_MESES6").val(strMESES6_ord);

        var boolCheck = (strMESES9 == 1) ? true : false;
        $("[name=MESES9]").prop('checked', boolCheck);
        $("#ord_MESES9").val(strMESES9_ord);

        var boolCheck = (strMESES24 == 1) ? true : false;
        $("[name=MESES24]").prop('checked', boolCheck);
        $("#ord_MESES24").val(strMESES24_ord);

        var boolCheck = (strMESES36 == 1) ? true : false;
        $("[name=MESES36]").prop('checked', boolCheck);
        $("#ord_MESES36").val(strMESES36_ord);

        var boolCheck = (strMESES48 == 1) ? true : false;
        $("[name=MESES48]").prop('checked', boolCheck);
        $("#ord_MESES48").val(strMESES48_ord);

        var boolCheck = (strCICLOV1Q == 1) ? true : false;
        $("[name=CICLOV1Q]").prop('checked', boolCheck);
        $("#ord_CICLOV1Q").val(strCICLOV1Q_ord);

        var boolCheck = (strCICLOV2Q == 1) ? true : false;
        $("[name=CICLOV2Q]").prop('checked', boolCheck);
        $("#ord_CICLOV2Q").val(strCICLOV2Q_ord);

        var boolCheck = (strCICLOV3Q == 1) ? true : false;
        $("[name=CICLOV3Q]").prop('checked', boolCheck);
        $("#ord_CICLOV3Q").val(strCICLOV3Q_ord);

        var boolCheck = (strCICLOV4Q == 1) ? true : false;
        $("[name=CICLOV4Q]").prop('checked', boolCheck);
        $("#ord_CICLOV4Q").val(strCICLOV4Q_ord);

        var boolCheck = (strCICLOV5Q == 1) ? true : false;
        $("[name=CICLOV5Q]").prop('checked', boolCheck);
        $("#ord_CICLOV5Q").val(strCICLOV5Q_ord);

        var boolCheck = (strCICLOV6Q == 1) ? true : false;
        $("[name=CICLOV6Q]").prop('checked', boolCheck);
        $("#ord_CICLOV6Q").val(strCICLOV6Q_ord);

        var boolCheck = (strCICLOV7Q == 1) ? true : false;
        $("[name=CICLOV7Q]").prop('checked', boolCheck);
        $("#ord_CICLOV7Q").val(strCICLOV7Q_ord);

        var boolCheck = (strCICLOV8Q == 1) ? true : false;
        $("[name=CICLOV8Q]").prop('checked', boolCheck);
        $("#ord_CICLOV8Q").val(strCICLOV8Q_ord);

        var boolCheck = (strCICLOV9Q == 1) ? true : false;
        $("[name=CICLOV9Q]").prop('checked', boolCheck);
        $("#ord_CICLOV9Q").val(strCICLOV9Q_ord);

        var boolCheck = (strCICLOV1D == 1) ? true : false;
        $("[name=CICLOV1D]").prop('checked', boolCheck);
        $("#ord_CICLOV1D").val(strCICLOV1D_ord);

        var boolCheck = (strCICLOV2D == 1) ? true : false;
        $("[name=CICLOV2D]").prop('checked', boolCheck);
        $("#ord_CICLOV2D").val(strCICLOV2D_ord);

        var boolCheck = (strCICLOV3D == 1) ? true : false;
        $("[name=strCICLOV3D]").prop('checked', boolCheck);
        $("#ord_CICLOV3D").val(strCICLOV3D);

        var boolCheck = (strCICLOV4D == 1) ? true : false;
        $("[name=CICLOV4D]").prop('checked', boolCheck);
        $("#ord_CICLOV4D").val(strCICLOV4D_ord);

        var boolCheck = (strCICLOV5D == 1) ? true : false;
        $("[name=CICLOV5D]").prop('checked', boolCheck);
        $("#ord_CICLOV5D").val(strCICLOV5D_ord);

        var boolCheck = (strCICLOV6D == 1) ? true : false;
        $("[name=CICLOV6D]").prop('checked', boolCheck);
        $("#ord_CICLOV6D").val(strCICLOV6D_ord);

        var boolCheck = (strCICLOV7D == 1) ? true : false;
        $("[name=CICLOV7D]").prop('checked', boolCheck);
        $("#ord_CICLOV7D").val(strCICLOV7D_ord);

        var boolCheck = (strCICLOV8D == 1) ? true : false;
        $("[name=CICLOV8D]").prop('checked', boolCheck);
        $("#ord_CICLOV8D").val(strCICLOV8D_ord);

        var boolCheck = (strFECHAPER == 1) ? true : false;
        $("[name=FECHAPER]").prop('checked', boolCheck);
        $("#ord_FECHAPER").val(strFECHAPER_ord);

        var boolCheck = (strFECHAFIN == 1) ? true : false;
        $("[name=FECHAFIN]").prop('checked', boolCheck);
        $("#ord_FECHAFIN").val(strFECHAFIN_ord);

        var boolCheck = (strFECHACOR == 1) ? true : false;
        $("[name=FECHACOR]").prop('checked', boolCheck);
        $("#ord_FECHACOR").val(strFECHACOR_ord);

        var boolCheck = (strEXPEDIEN == 1) ? true : false;
        $("[name=EXPEDIEN]").prop('checked', boolCheck);
        $("#ord_EXPEDIEN").val(strEXPEDIEN_ord);

        var boolCheck = (strCICLO == 1) ? true : false;
        $("[name=CICLO]").prop('checked', boolCheck);
        $("#ord_CICLO").val(strCICLO_ord);

        var boolCheck = (strSALDOD2 == 1) ? true : false;
        $("[name=SALDOD2]").prop('checked', boolCheck);
        $("#ord_SALDOD2").val(strSALDOD2_ord);

        var boolCheck = (strFULTGEST == 1) ? true : false;
        $("[name=FULTGEST]").prop('checked', boolCheck);
        $("#ord_FULTGEST").val(strFULTGEST_ord);

        var boolCheck = (strPLAZCRED == 1) ? true : false;
        $("[name=PLAZCRED]").prop('checked', boolCheck);
        $("#ord_PLAZCRED").val(strPLAZCRED_ord);

        var boolCheck = (strNOMAGENTE == 1) ? true : false;
        $("[name=NOMAGENTE]").prop('checked', boolCheck);
        $("#ord_NOMAGENTE").val(strNOMAGENTE_ord);

        var boolCheck = (strEXTENCION == 1) ? true : false;
        $("[name=EXTENCION]").prop('checked', boolCheck);
        $("#ord_EXTENCION").val(strEXTENCION_ord);

        var boolCheck = (strDEUDOR == 1) ? true : false;
        $("[name=DEUDOR]").prop('checked', boolCheck);
        $("#ord_DEUDOR").val(strDEUDOR_ord);

        var boolCheck = (strCODEUDOR == 1) ? true : false;
        $("[name=CODEUDOR]").prop('checked', boolCheck);
        $("#ord_CODEUDOR").val(strCODEUDOR_ord);

        var boolCheck = (strJUICIO == 1) ? true : false;
        $("[name=JUICIO]").prop('checked', boolCheck);
        $("#ord_JUICIO").val(strJUICIO_ord);

        var boolCheck = (strAGENTE == 1) ? true : false;
        $("[name=AGENTE]").prop('checked', boolCheck);
        $("#ord_AGENTE").val(strAGENTE_ord);

        var boolCheck = (strCORRELAT == 1) ? true : false;
        $("[name=CORRELAT]").prop('checked', boolCheck);
        $("#ord_CORRELAT").val(strCORRELAT_ord);

        var boolCheck = (strDIREC == 1) ? true : false;
        $("[name=DIREC]").prop('checked', boolCheck);
        $("#ord_DIREC").val(strDIREC_ord);

        var boolCheck = (strEMAIL == 1) ? true : false;
        $("[name=EMAIL]").prop('checked', boolCheck);
        $("#ord_EMAIL").val(strEMAIL_ord);

        var boolCheck = (strPAIS == 1) ? true : false;
        $("[name=PAIS]").prop('checked', boolCheck);
        $("#ord_PAIS").val(strPAIS_ord);

        var boolCheck = (strCANAL == 1) ? true : false;
        $("[name=CANAL]").prop('checked', boolCheck);
        $("#ord_CANAL").val(strCANAL_ord);

        var boolCheck = (strSUCURSAL == 1) ? true : false;
        $("[name=SUCURSAL]").prop('checked', boolCheck);
        $("#ord_SUCURSAL").val(strSUCURSAL_ord);

        var boolCheck = (strFOLIO == 1) ? true : false;
        $("[name=FOLIO]").prop('checked', boolCheck);
        $("#ord_FOLIO").val(strFOLIO_ord);

        var boolCheck = (strIDCAMPANA == 1) ? true : false;
        $("[name=IDCAMPANA]").prop('checked', boolCheck);
        $("#ord_IDCAMPANA").val(strIDCAMPANA_ord);

        // $('input,textarea,select').attr('readonly', false)
    }



    function fntSelectViewPlantiila(intParametro) {
        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strSupervisor = $("#hid_plantilla_" + intParametro).val();
            // alert(strDPI + "                         strDPI");
            $("#CodePlantilla").val(strSupervisor);
        }

        //$('#basicSupervisores').modal('hide')
        fntDibujoTabla()
    }

    function fntSelectEditPlant(intParametro) {
        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strSupervisor = $("#hidCode_" + intParametro).val();
            // alert(strDPI + "                         strDPI");
            $("#editPlan").val(strSupervisor);
            $("#CodePlantillaUpdate").val(strSupervisor);
        }

        //$('#basicSupervisores').modal('hide')
        fntSelectPlant()
    }

    function fntModalPlantillas() {
        $('#plantillas').modal('show')
    }


    function newPlantilla() {
        document.getElementById("formData").reset();
        document.getElementById('editPlantilla').style.display = 'none';

        document.getElementById('descripPlantilla_').style.display = 'block';
        document.getElementById('guardarPlantilla').style.display = 'block';
    }

    function updatePlantilla() {
        document.getElementById('descripPlantilla_').style.display = 'none';
        document.getElementById('editPlantilla').style.display = 'block';
    }
</script>

<style>
    .fondo {
        background: white !important;
    }

    .fondo2 {
        background: white !important;
        text-align: center !important;

    }

    .textoCentro {
        text-align: center;
    }

    div.tableFixHead {
        width: 1180px;
        height: 800px;
        overflow: scroll;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
    }

    div.tableFixHeadPlantilla {
        width: 1180px;
        height: 400px;
        overflow: scroll;
    }

    .tableFixHeadPlantilla thead th {
        position: sticky;
        top: 0;
    }

    .tableFixHeadInvestiga thead th {
        position: sticky !important;
        top: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #006fe6;
        color: #fff;
    }
</style>