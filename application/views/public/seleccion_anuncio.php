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

// Get a reference to the controller object
$CI = get_instance();

//UBICACION
$ubicacion_carro_select = array(
    'name' => 'ubicacion_anuncio',
    'id' => 'ubicacion_anuncio',
    'class' => 'validate browser-default',
    'required' => 'required'
);
$ubicacion_carro_select_options = array(
    "ALTA VERAPAZ" => "ALTA VERAPAZ",
    "BAJA VERAPAZ" => "BAJA VERAPAZ",
    "CHIMALTENANGO" => "CHIMALTENANGO",
    "CHIQUIMULA" => "CHIQUIMULA",
    "EL PROGRESO" => "EL PROGRESO",
    "ESCUINTLA" => "ESCUINTLA",
    "GUATEMALA" => "GUATEMALA",
    "HUEHUETENANGO" => "HUEHUETENANGO",
    "IZABAL" => "IZABAL",
    "JALAPA" => "JALAPA",
    "JUTIAPA" => "JUTIAPA",
    "PETÉN" => "PETÉN",
    "QUETZALTENANGO" => "QUETZALTENANGO",
    "QUICHÉ" => "QUICHÉ",
    "RETALHULEU" => "RETALHULEU",
    "SACATEPÉQUEZ" => "SACATEPÉQUEZ",
    "SAN MARCOS" => "SAN MARCOS",
    "SANTA ROSA" => "SANTA ROSA",
    "SOLOLÁ" => "SOLOLÁ",
    "SUCHITEPÉQUEZ" => "SUCHITEPÉQUEZ",
    "TOTONICAPÁN" => "TOTONICAPÁN",
    "ZACAPA" => "ZACAPA"
);

if ($datos_cupon) {
    $datos_cupon = $datos_cupon->row();
}

$cupon_input = array(
    'type' => 'text',
    'name' => 'codigo_cupon',
    'id' => 'codigo_cupon',
    'value' => $datos_cupon->codigo,
    'class' => ' form-control',
    'placeholder' => 'Código de cupón',
);

$parametros = $parametros->result();
$precio_vip = $parametros[1];
$precio_individual = $parametros[2];
$precio_feria = $parametros[3];
$precio_facebook = $parametros[4];


