<script>
    function fntUpdate() {
        var datos = $('#formGeneral').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "iniDia.php?ajax=true&validaciones=update",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        alertify.alert('AVISO', 'Fecha de dia actualizada!');
                        
                        setTimeout(location.reload(), 1800);

                    }
                } else if (r.status == 0) {
                    alertify.alert('AVISO', 'ingrese fecha!');
                }
            }
        });

        return false;
    };
 
    window.addEventListener('load', fntDibujoMovimiento, false)

</script>