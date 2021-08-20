<div id="loading-screen" style="display:none">
  <img src="../../asset/img/gif/spinning-circles.svg">
</div>
<section class="content">
  <div class="container-fluid"></br>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10 colorBackgroundApp">
        <ul class="nav nav-pills nav-fill btn-dark">
          <li class="nav-item">
            <button onclick="fnCopyCliente()" class="btn btn-info btn-block"><?php echo $nombre ?>/ Ext.<?php echo $EXTENCION ?>-</button>
          </li>
          <li class="nav-item">
            <?php if ($gt == 1) { ?>
              <button type="button" id="insert" name="insert" onclick="disabledBotomInsert2()" id="save" class="btn btn-dark btn-block">Guardar</button>
            <?php } else { ?>
              <button type="button" id="insert" name="insert" onclick="disabledBotomInsert()" id="save" class="btn btn-dark btn-block">Guardar</button>
            <?php   }  ?>
          </li>
          <li class="nav-item">
            <button type="button" id="replace" onclick="fntClear()" class="btn btn-dark btn-block">Cancelar</button>
          </li>
          <li class="nav-item">
            <button type="button" id="replace" class="btn btn-info btn-block">Gestiones - <?php echo $contadorGestiones ?> </button>
          </li>
        </ul>
        <ul class="nav nav-tabs colorTab" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link" style="color:#FFFFFF;" id="home-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">INFO. GENERAL</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" style="color:#FFFFFF;" id="messages-tab" data-toggle="tab" href="#thre" role="tab" aria-controls="thre" aria-selected="false">MAS INFORMACION</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" style="color:#FFFFFF;" style="cursor:pointer;" onclick="fntDibujoEstadoDeCuenta()" data-toggle="modal" data-target="#estadoDeCuenta">ESTADO DE CUENTA</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" style="color:#FFFFFF;" style="cursor:pointer;" onclick="fntDibujoDocumentosDigitales()" data-toggle="modal" data-target="#documentosDigitales">DOCUMENTOS DIGITALIZADOS</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" style="color:#FFFFFF;" id="profile-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">INVESTIGA</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="one" role="tabpanel" aria-labelledby="one-tab"></br>

            <div class="form-group row ">
              <div class="col-12" id="tablaEncabezadoRegistroClientes" name="tablaEncabezadoRegistroClientes"> </div>
              <div class="col-12" id="tiemposEmpresa" name="tiemposEmpresa"> </div>
              <div class="col-1"></div>
              <div class="col-4">
                <div class="form-group row ">
                  <a for="Credito" class="col-sm-4 col-form-label" disabled>Credito</a>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm " name="Credito" id="Credito" type="text" value="<?php echo $codiclie ?>" disabled>
                  </div>
                  <div class="col-4"></div>
                  <a for="Credito" class="col-sm-4 col-form-label">Credito Nuevo</a>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm " name="Credito" id="Credito" type="text" type="text" value="<?php echo $codiempr ?>" disabled>
                  </div>
                  <div class="col-4"></div>
                  <a for="Cartera" class="col-sm-4 col-form-label">Tipo de Cartera</a>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm " name="Cartera" id="Cartera" type="text" value="<?php echo $claprod ?>" disabled>
                  </div>
                  <div class="col-4"></div>
                  <a for="Producto" class="col-sm-4 col-form-label">Tipo de Producto</a>
                  <div class="col-sm-4">
                    <input style="text-align:right;" class="form-control form-control-sm " name="Producto" id="Producto" type="text" value="<?php echo $TIPOPROD ?>" disabled>
                  </div>
                </div>
              </div>
              <div class=" col-4">
                <div class="form-group row ">
                  <a for="Apertura" class="col-sm-3 col-form-label">Fecha Apertura</a>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm " name="Apertura" id="Apertura" type="date" value="<?php echo $FECHAPER ?>" disabled>
                  </div>
                  <div class="col-5"></div>
                  <a for="Finalizacion" class="col-sm-3 col-form-label">Fecha Fin</a>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm " name="Finalizacion" id="Finalizacion" type="date" value="<?php echo $FECHAFIN ?>" disabled>
                  </div>
                  <div class="col-5"></div>
                  <a for="Corte" class="col-sm-3 col-form-label">Fecha De Corte</a>
                  <div class="col-sm-4">
                    <input style="text-align:right;" class="form-control form-control-sm " name="Corte" id="Corte" type="text" value="<?php echo $FECHACOR ?>" disabled>
                  </div>
                  <div class="col-5"></div>
                  <a for="Pago" class="col-sm-3 col-form-label">Dia de Pago</a>
                  <div class="col-sm-4">
                    <input style="text-align:right;" class="form-control form-control-sm " name="Pago" id="Pago" type="text" value="<?php echo $diapago ?>" disabled>
                  </div>
                  <div class="col-5"></div>
                </div>
              </div>

              <div class=" col-3">
                <div class="form-group row ">
                  <a for="Mora" class="col-sm-4 col-form-label">Mora</a>
                  <div class="col-sm-5">
                    <input style="text-align:right;" class="form-control form-control-sm " name="Mora" id="Mora" type="text" value="<?php echo $cicloveq ?>" disabled>
                  </div>
                  <a for="Llamadas" class="col-sm-4 col-form-label">Llamadas</a>
                  <div class="col-sm-5">
                    <input style="text-align:right;" class="form-control form-control-sm " name="llamadas" id="llamadas" type="text" value="<?php echo $numcall ?>" disabled>
                  </div>
                  <a for="Llamadas" class="col-sm-4 col-form-label">Cliente</a>
                  <div class="col-sm-5">
                    <input style="text-align:right;" class="form-control form-control-sm "  name="clipboard" id="clipboard" type="text" value="<?php echo $nombre ?>">
                  </div>
                </div>
              </div>
            </div>

            <ul class="nav nav-pills nav-fill btn-secondary AGREGAR">
              <li class="nav-item">
                <button type="button" onclick="fntDibujoTablaTelefonos()" data-toggle="modal" data-target="#telefonos" class="btn btn-secondary btn-block">Telefonos</button>
              </li>
              <li class="nav-item">
                <button type="button" onclick="fntDibujoTablaCuentas()" data-toggle="modal" data-target="#cuentas" class="btn btn-secondary btn-block">Cuentas</button>
              </li>
              <li class="nav-item">
                <button type="button" data-toggle="modal" data-target="#m_telefonos" class="btn btn-secondary btn-block">+ Telefonos</button>
              </li>
              <li class="nav-item">
                <button type="button" data-toggle="modal" data-target="#m_direccion" class="btn btn-secondary btn-block">+ Direccion</button>
              </li>
              <li class="nav-item">
                <button type="button" data-toggle="modal" data-target="#m_correos" class="btn btn-secondary btn-block">+ Correos</button>
              </li>
            </ul></br>


            <div class="form-group col-12 row ">
              <div class="form-group col-12 row ">
                <div class="col-2"></div>
                <a for="Credito" class="col-sm-1 col-form-label">Plazo del Credito</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Credito" id="Credito" type="text" value="<?php echo $PLAZCRED ?>" disabled>
                </div>
                <a for="Otorgado" class="col-sm-1 col-form-label">Monto Otorgado</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Otorgado" id="Otorgado" type="text" value="<?php echo $MONTOTOR ?>" disabled>
                </div>
                <a for="Sldo" class="col-sm-1 col-form-label">Sldo Act Capital</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Sldo" id="Sldo" type="text" value="<?php echo $saldo ?>" disabled>
                </div>
                <a for="Tasa" class="col-sm-1 col-form-label">Tasa Act Credito</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Tasa" id="Tasa" type="text" value="<?php echo $TASACRED ?>" disabled>
                </div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <a for="Capital" class="col-sm-1 col-form-label">Capital Atrasado</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Capital" id="Capital" type="text" value="<?php echo $CAPATRAS ?>" disabled>
                </div>
                <a for="Interes" class="col-sm-1 col-form-label">Interes Atrasado</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Interes" id="Interes" type="text" value="<?php echo $INTATRAS ?>" disabled>
                </div>
                <a for="Atrasada" class="col-sm-1 col-form-label">Mora Atrasada</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Atrasada" id="Atrasada" type="text" value="<?php echo $MORATRAS ?>" disabled>
                </div>
                <a for="Renegociar" class="col-sm-1 col-form-label">Cuot Renegociar</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Renegociar" id="Renegociar" type="text" value="<?php echo $QOTRENEG ?>" disabled>
                </div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <a for="Atraso" class="col-sm-1 col-form-label">Deuda T. Atraso</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Atraso" id="Atraso" type="text" value="<?php echo $TOTATRAS ?>" disabled>
                </div>
                <a for="Abono" class="col-sm-1 col-form-label">Abono</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Abono" id="Abono" type="text" value="<?php echo $pagos ?>" disabled>
                </div>
                <a for="Actual" class="col-sm-1 col-form-label">Saldo Actual</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Actual" id="Actual" type="text" value="<?php echo $saldoact ?>" disabled>
                </div>
                <a for="Convenio" class="col-sm-1 col-form-label">Cuot Convenio</a>
                <div class="col-sm-1">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Convenio" id="Convenio" type="text" value="<?php echo $QOTCONVE ?>" disabled>
                </div>
                <div class="col-2"></div>
              </div>
            </div>


            <div id="myProgress" class="progress">
              <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated"></div>
            </div></br>

            <form id="formTipologiaGeneral" method="POST">
              <!--------------------------------- FORMULARIO DE INSERT PRINCIPAL----------------------------------------------------------------------------------------------------------------------------->

              <input name="POST_TN" id="POST_TN" value="<?php echo $TN ?>" type="hidden">
              <?php $TIME = date("Y-m-d H:i:s"); ?>
              <!--------- <input name="HORRRRRAAAA" id="HORRRRRAAAA" type="TEXT" value="<?php echo $TIME ?>">----->
              <input name="ID_POST" id="ID_POST" type="hidden" value="<?php echo $_GET["id"] ?>">
              <input name="numCasoPdf" id="numCasoPdf" type="hidden" value="<?php echo $numCaso ?>">
              <input name="POST_CTIPOLOG" id="POST_CTIPOLOG" type="hidden">
              <input name="POST_TIPOLOGI" id="POST_TIPOLOGI" type="hidden">
              <input name="POST_CPLACE" id="POST_CPLACE" type="hidden">
              <input name="POST_PLACE" id="POST_PLACE" type="hidden">
              <input name="POST_CCONCLUS" id="POST_CCONCLUS" type="hidden">
              <input name="POST_CONCLUSI" id="POST_CONCLUSI" type="hidden">
              <input name="POST_CSUBCONC" id="POST_CSUBCONC" type="hidden">
              <input name="POST_SUBCONCL" id="POST_SUBCONCL" type="hidden">
              <input name="POST_CRTESTAD" id="POST_CRTESTAD" type="hidden">
              <input name="POST_RTESTADO" id="POST_RTESTADO" type="hidden">
              <input name="POST_PONDERACION" id="POST_PONDERACION" type="hidden">

              <input name="POST_CRDM" id="POST_CRDM" type="hidden">
              <input name="POST_RDM" id="POST_RDM" type="hidden">

              <input name="POST_NUMEMPRE" id="POST_NUMEMPRE" value="<?php echo $numempre ?>" type="hidden">
              <input name="POST_CODICLIE" id="POST_CODICLIE" value="<?php echo $codiclie ?>" type="hidden">
              <input name="POST_IDENTIFI" id="POST_IDENTIFI" value="<?php echo $IDENTIFI ?>" type="hidden">
              <input name="POST_NUMENV" id="POST_NUMENV" value="<?php echo $numenv ?>" type="hidden">
              <input name="POST_CODIEMPR" id="POST_CODIEMPR" value="<?php echo $codiempr ?>" type="hidden">

              <input name="POST_FECHAINIDIA" id="POST_FECHAINIDIA" value="<?php echo $arrFechaIniDiaInt ?>" type="hidden">

              <input name="TIME" id="TIME" type="hidden">
              <input name="TIME_SEG" id="TIME_SEG" type="hidden">
              <input name="POST_HORA_FIN" id="POST_HORA_FIN" type="hidden">
              <input name="POST_HORA_FIN_SEG" id="POST_HORA_FIN_SEG" type="hidden">
              <div type="hidden" id="number_segundos" name="text"></div>

              <div class="contador___segundos" id="contador___segundos" name="contador___segundos">
                <textarea name="number_segundos_" id="number_segundos_" type="text"></textarea>
              </div>
              <div class="form-group row ">
                <div class="col-12">
                  <div class="form-group row ">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-2">

                      <div class="tabla_tipologia_origen" id="tabla_tipologia_origen" name='tabla_tipologia_origen' style="text-transform: uppercase;">
                        <!---------------- TABLA ORIGEN-------------------------->
                      </div>

                    </div>
                    <div class="col-sm-2">
                      <div class="tabla_tipologia_place" id="tabla_tipologia_place" name='tabla_tipologia_place' style="text-transform: uppercase;">
                        <!---------------- TABLA ORIGEN-------------------------->
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="tabla_tipologia_receptor" id="tabla_tipologia_receptor" name='tabla_tipologia_receptor' style="text-transform: uppercase;">
                        <!---------------- TABLA ORIGEN-------------------------->
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="tabla_tipologia" id="tabla_tipologia" name='tabla_tipologia' style="text-transform: uppercase;">
                        <!---------------- TABLA ORIGEN-------------------------->
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="tabla_tipologia_rdm" id="tabla_tipologia_rdm" name='tabla_tipologia_rdm' style="text-transform: uppercase;">
                        <!---------------- TABLA ORIGEN-------------------------->
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-9">
                  <div class="TablaMovimientoGestion" id="TablaMovimientoGestion" name="TablaMovimientoGestion">
                    <!------------------ TABLA DE MOVIMIENTOS DE GESTIONES---------------------------------------->
                  </div>
                </div>
                <div class=" col-3">

                  <ul class="nav nav-pills nav-fill btn-secondary  GESTIONES">
                    <li class="nav-item ">
                      <button type="button" data-toggle="modal" data-target="#alarma" class="btn btn-secondary btn-block">Alarma Seg.</button>
                    </li>
                    <li class="nav-item ">

                      <button type="button" data-toggle="modal" data-target="#promesa" class="btn btn-secondary btn-block">Promesa Pago</button>
                    </li>
                    <li class="nav-item ">
                      <button type="button" data-toggle="modal" data-target="#pago" class="btn btn-secondary btn-block">Pago X Conf.</button>
                    </li>
                  </ul>

                  <div class="col-sm-12">
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="3" maxlength="245" require></textarea>
                  </div>
                  <div class="col-sm-12">
                    <?php if ($gt == 1) { ?>
                      <button type="button" id="insert2" name="insert2" onclick="disabledBotomInsert2()" id="save" class="btn btn-dark btn-block">Guardar</button>
                    <?php } else { ?>
                      <button type="button" id="insert2" name="insert2" onclick="disabledBotomInsert()" id="save" class="btn btn-dark btn-block">Guardar</button>
                    <?php   }  ?>
                  </div>

                  <!--------------------------------- MODALES DE BOTONERA GESTIONES----------------------------------------------------------------------------------------------------------------------------->

                  <div class="modal fade" id="alarma" tabindex="-1" role="dialog" aria-labelledby="alarma" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Alarma De Seguimiento</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group col-12 row ">
                            <div class="form-group col-12 row ">
                              <a for="saldo_ven_q" class="col-sm-2 col-form-label">Fecha</a>
                              <div class="col-sm-5">
                                <input class="form-control form-control-sm " onchange="fechaAlarma()" name="fecha" id="fecha" type="date">
                              </div>
                              <a for="pago_min_q" class="col-sm-2 col-form-label">Hora</a>
                              <div class="col-sm-3">
                                <input class="form-control form-control-sm " name="hora" id="hora" type="time">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="promesa" tabindex="-1" role="dialog" aria-labelledby="promesa" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Promesa De Pago</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group col-12 row ">
                            <div class="form-group col-12 row ">
                              <a for="fecha_pp" class="col-sm-4 col-form-label">Fecha</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " onchange="fechaPromesa()" name="fecha_pp" id="fecha_pp" type="date">
                              </div>
                              <a for="hora_pp" class="col-sm-4 col-form-label">Hora</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " name="hora_pp" id="hora_pp" type="time">
                              </div>
                              <a for="monto_pp" class="col-sm-4 col-form-label">Monto</a>
                              <div class="col-sm-8">
                                <input style="text-align:right;" class="form-control form-control-sm " name="monto_pp" id="monto_pp" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="modal fade" id="pago" tabindex="-1" role="dialog" aria-labelledby="pago" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Pago Por Confirmar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group col-12 row ">
                            <div class="form-group col-12 row ">
                              <a for="saldo_ven_q" class="col-sm-4 col-form-label">Fecha</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " onchange="fechaPago()" name="fecha_pago" id="fecha_pago" type="date">
                              </div>
                              <a for="pago_min_q" class="col-sm-4 col-form-label">No.Boleta</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " name="boleta" id="boleta" type="text">
                              </div>
                              <a for="pago_min_q" class="col-sm-4 col-form-label">Monto</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " name="monto_pago" id="monto_pago" type="text">
                              </div>
                              <a for="pago_min_q" class="col-sm-4 col-form-label">% Desc.</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " name="descuento" id="descuento" type="text">
                              </div>
                              <a for="pago_min_q" class="col-sm-4 col-form-label">Token</a>
                              <div class="col-sm-8">
                                <input class="form-control form-control-sm " name="token" id="token" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>

            </form>
            <!---------------------------------FINALIZA FORMULARIO DE INSERT PRINCIPAL----------------------------------------------------------------------------------------------------------------------------->
          </div>
        </div>

      </div>
      <div class="tab-pane" id="two" role="tabpanel" aria-labelledby="two-tab"></br>
        <div class="row">&nbsp; &nbsp;
          <div>
            <a onclick="fntDibujoInvestigaCasos()" class="alert alert-info"><i class="fal fa-search"></i></a>
          </div>
          <div class="col-4">
            <input class="form-control form-control-sm" name="buscarInvestigaCasos" id="buscarInvestigaCasos" type="text"></br>
          </div>
        </div></br>

        <div class="tabla_investiga_casos" id="tabla_investiga_casos" name='tabla_investiga_casos' style="text-transform: uppercase;">
          <!---------------- TABLA INVESTIGA CASOS-------------------------->
        </div><br>

        <div class="form-group col-12 row ">

          <div class="form-group col-6 row ">
            <a for="investiga_nombre" class="col-sm-3 col-form-label">NOMBRE</a>
            <div class="col-sm-9">
              <input class="form-control form-control-sm " name="investiga_nombre" id="investiga_nombre" type="text" disabled>
            </div>
            <a for="investiga_identificacion" class="col-sm-3 col-form-label">IDENTIFICACION</a>
            <div class="col-sm-4">
              <input class="form-control form-control-sm " name="investiga_identificacion" id="investiga_identificacion" type="text" disabled>
            </div>
            <div class="col-5"></div>
            <a for="investiga__nit" class="col-sm-3 col-form-label">NIT</a>
            <div class="col-sm-4">
              <input class="form-control form-control-sm " name="investiga__nit" id="investiga__nit" type="text" disabled>
            </div>
          </div>

          <div class="form-group col-6 row ">
            <tr class="nav nav-pills nav-fill btn-secondary">
              <td class="nav-item">
                <button type="button" data-toggle="modal" id="investiga_casos_telefonos" data-target="#investiga_telefonos" class="btn btn-secondary btn-block">Telefonos</button>
              </td>
              <td class="nav-item">
                <button type="button" data-toggle="modal" id="investiga_casos_direcciones" data-target="#investiga_direcciones" class="btn btn-secondary btn-block">Direccion</button>
              </td>
              <td class="nav-item">
                <button type="button" data-toggle="modal" id="investiga_casos_correos" data-target="#investiga_correos" class="btn btn-secondary btn-block">Correos</button>
              </td>
            </tr>
          </div>

        </div>

        <input name="InvestigaFormulario" id="InvestigaFormulario" type="hidden"></br>
        <div class="tabla_investiga_formulario" id="tabla_investiga_formulario" name='tabla_investiga_casos' style="text-transform: uppercase;">
          <!---------------- TABLA INVESTIGA CASOS-------------------------->
        </div>
        <!----------------------------------------------------------- MODALES---------------------------------------------------------------------->
        <input name="investiga_codiclie" id="investiga_codiclie" type="hidden"></br>


        <div class="modal fade" id="investiga_telefonos" tabindex="-1" role="dialog" aria-labelledby="investiga_telefonos" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TELEFONOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="tabla_investiga_telefonos" id="tabla_investiga_telefonos" name="tabla_investiga_telefonos">
                  <!---------------- TABLA TELEFONOS---------------------------------------------------------->
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="investiga_direcciones" tabindex="-1" role="dialog" aria-labelledby="investiga_direcciones" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DIRECCIONES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formDataDireccionInvestiga" method="POST">
                  <input name="a_direcciones" id="a_direcciones" type="hidden">
                  <input name="a_niu" id="a_niu" type="hidden">
                </form>
                <div class="tabla_investiga_direcciones" id="tabla_investiga_direcciones" name="tabla_investiga_direcciones">
                  <!---------------- TABLA DIRECCIONES---------------------------------------------------------->
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="investiga_correos" tabindex="-1" role="dialog" aria-labelledby="investiga_correos" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CORREOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="tabla_investiga_correo" id="tabla_investiga_correo" name="tabla_investiga_correo">
                  <!---------------- TABLA CORREOS---------------------------------------------------------->
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>


      </div>
      <div class="tab-pane" id="thre" role="tabpanel" aria-labelledby="thre-tab">

        <div class="form-group col-12 row ">
          <div class="form-group col-12 row ">
            <div class="col-12">
              </br>
            </div>
            <div class="col-12">
              <div class="form-group row ">
                <a for="DIP" class="col-sm-1 col-form-label" style=" text-align: right;" disabled>DPI</a>
                <div class="col-sm-1">
                  <input class="form-control form-control-sm " name="DIP" id="DIP" type="text" value="<?php echo $IDENTIFI ?>" disabled>
                </div>
                <a for="Nit" class="col-sm-1 col-form-label" style=" text-align: right;">Nit</a>
                <div class="col-sm-1">
                  <input class="form-control form-control-sm " name="Nit" id="Nit" type="text" value="<?php echo $NIT ?>" disabled>
                </div>
                <a for="Municipio" class="col-sm-1 col-form-label" style=" text-align: right;">Municipio</a>
                <div class="col-sm-2">
                  <input class="form-control form-control-sm " name="Municipio" id="Municipio" type="text" value="<?php echo $MUNI ?>" disabled>
                </div>
                <a for="Departamento" class="col-sm-1 col-form-label" style=" text-align: right;">Departamento</a>
                <div class="col-sm-2">
                  <input style="text-align:right;" class="form-control form-control-sm " name="Departamento" id="Departamento" type="text" value="<?php echo $DEPTO ?>" disabled>
                </div>
                <a for="Expediente" class="col-sm-1 col-form-label" style=" text-align: right;">Tiene Expediente</a>
                <div class="col-sm-1">
                  <form id="formExpediente" method="POST">
                    <input name="a_Expediente" id="a_Expediente" type="hidden" value="<?php echo $EXPEDIEN ?>">
                    <input name="num_Expediente" id="num_Expediente" type="hidden" value="<?php echo $numCaso ?>">
                  </form>
                  <?PHP
                  if ($EXPEDIEN == 1) {
                  ?>
                    <input class="form-control form-control-sm " name="Expediente" id="Expediente" onclick="fntUpdateActiveExpedien()" type="checkbox" value="1" checked>
                  <?PHP
                  } else {
                  ?>
                    <input class="form-control form-control-sm " name="Expediente" id="Expediente" onclick="fntUpdateActiveExpedien()" type="checkbox" value="1">
                  <?PHP
                  }
                  ?>

                </div>
              </div>
            </div>
            <div class="col-12">
              <hr>
            </div>
            <div class="col-12">
              <div class="form-group row ">
                <a for="Deudor" class="col-sm-1 col-form-label" style=" text-align: right;">Deudor</a>
                <div class="col-sm-3">
                  <input class="form-control form-control-sm " name="Deudor" id="Deudor" type="text" value="<?php echo $DEUDOR ?>" disabled>
                </div>
                <a for="Codeudor" class="col-sm-1 col-form-label" style=" text-align: right;">Codeudor</a>
                <div class="col-sm-3">
                  <input class="form-control form-control-sm " name="Codeudor" id="Codeudor" type="text" value="<?php echo $CODEUDOR ?>" disabled>
                </div>
                <a for="Juicio" class="col-sm-1 col-form-label" style=" text-align: right;">Juicio</a>
                <div class="col-sm-3">
                  <input class="form-control form-control-sm " name="Juicio" id="Juicio" type="text" value="<?php echo $JUICIO ?>" disabled>
                </div>
              </div>
            </div>
            <div class="col-12">
              <hr>
            </div>
            <div class="col-2"></div>
            <a for="1" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>1</h4>
            </a>
            <a for="2" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>2</h4>
            </a>
            <a for="3" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>3</h4>
            </a>
            <a for="4" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>4</h4>
            </a>
            <a for="5" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>5</h4>
            </a>
            <a for="6" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>6</h4>
            </a>
            <a for="7" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>7</h4>
            </a>
            <a for="8" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>8</h4>
            </a>
            <a for="9" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>9</h4>
            </a>
            <div class="col-1"></div>
            <div class="col-1"></div>
            <a for="Quetzales" class="col-sm-1 col-form-label">Quetzales</a>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV1Q" id="CICLOV1Q" type="text" value="<?php echo $CICLOV1Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV2Q" id="CICLOV2Q" type="text" value="<?php echo $CICLOV2Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV3Q" id="CICLOV3Q" type="text" value="<?php echo $CICLOV3Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV4Q" id="CICLOV4Q" type="text" value="<?php echo $CICLOV4Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV5Q" id="CICLOV5Q" type="text" value="<?php echo $CICLOV5Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV6Q" id="CICLOV6Q" type="text" value="<?php echo $CICLOV6Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV7Q" id="CICLOV7Q" type="text" value="<?php echo $CICLOV7Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV8Q" id="CICLOV8Q" type="text" value="<?php echo $CICLOV8Q ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV9Q" id="CICLOV9Q" type="text" value="<?php echo $CICLOV9Q ?>" disabled>
            </div>
            <div class="col-1"></div>
            <div class="col-1"></div>
            <a for="Dolares" class="col-sm-1 col-form-label">Dolares</a>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV1D" id="CICLOV1D" type="text" value="<?php echo $CICLOV1D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV2D" id="CICLOV2D" type="text" value="<?php echo $CICLOV2D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV3D" id="CICLOV3D" type="text" value="<?php echo $CICLOV3D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV4D" id="CICLOV4D" type="text" value="<?php echo $CICLOV4D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV5D" id="CICLOV5D" type="text" value="<?php echo $CICLOV5D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV6D" id="CICLOV6D" type="text" value="<?php echo $CICLOV6D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV7D" id="CICLOV7D" type="text" value="<?php echo $CICLOV7D ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="CICLOV8D" id="CICLOV8D" type="text" value="<?php echo $CICLOV8D ?>" disabled>
            </div>
            <div class="col-3"></div>
            <div class="col-12">
              <hr>
            </div>
            <div class="col-2"></div>
            <a for="3" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>3</h4>
            </a>
            <a for="6" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>6</h4>
            </a>
            <a for="9" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>9</h4>
            </a>
            <a for="12" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>12</h4>
            </a>
            <a for="18" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>18</h4>
            </a>
            <a for="24" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>24</h4>
            </a>
            <a for="36" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>36</h4>
            </a>
            <a for="48" class="col-sm-1 col-form-label" style="color:#546C57; text-align: center;">
              <h4>48</h4>
            </a>
            <div class="col-2"></div>
            <a for="saldo_ven_s" class="col-sm-2 col-form-label" style="text-align: right;"> Meses De Convenio</a>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES3" id="MESES3" type="text" value="<?php echo $MESES3 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES6" id="MESES6" type="text" value="<?php echo $MESES6 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES9" id="MESES9" type="text" value="<?php echo $MESES9 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES12" id="MESES12" type="text" value="<?php echo $MESES12 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES18" id="MESES18" type="text" value="<?php echo $MESES18 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES24" id="MESES24" type="text" value="<?php echo $MESES24 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES36" id="MESES36" type="text" value="<?php echo $MESES36 ?>" disabled>
            </div>
            <div class="col-sm-1">
              <input style="text-align:right;" class="form-control form-control-sm " name="MESES48" id="MESES48" type="text" value="<?php echo $MESES48 ?>" disabled>
            </div>
          </div>
        </div>

        <hr>
        <div class="form-group col-3"></div>

        <ul class="nav nav-pills nav-fill btn-secondary CONSULTAINFORMACION">
          <li class="nav-item">
            <button type="button" onclick="fntDibujoTablaTelefonos()" data-toggle="modal" data-target="#telefonos" class="btn btn-secondary btn-block">Telefonos</button>
          </li>
          <li class="nav-item">
            <button type="button" onclick="fntDibujoInfoDirecciones()" data-toggle="modal" data-target="#direcciones_m_info" class="btn btn-secondary btn-block">Direcciones</button>
          </li>
          <li class="nav-item">
            <button type="button" onclick="fntDibujoInfoCorreo()" data-toggle="modal" data-target="#correos_m_info_" class="btn btn-secondary btn-block">Correos</button>
          </li>
        </ul>


      </div>
      <div class="tab-pane" id="four" role="tabpanel" aria-labelledby="four-tab">.

      </div>
      <div class="tab-pane" id="five" role="tabpanel" aria-labelledby="five-tab">

      </div>
    </div>
  </div>
  </div>
  </div>
