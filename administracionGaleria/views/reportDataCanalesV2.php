<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- content -->
            <div class="x_content">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="BancaDigital-tab" data-toggle="tab" href="#BancaDigital" role="tab" aria-controls="BancaDigital" aria-selected="true">Banca Digital</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="BGRNetApp-tab" data-toggle="tab" href="#BGRNetApp" role="tab" aria-controls="BGRNetApp" aria-selected="false">BGR Net App</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="BGRNetWeb-tab" data-toggle="tab" href="#BGRNetWeb" role="tab" aria-controls="BGRNetWeb" aria-selected="false">BGR Net Web</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Callcenter-tab" data-toggle="tab" href="#Callcenter" role="tab" aria-controls="Callcenter" aria-selected="false">Call Center</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="BancaDigital" role="tabpanel" aria-labelledby="BancaDigital-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Data Banca Digital (Búsquedas)</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <p>Reporte del segundo instrumento utilizado a partir de octubre del 2021</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
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
                                            <div class="col-md-3 col-sm-3">
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
                                            <div class="col-md-3 col-sm-3">
                                                <label class="control-label" for="txtSegmento"><b>Segmento</b></label>
                                                <select id="txtSegmento" name="txtSegmento" class="form-control" >
                                                    <option></option>
                                                    <option>Banca Digital App</option>
                                                    <option>Banca Digital Web</option>
                                                </select>
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
                                                <div id="listadoRegistrosApp" class="table-responsive">
                                                    <table id="tblListadoApp" class="table table-striped" style="width:100%">
                                                        <thead class="text-justify">
                                                        <th>FECHA INTERACCION</th>
                                                        <th>NOMBRE CLIENTE</th>
                                                        <th>IDENTIFICACION</th>
                                                        <th>CANAL</th>
                                                        <th>TRANSACCIÓN</th>
                                                        <th>USUARIO_BGR</th>
                                                        <th>USUARIO_KMB</th>
                                                        <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Banca Digital App</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Qué tan fácil es para usted realizar una transacción/consulta en la banca digital?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría califique: En base a su experiencia al transaccionar con la Banca Digital, en qué grado recomendaría a BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>Califique del 1 al 7: Los servicios disponibles en la banca digital cubren sus necesidades.</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>Cuéntenos que opciones, productos o servicios podemos incluir a futuro en nuestra Banca Digital</th>
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
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div id="listadoRegistrosWeb" class="table-responsive">
                                                    <table id="tblListadoWeb" class="table table-striped" style="width:100%">
                                                        <thead class="text-justify">
                                                        <th>FECHA INTERACCION</th>
                                                        <th>NOMBRE CLIENTE</th>
                                                        <th>IDENTIFICACION</th>
                                                        <th>CANAL</th>
                                                        <th>TRANSACCIÓN</th>
                                                        <th>USUARIO_BGR</th>
                                                        <th>USUARIO_KMB</th>
                                                        <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Banca Digital Web</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Qué tan fácil es para usted realizar una transacción/consulta en la banca digital?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría califique: En base a su experiencia en qué grado recomendaría a la Banca Digital a un familiar, amigo o colega de trabajo?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>Califique del 1 al 7: Los servicios disponibles en la banca digital cubren sus necesidades.</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>Cuéntenos que opciones, productos o servicios podemos incluir a futuro en nuestra Banca Digital</th>
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
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show hide" id="BGRNetApp" role="tabpanel" aria-labelledby="BGRNetApp-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Data BGR NET APP (Búsquedas)</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <p>Reporte del segundo instrumento utilizado a partir de octubre del 2021</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio1"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio1" name="txtFechaInicio1">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin1"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin1" name="txtFechaFin1">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <br>
                                                <button id="btnBuscar1" type="button" class="btn-sm btn-primary">Buscar</button>
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
                                                <div id="listadoRegistros1" class="table-responsive">
                                                    <table id="tblListado1" class="table table-striped" style="width:100%">
                                                        <thead class="text-justify">
                                                        <th>FECHA INTERACCION</th>
                                                        <th>NOMBRE CLIENTE</th>
                                                        <th>IDENTIFICACION</th>
                                                        <th>CANAL</th>
                                                        <th>TRANSACCIÓN</th>
                                                        <th>USUARIO_BGR</th>
                                                        <th>USUARIO_KMB</th>
                                                        <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR Net App</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Qué tan facil es para usted realizar una transacción/consulta en la aplicación móvil?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
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
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show hide" id="BGRNetWeb" role="tabpanel" aria-labelledby="BGRNetWeb-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Data BGR NET WEB (Búsquedas)</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <p>Reporte del segundo instrumento utilizado a partir de octubre del 2021</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio2"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio2" name="txtFechaInicio2">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin2"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin2" name="txtFechaFin2">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <br>
                                                <button id="btnBuscar2" type="button" class="btn-sm btn-primary">Buscar</button>
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
                                                <div id="listadoRegistros2" class="table-responsive">
                                                    <table id="tblListado2" class="table table-striped" style="width:100%">
                                                        <thead class="text-justify">
                                                        <th>FECHA INTERACCION</th>
                                                        <th>NOMBRE CLIENTE</th>
                                                        <th>IDENTIFICACION</th>
                                                        <th>CANAL</th>
                                                        <th>TRANSACCIÓN</th>
                                                        <th>USUARIO_BGR</th>
                                                        <th>USUARIO_KMB</th>
                                                        <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR Net Web</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Qué tan facil es para usted realizar una transacción/consulta en la banca electrónica?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
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
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show hide" id="Callcenter" role="tabpanel" aria-labelledby="Callcenter-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Data Call Center (Búsquedas)</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <p>Reporte del segundo instrumento utilizado a partir de octubre del 2021</p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio3"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio3" name="txtFechaInicio3">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin3"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin3" name="txtFechaFin3">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <br>
                                                <button id="btnBuscar3" type="button" class="btn-sm btn-primary">Buscar</button>
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
                                                <div id="listadoRegistros3" class="table-responsive">
                                                    <table id="tblListado3" class="table table-striped" style="width:100%">
                                                        <thead class="text-justify">
                                                        <th>FECHA INTERACCION</th>
                                                        <th>NOMBRE CLIENTE</th>
                                                        <th>IDENTIFICACION</th>
                                                        <th>CANAL</th>
                                                        <th>TRANSACCIÓN</th>
                                                        <th>USUARIO_BGR</th>
                                                        <th>USUARIO_KMB</th>
                                                        <th>Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en el Call Center</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Que tan fácil es para usted gestionar su requerimiento de Call Center?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿En base a su experiencia en que grado recomendaría al Call center de BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
                                                        <th>¿Su requerimiento fue solucionado?</th>
                                                        <th>¿Cual es el motivo de su calificacion?</th>
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
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
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
    <script src="scripts/reporteCanalesEV2.js" type="text/javascript"></script>
    <script src="scripts/functions.js" type="text/javascript"></script>