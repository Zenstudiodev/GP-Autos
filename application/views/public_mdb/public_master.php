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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GP - Autos</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>ui/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/public/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?php echo base_url(); ?>ui/public/css/mdb.min.css" rel="stylesheet">
    <?php echo $this->section('css_p');?>
    <link href="<?php echo base_url() ?>ui/public/css/style.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="top">
    <div class="container">
        <div id="top_contac_info">
            <div class="row">
                <div class="col-md-9">

                    <p>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        info@gpautos.net |
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Lunes a Viernes 08:00 AM - 06:00 PM Sábado 08:00 AM a 01:00 PM
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="text-right"><i class="fa fa-phone"></i>
                        (+502) 2376-0404
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </p>
                </div>
            </div>
        </div>
        <div id="logo_menu_container">
            <div class="row">

                <div class="col-md-3">
                    <div id="logo_main">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>/ui/public/images/logoGp.png" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="menu">
                        <nav>
                            <ul class="homeMenu">
                                <li>
                                    <a href="#">Vehiculos</a>
                                </li>
                                <li><a href=""> / </li>
                                <li>
                                    <div class="dropdown">

                                        <a href="#" class="" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                            <ul>
                                                <li class="dropdown-item">Seguros</li>
                                                <li class="dropdown-item">Traspasos</li>
                                                <li class="dropdown-item">Franquicia</li>
                                            </ul>
                                        </div>
                                    </div>



                                </li>
                                <li><a href=""> / </li>
                                <li>
                                    <a href="#">Quiene somos</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo base_url();?>ui/public/js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url();?>ui/public/js/tether.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo base_url();?>ui/public/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<!--<script type="text/javascript" src="<?php /*echo base_url() */?>ui/public/js/mdb.min.js"></script>-->

<!-- JS personalizado -->
<?php echo $this->section('js_p') ?>
<!-- JS personalizado -->
</body>
</html>