</section>

<!--------------------------------- MODALES DE BOTONERA AGREGAR----------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="telefonos" tabindex="-1" role="dialog" aria-labelledby="telefonos" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Telefonos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataTelefonosBoton" method="POST">
          <input name="a_telefono" id="a_telefono" type="hidden">
          <input name="a_niu_telefono" id="a_niu_telefono" type="hidden">
        </form>
        <div class="tablaTelefonos" id="tablaTelefonos" name="tablaTelefonos">
          <!---------------- TABLA TELEFONOS---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="cuentas" tabindex="-1" role="dialog" aria-labelledby="cuentas" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cuentas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tablaCuentas" id="tablaCuentas" name="tablaCuentas">
          <!---------------- TABLA CUENTAS---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="m_telefonos" tabindex="-1" role="dialog" aria-labelledby="m_telefonos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ Telefonos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formDataTelefono_m" method="POST">
          <!---------------- DATOS DE FORMULARIO PRINCIPAL---------------------------------------------------------->
          <input name="codiclie_tel" id="codiclie_tel" type="hidden" value="<?php echo  $codiclie ?>">
          <div class="tablaNumProd" id="tablaNumProd" name="tablaNumProd">
            <!---- TABLA NUMERO PROVEEDOR DE SERVICIO------------->
          </div>
          <input name="numeroDig" id="numeroDig" type="hidden">
          <input name="telefono_proServ" id="telefono_proServ" type="hidden">

          <p id="demo"></p>

          <div class="form-group col-12 row ">
            <div class="form-group col-12 row ">
              <a for="numero" class="col-sm-4 col-form-label">Numero</a>
              <div class="col-sm-4">
                <input class="form-control form-control-sm " onchange="fntNumExtract()" name="numero" id="numero" type="text">
              </div>
              <div class="col-4"></div>
              <a for="propietario" class="col-sm-4 col-form-label">Propietario</a>
              <div class="col-sm-8">
                <input class="form-control form-control-sm " name="propietario" id="propietario" type="text" required>
              </div>
              <a for="Owner" class="col-sm-4 col-form-label">Owner</a>
              <select class="form-control-sm col-sm-4" name="owner" id="owner">
                <option value="0">Seleccionar</option>
                <?php
                if (is_array($arrClaveTelefono) && (count($arrClaveTelefono) > 0)) {
                  reset($arrClaveTelefono);
                  foreach ($arrClaveTelefono as $rTMP['key'] => $rTMP['value']) {
                ?>
                    <option value="<?php echo  $rTMP["value"]['CLAVE']; ?>"><?php echo  $rTMP["value"]['CLAVE']; ?> - <?php echo  $rTMP["value"]['DESCRIP']; ?></option>
                <?PHP
                  }
                }
                ?>
              </select>
              <div class="col-4"></div>
              <a for="saldo_ini_q" class="col-sm-12 col-form-label">Observaciones</a>
              <div class="col-sm-12">
                <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="fntInsertTelefono()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="m_direccion" tabindex="-1" role="dialog" aria-labelledby="m_direccion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ Direccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataDireccion_m" method="POST">
          <!---------------- DATOS DE FORMULARIO PRINCIPAL---------------------------------------------------------->
          <input name="codiclie_dir" id="codiclie_dir" type="hidden" value="<?php echo  $codiclie ?>">

          <div class="form-group col-12 row ">
            <div class="form-group col-12 row ">
              <a for="direccion" class="col-sm-2 col-form-label">Direccion</a>
              <div class="col-sm-10">
                <input class="form-control form-control-sm " name="direccion" id="direccion" type="text">
              </div>
              <a for="owner_dir" class="col-sm-2 col-form-label">Owner</a>
              <select class="form-control-sm col-sm-4" name="owner_dir" id="owner_dir">
                <option value="0">Seleccionar</option>
                <?php
                if (is_array($arrClaveTelefono) && (count($arrClaveTelefono) > 0)) {
                  reset($arrClaveTelefono);
                  foreach ($arrClaveTelefono as $rTMP['key'] => $rTMP['value']) {
                ?>
                    <option value="<?php echo  $rTMP["value"]['CLAVE']; ?>"><?php echo  $rTMP["value"]['CLAVE']; ?> - <?php echo  $rTMP["value"]['DESCRIP']; ?></option>
                <?PHP
                  }
                }
                ?>
              </select>
              <div class="col-6"></div>
              <a for="propietario_dir" class="col-sm-2 col-form-label">Propietario</a>
              <div class="col-sm-4">
                <input class="form-control form-control-sm " name="propietario_dir" id="propietario_dir" type="text" required>
              </div>
              <div class="col-4"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="fntInsertDireccion()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="m_correos" tabindex="-1" role="dialog" aria-labelledby="m_correos" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ Correos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataCorreo_m" method="POST">
          <!---------------- DATOS DE FORMULARIO PRINCIPAL---------------------------------------------------------->
          <input name="codiclie_mail" id="codiclie_mail" type="hidden" value="<?php echo  $codiclie ?>">

          <div class="form-group col-12 row ">
            <div class="form-group col-12 row ">
              <a for="correo" class="col-sm-2 col-form-label">Correo</a>
              <div class="col-sm-10">
                <input class="form-control form-control-sm " name="correo" id="correo" type="text">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="fntInsertCorreo()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>



