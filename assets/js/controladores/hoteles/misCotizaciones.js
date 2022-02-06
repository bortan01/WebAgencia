$("#loading").hide();
let tablaHistorial;
inicializarTabla();

function inicializarTabla() {
   tablaHistorial = $("#tabla_historial").DataTable({
      responsive: true,
      autoWidth: false,
      deferRender: true,
      ajax: {
         url: URL_SERVIDOR + "cotizarHotel/mostrarCotizacion?idcliente=" + localStorage.getItem("id_cliente"),
         method: "GET",
         dataSrc: function (json) {
       
            //PARA CONPROVAR QUE LAS RESERVAS EXISTEN
            if (json.informacion.length > 0) {
               return json.informacion;
            } else {
               $('#loading').hide();
               return [];
            }
         }
      },
      columns: [
         { data: "fechaEntradaSalida" },
         { data: "nombreHotel" },
         { data: "detalleHabitaciones" },
         { data: "respuesta" },
      ],
      columnDefs: [
         { "className": "dt-center", "targets": "_all" },
         { "width": "20%", "targets": 0 },
     
         //  { targets: [5], visible: false },
      ]
   });
}
