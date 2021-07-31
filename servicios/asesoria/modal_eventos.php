<!-- ./wrapper -->

<!--modal alternativo para los eventos-->
<div class="modal fade" id="modal_registro">
   <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

         <div class="overlay-wrapper">
            <div id="loadingActualizar" class="overlay">
               <i class="fas fa-3x fa-sync-alt fa-spin"></i>
               <div class="text-bold pt-2">Cargando...
               </div>
            </div>
            <div class="modal-header">
               <h4 class="modal-title">Registro de cita</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form id="register-form" name="register-form" onsubmit="return false" role="form">
               <div class="modal-body">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>Fecha</label>
                        <input type="text" id="txtFecha" name="fecha" class="form-control" disabled />
                       </div>
                     <div class="form-group col-md-6">
                        <label>Hora de la cita</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                           <input type="text" id="timepicker" name="start" class="form-control" value="08:00" />
                        </div>
                        <input type="hidden" class="form-control" id="txtTitulo" name="title" value="Asesoria" />
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-12">
                     <label>Cliente</label>
                        <div class="form-group multiple-form-group input-group">
                        <input type="hidden" id="id_cliente" name="id_cliente" class="form-control" disabled/>
                           <input type="text" id="usuario" name="usuario" class="form-control" disabled/>
                        </div>
                     </div>
                    
                  </div>
                     
                  </div>
                  
               </div>
               <div class="modal-footer">
                  <button type="button" id="btnAgregar" class="btn btn-info btn-sm"
                     style="color: white">Guardar</button>
                  <button type="button" class="btn btn-danger btn-sm" style="color: white"
                     data-dismiss="modal">Cancelar</button>
               </div>
            </form>
         </div>

      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!--fin de modal de enventos-->


<!-- ./otro modal*************************** -->
<!--modal alternativo para los eventos-->
<div class="modal fade" id="modal_eventos">
   <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

         <div class="overlay-wrapper">
            <div id="loadingActualizarEventos" class="overlay">
               <i class="fas fa-3x fa-sync-alt fa-spin"></i>
               <div class="text-bold pt-2">Cargando...
               </div>
            </div>
            <div class="modal-header">
               <h5 class="modal-title" id="tituloEvento">Titulo del evento</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form id="update-form" onsubmit="return false">
               <div class="modal-body">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <input type="hidden" id="txtFecha3" name="fecha" class="form-control" />
                        <input type="hidden" id="txtId" name="id_cita" class="form-control" />
                        <label>Fecha</label>
                        <input type="text" id="txtFecha2" disabled="" name="fecha" class="form-control" />

                     </div>
                     <div class="form-group col-md-6">
                        <label>Hora de la cita</label>
                        <div class="input-group clockpicker" data-autoclose="true">
                           <input type="text" id="timepicker2" name="start" class="form-control" />

                        </div>
                        <input type="hidden" class="form-control" id="txtTitulo" name="title" value="Asesoria" />
                     </div>

                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" id="btnActualizar" class="btn btn-info float-right">Actualizar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               </div>
            </form>
         </div>

      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!--fin de modal de enventos-->