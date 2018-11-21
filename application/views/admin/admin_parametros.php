<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$parametros = $parametros->result();
$telefonos_diarios_bolsa = $parametros[0];
$precio_vip = $parametros[1];
$precio_individual = $parametros[2];
$precio_feria = $parametros[3];
$precio_facebook = $parametros[4];

$numeros_diarios_requeridos = $telefonos_diarios_bolsa->parametro_valor;
$precio_vip_val = $precio_vip->parametro_valor;
$precio_individual_val = $precio_individual->parametro_valor;
$precio_feria_val = $precio_feria->parametro_valor;
$precio_facebook_val = $precio_facebook->parametro_valor;
//carros para bolsa
$carros_bolsa = array(
    'type' => 'number',
    'name' => 'carros_bolsa',
    'id' => 'carros_bolsa',
    'class' => ' form-control',
    'placeholder' => 'Carros necesarios para bolsa de números',
    'value' => $numeros_diarios_requeridos,
    'required' => 'required'
);
$precio_vip_input = array(
    'type' => 'number',
    'name' => 'precio_vip',
    'id' => 'precio_vip',
    'class' => ' form-control',
    'placeholder' => 'Precio de anuncios VIP',
    'value' => $precio_vip_val,
    'required' => 'required'
);
$precio_individual_input = array(
    'type' => 'number',
    'name' => 'precio_individual',
    'id' => 'precio_individual',
    'class' => ' form-control',
    'placeholder' => 'Precio de anuncios individuales',
    'value' => $precio_individual_val,
    'required' => 'required'
);
$precio_feria_input = array(
    'type' => 'number',
    'name' => 'precio_feria',
    'id' => 'precio_feria',
    'class' => ' form-control',
    'placeholder' => 'Precio de feria',
    'value' => $precio_feria_val,
    'required' => 'required'
);
$precio_facebook_input = array(
    'type' => 'number',
    'name' => 'precio_facebook',
    'id' => 'precio_facebook',
    'class' => ' form-control',
    'placeholder' => 'Precio de anuncios en facebook',
    'value' => $precio_facebook_val,
    'required' => 'required'
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
                        <h5>Ajustar parametros</h5>
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
                            <form action="<?php echo base_url() ?>admin/actualizar_parametros" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <!--telefono-->
                                        <div class="form-group">
                                            <label class="control-label">Carros diarios necesarios para bolsa</label>
                                            <div class="controls">
                                                <?php echo form_input($carros_bolsa); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <!--Precio VIP-->
                                        <div class="form-group">
                                            <label class="control-label">Valor de anucios VIP</label>
                                            <div class="controls">
                                                <?php echo form_input($precio_vip_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <!--Precio Individual-->
                                        <div class="form-group">
                                            <label class="control-label">Valor de anucios Individuales</label>
                                            <div class="controls">
                                                <?php echo form_input($precio_individual_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!--Precio Individual-->
                                        <div class="form-group">
                                            <label class="control-label">Valor de anucios feria</label>
                                            <div class="controls">
                                                <?php echo form_input($precio_feria_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!--Precio Individual-->
                                        <div class="form-group">
                                            <label class="control-label">Valor de anucios facebook</label>
                                            <div class="controls">
                                                <?php echo form_input($precio_facebook_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-success">Guardar</button>
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

</script>
<?php $this->stop() ?>
