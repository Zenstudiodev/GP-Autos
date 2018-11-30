<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 3/04/2018
 * Time: 4:41 PM
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


//campos

$fecha_d = New DateTime();

//fecha
$fecha = array(
    'type' => 'text',
    'name' => 'fecha',
    'id' => 'fecha',
    'class' => 'form-control',
    'placeholder' => 'Fecha',
    'value' => $fecha_d->format('Y-m-d'),
    'readonly' => 'readonly',
    'required' => 'required'
);
//vencimiento
$vencimiento = array(
    'type' => 'text',
    'name' => 'vencimiento',
    'id' => 'vencimiento',
    'data-date' => $fecha_d->format('Y-m-d'),
    'data-date-format' => 'yyyy-mm-dd',
    'class' => 'datepicker span11 form-control',
    'placeholder' => 'Vencimiento',
    'value' => $fecha_d->format('Y-m-d'),
    'required' => 'required'
);

//Codigo
$codigo = array(
    'type' => 'text',
    'name' => 'codigo',
    'id' => 'codigo',
    'class' => ' form-control',
    'placeholder' => 'Código',
    //'value'       => $carro->crr_codigo,
    //'readonly'    => 'readonly',
    'required' => 'required',
    'autofocus' => 'autofocus'
    //'disabled'    => 'disabled'
);
//Placa
$placa = array(
    'type' => 'text',
    'name' => 'placa',
    'id' => 'placa',
    'class' => ' validate',
    'placeholder' => 'Placa',
    //'value'       => $carro->crr_placa,
    'required' => 'required'
);
//Estado
$estado_carro_select = array(
    'name' => 'estado_carro',
    'id' => 'estado_carro',
    'class' => 'validate',
    'required' => 'required'
);
$estado_select_options = array(
    "Alta" => "Alta",
    "Baja" => "Baja",
);


//TIPO
$tipo_carro_select = array(
    'name' => 'tipo_carro_uf',
    'id' => 'tipo_carro_uf',
    'class' => 'validate ',
    'required' => 'required'
);
$tipo_carro_select_options = array();
foreach ($tipos_cf->result() as $tipo_carro) {
    $tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}

//MARCA
$marca_carro_select = array(
    'name' => 'marca_carro_uf',
    'id' => 'marca_carro_uf',
    'class' => 'validate ',
    'required' => 'required'
);
$marca_carro_select_options = array();
foreach ($marca_cf->result() as $marca_carro) {
    $marca_carro_select_options[$marca_carro->nombre] = $marca_carro->nombre;
}


//LINEA
$linea_carro_select = array(
    'name' => 'linea_carro_uf',
    'id' => 'linea_carro_uf',
    'class' => 'validate',
    'required' => 'required'
);
$linea_carro_select_options = array();
if ($linea) {
    foreach ($linea->result() as $linea_carro) {
        $linea_carro_select_options[$linea_carro->id_linea] = $linea_carro->id_linea;
    }
}

//UBICACION
$ubicacion_carro_select = array(
    'name' => 'ubicacion_carro',
    'id' => 'ubicacion_carro',
    'class' => 'validate',
    'required' => 'required'
);
$ubicacion_carro_select_options = array(
    "ALTA VERAPAZ" => "ALTA VERAPAZ",
    "BAJA VERAPAZ" => "BAJA VERAPAZ",
    "CHIMALTENANGO" => "CHIMALTENANGO",
    "CHIQUIMULA" => "CHIQUIMULA",
    "EL PROGRESO" => "EL PROGRESO",
    "ESCUINTLA" => "ESCUINTLA",
    "GUATEMALA" => "GUATEMALA",
    "HUEHUETENANGO" => "HUEHUETENANGO",
    "IZABAL" => "IZABAL",
    "JALAPA" => "JALAPA",
    "JUTIAPA" => "JUTIAPA",
    "PETÉN" => "PETÉN",
    "QUETZALTENANGO" => "QUETZALTENANGO",
    "QUICHÉ" => "QUICHÉ",
    "RETALHULEU" => "RETALHULEU",
    "SACATEPÉQUEZ" => "SACATEPÉQUEZ",
    "SAN MARCOS" => "SAN MARCOS",
    "SANTA ROSA" => "SANTA ROSA",
    "SOLOLÁ" => "SOLOLÁ",
    "SUCHITEPÉQUEZ" => "SUCHITEPÉQUEZ",
    "TOTONICAPÁN" => "TOTONICAPÁN",
    "ZACAPA" => "ZACAPA"
);


