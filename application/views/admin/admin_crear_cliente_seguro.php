?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$cliente_seguro_nombre = array(
    'type' => 'text',
    'name' => 'cliente_seguro_nombre',
    'id' => 'cliente_seguro_nombre',
    'class' => ' form-control',
    'placeholder' => 'Nombre cliente',
    'value' => ''
    //'disabled'    => 'disabled'
);
$cliente_seguro_telefono = array(
    'type' => 'tel',
    'name' => 'cliente_seguro_telefono',
    'id' => 'cliente_seguro_telefono',
    'class' => ' form-control',
    'placeholder' => 'Teléfono',
    'value' => ''
    //'disabled'    => 'disabled'
);
$cliente_seguro_telefono2 = array(
    'type' => 'tel',
    'name' => 'cliente_seguro_telefono2',
    'id' => 'cliente_seguro_telefono2',
    'class' => ' form-control',
    'placeholder' => 'Teléfono 2',
    'value' => ''
    //'disabled'    => 'disabled'
);
$cliente_seguro_direccion = array(
    'type' => 'text',
    'name' => 'cliente_seguro_direccion',
    'id' => 'cliente_seguro_direccion',
    'class' => ' form-control',
    'placeholder' => 'Dirección',
    'value' => ''
    //'disabled'    => 'disabled'
);
$cliente_seguro_dpi = array(
    'type' => 'text',
    'name' => 'cliente_seguro_dpi',
    'id' => 'cliente_seguro_dpi',
    'class' => ' form-control',
    'placeholder' => 'DPI',
    'value' => ''
    //'disabled'    => 'disabled'
);
$cliente_seguro_referido_predio_id = array(
    'type' => 'text',
    'name' => 'cliente_seguro_referido_predio_id',
    'id' => 'cliente_seguro_referido_predio_id',
    'class' => ' form-control',
    'placeholder' => 'DPI',
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
                        <form action="<?php echo base_url() . 'seguros/guardar_cliente_seguro' ?>" method="post"
                              class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Tipo</label>
                                <div class="controls">
                                    <select class="form-control">
                                        <option>Seguro</option>
                                        <option>Carro</option>
                                        <option>Predio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <?php echo form_input($cliente_seguro_nombre); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <?php echo form_input($cliente_seguro_telefono); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono 2</label>
                                <div class="controls">
                                    <?php echo form_input($cliente_seguro_telefono2); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección</label>
                                <div class="controls">
                                    <?php echo form_input($cliente_seguro_direccion); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DPI</label>
                                <div class="controls">
                                    <?php echo form_input($cliente_seguro_dpi); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="predio" class="col-sm-2 control-label">Predio refirio</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown($predios_select, $predios_select_options) ?>
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
