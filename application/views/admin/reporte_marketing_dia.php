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
                <h1>Números Agregados</h1>
                <?php
                if($numeros_agregados_flor){ ?>

                <?php } ?>
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

