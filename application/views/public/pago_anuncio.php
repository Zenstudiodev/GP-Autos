<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/04/2018
 * Time: 7:12 PM
 */
?>
<?php $this->layout('public/public_master_test', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

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
                                    <img src="/upload/1000001 (1).jpg">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                                class="material-icons">add</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?php echo $carro->id_marca . ' - ' . $carro->id_linea . ' - ' . $carro->crr_modelo ?></span>
                                    <p>Seleccione el método de pago que desea usar para este anuncio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m9">
                    <h5>Metodos de pago</h5>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <a href="<?php echo base_url() . 'cliente/pago_tarjeta/' . $carro->id_carro ?>">
                                <i class="material-icons circle green">credit_card</i>
                                <span class="title">Pago con tarjeta</span>
                                <p>Pago con tarjeta de crédito o débito (Visa Master Card) </p>
                                <span class="secondary-content"><i class="material-icons">send</i></span>
                            </a>
                        </li>
                        <li class="collection-item avatar">
                            <a href="<?php echo base_url() . 'cliente/pago_en_linea/' . $carro->id_carro ?>">
                                <i class="material-icons circle green">account_balance</i>
                                <span class="title">Pago en línea</span>
                                <p>Pago desde la banca en linea de su banco</p>
                                <span class="secondary-content"><i class="material-icons">send</i></span>
                            </a>
                        </li>
                        <li class="collection-item avatar">
                            <a href="<?php echo base_url() . 'cliente/pago_efectivo_depósito/' . $carro->id_carro ?>">
                                <i class="material-icons circle green">attach_money</i>
                                <span class="title">Efectivo o depósito</span>
                                <p>Efectivo o depósito </p>
                                <span class="secondary-content"><i class="material-icons">send</i></span>
                            </a>
                        </li>
                    </ul>
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
