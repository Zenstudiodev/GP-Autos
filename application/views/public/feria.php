<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php $this->layout('public/public_master_feria', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);
$CI =& get_instance();
?>
<?php $this->start('title') ?>
<title>GP-Autos | Predio virtual</title>
<?php $this->stop() ?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <!--row para incluir buscador-->
            <div class="row">
                <div class="col m12 s12">
                    <h1 class="titulo_feria">Feria Virtual -G&T Continental- </h1>
                    <div class="row">
                        <?php
                        $cardCount = 0;

                        foreach ($carros->result() as $carro)
                        {
                            $cardCount++
                            ?>
                            <div class="col s12 m3">

                                <div class="card">
                                    <?php
                                    if($carro->feria == '1' && $carro->crr_precio_descuento < $carro->crr_precio){
                                        ?>
                                        <img class="ribbon" src="<?php echo base_url()?>/ui/public/images/feria/ribbon.png">
                                    <?php }?>
                                    <div class="card-image waves-effect waves-block waves-light">

                                        <div class="imageContainer">

                                            <a href="<?php echo base_url() . 'index.php/Carro/ver_feria/' . $carro->id_carro ?>">

                                                <img class="activator"
                                                     src="<?php echo 'https://www.gpautos.net//web/images_cont/' . $carro->id_carro . ' (1).jpg' ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <a href="<?php echo base_url() . 'Carro/ver_feria/' . $carro->id_carro ?>">
                                            <span class="card-title  grey-text text-darken-4"><?php echo substr($carro->id_marca, 0, 9); ?></span>
                                        </a>
                                        <p>
                                            <?php echo substr($carro->id_linea, 0, 12); ?>
                                            - <?php echo $carro->crr_modelo ?><br>
                                            <a href="<?php echo base_url() . 'Carro/ver_feria/' . $carro->id_carro ?>"
                                               class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light">ver</a>
                                        </p>
                                    </div>
                                    <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <?php
                                        $marca_str = character_limiter($carro->id_marca, 2);
                                        echo $marca_carro ?>
                                        <i class="material-icons right">close</i></span>
                                        <p class="">
                                            <?php
                                            $linea_str = character_limiter($carro->id_linea, 6);
                                            echo $linea_str; ?>
                                            - <?php echo $carro->crr_modelo ?><br>
                                            <?php if ($carro->crr_moneda_precio == '$')
                                            {
                                                setlocale(LC_MONETARY, "en_US");
                                            }
                                            else
                                            {
                                                setlocale(LC_MONETARY, "es_GT");
                                            }
                                            ?>
                                            <span class="green-text"><?php echo mostrar_precio_carro($carro->crr_precio, $carro->crr_moneda_precio); ?></span>

                                        </p>
                                        <p>
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <?php if ($cardCount == 4) { ?>
                            <div class="row">
                        <?php } ?>
                            <?php if ($cardCount == 4 || $cardCount == 8) { ?>
                            </div>

                        <?php } ?>
                        <?php } ?>
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

    });




</script>
<?php $this->stop() ?>