//Moneda
$moneda_carro_select = array(
    'name' => 'moneda_carro',
    'id' => 'moneda_carro',
    'class' => 'validate',
    'required' => 'required'
);
$moneda_carro_select_options = array(
    '$' => '$',
    'Q' => 'Q'
);

//Precio
$precio = array(
    'type' => 'number',
    'name' => 'precio',
    'id' => 'precio',
    'class' => 'validate',
    'placeholder' => 'Precio',
    'min' => '10000',
    //'value'       => $carro->crr_precio,
    'required' => 'required'
);


//Otros
$otros = array(
    'type' => 'text',
    'name' => 'otros',
    'id' => 'otros',
    'class' => 'materialize-textarea validate',
    'data-length' => '300',
    //'value'     => $carro->crr_otros,
    'required' => 'required'
);

$modelo = array(
    'type' => 'text',
    'name' => 'modelo',
    'id' => 'modelo',
    'class' => ' validate ',
    'placeholder' => 'Modelo',
    //'value'       => $carro->crr_modelo,
    'required' => 'required'
);

//ORIGEN
$origen_carro_select = array(
    'name' => 'origen_carro',
    'id' => 'origen_carro',
    'class' => ' validate',
    'required' => 'required'
);
$origen_carro_select_options = array(
    'AGENCIA' => 'AGENCIA',
    'RODADO' => 'RODADO',
);
//COMBUSTIBLE
$combustible_carro_select = array(
    'name' => 'combustible_carro',
    'id' => 'combustible_carro',
    'class' => ' validate',
);
$combustible_carro_select_options = array();
foreach ($combustibles->result() as $combustible) {
    $combustible_carro_select_options[$combustible->nombre] = $combustible->nombre;
}

//cilindros
$cilindros = array(
    'type' => 'text',
    'name' => 'cilindros',
    'id' => 'cilindros',
    'class' => 'validate',
    'placeholder' => 'Cilindros',
    //'value'       => $carro->crr_cilindros,
    'required' => 'required'
);
//Color
$color = array(
    'type' => 'text',
    'name' => 'color',
    'id' => 'color',
    'class' => ' validate',
    'placeholder' => 'Color',
    'value' => $carro->crr_color,
    'required' => 'required'
);

$ac_s = array(
    'name' => 'ac',
    'type'=>'radio',
    'id' => 'ac_s',
    'value' => 'Sí',
    'class' => ' validate',
    'required' => 'required'
);
$ac_n = array(
    'name' => 'ac',
    'type'=>'radio',
    'id' => 'ac_n',
    'class' => ' validate',
    'value' => 'no',
);

$alarma_s = array(
    'name' => 'alarma',
    'id' => 'alarma_s',
    'value' => 'Sí',
    'class' => ' validate',
    'required' => 'required'
);
$alarma_n = array(
    'name' => 'alarma',
    'id' => 'alarma_n',
    'value' => 'no',
    'class' => ' validate',
);

$aros_m_s = array(
    'name' => 'aros_m',
    'id' => 'aros_m_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$aros_m_n = array(
    'name' => 'aros_m',
    'id' => 'aros_m_n',
    'value' => 'no',
    'checked' => false,
);


$cerradura_c_s = array(
    'name' => 'cerradura_c',
    'id' => 'cerradura_c_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$cerradura_c_n = array(
    'name' => 'cerradura_c',
    'id' => 'cerradura_c_n',
    'value' => 'no',
    'checked' => false,
);

$bolsa_aire_s = array(
    'name' => 'bolsa_aire',
    'id' => 'bolsa_aire_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$bolsa_aire_n = array(
    'name' => 'bolsa_aire',
    'id' => 'bolsa_aire_n',
    'value' => 'no',
    'checked' => false,
);

$platos_s = array(
    'name' => 'platos',
    'id' => 'platos_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$platos_n = array(
    'name' => 'platos',
    'id' => 'platos_n',
    'value' => 'no',
    'checked' => false,
);

