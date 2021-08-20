<script>
    function fntDibujoEstadoDeCuenta() {

        document.getElementById("loading-screen").style.display = "block";

        var stRvalTabla = $("#valTabla").val();

        var stRbuscarOrigen = $("#buscarOrigen").val();
        var stRbuscarReceptor = $("#buscarReceptor").val();
        var stRbuscarTipologia = $("#buscarTipologia").val();
        var stRbuscarCategoria = $("#buscarCategoria").val();
        var stRbuscarEstado = $("#buscarEstado").val();

        var stRbuscarBaseC = $("#buscarBaseC").val();
        var stRbuscarBaseG = $("#buscarBaseG").val();
        var stRbuscarTipoFecha = $("#buscarTipoFecha").val();

        var stRbuscarFechaDe = $("#buscarFechaDe").val();
        var stRbuscarFechaHasta = $("#buscarFechaHasta").val();

        var stRbuscarHoraDe = $("#buscarHoraDe").val();
        var stRbuscarHoraHasta = $("#buscarHoraHasta").val();

        var stRbuscarMora = $("#buscarMora").val();
        var stRbuscarEmpresa = $("#buscarEmpresa").val();
        var stRbuscarSaldoVencido = $("#buscarSaldoVencido").val();
        var stRbuscarSaldoDe = $("#buscarSaldoDe").val();
        var stRbuscarSaldoHasta = $("#buscarSaldoHasta").val();
        var stRbuscarCliente = $("#buscarCliente").val();
        var stRbuscarNombre = $("#buscarNombre").val();

        var stRsupervisor = $("#supervisor").val();
        var stRbuscarResumen = $("#buscarResumen").val();

        $.ajax({

            url: "exportacionXls.php?validaciones=tabla_gestion_creditos",
            data: {
                valTabla: stRvalTabla,

                buscarOrigen: stRbuscarOrigen,
                buscarReceptor: stRbuscarReceptor,
                buscarTipologia: stRbuscarTipologia,
                buscarCategoria: stRbuscarCategoria,
                buscarEstado: stRbuscarEstado,

                buscarBaseC: stRbuscarBaseC,
                buscarBaseG: stRbuscarBaseG,
                buscarTipoFecha: stRbuscarTipoFecha,

                buscarFechaDe: stRbuscarFechaDe,
                buscarFechaHasta: stRbuscarFechaHasta,

                buscarHoraDe: stRbuscarHoraDe,
                buscarHoraHasta: stRbuscarHoraHasta,

                buscarMora: stRbuscarMora,
                buscarEmpresa: stRbuscarEmpresa,
                buscarSaldoVencido: stRbuscarSaldoVencido,
                buscarSaldoDe: stRbuscarSaldoDe,
                buscarSaldoHasta: stRbuscarSaldoHasta,
                buscarCliente: stRbuscarCliente,
                buscarNombre: stRbuscarNombre,
                supervisor: stRsupervisor,
                buscarResumen: stRbuscarResumen,
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

    function fntDibujoDropdowEmpresa() {

        $.ajax({

            url: "exportacionXls.php?validaciones=dropdown_empresa",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_empresa").html("");
                $("#dropdown_empresa").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowOrigen() {

        $.ajax({

            url: "exportacionXls.php?validaciones=dropdown_origen",
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

            url: "exportacionXls.php?validaciones=dropdown_receptor",
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

            url: "exportacionXls.php?validaciones=dropdown_tipologia",
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

            url: "exportacionXls.php?validaciones=dropdown_categoria",
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

            url: "exportacionXls.php?validaciones=dropdown_estado",
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

    function fntDibujoDropdowSupervisor() {

        $.ajax({

            url: "exportacionXls.php?validaciones=dropdown_supervisor",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_supervisor").html("");
                $("#dropdown_supervisor").html(data);

                return false;
            }


        });

    };

    window.addEventListener('load', fntDibujoDropdowEmpresa, false)
    window.addEventListener('load', fntDibujoDropdowOrigen, false)
    window.addEventListener('load', fntDibujoDropdowReceptor, false)
    window.addEventListener('load', fntDibujoDropdowTipologia, false)
    window.addEventListener('load', fntDibujoDropdowCategoria, false)
    window.addEventListener('load', fntDibujoDropdowEstado, false)
    window.addEventListener('load', fntDibujoDropdowSupervisor, false)
</script>