$(document).ready(function () {
   inicializarFoto();
   $('#loadingCliente').hide();

   //BOTON DEL MODAL PARA ACTUALIZA LA FOTO DE PERFIL
   $(document).on('click', '#actualizarFotoPerfil', function (evento) {
      evento.preventDefault(); //para evitar que la pagina se recargue
      //PARA SABER SI SE HA SELECCIONADO UNA FOTO 
      if (document.getElementById("foto").files[0]) {
         ActualizarFotoPerfil();
      } else {
         const Toast = Swal.mixin();
         Toast.fire({
            title: 'Exito...',
            icon: 'error',
            text: "Seleccione una Imagen",
            showConfirmButton: true,
         });
      }
   });
   function inicializarFoto() {
      // ESTO ES PARA INICIALIZAR EL ELEMENTO DE SUBIDA DE UNA UNICA FOTO
      $('#foto').fileinput({
         theme: 'fas',
         language: 'es',
         required: true,
         maxFileSize: 2000,
         maxFilesNum: 10,
         showUpload: false,
         showClose: false,
         showCaption: true,
         browseLabel: '',
         removeLabel: '',
         //removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
         removeTitle: 'Cancel or reset changes',
         elErrorContainer: '#kv-avatar-errors-1',
         msgErrorClass: 'alert alert-block alert-danger',
         defaultPreviewContent: '<img src="../../assets/img/avatar.png" alt="Your Avatar">',
         layoutTemplates: { main2: '{preview} {remove} {browse}' },
         allowedFileExtensions: ["jpg", "png", "gif"]
      });

      if (localStorage.getItem('foto') != null && localStorage.getItem('foto') != '') {
         let $avatar = $('.file-default-preview');
         $avatar.html(`<img src="${localStorage.getItem('foto')}" style="width: 186px;">`)

      }
   }
   function ActualizarFotoPerfil() {
      $('#loadingCliente').show();
      let form = new FormData();
      //ESTO ES PARA LA FOTO DE PERFIL
      let foto_perfil = document.getElementById("foto").files[0];
      form.append('foto', foto_perfil);
      form.append('tipo', 'usuario_perfil');
      form.append('identificador', localStorage.getItem('id_cliente'));

      //OCUPAR ESTA CONFIGURACION CUANDO SE ENVIAEN ARCHIVOS(FOTOS-IMAGENES)
      $.ajax({
         url: URL_SERVIDOR + "Imagen/apdate",
         method: "POST",
         mimeType: "multipart/form-data",
         data: form,
         timeout: 0,
         processData: false,
         contentType: false,
      }).done(function (response) {
         //REST_Controller::HTTP_OK
         console.log(response);
         tabla.ajax.reload(null, false);
         const Toast = Swal.mixin();
         Toast.fire({
            title: 'Exito...',
            icon: 'success',
            text: "FOTO ACTUALIZADA",
            showConfirmButton: true,
         }).then((result) => {
            //TODO BIEN Y RECARGAMOS LA PAGINA 

            $("#miFormulario").trigger("reset");
            $('#modal-perfil').modal('hide');
         });
      }).fail(function (response) {
         //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
         console.log(response);

         const Toast = Swal.mixin();
         Toast.fire({
            title: 'Oops...',
            icon: 'error',
            text: "ERROR EN EL ENVIO DE INFORMACIÓN",
            showConfirmButton: true,
         });

      }).always(function (xhr, opts) {
         $('#loadingCliente').hide();
      });
   }
});