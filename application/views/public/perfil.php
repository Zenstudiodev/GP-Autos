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
<pre>
<?php print_r($datos_usuario->row());?>
</pre>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                    <!-- Profile About  -->
                    <div class="card cyan">
                        <div class="card-content white-text">
                            <span class="card-title"><?php echo $usuario->first_name. ' '. $usuario->last_name?></span>
                        </div>
                    </div>
                    <!-- Profile About  -->
                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">card_travel</i> Project</div>
                                <div class="col s7 right-align">ABC Name</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">poll</i> Skills</div>
                                <div class="col s7 right-align">HTML, CSS</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">domain</i> Lives in</div>
                                <div class="col s7 right-align">NY, USA</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">cake</i> Birth date</div>
                                <div class="col s7 right-align">18th June, 1991</div>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->
                </div>
                <!-- profile-page-sidebar-->
                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m8">
                    <a class="waves-effect waves-light btn orange darken-1" href="publicar_carro"><i class="material-icons left">cloud</i>Publicar un carro</a>
                    <h1 class="texto_naranja">Vehículos publicados</h1>
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


