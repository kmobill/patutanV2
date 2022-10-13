<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php require 'sidebar_right.php'; ?>
<!-- Inicio carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/banners/INVERSIONES.jpg" alt="First slide">
        </div>
    </div>
</div>
<!-- Fin carousel -->
<div class="barra">
    <h3>Tu dinero trabaja por ti</h3>
</div>
<div class="main col-sm-12 col-md-12 col-lg-12">
    <!--    <div id="imgHeader" class="row" style="height: 600px; overflow:hidden; justify-content:center; align-items:center;">
            <img class="img-fluid" style="width: 100%;" src="./images/ARCHIVOS NUEVOS/Imagenes Banners/Banner polizas a plazo fijo.png">
            <div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom: 10px; text-align: center; position: absolute;  background: rgba(255, 255, 255, 0.75); border-radius: 20px; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);">
                <div id="serviciosRequisitos" style="text-align: center; position: absolute;  background: rgba(255, 255, 255, 0.75); border-radius: 20px; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);">
                <div class="col-sm" style="color: #181E5B; padding-right: 100px; padding-left: 100px;">
                    <div class="row" style="">
                        <h1>Póliza a Plazo Fijo</h1>
                    </div>
                </div>
            </div>
        </div>-->

    <div class="row" style="padding-top: 50px;">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <form style="color:#0E4760;" action="" method="POST">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="justify-content:center; text-align: center;">
                        <a onclick="mostrarPN()">
                            <img width="100%" src="../images/simuladores/PERSONAS-NATURALES.png" alt="" />
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="justify-content:center; text-align: center;">
                        <a onclick="mostrarPJ()">
                            <img width="100%" src="../images/simuladores/PERSONAS-JURIDICAS.png" alt="" />
                        </a>
                    </div>
                </div>
                <br>
                <div id="divSimulador" style="display: none" class="row" style="color: #0F154D; padding-bottom: 20px;">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <font size=4>Monto (Dólares)</font>
                        <input required id="monto" name="monto" type="number" class="form-control">
                        <!--                        <select required id="monto" name="monto" class="form-control">
                            <option></option>
                            <option>50 - 100</option>
                            <option>100.01 - 5000</option>
                            <option id="ocultar">5000.01 - 15000</option>
                            <option>15000.01 - más</option>
                        </select>-->
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <font size=4>Pago de intereses</font>
                        <select onchange="tipoPago()" required id="tipo" name="tipo" class="form-control">
                            <option></option>
                            <option>Al vencimiento</option>
                            <option>Mensual</option>
                            <option>Bimensual</option>
                            <option>Trimestral</option>
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <font size=4>Días</font>
                        <select required id="plazo" name="plazo" class="form-control">
                            <option></option>
                            <option style="display: none" id="mes1" value="30">30</option>
                            <option style="display: none" id="mes2" value="60">60</option>
                            <option style="display: none" id="mes3" value="90">90</option>
                            <option style="display: none" id="mes4" value="120">120</option>
                            <option style="display: none" id="mes5" value="150">150</option>
                            <option style="display: none" id="mes6" value="180">180</option>
                            <option style="display: none" id="mes7" value="210">210</option>
                            <option style="display: none" id="mes8" value="240">240</option>
                            <option style="display: none" id="mes9" value="270">270</option>
                            <option style="display: none" id="mes10" value="300">300</option>
                            <option style="display: none" id="mes11" value="330">330</option>
                            <option style="display: none" id="mes12" value="360">360</option>
                            <option style="display: none" id="mesSup" value="361">Superior a un año</option>
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <br>
                        <button onclick="calcular();" type="button" class="btn" id="btnCalcular" style="border-radius:10px; width: 200px; background: #54D0ED; color: white; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);">
                            <font size=4>Calcular</font>
                        </button>
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        <br>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <br>
                        <button onclick="location.href = '../views/inversiones'" style="border-radius:10px; width: 200px; background: #EEEEEE; color: #0F154D; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);" type="button" class="btn">
                            <font size=4>Borrar todo</font>
                        </button>
                    </div>
                </div>
                <br>
                <div id="divAmortizacion" style="display: none" class="row col-sm-12 col-md-12 col-lg-12">
                    <table id="lista-tabla" class="table table-striped" style="text-align:center;">
                        <thead style="background-color: #3BCAEA;">
                            <tr>
                                <th scope="col">Capital</th>
                                <th scope="col">Tiempo (días)</th>
                                <th scope="col">Tasa</th>
                                <th scope="col">Interés</th>
                                <th scope="col">Total a recibir</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">* Nuestras tasas de interés están sujetas a negociación con nuestros asesores</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="col-sm-1"></div>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/simuladorPlazoF.js" type="text/javascript"></script>