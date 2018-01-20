<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master');

$data_carro = $carro->row();

//print_r($carro);


?>

<?php $this->start('inner_top') ?>
<div id="inner_top">

</div>
<?php $this->stop() ?>
<?php $this->start('page_content') ?>

<div class="container">
    <?php
    if (isset($data_carro))
    { ?>


    <div class="d-flex justify-content-end">
        <div class="mr-auto p-2">
            <h1><?php echo $data_carro->id_marca . ' - ' . $data_carro->id_linea; ?></h1>
        </div>
        <div class="p-2">
            <h2 class="texto_naranja">
                <?php mostrar_precio_carro($data_carro->crr_precio, $data_carro->crr_moneda_precio); ?>
            </h2>
        </div>
    </div>
    <!--TODO BOTONES PARA ACCIONES -->
    <div class="d-flex justify-content-around bd-highlight example-parent">
        <div class="p-2 bd-highlight col-example">
            <a class="btn btn-default"><i class="fa fa-info left"></i> Pedir información</a>
        </div>
        <div class="p-2 bd-highlight col-example">
            <a class="btn btn-default"><i class="fa fa-calendar left"></i> Solicitar cita</a>
        </div>
        <div class="p-2 bd-highlight col-example">
            <a class="btn btn-default"><i class="fa fa-share left"></i> Compartir</a>
        </div>
        <div class="p-2 bd-highlight col-example">
            <a class="btn btn-default"><i class="fa fa-filter left"></i> Comparar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (1).jpg' ?>" alt="First slide" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (2).jpg' ?>" alt="Second slide" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (3).jpg' ?>" alt="Third slide" class="img-fluid">
                    </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (1).jpg' ?>" class="img-fluid"></li>
                    <li data-target="#carousel-thumb" data-slide-to="1"><img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (2).jpg' ?>" class="img-fluid"></li>
                    <li data-target="#carousel-thumb" data-slide-to="2"><img src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $data_carro->crr_codigo . ' (3).jpg' ?>" class="img-fluid"></li>
                </ol>
            </div>
            <!--/.Carousel Wrapper-->
        </div>
        <div class="col-md-7">
            <!--Panel-->
            <div class="card">
                <h3 class="card-header warning-color-dark white-text">Datos del vehiculo</h3>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Marca: </span><span class="text-right"><?php echo $data_carro->id_marca?></span> </li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Línea: </span><?php echo $data_carro->id_linea?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Modelo: </span><?php echo $data_carro->crr_modelo?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Tipo: </span><?php echo $data_carro->id_tipo_carro?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Motor: </span><?php echo $data_carro->crr_motor?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Kilometraje: </span><?php echo $data_carro->crr_kilometraje?></li>

                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Color: </span><?php echo $data_carro->crr_color?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Tapiceria: </span><?php echo $data_carro->crr_tapiceria?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Transmisión: </span><?php echo $data_carro->crr_transmision?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Puertas: </span><?php echo $data_carro->crr_puertas?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Origen: </span><?php echo $data_carro->crr_origen?></li>
                                <li class="list-group-item"><span class="detalle_item_titulo badge badge-info">Compuestible: </span><?php echo $data_carro->crr_combustible?></li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
            <!--/.Panel-->
        </div>
    </div>

</div>


<?php }
?>

<?php $this->stop() ?>
