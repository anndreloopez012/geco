<script>
    function fntInsert() {

        document.getElementById("loading-screen").style.display = "block";

        var Form = new FormData($('#filesForm')[0]);

        $.ajax({

            url: "updateSaldoRevicion.php?validaciones=insert",
            type: "post",
            data: Form,
            processData: false,
            contentType: false,
            success: function(data) {
                document.getElementById("loading-screen").style.display = "none";
                alertify.alert('AVISO', 'Reporte cargado correctamente');
                fntReporte()
                //  fntDibujoTabla()
            }
        });

        return false;
    }

    function fntReporte() {

        document.getElementById("loading-screen").style.display = "block";

        $.ajax({

            url: "updateSaldoRevicion.php?validaciones=tabla_reporte",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dibujo_tabla_").html("");
                $("#dibujo_tabla_").html(data);

                document.getElementById("loading-screen").style.display = "none";

                // $('#tablaEstadoDeCuenta').text(JSON.stringify(result, null, 2));

                return false;
            }


        });

    };

    function fntDibujoDropdowEmpresa() {

        $.ajax({

            url: "updateSaldoRevicion.php?validaciones=dropdown_empresa",
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