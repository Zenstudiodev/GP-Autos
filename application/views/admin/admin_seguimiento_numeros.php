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
//buscar_numero
$buscar_numero = array(
    'type' => 'number',
    'name' => 'buscar_numero',
    'id' => 'buscar_numero',
    'class' => ' form-control',
    'placeholder' => 'Buscar numero',
    'required' => 'required'
    //'disabled'    => 'disabled'
);

$resultado = array(
    'name' => 'respuesta_pc',
    'id' => 'respuesta_pc',
    'placeholder' => 'Respuesta',
    'class' => 'form-control col-md-7 col-xs-12',
    'maxlength' => '230',
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
    'required' => 'required'

);
//$numero_a_atendar = $numero_a_atendar->row();

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
<link rel='stylesheet' href='<?php echo base_url() ?>/node_modules/fullcalendar/dist/fullcalendar.css'/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/daterangepicker.css"/>
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
                        <div class="container">
                                <div class="row">
                                    <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12"
                                               for="name">Buscar Número
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i
                                                                class="fa fa-file"></i></span>
                                                            <?php echo form_input($buscar_numero); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="container-fluid">

                            <ul class="site-stats">
                                <li class="bg_lg"><i class="icon-user"></i>
                                    <strong><?php echo $carros_individuales_publicados->num_rows; ?></strong>
                                    <small>numero de carros individuales publicados este mes</small>
                                </li>
                                <li class="bg_lg"><i class="icon-user"></i>
                                    <strong><?php echo $carros_pv9_publicados->num_rows; ?></strong>
                                    <small>numero de carros PV9 publicados este mes</small>
                                </li>
                            </ul>

                            <?php //print_contenido($seguimientos->result()) ?>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="seguimiento_modal" tabindex="-1" role="dialog" aria-labelledby="seguimiento_titulo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="seguimiento_titulo">realizar seguimiento</h4>
            </div>
            <div class="modal-body">
                <div id="datos_seguimiento"></div>
                <form id="formulario_seguimiento">
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
                <button type="button" class="btn btn-primary" id="guardar_seguimiento_btn">Guardar</button>
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

<div class="modal fade marketing" id="registros_by_number" tabindex="-1" role="dialog"
     aria-labelledby="agendar_seguimiento_label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="agendar_seguimiento_label">Listado de seguimientos</h4>
            </div>
            <div class="modal-body" id="registros_by_number_container">
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
<!--<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/jquery.peity.min.js"></script>
<script src='<?php echo base_url() ?>node_modules/moment/min/moment.min.js'></script>
<script src='<?php echo base_url() ?>node_modules/fullcalendar/dist/fullcalendar.js'></script>
<script src='<?php echo base_url() ?>node_modules/fullcalendar/dist/locale/es.js'></script>
<script src='<?php echo base_url() ?>ui/admin/js/daterangepicker.js'></script>


<script>

    var comentario;
    var accion;
    var seguimiento_id;
    var bt_id;

    $("#buscar_numero").on('change', function (e) {
        //get datos carro
        telefono = $(this).val();

        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: '<?php echo base_url()?>index.php/marketing/seguimientos_by_registro?telefono=' + telefono,
            success: function (data) {
                console.log(data);

                $("#registros_by_number_container").html(data);

                $('#registros_by_number').modal('show');
            }
        });
    });

    /* DATERANGEPICKER */
    function init_daterangepicker_reservation() {

        if (typeof ($.fn.daterangepicker) === 'undefined') {
            return;
        }
        console.log('init_daterangepicker_reservation');

        $('#reservation').daterangepicker(null, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        var hoy_picker = moment();

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
            startDate: hoy_picker
        });

    }
    function actualizar_estado_seguimiento(id) {
        console.log('seguimiento desde la funcion ' + id);

        resultado_data = {
            'bts_id': id,
        };

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>marketing/actualizar_estado_seguimiento',
            data: resultado_data,
            success: function (data) {
                console.log(data);
            }
        });
    }

    $("#guardar_seguimiento_btn").click(function () {
        console.log(seguimiento_id);
        console.log(bt_id);
        var seguimiento_form = document.getElementById("formulario_seguimiento");
        console.log(seguimiento_form.checkValidity());
        // refenciamos los elementos del formulario
        comentario = $("#respuesta_pc");
        accion = $("#tipo_resultado");

        console.log(comentario.val());
        console.log(accion.val());

        if (seguimiento_form.checkValidity()) {// revisamos si el form es valido
            $("#seguimiento_modal").modal('hide'); // ocultamos el modal

            actualizar_estado_seguimiento(seguimiento_id);
            switch (accion.val()) {
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
        console.log(comentario.val());
        console.log(accion.val());
        console.log(bt_id);

        fecha_seguimiento = $("#reservation-time");
        console.log(fecha_seguimiento.val());

        resultado_data = {
            'bts_user_id': '<?php echo $user_id?>',
            'bts_fecha_seguimiento': fecha_seguimiento.val(),
            'bts_bt_id': bt_id,
            'bts_comentario': comentario.val(),
            'bts_tipo': accion.val(),
        };
        console.log(resultado_data);

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
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,listDay,listWeek,month'
            },

            // customize the button names,
            // otherwise they'd all just say "list"
            views: {
                listDay: {buttonText: 'Día'},
                // listWeek: {buttonText: 'list week'}
            },
            locale: 'es',
            defaultView: 'month',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events

            <?php
            if($seguimientos){ ?>
            events: [
                <?php    foreach ($seguimientos->result() as $seguimiento) { ?>
                {
                    id: '<?php echo $seguimiento->bts_id; ?>',
                    title: '<?php echo $seguimiento->bts_tipo . 'id: ' . $seguimiento->bts_id; ?>',
                    start: '<?php echo $seguimiento->bts_fecha_seguimiento; ?>',
                    color: '<?php echo color_seguimiento($seguimiento->bts_estado, $seguimiento->bts_fecha_seguimiento); ?>'

                },
                <?php } ?>
            ],
            <?php }?>

            eventClick: function (calEvent, jsEvent, view) {
                //console.log($(calEvent.id));
                seguimiento_id = calEvent.id;

                $('#seguimiento_modal').modal('show');
                $.ajax({
                    type: 'GET',
                    dataType: 'html',
                    url: '<?php echo base_url()?>marketing/display_seguimiento_info?id_seguimiento=' + calEvent.id,
                    success: function (data) {
                        //console.log(data);
                        $("#datos_seguimiento").html(data);
                        bt_id = $("#bt_id").text();

                    }
                });



                // change the border color just for fun

            }
        });
        init_daterangepicker_reservation();

    });

    $('#seguimiento_modal').on('hide.bs.modal', function () {
        $("#datos_seguimiento").html('');
    });
    $('#registros_by_number').on('hide.bs.modal', function () {
        $("#registros_by_numbert_container").html('');
    });


</script>
<?php $this->stop() ?>