<!--------------------------------- MODALES DE MAS INFORMACION----------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="direcciones_m_info" tabindex="-1" role="dialog" aria-labelledby="direcciones_m_info" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Direcciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataDireccionMInfo" method="POST">
          <input name="mInfoCodiclie" id="mInfoCodiclie" type="hidden" value="<?php echo $codiclie; ?>">
          <input name="a_direccion_m_info" id="a_direccion_m_info" type="hidden">
          <input name="id_direccion_m_info" id="id_direccion_m_info" type="hidden">
        </form>
        <div class="tablaDireccionesMInfo" id="tablaDireccionesMInfo" name="tablaDireccionesMInfo">
          <!---------------- TABLA TELEFONOS---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="correos_m_info_" tabindex="-1" role="dialog" aria-labelledby="correos_m_info_" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Correos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataCorreosMInfo" method="POST">
          <input name="CorreoInfoCodiclie" id="CorreoInfoCodiclie" type="hidden" value="<?php echo $codiclie; ?>">
          <input name="a_correos_m_info" id="a_correos_m_info" type="hidden">
          <input name="id_correos_m_info" id="id_correos_m_info" type="hidden">
        </form>
        <div class="tablaCorreosMInfo" id="tablaCorreosMInfo" name="tablaDireccionesMInfo">
          <!---------------- TABLA TELEFONOS---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--------------------------------- MODALES DE SEGUNDO NIVEL GESTIONES----------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="update_telefono_modal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Telefono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDataTelefono_update" method="POST">
          <input name="niu_tel" id="niu_tel" type="hidden">
          <div class="form-group col-12 row ">
            <div class="form-group col-12 row ">
              <a for="numero" class="col-sm-4 col-form-label">Numero</a>
              <div class="col-sm-4">
                <input class="form-control form-control-sm " onchange="fntNumExtract()" name="numero_tel" id="numero_tel" type="text" disabled>
              </div>
              <div class="col-4"></div>
              <a for="propietario" class="col-sm-4 col-form-label">Propietario</a>
              <div class="col-sm-8">
                <input class="form-control form-control-sm " name="propietario_tel" id="propietario_tel" type="text" required>
              </div>
              <a for="Owner" class="col-sm-4 col-form-label">Owner</a>
              <select class="form-control-sm col-sm-4" name="owner_tel" id="owner_tel">
                <option value="0">Seleccionar</option>
                <?php
                if (is_array($arrClaveTelefono) && (count($arrClaveTelefono) > 0)) {
                  reset($arrClaveTelefono);
                  foreach ($arrClaveTelefono as $rTMP['key'] => $rTMP['value']) {
                ?>
                    <option value="<?php echo  $rTMP["value"]['CLAVE']; ?>"><?php echo  $rTMP["value"]['CLAVE']; ?> - <?php echo  $rTMP["value"]['DESCRIP']; ?></option>
                <?PHP
                  }
                }
                ?>
              </select>
              <div class="col-4"></div>
              <a for="saldo_ini_q" class="col-sm-12 col-form-label">Observaciones</a>
              <div class="col-sm-12">
                <textarea class="form-control" name="observaciones_tel" id="observaciones_tel" rows="3"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="fntUpdateTelefono()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!--------------------------------- MODAL ESTADO DE CUENTA----------------------------------------------------------------------------------------------------------------------------->



