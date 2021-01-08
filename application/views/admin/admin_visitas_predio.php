<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 22/12/2020
 * Time: 14:05
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
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Visitas predio</h5>
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
                                <h2>Predios para ruta <?php echo $ruta; ?> </h2>
                                <?php
                                if ($predios_ruta) {
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered data-table" id="predios_tabla">
                                            <thead>
                                            <tr>
                                                <th>Acciones</th>
                                                <th>id</th>
                                                <th>tipo</th>
                                                <th>estado</th>
                                                <th>Nombre</th>
                                                <th>Dirección</th>
                                                <th>Teléfono</th>
                                                <th>Departamento</th>
                                                <th>Municipio</th>
                                                <th>Zona</th>
                                                <th>Encargado</th>
                                                <th>telefono encargado</th>
                                                <th>correo encargado</th>
                                                <th>Manta</th>
                                                <th>Pop</th>
                                                <th>Ruta</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            foreach ($predios_ruta->result() as $predio) {
                                                ?>
                                                <tr class="gradeX">
                                                    <td>
                                                        <a class="btn btn-success" href="<?php echo base_url() . 'predio/marcar_ingreso/' . $predio->id_predio_virtual; ?>">marcar Entrada</a>
                                                        <a class="btn btn-success"   href="<?php echo base_url() . 'predio/marcar_salida/' . $predio->id_predio_virtual; ?>">marcar Salida</a>
                                                        <a class="btn btn-success"   href="<?php echo base_url() . 'predio/ver_carros_predio_admin/' . $predio->id_predio_virtual; ?>">Ver carros</a>
                                                    </td>
                                                    <td><?php echo $predio->id_predio_virtual ?></td>
                                                    <td><?php echo $predio->prv_tipo ?></td>
                                                    <td><?php echo $predio->prv_estatus ?></td>
                                                    <td>
                                                         <?php echo $predio->prv_nombre ?>
                                                    </td>
                                                    <td><?php echo $predio->prv_direccion ?></td>
                                                    <td><?php echo $predio->prv_telefono ?></td>
                                                    <td><?php echo id_departamento_a_nombre($predio->prv_departamento) ?></td>
                                                    <td><?php echo id_municipio_a_nombre($predio->prv_municipio) ?></td>
                                                    <td><?php echo $predio->prv_zona ?></td>
                                                    <td><?php echo $predio->prv_nombre_encargado ?></td>
                                                    <td><?php echo $predio->prv_telefono_encargado ?></td>
                                                    <td><?php echo $predio->prv_correo_encargado ?></td>
                                                    <td><?php echo $predio->prv_manta ?></td>
                                                    <td><?php echo $predio->prv_material_pop ?></td>
                                                    <td><?php echo $predio->prv_ruta ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
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


<?php $this->stop() ?>
