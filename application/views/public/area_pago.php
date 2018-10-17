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
    'name' => 'ubicacion_carro',
    'id' => 'ubicacion_carro',
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
            <h5>Pagar Anuncio</h5>
            <div class="row">
                <div class="col m12">
                    <h5>Seleccione tipo de anuncio</h5>
                    <div class="card">
                        <div class="card-content">

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <!--UBICACIÓN-->
                                    <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA'); ?>
                                    <label class="control-label">UBICACIÓN</label>
                                </div>
                            </div>
                            <div id="row">
                                <table class="striped">
                                    <thead>
                                    <tr>
                                        <td>Caracteristicas</td>
                                        <td>Individual</td>
                                        <td>VIP</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Indefinido
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="El anuncio permanecera en la pagina hasta que se venda ">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">check</i>
                                        </td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Crédito
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Se facilitara el tramite del crédito para la compra del vehiculo ">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">check</i>
                                        </td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Calcomanía
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Instalación de calcomanía con número de teléfono y código de vehículo">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">check</i>
                                        </td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>Facebook
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Se pagara publicidad en facebook para promocionar el vehhiculo">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">check</i>
                                        </td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Comision
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Comision en concepto de tramites sobre el valor del vehiculo">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">close</i>
                                        </td>
                                        <td>5 %</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tipo de venta
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Vanta Directa: el cliente hace la necociación directaemente">
                                                help_outline
                                            </i>
                                        </td>
                                        <td>Directo</td>
                                        <td>Bajo cita</td>
                                    </tr>
                                    <tr>
                                        <td>Mailing
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Envío de correo a base de GP Autos con 60,000 correos y subiendo ">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">close</i></td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asesor Personalizado
                                            <i class="material-icons tooltipped" data-position="bottom" data-delay="50"
                                               data-tooltip="Apoyo en coordinacion de citas y promocion del vehículo">
                                                help_outline
                                            </i>
                                        </td>
                                        <td><i class="material-icons">close</i></td>
                                        <td><i class="material-icons">check</i></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Precio
                                        </td>
                                        <td>Q.<?php echo display_formato_dinero_return($precio_individual->parametro_valor);?></td>
                                        <td>Q.<?php echo display_formato_dinero_return($precio_vip->parametro_valor);?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input name="group1" type="radio" id="test1"/>
                                            <label for="test1"></label></td>
                                        <td><input name="group1" type="radio" id="test2"/>
                                            <label for="test2"></label></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
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
    $(document).ready(function () {
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
<?php $this->stop() ?>
