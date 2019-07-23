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
                <form class="col s8">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Nombre Predio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Direccion predio</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Número de carros</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Correo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate">
                            <label for="password">Clave</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Aplicar afiliación
                        <i class="material-icons right">send</i>
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