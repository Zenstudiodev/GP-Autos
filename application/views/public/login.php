<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
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
<?php $this->start('title') ?>
<title>Inicia sesión</title>
<?php $this->stop() ?>

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

                            <p><a href="forgot_password" class="btn   text-center red darken-4 waves-effect waves-light col s12"><?php echo lang('login_forgot_password'); ?></a></p>


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
                            <p><a class="btn waves-effect waves-light col s12" href="#anunciate_modal">Afiliarse</a></p>
                            <p>&nbsp;</p>
                            <?php echo form_close(); ?>
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

<!-- Modal Structure -->
<div id="anunciate_modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Interesado en Afiliar predio</h4>
        <form id="anunciate_form">
            <input type="hidden" name="tipo" id="tipo_input">
            <div class="card-panel  red darken-1 white-text" id="form_anunciate_alert">
                    <span class="white-text">
                        Por favor llene todos los campos del formulario
                    </span>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_contacto" name="predio_contacto" type="text" class="validate" required>
                    <label for="predio_contacto">Contacto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_nombre" name="predio_nombre" type="text" class="validate" required>
                    <label for="predio_nombre">Nombre del predio</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_vehiculos" name="predio_vehiculos" type="number" class="validate" required>
                    <label for="predio_vehiculos">Cantidad de vehículos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_correo" name="predio_correo" type="email" class="validate" required>
                    <label for="predio_correo">Correo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_telefono" name="predio_telefono" type="tel" class="validate" required>
                    <label for="predio_telefono">Teléfono</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="predio_direccion" name="predio_direccion" type="text" class="validate" required>
                    <label for="predio_direccion">Dirección</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a class="btn btn-flat waves-green" id="anunciate_enviar">Enviar</a>
    </div>
</div>


<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>
<script>

    $(document).ready(function () {
        $('.modal').modal();
        $("#form_anunciate_alert").hide();
    });

    //Formulario anunciate
    $("#anunciate_enviar").click(function () {
        //obtener datos

        predio_contacto = $("#predio_contacto").val();
        predio_nombre = $("#predio_nombre").val();
        predio_vehiculos = $("#predio_vehiculos").val();
        predio_correo = $("#predio_correo").val();
        predio_telefono = $("#predio_telefono").val();
        predio_direccion = $("#predio_direccion").val();



        formulario_informacion_data = {
            predio_contacto: predio_contacto,
            predio_nombre: predio_nombre,
            predio_vehiculos: predio_vehiculos,
            predio_correo: predio_correo,
            predio_telefono: predio_telefono,
            predio_direccion: predio_direccion
        };

        if ($("#anunciate_form")[0].checkValidity()) {
            console.log("form Submit");
            $("#form_anunciate_alert").hide();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>index.php/Formularios/predio_interesado',
                data: formulario_informacion_data,
                success: function (data) {
                    if (data == 'send') {
                        $("#anunciate_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                        $("#anunciate_modal").find('.modal-footer').html('');

                    }
                }
            });
        } else {
            $("#form_anunciate_alert").fadeIn(1000);
        }

        /**/
    });

</script>
<?php $this->stop() ?>


