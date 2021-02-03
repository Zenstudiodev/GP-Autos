<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 18/01/2021
 * Time: 15:16
 */


$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$seguro_no_poliza = array(
    'type' => 'text',
    'name' => 'seguro_no_poliza',
    'id' => 'seguro_no_poliza',
    'class' => ' form-control',
    'placeholder' => 'No. poliza',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_carro_placa = array(
    'type' => 'text',
    'name' => 'seguro_carro_placa',
    'id' => 'seguro_carro_placa',
    'class' => ' form-control',
    'placeholder' => 'Placa',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_nombre = array(
    'type' => 'text',
    'name' => 'seguro_nombre',
    'id' => 'seguro_nombre',
    'class' => ' form-control',
    'placeholder' => 'Nombre',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_telefono = array(
    'type' => 'text',
    'name' => 'seguro_telefono',
    'id' => 'seguro_telefono',
    'class' => ' form-control',
    'placeholder' => 'Telefono',
    'value' => ''
    //'disabled'    => 'disabled'
);
$seguro_dpi = array(
    'type' => 'text',
    'name' => 'seguro_dpi',
    'id' => 'seguro_dpi',
    'class' => ' form-control',
    'placeholder' => 'DPI',
    'value' => ''
    //'disabled'    => 'disabled'
);
?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php /*echo base_url() */?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/easy-autocomplete.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css" type="text/css">
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
                                <label class="control-label">No. poliza</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_no_poliza); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Placa carro</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_carro_placa); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_nombre); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefono</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_telefono); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DPI</label>
                                <div class="controls">
                                    <?php echo form_input($seguro_dpi); ?>
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
<<script src="<?php echo base_url(); ?>/ui/vendor/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php /*echo base_url() */?>ui/admin/js/matrix.form_common.js"></script>-->


<script>

    $(document).ready(function () {
    });
    var options_nopoliza = {

        url: "<?php echo base_url()?>Seguros/polizas_json",
        theme: "square",
        getValue: 'seguro_no_poliza',
        template: {
            type: "custom",
            method: function (value, item) {
                return "seguro_id: " + item.seguro_id + " | " + "No de poliza: " + item.seguro_no_poliza  + " | " + "No de placa: " + item.seguro_carro_placa + " | " + "Nombre:" + item.cliente_seguro_nombre   + " | " + "Teléfono: " + item.cliente_seguro_telefono  + " | " + "DPI:" + item.cliente_seguro_dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#seguro_no_poliza").getSelectedItemData().cliente_seguro_id;

                window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/"+selectedItemValue).trigger("click");

               // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#seguro_no_poliza").easyAutocomplete(options_nopoliza);

    var options_seguro_carro_placa = {

        url: "<?php echo base_url()?>Seguros/polizas_json",
        theme: "square",
        getValue: 'seguro_carro_placa',
        template: {
            type: "custom",
            method: function (value, item) {
                return "seguro_id: " + item.seguro_id + " | " + "No de poliza: " + item.seguro_no_poliza  + " | " + "No de placa: " + item.seguro_carro_placa + " | " + "Nombre:" + item.cliente_seguro_nombre   + " | " + "Teléfono: " + item.cliente_seguro_telefono  + " | " + "DPI:" + item.cliente_seguro_dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#seguro_carro_placa").getSelectedItemData().cliente_seguro_id;

                window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/"+selectedItemValue).trigger("click");

                // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#seguro_carro_placa").easyAutocomplete(options_seguro_carro_placa);

    var options_seguro_nombre = {

        url: "<?php echo base_url()?>Seguros/polizas_json",
        theme: "square",
        getValue: 'cliente_seguro_nombre',
        template: {
            type: "custom",
            method: function (value, item) {
                return "seguro_id: " + item.seguro_id + " | " + "No de poliza: " + item.seguro_no_poliza  + " | " + "No de placa: " + item.seguro_carro_placa + " | " + "Nombre:" + item.cliente_seguro_nombre   + " | " + "Teléfono: " + item.cliente_seguro_telefono  + " | " + "DPI:" + item.cliente_seguro_dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#seguro_nombre").getSelectedItemData().cliente_seguro_id;

                window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/"+selectedItemValue).trigger("click");

                // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#seguro_nombre").easyAutocomplete(options_seguro_nombre);

    var options_seguro_telefono = {

        url: "<?php echo base_url()?>Seguros/polizas_json",
        theme: "square",
        getValue: 'cliente_seguro_telefono',
        template: {
            type: "custom",
            method: function (value, item) {
                return "seguro_id: " + item.seguro_id + " | " + "No de poliza: " + item.seguro_no_poliza  + " | " + "No de placa: " + item.seguro_carro_placa + " | " + "Nombre:" + item.cliente_seguro_nombre   + " | " + "Teléfono: " + item.cliente_seguro_telefono  + " | " + "DPI:" + item.cliente_seguro_dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#seguro_telefono").getSelectedItemData().cliente_seguro_id;

                window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/"+selectedItemValue).trigger("click");

                // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#seguro_telefono").easyAutocomplete(options_seguro_telefono);

    var options_seguro_dpi = {

        url: "<?php echo base_url()?>Seguros/polizas_json",
        theme: "square",
        getValue: 'cliente_seguro_dpi',
        template: {
            type: "custom",
            method: function (value, item) {
                return "seguro_id: " + item.seguro_id + " | " + "No de poliza: " + item.seguro_no_poliza  + " | " + "No de placa: " + item.seguro_carro_placa + " | " + "Nombre:" + item.cliente_seguro_nombre   + " | " + "Teléfono: " + item.cliente_seguro_telefono  + " | " + "DPI:" + item.cliente_seguro_dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#seguro_dpi").getSelectedItemData().cliente_seguro_id;

                window.location.replace("<?php echo base_url()?>Seguros/perfil_cliente_seguro/"+selectedItemValue).trigger("click");

                // $("#seguro_no_poliza").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#seguro_dpi").easyAutocomplete(options_seguro_dpi);
</script>


<?php $this->stop() ?>
