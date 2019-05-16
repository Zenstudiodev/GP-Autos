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

//Nombre
$nombre = array(
    'type' => 'text',
    'name' => 'nombre',
    'id' => 'nombre',
    'class' => ' form-control',
    'placeholder' => 'Nombre',
    'required' => 'required'
);

//direccion
$direccion = array(
    'type' => 'text',
    'name' => 'direccion',
    'id' => 'direccion',
    'class' => ' form-control',
    'placeholder' => 'Dirección',
    'required' => 'required'
);

//Codigo
$codigo = array(
    'type' => 'text',
    'name' => 'codigo',
    'id' => 'codigo',
    'class' => ' form-control',
    'placeholder' => 'Código',
    'required' => 'required'
    //'disabled'    => 'disabled'
);


//UBICACION
$ubicacion_carro_select         = array(
    'name'     => 'ubicacion_carro',
    'id'       => 'ubicacion_carro',
    'class'    => ' form-control',
    'required' => 'required'
);
$ubicacion_carro_select_options = array(
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

//telefono
$telefono = array(
    'type' => 'tel',
    'name' => 'telefono',
    'id' => 'telefono',
    'class' => ' form-control',
    'placeholder' => 'Teléfono',
    'required' => 'required'
    //'disabled'    => 'disabled'
);

//TIPO
$tipo_carro_select         = array(
    'name'     => 'tipo_carro',
    'id'       => 'tipo_carro',

    'required' => 'required'
);
$tipo_carro_select_options = array();

//MARCA
$marca = array(
    'type'        => 'text',
    'name'        => 'marca',
    'id'          => 'marca',
    'class'       => ' form-control',
    'placeholder' => 'Marca',
    //'value'       => $carro->crr_modelo,
    'required'    => 'required'
);

//LINEA
$linea = array(
    'type'        => 'text',
    'name'        => 'linea',
    'id'          => 'linea',
    'class'       => ' form-control',
    'placeholder' => 'Línea',
    //'value'       => $carro->crr_modelo,
    'required'    => 'required'
);
//AÑO
$modelo = array(
    'type'        => 'text',
    'name'        => 'modelo',
    'id'          => 'modelo',
    'class'       => ' form-control',
    'placeholder' => 'Modelo',
    //'value'       => $carro->crr_modelo,
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
                        <h5>Agregar rotulación</h5>
                    </div>

                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                        href="#">×</a>
                            <h4 class="alert-heading">Acción exitosa!</h4>
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>
                    <div class="widget-content ">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>

                        <div class="container-fluid">
                            <form action="<?php echo base_url()?>marketing/guardar_rotulacion" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <!--nombre-->
                                    <div class="form-group">
                                        <label class="control-label">Nombre</label>
                                        <div class="controls">
                                            <?php echo form_input($nombre); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!--direccion-->
                                    <div class="form-group">
                                        <label class="control-label">Dirección</label>
                                        <div class="controls">
                                            <?php echo form_input($direccion); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!--TIPO-->
                                    <div class="form-group">
                                        <label class="control-label">Tipo</label>
                                        <div class="controls">
                                            <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <!--Marca-->
                                    <div class="form-group">
                                        <label class="control-label">Marca:</label>
                                        <div class="controls">
                                            <?php echo form_input($marca); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--Linea-->
                                    <div class="form-group">
                                        <label class="control-label">Línea:</label>
                                        <div class="controls">
                                            <?php echo form_input($linea); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--Modelo-->
                                    <div class="form-group">
                                        <label class="control-label">Modelo:</label>
                                        <div class="controls">
                                            <?php echo form_input($modelo); ?>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td>Fecha</td>
                                            <td>Telefono</td>
                                            <td>Ubicacion</td>
                                            <td>tipo</td>
                                            <td>marca</td>
                                            <td>linea</td>
                                            <td>modelo</td>
                                        </tr>
                                        </thead>
                                        <tbody id="respuestas_registros">
                                        </tbody>
                                    </table>

                                </div>
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
    $("#telefono").on('change', function (e) {
        //get datos carro
        telefono = $(this).val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>marketing/registros_en_bolsa_by_id/?telefono=' + telefono,
            success: function (data) {
                console.log(data);
                $.each(data, function (key, value) {
                    $("#respuestas_registros").append(
                        '<tr>' +
                        '<td>'+ value.bt_fecha_ingreso +'</td>' +
                        '<td>'+ value.bt_telefono +'</td>' +
                        '<td>'+ value.bt_ubicacion +'</td>' +
                        '<td>'+ value.bt_tipo +'</td>' +
                        '<td>'+ value.bt_marca +'</td>' +
                        '<td>'+ value.bt_linea +'</td>' +
                        '<td>'+ value.bt_modelo +'</td>' +
                        '</tr>'
                    );

                    console.log(value);
                });
            }
        });
        $("#codigo").attr('readonly','readonly');
        $("#respuestas_registros").html('');



    });

</script>
<?php $this->stop() ?>
