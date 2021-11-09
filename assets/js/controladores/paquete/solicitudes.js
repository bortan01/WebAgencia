$("#loading").hide();
let tablaHistorial;
inicializarTabla();

function inicializarTabla() {
   tablaHistorial = $("#tabla_historial").DataTable({
      responsive: true,
      autoWidth: false,
      deferRender: true,
      ajax: {
         url: URL_SERVIDOR + "TurPaquete/cotizacionByClient?id_cliente=" + localStorage.getItem("id_cliente"),
         method: "GET",
         dataSrc: function (json) {
       
            //PARA CONPROVAR QUE LAS RESERVAS EXISTEN
            if (json.cotizaciones.length > 0) {
               return json.cotizaciones;
            } else {
               $('#loading').hide();
               return [];
            }
         }
      },
      columns: [
         { data: "fechaPeticionWeb" },
         { data: "peticion" },
         { data: "respuesta" },
      ],
      columnDefs: [
         { "className": "dt-center", "targets": "_all" },
         { "width": "20%", "targets": 0 },
     
         //  { targets: [5], visible: false },
      ]
   });
}
