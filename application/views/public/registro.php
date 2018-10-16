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

$CI =& get_instance();
?>
<?php $this->start('title') ?>
<title>Registrate</title>
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
                <div class="col m4 s12">

                </div>
                <div class="col m4 s12">
                    <div id="login-page" class="row">
                        <div class="col s12 z-depth-4 card-panel">
                            <?php
                            echo  $CI->ion_auth->get_user_id();?>

                            <div class="row">
                                <div class="input-field col s12 center">
                                    <h4>Registro</h4>
                                    <p class="center">Registrate ahora</p>
                                </div>
                            </div>


                            <div id="infoMessage"><?php echo $message;?></div>

                            <?php echo form_open("cliente/registro");?>

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">person_outline</i>
                                    <?php echo form_input($first_name);?>
                                    <?php echo lang('create_user_fname_label', 'first_name');?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">person_outline</i>
                                    <?php echo form_input($last_name);?>
                                    <?php echo lang('create_user_lname_label', 'last_name');?>
                                </div>
                            </div>

                            <?php
                            if($identity_column!=='email') {
                                echo '<p>';
                                echo lang('create_user_identity_label', 'identity');
                                echo '<br />';
                                echo form_error('identity');
                                echo form_input($identity);
                                echo '</p>';
                            }
                            ?>

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">account_balance</i>
                                    <?php echo form_input($company);?>
                                    <?php echo lang('create_user_company_label', 'company');?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">email</i>
                                    <?php echo form_input($email);?>
                                    <?php echo lang('create_user_email_label', 'email');?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">smartphone</i>
                                    <?php echo form_input($phone);?>
                                    <?php echo lang('create_user_phone_label', 'phone');?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">lock_outline</i>
                                    <?php echo form_input($password);?>
                                    <?php echo lang('create_user_password_label', 'password');?>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">lock_outline</i>
                                    <?php echo form_input($password_confirm);?>
                                    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn waves-effect waves-light col s12"','');?>
                                </div>
                                <div class="input-field col s12">
                                    <p class="margin center medium-small sign-up">¿Ya tiene una cuenta? <a href="login">inicie session</a></p>
                                </div>
                            </div>

                            <?php echo form_close();?>
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

<?php $this->stop() ?>


