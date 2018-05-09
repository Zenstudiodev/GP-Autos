<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
 */
$this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ($carro) {
    $data_carro = $carro->row();
} else {

}


//campos formulario
$nombre = array(
    'type' => 'text',
    'name' => 'nombre',
    'id' => 'nombre',
    'class' => ' validate',
    'required' => 'required'
);
$direccion_domicilio = array(
    'type' => 'text',
    'name' => 'direccion_domicilio',
    'id' => 'direccion_domicilio',
    'class' => ' validate',
    'required' => 'required'
);
$numero_dpi = array(
    'type' => 'number',
    'name' => 'numero_dpi',
    'id' => 'numero_dpi',
    'class' => ' validate',
    'required' => 'required'
);
$emitido_dpi = array(
    'type' => 'text',
    'name' => 'emitido_dpi',
    'id' => 'emitido_dpi',
    'class' => ' validate',
    'required' => 'required'
);
$nit = array(
    'type' => 'text',
    'name' => 'nit',
    'id' => 'nit',
    'class' => ' validate',
    'required' => 'required'
);
$fecha_nacimiento = array(
    'type' => 'text',
    'name' => 'fecha_nacimiento',
    'id' => 'fecha_nacimiento',
    'class' => ' validate datepicker',
    'required' => 'required'
);
$numero_celular = array(
    'type' => 'number',
    'name' => 'numero_celular',
    'id' => 'numero_celular',
    'class' => ' validate',
    'required' => 'required'
);
$estado_civil = array(
    'type' => 'text',
    'name' => 'estado_civil',
    'id' => 'estado_civil',
    'class' => ' validate',
    'required' => 'required'
);
$correo = array(
    'type' => 'email',
    'name' => 'correo',
    'id' => 'correo',
    'class' => ' validate',
    'required' => 'required'
);
$nombre_empresa = array(
    'type' => 'text',
    'name' => 'nombre_empresa',
    'id' => 'nombre_empresa',
    'class' => ' validate',
    'required' => 'required'
);
$direccion_empresa = array(
    'type' => 'text',
    'name' => 'direccion_empresa',
    'id' => 'direccion_empresa',
    'class' => ' validate',
    'required' => 'required'
);
$puesto = array(
    'type' => 'text',
    'name' => 'puesto',
    'id' => 'puesto',
    'class' => ' validate',
    'required' => 'required'
);
$telefono_empresa = array(
    'type' => 'text',
    'name' => 'telefono_empresa',
    'id' => 'telefono_empresa',
    'class' => ' validate',
    'required' => 'required'
);
$salario = array(
    'type' => 'text',
    'name' => 'salario',
    'id' => 'salario',
    'class' => ' validate',
    'required' => 'required'
);
$fecha_ingreso = array(
    'type' => 'text',
    'name' => 'fecha_ingreso',
    'id' => 'fecha_ingreso',
    'class' => ' validate datepicker',
    'required' => 'required'
);
$monto_vehiculo = array(
    'type' => 'number',
    'name' => 'monto_vehiculo',
    'id' => 'monto_vehiculo',
    'class' => ' validate',
    'required' => 'required'
);
?>
<?php $this->start('meta') ?>
    <!--Meta description Tags-->
    <title>Financiamiento - GP Autos </title>
