
const monto = document.getElementById('monto');
const plazo = document.getElementById('plazo');
const interesAnual = document.getElementById('producto');
const btnCalcular = document.getElementById('btnCalcular');
const llenarTabla = document.querySelector('#lista-tabla tbody');

function mostrar() {
    div = document.getElementById('divAmortizacion');
    div.style.display = '';
}

function calcular() {
    mostrar();
    const interes = parseFloat(interesAnual.value) / parseFloat(plazo.value);
    calcularCuota(monto.value, interes, plazo.value);
}

function calcularCuota(monto, interes, plazo) {
    while (llenarTabla.firstChild) {
        llenarTabla.removeChild(llenarTabla.firstChild);
    }

    let fechas = [];
    let fechaActual = Date.now();
    let mes_actual = moment(fechaActual);
    console.log(mes_actual);
    mes_actual.add(1, 'month');

    let pagoInteres = 0, pagoCapital = 0, cuota = 0;

    cuota = monto * (Math.pow(1 + interes / 100, plazo) * interes / 100) / (Math.pow(1 + interes / 100, plazo) - 1);

    for (let i = 1; i <= plazo; i++) {

        pagoInteres = parseFloat(monto * (interes / 100));
        pagoCapital = cuota - pagoInteres;
        monto = parseFloat(monto - pagoCapital);

        //Formato fechas
        fechas[i] = mes_actual.format('DD-MM-YYYY');
        mes_actual.add(1, 'month');

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${fechas[i]}</td>
            <td>${cuota.toFixed(2)}</td>
            <td>${pagoCapital.toFixed(2)}</td>
            <td>${pagoInteres.toFixed(2)}</td>
            <td>${monto.toFixed(2)}</td>
        `;
        llenarTabla.appendChild(row);
    }
}

function validarMonto() {
    var cmbProducto = document.getElementById("producto");
    var valMonto = document.getElementById("monto").value;
    var selected = cmbProducto.options[cmbProducto.selectedIndex].text;
    if (selected == '') {
        alert("Seleccione un producto para continuar!...")
    } else {
        console.log("ingresa");
        if (selected == "MICROCR??DITO MINORISTA") {
            if (valMonto >= 1000 && valMonto <= 3000) {
                console.log("Monto aceptado entre $1000 and $3000");
            } else {
                alert("Monto aceptado entre $1000 and $3000");
            }
        }
        if (selected == "MICROCR??DITO") {
            if (valMonto >= 3000 && valMonto <= 20000) {
                console.log("Monto aceptado entre $3000 and $20000");
            } else {
                alert("Monto aceptado entre $3000 and $20000");
            }
        }
        if (selected == "CREDITO DE CONSUMO") {
            if (valMonto > 20000) {
                alert("Monto m??ximo hasta $20000");
            }
        }
        if (selected == "CREDITO EMERGENTE") {
            if (valMonto > 2000) {
                alert("Monto m??ximo hasta $2000");
            }
        }
    }
}