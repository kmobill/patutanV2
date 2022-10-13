var tabla;
function init() { /* función inicial */
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
    $("#divAtras").hide();
}

$("#divNoticia1").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").show();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia2").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").show();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia3").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").show();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia4").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").show();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia5").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").show();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia6").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").show();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia7").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").show();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia8").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").show();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

$("#divNoticia9").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").show();
    $("#galeria10").hide();
});

$("#divNoticia10").click(function () {
    $("#divAtras").show();
    $("#divPortada").hide();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").show();
});

$("#divAtras").click(function () {
    $("#divAtras").hide();
    $("#divPortada").show();
    $("#galeria1").hide();
    $("#galeria2").hide();
    $("#galeria3").hide();
    $("#galeria4").hide();
    $("#galeria5").hide();
    $("#galeria6").hide();
    $("#galeria7").hide();
    $("#galeria8").hide();
    $("#galeria9").hide();
    $("#galeria10").hide();
});

//// Funcion que se ejecuta al hacer click sobre una imagen
//$("#galeria1").click(function (event) {
//    
////    console.log((event.target.id));
//    
//    // Posicionamos las capas
//    $('#background').css('height', $(document).height());
//    $('#preview').css('top', (($(window).height() / 2) - ($('#preview').height() / 2) + $(document).scrollTop()));
//    $('#preview').css('left', ($(document).width() / 2) - ($('#preview').width() / 2));
//    // Cargamos la imagen en la capa grande
//    $('#content').html("<img src='" + $(this).attr("src") + "'>");
//    // Mostramos las capas
//    $('#preview').fadeIn();
//    $('#background').fadeIn();
//});
//
//// Cerramos las capas al pulsar sobre el fondo
//$("#background").click(function () {
//    $('#background').fadeOut();
//    $('#preview').fadeOut();
//});
//// Cerramos las capas al pulsar sobre la cruz
//$("#close").click(function () {
//    $('#background').fadeOut();
//    $('#preview').fadeOut();
//});



init(); /* ejecuta la función inicial */

