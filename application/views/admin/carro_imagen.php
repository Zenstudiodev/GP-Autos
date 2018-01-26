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
]); ?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
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
				<?php if ($carros) { ?>
                    <div class="widget-box">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation" class=""><a href="<?php echo base_url()?>/admin"><i class="icon-ok"></i> Carros activos</a></li>
                                <li role="presentation" class="active"><a href="<?php echo base_url()?>/admin/carros_de_baja"><i class="icon-remove"></i> Carros Inactivos</a></li>
                            </ul>
                        </div>
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de carros activos</h5>
                        </div>
                        <div class="widget-content nopadding">
	                        <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                href="#">×</a>
                                    <h4 class="alert-heading">Acción exitosa!</h4>
			                        <?php echo $mensaje; ?>
                                </div>
	                        <?php } ?>

                            <a class="btn btn-success btn-mini"
                               href="<?php echo base_url() ?>index.php/admin/crearCarro"><i class="icon-plus-sign"></i> Nuevo</a>



                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabla_carros" >
                                    <thead>
                                    <tr>
                                        <th>codigo</th>
                                        <th>imagen</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>codigo</th>
                                        <th>imagen</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
									<?php

									foreach ($carros->result() as $carro)
									{
										?>
                                        <tr class="gradeX">

                                            <td>

												<?php echo $carro->id_carro ?>

                                            </td>
                                            <td><img class="activator"
                                                     src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $carro->crr_codigo . ' (1).jpg' ?>"></td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					<?php
				}
				else
				{
					echo 'Aun no hay prospectos';
				} ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php echo base_url() ?>/ui/admin/js/matrix.tables.js"></script>-->


<?php $this->stop() ?>
