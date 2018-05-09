<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
    $predio_data = $predio->row();
?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]); ?>
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
            print_r($predio_data);
            ?>

        </pre>


        <?php if ($predio) { ?>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Datos del predio</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="<?php echo base_url() . 'index.php/admin/actualizar_predio' ?>" method="post"
                                  class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">ID :</label>
                                    <div class="controls">
                                        <input type="text" class="span11"
                                               value="<?php echo $predio_data->id_predio_virtual ?>"
                                               id="id" name="id" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nombre</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Nombre"
                                               value="<?php echo $predio_data->prv_nombre ?>" id="nombre" name="nombre"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Dirección</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Dirección"
                                               value="<?php echo $predio_data->prv_direccion ?>" id="direccion" name="direccion"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Teléfono</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Teléfono"
                                               value="<?php echo $predio_data->prv_telefono ?>" id="telefono" name="telefono"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Descripción</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Descripción"
                                               value="<?php echo $predio_data->prv_descripcion ?>" id="descripcion" name="descripcion"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">imagen</label>
                                    <div class="controls">
                                        <img src="<?php echo base_url().'ui/public/images/predio/'. $predio_data->prv_img?>" class="img-responsive">
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Estado</label>
                                    <?php
                                    //Estado
                                    $estado_select   = array(
                                        'name'     => 'estado',
                                        'id'       => 'estado',
                                        'class'    => ' browser-default form-control',
                                        'required' => 'required'
                                    );
                                    $estado_select_options = array(
                                        "Alta" => "Alta",
                                        "Baja" => "Baja",
                                    );
                                    ?>
                                    <div class="controls">
                                        <?php echo form_dropdown($estado_select, $estado_select_options, $predio_data->prv_estatus) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Carros activos</label>
                                    <div class="controls">
                                        <input type="number" class="span11"
                                               value="<?php echo $predio_data->carros_activos ?>"
                                               id="carros_activos" name="carros_activos" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Carros permitidos</label>
                                    <div class="controls">
                                        <input type="number" class="span11"
                                               value="<?php echo $predio_data->carros_permitidos ?>"
                                               id="carros_permitidos" name="carros_permitidos" />
                                    </div>
                                </div>


                                <div class="form-actions">
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
