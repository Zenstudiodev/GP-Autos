<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
<?php $this->layout('public/public_master_test', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <!--row para incluir buscador-->
            <div class="row">
                <div class="col m4 s12">

                </div>
                <div class="col m4 s12">
                    <div id="login-page" class="row">
                        <div class="col s12 z-depth-4 card-panel">
                            <form class="login-form">
                                <div class="row">
                                    <div class="input-field col s12 center">
                                        <h4>Registro</h4>
                                        <p class="center">Registrate ahora</p>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-5">person_outline</i>
                                        <input id="username" type="text">
                                        <label for="username" class="center-align">Nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-5">email</i>
                                        <input id="email" type="email">
                                        <label for="email" class="center-align">Correo electrónico</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-5">lock_outline</i>
                                        <input id="password" type="password">
                                        <label for="password" class="">clave</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-5">lock_outline</i>
                                        <input id="password-again" type="password">
                                        <label for="password-again" class="">Password again</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <a href="index.html" class="btn waves-effect waves-light col s12">Registro</a>
                                    </div>
                                    <div class="input-field col s12">
                                        <p class="margin center medium-small sign-up">¿Ya tiene una cuenta? <a href="page-login.html">inicie session</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col m4 s12">
                </div>
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
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        //$('.collapsible').collapsible();

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

