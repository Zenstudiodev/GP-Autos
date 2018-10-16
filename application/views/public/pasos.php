<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/04/2018
 * Time: 7:12 PM
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


?>
<?php $this->start('title') ?>
<title>Paga tu anuncio</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<!--Wizard pago-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/ui/public/css/wizard.css"/>
<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<pre>
<?php // print_r($datos_usuario->row()); ?>
</pre>
<?php if (true) { ?>
    <section id="pagar_anuncio">
        <div class="container">
            <h5>Pagar Anuncio</h5>
            <div class="row">
                <div class="col m12">
                    <h5>Seleccione tipo de anuncio</h5>
                    <div class="card">
                        <div class="card-content">
                            <div class="container">
                                <div class="row">
                                    <section>
                                        <div class="wizard">
                                            <div class="wizard-inner">
                                                <div class="connecting-line"></div>
                                                <ul class="nav nav-tabs" role="tablist">

                                                    <li role="presentation" class="active">
                                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                                                        </a>
                                                    </li>

                                                    <li role="presentation" class="disabled">
                                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="disabled">
                                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                                                        </a>
                                                    </li>

                                                    <li role="presentation" class="disabled">
                                                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <form role="form">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                                        <h3>Step 1</h3>
                                                        <p>This is step 1</p>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step2">
                                                        <h3>Step 2</h3>
                                                        <p>This is step 2</p>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step3">
                                                        <h3>Step 3</h3>
                                                        <p>This is step 3</p>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="complete">
                                                        <h3>Complete</h3>
                                                        <p>You have successfully completed all steps.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">

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
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>
<?php $this->stop() ?>
