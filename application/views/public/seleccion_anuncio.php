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

//UBICACION
$ubicacion_carro_select = array(
    'name' => 'ubicacion_anuncio',
    'id' => 'ubicacion_anuncio',
    'class' => 'validate',
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
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <!--UBICACIÓN-->
                                        <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA'); ?>
                                        <label class="control-label">UBICACIÓN</label>
                                    </div>
                                </div>
                                <div id="row">
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr>
                                            <td>Caracteristicas</td>
                                            <td class="t_individual">Individual</td>
                                            <td class="t_vip">VIP</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Indefinido
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="El anuncio permanecera en la pagina hasta que se venda ">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Crédito
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Se facilitara el tramite del crédito para la compra del vehiculo ">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Calcomanía
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Instalación de calcomanía con número de teléfono y código de vehículo">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>Facebook
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Se pagara publicidad en facebook para promocionar el vehhiculo">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Comision
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Comision en concepto de tramites sobre el valor del vehiculo">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip">5 %</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tipo de venta
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Vanta Directa: el cliente hace la necociación directaemente">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual">Directo</td>
                                            <td class="t_vip">Bajo cita</td>
                                        </tr>
                                        <tr>
                                            <td>Mailing
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Envío de correo a base de GP Autos con 60,000 correos y subiendo ">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Asesor Personalizado
                                                <i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="Apoyo en coordinacion de citas y promocion del vehículo">
                                                    help_outline
                                                </i>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Precio
                                            </td>
                                            <td class="t_individual">
                                                Q.<?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?></td>
                                            <td class="t_vip">
                                                Q.<?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?></td>
                                        </tr>
                                        <tr class="grey darken-2 white-text">
                                            <td>Seleccione opción</td>
                                            <td class="t_individual"><input name="tipo_anuncio" type="radio"
                                                                            id="anuncio_individual" class="validate"
                                                                            value="individual" required/>
                                                <label for="anuncio_individual"
                                                       class="seleccion_anuncio_radio_label va"></label></td>
                                            <td class="t_vip"><input name="tipo_anuncio" type="radio" id="anuncio_vip"
                                                                     value="vip" required/>
                                                <label for="anuncio_vip" class="seleccion_anuncio_radio_label"></label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
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
                                                Anuncio: <span id="anuncio_nombre"></span>
                                            </td>
                                            <td>
                                                <span id="anuncio_precio"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="feria_check" name="feria_check" value="feria_si" />
                                                <label for="feria_check">Feria</label></td>
                                            <td><span id="anuncio_precio_feria"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="facebook_check" name="facebook_check" value="facebook_si" />
                                                <label for="facebook_check">15 dias facebook</label></td>
                                                </td>
                                            <td><span id="anuncio_precio_facebook"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Total a pagar:</td>
                                            <td><span id="total_a_pagar"></span></td>
                                        </tr>
                                        </tbody>
                                    </table>

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
    var total_a_pagar;

    precio_individual = <?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?>;
    precio_vip = <?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?>;
    precio_feria = <?php echo display_formato_dinero_return($precio_feria->parametro_valor); ?>;
    precio_facebook = <?php echo display_formato_dinero_return($precio_facebook->parametro_valor); ?>;

    $("#seleccion_anuncio").on('change', function () {
        //reset total a pagar
        total_a_pagar = 0;
        //reset precios facebook y feria
        $("#anuncio_precio_feria").html('');
        $("#anuncio_precio_facebook").html('');



        // ubicación
        ubicacion = $("#ubicacion_anuncio").val();
        if (ubicacion == 'GUATEMALA') {
            $(".t_vip").show();
        } else {
            $(".t_vip").hide();
        }
        //anuncio seleccionado
        tipo_anuncio = $("input[name='tipo_anuncio']:checked").val();

        if(tipo_anuncio){
            if(tipo_anuncio =='individual'){
                precio_anuncio = precio_individual;
            }
            if(tipo_anuncio == 'vip'){
                precio_anuncio = precio_vip;
            }
            $("#anuncio_precio").html(precio_anuncio);
            $("#anuncio_nombre").html(tipo_anuncio);
            total_a_pagar = total_a_pagar + precio_anuncio;
        }
        //feria
        feria = $("#feria_check:checked").val();
        if(feria){
            console.log(feria);
            total_a_pagar = total_a_pagar + precio_feria;
            $("#anuncio_precio_feria").html(precio_feria);
        }
        //facebook
        facebook =$("#facebook_check:checked").val();
        if(facebook){
            console.log(facebook);
            total_a_pagar = total_a_pagar + precio_facebook;
            $("#anuncio_precio_facebook").html(precio_facebook);
        }

        $("#total_a_pagar").html(total_a_pagar);



    });
    $(document).ready(function () {
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
<?php $this->stop() ?>
