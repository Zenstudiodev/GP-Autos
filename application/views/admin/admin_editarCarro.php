<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
]);

$carro = $carro->row();


//campos

$fecha_d = New DateTime();

//fecha

$fecha_creacion ='';

if($carro->crr_vencimiento =='0000-00-00'){
$d = new DateTime();
	$fecha_creacion = $d->format('Y-m-d');
}else{
	$fecha_creacion = $carro->crr_fecha;
}


$fecha = array(
	'type'        => 'text',
	'name'        => 'fecha',
	'id'          => 'fecha',
	'class'       => 'span11 form-control',
	'placeholder' => 'Fecha',
	'value'       => $fecha_creacion,
	'readonly'    => 'readonly',
	'required'    => 'required'
);
//vencimiento
$vencimiento = array(
	'type'             => 'text',
	'name'             => 'vencimiento',
	'id'               => 'vencimiento',
	'data-date'        => $fecha_d->format('Y-m-d'),
	'data-date-format' => 'yyyy-mm-dd',
	'class'            => 'form-control',
	'placeholder'      => 'Vencimiento',
	'value'            => $carro->crr_vencimiento,
	'required'         => 'required',
    'readonly'    => 'readonly',
);

//Codigo
$codigo = array(
	'type'        => 'text',
	'name'        => 'codigo',
	'id'          => 'codigo',
	'class'       => ' form-control',
	'placeholder' => 'Código',
	'value'       => $carro->crr_codigo,
	'readonly'    => 'readonly',
	'required'    => 'required'
	//'disabled'    => 'disabled'
);
//Placa
$placa = array(
	'type'        => 'text',
	'name'        => 'placa',
	'id'          => 'placa',
	'class'       => ' form-control',
	'placeholder' => 'Placa',
	'value'       => $carro->crr_placa,
	'required'    => 'required'
);
//Estado
$estado_carro_select   = array(
	'name'     => 'estado_carro',
	'id'       => 'estado_carro',
	'class'    => ' browser-default form-control',
	'required' => 'required'
);
$estado_select_options = array(
	"Alta" => "Alta",
	"Baja" => "Baja",
);


//TIPO
$tipo_carro_select         = array(
	'name'     => 'tipo_carro',
	'id'       => 'tipo_carro',
	'class'    => ' browser-default form-control',
	'required' => 'required'
);
$tipo_carro_select_options = array();
foreach ($tipos->result() as $tipo_carro)
{
	$tipo_carro_select_options[$tipo_carro->id_tipo_carro] = $tipo_carro->id_tipo_carro;
}

//MARCA
$marca_carro_select         = array(
	'name'     => 'marca_carro',
	'id'       => 'marca_carro',
	'class'    => ' form-control',
	'required' => 'required'
);
$marca_carro_select_options = array();
foreach ($marca->result() as $marca_carro)
{
	$marca_carro_select_options[$marca_carro->nombre] = $marca_carro->nombre;
}

//UBICACION
$ubicacion_carro_select         = array(
	'name'     => 'ubicacion_carro',
	'id'       => 'ubicacion_carro',
	'class'    => ' form-control',
	'required' => 'required'
);
$ubicacion_carro_select_options = array(
	"ALTA VERAPAZ"   => "ALTA VERAPAZ",
	"BAJA VERAPAZ"   => "BAJA VERAPAZ",
	"CHIMALTENANGO"  => "CHIMALTENANGO",
	"CHIQUIMULA"     => "CHIQUIMULA",
	"EL PROGRESO"    => "EL PROGRESO",
	"ESCUINTLA"      => "ESCUINTLA",
	"GUATEMALA"      => "GUATEMALA",
	"HUEHUETENANGO"  => "HUEHUETENANGO",
	"IZABAL"         => "IZABAL",
	"JALAPA"         => "JALAPA",
	"JUTIAPA"        => "JUTIAPA",
	"PETÉN"          => "PETÉN",
	"QUETZALTENANGO" => "QUETZALTENANGO",
	"QUICHÉ"         => "QUICHÉ",
	"RETALHULEU"     => "RETALHULEU",
	"SACATEPÉQUEZ"   => "SACATEPÉQUEZ",
	"SAN MARCOS"     => "SAN MARCOS",
	"SANTA ROSA"     => "SANTA ROSA",
	"SOLOLÁ"         => "SOLOLÁ",
	"SUCHITEPÉQUEZ"  => "SUCHITEPÉQUEZ",
	"TOTONICAPÁN"    => "TOTONICAPÁN",
	"ZACAPA"         => "ZACAPA"
);

