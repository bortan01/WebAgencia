$('#loading').hide();
inicializarValidaciones();

//BOTON DE GUARDAR
$(document).on('click', '#btnguardar', function (evento) {
   evento.preventDefault();//para evitar que la pagina se recargue
   let form = $("#miFormulario");
   form.validate();
   if (form.valid()) {
      guardar();
   }
});

function inicializarValidaciones() {
   $('#miFormulario').validate({
      rules: {
         peticion: {
            required: true,
            minlength: 10,
         }
      },
      messages: {
         peticion: {
            required: "Ingrese su petición",
            minlength: "La petición debe de ser mayor a 10 caracteres",
         }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');

      }
   });

   $('#formularioAgregarTipoSitio').validate({
      rules: {
         nombreTipo: {
            required: true,
            minlength: 3,
         }
      },
      messages: {
         nombreTipo: {
            required: "Es necesario un nombre",
            minlength: "Debe de tener una longitud minima de 3"
         }

      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');

      }
   });


}

function guardar() {
   const fecha = new Date();
   $('#loading').show();
   $.ajax({
      url: URL_SERVIDOR + "TurPaquete/cotizacion",
      method: "POST",
      data: {
         id_cliente: localStorage.getItem("id_cliente"),
         peticion: $('#peticion').val(),
         fechaPeticion: `${fecha.getFullYear()}-${fecha.getMonth() + 1}-${fecha.getDate()}`,
         respuesta: 'SIN RESPUESTA',
         visto: "0"
      },
   }).done(function (response) {
      $('#loading').hide();
      const Toast = Swal.mixin();
      Toast.fire({
         title: "Exito...",
         icon: "success",
         text: "Solicitud de cotización enviada correctamente",
         showConfirmButton: true,
      });
      $('#miFormulario').trigger("reset"); //Line1
   }).fail(function (response) {
      $('#loading').hide();
      const Toast = Swal.mixin();
      Toast.fire({
         title: "Oops...",
         icon: "error",
         text: "ERROR EN EL ENVIO DE INFORMACIÓN",
         showConfirmButton: true,
      });

   });
}