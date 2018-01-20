<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 9/06/2017
 * Time: 12:55 PM
 */

  function mostrar_precio_carro($cantidad, $moneda)
    {
        if ($moneda == '$') {
            setlocale(LC_MONETARY, "en_US");
        } else {
            setlocale(LC_MONETARY, "es_GT");
        }
        echo money_format("%i",$cantidad);
    }
    function radio_helper($valor, $valor_carro){

  	if($valor == 'Sí'){
	    if($valor == $valor_carro){
		    return true;
	    }else{
		    return false;
	    }
    }
    if ($valor == 'no'){
	    if($valor == $valor_carro || $valor_carro == null){
		    return true;
	    }else{
		    return false;
	    }
    }






    }
?>