$polarizado_s = array(
    'name' => 'polarizado',
    'id' => 'polarizado_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$polarizado_n = array(
    'name' => 'polarizado',
    'id' => 'polarizado_n',
    'value' => 'no',
    'checked' => false,
);

$sun_roof_s = array(
    'name' => 'sun_roof',
    'id' => 'sun_roof_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$sun_roof_n = array(
    'name' => 'sun_roof',
    'id' => 'sun_roof_n',
    'value' => 'no',
    'checked' => false,
);

$radio_s = array(
    'name' => 'radio',
    'id' => 'radio_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$radio_n = array(
    'name' => 'radio',
    'id' => 'radio_n',
    'value' => 'no',
    'checked' => false,
);
$espejos_e_s = array(
    'name' => 'espejos_e',
    'id' => 'espejos_e_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$espejos_e_n = array(
    'name' => 'espejos_e',
    'id' => 'espejos_e_n',
    'value' => 'no',
    'checked' => false,
);

//4x4
$t4x4_s = array(
    'name' => 't4x4',
    'id' => '4x4_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$t4x4_n = array(
    'name' => 't4x4',
    'id' => '4x4_n',
    'value' => 'no',
    'checked' => false,
);

//Premium
$premium_s = array(
    'name' => 'premium',
    'id' => 'premium_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$premium_n = array(
    'name' => 'premium',
    'id' => 'premium_n',
    'value' => 'no',
    'checked' => false,
);
//CERTIAUTO
$certiauto_s = array(
    'name' => 'certiauto',
    'id' => 'certiauto_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$certiauto_n = array(
    'name' => 'certiauto',
    'id' => 'certiauto_n',
    'value' => 'no',
    'checked' => false,
);
//TAPICERIA
$tapiceria_carro_select = array(
    'name' => 'tapiceria_carro',
    'id' => 'tapiceria_carro',
    'required' => 'required'
);
$tapiceria_carro_select_options = array(
    'TELA' => 'TELA',
    'VINIL' => 'VINIL',
    'CUERO' => 'CUERO',
    'COMBINADO' => 'COMBINADO'
);
/*if ($tapiceria)
{
	foreach ($tapiceria->result() as $tapiceria_carro)
	{
		$tapiceria_carro_select_options[strtoupper($tapiceria_carro->crr_tapiceria)] = strtoupper($tapiceria_carro->crr_tapiceria);
	}
}*/
//timon hidraulico
$timon_h_s = array(
    'name' => 'timon_h',
    'id' => 'timon_h_s',
    'value' => 'Sí',
    'required' => 'required'
);
$timon_h_n = array(
    'name' => 'timon_h',
    'id' => 'timon_h_n',
    'value' => 'no',
);
//transmision
$transmision_carro_select = array(
    'name' => 'transmision_carro',
    'id' => 'transmision_carro',
    'required' => 'required'
);
$transmision_select_options = array(
    'AUTOMATICA' => 'AUTOMATICA',
    'MECANICA' => 'MECANICA',
    'TIPTRONIC' => 'TIPTRONIC'
);
/*if ($transmision)
{
	foreach ($transmision->result() as $transmision_carro)
	{
		$transmision_select_options[strtoupper($transmision_carro->crr_transmision)] = strtoupper($transmision_carro->crr_transmision);
	}
}*/

//puertas
$puertas_carro_select = array(
    'name' => 'puertas_carro',
    'id' => 'puertas_carro',
    'required' => 'required',
    'class' => ''

);
$puertas_select_options = array(
    "0" => "0",
    "2" => "2",
    "3" => "3",
    "4" => "4",
    "5" => "5",
);

//vidrios electricos
$vidrios_e_s = array(
    'name' => 'vidrios_e',
    'id' => 'vidrios_e_s',
    'value' => 'Sí',
    'checked' => false,
    'required' => 'required'
);
$vidrios_e_n = array(
    'name' => 'vidrios_e',
    'id' => 'vidrios_e_n',
    'value' => 'no',
    'checked' => false,
);
//freno_delantero
$freno_d_carro_select = array(
    'name' => 'freno_delantero',
    'id' => 'freno_delantero',
    'required' => 'required'
);
$freno_d_select_options = array(
    "DISCO" => "DISCO",
    "TAMBOR" => "TAMBOR",
    "AIRE" => "AIRE",
);
//freno_trasero
$freno_t_carro_select = array(
    'name' => 'freno_trasero',
    'id' => 'freno_trasero',
    'required' => 'required'
);
$freno_t_select_options = array(
    "DISCO" => "DISCO",
    "TAMBOR" => "TAMBOR",
    "AIRE" => "AIRE",
);

