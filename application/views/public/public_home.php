<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php $this->layout('public/public_master', [
	'header_banners' => $header_banners,
]); ?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<?php if ($carros) { ?>

	<?php
	//constuccion de campos de buscador

	//UBICACION
	$ubicacion_carro_select = array(
		'name'  => 'ubicacion_carro',
		'id'    => 'ubicacion_carro',
		'class' => 'browser-default',
	);

	$ubicacion_carro_select_options = array(
		'TODOS' => 'TODOS',
	);
	foreach ($ubicaciones->result() as $ubicacion)
	{
		$ubicacion_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
	}

	//TIPO
	$tipo_carro_select         = array(
		'name'  => 'tipo_carro',
		'id'    => 'tipo_carro',
		'class' => 'browser-default',
	);
	$tipo_carro_select_options = array();
	foreach ($tipos->result() as $tipo_carro)
	{
		$tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
	}

	//MARCA
	$marca_carro_select         = array(
		'name'  => 'marca_carro',
		'id'    => 'marca_carro',
		'class' => 'browser-default',
	);
	$marca_carro_select_options = array(
		'TODOS' => 'TODOS',
	);
	foreach ($marca->result() as $marca_carro)
	{
		$marca_carro_select_options[$marca_carro->nombre] = $marca_carro->nombre;
	}

	//LINEA
	$linea_carro_select         = array(
		'name'  => 'linea_carro',
		'id'    => 'linea_carro',
		'class' => 'browser-default',
	);
	$linea_carro_select_options = array(
		'TODOS' => 'TODOS',

	);


    //TRANSMISION
	$transmision_carro_select         = array(
		'name'  => 'transmision_carro',
		'id'    => 'transmision_carro',
		'class' => 'browser-default',
	);
	$transmision_carro_select_options = array(
		'TODOS' => 'TODOS',
	);

	foreach ($transmisiones->result() as $transmision)
	{
		$transmision_carro_select_options[$transmision->crr_transmision] = $transmision->crr_transmision;
	}

	//COMBUSTIBLE
	$combustible_carro_select         = array(
		'name'  => 'combustible_carro',
		'id'    => 'combustible_carro',
		'class' => 'browser-default',
	);
	$combustible_carro_select_options = array(
		'TODOS' => 'TODOS',
	);
	foreach ($combustibles->result() as $combustible)
	{
		$combustible_carro_select_options[$combustible->nombre] = $combustible->nombre;
	}

	//ORIGEN
	$origen_carro_select         = array(
		'name'  => 'origen_carro',
		'id'    => 'origen_carro',
		'class' => 'browser-default',
	);
	$origen_carro_select_options = array(
		'TODOS'   => 'TODOS',
		'AGENCIA' => 'AGENCIA',
		'RODADO'  => 'RODADO',
	);
	//UBICACIONES
	$ubicaciones_carro_select         = array(
		'name' => 'ubicacion',
		'id'   => 'ubicacion',
	);
	$ubicaciones_carro_select_options = array(
		'TODOS' => 'TODOS',
	);
	foreach ($ubicaciones->result() as $ubicacion)
	{
		$ubicaciones_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
	}

	?>
    <section id="homeCarros">
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
                                <li>
                                    <div class="collapsible-header active"><i class="material-icons">directions_car</i>Vehículo
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class=" s12">
                                                <label for="tipo_carro">Ubicacion </label>
												<?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col s12">
                                                <label for="tipo_carro">Tipo de Vehiculo</label>
												<?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col s12">
                                                <label for="tipo_carro">Marca</label>
												<?php echo form_dropdown($marca_carro_select, $marca_carro_select_options) ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col s12">
                                                <label for="tipo_carro">Linea</label>
												<?php echo form_dropdown($linea_carro_select, $linea_carro_select_options) ?>

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
                                            <div class=" col s12">
                                                <label for="tipo_carro">Combustible</label>
												<?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options) ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col s12">
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

                                            <p id="p_carro"></p>
                                            <!-- <input id="p_carro" type="number"/>-->
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="p_carro_min" name="p_carro_min" type="number"
                                                       min="0" max="300000" step="1000"
                                                       placeholder="Precio min:"/>
                                                <label for="icon_prefix">Precio min:</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="p_carro_max" name="p_carro_max" type="number"
                                                       min="0" max="300000" step="1000"
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
                                            class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light">
                                        Buscar
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col m9 s12">
                <h1 class="texto_naranja">Vehículos Destacados</h1>
                <div class="row">
					<?php
					$cardCount = 0;

					foreach ($carros->result() as $carro)
					{
						$cardCount++
						?>
                        <div class="col s12 m3">

                            <div class="card">
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
                                    <span class="card-title grey-text text-darken-4">
                                        <?php
                                        $marca_str = character_limiter($carro->id_marca, 2);
                                        echo $marca_carro ?>
                                        <i class="material-icons right">close</i></span>
                                    <p class="">
										<?php
										$linea_str = character_limiter($carro->id_linea, 6);
										echo $linea_str; ?>
                                        - <?php echo $carro->crr_modelo ?><br>
										<?php if ($carro->crr_moneda_precio == '$')
										{
											setlocale(LC_MONETARY, "en_US");
										}
										else
										{
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
}
else
{
	echo 'Aun no hay prospectos';
} ?>
<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>
<script>
    var buscador_ubicacion;
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
    /*jQuery('#camera_wrap_1').camera({
        thumbnails: false,
        height: '42%',
        pagination: false
    });*/

    function actualizarCampoInput(valor, campoInput) {
        //display en input fields
        $(campoInput).val(valor);
        // $(campoInput).mask('000.000.000.000.000,00', {reverse: true});
    }

    //cambiar valor de inpusts precio y año
    function setSliderCarroPrecio(i, value) {
        var r = [null, null];
        r[i] = value;
        precioCarroSlider.noUiSlider.set(r);
    }

    //Precio carro
    precioCarroSlider = document.getElementById('p_carro');
    noUiSlider.create(precioCarroSlider, {
        start: [0, 300000],
        range: {
            'min': [0],
            'max': [300000]
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

    function formCodigo() {
        var codigo_carro_a_buscar = $("#input_codigo").val();
        if (codigo_carro_a_buscar == '') {
            console.log('codigo vacio ');
        } else {
            window.location.href = "<?php echo base_url();?>index.php/Carro/ver/" + codigo_carro_a_buscar;
        }
    }

    $("#btn_codigo").click(function () {
        var codigo_carro_a_buscar = $("#input_codigo").val();
        if (codigo_carro_a_buscar == '') {
            console.log('codigo vacio ');
        } else {
            window.location.href = "<?php echo base_url();?>index.php/Carro/ver/" + codigo_carro_a_buscar;
        }
    });

    $(document).ready(function () {
        $('select').material_select();
        marca = $("#marca_carro").val();
        tipo = $("#tipo_carro").val();

        //Actualizar marcas
        $('#marca_carro option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
            success: function (data) {
                $('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                $('select').material_select();
            }
        });


    });
    //submit form
    $("#filtro_form").submit(function (event) {
        event.preventDefault();
        //alert( "Handler for .submit() called." );
        buscador_ubicacion = $("#ubicacion_carro").val();
        buscador_tipo = $("#tipo_carro").val();
        buscador_marca = $('#marca_carro').val();
        buscador_linea = $('#linea_carro').val();
        buscador_transmision = $('#transmision_carro').val();
        buscador_combustible = $("#combustible_carro").val();
        buscador_origen = $("#origen_carro").val();
        buscador_precio_min = $("#p_carro_min").val();
        buscador_precio_max = $("#p_carro_max").val();
        buscador_a_min = $("#a_carro_min").val();
        buscador_a_max = $("#a_carro_max").val();
        var filtros;
        filtros = '<?php echo base_url()?>' + 'index.php/carro/filtro/' + buscador_ubicacion + '/' + buscador_tipo + '/' + buscador_marca + '/' + buscador_linea + '/' + buscador_transmision + '/' + buscador_combustible + '/' + buscador_origen + '/' + buscador_precio_min + '-' + buscador_precio_max + '/' + buscador_a_min + '-' + buscador_a_max;
        window.location.assign(filtros);
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
                $('#marca_carro').append('<option value="TODOS">TODOS</option>');
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
                $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
                $("#linea_carro").val(buscador_linea);
            }
        });
    });
</script>
<?php $this->stop() ?>


