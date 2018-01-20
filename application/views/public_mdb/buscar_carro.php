<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master');

?>

<?php $this->start('css_p') ?>

<?php $this->stop() ?>

<?php $this->start('inner_top') ?>
<div id="inner_top">

</div>
<?php $this->stop() ?>
<?php $this->start('page_content') ?>






<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<div class="container">
    <?php if ($carros){ ?>
    <div class="well well-sm">
        <strong>Display</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                        class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    <div id="products" class="row list-group">
        <?php
        foreach ($carros->result() as $carro)
        { ?>

            <div class="item  col-4">
                <div class="thumbnail">
                    <div class="buscar_img_mask" >
                    <img class="group list-group-image"
                         src="<?php echo 'http://www.gpautos.net//web/images_cont/' . $carro->crr_codigo . ' (1).jpg' ?>"
                         alt="<?php echo $carro->id_marca.' | '.$carro->id_linea; ?>" />
                    </div>
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <?php echo $carro->id_marca.' | '.$carro->id_linea; ?></h4>
                        <p class="group inner list-group-item-text">
                            <?php echo $carro->id_linea; ?>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <p class="lead">
                                    <?php if ($carro->crr_moneda_precio == '$') {
                                        setlocale(LC_MONETARY, "en_US");
                                    } else {
                                        setlocale(LC_MONETARY, "es_GT");
                                    }
                                    ?>
                                    <?php echo mostrar_precio_carro($carro->crr_precio, $carro->crr_moneda_precio); ?>
                                </p>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-success" href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->crr_codigo ?>">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
    <?php } else{?>
    <blockquote class="blockquote bq-danger">
        <p class="bq-title">Nohay resultados</p>
        <p>No hay ningun vehiculo con los crirterios de su busqueda</p>
    </blockquote>
    <?php }?>
</div>
<?php $this->stop() ?>

<!-- JS personalizado -->
<?php $this->start('js_p') ?>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<script>
    $(document).ready(function () {
        $('#list').click(function (event) {
            event.preventDefault();
            $('#products .item').addClass('list-group-item');
            $('.buscar_img_mask').addClass('buscar_img_mask_list');

        });
        $('#grid').click(function (event) {
            event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
            $('.buscar_img_mask').removeClass('buscar_img_mask_list');
        });
    });
</script>
<?php $this->stop() ?>


