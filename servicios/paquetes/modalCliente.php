<form id="miFormularioCliente" name="miFormularioCliente" role="form">
   <!-- Modal EDITAR-->
   <div class="modal fade" id="modalAgregarCliente">
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">

            <div class="overlay-wrapper">
               <div id="loadingCliente" class="overlay">
                  <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                  <div class="text-bold pt-2">Cargando...
                  </div>
               </div>
               <div class="modal-header">
                  <h4 class="modal-title">Registrar Cliente</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Nombre de Cliente</label>
                           <div class="input-group">
                              <input type="text" class="form-control" name="nombreCliente" id="nombreCliente">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Correo Electronico</label>
                           <div class="input-group">
                              <input type="text" class="form-control" name="correo" id="correo">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Contraseña</label>
                           <div class="input-group">
                              <input type="password" class="form-control" name="password1" id="password1">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Repetir Contraseña</label>
                           <div class="input-group">
                              <input type="password" class="form-control" name="password2" id="password2">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Dui (opcional)</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="dui" name="dui">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Célular (opcional)</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="celular" name="celular">
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="offset-sm-4"></div>
                     <div class="col-sm-8">
                        <div class="form-group">
                           <div class="kv-avatar">
                              <label>Foto de Perfil (opcional)</label>
                              <div class="file-loading">
                                 <input id="fotoCliente" name="fotoCliente" type="file">
                              </div>
                           </div>
                           <!-- /.input group -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">

                        <label>Documentos Personales (opcional)</label>
                        <div class="file-loading">
                           <input type="file" multiple name="fotosDocumentos[]" id="fotosDocumentos">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button name="btnguardarCliente" id="btnguardarCliente" class="btn btn-info btn-sm"
                     style="color: white">Guardar</button>
               </div>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- End Modal EDITAR-->
</form>