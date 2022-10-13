<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php require 'sidebar_right.php'; ?>

<!--Imagen incial-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/banners/CREDITOS-NUEVO.jpg" alt="First slide">
        </div>
    </div>
</div>
<!--Imagen incial-->
<div class="barra col-sm-12 col-md-12 col-lg-12">
    <h3>Destinado a financiar diversas actividades productivas y necesidades de consumo.</h3>
    <button onclick="location.href = '../views/simuladorCreditos'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);" type="button">
        <b>
            <FONT SIZE=4 style="font-size: 18px;color:#ffffff">Simular Crédito</font>
        </b>
    </button>
</div>
<div class="main col-sm-12 col-md-12 col-lg-12">
    <div id="microcredito" class="row" style="padding-top: 3%; padding-bottom: 3%; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <div>
                <h2>Microcrédito</h2>
            </div>
            <br>
            <div>
                <h5>“Establecer metas es el primer paso para transformar lo invisible en visible.”</h5>
            </div>
            <br>
            <div>
                <h5>Una nueva alternativa de crédito que
                    permite cubrir tus necesidades
                    relacionadas con actividades productivas
                    y gastos de consumo, generando
                    además un ahorro a largo plazo</h5>
            </div>
            <br>
            <br>
            <div>
                <h5><b>Características</b></h5>
            </div>
            <div>
                <ul>
                    <li type="disc">
                        <h5>Plazo de 9 meses</h5>
                    </li>
                    <li>
                        <h5>Tasa del 18.50%</h5>
                    </li>
                    <li type="disc">
                        <h5>Montos de hasta $20.000</h5>
                    </li>
                </ul>
            </div>
            <br>
            <div>
                <div>
                    <button onclick="location.href = '../views/simuladorCreditos'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Calcular <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
                <br>
                <div>
                    <button onclick="location.href = '../views/solicitudCredito'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Solicitar <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm" style="padding-top: 20px;">
            <img class="img-fluid" width="500" src="../images/creditos/Credito_microcredito.jpg">
        </div>
    </div>
    <div id="deConsumo" class="row" style="padding-top: 3%; padding-bottom: 3%; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);">
        <div class="col-sm-1"></div>
        <div id="imgCreditoConsumo1" class="col-sm" style="padding-top: 20px;">
            <img class="img-fluid" width="500" src="../images/creditos/Credito_de_consumo.jpg">
        </div>
        <div class="col-sm">
            <div>
                <h2>De Consumo</h2>
            </div>
            <br>
            <div>
                <h5>“No tengas miedo de renunciar a lo bueno para ir por lo mejor”</h5>
            </div>
            <br>
            <div>
                <h5>Una nueva alternativa de crédito que
                    permite cubrir gastos, ya sea de
                    compras comunes de los hogares,
                    adquisición de bienes o servicios,
                    viajes, cualquier gasto extra o imprevistos</h5>
            </div>
            <br>
            <br>
            <div>
                <h5><b>Características</b></h5>
            </div>
            <div>
                <ul>
                    <li type="disc">
                        <h5>Plazo de 9 meses</h5>
                    </li>
                    <li type="disc">
                        <h5>Tasa del 16.50%</h5>
                    </li>
                    <li type="disc">
                        <h5>Montos de hasta $20.000</h5>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <div>
                <div>
                    <button onclick="location.href = '../views/simuladorCreditos'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Calcular <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
                <br>
                <div>
                    <button onclick="location.href = '../views/solicitudCredito'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:2px 2px 2px 4px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Solicitar <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
            </div>
        </div>
        <div id="imgCreditoConsumo2" class="col-sm" style="padding-top: 20px;">
            <img class="img-fluid" width="500" src="../images/creditos/Credito_de_consumo.jpg">
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div id="emergente" class="row" style="padding-top: 3%; padding-bottom: 3%; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <div>
                <h2>Emergente</h2>
            </div>
            <br>
            <div>
                <h5>“Las altas expectativas son la clave para todo.”</h5>
            </div>
            <br>
            <div>
                <h5>Esta es la solución a los imprevistos que surgen con el tiempo, cualquier gasto relacionado a la salud, educación, viajes, etc. </h5>
            </div>
            <br>
            <br>
            <div>
                <h5><b>Características</b></h5>
            </div>
            <div>
                <ul>
                    <li>
                        <h5>Plazo de 9 meses</h5>
                    </li>
                    <li type="disc">
                        <h5>Tasa del 20.00%</h5>
                    </li>
                    <li type="disc">
                        <h5>Monto hasta $1.000</h5>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <div>
                <div>
                    <button onclick="location.href = '../views/simuladorCreditos'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:2px 2px 2px 4px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Calcular <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
                <br>
                <div>
                    <button onclick="location.href = '../views/solicitudCredito'" class="btn " style="justify-content:center; background: #54d0ed; border-radius:10px;  width:250px; height:50px; box-shadow:2px 2px 2px 4px rgba(0, 0, 0, 0.2);" type="button">
                        <FONT SIZE=5 style="color:#ffffff">Solicitar <i><img width="12%" src="https://img.icons8.com/cute-clipart/64/000000/circled-chevron-right.png" /></i></font>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm" style="padding-top: 20px;">
            <img class="img-fluid" width="500" src="../images/creditos/Credito_emergente.jpg">
        </div>
    </div>
    <!--Requisitos-->
    <div id="requisitos" class="row" style="padding-top: 2%; padding-bottom: 3%; background: #3b5998; justify-content:center; text-align: center; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2 style=" color:#ffffff;">Requisitos para obtener un crédito</h2>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Encaje
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Fotografía del solicitante
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Copia de cédula y papeleta de votación
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Comprobante pago de servicios básicos
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Justificar patrimonio con títulos originales
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Justificar ingresos de actividad económica
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Los últimos tres roles de pago y/o certificado de trabajo
            </h4>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style=" color:#ffffff;">
                <i><img width="5%" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-check-banking-and-finance-kiranshastry-gradient-kiranshastry.png" /></i>
                Tablas de amortización en caso de deudas
            </h4>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script>
    $(document).ready(function() {

        if (window.innerWidth < 729) {
            $('#creditosRequisitos').hide();
            $('#botonCreditosRequisitos').show();
        } else {
            $('#creditosRequisitos').show();
            $('#botonCreditosRequisitos').hide();
        }

    });
</script>