<script>
    function fntInsert() {

        document.getElementById("loading-screen").style.display = "block";

        var Form = new FormData($('#filesForm')[0]);

        $.ajax({

            url: "importacionTelefonos.php?validaciones=insert",
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

            url: "importacionTelefonos.php?validaciones=tabla_gestion",
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
</script>