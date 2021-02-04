<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 3/02/2021
 * Time: 14:26
 */
$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$predio_nombre = array(
    'type' => 'text',
    'name' => 'predio_nombre',
    'id' => 'predio_nombre',
    'class' => ' form-control',
    'placeholder' => 'Nombre',
    'value' => ''
    //'disabled'    => 'disabled'
);
$predio_id = array(
    'type' => 'text',
    'name' => 'predio_id',
    'id' => 'predio_id',
    'class' => ' form-control',
    'placeholder' => 'ID predio',
    'value' => ''
    //'disabled'    => 'disabled'
);
$predio_encargado = array(
    'type' => 'text',
    'name' => 'predio_encargado',
    'id' => 'predio_encargado',
    'class' => ' form-control',
    'placeholder' => 'Encargado',
    'value' => ''
    //'disabled'    => 'disabled'
);
?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php /*echo base_url() */ ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/easy-autocomplete.min.css"
      type="text/css">
<link rel="stylesheet"
      href="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css"
      type="text/css">
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
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Datos del cliente</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo base_url() . 'seguros/guardar_cliente_seguro' ?>" method="post"
                              class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">Predio id</label>
                                <div class="controls">
                                    <?php echo form_input($predio_id); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nombre Predio</label>
                                <div class="controls">
                                    <?php echo form_input($predio_nombre); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Encargado predio</label>
                                <div class="controls">
                                    <?php echo form_input($predio_encargado); ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php /*echo base_url() */ ?>ui/admin/js/matrix.form_common.js"></script>-->


<script>

    var options_predio_id = {

        url: "<?php echo base_url()?>predio/predios_json",
        theme: "square",
        getValue: 'id_predio_virtual',
        template: {
            type: "custom",
            method: function (value, item) {
                return "Predio id: " + item.id_predio_virtual + " | " + "Nombre: " + item.prv_nombre + " | " + "Encargado:" + item.prv_nombre_encargado;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#predio_id").getSelectedItemData().predio_id;

                // window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/" + selectedItemValue).trigger("click");

                // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#predio_id").easyAutocomplete(options_predio_id);


</script>
<?php $this->stop() ?>