//BLINDAJE
$blindaje = array(
    'type' => 'text',
    'name' => 'blindaje',
    'id' => 'blindaje',
    'class' => 'form-control',
    'placeholder' => 'Blindaje',
    //'value'       => $carro->crr_blindaje,
    //'required' => 'required'
);

//NOMBRE CONTACTO
$nombre_contacto = array(
    'type' => 'text',
    'name' => 'nombre_contacto',
    'id' => 'nombre_contacto',
    'class' => 'validate',
    //'placeholder' => 'Nombre contacto',
    //'value'       => $carro->crr_contacto_nombre,
    'required' => 'required'
);
//TELEFONO   CONTACTO
$telefono_contacto = array(
    'type' => 'text',
    'name' => 'telefono_contacto',
    'id' => 'telefono_contacto',
    'class' => 'validate',
    //'placeholder' => 'Telefono contacto',
    //'value'       => $carro->crr_contacto_telefono,
    'required' => 'required'
);

//NOMBRE CLIENTE
$nombre_cliente = array(
    'type' => 'text',
    'name' => 'nombre_cliente',
    'id' => 'nombre_cliente',
    'class' => 'validate',
    //'placeholder' => 'Nombre cliente',
    //'value'       => $carro->crr_nombre_propietario,
    'required' => 'required'
);
//TELEFONO CLIENTE
$telefono_cliente = array(
    'type' => 'text',
    'name' => 'telefono_cliente',
    'id' => 'telefono_cliente',
    'class' => 'validate',
    //'placeholder' => 'Telefono cliente',
    //'value'       => $carro->crr_telefono_propietario,
    'required' => 'required'
);
//EMAIL
$email = array(
    'type' => 'text',
    'name' => 'email',
    'id' => 'email',
    'class' => 'validate',
    //'placeholder' => 'Email',
    //'value'       => $carro->crr_contacto_email,
    'required' => 'required'
);

//kilometraje
$kilometraje = array(
    'type' => 'text',
    'name' => 'kilometraje',
    'id' => 'kilometraje',
    'class' => 'form-control',
    'placeholder' => 'kilometraje',
    //'value'       => $carro->crr_kilometraje,
    'required' => 'required'
);


//motor
$motor = array(
    'type' => 'text',
    'name' => 'motor',
    'id' => 'motor',
    'class' => 'form-control',
    'placeholder' => 'Motor CC',
    //'value'       => $carro->crr_motor,
    'required' => 'required'
);

//predio_id
$predio_id = array(
    'type' => 'text',
    'name' => 'predio_id',
    'id' => 'predio_id',
    'class' => 'form-control',
    'placeholder' => 'Predio ID',
    //'value'       => $carro->id_predio_virtual,
    'required' => 'required'
);

//Boleta
$boleta = array(
    'type' => 'text',
    'name' => 'boleta',
    'id' => 'boleta',
    'class' => ' form-control',
    'placeholder' => 'Boleta',
    //'value'       => $carro->crr_precio,
    'required' => 'required'
);
//Banco
$banco = array(
    'type' => 'text',
    'name' => 'banco',
    'id' => 'banco',
    'class' => ' form-control',
    'placeholder' => 'Banco',
    //'value'       => $carro->crr_precio,
    'required' => 'required'
);


$usuario = $datos_usuario->row();


