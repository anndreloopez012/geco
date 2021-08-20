<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                </br>
            </div>
            <div class="col-2">
            </div>
            <div class="col-8 fondo">
                <div class="col-md-12">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
                            <li class="nav-item">
                                <button type="button" onclick="fntUsuariosMostrarOcultar()" class="btn btn-secondary btn-block">Usuarios</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" onclick="fntNuevoMostrarOcultar()" class="btn btn-secondary btn-block">Agregar Usuario</button>
                            </li>
                            <li class="nav-item">
                                <a href="adminUser.php" class="btn btn-secondary btn-block">Activar Usuarios</a>
                            </li>
                        </ul>
                    </div>
                    <div id="User">
                        <div class="row">
                            <div class=" col-md-1"></div>
                            <div class=" col-md-10">
                                <div class="card-body">
                                    <div class="collapsed-card">
                                        <div class="card-body">
                                            <div class="col-sm-12 row" name="Search_" id="Search_">
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="Search" id="Search" type="text" style="text-transform:uppercase;" placeholder="BUSCAR">
                                                </div>
                                                <div>
                                                    <a type="button" class="btn btn-info" onclick="fntDibujoTablaUsr() "><i class="fad fa-2x fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="div1">
                                                    <div id="Tabla" name="Tabla">
                                                        <!-- DIBUJO DE TABLA -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-2"></div>
                        </div>
                    </div>
                    <form id="formData" value="POST">
                        <div class="col-xl-12 col-md-10 ">
                            <div id="newUsr" style="display: none;">
                                <div class="card-body">
                                    <div class="collapsed-card">
                                        <div class="card-body ">
                                            <div class="row col-12">
                                                <br>
                                                <div class="row col-12"></div>

                                                <div class="form-group col-12 row"><br><br>
                                                    <label>Nombre Completo </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="NOMBRE" name="NOMBRE">
                                                        <input type="hidden" class="form-control" id="NOMBRE_" name="NOMBRE_">
                                                        <input type="hidden" class="form-control" id="id_usr" name="id_usr">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 row">
                                                    <label>Usuario </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="USUARIO" name="USUARIO">
                                                    </div>
                                                </div>

                                                <div class="form-group col-12 row">
                                                    <label>Clave </label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" id="CLAVE" name="CLAVE">
                                                        <input type="hidden" class="form-control" id="PASS_WEB" name="PASS_WEB">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 row">
                                                    <label>Correo Electronico</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="USUAMAIL" name="USUAMAIL" onblur="fntValMail()">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 row">
                                                    <label>Puesto </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="PUESTO" name="PUESTO">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 row">
                                                    <label>Supervisor del Area </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="SUPERVISOR" name="SUPERVISOR" onfocus="fntModalSupervisores()">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <br><label>Supervisor</label>
                                                        <input type="hidden"id="SUPERVISOR_SLT_" name="SUPERVISOR_SLT_">
                                                        <select class="form-control" id="SUPERVISOR_SLT" name="SUPERVISOR_SLT">
                                                            <option value="0">NO</option>
                                                            <option value="1">SI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label>Supervisor General</label>
                                                        <select class="form-control" id="SUPERGRAL" name="SUPERGRAL">
                                                            <option value="0">NO</option>
                                                            <option value="1">SI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-2 row">
                                                    <label>Extencion </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="EXTENCION" name="EXTENCION">
                                                    </div>
                                                </div>
                                                <div class="form-group col-2 row">
                                                    <label>Id Omnileads </label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="ID_OML" name="ID_OML">
                                                    </div>
                                                </div>

                                                <div class="col-12"><br>
                                                    <ul class="nav nav-pills nav-fill btn-info AGREGAR">
                                                        <li class="nav-item">
                                                            <button type="button" onclick="fntModalAccesos()" id="accesos" class="btn btn-info btn-block">Accesos</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 textoCentro"><br>
                                            <ul class="nav nav-pills nav-fill btn-success AGREGAR">
                                                <li class="nav-item" id="btnInsert">
                                                    <button type="button" onclick="fntInsert()" class="btn btn-success btn-block">Guardar</button>
                                                </li>
                                                <li class="nav-item" id="btnUpdate">
                                                    <button type="button" onclick="fntUpdate()" class="btn btn-success btn-block">Actualizar</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title w-100" id="myModalLabel">ACCESOS</h4>
                                <button type="button" class="CERRAR" data-dismiss="modal" aria-label="CERRAR">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="col-md-12 tableFixHead">
                                        <div class="form-group col-md-12">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Acceso</th>
                                                        <th scope="col">Nombre</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                if (is_array($arrTextoAcceso) && (count($arrTextoAcceso) > 0)) {
                                                    reset($arrTextoAcceso);
                                                    foreach ($arrTextoAcceso as $rTMP['key'] => $rTMP['value']) {
                                                ?>
                                                        <tr style="background-color:<?php echo  $rTMP["value"]['COLOR_FONDO']; ?>;">
                                                            <td>
                                                                <select class="form-select" id="<?php echo  $rTMP["value"]['ITEM']; ?>" name="<?php echo  $rTMP["value"]['ITEM']; ?>">
                                                                    <option value="0">no</option>
                                                                    <option value="1">si</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <label><?php echo  $rTMP["value"]['DESCRIP']; ?></label>
                                                            </td>
                                                        </tr>

                                                <?PHP
                                                    }
                                                }
                                                ?>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CERRAR</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="basicSupervisores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title w-100" id="myModalLabel">SUPERVISORES</h4>
                                <button type="button" class="CERRAR" data-dismiss="modal" aria-label="CERRAR">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="col-md-12 tableFixHead">
                                        <div class="form-group col-md-12">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Nombre Del Supervisor</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                if (is_array($arrSupervisor) && (count($arrSupervisor) > 0)) {
                                                    $intContador = 1;
                                                    reset($arrSupervisor);
                                                    foreach ($arrSupervisor as $rTMP['key'] => $rTMP['value']) {
                                                ?>
                                                        <tr>
                                                            <td style="cursor: pointer;" onclick="fntSelectSupervisor('<?php print $intContador; ?>')">
                                                                <b><?php echo  $rTMP["value"]['SUPERVISOR']; ?></b>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="hidSup_<?php print $intContador; ?>" id="hidSup_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['SUPERVISOR']; ?>">

                                                <?PHP
                                                        $intContador++;
                                                    }
                                                }
                                                ?>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CERRAR</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-3">
            </div>

            <div class="col-12">
                </br>
            </div>

        </div>
        </form>
    </div>
</div>


