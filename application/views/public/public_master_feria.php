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

//echo 'data buscador session'.$datos_buscador;

if ($datos_buscador == '') {
    $datos_buscador = array(
        'predio' => 'TODOS',
        'ubicacion' => 'TODOS',
        'tipo' => 'AUTOMOVIL',
        'marca' => 'TODOS',
        'linea' => 'TODOS',
        'transmision' => 'TODOS',
        'combustible' => 'TODOS',
        'origen' => 'TODOS',
        'moneda' => 'TODOS',
        'precio' => '0-600000',
        'modelo' => '1952-2018',
    );
} else {
//echo 'datos sesion con datos';
}

$s_ubicacion = $datos_buscador['ubicacion'];

$s_tipo = urldecode($datos_buscador['tipo']);
$s_marca = $datos_buscador['marca'];
$s_linea = $datos_buscador['linea'];
$s_moneda = $datos_buscador['moneda'];

//constuccion de campos de buscador

//PREDIO
$predio_carro_select = array(
    'name' => 'predio_carro',
    'id' => 'predio_carro',
    'class' => 'browser-default',
);
$predio_carro_select_options = array(
    'TODOS' => 'TODOS',
);
foreach ($predios->result() as $predio) {
    $predio_carro_select_options[$predio->id_predio_virtual] = $predio->prv_nombre;
}

//UBICACION
$ubicacion_carro_select = array(
    'name' => 'ubicacion_carro',
    'id' => 'ubicacion_carro',
    'class' => 'browser-default',
);

$ubicacion_carro_select_options = array(
    'TODOS' => 'TODOS',
);
foreach ($ubicaciones->result() as $ubicacion) {
    $ubicacion_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
}

//TIPO
$tipo_carro_select = array(
    'name' => 'tipo_carro',
    'id' => 'tipo_carro',
    'class' => 'browser-default',
);
$tipo_carro_select_options = array();
foreach ($tipos->result() as $tipo_carro) {
    $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}


//MARCA
$marca_carro_select = array(
    'name' => 'marca_carro',
    'id' => 'marca_carro',
    'class' => 'browser-default',
);
$marca_carro_select_options = array(
    'TODOS' => 'TODOS',
);
if ($marca) {
    foreach ($marca->result() as $marca_carro) {
        $marca_carro_select_options[$marca_carro->id_marca] = $marca_carro->id_marca;
    }
}

//LINEA
$linea_carro_select = array(
    'name' => 'linea_carro',
    'id' => 'linea_carro',
    'class' => 'browser-default'
);
$linea_carro_select_options = array(
    'TODOS' => 'TODOS',
);
if ($linea) {
    foreach ($linea->result() as $linea_carro) {
        $linea_carro_select_options[$linea_carro->id_linea] = $linea_carro->id_linea;
    }
}

//TRANSMISION
$transmision_carro_select = array(
    'name' => 'transmision_carro',
    'id' => 'transmision_carro',
    'class' => 'browser-default',
);
$transmision_carro_select_options = array(
    'TODOS' => 'TODOS',
);

foreach ($transmisiones->result() as $transmision) {
    $transmision_carro_select_options[$transmision->crr_transmision] = $transmision->crr_transmision;
}

//COMBUSTIBLE
$combustible_carro_select = array(
    'name' => 'combustible_carro',
    'id' => 'combustible_carro',
    'class' => 'browser-default',
);
$combustible_carro_select_options = array(
    'TODOS' => 'TODOS'
);
foreach ($combustibles->result() as $combustible) {
    $combustible_carro_select_options[$combustible->nombre] = $combustible->nombre;
}

//ORIGEN
$origen_carro_select = array(
    'name' => 'origen_carro',
    'id' => 'origen_carro',
    'class' => 'browser-default',
);
$origen_carro_select_options = array(
    'TODOS' => 'TODOS',
    'AGENCIA' => 'AGENCIA',
    'RODADO' => 'RODADO',
);

//MONEDA.
$moneda_carro_select = array(
    'name' => 'moneda_carro',
    'id' => 'moneda_carro',
    'class' => 'browser-default',
);
$moneda_carro_select_options = array(
    'TODOS' => 'TODOS',
    'Q' => 'Q',
    'D' => '$',
);

