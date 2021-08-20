<script>
    //update delete e insert

    function fntInsert() {
        valor = document.getElementById("NOMBRE").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:Nombre Completo');
            return false;
        }

        valor = document.getElementById("USUARIO").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:USUARIO');
            return false;
        }

        valor = document.getElementById("CLAVE").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:Clave');
            return false;
        }

        valor = document.getElementById("USUAMAIL").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:Correo');
            return false;
        }

        valor = document.getElementById("PUESTO").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:PUESTO');
            return false;
        }

        valor = document.getElementById("SUPERVISOR").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:Supervisor del area');
            return false;
        }

        valor = document.getElementById("EXTENCION").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:EXTENCION');
            return false;
        }

        valor = document.getElementById("ID_OML").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Por favor complete el siguiente campo:ID OMNILEADS');
            return false;
        }

        alertify.confirm('AVISO', 'Seguro que desea continuar?  ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;
            document.getElementById("loading-screen").style.display = "block";

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "gestionUsuarios.php?ajax=true&validaciones=insert",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            $('#formData')[0].reset();
                            fntDibujoTablaUsr()
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            document.getElementById("loading-screen").style.display = "none";

                            document.getElementById('newUsr').style.display = 'none';
                            document.getElementById('User').style.display = 'block';
                            //location.reload(); 
                        }
                    } else {
                        alertify.alert('AVISO', 'no se pudo completar!');
                        //location.reload(); 
                    }
                }
            });
        }, function() {
            alertify.error('Cancel')
        })
        return false;
    };

    function fntUpdate() {
        valor = document.getElementById("id_usr").value;
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
            alertify.alert('AVISO', 'Seleccione un usuario');
            return false;
        }

        alertify.confirm('AVISO', 'Seguro que desea continuar? ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;
            document.getElementById("loading-screen").style.display = "block";

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "gestionUsuarios.php?ajax=true&validaciones=update",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            fntDibujoTablaUsr()
                            document.getElementById("loading-screen").style.display = "none";

                            document.getElementById('newUsr').style.display = 'none';
                            document.getElementById('User').style.display = 'block';
                            //location.reload(); 
                        }
                    } else {
                        alertify.alert('AVISO', 'no se pudo completar!');
                        //location.reload(); 
                    }
                }
            });
        }, function() {
            alertify.error('Cancel')
        })
        return false;
    };

    function fntDelete() {

        alertify.confirm('AVISO', 'Seguro que desea continuar?  ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;
            document.getElementById("loading-screen").style.display = "block";

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "gestionUsuarios.php?ajax=true&validaciones=delete",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            $('#Tabla').load('gestionUsuarios.php?validaciones=busqueda_usr');
                            $('#formData')[0].reset();
                            document.getElementById("loading-screen").style.display = "none";
                            //location.reload(); 
                        }
                    } else {
                        alertify.alert('AVISO', 'no se pudo completar!');
                        //location.reload(); 
                    }
                }
            });
        }, function() {
            alertify.error('Cancel')
        })
        return false;
    };

    function fntSelectDelete(intParametro) {

        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strId = $("#hidNIU_" + intParametro).val();
            var strSUPERSN = $("#hidSUPERSN_" + intParametro).val();

            // alert(strDPI + "                         strDPI");
            $("#id_usr").val(strId);
            $("#SUPERVISOR_SLT_").val(strSUPERSN);        
        }
        fntDelete()
    }

    function fntDibujoTablaUsr() {

        var strSearch = $("#Search").val();

        //alert(strCategori + "                                  strCategori");
        document.getElementById("loading-screen").style.display = "block";

        $.ajax({

            url: "gestionUsuarios.php?validaciones=busqueda_usr",
            data: {
                Search: strSearch,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#Tabla").html("");
                $("#Tabla").html(data);
                document.getElementById("loading-screen").style.display = "none";

                return false;
            }
        });

    };

    function fntValMail() {

        var datos = $('#formData').serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            data: datos,
            dataType: 'json',
            url: "gestionUsuarios.php?ajax=true&validaciones=val_mail",
            success: function(r) {
                if (r.status) {
                    if (r.status == 1) {
                        alertify.alert('AVISO', 'Esta email ya existe!');
                        document.getElementById("USUAMAIL").value = "";

                    }
                } else {
                    if (r.status == 0) {
                        alertify.set('notifier', 'position', 'bottom-right');
                        alertify.success('email : Disponible');
                    }
                }
            }
        });

        return false;
    };

    window.addEventListener('load', fntDibujoTablaUsr, false)
</script>