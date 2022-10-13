<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Método amortización francés</title>

</head>

<!-- llamada a bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-5">
                <center>
                    <div class="card border-success mb-3" style="max-width: 50rem;">
                        <div class="card-header">
                            <b>Simulador de Crédito</b>
                            <br>
                            <h6 class="card-title">Calcula tu cuota mensual</h6>
                        </div>
                        <div class="card-body text-success">

                            <div class="form-group">
                                <label for="producto">Producto</label>
                                <select id="producto" name="producto" class="form-control">
                                    <option></option>
                                    <option value="17.50">MICROCRÉDITO</option>
                                    <option value="16.00">CRÉDITO DE CONSUMO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="monto">Monto del Crédito ($)</label>
                                <input onblur="validarMonto()" type="number" class="form-control" id="monto" value="100" min="100" max="40000" placeholder="Por favor, escriba un monto">
                            </div>
                            <div class="form-group">
                                <label for="plazo">Plazo (meses)</label>
                                <input type="number" class="form-control" id="plazo" value="3" min="3" max="60" placeholder="Por favor, escriba un número entre 3 y 60.">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm btn-block" id="btnCalcular">Calcular</button>
                            <br>
                            <button type="submit" class="btn btn-secondary btn-sm btn-block" id="btnDescargarPDF" onclick="printPage()">Imprimir</button>
                        </div>
                    </div>
                </center>
                <script type="text/javascript" language="javascript1.2">
                    function printPage() {
                        document.getElementById('btnDescargarPDF').style.visibility = 'hidden';
                        // Do print the page
                        if (typeof(window.print) != 'undefined') {
                            window.print();
                        }
                        document.getElementById('btnDescargarPDF').style.visibility = '';
                    }
                </script>
            </div>

            <div class="col-7">
                <h3 class="text-center text-success card border">Tabla de Amortización</h3>
                <table style="display: flex; align-items: center; justify-content: center;" id="lista-tabla" class="text-center table card border">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cuota</th>
                            <th>Capital</th>
                            <th>Interés</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const monto = document.getElementById('monto');
        const plazo = document.getElementById('plazo');
        const interesAnual = document.getElementById('producto');
        const btnCalcular = document.getElementById('btnCalcular');
        const llenarTabla = document.querySelector('#lista-tabla tbody');
        const amortizacion = [];

        btnCalcular.addEventListener('click', () => {
            const interes = parseFloat(interesAnual.value) / 12;
            calcularCuota(monto.value, interes, plazo.value);
        });

        function calcularCuota(monto, interes, plazo) {

            while (llenarTabla.firstChild) {
                llenarTabla.removeChild(llenarTabla.firstChild);
            }

            let fechas = [];
            let date = new Date();
            let day = date.getDate();
            let month = date.getMonth(date.setMonth(date.getMonth() + 2));
            let year = date.getFullYear();
            let pagoInteres = 0,
                pagoCapital = 0,
                cuota = 0;
            cuota = monto * (Math.pow(1 + interes / 100, plazo) * interes / 100) / (Math.pow(1 + interes / 100, plazo) - 1);

            for (let i = 0; i <= plazo; i++) {
                if (i == 0) {
                    monto = parseFloat(monto);

                    const row = document.createElement('tr');
                    row.innerHTML = `
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>${monto.toFixed(2)}</td>
                                    `;
                    llenarTabla.appendChild(row);
                } else {
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
                    llenarTabla.appendChild(row);
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
                if (selected == "MICROCRÉDITO MINORISTA") {
                    if (valMonto >= 0 && valMonto <= 3000) {
                        console.log("Monto aceptado hasta $40000");
                    } else {
                        alert("Monto aceptado hasta $40000");
                    }
                }
                if (selected == "MICROCRÉDITO") {
                    if (valMonto >= 0 && valMonto <= 20000) {
                        console.log("Monto aceptado hasta $40000");
                    } else {
                        alert("Monto aceptado hasta $40000");
                    }
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>