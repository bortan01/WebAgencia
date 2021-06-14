$("#loading").hide();
let tablaHistorial;
inicializarTabla();

//BOTON DE VER DETALLES
$(document).on('click', '.btn-info', function () {
   let fila = $(this).closest("tr");
   let data = tablaHistorial.row(fila).data();

   if (data.galeria) {
      let galeria = data.galeria;
      let imagenGrande = document.getElementById('imagenGrande');
      imagenGrande.innerHTML = '';

      galeria.forEach((foto, index) => {

         if (index == 0) {
            let imgBig = document.createElement("img");
            imgBig.className = "product-image";
            imgBig.src = foto;
            imagenGrande.appendChild(imgBig);
            let crear = $('#' + index);
            crear.empty();
            crear.append('<img src="' + foto + '" alt="">');
            crear.show();
         } else {
            let crear = $('#' + index);
            crear.empty();
            crear.append('<img src="' + foto + '" alt="">');
            crear.show();

         }
      });
      for (let i = galeria.length; i <= 10; i++) {
         //alert('aqui estoy');
         $('#' + i).hide();
      }

   }

   $('#precio').text("Asiento Normal $" + data.precio);
   $('#titulo').text(data.nombreTours);
   $('#descripcion_tur').html(data.descripcion_tur);
   let fechaSalida = moment(data.start);
   $('#fecha').text(fechaSalida.locale('es').format('LL'));
   $('#cupos').text(data.cupos_disponibles);

   $('#incluye').empty();
   data.incluye?.forEach(element => {
      $('#incluye').append(`<p>✔️ ${element}</p>`);
   });
   $('#no-incluye').empty();
   data.no_incluye?.forEach(element => {
      $('#no-incluye').append(`<p>❌ ${element}</p>`);
   });
   $('#requisito').empty();
   data.requisitos?.forEach(element => {
      $('#requisito').append(`<p>📝 ${element}</p>`);
   });
   $('#promocion').empty();
   data.promociones?.forEach(element => {
      $('#promocion').append(`<p>💺 ${element.titulo} 💲 <strong>${element.pasaje}</strong></p>`);
   });
   $('#salida').empty();
   data.lugar_salida?.forEach(element => {
      $('#salida').append(`<p>🚌 ${element}</p>`);
   });
   $('#sitios').empty();
   $('#otros').empty();

   $('#modal-editar').modal('show');

});

function inicializarTabla() {
   tablaHistorial = $("#tabla_historial").DataTable({
      responsive: true,
      autoWidth: false,
      deferRender: true,
      ajax: {
         url: URL_SERVIDOR + "TurPaquete/showInfoReserva?id_cliente=" + localStorage.getItem("id_cliente"),
         method: "GET",
         dataSrc: function (json) {
            //PARA CONPROVAR QUE LAS RESERVAS EXISTEN
            if (json.reservas.length > 0) {
               json.reservas.forEach(viaje => {
                  let ver = "";
                  ver += `<button type="button" name="${viaje.id_tours}"  class="btn btn-info" data-toggle="modal"`;
                  ver += '    data-target="">';
                  ver += '    <i class="fa fa-eye" style="color: white"></i>';
                  ver += '</button>'
                  viaje.ver = ver;
                  viaje.foto = `<img src="${viaje.foto}" class ="img-responsive rounded"  >`;

               });
               return json.reservas;
            } else {
               $('#loading').hide();
               return [];
            }
         }
      },
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

      },
      error: function (err) {
      }
   });
}