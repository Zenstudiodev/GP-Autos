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
//datos de usuario

$datos_usuario = $datos_usuario->row();

//datos facturacion
$nombre_facturacion = array(
    'type' => 'text',
    'name' => 'nombre_facturacion',
    'id' => 'nombre_facturacion',
    'class' => ' validate',
    'value' => $datos_usuario->first_name . ' ' . $datos_usuario->last_name,
    //'placeholder' => 'Nombre en la tarjeta',
    'required' => 'required',
);
$direccion_facturacion = array(
    'type' => 'text',
    'name' => 'direccion_facturacion',
    'id' => 'direccion_facturacion',
    'class' => ' validate',
    //'value' => $datos_usuario->first_name . ' ' . $datos_usuario->last_name,
    //'placeholder' => 'Nombre en la tarjeta',
    'required' => 'required',
);
$nit_facturacion = array(
    'type' => 'text',
    'name' => 'nit_facturacion',
    'id' => 'nit_facturacion',
    'class' => ' validate',
    //'value' => $datos_usuario->first_name . ' ' . $datos_usuario->last_name,
    //'placeholder' => 'Nombre en la tarjeta',
    'required' => 'required',
);

//pago en linea
$nombre_tarjeta = array(
    'type' => 'text',
    'name' => 'nombre_tarjeta',
    'id' => 'nombre_tarjeta',
    'class' => ' validate',
    'value' => $datos_usuario->first_name . ' ' . $datos_usuario->last_name,
    //'placeholder' => 'Nombre en la tarjeta',
    'required' => 'required',
);
$numero_tarjeta = array(
    'type' => 'text',
    'name' => 'card_number',
    'id' => 'card_number',
    'class' => ' validate',
    //'placeholder' => 'Numero de tarjeta',
    'required' => 'required',
);

$mes_vencimiento_tarjeta_select = array(
    'name' => 'mes_vencimiento_tarjeta',
    'id' => 'mes_vencimiento_tarjeta',
    'class' => ' validate browser-default',
    //'placeholder' => 'Mes',
    'required' => 'required',
);

$mes_vencimiento_tarjeta_select_options = array(
    "01" => "Enero (01)",
    "02" => "Febrero (02)",
    "03" => "Marzo (03)",
    "04" => "Abril (04)",
    "05" => "Mayo (05)",
    "06" => "Junio (06)",
    "07" => "Julio (07)",
    "08" => "Agosto (08)",
    "09" => "Septiembre (09)",
    "10" => "Octubre (10)",
    "11" => "Nombiembre (11)",
    "12" => "Diciembre (12)",
);


$a_vencimiento_tarjeta = array(
    'name' => 'a_vencimiento_tarjeta',
    'id' => 'a_vencimiento_tarjeta',
    'class' => ' validate browser-default',
    //'placeholder' => 'Año',
    'required' => 'required',
);
$a_vencimiento_tarjeta_select_options = array(
    "18" => "2018",
    "19" => "2019",
    "20" => "2020",
    "21" => "2021",
    "22" => "2022",
    "23" => "2023",
    "24" => "2024",
    "25" => "2025",
    "26" => "2026",
    "27" => "2027",
    "28" => "2028",
    "29" => "2029",
    "30" => "2030",
);

$cvv_tarjeta = array(
    'type' => 'text',
    'name' => 'cvv_tarjeta',
    'id' => 'cvv_tarjeta',
    'class' => ' validate',
    //'placeholder' => 'CVV',
    'required' => 'required',
);

//deposito

