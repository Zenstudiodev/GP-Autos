<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 14/09/2020
 * Time: 13:07
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

/*foreach ($predios->result() as $predio) {
    $predios_select_options[$predio->id_predio_virtual] = $predio->prv_nombre;
}*/

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
                        <?php
                        //print_contenido($datos_cliente);
                        //print_contenido($contratos);
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>Cliente</td>
                                <td>Tipo de documento</td>
                                <td>Nombre</td>
                                <td>Teléfono de casa </td>
                                <td>Teléfono de oficina </td>
                                <td>Celular </td>
                                <td>Celular 2</td>
                                <td>vip</td>
                                <td>Genero</td>
                                <td>Feccha de nacimiento</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $datos_cliente->client_id; ?></td>
                                <td><?php echo $datos_cliente->client_id_type; ?></td>
                                <td><?php echo $datos_cliente->name.' '; ?> <?php echo $datos_cliente->sname; ?></td>
                                <td><?php echo $datos_cliente->tel_res; ?></td>
                                <td><?php echo $datos_cliente->tel_office; ?></td>
                                <td><?php echo $datos_cliente->tel_mobile1; ?></td>
                                <td><?php echo $datos_cliente->tel_mobile2; ?></td>
                                <td><?php echo $datos_cliente->vip; ?></td>
                                <td><?php echo $datos_cliente->gender; ?></td>
                                <td><?php echo $datos_cliente->birthdate; ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h2>Contratos</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <!--<td>CORPORATIVO</td>-->
                                <!--<td>id</td>-->
                                <td>Contrato</td>
                                <td>Fecha de inicio</td>
                                <td>Fecha de fin</td>
                                <td>Estado</td>
                                <td>Acciones</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($contratos as $contrato) {
                                $contrato = (object)$contrato;
                                ?>

                                <tr>
                                   <!-- <td><?php /*echo $contrato->CORPORATIVO; */?></td>-->
                                    <!--<td><?php /*echo $contrato->id; */?></td>-->
                                    <td><?php echo $contrato->contract; ?></td>
                                    <td><?php echo $contrato->contract_start; ?></td>
                                    <td><?php echo $contrato->contract_end; ?></td>
                                    <td><?php echo $contrato->contract_status; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-danger baja_btn" id_contrato="<?php echo $contrato->contract; ?>">Dar de baja</a>
                                            <a class="btn btn-success" href="<?php echo base_url().'Admin/actualizar_contrato/'.$contrato->contract;?>">Actualizar</a>
                                        </div>


                                    </td>
                                </tr>

                                <?php //print_contenido($contrato); ?>
                            <?php } ?>
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
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<<!--script src="<?php /*echo base_url() */ ?>ui/admin/js/matrix.form_common.js"></script>-->

<script>



    $(document).ready(function () {

    });

    $(".baja_btn").click(function () {
        console.log($(this).attr('id_contrato'));



        //obtener datos

        contract = $(this).attr('id_contrato');



        cliente_data = {
            contract: contract,
        };
            console.log("form Submit");
            $("#form_contacto_alert").hide();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Admin/dar_baja_contrato_forcesos',
                data: cliente_data,
                beforeSend: function () {

                },
                success: function (data) {
                    respuesta = JSON.parse(data);
                    console.log(data);
                    console.log(respuesta);
                    location.reload();


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


        /**/
    });

</script>

<?php $this->stop() ?>


