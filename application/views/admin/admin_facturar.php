<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 25/03/2020
 * Time: 8:56 AM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$ci =& get_instance();

$nit_cliente_input = array(
    'type' => 'text',
    'name' => 'nit_cliente',
    'id' => 'nit_cliente',
    'class' => ' form-control',
    'placeholder' => 'NIT cliente',
    'required' => 'required'
);
$nombre_cliente_input = array(
    'type' => 'text',
    'name' => 'nombre_cliente',
    'id' => 'nombre_cliente',
    'class' => ' form-control',
    'placeholder' => 'Nombre cliente',
    'required' => 'required'
);
$direccion_cliente_input = array(
    'type' => 'text',
    'name' => 'direccion_cliente',
    'id' => 'direccion_cliente',
    'class' => ' form-control',
    'placeholder' => 'Dirección cliente',
    'required' => 'required'
);
$telefono_cliente_input = array(
    'type' => 'text',
    'name' => 'telefono_cliente',
    'id' => 'telefono_cliente',
    'class' => ' form-control',
    'placeholder' => 'Correo cliente',
    'required' => 'required'
);
$correo_cliente_input = array(
    'type' => 'text',
    'name' => 'correo_cliente',
    'id' => 'correo_cliente',
    'class' => ' form-control',
    'placeholder' => 'Correo cliente',
    'required' => 'required'
);
$detalle_factura_input = array(
    'type' => 'text',
    'name' => 'detalle_factura',
    'id' => 'detalle_factura',
    'class' => ' form-control',
    'placeholder' => 'Detalle factura',
    'required' => 'required'
);
$monto_factura_input = array(
    'type' => 'text',
    'name' => 'monto_factura',
    'id' => 'monto_factura',
    'class' => ' form-control',
    'placeholder' => 'Monto factura',
    'required' => 'required'
);


/*

'producto' => 'vip',
'cantidad' => '1',
'unidadMedida' => 'UND',
'codigoProducto' => '001-2020',
'descripcionProducto' => 'Anuncio Vip',
'precioUnitario' => '275',
'montoBruto' => '245.54',
'montoDescuento' => '0',
'importeNetoGravado' => '275',
'detalleImpuestosIva' => '29.46',
'importeExento' => '0',
'otrosImpuestos' => '0',
'importeOtrosImpuestos' => '0',
'importeTotalOperacion' => '275',
'tipoProducto' => 'S',*/


?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
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


                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Facturar</h5>
                    </div>
                    <div class="widget-content ">
                        <div class="container">
                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                href="#">×</a>
                                    <h4 class="alert-heading">Acción exitosa!</h4>
                                    <?php echo $mensaje; ?>
                                </div>
                            <?php } ?>
                            <form method="post" action="<?php echo base_url()?>cliente/guardar_factura_manual">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--nit-->
                                        <div class="form-group">
                                            <label class="control-label">NIT Cliente</label>
                                            <div class="controls">
                                                <?php echo form_input($nit_cliente_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--Nombre-->
                                        <div class="form-group">
                                            <label class="control-label">Nombre</label>
                                            <div class="controls">
                                                <?php echo form_input($nombre_cliente_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--Direccion-->
                                        <div class="form-group">
                                            <label class="control-label">Direccion</label>
                                            <div class="controls">
                                                <?php echo form_input($direccion_cliente_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--Telefono-->
                                        <div class="form-group">
                                            <label class="control-label">Teléfono</label>
                                            <div class="controls">
                                                <?php echo form_input($telefono_cliente_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--email-->
                                        <div class="form-group">
                                            <label class="control-label">Correo electrónico</label>
                                            <div class="controls">
                                                <?php echo form_input($correo_cliente_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--email-->
                                        <div class="form-group">
                                            <label class="control-label">Detalle</label>
                                            <div class="controls">
                                                <?php echo form_input($detalle_factura_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!--email-->
                                        <div class="form-group">
                                            <label class="control-label">Monto</label>
                                            <div class="controls">
                                                <?php echo form_input($monto_factura_input); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
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
<script src="<?php echo base_url() ?>ui/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.tables.js"></script>
<?php $this->stop() ?>
