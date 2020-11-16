<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 14/09/2020
 * Time: 13:58
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$fecha_inicio = New DateTime($datos_de_contrato->contract_start);
$fecha_final = New DateTime($datos_de_contrato->contract_end);



$contract = array(
    'name' => 'contract',
    'id' => 'contract',
    'class' => 'form-control',
    'type' => 'text',
    'requiered' => 'requiered',
    'value'=>$datos_de_contrato->contract,
    'readonly' => 'readonly',
);
$contract_start = array(
    'name' => 'contract_start',
    'id' => 'contract_start',
    'class' => 'form-control',
    'type' => 'date',
    'requiered' => 'requiered',
    'pattern' => '\d{4}-\d{2}-\d{2}',
    'value'=>$fecha_inicio->format('Y-m-d')
);
$contract_status = array(
    'name' => 'contract_status',
    'id' => 'contract_status',
    'class' => 'form-control',
);
$contract_status_options = array(
    '1' => 'active',
    '0' => 'inactive',
);


$contract_end = array(
    'name' => 'contract_end',
    'id' => 'contract_end',
    'class' => 'form-control',
    'type' => 'date',
    'requiered' => 'requiered',
    'pattern' => '\d{4}-\d{2}-\d{2}',
    'value'=>$fecha_final->format('Y-m-d')
);
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!--<link rel="stylesheet" href="<?php /*echo base_url() */ ?>ui/admin/css/select2.css"/>-->
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
                        <h5>Datos del Usuario</h5>
                    </div>
                    <div class="widget-content ">
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert_error">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h2>Erorres</h2>
                            <div id="alert_error_content"></div>
                        </div>
                        <div class="alert alert-success alert-dismissible" role="alert" id="alert_ok">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h2>Exito</h2>
                            <div id="alert_ok_content"></div>
                        </div>
                        <?php
                        //print_contenido($datos_cliente);
                        //print_contenido($contratos);
                        ?>

                        <hr>
                        <h2>Contrato</h2>
                        <?php // print_contenido($datos_de_contrato);?>
                        <form action="<?php echo base_url() . 'admin/procesar_actualizar_forceos' ?>" method="post"
                              class="form-horizontal" id="datos_usuario_form">
                            <div class="form-group">
                                <label for="contract" class="col-md-2 control-label">Contract</label>
                                <div class="col-md-10">
                                    <?php echo form_input($contract); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contract_start" class="col-sm-2 control-label">Inicio de contrato</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($contract_start); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contract_end" class="col-sm-2 control-label">Fin de contrato</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($contract_end); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_id_type" class="col-sm-2 control-label">Client id type</label>
                                <div class="col-sm-10">
                                    <?php
                                    if($datos_de_contrato->contract_status == 'active'){
                                        $contract_status_val = "1";
                                    }
                                    if($datos_de_contrato->contract_status == 'inactive'){
                                        $contract_status_val = "0";
                                    }
                                    ?>

                                    <?php echo form_dropdown($contract_status, $contract_status_options, $contract_status_val) ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-success" id="actualizar_contrato">Save</button>
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
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<<!--script src="<?php /*echo base_url() */ ?>ui/admin/js/matrix.form_common.js"></script>-->

<script>


    var contract;
    var contract_start;
    var contract_end;
    var contract_status;

    $(document).ready(function () {
        $("#alert_error").hide();
        $("#alert_ok").hide();

    });
    $("#actualizar_contrato").click(function () {
        $("#alert_error").hide();
        $("#alert_ok").hide();


        //obtener datos

        contract = $("#contract").val();
        contract_start = $("#contract_start").val();
        contract_end = $("#contract_end").val();
        contract_status = $("#contract_status").val();



        cliente_data = {
            contract: contract,
            contract_start: contract_start,
            contract_end: contract_end,
            contract_status: contract_status,
        };

        if ($("#datos_usuario_form")[0].checkValidity()) {
            console.log("form Submit");
            $("#form_contacto_alert").hide();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Admin/procesar_actualizar_forceos',
                data: cliente_data,
                beforeSend: function () {

                },
                success: function (data) {
                    respuesta = JSON.parse(data);
                    console.log(data);
                    console.log(respuesta);


                    //mostrar errores
                    if (respuesta.errors) {
                        console.log('mostrar errores');
                        console.log(respuesta.errors);
                        $("#alert_error_content").html('');
                        $("#alert_error").show();
                        $.each(respuesta.errors, function (key, error) {
                            $("#alert_error_content").append('<h3>' + key + '</h3>');
                            $("#alert_error_content").append('<p>' + error + '</p>');
                            //console.log(key);
                            //console.log(error);
                        });
                    }

                    //mostrar datos de transacción
                    if (respuesta.contract) {
                        console.log('se creo el cliente o contrato');
                        $("#alert_ok_content").html('');
                        $("#alert_ok").show();
                        $("#alert_ok_content").append('<p>Contrato: id' + respuesta.contract.id + '</p>');
                        $("#alert_ok_content").append('<p>Transaccion: id' + respuesta.transaction_id + '</p>');
                    }
                }
            });
        } else {
            $("#form_contacto_alert").fadeIn(1000);
        }

        /**/
    });
</script>

<?php $this->stop() ?>

?>