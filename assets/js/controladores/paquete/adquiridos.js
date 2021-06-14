$("#loading").hide();
let tablaHistorial;
inicializarTabla();

//BOTON DE VER DETALLES
$(document).on('click', '.btn-info', function () {

let id   = $(this).attr("name");
console.log(id);
});

function inicializarTabla() {
   tablaHistorial = $("#tabla_historial").DataTable({
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
         { data: "ver" },
      ],
      columnDefs: [
         { "className": "dt-center", "targets": "_all" },
         { "width": "20%", "targets": 0 },
         { "width": "20%", "targets": 3 }
         //  { targets: [5], visible: false },
      ]
   });

   $.ajax({
      type: "GET",
      url: URL_SERVIDOR + "TurPaquete/showInfoReserva?id_cliente=" + localStorage.getItem("id_cliente"),
      dataType: "json",
      success: function (response) {
         response.reservas.forEach(viaje => {
            let ver = "";
            ver += `<button type="button" name="${viaje.id_tours}"  class="btn btn-info" data-toggle="modal"`;
            ver += '    data-target="">';
            ver += '    <i class="fa fa-eye" style="color: white"></i>';
            ver += '</button>'
            let newElement = {
               foto: `<img src="${viaje.foto}" class ="img-responsive rounded"  >`,
               nombreTours: viaje.nombreTours,
               fecha_reserva: viaje.fecha_reserva,
               descripcionProducto: viaje.descripcionProducto,
               formaPagoUtilizada: viaje.formaPagoUtilizada,
               monto: viaje.monto,
               tipo: viaje.tipo,
               ver:ver
            }
            tablaHistorial.row.add(newElement).draw(false);
         });
      },
      error: function (err) {
      }
   });
}