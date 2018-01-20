<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 22/07/2017
 * Time: 12:50 PM
 */
?>
<?php $this->layout('public/public_master', [
	'header_banners'    => $header_banners,
]); ?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>-->

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="http://www.gruponorthatlantic.com" target="_blank">
                    <img src="<?php echo base_url() ?>ui/public/images/banner/embarque.jpg" alt="...">
                </a>
            </div>
            <div class="item ">
                <img src="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/anuncia-tu-carro.jpg" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo base_url() ?>/ui/public/images/banner/creditos.jpg" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg" alt="...">
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div id="anunciate_wrap">
        <div class="container">
            <div class="row">
                <div class="col s12 m3">

                    <div class="card">
                        <div class="card-content  orange darken-3 white-text">
                            <img src="<?php echo base_url()?>/ui/public/images/anunciate/template.jpg" class="img-responsive">
                        </div>
                        <div class="card-action">
                            <a href="#anunciate_modal"
                               class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light btn modal-triggert" id="btn_individual">Publica
                                tu auto</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-content  orange darken-3 white-text">
                            <img src="<?php echo base_url()?>/ui/public/images/anunciate/template1.jpg" class="img-responsive">
                        </div>
                        <div class="card-action">
                            <a href="#anunciate_modal"
                               class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light btn modal-triggert" id="btn_vip">Publica
                                tu auto</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3">

                    <div class="card">
                        <div class="card-content  orange darken-3 white-text">
                            <img src="<?php echo base_url()?>/ui/public/images/anunciate/template2.jpg" class="img-responsive">
                        </div>
                        <div class="card-action">
                            <a href="#anunciate_modal"
                               class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light btn modal-triggert" id="btn_predio">Publica
                                tu auto</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3">

                    <div class="card">
                        <div class="card-content  orange darken-3 white-text">
                            <img src="<?php echo base_url()?>/ui/public/images/anunciate/template3.jpg" class="img-responsive">
                        </div>
                        <div class="card-action">
                            <a href="#anunciate_modal"
                               class="btn btn-success btn-sm text-center orange darken-4 waves-effect waves-light btn modal-triggert" id="btn_empresa">Publica
                                tu auto</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="anunciate_modal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Interesado en anunciar carro</h4>
            <form id="anunciate_form">
                <input type="hidden" name="tipo" id="tipo_input">
                <div class="card-panel  red darken-1 white-text" id="form_anunciate_alert">
                    <span class="white-text">
                        Por favor llene todos los campos del formulario
                    </span>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="anunciate_nombre" name="anunciate_nombre" type="text" class="validate" required>
                        <label for="anunciate_nombre">Nombre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="anunciate_telefono" name="anunciate_telefono" type="text" class="validate" required>
                        <label for="anunciate_nombre">Teléfono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="anunciate_correo" name="anunciate_correo" type="text" class="validate" required>
                        <label for="anunciate_nombre">Correo</label>
                    </div>
                </div>


            </form>
        </div>
        <div class="modal-footer">
            <a class="btn btn-flat waves-green" id="anunciate_enviar">Enviar</a>
        </div>
    </div>


<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <script>

        $('select').material_select();
        $('.modal').modal();
        $(document).ready(function () {
            $('.parallax').parallax();
            $("#form_anunciate_alert").hide();
        });

        $(".modal-triggert").click(function () {
           id = $(this).attr('id');
           console.log(id);
            switch (id) {
                case 'btn_individual':
                    $("#tipo_input").val('Individual');
                    break;
                case 'btn_vip':
                    $("#tipo_input").val('Vip');
                    break;
                case 'btn_predio':
                    $("#tipo_input").val('Predio');
                    break;
                case 'btn_empresa':
                    $("#tipo_input").val('Empresa');
                    break;
            }

        });

        //Formulario anunciate
        $("#anunciate_enviar").click(function () {
            //obtener datos
            tipo = $("#tipo_input").val();
            nombre = $("#anunciate_nombre").val();
            telefono = $("#anunciate_telefono").val();
            correo = $("#anunciate_correo").val();


            formulario_informacion_data = {
                tipo: tipo,
                nombre: nombre,
                correo: correo,
                telefono: telefono
            };

            if ($("#anunciate_form")[0].checkValidity()) {
                console.log("form Submit");
                $("#form_anunciate_alert").hide();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>index.php/Formularios/info_anunciate',
                    data: formulario_informacion_data,
                    success: function (data) {
                        if (data == 'send') {
                            $("#anunciate_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                            $("#anunciate_modal").find('.modal-footer').html('');

                        }
                    }
                });
            } else {
                $("#form_anunciate_alert").fadeIn(1000);
            }

            /**/
        });

    </script>
<?php $this->stop() ?>