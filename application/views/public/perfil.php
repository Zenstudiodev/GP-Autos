<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
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
$usuario = $datos_usuario->row();


$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<!--<pre>
<?php /*print_r($datos_usuario->row());*/ ?>
</pre>-->
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m3">
                    <!-- Profile About  -->
                    <div class="card cyan">
                        <div class="card-content white-text">
                            <span class="card-title"><?php echo $usuario->first_name . ' ' . $usuario->last_name ?></span>
                        </div>
                    </div>
                    <!-- Profile About  -->
                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">

                                <p>
                                    <span class="badge green">
                                        <?php
                                        if ($carros) {
                                            echo $carros->num_rows();
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </span>
                                    <i class="material-icons left">directions_car</i> Carros en el sistema</p>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->
                </div>
                <!-- profile-page-sidebar-->
                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m9">
                    <a class="waves-effect waves-light btn orange darken-1" href="publicar_carro"><i
                                class="material-icons left">cloud</i>Publicar un carro</a>
                    <h1 class="texto_naranja">Vehículos ingresados</h1>
                    <div class="row">
                        <div class="col m12 s12">
                            <div class="row">
                                <?php
                                if ($carros){
                                $cardCount = 0;

                                foreach ($carros->result() as $carro) {
                                    $cardCount++
                                    ?>
                                    <div class="col s12 m3">

                                        <div class="card">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <div class="imageContainer">
                                                    <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->id_carro ?>">
                                                        <img class="activator"
                                                             src="<?php echo 'http://www.gpautos.net/web/images_cont/' . $carro->id_carro . ' (1).jpg' ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->id_carro ?>">
                                                    <span class="card-title  grey-text text-darken-4"><?php echo substr($carro->id_marca, 0, 9); ?></span>
                                                </a>
                                                <p><span class="badge  <?php estados_a_colores($carro->crr_estatus);?>"><?php echo $carro->crr_estatus?></span>Estado:</p>
                                                <p>
                                                    <?php echo substr($carro->id_linea, 0, 12); ?>
                                                    - <?php echo $carro->crr_modelo ?><br>

                                                    <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->id_carro ?>"
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
                                                    <?php if ($carro->crr_moneda_precio == '$') {
                                                        setlocale(LC_MONETARY, "en_US");
                                                    } else {
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
                                <?php }}else{echo'aun no hay carros';} ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile-page-wall -->
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

</script>
<?php $this->stop() ?>

