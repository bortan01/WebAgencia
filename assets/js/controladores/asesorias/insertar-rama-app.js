$(document).ready(function () {

    inicializarValidaciones();

    //BOTON PARA AGREGAR
    $(document).on('click', '#btn-rama', function (evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        let form = $("#register-form");
        form.validate();
        if (form.valid()) {
            add_rama();
        }
    });

    function inicializarValidaciones() {

        $('#register-form').validate({

            rules: {
                categoria_rama: {
                    minlength: 10
                }
            },
            messages: {
                categoria_rama: {
                    minlength: "Debe de tener una longitud minima de 10"
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
    function add_rama() {

        $.ajax({
            url: URL_SERVIDOR + "Asesoria/ramitas",
            method: 'POST',
            data: $("#register-form").serialize()

        }).done(function (response) {
            document.getElementById("register-form").reset();
            document.getElementById("recargar-form").reset();
            $('#mostrar').empty();//VACIO LOS DIV PARA QUE NO ME LOS MONTE UNO SOBRE OTRO
            $('#botones').empty();

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
            let respuestaDecodificada = JSON.parse(response.responseText);
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

        });

    }

});