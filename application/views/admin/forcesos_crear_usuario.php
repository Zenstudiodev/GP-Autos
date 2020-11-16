<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 31/08/2020
 * Time: 11:45
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//predios
$predios_select = array(
    'name' => 'predio',
    'id' => 'predio',
);
$predios_select_options = array();

foreach ($predios->result() as $predio) {
    $predios_select_options[$predio->id_predio_virtual] = $predio->prv_nombre;
}


//campos

$contract = array(
    'name' => 'contract',
    'id' => 'contract',
    'class' => 'form-control',
    'type' => 'text',
    'requiered' => 'requiered',
);
$client_id = array(
    'name' => 'client_id',
    'id' => 'client_id',
    'class' => 'form-control',
    'type' => 'text',
    'requiered' => 'requiered',
);
$client_id_type = array(
    'name' => 'client_id_type',
    'id' => 'client_id_type',
    'class' => 'form-control',
);
$client_id_type_options = array(
    'ced' => 'ced',
    'pas' => 'pas',
    'ruc' => 'ruc',
);
$name = array(
    'name' => 'name',
    'id' => 'name',
    'class' => 'form-control',
    'type' => 'text',
    'requiered' => 'requiered',
);
$sname = array(
    'name' => 'sname',
    'id' => 'sname',
    'class' => 'form-control',
    'type' => 'text',
    'requiered' => 'requiered',
);

$gender = array(
    'name' => 'gender',
    'id' => 'gender',
    'class' => 'form-control',
);
$gender_options = array(
    'f' => 'f',
    'm' => 'm',
);

$birthdate = array(
    'name' => 'birthdate',
    'id' => 'birthdate',
    'class' => 'form-control',
    'type' => 'date',
    'requiered' => 'requiered',
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'type' => 'email',
    'requiered' => 'requiered',
);
$tel_res = array(
    'name' => 'tel_res',
    'id' => 'tel_res',
    'class' => 'form-control',
    'type' => 'number',
    'requiered' => 'requiered',
);

$tel_office = array(
    'name' => 'tel_office',
    'id' => 'tel_office',
    'class' => 'form-control',
    'type' => 'number',
    'requiered' => 'requiered',
);
$tel_mobile1 = array(
    'name' => 'tel_mobile1',
    'id' => 'tel_mobile1',
    'class' => 'form-control',
    'type' => 'number',
    'requiered' => 'requiered',
);
$tel_mobile2 = array(
    'name' => 'tel_mobile2',
    'id' => 'tel_mobile2',
    'class' => 'form-control',
    'type' => 'number',
    'requiered' => 'requiered',
);
$tel_mobile2 = array(
    'name' => 'tel_mobile2',
    'id' => 'tel_mobile2',
    'class' => 'form-control',
    'type' => 'number',
    'requiered' => 'requiered',
);
$vip = array(
    'name' => 'vip',
    'id' => 'vip',
    'class' => 'form-control',
);
$vip_options = array(
    '1' => 'Si',
    '0' => 'No',
);
$contract_start = array(
    'name' => 'contract_start',
    'id' => 'contract_start',
    'class' => 'form-control',
    'type' => 'date',
    'requiered' => 'requiered',
    'pattern' => '\d{4}-\d{2}-\d{2}',
);
$contract_end = array(
    'name' => 'contract_end',
    'id' => 'contract_end',
    'class' => 'form-control',
    'type' => 'date',
    'requiered' => 'requiered',
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


                        <form action="<?php echo base_url() . 'admin/procesar_forceos' ?>" method="post"
                              class="form-horizontal" id="datos_usuario_form">
                            <div class="form-group">
                                <label for="contract" class="col-md-2 control-label">Contrato</label>
                                <div class="col-md-10">
                                    <?php echo form_input($contract); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_id" class="col-sm-2 control-label">Cliente </label>
                                <div class="col-sm-10">
                                    <?php echo form_input($client_id); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_id_type" class="col-sm-2 control-label">Tipo de documento</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown($client_id_type, $client_id_type_options) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($name); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sname" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($sname); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client_id_type" class="col-sm-2 control-label">Género</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown($gender, $gender_options) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="col-sm-2 control-label">Fecha de nacimiento</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($birthdate); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($email); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel_res" class="col-sm-2 control-label">Teléfono de casa</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($tel_res); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel_office" class="col-sm-2 control-label">Teléfono de oficina</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($tel_office); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel_mobile1" class="col-sm-2 control-label">Teléfono móvil</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($tel_mobile1); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel_mobile2" class="col-sm-2 control-label">Teléfono móvil 2</label>
                                <div class="col-sm-10">
                                    <?php echo form_input($tel_mobile2); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vip" class="col-sm-2 control-label">VIP</label>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown($vip, $vip_options) ?>
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


                            <div class="form-actions">
                                <button type="button" class="btn btn-success" id="guardar_usuario">Save</button>
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
    var client_id;
    var client_id_type;
    var name;
    var sname;
    var email;
    var contract;
    var contract_start;
    var contract_end;
    var gender;
    var birthdate;
    var tel_mobile1;
    var tel_mobil2;
    var tel_res;
    var tel_office;


    $(document).ready(function () {
        $("#alert_error").hide();
        $("#alert_ok").hide();
    });


    $("#guardar_usuario").click(function () {
        $("#alert_error").hide();
        $("#alert_ok").hide();


        //obtener datos
        client_id = $("#client_id").val();
        client_id_type = $("#client_id_type").val();
        name = $("#name").val();
        sname = $("#sname").val();
        email = $("#email").val();
        contract = $("#contract").val();
        contract_start = $("#contract_start").val();
        contract_end = $("#contract_end").val();
        gender = $("#gender option:selected" ).text();
        birthdate = $("#birthdate").val();
        tel_mobile1 = $("#tel_mobile1").val();
        tel_mobil2 = $("#tel_mobil2").val();
        tel_res = $("#tel_res").val();
        tel_office = $("#tel_office").val();


        cliente_data = {
            client_id: client_id,
            client_id_type: client_id_type,
            name: name,
            sname: sname,
            email: email,
            contract: contract,
            contract_start: contract_start,
            contract_end: contract_end,
            gender: gender,
            birthdate: birthdate,
            tel_mobile1: tel_mobile1,
            tel_mobil2: tel_mobil2,
            tel_res: tel_res,
            tel_office: tel_office
        };

        if ($("#datos_usuario_form")[0].checkValidity()) {
            console.log("form Submit");
            $("#form_contacto_alert").hide();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Admin/procesar_forceos',
                data: cliente_data,
                beforeSend: function () {

                },
                success: function (data) {
                    console.log(data);
                    respuesta = JSON.parse(data);
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
                    if (respuesta.client) {
                        console.log('se creo el cliente o contrato');
                        $("#alert_ok_content").html('');
                        $("#alert_ok").show();
                        $("#alert_ok_content").append('<p>Cliente: id' + respuesta.client.id + '</p>');
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

