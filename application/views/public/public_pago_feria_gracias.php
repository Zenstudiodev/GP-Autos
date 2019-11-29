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
    <title>Feria virtual</title>
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
                            <h1 class="white-text text-center">Gracias por realizar el pago para participar en la feria virtual</h1>
                            <span class="card-title white-text text-center">Su carro ya esta inscrito en la feria virtual</span>
                            <p class="text-center">
                                <img src="<?php echo base_url() ?>/ui/public/images/home_basket.png">
                            </p>
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