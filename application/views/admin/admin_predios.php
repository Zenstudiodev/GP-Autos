<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2/05/2018
 * Time: 1:59 PM
 */

 $this->layout('admin/admin_master', [
    'title'    => $title,
    'nombre'   => $nombre,
    'user_id'  => $user_id,
    'username' => $username,
    'rol'      => $rol,
]);

$ci =& get_instance();

 ?>
<?php $this->start('css_p') ?>
    <!--cargamos css personalizado-->
    <link rel="stylesheet" href="<?php echo base_url()?>ui/admin/css/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>ui/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>ui/admin/css/matrix-media.css" />
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
                    <?php if ($predios){ ?>

                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                <h5>Listado de predios</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <a class="btn btn-success" href="<?php echo base_url()?>/admin/nuevo_predio">Nuevo</a>
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th width="150px">Banner</th>
                                        <th>estado</th>
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
                                            <td><?php echo  $predio->id_predio_virtual?></td>
                                            <td><a href="<?php echo base_url().'index.php/admin/editrar_predio/'.$predio->id_predio_virtual;?>"> <?php echo  $predio->prv_nombre?></a></td>
                                            <td><img src="<?php echo base_url().'ui/public/images/predio/'. $predio->prv_img?>" class="img-responsive"></td>
                                            <td><?php echo  $predio->prv_estatus?></td>
                                            <td><?php echo  $predio->carros_permitidos?></td>
                                            <td><?php echo  $ci->Carros_model->get_carros_activos_del_predio($predio->id_predio_virtual);?></td>
                                            <td><?php echo  $ci->Carros_model->get_carros_inactivos_del_predio($predio->id_predio_virtual);?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
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
    <script src="<?php echo base_url()?>ui/admin/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>ui/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>ui/admin/js/matrix.js"></script>
    <script src="<?php echo base_url()?>ui/admin/js/matrix.tables.js"></script>
<?php $this->stop() ?>