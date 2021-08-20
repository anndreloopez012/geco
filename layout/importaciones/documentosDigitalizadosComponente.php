<div id="loading-screen" style="display:none">
    <img src="../../asset/img/gif/spinning-circles.svg">
</div>


<div class="content-wrapper">
    <div class="container-fluid textoCentro ">
        <div class="row">
            <div class="col-12">
                </br>
            </div>
            <div class="col-1"></div>
            <div class="col-lg-10 fondo">
                <div class="card-body">
                    <div class="row">

                        <input type="text" class="form-control " id="txtNombreTipo" name="txtNombreTipo" placeholder="Nombre">

                        <div id='divFileUpload'></div>
                        <br<br><br><br><br><br><br>

                            <button onclick="fntSubmit()" class="button bg-success" ><i class="fas fa-plus" aria-hidden="true"></i> Guardar</button>
                            <button onclick="jsonObjUpload_Files['object'].reset();" class="button bg-info" ><i class="fas fa-trash" aria-hidden="true"></i> Reiniciar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fondo{
    background-color: white;
}
</style>