<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<?php $this->start('meta') ?>
    <!--Meta description Tags-->
    <title>Financiamiento - GP Autos </title>
<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>
<?php $this->start('page_content') ?>

    <div class="divider"></div>
    <div class="container">
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="orange darken-2">
                            <h1 class="white-text text-center">Gracias por cotizar con GPAUTOS.NET</h1>
                            <span class="card-title white-text text-center">En un momento uno de nuestros asesores te enviará tu cotización y se comunicará con tu persona.</span>
                            <p class="text-center">
                                <img src="<?php echo base_url() ?>/ui/public/images/home_basket.png">
                            </p>
                            <hr>
                            <p class="white-text" >
                                En caso desees aplicar a crédito te enviamos los requisitos solicitados por el banco:<br>
                                - 3 últimos estados de cuenta bancarios.<br>
                                - Carta de ingresos de la empresa donde laboras.<br>
                                - Copia de DPI - copia de 2do.documento de identificación.
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="divider"></div>




<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<?php $this->stop() ?>