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

//deposito

//Boleta
$boleta = array(
    'type' => 'text',
    'name' => 'boleta',
    'id' => 'boleta',
    'class' => ' validate',
    'placeholder' => 'Boleta',
    'required' => 'required',
);
//Banco
$banco = array(
    'name' => 'banco',
    'id' => 'banco',
    'class' => 'validate',
    'required' => 'required'
);
$banco_options = array(
    "gyt" => "GyT",
    "bi" => "BI",
);

//Pago efectivo

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
?>


<?php $this->start('css_p') ?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
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
                <div class="col m12">
                    <h5>Datos de pago</h5>
                    <div class="card">
                        <form id="Metodo_pago" method="post" action="<?php echo base_url() ?>cliente/datos_pago">
                            <div class="card-content">
                                <?php if ($forma_pago == 'pago_deposito') { ?>

                                    <div class="row">
                                        <div class="card-panel orange darken-1">
                                            <div class="row borde_blanco">
                                                <h3 class="white-text text-center">
                                                    Cuentas disponibles para depósito
                                                </h3>
                                                <div class="col m2"></div>
                                                <div class="col m5">
                                                    <h5 class="white-text">Banco insustrial</h5>
                                                    <p class="white-text">
                                                        3170003004<br>
                                                        GPAUTOS S.A.<br>
                                                    </p>
                                                </div>
                                                <div class="col m5">
                                                    <h5 class="white-text">Banco GyT</h5>
                                                    <p class="white-text">
                                                        0000271643<br>
                                                        GPAUTOS S.A.<br>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <?php echo form_input($boleta); ?>
                                            <label for="boleta">Boleta:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <!--Banco-->
                                            <?php echo form_dropdown($banco, $banco_options); ?>
                                            <label for="banco">Banco</label>
                                        </div>
                                    </div>

                                <?php } ?>
                                <?php if ($forma_pago == 'pago_efectivo') { ?>
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
                            <?php } ?>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                    datos de pago
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
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
</script>
<?php $this->stop() ?>
