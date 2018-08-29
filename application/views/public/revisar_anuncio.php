<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 14/05/2018
 * Time: 12:02 AM
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
            <h5>Revisar Anuncio</h5>
            <div class="row">
                <div class="col s12 m3">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card">
                                <div class="card-image">
                                    <img src="/web/images_cont/<?php echo $carro->id_carro?> (1).jpg">
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
                    <h5>Datos del anucio</h5>
                    <div class="card">
                        <form id="formulario_pago" method="post"
                              action="<?php echo base_url() ?>cliente/guarda_pago_efectivo">
                            <div class="card-content">
                                <div class="row">
                                    <span class="card-title">Datos del vehiculo: Código <?php echo $carro->id_carro ?></span>
                                    <h3>Precio <?php echo $carro->crr_moneda_precio.' '. $carro->crr_precio?></h3>
                                    <div class="col s12 m12 l6">
                                        <ul class="collection">
                                            <?php if ($carro->id_tipo_carro != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Tipo</span>
                                                    <?php echo $carro->id_tipo_carro ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->id_marca != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text white-text">Marca</span>
                                                    <?php echo $carro->id_marca ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->id_linea != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Línea</span>
                                                    <?php echo $carro->id_linea ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_modelo != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Modelo</span>
                                                    <?php echo $carro->crr_modelo ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_origen != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Origen</span>
                                                    <?php echo $carro->crr_origen ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_motor != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Motor</span>
                                                    <?php echo $carro->crr_motor ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_transmision != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Transmisión</span>
                                                    <?php echo $carro->crr_transmision ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_cilindros != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">No. Cilindros</span>
                                                    <?php echo $carro->crr_cilindros ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_kilometraje != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Kilometraje</span>
                                                    <?php echo $carro->crr_kilometraje ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_combustible != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Combustible</span>
                                                    <?php echo $carro->crr_combustible ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_puertas != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Puertas</span>
                                                    <?php echo $carro->crr_puertas ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="col s12 m12 l6">
                                        <ul class="collection">
                                            <?php if ($carro->crr_color != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Color</span>
                                                    <?php echo $carro->crr_color ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_tapiceria != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Tapiceria</span>
                                                    <?php echo $carro->crr_tapiceria ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_ac != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text white-text">A/C</span>
                                                    <?php echo $carro->crr_ac ?>
                                                </li>
                                            <?php } ?>

                                            <?php if ($carro->crr_alarma != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Alarma</span>
                                                    <?php echo $carro->crr_alarma ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_aros_magnecio != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Aros de Magnesio</span>
                                                    <?php echo $carro->crr_aros_magnecio ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_bolsas_aire != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Bolsa de aire</span>
                                                    <?php echo $carro->crr_bolsas_aire ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_cerradura_central != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Cerradura central</span>
                                                    <?php echo $carro->crr_cerradura_central ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_espejos != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Espejos</span>
                                                    <?php echo $carro->crr_espejos ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_platos == 'si') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Platos</span>
                                                    <?php echo $carro->crr_platos ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_polarizado != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Polarizado</span>
                                                    <?php echo $carro->crr_polarizado ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_radio != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Radio</span>
                                                    <?php echo $carro->crr_radio ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_sunroof != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Sunroof</span>
                                                    <?php echo $carro->crr_sunroof ?>
                                                </li>
                                            <?php } ?>

                                            <?php if ($carro->crr_timon_hidraulico != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Timon Hidrahulico</span>
                                                    <?php echo $carro->crr_timon_hidraulico ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($carro->crr_vidrios_electricos != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Vidrios eléctricos</span>
                                                    <?php echo $carro->crr_vidrios_electricos ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <span class="card-title">Forma de pago</span>
                                    <?php if ($pagos_carro) { ?>

                                        <pre>
                                            <?php ?>
                                        </pre>

                                        <div class="widget-box">
                                            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                                                <h5>Pagos</h5>
                                            </div>
                                            <div class="widget-content nopadding">

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" cellspacing="0"
                                                           width="100%" id="tabla_carros">
                                                        <thead>
                                                        <tr>
                                                            <th>fecha</th>
                                                            <th>user_id</th>
                                                            <th>carro_id</th>
                                                            <th>metodo</th>
                                                            <th>banco</th>
                                                            <th>direccion</th>
                                                            <th>boleta</th>
                                                            <th>monto</th>
                                                            <th>telefono</th>
                                                            <th>estado</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                        foreach ($pagos_carro->result() as $pago) {
                                                            ?>
                                                            <tr class="gradeX">
                                                                <td><?php echo $pago->fecha ?></td>
                                                                <td><?php echo $pago->user_id ?></td>
                                                                <td> <?php echo $pago->carro_id ?></td>
                                                                <td> <?php echo $pago->metodo ?></td>
                                                                <td> <?php echo $pago->banco ?></td>
                                                                <td> <?php echo $pago->direccion ?></td>
                                                                <td> <?php echo $pago->boleta ?></td>
                                                                <td> <?php echo $pago->monto ?></td>
                                                                <td> <?php echo $pago->telefono ?></td>
                                                                <td> <?php echo $pago->estado ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        echo 'Aun no hay pagos';
                                    } ?>
                                </div>
                                <div class="row">
                                    <span class="card-title">Su anuncio esta casi listo</span>
                                    <p>Recibimos los datos de su vehiculo le notificaremos en cuanto este publicado o si se debe corregir algun dato</p>
                                </div>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect waves-light btn" href="<?php echo base_url()?>cliente/perfil"><i class="material-icons left">account_circle</i>Ir a mi perfil</a>

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