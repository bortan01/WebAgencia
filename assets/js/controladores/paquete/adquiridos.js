$("#loading").hide();
inicializarTabla();

function inicializarTabla() {
   let tablaHistorial = $("#tabla_historial").DataTable({
      responsive: true,
      autoWidth: false,
      deferRender: true,
      columns: [
         { data: "foto" },
         { data: "nombreTours" },
         { data: "fecha_reserva" },
         { data: "descripcionProducto" },
         { data: "formaPagoUtilizada" },
         { data: "monto" },
         { data: "tipo" },
      ],
      columnDefs: [
         { "className": "dt-center", "targets": "_all" },
         //  { targets: [5], visible: false },
      ]
   });

   $.ajax({
      type: "GET",
      url: URL_SERVIDOR + "TurPaquete/showInfoReserva?id_cliente=" + localStorage.getItem("id_cliente"),

      dataType: "json",
      success: function (response) {
         console.log(response);

         response.reservas.forEach(viaje => {
            let newElement = {
               foto: `<img src="${viaje.foto}" class ="img-responsive rounded"  >`,
               nombreTours: viaje.nombreTours,
               fecha_reserva: viaje.fecha_reserva,
               descripcionProducto: viaje.descripcionProducto,
               formaPagoUtilizada: viaje.formaPagoUtilizada,
               monto: viaje.monto,
               tipo: viaje.tipo,
            }
            tablaHistorial.row.add(newElement).draw(false);

         });



      },
      error: function (err) {
      }
   });
}