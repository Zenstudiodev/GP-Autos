<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master');

?>


<?php $this->start('css_p') ?>

<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg">
            <!--<div class="camera_caption fadeFromBottom">
                Texto
            </div>-->
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner2.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner2.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner3.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner3.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner4.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner4.jpg">
        </div>
    </div><!-- #camera_wrap_1 -->
<?php $this->stop() ?>
<?php $this->start('page_content') ?>
    <div class="divider"></div>
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
$marca_carro_select_options = array(
    'todos' => 'todos',
);
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

    <div class="container">
        <!--row para incluir buscador-->
        <div class="row">
            <div class="col m3 s12">
                <div id="homeSearchBox">
                    <h4 class="texto_naranja">Buscar</h4>
                    <form method="post" action="<?php echo base_url(); ?>index.php/carro/por_codigo">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li>
                                <div class="collapsible-header active"><i class="material-icons">directions_car</i>Código
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="input_codigo" name="input_codigo" type="text" class="validate">
                                            <label for="input_codigo">Buscar codigo</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <button type="button" class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light" id="btn_codigo">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <form method="get" action="<?php echo base_url(); ?>index.php/carro/buscar">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li>
                                <div class="collapsible-header active"><i class="material-icons">directions_car</i>Vehículo
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>
                                            <label for="tipo_carro">Tipo de Vehiculo</label>
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

                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">network_check</i>Caracteristicas
                                </div>
                                <div class="collapsible-body">
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
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">attach_money</i>Precio
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">

                                        <p id="p_carro"></p>
                                        <!-- <input id="p_carro" type="number"/>-->
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="p_carro_min" name="p_carro_min" type="number"
                                                   min="0" max="200000" step="1000"
                                                   placeholder="Precio min:"/>
                                            <label for="icon_prefix">Precio min:</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="p_carro_max" name="p_carro_max" type="number"
                                                   min="0" max="200000" step="1000"
                                                   placeholder="Precio max:"/>
                                            <label for="icon_prefix">Precio max:</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">date_range</i>Año</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <p id="a_carro"></p>
                                    </div>
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
                            </li>
                        </ul>
                        <div class="card ">
                            <div class="card-action">
                                <button type="submit"
                                        class="btn btn-success text-center orange darken-4 waves-effect waves-light">
                                    Buscar
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col m9 s12">
            <h1 class="texto_naranja">Resultado de la Busqueda</h1>
            <div class="row">
                <?php if ($carros) { ?>
                    <?php
                    $cardCount = 0;
                    $fila_para_anuncios = 9;
                    foreach ($carros->result() as $carro) {
                        $cardCount++;
                        if ($cardCount == $fila_para_anuncios) {
                            $fila_para_anuncios = $fila_para_anuncios + 8;
                            ?>
                            <div class="col s12 m12">
                                <div class="card">
                                    <div class="card-content center-align">
                                        <a href="<?php echo base_url();?>index.php/Productos/anunciate" ><img src="<?php echo base_url() ?>/ui/public/images/banner/ad/ad_1.jpg" class="responsive-img"></a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="col s12 m3">
                            <div class="card" id="<?php echo $carro->crr_codigo . '_card' ?>">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <div class="imageContainer">
                                        <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>">
                                            <img class="activator"
                                                 src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $carro->crr_codigo . ' (1).jpg' ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>">
                                        <span class="card-title  grey-text text-darken-4"><?php echo substr($carro->id_marca, 0, 9); ?></span>
                                    </a>
                                    <p>
                                        <?php echo substr($carro->id_linea, 0, 12); ?>
                                        - <?php echo $carro->crr_modelo ?><br>
                                        <a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>"
                                           class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light">ver</a>
                                    </p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4"><?php echo character_limiter($carro->id_marca, 2); ?>
                                        <i class="material-icons right">close</i></span>
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
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <blockquote class="blockquote bq-danger">
                        <p class="bq-title">No hay resultados</p>
                        <p>No hay ningun vehículo con los crirterios de su busqueda</p>
                    </blockquote>
                <?php } ?>


            </div>
        </div>
    </div>
    </div>
<?php $this->stop() ?>

    <!-- JS personalizado -->
<?php $this->start('js_p') ?>
    <script src="<?php echo base_url(); ?>ui/public/js/jquery.smoothscroll.min.js"></script>
    <script>

        //variables para el buscador
        var buscador_tipo;
        var buscador_marca;
        var buscador_linea;
        var buscador_combustible;
        var buscador_origen;
        var buscador_precio_min;
        var buscador_precio_max;
        var buscador_a_min;
        var buscador_a_max;

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

        //BANNER
        jQuery('#camera_wrap_1').camera({
            thumbnails: false,
            height: '42%',
            pagination: false
        });

        //Slide to card
        <?php if (isset($_GET['card'])){?>
        var target = $('#<?php echo($_GET["card"]); ?>');
        $('html').smoothScroll(500);
        $(target).addClass('orange lighten-2');
        //alert('<?php echo $_GET['card']; ?>');
        <?php } ?>






        //cambiar valor de inpusts precio
        function setSliderCarroPrecio(i, value) {
            var r = [null, null];
            r[i] = value;
            precioCarroSlider.noUiSlider.set(r);
        }
        //Precio carro
        precioCarroSlider = document.getElementById('p_carro');
        noUiSlider.create(precioCarroSlider, {
            start: [0, 200000],
            range: {
                'min': [0],
                'max': [200000]
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

        //cambiar valor de inpusts año
        function setSliderCarroA(i, value) {
            var r = [null, null];
            r[i] = value;
            aCarroSlider.noUiSlider.set(r);
        }
        //Año de carro
        aCarroSlider = document.getElementById('a_carro');
        noUiSlider.create(aCarroSlider, {
            start: [1952, 2018],
            range: {
                'min': [1952],
                'max': [2018]
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
            if (codigo_carro_a_buscar == ''){
                console.log('codigo vacio ');
            }else{
                window.location.href = "<?php echo base_url();?>index.php/Carro/ver/"+codigo_carro_a_buscar;
            }
        });

        $(document).ready(function () {
            // activar los selects
            $('select').material_select();

            //leemos las variables para el buscador
            buscador_tipo = '<?php echo $_GET['tipo_carro'];?>';
            buscador_marca = '<?php echo $_GET['marca_carro'];?>';
            buscador_linea = '<?php echo $_GET['linea_carro'];?>';
            buscador_combustible = '<?php echo $_GET['combustible_carro'];?>';
            buscador_origen = '<?php echo $_GET['origen_carro'];?>';
            buscador_precio_min = '<?php echo $_GET['p_carro_min'];?>';
            buscador_precio_max = '<?php echo $_GET['p_carro_max'];?>';
            buscador_a_min = '<?php echo $_GET['a_carro_min'];?>';
            buscador_a_max = '<?php echo $_GET['a_carro_max'];?>';

            console.log(buscador_tipo + ' - ' + buscador_marca + ' - ' + buscador_linea);
            $("#tipo_carro").val(buscador_tipo);

            marca = $(this).val();
            tipo = $("#tipo_carro").val();
            $('#marca_carro option').remove();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
                success: function (data) {
                    $('#marca_carro').append('<option value="todos">todos</option>');
                    $.each(data, function (key, value) {
                        $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                    });
                    $('select').material_select();
                }
            });


            tipo = $("#tipo_carro").val();
            //actualizamos la lista de lineas segun marca al cargar el documento
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

            $("#combustible_carro").val(buscador_combustible);
            $("#origen_carro").val(buscador_origen);
            $("#p_carro_min").val(buscador_precio_min);
            $("#p_carro_max").val(buscador_precio_max);
            $("#a_carro_min").val(buscador_a_min);
            $("#a_carro_max").val(buscador_a_max);


        });
        //realizamos accines luego de que termina el ajax
        $(document).ajaxComplete(function () {

            $("#marca_vehiculo").val(buscador_marca);
            $("#linea_carro").val(buscador_linea);
            $('select').material_select();
        });

        //Actualizar marcas
        $("#tipo_carro").change(function (e) {
            $('#marca_carro option').remove();
            marca = $(this).val();
            tipo = $("#tipo_carro").val();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
                success: function (data) {
                    $('#marca_carro').append('<option value="todos">todos</option>');
                    $.each(data, function (key, value) {
                        $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                    });
                    $('select').material_select();
                }
            });
        });

        //Actualizar lineas
        $("#marca_carro").change(function (e) {
            $('#linea_carro option').remove();
            marca = $(this).val();
            tipo = $("#tipo_carro").val();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
                success: function (data) {
                    $('#linea_carro').append('<option value="todos">todos</option>');
                    $.each(data, function (key, value) {
                        $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                    });
                    $('select').material_select();
                }
            });
        });


    </script>
<?php $this->stop() ?>