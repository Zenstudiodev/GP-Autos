<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/05/2018
 * Time: 12:01 PM
 */

?>
<?php $this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$carro = $carro->row();
if($usuario){
    $usuario = $usuario->row();
}

?>
<?php $this->start('css_p') ?>
    <!--cargamos css personalizado-->

    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/colorpicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/bootstrap-wysihtml5.css"/>
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
                            <h5>Información del carro</h5>
                        </div>
                        <!--<pre>
                            <?php /*print_r($carro); */ ?>
                        </pre>-->
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                            href="#">×</a>
                                <h4 class="alert-heading">Acción exitosa!</h4>
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                        <div class="widget-content ">
                            <?php if($usuario){?>
                            <div class="row">
                                <div class="col-md-10">
                                    <h3><?php echo $usuario->first_name.' '.$usuario->last_name; ?></h3>
                                    <p>Teléfono: <?php echo $usuario->phone; ?></p>
                                    <p>Correo: <?php echo $usuario->email; ?></p>
                                </div>
                            </div>
                            <?php }?>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?php echo base_url() ?>index.php/admin/actualizar_carro"
                                          method="post"
                                          class="">
                                        <?php echo form_hidden('carro_id', $carro->id_carro); ?>
                                        <div class="container-fluid">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Información</th>
                                                    <th>Contenido</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Id Cliente</td>
                                                    <td><?php echo $carro->user_id ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Id Cliente predio</td>
                                                    <td><a href="<?php echo base_url().'admin/editar_usuario/'.$carro->predio_user_id?>" target="_blank"><?php echo $carro->predio_user_id ?></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Fecha de creación</td>
                                                    <td><?php echo $carro->crr_fecha ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Placa</td>
                                                    <td><?php echo $carro->crr_placa ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tipo</td>
                                                    <td><?php echo $carro->id_tipo_carro ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Marca</td>
                                                    <td><?php echo $carro->id_marca ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Linea</td>
                                                    <td><?php echo $carro->id_linea ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ubicación</td>
                                                    <td><?php echo $carro->id_ubicacion ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Moneda</td>
                                                    <td><?php echo $carro->crr_moneda_precio ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Precio</td>
                                                    <td><?php echo $carro->crr_precio ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Modelo</td>
                                                    <td><?php echo $carro->crr_modelo ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Origen</td>
                                                    <td><?php echo $carro->crr_origen ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Aire acondicionado</td>
                                                    <td><?php echo $carro->crr_ac ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alarma</td>
                                                    <td><?php echo $carro->crr_alarma ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Aros de magnesio</td>
                                                    <td><?php echo $carro->crr_aros_magnecio ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Bolsa de aire</td>
                                                    <td><?php echo $carro->crr_bolsas_aire ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cerradura central</td>
                                                    <td><?php echo $carro->crr_cerradura_central ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cilindros</td>
                                                    <td><?php echo $carro->crr_cilindros ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Color</td>
                                                    <td><?php echo $carro->crr_color ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Combustible</td>
                                                    <td><?php echo $carro->crr_combustible ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Espejos</td>
                                                    <td><?php echo $carro->crr_espejos ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kilometraje</td>
                                                    <td><?php echo $carro->crr_kilometraje ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Motor</td>
                                                    <td><?php echo $carro->crr_motor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Platos</td>
                                                    <td><?php echo $carro->crr_platos ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Polarizado</td>
                                                    <td><?php echo $carro->crr_polarizado ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Puertas</td>
                                                    <td><?php echo $carro->crr_puertas ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Radio</td>
                                                    <td><?php echo $carro->crr_radio ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sun Roof</td>
                                                    <td><?php echo $carro->crr_sunroof ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tapiceria</td>
                                                    <td><?php echo $carro->crr_tapiceria ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Timon Hidraulico</td>
                                                    <td><?php echo $carro->crr_timon_hidraulico ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transmisión</td>
                                                    <td><?php echo $carro->crr_transmision ?></td>
                                                </tr>
                                                <tr>
                                                    <td>4 X 4</td>
                                                    <td><?php echo $carro->crr_4x4 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Vidrios electricos</td>
                                                    <td><?php echo $carro->crr_vidrios_electricos ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Freno delantero</td>
                                                    <td><?php echo $carro->crr_freno_delantero ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Freno Trasero</td>
                                                    <td><?php echo $carro->crr_freno_trasero ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Blindaje</td>
                                                    <td><?php echo $carro->crr_blindaje ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tele</td>
                                                    <td><?php echo $carro->crr_blindaje ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Blindaje</td>
                                                    <td><?php echo $carro->crr_blindaje ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Blindaje</td>
                                                    <td><?php echo $carro->crr_blindaje ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Predio</td>
                                                    <td><?php echo $carro->id_predio_virtual ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (1).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (1).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/1'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (2).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (2).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/2'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (3).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (3).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/3'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (4).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (4).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/4'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (5).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (5).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/5'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (6).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (6).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/6'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (7).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (7).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/7'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (8).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (8).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/8'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (9).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (9).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/9'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro->id_carro . ' (10).jpg')) { ?>
                                                <img src="<?php echo 'http://gpautos.net/web/images_cont/' . $carro->id_carro . ' (10).jpg' ?>"
                                                     class="img-responsive">
                                                <a href="<?php echo base_url().'admin/borrar_imagen/'.$carro->id_carro.'/10'?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </a>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($pagos_carro) { ?>
                                        <div class="widget-box">
                                            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                                                <h5>Pagos</h5>
                                            </div>
                                            <div class="widget-content nopadding">

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" cellspacing="0"
                                                           width="100%" id="tabla_carros">
                                                        <thead>
                                                        <tr>
                                                            <th>fecha</th>
                                                            <th>user_id</th>
                                                            <th>carro_id</th>
                                                            <th>metodo</th>
                                                            <th>banco</th>
                                                            <th>direccion</th>
                                                            <th>boleta</th>
                                                            <th>monto</th>
                                                            <th>telefono</th>
                                                            <th>estado</th>
                                                            <th>accion</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                        foreach ($pagos_carro->result() as $pago) {
                                                            ?>
                                                            <tr class="gradeX">
                                                                <td><?php echo $pago->fecha ?></td>
                                                                <td><?php echo $pago->user_id ?></td>
                                                                <td> <?php echo $pago->carro_id ?></td>
                                                                <td> <?php echo $pago->metodo ?></td>
                                                                <td> <?php echo $pago->banco ?></td>
                                                                <td> <?php echo $pago->direccion ?></td>
                                                                <td> <?php echo $pago->boleta ?></td>
                                                                <td> <?php echo $pago->monto ?></td>
                                                                <td> <?php echo $pago->telefono ?></td>
                                                                <td> <?php echo $pago->estado ?></td>
                                                                <td> <a class="btn btn-success" href="<?php echo base_url().'Pago/verificar_pago/'.$pago->pago_id?>">verificar pago</a></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        echo 'Aun no hay pagos';
                                    } ?>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <a class="btn btn-info" href="<?php echo base_url().'admin/editarCarro/'.$carro->id_carro?>">Editar</a>
                                    <a class="btn btn-success" href="<?php echo base_url().'admin/activar_carro_btn/'.$carro->id_carro?>"> Publicar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
    <script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
    <!--<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
    <script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>-->
    <script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/jquery.peity.min.js"></script>
    <script src="<?php echo base_url() ?>ui/admin/js/bootstrap-wysihtml5.js"></script>


    </script>
<?php $this->stop() ?>