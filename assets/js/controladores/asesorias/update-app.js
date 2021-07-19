$(document).ready(function (){

    $("#btnActualizar").on('click', function(e) {

        e.preventDefault();
        // recolectarDatos();
         let form = obtenerInfo();
         $.ajax({
            url: URL_SERVIDOR+"Cita/updateCita",
            method: 'POST',
            mimeType: "multipart/form-data",
            data: form,
            timeout: 0,
            processData: false,
            contentType: false,
        }).done(function (response) {
            
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

     function obtenerInfo(){
        let form = new FormData();

        let asistiran = $("input[name='asistiran[]']").map(function () { return $(this).val(); }).get();
        let pasaporte_personas = $("input[name='pasaporte_personas[]']").map(function () { return $(this).val(); }).get();
        let verificar_personas= asistiran.filter(asistiran=>asistiran.length >1);
        let verificar_pasaportes= pasaporte_personas.filter(pasaporte_personas=>pasaporte_personas.length >1);
        let cuantos = verificar_personas.length;
        console.log(cuantos);
        form.append("id_cita",       document.getElementById("txtId").value);
         form.append("fecha", document.getElementById("txtFecha2").value);
        form.append("asistencia", document.getElementById("asistencia2").value);
        form.append("start", document.getElementById("timepicker2").value);
        form.append("asistiran", JSON.stringify(verificar_personas));
        form.append("pasaporte_personas", JSON.stringify(verificar_pasaportes));
        form.append("cuantos",cuantos);

        return form;
    }


});


