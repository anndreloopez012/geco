<script>
    function fntDibujoEstadoDeCuenta() {

        document.getElementById("loading-screen").style.display = "block";

        var stRbuscarOrigen = $("#buscarOrigen").val();
        var stRbuscarReceptor = $("#buscarReceptor").val();
        var stRbuscarTipologia = $("#buscarTipologia").val();
        var stRbuscarCategoria = $("#buscarCategoria").val();
        var stRbuscarEstado = $("#buscarEstado").val();

        var stRbuscargeneral = $("#buscargeneral").val();
        var stRbuscarTelefono = $("#buscarTelefono").val();

        $.ajax({

            url: "revision.php?validaciones=tabla_gestion_creditos",
            data: {
                buscarOrigen: stRbuscarOrigen,
                buscarReceptor: stRbuscarReceptor,
                buscarTipologia: stRbuscarTipologia,
                buscarCategoria: stRbuscarCategoria,
                buscarEstado: stRbuscarEstado,

                buscargeneral: stRbuscargeneral,
                buscarTelefono: stRbuscarTelefono,
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

            url: "revision.php?validaciones=tabla_movimientos",
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

                return false;
            }


        });

    };

    function fntDibujoDropdowOrigen() {

        $.ajax({

            url: "revision.php?validaciones=dropdown_origen",
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

            url: "revision.php?validaciones=dropdown_receptor",
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

            url: "revision.php?validaciones=dropdown_tipologia",
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

            url: "revision.php?validaciones=dropdown_categoria",
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

            url: "revision.php?validaciones=dropdown_estado",
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

    function configureLoadingScreen(screen) {
        $(document)
            .ajaxStart(function() {
                screen.fadeIn();
            })
            .ajaxStop(function() {
                screen.fadeOut();
            });
    }

    window.addEventListener('load', fntDibujoDropdowOrigen, false)
    window.addEventListener('load', fntDibujoDropdowReceptor, false)
    window.addEventListener('load', fntDibujoDropdowTipologia, false)
    window.addEventListener('load', fntDibujoDropdowCategoria, false)
    window.addEventListener('load', fntDibujoDropdowEstado, false)
</script>