<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>
<?php $this->start('page_content') ?>

    <div class="divider"></div>
    <div class="container">
    <div class="section">
    </div>
    <div class="divider"></div>
    <div class="section">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <div class="orange darken-2">
                        <h1 class="white-text text-center">PRE CALIFICATE</h1>
                        <span class="card-title white-text text-center">ESTAS A POCOS PASOS DE PODER COMPRAR TU CARRO</span>
                        <p class="text-center">
                            <img src="<?php echo base_url()?>/ui/public/images/home_basket.png">
                        </p>
                        <span class="card-title white-text text-center">GPAUTOS TE NOTIFICARA VIA CORREO ELECTRONICO EL RESULTADO DE TU PRECALIFICACIÓN</span>
                    </div>
                        <div class="row">
                            <h3>REQUISITOS:</h3>
                            <ol class="collection">
                                <li class="collection-item">LLENA EL FORMULARIO COMPLETO.</li>
                                <li class="collection-item">INGRESA TUS DATOS REALES PARA UNA PRECALIFICACION MAS
                                    EXACTA
                                </li>
                                <li class="collection-item"> LOS DATOS DEBEN DE SER IGUALES A LOS QUE SE PRESENTEN
                                    FISICAMENTE.
                                </li>
                                <li class="collection-item"> TU INGRESO MENSUAL QUE INGRESES EN EL FORMULARIO DEBE DE
                                    REFLEJARSE EN TUS ESTADOS DE CUENTA.
                                </li>
                                <li class="collection-item"> TU TIEMPO DE TRABAJO Y PUESTO DEBE DE SER IDENTICOS QUE EN
                                    LA CARTA DE INGRESOS DE LA EMPRESA.
                                </li>
                            </ol>
                            <h3>OBSERVACIONES:</h3>
                            <ol class="collection">
                                <li class="collection-item">LA PRECALIFICACION TIENE UNA VIGENCIA DE 10 DIAS.</li>
                                <li class="collection-item">SI TU CREDITO SALE APROBADO PUEDES SOLICITAR EL VEHICULO DE
                                    TU INTERES EN OFICINAS DE GPAUTOS.
                                </li>
                                <li class="collection-item">ESTA PRECALIFICACION ES VALIDA UNICAMENTE PARA LA COMPRA DE
                                    VEHICULO EN OFICINAS DE GPAUTOS.
                                </li>
                            </ol>
                        </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                        <div class="row">
                            <form class="col s12" action="<?php echo base_url()?>/formularios/pre_calificacion" method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($nombre); ?>
                                        <label for="first_name">Nombre Completo</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($direccion_domicilio); ?>
                                        <label for="disabled">Direcciòn de domicilio</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <?php echo form_input($numero_dpi); ?>
                                        <label for="password">Nùmero DPI</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <?php echo form_input($emitido_dpi); ?>
                                        <label for="password">Donde fue emitido el DPI</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <?php echo form_input($nit); ?>
                                        <label for="email">NIT</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <?php echo form_input($correo); ?>
                                        <label for="email">Correo electrónico</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        <?php echo form_input($fecha_nacimiento); ?>
                                        <label for="email">Fecha de nacimiento</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <?php echo form_input($numero_celular); ?>
                                        <label for="email">Nùmero de celular</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <?php echo form_input($nit); ?>
                                        <label for="email">Estado civil</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($nombre_empresa); ?>
                                        <label for="email">Nombre de la empresa donde labora</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($direccion_empresa); ?>
                                        <label for="email">Dirección de la empresa donde labora</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($puesto); ?>
                                        <label for="email">Puesto que ocupa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($telefono_empresa); ?>
                                        <label for="email">Número de teléfono de la empresa donde labora</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($telefono_empresa); ?>
                                        <label for="email">Salario (Que se refleje en los estados de cuenta)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($fecha_ingreso); ?>
                                        <label for="email">Fecha de ingreso a laborar en dicha empresa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <?php echo form_input($monto_vehiculo); ?>
                                        <label for="email">Monto del vehículo que quisiera comprar</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul class="collection">
                                        <li class="collection-item">Tus datos serán enviados a las entidades bancarias para que realicen la precalificación.</li>
                                        <li class="collection-item">En caso tu crédito salga aprobado tienes 10 días para presentar la documentación física.</li>
                                        <li class="collection-item">Las entidades bancarias pueden llamar a tu numero de teléfono para verificar la veracidad de la informacion.</li>
                                        <li class="collection-item">Autorizo a las entidades bancarias para efectuar la precalificación solicitada.</li>
                                        <li class="collection-item">Autorizo a la empresa GPAUTOS,S.A para que envie mi informacion a las entidades bancarias para realizar la
                                            precalificación de crédito para la compra de vehiculo</li>
                                        <li class="collection-item">
                                            <input type="checkbox" id="acepto_terminos" name="acepto_terminos" required/>
                                            <label for="acepto_terminos">Acepto</label>
                                        </li>

                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">ENVIAR PRECALIFICACIÓN
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                </div>
            </div>
            <!-- <div class="card">
                 <div class="card-content">
             <div id="calculador_carro">

                 <!--<span class="cardle">Estimador de financiamiento</span>
                 <div class="row">
                     <div class="input-field col m12">

                         <label for="precio_carro">Precio del vehículo</label>
                     </div>
                 </div>
                 <div class="row" >
                     <div class="input-field col m8 s12">
                         <p id="p_carro_slider"></p>
                     </div>
                     <div class="input-field col m4 s12">
                         <input id="p_carro_input" name="p_carro_min" type="number"
                                min="10000" max="200000" step="1000"
                                value=""
                                placeholder="Precio" />
                         <label for="icon_prefix">Precio carro:</label>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col m6 s12">
                         <span class="card-title">Incluir traspaso</span>
                     </div>
                     <div class="col m4 s12">
                         <!-- Switch --
                         <div class="switch">
                             <label>
                                 No
                                 <input type="checkbox" id="traspaso_switch" name="traspaso_switch">
                                 <span class="lever"></span>
                                 Si
                             </label>
                         </div>


                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col s12 m4">
                     <div class="card">
                         <div class="card-content">
                                 <span class="card-title">Enganche <i
                                             class="small material-icons tooltipped" data-position="bottom"
                                             data-delay="50"
                                             data-tooltip="El enganche debe ser de 0% o minimo de 20% ">info</i></span>
                             <div class="row">
                                 <div class="input-field col m12 s12">
                                     <p id="enganche_carro_slider"></p>
                                 </div>
                                 <div class="input-field col m12 s12">
                                     <input id="enganche_carro_input" name="p_carro_min"
                                            type="number"
                                            min="10000" max="200000" step="1000"
                                            placeholder="Enganche:"/>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col s12 m4">
                     <div class="card ">
                         <div class="card-content">
                                 <span class="card-title">Plazo <i class="small material-icons tooltipped"
                                                                   data-position="bottom"
                                                                   data-delay="50"
                                                                   data-tooltip="El enganche debe ser de 0% o minimo de 20% ">info</i></span>
                             <div class="row">
                                 <div class="input-field col m12 s12">
                                     <p id="meses_carro_slider"></p>
                                 </div>
                                 <div class="input-field col m12 s12">
                                     <input id="meses_carro_input" name="p_carro_min" type="number"
                                            min="6" max="72" step="12"
                                            placeholder="Plazo:"/>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col s12 m4">
                     <div class="card  grey " id="calculo_carro">
                         <div class="card-content white-text">
                             <span class="card-title">Calculo</span>
                             <ul class="collection">
                                 <a href="#!" class="collection-item"><span id="precio_carro_badge"
                                             class="badge white-text">Q.</span>Precio
                                     carro:</a>
                                 <a href="#!" class="collection-item"><span id="traspaso_t"
                                                                            class="badge white-text">0</span>traspaso:</a>
                                 <a href="#!" class="collection-item"><span id="total_t"
                                                                            class="badge white-text">Q.</span>Total:</a>
                                 <a href="#!" class="collection-item"><span id="pago_mensual_t"
                                                                            class="badge white-text ">0</span>Pago
                                     mensual: <i class="small material-icons tooltipped"
                                                 data-position="bottom"
                                                 data-delay="50"
                                                 data-tooltip="Cuota mensual puede varia segun seguro ">info</i></a>
                             </ul>
                             <div class="row" style="display: none">
                                 <div class="input-field col m12">
                                     <label for="precio_carro" class="white-text">Pago
                                         mensual <i class="small material-icons tooltipped"
                                                    data-position="bottom"
                                                    data-delay="50"
                                                    data-tooltip="Cuota mensual varia segun seguro ">info</i></label>
                                 </div>
                             </div>
                             <div class="row" style="display: none">
                                 <!--<div class="input-field col m12 s12">
                                     <p id="pago_carro_slider"></p>
                                 </div>--
                                 <div class="input-field col m12 s12">
                                     <input id="pago_carro_input" class="white-text"
                                            name="p_carro_min" type="number"
                                            min="10000" max="200000" step="1000"
                                            placeholder="Pago mensual:" disabled/>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <a class="waves-effect waves-light btn white orange-text darken-3 z-depth-3"
                    href="#credito_carro_modal"><i
                             class="fa fa-send left"></i> Solicitar crédito</a>

             </div>-->

                        <div class="row">
                            <div class="col m12 s12">
                                <form id="calculador_carro">


                                </form>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="row">
                </div>


            </div>
        </div>

    </div>
    <div class="divider"></div>


    <!-- Modal Solicitar credito -->
    <div id="credito_carro_modal" class="modal  modal-fixed-footer">
        <div class="modal-content">
            <h4><span class="badge orange darken-1 white-text">COD: 00</span>
                Solicitar credito para el vehículo </h4>
            <div class="row">
                <div class="card-panel  red darken-1 white-text" id="form_credito_alert">
                    <span class="white-text">
                        Por favor llene todos los campos del formulario
                    </span>
                </div>
                <div class="row" id="loader_credito">
                    <div class="valign-wrapper ">
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="col s12 m12" id="credito_carro_form">

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input placeholder="Nombre:" id="nombre_credito" type="text" class="validate" required>
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellido_credito" type="text" placeholder="Apellido:" class="validate"
                                   required>
                            <label for="apellido">Apellido:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col col m6 s12">
                            <input id="email_credito" type="email" class="validate" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col col m6 s12">
                            <input id="telefono_credito" type="tel" class="validate" required>
                            <label for="telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="collection ">
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_precio"> </span>Valor
                                del vehiculo </a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_traspaso"> </span>Traspaso</a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_total"> </span>Total</a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_enganche"> </span>Enganche</a>
                            <a href="#!" class="collection-item"><span class="badge white-text "
                                                                       id="modal_plazo"> </span>Plazos</a>
                            <a href="#!" class="collection-item active"><span class="badge white-text"
                                                                              id="modal_cuota"> </span>Cuota mensual</a>
                        </div>
                    </div>

                </form>
            </div>


        </div>
        <div class="modal-footer">
            <a class="btn btn-flat waves-green" id="solicitar_credito">Enviar</a>
        </div>
    </div>


    <?php $this->stop() ?>

    <?php $this->start('js_p') ?>

    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false, // Close upon selecting a date,
            container: 'body', // ex. 'body' will append picker to body
        });

        // back =window.history.back();
        var nombre;
        var apellido;
        var correo;
        var telefono;
        var comentario;
        var carro_codigo;
        var formulario_informacion_data;
        var precio_carro_sliders;
        var precio_carro_input;
        var encanghe_carro_slider;
        var enganche_carro_input;
        var pago_carro_slider;
        var pago_carro_input;
        var meses_carro_slider;
        var meses_carro_input;
        // variebles para calculos del calculador
        var precio_carro;
        var enganche_minimo;
        var plazo;
        var pago_mensual;
        var traspaso;
