$(document).ready(function (){

    let id = localStorage.getItem('id_cliente'); 
    let nombre = localStorage.getItem('nombre');
    let celular = localStorage.getItem('celular');

    $('#id_cliente').val(id); 
    $('#usuario').val(nombre);

    inicializarValidaciones();
    inicializarGaleria();
    inicializarFoto();
  
    //BOTON PARA AGREGAR
    $(document).on('click', '#btnAgregar', function (evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        let form = $("#register-form");
        form.validate();
        if (form.valid()) {
            add();
        }
    });

function inicializarValidaciones() {

       $('#register-form').validate({
            rules: {
                id_cliente: {
                    required: true
                }
            },
            messages: {
                id_cliente:{
                    required: "Seleccione el Cliente"
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

    //**********************************
    function add() {

         let form = obtenerInfo();
        
        //ESTO ES PARA LA GALERIA 
        let galeria = document.getElementById("fotos").files;
        for (let i = 0; i < galeria.length; i++) {
            form.append('fotos[]', galeria[i]);
        }

        $.ajax({
            url: URL_SERVIDOR+"Cita/citas",
            method: 'POST',
            mimeType: "multipart/form-data",
            data: form,
            timeout: 0,
            processData: false,
            contentType: false,

        }).done(function (response) {

          $("#modal_registro").modal('toggle');
          $('#calendar').fullCalendar('refetchEvents');
          $("#register-form").trigger("reset");
          $('#comboUsuario').val('').trigger('change');//limpia el combo
         // toastr.success(response.mensaje)//me gusta
                    //console.log(response);
         // document.getElementById("register-form").reset();
         // $("#recargar").load("#recargar");//recargar solo un div y no toda la pagina
            //REST_Controller::HTTP_OK
            //let respuestaDecodificada = JSON.parse(response);
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: response.mensaje,
                showConfirmButton: true,
            }).then((result) => {
                //TODO BIEN Y RECARGAMOS LA PAGINA 
                //location.reload(); 
            });
        }).fail(function (response) {
            //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
            /*let respuestaDecodificada = JSON.parse(response.responseText);
            let listaErrores = "";

            if (respuestaDecodificada.errores) {
                ///ARREGLO DE ERRORES 
                let erroresEnvioDatos = respuestaDecodificada.errores;
                for (mensaje in erroresEnvioDatos) {
                    listaErrores += erroresEnvioDatos[mensaje] + "\n";
                     //toastr.error(erroresEnvioDatos[mensaje]);
                };
            } else {
                listaErrores = respuestaDecodificada.mensaje
            }
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Error',
                icon: 'error',
                text: listaErrores,
                showConfirmButton: true,
            });
            */
        });

    }

    function obtenerInfo(){
        let form = new FormData();

       
        let asistiran = $("input[name='asistiran[]']").map(function () { return $(this).val(); }).get();
        let pasaporte_personas = $("input[name='pasaporte_personas[]']").map(function () { return $(this).val(); }).get();

        let verificar_personas= asistiran.filter(asistiran=>asistiran.length >1);
        let verificar_pasaportes= pasaporte_personas.filter(pasaporte_personas=>pasaporte_personas.length >1);

        let cuantos = verificar_personas.length;
        let pasaporte_cuantos= verificar_pasaportes.length;
        console.log('pasaportes:'+pasaporte_cuantos);
        console.log('personas:'+cuantos);

        if (cuantos==pasaporte_cuantos) {
            //si son iguales recoje la data
        
        form.append("fecha",       document.getElementById("txtFecha").value);
        form.append("usuario",     document.getElementById("usuario").value);
        form.append("id_cliente",  document.getElementById("comboUsuario").value);
        form.append("pasaporte",   document.getElementById("pasaporte").value);
        form.append("asistencia", document.getElementById("asistencia").value);
        form.append("start", document.getElementById("timepicker").value);
        form.append("title", document.getElementById("txtTitulo").value);
        form.append("asistiran", JSON.stringify(verificar_personas));
        form.append("pasaporte_personas", JSON.stringify(verificar_pasaportes));
        form.append("cuantos",cuantos);
      }else{

         const Toast = Swal.mixin();
            Toast.fire({
                title: 'Error',
                icon: 'error',
                text:'Verifique los nombre de las personas: '+cuantos+' Pasaportes: '+pasaporte_cuantos,
                showConfirmButton: true,
            });

      }
        //
        return form;
    }
   
});