<div class="modal fade" id="estadoDeCuenta" tabindex="-1" role="dialog" aria-labelledby="estadoDeCuenta" aria-hidden="true">
  <div class="modal-dialog full-screen" role="document">
    <div class="modal-content full-screen">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Estado De Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tablaEstadoDeCuenta" id="tablaEstadoDeCuenta" name="tablaEstadoDeCuenta">
          <!---------------- TABLA Estado Cuenta---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!--------------------------------- MODAL ESTADO DE CUENTA----------------------------------------------------------------------------------------------------------------------------->
<input type="hidden" name="codiclie_archivo" id="codiclie_archivo" value="<?php echo $codiclie ?>">
<div class="modal fade" id="documentosDigitales" tabindex="-1" role="dialog" aria-labelledby="documentosDigitales" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizacion de Documentos Digitalizados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tablaDocumentosDigitales" id="tablaDocumentosDigitales" name="tablaDocumentosDigitales">
          <!---------------- TABLA Documentos---------------------------------------------------------->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
 ///////////////CONTADOR DE SEGUNDOS   

 var n = 0;
  var l = document.getElementById("number_segundos_");
  window.setInterval(function() {
    l.innerHTML = n;
    n++;
  }, 1000);


  document.getElementById('contador___segundos').style.display = 'none';
  
  function fnCopyCliente() {
    var copyText = document.getElementById("clipboard");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alertify.notify('DATOS COPIADOS!', 'success', 5, function() {
      console.log('dismissed');
    });
  }

  document.getElementById('cliente').style.display = 'none';

  function move() {
    var timeMinute = $("#tiempo_de_barra").val();;

    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, (60 * 10) * timeMinute);

    function frame() {
      if (width >= 100) {
        clearInterval(id);
      } else {
        width++;
        elem.style.width = width + '%';
      }

      if (width <= 50) {
        elem.style.backgroundColor = "#28a745";
      }
      if (width >= 51) {
        elem.style.backgroundColor = "#ffc107";
      }
      if (width >= 100) {
        elem.style.backgroundColor = "#dc3545";
      }

      if (width == 100) {
        alertify.set('notifier', 'position', 'top-center');
        alertify.error('Esta llamada esta sobre tiempo!!!');
      }

    }
  }

  function fntSelectTelefono() {

    var strTelefono = $("#hid_activo").val();

    var boolCheckPass = (strTelefono == 1) ? true : false;
    $("[name=activo]").prop('checked', boolCheckPass);
    $("#activo_").val(strTelefono);
    $("#activo_chek").val(strTelefono);

  };

  function fntNumExtract() {

    var strTelefono = $("#numero").val();
    var resNumero = strTelefono.substr(0, 4);

    $("#numeroDig").val(resNumero);
    $("#numeroDig_update").val(resNumero);
    fntVarCodigoServicio()
    fntValidacionInsertTelefono()

    fntNumExtractProServ()
  }

  function fntNumExtractProServ() {

    var strProServ = $("#proServ").val();
    $("#telefono_proServ").val(strProServ);

    //alert(strProServ + "                         strProServ");
  }


  ////////////////////SELECCION DE DATOS TIPOLOGIA//////////////////////////////////

  function fntSelectOrigen() {

    var intParametro = $("#origen").val();
    intParametro = (intParametro * 1)

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strOrigen = $("#hid_origen_" + intParametro).val();
      var strOrigenId = $("#hid_origen_id_" + intParametro).val();
      // alert(strOrigen + "                         strOrigen");
      //  alert(strOrigenId + "                         strOrigenId");

      // $("#origen").val(strOrigen);
      $("#POST_TIPOLOGI").val(strOrigen);
      $("#POST_CTIPOLOG").val(strOrigenId);
    }
  }

  function fntSelectPlace() {

    var intParametro = $("#place").val();
    intParametro = (intParametro * 1)

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strPlace = $("#hid_place_" + intParametro).val();
      var strPlaceId = $("#hid_place_id_" + intParametro).val();
      //alert(strPlace + "                         strPlace");

      // $("#place").val(strPlace);
      $("#POST_PLACE").val(strPlace);
      $("#POST_CPLACE").val(strPlaceId);
    }

  }

  function fntSelectReceptor() {

    var intParametro = $("#receptor").val();
    intParametro = (intParametro * 1)

    // alert(intParametro)

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strReceptor = $("#hid_receptor_" + intParametro).val();
      var strReceptorId = $("#hid_receptor_id_" + intParametro).val();
      //alert(strReceptor + "                         strReceptor");

      //$("#receptor").val(strReceptor);
      $("#POST_CONCLUSI").val(strReceptor);
      $("#POST_CCONCLUS").val(strReceptorId);
    }

    fntDibujoTipologia()
  }

  function fntSelectTipologia() {

    var intParametro = $("#tipologia").val();
    intParametro = (intParametro * 1)

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strTipologia = $("#hid_tipologia_" + intParametro).val();
      var hid_tipologia_crtestad_ = $("#hid_tipologia_crtestad_" + intParametro).val();
      var hid_tipologia_subconcl_ = $("#hid_tipologia_subconcl_" + intParametro).val();
      var hid_tipologia_csubconc_ = $("#hid_tipologia_csubconc_" + intParametro).val();
      var hid_tipologia_ponderacion_ = $("#hid_tipologia_ponderacion_" + intParametro).val();
      //alert(strTipologia + "                         strTipologia");

      // $("#tipologia").val(strTipologia);

      $("#POST_RTESTADO").val(strTipologia);
      $("#POST_CRTESTAD").val(hid_tipologia_crtestad_);
      $("#POST_SUBCONCL").val(hid_tipologia_subconcl_);
      $("#POST_CSUBCONC").val(hid_tipologia_csubconc_);
      $("#POST_PONDERACION").val(hid_tipologia_ponderacion_);
    }

    fntDibujoRdm()

    var tipologia = $("#POST_RTESTADO").val();
    var localizado = $("#localizado").val();

    var a = tipologia.trim();
    var b = localizado.trim();

    //alert(a + "                         a_tipologia");
    //alert(b + "                         a_localizado");

    if (a == b) {
      document.getElementById("rdm").disabled = false;
    } else {
      document.getElementById("rdm").disabled = true;
      document.getElementById("observaciones").focus();
    }
  }

  function fntSelectRdm() {

    var intParametro = $("#rdm").val();
    intParametro = (intParametro * 1)

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strRdm = $("#hid_rmd_" + intParametro).val();
      var strRdmId = $("#hid_rdm_id_" + intParametro).val();
      //alert(strReceptor + "                         strReceptor");
      // $("#rdm").val(strRdm);
      $("#POST_RDM").val(strRdm);
      $("#POST_CRDM").val(strRdmId);
    }
    document.getElementById("observaciones").focus();
  }


  ////////////////////SELECCION MODALES DE SEGUNDO NIVEL CON DATA//////////////////////////////////

  function fntSelectEditTelefono(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strTelefonoId = $("#hid_tel_niu_" + intParametro).val();
      var strTelefonoNum = $("#hid_tel_numero_" + intParametro).val();
      var strTelefonoProp = $("#hid_tel_propietario_" + intParametro).val();
      var strTelefonoOrigen = $("#hid_tel_origen_" + intParametro).val();
      var strTelefonoObser = $("#hid_tel_obserbac_" + intParametro).val();
      //alert(strReceptor + "                         strReceptor");
      $("#niu_tel").val(strTelefonoId);
      $("#numero_tel").val(strTelefonoNum);
      $("#propietario_tel").val(strTelefonoProp);
      $("#owner_tel").val(strTelefonoOrigen);
      $("#observaciones_tel").val(strTelefonoObser);
    }

    $("#update_telefono_modal").modal('show')
  }


  //////////////////////////////SELECCION DE SUBMENU INVESTIGA ///////////////////////////////

  document.getElementById("investiga_casos_telefonos").disabled = true;
  document.getElementById("investiga_casos_direcciones").disabled = true;
  document.getElementById("investiga_casos_correos").disabled = true;



  function fntSelectInvestigaFormulario(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strCasosId = $("#hid_investiga_casos_id" + intParametro).val();
      var strCasosNombre = $("#hid_investiga_casos_nombre" + intParametro).val();
      var strCasosDpi = $("#hid_investiga_casos_dpi" + intParametro).val();
      var strCasosNit = $("#hid_investiga_casos_nit" + intParametro).val();

      var strCasosCodiclie = $("#hid_investiga_casos_codiclie" + intParametro).val();

      //alert(strCasosNit + "                         strCasosNit");
      $("#InvestigaFormulario").val(strCasosId);
      $("#investiga_nombre").val(strCasosNombre);
      $("#investiga_identificacion").val(strCasosDpi);
      $("#investiga__nit").val(strCasosNit);

      $("#investiga_codiclie").val(strCasosCodiclie);

      document.getElementById("investiga_casos_telefonos").disabled = false;
      document.getElementById("investiga_casos_direcciones").disabled = false;
      document.getElementById("investiga_casos_correos").disabled = false;

      fntDibujoInvestigaFormulario()

      fntDibujoInvestigaTelefono()

      fntDibujoInvestigaDireccion()

      fntDibujoInvestigaCorreo()

    }
  }

  function fntSelectCheked_a(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strHidCheckdA = $("#hid_check_a_" + intParametro).val();
      var strHidCheckdNiu = $("#hid_check_niu_" + intParametro).val();
      //alert(strCasosNit + "                         strCasosNit");
      $("#a_direcciones").val(strHidCheckdA);
      $("#a_niu").val(strHidCheckdNiu);
    }
    fntUpdateActiveDireccion()
  }

  function fntSelectCheked_a_telefonos(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strHidCheckdA = $("#hid_a_telefono_" + intParametro).val();
      var strHidCheckdNiu = $("#hid_tel_niu_" + intParametro).val();
      //alert(strCasosNit + "                         strCasosNit");
      $("#a_telefono").val(strHidCheckdA);
      $("#a_niu_telefono").val(strHidCheckdNiu);
    }
    fntUpdateActiveTelefonoBoton()
  }


  /////////////////// SECCION SUBMENU MAS INFORMACION //////////////////

  function fntSelectCheked_info_a_dire_m_info(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strHidCheckdAInfo = $("#hid_a_mas_info_direc_" + intParametro).val();
      var strHidCheckdNiuInfo = $("#hid_niu_mas_info_direc" + intParametro).val();
      //alert(strHidCheckdNiuInfo + "                         strHidCheckdNiuInfo");
      $("#a_direccion_m_info").val(strHidCheckdAInfo);
      $("#id_direccion_m_info").val(strHidCheckdNiuInfo);
    }
    fntUpdateActiveInfoDireccion()
  }


  function fntSelectCheked_info_a_correo_info(intParametro) {

    intParametro = !intParametro ? 0 : intParametro;
    if (intParametro > 0) {
      var strHidCheckdAInfo = $("#hid_a_mas_info_correo_" + intParametro).val();
      var strHidCheckdNiuInfo = $("#hid_niu_mas_info_correo_" + intParametro).val();
      //alert(strHidCheckdNiuInfo + "                         strHidCheckdNiuInfo");
      $("#a_correos_m_info").val(strHidCheckdAInfo);
      $("#id_correos_m_info").val(strHidCheckdNiuInfo);
    }
    fntUpdateActiveInfoCorreos()
  }

  function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }


  function myTime() {
    var d = new Date();
    var hora = addZero(d.getHours());
    var minuto = addZero(d.getMinutes());
    var segundo = addZero(d.getSeconds());
    $("#TIME").val(hora + ":" + minuto + ":" + segundo);

    var hora = addZero(d.getHours());
    var hora = hora * 3600;
    var minuto = addZero(d.getMinutes());
    var minuto = minuto * 60;
    var segundo = addZero(d.getSeconds());

    var tiempo = hora + minuto + segundo;
    $("#TIME_SEG").val(tiempo);
  }

  function myTimeEnd() {
    var d = new Date();
    var hora = addZero(d.getHours());
    var minuto = addZero(d.getMinutes());
    var segundo = addZero(d.getSeconds());
    $("#POST_HORA_FIN").val(hora + ":" + minuto + ":" + segundo);

    var hora = addZero(d.getHours());
    var hora = hora * 3600;
    var minuto = addZero(d.getMinutes());
    var minuto = minuto * 60;
    var segundo = addZero(d.getSeconds());

    var tiempo = hora + minuto + segundo;
    $("#POST_HORA_FIN_SEG").val(tiempo);
  }

  function fechaAlarma() {
    var fechaIngreso = $("#fecha").val();
    var fechaActual = $("#POST_FECHAINIDIA").val();

    if (fechaIngreso < fechaActual) {
      alertify.alert('ATENCION!', 'No es posible agregar alarmas con fecha menor a la del dia actual!');
      document.getElementById("fecha").value = "";
    }
  }

  function fechaPromesa() {
    var fechaIngreso = $("#fecha_pp").val();
    var fechaActual = $("#POST_FECHAINIDIA").val();

    if (fechaIngreso < fechaActual) {
      alertify.alert('ATENCION!', 'No es posible agregar alarmas con fecha menor a la del dia actual!');
      document.getElementById("fecha_pp").value = "";
    }
  }

  function fechaPago() {
    var fechaIngreso = $("#fecha_pago").val();
    var fechaActual = $("#POST_FECHAINIDIA").val();

    if (fechaIngreso > fechaActual) {
      alertify.alert('ATENCION!', 'No es posible agregar pagos por confirmar con fecha mayor a la del dia actual!');
      document.getElementById("fecha_pago").value = "";
    }
  }

  function close_window() {
    window.close();
  }

  function disabledBotomInsert() {
    myTime()
    myTimeEnd()
    fntInsertEndWindow()
    document.getElementById('insert').disabled = true;
    document.getElementById('insert2').disabled = true;
  }

  function disabledBotomInsert2() {
    myTime()
    myTimeEnd()
    fntInsertIniWindowTrabajo()
    document.getElementById('insert').disabled = true;
    document.getElementById('insert2').disabled = true;
  }

  window.addEventListener('load', myTime, false)
