<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php
$CI =& get_instance();

$datos_buscador = $CI->session->userdata('filtros_buscador');


?>
<!DOCTYPE html>
<html lang="es">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="google-site-verification" content="0q-W5K9CGQetDQs6wGTW2416dOQQ5byj4oGA4q11BQU"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/ui/public/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/ui/public/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/ui/public/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/ui/public/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ui/public/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/ui/public/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/ui/public/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/ui/public/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/ui/public/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/ui/public/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ui/public/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/ui/public/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ui/public/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/ui/public/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#fb8c00">
    <meta name="msapplication-TileImage" content="/ui/public/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#fb8c00">

    <?php if ($this->section('title')) {
        echo $this->section('title');
    } ?>

    <?php echo $this->section('meta'); ?>

    <!-- Materialize -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Fonnt Awsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!--Import boostrap.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/ui/public/css/bootstrap.min.css"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/materialize.min.css"
          media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/nouislider.css"/>
    <?php echo $this->section('css_p'); ?>
    <link href="<?php echo base_url() ?>ui/public/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ui/public/css/responsive.css" rel="stylesheet">

</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=126815027415674';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<section id="top">
    <div class="container-fluid">
        <div class="show-on-small hide-on-med-and-up">
            <div class="row">

                <div class="col s6">
                    <?php
                    if ($CI->ion_auth->logged_in()) { ?>
                        <a class="waves-effect waves-light btn" href="<?php echo base_url() ?>/cliente/perfil">
                            Ir a
                            perfil</a>
                    <?php } else { ?>
                        <a class="waves-effect waves-light btn"
                           href="<?php echo base_url() ?>/cliente/login">Ingresar +</a>
                    <?php }
                    ?>


                </div>
                <div class="col s6">
                    <a class="waves-effect waves-light btn"
                       href="<?php echo base_url() ?>/cliente/registro">registrarse</a>
                </div>
            </div>
        </div>

        <div id="top_contac_info" class="hide-on-small-only">
            <div class="row">
                <div class="col m6">

                    <p>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        info@gpautos.net |
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Lunes a Viernes 09:00 AM - 06:00 PM Sábado 09:00 AM a 01:00 PM
                    </p>
                </div>
                <div class="col m4">
                    <?php
                    if ($CI->ion_auth->logged_in()) { ?>
                        <a class="waves-effect waves-light btn" href="<?php echo base_url() ?>/cliente/perfil">
                            Ir a
                            perfil</a>
                    <?php } else { ?>
                        <a class="waves-effect waves-light btn"
                           href="<?php echo base_url() ?>/cliente/login">Ingresar </a>
                    <?php } ?>
                    <a class="waves-effect waves-light btn"
                       href="<?php echo base_url() ?>/cliente/registro">registrarse</a>
                </div>
                <div class="col m2">
                    <p class="text-right"><i class="fa fa-phone"></i>
                        (+502) 2294-5656
                        <a href="https://www.facebook.com/gpautosprediovirtual/" target="_blank"><i
                                    class="fa fa-facebook-official fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4 col-md-4">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>ui/public/images/logoGp.png" id="logo_img">
                </a>


                <div class="collection">
                    <a href="<?php echo base_url() ?>index.php/Productos/anunciate" class="collection-item black-text">
                        Anuncia tu vehiculo <i
                                class="material-icons  secondary-content orange-text darken-3">note_add</i>
                    </a>
                    <a href="<?php echo base_url(); ?>" class="collection-item black-text">
                        Vehiculos <i class="material-icons  secondary-content orange-text darken-3">directions_car</i>
                    </a>
                    <a href="<?php echo base_url() ?>index.php/Productos/financiamiento"
                       class="collection-item black-text">
                        Financiamiento <i
                                class="material-icons  secondary-content orange-text darken-3">aattach_money</i>
                    </a>
                    <a href="<?php echo base_url() ?>index.php/Productos/seguros" class="collection-item black-text">
                        Seguros <i class="material-icons  secondary-content orange-text darken-3">assignment</i>
                    </a>
                    <!--<a href="" class="collection-item black-text">
                        Traspasos <i class="material-icons  secondary-content orange-text darken-3" >transform</i>
                    </a>
                    <a href="" class="collection-item black-text">
                        Franquicia <i class="material-icons  secondary-content orange-text darken-3" >account_balance</i>
                    </a>-->
                    <a href="<?php echo base_url() ?>index.php/Contacto" class="collection-item black-text">
                        Contacto <i class="material-icons  secondary-content orange-text darken-3">email</i>
                    </a>


                </div>


            </div>
            <div class="col s12 m8">
                <section id="banner">

                    <?php if (isset($header_banners)) { ?>
                        <div id="header_banners" class="carousel slide" data-ride="carousel">
                            <!-- Indicators
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>-->

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">

                                <?php
                                $start_banner = 0;
                                foreach ($header_banners->result() as $banner) { ?>


                                    <div class="item <?php if ($start_banner < 1) {
                                        echo 'active';
                                    } ?> ">
                                        <a href="<?php echo $banner->link_bh ?>" target="_blank"
                                           banner_id="<?php echo $banner->id_bh; ?>">
                                            <img src="<?php echo base_url() . $banner->imagen_bh ?>">
                                        </a>
                                    </div>

                                    <?php $start_banner++ ?>


                                <?php } ?>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#header_banners" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#header_banners" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    <?php } ?>


                    <?php //echo $this->section('banner'); ?>
                </section>
            </div>
        </div>
    </div>
</section>

<?php if ($this->section('home_banner')) {
    echo $this->section('home_banner');
} ?>

<div id="inner_top" class="orange darken-1">

</div>


<?php if ($this->section('buscador')) {
    echo $this->section('buscador');
} ?>
<!-- page content -->
<?php echo $this->section('page_content') ?>

<!-- footer content -->
<footer class="page-footer orange darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Gpautos</h5>
                <p class="grey-text text-lighten-4">2da Avenida 20-29 Zona 10.<br>
                    (+502) 2294-5656<br>
                    info@gpautos.net</p>
                <h5 class="white-text">Productos</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?php echo base_url() ?>index.php/Productos/seguros">Seguros</a>
                    </li>
                    <!--<li><a class="grey-text text-lighten-3" href="#!">Traspaso</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Franquicia</a></li>-->
                </ul>
            </div>
            <div class="col l4 offset-l2 s12">

                <div class="fb-page" data-href="https://www.facebook.com/gpautosprediovirtual/"
                     data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                     data-show-facepile="false">
                    <blockquote cite="https://www.facebook.com/gpautosprediovirtual/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/gpautosprediovirtual/">GP Autos</a></blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2017 GP Autos
            <div class="right">
                <a class="grey-text text-lighten-4 " href="#!">Acerca de nosotros</a> |
                <a class="grey-text text-lighten-4 " href="#!">Contacto</a>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery  -->
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/bootstrap.min.js"></script>
<!-- Materialize js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/materialize.min.js"></script>
<!--Wnumb-->
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/wNumb.js"></script>
<!--NoUiSlider-->
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/nouislider.min.js"></script>
<!--Camera js-->
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/camera.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/jquery.scrollTo.min.js"></script>

<!--Banners-->
<!--<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/banners_cont.js"></script>-->

<!--PWA--
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/pwa/pwabuilder-sw-register.js"></script>
-->
<!-- JS personalizado -->
<?php echo $this->section('js_p') ?>

<!-- JS personalizado -->
<script>

</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-103355785-4', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>


