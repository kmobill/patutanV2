var pn, interes;
const monto = document.getElementById('monto');
const plazo = document.getElementById('plazo');
const btnCalcular = document.getElementById('btnCalcular');
const eliminarOpt = document.getElementById('ocultar');
const llenarTabla = document.querySelector('#lista-tabla tbody');
const llenarPlazo = document.querySelector('#plazo');

function mostrarPN() {
    div = document.getElementById('divSimulador');
    div.style.display = '';
    pn = "Persona Natural";
//    eliminarOpt.style.display = '';
}

function mostrarPJ() {
    div = document.getElementById('divSimulador');
    div.style.display = '';
    pn = "Persona Juridica";
//    eliminarOpt.style.display = 'none';
}

function mostrar() {
    div = document.getElementById('divAmortizacion');
    div.style.display = '';
}


function calcular() {
    var valPlazo = document.getElementById("plazo").value;
    var valMonto = document.getElementById("monto").value;

    if (valMonto < 50) {
        alert("La inversión minima es de $50!...")
    } else {
        mostrar();
        calcularInteres(pn, monto.value, plazo.value);
        console.log(monto.value);
    }
}

function tipoPago() {
    var tipoPago = document.getElementById("tipo").value;
    if (tipoPago == 'Mensual' || tipoPago == 'Al vencimiento') {
        mes1 = document.getElementById('mes1').style.display = '';
        mes2 = document.getElementById('mes2').style.display = '';
        mes3 = document.getElementById('mes3').style.display = '';
        mes4 = document.getElementById('mes4').style.display = '';
        mes5 = document.getElementById('mes5').style.display = '';
        mes6 = document.getElementById('mes6').style.display = '';
        mes7 = document.getElementById('mes7').style.display = '';
        mes8 = document.getElementById('mes8').style.display = '';
        mes9 = document.getElementById('mes9').style.display = '';
        mes10 = document.getElementById('mes10').style.display = '';
        mes11 = document.getElementById('mes11').style.display = '';
        mes12 = document.getElementById('mes12').style.display = '';
        mesSup = document.getElementById('mesSup').style.display = '';
    } else if (tipoPago == 'Bimensual') {
        mes1 = document.getElementById('mes1').style.display = 'none';
        mes2 = document.getElementById('mes2').style.display = '';
        mes3 = document.getElementById('mes3').style.display = 'none';
        mes4 = document.getElementById('mes4').style.display = '';
        mes5 = document.getElementById('mes5').style.display = 'none';
        mes6 = document.getElementById('mes6').style.display = '';
        mes7 = document.getElementById('mes7').style.display = 'none';
        mes8 = document.getElementById('mes8').style.display = '';
        mes9 = document.getElementById('mes9').style.display = 'none';
        mes10 = document.getElementById('mes10').style.display = '';
        mes11 = document.getElementById('mes11').style.display = 'none';
        mes12 = document.getElementById('mes12').style.display = '';
        mesSup = document.getElementById('mesSup').style.display = '';
    } else if (tipoPago == 'Trimestral') {
        mes1 = document.getElementById('mes1').style.display = 'none';
        mes2 = document.getElementById('mes2').style.display = 'none';
        mes3 = document.getElementById('mes3').style.display = '';
        mes4 = document.getElementById('mes4').style.display = 'none';
        mes5 = document.getElementById('mes5').style.display = 'none';
        mes6 = document.getElementById('mes6').style.display = '';
        mes7 = document.getElementById('mes7').style.display = 'none';
        mes8 = document.getElementById('mes8').style.display = 'none';
        mes9 = document.getElementById('mes9').style.display = '';
        mes10 = document.getElementById('mes10').style.display = 'none';
        mes11 = document.getElementById('mes11').style.display = 'none';
        mes12 = document.getElementById('mes12').style.display = '';
        mesSup = document.getElementById('mesSup').style.display = '';
    } else {
        mes1 = document.getElementById('mes1').style.display = 'none';
        mes2 = document.getElementById('mes2').style.display = 'none';
        mes3 = document.getElementById('mes3').style.display = 'none';
        mes4 = document.getElementById('mes4').style.display = 'none';
        mes5 = document.getElementById('mes5').style.display = 'none';
        mes6 = document.getElementById('mes6').style.display = 'none';
        mes7 = document.getElementById('mes7').style.display = 'none';
        mes8 = document.getElementById('mes8').style.display = 'none';
        mes9 = document.getElementById('mes9').style.display = 'none';
        mes10 = document.getElementById('mes10').style.display = 'none';
        mes11 = document.getElementById('mes11').style.display = 'none';
        mes12 = document.getElementById('mes12').style.display = 'none';
        mesSup = document.getElementById('mesSup').style.display = 'none';
    }
}

