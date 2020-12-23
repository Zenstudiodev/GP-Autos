<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 23/12/2020
 * Time: 12:51
 */

 $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


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
                            <h5>registro de visitas a predios</h5>
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
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
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

        document.addEventListener('DOMContentLoaded', function() {
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
                eventContent: function(arg, createElement) {
                    var innerText;

                    console.log(arg.event);
                    console.log(arg.event.title);

                    innerText = arg.event.extendedProps.description+'</br>';

                   // return createElement('p', {}, innerText)
                },
                eventDidMount: function(info) {

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
                events: 'https://gpautos.net/predio/registros_predios_json',


            });

            calendar.render();




        });

    </script>
<?php $this->stop() ?>