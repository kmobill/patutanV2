
const monto = document.getElementById('monto');
const plazo = document.getElementById('plazo');
const interesAnual = document.getElementById('producto');
const btnCalcular = document.getElementById('btnCalcular');
const llenarTabla = document.querySelector('#lista-tabla tbody');
const amortizacion = [];

function calcular() {
    const interes = parseFloat(interesAnual.value) / parseFloat(plazo.value);
    calcularCuota(monto.value, interes, plazo.value);
}

function calcularCuota(monto, interes, plazo) {

    while (llenarTabla.firstChild) {
        llenarTabla.removeChild(llenarTabla.firstChild);
    }

    let fechas = [];
    let date = new Date();

    let day = date.getDate();
    let month = date.getMonth(date.setMonth(date.getMonth() + 2));
    let year = date.getFullYear();


    let pagoInteres = 0, pagoCapital = 0, cuota = 0;

    cuota = monto * (Math.pow(1 + interes / 100, plazo) * interes / 100) / (Math.pow(1 + interes / 100, plazo) - 1);

    for (let i = 1; i <= plazo; i++) {

        pagoInteres = parseFloat(monto * (interes / 100));
        pagoCapital = cuota - pagoInteres;
        monto = parseFloat(monto - pagoCapital);

        //Formato fechas
        if (month < 10 && month >= 1) {
            fechas[i] = `${day}-0${month}-${year}`;
        } else {
            if (month == 0) {
                fechas[i] = `${day}-${12}-${year - 1}`;
            } else {
                fechas[i] = `${day}-${month}-${year}`;
            }
        }
        date.setMonth(date.getMonth() + 1);
        day = date.getDate();
        month = date.getMonth();
        year = date.getFullYear();
        
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
