<script>
    function fntInsert() {


        document.getElementById("loading-screen").style.display = "block";

        var Form = new FormData($('#filesForm')[0]);

        $.ajax({

            url: "importacionInformacion.php?validaciones=insert_data",
            type: "post",
            data: Form,
            processData: false,
            contentType: false,
            success: function(data) {
                document.getElementById("loading-screen").style.display = "none";
                $('#formData')[0].reset();
                //fntDibujoTabla()
                alertify.alert('AVISO', 'Datos cargados correctamente');
                //location.reload(); 

            }
        });

        return false;
    }

    function fntSavePlantilla() {

        alertify.confirm('AVISO', 'Seguro que desea continuar?  ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;
            document.getElementById("loading-screen").style.display = "block";

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "importacionInformacion.php?ajax=true&validaciones=insert_plantilla",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            $('#formData')[0].reset();
                            fntDibujoPlantillas()
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            document.getElementById("loading-screen").style.display = "none";

                            document.getElementById('guardarPlantilla').style.display = 'none';
                            document.getElementById('editPlantilla').style.display = 'none';
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

    function fntEditPlantilla() {

        alertify.confirm('AVISO', 'Seguro que desea continuar? ', function() {
            var datos = $('#formData').serialize();
            //alert(datos);
            //return false;
            document.getElementById("loading-screen").style.display = "block";

            $.ajax({
                type: "POST",
                data: datos,
                dataType: 'json',
                url: "importacionInformacion.php?ajax=true&validaciones=update_plantilla",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            fntDibujoTabla()
                            document.getElementById("loading-screen").style.display = "none";

                            document.getElementById('guardarPlantilla').style.display = 'none';
                            document.getElementById('editPlantilla').style.display = 'none';
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
                url: "importacionInformacion.php?ajax=true&validaciones=delete_plantilla",
                success: function(r) {
                    if (r.status) {
                        if (r.status == 1) {
                            alertify.alert('AVISO', 'Datos cargados correctamente');
                            $('#Tabla').load('importacionInformacion.php?validaciones=busqueda_usr');
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

    function fntDibujoTabla() {

        var strSearch = $("#CodePlantilla").val();

        //alert(strCategori + "                                  strCategori");
        document.getElementById("loading-screen").style.display = "block";

        $.ajax({

            url: "importacionInformacion.php?validaciones=tabla_carga_datos",
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

    function fntDibujoPlantillas() {
        var strSearch = $("#SearchPlantilla").val();

        //alert(strCategori + "                                  strCategori");
        document.getElementById("loading-screen").style.display = "block";

        $.ajax({

            url: "importacionInformacion.php?validaciones=tabla_plantillas",
            data: {
                Search: strSearch,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#TablaPlantillas").html("");
                $("#TablaPlantillas").html(data);
                document.getElementById("loading-screen").style.display = "none";

                return false;
            }
        });

    };

    function fntDibujoDropdowEmpresa() {

        $.ajax({

            url: "importacionInformacion.php?validaciones=dropdown_empresa",
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

    function fntDibujoDropdowCampos() {

        $.ajax({

            url: "importacionInformacion.php?validaciones=dropdown_campos",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_campos").html("");
                $("#dropdown_campos").html(data);

                return false;
            }


        });

    };

    function fntSelectPlant() {
        var strSearch = $("#editPlan").val();

        $.ajax({

            url: "importacionInformacion.php?validaciones=view_edit_plan",
            data: {
                Search: strSearch,
            },
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#view_edit_plan").html("");
                $("#view_edit_plan").html(data);

                updatePlantilla()
                fntViewSelectPlant()

                return false;
            }


        });

    };



    window.addEventListener('load', fntDibujoDropdowEmpresa, false)
    window.addEventListener('load', fntDibujoPlantillas, false)
    window.addEventListener('load', fntDibujoDropdowCampos, false)
</script>