$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<pre>
<?php // print_r($datos_usuario->row()); ?>
</pre>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <div id="profile-page-content" class="row">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Información del carro</h5>
                            </div>

                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                href="#">×</a>
                                    <h4 class="alert-heading">Carro actualizado!</h4>
                                    Carro actualizado correctamente
                                </div>
                            <?php } ?>
                            <div class="container">
                                <form action="<?php echo base_url() ?>index.php/cliente/guardar_carro_vip" method="post"
                                      class="" id="subir_carro_form">
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--FECHA-->
                                            <?php echo form_input($fecha); ?>
                                            <label class="control-label">FECHA:</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--PLACA-->
                                            <?php echo form_input($placa); ?>
                                            <label class="control-label">PLACA</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--TIPO-->
                                            <?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options) ?>
                                            <label class="control-label">Tipo</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--MARCA-->
                                            <?php echo form_dropdown($marca_carro_select, $marca_carro_select_options) ?>
                                            <label class="control-label">MARCA</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--LINEA-->
                                            <?php echo form_dropdown($linea_carro_select, $linea_carro_select_options) ?>
                                            <label class="control-label">LINEA</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--UBICACIÓN-->
                                            <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA'); ?>
                                            <label class="control-label">UBICACIÓN</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--MONEDA-->
                                            <?php echo form_dropdown($moneda_carro_select, $moneda_carro_select_options, 'Q') ?>
                                            <label class="control-label">MONEDA</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--PRECIO-->
                                            <?php echo form_input($precio); ?>
                                            <label class="control-label">PRECIO :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--MODELO-->
                                            <?php echo form_input($modelo); ?>
                                            <label class="control-label">MODELO</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--ORIGEN-->
                                             <?php echo form_dropdown($origen_carro_select, $origen_carro_select_options) ?>
                                            <label class="control-label">ORIGEN</label>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--AC-->
                                            <p>
                                                <label for="checkboxes" class="control-label">Aire acondicionado</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($ac_s); ?>
                                                <label for="ac_s">Si</label>

                                            <?php echo form_radio($ac_n); ?>
                                                <label for="ac_n" >No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12 m4">
                                            <!--ALARMA-->
                                            <p>
                                                <label for="checkboxes" class="control-label">ALARMA</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($alarma_s); ?>
                                                <label for="alarma_s">Si</label>

                                                <?php echo form_radio($alarma_n); ?>
                                                <label for="alarma_n" >No</label>
                                            </p>
                                        </div>
                                        <div class="col s12 m4">
                                            <!--AROS-->
                                            <p>
                                                <label for="checkboxes" class="control-label">AROS MAG.</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($aros_m_s); ?>
                                                <label for="aros_m_s">Si</label>

                                                <?php echo form_radio($aros_m_n); ?>
                                                <label for="aros_m_n" >No</label>
                                            </p>

                                        </div>
                                        <div class=" col s12 m4">
                                            <!--BOLSA DE AIRE-->
                                            <p>
                                                <label for="checkboxes" class="control-label">BOLSA DE AIRE</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($bolsa_aire_s); ?>
                                                <label for="bolsa_aire_s">Si</label>

                                                <?php echo form_radio($bolsa_aire_n); ?>
                                                <label for="bolsa_aire_n" >No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12 m4">
                                            <!--CERRADURA-->
                                            <p>
                                                <label for="checkboxes" class="control-label">CERRADURA CENTRAL</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($cerradura_c_s); ?>
                                                <label for="cerradura_c_s">Si</label>
                                                <?php echo form_radio($cerradura_c_n); ?>
                                                <label for="cerradura_c_n" >No</label>
                                            </p>


                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--CILINDROS-->
                                            <?php echo form_input($cilindros); ?>
                                            <label class="control-label">CILINDROS</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--CILINDROS-->
                                            <?php echo form_input($color); ?>
                                            <label class="control-label">COLOR</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--COMBUSTIBLE-->
                                            <?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options) ?>
                                            <label class="control-label">COMBUSTIBLE</label>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--ESPEJOS-->
                                            <p>
                                                <label for="checkboxes" class="control-label">ESPEJOS
                                                    ELECTRICOS</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($espejos_e_s); ?>
                                                <label for="espejos_e_s">Si</label>

                                                <?php echo form_radio($espejos_e_n); ?>
                                                <label for="espejos_e_n" >No</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--KILOMETRAJE-->
                                            <?php echo form_input($kilometraje); ?>
                                            <label class="control-label">KILOMETRAJE:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--MOTOR-->
                                            <?php echo form_input($motor); ?>
                                            <label class="control-label">MOTOR CC:</label>
                                        </div>
                                        <div class=" col s12 m4">

                                            <!--PLATOS-->
                                            <p>
                                                <label for="checkboxes" class="control-label">PLATOS</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($platos_s); ?>
                                                <label for="platos_s">Si</label>

                                                <?php echo form_radio($platos_n); ?>
                                                <label for="platos_n" >No</label>
                                            </p>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--POLARIZADO-->
                                            <p>
                                                <label for="checkboxes" class="control-label">POLARIZADO</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($polarizado_s); ?>
                                                <label for="polarizado_s">Si</label>

                                                <?php echo form_radio($polarizado_n); ?>
                                                <label for="polarizado_n" >No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--puertas-->
                                            <?php echo form_dropdown($puertas_carro_select, $puertas_select_options) ?>
                                            <label class="control-label">PUERTAS</label>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--RADIO-->
                                            <p>
                                                <label for="checkboxes" class="control-label">RADIO</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($radio_s); ?>
                                                <label for="radio_s">Si</label>

                                                <?php echo form_radio($radio_n); ?>
                                                <label for="radio_n" >No</label>
                                            </p>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--SUN ROOF-->
                                            <p>
                                                <label for="checkboxes" class="control-label">SUN ROOF</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($sun_roof_s); ?>
                                                <label for="sun_roof_s">Si</label>

                                                <?php echo form_radio($sun_roof_n); ?>
                                                <label for="sun_roof_n" >No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--TAPICERIA-->
                                            <?php echo form_dropdown($tapiceria_carro_select, $tapiceria_carro_select_options) ?>
                                            <label class="control-label">TAPICERIA</label>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--TIMON-->
                                            <p>
                                                <label for="checkboxes" class="control-label">TIMON HIDRAULICO</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($timon_h_s); ?>
                                                <label for="timon_h_s">Si</label>

                                                <?php echo form_radio($timon_h_n); ?>
                                                <label for="timon_h_n" >No</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--TRANSMISIÓN-->
                                            <?php echo form_dropdown($transmision_carro_select, $transmision_select_options) ?>
                                            <label class="control-label">TRANSMISIÓN</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12 m4">
                                            <!--VIDRIOS-->
                                            <p>
                                                <label for="checkboxes" class="control-label">VIDRIOS ELÉCTRICOS</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($vidrios_e_s); ?>
                                                <label for="vidrios_e_s">Si</label>

                                                <?php echo form_radio($vidrios_e_n); ?>
                                                <label for="vidrios_e_n" >No</label>
                                            </p>
                                        </div>
                                        <div class=" col s12 m4">
                                            <!--4x4-->
                                            <p>
                                                <label for="checkboxes" class="control-label">4X4</label>
                                            </p>
                                            <p>
                                                <?php echo form_radio($t4x4_s); ?>
                                                <label for="4x4_s">Si</label>

                                                <?php echo form_radio($t4x4_n); ?>
                                                <label for="4x4_n" >No</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--BLINDAJE-->
                                            <?php echo form_input($blindaje); ?>
                                            <label class="control-label">NIV. BLINDAJE :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4">
                                            <!--FRENO DELANTERO-->
                                            <?php echo form_dropdown($freno_d_carro_select, $freno_d_select_options) ?>
                                            <label class="control-label">FRENO DELANTERO</label>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <!--FRENO TRASERO-->
                                            <?php echo form_dropdown($freno_t_carro_select, $freno_t_select_options) ?>
                                            <label class="control-label">FRENO TRASERO</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <?php echo form_textarea($otros); ?>
                                            <label for="textarea1">COMENTARIO:</label>
                                        </div>
                                    </div>




                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="tipo" id="tipo" value="ingreso">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    $(document).ready(function () {
        $('select').material_select();
    });

    //Actualizar marcas
    $("#tipo_carro_uf").change(function (e) {
        $('#marca_carro_uf option').remove();
        tipo = $("#tipo_carro_uf").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
            success: function (data) {
                //$('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro_uf').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                $('select').material_select();
            }
        });
    });

    //Actualizar lineas
    $("#marca_carro_uf").change(function (e) {
        $('#linea_carro_uf option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro_uf").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                // $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro_uf').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
                //  $("#linea_carro").val(buscador_linea);
            }
        });
    });
</script>
<?php $this->stop() ?>


