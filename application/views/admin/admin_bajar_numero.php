<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 24/09/2018
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

$fecha = array(
    'name' => 'fecha',
    'id' => 'reservation-time',
    'placeholder' => 'Fecha',
    'type' => 'text',
    'class' => 'form-control col-md-7 col-xs-12',
    'maxlength' => '230',
    'required' => 'required'

);
$resultado = array(
    'name' => 'respuesta_pc',
    'id' => 'respuesta_pc',
    'placeholder' => 'Respuesta',
    'class' => 'form-control col-md-7 col-xs-12',
    'required' => 'required'
);

//bajar numero resultado
$tipo_resultado_select = array(
    'name' => 'tipo_resultado',
    'id' => 'tipo_resultado',
    'class' => ' form-control',
    'required' => 'required'
);
$tipo_resultado_select_options = array(
    "llamada" => "llamada",
    "publicar" => "publicar",
    "no_interesado" => "No Interesado",
);

//seguimiento tipo
$tipo_resultado_select = array(
    'name' => 'tipo_resultado',
    'id' => 'tipo_resultado',
    'class' => ' form-control',
    'required' => 'required'
);
$tipo_resultado_select_options = array(
    "llamada" => "llamada",
    "publicar" => "publicar",
    "no_interesado" => "No Interesado",
);
if($numero_a_atendar){
    $numero_a_atendar = $numero_a_atendar->row();
}

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->

