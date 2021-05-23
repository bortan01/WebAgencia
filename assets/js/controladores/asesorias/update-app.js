$("#btnActualizar").on('click', function (e) {

    e.preventDefault();
    // recolectarDatos();
    $.ajax({
        url: URL_SERVIDOR + "Cita/updateCita",
        method: 'POST',
        data: $("#update-form").serialize()

    }).done(function (response) {

        // $("#recargar2").load("#recargar2");//recargar solo un div y no toda la pagina
        // $("#recargarPasa").load("#recargarPasa");
        $('#inputs').empty();//vaciar los inputs dinamicos
        $('#inputsPasa').empty();//vaciar los inputs dinamicos
        $("#modal_eventos").modal('toggle');
        $('#calendar').fullCalendar('refetchEvents');

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
            location.reload(); //NO QUIERO QUE RECARGUE ME ACTUALIZA SOLA
        });

    }).fail(function (response) {
        //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST


        const Toast = Swal.mixin();
        Toast.fire({
            title: 'Error',
            icon: 'error',
            text: response,
            showConfirmButton: true,
        });

    });

});



