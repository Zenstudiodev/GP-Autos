<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
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
            <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                    <h5>Panel de inicio</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span6">
                            <?php if ($rol == 'marketing') { ?>
                                <ul class="site-stats">
                                    <li class="bg_lg"><i class="icon-user"></i>
                                        <strong><?php echo $carros_individuales_publicados->num_rows; ?></strong>
                                        <small>numero de carros individuales publicados este mes</small>
                                    </li>
                                    <li class="bg_lg"><i class="icon-user"></i>
                                        <strong><?php echo $carros_pv9_publicados->num_rows; ?></strong>
                                        <small>numero de carros PV9 publicados este mes</small>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <hr>
                                <h1>Carros propios activos</h1>

                                <ul class="site-stats">
                                    <li class="bg_lh"><i class="icon-user"></i>
                                        <strong><?php echo $numero_de_carros; ?></strong>
                                        <small>numero de carros</small>
                                    </li>
                                </ul>
                            <?php } ?>
                            <hr>
                            <?php if($carros_usuario_predio_pendientes){?>
                            <h1>Carros pendientes de aprobación</h1>
                            <?php if ($rol == 'predio') { ?>
                            <?php } ?>

                            <div class="container">
                                <div class="row">
                                    <?php foreach ($carros_usuario_predio_pendientes->result() as $carro_pendiente) { ?>
                                        <div class="col-md-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    codigo: <?php echo $carro_pendiente->id_carro ?> | Placa: <?php echo $carro_pendiente->crr_placa ?></li>
                                                <li class="list-group-item"><?php
                                                    if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro_pendiente->id_carro . ' (1).jpg')) { ?>
                                                        <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro_pendiente->id_carro . ' (1).jpg' ?>"
                                                             class="img-responsive">
                                                    <?php } else {
                                                    } ?>
                                                </li>
                                                <li class="list-group-item">Marca: <?php echo $carro_pendiente->id_marca ?></li>
                                                <li class="list-group-item">Linea: <?php echo $carro_pendiente->id_linea ?></li>
                                                <li class="list-group-item">Modelo: <?php echo $carro_pendiente->crr_modelo ?></li>
                                            </ul>


                                        </div>
                                        <?php //print_contenido($carro_pendiente); ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

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