</script>


<style>
  .full-screen {
    width: 250%;
    height: 100%;
    margin: 0;
    top: 5px;
    left: 15%;
  }

  div.textoDerecha {
    text-align: right;
    list-style: none;
  }

  .table-sm td,
  .table-sm th {
    padding: .1rem;
  }

  .colorTab {
    background: #546C57;
  }

  .nav-tabs .nav-item.show .nav-link,
  .nav-tabs .nav-link.active {
    background-color: #323830;
  }

  .form-control:disabled,
  .form-control[readonly] {
    background-color: #D4EFDF;
    opacity: 1;
  }

  .modal-content {
    background-color: #F7FFFA;
  }

  #myProgress {
    position: relative;
    width: 100%;
    height: 30px;
    background-color: #ddd;
  }

  #myBar {
    position: absolute;
    width: 1%;
    height: 100%;
    background-color: #4CAF50;
  }

  div.tableFixHeadInvestiga {
    height: 200px;
    overflow: scroll;
  }

  div.tableEstadoCuenta {
    height: 350px;
    overflow: scroll;
  }

  div.tableFixHead {
    width: 1180px;
    height: 326px;
    overflow: scroll;
  }

  .tableFixHead thead th {
    position: sticky;
    top: 0;
  }

  .tableFixHeadInvestiga thead th {
    position: sticky;
    top: 0;
  }
</style>