$(document).ready(function () {

    $("#btnActualizar").on('click', function (e) {

        e.preventDefault();
        // recolectarDatos();
        $('#loadingActualizarEventos').show();

        let form = obtenerInfo();
        $.ajax({
            url: URL_SERVIDOR + "Cita/updateCita",
            method: 'POST',
            mimeType: "multipart/form-data",
            data: form,
            timeout: 0,
            processData: false,
            contentType: false,
        }).done(function (response) {
            $('#loadingActualizarEventos').hide();

            $("#modal_eventos").modal('toggle');
            $('#calendar').fullCalendar('refetchEvents');

            //REST_Controller::HTTP_OK
            let respuestaDecodificada = JSON.parse(response);
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: 'Resgistro actualizado con exito',
                showConfirmButton: true,
            }).then((result) => {
                //TODO BIEN Y RECARGAMOS LA PAGINA 
                //location.reload(); //NO QUIERO QUE RECARGUE ME ACTUALIZA SOLA
            });

        }).fail(function (response) {
            $('#loadingActualizarEventos').hide();
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

    });

    function obtenerInfo() {
        let form = new FormData();
        form.append("id_cita", document.getElementById("txtId").value);
        form.append("fecha", document.getElementById("txtFecha2").value);
        form.append("start", document.getElementById("timepicker2").value);
        return form;
    }


});


