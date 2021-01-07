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

$tipo_predio_select = array(
    'name' => 'tipo_predio',
    'id' => 'tipo_predio',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$tipo_predio_options = array(
    'individual' => 'individual',
    'pv9' => 'pv9',
);

$departamentos_select = array(
    'name' => 'id_departamento',
    'id' => 'id_departamento',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$departamentos_select_options = array();
foreach ($departamentos->result() as $departamento) {
    $departamentos_select_options[$departamento->id_departamento] = $departamento->nombre_departamento;
}

$municipios_select = array(
    'name' => 'id_municipio',
    'id' => 'id_municipio',
    'class' => ' browser-default form-control',
    'required' => 'required'
);

$manta_select = array(
    'name' => 'manta',
    'id' => 'manta',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$manta_options = array(
    'no' => 'no',
    'si' => 'si',
);

$nombre_encargado = array(
    'type' => 'text',
    'name' => 'nombre_encargado',
    'id' => 'nombre_encargado',
    'class' => ' form-control',
    'placeholder' => 'Nombre encargado',
    'value' => ''
    //'disabled'    => 'disabled'
);
$telefono_encargado = array(
    'type' => 'tel',
    'name' => 'telefono_encargado',
    'id' => 'telefono_encargado',
    'class' => ' form-control',
    'placeholder' => 'Teléfono encargado',
    'value' => ''
    //'disabled'    => 'disabled'
);
$email_encargado = array(
    'type' => 'email',
    'name' => 'email_encargado',
    'id' => 'email_encargado',
    'class' => ' form-control',
    'placeholder' => 'Email encargado',
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
                            <h5>Datos del predio</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="<?php echo base_url() . 'index.php/admin/guardar_predio' ?>" method="post"
                                  class="form-horizontal">

                                <div class="control-group">
                                    <label class="control-label">Tipo de predio</label>
                                    <div class="controls">
                                        <?php echo form_dropdown($tipo_predio_select, $tipo_predio_options) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nombre</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Nombre"
                                               value="" id="nombre" name="nombre"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Dirección</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Dirección"
                                               value="" id="direccion" name="direccion"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Teléfono</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Teléfono"
                                               value="" id="telefono" name="telefono"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Departamento</label>
                                    <div class="controls">
                                        <?php echo form_dropdown($departamentos_select, $departamentos_select_options) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Municipio</label>
                                    <div class="controls">
                                        <?php echo form_dropdown($municipios_select) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Zona</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Zona"
                                               value="" id="zona" name="zona"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nombre encargado</label>
                                    <div class="controls">
                                        <?php echo form_input($nombre_encargado); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Teléfono encargado</label>
                                    <div class="controls">
                                        <?php echo form_input($telefono_encargado); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Correo encargado</label>
                                    <div class="controls">
                                        <?php echo form_input($email_encargado); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Manta</label>
                                    <div class="controls">
                                        <?php echo form_dropdown($manta_select, $manta_options) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Material pop</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Material Pop"
                                               value="" id="material_pop" name="material_pop"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Descripción</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Descripción"
                                               value="" id="descripcion" name="descripcion"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ruta</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Ruta"
                                               value="" id="ruta" name="ruta"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">imagen</label>
                                    <div class="controls">
                                        <input type="text" class="span11 form-control" placeholder="Imagen" value="" id="imagen" name="imagen"/>
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Estado</label>
                                    <?php
                                    //Estado
                                    $estado_select   = array(
                                        'name'     => 'estado',
                                        'id'       => 'estado',
                                        'class'    => ' browser-default form-control',
                                        'required' => 'required'
                                    );
                                    $estado_select_options = array(
                                        "Alta" => "Alta",
                                        "Baja" => "Baja",
                                        "Pendiente" => "Pendiente",
                                    );
                                    ?>
                                    <div class="controls">
                                        <?php echo form_dropdown($estado_select, $estado_select_options) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Carros activos</label>
                                    <div class="controls">
                                        <input type="number" class="span11 form-control" value="" id="carros_activos" name="carros_activos" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Carros permitidos</label>
                                    <div class="controls">
                                        <input type="number" class="span11 form-control" value="" id="carros_permitidos" name="carros_permitidos" />
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
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
        $('#id_municipio option').remove();
        departamento = $("#id_departamento").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/admin/get_municipio_departamento/' + departamento,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#id_municipio').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
                // $('select').material_select();
            }
        });
    });

    //Actualizar municipios
    $("#id_departamento").change(function (e) {
        $('#id_municipio option').remove();
        departamento = $("#id_departamento").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>/admin/get_municipio_departamento/' + departamento,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#id_municipio').append('<option value="' + value.id_municipio + '">' + value.nombre_municipio + '</option>');
                });
            }
        });
    });
</script>


<?php $this->stop() ?>
