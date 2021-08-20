<script>
    function fntDibujoEstadoDeCuenta() {

        document.getElementById("loading-screen").style.display = "block";

        var stRbuscarFechaDe = $("#buscarFechaDe").val();
        var stRbuscarFechaHasta = $("#buscarFechaHasta").val();
        var stRbuscarEmpresa = $("#buscarEmpresa").val();
        var stRbuscarReporto = $("#buscarReporto").val();
        var stRbuscarAsignacion = $("#buscarAsignacion").val();
        var stRbuscarTipoEstado = $("#buscarTipoEstado").val();

        $.ajax({

            url: "pagosxConfirmar.php?validaciones=tabla_gestion_creditos",
            data: {
                buscarFechaDe: stRbuscarFechaDe,
                buscarFechaHasta: stRbuscarFechaHasta,
                buscarEmpresa: stRbuscarEmpresa,
                buscarReporto: stRbuscarReporto,
                buscarAsignacion: stRbuscarAsignacion,
                buscarTipoEstado: stRbuscarTipoEstado,
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

    url: "pagosxConfirmar.php?validaciones=dropdown_empresa",
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

    window.addEventListener('load', fntDibujoDropdowEmpresa, false)
</script>