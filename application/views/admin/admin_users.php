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

$CI =& get_instance();

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
                    <?php if ($usuarios){ ?>

                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                <h5>Listado de usuarios</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <a class="btn btn-success" href="<?php echo base_url()?>/admin/crear_usuario">Nuevo</a>
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>username</th>
                                        <th>Carros activos</th>
                                        <th>carros permitidos</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($usuarios->result() as $usuario) {
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo  $usuario->id?></td>
                                            <td><a href="<?php echo base_url().'index.php/admin/editar_usuario/'.$usuario->id;?>"> <?php echo  $usuario->nombre?></a></td>
                                            <td><?php echo  $usuario->username?></td>
                                            <td><?php

                                               $carros_activos = $CI->Carros_model->get_carros_activos_by_user_id($usuario->id);
                                                echo  $carros_activos?></td>
                                            <td><?php echo  $usuario->carros_permitidos?></td>
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