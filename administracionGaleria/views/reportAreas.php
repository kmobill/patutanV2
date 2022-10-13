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
                        <a class="nav-link active" id="Cobranzas-tab" data-toggle="tab" href="#Cobranzas" role="tab" aria-controls="Cobranzas" aria-selected="true">Cobranzas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Empresarial-tab" data-toggle="tab" href="#Empresarial" role="tab" aria-controls="Empresarial" aria-selected="false">Empresarial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Inversiones-tab" data-toggle="tab" href="#Inversiones" role="tab" aria-controls="Inversiones" aria-selected="false">Inversiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Reclamos-tab" data-toggle="tab" href="#Reclamos" role="tab" aria-controls="Reclamos" aria-selected="false">Reclamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Recuperaciones-tab" data-toggle="tab" href="#Recuperaciones" role="tab" aria-controls="Recuperaciones" aria-selected="false">Recuperaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="TCConsumo-tab" data-toggle="tab" href="#TCConsumo" role="tab" aria-controls="TCConsumo" aria-selected="false">TC Consumo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="TCMillas-tab" data-toggle="tab" href="#TCMillas" role="tab" aria-controls="TCMillas" aria-selected="false">TC Millas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="TCNuevas-tab" data-toggle="tab" href="#TCNuevas" role="tab" aria-controls="TCNuevas" aria-selected="false">TC Nuevas</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Cobranzas" role="tabpanel" aria-labelledby="Cobranzas-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Cobranzas </h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio" name="txtFechaInicio" aria-describedby="inputSuccess2Status4">
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
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
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
                                                    <table id="tblListado" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">Califique del 1 al 7 siendo 1 malo y 7 excelente: Considera que la asesoría brindada por el oficial de Cobranzas fue efectiva</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 7: El oficial de Cobranzas que atendió su requerimiento, entendió su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Cobranzas BGR</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Que tan fácil o sencillo es para usted gestionar su requerimiento en el departamento de Cobranzas?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
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
                    <div class="tab-pane fade" id="Empresarial" role="tabpanel" aria-labelledby="Empresarial-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Empresarial </h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio1"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio1" name="txtFechaInicio1" aria-describedby="inputSuccess2Status4">
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
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar1" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
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
                                                    <table id="tblListado1" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">Califique del 1 al 7: Considera usted que el Asesor que atendió su requerimiento entendió su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 7: Considera que la solución brindada por su asesor se ajusta a su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Que tan fácil o sencillo es para usted gestionar su requerimiento con banca Empresarial de BGR?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
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
                    <div class="tab-pane fade" id="Inversiones" role="tabpanel" aria-labelledby="Inversiones-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Inversiones </h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio2"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio2" name="txtFechaInicio2" aria-describedby="inputSuccess2Status4">
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
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar2" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
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
                                                    <table id="tblListado2" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">Califique del 1 al 7: Considera que su asesor de inversiones entendió su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 7: La solución que recibió de su asesor de inversiones cumplió sus expectativas</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Que tan fácil o sencillo es para usted gestionar su requerimiento relacionado a su Inversión con BGR?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
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
                    <div class="tab-pane fade" id="Reclamos" role="tabpanel" aria-labelledby="Reclamos-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Reclamos </h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio3"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio3" name="txtFechaInicio3" aria-describedby="inputSuccess2Status4">
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
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar3" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
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
                                                    <table id="tblListado3" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">La persona que atendió su reclamo entendió su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Si su experiencia con BGR se mantiene igual a la que ha tenido hasta ahora, consideraría seguir con nosotros, por cuánto tiempo más</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">El servicio que recibió de la persona que le atendió fue el esperado</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Recibió un trato personalizado por parte de la persona que le atendió en su reclamo</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR</th>
                                                        <th class="border-dark">¿Cual es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Qué tan fácil o sencillo es para usted gestionar su reclamo con BGR?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?, sien</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
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
                    <div class="tab-pane fade" id="Recuperaciones" role="tabpanel" aria-labelledby="Recuperaciones-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Recuperaciones </h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio4"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio4" name="txtFechaInicio4" aria-describedby="inputSuccess2Status4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin4"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin4" name="txtFechaFin4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar4" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="x_content fixedHeader-locked">
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div id="listadoRegistros4" class="table-responsive">
                                                    <table id="tblListado4" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">Califique del 1 al 7 siendo 1 malo y 7 excelente: Considera que la asesoría brindada por el oficial de Recuperaciones fue efectiva</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 7: El oficial de Recuperaciones que atendió su requerimiento, entendió su necesidad</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Recuperaciones BGR</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Que tan fácil o sencillo es para usted gestionar su requerimiento en el departamento de Recuperaciones?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
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
                    <div class="tab-pane fade hidden" id="TCConsumo" role="tabpanel" aria-labelledby="TCConsumo-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Tarjetas de Crédito - Consumo</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio5"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio5" name="txtFechaInicio5" aria-describedby="inputSuccess2Status4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin5"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin5" name="txtFechaFin5">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar5" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="x_content fixedHeader-locked">
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div id="listadoRegistros5" class="table-responsive">
                                                    <table id="tblListado5" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">SEGMENTO</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Qué tan satisfecho se encuentra con su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 1 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique su grado de satisfacción del 1 al 10: ¿Qué tan satisfecho se encuentra al realizar compras con su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Qué tan fácil fue realizar sus compras con su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Podría brindarnos una sugerencia adicional para mejorar su experiencia con su tarjeta de crédito BGR Visa</th>
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
                    <div class="tab-pane fade hidden" id="TCMillas" role="tabpanel" aria-labelledby="TCMillas-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Tarjetas de Crédito - Millas</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio6"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio6" name="txtFechaInicio6" aria-describedby="inputSuccess2Status4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin6"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin6" name="txtFechaFin6">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar6" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="x_content fixedHeader-locked">
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div id="listadoRegistros6" class="table-responsive">
                                                    <table id="tblListado6" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">SEGMENTO</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: ¿Qué tan satisfecho se encuentra con su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 1 no lo recomendaría y 10 si lo recomendaría ¿En qué grado recomendaría a un amigo o compañero de trabajo el uso de una tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique su grado de satisfacción del 1 al 10: ¿Qué tan satisfecho se encuentra con el ingreso a la plataforma del programa de millas de su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique su grado de satisfacción del 1 al 10: ¿Qué tan satisfecho se encuentra con el canje de premios de su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">¿Qué tan fácil fue realizar el proceso de canje de premios de su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Podría brindarnos una sugerencia adicional para mejorar su experiencia con su programa de millas</th>
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
                    </div>
                    
                    <div class="tab-pane fade hidden" id="TCNuevas" role="tabpanel" aria-labelledby="TCNuevas-tab">
                        <div class="row">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel text-dark border-dark">
                                        <div class="x_title border-dark  ">
                                            <h2>Reporte Tarjetas de Crédito - Nuevas</h2>
                                            <ul class="nav navbar-right">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="filtros" class="x_content">
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaInicio7"><b>Fecha desde</b></label>
                                                <fieldset class="">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 col-sm-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaInicio7" name="txtFechaInicio7" aria-describedby="inputSuccess2Status4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <label for="txtFechaFin7"><b>Fecha hasta</b></label>
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="col-md-12 xdisplay_inputx form-group row has-feedback">
                                                                <input autocomplete="off" type="text" class="form-control has-feedback-left" id="txtFechaFin7" name="txtFechaFin7">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <br>
                                                <button id="btnBuscar7" type="button" class="btn-sm btn-primary">Buscar</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"><br></div>
                                <div class="x_content fixedHeader-locked">
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div id="listadoRegistros7" class="table-responsive">
                                                    <table id="tblListado7" class="table table-striped border" style="width:100%">
                                                        <thead class="text-center">
                                                        <th class="border-dark">FECHA ATENCIÓN</th>
                                                        <th class="border-dark">NOMBRE CLIENTE</th>
                                                        <th class="border-dark">IDENTIFICACION</th>
                                                        <th class="border-dark">USUARIO KMB</th>
                                                        <th class="border-dark">USUARIO BGR</th>
                                                        <th class="border-dark">SEGMENTO</th>
                                                        <th class="border-dark">Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: ¿Qué tan satisfecho se encuentra con su tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">En escala de 0 a 10 siendo 1 no lo recomendaría y 10 si lo recomendaría ¿En qué grado recomendaría a un amigo o compañero de trabajo el uso de una tarjeta de crédito BGR Visa?</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique su grado de satisfacción del 1 al 10: El proceso de solicitud de su tarjeta de crédito BGR Visa</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Califique su grado de satisfacción del 1 al 10: El proceso de entrega de su tarjeta de crédito Bgr Visa desde que la solicitó</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Por qué medio obtuvo la clave de su tarjeta de crédito (mensaje de texto, call center, no la tiene)</th>
                                                        <th class="border-dark">¿Qué tan fácil es para usted gestionar su solicitud, BGR Visa (muy fácil, fácil, poco fácil, difícil o muy difícil)</th>
                                                        <th class="border-dark">¿Cuál es el motivo de su calificación?</th>
                                                        <th class="border-dark">Podría brindarnos una sugerencia adicional para mejorar su experiencia con su tarjeta de crédito BGR Visa</th>
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
            </div>
            <!-- content -->
        </div>
    </div>
    <!-- content -->
</div>
<!-- /page content -->
<?php require 'footer.php'; ?>
<script src="scripts/reporteAreasDelNegocio.js" type="text/javascript"></script>
<script src="scripts/functions.js" type="text/javascript"></script>