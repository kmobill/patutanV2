let cadena = $(location).attr('href');
let paginaAhorros = cadena.indexOf('ahorros');
let paginaInversiones = cadena.indexOf('inversiones');
let paginaCreditos = cadena.indexOf('creditos');
let paginaServicios = cadena.indexOf('servicios');

let paginaNosotros = cadena.indexOf('nosotros');
let paginaContactanos = cadena.indexOf('contactanos');
let paginaEducacionFinanciera = cadena.indexOf('educacionFinanciera');
let paginaBlogNoticias = cadena.indexOf('blogNoticias');

if (paginaAhorros !== -1) {
    $('#itemServicios').css('background-color', '#05BBDF40');
}

if (paginaInversiones !== -1) {
    $('#itemServicios').css('background-color', '#05BBDF40');
}

if (paginaCreditos !== -1) {
    $('#itemServicios').css('background-color', '#05BBDF40');
}

if (paginaServicios !== -1) {
    $('#itemServicios').css('background-color', '#05BBDF40');
}
if (paginaNosotros !== -1) {
    $('#itemNosotros').css('background-color', '#05BBDF40');
}

if (paginaContactanos !== -1) {
    $('#itemContactanos').css('background-color', '#05BBDF40');
}

if (paginaEducacionFinanciera !== -1) {
    $('#itemEducacionFinanciera').css('background-color', '#05BBDF40');
}

if (paginaBlogNoticias !== -1) {
    $('#itemNoticias').css('background-color', '#05BBDF40');
}


var nav = $('#top_navigation > ul > li');
nav.hover(
        function () {
            $('ul', this).stop(true, true).slideDown('fast');
        },
        function () {
            $('ul', this).slideUp('fast');
        }
);

// Cambio entre los menús desplegables que se mantienen en la página
$('#inicio').hover(function () {
    $('#menuNosotros').hide();
    $('#menuServicios').hide();
}, function () {
    if ($('#menuServicios').hover('', function () {
        $('#menuServicios').hide();
    })) {
    }
});

$('#itemServicios').hover(function () {
    $('#menuNosotros').hide();
    $('#menuServicios').show();
//    $('#servicios').css('color', 'Black');
//    $("#servicios").css("background-color", "#000000");
}, function () {
    if ($('#menuServicios').hover('', function () {
        $('#menuServicios').hide();
    })) {
    }
});

$('#itemNosotros').hover(function () {
    $('#menuServicios').hide();
    $('#menuNosotros').show();
}, function () {
    if ($('#menuNosotros').hover('', function () {
        $('#menuNosotros').hide();
    })) {
    }
});

$('#temContactanos').hover(function () {
    $('#menuNosotros').hide();
    $('#menuServicios').hide();
}, function () {
    if ($('#menuServicios').hover('', function () {
        $('#menuServicios').hide();
    })) {
    }
});

$('#itemNoticias').hover(function () {
    $('#menuNosotros').hide();
    $('#menuServicios').hide();
}, function () {
    if ($('#menuServicios').hover('', function () {
        $('#menuServicios').hide();
    })) {
    }
});
// fin de los cambios entre menús

$(window).resize(function () {
    if (window.innerWidth < 582) {
        $("#menuServicios").css("width", "450px");
        $("#pnlProductosServicios").css("text-align", "center");
        $("#pnlInformativo").css("text-align", "center");
        $("#imgAhorroProgramado1").hide();
        $("#imgAhorroProgramado2").show();
        $("#imgChiquiahorro1").hide();
        $("#imgChiquiahorro2").show();
        $("#imgCreditoConsumo1").hide();
        $("#imgCreditoConsumo2").show();
    } else {
        $("#menuServicios").css("width", "700px");
        $("#pnlProductosServicios").css("text-align", "left");
        $("#pnlInformativo").css("text-align", "left");
        $("#imgAhorroProgramado1").show();
        $("#imgAhorroProgramado2").hide();
        $("#imgChiquiahorro1").show();
        $("#imgChiquiahorro2").hide();
        $("#imgCreditoConsumo1").show();
        $("#imgCreditoConsumo2").hide();
    }
});

if (window.innerWidth < 582) {
    $("#menuServicios").css("width", "450px");
    $("#pnlProductosServicios").css("text-align", "center");
    $("#pnlInformativo").css("text-align", "center");
    $("#imgAhorroProgramado1").hide();
    $("#imgAhorroProgramado2").show();
    $("#imgChiquiahorro1").hide();
    $("#imgChiquiahorro2").show();
    $("#imgCreditoConsumo1").hide();
    $("#imgCreditoConsumo2").show();
} else {
    $("#menuServicios").css("width", "700px");
    $("#pnlProductosServicios").css("text-align", "left");
    $("#pnlInformativo").css("text-align", "left");
    $("#imgAhorroProgramado1").show();
    $("#imgAhorroProgramado2").hide();
    $("#imgChiquiahorro1").show();
    $("#imgChiquiahorro2").hide();
    $("#imgCreditoConsumo1").show();
    $("#imgCreditoConsumo2").hide();
}