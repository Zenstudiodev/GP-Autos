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
                                <li>
                                    <button class="btn btn-warning btn-mini">View All</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                } else {
                    echo 'Aun no hay prospectos';
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

