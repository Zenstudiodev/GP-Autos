<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/07/2017
 * Time: 12:45 PM
 */
?>
<?php $this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

$numero_banners = $banners->num_rows();
$banners = $banners->result();

?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div class="divider"></div>
<?php
//constuccion de campos de buscador

//UBICACION
$ubicacion_carro_select         = array(
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
if($marca){
    foreach ($marca->result() as $marca_carro)
    {
        $marca_carro_select_options[$marca_carro->id_marca] = $marca_carro->id_marca;
    }
}

//LINEA
$linea_carro_select         = array(
    'name' => 'linea_carro',
    'id'   => 'linea_carro',
    'class'=>'browser-default'
);
$linea_carro_select_options = array(
    'TODOS' => 'TODOS',
);
if ($linea)
{
    foreach ($linea->result() as $linea_carro)
    {
        $linea_carro_select_options[$linea_carro->id_linea] = $linea_carro->id_linea;
    }
}

//TRANSMISION
$transmision_carro_select         = array(
    'name'  => 'transmision_carro',
    'id'    => 'transmision_carro',
    'class' => 'browser-default',
);
$transmision_carro_select_options = array(
    'TODOS'   => 'TODOS',
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
    'TODOS' => 'TODOS'
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
    'TODOS' => 'TODOS'
);
foreach ($ubicaciones->result() as $ubicacion)
{
    $ubicaciones_carro_select_options[$ubicacion->id_ubicacion] = $ubicacion->id_ubicacion;
}

$CI =& get_instance();
?>
    <div class="container">
        <!--row para incluir buscador-->
        <div class="row">
        </div>
        <div class="col m12 s12">
            <div class="row">
                <h1 class="texto_naranja">Resultado de la Busqueda</h1>
                <div class="container">
                    <div class="row">
                        <?php echo $links; ?>
                    </div>
                </div>

                <?php if ($carros) { ?>
                    <?php
                    $cardCount          = 0;
                    $fila_para_anuncios = 9;
                    foreach ($carros->result() as $carro)
                    {
                        $cardCount++;
                        if ($cardCount == $fila_para_anuncios)
                        {
                            $fila_para_anuncios = $fila_para_anuncios + 8;


                            $numero_banners = $numero_banners - 1;
                            $rand_banner = rand(0, $numero_banners);
                            $banner = $banners[$rand_banner];
                            ?>


                            <div class="col s12 m12">
                                <div id="banners_busqueda" class="hoverable">
                                    <div class="item">
                                        <a href="<?php echo $banner->link;?>" target="_blank"
                                           banner_busqueda_id="<?php echo $banner->id_banner?>">
                                            <img src="<?php echo base_url().$banner->imagen;?>"
                                                 class="responsive-img">
                                        </a>
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
                                    <p class=><?php echo character_limiter($carro->id_linea, 7); ?>
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
                    <?php } ?>
                <?php } else { ?>
                    <blockquote class="blockquote bq-danger">
                        <p class="bq-title">No hay resultados</p>
                        <p>No hay ningun vehículo con los crirterios de su busqueda</p>
                    </blockquote>
                <?php } ?>
            </div>

            <?php echo $links; ?>

        </div>
    </div>
    </div>

<?php $this->stop() ?>

    <!-- JS personalizado -->
<?php $this->start('js_p') ?>
    <script src="<?php echo base_url(); ?>ui/public/js/jquery.smoothscroll.min.js"></script>
    <script>

        //variables para el buscador
        var buscador_ubicacion;
        var buscador_tipo;
        var buscador_marca;
        var buscador_linea;
        var buscador_combustible;
        var buscador_transmision;
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


        //Slide to card
        <?php if (isset($_GET['card'])){?>
        var target = $('#<?php echo($_GET["card"]); ?>');
        $('html').smoothScroll(500);
        $(target).addClass('orange lighten-2');
        //alert('<?php echo $_GET['card']; ?>');
        <?php } ?>


        $(document).ready(function () {
            // activar los selects
            $('select').material_select();

            //leemos las variables para el buscador
            buscador_tipo = '<?php echo $s_tipo; ?>';
            buscador_marca = '<?php echo urldecode($s_marca);?>';
            buscador_linea = '<?php echo urldecode($s_linea);?>';
            buscador_combustible = '<?php echo urldecode($s_combustible);?>';
            buscador_transmision = '<?php echo urldecode($s_transmision);?>';
            buscador_origen = '<?php echo $s_origen;?>';
            buscador_precio_min = '<?php echo $precio_min;?>';
            buscador_precio_max = '<?php echo $precio_max;?>';
            buscador_a_min = '<?php echo $a_min;?>';
            buscador_a_max = '<?php echo $a_max;?>';

            console.log(
                buscador_tipo + ' - ' +
                buscador_marca + ' - ' +
                buscador_linea + ' - ' +
                buscador_combustible + ' - ' +
                buscador_transmision + ' - ' +
                buscador_origen + ' - ' +
                buscador_precio_min + ' - ' +
                buscador_precio_max + ' - ' +
                buscador_a_min + ' - ' +
                buscador_a_max);

            $("#tipo_carro").val(buscador_tipo);

            marca = $(this).val();
            tipo = $("#tipo_carro").val();
            //$('#marca_carro option').remove();
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


            tipo = $("#tipo_carro").val();
            //actualizamos la lista de lineas segun marca al cargar el documento
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

            $("#transmision_carro").val(buscador_transmision);
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

        //submit form
        $( "#filtro_form" ).submit(function( event ) {
            event.preventDefault();
            //$('#filtro_form')[0].checkValidity();
            //alert( "Handler for .submit() called." );

            buscador_ubicacion = $("#ubicacion_carro").val();
            buscador_tipo = $("#tipo_carro").val();
            buscador_marca = $('#marca_carro').val();
            buscador_linea = $('#linea_carro').val();
            buscador_transmision = $('#transmision_carro').val();
            buscador_combustible= $("#combustible_carro").val();
            buscador_origen = $("#origen_carro").val();
            buscador_precio_min = $("#p_carro_min").val();
            buscador_precio_max = $("#p_carro_max").val();
            buscador_a_min = $("#a_carro_min").val();
            buscador_a_max = $("#a_carro_max").val();

            var filtros;
            filtros = '<?php echo base_url()?>'+'index.php/carro/filtro/'+buscador_ubicacion+'/'+buscador_tipo+'/'+buscador_marca+'/'+buscador_linea+'/'+buscador_transmision+'/'+buscador_combustible+'/'+buscador_origen+'/'+buscador_precio_min+'-'+buscador_precio_max+'/'+buscador_a_min+'-'+buscador_a_max;
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
                    $('#marca_carro').val('TODOS');
                    $('#linea_carro').val('TODOS');
                    $('#combustible_carro').val('TODOS');
                    $('#origen_carro').val('TODOS');

                    $('select').material_select();
                }
            });
        });


    </script>
<?php $this->stop() ?>