/*

        $('#precio_carro_btn').click(function () {
            event.preventDefault();
            $('#precio_carro').show();
        });
        $('#contacto_carro_btn').click(function () {
            event.preventDefault();
            $('#datos_contacto').show();
        });

        //Sliders
        //precio carro
        //carro slider elemnt
        precio_carro_sliders = document.getElementById('p_carro_slider');
        //carro input element
        precio_carro_input = document.getElementById('p_carro_input');

        //enganche slider element
        encanghe_carro_slider = document.getElementById('enganche_carro_slider');
        //enganche input element
        enganche_carro_input = document.getElementById('enganche_carro_input');

        //pago slider elemnt
        pago_carro_slider = document.getElementById('pago_carro_slider');
        //pago input element
        pago_carro_input = document.getElementById('pago_carro_input');

        //meses slider elemnt
        meses_carro_slider = document.getElementById('meses_carro_slider');
        //meses input element
        meses_carro_input = document.getElementById('meses_carro_input');
        //carro slider init
        noUiSlider.create(precio_carro_sliders, {
            start: [0],
            step: 100,
            range: {
                'min': [10000],
                'max': [200000]
            },
            format: wNumb({
                decimals: 0
            })
        });
        //enganche slider init
        noUiSlider.create(encanghe_carro_slider, {
            start: [0],
            step: 100,
            range: {
                'min': [0],
                'max': [40000]
            },
            format: wNumb({
                decimals: 0
            })
        });

        //meses slider init
        noUiSlider.create(meses_carro_slider, {
            start: [6],
            step: 12,
            range: {
                'min': [0],
                'max': [60]
            }, format: wNumb({
                decimals: 0
            })
        });

        //carro slider listener
        precio_carro_sliders.noUiSlider.on('update', function (values, handle) {
            precio_carro_input.value = values[handle];
        });
        //carro nput listener
        precio_carro_input.addEventListener('change', function () {
            precio_carro_sliders.noUiSlider.set(this.value);
        });
        //enganche carro
        //enganche slider listener
        encanghe_carro_slider.noUiSlider.on('update', function (values, handle) {
            enganche_carro_input.value = values[handle];
        });
        //enganche nput listener
        enganche_carro_input.addEventListener('change', function () {
            encanghe_carro_slider.noUiSlider.set(this.value);
        });
        //pago carro

        //meses carro
        //meses slider listener
        meses_carro_slider.noUiSlider.on('update', function (values, handle) {
            meses_carro_input.value = values[handle];
        });
        //meses input listener
        meses_carro_input.addEventListener('change', function () {
            meses_carro_slider.noUiSlider.set(this.value);
        });

        precio_carro_sliders.noUiSlider.on('change', function (values, handle) {
            calcularInteres();
        });
        encanghe_carro_slider.noUiSlider.on('change', function (values, handle) {
            calcularInteres();
        });

        meses_carro_slider.noUiSlider.on('change', function (values, handle) {
            calcularInteres();
        });

        function updatePlazpSlider(min, max) {
            meses_carro_slider.noUiSlider.updateOptions({
                range: {
                    'min': min,
                    'max': max
                }
            });
        }


        function calcularInteres() {

            //variable locales
            var tasadeInteres;
            var enganche_carro = encanghe_carro_slider.noUiSlider.get();
            var gastos_administrativos;
            var porcentage_administrativo = 0.04;
            var precio_traspaso;
            traspaso = $("#traspaso_switch").prop('checked');

            //obtenemos el valor del carro desde slider
            precio_carro = parseInt(precio_carro_sliders.noUiSlider.get());

            console.log(traspaso);
            console.log(precio_carro + '\n');
            traspaso
            if (traspaso) {
                if (0 < 2012) {
                    precio_traspaso = 1350;

                } else if (0 > 2013) {
                    precio_traspaso = 1750;
                }
                Materialize.toast('agregar traspaso al calculo', 1000);
                precio_carro = precio_carro + precio_traspaso;

                $("#precio_carro_badge").html('Q.' + precio_carro);
                $("#traspaso_t").html('Q.' + precio_traspaso);
                $("#modal_traspaso").html('Q.' + precio_traspaso);
                $("#total_t").html('Q.' + precio_carro);
                $("#modal_total").html('Q.' + precio_carro);
            } else {
                $("#precio_carro_badge").html('Q.' + precio_carro);
                $("#traspaso_t").html(0);
                $("#modal_traspaso").html(0);
                $("#total_t").html('Q.' + precio_carro);
                $("#modal_total").html('Q.' + precio_carro);

            }

            console.log(precio_carro + '\n');
            console.log('Tomamos el valor del precio del carro y le sacamos el 20 %' + '\n');

            enganche_minimo = parseInt(precio_carro * 0.2);
            console.log(enganche_minimo);
            // si el enganche del carro esta menor al 20% subirlo al 20

            //si el enganche es igual a 0 aplicar interes enganche 0
            //si no es igual a 0
            if (enganche_carro == '0' && precio_carro < 100000) {
                console.log('enganche 0');
                //Materialize.toast('Enganche 0', 4000);
            } else {
                if (enganche_carro < enganche_minimo) {
                    encanghe_carro_slider.noUiSlider.set(enganche_minimo);
                    $('#enganche_carro_input').val(enganche_minimo);
                    //encanghe_carro_input.value = enganche_minimo;
                    if (precio_carro > 100000) {
                        Materialize.toast('Para enganche 0 el precio del carro debe ser menor a Q.100,000.00', 4000);
                    }
                    Materialize.toast('El enganche debe ser mayor al 20% del valor del vehiculo o 0', 4000);
                } else {
                    enganche_minimo = encanghe_carro_slider.noUiSlider.get();
                }
            }

            tasadeInteres = parseFloat(tasadeInteres);

            if (enganche_carro == '0') {
                tasadeInteres = 17;
                updatePlazpSlider(12, 48);
                console.log('interes de ' + tasadeInteres + '%');
            } else {
                updatePlazpSlider(12, 60);
                console.log(precio_carro);
                console.log(enganche_carro);
                precio_carro = precio_carro - enganche_carro;
                //calcular gasto administrativo
                if (precio_carro > 8000 && precio_carro < 49999) {
                    porcentage_administrativo = 0.04;
                    console.log('gasto administrativo 4 %');
                }
                if (precio_carro > 50000 && precio_carro < 99999) {
                    porcentage_administrativo = 0.03;
                    console.log('gasto administrativo 3 %');
                }
                if (precio_carro > 100000) {
                    porcentage_administrativo = 0.02;
                    console.log('gasto administrativo 2 %');
                }

                gastos_administrativos = precio_carro * porcentage_administrativo;
                console.log(gastos_administrativos);
                precio_carro = precio_carro + gastos_administrativos;


                console.log(precio_carro);

                if (precio_carro > 8000 && precio_carro < 14999) {
                    tasadeInteres = 27;
                    console.log('interes de ' + tasadeInteres + '%');
                }
                else if (precio_carro > 15000 && precio_carro < 30999) {
                    tasadeInteres = 19;
                    console.log('interes de ' + tasadeInteres + '%');
                }
                else if (precio_carro > 31000 && precio_carro < 49999) {
                    tasadeInteres = 13.99;
                    console.log('interes de ' + tasadeInteres + '%');
                }
                else if (precio_carro > 50000 && precio_carro < 99999) {
                    tasadeInteres = 12.99;
                    console.log('interes de ' + tasadeInteres + '%');
                }
                else if (precio_carro > 100000 && precio_carro < 149999) {
                    tasadeInteres = 12.25;
                    console.log('interes de ' + tasadeInteres + '%');
                }
                else if (precio_carro > 1500000 && precio_carro < 199999) {
                    tasadeInteres = 11.99;
                    console.log('interes de ' + tasadeInteres + '%');
                }
            }

            plazo = parseInt(meses_carro_slider.noUiSlider.get());

            pago_mensual = (precio_carro) * ((tasadeInteres / 100) / 12) / (1 - Math.pow((1 + (tasadeInteres / 100) / 12), (-plazo)));
            //pago_mensual = (precio_carro - enganche_minimo) * ((tasadeInteres / 100) / 12) / (1 - Math.pow((1 + (tasadeInteres / 100) / 12), (-plazo)));
            pago_mensual = parseInt(pago_mensual);
            console.log(pago_mensual);
            pago_carro_input.value = pago_mensual;
            $("#pago")
            //display en tabla de resultado
            $("#modal_precio").html('Q.' + precio_carro_sliders.noUiSlider.get());
            $("#modal_enganche").html('Q.' + encanghe_carro_slider.noUiSlider.get());
            $("#modal_plazo").html(meses_carro_slider.noUiSlider.get());
            $("#modal_cuota").html('Q.' + pago_mensual);
            $("#pago_mensual_t").html('Q.' + pago_mensual);

        }


        $('#calculador_carro').change(function () {
            calcularInteres();

            console.log('calculo ejecutado');
        });


        $(document).ready(function () {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('ul.tabs').tabs();
            //$('#precio_carro').hide();
            $('#datos_contacto').hide();
            $("#form_contacto_alert").hide();
            $("#form_credito_alert").hide();
            $("#loader_credito").hide();
            $('.tooltipped').tooltip({delay: 50});

        });

        (function () {
            Galleria.loadTheme('/ui/public/js/themes/classic/galleria.classic.min.js');
            Galleria.run('.galleria', {
                imageCrop: true,
                height: 400
            });
            this.$('stage,thumbnails').click(function (e) {
                Galleria.log('stage or thumbnails clicked');
            });
        }());
        Galleria.ready(function () {

            this.bind("thumbnail", function (e) {
                //Galleria.log(this); // the gallery scope
                //Galleria.log(e) // the event object
            });

            this.bind("loadstart", function (e) {
                if (!e.cached) {
                    //Galleria.log(e.target + ' is not cached. Begin preload...');
                }
            });
        });
        $(".opcion-fin").hover(function () {
        }, function () {
        });


        $("#cerrar_modal_info").click(function () {
            $("#informacion_carro_modal").modal('close');
        });


        $("#solicitar_credito").click(function () {
            //obtener datos
            nombre_credito = $("#nombre_credito").val();
            apellido_credito = $("#apellido_credito").val();
            correo_credito = $("#email_credito").val();
            telefono_credito = $("#telefono_credito").val();
            carro_codigo_credito = '000';
            precio_carro_credito = $("#modal_precio").text();
            enganche_credito = $("#modal_enganche").text();
            plazo_credito = $("#modal_plazo").text();
            cuota_credito = $("#modal_cuota").text();

            formulario_informacion_data = {
                nombre: nombre_credito,
                apellido: apellido_credito,
                correo: correo_credito,
                telefono: telefono_credito,
                carro_codigo: carro_codigo_credito,
                precio_carro: precio_carro_credito,
                enganche: enganche_credito,
                plazo: plazo_credito,
                cuota: cuota_credito
            };
            console.log(
                nombre_credito + '\n' +
                apellido_credito + '\n' +
                correo_credito + '\n' +
                telefono_credito + '\n' +
                carro_codigo_credito + '\n' +
                precio_carro_credito + '\n' +
                plazo_credito + '\n');

            if ($("#credito_carro_form")[0].checkValidity()) {
                console.log("form credito Submit");
                $("#credito_carro_form").hide();
                $.ajax({
                    type: 'POST',
                    url: '/index.php/Formularios/credito_carro',
                    data: formulario_informacion_data,
                    beforeSend: function () {
                        $("#loader_credito").fadeIn();
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 'send') {
                            $("#credito_carro_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                            $("#credito_carro_modal").find('.modal-footer').html('');

                        }
                    }
                });
            } else {
                $("#form_contacto_alert").fadeIn(1000);
            }
        });
        $("#solicitar_info").click(function () {
            //obtener datos
            nombre = $("#nombre").val();
            apellido = $("#apellido").val();
            correo = $("#email").val();
            telefono = $("#telefono").val();
            comentario = $("#comentario").val();
            carro_codigo = '0000';


            formulario_informacion_data = {
                nombre: nombre,
                apellido: apellido,
                correo: correo,
                telefono: telefono,
                comentario: comentario,
                carro_codigo: carro_codigo
            };

            if ($("#info_carro_form")[0].checkValidity()) {
                console.log("form Submit");
                $("#form_contacto_alert").hide();
                $.ajax({
                    type: 'POST',
                    url: '/index.php/Formularios/info_carro', //todo recober base url php
                    data: formulario_informacion_data,
                    beforeSend: function () {
                        $("#informacion_carro_modal").find('.modal-content').html('<div class="preloader-wrapper big active">\n' +
                            '      <div class="spinner-layer spinner-blue">\n' +
                            '        <div class="circle-clipper left">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div><div class="gap-patch">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div><div class="circle-clipper right">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div>\n' +
                            '      </div>');
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 'send') {
                            $("#informacion_carro_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                            $("#informacion_carro_modal").find('.modal-footer').html('');

                        }
                    }
                });
            } else {
                $("#form_contacto_alert").fadeIn(1000);
            }

            /!**!/
        });*/

    </script>
<?php $this->stop() ?>