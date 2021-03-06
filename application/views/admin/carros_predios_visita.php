<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 30/12/2020
 * Time: 20:10
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$ci =& get_instance();

?>
<?php $this->start('css_p') ?>
    <!--cargamos css personalizado-->

    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
            </div>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <?php if ($asesores) {

                    //print_contenido($carros_predio->result());
                    ?>

                    <div class="widget-box">
                        <!--<div>
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a
                                        href="<?php /*echo base_url() */ ?>admin/predios"> Predios alta</a></li>
                                <li role="presentation" class=""><a
                                        href="<?php /*echo base_url() */ ?>/admin/predios_baja"><i
                                            class="icon-remove"></i> predios baja</a></li>
                            </ul>
                        </div>-->
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de asesores</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class="table-responsive">
                                <table class="table table-bordered data-table" id="asesores_tabla">
                                    <thead>
                                    <tr>
                                        <th>Accion</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>correo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($asesores->result() as $asesor) {
                                        ?>
                                        <tr class="gradeX">
                                            <td>
                                                <a class="btn btn-info btn-xs"
                                                   href="<?php echo base_url() . 'predio/editar_asesores_predio/' . $asesor->id_asesor_predio ?>">
                                                    <i class="icon-remove"></i> Editar</a>
                                                <a class="btn btn-danger btn-xs"
                                                   href="<?php echo base_url() . 'predio/borrar_asesores_predio/' . $asesor->id_asesor_predio . '/' . $predio_id ?>">
                                                    <i class="icon-remove"></i> Borrar</a>
                                            </td>
                                            <td><?php echo $asesor->asesor_nombre ?></td>
                                            <td><?php echo $asesor->asesor_telefono ?></td>
                                            <td><?php echo $asesor->asesor_email ?></td>
                                        </tr>

                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo 'Aun no hay asesores';
                } ?>


                    <?php if ($carros_predio) {

                        //print_contenido($carros_predio->result());
                        ?>

                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                                <h5>Listado de carros del predio</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="table-responsive">
                                    <table class="table table-bordered data-table" id="predios_tabla">
                                        <thead>
                                        <tr>
                                            <th>Accion</th>
                                            <th>codigo</th>
                                            <th>marca</th>
                                            <th>linea</th>
                                            <th>modelo</th>
                                            <th>color</th>
                                            <th>placas</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach ($carros_predio->result() as $carro) {
                                            ?>
                                            <tr class="gradeX">
                                                <td><a class="btn btn-danger btn-xs"
                                                       href="<?php echo base_url() . 'admin/dar_de_baja_btn/' . $carro->id_carro ?>"
                                                       target="_blank"><i
                                                                class="icon-remove"></i> Dar de baja</a></td>
                                                <td><?php echo $carro->id_carro ?></td>
                                                <td><?php echo $carro->id_marca ?></td>
                                                <td><?php echo $carro->id_linea ?></td>
                                                <td><?php echo $carro->crr_modelo ?></td>
                                                <td><?php echo $carro->crr_color ?></td>
                                                <td><?php echo $carro->crr_placa ?></td>
                                            </tr>

                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo 'Aun no hay carros';
                    } ?>

            </div>
        </div>
    </div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>

    <script>
        $('#predios_tabla').DataTable({
            //paging: false
        });
    </script>

<?php $this->stop() ?>