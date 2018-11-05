<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/04/2018
 * Time: 7:12 PM
 */
?>
<?php $this->layout('public/public_master_cliente', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);



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


                                </div>
                                <div class="card-content">
                                    <span class="card-title"></span>
                                    <p>Seleccione el método de pago que desea usar para este anuncio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m9">
                    <h5>Metodos de pago</h5>
                    <form id="Metodo_pago" method="post" action="<?php echo base_url()?>cliente/datos_pago">
                    <ul class="collection">
                        <li class="collection-item avatar">
                                <i class="material-icons circle green">attach_money</i>
                                <span class="title">Depósito</span>
                                <p>Deposito a cuentas bancarias Bi o GyT  </p>
                                <span class="secondary-content">
                                    <input name="forma_pago" type="radio" id="pago_deposito" value="pago_deposito"/>
                                <label for="pago_deposito"></label>
                                </span>
                        </li>
                        <li class="collection-item avatar">

                                <i class="material-icons circle green">attach_money</i>
                                <span class="title">Efectivo</span>
                                <p>Se llegara a hacer el cobro a su ubicación</p>
                                <p>O pagara en las oficinas de Gp Autos</p>
                                <span class="secondary-content">
                                    <input name="forma_pago" type="radio" id="pago_efectivo" value="pago_efectivo"/>
                                <label for="pago_efectivo"></label>
                                </span>
                        </li>
                        <li class="collection-item">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Seleccionar
                                <i class="material-icons right">send</i>
                            </button>
                        </li>
                    </ul>
                    </form>
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
