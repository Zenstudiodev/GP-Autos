<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 18/01/2021
 * Time: 15:00
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$seguro_tipo = array(
    'type' => 'text',
    'name' => 'seguro_tipo',
    'id' => 'seguro_tipo',
    'class' => ' form-control',
    'placeholder' => 'Tipo',
    'value' => ''
    //'disabled'    => 'disabled'
);

$seguro_pagos = array(
    'type' => 'number',
    'name' => 'seguro_pagos',
    'id' => 'seguro_pagos',
    'class' => ' form-control',
    'placeholder' => 'Pagos',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_no_poliza = array(
    'type' => 'text',
    'name' => 'seguro_no_poliza',
    'id' => 'seguro_no_poliza',
    'class' => ' form-control',
    'placeholder' => 'No. poliza',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_monto_poliza = array(
    'type' => 'number',
    'name' => 'seguro_monto_poliza',
    'id' => 'seguro_monto_poliza',
    'class' => ' form-control',
    'placeholder' => 'Monto',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_aseguradora = array(
    'type' => 'text',
    'name' => 'seguro_aseguradora',
    'id' => 'seguro_aseguradora',
    'class' => ' form-control',
    'placeholder' => 'Aseguradora',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_marca= array(
    'type' => 'text',
    'name' => 'seguro_carro_marca',
    'id' => 'seguro_carro_marca',
    'class' => ' form-control',
    'placeholder' => 'Marca',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_linea = array(
    'type' => 'text',
    'name' => 'seguro_carro_linea',
    'id' => 'seguro_carro_linea',
    'class' => ' form-control',
    'placeholder' => 'Línea',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_color = array(
    'type' => 'text',
    'name' => 'seguro_carro_color',
    'id' => 'seguro_carro_color',
    'class' => ' form-control',
    'placeholder' => 'Color',
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
    'placeholder' => 'Chasis',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_motor = array(
    'type' => 'text',
    'name' => 'seguro_carro_motor',
    'id' => 'seguro_carro_motor',
    'class' => ' form-control',
    'placeholder' => 'Motor',
    'value' => ''
    //'disabled'    => 'disabled'
);

//predios
$predios_select         = array(
    'name' => 'cliente_seguro_referido_predio_id',
    'id'   => 'cliente_seguro_referido_predio_id',
    'class' => ' form-control',
);
$predios_select_options = array(
);

foreach ($predios->result() as $predio)
{
    $predios_select_options[$predio->id_predio_virtual] = $predio->prv_nombre;
}




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
                        <form action="<?php echo base_url() . 'seguros/guardar_poliza_seguro' ?>" method="post"
                              class="form-horizontal">
                            <input type="hidden" name="seguro_cliente_id" id="seguro_cliente_id" value="<?php echo $cliente_id; ?>">
                            <div class="control-group">
                                <label class="control-label">Tipo</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_tipo); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pagos</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_pagos); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Monto poliza</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_monto_poliza); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">No. poliza</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_no_poliza); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Aseguradora</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_aseguradora); ?>
                                </div>
                            </div>
                            <input type="hidden" name="seguro_asesor_id" id="seguro_asesor_id" value="<?php echo $user_id;?>">
                            <div class="control-group">
                                <label class="control-label">Marca carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_marca); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Linea carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_linea); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Color carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_color); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Placa carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_placa); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Chasis carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_chasis); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Motor carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_motor); ?>
                                </div>
                            </div>

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


<script>

    $(document).ready(function () {
    });

</script>


<?php $this->stop() ?>
