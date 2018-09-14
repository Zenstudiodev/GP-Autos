<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
$usuario = $usuario->row();
?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);



//predios
$predios_select         = array(
    'name' => 'predio',
    'id'   => 'predio',
);
$predios_select_options = array(
);

foreach ($predios->result() as $predio)
{
    $predios_select_options[$predio->id_predio_virtual] = $predio->prv_nombre;
}

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"></div>
    </div>
    <div class="container-fluid">

        <pre>

            <?php
            print_r($usuario);
            ?>

        </pre>


        <?php if ($usuario) { ?>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Datos del Usuario</h5>
                        </div>
                        <div class="widget-content ">
                            <form action="<?php echo base_url() . 'index.php/admin/actualizar_usuarios' ?>" method="post"
                                  class="form-horizontal">
                                <div class="form-group">
                                    <label for="nombre" class="col-md-2 control-label">Username</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Userename" id="username" name="username" value="<?php echo $usuario->username?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="col-sm-2 control-label">Correo</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" value="<?php echo $usuario->email?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">Clave</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Clave" id="clave" name="clave" value="<?php echo $usuario->password?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $usuario->nombre?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rol" class="col-sm-2 control-label">ROL</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="rol" name="rol">
                                            <option value="predio">Predio</option>
                                            <option value="editor">Editor</option>
                                            <option value="externo">Externo</option>
                                            <option value="asesor">Asesor</option>
                                            <option value="marketing">marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="carro_activos" class="col-sm-2 control-label">Carros Activos</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="Carros activos" id="carro_activos" name="carro_activos" value="<?php echo $usuario->carros_activos?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="carro_premitidos" class="col-sm-2 control-label">Carros Permitidos</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="Carros permitidos" id="carro_premitidos" name="carro_permitidos" value="<?php echo $usuario->carros_permitidos?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="predio" class="col-sm-2 control-label">Carros Permitidos</label>
                                    <div class="col-sm-10">
                                        <?php echo form_dropdown($predios_select, $predios_select_options, $usuario->predio_id) ?>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="hidden" name="user_id" value="<?php echo $usuario->id?>">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>


<?php $this->stop() ?>