<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/colorpicker.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/daterangepicker.css"/>
<!--<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
<link rel='stylesheet' href='<?php echo base_url() ?>node_modules/fullcalendar/dist/fullcalendar.css'/>
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
                        <h5>Seguimiento número</h5>
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
                            <?php if($numero_a_atendar){ ?>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Fecha de ingreso</td>
                                    <td>teléfono</td>
                                    <td>Ubicación</td>
                                    <td>Tipo</td>
                                    <td>Linea</td>
                                    <td>Modelo</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo $numero_a_atendar->bt_fecha_ingreso ?></td>
                                    <td><?php echo $numero_a_atendar->bt_telefono ?></td>
                                    <td><?php echo $numero_a_atendar->bt_ubicacion ?></td>
                                    <td><?php echo $numero_a_atendar->bt_tipo ?></td>
                                    <td><?php echo $numero_a_atendar->bt_linea ?></td>
                                    <td><?php echo $numero_a_atendar->bt_modelo ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="btn btn-success btn-large"
                                           href='https://wa.me/502<?php echo $numero_a_atendar->bt_telefono ?>?text=<?php echo urlencode('Te saludamos de *GPAUTOS.NET  El predio virtual mas grande de Guatemala !!!* La manera mas efectiva de vender tu carro.') ?>'
                                           target="_blank"> whatsApp</a>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                                data-target="#bajar_numero">
                                            Bajar número
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            </div>
                            <?php if ($otros_registros) { ?>
                                <h1>Otros registros</h1>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td>Fecha de ingreso</td>
                                        <td>Estado</td>
                                        <td>teléfono</td>
                                        <td>Ubicación</td>
                                        <td>Tipo</td>
                                        <td>Linea</td>
                                        <td>Modelo</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($otros_registros->result() as $registro) {
                                        ?>
                                        <tr>
                                            <td><?php echo $registro->bt_fecha_ingreso ?></td>
                                            <td><?php echo $registro->bt_estado ?></td>
                                            <td><?php echo $registro->bt_telefono ?></td>
                                            <td><?php echo $registro->bt_ubicacion ?></td>
                                            <td><?php echo $registro->bt_tipo ?></td>
                                            <td><?php echo $registro->bt_linea ?></td>
                                            <td><?php echo $registro->bt_modelo ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <?php }else{ ?>
                                ya no hay registros
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="bajar_numero" tabindex="-1" role="dialog" aria-labelledby="bajar_numero_label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="bajar_numero_label">Primer contacto</h4>
            </div>
            <div class="modal-body">
                <form id="bajar_numero_form">
                    <div class="container">
                        <div class="row">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-3 col-xs-12"
                                       for="name">resultado<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i
                                                                class="fa fa-file"></i></span>
                                                    <?php echo form_textarea($resultado) ?>
                                                    <p id="bajar_numero_textarea"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-3 col-xs-12"
                                       for="name">Siguiente paso<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i
                                                                class="fa fa-file"></i></span>
                                                    <?php echo form_dropdown($tipo_resultado_select, $tipo_resultado_select_options); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" id="bm_guardar_btn">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agendar_seguimiento" tabindex="-1" role="dialog"
     aria-labelledby="agendar_seguimiento_label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="agendar_seguimiento_label">Gardar seguimiento</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="row">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-3 col-xs-12"
                                       for="name">Fecha<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i
                                                                class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                    <?php echo form_input($fecha) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" id="guardar_seguimiento_modal">Guardar</button>
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
<script src='<?php echo base_url() ?>/node_modules/moment/min/moment.min.js'></script>
<script src='<?php echo base_url() ?>/node_modules/fullcalendar/dist/fullcalendar.js'></script>
<script src='<?php echo base_url() ?>/ui/admin/js/daterangepicker.js'></script>


<script>
    var resultado_text;
    var resultado_accion;
    var fecha_seguimiento;

    /* DATERANGEPICKER */
    function init_daterangepicker_reservation() {

        if (typeof ($.fn.daterangepicker) === 'undefined') {
            return;
        }
        console.log('init_daterangepicker_reservation');

        $('#reservation').daterangepicker(null, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        var start = moment();

        $('#reservation-time').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            timePickerSeconds: true,
            autoApply: true,
            showDropdowns: true,
            timePickerIncrement: 60,
            locale: {
                format: 'DD-MM-YYYY h:mm:ss',
                separator: " - ",
                applyLabel: "Aceptar",
                cancelLabel: "Cacelar",
                fromLabel: "De",
                toLabel: "A",
                customRangeLabel: "Personalizado",
                weekLabel: "S",
                daysOfWeek: [
                    "Dom",
                    "Lun",
                    "Ma",
                    "Mi",
                    "Jue",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            startDate: start
        });

    }
    $("#bm_guardar_btn").click(function () {


        var bajar_numero_form = document.getElementById("bajar_numero_form");
        console.log(bajar_numero_form.checkValidity());
        // refenciamos los elementos del formulario
        resultado_text = $("#respuesta_pc");
        resultado_accion = $("#tipo_resultado");

        if (bajar_numero_form.checkValidity()) {// revisamos si el form es valido

            $("#bajar_numero").modal('hide'); // ocultamos el modal



            resultado_data = {
                'bts_user_id': '<?php echo $user_id?>',
                'bts_comentario': resultado_text.val(),
                'resultado_action': resultado_accion.val(),
                'bts_bt_id': '<?php echo $numero_a_atendar->bt_id?>'
            };

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>marketing/guardar_resultado_seguimiento',
                data: resultado_data,

                success: function (data) {
                    console.log(data);
                }
            });

            switch (resultado_accion.val()) {
                case 'llamada':
                    $('#agendar_seguimiento').modal('show');
                    break;
                case 'publicar':
                    console.log('publicar');
                    $('#agendar_seguimiento').modal('show');
                    break;
                case 'no_interesado':
                    console.log('no interesado');
                    location.reload();
                    break;
            }
        }
        else {

        }


    });

    $("#guardar_seguimiento_modal").click(function () {
        console.log(resultado_text.val());
        console.log(resultado_accion.val());

        fecha_seguimiento = $("#reservation-time");
        console.log(fecha_seguimiento.val());

        resultado_data = {
            'bts_user_id': '<?php echo $user_id?>',
            'bts_fecha_seguimiento': fecha_seguimiento.val(),
            'bts_bt_id': '<?php echo $numero_a_atendar->bt_id?>',
            'bts_comentario': resultado_text.val(),
            'bts_tipo': resultado_accion.val(),
        };

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>marketing/guardar_seguimiento',
            data: resultado_data,

            success: function (data) {
                console.log(data);
                location.reload();
            }
        });

    });

    $(document).ready(function () {
        init_daterangepicker_reservation();
        //$('#agendar_seguimiento').modal('show')

    });


</script>
<?php $this->stop() ?>
