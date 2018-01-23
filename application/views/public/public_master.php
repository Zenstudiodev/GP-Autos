<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>

<!DOCTYPE html>
<html lang="es">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="google-site-verification" content="0q-W5K9CGQetDQs6wGTW2416dOQQ5byj4oGA4q11BQU"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>GP - Autos</title>
	<?php echo $this->section('meta'); ?>


    <!-- Materialize -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Fonnt Awsome-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/font-awesome.min.css"
          media="screen,projection"/>
    <!--Import boostrap.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/ui/public/css/bootstrap.min.css"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/materialize.min.css"
          media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/nouislider.css"/>
    <!--Cameja JS css-->
    <link rel='stylesheet' id='camera-css' href='<?php echo base_url(); ?>/ui/public/css/camera.css' type='text/css'
          media='all'>
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
        <div id="top_contac_info" class="hide-on-small-only">
            <div class="row">
                <div class="col m9">

                    <p>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        info@gpautos.net |
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Lunes a Viernes 09:00 AM - 06:00 PM Sábado 09:00 AM a 01:00 PM
                    </p>
                </div>
                <div class="col m3">
                    <p class="text-right"><i class="fa fa-phone"></i>
                        (+502) 2460-7261
                        <a href="https://www.facebook.com/gpautosprediovirtual/" target="_blank"><i
                                    class="fa fa-facebook-official fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>ui/public/images/logoGp.png" id="logo_img">
                </a>


                <div class="collection">
                    <a href="<?php echo base_url() ?>index.php/Productos/anunciate" class="collection-item black-text">
                        Anunciate <i class="material-icons  secondary-content orange-text darken-3">note_add</i>
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
								foreach ($header_banners->result() as $banner)
								{ ?>


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

<?php if ($this->section('home_banner'))
{
	echo $this->section('home_banner');
} ?>
<div id="inner_top" class="orange darken-1">

</div>


<!-- page content -->
<?php echo $this->section('page_content') ?>


<!-- footer content -->
<footer class="page-footer orange darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Gpautos</h5>
                <p class="grey-text text-lighten-4">2da Avenida 20-29 Zona 10.<br>
                    (+502) 2460-7261<br>
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

                <div class="fb-page" data-href="https://www.facebook.com/gpautosprediovirtual/" data-small-header="true"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
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
<script type="text/javascript" src="<?php echo base_url(); ?>/ui/public/js/bootstrap.min.js"></script>
<!-- Materialize js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/materialize.min.js"></script>
<!--Wnumb-->
<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/wNumb.js"></script>
<!--NoUiSlider-->
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/nouislider.min.js"></script>
<!--Camera js-->
<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/camera.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/jquery.scrollTo.min.js"></script>

<!--Banners-->
<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/banners_cont.js"></script>
<!-- JS personalizado -->
<?php echo $this->section('js_p') ?>
<!-- JS personalizado -->
<script>
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        }
    );


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

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function () {
        var widget_id = '7vYnIXtktm';
        var d = document;
        var w = window;

        function l() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//code.jivosite.com/script/widget/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        }

        if (d.readyState == 'complete') {
            l();
        } else {
            if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();</script>
<!-- {/literal} END JIVOSITE CODE -->



</body>
</html>