//UBICACIONES
$ubicaciones_carro_select = array(
    'name' => 'ubicacion',
    'id' => 'ubicacion',
);
$ubicaciones_carro_select_options = array(
    'TODOS' => 'TODOS'
);
foreach ($ubicaciones->result() as $ubicacion) {
    $ubicaciones_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
}

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
    <link rel="icon" type="image/png" sizes="192x192"  href="/ui/public/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ui/public/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/ui/public/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ui/public/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/ui/public/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#fb8c00">
    <meta name="msapplication-TileImage" content="/ui/public/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#fb8c00">
    <!--Let browser know website is optimized for mobile-->
    <meta name="google-site-verification" content="0q-W5K9CGQetDQs6wGTW2416dOQQ5byj4oGA4q11BQU"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php if ($this->section('title')) {
        echo $this->section('title');
    } ?>

    <?php echo $this->section('meta'); ?>

    <!-- Materialize -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--font count down-->
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
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
<div id="feria">
    <section id="top">
        <div class="container-fluid">
            <div class="show-on-small hide-on-med-and-up">
                <div class="row">

                    <div class="col s6">
                        <a class="waves-effect waves-light btn" href="<?php echo base_url() ?>/cliente/login">Entrar</a>
                    </div>
                    <div class="col s6">
                        <a class="waves-effect waves-light btn"
                           href="<?php echo base_url() ?>/cliente/registro">registrarse</a>
                    </div>
                </div>
            </div>

            <div id="top_contac_info" class="hide-on-small-only grey darken-2">
                <div class="row">
                    <div class="col m6">

                        <p>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            info@gpautos.net |
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Lunes a Viernes 09:00 AM - 06:00 PM Sábado 09:00 AM a 01:00 PM
                        </p>
                    </div>
                    <div class="col m3">
                        <a class="waves-effect waves-light btn" href="<?php echo base_url() ?>/cliente/login">Entrar</a>
                        <a class="waves-effect waves-light btn"
                           href="<?php echo base_url() ?>/cliente/registro">registrarse</a>
                    </div>
                    <div class="col m3">
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
                    <a href="<?php echo base_url(); ?>feria">
                        <img src="<?php echo base_url(); ?>ui/public/images/logoGp.png" id="logo_img">
                    </a>
                </div>
                <div class="col s12 m4 col-md-4">


                    <div id="feria_countDown">
                        <div id="feria_cd_tittle">
                            La gran feria virtual Termina en
                        </div>
                        <div id="getting-started"></div>
                    </div>
                </div>
                <div class="col s12 m4 col-md-4">
                    <a class="waves-effect waves-light btn red darken-2 white-text salir_feria_btn" href="http://gpautos.net/home/inicio">Salir de feria</a>
                </div>
            </div>
            <div class="row">

                <div class="col s12 m12">
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

    <div id="buscado_global">
        <div id="floating_menu" class="orange darken-3">
            <a href="#" data-activates="slide-out" class="button-collapse white-text ">Buscar en feria <i
                        class="material-icons dp48">search</i></a>

        </div>
        <ul id="slide-out" class="side-nav">
            <li>
                <div id="homeSearchBox">
                    <h4 class="texto_naranja">Buscar</h4>
                    <form method="post" action="<?php echo base_url(); ?>carro/por_codigo_feria">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li>
                                <div class="collapsible-header active"><i class="material-icons">directions_car</i>Código
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="input_codigo" name="input_codigo" type="text"
                                                   class="validate">
                                            <label for="input_codigo">Buscar codigo</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <button type="button"
                                                    class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light"
                                                    id="btn_codigo">Buscar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <form id="filtro_form">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li id="filtros_vehiculo">
                                <div class="collapsible-header active" id="filtros_vehiculo_h"><i
                                            class="material-icons">directions_car</i>Vehículo
                                </div>
                                <div class="collapsible-body" id="filtros_vehiculo_b">
                                    <!--<div class="row">
                                    <div class=" s12">
                                        <label for="tipo_carro">Predio </label>
                                        <?php /*echo form_dropdown($predio_carro_select, $predio_carro_select_options) */ ?>
                                    </div>
                                </div>-->
                                    <input type="hidden" value="TODOS" name="predio_carro" id="predio_carro">
                                    <div class="row">
                                        <div class=" s12">
                                            <label for="tipo_carro">Ubicacion </label>
                                            <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" s12">
                                            <label for="tipo_carro">Tipo de Vehiculo</label>
                                            <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options, $s_tipo) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12">
                                            <div id="loading_marca_filter">
                                                <div class="progress">
                                                    <div class="indeterminate"></div>
                                                </div>
                                            </div>
                                            <label for="tipo_carro">Marca</label>
                                            <?php echo form_dropdown($marca_carro_select, $marca_carro_select_options) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12">
                                            <div id="loading_linea_filter">
                                                <div class="progress">
                                                    <div class="indeterminate"></div>
                                                </div>
                                            </div>
                                            <label for="tipo_carro">Linea</label>
                                            <?php echo form_dropdown($linea_carro_select, $linea_carro_select_options, $s_linea) ?>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">network_check</i>Caracteristicas
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="tipo_carro">Transmision</label>
                                            <?php echo form_dropdown($transmision_carro_select, $transmision_carro_select_options) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="tipo_carro">Combustible</label>
                                            <?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="tipo_carro">Origen</label>
                                            <?php echo form_dropdown($origen_carro_select, $origen_carro_select_options) ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">attach_money</i>Precio
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="tipo_carro">Moneda</label>
                                            <?php echo form_dropdown($moneda_carro_select, $moneda_carro_select_options, $s_moneda) ?>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <p id="p_carro"></p>
                                        <!-- <input id="p_carro" type="number"/>-->
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="p_carro_min" name="p_carro_min" type="number"
                                                   min="0" max="600000" step="1000"
                                                   placeholder="Precio min:"/>
                                            <label for="icon_prefix">Precio min:</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="p_carro_max" name="p_carro_max" type="number"
                                                   min="0" max="600000" step="1000"
                                                   placeholder="Precio max:"/>
                                            <label for="icon_prefix">Precio max:</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">date_range</i>Año
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <p id="a_carro"></p>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="a_carro_min" name="a_carro_min" type="number"
                                                   min="1952" max="2019"
                                                   placeholder="Del año:"/>
                                            <label for="icon_prefix">Del año:</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="a_carro_max" name="a_carro_max" type="number"
                                                   min="1952" max="2019"
                                                   placeholder="Al año:"/>
                                            <label for="icon_prefix">Al año:</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="card ">
                            <div class="card-action">
                                <button type="submit"
                                        class="btn btn-success text-center orange darken-4 waves-effect waves-light">
                                    Buscar
                                </button>
                                <!--<a class="btn btn-success text-center orange darken-4 waves-effect waves-light">Limpiar Buscador</a>-->
                            </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>


    <?php if ($this->section('buscador')) {
        echo $this->section('buscador');
    } ?>


    <!-- page content -->
    <?php echo $this->section('page_content') ?>
