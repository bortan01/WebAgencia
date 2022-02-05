$(document).ready(function () {
    $('#loading').hide();
    let id = localStorage.getItem('id_cliente');
    let nombre = localStorage.getItem('nombre');
    $('#cliente').val(nombre);

    inicializarValidaciones();
    inicializarCalendario();
    inicializarcomboHoteles();

    $("#btnGuardarCotizacion").on('click', function (e) {
        e.preventDefault();
        let form = $("#register-cotizarv");
        form.validate();
        if (form.valid()) {

            let comboOpciones = $("#opc_avanzadas").select2('data');
            let arregloOpciones = [];

            for (let index = 0; index < comboOpciones.length; index++) {
                arregloOpciones.push(comboOpciones[index].text);
            }

            console.log(arregloOpciones);
            let form = new FormData();

            form.append("idhotel", document.getElementById("comboHotel").value);
            form.append("idcliente", id);
            form.append("fechaEntradaSalida", document.getElementById("fecha_salida").value);
            form.append("detalleHabitaciones", document.getElementById("descripcion_habitacion").value);
            form.append("servicios_adicionales", arregloOpciones);
            form.append("fechaRecogida", "2021-05-12");
            form.append("total", 0);
  
            $('#loading').show();

            $.ajax({
                url: URL_SERVIDOR + "cotizarHotel/cotizacion",
                method: 'POST',
                data: form,
                timeout: 0,
                processData: false,
                contentType: false,

            }).done(function (response) {
                $('#loading').hide();
                document.getElementById("register-cotizarv").reset();

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
    //PARA LAS VALIDACIONES 
    function inicializarValidaciones() {
        $('#register-cotizarv').validate({
            rules: {
                ciudad_partida: {
                    required: true,
                    minlength: 10
                },
                fechaPartida: {
                    required: true
                },
                ciudad_destino: {
                    required: true,
                    minlength: 10
                },
                idaerolinea: {
                    required: true
                },
                idclase: {
                    required: true
                },
                adultos: {
                    required: true,
                    pattern: /^[\d\s]+$/,
                    number: true,
                    minlength: 1
                },
                ninos: {
                    required: true,
                    pattern: /^[\d\s]+$/,
                    number: true,
                    minlength: 1
                },
                bebes: {
                    required: true,
                    pattern: /^[\d\s]+$/,
                    number: true,
                    minlength: 1
                },
                maletas: {
                    required: true,
                    pattern: /^[\d\s]+$/,
                    number: true,
                    minlength: 1
                }
            },
            messages: {
                ciudad_partida: {
                    required: "Debe de proporcionar la ciudad de partida",
                },
                fechaPartida: {
                    required: "Seleccione Fecha de Partida",

                },
                ciudad_destino: {
                    required: "Debe de proporcionar la ciudad de destino",
                },
                idaerolinea: {
                    required: "Seleccione Aerolinea",

                },
                idclase: {
                    required: "Seleccione el Tipo de Clase"
                },
                adultos: {
                    pattern: "Ingrese solo números enteros",
                    required: "Ingrese solo números enteros"
                },
                ninos: {
                    pattern: "Ingrese solo números enteros",
                    required: "Ingrese solo números enteros"
                },
                bebes: {
                    pattern: "Ingrese solo números enteros",
                    required: "Ingrese solo números enteros"
                },
                maletas: {
                    pattern: "Ingrese solo números enteros",
                    required: "Ingrese solo números enteros"
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
    function inicializarCalendario() {
        $('#fecha_salida').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY',
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "A",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 0
            }
        });
    }
    function inicializarcomboHoteles() {


        $.ajax({
            url: `${URL_SERVIDOR}hotel/hotel`,
            method: "GET"
        }).done(function (response) {
            let myData = [];
            for (let index = 0; index < response.hoteles.length; index++) {
                myData.push({
                    id: response.hoteles[index].idhotel,
                    text: response.hoteles[index].nombreHotel
                });
            }
            ///LE CARGAMOS LA DATA 
            $('#comboHotel').select2({ data: myData });
        }).fail(function (response) {
            let myData = [];
            ///LE CARGAMOS LA DATA 
            $('#comboHotel').select2({ data: myData });

        });




    }

});