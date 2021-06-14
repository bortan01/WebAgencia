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
   obtenerInformacionAdicional(data.id_tours);

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
function obtenerInformacionAdicional(idTour) {
   $.ajax({
      url: `${URL_SERVIDOR}TurPaquete/showAdicional?id_tours=${idTour}`,
      method: "GET"
   }).done(function (response) {
      dibujarSiiosTuristicos(response.sitiosTuristicos);
      dibujarServicios(response.serviciosAdicionales);
   }).fail(function (response) {
      console.log(response);

   });
}
function dibujarSiiosTuristicos(sitiosTuristicos) {
   sitiosTuristicos.forEach((sitio, numeroCarrucel) => {
      let allHtml = '';
      allHtml += `<div style="display: block;" class="row">`;
      allHtml += `    <h3>${sitio.nombre_sitio}</h3>`;
      allHtml += `    <hr />`;
      allHtml += `    <article>${sitio.descripcion_sitio}</article>`;
      allHtml += `</div>`;
      allHtml += `<div class="row">`;
      allHtml += `      <div class="col-sm-8 centrado">`;
      allHtml += `         <div id="carouselExampleIndicators-${numeroCarrucel}" class="carousel slide" data-ride="carousel">`;
      allHtml += `            <ol class="carousel-indicators">`;

      sitio.galeria.forEach((foto, index) => {
         if (index == 0) {
            allHtml += `<li data-target="#carouselExampleIndicators-${numeroCarrucel}" data-slide-to="${index}" class="active"></li>`;

         } else {
            allHtml += `<li data-target="#carouselExampleIndicators-${numeroCarrucel}" data-slide-to="${index}"></li>`;
         }
      });
      allHtml += `</ol>`;
      allHtml += `<div class="carousel-inner">`;

      sitio.galeria.forEach((foto, index) => {
         if (index == 0) {
            allHtml += `<div class="carousel-item active ">`;
            allHtml += `   <img class="d-block w-100 "`;
            allHtml += `      src="${foto}" alt="First slide">`;
            allHtml += `</div>`;

         } else {
            allHtml += `<div class="carousel-item">`;
            allHtml += `   <img class="d-block w-100 "`;
            allHtml += `      src="${foto}" alt="Second slide">`;
            allHtml += `</div>`;
         }
      });
      allHtml += `</div>`;
      allHtml += `<a class="carousel-control-prev" href="#carouselExampleIndicators-${numeroCarrucel}"`;
      allHtml += `            role="button" data-slide="prev">`;
      allHtml += `            <span class="carousel-control-prev-icon" aria-hidden="true"></span>`;
      allHtml += `            <span class="sr-only">Previous</span>`;
      allHtml += `         </a>`;
      allHtml += `         <a class="carousel-control-next" href="#carouselExampleIndicators-${numeroCarrucel}"`;
      allHtml += `            role="button" data-slide="next">`;
      allHtml += `            <span class="carousel-control-next-icon" aria-hidden="true"></span>`;
      allHtml += `            <span class="sr-only">Next</span>`;
      allHtml += `         </a>`;
      allHtml += `      </div>`;
      allHtml += `   </div>`;
      allHtml += `</div>`;

      $('#sitios').append(allHtml);
   });

}
function dibujarServicios(serviciosAdicionales) {
   serviciosAdicionales.forEach((servicio, numeroCarrucel) => {
      let allHtml = '';
      allHtml += `<div style="display: block;" class="row">`;
      allHtml += `    <h3>${servicio.nombre_servicio}</h3>`;
      allHtml += `    <hr />`;
      allHtml += `    <article>${servicio.descripcion_servicio}</article>`;
      allHtml += `</div>`;
      allHtml += `<div class="row">`;
      allHtml += `      <div class="col-sm-8 centrado">`;
      allHtml += `         <div id="carouselServiciosIndicators-${numeroCarrucel}" class="carousel slide" data-ride="carousel">`;
      allHtml += `            <ol class="carousel-indicators">`;

      servicio.galeria.forEach((foto, index) => {
         if (index == 0) {
            allHtml += `<li data-target="#carouselServiciosIndicators-${numeroCarrucel}" data-slide-to="${index}" class="active"></li>`;

         } else {
            allHtml += `<li data-target="#carouselServiciosIndicators-${numeroCarrucel}" data-slide-to="${index}"></li>`;
         }
      });
      allHtml += `</ol>`;
      allHtml += `<div class="carousel-inner">`;

      servicio.galeria.forEach((foto, index) => {
         if (index == 0) {
            allHtml += `<div class="carousel-item active ">`;
            allHtml += `   <img class="d-block w-100 "`;
            allHtml += `      src="${foto}" alt="First slide">`;
            allHtml += `</div>`;

         } else {
            allHtml += `<div class="carousel-item">`;
            allHtml += `   <img class="d-block w-100 "`;
            allHtml += `      src="${foto}" alt="Second slide">`;
            allHtml += `</div>`;
         }
      });
      allHtml += `</div>`;
      allHtml += `<a class="carousel-control-prev" href="#carouselServiciosIndicators-${numeroCarrucel}"`;
      allHtml += `            role="button" data-slide="prev">`;
      allHtml += `            <span class="carousel-control-prev-icon" aria-hidden="true"></span>`;
      allHtml += `            <span class="sr-only">Previous</span>`;
      allHtml += `         </a>`;
      allHtml += `         <a class="carousel-control-next" href="#carouselServiciosIndicators-${numeroCarrucel}"`;
      allHtml += `            role="button" data-slide="next">`;
      allHtml += `            <span class="carousel-control-next-icon" aria-hidden="true"></span>`;
      allHtml += `            <span class="sr-only">Next</span>`;
      allHtml += `         </a>`;
      allHtml += `      </div>`;
      allHtml += `   </div>`;
      allHtml += `</div>`;

      $('#otros').append(allHtml);
   });

}