</div>
<!-- footer content -->
<footer class="page-footer grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Gpautos</h5>
                <p class="grey-text text-lighten-4">2da Avenida 20-29 Zona 10.<br>
                    (+502) 2294-5656<br>
                    info@gpautos.net</p>
                <h5 class="white-text">Productos</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?php echo base_url() ?>Productos/seguros">Seguros</a>
                    </li>
                    <!--<li><a class="grey-text text-lighten-3" href="#!">Traspaso</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Franquicia</a></li>-->
                </ul>
            </div>
            <div class="col l4 offset-l2 s12">

                <div class="fb-page" data-href="https://www.facebook.com/gpautosprediovirtual/"
                     data-small-header="false" data-adapt-container-width="false" data-hide-cover="false"
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
<script src="/bower_components/jquery.countdown/dist/jquery.countdown.js"></script>

<!--Banners-->
<!--<script type="text/javascript" src="<?php echo base_url() ?>/ui/public/js/banners_cont.js"></script>-->
<!-- JS personalizado -->
<?php echo $this->section('js_p') ?>
<!-- JS personalizado -->
<script type="text/javascript">
    $("#getting-started")
        .countdown("2020/01/01", function (event) {
            $(this).text(
                event.strftime('%D días %H:%M:%S')
            );
        });
