<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 14/09/2020
 * Time: 8:08
 */
header("Access-Control-Allow-Origin: *");
$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


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
                        <a class="btn btn-success" href="<?echo base_url();?>admin/forcesos_crear_usuario">
                            Crear Cliente
                        </a>
                        <table class="table  table-bordered" id="clientes_table">
                            <thead>
                            <tr>
                                <th>client_id</th>
                                <th>client_id_type</th>
                                <!--<th>gender</th>-->
                                <th>name</th>
                                <th>tel_mobile1</th>
                                <th>tel_mobile2</th>
                                <th>tel_office</th>
                                <th>tel_res</th>
                                <th>vip</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="clientes_data">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<!--<script src="<?php /*echo base_url() */ ?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--script src="<?php /*echo base_url() */ ?>ui/admin/js/matrix.form_common.js"></script>-->
<script>
    var datos;
    var settings = {
        "url": "https://gpautos.net/admin/get_contratos_forceos",
        "method": "GET",
    };


    $.ajax(settings).done(function (response) {
        //console.log(response);
        response = JSON.parse(response);
        //console.log(response);
        datos = response.data;
        //console.log(datos);
        $.each(datos, function (key, clientes) {


            var datos_cliente = '<tr>';
            datos_cliente += '<td>' + clientes.client_id + '</td>';
            datos_cliente += '<td>' + clientes.client_id_type + '</td>';
            //datos_cliente += '<td>' + clientes.gender + '</td>';
            datos_cliente += '<td>' + clientes.name + ' ' + clientes.sname + '</td>';
            datos_cliente += '<td>' + clientes.tel_mobile1 + '</td>';
            datos_cliente += '<td>' + clientes.tel_mobile2 + '</td>';
            datos_cliente += '<td>' + clientes.tel_office + '</td>';
            datos_cliente += '<td>' + clientes.tel_res + '</td>';
            datos_cliente += '<td>' + clientes.vip + '</td>';
            datos_cliente += '<td><a class="btn btn-success" href="<?php echo base_url();?>admin/detalle_cliente_forcesos/'+clientes.client_id+'">Ver detalle cliente</a> ';
            datos_cliente += '</tr>';
            datos_cliente += '<tr>';
            //contratos
            /*datos_cliente += '<td colspan="10">';
            datos_cliente += '<table class="table table-bordered">';
            datos_cliente += '<tr>';
            datos_cliente += '<td colspan="3"></td>';
            datos_cliente += '<td>contratos</td>';
            datos_cliente += '<td>CORPORATIVO: ' + clientes.contracts[0]['CORPORATIVO'] + '</td>';
            datos_cliente += '<td>contract: ' + clientes.contracts[0]['contract'] + '</td>';
            datos_cliente += '<td>contract_start: ' + clientes.contracts[0]['contract_start'] + '</td>';
            datos_cliente += '<td>contract_end: ' + clientes.contracts[0]['contract_end'] + '</td>';
            datos_cliente += '<td>contract_status: ' + clientes.contracts[0]['contract_status'] + '</td>';
            datos_cliente += '<td>id: ' + clientes.contracts[0]['id'] + '</td>';
            datos_cliente += '<td><a class="btn btn-danger">Dar de baja contrato</a><a class="btn btn-success">Actualizar contrato</a> ';
            datos_cliente += '</tr>';
            datos_cliente += '</table>';

            datos_cliente += '</td>';
            */
            //end contratos


            datos_cliente += '</tr>';


            $("#clientes_data").append(datos_cliente);


            //console.log( key);
            console.log(clientes.contracts[0]);
            // console.log( clientes.contracts[0]['CORPORATIVO']);
        });

    });


    $(document).ready(function () {
        console.log("ready!");

    });
</script>


<?php $this->stop() ?>
