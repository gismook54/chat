<?php
$id = $_GET[ 'id' ];
$idAl = $_GET[ 'idAl' ];
$idG = $_GET[ 'idG' ];
$idta = $_GET[ 'idta' ];
?>
<form id="add-reply" name="add-reply">

    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Respuesta</label>
        <div class="col-lg-9">
            <textarea class="form-control" name="answer" rows="5" required></textarea>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Subir archivo</label>
        <div class="col-lg-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo-emp" name="photo-emp" data-toggle="custom-file-input">
                <label class="custom-file-label" for="photo-emp">Subir</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="progressOuter" class="progress push" style="display:none;">
                <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <span id="lpb" class="progress-bar-label">100%</span>
                </div>
            </div>
            <div id="msgBox"></div>
        </div>
    </div>
    <div class="form-group row">

        <div class="col-lg-12">
            <hr>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <button type="submit" class="btn btn-block btn-alt-primary">Enviar</button>
        </div>
    </div>
    <input type="hidden" name="idactivity" value="<?php echo $id; ?>">
    <input type="hidden" name="idgrupo" value="<?php echo $idG; ?>">
    <input type="hidden" name="idalumno" value="<?php echo $idAl; ?>">
    <input type="hidden" name="idta" value="<?php echo $idta; ?>">
</form>
<script>
    $( "#add-reply" ).submit( function ( event ) {
        var parametros = $( this ).serialize();
        $.ajax( {
            type: "POST",
            url: "ajax/add_reply.php",
            data: parametros,
            success: function ( datos ) {
                window.location = './';
            }
        } );
        event.preventDefault();
    } );

    var btn = document.getElementById( 'photo-emp' ),
        progressBar = document.getElementById( 'progressBar' ),
        progressOuter = document.getElementById( 'progressOuter' ),
        msgBox = document.getElementById( 'msgBox' ),
        labelPb = document.getElementById( 'lpb' );

    var uploader = new ss.SimpleUpload( {
        button: btn,
        url: 'ajax/upload04.php',
        name: 'uploadfile',
        hoverClass: 'hover',
        focusClass: 'focus',
        responseType: 'json',

        startXHR: function () {
            progressOuter.style.display = 'block';
            this.setProgressBar( progressBar );
        },
        onSubmit: function () {
            labelPb.innerHTML = 'Cargando...';
            btn.innerHTML = 'Espere...';
        },
        onComplete: function ( filename, response ) {

            btn.style.display = 'block';
            btn.innerHTML = '<i class="ion-upload"></i>&nbsp;Cargar de nuevo';
            progressOuter.style.display = 'none';

            if ( !response ) {
                msgBox.innerHTML = 'Lo sentimos, el archivo no se pudo subir trate de nuevo';
                return;
            }

            if ( response.success === true ) {

                msgBox.innerHTML = response.msg;



            } else {
                if ( response.msg ) {
                    msgBox.innerHTML = response.msg;

                } else {
                    msgBox.innerHTML = 'Ocurrio un error al tratar de subir su archivo, trate de nuevo.';
                }
            }
        },
        onError: function () {
            progressOuter.style.display = 'none';
            msgBox.innerHTML = 'No se pueden subir archivos en este momento';
        }
    } );
</script>