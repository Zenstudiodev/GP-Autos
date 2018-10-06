<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2/10/2018
 * Time: 9:42 AM
 */
$datos_seguimiento = $datos_seguimiento->row();
$datos_registro = $datos_registro->row();
?>
<table class="table">
    <thead>
    <tr>
        <td>id</td>
        <td>comentario</td>
    </tr>
    </thead>
    <tbody >
    <tr>
        <td><?php echo $datos_seguimiento->bts_id?></td>
        <td><?php echo $datos_seguimiento->bts_comentario?></td>
    </tr>
    </tbody>
</table>
<table class="table">
    <thead>
    <tr>
        <td>Id bt</td>
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
    <tr>
        <td id="bt_id"><?php echo $datos_registro->bt_id?></td>
        <td><?php echo $datos_registro->bt_fecha_ingreso?></td>
        <td><?php echo $datos_registro->bt_telefono?></td>
        <td><?php echo $datos_registro->bt_email?></td>
        <td><?php echo $datos_registro->bt_ubicacion?></td>
        <td><?php echo $datos_registro->bt_tipo?></td>
        <td><?php echo $datos_registro->bt_marca?></td>
        <td><?php echo $datos_registro->bt_linea?></td>
        <td><?php echo $datos_registro->bt_modelo?></td>
    </tr>
    </tbody>
</table>

