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
	            <?php if ($transacciones) { ?>

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de carros activos</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabla_carros" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA</th>
                                        <th>ID CARRO</th>
                                        <th>BOLETA</th>
                                        <th>BANCO</th>
                                        <th>TIPO</th>
                                        <th>USUARIO</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA</th>
                                        <th>ID CARRO</th>
                                        <th>BOLETA</th>
                                        <th>BANCO</th>
                                        <th>TIPO</th>
                                        <th>USUARIO</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
						            <?php

						            foreach ($transacciones->result() as $transaccion)
						            {
							            ?>
                                        <tr >
                                            <td>
									            <?php echo $transaccion->id ?>
                                            </td>

                                            <td>

									            <?php echo $transaccion->fecha ?>

                                            </td>
                                            <td><?php echo $transaccion->Id_carro ?></td>
                                            <td><?php echo $transaccion->boleta ?></td>
                                            <td><?php echo $transaccion->banco ?></td>
                                            <td> <?php echo $transaccion->tipo ?></td>
                                            <td> <?php echo $transaccion->id_usuario ?></td>

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


<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#tabla_carros tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#tabla_carros').DataTable(
            {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });

        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });


</script>
<?php $this->stop() ?>
