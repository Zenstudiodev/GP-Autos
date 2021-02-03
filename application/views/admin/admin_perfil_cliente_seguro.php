<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 19/01/2021
 * Time: 10:15
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

if ($datos_cliente){
    $datos_cliente = $datos_cliente->row();
}

?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php /*echo base_url() */?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
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
                        <h5>Datos del cliente</h5>
                    </div>
                    <div class="widget-content nopadding">

                        <?php
                        if ($datos_cliente){ ?>
                        <h2>Datos del cliente</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Cliente id</td>
                                    <td>Nombre</td>
                                    <td>Teléfono</td>
                                    <td>Teléfono 2</td>
                                    <td>Dirección</td>
                                    <td>DPI</td>
                                    <td>predio que lo refirio</td>
                                </tr>
                                <tr>
                                    <td><?php echo $datos_cliente->cliente_seguro_id; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_nombre; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_telefono; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_telefono2; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_direccion; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_dpi; ?></td>
                                    <td><?php echo $datos_cliente->cliente_seguro_referido_predio_id; ?></td>
                                </tr>
                            </table>
                        </div>
                        <?php } ?>
                        <hr>
                        <h2>Polizas</h2>
                        <a class="btn btn-success" href="<?php echo base_url().'Seguros/crear_poliza/'.$datos_cliente->cliente_seguro_id?>">Nueva poliza</a>
                        <p></p>
                        <?php
                        if ($polizas_cliente){?>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Poliza id</td>
                                    <td>Tipo</td>
                                    <td>Pagos</td>
                                    <td>Monto</td>
                                    <td>No poliza</td>
                                    <td>Aseguradora</td>
                                    <td>Marca</td>
                                    <td>Linea</td>
                                    <td>Color</td>
                                    <td>Placa</td>
                                    <td>Chasis</td>
                                    <td>Motor</td>
                                </tr>
                                <?php
                                foreach ($polizas_cliente->result() as $poliza) {
                                    ?>
                                    <tr>
                                        <td><?php echo $poliza->seguro_id; ?></td>
                                        <td><?php echo $poliza->seguro_tipo; ?></td>
                                        <td><?php echo $poliza->seguro_pagos; ?></td>
                                        <td><?php echo $poliza->seguro_monto_poliza; ?></td>
                                        <td><?php echo $poliza->seguro_no_poliza; ?></td>
                                        <td><?php echo $poliza->seguro_aseguradora; ?></td>
                                        <td><?php echo $poliza->seguro_asesor_id; ?></td>
                                        <td><?php echo $poliza->seguro_carro_marca; ?></td>
                                        <td><?php echo $poliza->seguro_carro_linea; ?></td>
                                        <td><?php echo $poliza->seguro_carro_color; ?></td>
                                        <td><?php echo $poliza->seguro_carro_placa; ?></td>
                                        <td><?php echo $poliza->seguro_carro_chasis; ?></td>
                                        <td><?php echo $poliza->seguro_carro_motor; ?></td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                        <?php } ?>
                        <hr>
                        <h2>Seguimientos</h2>
                        <a class="btn btn-success" href="<?php echo base_url().'Seguros/crear_seguimiento_cliente_seguro/'.$datos_cliente->cliente_seguro_id?>">Nuevo seguimiento</a>
                        <p></p>
                        <?php if ($polizas_cliente){?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Poliza id</td>
                                        <td>Tipo</td>
                                        <td>Pagos</td>
                                        <td>Monto</td>
                                        <td>No poliza</td>
                                        <td>Aseguradora</td>
                                        <td>Marca</td>
                                        <td>Linea</td>
                                        <td>Color</td>
                                        <td>Placa</td>
                                        <td>Chasis</td>
                                        <td>Motor</td>
                                    </tr>
                                    <?php foreach ($polizas_cliente->result() as $poliza) {
                                        ?>
                                        <tr>
                                            <td><?php echo $poliza->seguro_id; ?></td>
                                            <td><?php echo $poliza->seguro_tipo; ?></td>
                                            <td><?php echo $poliza->seguro_pagos; ?></td>
                                            <td><?php echo $poliza->seguro_monto_poliza; ?></td>
                                            <td><?php echo $poliza->seguro_no_poliza; ?></td>
                                            <td><?php echo $poliza->seguro_aseguradora; ?></td>
                                            <td><?php echo $poliza->seguro_asesor_id; ?></td>
                                            <td><?php echo $poliza->seguro_carro_marca; ?></td>
                                            <td><?php echo $poliza->seguro_carro_linea; ?></td>
                                            <td><?php echo $poliza->seguro_carro_color; ?></td>
                                            <td><?php echo $poliza->seguro_carro_placa; ?></td>
                                            <td><?php echo $poliza->seguro_carro_chasis; ?></td>
                                            <td><?php echo $poliza->seguro_carro_motor; ?></td>
                                        </tr>
                                    <?php } ?>

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
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/matrix.form_common.js"></script>-->


<script>

    $(document).ready(function () {
    });

</script>


<?php $this->stop() ?>
