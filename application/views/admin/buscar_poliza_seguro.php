<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 18/01/2021
 * Time: 15:16
 */


$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


$seguro_no_poliza = array(
    'type' => 'tel',
    'name' => 'seguro_monto_poliza',
    'id' => 'seguro_monto_poliza',
    'class' => ' form-control',
    'placeholder' => 'No. poliza',
    'value' => ''
    //'disabled'    => 'disabled'
);

$seguro_carro_placa = array(
    'type' => 'text',
    'name' => 'seguro_carro_placa',
    'id' => 'seguro_carro_placa',
    'class' => ' form-control',
    'placeholder' => 'Placa',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_chasis = array(
    'type' => 'text',
    'name' => 'seguro_carro_chasis',
    'id' => 'seguro_carro_chasis',
    'class' => ' form-control',
    'placeholder' => 'Nombre',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_motor = array(
    'type' => 'text',
    'name' => 'seguro_carro_motor',
    'id' => 'seguro_carro_motor',
    'class' => ' form-control',
    'placeholder' => 'Telefono',
    'value' => ''
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
                        <h5>Datos del cliente</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo base_url() . 'seguros/guardar_cliente_seguro' ?>" method="post"
                              class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">No. poliza</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_no_poliza); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Placa carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_placa); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_chasis); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefono</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_motor); ?>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Buscar</button>
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


<script>

    $(document).ready(function () {
    });

</script>


<?php $this->stop() ?>
