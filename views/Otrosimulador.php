<?php require '../views/header.php'; ?>
<?php require '../views/menu.php'; ?>

<div class="container-fluid">
    <div id="imgHeader" class="row" style="justify-content:center; align-items:center; height: 600px; overflow:hidden;">
        <img class="img-fluid" style="width: 100%;" src="../images/banners/Baner Creditos.jpg" alt="">
        <div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom: 10px; text-align: center; position: absolute;  background: rgba(255, 255, 255, 0.75); border-radius: 20px; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);">
            <!--<div style="text-align: center; position: absolute;  background: rgba(255, 255, 255, 0.75); border-radius: 20px; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);">-->
            <div class="col-sm" style="color: #181E5B; padding-right: 100px; padding-left: 100px;">
                <div class="row">
                    <h1>Simulador de Créditos</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top: 50px;">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <form action="" method="POST">
                <div class="row" style="color: #0F154D; padding-bottom: 20px;">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Fecha del Cálculo</font>
                        <input name="fechaCalculo" id="fechaActual" type="text" class="form-control" readonly>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size="4">Producto</font>
                        <select onchange="agregarPlazo()" id="producto" name="producto" class="form-control">
                            <option></option>
                            <option value="6.00">MICROCRÉDITO OPORTUNO</option>
                            <option value="19.92">MICROCRÉDITO GRUPAL</option>
                            <option value="20.00">MICROCRÉDITO NORMAL</option>
                            <option value="17.30">MICROCRÉDITO DE CONSUMO</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Monto (Dólares)</font>
                        <input onblur="validarMonto()" required id="monto" name="monto" style="height: 40px;" type="number" class="form-control">
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Plazo (Meses)</font>
                        <select required id="plazo" name="plazo" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4"></div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button onclick="calcular()" type="button" class="btn" id="btnCalcular" style="border-radius:10px; width: 200px; background: #54D0ED; color: white; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);">
                            <font size=4>Calcular</font>
                        </button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button onclick="location.href = '../views/Otrosimulador'" style="border-radius:10px; width: 200px; background: #EEEEEE; color: #0F154D; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);" type="button" class="btn">
                            <font size=4>Borrar todo</font>
                        </button>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4"></div>
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
<?php require '../views/footer.php'; ?>
<script src="scripts/tblAmortz.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        var date = new Date();
        $("#fechaActual").val(date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
    });
</script>