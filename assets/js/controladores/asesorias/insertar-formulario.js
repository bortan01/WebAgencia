$(document).ready(function () {

    validaciones();
    $(document).on('click', '#btnFormulario', function (evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        let form = $("#migratorio-form");
        form.validate();
        if (form.valid()) {
            insertarFormulario();
        } else {
            toastr.error('Verifique los campos de selección');
        }
    });






    function insertarFormulario() {
        $.ajax({
            url: URL_SERVIDOR + "FormularioMigratorio/formulario",
            method: 'POST',
            data: $("#migratorio-form").serialize()

        }).done(function (response) {
            document.getElementById("migratorio-form").reset();
            //para no recargar la pagina
            $('#citas_dias').empty();
            $('#script').html('<script type="text/javascript" src="../../js/controladores/asesorias/combo_formulario.js">');


            //$("#recargar").load(" #recargar");//recargar solo un div y no toda la pagina
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
                //location.reload(); NO QUIERO QUE RECARGUE ME ACTUALIZA SOLA
            });
        }).fail(function (response) {
            //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
            /* let respuestaDecodificada = JSON.parse(response.responseText);
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
             });*/

        })
    }

    function validaciones() {


        $(document).ready(function () {
            $.validator.setDefaults({
                ignore: [],
            });

            $('#migratorio-form').validate({
                rules: {

                },
                messages: {

                    required: "Seleccione"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    //element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');

                }
            });

            // must be called after validate()
            $('select.respuesta').each(function () {
                $(this).rules('add', {
                    required: true
                });
            });

        });
        /*$.validator.setDefaults({
            ignore:[],
        });
         $('#migratorio-form').validate({
                rules: {
                   
                },
                messages: {
                 
                        required: "Seleccione"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    //element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
    
                }
            });*/
    }

});