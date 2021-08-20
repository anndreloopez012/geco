<script>
    function fntInsertIniWindow() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_ini_window",
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

    function fntRestartTable() {
        $('#dibujo_tabla_movimientos').load('gestionCobros.php?validaciones=tabla_movimientos');
        $('#tablaEstadoDeCuenta').load('gestionCobros.php?validaciones=tabla_gestion_creditos');

        return false;
    };

    function fntInsertPostAlarma() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_prorroga",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        $("#prorroga").modal("hide")
                        $('#dibujo_tabla_movimientos').load('gestionCobros.php?validaciones=tabla_movimientos');
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Alarma Pospuesta!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertEndWindow() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_end_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        // alertify.set('notifier', 'position', 'top-center');
                        // alertify.success('Inicio!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntInsertEndWindowClose() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_end_window",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
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
        var datos = $('#formGeneral').serialize();
        $("#tareas").modal("hide")
        $('#ModalUsuario').modal({
            backdrop: 'static',
            keyboard: false
        })
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_ini_window_trabajo",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {

                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntAutorizaUser() {
        var datos = $('#formGeneral').serialize();
        $("#ModalUsuario").modal("hide")

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=consulta_usuario_trabajo",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        myTimeEnd()
                        location.reload();
                    }
                } else {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.alert('AVISO', 'clave invalida !');
                }
            }
        });

        return false;
    };

    function fntAutorizaSupervisor() {
        var datos = $('#formGeneral').serialize();
        $("#ModalSupervisor").modal("hide")
        $("#ModalUsuario").modal()

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=consulta_supervisor_trabajo",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        myTimeEnd()
                        myTimeTrabajo()

                    }
                } else {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.alert('AVISO', 'clave invalida !');
                }
            }
        });

        return false;
    };

    function fntModalSupervision() {
        $("#ModalSupervisor").modal()
    };

    function fntValidarSupervisor(intParametro) {

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

        var datos = $('#formGeneral').serialize();

        fntModalSupervision()
        $("#tareas").modal("hide")

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=validar_supervisor_existe",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                    }
                } else {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.alert('No tiene supervisor asignado!');
                }
            }
        });

        return false;
    };



    function fntRetornoGene() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_end_window",
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
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionCobros.php?ajax=true&validaciones=insert_end_window",
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



    function fntDibujoEstadoDeCuenta() {

        document.getElementById("loading-screen").style.display = "block";

        var stRbuscarOrigen = $("#buscarOrigen").val();

        var stRbuscarReceptor = $("#buscarReceptor").val();
        var stRbuscarTipologia = $("#buscarTipologia").val();
        var stRbuscarCategoria = $("#buscarCategoria").val();
        var stRbuscarEstado = $("#buscarEstado").val();

        var stRbuscarNOMBRE = $("#buscarNOMBRE").val();
        var stRbuscarCODICLIE = $("#buscarCODICLIE").val();
        var stRbuscarCLAPROD = $("#buscarCLAPROD").val();

        var stRbuscarTelefono = $("#buscarTelefono").val();

        var stRbuscarIdentificacion = $("#buscarIdentificacion").val();

        var stRrt = $("#rtBoton").val();

        $.ajax({

            url: "gestionCobros.php?validaciones=tabla_gestion_creditos",
            data: {
                buscarOrigen: stRbuscarOrigen,
                buscarReceptor: stRbuscarReceptor,
                buscarTipologia: stRbuscarTipologia,
                buscarCategoria: stRbuscarCategoria,
                buscarEstado: stRbuscarEstado,

                buscarNOMBRE: stRbuscarNOMBRE,
                buscarCODICLIE: stRbuscarCODICLIE,
                buscarCLAPROD: stRbuscarCLAPROD,
                buscarTelefono: stRbuscarTelefono,
                buscarIdentificacion: stRbuscarIdentificacion,
                rt: stRrt,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#tablaEstadoDeCuenta").html("");
                $("#tablaEstadoDeCuenta").html(data);

                document.getElementById("loading-screen").style.display = "none";

                // $('#tablaEstadoDeCuenta').text(JSON.stringify(result, null, 2));

                return false;
            }


        });

    };

    function fntDibujoMovimiento() {
        var stRnumero_caso = $("#numero_caso").val();


        $.ajax({

            url: "gestionCobros.php?validaciones=tabla_movimientos",
            data: {
                numero_caso: stRnumero_caso,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dibujo_tabla_movimientos").html("");
                $("#dibujo_tabla_movimientos").html(data);
                console.log(1)
                fntRunAlarm()

                return false;
            }


        });

    };

    function fntDibujoDropdowOrigen() {

        $.ajax({

            url: "gestionCobros.php?validaciones=dropdown_origen",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_origen_dibujo").html("");
                $("#dropdown_origen_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowReceptor() {

        $.ajax({

            url: "gestionCobros.php?validaciones=dropdown_receptor",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_receptor_dibujo").html("");
                $("#dropdown_receptor_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowTipologia() {

        $.ajax({

            url: "gestionCobros.php?validaciones=dropdown_tipologia",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_tipologia_dibujo").html("");
                $("#dropdown_tipologia_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowCategoria() {

        $.ajax({

            url: "gestionCobros.php?validaciones=dropdown_categoria",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_categoria_dibujo").html("");
                $("#dropdown_categoria_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowEstado() {

        $.ajax({

            url: "gestionCobros.php?validaciones=dropdown_estado",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_estado_dibujo").html("");
                $("#dropdown_estado_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoTrabajo() {
        var stRbuscarFecha = $("#buscarFecha").val();


        $.ajax({

            url: "gestionCobros.php?validaciones=tabla_cola_trabajo_",
            data: {
                buscarFecha: stRbuscarFecha,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_cola_rabajo").html("");
                $("#tabla_cola_rabajo").html(data);

                return false;
            }


        });

    };

    function fntDibujoTareas() {

        $.ajax({

            url: "gestionCobros.php?validaciones=tabla_cola_tareas_",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#tabla_tareas").html("");
                $("#tabla_tareas").html(data);

                return false;
            }


        });

    };

    function configureLoadingScreen(screen) {
        $(document)
            .ajaxStart(function() {
                screen.fadeIn();
            })
            .ajaxStop(function() {
                screen.fadeOut();
            });
    }

    function close_window() {
        window.close();
    }

    ///////////////////////////////////////////VALIDACIONES DE ALERTAS EMERGENTES //////////////////////////////////////////////////////////////
    var intDialogControl = 0;

    function fntAlertaControl(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;
        var sinHora = 0;
        var srtNombrePaciente = '';
        if (intParametro > 0) {
            sinHora = parseInt($("#horapago_" + intParametro).val().replace(':', ''), 10);
            srtNombrePaciente = $("#nombre_" + intParametro).val();
        }

        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var timeNow = parseInt(hora.toString() + minuto.toString(), 10)


        if (sinHora <= timeNow) {
            intDialogControl = intParametro;
            alertify.confirm('Atencion!', 'Favor atender el caso del señor@! ' + srtNombrePaciente, function() {
                $('#alink_' + intDialogControl)[0].click()
                alertify.success('Gestion')
            }, function() {
                $('#prorroga').modal()
                alertify.error('Prorroga')
            });
        }

    }

    var myVar;

    function fntSetAlarms() {
        myVar = setInterval(fntRunAlarm, 120000);
        //myVar = setInterval(fntRunAlarm, 1000);
    }

    function fntRunAlarm() {
        $('input[id*=horapago_]').each(function() {
            var arrExplode = $(this).attr('id').split('_');
            fntAlertaControl(arrExplode[1]);
            fntSelectIdAlarma(arrExplode[1]);
        })

    }
    ///////////////////////////////////////////// GESTION DE TIEMPOS ///////////////////////////////////////////////


    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function myTime() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaInicial").val(hora + ":" + minuto + ":" + segundo);
    }

    function myTimeTrabajo() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaInicial").val(hora + ":" + minuto + ":" + segundo);
        fntInsertIniWindowTrabajo()
    }

    function myTimeTrabajoUsuario() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaInicial").val(hora + ":" + minuto + ":" + segundo);
        fntInsertIniWindow()
    }

    function myTimeEnd() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaFinal").val(hora + ":" + minuto + ":" + segundo);

        fntInsertEndWindowClose()

    }

    function myTimeEndGenI() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaFinal").val(hora + ":" + minuto + ":" + segundo);

        fntRetornoGene()
    }

    function myTimeEndGenIH() {
        var d = new Date();
        var hora = addZero(d.getHours());
        var minuto = addZero(d.getMinutes());
        var segundo = addZero(d.getSeconds());
        $("#horaFinal").val(hora + ":" + minuto + ":" + segundo);

        fntRetornoGeneH()
    }



    window.addEventListener('load', myTime, false)
    window.addEventListener('load', fntInsertIniWindow, false)


    window.addEventListener('load', fntDibujoEstadoDeCuenta, false)
    window.addEventListener('load', fntDibujoMovimiento, false)

    //window.addEventListener('load', fntSetAlarms, false)

    window.addEventListener('load', fntDibujoDropdowOrigen, false)
    window.addEventListener('load', fntDibujoDropdowReceptor, false)
    window.addEventListener('load', fntDibujoDropdowTipologia, false)
    window.addEventListener('load', fntDibujoDropdowCategoria, false)
    window.addEventListener('load', fntDibujoDropdowEstado, false)
</script>