<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/04/2018
 * Time: 4:27 PM
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


//>Boleta
$boleta = array(
    'type' => 'text',
    'name' => 'boleta',
    'id' => 'boleta',
    'class' => ' validate',
    //'placeholder' => 'Dirección',
    //'value'       => $carro->crr_codigo,
    //'readonly'    => 'readonly',
    'required' => 'required',
    //'disabled'    => 'disabled'
);
//carro_id
$carro_id = array(
    'type' => 'text',
    'name' => 'carro_id',
    'id' => 'carro_id',
    //'placeholder' => 'Dirección',
    'value' => $carro->id_carro,
    'readonly' => 'readonly',
    'required' => 'required',
    //'disabled'    => 'disabled'
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

?>


<?php $this->start('css_p') ?>

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
                                    <img src="web/images_cont/<?php echo $carro->id_carro ?> (1).jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?php echo $carro->id_marca . ' - ' . $carro->id_linea . ' - ' . $carro->crr_modelo ?></span>
                                    <p>Llene los datos de su boleta para activar su anuncio. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m9">
                    <h5>Datos de cobro</h5>
                    <div class="card">
                        <form id="formulario_pago" method="post"
                              action="<?php echo base_url() ?>cliente/guarda_pago_deposito">
                            <div class="card-content">
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
                                        <?php echo form_input($carro_id); ?>
                                        <label for="carro_id">Carro ID:</label>
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
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                            forma de pago
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