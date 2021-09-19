$(document).ready(function () {
   let explorer = $("#kv-explorer");
   inicializarFoto();
   $("#loadingCliente").hide();

   //BOTON DEL MODAL PARA ACTUALIZA LA FOTO DE PERFIL
   $(document).on("click", "#actualizarFotoPerfil", function (evento) {
      evento.preventDefault(); //para evitar que la pagina se recargue
      //PARA SABER SI SE HA SELECCIONADO UNA FOTO
      if (document.getElementById("foto").files[0]) {
         ActualizarFotoPerfil();
      } else {
         const Toast = Swal.mixin();
         Toast.fire({
            title: "Exito...",
            icon: "error",
            text: "Seleccione una Imagen",
            showConfirmButton: true,
         });
      }
   });
   function inicializarFoto() {
      let identificador = localStorage.getItem("id_cliente");
      let nombreTabla = "usuario_documentos";
      let informacionAdicional = {
         tipo: nombreTabla,
         identificador: identificador,
      };
      let urlFotos = [];
      let infoFotos = [];
      $.ajax({
         url:
            URL_SERVIDOR_IMAGENES +
            "Imagen/show?tipo=" + nombreTabla + "&identificador=" + identificador,
         method: "GET",
      }).done(function (response) {

         //REST_Controller::HTTP_OK
         response.forEach((element) => {
            let informacion = {
               url: URL_SERVIDOR_IMAGENES + "Imagen/delete",
               key: element.id_foto,
            };
            infoFotos.push(informacion);
            urlFotos.push(element.foto_path);
         });
         explorer.fileinput({
            theme: "fas",
            language: "es",
            uploadUrl: URL_SERVIDOR_IMAGENES + "/Imagen/save",
            uploadExtraData: informacionAdicional,
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: urlFotos,
            initialPreviewConfig: infoFotos,
            maxFileSize: 2000,
            maxFilesNum: 10,
            allowedFileExtensions: ["jpg", "png", "gif"],
         });
      });
   }
});