?>
<?php $this->start('title') ?>
<title>Paga tu anuncio</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<!--Wizard pago-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/ui/public/css/wizard.css"/>
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
            <div class="row">
                <div class="col m12">
                    <h5>Seleccione tipo de anuncio</h5>
                    <div class="card">
                        <div class="card-content">

                            <form method="post" action="<?php echo base_url() ?>cliente/forma_pago"
                                  id="seleccion_anuncio">
                                <div class="row orange darken-3 ">
                                    <div class=" col s12 m12">
                                        <label class="control-label white-text">UBICACIÓN</label>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <!--UBICACIÓN-->
                                        <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA'); ?>
                                    </div>
                                    <p>&nbsp;</p>
                                </div>
                                <div id="row">
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr class="grey darken-2 white-text">
                                            <td>Caracteristicas</td>
                                            <td class="t_individual">Individual</td>
                                            <td class="t_vip">VIP</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Indefinido
                                                </p>
                                                <!--<i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="El anuncio permanecera en la pagina hasta que se venda ">
                                                    help_outline
                                                </i>-->
                                                <small>Anuncio permanecera hasta que se venda.</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Crédito
                                                </p>
                                                <small>Credito bancario disponible para tus clientes compradores</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Calcomanía
                                                </p>
                                                <small> ingresa tu codigo para recibir gratis tu calcomania</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Facebook
                                                </p>
                                                <small>Incluye publicidad pagada en fb por 15 dias</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Comision
                                                </p>
                                                <small>Comision por venta de vehiculo 5%</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip">5 %</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Tipo de venta
                                                </p>
                                                <small>Directa: el cliente hace la negociación directamente</small>
                                                <br>
                                                <small>Bajo cita: Demostración en oficina GP Autos</small>
                                            </td>
                                            <td class="t_individual">Directo</td>
                                            <td class="t_vip">Bajo cita</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Mailing
                                                </p>
                                                <small>1 envio de correo masivo a clientes de gpautos</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Asesor Personalizado
                                                </p>
                                                <small>Asesor de gpautos para vender tu carro</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Pago GPAUTOS
                                                </p>
                                                <small>Pago garantizado por parte de gpautos.s,a.</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">Precio</p>
                                            </td>
                                            <td class="t_individual">
                                                Q.<?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?></td>
                                            <td class="t_vip">
                                                Q.<?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?></td>
                                        </tr>
                                        <tr class="grey darken-2 white-text">
                                            <td>Seleccione opción</td>
                                            <td class="t_individual">
                                                <small>Seleccione opción</small>
                                                <br>
                                                <input name="tipo_anuncio" type="radio"
                                                       id="anuncio_individual" class="validate"
                                                       value="individual" required
                                                    <?php if($CI->session->tipo_anuncio){
                                                        if($CI->session->tipo_anuncio == 'individual'){?>
                                                            checked="checked"
                                                        <?php } }?>
                                                />
                                                <label for="anuncio_individual"
                                                       class="seleccion_anuncio_radio_label va"></label></td>
                                            <td class="t_vip">
                                                <small>Seleccione opción</small>
                                                <br>
                                                <input name="tipo_anuncio" type="radio" id="anuncio_vip"
                                                       value="vip" required
                                                    <?php if($CI->session->tipo_anuncio){
                                                        if($CI->session->tipo_anuncio == 'vip'){?>
                                                            checked="checked"
                                                        <?php } }?>
                                                />
                                                <label for="anuncio_vip" class="seleccion_anuncio_radio_label"></label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr class="grey darken-2 white-text">
                                            <td colspan="2">Cupones de descuento</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="2">
                                                Aplicar código de descuento
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo form_input($cupon_input); ?>
                                            </td>
                                            <td>
                                                <button id="cupon_button" class="btn ">Validar codigo</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <?php if (isset($mensaje)) { ?>
                                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                        href="#">×</a>
                                            <h4 class="alert-heading">Acción exitosa!</h4>
                                            <?php echo $mensaje; ?>
                                        </div>
                                    <?php } ?>
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr class="grey darken-2 white-text">
                                            <td>Agrégale interés a tu publicación</td>
                                            <td>Total</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Anuncio: <span id="anuncio_nombre"></span>
                                            </td>
                                            <td class="t_individual">
                                                <span id="anuncio_precio"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="facebook_check" name="facebook_check"
                                                       value="facebook_si"/>
                                                <label for="facebook_check">Más 15 dias anuncios en facebook
                                                    pagado</label>
                                            </td>
                                            <td class="t_individual"><span id="anuncio_precio_facebook"></span></td>
                                        </tr>
                                        <tr id="opcion_rotulacion">
                                            <td>
                                                <input type="checkbox" id="rotulacion_check" name="rotulacion_check"
                                                       value="rotulacion_si"/>
                                                <label for="rotulacion_check">Rotulación </label>
                                            </td>
                                            <td class="t_individual"><span id="anuncio_precio_rotulacion"></span></td>
                                        </tr>
                                        <tr>
                                             <td>
                                                 <input type="checkbox" id="feria_check" name="feria_check"
                                                        value="feria_si"/>
                                                 <label for="feria_check">Feria Virtual</label>
                                             </td>
                                             <td class="t_individual"><span id="anuncio_precio_feria"></span></td>
                                         </tr>
                                        <?php if(isset($datos_cupon)){  ?>
                                            <tr>
                                                <td>
                                                    <p>Cupón activo: <?php echo $datos_cupon->codigo; ?></p>
                                                </td>
                                                <td class="t_individual"><span id="t_descuento_cupon"></span></td>
                                            </tr>
                                        <?php }?>
                                        <tr>
                                            <td>Total a pagar:</td>
                                            <td class="t_individual"><span class="bold" id="total_a_pagar"></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="total_pagar" id="total_pagar" value="">
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <button type="submit" class="btn btn-success">Forma de pago</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    var ubicacion;
    var tipo_anuncio;
    var precio_anuncio;
    var precio_individual;
    var precio_vip;
    var feria;
    var precio_feria;
    var facebook;
    var precio_facebook;
    var rotulacion;
    var precio_rotulacion;
    var total_a_pagar;
    var cupon_activo;
    var valor_cupon;
    var calcomania;
    var ubicacion_anuncio;

    precio_individual = <?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?>;
    precio_vip = <?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?>;
    precio_feria = <?php echo display_formato_dinero_return($precio_feria->parametro_valor); ?>;
    precio_rotulacion = <?php echo display_formato_dinero_return($precio_feria->parametro_valor); ?>;
    precio_facebook = <?php echo display_formato_dinero_return($precio_facebook->parametro_valor); ?>;


    $("#cupon_button").on('click', function (event) {
        event.preventDefault();
        //obtenemos codigo para probar cupon
        cupon_a_probar = $("#codigo_cupon").val();
        ubicacion_anuncio = $("#ubicacion_anuncio").val();
        //console.log(cupon_a_probar);
        //comprobar cupon

        cupon_data = {
            cupon_code: cupon_a_probar,
            ubicacion_anuncio: ubicacion_anuncio
        };
        console.log(cupon_data);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>admin/validar_cupon',
            data: cupon_data,
            success: function (data) {
                console.log(data);
                if (data == 'no') {
                    // Materialize.toast(message, displayLength, className, completeCallback);
                    Materialize.toast('Codigo no valido', 4000) // 4000 is the duration of the toast
                }
                else if (data == 'no ubicacion') {
                    // Materialize.toast(message, displayLength, className, completeCallback);
                    Materialize.toast('Ese cupón no se puede usar en ese departamento', 4000) // 4000 is the duration of the toast
                }
                else if (data == 'no anuncio') {
                    // Materialize.toast(message, displayLength, className, completeCallback);
                    Materialize.toast('Este cupon no se puede usar con ese tipo de anuncio', 4000) // 4000 is the duration of the toast
                }else {
                    var obj = jQuery.parseJSON(data);
                    console.log(obj);
                    window.location.reload();
                }
            }
        });
    });

    $("#seleccion_anuncio").on('change', function () {
        //reset total a pagar
        total_a_pagar = 0;
        //reset precios facebook y feria
        $("#anuncio_precio_feria").html('');
        $("#anuncio_precio_facebook").html('');
        $("#anuncio_precio_rotulacion").html('');


        // ubicación
        ubicacion = $("#ubicacion_anuncio").val();
        if (ubicacion == 'GUATEMALA') {
            $(".t_vip").show();
        } else {
            $(".t_vip").hide();
        }
        //anuncio seleccionado
        tipo_anuncio = $("input[name='tipo_anuncio']:checked").val();
        //guardar
        tipo_anuncio_sesion = {
            tipo_anuncio: tipo_anuncio
        };
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>admin/sleccion_anuncio_session',
            data: tipo_anuncio_sesion,
            success: function (data) {
                // console.log(data);
            }
        });

        if (tipo_anuncio) {
            if (tipo_anuncio == 'individual') {
                precio_anuncio = precio_individual;
                $("#opcion_rotulacion").show();
            }
            if (tipo_anuncio == 'vip') {
                precio_anuncio = precio_vip;
                $("#opcion_rotulacion").hide();
                $( "#rotulacion_check" ).prop( "checked", false );
            }
            $("#anuncio_precio").html('Q.' + precio_anuncio);
            $("#anuncio_nombre").html(tipo_anuncio);
            total_a_pagar = total_a_pagar + precio_anuncio;
            //cupon

            <?php
            if(isset($datos_cupon)){
            if($datos_cupon->tipo == 'Porcentage'){
            ?>

            valor_cupon = precio_anuncio *0.<?php echo $datos_cupon->valor; ?>;
            console.log(valor_cupon);
            $("#t_descuento_cupon").html('-'+valor_cupon);
            <?php }
            if($datos_cupon->tipo == 'Valor') {?>
            <?php if($datos_cupon->tipo_auncio){?>
            console.log('<?php echo $datos_cupon->tipo_auncio; ?>');

            <?php } ?>
            console.log(tipo_anuncio);
            if(tipo_anuncio == '<?php echo strtolower($datos_cupon->tipo_auncio); ?>' ){
                valor_cupon = <?php echo $datos_cupon->valor; ?>;
            }else{
                valor_cupon = 0;
            }
            console.log(valor_cupon)
            $("#t_descuento_cupon").html('-'+valor_cupon);
            <?php }?>
            <?php }else{ ?>
            valor_cupon = 0;
            <?php }?>

            //total con descuento del cupon
            total_a_pagar = total_a_pagar - valor_cupon;
            console.log(total_a_pagar);

        }
        //feria
        feria = $("#feria_check:checked").val();
        if (feria) {
            console.log(feria);
            total_a_pagar = total_a_pagar + precio_feria;
            $("#anuncio_precio_feria").html(precio_feria);
        }
        //facebook
        facebook = $("#facebook_check:checked").val();
        if (facebook) {
            console.log(facebook);
            total_a_pagar = total_a_pagar + precio_facebook;
            $("#anuncio_precio_facebook").html('Q.' + precio_facebook);
        }

        //Rotulacion
        rotulacion = $("#rotulacion_check:checked").val();
        if (rotulacion) {
            console.log(rotulacion);
            total_a_pagar = total_a_pagar + precio_rotulacion;
            $("#anuncio_precio_rotulacion").html('Q.' + precio_rotulacion);
        }
        //total a pagar
        $("#total_a_pagar").html('Q.' + total_a_pagar);
        $("#total_pagar").val(total_a_pagar);


    });

    $(document).ready(function () {
        $('select').material_select();

        //anuncio seleccionado
        tipo_anuncio = $("input[name='tipo_anuncio']:checked").val();
        if (tipo_anuncio) {
            if (tipo_anuncio == 'individual') {
                precio_anuncio = precio_individual;
            }
            if (tipo_anuncio == 'vip') {
                precio_anuncio = precio_vip;
            }
            $("#anuncio_precio").html('Q.' + precio_anuncio);
            $("#anuncio_nombre").html(tipo_anuncio);
            total_a_pagar = 0;
            total_a_pagar = total_a_pagar + precio_anuncio;
            //cupon
            <?php
            if(isset($datos_cupon)){
            if($datos_cupon->tipo == 'Porcentage'){
            ?>

            valor_cupon = precio_anuncio *0.<?php echo $datos_cupon->valor; ?>;
            console.log(valor_cupon);
            $("#t_descuento_cupon").html('-'+valor_cupon);
            <?php }
            if($datos_cupon->tipo == 'Valor') {?>
            <?php if($datos_cupon->tipo_auncio){?>
            console.log('<?php echo $datos_cupon->tipo_auncio; ?>');
            <?php } ?>
            console.log(tipo_anuncio);
            if(tipo_anuncio == '<?php echo strtolower($datos_cupon->tipo_auncio); ?>' ){
                valor_cupon = <?php echo $datos_cupon->valor; ?>;
            }else{
                valor_cupon = 0;
            }
            console.log(valor_cupon)
            $("#t_descuento_cupon").html('-'+valor_cupon);
            <?php }?>
            <?php }else{ ?>
            valor_cupon = 0;
            <?php }?>
            //total con descuento del cupon
            total_a_pagar = total_a_pagar - valor_cupon;
            console.log(total_a_pagar);
        }
        //feria
        feria = $("#feria_check:checked").val();
        if (feria) {
            console.log(feria);
            total_a_pagar = total_a_pagar + precio_feria;
            $("#anuncio_precio_feria").html(precio_feria);
        }
        //facebook
        facebook = $("#facebook_check:checked").val();
        if (facebook) {
            console.log(facebook);
            total_a_pagar = total_a_pagar + precio_facebook;
            $("#anuncio_precio_facebook").html('Q.' + precio_facebook);
        }

        //Rotulacion
        rotulacion = $("#rotulacion_check:checked").val();
        if (rotulacion) {
            console.log(rotulacion);
            total_a_pagar = total_a_pagar + precio_rotulacion;
            $("#anuncio_precio_rotulacion").html('Q.' + precio_rotulacion);
        }

        $("#total_a_pagar").html('Q.' + total_a_pagar);
        $("#total_pagar").val(total_a_pagar);

    });
</script>
<?php $this->stop() ?>
