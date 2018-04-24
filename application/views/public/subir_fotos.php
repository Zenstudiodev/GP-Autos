<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 4/04/2018
 * Time: 11:40 AM
 */
?>
<?php $this->layout('public/public_master_test', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

$carro = $carro->row();


?>


<?php $this->start('css_p') ?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.css"/>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<pre>
<?php // print_r($datos_usuario->row()); ?>
</pre>
<?php if (true) { ?>
    <section id="subir_imagenes">
        <div class="container">
            <div id="profile-page-content" class="row">
                <div class="row-fluid">
                    <div class="span12">
                        <h5>Imágenes del vehículo</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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
                                <div class="col s12 m3">
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

                            <!--<div class="row">
                                <div class="col s12 m3">
                                    <div class="card upl_card">
                                        <div class="card-image">
                                            <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                <img class="rounded" id="avatar"
                                                     src="https://avatars0.githubusercontent.com/u/3456749?s=160" alt="avatar">
                                                <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                                            </label>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                                </div>
                                            </div>
                                            <div class="alert" role="alert"></div>
                                        </div>
                                        <div class="card-content">
                                        </div>
                                        <div class="card-action">
                                            subir imagen
                                        </div>
                                    </div>
                                </div>
                            </div>-->



                            <!--Materialize modal-->
                            <!-- Modal Trigger -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1" >Modal</a>

                            <!-- Modal Structure -->

                            <div id="modal1" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4>Ajustar Imagen</h4>
                                    <div class="img-container">
                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                </div>
                                <div class="modal-footer">

                                       <a class="waves-effect waves-light btn" id="zoom_in_btn"><i class="material-icons ">ic_zoom_in</i>Acercar</a>
                                        <a class="waves-effect waves-light btn" id="zoom_off_btn"><i class="material-icons ">ic_zoom_out</i>Alejar</a>
                                        <a  href="#!" class="modal-action modal-close waves-effect waves-light btn" id="crop">Cortar</a>

                                </div>
                            </div>


                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="img-container">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary" >Crop</button>
                                        </div>
                                    </div>
                                </div>
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
<script src="<?php echo base_url() ?>/ui/vendor/cropperjs/cropper.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>-->

<script>

    var img_placeholder;
    var input_id;
    var imagen_number;
    var progress;
    var alert;



    function open_modal(){

    }

    $(document).ready(function () {
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
            //alert('do zoom');
            cropper.zoom(0.1);
        });
        $("#zoom_off_btn").click(function () {
            //alert('do zoom');
            cropper.zoom(-0.1);
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
                        console.log(img_1);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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




       /* input.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;
                $alert.hide();
                console.log(input.id);
                $('#modal1').modal('open',{
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '0%', // Starting top style attribute
                    endingTop: '0%', // Ending top style attribute
                    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                       // alert("Ready");
                        console.log(modal, trigger);
                        cropper = new Cropper(image, {
                            aspectRatio: '1.7777777777777777',
                            viewMode: 1,
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
        });*/
       /* $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: '3:4',
                viewMode: 3,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });*/
        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;
            var canvas;
            //$modal.modal('close');
            $('#modal1').modal('close');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1366,
                    height: 768,
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
                    formData.append('id_carro', '<?php echo $carro->crr_codigo; ?>');
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
<?php $this->stop() ?>

