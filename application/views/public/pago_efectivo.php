<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/05/2018
 * Time: 3:15 PM
 */

$this->layout('public/public_master_test', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

//Direccion
$direccion = array(
    'type' => 'text',
    'name' => 'direccion',
    'id' => 'dirección',
    'class' => ' validate',
    //'placeholder' => 'Dirección',
    //'value'       => $carro->crr_codigo,
    //'readonly'    => 'readonly',
    'required' => 'required',
    //'disabled'    => 'disabled'
);

//Telefono
$telefono = array(
    'type' => 'tel',
    'name' => 'telefono',
    'id' => 'telefono',
    'class' => ' validate',
    //'placeholder' => 'Dirección',
    //'value'       => $carro->crr_codigo,
    //'readonly'    => 'readonly',
    'required' => 'required',
    //'disabled'    => 'disabled'
);

//

$carro = $carro->row();

?>

<?php $this->start('css_p') ?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.css"/>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<pre>
<?php // print_r($datos_usuario->row()); ?>
</pre>
<?php if (true) { ?>
    <section id="pagar_anuncio">
        <div class="container">
            <h5>Pagar Anuncio</h5>
            <div class="row">
                <div class="col s12 m3">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card">
                                <div class="card-image">
                                    <img src="web/images_cont/<?php echo $carro->id_carro?> (1).jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?php echo $carro->id_marca . ' - ' . $carro->id_linea . ' - ' . $carro->crr_modelo ?></span>
                                    <p>Llene los datos para que lleguemos a hacer el cobro de su anuncio. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m9">
                    <h5>Datos de cobro</h5>
                    <div class="card">
                        <form id="formulario_pago" method="post" action="<?php echo base_url()?>cliente/guarda_pago_efectivo">
                            <div class="card-content">
                                <div class="row">
                                    <div class="card-panel orange darken-1">
                                        <p class="white-text">
                                            El pago en efectivo tiene un recargo de Q15.00
                                        </p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($direccion); ?>
                                        <label for="direccion">Dirección:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($telefono); ?>
                                        <label for="direccion">Telèfono:</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="carro_id" id="carro_id" value="<?php echo $carro->id_carro?>">
                            <div class="card-action">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar forma de pago
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    echo 'Aun no hay prospectos';
} ?>
<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>

<?php $this->stop() ?>
