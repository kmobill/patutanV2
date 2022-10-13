
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

// funcion para Cargar meses del plazo al campo <select>
function microcreditoOportuno() {
    var json = {"3": "3"};
    addOptions("plazo", json);
}

function microcreditoGrupal() {
    var json = {"3": "3", "6": "6", "9": "9", "12": "12", "15": "15", "18": "18", "24": "24"};
    addOptions("plazo", json);
}

function microcreditoNormal() {
    var json = {"3": "3", "6": "6", "9": "9", "12": "12", "15": "15", "18": "18", "24": "24", "30": "30", "36": "36", "48": "48"};
    addOptions("plazo", json);
}

function microcreditoConsumo() {
    var json = {"3": "3", "6": "6", "9": "9", "12": "12", "15": "15", "18": "18"};
    addOptions("plazo", json);
}

// Rutina para agregar opciones a un <select>
function addOptions(domElement, json) {
    var select = document.getElementsByName(domElement)[0];

    Object.keys(json).forEach(function (elm) {
        var option = document.createElement("option");
        option.text = elm;
        select.add(option);
    })
}

function removerOption() {
    var selectElement = document.getElementById("plazo");

    while (selectElement.length > 0) {
        selectElement.remove(0);
    }
}

function agregarPlazo() {
    var cmbProducto = document.getElementById("producto");
    var selected = cmbProducto.options[cmbProducto.selectedIndex].text;
    if (selected == '') {
        alert("Seleccione un producto para continuar!...")
    } else {
        if (selected == "MICROCRÉDITO OPORTUNO") {
            removerOption();
            microcreditoOportuno();
        }
        if (selected == "MICROCRÉDITO GRUPAL") {
            removerOption();
            microcreditoGrupal();
        }
        if (selected == "MICROCRÉDITO NORMAL") {
            removerOption();
            microcreditoNormal();
        }
        if (selected == "MICROCRÉDITO DE CONSUMO") {
            removerOption();
            microcreditoConsumo();
        }
    }
}

function validarMonto() {
    var cmbProducto = document.getElementById("producto");
    var valMonto = document.getElementById("monto").value;
    var selected = cmbProducto.options[cmbProducto.selectedIndex].text;
    if (selected == '') {
        alert("Seleccione un producto para continuar!...")
    } else {
        if (selected == "MICROCRÉDITO OPORTUNO") {
            if (valMonto > 4000) {
                alert("Monto máximo hasta $4000");
            }
        }
        if (selected == "MICROCRÉDITO GRUPAL") {
            if (valMonto > 2000) {
                alert("Monto máximo hasta $2000");
            }
        }
        if (selected == "MICROCRÉDITO NORMAL") {
            if (valMonto > 20000) {
                alert("Monto máximo hasta $20000");
            }
        }
        if (selected == "MICROCRÉDITO DE CONSUMO") {
            if (valMonto > 2000) {
                alert("Monto máximo hasta $2000");
            }
        }
    }
}

function calcularCuota(monto, interes, plazo) {
    var cmbProducto = document.getElementById("producto");
    var selected = cmbProducto.options[cmbProducto.selectedIndex].text;
    if (selected == "MICROCRÉDITO OPORTUNO") {
        while (llenarTabla.firstChild) {
            llenarTabla.removeChild(llenarTabla.firstChild);
        }

        let fechas = [];
        let fechaActual = Date.now();
        let mes_actual = moment(fechaActual);
        mes_actual.add(3, 'month');

        let pagoInteres = 0, pagoCapital = 0, cuota = 0;

        cuota = (monto * (Math.pow(1 + interes / 100, plazo) * interes / 100) / (Math.pow(1 + interes / 100, plazo) - 1))*3;

        pagoInteres = parseFloat(monto * (interes / 100));
        pagoCapital = (cuota - pagoInteres);
        monto = 0;

        //Formato fechas
        var fecha = mes_actual.format('DD-MM-YYYY');
        mes_actual.add(3, 'month');

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${fecha}</td>
            <td>${cuota.toFixed(2)}</td>
            <td>${pagoCapital.toFixed(2)}</td>
            <td>${pagoInteres.toFixed(2)}</td>
            <td>${monto.toFixed(2)}</td>
        `;
        llenarTabla.appendChild(row);
    } else {

        while (llenarTabla.firstChild) {
            llenarTabla.removeChild(llenarTabla.firstChild);
        }

        let fechas = [];
        let fechaActual = Date.now();
        let mes_actual = moment(fechaActual);
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
            llenarTabla.appendChild(row)
        }
    }
}