<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 23/12/2020
 * Time: 10:49
 */


?>
<form action="<?php echo base_url()?>predio/guardar_ingreso" method="post" id="marcar_visita">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="predio_id" id="predio_id" value="<?php echo $predio_id; ?>">
    <input type="hidden" name="latitud" id="latitud">
    <input type="hidden" name="longitud" id="longitud">

</form>



<script>

    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;

        console.log('Your current position is:');
        console.log('Latitude : ' + crd.latitude);
        document.getElementById("latitud").value = crd.latitude;
        console.log('Longitude: ' + crd.longitude);
        document.getElementById("longitud").value = crd.longitude;
        console.log('More or less ' + crd.accuracy + ' meters.');
        console.log(document.getElementById('latitud').value);
        console.log(document.getElementById('longitud').value);
        document.getElementById("marcar_visita").submit();
    };

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    };

    navigator.geolocation.getCurrentPosition(success, error, options);





</script>