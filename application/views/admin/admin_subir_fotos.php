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


//campos

$fecha_d = New DateTime();

$carro = $carro->row();


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
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ui/public/css/materialize.min.css"
      media="screen,projection"/>
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/admin/css/style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.css"/>
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
                            <h4 class="alert-heading">Carro actualizado!</h4>
                            Carro actualizado correctamente
                        </div>
					<?php } ?>
                    <div class="widget-content ">
                        <section id="subir_imagenes">
                            <h5>Imágenes del vehículo</h5>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_1">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/1.jpg" id="img_1_placeholder">
                                            <input type="file" class="sr-only" id="input_img_1" name="input_img_1" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_1" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_1"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_2">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/2.jpg" id="img_2_placeholder">
                                            <input type="file" class="sr-only" id="input_img_2" name="input_img_2" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_2" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_2"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_3">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/3.jpg" id="img_3_placeholder">
                                            <input type="file" class="sr-only" id="input_img_3" name="input_img_3" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_3">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_3" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_3"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_4">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/4.jpg" id="img_4_placeholder">
                                            <input type="file" class="sr-only" id="input_img_4" name="input_img_4" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_4">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_4" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_4"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_5">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/5.jpg" id="img_5_placeholder">
                                            <input type="file" class="sr-only" id="input_img_5" name="input_img_5" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_5">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_5" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_5"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_6">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/6.jpg" id="img_6_placeholder">
                                            <input type="file" class="sr-only" id="input_img_6" name="input_img_6" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_6">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_6" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_6"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_7">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/7.jpg" id="img_7_placeholder">
                                            <input type="file" class="sr-only" id="input_img_7" name="input_img_7" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_7">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_7" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_7"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_8">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/8.jpg" id="img_8_placeholder">
                                            <input type="file" class="sr-only" id="input_img_8" name="input_img_8" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_8">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_8" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_8"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_9">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/9.jpg" id="img_9_placeholder">
                                            <input type="file" class="sr-only" id="input_img_9" name="input_img_9" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_9">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_9" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_9"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card upl_card">
                                    <div class="card-image">
                                        <label class=""  title="img_10">
                                            <img src="<?php echo base_url(); ?>ui/public/images/upl_assets/10.jpg" id="img_10_placeholder">
                                            <input type="file" class="sr-only" id="input_img_10" name="input_img_10" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="card-content">
                                        <div class="progress" id="progress_img_10">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_img_10" role="progressbar"
                                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                            </div>
                                        </div>
                                        <div class="alert" role="alert" id="alert_img_10"></div>
                                    </div>
                                    <div class="card-action">
                                        subir imagen
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a class=" btn orange darken-1" href="<?php echo base_url() . 'admin/vehiculos/' . $carro->id_carro ?>">Terminar</a>
                        </div>

                            <!--Materialize modal-->
                            <!-- Modal Structure -->

                            <div id="modal1" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4>Ajustar Imagen</h4>
                                    <div class="img-container">
                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <a class="waves-effect waves-light btn" id="zoom_in_btn">Acercar</a>
                                    <a class="waves-effect waves-light btn" id="zoom_off_btn">Alejar</a>
                                    <a class="waves-effect waves-light btn" id="rotate_btn">Girar</a>
                                    <a  href="#!" class="modal-action modal-close waves-effect waves-light btn" id="crop">Subir imagenes</a>

                                </div>
                            </div>


                        </section>

                                <div id="profile-page-content" class="row">

                                </div>

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
<!-- jQuery  -->
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/ui/public/js/bootstrap.min.js"></script>
<!-- Materialize js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ui/public/js/materialize.min.js"></script>
<script src="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.js"></script>


