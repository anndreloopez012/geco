<script>
    function fntDibujoEstadoDeCuenta() {

        valorNom = document.getElementById("buscarFechaDe").value;
        if (valorNom == null || valorNom.length == 0 || /^\s+$/.test(valorNom)) {
            alertify.alert('MEDICAMENTOS', 'Por favor ingrese fecha');
            return false;
        }

        valorNom = document.getElementById("buscarFechaHasta").value;
        if (valorNom == null || valorNom.length == 0 || /^\s+$/.test(valorNom)) {
            alertify.alert('MEDICAMENTOS', 'Por favor ingrese fecha');
            return false;
        }

        document.getElementById("loading-screen").style.display = "block";

        var str_buscarFechaDe = $("#buscarFechaDe").val();
        var str_buscarFechaHasta = $("#buscarFechaHasta").val();
        var str_buscarMora = $("#buscarMora").val();
        var str_buscarEmpresa = $("#buscarEmpresa").val();
        var str_buscarSaldoVencido = $("#buscarSaldoVencido").val();
        var str_buscarSaldoDe = $("#buscarSaldoDe").val();
        var str_buscarSaldoHasta = $("#buscarSaldoHasta").val();
        var str_gestor = $("#gestor").val();
        var str_ownerTel = $("#ownerTel").val();
        var str_buscarOrigen = $("#buscarOrigen").val();
        var str_buscarReceptor = $("#buscarReceptor").val();
        var str_buscarTipologia = $("#buscarTipologia").val();
        var str_buscarCategoria = $("#buscarCategoria").val();
        var str_buscarEstado = $("#buscarEstado").val();
        var str_rdm = $("#rdm").val();
    

        $.ajax({

            url: "generacionCampanas.php?validaciones=tabla_gestion",
            data: {
                buscarFechaDe: str_buscarFechaDe,
                buscarFechaHasta: str_buscarFechaHasta,
                buscarMora: str_buscarMora,
                buscarEmpresa: str_buscarEmpresa,
                buscarSaldoVencido: str_buscarSaldoVencido,
                buscarSaldoVencido: str_buscarSaldoDe,
                buscarSaldoHasta: str_buscarSaldoHasta,
                gestor: str_gestor,
                ownerTel: str_ownerTel,
                buscarOrigen: str_buscarOrigen,
                buscarReceptor: str_buscarReceptor,
                buscarTipologia: str_buscarTipologia,
                buscarCategoria: str_buscarCategoria,
                buscarEstado: str_buscarEstado,
                rdm: str_rdm,

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

            url: "generacionCampanas.php?validaciones=dropdown_empresa",
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

    function fntDibujoDropdowOrigen() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_origen",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_origen_dibujo").html("");
                $("#dropdown_origen_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowReceptor() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_receptor",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_receptor_dibujo").html("");
                $("#dropdown_receptor_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowTipologia() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_tipologia",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {


                $("#dropdown_tipologia_dibujo").html("");
                $("#dropdown_tipologia_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowCategoria() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_categoria",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_categoria_dibujo").html("");
                $("#dropdown_categoria_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowEstado() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_estado",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_estado_dibujo").html("");
                $("#dropdown_estado_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowRdm() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_rdm",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_rdm_").html("");
                $("#dropdown_rdm_").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowGestor() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_gestor",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_gestor_dibujo").html("");
                $("#dropdown_gestor_dibujo").html(data);

                return false;
            }


        });

    };

    function fntDibujoDropdowTelefono() {

        $.ajax({

            url: "generacionCampanas.php?validaciones=dropdown_owner_telefono",
            data: {},
            async: true,
            global: false,
            type: "post",
            dataType: "html",
            success: function(data) {

                $("#dropdown_owner_telefono_dibujo").html("");
                $("#dropdown_owner_telefono_dibujo").html(data);

                return false;
            }


        });

    };

    window.addEventListener('load', fntDibujoDropdowEmpresa, false)
    window.addEventListener('load', fntDibujoDropdowGestor, false)
    window.addEventListener('load', fntDibujoDropdowTelefono, false)
    window.addEventListener('load', fntDibujoDropdowOrigen, false)
    window.addEventListener('load', fntDibujoDropdowReceptor, false)
    window.addEventListener('load', fntDibujoDropdowTipologia, false)
    window.addEventListener('load', fntDibujoDropdowCategoria, false)
    window.addEventListener('load', fntDibujoDropdowEstado, false)
    window.addEventListener('load', fntDibujoDropdowRdm, false)
</script>