//LINEA
$linea_carro_select         = array(
	'name'     => 'linea_carro',
	'id'       => 'linea_carro',
	'required' => 'required'
);
$linea_carro_select_options = array();
if ($linea)
{
	foreach ($linea->result() as $linea_carro)
	{
		$linea_carro_select_options[$linea_carro->id_linea] = $linea_carro->id_linea;
	}
}

//Moneda
$moneda_carro_select         = array(
	'name'     => 'moneda_carro',
	'id'       => 'moneda_carro',
	'class'    => ' form-control',
	'required' => 'required'
);
$moneda_carro_select_options = array(
	'$' => '$',
	'Q' => 'Q'
);

//Precio
$precio = array(
	'type'        => 'text',
	'name'        => 'precio',
	'id'          => 'precio',
	'class'       => 'span11 form-control',
	'placeholder' => 'Precio',
	'value'       => $carro->crr_precio,
	'required'    => 'required'
);


//Otros
$otros = array(
	'type'      => 'text',
	'name'      => 'otros',
	'id'        => 'otros',
	'class'     => 'span11 form-control ',
	'maxlength' => '140',
	'value'     => $carro->crr_otros,
	'required'  => 'required'
);

$modelo = array(
	'type'        => 'text',
	'name'        => 'modelo',
	'id'          => 'modelo',
	'class'       => ' form-control',
	'placeholder' => 'Modelo',
	'value'       => $carro->crr_modelo,
	'required'    => 'required'
);

//ORIGEN
$origen_carro_select         = array(
	'name'     => 'origen_carro',
	'id'       => 'origen_carro',
	'class'    => ' form-control',
	'required' => 'required'
);
$origen_carro_select_options = array(
	'TODOS'   => 'TODOS',
	'AGENCIA' => 'AGENCIA',
	'RODADO'  => 'RODADO',
);
//COMBUSTIBLE
$combustible_carro_select         = array(
	'name'  => 'combustible_carro',
	'id'    => 'combustible_carro',
	'class' => 'form-control ',
);
$combustible_carro_select_options = array();
foreach ($combustibles->result() as $combustible)
{
	$combustible_carro_select_options[$combustible->nombre] = $combustible->nombre;
}

//cilindros
$cilindros = array(
	'type'        => 'text',
	'name'        => 'cilindros',
	'id'          => 'cilindros',
	'class'       => ' form-control',
	'placeholder' => 'Cilindros',
	'value'       => $carro->crr_cilindros,
	'required'    => 'required'
);
//Color
$color = array(
	'type'        => 'text',
	'name'        => 'color',
	'id'          => 'color',
	'class'       => ' form-control',
	'placeholder' => 'Color',
	'value'       => $carro->crr_color,
	'required'    => 'required'
);

$ac_s = array(
	'name'     => 'ac',
	'id'       => 'ac_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_ac),
	'required' => 'required'
);
$ac_n = array(
	'name'    => 'ac',
	'id'      => 'ac_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_ac),
);

$alarma_s = array(
	'name'     => 'alarma',
	'id'       => 'alarma_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_alarma),
	'required' => 'required'
);
$alarma_n = array(
	'name'    => 'alarma',
	'id'      => 'alarma_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_alarma),
);

$aros_m_s = array(
	'name'     => 'aros_m',
	'id'       => 'aros_m_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_aros_magnecio),
	'required' => 'required'
);
$aros_m_n = array(
	'name'    => 'aros_m',
	'id'      => 'aros_m_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_aros_magnecio),
);


$cerradura_c_s = array(
	'name'     => 'cerradura_c',
	'id'       => 'cerradura_c_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_cerradura_central),
	'required' => 'required'
);
$cerradura_c_n = array(
	'name'    => 'cerradura_c',
	'id'      => 'cerradura_c_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_cerradura_central),
);

$bolsa_aire_s = array(
	'name'     => 'bolsa_aire',
	'id'       => 'bolsa_aire_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_bolsas_aire),
	'required' => 'required'
);
$bolsa_aire_n = array(
	'name'    => 'bolsa_aire',
	'id'      => 'bolsa_aire_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_bolsas_aire),
);

