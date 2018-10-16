<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2/10/2018
 * Time: 9:42 AM
 */
$ci =& get_instance();
?>
<?php if ($reistros_by_number) { ?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td>Id Registro</td>
            <td>fecha de ingreso</td>
            <td>telefono</td>
            <td>email</td>
            <td>ubicacion</td>
            <td>tipo</td>
            <td>marca</td>
            <td>linea</td>
            <td>modelo</td>
        </tr>
        </thead>
        <tbody>
        <?php


        foreach ($reistros_by_number->result() as $registro) {
            ?>
            <tr>
                <td id="bt_id"><?php echo $registro->bt_id ?></td>
                <td><?php echo $registro->bt_fecha_ingreso ?></td>
                <td><?php echo $registro->bt_telefono ?></td>
                <td><?php echo $registro->bt_email ?></td>
                <td><?php echo $registro->bt_ubicacion ?></td>
                <td><?php echo $registro->bt_tipo ?></td>
                <td><?php echo $registro->bt_marca ?></td>
                <td><?php echo $registro->bt_linea ?></td>
                <td><?php echo $registro->bt_modelo ?></td>
            </tr>
            <?php
            $seguimientos = $ci->Marketing_model->get_seguimientos_by_bolsa_id($registro->bt_id);
            if ($seguimientos) {
                ?>
                <tr>
                    <td colspan="9">
                        <p>Seguimientos</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Id Registro</td>
                                <td>Fecha resultado</td>
                                <td>Fecha Seguimiento</td>
                                <td>comentario</td>
                                <td>Tipo</td>
                                <td>Estado</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($seguimientos->result() as $seguimiento) { ?>
                            <tr>
                                <td><?php echo $seguimiento->bts_bt_id?></td>
                                <td><?php echo $seguimiento->bts_fecha_resultado?></td>
                                <td><?php echo $seguimiento->bts_fecha_seguimiento?></td>
                                <td><?php echo $seguimiento->bts_comentario?></td>
                                <td><?php echo $seguimiento->bts_tipo?></td>
                                <td><?php echo $seguimiento->bts_estado?></td>
                            </tr>
                    <?php }?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php } ?>

        <?php } ?>
        </tbody>
    </table>
    <?php } else {
        echo 'no hay registros';
    } ?>
</div>


