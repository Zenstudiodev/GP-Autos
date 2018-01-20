var banner_id;
var banner_id_v;

$("#header_banners .item a").click(function () {

banner_id = $(this).attr('banner_id');
    console.log( "click en banner " + banner_id );

    Banner_data = {
        banner_id: banner_id
    };

    $.ajax({
        type: 'POST',
        url: 'http://gpautos.net/index.php/banners/guardar_click',
        data: Banner_data,

        success: function (data) {
            //console.log(data);
        }
    });
});

$('#header_banners .item').each( function () {
   banner_id_v = $(this).find("a").attr('banner_id');
    // do something…8l
    //console.log('Slidek  ' +banner_id_v);

    Banner_data = {
        banner_id_v: banner_id_v
    };

    $.ajax({
        type: 'POST',
        url: 'http://gpautos.net/index.php/banners/guardar_visualizacion',
        data: Banner_data,
        success: function (data) {
          //  console.log(data);
        }
    });
});
