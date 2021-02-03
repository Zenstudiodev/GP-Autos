<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 25/01/2021
 * Time: 20:10
 */


$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

if ($datos_cliente) {
    $datos_cliente = $datos_cliente->row();
}


$fecha_seguimiento = array(
    'name' => 'fecha_seguimiento',
    'id' => 'fecha_seguimiento',
    'placeholder' => 'Fecha',
    'type' => 'date',
    'class' => 'form-control',
    'required' => 'required'

);
$hora_seguimiento = array(
    'name' => 'hora_seguimiento',
    'id' => 'hora_seguimiento',
    'placeholder' => 'Hora',
    'type' => 'time',
    'class' => 'form-control',
    'required' => 'required'

);
$comentario = array(
    'name' => 'comentario_seguimiento',
    'id' => 'comentario_seguimiento',
    'placeholder' => 'Respuesta',
    'class' => 'form-control col-md-7 col-xs-12',
    'maxlength' => '230',
    'required' => 'required'
);
$tipo_resultado_select = array(
    'name' => 'tipo_resultado',
    'id' => 'tipo_resultado',
    'class' => ' form-control',
    'required' => 'required'
);
$tipo_resultado_select_options = array(
    "llamada" => "llamada",
    "publicar" => "publicar",
    "publicado" => "publicado",
    "no_interesado" => "No Interesado",
);

?>

<?php $this->start('css_p') ?>
    <!--cargamos css personalizado-->
    <!--<link rel="stylesheet" href="<?php /*echo base_url() */ ?>ui/admin/css/select2.css"/>-->
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
    <div id="content">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Crear seguimiento</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form id="formulario_seguimiento" class="form-horizontal">
                                <div class="container">
                                    <div class="row">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="fecha_seguimiento">Fecha</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <?php echo form_input($fecha_seguimiento) ?>
                                                                <p id="bajar_numero_textarea"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">Hora</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa-clock-o"></i></span>
                                                                <?php echo form_input($hora_seguimiento) ?>
                                                                <p id="bajar_numero_textarea"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">resultado</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa fa-file"></i></span>
                                                                <?php echo form_textarea($comentario) ?>
                                                                <p id="bajar_numero_textarea"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">Siguiente paso</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="fa fa-file"></i></span>
                                                                <?php echo form_dropdown($tipo_resultado_select, $tipo_resultado_select_options); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->stop() ?>


<?php $this->start('js_p') ?>
    <!--<script src="<?php /*echo base_url() */ ?>ui/admin/js/select2.min.js"></script>-->
    <script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
    <!--<script src="<?php /*echo base_url() */ ?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
    <script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
    <!--<script src="<?php /*echo base_url() */ ?>ui/admin/js/matrix.form_common.js"></script>-->


    <script>

        $(document).ready(function () {
        });

    </script>


<?php $this->stop() ?>