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

//Respuesta
$respuesta = array(
    'type' => 'text',
    'name' => 'respuesta',
    'id' => 'respuesta',
    'class' => ' form-control',
    'placeholder' => 'Respuesta',
    'required' => 'required'
    //'disabled'    => 'disabled'
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Teléfono</td>
                                            <td>Teléfono cliente</td>
                                            <td>Acción</td>
                                        </tr>
                                        <tr>
                                            <td id="nombre_t"></td>
                                            <td id="telefono_t"></td>
                                            <td id="telefono_cliente_t"></td>
                                            <td id="accion_t">
                                                <a class="btn btn-danger btn-xs"
                                                   href="" id="baja_btn" target="_blank">
                                                    <i class="icon-remove"></i> Dar de baja
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <!--CÓDIGO-->
                                    <div class="form-group">
                                        <label class="control-label">respuesta:</label>
                                        <div class="controls">
                                            <?php echo form_input($respuesta); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" id="guardar_registro_btn">Guardar</button>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td>Fecha</td>
                                            <td>Asesor</td>
                                            <td>Respuesta</td>

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
    $("#codigo").on('change', function (e) {
        //get datos carro
        codigo = $(this).val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/data_carro_json?codigo=' + codigo,
            success: function (data) {
                $("#nombre_t").html(data.crr_contacto_nombre);
                $("#telefono_t").html(data.crr_telefono_propietario);
                $("#telefono_cliente_t").html(data.crr_contacto_telefono);
                $("#baja_btn").attr('href', "<?php echo base_url() . 'index.php/admin/dar_de_baja_btn/'; ?>" + data.id_carro);
                //.$carro->id_carro ?>
                //console.log(data);
            }
        });
        $("#codigo").attr('readonly','readonly');
        $("#respuestas_registros").html('');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/respuestas_carro_json?codigo=' + codigo,
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#respuestas_registros").append('<tr><td>'+ value.fecha +'</td> <td>'+ value.asesor_id +'</td><td>'+ value.respuesta +'</td></tr>');

                    console.log(value);
                });

                //.$carro->id_carro ?>
                console.log(data);
            }
        });

    });

    $("#guardar_registro_btn").on('click', function (e) {
        codigo = $("#codigo").val();
        $("#codigo").removeAttr('readonly');
        respuesta = $("#respuesta").val();
        asesor_id = "<?php echo $user_id; ?>";
        var registro_data = {
            'id_carro': codigo,
            'asesor_id': asesor_id,
            'respuesta': respuesta
        };

        $.ajax({
            type: 'POST',
            data: registro_data,
            url: '<?php echo base_url()?>index.php/Carro/guardar_disponibilidad',
            success: function (data) {
                console.log(data);
                $("#respuesta").val('');
            }
        });
    });

</script>
<?php $this->stop() ?>
