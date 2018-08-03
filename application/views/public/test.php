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


$username = array(
    'name' => 'username',
    'placeholder' => 'Username',
    'type' => 'text',
    'class' => 'form-control',
    'required' => 'required'
);
$password_admin = array(
    'name' => 'password',
    'placeholder' => 'Password',
    'type' => 'password',
    'class' => 'form-control',
    'required' => 'required'
);

$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider" xmlns="http://www.w3.org/1999/html"></div>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <!--row para incluir buscador-->
            <div class="row">
                <div class="col m1 s12">

                </div>
                <div class="col m4 s12">
                    <div id="login-page" class="row">
                        <div class="col s12 z-depth-4 card-panel">

                            <?php
                            //echo  $CI->ion_auth->get_user_id();?>

                            <div class="row">
                                <div class="input-field col s12 center">
                                    <h4>Usuarios</h4>
                                    <p class="center"><?php echo lang('login_subheading'); ?></p>
                                </div>
                            </div>
                            <div id="infoMessage"><?php echo $message; ?></div>

                            <?php echo form_open("cliente/login"); ?>

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">person_outline</i>
                                    <?php echo form_input($identity); ?>
                                    <?php echo lang('login_identity_label', 'identity'); ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">lock_outline</i>
                                    <?php echo form_input($password); ?>
                                    <?php echo lang('login_password_label', 'password'); ?>
                                </div>
                            </div>

                            <!--<p>
                                <label>
                                    <input type="checkbox" checked="checked" />
                                    <span>Yellow</span>
                                </label>
                                <?php /*echo lang('login_remember_label', 'remember');*/ ?>
                                <?php /*echo form_checkbox('remember', '1', true, 'id="remember"');*/ ?>
                            </p>-->


                            <p><?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn waves-effect waves-light col s12"'); ?></p>
                            <p>&nbsp;</p>
                            <p><a class="btn waves-effect waves-light col s12"
                                  href="<?php echo base_url() ?>/cliente/registro">registrarse</a></p>

                            <?php echo form_close(); ?>

                            <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>


                        </div>
                    </div>
                </div>
                <div class="col m2 s12">
                </div>
                <div class="col m4 s12">
                    <div id="login-page" class="row">
                        <div class="col s12 z-depth-4 card-panel">
                            <?php
                            //echo  $CI->ion_auth->get_user_id();?>

                            <div class="row">
                                <div class="input-field col s12 center">
                                    <h4>Predios</h4>
                                    <p class="center"><?php echo lang('login_subheading'); ?></p>
                                </div>
                            </div>
                            <div id="infoMessage"><?php echo $message; ?></div>

                            <?php echo form_open("/login/user_login"); ?>

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">person_outline</i>
                                    <?php echo form_input($username); ?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">lock_outline</i>
                                    <?php echo form_input($password_admin); ?>
                                </div>
                            </div>
                            <p>
                                <button type="submit" class="btn waves-effect waves-light col s12"/>
                                Login</button></p>
                            <p>&nbsp;</p>
                            <p><a class="btn waves-effect waves-light col s12" href="">Afiliarse</a></p>
                            <?php echo form_close(); ?>
                            <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
                        </div>
                    </div>
                </div>
                <div class="col m1 s12">
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


