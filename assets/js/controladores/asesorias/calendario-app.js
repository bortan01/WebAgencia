$(document).ready(function () {

  let id = localStorage.getItem('id_cliente');

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next,today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    customButtons: {
      Miboton: {
        text: "boton 1",
        click: function () {
          alert("Accion del boton");
        }
      }
    },
    dayClick: function (date, allDay, jsEvent, view) {

      const fechaComoCadena = date.format('YYYY-MM-DD h:mm');
      const dias = ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado',
      ];
      const numeroDia = new Date(fechaComoCadena).getDay();
      const nombreDia = dias[numeroDia];
      var select = moment(date).format('YYYY-MM-DD');
      var hoy = moment(new Date()).format('YYYY-MM-DD');

      if (nombreDia == 'domingo') {//si es domingo dia que no abre la agencia
        const Toast = Swal.mixin();
        Toast.fire({
          title: 'Error',
          icon: 'error',
          text: 'Este dia esta cerrado!',
          showConfirmButton: true,
        });
      } else {

        if (select >= hoy) {
          $(document).ready(function () {
            //***METER LA VALIDACION SI EXITE Y NO HA SIDO ATENDIDO */
            $.ajax({
              url: URL_SERVIDOR + "Cita/verificarExist?id_cliente=" + id,
              method: 'GET'

            }).done(function (response) {

              if (response.mensaje.existe !=null || response.existe.color == '#007bff') {

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
                  }
                });

                document.getElementById("btnAgregar").disabled = true;

              } else {
                //por si se queda trabado el disabled lo habilitamos

                $('#modal_registro').modal();
                $('#txtFecha').val(date.format("DD-MM-YYYY"));
                document.getElementById("btnAgregar").disabled = false;
              }

            }).fail(function (response) {
            });
          });
          //FIN DE METER LA VALIDACION
        } else {

          const Toast = Swal.mixin();
          Toast.fire({
            title: 'Error',
            icon: 'error',
            text: 'No se puede agendar una cita en el pasado',
            showConfirmButton: true,
          });
        }



      }//fin else domingo

      // limpiar();


    },
    events: URL_SERVIDOR + 'Cita/citaWeb?id_cliente=' + id, //aqui pongo la api que e hecho
    //http://localhost/restful/index.php/Calendario/calendario
    eventClick: function (calEvent, jsEvent, view) {

      let convertir = calEvent.fecha;
      let nuevaFecha = convertir.split('-');
      let fechita = nuevaFecha[2] + '-' + nuevaFecha[1] + '-' + nuevaFecha[0];

      $('#txtFecha2').val(fechita);
      $('#txtFecha3').val(fechita);
      $('#txtId').val(calEvent.id_cita);
      $('#timepicker2').val(calEvent.hora);


      $('#id_cliente').val(calEvent.id_cita);
      $('#modal_eventos').modal();
      //document.getElementById("update-form").reset();




    },
    editable: true,
    eventDrop: function (calEvent) {
      if (calEvent.estado_cita == 0) {

        $('#calendar').fullCalendar('refetchEvents');
        const Toast = Swal.mixin();
        Toast.fire({
          title: 'Error',
          icon: 'error',
          text: 'Esta cita ya fue atendida',
          showConfirmButton: true,
        });

      } else {
        const fechaComoCadena = calEvent.start.format();
        var fechaHora = calEvent.start.format().split("T");
        const dias = ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado',
        ];
        const numeroDia = new Date(fechaComoCadena).getDay();
        const nombreDia = dias[numeroDia];
        var select = moment(fechaHora[0]).format('YYYY-MM-DD');
        var hoy = moment(new Date()).format('YYYY-MM-DD');

        if (nombreDia == 'domingo') {//si es domingo dia que no abre la agencia
          const Toast = Swal.mixin();
          Toast.fire({
            title: 'Error',
            icon: 'error',
            text: 'Este dia esta cerrado!',
            showConfirmButton: true,
          });
          $('#calendar').fullCalendar('refetchEvents');//refrescar el calendario
        } else {
          if (select >= hoy) {

            //***********codigo de procedimientos
            $('#tituloEvento').html(calEvent.title);
            $('#txtFecha3').val(fechaHora[0]);
            $('#txtId').val(calEvent.id_cita);
            $('#timepicker2').val(calEvent.hora);

            
            
            $('#loadingActualizarEventos').show();
            $.ajax({
              url: URL_SERVIDOR + "Cita/moverDias",
              method: 'POST',
              data: $("#update-form").serialize()

            }).done(function (response) {
            $('#loadingActualizarEventos').hide();

              $('#calendar').fullCalendar('refetchEvents');
              //$("#recargar2").load(" #recargar2");//recargar solo un div y no toda la pagina
              // $('#inputs').empty();//vaciar los inputs dinamicos

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
              $('#loadingActualizarEventos').hide();
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
              $('#calendar').fullCalendar('refetchEvents');//refrescar el calendario
            })

            //***********codigo de procedimiento
          } else {
            const Toast = Swal.mixin();
            Toast.fire({
              title: 'Error',
              icon: 'error',
              text: 'No se puede agendar una cita en el pasado',
              showConfirmButton: true,
            });
            $('#calendar').fullCalendar('refetchEvents');//refrescar el calendario
          }

        }

      }//fin else estado==0

    }//eventDrop

  });
}); //fin calendario

