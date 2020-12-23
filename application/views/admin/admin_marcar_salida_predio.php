<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 23/12/2020
 * Time: 11:38
 */

$this->layout('admin/admin_master', [
'title' => $title,
'nombre' => $nombre,
'user_id' => $user_id,
'username' => $username,
'rol' => $rol,
]);


$resultado_visita = array(
    'name' => 'resultado_visita',
    'id' => 'resultado_visita',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
<link rel='stylesheet' href='<?php echo base_url() ?>/node_modules/fullcalendar/dist/fullcalendar.css'/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/daterangepicker.css"/>
<?php $this->stop() ?>
<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"></div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Visitas predio</h5>
                    </div>

                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                        href="#">×</a>
                            <h4 class="alert-heading">Acción exitosa!</h4>
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>

                    <div class="widget-content ">
                        <div class="container-fluid">
                            <div class="row">
                                <h2>Marcar Salida</h2>

                                <form class="form-vertical" action="<?php echo base_url()?>/predio/guardar_salida" method="post">
                                    <div class="control-group">
                                        <label class="control-label">Comentario de visita</label>
                                        <div class="controls">
                                            <?php echo form_textarea($resultado_visita); ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="predio_id" id="predio_id" value="<?php echo $predio_id; ?>">
                                    <input type="hidden" name="latitud" id="latitud">
                                    <input type="hidden" name="longitud" id="longitud">
                                    <div class="control-group">
                                        <button type="submit" class="btn btn-success">Marcar salida</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<script>
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;

        console.log('Your current position is:');
        console.log('Latitude : ' + crd.latitude);
        document.getElementById("latitud").value = crd.latitude;
        console.log('Longitude: ' + crd.longitude);
        document.getElementById("longitud").value = crd.longitude;
        console.log('More or less ' + crd.accuracy + ' meters.');
        console.log(document.getElementById('latitud').value);
        console.log(document.getElementById('longitud').value);

    };

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    };

    navigator.geolocation.getCurrentPosition(success, error, options);
</script>
<?php $this->stop() ?>


