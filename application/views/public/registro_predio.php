<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
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


?>
<?php $this->start('meta') ?>
    <!--Meta description Tags-->
    <title>Registro de predios - GP Autos </title>
<?php ?>


<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>
<?php $this->start('page_content') ?>
    <div class="divider"></div>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 m12">
                    <h1>Registro de predios</h1>
                </div>
            </div>
            <div class="row">
                <div class="col s2"></div>
                <form class="col s8" action="<?php echo base_url().'predio/guardar_afiliacion'?>" method="post">
                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $mensaje?>
                        </div>

                    <?php } ?>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre_predio" type="text" class="validate" name="nombre_predio">
                            <label for="nombre_predio">Nombre Predio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="descripcion_predio" type="text" class="validate" name="descripcion_predio">
                            <label for="descripcion_predio">Descripción del predio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="telefono_predio" type="text" class="validate" name="telefono_predio">
                            <label for="telefonoj_predio">Teléfono del predio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="direccion_predio" type="text" class="validate" name="direccion_predio">
                            <label for="direccion_predio">Direccion predio</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="numero_carros" type="text" class="validate" name="numero_carros" >
                            <label for="numero_carros">Número de carros</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <input id="user_name" type="text" class="validate" name="user_name">
                            <label for="user_name">Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre_usuario" type="text" class="validate" name="nombre_usuario">
                            <label for="nombre_usuario">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="correo" type="email" class="validate" name="correo">
                            <label for="correo">Correo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Clave</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Aplicar afiliación
                        <i class="material-icons right">registrarse</i>
                    </button>
                </form>
                <div class="col s2"></div>
            </div>
        </div>
    </div>

<?php $this->stop() ?>

<?php $this->start('js_p') ?>

    <script type="text/javascript">
    </script>

<?php $this->stop() ?>