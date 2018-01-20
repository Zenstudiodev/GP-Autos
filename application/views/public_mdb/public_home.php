<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php $this->layout('public/public_master'); ?>

<?php $this->start('css_p') ?>
<link href="<?php echo base_url(); ?>/ui/public/css/bootstrap-slider.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('home_banner') ?>
<section id="banner">
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
            <li data-target="#carousel-example-1z" data-slide-to="3"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/banner1.jpg" alt="First slide">
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/banner2.jpg" alt="Second slide">
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/banner3.jpg" alt="Third slide">
            </div>
            <!--/Third slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/banner4.jpg" alt="Fourth slide">
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

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
        'class' => 'form-control',
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


    ?>
    <section id="homeCarros">
        <div class="container">
            <!--row para incluir buscador-->
            <div class="row">
                <div class="col-md-3">
                    <div id="homeSearchBox">
                        <div class="card card-block">
                            <h4 class="card-title texto_naranja">Buscar</h4>
                            <form method="post" action="<?php echo base_url();?>index.php/carro/buscar">
                                <div class="form-group">
                                    <label for="tipo_carro">Tipo de Vehiculo</label>
                                    <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_carro">Marca</label>
                                    <?php echo form_dropdown($marca_carro_select, $marca_carro_select_options) ?>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_carro">Linea</label>
                                    <?php echo form_dropdown($linea_carro_select, $linea_carro_select_options) ?>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_carro">Combustible</label>
                                    <?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options) ?>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_carro">Origen</label>
                                    <?php echo form_dropdown($origen_carro_select, $origen_carro_select_options) ?>
                                </div>
                                <!--Panel-->
                                <div class="card">
                                    <div class="card-header warning-color-dark white-text">
                                        Precio del vehículo
                                    </div>
                                    <div class="card-block">
                                        <div class="form-group">
                                            <div class="">
                                                <input id="p_carro" type="number"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Q.</div>
                                                <input id="p_carro_min" name="p_carro_min" type="number"
                                                       class="form-control" min="10000" max="200000"
                                                       placeholder="Precio min:"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Q.</div>
                                                <input id="p_carro_max" name="p_carro_max" type="number"
                                                       class="form-control" min="10000" max="200000"
                                                       placeholder="Precio max:"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Panel-->
                                <!--Panel-->
                                <div class="card">
                                    <div class="card-header warning-color-dark white-text">
                                        Años
                                    </div>
                                    <div class="card-block">
                                        <div class="form-group">
                                            <div class="">
                                                <input id="a_carro" type="number"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="a_carro_min" name="a_carro_min" type="number"
                                                   class="form-control" min="1952" max="2018" placeholder="Del año:"/>
                                        </div>
                                        <div class="form-group">
                                            <input id="a_carro_max" name="a_carro_max" type="number"
                                                   class="form-control" min="1952" max="2018" placeholder="Al año:"/>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Panel-->
                                <button type="submit" class="btn btn-warning">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <h1 class="texto_naranja">Vehículos Destacados</h1>
                    <div class="row">
                        <?php
                        $cardCount = 0;

                        foreach ($carros->result() as $carro) {
                            $cardCount++
                            ?>
                            <?php if ($cardCount == 5) { ?>
                                <div class="row">

                            <?php } ?>

                            <!--Card-->
                            <div class="col-sm-6 col-md-3">
                                <div class="card ">
                                    <!--Card image-->
                                    <div class="imageContainer">
                                        <img class="img-fluid"
                                             src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $carro->crr_codigo . ' (1).jpg' ?>"
                                             alt="Card image cap">
                                        <!--/.Card image-->
                                    </div>


                                    <!--Card content-->
                                    <div class="card-block">
                                        <!--TODO limitar numero de caracteres en titulos y lineas-->
                                        <!--Title-->
                                        <h4 class="card-title"><?php echo character_limiter($carro->id_marca, 2); ?></h4>
                                        <!--Text-->
                                        <p class="card-text"><?php echo character_limiter($carro->id_linea, 9); ?>
                                            - <?php echo $carro->crr_modelo ?><br>
                                            <?php if ($carro->crr_moneda_precio == '$') {
                                                setlocale(LC_MONETARY, "en_US");
                                            } else {
                                                setlocale(LC_MONETARY, "es_GT");
                                            }
                                            ?>
                                            <span class="green-text"><?php echo mostrar_precio_carro($carro->crr_precio, $carro->crr_moneda_precio); ?></span>

                                        </p>
                                        <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>"
                                           class="btn btn-success btn-sm text-center">ver</a>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                            </div>
                            <!--/.Card-->

                            <?php if ($cardCount == 4 || $cardCount == 8) { ?>
                                </div>

                            <?php } ?>

                        <?php } ?>


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
<script src="<?php echo base_url() ?>/ui/public/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url() ?>/ui/public/js/numeral.min.js"></script>

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
    $(document).ready(function () {

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
            }
        });

        // With JQuery
        precioCarroSlider = new Slider("#p_carro", {
            range: true,
            ticks: [10000, 200000],
            ticks_labels: ['<span  class="badge warning-color-dark" >Q.10,000</span>', '<span  class="badge warning-color-dark" >Q.200,000</span>'],
            tooltip: 'show',
            step:'1000'

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
        });

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
            }
        });
    });
</script>
<?php $this->stop() ?>


