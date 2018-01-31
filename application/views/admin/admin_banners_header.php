<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
]);?>
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
                <?php if ($banners){ ?>

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de Banners</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <a class="btn btn-success">Nuevo</a>
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>titulo</th>
                                <th>vencimiento</th>
                                <th>estado</th>
                                <th>Visualizaciones</th>
                                <th>clicks</th>
                                <th>Imágen</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($banners->result() as $banner) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo  $banner->id_bh?></td>
                                <td><a href="<?php echo base_url().'index.php/admin/editar_banner_header/'.$banner->id_bh;?>"> <?php echo  $banner->titulo_bh?></a></td>
                                <td><?php echo  $banner->vencimiento_bh?></td>
                                <td><?php echo  $banner->estado_bh?></td>
                                <td><?php echo  $banner->visualizaciones_bh?></td>
                                <td><?php echo  $banner->clicks_bh?></td>
                                <td style="width: 30%"><img src="<?php echo base_url(). $banner->imagen_bh?>" class="img-responsive"> </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <?php
                } else {
                    echo 'Aun no hay prospectos';
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
