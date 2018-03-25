<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 6:58 PM
 */ ?>
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

$CI =& get_instance();
?>

<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>


<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<?php if (true) { ?>


    <section id="homeCarros">
        <div class="container">
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../images/gallary/23.png" alt="user background">
                </div>
                <figure class="card-profile-image">
                    <img src="../../images/avatar/avatar-7.png" alt="profile image" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
                </figure>
                <div class="card-content">
                    <div class="row pt-2">
                        <div class="col s12 m3 offset-m2">
                            <h4 class="card-title grey-text text-darken-4">Roger Waters</h4>
                            <p class="medium-small grey-text">Project Manager</p>
                        </div>
                        <div class="col s12 m2 center-align">
                            <h4 class="card-title grey-text text-darken-4">10+</h4>
                            <p class="medium-small grey-text">Work Experience</p>
                        </div>
                        <div class="col s12 m2 center-align">
                            <h4 class="card-title grey-text text-darken-4">6</h4>
                            <p class="medium-small grey-text">Completed Projects</p>
                        </div>
                        <div class="col s12 m2 center-align">
                            <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                            <p class="medium-small grey-text">Busness Profit</p>
                        </div>
                        <div class="col s12 m1 right-align">
                            <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                                <i class="material-icons">perm_identity</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-reveal">
                    <p>
                    <span class="card-title grey-text text-darken-4">Roger Waters
                      <i class="material-icons right">close</i>
                    </span>
                        <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i> Project Manager</span>
                    </p>
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    <p>
                        <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
                    <p>
                        <i class="material-icons cyan-text text-darken-2">email</i> mail@domain.com</p>
                    <p>
                        <i class="material-icons cyan-text text-darken-2">cake</i> 18th June 1990</p>
                    <p>
                        <i class="material-icons cyan-text text-darken-2">airplanemode_active</i> BAR - AUS</p>
                </div>
            </div>
            <div id="profile-page-content" class="row">
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                    <!-- Profile About  -->
                    <div class="card cyan">
                        <div class="card-content white-text">
                            <span class="card-title">About Me!</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                    <!-- Profile About  -->
                    <!-- Profile About Details  -->
                    <ul id="profile-page-about-details" class="collection z-depth-1">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">card_travel</i> Project</div>
                                <div class="col s7 right-align">ABC Name</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">poll</i> Skills</div>
                                <div class="col s7 right-align">HTML, CSS</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">domain</i> Lives in</div>
                                <div class="col s7 right-align">NY, USA</div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s5">
                                    <i class="material-icons left">cake</i> Birth date</div>
                                <div class="col s7 right-align">18th June, 1991</div>
                            </div>
                        </li>
                    </ul>
                    <!--/ Profile About Details  -->
                    <!-- Profile About  -->
                    <div class="card red accent-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title">
                                <i class="material-icons">group_add</i> 3685</p>
                            <p>Followers</p>
                        </div>
                    </div>
                    <!-- Profile About  -->
                    <!-- Profile feed  -->
                    <ul id="profile-page-about-feed" class="collection z-depth-1">
                        <li class="collection-item avatar">
                            <img src="../../images/avatar/avatar-2.png" alt="" class="circle deep-orange accent-2">
                            <span class="title">Project Title</span>
                            <p>Task assigned to new changes.
                                <br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons circle teal accent-4">folder</i>
                            <span class="title">New Project</span>
                            <p>First Line of Project Work
                                <br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content">
                                <i class="material-icons">domain</i>
                            </a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons circle cyan">assessment</i>
                            <span class="title">New Payment</span>
                            <p>Last UK Project Payment
                                <br>
                                <span class="ultra-small">$ 3,684.00</span>
                            </p>
                            <a href="#!" class="secondary-content">
                                <i class="material-icons">attach_money</i>
                            </a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons circle red accent-2">play_arrow</i>
                            <span class="title">Latest News</span>
                            <p>company management news
                                <br>
                                <span class="ultra-small">Second Line</span>
                            </p>
                            <a href="#!" class="secondary-content">
                                <i class="material-icons">track_changes</i>
                            </a>
                        </li>
                    </ul>
                    <!-- Profile feed  -->
                    <!-- task-card -->
                    <ul id="task-card" class="collection with-header">
                        <li class="collection-header gradient-45deg-light-blue-cyan">
                            <h4 class="task-card-title">My Task</h4>
                            <p class="task-card-date">March 26, 2015</p>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task1">
                            <label for="task1" style="text-decoration: none;">Create Mobile App UI.
                                <a href="#" class="secondary-content">
                                    <span class="ultra-small">Today</span>
                                </a>
                            </label>
                            <span class="task-cat teal accent-4">Mobile App</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task2">
                            <label for="task2" style="text-decoration: none;">Check the new API standerds.
                                <a href="#" class="secondary-content">
                                    <span class="ultra-small">Monday</span>
                                </a>
                            </label>
                            <span class="task-cat red accent-2">Web API</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task3" checked="checked">
                            <label for="task3" style="text-decoration: line-through;">Check the new Mockup of ABC.
                                <a href="#" class="secondary-content">
                                    <span class="ultra-small">Wednesday</span>
                                </a>
                            </label>
                            <span class="task-cat deep-orange accent-2">Mockup</span>
                        </li>
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task4" checked="checked" disabled="disabled">
                            <label for="task4" style="text-decoration: line-through;">I did it !</label>
                            <span class="task-cat cyan">Mobile App</span>
                        </li>
                    </ul>
                    <!-- task-card -->
                    <!-- Profile Total sell -->
                    <div class="card center-align">
                        <div class="card-content teal accent-4 white-text">
                            <p class="card-stats-title">
                                <i class="material-icons">attach_money</i>Your Profit</p>
                            <h4 class="card-stats-number">$8990.63</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> 70%
                                <span class="teal-text text-lighten-5">last month</span>
                            </p>
                        </div>
                        <div class="card-action teal darken-1">
                            <div id="sales-compositebar"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>
                    <!-- flight-card -->
                    <div id="flight-card" class="card">
                        <div class="card-header pink darken-4">
                            <div class="card-title">
                                <h4 class="flight-card-title">Your Next Flight</h4>
                                <p class="flight-card-date">June 18, Thu 04:50</p>
                            </div>
                        </div>
                        <div class="card-content-bg white-text">
                            <div class="card-content">
                                <div class="row flight-state-wrapper">
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">LDN</h4>
                                            <p class="ultra-small">London</p>
                                        </div>
                                    </div>
                                    <div class="col s2 m2 l2 center-align">
                                        <i class="material-icons flight-icon">local_airport</i>
                                    </div>
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">SFO</h4>
                                            <p class="ultra-small">San Francisco</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6 m6 l6 center-align">
                                        <div class="flight-info">
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Terminal:</span> B</p>
                                        </div>
                                    </div>
                                    <div class="col s6 m6 l6 center-align flight-state-two">
                                        <div class="flight-info">
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small">
                                                <span class="grey-text text-lighten-4">Terminal:</span> C</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- flight-card -->
                    <!-- Map Card -->
                    <div class="map-card">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142" class="loading" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -175, -42);"><div style="width: 256px; height: 256px; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 256px; top: -256px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -175, -42);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div></div></div><div style="width: 36px; height: 62px; overflow: hidden; position: absolute; left: -18px; top: -52px; z-index: 3;"><img alt="" src="../../images/icon/map-marker.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 32px; height: 32px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -175, -42);"><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i302!3i385!4i256!2m3!1e0!2sm!3i415115160!3m14!2ses-ES!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0!23i1301875&amp;token=36166" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i385!4i256!2m3!1e0!2sm!3i415115160!3m14!2ses-ES!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0!23i1301875&amp;token=24510" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i302!3i384!4i256!2m3!1e0!2sm!3i415115160!3m14!2ses-ES!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0!23i1301875&amp;token=39440" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i384!4i256!2m3!1e0!2sm!3i415115160!3m14!2ses-ES!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjgyfHMuZTpnLmZ8cC52Om9ufHAuYzojZmZlMGVmZWYscy50OjJ8cy5lOmcuZnxwLnY6b258cC5oOiMxOTAwZmZ8cC5jOiNmZmMwZThlOCxzLnQ6M3xzLmU6Z3xwLmw6MTAwfHAudjpzaW1wbGlmaWVkLHMudDozfHMuZTpsfHAudjpvZmYscy50OjY1fHMuZTpnfHAudjpvbnxwLmw6NzAwLHMudDo2fHAuYzojZmY3ZGNkY2Q!4e0!23i1301875&amp;token=27784" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></div><div style="z-index: 4; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" title="Shapeshift Interactive" style="width: 36px; height: 62px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; touch-action: none; left: -18px; top: -52px; z-index: 3;"><img alt="" src="../../images/icon/map-marker.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 32px; height: 32px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe frameborder="0" src="about:blank" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=40.67,-73.94&amp;z=10&amp;t=m&amp;hl=es-ES&amp;gl=US&amp;mapclient=apiv3" title="Haz clic aquí para visualizar esta zona en Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 21px; top: 35px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Datos de mapas</div><div style="font-size: 13px;">Datos de mapas ©2018 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 201px; bottom: 0px; width: 135px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Datos de mapas</a><span>Datos de mapas ©2018 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Datos de mapas ©2018 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 125px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/es-ES_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Términos de uso</a></div></div><button draggable="false" title="Cambiar a la vista en pantalla completa" aria-label="Cambiar a la vista en pantalla completa" type="button" style="background: none; border: 0px; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; user-select: none; width: 25px; height: 25px; overflow: hidden; top: 0px; right: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Informar a Google acerca de errores en las imágenes o en el mapa de carreteras" href="https://www.google.com/maps/@40.67,-73.94,10z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Informar de un error de Maps</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><button draggable="false" title="Acerca la imagen" aria-label="Acerca la imagen" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Aleja la imagen" aria-label="Aleja la imagen" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none; position: absolute; left: 0px; top: 0px;"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Control del hombrecito naranja de Street View" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="El hombrecito naranja está en la parte superior del mapa" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Control del hombrecito naranja de Street View" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Girar el mapa 90 grados" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; top: 0px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div></div></div>
                            </div>
                            <div class="card-content">
                                <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                    <i class="material-icons">pin_drop</i>
                                </a>
                                <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Company Name LLC</a>
                                </h4>
                                <p class="blog-post-content">Some more information about this company.</p>
                            </div>
                            <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Company Name LLC
                          <i class="material-icons right">close</i>
                        </span>
                                <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                                <p>
                                    <i class="material-icons cyan-text text-darken-2">perm_identity</i> Manager Name</p>
                                <p>
                                    <i class="material-icons cyan-text text-darken-2">business</i> 125, ABC Street, New Yourk, USA</p>
                                <p>
                                    <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
                                <p>
                                    <i class="material-icons cyan-text text-darken-2">email</i> support@pixinvent.com</p>
                            </div>
                        </div>
                    </div>
                    <!-- Map Card -->
                </div>
                <!-- profile-page-sidebar-->
                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m8">
                    <!-- profile-page-wall-share -->
                    <div id="profile-page-wall-share" class="row">
                        <div class="col s12">
                            <ul class="tabs tab-profile z-depth-1 deep-orange accent-2">
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light active" href="#UpdateStatus">
                                        <i class="material-icons">border_color</i> Update Status</a>
                                </li>
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light" href="#AddPhotos">
                                        <i class="material-icons">camera_alt</i> Add Photos</a>
                                </li>
                                <li class="tab col s3">
                                    <a class="white-text waves-effect waves-light" href="#CreateAlbum">
                                        <i class="material-icons">photo_album</i> Create Album</a>
                                </li>
                                <li class="indicator" style="right: 531px; left: 0px;"></li></ul>
                            <!-- UpdateStatus-->
                            <div id="UpdateStatus" class="tab-content col s12 grey lighten-4 active">
                                <div class="row">
                                    <div class="col s2">
                                        <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                    </div>
                                    <div class="input-field col s10">
                                        <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                        <label for="textarea" class="">What's on your mind?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 share-icons">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">camera_alt</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">account_circle</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">keyboard</i>
                                        </a><a href="#">
                                            <i class="material-icons grey-text text-darken-1">location_on</i>
                                        </a></div><a href="#">
                                    </a><div class="col s12 m6 right-align"><a href="#">
                                            <!-- Dropdown Trigger -->
                                        </a><a class="dropdown-button btn" href="#" data-activates="profliePost">
                                            <i class="material-icons left">language</i> Public</a><ul id="profliePost" class="dropdown-content">
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">language</i> Public</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">face</i> Friends</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">lock_outline</i> Only Me</a>
                                            </li>
                                        </ul>
                                        <!-- Dropdown Structure -->

                                        <a class="waves-effect waves-light btn">
                                            <i class="material-icons left">rate_review</i> Post</a>
                                    </div>
                                </div>
                            </div>
                            <!-- AddPhotos -->
                            <div id="AddPhotos" class="tab-content col s12  grey lighten-4" style="display: none;">
                                <div class="row">
                                    <div class="col s2">
                                        <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                    </div>
                                    <div class="input-field col s10">
                                        <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                        <label for="textarea" class="">Share your favorites photos!</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 share-icons">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">camera_alt</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">account_circle</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">keyboard</i>
                                        </a><a href="#">
                                            <i class="material-icons grey-text text-darken-1">location_on</i>
                                        </a></div><a href="#">
                                    </a><div class="col s12 m6 right-align"><a href="#">
                                            <!-- Dropdown Trigger -->
                                        </a><a class="dropdown-button btn" href="#" data-activates="profliePost2">
                                            <i class="material-icons">language</i> Public</a><ul id="profliePost2" class="dropdown-content">
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">language</i> Public</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">face</i> Friends</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">lock_outline</i> Only Me</a>
                                            </li>
                                        </ul>
                                        <!-- Dropdown Structure -->

                                        <a class="waves-effect waves-light btn">
                                            <i class="material-icons left">rate_review</i> Post</a>
                                    </div>
                                </div>
                            </div>
                            <!-- CreateAlbum -->
                            <div id="CreateAlbum" class="tab-content col s12  grey lighten-4" style="display: none;">
                                <div class="row">
                                    <div class="col s2">
                                        <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                    </div>
                                    <div class="input-field col s10">
                                        <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                        <label for="textarea" class="">Create awesome album.</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 share-icons">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">camera_alt</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">account_circle</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">keyboard</i>
                                        </a><a href="#">
                                            <i class="material-icons grey-text text-darken-1">location_on</i>
                                        </a></div><a href="#">
                                    </a><div class="col s12 m6 right-align"><a href="#">
                                            <!-- Dropdown Trigger -->
                                        </a><a class="dropdown-button btn" href="#" data-activates="profliePost3">
                                            <i class="material-icons">language</i> Public</a><ul id="profliePost3" class="dropdown-content">
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">language</i> Public</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">face</i> Friends</a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="material-icons">lock_outline</i> Only Me</a>
                                            </li>
                                        </ul>
                                        <!-- Dropdown Structure -->

                                        <a class="waves-effect waves-light btn">
                                            <i class="material-icons left">rate_review</i> Post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile-page-wall-share -->
                    <!-- profile-page-wall-posts -->
                    <div id="profile-page-wall-posts" class="row">
                        <div class="col s12">
                            <!-- medium -->
                            <div id="profile-page-wall-post" class="card">
                                <div class="card-profile-title">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                        </div>
                                        <div class="col s10">
                                            <p class="grey-text text-darken-4 margin">John Doe</p>
                                            <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                                        </div>
                                        <div class="col s1 right-align">
                                            <i class="material-icons">expand_more</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image profile-medium">
                                    <img src="../../images/gallary/26.png" alt="sample" class="responsive-img profile-post-image profile-medium">
                                    <span class="card-title text-shadow">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action row">
                                    <div class="col s4 card-action-share">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">thumb_up</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">share</i>
                                        </a>
                                    </div>
                                    <div class="input-field col s8 margin">
                                        <input id="profile-comments" type="text" class="validate margin">
                                        <label for="profile-comments" class="">Comments</label>
                                    </div>
                                </div>
                            </div>
                            <!-- medium video -->
                            <div id="profile-page-wall-post" class="card">
                                <div class="card-profile-title">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                        </div>
                                        <div class="col s10">
                                            <p class="grey-text text-darken-4 margin">John Doe</p>
                                            <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                                        </div>
                                        <div class="col s1 right-align">
                                            <i class="material-icons">expand_more</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image profile-medium">
                                    <div class="video-container no-controls">
                                        <iframe width="640" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                    <span class="card-title text-shadow">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action row">
                                    <div class="col s4 card-action-share">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">thumb_up</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">share</i>
                                        </a>
                                    </div>
                                    <div class="input-field col s8 margin">
                                        <input id="profile-comments" type="text" class="validate margin">
                                        <label for="profile-comments" class="">Comments</label>
                                    </div>
                                </div>
                            </div>
                            <!-- small -->
                            <div id="profile-page-wall-post" class="card">
                                <div class="card-profile-title">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                        </div>
                                        <div class="col s10">
                                            <p class="grey-text text-darken-4 margin">John Doe</p>
                                            <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                                        </div>
                                        <div class="col s1 right-align">
                                            <i class="material-icons">expand_more</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image profile-small">
                                    <img src="../../images/gallary/20.png" alt="sample" class="responsive-img profile-post-image">
                                    <span class="card-title text-shadow">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action row">
                                    <div class="col s4 card-action-share">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">thumb_up</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">share</i>
                                        </a>
                                    </div>
                                    <div class="input-field col s8 margin">
                                        <input id="profile-comments" type="text" class="validate">
                                        <label for="profile-comments" class="">Comments</label>
                                    </div>
                                </div>
                            </div>
                            <!-- small -->
                            <div id="profile-page-wall-post" class="card">
                                <div class="card-profile-title">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="../../images/avatar/avatar-7.png" alt="" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan">
                                        </div>
                                        <div class="col s10">
                                            <p class="grey-text text-darken-4 margin">John Doe</p>
                                            <span class="grey-text text-darken-1 ultra-small">Shared publicly - 26 Jun 2015</span>
                                        </div>
                                        <div class="col s1 right-align">
                                            <i class="material-icons">expand_more</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image profile-large">
                                    <img src="../../images/gallary/3.png" alt="sample" class="responsive-img profile-post-image">
                                    <span class="card-title text-shadow">Card Title</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action row">
                                    <div class="col s4 card-action-share">
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">thumb_up</i>
                                        </a>
                                        <a href="#">
                                            <i class="material-icons grey-text text-darken-1">share</i>
                                        </a>
                                    </div>
                                    <div class="input-field col s8 margin">
                                        <input id="profile-comments" type="text" class="validate">
                                        <label for="profile-comments" class="">Comments</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile-page-wall-posts -->
                </div>
                <!--/ profile-page-wall -->
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
    var marca;
    var tipo;

    //precio carro
    var precioCarroSlider;
    var precio_carro;
    var precio_carro_max;
    var precio_carro_min;

    //Año carro
    var aCarroSlider;
    var a_carro;
    var a_carro_min;
    var a_carro_max;
    $(document).ready(function () {
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        //$('.collapsible').collapsible();

        $('select').material_select();
        marca = $("#marca_carro").val();
        tipo = $("#tipo_carro").val();

    });
    //submit form
    $("#filtro_form").submit(function (event) {
        event.preventDefault();
        //alert( "Handler for .submit() called." );
        buscador_tipo = $("#tipo_carro").val();
        buscador_marca = $('#marca_carro').val();
        buscador_linea = $('#linea_carro').val();
        buscador_combustible = $("#combustible_carro").val();
        buscador_origen = $("#origen_carro").val();
        buscador_precio_min = $("#p_carro_min").val();
        buscador_precio_max = $("#p_carro_max").val();
        buscador_a_min = $("#a_carro_min").val();
        buscador_a_max = $("#a_carro_max").val();
        var filtros;
        filtros = '<?php echo base_url()?>' + 'index.php/carro/filtro/' + buscador_tipo + '/' + buscador_marca + '/' + buscador_linea + '/' + buscador_combustible + '/' + buscador_origen + '/' + buscador_precio_min + '-' + buscador_precio_max + '/' + buscador_a_min + '-' + buscador_a_max;
        window.location.assign(filtros);
    });

    //Actualizar marcas
    $("#tipo_carro").change(function (e) {
        $('#marca_carro option').remove();
        marca = $(this).val();
        tipo = $("#tipo_carro").val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Carro/marcas?tipo=' + tipo,
            success: function (data) {
                $('#marca_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#marca_carro').append('<option value="' + value.id_marca + '">' + value.id_marca + '</option>');
                });
                $('select').material_select();
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
                $('#linea_carro').append('<option value="TODOS">TODOS</option>');
                $.each(data, function (key, value) {
                    $('#linea_carro').append('<option value="' + value.id_linea + '">' + value.id_linea + '</option>');
                });
                $('select').material_select();
                $("#linea_carro").val(buscador_linea);
            }
        });
    });
</script>
<?php $this->stop() ?>


