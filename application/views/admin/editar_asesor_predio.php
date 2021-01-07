
<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 4/01/2021
 * Time: 16:45
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$asesor = $asesor->row();



$nombre_asesor = array(
    'type' => 'text',
    'name' => 'nombre_asesor',
    'id' => 'nombre_asesor',
    'class' => ' form-control',
    'placeholder' => 'Nombre asesor',
    'value' => $asesor->asesor_nombre
    //'disabled'    => 'disabled'
);
$telefono_asesor = array(
    'type' => 'tel',
    'name' => 'telefono_asesor',
    'id' => 'telefono_asesor',
    'class' => ' form-control',
    'placeholder' => 'Teléfono asesor',
    'value' => $asesor->asesor_telefono
    //'disabled'    => 'disabled'
);
$email_asesor = array(
    'type' => 'email',
    'name' => 'email_asesor',
    'id' => 'email_asesor',
    'class' => ' form-control',
    'placeholder' => 'Email asesor',
    'value' => $asesor->asesor_email
    //'disabled'    => 'disabled'
);







?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php /*echo base_url() */?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"></div>
    </div>
    <div class="container-fluid">





        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Datos del predio</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo base_url() . 'predio/actualizar_asesor_predio' ?>" method="post"
                              class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">Nombre Asesor</label>
                                <div class="controls">
                                    <?php echo form_input($nombre_asesor); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono Asesor</label>
                                <div class="controls">
                                    <?php echo form_input($telefono_asesor); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo Asesor</label>
                                <div class="controls">
                                    <?php echo form_input($email_asesor); ?>
                                </div>
                            </div>
                            <input type="hidden" name="asesor_id" id="asesor_id" value="<?php echo $asesor_id?>" >
                            <input type="hidden" name="predio_id" id="predio_id" value="<?php echo $asesor->asesor_predio_id?>" >

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/matrix.form_common.js"></script>-->


<?php $this->stop() ?>