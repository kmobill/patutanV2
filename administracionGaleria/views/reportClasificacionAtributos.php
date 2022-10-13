<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- content -->
            <div class="row">
                <div class="x_panel">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel text-dark border-dark">
                            <div class="x_title border-dark  ">
                                <h2>Reporte de Agrupadores por atributos (Búsquedas)</h2>
                                <ul class="nav navbar-right">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div id="filtros" class="x_content">
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtRegion" ><b>Región</b></label>
                                    <select id="txtRegion" name="txtRegion" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="control-label" for="txtAgencia"><b>Agencia</b></label>
                                    <!--<input id="txtAgencia" name="txtAgencia" type="text" class="form-control" value="" />-->
                                    <select id="txtAgencia" name="txtAgencia" class="form-control" >
                                        <!--<option>Choose option</option>-->
                                    </select>
                                </div>
                                <div id="divAgencia" class="col-md-2 col-sm-2">
                                    <input type="hidden" class="form-control" id="txtAgencia1" name="txtAgencia1"/>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtArea"><b>Área</b></label>
                                    <select id="txtArea" name="txtArea" class="form-control">
                                        <option value="">Todas</option>
                                        <option>Negocios</option>
                                        <option>Servicios</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtSeccion"><b>Sección</b></label>
                                    <select id="txtSeccion" name="txtSeccion" class="form-control">
                                        <option value="">Todas</option>
                                    </select>
                                </div>
                                <div id="divTipoCliente" class="col-md-3 col-sm-3">
                                    <label for="txtTipoCliente"><b>Tipo cliente</b></label>
                                    <select id="txtTipoCliente" name="txtTipoCliente" class="form-control">
                                        <option value="">Todos</option>
                                        <option>Civil</option>
                                        <option>Militar</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtFechaInicio"><b>Fecha desde</b></label>
                                    <fieldset class="">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                    <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio" name="txtFechaInicio">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtFechaFin"><b>Fecha hasta</b></label>
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                    <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin" name="txtFechaFin">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <br>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <br>
                                    <button id="btnBuscar" type="button" class="btn-sm btn-primary">Buscar</button>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <br>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="x_content fixedHeader-locked">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div id="listadoRegistros" class="table-responsive">
                                        <table id="tblListado" class="table table-striped" style="width:100%">
                                            <thead class="text-justify">
                                            <th>FECHA INTERACCION</th>
                                            <th>NOMBRE CLIENTE</th>
                                            <th>IDENTIFICACION</th>
                                            <th>AGENCIA</th>
                                            <th>SECCION</th>
                                            <th>TRANSACCIÓN</th>
                                            <th>USUARIO_BGR</th>
                                            <th>USUARIO_KMB</th>
                                            <!--<th>Pregunta 9</th>-->
                                            <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR</th>
                                            <!--<th>Pregunta 9.1</th>-->
                                            <th>Qué fue lo que mas le gustó?</th>
                                            <!--<th>Atributo INS</th>-->
                                            <th>Atributo INS</th>
                                            <!--<th>Pregunta 10</th>-->
                                            <th>Qué tan fácil o sencillo es para usted gestionar su requerimiento de ... en la agencia ...</th>
                                            <!--<th>Pregunta 10.1</th>-->
                                            <th>Qué lo hizo Muy fácil/ fácil?</th>
                                            <!--<th>Atributo CES</th>-->
                                            <th>Atributo INS</th>
                                            <!--<th>Pregunta 11</th>-->
                                            <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?, siendo 0 definitivamente no recomendaría y 10 definitivamente sí lo recomendaría</th>
                                            <!--<th>Pregunta 11.1</th>-->
                                            <th>¿Cuál es el motivo de su calificación?</th>
                                            <!--<th>Atributo INS</th>-->
                                            <th>Atributo NPS</th>
                                            </thead>
                                            <tbody class="text-center">        
                                            </tbody>
                                            <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>                                         
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
        </div>
        <!-- /page content -->
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/reporteAgrupadoresAtributos.js" type="text/javascript"></script>
<script src="scripts/functions.js" type="text/javascript"></script>