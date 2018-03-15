<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 4/10/2017
 * Time: 11:28 AM
 */
$this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

if($predio){

	$predio = $predio->row();
}
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="http://www.gruponorthatlantic.com" target="_blank">
                <img src="<?php echo base_url() ?>ui/public/images/banner/embarque.jpg" alt="...">
            </a>
        </div>
        <div class="item ">
            <img src="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg" alt="...">
        </div>
        <div class="item">
            <img src="<?php echo base_url() ?>/ui/public/images/banner/anuncia-tu-carro.jpg" alt="...">
        </div>
        <div class="item">
            <img src="<?php echo base_url() ?>/ui/public/images/banner/creditos.jpg" alt="...">
        </div>
        <div class="item">
            <img src="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg" alt="...">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>

<section id="homeCarros">
    <div class="container">
        <!--row para incluir buscador-->
        <div class="row">

        <div class="col m12 s12">
           <?if($predio){?>
            <div class="row">

                <h4>Predio - <?php echo $predio->prv_nombre; ?></h4>
            </div>
            <div class="row">
                <img class="responsive-img" src="<?php echo base_url().'ui/public/images/predio/'.$predio->prv_img;?>">
            </div>
            <?php } else{?>
            <h2>EL predio que busca no existe</h2>

            <?php }?>

            <div class="row">
				<?php echo $links; ?>
            </div>
            <div class="row">
				<?php if ($carros) { ?>
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
                                    <span class="card-title grey-text text-darken-4"><?php echo character_limiter($carro->id_marca, 2); ?>
                                        <i class="material-icons right">close</i></span>
                                <p class=><?php echo character_limiter($carro->id_linea, 9); ?>
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
					<?php
				}
				else
				{
					echo 'Aun no hay carros';
				} ?>
                <div class="row">
		            <?php echo $links; ?>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>

<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>
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






    $(document).ready(function () {
        $('select').material_select();
        marca = $("#marca_carro").val();
        tipo = $("#tipo_carro").val();

    });
    //submit form
    $("#filtro_form").submit(function (event) {
        event.preventDefault();
        //alert( "Handler for .submit() called." );
        buscador_tipo = $("#tipo_carro").val();
        buscador_marca = $('#marca_carro').val();
        buscador_linea = $('#linea_carro').val();
        buscador_combustible = $("#combustible_carro").val();
        buscador_origen = $("#origen_carro").val();
        buscador_precio_min = $("#p_carro_min").val();
        buscador_precio_max = $("#p_carro_max").val();
        buscador_a_min = $("#a_carro_min").val();
        buscador_a_max = $("#a_carro_max").val();
        var filtros;
        filtros = '<?php echo base_url()?>' + 'index.php/carro/filtro/' + buscador_tipo + '/' + buscador_marca + '/' + buscador_linea + '/' + buscador_combustible + '/' + buscador_origen + '/' + buscador_precio_min + '-' + buscador_precio_max + '/' + buscador_a_min + '-' + buscador_a_max;
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


