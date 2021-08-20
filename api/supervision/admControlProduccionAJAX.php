<script>
    function fntDibujoEstadoDeCuenta() {

        document.getElementById("loading-screen").style.display = "block";

        var stRbuscarFechaDe = $("#buscarFechaDe").val();
        var stRbuscarFechaHasta = $("#buscarFechaHasta").val();
        var stRbuscarEmpresa = $("#buscarEmpresa").val();
        var stRbuscarMeta = $("#buscarMeta").val();
        var stRbuscarDatosProyecUno = $("#buscarDatosProyecUno").val();
        var stRbuscarDatosProyecDos = $("#buscarDatosProyecDos").val();
        var stRbuscarTasaCambio = $("#buscarTasaCambio").val();
        var stRbuscarFechaAnterior = $("#buscarFechaAnterior").val();
        var stRbuscarFechaGeneracion = $("#buscarFechaGeneracion").val();

        $.ajax({

            url: "controlProduccion.php?validaciones=tabla_gestion_creditos",
            data: {
                buscarFechaDe: stRbuscarFechaDe,
                buscarFechaHasta: stRbuscarFechaHasta,
                buscarEmpresa: stRbuscarEmpresa,
                buscarMeta: stRbuscarMeta,
                buscarDatosProyecUno: stRbuscarDatosProyecUno,
                buscarDatosProyecDos: stRbuscarDatosProyecDos,
                buscarTasaCambio: stRbuscarTasaCambio,
                buscarFechaAnterior: stRbuscarFechaAnterior,
                buscarFechaGeneracion: stRbuscarFechaGeneracion,
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

    url: "controlProduccion.php?validaciones=dropdown_empresa",
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