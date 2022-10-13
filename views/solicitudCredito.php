<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php require 'sidebar_right.php'; ?>

<div class="row main" style="padding-top: 2%">
    <div class="col-sm-4 col-md-4 col-lg-4"><br></div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <form id="formulario" name="formulario" action="" method="POST" style="color:#0E4760; text-align:center; align-content: center; justify-content: center;">
            <div style="background: #0E4760; color:white;">
                <h1>Solicitud de Crédito</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5>Nombres del solicitante</h5>
                    <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombres completos" required>
                    <br>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5>Teléfono del solicitante</h5>
                    <input name="telefono" id="telefono" type="number" class="form-control no-arrows" placeholder="Número de teléfono" required>
                    <br>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5>Correo del solicitante</h5>
                    <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo eletrónico" required>
                    <br>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5>Producto</h5>
                    <select id="producto" name="producto" class="form-control" required>
                        <option></option>
                        <option value="20.00">EMERGENTE</option>
                        <option value="16.50">MICROCRÉDITO</option>
                        <option value="18.50">CRÉDITO DE CONSUMO</option>
                    </select>
                    <br>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input name="txtProducto" id="txtProducto" type="text" class="form-control">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5>Coméntanos</h5>
                    <textarea id="txtObservaciones" name="txtObservaciones" class="form-control" rows="3" placeholder="Dinos que necesitas ..." required></textarea>
                    <br>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <button type="submit" class="btn" id="btnCalcular" style="border-radius:10px; width: 200px; background: #54D0ED; color: white; box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.4);">
                        <font size=4>Enviar información</font>
                    </button>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4"><br></div>
        </form>
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/envioEmail.js" type="text/javascript"></script>