<script>
    function fntSelectEdit(intParametro) {
        document.getElementById('newUsr').style.display = 'block';
        document.getElementById('User').style.display = 'none';
        document.getElementById('btnUpdate').style.display = 'block';
        document.getElementById('btnInsert').style.display = 'none';
        intParametro = !intParametro ? 0 : intParametro;
        if (intParametro > 0) {
            var strNIU = $("#hidNIU_" + intParametro).val();

            var strNombre = $("#hidNombre_" + intParametro).val();
            var strUsuario = $("#hidUsuario_" + intParametro).val();
            var strClave = $("#hidClave_" + intParametro).val();
            var strPuesto = $("#hidPuesto_" + intParametro).val();
            var strUSUAMAIL = $("#hidUSUAMAIL_" + intParametro).val();
            var strSUPERSN = $("#hidSUPERSN_" + intParametro).val();

            var strA1 = $("#hidA1_" + intParametro).val();
            var strA2 = $("#hidA2_" + intParametro).val();
            var strA3 = $("#hidA3_" + intParametro).val();
            var strA4 = $("#hidA4_" + intParametro).val();
            var strA5 = $("#hidA5_" + intParametro).val();
            var strA6 = $("#hidA6_" + intParametro).val();
            var strA7 = $("#hidA7_" + intParametro).val();
            var strA8 = $("#hidA8_" + intParametro).val();
            var strA9 = $("#hidA9_" + intParametro).val();
            var strA10 = $("#hidA10_" + intParametro).val();

            var strA11 = $("#hidA11_" + intParametro).val();
            var strA12 = $("#hidA12_" + intParametro).val();
            var strA13 = $("#hidA13_" + intParametro).val();
            var strA14 = $("#hidA14_" + intParametro).val();
            var strA15 = $("#hidA15_" + intParametro).val();
            var strA16 = $("#hidA16_" + intParametro).val();
            var strA17 = $("#hidA17_" + intParametro).val();
            var strA18 = $("#hidA18_" + intParametro).val();
            var strA19 = $("#hidA19_" + intParametro).val();
            var strA20 = $("#hidA20_" + intParametro).val();

            var strA21 = $("#hidA21_" + intParametro).val();
            var strA22 = $("#hidA22_" + intParametro).val();
            var strA23 = $("#hidA23_" + intParametro).val();
            var strA24 = $("#hidA24_" + intParametro).val();
            var strA25 = $("#hidA25_" + intParametro).val();
            var strA26 = $("#hidA26_" + intParametro).val();
            var strA27 = $("#hidA27_" + intParametro).val();
            var strA28 = $("#hidA28_" + intParametro).val();
            var strA29 = $("#hidA29_" + intParametro).val();
            var strA30 = $("#hidA30_" + intParametro).val();

            var strA31 = $("#hidA31_" + intParametro).val();
            var strA32 = $("#hidA32_" + intParametro).val();
            var strA33 = $("#hidA33_" + intParametro).val();
            var strA34 = $("#hidA34_" + intParametro).val();
            var strA35 = $("#hidA35_" + intParametro).val();
            var strA36 = $("#hidA36_" + intParametro).val();
            var strA37 = $("#hidA37_" + intParametro).val();
            var strA38 = $("#hidA38_" + intParametro).val();
            var strA39 = $("#hidA39_" + intParametro).val();
            var strA40 = $("#hidA40_" + intParametro).val();

            var strA41 = $("#hidA41_" + intParametro).val();
            var strA42 = $("#hidA42_" + intParametro).val();
            var strA43 = $("#hidA43_" + intParametro).val();
            var strA44 = $("#hidA44_" + intParametro).val();
            var strA45 = $("#hidA45_" + intParametro).val();
            var strA46 = $("#hidA46_" + intParametro).val();
            var strA47 = $("#hidA47_" + intParametro).val();
            var strA48 = $("#hidA48_" + intParametro).val();
            var strA49 = $("#hidA49_" + intParametro).val();
            var strA50 = $("#hidA50_" + intParametro).val();

            var strA51 = $("#hidA51_" + intParametro).val();
            var strA52 = $("#hidA52_" + intParametro).val();
            var strA53 = $("#hidA53_" + intParametro).val();
            var strA54 = $("#hidA54_" + intParametro).val();
            var strA55 = $("#hidA55_" + intParametro).val();
            var strA56 = $("#hidA56_" + intParametro).val();
            var strA57 = $("#hidA57_" + intParametro).val();
            var strA58 = $("#hidA58_" + intParametro).val();
            var strA59 = $("#hidA59_" + intParametro).val();
            var strA60 = $("#hidA60_" + intParametro).val();

            var strA61 = $("#hidA61_" + intParametro).val();
            var strA62 = $("#hidA62_" + intParametro).val();
            var strA63 = $("#hidA63_" + intParametro).val();
            var strA64 = $("#hidA64_" + intParametro).val();
            var strA65 = $("#hidA65_" + intParametro).val();
            var strA66 = $("#hidA66_" + intParametro).val();
            var strA67 = $("#hidA67_" + intParametro).val();
            var strA68 = $("#hidA68_" + intParametro).val();
            var strA69 = $("#hidA69_" + intParametro).val();
            var strA70 = $("#hidA70_" + intParametro).val();

            var strA71 = $("#hidA71_" + intParametro).val();
            var strA72 = $("#hidA72_" + intParametro).val();
            var strA73 = $("#hidA73_" + intParametro).val();
            var strA74 = $("#hidA74_" + intParametro).val();
            var strA75 = $("#hidA75_" + intParametro).val();
            var strA76 = $("#hidA76_" + intParametro).val();
            var strA77 = $("#hidA77_" + intParametro).val();
            var strA78 = $("#hidA78_" + intParametro).val();
            var strA79 = $("#hidA79_" + intParametro).val();
            var strA80 = $("#hidA80_" + intParametro).val();

            var strA81 = $("#hidA81_" + intParametro).val();
            var strA82 = $("#hidA82_" + intParametro).val();
            var strA83 = $("#hidA83_" + intParametro).val();
            var strA84 = $("#hidA84_" + intParametro).val();
            var strA85 = $("#hidA85_" + intParametro).val();
            var strA86 = $("#hidA86_" + intParametro).val();
            var strA87 = $("#hidA87_" + intParametro).val();
            var strA88 = $("#hidA88_" + intParametro).val();
            var strA89 = $("#hidA89_" + intParametro).val();
            var strA90 = $("#hidA90_" + intParametro).val();

            var strA91 = $("#hidA91_" + intParametro).val();
            var strA92 = $("#hidA92_" + intParametro).val();
            var strA93 = $("#hidA93_" + intParametro).val();
            var strA94 = $("#hidA94_" + intParametro).val();
            var strA95 = $("#hidA95_" + intParametro).val();
            var strA96 = $("#hidA96_" + intParametro).val();
            var strA97 = $("#hidA97_" + intParametro).val();
            var strA98 = $("#hidA98_" + intParametro).val();
            var strA99 = $("#hidA99_" + intParametro).val();
            var strA100 = $("#hidA100_" + intParametro).val();

            var strSUPERVISOR = $("#hidSUPERVISOR_" + intParametro).val();
            var strSUPERGRAL = $("#hidSUPERGRAL_" + intParametro).val();
            var strEXTENCION = $("#hidEXTENCION_" + intParametro).val();
            var strID_OML = $("#hidID_OML_" + intParametro).val();
            //var strEXPIR = $("#hidEXPIR_" + intParametro).val();//fecha de expiracion 90 dia
            // alert(strA + "                         strA");

            $("#id_usr").val(strNIU);
            $("#NOMBRE").val(strNombre);
            $("#NOMBRE_").val(strNombre);
            $("#USUARIO").val(strUsuario);
            $("#CLAVE").val(strClave);
            $("#PASS_WEB").val(strClave);
            $("#PUESTO").val(strPuesto);
            $("#USUAMAIL").val(strUSUAMAIL);

            var boolCheck = (strSUPERSN == 1) ? true : false;
            $("[name=SUPERVISOR_SLT]").prop('selected', boolCheck);
            $("#SUPERVISOR_SLT").val(strSUPERSN);

            var boolCheckPass1 = (strA1 == 1) ? true : false;
            $("[name=A1]").prop('selected', boolCheckPass1);
            $("#A1").val(strA1);

            var boolCheckPass2 = (strA2 == 1) ? true : false;
            $("[name=A2]").prop('selected', boolCheckPass2);
            $("#A2").val(strA2);

            var boolCheckPass3 = (strA3 == 1) ? true : false;
            $("[name=A3]").prop('selected', boolCheckPass3);
            $("#A3").val(strA3);

            var boolCheckPass4 = (strA4 == 1) ? true : false;
            $("[name=A4]").prop('selected', boolCheckPass4);
            $("#A4").val(strA4);

            var boolCheckPass5 = (strA5 == 1) ? true : false;
            $("[name=A5]").prop('selected', boolCheckPass5);
            $("#A5").val(strA5);

            var boolCheckPass6 = (strA6 == 1) ? true : false;
            $("[name=A6]").prop('selected', boolCheckPass6);
            $("#A6").val(strA6);

            var boolCheckPass7 = (strA7 == 1) ? true : false;
            $("[name=A7]").prop('selected', boolCheckPass7);
            $("#A7").val(strA7);

            var boolCheckPass8 = (strA8 == 1) ? true : false;
            $("[name=A8]").prop('selected', boolCheckPass8);
            $("#A8").val(strA8);

            var boolCheckPass9 = (strA9 == 1) ? true : false;
            $("[name=A9]").prop('selected', boolCheckPass9);
            $("#A9").val(strA9);

            var boolCheckPass10 = (strA10 == 1) ? true : false;
            $("[name=A10]").prop('selected', boolCheckPass10);
            $("#A10").val(strA10);


            var boolCheckPass11 = (strA11 == 1) ? true : false;
            $("[name=A11]").prop('selected', boolCheckPass11);
            $("#A11").val(strA11);

            var boolCheckPass12 = (strA12 == 1) ? true : false;
            $("[name=A12]").prop('selected', boolCheckPass12);
            $("#A12").val(strA12);

            var boolCheckPass13 = (strA13 == 1) ? true : false;
            $("[name=A13]").prop('selected', boolCheckPass13);
            $("#A13").val(strA13);

            var boolCheckPass14 = (strA14 == 1) ? true : false;
            $("[name=A14]").prop('selected', boolCheckPass14);
            $("#A14").val(strA14);

            var boolCheckPass15 = (strA15 == 1) ? true : false;
            $("[name=A15]").prop('selected', boolCheckPass15);
            $("#A15").val(strA15);

            var boolCheckPass16 = (strA16 == 1) ? true : false;
            $("[name=A16]").prop('selected', boolCheckPass16);
            $("#A16").val(strA16);

            var boolCheckPass17 = (strA17 == 1) ? true : false;
            $("[name=A17]").prop('selected', boolCheckPass17);
            $("#A17").val(strA17);

            var boolCheckPass18 = (strA18 == 1) ? true : false;
            $("[name=A18]").prop('selected', boolCheckPass18);
            $("#A18").val(strA18);

            var boolCheckPass19 = (strA19 == 1) ? true : false;
            $("[name=A19]").prop('selected', boolCheckPass19);
            $("#A19").val(strA19);

            var boolCheckPass20 = (strA20 == 1) ? true : false;
            $("[name=A20]").prop('selected', boolCheckPass20);
            $("#A20").val(strA20);


            var boolCheckPass21 = (strA21 == 1) ? true : false;
            $("[name=A21]").prop('selected', boolCheckPass21);
            $("#A21").val(strA21);

            var boolCheckPass22 = (strA22 == 1) ? true : false;
            $("[name=A22]").prop('selected', boolCheckPass22);
            $("#A22").val(strA22);

            var boolCheckPass23 = (strA23 == 1) ? true : false;
            $("[name=A23]").prop('selected', boolCheckPass23);
            $("#A23").val(strA23);

            var boolCheckPass24 = (strA24 == 1) ? true : false;
            $("[name=A24]").prop('selected', boolCheckPass24);
            $("#A24").val(strA24);

            var boolCheckPass25 = (strA25 == 1) ? true : false;
            $("[name=A25]").prop('selected', boolCheckPass25);
            $("#A25").val(strA25);

            var boolCheckPass26 = (strA26 == 1) ? true : false;
            $("[name=A26]").prop('selected', boolCheckPass26);
            $("#A26").val(strA26);

            var boolCheckPass27 = (strA27 == 1) ? true : false;
            $("[name=A27]").prop('selected', boolCheckPass27);
            $("#A27").val(strA27);

            var boolCheckPass28 = (strA28 == 1) ? true : false;
            $("[name=A28]").prop('selected', boolCheckPass28);
            $("#A28").val(strA28);

            var boolCheckPass29 = (strA29 == 1) ? true : false;
            $("[name=A29]").prop('selected', boolCheckPass29);
            $("#A29").val(strA29);

            var boolCheckPass30 = (strA30 == 1) ? true : false;
            $("[name=A30]").prop('selected', boolCheckPass30);
            $("#A30").val(strA30);


            var boolCheckPass31 = (strA31 == 1) ? true : false;
            $("[name=A31]").prop('selected', boolCheckPass31);
            $("#A31").val(strA31);

            var boolCheckPass32 = (strA32 == 1) ? true : false;
            $("[name=A32]").prop('selected', boolCheckPass32);
            $("#A32").val(strA32);

            var boolCheckPass33 = (strA33 == 1) ? true : false;
            $("[name=A33]").prop('selected', boolCheckPass33);
            $("#A33").val(strA33);

            var boolCheckPass34 = (strA34 == 1) ? true : false;
            $("[name=A34]").prop('selected', boolCheckPass34);
            $("#A34").val(strA34);

            var boolCheckPass35 = (strA35 == 1) ? true : false;
            $("[name=A35]").prop('selected', boolCheckPass35);
            $("#A35").val(strA35);

            var boolCheckPass36 = (strA36 == 1) ? true : false;
            $("[name=A36]").prop('selected', boolCheckPass36);
            $("#A36").val(strA36);

            var boolCheckPass37 = (strA37 == 1) ? true : false;
            $("[name=A37]").prop('selected', boolCheckPass37);
            $("#A37").val(strA37);

            var boolCheckPass38 = (strA38 == 1) ? true : false;
            $("[name=A38]").prop('selected', boolCheckPass38);
            $("#A38").val(strA38);

            var boolCheckPass39 = (strA39 == 1) ? true : false;
            $("[name=A39]").prop('selected', boolCheckPass39);
            $("#A39").val(strA39);

            var boolCheckPass40 = (strA40 == 1) ? true : false;
            $("[name=A40]").prop('selected', boolCheckPass40);
            $("#A40").val(strA40);


            var boolCheckPass41 = (strA41 == 1) ? true : false;
            $("[name=A41]").prop('selected', boolCheckPass41);
            $("#A41").val(strA41);

            var boolCheckPass42 = (strA42 == 1) ? true : false;
            $("[name=A42]").prop('selected', boolCheckPass42);
            $("#A42").val(strA42);

            var boolCheckPass43 = (strA43 == 1) ? true : false;
            $("[name=A43]").prop('selected', boolCheckPass43);
            $("#A43").val(strA43);

            var boolCheckPass44 = (strA44 == 1) ? true : false;
            $("[name=A44]").prop('selected', boolCheckPass44);
            $("#A44").val(strA44);

            var boolCheckPass45 = (strA45 == 1) ? true : false;
            $("[name=A45]").prop('selected', boolCheckPass45);
            $("#A45").val(strA45);

            var boolCheckPass46 = (strA46 == 1) ? true : false;
            $("[name=A46]").prop('selected', boolCheckPass46);
            $("#A46").val(strA46);

            var boolCheckPass47 = (strA47 == 1) ? true : false;
            $("[name=A47]").prop('selected', boolCheckPass47);
            $("#A47").val(strA47);

            var boolCheckPass48 = (strA48 == 1) ? true : false;
            $("[name=A48]").prop('selected', boolCheckPass48);
            $("#A48").val(strA48);

            var boolCheckPass49 = (strA49 == 1) ? true : false;
            $("[name=A49]").prop('selected', boolCheckPass49);
            $("#A49").val(strA49);

            var boolCheckPass50 = (strA50 == 1) ? true : false;
            $("[name=A50]").prop('selected', boolCheckPass50);
            $("#A50").val(strA50);


            var boolCheckPass51 = (strA51 == 1) ? true : false;
            $("[name=A51]").prop('selected', boolCheckPass51);
            $("#A51").val(strA51);

            var boolCheckPass52 = (strA52 == 1) ? true : false;
            $("[name=A52]").prop('selected', boolCheckPass52);
            $("#A52").val(strA52);

            var boolCheckPass53 = (strA53 == 1) ? true : false;
            $("[name=A53]").prop('selected', boolCheckPass53);
            $("#A53").val(strA53);

            var boolCheckPass54 = (strA54 == 1) ? true : false;
            $("[name=A54]").prop('selected', boolCheckPass54);
            $("#A54").val(strA54);

            var boolCheckPass55 = (strA55 == 1) ? true : false;
            $("[name=A55]").prop('selected', boolCheckPass55);
            $("#A55").val(strA55);

            var boolCheckPass56 = (strA56 == 1) ? true : false;
            $("[name=A56]").prop('selected', boolCheckPass56);
            $("#A56").val(strA56);

            var boolCheckPass57 = (strA57 == 1) ? true : false;
            $("[name=A57]").prop('selected', boolCheckPass57);
            $("#A57").val(strA57);

            var boolCheckPass58 = (strA58 == 1) ? true : false;
            $("[name=A58]").prop('selected', boolCheckPass58);
            $("#A58").val(strA58);

            var boolCheckPass59 = (strA59 == 1) ? true : false;
            $("[name=A59]").prop('selected', boolCheckPass59);
            $("#A59").val(strA59);

            var boolCheckPass60 = (strA60 == 1) ? true : false;
            $("[name=A60]").prop('selected', boolCheckPass60);
            $("#A60").val(strA60);


            var boolCheckPass61 = (strA61 == 1) ? true : false;
            $("[name=A61]").prop('selected', boolCheckPass61);
            $("#A61").val(strA61);

            var boolCheckPass62 = (strA62 == 1) ? true : false;
            $("[name=A62]").prop('selected', boolCheckPass62);
            $("#A62").val(strA62);

            var boolCheckPass63 = (strA63 == 1) ? true : false;
            $("[name=A63]").prop('selected', boolCheckPass63);
            $("#A63").val(strA63);

            var boolCheckPass64 = (strA64 == 1) ? true : false;
            $("[name=A64]").prop('selected', boolCheckPass64);
            $("#A64").val(strA64);

            var boolCheckPass65 = (strA65 == 1) ? true : false;
            $("[name=A65]").prop('selected', boolCheckPass65);
            $("#A65").val(strA65);

            var boolCheckPass66 = (strA66 == 1) ? true : false;
            $("[name=A66]").prop('selected', boolCheckPass66);
            $("#A66").val(strA66);

            var boolCheckPass67 = (strA67 == 1) ? true : false;
            $("[name=A67]").prop('selected', boolCheckPass67);
            $("#A67").val(strA67);

            var boolCheckPass68 = (strA68 == 1) ? true : false;
            $("[name=A68]").prop('selected', boolCheckPass68);
            $("#A68").val(strA68);

            var boolCheckPass69 = (strA69 == 1) ? true : false;
            $("[name=A69]").prop('selected', boolCheckPass69);
            $("#A69").val(strA69);

            var boolCheckPass70 = (strA70 == 1) ? true : false;
            $("[name=A70]").prop('selected', boolCheckPass70);
            $("#A70").val(strA70);


            var boolCheckPass71 = (strA71 == 1) ? true : false;
            $("[name=A71]").prop('selected', boolCheckPass71);
            $("#A71").val(strA71);

            var boolCheckPass72 = (strA72 == 1) ? true : false;
            $("[name=A72]").prop('selected', boolCheckPass72);
            $("#A72").val(strA72);

            var boolCheckPass73 = (strA73 == 1) ? true : false;
            $("[name=A73]").prop('selected', boolCheckPass73);
            $("#A73").val(strA73);

            var boolCheckPass74 = (strA74 == 1) ? true : false;
            $("[name=A74]").prop('selected', boolCheckPass74);
            $("#A74").val(strA74);

            var boolCheckPass75 = (strA75 == 1) ? true : false;
            $("[name=A75]").prop('selected', boolCheckPass75);
            $("#A75").val(strA75);

            var boolCheckPass76 = (strA76 == 1) ? true : false;
            $("[name=A76]").prop('selected', boolCheckPass76);
            $("#A76").val(strA76);

            var boolCheckPass77 = (strA77 == 1) ? true : false;
            $("[name=A77]").prop('selected', boolCheckPass77);
            $("#A77").val(strA77);

            var boolCheckPass78 = (strA78 == 1) ? true : false;
            $("[name=A78]").prop('selected', boolCheckPass78);
            $("#A78").val(strA78);

            var boolCheckPass79 = (strA79 == 1) ? true : false;
            $("[name=A79]").prop('selected', boolCheckPass79);
            $("#A79").val(strA79);

            var boolCheckPass80 = (strA80 == 1) ? true : false;
            $("[name=A80]").prop('selected', boolCheckPass80);
            $("#A80").val(strA80);


            var boolCheckPass81 = (strA81 == 1) ? true : false;
            $("[name=A81]").prop('selected', boolCheckPass81);
            $("#A81").val(strA81);

            var boolCheckPass82 = (strA82 == 1) ? true : false;
            $("[name=A82]").prop('selected', boolCheckPass82);
            $("#A82").val(strA82);

            var boolCheckPass83 = (strA83 == 1) ? true : false;
            $("[name=A83]").prop('selected', boolCheckPass83);
            $("#A83").val(strA83);

            var boolCheckPass84 = (strA84 == 1) ? true : false;
            $("[name=A84]").prop('selected', boolCheckPass84);
            $("#A84").val(strA84);

            var boolCheckPass85 = (strA85 == 1) ? true : false;
            $("[name=A85]").prop('selected', boolCheckPass85);
            $("#A85").val(strA85);

            var boolCheckPass86 = (strA86 == 1) ? true : false;
            $("[name=A86]").prop('selected', boolCheckPass86);
            $("#A86").val(strA86);

            var boolCheckPass87 = (strA87 == 1) ? true : false;
            $("[name=A87]").prop('selected', boolCheckPass87);
            $("#A87").val(strA87);

            var boolCheckPass88 = (strA88 == 1) ? true : false;
            $("[name=A88]").prop('selected', boolCheckPass88);
            $("#A88").val(strA88);

            var boolCheckPass89 = (strA89 == 1) ? true : false;
            $("[name=A89]").prop('selected', boolCheckPass89);
            $("#A89").val(strA89);

            var boolCheckPass90 = (strA90 == 1) ? true : false;
            $("[name=A90]").prop('selected', boolCheckPass90);
            $("#A90").val(strA90);


            var boolCheckPass91 = (strA1 == 1) ? true : false;
            $("[name=A1]").prop('selected', boolCheckPass91);
            $("#A91").val(strA91);

            var boolCheckPass92 = (strA92 == 1) ? true : false;
            $("[name=A92]").prop('selected', boolCheckPass92);
            $("#A92").val(strA92);

            var boolCheckPass93 = (strA93 == 1) ? true : false;
            $("[name=A93]").prop('selected', boolCheckPass93);
            $("#A93").val(strA93);

            var boolCheckPass94 = (strA94 == 1) ? true : false;
            $("[name=A94]").prop('selected', boolCheckPass94);
            $("#A94").val(strA94);

            var boolCheckPass95 = (strA95 == 1) ? true : false;
            $("[name=A95]").prop('selected', boolCheckPass95);
            $("#A95").val(strA95);

            var boolCheckPass96 = (strA96 == 1) ? true : false;
            $("[name=A96]").prop('selected', boolCheckPass96);
            $("#A96").val(strA96);

            var boolCheckPass97 = (strA97 == 1) ? true : false;
            $("[name=A97]").prop('selected', boolCheckPass97);
            $("#A97").val(strA97);

            var boolCheckPass98 = (strA98 == 1) ? true : false;
            $("[name=A98]").prop('selected', boolCheckPass98);
            $("#A98").val(strA98);

            var boolCheckPass99 = (strA99 == 1) ? true : false;
            $("[name=A99]").prop('selected', boolCheckPass99);
            $("#A99").val(strA99);

            var boolCheckPass100 = (strA100 == 1) ? true : false;
            $("[name=A100]").prop('selected', boolCheckPass100);
            $("#A100").val(strA100);

            $("#SUPERVISOR").val(strSUPERVISOR);

            var boolCheckPass = (strSUPERGRAL == 1) ? true : false;
            $("[name=SUPERGRAL]").prop('selected', boolCheckPass);
            $("#SUPERGRAL").val(strSUPERGRAL);

            $("#EXTENCION").val(strEXTENCION);
            $("#ID_OML").val(strID_OML);

        }

        $('input,textarea,select').attr('readonly', false)

    }

    function fntSelectView(intParametro) {
        document.getElementById('newUsr').style.display = 'block';
        document.getElementById('User').style.display = 'none';
        document.getElementById('btnUpdate').style.display = 'none';
        document.getElementById('btnInsert').style.display = 'none';
        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strNIU = $("#hidNIU_" + intParametro).val();

            var strNombre = $("#hidNombre_" + intParametro).val();
            var strUsuario = $("#hidUsuario_" + intParametro).val();
            var strClave = $("#hidClave_" + intParametro).val();
            var strPuesto = $("#hidPuesto_" + intParametro).val();
            var strUSUAMAIL = $("#hidUSUAMAIL_" + intParametro).val();
            var strSUPERSN = $("#hidSUPERSN_" + intParametro).val();

            var strA1 = $("#hidA1_" + intParametro).val();
            var strA2 = $("#hidA2_" + intParametro).val();
            var strA3 = $("#hidA3_" + intParametro).val();
            var strA4 = $("#hidA4_" + intParametro).val();
            var strA5 = $("#hidA5_" + intParametro).val();
            var strA6 = $("#hidA6_" + intParametro).val();
            var strA7 = $("#hidA7_" + intParametro).val();
            var strA8 = $("#hidA8_" + intParametro).val();
            var strA9 = $("#hidA9_" + intParametro).val();
            var strA10 = $("#hidA10_" + intParametro).val();

            var strA11 = $("#hidA11_" + intParametro).val();
            var strA12 = $("#hidA12_" + intParametro).val();
            var strA13 = $("#hidA13_" + intParametro).val();
            var strA14 = $("#hidA14_" + intParametro).val();
            var strA15 = $("#hidA15_" + intParametro).val();
            var strA16 = $("#hidA16_" + intParametro).val();
            var strA17 = $("#hidA17_" + intParametro).val();
            var strA18 = $("#hidA18_" + intParametro).val();
            var strA19 = $("#hidA19_" + intParametro).val();
            var strA20 = $("#hidA20_" + intParametro).val();

            var strA21 = $("#hidA21_" + intParametro).val();
            var strA22 = $("#hidA22_" + intParametro).val();
            var strA23 = $("#hidA23_" + intParametro).val();
            var strA24 = $("#hidA24_" + intParametro).val();
            var strA25 = $("#hidA25_" + intParametro).val();
            var strA26 = $("#hidA26_" + intParametro).val();
            var strA27 = $("#hidA27_" + intParametro).val();
            var strA28 = $("#hidA28_" + intParametro).val();
            var strA29 = $("#hidA29_" + intParametro).val();
            var strA30 = $("#hidA30_" + intParametro).val();

            var strA31 = $("#hidA31_" + intParametro).val();
            var strA32 = $("#hidA32_" + intParametro).val();
            var strA33 = $("#hidA33_" + intParametro).val();
            var strA34 = $("#hidA34_" + intParametro).val();
            var strA35 = $("#hidA35_" + intParametro).val();
            var strA36 = $("#hidA36_" + intParametro).val();
            var strA37 = $("#hidA37_" + intParametro).val();
            var strA38 = $("#hidA38_" + intParametro).val();
            var strA39 = $("#hidA39_" + intParametro).val();
            var strA40 = $("#hidA40_" + intParametro).val();

            var strA41 = $("#hidA41_" + intParametro).val();
            var strA42 = $("#hidA42_" + intParametro).val();
            var strA43 = $("#hidA43_" + intParametro).val();
            var strA44 = $("#hidA44_" + intParametro).val();
            var strA45 = $("#hidA45_" + intParametro).val();
            var strA46 = $("#hidA46_" + intParametro).val();
            var strA47 = $("#hidA47_" + intParametro).val();
            var strA48 = $("#hidA48_" + intParametro).val();
            var strA49 = $("#hidA49_" + intParametro).val();
            var strA50 = $("#hidA50_" + intParametro).val();

            var strA51 = $("#hidA51_" + intParametro).val();
            var strA52 = $("#hidA52_" + intParametro).val();
            var strA53 = $("#hidA53_" + intParametro).val();
            var strA54 = $("#hidA54_" + intParametro).val();
            var strA55 = $("#hidA55_" + intParametro).val();
            var strA56 = $("#hidA56_" + intParametro).val();
            var strA57 = $("#hidA57_" + intParametro).val();
            var strA58 = $("#hidA58_" + intParametro).val();
            var strA59 = $("#hidA59_" + intParametro).val();
            var strA60 = $("#hidA60_" + intParametro).val();

            var strA61 = $("#hidA61_" + intParametro).val();
            var strA62 = $("#hidA62_" + intParametro).val();
            var strA63 = $("#hidA63_" + intParametro).val();
            var strA64 = $("#hidA64_" + intParametro).val();
            var strA65 = $("#hidA65_" + intParametro).val();
            var strA66 = $("#hidA66_" + intParametro).val();
            var strA67 = $("#hidA67_" + intParametro).val();
            var strA68 = $("#hidA68_" + intParametro).val();
            var strA69 = $("#hidA69_" + intParametro).val();
            var strA70 = $("#hidA70_" + intParametro).val();

            var strA71 = $("#hidA71_" + intParametro).val();
            var strA72 = $("#hidA72_" + intParametro).val();
            var strA73 = $("#hidA73_" + intParametro).val();
            var strA74 = $("#hidA74_" + intParametro).val();
            var strA75 = $("#hidA75_" + intParametro).val();
            var strA76 = $("#hidA76_" + intParametro).val();
            var strA77 = $("#hidA77_" + intParametro).val();
            var strA78 = $("#hidA78_" + intParametro).val();
            var strA79 = $("#hidA79_" + intParametro).val();
            var strA80 = $("#hidA80_" + intParametro).val();

            var strA81 = $("#hidA81_" + intParametro).val();
            var strA82 = $("#hidA82_" + intParametro).val();
            var strA83 = $("#hidA83_" + intParametro).val();
            var strA84 = $("#hidA84_" + intParametro).val();
            var strA85 = $("#hidA85_" + intParametro).val();
            var strA86 = $("#hidA86_" + intParametro).val();
            var strA87 = $("#hidA87_" + intParametro).val();
            var strA88 = $("#hidA88_" + intParametro).val();
            var strA89 = $("#hidA89_" + intParametro).val();
            var strA90 = $("#hidA90_" + intParametro).val();

            var strA91 = $("#hidA91_" + intParametro).val();
            var strA92 = $("#hidA92_" + intParametro).val();
            var strA93 = $("#hidA93_" + intParametro).val();
            var strA94 = $("#hidA94_" + intParametro).val();
            var strA95 = $("#hidA95_" + intParametro).val();
            var strA96 = $("#hidA96_" + intParametro).val();
            var strA97 = $("#hidA97_" + intParametro).val();
            var strA98 = $("#hidA98_" + intParametro).val();
            var strA99 = $("#hidA99_" + intParametro).val();
            var strA100 = $("#hidA100_" + intParametro).val();

            var strSUPERVISOR = $("#hidSUPERVISOR_" + intParametro).val();
            var strSUPERGRAL = $("#hidSUPERGRAL_" + intParametro).val();
            var strEXTENCION = $("#hidEXTENCION_" + intParametro).val();
            var strID_OML = $("#hidID_OML_" + intParametro).val();
            //var strEXPIR = $("#hidEXPIR_" + intParametro).val();//fecha de expiracion 90 dia
            // alert(strA + "                         strA");

            $("#id_usr").val(strNIU);
            $("#NOMBRE").val(strNombre);
            $("#NOMBRE_").val(strNombre);
            $("#USUARIO").val(strUsuario);
            $("#CLAVE").val(strClave);
            $("#PASS_WEB").val(strClave);
            $("#PUESTO").val(strPuesto);
            $("#USUAMAIL").val(strUSUAMAIL);

            var boolCheck = (strSUPERSN == 1) ? true : false;
            $("[name=SUPERVISOR_SLT]").prop('selected', boolCheck);
            $("#SUPERVISOR_SLT").val(strSUPERSN);

            var boolCheckPass1 = (strA1 == 1) ? true : false;
            $("[name=A1]").prop('selected', boolCheckPass1);
            $("#A1").val(strA1);

            var boolCheckPass2 = (strA2 == 1) ? true : false;
            $("[name=A2]").prop('selected', boolCheckPass2);
            $("#A2").val(strA2);

            var boolCheckPass3 = (strA3 == 1) ? true : false;
            $("[name=A3]").prop('selected', boolCheckPass3);
            $("#A3").val(strA3);

            var boolCheckPass4 = (strA4 == 1) ? true : false;
            $("[name=A4]").prop('selected', boolCheckPass4);
            $("#A4").val(strA4);

            var boolCheckPass5 = (strA5 == 1) ? true : false;
            $("[name=A5]").prop('selected', boolCheckPass5);
            $("#A5").val(strA5);

            var boolCheckPass6 = (strA6 == 1) ? true : false;
            $("[name=A6]").prop('selected', boolCheckPass6);
            $("#A6").val(strA6);

            var boolCheckPass7 = (strA7 == 1) ? true : false;
            $("[name=A7]").prop('selected', boolCheckPass7);
            $("#A7").val(strA7);

            var boolCheckPass8 = (strA8 == 1) ? true : false;
            $("[name=A8]").prop('selected', boolCheckPass8);
            $("#A8").val(strA8);

            var boolCheckPass9 = (strA9 == 1) ? true : false;
            $("[name=A9]").prop('selected', boolCheckPass9);
            $("#A9").val(strA9);

            var boolCheckPass10 = (strA10 == 1) ? true : false;
            $("[name=A10]").prop('selected', boolCheckPass10);
            $("#A10").val(strA10);


            var boolCheckPass11 = (strA11 == 1) ? true : false;
            $("[name=A11]").prop('selected', boolCheckPass11);
            $("#A11").val(strA11);

            var boolCheckPass12 = (strA12 == 1) ? true : false;
            $("[name=A12]").prop('selected', boolCheckPass12);
            $("#A12").val(strA12);

            var boolCheckPass13 = (strA13 == 1) ? true : false;
            $("[name=A13]").prop('selected', boolCheckPass13);
            $("#A13").val(strA13);

            var boolCheckPass14 = (strA14 == 1) ? true : false;
            $("[name=A14]").prop('selected', boolCheckPass14);
            $("#A14").val(strA14);

            var boolCheckPass15 = (strA15 == 1) ? true : false;
            $("[name=A15]").prop('selected', boolCheckPass15);
            $("#A15").val(strA15);

            var boolCheckPass16 = (strA16 == 1) ? true : false;
            $("[name=A16]").prop('selected', boolCheckPass16);
            $("#A16").val(strA16);

            var boolCheckPass17 = (strA17 == 1) ? true : false;
            $("[name=A17]").prop('selected', boolCheckPass17);
            $("#A17").val(strA17);

            var boolCheckPass18 = (strA18 == 1) ? true : false;
            $("[name=A18]").prop('selected', boolCheckPass18);
            $("#A18").val(strA18);

            var boolCheckPass19 = (strA19 == 1) ? true : false;
            $("[name=A19]").prop('selected', boolCheckPass19);
            $("#A19").val(strA19);

            var boolCheckPass20 = (strA20 == 1) ? true : false;
            $("[name=A20]").prop('selected', boolCheckPass20);
            $("#A20").val(strA20);


            var boolCheckPass21 = (strA21 == 1) ? true : false;
            $("[name=A21]").prop('selected', boolCheckPass21);
            $("#A21").val(strA21);

            var boolCheckPass22 = (strA22 == 1) ? true : false;
            $("[name=A22]").prop('selected', boolCheckPass22);
            $("#A22").val(strA22);

            var boolCheckPass23 = (strA23 == 1) ? true : false;
            $("[name=A23]").prop('selected', boolCheckPass23);
            $("#A23").val(strA23);

            var boolCheckPass24 = (strA24 == 1) ? true : false;
            $("[name=A24]").prop('selected', boolCheckPass24);
            $("#A24").val(strA24);

            var boolCheckPass25 = (strA25 == 1) ? true : false;
            $("[name=A25]").prop('selected', boolCheckPass25);
            $("#A25").val(strA25);

            var boolCheckPass26 = (strA26 == 1) ? true : false;
            $("[name=A26]").prop('selected', boolCheckPass26);
            $("#A26").val(strA26);

            var boolCheckPass27 = (strA27 == 1) ? true : false;
            $("[name=A27]").prop('selected', boolCheckPass27);
            $("#A27").val(strA27);

            var boolCheckPass28 = (strA28 == 1) ? true : false;
            $("[name=A28]").prop('selected', boolCheckPass28);
            $("#A28").val(strA28);

            var boolCheckPass29 = (strA29 == 1) ? true : false;
            $("[name=A29]").prop('selected', boolCheckPass29);
            $("#A29").val(strA29);

            var boolCheckPass30 = (strA30 == 1) ? true : false;
            $("[name=A30]").prop('selected', boolCheckPass30);
            $("#A30").val(strA30);


            var boolCheckPass31 = (strA31 == 1) ? true : false;
            $("[name=A31]").prop('selected', boolCheckPass31);
            $("#A31").val(strA31);

            var boolCheckPass32 = (strA32 == 1) ? true : false;
            $("[name=A32]").prop('selected', boolCheckPass32);
            $("#A32").val(strA32);

            var boolCheckPass33 = (strA33 == 1) ? true : false;
            $("[name=A33]").prop('selected', boolCheckPass33);
            $("#A33").val(strA33);

            var boolCheckPass34 = (strA34 == 1) ? true : false;
            $("[name=A34]").prop('selected', boolCheckPass34);
            $("#A34").val(strA34);

            var boolCheckPass35 = (strA35 == 1) ? true : false;
            $("[name=A35]").prop('selected', boolCheckPass35);
            $("#A35").val(strA35);

            var boolCheckPass36 = (strA36 == 1) ? true : false;
            $("[name=A36]").prop('selected', boolCheckPass36);
            $("#A36").val(strA36);

            var boolCheckPass37 = (strA37 == 1) ? true : false;
            $("[name=A37]").prop('selected', boolCheckPass37);
            $("#A37").val(strA37);

            var boolCheckPass38 = (strA38 == 1) ? true : false;
            $("[name=A38]").prop('selected', boolCheckPass38);
            $("#A38").val(strA38);

            var boolCheckPass39 = (strA39 == 1) ? true : false;
            $("[name=A39]").prop('selected', boolCheckPass39);
            $("#A39").val(strA39);

            var boolCheckPass40 = (strA40 == 1) ? true : false;
            $("[name=A40]").prop('selected', boolCheckPass40);
            $("#A40").val(strA40);


            var boolCheckPass41 = (strA41 == 1) ? true : false;
            $("[name=A41]").prop('selected', boolCheckPass41);
            $("#A41").val(strA41);

            var boolCheckPass42 = (strA42 == 1) ? true : false;
            $("[name=A42]").prop('selected', boolCheckPass42);
            $("#A42").val(strA42);

            var boolCheckPass43 = (strA43 == 1) ? true : false;
            $("[name=A43]").prop('selected', boolCheckPass43);
            $("#A43").val(strA43);

            var boolCheckPass44 = (strA44 == 1) ? true : false;
            $("[name=A44]").prop('selected', boolCheckPass44);
            $("#A44").val(strA44);

            var boolCheckPass45 = (strA45 == 1) ? true : false;
            $("[name=A45]").prop('selected', boolCheckPass45);
            $("#A45").val(strA45);

            var boolCheckPass46 = (strA46 == 1) ? true : false;
            $("[name=A46]").prop('selected', boolCheckPass46);
            $("#A46").val(strA46);

            var boolCheckPass47 = (strA47 == 1) ? true : false;
            $("[name=A47]").prop('selected', boolCheckPass47);
            $("#A47").val(strA47);

            var boolCheckPass48 = (strA48 == 1) ? true : false;
            $("[name=A48]").prop('selected', boolCheckPass48);
            $("#A48").val(strA48);

            var boolCheckPass49 = (strA49 == 1) ? true : false;
            $("[name=A49]").prop('selected', boolCheckPass49);
            $("#A49").val(strA49);

            var boolCheckPass50 = (strA50 == 1) ? true : false;
            $("[name=A50]").prop('selected', boolCheckPass50);
            $("#A50").val(strA50);


            var boolCheckPass51 = (strA51 == 1) ? true : false;
            $("[name=A51]").prop('selected', boolCheckPass51);
            $("#A51").val(strA51);

            var boolCheckPass52 = (strA52 == 1) ? true : false;
            $("[name=A52]").prop('selected', boolCheckPass52);
            $("#A52").val(strA52);

            var boolCheckPass53 = (strA53 == 1) ? true : false;
            $("[name=A53]").prop('selected', boolCheckPass53);
            $("#A53").val(strA53);

            var boolCheckPass54 = (strA54 == 1) ? true : false;
            $("[name=A54]").prop('selected', boolCheckPass54);
            $("#A54").val(strA54);

            var boolCheckPass55 = (strA55 == 1) ? true : false;
            $("[name=A55]").prop('selected', boolCheckPass55);
            $("#A55").val(strA55);

            var boolCheckPass56 = (strA56 == 1) ? true : false;
            $("[name=A56]").prop('selected', boolCheckPass56);
            $("#A56").val(strA56);

            var boolCheckPass57 = (strA57 == 1) ? true : false;
            $("[name=A57]").prop('selected', boolCheckPass57);
            $("#A57").val(strA57);

            var boolCheckPass58 = (strA58 == 1) ? true : false;
            $("[name=A58]").prop('selected', boolCheckPass58);
            $("#A58").val(strA58);

            var boolCheckPass59 = (strA59 == 1) ? true : false;
            $("[name=A59]").prop('selected', boolCheckPass59);
            $("#A59").val(strA59);

            var boolCheckPass60 = (strA60 == 1) ? true : false;
            $("[name=A60]").prop('selected', boolCheckPass60);
            $("#A60").val(strA60);


            var boolCheckPass61 = (strA61 == 1) ? true : false;
            $("[name=A61]").prop('selected', boolCheckPass61);
            $("#A61").val(strA61);

            var boolCheckPass62 = (strA62 == 1) ? true : false;
            $("[name=A62]").prop('selected', boolCheckPass62);
            $("#A62").val(strA62);

            var boolCheckPass63 = (strA63 == 1) ? true : false;
            $("[name=A63]").prop('selected', boolCheckPass63);
            $("#A63").val(strA63);

            var boolCheckPass64 = (strA64 == 1) ? true : false;
            $("[name=A64]").prop('selected', boolCheckPass64);
            $("#A64").val(strA64);

            var boolCheckPass65 = (strA65 == 1) ? true : false;
            $("[name=A65]").prop('selected', boolCheckPass65);
            $("#A65").val(strA65);

            var boolCheckPass66 = (strA66 == 1) ? true : false;
            $("[name=A66]").prop('selected', boolCheckPass66);
            $("#A66").val(strA66);

            var boolCheckPass67 = (strA67 == 1) ? true : false;
            $("[name=A67]").prop('selected', boolCheckPass67);
            $("#A67").val(strA67);

            var boolCheckPass68 = (strA68 == 1) ? true : false;
            $("[name=A68]").prop('selected', boolCheckPass68);
            $("#A68").val(strA68);

            var boolCheckPass69 = (strA69 == 1) ? true : false;
            $("[name=A69]").prop('selected', boolCheckPass69);
            $("#A69").val(strA69);

            var boolCheckPass70 = (strA70 == 1) ? true : false;
            $("[name=A70]").prop('selected', boolCheckPass70);
            $("#A70").val(strA70);


            var boolCheckPass71 = (strA71 == 1) ? true : false;
            $("[name=A71]").prop('selected', boolCheckPass71);
            $("#A71").val(strA71);

            var boolCheckPass72 = (strA72 == 1) ? true : false;
            $("[name=A72]").prop('selected', boolCheckPass72);
            $("#A72").val(strA72);

            var boolCheckPass73 = (strA73 == 1) ? true : false;
            $("[name=A73]").prop('selected', boolCheckPass73);
            $("#A73").val(strA73);

            var boolCheckPass74 = (strA74 == 1) ? true : false;
            $("[name=A74]").prop('selected', boolCheckPass74);
            $("#A74").val(strA74);

            var boolCheckPass75 = (strA75 == 1) ? true : false;
            $("[name=A75]").prop('selected', boolCheckPass75);
            $("#A75").val(strA75);

            var boolCheckPass76 = (strA76 == 1) ? true : false;
            $("[name=A76]").prop('selected', boolCheckPass76);
            $("#A76").val(strA76);

            var boolCheckPass77 = (strA77 == 1) ? true : false;
            $("[name=A77]").prop('selected', boolCheckPass77);
            $("#A77").val(strA77);

            var boolCheckPass78 = (strA78 == 1) ? true : false;
            $("[name=A78]").prop('selected', boolCheckPass78);
            $("#A78").val(strA78);

            var boolCheckPass79 = (strA79 == 1) ? true : false;
            $("[name=A79]").prop('selected', boolCheckPass79);
            $("#A79").val(strA79);

            var boolCheckPass80 = (strA80 == 1) ? true : false;
            $("[name=A80]").prop('selected', boolCheckPass80);
            $("#A80").val(strA80);


            var boolCheckPass81 = (strA81 == 1) ? true : false;
            $("[name=A81]").prop('selected', boolCheckPass81);
            $("#A81").val(strA81);

            var boolCheckPass82 = (strA82 == 1) ? true : false;
            $("[name=A82]").prop('selected', boolCheckPass82);
            $("#A82").val(strA82);

            var boolCheckPass83 = (strA83 == 1) ? true : false;
            $("[name=A83]").prop('selected', boolCheckPass83);
            $("#A83").val(strA83);

            var boolCheckPass84 = (strA84 == 1) ? true : false;
            $("[name=A84]").prop('selected', boolCheckPass84);
            $("#A84").val(strA84);

            var boolCheckPass85 = (strA85 == 1) ? true : false;
            $("[name=A85]").prop('selected', boolCheckPass85);
            $("#A85").val(strA85);

            var boolCheckPass86 = (strA86 == 1) ? true : false;
            $("[name=A86]").prop('selected', boolCheckPass86);
            $("#A86").val(strA86);

            var boolCheckPass87 = (strA87 == 1) ? true : false;
            $("[name=A87]").prop('selected', boolCheckPass87);
            $("#A87").val(strA87);

            var boolCheckPass88 = (strA88 == 1) ? true : false;
            $("[name=A88]").prop('selected', boolCheckPass88);
            $("#A88").val(strA88);

            var boolCheckPass89 = (strA89 == 1) ? true : false;
            $("[name=A89]").prop('selected', boolCheckPass89);
            $("#A89").val(strA89);

            var boolCheckPass90 = (strA90 == 1) ? true : false;
            $("[name=A90]").prop('selected', boolCheckPass90);
            $("#A90").val(strA90);


            var boolCheckPass91 = (strA1 == 1) ? true : false;
            $("[name=A1]").prop('selected', boolCheckPass91);
            $("#A91").val(strA91);

            var boolCheckPass92 = (strA92 == 1) ? true : false;
            $("[name=A92]").prop('selected', boolCheckPass92);
            $("#A92").val(strA92);

            var boolCheckPass93 = (strA93 == 1) ? true : false;
            $("[name=A93]").prop('selected', boolCheckPass93);
            $("#A93").val(strA93);

            var boolCheckPass94 = (strA94 == 1) ? true : false;
            $("[name=A94]").prop('selected', boolCheckPass94);
            $("#A94").val(strA94);

            var boolCheckPass95 = (strA95 == 1) ? true : false;
            $("[name=A95]").prop('selected', boolCheckPass95);
            $("#A95").val(strA95);

            var boolCheckPass96 = (strA96 == 1) ? true : false;
            $("[name=A96]").prop('selected', boolCheckPass96);
            $("#A96").val(strA96);

            var boolCheckPass97 = (strA97 == 1) ? true : false;
            $("[name=A97]").prop('selected', boolCheckPass97);
            $("#A97").val(strA97);

            var boolCheckPass98 = (strA98 == 1) ? true : false;
            $("[name=A98]").prop('selected', boolCheckPass98);
            $("#A98").val(strA98);

            var boolCheckPass99 = (strA99 == 1) ? true : false;
            $("[name=A99]").prop('selected', boolCheckPass99);
            $("#A99").val(strA99);

            var boolCheckPass100 = (strA100 == 1) ? true : false;
            $("[name=A100]").prop('selected', boolCheckPass100);
            $("#A100").val(strA100);

            $("#SUPERVISOR").val(strSUPERVISOR);

            var boolCheckPass = (strSUPERGRAL == 1) ? true : false;
            $("[name=SUPERGRAL]").prop('selected', boolCheckPass);
            $("#SUPERGRAL").val(strSUPERGRAL);

            $("#EXTENCION").val(strEXTENCION);
            $("#ID_OML").val(strID_OML);

        }
        $('input,textarea,select').attr('readonly', true)
    }

    // VER Y OCULTAR BOTONES INSERT UPDATE 
    document.getElementById('btnUpdate').style.display = 'none';
    // MOSTRAR Y OCULTAR MODULOS
    document.getElementById('User').style.display = 'block';
    document.getElementById('newUsr').style.display = 'none';

    function fntNuevoMostrarOcultar() {
        document.getElementById('btnUpdate').style.display = 'none';
        document.getElementById('btnInsert').style.display = 'block';
        document.getElementById('User').style.display = 'none';
        var elemento = document.getElementById('newUsr');
        if (!elemento) {
            return true;
        }
        if (elemento.style.display == "none") {
            elemento.style.display = "block"
        } else {
            elemento.style.display = "none"
        };

        return true;
    };

    function fntUsuariosMostrarOcultar() {
        document.getElementById('newUsr').style.display = 'none';
        // PACIENTES
        var elemento = document.getElementById('User');
        if (!elemento) {
            return true;
        }
        if (elemento.style.display == "none") {
            elemento.style.display = "block"
        } else {
            elemento.style.display = "none"
        };

        $('#formData')[0].reset();
        $('input,textarea,select').attr('readonly', false)

        return true;
    };

    function fntSelectSupervisor(intParametro) {
        intParametro = !intParametro ? 0 : intParametro;

        if (intParametro > 0) {
            var strSupervisor = $("#hidSup_" + intParametro).val();
            // alert(strDPI + "                         strDPI");
            $("#SUPERVISOR").val(strSupervisor);
        }

        $('#basicSupervisores').modal('hide')

    }

    function fntModalAccesos() {
        $('#basicExampleModal').modal('show')
    }

    function fntModalSupervisores() {
        $('#basicSupervisores').modal('show')
    }
</script>

<style>
    .fondo {
        background: white !important;
    }

    .textoCentro {
        text-align: center;
    }

    div.tableFixHead {
        width: 1180px;
        height: 800px;
        overflow: scroll;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
    }

    .tableFixHeadInvestiga thead th {
        position: sticky !important;
        top: 0;
    }
</style>