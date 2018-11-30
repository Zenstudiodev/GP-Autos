<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 27/11/2018
 * Time: 4:41 PM
 */

function reasoncode_text($codigo)
{
    $texto_error = '';

    switch ($codigo) {
        case '101':
            $texto_error = "Rechazado: falta la solicitud en uno o más campos";
            break;
        case '102':
        $texto_error = "Rechazado: uno o más campos en la solicitud contienen datos no válidos.";
        break;
        case '104':
        $texto_error = "Rechazado: el merchantReferenceCode enviado con esta solicitud de autorización coincide con el merchantReferenceCode de otra solicitud de autorización que envió en los últimos 15 minutos.";
        break;
        case '150':
        $texto_error = "Error: falla general del sistema.";
        break;
        case '151':
        $texto_error = "Error: se recibió la solicitud pero hubo un tiempo de espera del servidor. Este error no incluye los tiempos de espera entre el cliente y el servidor.";
        break;
        case '152':
        $texto_error = "Error: se recibió la solicitud, pero un servicio no terminó de ejecutarse a tiempo.";
        break;
        case '200':
        $texto_error = "	
Rechazo suave: la solicitud de autorización fue aprobada por el banco emisor, pero rechazada por CyberSource porque no pasó el control del Servicio de verificación de direcciones (AVS).";
        break;
        case '201':
        $texto_error = "	
Rechazo: el banco emisor tiene preguntas sobre la solicitud.No recibe un código de autorización mediante programación, pero puede recibir uno verbalmente llamando al procesador.";
        break;
        case '202':
        $texto_error = "Rechazo: tarjeta vencida. También podría recibir esto si la fecha de vencimiento que proporcionó no coincide con la fecha en que el banco emisor tiene el archivo. 
Nota: ccCreditService no verifica la fecha de vencimiento; en cambio, pasa la solicitud al procesador de pagos. Si el procesador de pagos permite la emisión de créditos a tarjetas vencidas, CyberSource no limita esta funcionalidad.";
        break;
        case '203':
        $texto_error = "Rechazo: Rechazo general de la tarjeta. No hay otra información provista por el banco emisor, intente con un nuevo método de pago o hable con su banco emisor para mayor información.
Este error es un código que regresa el emisor, media vez la tarjeta no esté permitida para hacer transacciones en línea o esté bloqueada en parámetros por alguna razón del banco. Cuando este caso se de, es necesario que el tarjeta habiente contacte al banco para validar que su tarjeta puede hacer transacciones en línea.";
        break;
        case '204':
        $texto_error = "Rechazo: fondos insuficientes en la cuenta.";
        break;
        case '205':
        $texto_error = "Rechazo: tarjeta robada o perdida.";
        break;
        case '207':
        $texto_error = "Rechazo: el banco emisor no está disponible.";
        break;
        case '208':
        $texto_error = "Rechazo: la tarjeta o tarjeta inactiva no está autorizada para transacciones que no están presentes en la tarjeta.";
        break;
        case '209':
        $texto_error = "Rechazo: el número de verificación de la tarjeta (CVN) no coincidió.";
        break;
        case '210':
        $texto_error = "Rechazo: la tarjeta ha alcanzado el límite de crédito.";
        break;
        case '211':
        $texto_error = "Rechazo: número de verificación de tarjeta no válida (CVN).";
        break;
        case '220':
        $texto_error = "Rechazo general.";
        break;
        case '230':
        $texto_error = "Rechazo Suave: la solicitud de autorización fue aprobada por el banco emisor, pero rechazada por CyberSource porque no pasó el cheque del número de verificación de la tarjeta (CVN).";
        break;
        case '231':
            $texto_error = "Rechazo: número de cuenta no válido";
            break;
        case '232':
            $texto_error = "Rechazo: el procesador de pagos no acepta el tipo de tarjeta.";
            break;
        case '251':
            $texto_error = "Rechazo: se ha superado la frecuencia de uso de la tarjeta de débito sin PIN o la cantidad máxima por uso.";
            break;
        default:
            echo "Hubo un error en la transaccion pruebe de nuevo o consulte con su banco";
    }
    return $texto_error;
}
?>