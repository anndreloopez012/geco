    <div class="content-wrapper">
        <div class="container-fluid textoCentro ">
            <div class="row">
                <div class="col-12">
                    </br></br></br></br></br></br>
                </div>
                <div class="col-3"></div>
                <div class="col-lg-6 fondo">
                    <div>
                        <h2>Geco2.0 en espera de datos...</h2>
                    </div>
                    </br>
                    <div>
                        <label for="META">META</label>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorMeta ?>" role="progressbar" style="width: <?php echo $porcentageGestirones ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorGestiones ?> / <?php echo $metaDia ?></b></div>
                        </div>
                    </div></br>
                    <div>
                        <label for="EFECTIVIDAD">EFECTIVIDAD</label>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorEfectividad ?>" role="progressbar" style="width: <?php echo $porcentagePonderacion ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorPonderacion ?> / <?php echo $efectividad ?></b></div>
                        </div>
                    </div></br>
                    <div>
                        <label for="RETENCION">RETENCION</label>
                        <div class="progress" style="height: 32px;">
                            <div class="progress-bar progress-bar-striped <?php echo $colorRetencion ?>" role="progressbar" style="width: <?php echo $porcentageV_reten ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><b><?php echo $valContadorRetencion ?>%</b></div>
                        </div>
                    </div>
                    </br>

                </div>
            </div>
        </div>
</section>


<style>
    .fondo {
        background: white !important;
    }

    .textoCentro {
        text-align: center;
    }
</style>