//Boleta
$boleta = array(
    'type' => 'text',
    'name' => 'boleta',
    'id' => 'boleta',
    'class' => ' validate',
    //'placeholder' => 'Boleta',
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

<?php $this->start('title') ?>
<title>Datos de pago</title>
<?php $this->stop() ?>
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
                    <div class="card">
                        <form id="Metodo_pago" method="post"
                              action="<?php echo base_url() ?>cliente/guardar_pago_en_linea">
                            <div class="card-content">
                                <?php if (isset($error)) { ?>
                                    <div class="alert alert-danger alert-block"><a class="close" data-dismiss="alert"
                                                                                    href="#">×</a>
                                        <h4 class="alert-heading">Ocurrio un problema al procesar su pago</h4>
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($mensaje)) { ?>
                                    <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                    href="#">×</a>
                                        <h4 class="alert-heading">Acción exitosa!</h4>
                                        <?php echo $mensaje; ?>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col m8">
                                        <div class="card-panel grey lighten-3">
                                            <h5>Datos de facturación</h5>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <?php echo form_input($nombre_facturacion); ?>
                                                    <label for="nombre_tarjeta">Nombre factura:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <?php echo form_input($direccion_facturacion); ?>
                                                    <label for="nombre_tarjeta">Dirección:</label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <?php echo form_input($nit_facturacion); ?>
                                                    <label for="nombre_tarjeta">NIT:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Datos de pago</h5>
                                        <?php if ($forma_pago == 'pago_en_linea') { ?>

                                            <div class="row">
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <?php echo form_input($nombre_tarjeta); ?>
                                                    <label for="nombre_tarjeta">Nombre en tarjeta:</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <?php echo form_input($numero_tarjeta); ?>
                                                    <label for="numero_tarjeta">Número de tarjeta:</label>
                                                    <span class="card_icon"></span> </p>
                                                    <div class="status card-panel ">
                                                        <span class="status_icon"></span>
                                                        <span class="status_message"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="input-field col m4 s12">
                                                    <div class="row">
                                                        <div class=" col s12 m12">
                                                            <label for="mes_vencimiento_tarjeta">Mes de
                                                                vencimiento</label>
                                                            <br>
                                                        </div>
                                                        <div class="input-field col s12 m12">
                                                            <!--UBICACIÓN-->
                                                            <?php echo form_dropdown($mes_vencimiento_tarjeta_select, $mes_vencimiento_tarjeta_select_options); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-field col m4 s12">
                                                    <div class="row">
                                                        <div class=" col s12 m12">
                                                            <label for="a_vencimiento_tarjeta">Año de
                                                                vencimiento</label>
                                                            <br>
                                                        </div>
                                                        <div class="input-field col s12 m12">
                                                            <!--UBICACIÓN-->
                                                            <?php echo form_dropdown($a_vencimiento_tarjeta, $a_vencimiento_tarjeta_select_options); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-field col m4 s12">
                                                    <?php echo form_input($cvv_tarjeta); ?>
                                                    <label for="numero_tarjeta">Código de verificación </label>
                                                </div>
                                            </div>
                                        <?php } ?>
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
                                        <?php } ?>
                                    </div>
                                    <?php

                                    //calculos para anunci
                                    ?>

                                    <div class="col m4">
                                        <h5>Datos del anuncio</h5>
                                        <table class="striped table-bordes">
                                            <thead>
                                            <tr>
                                                <td>Pedido</td>
                                                <td>Total</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Anuncio: <span
                                                            id="anuncio_nombre"><?php echo $tipo_anuncio; ?></span>
                                                </td>
                                                <td>
                                                    <span id="anuncio_precio">Q.<?php echo $precio_anuncio->parametro_valor; ?></span>
                                                </td>
                                            </tr>
                                            <?php if ($precio_feria) { ?>
                                                <tr>
                                                    <td>
                                                        Feria
                                                    </td>
                                                    <td>
                                                    <span id="anuncio_precio_feria">
                                                        <?php echo $precio_feria->parametro_valor; ?>
                                                    </span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($precio_facebook) { ?>
                                                <tr>
                                                    <td>
                                                        Facebook
                                                    </td>
                                                    <td>
                                                        <span id="anuncio_precio_facebook">Q.<?php echo $precio_facebook->parametro_valor; ?></span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>Total a pagar:</td>
                                                <td><span id="total_a_pagar">Q.<?php echo $total_a_pagar; ?></span></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Pagar
                                            anuncio
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
<script src="<?php echo base_url() ?>ui/vendor/cardcheck/jquery.cardcheck.js"></script>
<script>
    $('.card input').bind('focus', function () {
        $('.card .status').hide();
    });
    $('.card input').bind('blur', function () {
        $('.card .status').show();
    });

    $('.card input').cardcheck({
        callback: function (result) {
            var status = (result.validLen && result.validLuhn) ? 'valid' : 'invalid',
                message = '',
                types = '';
            // Get the names of all accepted card types to use in the status message.
            for (i in result.opts.types) {
                types += result.opts.types[i].name + ", ";
            }
            types = types.substring(0, types.length - 2);
            // Set status message
            if (result.len < 1) {
                message = 'Por favor ingrese el número de la tarjeta';
            } else if (!result.cardClass) {
                message = 'Aceptamos tarjetas: ' + types + '.';
            } else if (!result.validLen) {
                message = 'Revise que el numero que escribio coinicde con su tarjeta ' + result.cardName + ' (al parecer hay algun número incorrecto.)';
            } else if (!result.validLuhn) {
                message = 'Revise que el numero que escribio coinicde con su tarjeta ' + result.cardName + ' (did you mistype a digit?)';
            } else {
                message = 'El número de la tarjeta ' + result.cardName + ' que ingreso parece válido.';
            }

            // Show credit card icon
            $('.card .card_icon').removeClass().addClass('card_icon ' + result.cardClass);

            // Show status message
            $('.card .status').removeClass('invalid valid').addClass(status).children('.status_message').text(message);
        }
    });

    $(document).ready(function () {
        $('select').material_select();
    });
</script>
<?php $this->stop() ?>