<script>

    var img_placeholder;
    var input_id;
    var imagen_number;
    var progress;
    var alert;



    function open_modal(){

    }
    function detectBrowser(){
        var N= navigator.appName;
        var UA= navigator.userAgent;
        var temp;
        var browserVersion= UA.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if(browserVersion && (temp= UA.match(/version\/([\.\d]+)/i))!= null)
            browserVersion[2]= temp[1];
        browserVersion= browserVersion? [browserVersion[1], browserVersion[2]]: [N, navigator.appVersion,'-?']; return browserVersion;
    };


    $(document).ready(function () {
        detectBrowser();
        $(".progress").hide();
        $(".alert").hide();
    });

    window.addEventListener('DOMContentLoaded', function () {
        var img_1 = document.getElementById('img_1_placeholder');
        var input_1 = document.getElementById('input_img_1');
        var progress_img_1 = $('#progress_img_1');
        var progress_bar_img_1 = $('#progress_bar_img_1');
        var alert_img_1 = $('#alert_img_1');

        var img_2 = document.getElementById('img_2_placeholder');
        var input_2 = document.getElementById('input_img_2');
        var progress_img_2 = $('#progress_img_2');
        var progress_bar_img_2 = $('#progress_bar_img_2');
        var alert_img_2 = $('#alert_img_2');

        var img_3 = document.getElementById('img_3_placeholder');
        var input_3 = document.getElementById('input_img_3');
        var progress_img_3 = $('#progress_img_3');
        var progress_bar_img_3 = $('#progress_bar_img_3');
        var alert_img_3 = $('#alert_img_3');

        var img_4 = document.getElementById('img_4_placeholder');
        var input_4 = document.getElementById('input_img_4');
        var progress_img_4 = $('#progress_img_4');
        var progress_bar_img_4 = $('#progress_bar_img_4');
        var alert_img_4 = $('#alert_img_4');

        var img_5 = document.getElementById('img_5_placeholder');
        var input_5 = document.getElementById('input_img_5');
        var progress_img_5 = $('#progress_img_5');
        var progress_bar_img_5 = $('#progress_bar_img_5');
        var alert_img_5 = $('#alert_img_5');

        var img_6 = document.getElementById('img_6_placeholder');
        var input_6 = document.getElementById('input_img_6');
        var progress_img_6 = $('#progress_img_6');
        var progress_bar_img_6 = $('#progress_bar_img_6');
        var alert_img_6 = $('#alert_img_6');

        var img_7 = document.getElementById('img_7_placeholder');
        var input_7 = document.getElementById('input_img_7');
        var progress_img_7 = $('#progress_img_7');
        var progress_bar_img_7 = $('#progress_bar_img_7');
        var alert_img_7 = $('#alert_img_7');

        var img_8 = document.getElementById('img_8_placeholder');
        var input_8 = document.getElementById('input_img_8');
        var progress_img_8 = $('#progress_img_8');
        var progress_bar_img_8 = $('#progress_bar_img_8');
        var alert_img_8 = $('#alert_img_8');

        var img_9 = document.getElementById('img_9_placeholder');
        var input_9 = document.getElementById('input_img_9');
        var progress_img_9 = $('#progress_img_9');
        var progress_bar_img_9 = $('#progress_bar_img_9');
        var alert_img_9 = $('#alert_img_9');

        var img_10 = document.getElementById('img_10_placeholder');
        var input_10 = document.getElementById('input_img_10');
        var progress_img_10 = $('#progress_img_10');
        var progress_bar_img_10 = $('#progress_bar_img_10');
        var alert_img_10 = $('#alert_img_10');





        var avatar = document.getElementById('avatar');
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $progress = $('.progress');
        var $progressBar = $('.progress-bar');
        var $alert = $('.alert');
        var $modal = $('#modal');
        var cropper;

        //herramientas zoom
        $("#zoom_in_btn").click(function () {
            cropper.zoom(0.1);
        });
        $("#zoom_off_btn").click(function () {
            cropper.zoom(-0.1);
        });
        $("#rotate_btn").click(function () {
            cropper.rotate(90);
        });


        $('[data-toggle="tooltip"]').tooltip();

        //img 1 event listener
        input_1.addEventListener('change', function (e) {
            img_placeholder = 'img_1_placeholder';
            imagen_number = 1;
            progress = progress_img_1;
            alert = alert_img_1;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                console.log(input_1.id);
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 2,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 2 event listener
        input_2.addEventListener('change', function (e) {
            img_placeholder = 'img_2_placeholder';
            imagen_number = 2;
            progress = progress_img_2;
            alert = alert_img_2;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                console.log(input_1.id);
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 2,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 3 event listener
        input_3.addEventListener('change', function (e) {
            img_placeholder = 'img_3_placeholder';
            imagen_number = 3;
            progress = progress_img_3;
            alert = alert_img_3;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 4 event listener
        input_4.addEventListener('change', function (e) {
            img_placeholder = 'img_4_placeholder';
            imagen_number = 4;
            progress = progress_img_4;
            alert = alert_img_4;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 5 event listener
        input_5.addEventListener('change', function (e) {
            img_placeholder = 'img_5_placeholder';
            imagen_number = 5;
            progress = progress_img_5;
            alert = alert_img_5;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 6 event listener
        input_6.addEventListener('change', function (e) {
            img_placeholder = 'img_6_placeholder';
            imagen_number = 6;
            progress = progress_img_6;
            alert = alert_img_6;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 7 event listener
        input_7.addEventListener('change', function (e) {
            img_placeholder = 'img_7_placeholder';
            imagen_number = 7;
            progress = progress_img_7;
            alert = alert_img_7;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 8 event listener
        input_8.addEventListener('change', function (e) {
            img_placeholder = 'img_8_placeholder';
            imagen_number = 8;
            progress = progress_img_8;
            alert = alert_img_8;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 9 event listener
        input_9.addEventListener('change', function (e) {
            img_placeholder = 'img_9_placeholder';
            imagen_number = 9;
            progress = progress_img_9;
            alert = alert_img_9;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        //img 10 event listener
        input_10.addEventListener('change', function (e) {
            img_placeholder = 'img_10_placeholder';
            imagen_number = 10;
            progress = progress_img_10;
            alert = alert_img_10;

            var files = e.target.files;
            var done = function (url) {
                input_1.value = '';
                image.src = url;
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                        // alert("Ready");
                        //console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
                            autoCropArea: 1,
                            dragMode: 'move',
                        });
                    },
                    complete: function() {
                        //    alert('Closed');
                        cropper.destroy();
                        cropper = null;
                    } // Callback for Modal close
                });
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        //crop and upload
        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;
            var canvas;
            //$modal.modal('close');
            $('#modal1').modal('close');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 638,
                    height: 359,
                });
                console.log(img_placeholder);
                avatar = document.getElementById(img_placeholder);
                initialAvatarURL = avatar.src;
                avatar.src = canvas.toDataURL();

                $progress = progress;
                $progress.show();

                $alert = alert;
                $alert.removeClass('alert-success alert-warning');
                canvas.toBlob(function (blob) {
                    var formData = new FormData();
                    formData.append('imagen', blob);
                    formData.append('id_carro', '<?php echo $carro->id_carro; ?>');
                    formData.append('img_number', imagen_number);
                    //$.ajax('https://jsonplaceholder.typicode.com/posts', {
                    $.ajax('<?php echo  base_url()?>cliente/procesar_foto', {
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.upload.onprogress = function (e) {
                                var percent = '0';
                                var percentage = '0%';
                                if (e.lengthComputable) {
                                    percent = Math.round((e.loaded / e.total) * 100);
                                    percentage = percent + '%';
                                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                }
                            };
                            return xhr;
                        },
                        success: function (msg ) {
                            console.log(msg);
                            $alert.show().addClass('alert-success').text('Upload success');
                        },
                        error: function () {
                            avatar.src = initialAvatarURL;
                            $alert.show().addClass('alert-warning').text('Upload error');
                        },
                        complete: function () {
                            $progress.hide();
                        },
                    });
                });
            }
        });
    });
</script>
</script>
<?php $this->stop() ?>
