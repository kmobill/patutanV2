<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php require 'sidebar_right.php'; ?>

<!-- Inicio carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/banners/PORTADA-SIMULADOR.jpg" alt="First slide">
        </div>
    </div>
</div>
<!-- Fin carousel -->
<div class="main col-sm-12 col-md-12 col-lg-12">
    <div class="row" style="padding-top: 50px;">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <form action="" method="POST">
                <div class="row" style="color:#0E4760; padding-bottom: 20px;">
                    <div style="display: none" class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Fecha del Cálculo</font>
                        <input name="fechaCalculo" id="fechaActual" type="text" class="form-control" readonly>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Producto</font>
                        <select id="producto" name="producto" class="form-control">
                            <option></option>
                            <option value="20.00">MICROCRÉDITO MINORISTA</option>
                            <option value="18.50">MICROCRÉDITO</option>
                            <option value="16.50">CREDITO DE CONSUMO</option>
                            <option value="20.00">CREDITO EMERGENTE</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Monto (Dólares)</font>
                        <input onblur="validarMonto()" required id="monto" name="monto" style="height: 40px;" type="number" class="form-control">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <font size=4>Plazo (Meses)</font>
                        <select required id="plazo" name="plazo" class="form-control">
                            <option></option>
                            <option value="0.25">3</option>
                            <option value="0.50">6</option>
                            <option value="0.75">9</option>
                            <option value="1">12</option>
                            <option value="1.25">15</option>
                            <option value="1.50">18</option>
                            <option value="1.75">21</option>
                            <option value="2">24</option>
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <br>
                        <button onclick="calcular();" type="button" class="btn" id="btnCalcular" style="border-radius:10px; width: 200px; background: #54D0ED; color: white; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);">
                            <font size=4>Calcular</font>
                        </button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <br>
                        <button onclick="location.href = '../views/simuladorCreditos'" style="border-radius:10px; width: 200px; background: #EEEEEE; color: #0F154D; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);" type="button" class="btn">
                            <font size=4>Borrar todo</font>
                        </button>
                    </div>
                </div>
                <br>
                <div id="divAmortizacion" style="display: none" class="row col-sm-12 col-md-12 col-lg-12">
                    <table id="lista-tabla" class="table table-striped" style="text-align:center;">
                        <thead style="background-color: #3BCAEA;">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cuota</th>
                                <th scope="col">Capital</th>
                                <th scope="col">Interés</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="col-sm-1"></div>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<br>
<script src="../views/scripts/tblAmortizacionFranc.js" type="text/javascript"></script>
<?php require 'footer.php'; ?>

<script>
    $(document).ready(function() {
        var date = new Date();
        $("#fechaActual").val(date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
    });
</script>
<!--Scripts tabla de amortización frances-->