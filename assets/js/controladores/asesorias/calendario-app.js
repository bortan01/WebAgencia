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

          $('#modal_registro').modal();
          $('#txtFecha').val(date.format("DD-MM-YYYY"));
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
    events: URL_SERVIDOR+'index.php/Cita/citaWeb?id_cliente='+id, //aqui pongo la api que e hecho
    //http://localhost/restful/index.php/Calendario/calendario
    eventClick: function (calEvent, jsEvent, view) {

      if (calEvent.estado_cita == 0 || calEvent.color == '#FF0040') {
        $('#btnActualizar').prop("disabled", true);
      } else { $('#btnActualizar').prop("disabled", false); }
      $('#tituloEvento').html(calEvent.title);

      let convertir = calEvent.fecha;
      let nuevaFecha = convertir.split('-');
      let fechita = nuevaFecha[2] + '-' + nuevaFecha[1] + '-' + nuevaFecha[0];

      $('#txtFecha2').val(fechita);
      $('#txtFecha3').val(fechita);
      $('#txtId').val(calEvent.id_cita);
      $('#timepicker2').val(calEvent.hora);
      document.getElementById("asistencia2").value = calEvent.compania;

      if (calEvent.compania == 0) {
        $('#inputs').empty();//vaciar los inputs dinamicos
        $('#inputsPasa').empty();//vaciar los inputs dinamicos
        //que los vacie y despues que los muestre...
        $('#asistiran2').prop("disabled", false);
        $('#btn-asistiran2').prop("disabled", false);
        $("#pasaporte_personas2").prop("disabled", false);
        $("#btn-pasaportes2").prop("disabled", false);
        //para mostrar en el input de las personas que asitiran
        $(document).ready(function () {

          $.ajax({
            type: "GET",
            url: URL_SERVIDOR + 'PersonasCitas/personas/' + calEvent.id_cita,
            
            dataType: "json",
            success: function (data) {

              let $select = $('#inputs');
              let $selectPas = $('#inputsPasa');
              $.each(data.personas, function (i, index) {
                $select.append('<input id="input" name="input[]" class="form-control" value="' + index.nombres_personas + '">');
                $selectPas.append('<input id="inputPas" name="inputPas[]" class="form-control" value="' + index.pasaporte_personas + '">');
              });

            },
            error: function (data) {
              //alert('error');
            }
          });

        });
        //****
      } else {
        $('#asistiran2').prop("disabled", true);
        $('#btn-asistiran2').prop("disabled", true);
        $('#inputs').empty();
        $('#inputsPasa').empty();
      }
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

            $(document).ready(function () {

              $.ajax({
                url: "http://localhost/API-REST-PHP/index.php/Cita/moverDias",
                method: 'POST',
                data: $("#update-form").serialize()

              }).done(function (response) {
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
            });
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

