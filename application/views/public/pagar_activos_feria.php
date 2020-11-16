<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 03/11/2020
 * Time: 11:00
 */

?>
<?php $this->layout('public/public_master_cliente', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);
$usuario = $datos_usuario->row();


$CI =& get_instance();
?>
<?php $this->start('title') ?>
<title>Perfil</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>
<?php $this->start('page_content') ?>
<div class="divider"></div>
<!--<pre>
<?php /*print_r($datos_usuario->row());*/ ?>
</pre>-->
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m3">
                    <!-- Profile About  -->
                    <div class="card cyan">
                        <div class="card-content white-text">
                            <span class="card-title"><?php echo $usuario->first_name . ' ' . $usuario->last_name ?></span>
                        </div>
                    </div>
                    <!-- Profile About  -->
                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">

                                <p>
                                    <span class="badge green">
                                        <?php
                                        if ($carros) {
                                            echo $carros->num_rows();
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </span>
                                    <i class="material-icons left">directions_car</i> Carros en el sistema</p>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->
                </div>
                <!-- profile-page-sidebar-->
                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m9">
                    <a class="waves-effect waves-light btn orange darken-1" href="<?php echo base_url()?>cliente/seleccion_anuncio"><i
                            class="material-icons left">cloud</i>Publicar un carro</a>

                    <h1 class="texto_naranja">Feria</h1>
                    <form method="post" action="<?php echo base_url()?>carro/procesar_pago_feria_activos/" >


                    <div class="row">
                        <div class="col m8 s8">
                            <div class="row">
                                <ul class="collection">



                                <?php
                                if ($carros) {
                                    $cardCount = 0;

                                    foreach ($carros->result() as $carro) {
                                        $cardCount++
                                        ?>

                                        <li class="collection-item">

                                                <?php echo substr($carro->id_marca, 0, 9); ?> <?php echo substr($carro->id_linea, 0, 12); ?>
                                            - <?php echo $carro->crr_modelo ?> (<a href="<?php echo base_url() . 'index.php/Carro/ver/' . $carro->id_carro ?>">
                                                <?php echo $carro->id_carro ?>
                                            </a> )
                                            <br><small>precio: Q.<?php echo $carro->crr_precio ?> </small>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <?php
                                                    //print_contenido($carro);

                                                    $precio_carro = $carro->crr_precio;
                                                    ?>


                                                    <input placeholder="Q" id="precio_feria_<?php echo $carro->id_carro ?>" name="precio_feria_<?php echo $carro->id_carro ?>" type="number" step="any" class="validate precio_feria_input" max="<?php echo $precio_carro?>">
                                                    <label for="first_name">precio para feria</label>
                                                </div>

                                                <input type="checkbox" id="r_<?php echo $carro->id_carro ?>" name="r_<?php echo $carro->id_carro ?>" class="check_carro_activo_feria" value="<?php echo $carro->id_carro ?>"/>
                                                <label for="r_<?php echo $carro->id_carro ?>"></label>
                                            </div>
                                        </li>
                                    <?php }
                                } else {
                                    echo 'aun no hay carros';
                                } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col m4 s4">
                            <ul class="collection with-header">
                                <li class="collection-header">
                                    <h4>
                                    Carros para feria
                                    </h4>
                                </li>
                                <li class="collection-item">Número de carros <span id="numero_de_carros" class="badge orange"></span></li>
                                <li class="collection-item">Total: <span id="total_feria"></span> </li>
                                <li class="collection-item" id="pago_btn_intem">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </li>
                            </ul>

                        </div>
                    </div>
                    </form>
                </div>
                <!--/ profile-page-wall -->
            </div>
        </div>
    </section>
    <?php
} else {
    echo 'Aun no hay prospectos';
} ?>
<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>
<script>
    var total_a_pagar_carro_feria;
    var numero_de_carros_feria;


    // A $( document ).ready() block.
    $( document ).ready(function() {
        $('#pago_btn_intem').hide();
    });

    $( ".check_carro_activo_feria" ).change(function() {
        total_a_pagar_carro_feria = 0;
        numero_de_carros_feria =0;
        $('#pago_btn_intem').hide();
        $('input').each(function(){
            $(this).removeAttr('required');
        });
        $('.check_carro_activo_feria:checked').each(
            function() {
                console.log("Se suma un acrro al total de feria");
                total_a_pagar_carro_feria = total_a_pagar_carro_feria +50;
                numero_de_carros_feria = numero_de_carros_feria +1;

                $(this).parent().find('input').attr('required', 'required');

            });


        if(numero_de_carros_feria >= 1){
            $('#pago_btn_intem').show();
        }
        $('#numero_de_carros').html(numero_de_carros_feria);
        $('#total_feria').html('Q.'+total_a_pagar_carro_feria);
    });
</script>
<?php $this->stop() ?>
