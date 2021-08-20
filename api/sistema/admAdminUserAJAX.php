<script>
    function fntUpdate() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "adminUser.php?ajax=true&validaciones=update",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                         $('#dibujo_tabla').load('adminUser.php?validaciones=tabla_movimientos');

                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Se ah activado la cuenta!');
                    }
                } else {
                    alertify.alert('AVISO', 'no se pudo completar!');
                }
            }
        });

        return false;
    };

   
    function fntDibujoMovimiento() {
        var stRbuscar = $("#buscar").val();

        $.ajax({

            url: "adminUser.php?validaciones=tabla_movimientos",
            data: {
                buscar: stRbuscar,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dibujo_tabla").html("");
                $("#dibujo_tabla").html(data);

                return false;
            }


        });

    };

 
    window.addEventListener('load', fntDibujoMovimiento, false)

</script>