<script>
    /////////////////////////////////////////////////////////////////////////// INSERT AND UPDATE ////////////////////////////////////////////////////////////////////////////////////////
    function fntInsertGlobal() {

        myTimeEnd()
        var datos = $('#formTipologiaGeneral').serialize();
        document.getElementById("loading-screen").style.display = "block";

        //alert(datos);
        //return false;

        var valor = document.getElementById("origen").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        var valor = document.getElementById("place").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        var valor = document.getElementById("receptor").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        var valor = document.getElementById("tipologia").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }


        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_gestion_",
            success: function(r) {
                if (r.status) {
                    if (r.status == 2) {
                        //fntDibujoTablaGestionMovimiento()
                        //document.getElementById("formTipologiaGeneral").reset();
                        document.getElementById("loading-screen").style.display = "none";
                        alertify.alert('ATENCION!', 'Gestión guardada correctamente!');

                        close_window()
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertIniWindowTrabajo() {
        myTimeEnd()
        var datos = $('#formTipologiaGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "m90.php?ajax=true&validaciones=insert_ini_window_trabajo",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntInsertGlobal()
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertIniWindow() {
        myTime()
        var datos = $('#formTipologiaGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "m90.php?ajax=true&validaciones=insert_ini_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        //  alertify.set('notifier', 'position', 'top-center');
                        //  alertify.success('Inicio!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertEndWindow() {
        myTimeEnd()
        var datos = $('#formTipologiaGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "m90.php?ajax=true&validaciones=insert_end_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        //  alertify.set('notifier', 'position', 'top-center');
                        //  alertify.success('Inicio!');
                        fntInsertGlobal()
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };



    function fntInsertTelefono() {
        var datos = $('#formDataTelefono_m').serialize();

        var valor = document.getElementById("numero").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        var valor = document.getElementById("propietario").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }
        fntNumExtractProServ()
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_telefono",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        document.getElementById("formDataTelefono_m").reset();
                        document.getElementById("numero").focus();
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntUpdateTelefono() {
        var datos = $('#formDataTelefono_update').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "m90.php?ajax=true&validaciones=update_telefono",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntDibujoTablaTelefonos()
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntUpdateActiveTelefonoBoton() {
        var datos = $('#formDataTelefonosBoton').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=update_telefono_boton",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntDibujoTablaTelefonos()
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertDireccion() {
        var datos = $('#formDataDireccion_m').serialize();

        var valor = document.getElementById("direccion").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        var valor = document.getElementById("propietario_dir").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }


        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_direccion",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        document.getElementById("formDataDireccion_m").reset();
                        document.getElementById("direccion").focus();
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertCorreo() {
        var datos = $('#formDataCorreo_m').serialize();

        var valor = document.getElementById("correo").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.set('notifier', 'position', 'top-center');
            alertify.warning('Favor ingrese la informacion requerida !');
            return false;
        }

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_correo",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        document.getElementById("formDataCorreo_m").reset();
                        document.getElementById("correo").focus();
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };


    function fntUpdateActiveInfoDireccion() {
        var datos = $('#formDataDireccionMInfo').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=update_direccion_mas_informacion",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntDibujoInfoDirecciones()
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntUpdateActiveExpedien() {
        var datos = $('#formExpediente').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=update_expediente",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntUpdateActiveInfoCorreos() {
        var datos = $('#formDataCorreosMInfo').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=update_correo_informacion",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntDibujoInfoCorreo()
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };




    ////////////////////////////// PROCESOS DE TABLAS/////////////////////////////////////////////////////

    function fntDibujoTablaGestionMovimiento() {
        var strnumCasoPdf = $("#numCasoPdf").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_movimiento_gestion",
            data: {
                numCasoPdf: strnumCasoPdf,

            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#TablaMovimientoGestion").html("");
                $("#TablaMovimientoGestion").html(data);

                return false;
            }
        });

    };


    function fntDibujoTiemposEmpresa() {

        var strNumempre = $("#numempre").val();

        $.ajax({

            url: "tarjetas.php?validaciones=var_tiempos_empresa",
            data: {
                numempre: strNumempre,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tiemposEmpresa").html("");
                $("#tiemposEmpresa").html(data);

                move()

                return false;
            }
        });

    };

    function fntDibujoTablaTelefonos() {

        var strCodiclie = $("#codiclie").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_telefonos",
            data: {
                codiclie: strCodiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tablaTelefonos").html("");
                $("#tablaTelefonos").html(data);

                return false;
            }
        });

    };

    function fntDibujoTablaCuentas() {

        var strIDENTIFI = $("#IDENTIFI").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_cuentas",
            data: {
                IDENTIFI: strIDENTIFI,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tablaCuentas").html("");
                $("#tablaCuentas").html(data);

                return false;
            }
        });

    };

    function fntVarCodigoServicio() {

        var strNumeroDig = $("#numeroDig").val();

        $.ajax({

            url: "tarjetas.php?validaciones=var_codigo_servicio",
            data: {
                numeroDig: strNumeroDig,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tablaNumProd").html("");
                $("#tablaNumProd").html(data);

                return false;
            }
        });

    };

    ///////////////////////////TABLAS MODALES DE TIPOLOGIA///////////////////////////////////////////////////////

    function fntDibujoOrigen() {

        var strBuscarOrigen = $("#buscarOrigen").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_tipologia_origen",
            data: {
                buscarOrigen: strBuscarOrigen,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tipologia_origen").html("");
                $("#tabla_tipologia_origen").html(data);

            }
        });

        return false;
    };

    function fntDibujoPlace() {

        var strBuscarPlace = $("#buscarPlace").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_tipologia_place",
            data: {
                buscarPlace: strBuscarPlace,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tipologia_place").html("");
                $("#tabla_tipologia_place").html(data);

                return false;
            }
        });

    };

    function fntDibujoReceptor() {

        var strBuscarReceptor = $("#buscarReceptor").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_tipologia_receptor",
            data: {
                buscarReceptor: strBuscarReceptor,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tipologia_receptor").html("");
                $("#tabla_tipologia_receptor").html(data);

                return false;
            }
        });

    };

    function fntDibujoTipologia() {
        document.getElementById("loading-screen").style.display = "block";
        var strBuscarTipologia = $("#buscarTipologia").val();
        var strntxe = $("#hid_ntxe").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_tipologia_",
            data: {
                buscarTipologia: strBuscarTipologia,
                ntxe: strntxe,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tipologia").html("");
                $("#tabla_tipologia").html(data);
                document.getElementById("loading-screen").style.display = "none";

                return false;
            }
        });

    };

    function fntDibujoRdm() {
        document.getElementById("loading-screen").style.display = "block";
        var strBuscarRdm = $("#buscarRdm").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_tipologia_rdm_",
            data: {
                buscarRdm: strBuscarRdm,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tipologia_rdm").html("");
                $("#tabla_tipologia_rdm").html(data);
                document.getElementById("loading-screen").style.display = "none";

                return false;
            }
        });

    };


    /////////////////////////////////////////////VALIDACIONES////////////////////////////////////////////////////////

    function fntValidacionInsertTelefono() {

        var objNumero = document.getElementById("numero");
        var numero = objNumero.value * 1;

        var objCodiclie_tel = document.getElementById("codiclie_tel");
        var codiclie_tel = objCodiclie_tel.value;

        if (numero) {

            $.ajax({

                url: "tarjetas.php?validaciones=validacion_insert_telefono&numero=" + numero + "&codiclie_tel=" + codiclie_tel,
                async: true,
                global: false,
                dataType: 'json',

                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            document.getElementById('numero').value = ''
                            alertify.alert('Atencion!', 'Numero de telefono ya existe!');
                        }
                    }
                }
            });

        }
        return false;
    }


    //////////////////////////////////////////////////////////////// SUB MENU INVESTIGA//////////////////////////////////////////////////////////////////////////////////////////////


    function fntUpdateActiveDireccion() {
        var datos = $('#formDataDireccionInvestiga').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=update_direccion_investiga",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        fntDibujoInvestigaDireccion()
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Datos guardados correctamente!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntDibujoInvestigaCasos() {
        document.getElementById("loading-screen").style.display = "block";

        var strBuscarInvestiga = $("#buscarInvestigaCasos").val();

        $.ajax({

            url: "m90.php?validaciones=tabla_sub_menu_investiga_casos",
            data: {
                buscarInvestigaCasos: strBuscarInvestiga,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_investiga_casos").html("");
                $("#tabla_investiga_casos").html(data);
                document.getElementById("loading-screen").style.display = "none";

                return false;
            }
        });

    };

    function fntDibujoInvestigaFormulario() {

        var strInvestigaFormulario = $("#InvestigaFormulario").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_investiga_formulario",
            data: {
                InvestigaFormulario: strInvestigaFormulario,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tabla_investiga_formulario").html("");
                $("#tabla_investiga_formulario").html(data);

                return false;
            }



        });

    };

    function fntDibujoInvestigaTelefono() {

        var stRinvestiga_codiclie = $("#investiga_codiclie").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_investiga_telefonos",
            data: {
                investiga_codiclie: stRinvestiga_codiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tabla_investiga_telefonos").html("");
                $("#tabla_investiga_telefonos").html(data);

                return false;
            }



        });

    };

    function fntDibujoInvestigaDireccion() {

        var stRinvestiga_codiclie = $("#investiga_codiclie").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_investiga_direcciones",
            data: {
                investiga_codiclie: stRinvestiga_codiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tabla_investiga_direcciones").html("");
                $("#tabla_investiga_direcciones").html(data);

                return false;
            }



        });

    };

    function fntDibujoInvestigaCorreo() {

        var stRinvestiga_codiclie = $("#investiga_codiclie").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_investiga_correos",
            data: {
                investiga_codiclie: stRinvestiga_codiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tabla_investiga_correo").html("");
                $("#tabla_investiga_correo").html(data);

                return false;
            }



        });

    };

    //////////////////////////////////////////////////////////////// SUB MENU MAS INFORMACION////////////////////////////////////////////////////////////////////////////////////////

    function fntDibujoInfoDirecciones() {

        var stRmInfoCodiclie = $("#mInfoCodiclie").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_informacion_direcciones",
            data: {
                mInfoCodiclie: stRmInfoCodiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tablaDireccionesMInfo").html("");
                $("#tablaDireccionesMInfo").html(data);

                return false;
            }


        });

    };

    function fntDibujoInfoCorreo() {

        var stRCorreoInfoCodiclie = $("#CorreoInfoCodiclie").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_sub_menu_informacion_correos",
            data: {
                CorreoInfoCodiclie: stRCorreoInfoCodiclie,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tablaCorreosMInfo").html("");
                $("#tablaCorreosMInfo").html(data);

                return false;
            }


        });

    };
    //////////////////////////////////////////////////////////////// SUB MENU ESTADO DE CUENTA///////////////////////////////////////////////////////////////////////////////////////
    function fntDibujoEstadoDeCuenta() {
        var stRnumCasoPdf = $("#numCasoPdf").val();

        $.ajax({

            url: "tarjetas.php?validaciones=tabla_estado_de_cuenta",
            data: {
                numCasoPdf: stRnumCasoPdf,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tablaEstadoDeCuenta").html("");
                $("#tablaEstadoDeCuenta").html(data);

                return false;
            }


        });

    };
    //////////////////////////////////////////////////////////////// SUB MENU DOCUMENTOS DIGITALIZADOS///////////////////////////////////////////////////////////////////////////////
    function fntDibujoDocumentosDigitales() {

        var stRcodiclie_archivo = $("#codiclie_archivo").val();


        $.ajax({

            url: "tarjetas.php?validaciones=tabla_documentos_digitales",
            data: {
                codiclie_archivo: stRcodiclie_archivo,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tablaDocumentosDigitales").html("");
                $("#tablaDocumentosDigitales").html(data);

                return false;
            }


        });

    };

    function close_windowUrl() {

        var x = $("#numCasoPdf").val();
        //alert(x + "                         x");

        var j = '';
        if (x == j) {
            location.href = "http://www.google.com";
        }
    }

    function fntRetornoGene() {
        myTimeEnd()
        var datos = $('#formTipologiaGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_end_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        window.location.href = "index.php";
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntRetornoGeneH() {
        myTimeEnd()
        var datos = $('#formTipologiaGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "tarjetas.php?ajax=true&validaciones=insert_end_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        window.location.href = "../../home.php";
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function myTimeEndGenI() {

        fntRetornoGene()
    }

    function myTimeEndGenIH() {

        fntRetornoGeneH()
    }

    window.addEventListener('load', fntInsertIniWindow, false)
    window.addEventListener('load', close_windowUrl, false)


    window.addEventListener('load', fntDibujoTablaGestionMovimiento, false)

    window.addEventListener('load', fntDibujoOrigen, false)
    window.addEventListener('load', fntDibujoPlace, false)
    window.addEventListener('load', fntDibujoReceptor, false)

    window.addEventListener('load', fntDibujoTiemposEmpresa, false)




    //testear variables
    //alert(strNumempre + "                                  strNumempre");

    //limpiar formulario
    //                            $('#formData')[0].reset();
</script>