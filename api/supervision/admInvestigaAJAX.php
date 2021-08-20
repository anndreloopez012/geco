<script>

    function fntUpdateActiveDireccion() {
        var datos = $('#formDataDireccionInvestiga').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "investiga.php?ajax=true&validaciones=update_direccion_investiga",
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

            url: "investiga.php?validaciones=tabla_sub_menu_investiga_casos",
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

            url: "investiga.php?validaciones=tabla_sub_menu_investiga_formulario",
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

            url: "investiga.php?validaciones=tabla_sub_menu_investiga_telefonos",
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

            url: "investiga.php?validaciones=tabla_sub_menu_investiga_direcciones",
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

            url: "investiga.php?validaciones=tabla_sub_menu_investiga_correos",
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


    //testear variables
    //alert(strNumempre + "                                  strNumempre");

    //limpiar formulario
    //                            $('#formData')[0].reset();
</script>