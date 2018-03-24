<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/07/2017
 * Time: 12:45 PM
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
?>
<?php $this->start('title') ?>
    <title>Seguros</title>
<?php $this->stop() ?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div class="camera_wrap camera_azure_skin" id="seguros_banners">
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg">
            <!--<div class="camera_caption fadeFromBottom">
                Texto
            </div>-->
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg">
        </div>
    </div><!-- #camera_wrap_1 -->
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div class="container">
        <h1 class="center-align">Seguros</h1>
        <h6 class="center-align">
            Cotiza y solicita tu seguro para vehículos con la aseguradora de tu confianza.
        </h6>
        <div class="divider"></div>
        <div class="section">
            <h5>SEGUROS PARA AUTOMÓVIL</h5>
            <p>¡Maneja con tranquilidad! Protegiendo tu auto y seguridad económica. Seguros El Roble ha diseñado varias
                opciones de seguro para todas tus necesidades. Descubre la opción que más te convenga. </p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card ">
                        <form id="seguro_form">
                            <div class="card-content " id="formulario_seguros">

                                <div class="card-panel  red darken-1 white-text" id="form_contacto_alert">
                                    <span class="white-text">
                                        Por favor llene todos los campos del formulario
                                    </span>
                                </div>
                                <span class="card-title">Datos Personales</span>

                                <div class="divider"></div>
                                <div class="section">
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Nombre:" id="nombre" type="text" class="validate" required>
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Email:" id="email" type="email" class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m4 s12">
                                            <input type="date" class="datepicker" id="nacimiento" name="nacimiento" required>
                                            <label for="nacimento">Fecha de nacimiento</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <input placeholder="Teléfono:" id="telefono" type="tel" class="validate" required>
                                            <label for="telefono">Teléfono:</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <select id="genero" name="genero" required>
                                                <option value="" disabled selected>Seleccione su genero</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
                                            </select>
                                            <label>Género</label>
                                        </div>
                                    </div>

                                </div>
                                <span class="card-title">Datos del vehículo</span>
                                <div class="divider"></div>
                                <div class="section">
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <select id="tipo_vehiculo" required>
                                                <option value="" disabled selected>Tipo de vehículo</option>
                                                <option value="AUTOMOVIL">AUTOMOVIL</option>
                                                <option value="CAMIONETILLA">CAMIONETILLA</option>
                                                <option value="TRANSPORTE PESADO">TRANSPORTE PESADO</option>
                                                <option value="MOTOCICLETA">MOTOCICLETA</option>
                                                <option value="BUS">BUS</option>
                                                <option value="PICK UP">PICK UP</option>
                                                <option value="PANEL">PANEL</option>
                                                <option value="NAUTICA">NAUTICA</option>
                                            </select>
                                            <label>Tipo de vehículo</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Marca:" id="marca_vehiculo" type="text"
                                                   class="validate" required>
                                            <label for="marca">Marca:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Línea:" id="linea_vehiculo" type="text"
                                                   class="validate" required>
                                            <label for="linea">Linea:</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Modelo:" id="modelo_vehiculo" type="text"
                                                   class="validate" required>
                                            <label for="modelo">Modelo:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input placeholder="Valor:" id="valor_vehiculo" type="text"
                                                   class="validate" required>
                                            <label for="valor">Valor:</label>
                                        </div>
                                    </div>
                                </div>
                                <span class="card-title">Datos de cobertura</span>
                                <div class="divider"></div>
                                <div class="section">
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <select name="cobertura" id="cobertura" required>
                                                <option>No amparado</option>
                                                <option value="6 a 18">De 16 a 18 años</option>
                                                <option value="18 a 21">De 18 a 21 años</option>
                                            </select>
                                            <label>Cobertura a menores:</label>
                                        </div>
                                    </div>
                                </div>
                                <span class="card-title">Datos de aseguradora</span>
                                <div class="divider"></div>
                                <div class="section">
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <select name="aseguradora" id="aseguradora" required>
                                                <option>Seleccione aseguradora</option>
                                                <!--<option value="gyt">Gyt Continental</option>-->
                                                <option value="roble">El Roble</option>
                                            </select>
                                            <label>Nombre</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="button"
                                        class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light"
                                        id="enviar_seguro">Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="informacion_seguros_modal" class="modal  modal-fixed-footer">
        <div class="modal-content">

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


        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">cerrar</a>
        </div>
    </div>

<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <script>
        var nombre;
        var email;
        var nacimiento;
        var telefono;
        var genero;
        var tipo_vehiculo;
        var marca;
        var linea;
        var valor;
        var covertura_menores;
        var aseguradora;


        $(document).ready(function () {
            $("#form_contacto_alert").hide();
        });

        $("#enviar_seguro").click(function () {
            //obtener datos
            nombre = $("#nombre").val();
            email = $("#email").val();
            nacimiento = $("#nacimiento").val();
            telefono = $("#telefono").val();
            genero = $("#genero").val();
            tipo_vehiculo = $("#tipo_vehiculo").val();
            marca = $("#marca_vehiculo").val();
            linea = $("#linea_vehiculo").val();
            modelo = $("#modelo_vehiculo").val();
            valor = $("#valor_vehiculo").val();
            covertura_menores = $("#cobertura").val();
            aseguradora = $("#aseguradora").val();


            formulario_seguros_data = {
                nombre: nombre,
                email: email,
                nacimiento: nacimiento,
                telefono: telefono,
                genero: genero,
                tipo_vehiculo: tipo_vehiculo,
                marca: marca,
                linea: linea,
                modelo: modelo,
                valor: valor,
                covertura_menores: covertura_menores,
                aseguradora: aseguradora
            };

            if ($("#seguro_form")[0].checkValidity()) {
                console.log("form Submit");
                $("#form_contacto_alert").hide();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>index.php/Formularios/seguros',
                    data: formulario_seguros_data,
                    beforeSend: function () {
                        $("#informacion_seguros_modal").modal('open');
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 'send') {

                            $("#informacion_seguros_modal").find('.modal-content').html(' <blockquote>\n' +
                                '                Correo enviado. pronto nos pondremos en contacto\n' +
                                '            </blockquote>');


                        }
                    }
                });

            } else {
                $("#form_contacto_alert").fadeIn(1000);

                $(window).scrollTo($("#form_contacto_alert"));

            }
        });

        $('.datepicker').pickadate({
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            min: [1900, 1, 1],
            max: [2000, 1, 1],
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'yyyy-m-d'
        });
        $('select').material_select();
        $('.modal').modal();
    </script>
<?php $this->stop() ?>