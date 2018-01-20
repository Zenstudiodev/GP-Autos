<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php $this->layout('public/public_master'); ?>

<?php $this->start('css_p') ?>
<!--<link href="<?php /*echo base_url(); */ ?>/ui/public/css/bootstrap-slider.min.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>ui/public/css/nouislider.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('home_banner') ?>
<div id="movil_header" class="hide-on-med-and-up"></div>
<section id="banner">
    <div class="carousel carousel-slider">
        <a class="carousel-item" href=""><img src="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg"></a>
        <a class="carousel-item" href=""><img src="<?php echo base_url() ?>ui/public/images/banner/banner2.jpg"></a>
        <a class="carousel-item" href=""> <img src="<?php echo base_url() ?>ui/public/images/banner/banner3.jpg"></a>
        <a class="carousel-item" href=""> <img src="<?php echo base_url() ?>ui/public/images/banner/banner4.jpg"></a>
    </div>
</section>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>



<?php if ($carros) { ?>

    <?php
    //constuccion de campos de buscador

    //TIPO
    $tipo_carro_select = array(
        'name' => 'tipo_carro',
        'id' => 'tipo_carro',
        'class' => 'form-control',
    );
    $tipo_carro_select_options = array();
    foreach ($tipos->result() as $tipo_carro) {
        $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
    }

    //MARCA
    $marca_carro_select = array(
        'name' => 'marca_carro',
        'id' => 'marca_carro',
        'class' => 'form-control',
    );
    $marca_carro_select_options = array();
    foreach ($marca->result() as $marca_carro) {
        $marca_carro_select_options[$marca_carro->nombre] = $marca_carro->nombre;
    }

    //LINEA
    $linea_carro_select = array(
        'name' => 'linea_carro',
        'id' => 'linea_carro',
    );
    $linea_carro_select_options = array();

    //COMBUSTIBLE
    $combustible_carro_select = array(
        'name' => 'combustible_carro',
        'id' => 'combustible_carro',
        'class' => 'form-control',
    );
    $combustible_carro_select_options = array(
        'todos' => 'todos'
    );
    foreach ($combustibles->result() as $combustible) {
        $combustible_carro_select_options[$combustible->nombre] = $combustible->nombre;
    }

    //ORIGEN
    $origen_carro_select = array(
        'name' => 'origen_carro',
        'id' => 'origen_carro',
        'class' => 'form-control',
    );
    $origen_carro_select_options = array(
        'todos' => 'todos',
        'AGENCIA' => 'AGENCIA',
        'RODADO' => 'RODADO',
    );
    //UBICACIONES
    $ubicaciones_carro_select = array(
        'name' => 'ubicacion',
        'id' => 'ubicacion',
    );
    $ubicaciones_carro_select_options = array(
        'todos' => 'todos'
    );
    foreach ($ubicaciones->result() as $ubicacion) {
        $ubicaciones_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
    }


    ?>
    <section id="homeCarros">
        <div class="container">
            <!--row para incluir buscador-->
            <div class="row">
                <div class="col m3">
                    <div id="homeSearchBox">
                        <div class="card ">
                            <div class="card-content">
                                <span class="card-title texto_naranja">Buscar</span>
                                <form method="get" action="<?php echo base_url(); ?>index.php/carro/buscar">
                                    <div class="section">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>
                                                <label for="tipo_carro">Tipo de Vehiculo</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($ubicaciones_carro_select, $ubicaciones_carro_select_options) ?>
                                                <label for="tipo_carro">Ubicaciones</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($marca_carro_select, $marca_carro_select_options) ?>
                                                <label for="tipo_carro">Marca</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($linea_carro_select, $linea_carro_select_options) ?>
                                                <label for="tipo_carro">Linea</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options) ?>
                                                <label for="tipo_carro">Combustible</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php echo form_dropdown($origen_carro_select, $origen_carro_select_options) ?>
                                                <label for="tipo_carro">Origen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="section">
                                        <span class="card-title"> Precio del vehículo</span>
                                        <div class="row">
                                            <p class="range-field">
                                                <input id="p_carro"/>
                                            </p>
                                            <!-- <input id="p_carro" type="number"/>-->
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="p_carro_min" name="p_carro_min" type="number"
                                                       min="10000" max="200000"
                                                       placeholder="Precio min:"/>
                                                <label for="icon_prefix">Precio min:</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="p_carro_max" name="p_carro_max" type="number"
                                                       min="10000" max="200000"
                                                       placeholder="Precio max:"/>
                                                <label for="icon_prefix">Precio max:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="section">
                                        <span class="card-title">Años</span>
                                        <div class="row">

                                        </div>
                                        <input id="a_carro" type="number"/>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="a_carro_min" name="a_carro_min" type="number"
                                                       min="1952" max="2018"
                                                       placeholder="Del año:"/>
                                                <label for="icon_prefix">Del año:</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="a_carro_max" name="a_carro_max" type="number"
                                                       min="1952" max="2018"
                                                       placeholder="Al año:"/>
                                                <label for="icon_prefix">Al año:</label>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-warning">Buscar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col m9">
                    <h1 class="texto_naranja">Vehículos Destacados</h1>
                    <div class="row">
                        <?php
                        $cardCount = 0;

                        foreach ($carros->result() as $carro) {
                            $cardCount++
                            ?>


                            <div class="col s12 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <div class="imageContainer">
                                            <img class="img-fluid"
                                                 src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $carro->crr_codigo . ' (1).jpg' ?>"
                                                 alt="Card image cap">
                                            <span class="card-title"><?php echo character_limiter($carro->id_marca, 2); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <!--TODO limitar numero de caracteres en titulos y lineas-->
                                        <p class=><?php echo character_limiter($carro->id_linea, 9); ?>
                                            - <?php echo $carro->crr_modelo ?><br>
                                            <?php if ($carro->crr_moneda_precio == '$') {
                                                setlocale(LC_MONETARY, "en_US");
                                            } else {
                                                setlocale(LC_MONETARY, "es_GT");
                                            }
                                            ?>
                                            <span class="green-text"><?php echo mostrar_precio_carro($carro->crr_precio, $carro->crr_moneda_precio); ?></span>

                                        </p>
                                    </div>
                                    <div class="card-action">
                                        <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>"
                                           class="btn btn-success btn-sm text-center">ver</a>
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
<!--<script src="<?php /*echo base_url() */ ?>/ui/public/js/bootstrap-slider.min.js"></script>-->
<!--<script src="<?php /*echo base_url() */ ?>/ui/public/js/numeral.min.js"></script>-->


<script type="text/javascript">
</script>
<script>
    var marca;
    var tipo;

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


    function actualizarCampoInput(valor, campoInput) {
        //display en input fields
        $(campoInput).val(valor);
        // $(campoInput).mask('000.000.000.000.000,00', {reverse: true});
    }
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    precioCarroSlider = document.getElementById('p_carro');
    noUiSlider.create(precioCarroSlider, {
        start: [20, 80],
        connect: true,
        step: 1,
        range: {
            'min': 0,
            'max': 100
        },
        format: wNumb({
            decimals: 0
        })
    });


    $(document).ready(function () {


        $('select').material_select();


        $('#linea_carro option').remove();
        marca = $("#marca_carro").val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                $('#linea_carro').append('<option value="todos">Todos</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
            }
        });

        // With JQuery
        /*precioCarroSlider = new Slider("#p_carro", {
         range: true,
         ticks: [10000, 200000],
         ticks_labels: ['<span  class="badge warning-color-dark" >Q.10,000</span>', '<span  class="badge warning-color-dark" >Q.200,000</span>'],
         tooltip: 'show',
         step: '1000'

         });
         aCarroSlider = new Slider("#a_carro", {
         range: true,
         ticks: [1952, 2018],
         ticks_labels: ['<span  class="badge warning-color-dark" >1952</span>', '<span  class="badge warning-color-dark" >2018</span>'],
         tooltip: 'show'
         });
         //conectar sliders con imputs
         precioCarroSlider.on('change', function () {
         precio_carro = precioCarroSlider.getValue();
         precio_carro_max = precio_carro[1];
         precio_carro_min = precio_carro[0];
         actualizarCampoInput(precio_carro_max, "#p_carro_max");
         actualizarCampoInput(precio_carro_min, "#p_carro_min");
         });
         aCarroSlider.on('change', function () {
         a_carro = aCarroSlider.getValue();
         a_carro_max = a_carro[1];
         a_carro_min = a_carro[0];
         actualizarCampoInput(a_carro_max, "#a_carro_max");
         actualizarCampoInput(a_carro_min, "#a_carro_min");
         });*/

    });

    $("#marca_carro").change(function (e) {
        $('#linea_carro option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                $('#linea_carro').append('<option value="todos">Todos</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
            }
        });
    });
</script>
<?php $this->stop() ?>