$platos_s = array(
	'name'     => 'platos',
	'id'       => 'platos_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_platos),
	'required' => 'required'
);
$platos_n = array(
	'name'    => 'platos',
	'id'      => 'platos_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_platos),
);

$polarizado_s = array(
	'name'     => 'polarizado',
	'id'       => 'polarizado_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_polarizado),
	'required' => 'required'
);
$polarizado_n = array(
	'name'    => 'polarizado',
	'id'      => 'polarizado_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_polarizado),
);

$sun_roof_s = array(
	'name'     => 'sun_roof',
	'id'       => 'sun_roof_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_sunroof),
	'required' => 'required'
);
$sun_roof_n = array(
	'name'    => 'sun_roof',
	'id'      => 'sun_roof_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_sunroof),
);

$radio_s     = array(
	'name'     => 'radio',
	'id'       => 'radio_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_radio),
	'required' => 'required'
);
$radio_n     = array(
	'name'    => 'radio',
	'id'      => 'radio_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_radio),
);
$espejos_e_s = array(
	'name'     => 'espejos_e',
	'id'       => 'espejos_e_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_vidrios_electricos),
	'required' => 'required'
);
$espejos_e_n = array(
	'name'    => 'espejos_e',
	'id'      => 'espejos_e_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_vidrios_electricos),
);

//4x4
$t4x4_s = array(
	'name'     => 't4x4',
	'id'       => 't4x4_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_4x4),
	'required' => 'required'
);
$t4x4_n = array(
	'name'    => 't4x4',
	'id'      => 't4x4_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_4x4),
);

//Premium
$premium_s = array(
	'name'     => 'premium',
	'id'       => 'premium_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_premium),
	'required' => 'required'
);
$premium_n = array(
	'name'    => 'premium',
	'id'      => 'premium_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_premium),
);
//CERTIAUTO
$certiauto_s = array(
	'name'     => 'certiauto',
	'id'       => 'certiauto_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_certiauto),
	'required' => 'required'
);
$certiauto_n = array(
	'name'    => 'certiauto',
	'id'      => 'certiauto_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_certiauto),
);
//TAPICERIA
$tapiceria_carro_select         = array(
	'name'     => 'tapiceria_carro',
	'id'       => 'tapiceria_carro',
	'required' => 'required',
	'class'    => 'form-control'
);
$tapiceria_carro_select_options = array(
	'TELA'      => 'TELA',
	'VINIL'     => 'VINIL',
	'CUERO'     => 'CUERO',
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
	'name'     => 'timon_h',
	'id'       => 'timon_h_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_timon_hidraulico),
	'required' => 'required'
);
$timon_h_n = array(
	'name'    => 'timon_h',
	'id'      => 'timon_h_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_timon_hidraulico),
);
//transmision
$transmision_carro_select   = array(
	'name'     => 'transmision_carro',
	'id'       => 'transmision_carro',
	'required' => 'required'
);
$transmision_select_options = array(
	'AUTOMATICA' => 'AUTOMATICA',
	'MECANICA'   => 'MECANICA',
	'TIPTRONIC'  => 'TIPTRONIC'
);
/*if ($transmision)
{
	foreach ($transmision->result() as $transmision_carro)
	{
		$transmision_select_options[strtoupper($transmision_carro->crr_transmision)] = strtoupper($transmision_carro->crr_transmision);
	}
}*/

//puertas
$puertas_carro_select   = array(
	'name'     => 'puertas_carro',
	'id'       => 'puertas_carro',
	'required' => 'required',
	'class'    => 'form-control'
);
$puertas_select_options = array(
	"2" => "2",
	"3" => "3",
	"4" => "4",
	"5" => "5",
);

//vidrios electricos
$vidrios_e_s = array(
	'name'     => 'vidrios_e',
	'id'       => 'vidrios_e_s',
	'value'    => 'Sí',
	'checked'  => radio_helper('Sí', $carro->crr_vidrios_electricos),
	'required' => 'required'
);
$vidrios_e_n = array(
	'name'    => 'vidrios_e',
	'id'      => 'espejos_e_n',
	'value'   => 'no',
	'checked' => radio_helper('no', $carro->crr_vidrios_electricos),
);
//freno_delantero
$freno_d_carro_select   = array(
	'name'     => 'freno_delantero',
	'id'       => 'freno_delantero',
	'required' => 'required'
);
$freno_d_select_options = array(
	"DISCO"  => "DISCO",
	"TAMBOR" => "TAMBOR",
	"AIRE"   => "AIRE",
);
//freno_trasero
$freno_t_carro_select   = array(
	'name'     => 'freno_trasero',
	'id'       => 'freno_trasero',
	'required' => 'required',
	'class'    => 'requiered'
);
$freno_t_select_options = array(
	"DISCO"  => "DISCO",
	"TAMBOR" => "TAMBOR",
	"AIRE"   => "AIRE",
);

