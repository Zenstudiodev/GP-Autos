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


//campos

$fecha_d = New DateTime();

//fecha
$fecha = array(
	'type'        => 'text',
	'name'        => 'fecha',
	'id'          => 'fecha',
	'class'       => 'span11 form-control',
	'placeholder' => 'Fecha',
	'value'       => $fecha_d->format('Y-m-d'),
	'readonly'    => 'readonly',
	'required'    => 'required'
);

//vencimiento
$vencimiento = array(
	'type'             => 'text',
	'name'             => 'vencimiento',
	'id'               => 'vencimiento',
	'data-date'        => $fecha_d->format('Y-m-d'),
	'data-date-format' => 'yyyy-mm-dd',
	'class'            => 'datepicker  form-control',
	'placeholder'      => 'Vencimiento',
	'value'            => $fecha_d->format('Y-m-d'),
	'required'         => 'required'
);

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
//Placa
$placa = array(
	'type'        => 'text',
	'name'        => 'placa',
	'id'          => 'placa',
	'class'       => ' form-control',
	'placeholder' => 'Placa',
	'value'       => $carro->crr_placa,
	'required'    => 'required'
);

//Boleta
$boleta= array(
	'type'        => 'text',
	'name'        => 'boleta',
	'id'          => 'boleta',
	'class'       => ' form-control',
	'placeholder' => 'Boleta',
	//'value'       => $carro->crr_precio,
	'required'    => 'required'
);
//Banco
$banco = array(
	'type'        => 'text',
	'name'        => 'banco',
	'id'          => 'banco',
	'class'       => ' form-control',
	'placeholder' => 'Banco',
	//'value'       => $carro->crr_precio,
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
                        <h5>Información del carro</h5>
                    </div>
                    <pre>
                        <?php
                        // print_r($carro); ?>
                    </pre>
					<?php if (isset($mensaje)) { ?>
                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                        href="#">×</a>
                            <h4 class="alert-heading">Acción exitosa!</h4>
							<?php echo $mensaje; ?>
                        </div>
					<?php } ?>
                    <div class="widget-content ">
                        <form action="<?php echo base_url() ?>index.php/admin/renovar_carro_p" method="post"
                              class="">
							<?php echo form_hidden('carro_id', $carro->id_carro); ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--CÓDIGO-->
                                        <div class="form-group">
                                            <label class="control-label">FECHA:</label>
                                            <div class="controls">
												<?php echo form_input($fecha); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--CÓDIGO-->
                                        <div class="form-group">
                                            <label class="control-label">CÓDIGO:</label>
                                            <div class="controls">
												<?php echo form_input($codigo); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>






                                <div class="row">
                                    <div class="col-md-4">
                                        <!--VENCIMIENTO-->
                                        <div class="form-group">
                                            <label>VENCIMIENTO</label>
                                            <div class="controls">
			                                    <?php echo form_input($vencimiento); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!--BOLETA-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">BOLETA</label>
                                            <div class="controls">
					                            <?php echo form_input($boleta);  ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--BANCO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">BANCO</label>
                                            <div class="controls">
					                            <?php echo form_input($banco) ?>
                                            </div>
                                        </div>
                                    </div>
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
