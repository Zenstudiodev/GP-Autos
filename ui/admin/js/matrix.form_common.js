$(document).ready(function () {

    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();

    $('select').select2(
        {
            width: 'resolve',
            theme: "classic"
        }
    );
    $('.colorpicker').colorpicker();
    $('.datepicker').datepicker();
});

$(document).ready(function () {

    //------------- Tags plugin  -------------//

    $("#tags").select2({
        tags: ["red", "green", "blue", "orange"]
    });

    //------------- Elastic textarea -------------//
    if ($('textarea').hasClass('elastic')) {
        $('.elastic').elastic();
    }

    //------------- Input limiter -------------//
    if ($('textarea').hasClass('limit')) {
        $('.limit').inputlimiter({
            limit: 100
        });
    }

    //------------- Masked input fields -------------//
    $("#mask-phone").mask("(999) 999-9999", {
        completed: function () {
            alert("Callback action after complete");
        }
    });
    $("#mask-phoneExt").mask("(999) 999-9999? x99999");
    $("#mask-phoneInt").mask("+40 999 999 999");
    $("#mask-date").mask("99/99/9999");
    $("#mask-ssn").mask("999-99-9999");
    $("#mask-productKey").mask("a*-999-a999", {placeholder: "*"});
    $("#mask-eyeScript").mask("~9.99 ~9.99 999");
    $("#mask-percent").mask("99%");

    //------------- Toggle button  -------------//

    /*$('.normal-toggle-button').toggleButtons();
    $('.text-toggle-button').toggleButtons({
        width: 140,
        label: {
            enabled: "ONLINE",
            disabled: "OFFLINE"
        }
    });
    $('.iToggle-button').toggleButtons({
        width: 70,
        label: {
            enabled: "<span class='icon16 icomoon-icon-checkmark-2 white'></span>",
            disabled: "<span class='icon16 icomoon-icon-cancel-3 white marginL5'></span>"
        }
    });*/

    //------------- Spinners with steps  -------------//
    /*$( "#spinner1" ).spinner();

    /!*Demacial*!/
    $( "#spinner2" ).spinner({
      step: 0.01,
      numberFormat: "n"
    });

    /!*Custom step size*!/
    $( "#spinner3" ).spinner({
      step: 5
    });

    /!*Currency spinner*!/
    $( "#spinner4" ).spinner({
        numberFormat: "C"
    });*/

    //------------- Colorpicker -------------//
    if ($('div').hasClass('picker')) {
        $('.picker').farbtastic('#color');
    }
    //------------- Datepicker -------------//
    if ($('#datepicker').length) {
        $("#datepicker").datepicker({
            showOtherMonths: true
        });
    }
    if ($('#datepicker-inline').length) {
        $('#datepicker-inline').datepicker({
            inline: true,
            showOtherMonths: true
        });
    }

    //------------- Combined picker -------------//
    if ($('#combined-picker').length) {
        $('#combined-picker').datetimepicker();
    }

    //------------- Time entry (picker) -------------//
    /*$('#timepicker').timeEntry({
        show24Hours: true,
        spinnerImage: ''
    });
    $('#timepicker').timeEntry('setTime', '22:15')
*/
    //------------- Select plugin -------------//
    $("#select1").select2();
    $("#select2").select2();

    //--------------- Dual multi select ------------------//
    //$.configureBoxes();

    //--------------- Tinymce ------------------//
    /* $('textarea.tinymce').tinymce({
         // Location of TinyMCE script
         script_url: 'plugins/forms/tiny_mce/tiny_mce.js',

         // General options
         theme: "advanced",
         plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

         // Theme options
         theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
         theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
         theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
         theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
         theme_advanced_toolbar_location: "top",
         theme_advanced_toolbar_align: "left",
         theme_advanced_statusbar_location: "bottom",
         theme_advanced_resizing: true,

         // Example content CSS (should be your site CSS)
         content_css: "css/main.css",

         // Drop lists for link/image/media/template dialogs
         template_external_list_url: "lists/template_list.js",
         external_link_list_url: "lists/link_list.js",
         external_image_list_url: "lists/image_list.js",
         media_external_list_url: "lists/media_list.js",

         // Replace values for the template plugin
         template_replace_values: {
             username: "SuprUser",
             staffid: "991234"
         }
     });*/

    //Boostrap modal
    $('#myModal').modal({show: false});

    //add event to modal after closed
    $('#myModal').on('hidden', function () {
        console.log('modal is closed');
    })

});//End document ready functions

