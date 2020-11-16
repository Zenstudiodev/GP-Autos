<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 02/03/2019
 * Time: 11:23 AM
 */
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
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <?php if ($usuarios_marketing) { ?>
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Fechas del reporte</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="control-group">
                                                <label class="control-label">DE:</label>
                                                <div class="controls">
                                                    <input type="text" data-date="<?php echo $de;?>"
                                                           data-date-format="yyyy-mm-dd" value="<?php echo $de;?>"
                                                           class="datepicker span6" id="input_de">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group">
                                                <label class="control-label">A:</label>
                                                <div class="controls">
                                                    <input type="text" data-date="<?php echo $a;?>"
                                                           data-date-format="yyyy-mm-dd" value="<?php echo $a;?>"
                                                           class="datepicker span6" id="input_a">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-success" role="button" id="btn_fitrar">Filtrar</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                            <h5>Usuarios marketing</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <ul class="recent-posts">
                            <?php

                            foreach ($usuarios_marketing->result() as $usuario)
                            {
                               ?>
                                <li>
                                    <div class="article-post">
                                        <!--<div class="fr">
                                            <a href="#" class="btn btn-primary btn-mini">Edit</a>
                                            <a href="#" class="btn btn-success btn-mini">Publish</a>
                                            <a href="#" class="btn btn-danger btn-mini">Delete</a>
                                        </div>
                                        -->
                                        <span class="user-info"> <?php echo $usuario->nombre?></span>
                                        <hr>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>Numeros agregados: </td>
                                                    <td>
                                                        <?php
                                                        echo numeros_agregados_reporte($usuario->id, $de, $a);
                                                        ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Numeros bajados: </td>
                                                    <td>
                                                        <?php
                                                        echo numeros_bajados_reporte($usuario->id, $de, $a);
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Seguimientos:</td>
                                                    <td>
                                                        <?php
                                                        echo numeros_seguimientos_reporte($usuario->id, $de, $a);
                                                        ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </li>

                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                            <h5>Desglose</h5>
                        </div>
                        <div class="widget-content nopadding">
                                <div class="box-body">
                                    <?php
                                    if (isset($de)) {
                                        //fecha de inicio
                                        $fecha_inicio = New DateTime($de);
                                        $fecha_inicio_t = New DateTime($de);
                                        //fecha final
                                        $fecha_final = New DateTime($a);
                                    } else {
                                        $fecha = New DateTime();
                                        $mes = $fecha->format('m');
                                        $year = $fecha->format('Y');
                                        $inicio_mes = $year . '-' . $mes . '-' . '01';
                                        $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                        $fecha_inicio = new  DateTime($inicio_mes);
                                        $fecha_inicio_t = new  DateTime($inicio_mes);
                                        $fecha_final = New DateTime($fin_mes);
                                    }

                                    //diferencia de dias
                                    $diferencia = $fecha_inicio->diff($fecha_final);
                                    //echo $diferencia->format('%a días');
                                    //pasmos el dato de diferencia a numero
                                    $diferencia_numero = $diferencia->format('%a');
                                    //ajustamos para cubrir todos los dias
                                    $diferencia_numero = $diferencia_numero + 1;
                                    //echo $diferencia_numero;

                                    ?>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2">Día</th>
                                                        <th colspan="4">transacciones</th>
                                                    </tr>
                                                    <tr>
                                                        <th>nombre</th>
                                                        <th>Numeros agregados:</th>
                                                        <th>Numeros bajados:</th>
                                                        <th>Seguimientos:</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    $i = 0; //delcaramos el puntero

                                                    //definimos los totales globales
                                                    $total_deposito_periodo = 0;
                                                    do {
                                                        ?>
                                                        <tr>
                                                            <td><a href="<?php echo base_url().'admin/reporte_marketing_desglose_dia/78/'.$fecha_inicio->format('Y-m-d');  ?>" target="_blank"><?php echo $fecha_inicio->format('Y-m-d'); ?></a></td>
                                                            <?php
                                                            //loop de numeros
                                                            ?>
                                                            <td colspan="6">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td>Nombre</td>
                                                                        <td>agregado </td>
                                                                        <td>bajado</td>
                                                                        <td>seguimiento</td>
                                                                    </tr>
                                                                    <tr>
                                                                       <td>Marketing 1</td>
                                                                       <td><?php echo numeros_agregados_reporte('78', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                       <td><?php echo numeros_bajados_reporte('78', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                       <td><?php echo numeros_seguimientos_reporte('78', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                   </tr>
                                                                    <tr>
                                                                        <td>michelle</td>
                                                                        <td><?php echo numeros_agregados_reporte('10', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                        <td><?php echo numeros_bajados_reporte('10', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                        <td><?php echo numeros_seguimientos_reporte('10', $fecha_inicio->format('Y-m-d'), $fecha_inicio->format('Y-m-d')); ?> </td>
                                                                    </tr>


                                                                    <?php if (false) {
                                                                        foreach ($deposito_dia->result() as $deposito) {
                                                                            $vinsanet_total_dia = $vinsanet_total_dia + $deposito->monto;
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo 1?></td>
                                                                                <td><?php echo 1 ?></td>
                                                                                <td><?php echo 1 ?></td>
                                                                                <td><?php echo 1 ?></td>
                                                                                <td><?php echo 1?></td>
                                                                                <td><?php echo 1; ?></td>
                                                                            </tr>
                                                                        <?php }
                                                                        $total_deposito_periodo = $total_deposito_periodo + $vinsanet_total_dia;
                                                                    } ?>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        //modificamos puntero despues de ejecucion
                                                        $i = $i + 1;
                                                        //modificamos fecha despues de ejecucion
                                                        $fecha_inicio->modify('+1 day');
                                                    } while ($i < $diferencia_numero);
                                                    ?>

                                                    <tr>
                                                        <td>totales</td>
                                                        <td colspan="3">Total deposito</td>
                                                    </tr>
                                                    <tr>
                                                        <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                            <br>
                                                            a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                        </td>
                                                        <td colspan="4"><?php echo 'Q.' ; ?></td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo 'Aun no hay usuarios';
                } ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php echo base_url() ?>/ui/admin/js/matrix.tables.js"></script>-->


<script>
var de;
var a;
var direccion;
    $("#btn_fitrar").click(function () {
        event.preventDefault();
      de = $("#input_de").val();
      a = $("#input_a").val();
      direccion = '<?php echo base_url()?>admin/reporte_marketing/'+de+'/'+a;
      console.log(direccion);
        window.location.assign(direccion);
    });

    $(document).ready(function () {
        $('.datepicker').datepicker();
    });

    //------------- Datepicker -------------//
    if ($('#datepicker').length) {
        $("#datepicker").datepicker({
            showOtherMonths: true
        });
    }
    if ($('#datepicker-inline').length) {
        $('#datepicker-inline').datepicker({
            inline: true,
            showOtherMonths: true
        });
    }
</script>
<?php $this->stop() ?>

