//vamos a verificar si el usuario ya tomo una cita
//si ya realizo el proceso de asesoria estara registrada toda su informacion migratoria
//entonces solo se necesita modificar los datos o add si hay nuevas preguntas
$(function () {
    $("#cliente").change(function () {
        var id = document.getElementById("cliente").value;

        /*let data = {
     "transmision": document.getElementById("transmision").value

         };*/

        $.ajax({
            url: URL_SERVIDOR + "Cita/verificarExist?id_cliente=" + id,
            method: 'GET'

        }).done(function (response) {

            //alert(response.existe.id_cita);

            if (response.mensaje == 'Existe' && response.existe.estado_cita == 0) {
                const Toast = Swal.mixin();
                Swal.fire({
                    title: '¡EL cliente ya ha realizado proceso migratorio!',
                    text: "¿Desea modificar la información?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí!'
                }).then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `${URL_SISTEMA}vistas/Asesoria/Formulario.php?form=` + response.existe.id_cita;
                    }
                });

                document.getElementById("btnAgregar").disabled = true;

            } else {

                if (response.mensaje == 'Existe' && response.existe.estado_cita == 1) {

                    let fecha = response.existe.fecha;
                    let nueva = fecha.split('-');

                    const Toast = Swal.mixin();
                    Swal.fire({
                        title: '¡EL cliente ya tiene una cita agendada!',
                        text: "Fecha de su cita: " + nueva[2] + '-' + nueva[1] + '-' + nueva[0],
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        console.log(result);
                        if (result.value) {
                            $("#modal_registro").modal('toggle');

                        }
                    });

                    document.getElementById("btnAgregar").disabled = true;

                } else {
                    //por si se queda trabado el disabled lo habilitamos
                    document.getElementById("btnAgregar").disabled = false;
                }
            }


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


    });
});
