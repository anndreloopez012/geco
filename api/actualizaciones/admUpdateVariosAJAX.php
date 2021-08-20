<script>
    function fntInsert() {

        document.getElementById("loading-screen").style.display = "block";

        var Form = new FormData($('#filesForm')[0]);

        $.ajax({

            url: "updateVarios.php?validaciones=insert",
            type: "post",
            data: Form,
            processData: false,
            contentType: false,
            success: function(data) {
                document.getElementById("loading-screen").style.display = "none";
                alertify.alert('AVISO', 'Datos cargados correctamente');

                $('#formData')[0].reset();
                //  fntDibujoTabla()
            }
        });

        return false;
    }

    function fntDibujoTabla() {

        document.getElementById("loading-screen").style.display = "block";

        $.ajax({

            url: "updateVarios.php?validaciones=tabla_gestion",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dibujo_tabla").html("");
                $("#dibujo_tabla").html(data);

                document.getElementById("loading-screen").style.display = "none";

                // $('#tablaEstadoDeCuenta').text(JSON.stringify(result, null, 2));

                return false;
            }


        });

    };

    function fntDibujoDropdowEmpresa() {

        $.ajax({

            url: "updateVarios.php?validaciones=dropdown_empresa",
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

    function fntDibujoDropdowPlantilla() {

        $.ajax({

            url: "updateVarios.php?validaciones=dropdown_plantillas",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_plantilla").html("");
                $("#dropdown_plantilla").html(data);

                return false;
            }


        });

    };

    window.addEventListener('load', fntDibujoDropdowEmpresa, false)
    window.addEventListener('load', fntDibujoDropdowPlantilla, false)
</script>