function calcularInteres(pn, monto, plazo) {
    while (llenarTabla.firstChild) {
        llenarTabla.removeChild(llenarTabla.firstChild);
    }
    
    if (monto != '' && plazo != '') {
        if (pn == "Persona Natural") {
            if ((monto >= 50 && monto <= 100) && (plazo >= 30 && plazo <= 60)) {
                interes = "7.00";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 61 && plazo <= 90)) {
                interes = "7.25";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 91 && plazo <= 180)) {
                interes = "7.50";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 181 && plazo <= 360)) {
                interes = "7.75";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 361)) {
                interes = "8.00";
            }
            if ((monto >= 100.01 && monto <= 5000) && (plazo >= 30 && plazo <= 60)) {
                interes = "8.25";
            }
            if ((monto >= 100.01 && monto <= 5000) && (plazo >= 61 && plazo <= 90)) {
                interes = "8.50";
            }
            if ((monto >= 100.01 && monto <= 5000) && (plazo >= 91 && plazo <= 180)) {
                interes = "8.75";
            }
            if ((monto >= 100.01 && monto <= 5000) && (plazo >= 181 && plazo <= 360)) {
                interes = "9.00";
            }
            if ((monto >= 100.01 && monto <= 5000) && (plazo >= 361)) {
                interes = "9.25";
            }
            if ((monto >= 5000.01 && monto <= 15000) && (plazo >= 30 && plazo <= 60)) {
                interes = "9.30";
            }
            if ((monto >= 5000.01 && monto <= 15000) && (plazo >= 61 && plazo <= 90)) {
                interes = "9.40";
            }
            if ((monto >= 5000.01 && monto <= 15000) && (plazo >= 91 && plazo <= 180)) {
                interes = "9.50";
            }
            if ((monto >= 5000.01 && monto <= 15000) && (plazo >= 181 && plazo <= 360)) {
                interes = "9.60";
            }
            if ((monto >= 5000.01 && monto <= 15000) && (plazo >= 361)) {
                interes = "9.70";
            }
            if ((monto >= 15000.01) && (plazo >= 30 && plazo <= 60)) {
                interes = "9.75";
            }
            if ((monto >= 15000.01) && (plazo >= 61 && plazo <= 90)) {
                interes = "9.80";
            }
            if ((monto >= 15000.01) && (plazo >= 91 && plazo <= 180)) {
                interes = "9.90";
            }
            if ((monto >= 15000.01) && (plazo >= 181 && plazo <= 360)) {
                interes = "10.00";
            }
            if ((monto >= 15000.01) && (plazo >= 361)) {
                interes = "10.10";
            }
        } else {
            if ((monto >= 50 && monto <= 100) && (plazo >= 30 && plazo <= 60)) {
                interes = "6.00";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 61 && plazo <= 90)) {
                interes = "6.10";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 91 && plazo <= 180)) {
                interes = "6.25";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 181 && plazo <= 360)) {
                interes = "6.30";
            }
            if ((monto >= 50 && monto <= 100) && (plazo >= 361)) {
                interes = "6.50";
            }
            if ((monto >= 100.01 && monto <= 15000) && (plazo >= 30 && plazo <= 60)) {
                interes = "6.60";
            }
            if ((monto >= 100.01 && monto <= 15000) && (plazo >= 61 && plazo <= 90)) {
                interes = "6.75";
            }
            if ((monto >= 100.01 && monto <= 15000) && (plazo >= 91 && plazo <= 180)) {
                interes = "6.90";
            }
            if ((monto >= 100.01 && monto <= 15000) && (plazo >= 181 && plazo <= 360)) {
                interes = "7.00";
            }
            if ((monto >= 100.01 && monto <= 15000) && (plazo >= 361)) {
                interes = "7.25";
            }
            if ((monto >= 15000.01) && (plazo >= 30 && plazo <= 60)) {
                interes = "7.30";
            }
            if ((monto >= 15000.01) && (plazo >= 61 && plazo <= 90)) {
                interes = "7.40";
            }
            if ((monto >= 15000.01) && (plazo >= 91 && plazo <= 180)) {
                interes = "7.40";
            }
            if ((monto >= 15000.01) && (plazo >= 181 && plazo <= 360)) {
                interes = "7.75";
            }
            if ((monto >= 15000.01) && (plazo >= 361)) {
                interes = "8.00";
            }
        }
        var interesGenerado = (monto * plazo * interes) / 36000;
        var total = parseFloat(parseFloat(monto) + parseFloat(interesGenerado));
    } else {
        alert('Llene todos los campos, por favor!...')
    }
    const row = document.createElement('tr');
    row.innerHTML = `
            <td>${monto}</td>
            <td>${plazo}</td>
            <td>${interes + "%"}</td>
            <td>${interesGenerado.toFixed(2)}</td>
            <td>${total.toFixed(2)}</td>
        `;
    llenarTabla.appendChild(row);
}
