<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
]);

$carro = $carro->row();

//Codigo
$codigo = array(
	'type'        => 'text',
	'name'        => 'codigo',
	'id'          => 'codigo',
	'class'       => ' form-control',
	'placeholder' => 'Código',
	'value'       => $carro->id_carro,
	'readonly'    => 'readonly',
	'required'    => 'required'
	//'disabled'    => 'disabled'
);
//Precio de feria
$precio_feria = array(
	'type'        => 'number',
	'name'        => 'precio_feria',
	'id'          => 'precio_feria',
	'class'       => ' form-control',
	'placeholder' => 'Precio de feria',
	'value'       => $carro->crr_precio,
	'max'       => $carro->crr_precio,
	'required'    => 'required'
);

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->

<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/colorpicker.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<!--<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/bootstrap-wysihtml5.css"/>
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
                        <h5>Agregar a feria virtual</h5>
                    </div>

					<?php if (isset($mensaje)) { ?>
                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                        href="#">×</a>
                            <h4 class="alert-heading">Acción exitosa!</h4>
							<?php echo $mensaje; ?>
                        </div>
					<?php } ?>
                    <div class="widget-content ">
                        <form action="<?php echo base_url() ?>index.php/admin/guardar_precio_feria" method="post"
                              class="">
							<?php echo form_hidden('carro_id', $carro->id_carro); ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--CÓDIGO-->
                                        <div class="form-group">
                                            <label class="control-label">CÓDIGO:</label>
                                            <div class="controls">
												<?php echo form_input($codigo); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--BANCO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">Precio de feria</label>
                                            <div class="controls">
                                                <?php echo form_input($precio_feria) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                </div>

                                <div class="form-group">
                                    <div class="form-actions">
                                        <input type="hidden" name="tipo" id="tipo" value="renovacion">
                                        <button type="submit" class="btn btn-success">Guardar</button>
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
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<!--<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-wysihtml5.js"></script>


<script>
    //Actualizar marcas
    $("#tipo_carro").change(function (e) {
        $('#marca_carro option').remove();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
            success: function (data) {
                //$('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                // $('select').material_select();
            }
        });
    });

    //Actualizar lineas
    $("#marca_carro").change(function (e) {
        $('#linea_carro option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                // $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                // $('select').material_select();
                //  $("#linea_carro").val(buscador_linea);
            }
        });
    });

</script>
<?php $this->stop() ?>