</script>
<script>
    var filtro_predio;
    var filtro_ubicacion;
    var filtro_marca;
    var filtro_tipo;
    var filtro_linea;
    var filtro_transmision;
    var filtro_combustible;
    var filtro_origen;
    var filtro_moneda;
    var filtro_precio;
    var filtro_modelo;

    //precio carro
    var precioCarroSlider;
    var precio_carro;
    var precio_carro_max;
    var precio_carro_min;

    //Año carro
    var aCarroSlider;
    var a_carro;
    var a_carro_min;
    var a_carro_max;


    //cambiar valor de inpusts precio y año
    function setSliderCarroPrecio(i, value) {
        var r = [null, null];
        r[i] = value;
        precioCarroSlider.noUiSlider.set(r);
    }

    //Precio carro
    precioCarroSlider = document.getElementById('p_carro');
    noUiSlider.create(precioCarroSlider, {
        start: [0, 600000],
        range: {
            'min': [0],
            'max': [600000]
        },
        step: 1000,
        format: wNumb({
            decimals: 0
        })
    });
    precio_carro_max = document.getElementById('p_carro_min');
    precio_carro_min = document.getElementById('p_carro_max');
    precio_carro = [precio_carro_max, precio_carro_min];
    precioCarroSlider.noUiSlider.on('update', function (values, handle) {
        precio_carro[handle].value = values[handle];
    });
    // Listen to keydown events on the input field.
    precio_carro.forEach(function (input, handle) {
        input.addEventListener('change', function () {
            setSliderCarroPrecio(handle, this.value);
        });
    });

    //cambiar valor de inpusts precio y año
    function setSliderCarroA(i, value) {
        var r = [null, null];
        r[i] = value;
        aCarroSlider.noUiSlider.set(r);
    }


    //Año de carro
    aCarroSlider = document.getElementById('a_carro');
    noUiSlider.create(aCarroSlider, {
        start: [1952, 2019],
        range: {
            'min': [1952],
            'max': [2019]
        },
        step: 1,
        format: wNumb({
            decimals: 0
        })
    });
    a_carro_max = document.getElementById('a_carro_min');
    a_carro_min = document.getElementById('a_carro_max');
    a_carro = [a_carro_max, a_carro_min];
    aCarroSlider.noUiSlider.on('update', function (values, handle) {
        a_carro[handle].value = values[handle];
    });
    // Listen to keydown events on the input field.
    a_carro.forEach(function (input, handle) {
        input.addEventListener('change', function () {
            setSliderCarroA(handle, this.value);
        });
    });


    $("#btn_codigo").click(function () {
        var codigo_carro_a_buscar = $("#input_codigo").val();
        if (codigo_carro_a_buscar == '') {
            console.log('codigo vacio ');
        } else {
            window.location.href = "<?php echo base_url();?>Carro/ver/" + codigo_carro_a_buscar;
        }
    });

    $(document).ready(function () {
        //hide loaders
        $("#loading_marca_filter").hide();
        $("#loading_linea_filter").hide();

        // Initialize side buscador
        $('.button-collapse').sideNav({
            menuWidth: 310, // Default is 300
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: false, // Choose whether you can drag to open on touch screens,
            onOpen: function (el) {
            }, // A function to be called when sideNav is opened
            onClose: function (el) {
            }, // A function to be called when sideNav is closed
        });

        $('.collapsible').collapsible({
            accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            onOpen: function (el) {
                //console.log($(this).attr('id'));

            }, // Callback for Collapsible open
            onClose: function (el) {
                console.log('Closed');
            } // Callback for Collapsible close
        });

        filtro_tipo = $("#tipo_carro").val();
        filtro_marca = '<?php echo $datos_buscador['marca']; ?>';

        //Actualizar marcas
        //$('#marca_carro option').remove();
        //filtro_marca = $(this).val();
        filtro_tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>Carro/marcas?tipo=' + filtro_tipo,
            success: function (data) {
                $('#marca_carro option').remove();
                $('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                $('select').material_select();
            }
        });

        //cargamos las lineas al cargar el documento

        $('#linea_carro option').remove();
        marca = filtro_marca;
        // console.log('marca: '+ marca)
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
                if (filtro_linea == undefined) {
                    filtro_linea = 'TODOS';
                }
                $("#linea_carro").val(filtro_linea);
                $('select').material_select();


            },
            error: function (data) {
                console.log(data);
                $('#linea_carro').append('<option value="TODOS">TODOS</option>');
            }
        });


        filtro_predio = '<?php echo $datos_buscador['predio']; ?>';

        filtro_ubicacion = '<?php echo $datos_buscador['ubicacion']; ?>';
        filtro_transmision = '<?php echo $datos_buscador['transmision']; ?>';
        filtro_combustible = '<?php echo $datos_buscador['combustible']; ?>';
        filtro_origen = '<?php echo $datos_buscador['origen']; ?>';
        filtro_moneda = '<?php echo $datos_buscador['moneda']; ?>';

        //filtro_precio = '<?php echo $datos_buscador['precio']; ?>';
        //filtro_modelo = '<?php echo $datos_buscador['modelo']; ?>';

        //asignar valores de session a formulario de buscador
        $("#predio_carro").val(filtro_predio);
        $("#ubicacion_carro").val(filtro_ubicacion);
        $("#marca_carro").val(filtro_marca);


        console.log('cargado de session ' + filtro_predio + ' - ' + filtro_transmision + ' - ' + filtro_combustible + ' - ' + filtro_origen + ' - ' + filtro_moneda);
    });
    //submit form
    $("#filtro_form").submit(function (event) {
        event.preventDefault();
        //alert( "Handler for .submit() called." );
        filtro_predio = $("#predio_carro").val();
        filtro_ubicacion = $("#ubicacion_carro").val();
        buscador_tipo = $("#tipo_carro").val();
        buscador_marca = $('#marca_carro').val();
        filtro_linea = $('#linea_carro').val();
        buscador_transmision = $('#transmision_carro').val();
        buscador_combustible = $("#combustible_carro").val();
        buscador_origen = $("#origen_carro").val();
        buscador_moneda = $("#moneda_carro").val();
        buscador_precio_min = $("#p_carro_min").val();
        buscador_precio_max = $("#p_carro_max").val();
        buscador_a_min = $("#a_carro_min").val();
        buscador_a_max = $("#a_carro_max").val();
        var filtros;
        //filtros = '<?php echo base_url()?>' + 'Carro/filtro_feria/' + filtro_predio + '/' + filtro_ubicacion + '/' + buscador_tipo + '/' + buscador_marca + '/' + filtro_linea + '/' + buscador_transmision + '/' + buscador_combustible + '/' + buscador_origen + '/' + buscador_moneda + '/' + buscador_precio_min + '-' + buscador_precio_max + '/' + buscador_a_min + '-' + buscador_a_max;
       //filtros para feria solo de agencia y del 2010 al 2018
        filtros = '<?php echo base_url()?>' + 'Carro/filtro_feria/' + filtro_predio + '/' + filtro_ubicacion + '/' + buscador_tipo + '/' + buscador_marca + '/' + filtro_linea + '/' + buscador_transmision + '/' + buscador_combustible + '/' + buscador_origen + '/' + buscador_moneda + '/' + buscador_precio_min + '-' + buscador_precio_max + '/' + buscador_a_min + '-' + buscador_a_max;
        window.location.assign(filtros);
    });
    //Actualizar marcas
    $("#tipo_carro").change(function (e) {
        //console.log('cambio de tipo');
        $("#loading_marca_filter").show();
        $('#marca_carro option').remove();


        filtro_tipo = $("#tipo_carro").val();
        // console.log(filtro_tipo);
        var options;
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>Carro/marcas?tipo=' + filtro_tipo,
            success: function (data) {
                $('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    options += '<option value="' + value.id_marca + '">' + value.id_marca + '</option>';
                });
                $('#marca_carro').append(options);
                $("#loading_marca_filter").hide();
                $("#linea_carro").val('TODOS');
                $('select').material_select();
            }
        });
    });

    //Actualizar lineas
    $("#marca_carro").change(function (e) {
        var linea_options;
        $("#loading_linea_filter").show();
        $('#linea_carro option').remove();
        marca = $(this).val();
        if (marca == 'TODOS') {
            $('#linea_carro').append('<option value="TODOS" selected>TODOS</option>');
            $("#loading_linea_filter").hide();
        } else {
            tipo = $("#tipo_carro").val();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '<?php echo base_url()?>Carro/lineas?tipo=' + tipo + '&marca=' + marca,
                success: function (data) {
                    $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                    $.each(data, function (key, value) {
                        linea_options += '<option value="' + value.id_linea + '">' + value.id_linea + '</option>';
                    });
                    $('#linea_carro').append(linea_options);
                    $('select').material_select();
                    if (filtro_linea == undefined) {
                        filtro_linea = 'TODOS';
                    }
                    $("#linea_carro").val(filtro_linea);
                    $('select').material_select();
                    $("#loading_linea_filter").hide();
                }
            });
        }
    });
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


