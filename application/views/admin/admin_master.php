<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 3:58 PM
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>GP Autos Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url()?>/ui/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/ui/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>ui/admin/css/uniform.css" />
    <!--Fonnt Awsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Custom css for pages -->
    <?php echo $this->section('css_p') ?>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>/ui/admin/css/style.css" />
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="<?php echo base_url().'admin'?>">GP AUTOS</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido <?php echo $nombre?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!--<li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>-->
        <!--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>-->
        <li class=""><a title="" href="<?php echo base_url()?>login/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
    <ul>

        <!--<li><a href="<?php /*echo base_url()*/?>admin"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>-->

        <li><a href="<?php echo base_url()?>admin"><i class="icon icon-signal"></i> <span>Inicio</span></a> </li>
        <?php if($rol =='gerente' || $rol =='developer' || $rol =='editor' || $rol =='externo' || $rol =='predio' || $rol=='marketing'){?>
        <li><a href="<?php echo base_url()?>admin/vehiculos"><i class="icon icon-signal"></i> <span>vehiculos</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='asesor'){?>
            <li><a href="<?php echo base_url()?>admin/disponibilidad"><i class="icon icon-file"></i> <span>Disponibilidad</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='asesor'){?>
            <li><a href="<?php echo base_url()?>admin/disponibilidad"><i class="icon icon-file"></i> <span>Disponibilidad</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='asesor'){?>
            <li><a href="<?php echo base_url()?>admin/crear_carro_asesor"><i class="icon icon-signal"></i> <span>Subir carro (asesor)</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='marketing'){?>
            <li><a href="<?php echo base_url()?>marketing/capturar_numeros"><i class="icon icon-file"></i> <span>Captura de números</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='marketing'){?>
            <li><a href="<?php echo base_url()?>marketing/bajar_numero"><i class="icon icon-file"></i> <span>Bajar número</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor' || $rol=='marketing'){?>
            <li><a href="<?php echo base_url()?>marketing/seguimientos"><i class="icon icon-file"></i> <span>Seguimientos</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' || $rol=='marketing'){?>
            <li><a href="<?php echo base_url()?>admin/predios"><i class="icon icon-file"></i> <span>Predios</span></a> </li>
            <li><a href="<?php echo base_url()?>admin/usuarios"><i class="icon icon-file"></i> <span>Usuarios</span></a> </li>
            <li><a href="<?php echo base_url()?>admin/pendientes"><i class="icon icon-file"></i> <span>vahiculos pendientes</span></a> </li>
        <?php }?>
	    <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor'){?>
        <li><a href="<?php echo base_url()?>admin/banners"><i class="icon icon-file"></i> <span>Banners</span></a> </li>
        <?php }?>
	    <?php if($rol =='gerente' || $rol == 'developer' || $rol=='editor'){?>
        <li><a href="<?php echo base_url()?>admin/banners_header"><i class="icon icon-file"></i> <span>Banners Header</span></a> </li>
	    <?php }?>
	    <?php if($rol =='gerente' || $rol == 'developer' ){?>
            <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Reportes</span> </a>
                <ul>
                    <li><a href="<?php echo base_url()?>admin/trasancciones"><i class="icon icon-file"></i> <span>transacciones</span></a> </li>
                    <li><a href="<?php echo base_url()?>admin/reporte_marketing">Reporte de marketing</a></li>
                </ul>
            </li>

        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' ){?>
            <li><a href="<?php echo base_url()?>admin/codigos_descuento"><i class="icon icon-file"></i> <span>Codigos de descuento</span></a> </li>
        <?php }?>
        <?php if($rol =='gerente' || $rol == 'developer' ){?>
            <li><a href="<?php echo base_url()?>admin/parametros"><i class="icon icon-file"></i> <span>Parametros</span></a> </li>
        <?php }?>


        <!--<li><a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
        <li ><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
        <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="form-common.html">Basic Form</a></li>
                <li><a href="form-validation.html">Form with Validation</a></li>
                <li><a href="form-wizard.html">Form with Wizard</a></li>
            </ul>
        </li>
        <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
        <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
        <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
            <ul>
                <li><a href="index2.html">Dashboard2</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="chat.html">Chat option</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
            <ul>
                <li><a href="error403.html">Error 403</a></li>
                <li><a href="error404.html">Error 404</a></li>
                <li><a href="error405.html">Error 405</a></li>
                <li><a href="error500.html">Error 500</a></li>
            </ul>
        </li>
        <li class="content"> <span>Monthly Bandwidth Transfer</span>
            <div class="progress progress-mini progress-danger active progress-striped">
                <div style="width: 77%;" class="bar"></div>
            </div>
            <span class="percent">77%</span>
            <div class="stat">21419.94 / 14000 MB</div>
        </li>
        <li class="content"> <span>Disk Space Usage</span>
            <div class="progress progress-mini active progress-striped">
                <div style="width: 87%;" class="bar"></div>
            </div>
            <span class="percent">87%</span>
            <div class="stat">604.44 / 4000 MB</div>
        </li>-->
    </ul>
</div>
<!-- page content -->
<?php echo $this->section('page_content') ?>
<!-- footer content -->
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; GPAUTOS </div>
</div>
<!--end-Footer-part-->
<script src="<?php echo base_url()?>ui/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>ui/admin/js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url()?>ui/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>ui/admin/js/jquery.uniform.js"></script>
<?php echo $this->section('js_p') ?>
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

