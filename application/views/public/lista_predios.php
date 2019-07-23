<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);


?>
<?php $this->start('meta') ?>
    <!--Meta description Tags-->
    <title>Listado de predios - GP Autos </title>
<?php ?>


<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>
<?php $this->start('page_content') ?>
    <div class="divider"></div>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 m12">
                    <h1>Listado de Predios</h1>
                </div>
            </div>
            <?php if($predios_activos)?>

            <div class="row" id="lista_predios">
                <?php foreach ($predios_activos->result() as $predio){?>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <?php  if (file_exists('/home2/gpautos/public_html/ui/public/images/predio/' . $predio->prv_img)) { ?>
                                    <img src="<?php echo base_url().'ui/public/images/predio/'.$predio->prv_img?>"/>
                                <?php }else{ ?>
                                    <img src="<?php echo base_url().'ui/public/images/predio/nf.jpg'; ?>"/>
                                <?php }?>

                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title"><?php echo $predio->prv_nombre; ?></span>
                                <p><?php echo $predio->prv_nombre; ?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

<?php $this->stop() ?>

<?php $this->start('js_p') ?>

    <script type="text/javascript">
    </script>

<?php $this->stop() ?>