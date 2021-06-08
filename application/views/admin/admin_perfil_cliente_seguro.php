<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 19/01/2021
 * Time: 10:15
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

if ($datos_cliente) {
    $datos_cliente = $datos_cliente->row();
}

?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
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

                        <?php
                        if ($datos_cliente) { ?>
                            <h2>Datos del cliente</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Cliente id</td>
                                        <td>Nombre</td>
                                        <td>Teléfono</td>
                                        <td>Teléfono 2</td>
                                        <td>Dirección</td>
                                        <td>DPI</td>
                                        <td>predio que lo refirio</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $datos_cliente->cliente_seguro_id; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_nombre; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_telefono; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_telefono2; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_direccion; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_dpi; ?></td>
                                        <td><?php echo $datos_cliente->cliente_seguro_referido_predio_id; ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php } ?>
                        <hr>
                        <h2>Polizas</h2>
                        <a class="btn btn-success"
                           href="<?php echo base_url() . 'Seguros/crear_poliza/' . $datos_cliente->cliente_seguro_id ?>">Nueva
                            poliza</a>
                        <p></p>
                        <?php
                        if ($polizas_cliente) {
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Poliza id</td>
                                        <td>Tipo</td>
                                        <td>Pagos</td>
                                        <td>Monto</td>
                                        <td>No poliza</td>
                                        <td>Aseguradora</td>
                                        <td>Marca</td>
                                        <td>Linea</td>
                                        <td>Color</td>
                                        <td>Placa</td>
                                        <td>Chasis</td>
                                        <td>Motor</td>
                                    </tr>
                                    <?php
                                    foreach ($polizas_cliente->result() as $poliza) {
                                        ?>
                                        <tr>
                                            <td><?php echo $poliza->seguro_id; ?></td>
                                            <td><?php echo $poliza->seguro_tipo; ?></td>
                                            <td><?php echo $poliza->seguro_pagos; ?></td>
                                            <td><?php echo $poliza->seguro_monto_poliza; ?></td>
                                            <td><?php echo $poliza->seguro_no_poliza; ?></td>
                                            <td><?php echo $poliza->seguro_aseguradora; ?></td>
                                            <td><?php echo $poliza->seguro_asesor_id; ?></td>
                                            <td><?php echo $poliza->seguro_carro_marca; ?></td>
                                            <td><?php echo $poliza->seguro_carro_linea; ?></td>
                                            <td><?php echo $poliza->seguro_carro_color; ?></td>
                                            <td><?php echo $poliza->seguro_carro_placa; ?></td>
                                            <td><?php echo $poliza->seguro_carro_chasis; ?></td>
                                            <td><?php echo $poliza->seguro_carro_motor; ?></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        <?php } ?>
                        <hr>
                        <h2>Seguimientos</h2>
                        <a class="btn btn-success"
                           href="<?php echo base_url() . 'Seguros/crear_seguimiento_cliente_seguro/' . $datos_cliente->cliente_seguro_id ?>">Nuevo
                            seguimiento</a>
                        <p></p>
                        <?php if ($seguimientos_cliente) { ?>
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tr>
                                        <td>Accion</td>
                                        <td>fecha</td>
                                        <td>hora</td>
                                        <td>comentario</td>
                                    </tr>
                                    <?php foreach ($seguimientos_cliente->result() as $seguimiento) {
                                        ?>
                                        <tr>
                                            <td><?php echo $seguimiento->seguimiento_sc_accion; ?></td>
                                            <td><?php echo $seguimiento->seguimiento_sc_fecha_seguimiento; ?></td>
                                            <td><?php echo $seguimiento->seguimiento_sc_hora_seguimiento; ?></td>
                                            <td><?php echo $seguimiento->seguimiento_sc_comentario; ?></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-content ">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>
                        <div class="container-fluid">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?
$fecha_seguimiento = array(
    'name' => 'fecha_seguimiento',
    'id' => 'fecha_seguimiento',
    'placeholder' => 'Fecha',
    'type' => 'date',
    'class' => 'form-control',
    'required' => 'required'

);
$hora_seguimiento = array(
    'name' => 'hora_seguimiento',
    'id' => 'hora_seguimiento',
    'placeholder' => 'Hora',
    'type' => 'time',
    'class' => 'form-control',
    'required' => 'required'

);
$comentario = array(
    'name' => 'comentario_seguimiento',
    'id' => 'comentario_seguimiento',
    'placeholder' => 'Respuesta',
    'class' => 'form-control col-md-7 col-xs-12',
    'maxlength' => '230',
    'required' => 'required'
);
$tipo_resultado_select = array(
    'name' => 'accion_seguimiento',
    'id' => 'accion_seguimiento',
    'class' => ' form-control',
    'required' => 'required'
);
$tipo_resultado_select_options = array(
    "llamada" => "llamada",
    "poliza" => "poliza",
    "escribir" => "escribir",
    "no_interesado" => "No Interesado",
);?>

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
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="fecha_seguimiento">Fecha</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <?php echo form_input($fecha_seguimiento) ?>
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
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">Hora</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa-clock-o"></i></span>
                                                    <?php echo form_input($hora_seguimiento) ?>
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
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">resultado</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group"><span class="add-on input-group-addon"><i class="fa fa-file"></i></span>
                                                    <?php echo form_textarea($comentario) ?>
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
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name">Siguiente paso</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i class="fa fa-file"></i></span>
                                                    <?php echo form_dropdown($tipo_resultado_select, $tipo_resultado_select_options); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="name"></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <div class="form-actions">

                                                        <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $cliente_id;?>">
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
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
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>

<script>

    $(document).ready(function () {
    });
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',
            locale: 'es',
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
            },
            eventContent: function (arg, createElement) {
                var innerText;

                console.log(arg.event);
                console.log(arg.event.title);

                innerText = arg.event.extendedProps.description + '</br>';

                // return createElement('p', {}, innerText)
            },
            eventDidMount: function (info) {

                eventContent: 'SOM,',
                    console.log(info.event.extendedProps);
                console.log(info.event.extendedProps.description);
                // {description: "Lecture", department: "BioChemistry"}
                var tooltip = new Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            },
            events: 'https://gpautos.net/Seguros/seguimientos_seguro_by_cliente_json/<?php echo $datos_cliente->cliente_seguro_id?>',
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

        calendar.render();


    });
</script>


<?php $this->stop() ?>
