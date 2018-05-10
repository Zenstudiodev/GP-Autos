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
                            <h1 class="white-text text-center">Gracias por precalificarte por medio de GPautos</h1>
                            <span class="card-title white-text text-center">En breve te enviaremos la respuesta de tu precalificación</span>
                            <p class="text-center">
                                <img src="<?php echo base_url() ?>/ui/public/images/home_basket.png">
                            </p>
                            <span class="card-title white-text text-center">GPAUTOS TE NOTIFICARA VIA CORREO ELECTRONICO EL RESULTADO DE TU PRECALIFICACIÓN</span>
                            <span class="card-title white-text text-center">Nota: <br>Te recomendamos que encaso  tu precalificación sea positiva tienes 10 dias habiles para ingresar tu papeleria fisica en oficinas de gpautos:</span>
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