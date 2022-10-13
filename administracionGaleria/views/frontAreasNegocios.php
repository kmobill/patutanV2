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
                            <div class="x_title border-dark">
                                <div class="col-md-11 col-sm-11">
                                    <h2>Gestión de Áreas del Negocio (Búsquedas)</h2>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <!--<a class="collapse-link"><i class="fa fa-chevron-up"></i>-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="filtros" class="x_content">
                                <div class="col-md-2 col-sm-2">
                                    <label for="txtAreas" ><b>Áreas</b></label>
                                    <select id="txtAreas" name="txtAreas" class="form-control">
                                        <option value="">TODOS</option>
                                        <option>COBRANZAS</option>
                                        <option>EMPRESARIAL</option>
                                        <option>INVERSIONES</option>
                                        <option>RECLAMOS</option>
                                        <option>RECUPERACIONES</option>
                                        <option>TC</option>
                                    </select>
                                </div>
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
                    <div class="col-md-12 col-sm-12 border-dark" id="divLealtad">
                        <div class="x_panel border-dark">
                            <div class="x_title text-dark border-dark">
                                <div class="col-md-11 col-sm-11">
                                    <h2>Bloque - Lealtad</h2>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <!--<a class="collapse-link"><i class="fa fa-chevron-up"></i>-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content text-center">
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="col-md-1 col-sm-1">
                                                <!--<a class="collapse-link"><i class="fa fa-chevron-up"></i>-->
                                            </div>
                                            <div class="col-md-11 col-sm-11">
                                                <h4>Índice Neto Recomendación(NPS)</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="x_content text-center" id="divINS">
                                            <input id="txtNPS" name="txtNPS" class="knob" data-step=".01" data-width="180" data-height="120" data-angleOffset=-98 data-angleArc=200 readonly />
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="col-md-1 col-sm-1">
                                                <!--<a class="collapse-link"><i class="fa fa-chevron-up"></i>-->
                                            </div>
                                            <div class="col-md-11 col-sm-11">
                                                <h4>Índice Neto de Satisfacción (INS)</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content text-center" id="divINS">
                                            <input id="txtINS" name="txtINS" class="knob" data-step=".01" data-width="180" data-height="120" data-angleOffset=-98 data-angleArc=200 readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="col-md-1 col-sm-1">
                                                <!--<a class="collapse-link"><i class="fa fa-chevron-up"></i>-->
                                            </div>
                                            <div class="col-md-11 col-sm-11">
                                                <h4>Indicador de Esfuerzo <br>(CES)</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content text-center">
                                            <input id="txtCES" name="txtCES" class="knob" data-step=".01" data-width="180" data-height="120" data-angleOffset=-98 data-angleArc=200 readonly />
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
                                                        <thead  class="text-center">
                                                        <th>Momento</th>
                                                        <th>Muestra</th>
                                                        <th>NPS</th>
                                                        <th>INS</th>
                                                        <th>CES</th>
                                                        <th>Lealtad</th>
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
                </div>
            </div>
            <!-- content -->
        </div>
        <!-- /page content -->
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/frontGestionAreas.js" type="text/javascript"></script>