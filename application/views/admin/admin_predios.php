<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2/05/2018
 * Time: 1:59 PM
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
                <div class="span12">
                    <?php if ($predios) {

                    //print_contenido($predios->result());
                    ?>

                    <div class="widget-box">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a
                                            href="<?php echo base_url() ?>admin/predios"> Predios alta</a></li>
                                <li role="presentation" class=""><a
                                            href="<?php echo base_url() ?>/admin/predios_baja"><i
                                                class="icon-remove"></i> predios baja</a></li>
                            </ul>
                        </div>
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de predios</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <a class="btn btn-success" href="<?php echo base_url() ?>/admin/nuevo_predio">Nuevo</a>
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
                                        <th>Manta</th>
                                        <th>Pop</th>
                                        <th>Ruta</th>
                                        <th width="150px">Banner</th>
                                        <th>carros permitidos</th>
                                        <th>Carros activos</th>
                                        <th>Carros inactivos</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($predios->result() as $predio) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><a class="btn btn-success"
                                                   href="<?php echo base_url() . 'index.php/admin/editrar_predio/' . $predio->id_predio_virtual; ?>">Editar</a>
                                            </td>
                                            <td><?php echo $predio->id_predio_virtual ?></td>
                                            <td><?php echo $predio->prv_tipo ?></td>
                                            <td><?php echo $predio->prv_estatus ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'index.php/admin/editrar_predio/' . $predio->id_predio_virtual; ?>"> <?php echo $predio->prv_nombre ?></a>
                                            </td>
                                            <td><?php echo $predio->prv_direccion ?></td>
                                            <td><?php echo $predio->prv_telefono ?></td>
                                            <td><?php echo id_departamento_a_nombre($predio->prv_departamento) ?></td>
                                            <td><?php echo $predio->prv_municipio ?></td>
                                            <td><?php echo $predio->prv_zona ?></td>
                                            <td><?php echo $predio->prv_manta ?></td>
                                            <td><?php echo $predio->prv_material_pop ?></td>
                                            <td><?php echo $predio->prv_ruta ?></td>
                                            <td>
                                                <?php if (file_exists('/home2/gpautos/public_html/ui/public/images/predio/' . $predio->prv_img) and $predio->prv_img != '') { ?>
                                                    <img src="<?php echo base_url() . 'ui/public/images/predio/' . $predio->prv_img ?>"
                                                         class="img-responsive">
                                                <?php } else {
                                                } ?>
                                            </td>
                                            <td><?php echo $predio->carros_permitidos ?></td>
                                            <td><?php echo $ci->Carros_model->get_carros_activos_del_predio($predio->id_predio_virtual); ?></td>
                                            <td><?php echo $ci->Carros_model->get_carros_inactivos_del_predio($predio->id_predio_virtual); ?></td>
                                        </tr>

                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                        echo 'Aun no hay predios';
                    } ?>
                </div>
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