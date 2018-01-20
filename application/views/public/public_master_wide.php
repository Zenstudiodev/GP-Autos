<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>GP - Autos</title>
    <?php echo $this->section('meta');?>



    <!-- Materialize -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Fonnt Awsome-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/font-awesome.min.css"  media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/materialize.min.css"  media="screen,projection"/>
    <?php echo $this->section('css_p');?>
    <link href="<?php echo base_url() ?>ui/public/css/style.css" rel="stylesheet">

</head>
<body>
<section id="top">
    <div class="container">
        <div id="top_contac_info" class="hide-on-small-only">
            <div class="row">
                <div class="col m9">

                    <p>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        info@gpautos.net |
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Lunes a Viernes 08:00 AM - 06:00 PM Sábado 08:00 AM a 01:00 PM
                    </p>
                </div>
                <div class="col m3">
                    <p class="text-right"><i class="fa fa-phone"></i>
                        (+502) 2376-0404
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </p>
                </div>
            </div>
        </div>
        <div id="logo_menu_container">


            <div id="menu">
                <nav>
                    <div class="nav-wrapper">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>ui/public/images/logoGp.png" id="logo_img">
                            </a>

                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="#">Vehiculos</a></li>

                            <li>
                                <!-- Dropdown Trigger -->
                                <a class='dropdown-button' href='#' data-activates='dropdown1'>Productos</a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li>Seguros</li>
                                    <li>Traspasos</li>
                                    <li>Franquicia</li>
                                </ul>




                            </li>
                            <li><a href="#">Quiene somos</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<?php if ($this->section('home_banner')){
echo $this->section('home_banner');
} ?>
<?php if ($this->section('inner_top')){
    echo $this->section('inner_top');
} ?>


<!-- page content -->
<?php echo $this->section('page_content') ?>


<!-- footer content -->
<footer class="page-footer orange darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Gpautos</h5>
                <p class="grey-text text-lighten-4">xxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Productos</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Seguros</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Traspaso</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Franquicia</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2017 GP Autos
            <a class="grey-text text-lighten-4 right" href="#!">Contacto</a>
        </div>
    </div>
</footer>


<!-- jQuery  -->
<script type="text/javascript" src="<?php echo base_url();?>ui/public/js/jquery-2.1.1.min.js"></script>
<!-- Materialize js -->
<script type="text/javascript" src="<?php echo base_url();?>ui/public/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>ui/public/js/nouislider.min.js"></script>


<!--<script type="text/javascript" src="<?php /*echo base_url() */?>ui/public/js/mdb.min.js"></script>-->

<!-- JS personalizado -->
<?php echo $this->section('js_p') ?>
<!-- JS personalizado -->
</body>
</html>

