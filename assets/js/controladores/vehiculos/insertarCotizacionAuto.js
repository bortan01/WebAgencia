$(document).ready(function () {

    $('#loading').hide();
    let id = localStorage.getItem('id_cliente');
    let nombre = localStorage.getItem('nombre');
    $('#cliente').val(nombre);

    inicializarValidaciones();
    $("#btnGuardarCotizacionV").on('click', function (e) {

        $('#loading').show();

        e.preventDefault();
        let form = $("#register-cotizarVehiculo");
        form.validate();
        if (form.valid()) {
            let form = new FormData();

            form.append("id_usuario", id);
            form.append("modelo", document.getElementById("id_modelo").value);
            form.append("anio", document.getElementById("anio").value);
            form.append("caracteristicas", document.getElementById("caracteristicas").value);
            form.append("direccion_recogida", document.getElementById("direccion_recogida").value);
            form.append("fechaRecogida", document.getElementById("fechaRecogida").value);
            form.append("HoraRecogida", document.getElementById("timepicker").value);
            form.append("direccion_devolucion", document.getElementById("direccion_devolucion").value);
            form.append("fechaDevolucion", document.getElementById("fechaDevolucion").value);
            form.append("HoraDevolucion", document.getElementById("timepicker2").value);

            $.ajax({
                url: URL_SERVIDOR + "cotizarVehiculo/cotizar",
                method: 'POST',
                data: form,
                timeout: 0,
                processData: false,
                contentType: false,

            }).done(function (response) {
                $('#loading').hide();
                document.getElementById("register-cotizarVehiculo").reset();

                const Toast = Swal.mixin();
                Toast.fire({
                    title: 'Exito...',
                    icon: 'success',
                    text: response.mensaje,
                    showConfirmButton: true,
                }).then((result) => {
                    //TODO BIEN Y RECARGAMOS LA PAGINA 
                    location.reload();
                });
            }).fail(function (response) {
                $('#loading').hide();
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
                    title: 'Oops...',
                    icon: 'error',
                    text: listaErrores,
                    showConfirmButton: true,
                });

            })

        }

    });

    function inicializarValidaciones() {
        $('#register-cotizarVehiculo').validate({
            rules: {

                modelo: {
                    required: true
                },
                anio: {
                    required: true,
                    minlength: 4
                },
                caracteristicas: {
                    required: true,
                    minlength: 10
                },
                direccion_recogida: {
                    required: true,
                    minlength: 10
                },
                fechaRecogida: {
                    required: true
                },
                HoraRecogida: {
                    required: true
                },
                direccion_devolucion: {
                    required: true,
                    minlength: 10
                },
                fechaDevolucion: {
                    required: true
                },
                HoraDevolucion: {
                    required: true
                }
            },
            messages: {

                modelo: {
                    required: "Seleccione el Modelo"
                },
                anio: {
                    required: "Debe de proporcionar el Año"
                },
                caracteristicas: {
                    required: "Describa las caracteristicas del Vehículo que necesita"
                },
                direccion_recogida: {
                    required: "Debe proporcionar la Dirección en la cual recogera el vehículo"
                },
                fechaRecogida: {
                    required: "Seleccione Fecha de Recogida"
                },
                HoraRecogida: {
                    required: "Seleccione Hora de Recogida"
                },
                direccion_devolucion: {
                    required: "Debe proporcionar la Dirección en la cual devolvera el vehículo"
                },
                fechaDevolucion: {
                    required: "Seleccione Fecha de Devolución"
                },
                HoraDevolucion: {
                    required: "Seleccione Hora de Devolución"
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
});