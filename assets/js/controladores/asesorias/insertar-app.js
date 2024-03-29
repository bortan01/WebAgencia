$(document).ready(function () {

    let id = localStorage.getItem('id_cliente');
    let nombre = localStorage.getItem('nombre');
    let celular = localStorage.getItem('celular');

    $('#id_cliente').val(id);
    $('#usuario').val(nombre);

    inicializarValidaciones();


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
                },
                timeUpdate:{
                    required:true
                }
            },
            messages: {
                id_cliente: {
                    required: "Seleccione el Cliente"
                },
                timeUpdate:{
                    required: "Seleccione la hora" 
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

        $('#loadingSave').show();


        $.ajax({
            url: URL_SERVIDOR + "Cita/citas",
            method: 'POST',
            mimeType: "multipart/form-data",
            data: form,
            timeout: 0,
            processData: false,
            contentType: false,

        }).done(function (response) {
            $('#loadingSave').hide();
            $("#modal_registro").modal('toggle');
            $('#calendar').fullCalendar('refetchEvents');
         
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: 'Registro insertado correctamente',
                showConfirmButton: true,
            }).then((result) => {
                //TODO BIEN Y RECARGAMOS LA PAGINA 
                location.reload(); 
            });
        }).fail(function (response) {
            $('#loadingSave').hide();
         console.log(JSON.parse(response.responseText));
            //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
            let respuestaDecodificada = JSON.parse(response.responseText);
            let listaErrores = "";
            //alert(respuestaDecodificada);
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

    function obtenerInfo() {
        let form = new FormData();


        form.append("fecha", document.getElementById("txtFecha").value);
        form.append("usuario", document.getElementById("usuario").value);
        form.append("id_cliente", document.getElementById("id_cliente").value);

        form.append("start", document.getElementById("timepicker").value);
        form.append("title", document.getElementById("txtTitulo").value);
        form.append("dia", document.getElementById("dia").value);


        //
        return form;
    }

});