//BLINDAJE
$blindaje = array(
	'type'        => 'text',
	'name'        => 'blindaje',
	'id'          => 'blindaje',
	'class'       => ' form-control',
	'placeholder' => 'Blindaje',
	'value'       => $carro->crr_blindaje,
	'required'    => 'required'
);

//NOMBRE CONTACTO
$nombre_contacto = array(
	'type'        => 'text',
	'name'        => 'nombre_contacto',
	'id'          => 'nombre_contacto',
	'class'       => ' form-control',
	'placeholder' => 'Nombre contacto',
	'value'       => $carro->crr_contacto_nombre,
	'required'    => 'required'
);
//TELEFONO   CONTACTO
$telefono_contacto = array(
	'type'        => 'text',
	'name'        => 'telefono_contacto',
	'id'          => 'telefono_contacto',
	'class'       => ' form-control',
	'placeholder' => 'Telefono contacto',
	'value'       => $carro->crr_contacto_telefono,
	'required'    => 'required'
);

//NOMBRE CLIENTE
$nombre_cliente = array(
	'type'        => 'text',
	'name'        => 'nombre_cliente',
	'id'          => 'nombre_cliente',
	'class'       => ' form-control',
	'placeholder' => 'Nombre cliente',
	'value'       => $carro->crr_nombre_propietario,
	'required'    => 'required'
);
//TELEFONO CLIENTE
$telefono_cliente = array(
	'type'        => 'text',
	'name'        => 'telefono_cliente',
	'id'          => 'telefono_cliente',
	'class'       => ' form-control',
	'placeholder' => 'Telefono cliente',
	'value'       => $carro->crr_telefono_propietario,
	'required'    => 'required'
);
//EMAIL
$email = array(
	'type'        => 'text',
	'name'        => 'email',
	'id'          => 'email',
	'class'       => ' form-control',
	'placeholder' => 'Email',
	'value'       => $carro->crr_contacto_email,
	'required'    => 'required'
);

//kilometraje
$kilometraje = array(
	'type'        => 'text',
	'name'        => 'kilometraje',
	'id'          => 'kilometraje',
	'class'       => ' form-control',
	'placeholder' => 'kilometraje',
	'value'       => $carro->crr_kilometraje,
	'required'    => 'required'
);


//motor
$motor = array(
	'type'        => 'text',
	'name'        => 'motor',
	'id'          => 'motor',
	'class'       => ' form-control',
	'placeholder' => 'Motor CC',
	'value'       => $carro->crr_motor,
	'required'    => 'required'
);

//predio_id
$predio_id = array(
	'type'        => 'text',
	'name'        => 'predio_id',
	'id'          => 'predio_id',
	'class'       => ' form-control',
	'placeholder' => 'Predio ID',
	'value'       => $carro->id_predio_virtual,
	'required'    => 'required'
);

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->

<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/colorpicker.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<!--<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/bootstrap-wysihtml5.css"/>
<?php $this->stop() ?>




