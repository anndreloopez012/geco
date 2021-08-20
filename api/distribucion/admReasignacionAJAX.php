<script>

    function fntInsert() {

        var datos = $('#formGeneral').serialize();
        document.getElementById("loading-screen").style.display = "block";

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "reasignacion.php?ajax=true&validaciones=insert_gestion_",
            success: function(r) {
                if (r.status) {
                    if (r.status == 2) {
                        //fntDibujoTablaGestionMovimiento()
                        //document.getElementById("formTipologiaGeneral").reset();
                        document.getElementById("loading-screen").style.display = "none";
                        alertify.alert('ATENCION!', 'Gestión guardada correctamente!');

                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

    function fntDibujoTabla() {

        document.getElementById("loading-screen").style.display = "block";
        var strFilterUSUARIO = $("#USUARIO").val();
        var strFilterGESTORD = $("#GESTORD").val();
        var strFilterNUMEMPRE = $("#NUMEMPRE").val();
        var strFilterNUMENV = $("#NUMENV").val();
        var strFilterCLAPROD = $("#CLAPROD").val();
        var strFilterNOMBRE = $("#NOMBRE").val();
        var strFilterNUMTRANSDEL = $("#NUMTRANSDEL").val();
        var strFilterNUMTRANSAL = $("#NUMTRANSAL").val();


        $.ajax({

            url: "reasignacion.php?validaciones=tabla_gestion",
            data: {
                USUARIO: strFilterUSUARIO,
                GESTORD: strFilterGESTORD,
                buscarNUMEMPRE: strFilterNUMEMPRE,
                buscarNUMENV: strFilterNUMENV,
                buscarCLAPROD: strFilterCLAPROD,
                buscarNOMBRE: strFilterNOMBRE,
                buscarNUMTRANSDEL: strFilterNUMTRANSDEL,
                buscarNUMTRANSAL: strFilterNUMTRANSAL,
            },
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

    function fntDibujoDropdowUsuarios() {

        $.ajax({

            url: "reasignacion.php?validaciones=dropdown_usuarios",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_usuarios").html("");
                $("#dropdown_usuarios").html(data);

                return false;
            }


        });

    };

    window.addEventListener('load', fntDibujoDropdowUsuarios, false)
</script>