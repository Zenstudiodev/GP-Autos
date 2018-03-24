<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/07/2017
 * Time: 12:22 PM
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
?>
<?php $this->start('title') ?>
    <title>Contacto</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div class="camera_wrap camera_azure_skin" id="seguros_banners">
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg">
            <!--<div class="camera_caption fadeFromBottom">
                Texto
            </div>-->
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg">
        </div>
    </div><!-- #camera_wrap_1 -->
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div id="contacto_wrap">
        <div class="container">
            <div class="row">
                <div class="col s12 m7">
                </div>
                <div class="col s12 m5">
                    <h2 class="texto_naranja" id="precio_carro">
                        PBX: 2376-0404
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col m8">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="Nombre" id="first_name" type="text" class="validate">
                                            <label for="first_name">Nombre</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                                            <label for="textarea1">Comentario</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">
                                                Enviar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2295.8286898206875!2d-90.51806232612401!3d14.592908148513194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcbceaf318501f751!2sGPautos!5e0!3m2!1ses!2ses!4v1501355286522"
                             height="350" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>
                </div>
                <div class="col m4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>GP Predio</h4></li>
                        <li class="collection-item">ALEJANDRO RAMIRES<span class=" badge white-text">EXT.404</span></li>
                        <li class="collection-item">ERNESTO MANCILLA<span class=" badge white-text">EXT.405</span></li>
                        <li class="collection-item">ASESOR<span class=" badge white-text">EXT.414</span></li>
                    </ul>
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>CRÉDITOS</h4></li>
                        <li class="collection-item">ZULY MORALES<span class=" badge white-text">EXT.411</span></li>
                        <li class="collection-item">MISHEL GARCIA<span class=" badge white-text">EXT.415</span></li>
                        <li class="collection-item">IVON AQUINO<span class=" badge white-text">EXT.417</span></li>
                    </ul>
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>SEGUROS</h4></li>
                        <li class="collection-item">SEGUROS EL ROBLE<span class=" badge white-text">EXT.416</span></li>
                    </ul>
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>ANUNCIA TU CARRO</h4></li>
                        <li class="collection-item">OLINDA CASTELLANOS<span class=" badge white-text">EXT.407</span></li>
                        <li class="collection-item">BYRON MONROY<span class=" badge white-text">EXT.408</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <script>

        $('select').material_select();
        $('.modal').modal();
        $(document).ready(function () {
            $('.parallax').parallax();
        });

        //BANNER
        jQuery('#seguros_banners').camera({
            thumbnails: false,
            height: '46%',
            pagination: false
        });
    </script>
<?php $this->stop() ?>