<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"></div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <a class="btn btn-success btn-mini"
                       href="<?php echo base_url() ?>index.php/admin/crearCarro"><i class="icon-plus-sign"></i> Nuevo</a>
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Información del carro</h5>
                    </div>
                    <pre>
                        <?php
                        // print_r($carro); ?>
                    </pre>
					<?php if (isset($mensaje)) { ?>
                        <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                        href="#">×</a>
                            <h4 class="alert-heading">Acción exitosa!</h4>
							<?php echo $mensaje; ?>
                        </div>
					<?php } ?>
                    <div class="widget-content ">
                        <form action="<?php echo base_url() ?>index.php/admin/actualizar_carro" method="post"
                              class="">
							<?php echo form_hidden('carro_id', $carro->id_carro); ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--CÓDIGO-->
                                        <div class="form-group">
                                            <label class="control-label">FECHA:</label>
                                            <div class="controls">
												<?php echo form_input($fecha); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--MARCA-->
                                        <div class="form-group">
                                            <label class="control-label">Estado</label>
                                            <div class="controls">
												<?php echo form_dropdown($estado_carro_select, $estado_select_options, $carro->crr_estatus) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--CÓDIGO-->
                                        <div class="form-group">
                                            <label class="control-label">CÓDIGO:</label>
                                            <div class="controls">
												<?php echo form_input($codigo); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--PLACA-->
                                        <div class="form-group">
                                            <label class="control-label">PLACA</label>
                                            <div class="controls">
												<?php echo form_input($placa); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--TIPO-->
                                        <div class="form-group">
                                            <label class="control-label">Tipo</label>
                                            <div class="controls">
												<?php echo form_dropdown($tipo_carro_select, $tipo_carro_select_options, $carro->id_tipo_carro) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--MARCA-->
                                        <div class="form-group">
                                            <label class="control-label">MARCA</label>
                                            <div class="controls">
												<?php echo form_dropdown($marca_carro_select, $marca_carro_select_options, $carro->id_marca) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Linea-->
                                        <div class="form-group">
                                            <label class="control-label">LINEA</label>
                                            <div class="controls">
												<?php echo form_dropdown($linea_carro_select, $linea_carro_select_options, $carro->id_linea) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--UBICACIÓN-->
                                        <div class="form-group">
                                            <label class="control-label">UBICACIÓN</label>
                                            <div class="controls">
												<?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, $carro->id_ubicacion) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--MONEDA-->
                                        <div class="form-group">
                                            <label class="control-label">MONEDA</label>
                                            <div class="controls">
												<?php echo form_dropdown($moneda_carro_select, $moneda_carro_select_options, $carro->crr_moneda_precio) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--PRECIO-->
                                        <div class="form-group">
                                            <label class="control-label">PRECIO :</label>
                                            <div class="controls">
												<?php echo form_input($precio); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--MODELO-->
                                        <div class="form-group">
                                            <label class="control-label">MODELO</label>
                                            <div class="controls">
												<?php echo form_input($modelo); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--ORIGEN-->
                                        <div class="form-group">
                                            <label class="control-label">ORIGEN</label>
                                            <div class="controls">
												<?php echo form_dropdown($origen_carro_select, $origen_carro_select_options, $carro->crr_origen) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--AC-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">Aire acondicionado</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($ac_s); ?> Si
                                                </label>
                                                <label>
													<?php echo form_radio($ac_n); ?> No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--ALARMA-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">ALARMA</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($alarma_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($alarma_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--AROS-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">AROS MAG.</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($aros_m_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($aros_m_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--BOLSA DE AIRE-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">BOLSA DE AIRE</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($bolsa_aire_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($bolsa_aire_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--CERRADURA-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">CERRADURA CENTRAL</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($cerradura_c_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($cerradura_c_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--CILINDROS-->
                                        <div class="form-group">
                                            <label class="control-label">CILINDROS</label>
                                            <div class="controls">
												<?php echo form_input($cilindros); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--COLOR-->
                                        <div class="form-group">
                                            <label class="control-label">COLOR</label>
                                            <div class="controls">
												<?php echo form_input($color); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--COMBUSTIBLE-->
                                        <div class="form-group">
                                            <label class="control-label">COMBUSTIBLE</label>
                                            <div class="controls">
												<?php echo form_dropdown($combustible_carro_select, $combustible_carro_select_options, $carro->crr_combustible) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--ESPEJOS-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">ESPEJOS ELECTRICOS</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($espejos_e_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($espejos_e_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--KILOMETRAJE-->
                                        <div class="form-group">
                                            <label class="control-label">KILOMETRAJE</label>
                                            <div class="controls">
												<?php echo form_input($kilometraje); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--MOTOR-->
                                        <div class="form-group">
                                            <label class="control-label">MOTOR CC:</label>
                                            <div class="controls">
												<?php echo form_input($motor); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--PLATOS-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">PLATOS</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($platos_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($platos_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--POLARIZADO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">POLARIZADO</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($polarizado_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($polarizado_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--puertas-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">PUERTAS</label>
                                            <div class="controls">
												<?php echo form_dropdown($puertas_carro_select, $puertas_select_options, strtoupper($carro->crr_puertas)) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--RADIO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">RADIO</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($radio_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($radio_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--SUN ROOF-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">SUN ROOF</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($sun_roof_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($sun_roof_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--TAPICERIA-->
                                        <div class="form-group">
                                            <label class="control-label">TAPICERIA</label>
                                            <div class="controls">
												<?php echo form_dropdown($tapiceria_carro_select, $tapiceria_carro_select_options, strtoupper($carro->crr_tapiceria)) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--TIMON-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">TIMON HIDRAULICO</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($timon_h_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($timon_h_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--TRANSMISIÓN-->
                                        <div class="form-group">
                                            <label class="control-label">TRANSMISIÓN</label>
                                            <div class="controls">
												<?php echo form_dropdown($transmision_carro_select, $transmision_select_options, strtoupper($carro->crr_transmision)) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--VIDRIOS-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">VIDRIOS ELÉCTRICOS</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($vidrios_e_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($vidrios_e_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--Premium-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">PREMIUM</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($premium_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($premium_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--CERTIAUTO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">CERTIAUTO</label>
                                            <div class="controls">
                                                <label>
													<?php echo form_radio($certiauto_s); ?>
                                                    Si
                                                </label>
                                                <label>
													<?php echo form_radio($certiauto_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--4x4-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">4X4</label>
                                            <div class="controls">
                                                <label>
						                            <?php echo form_radio($t4x4_s); ?>
                                                    Si
                                                </label>
                                                <label>
						                            <?php echo form_radio($t4x4_n); ?>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--FRENO DELANTERO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">FRENO DELANTERO</label>
                                            <div class="controls">
												<?php echo form_dropdown($freno_d_carro_select, $freno_d_select_options, strtoupper($carro->crr_freno_delantero)) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--FRENO TRASERO-->
                                        <div class="form-group">
                                            <label for="checkboxes" class="control-label">FRENO TRASERO</label>
                                            <div class="controls">
												<?php echo form_dropdown($freno_t_carro_select, $freno_t_select_options, strtoupper($carro->crr_freno_trasero)) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--BLINDAJE-->
                                        <div class="form-group">
                                            <label class="control-label">NIV. BLINDAJE :</label>
                                            <div class="controls">
												<?php echo form_input($blindaje); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--OTROS-->
                                <div class="form-group">
                                    <label>OTROS:</label>
                                    <div class="controls">
										<?php echo form_textarea($otros); ?>
                                    </div>
                                </div>
                                <!--NOMBRE CONTACTO-->
                                <div class="form-group">
                                    <label>NOMBRE CONTACTO:</label>
                                    <div class="controls">
										<?php echo form_input($nombre_contacto); ?>
                                    </div>
                                </div>
                                <!--TELEFONO CONTACTO-->
                                <div class="form-group">
                                    <label>TELEFONO CONTACTO:</label>
                                    <div class="controls">
										<?php echo form_input($telefono_contacto); ?>
                                    </div>
                                </div>
                                <!--NOMBRE CLIENTE-->
                                <div class="form-group">
                                    <label>NOMBRE CLIENTE:</label>
                                    <div class="controls">
										<?php echo form_input($nombre_cliente); ?>
                                    </div>
                                </div>
                                <!--TELEFONO CLIENTE-->
                                <div class="form-group">
                                    <label>TELEFONO CLIENTE:</label>
                                    <div class="controls">
										<?php echo form_input($telefono_cliente); ?>
                                    </div>
                                </div>
                                <!--COREO-->
                                <div class="form-group">
                                    <label>CORREO:</label>
                                    <div class="controls">
										<?php echo form_input($email); ?>
                                    </div>
                                </div>

                                <!--COD PREDIO-->
                                <div class="form-group">
                                    <label>COD. PREDIO</label>
                                    <div class="controls">
										<?php echo form_input($predio_id); ?>
                                    </div>
                                </div>
                                <!--VENCIMIENTO-->
                                <div class="form-group">
                                    <label>VENCIMIENTO</label>
                                    <div class="controls">
										<?php echo form_input($vencimiento); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success">Guardar</button>
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
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<!--<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-wysihtml5.js"></script>


<script>
    //Actualizar marcas
    $("#tipo_carro").change(function (e) {
        $('#marca_carro option').remove();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
            success: function (data) {
                //$('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                // $('select').material_select();
            }
        });
    });

    //Actualizar lineas
    $("#marca_carro").change(function (e) {
        $('#linea_carro option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/lineas?tipo=' + tipo + '&marca=' + marca,
            success: function (data) {
                // $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                // $('select').material_select();
                //  $("#linea_carro").val(buscador_linea);
            }
        });
    });

</script>
<?php $this->stop() ?>
