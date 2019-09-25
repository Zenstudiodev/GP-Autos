

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

$nombre_input = array(
    'type' => 'text',
    'name' => 'nombre_input',
    'id' => 'nombre_input',
    'class' => ' form-control',
    'placeholder' => 'Nombre del cupon',
    'required' => 'required'
);


$tipo_select = array(
    'name' => 'tipo_input',
    'id' => 'tipo_input',
    'class' => ' form-control',
    'required' => 'required'
);

$tipo_select_options = array(
    'Valor' => 'Valor',
    'Porcentage' => 'Porcentage',
);

$ubicacion_select = array(
    'name' => 'ubicacion_input',
    'id' => 'ubicacion_input',
    'class' => ' form-control',
    'required' => 'required'
);

$ubicacion_select_options = array(
    "TODOS"   => "TODOS",
    "ALTA VERAPAZ"   => "ALTA VERAPAZ",
    "BAJA VERAPAZ"   => "BAJA VERAPAZ",
    "CHIMALTENANGO"  => "CHIMALTENANGO",
    "CHIQUIMULA"     => "CHIQUIMULA",
    "EL PROGRESO"    => "EL PROGRESO",
    "ESCUINTLA"      => "ESCUINTLA",
    "GUATEMALA"      => "GUATEMALA",
    "HUEHUETENANGO"  => "HUEHUETENANGO",
    "IZABAL"         => "IZABAL",
    "JALAPA"         => "JALAPA",
    "JUTIAPA"        => "JUTIAPA",
    "PETÉN"          => "PETÉN",
    "QUETZALTENANGO" => "QUETZALTENANGO",
    "QUICHÉ"         => "QUICHÉ",
    "RETALHULEU"     => "RETALHULEU",
    "SACATEPÉQUEZ"   => "SACATEPÉQUEZ",
    "SAN MARCOS"     => "SAN MARCOS",
    "SANTA ROSA"     => "SANTA ROSA",
    "SOLOLÁ"         => "SOLOLÁ",
    "SUCHITEPÉQUEZ"  => "SUCHITEPÉQUEZ",
    "TOTONICAPÁN"    => "TOTONICAPÁN",
    "ZACAPA"         => "ZACAPA"
);

$tipo_anuncio_select = array(
    'name' => 'tipo_anuncio',
    'id' => 'tipo_anuncio',
    'class' => ' form-control',
    'required' => 'required'
);

$tipo_anuncio_select_options = array(
    "TODOS"   => "TODOS",
    "VIP"   => "VIP",
    "INDIVIDUAL"   => "INDIVIDUAL"
);



$valor_input = array(
    'type' => 'number',
    'name' => 'valor_cupon',
    'id' => 'valor_cupon',
    'class' => ' form-control',
    'placeholder' => 'Valor del cupoón ',
    'required' => 'required'
);
$codigo_input = array(
    'type' => 'text',
    'name' => 'codigo_input',
    'id' => 'codigo_input',
    'class' => ' form-control',
    'placeholder' => 'Codigo que se ingresara para aplicar descuento',
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
                        <h5>Crear códigos de descuento</h5>
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
                            <form action="<?php echo base_url() ?>admin/guardar_codigo_descuento" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--Nombre-->
                                        <div class="form-group">
                                            <label class="control-label">Nombre del cupón</label>
                                            <div class="controls">
                                                <?php echo form_input($nombre_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Tipo-->
                                        <div class="form-group">
                                            <label class="control-label">Tipo del cupón</label>
                                            <div class="controls">
                                                <?php echo form_dropdown($tipo_select, $tipo_select_options) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Tipo-->
                                        <div class="form-group">
                                            <label class="control-label">Ubicación</label>
                                            <div class="controls">
                                                <?php echo form_dropdown($ubicacion_select, $ubicacion_select_options) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--Nombre-->
                                        <div class="form-group">
                                            <label class="control-label">Valor del cupón</label>
                                            <div class="controls">
                                                <?php echo form_input($valor_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Tipo-->
                                        <div class="form-group">
                                            <label class="control-label">Código del cupón</label>
                                            <div class="controls">
                                                <?php echo form_input($codigo_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Tipo-->
                                        <div class="form-group">
                                            <label class="control-label">Código del cupón</label>
                                            <div class="controls">
                                                <?php echo form_dropdown($tipo_anuncio_select, $tipo_anuncio_select_options) ?>
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
