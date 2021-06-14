$("#loading").hide();
let tablaHistorial;
let seat_charts;
let $cart = $("#selected-seats");
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
   $('#tab-asientos').append(`<p>Cantidad de asientos reservados: <strong>${data.cantidad_asientos}</strong></p>`);
   console.log(data);
   // DIBUJANDO ASIENTOS
   if (data.transporte != null && data.transporte != '') {
      transporte = true;
      let derecho = data.transporte.asiento_derecho;
      let izquierdo = data.transporte.asiento_izquierdo;
      let numero_filas = data.transporte.filas;
      let deshabilitados =
         data.transporte.asientos_deshabilitados;

      let strFila = crearStrFila(derecho, izquierdo);
      let mapa = crearFilas(
         strFila,
         derecho,
         izquierdo,
         numero_filas,
         true
      );
      dibujarAsientos(mapa);
   } else {
      $("#dibujoAsientos").hide();
   }

   bloquearAsientosOcupados(data.asientos_seleccionados);

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
function dibujarAsientos(miMapa) {
   let firstSeatLabel = 1;
   //inicializacmos el sc
   seat_charts = $("#seat-map").seatCharts({
      map: miMapa,
      seats: {
         f: {
            price: 100,
            classes: "first-class", //your custom CSS class
            category: "First Class",
         },
         e: {
            price: 40,
            classes: "economy-class", //your custom CSS class
            category: "Economy Class",
         },
      },
      naming: {
         top: false,
         left: false,
         getLabel: function (character, row, column) {
            return firstSeatLabel++;
         },
      },
      legend: {
         node: $("#legend"),
         items: [
            ["e", "unavailable", "Asientos no Disponibles"],
            ["e", "ocupado", "Asientos ya ocupados"],
            ["e", "selected", "Asientos seleccionados"],
            ["e", "available", "Asientos Disponibles"],
         ],
      },
      click: function () {
         if (this.status() == "available") {
            //let's create a new <li> which we'll add to the cart items
            $(
               "<li>" +
               this.data().category +
               " Seat # " +
               this.settings.label +
               ": <b>$" +
               this.data().price +
               '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>'
            )
               .attr("id", "cart-item-" + this.settings.id)
               .data("seatId", this.settings.id)
               .appendTo($cart);

            /*
             * Lets update the counter and total
             *
             * .find function will not find the current seat, because it will change its stauts only after return
             * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
             */
            $counter.text(seat_charts.find("selected").length + 1);
            $total.text(recalculateTotal(seat_charts) + this.data().price);

            return "selected";
         } else if (this.status() == "selected") {
            //update the counter
            $counter.text(seat_charts.find("selected").length - 1);
            //and total
            $total.text(recalculateTotal(seat_charts) - this.data().price);

            //remove the item from our cart
            $("#cart-item-" + this.settings.id).remove();

            //seat has been vacated
            return "available";
         } else if (this.status() == "unavailable") {
            //seat has been already booked
            return "unavailable";
         } else {
            return this.style();
         }
      },
      focus: function () {
         if (this.status() == "available") {
            return "focused";
         } else {
            return this.style();
         }
      },
      blur: function () {
         return this.status();
      },
   });
}
function recalculateTotal(sc) {
   var total = 0;

   //basically find every selected seat and sum its price
   sc.find("selected").each(function () {
      total += this.data().price;
   });

   return total;
}
function crearStrFila(asientos_derecho, asientos_izquierdo) {
   let strFila = "";
   //LOS ASIENTOS DEL LADO DERECHO
   for (let index = 0; index < asientos_derecho; index++) {
      strFila += "e";
   }
   //LOS ESPACIOS QUE SE VAN A COLOCAR ENTRE ASIENTOS DERECHOS E IZQUIERDOS
   strFila += "_";
   //ASIENTOS DEL LADO IZQUIERDO
   for (let index = 0; index < asientos_izquierdo; index++) {
      strFila += "e";
   }
   return strFila;
}
function crearFilas(
   strFila,
   asientos_derecho,
   asientos_izquierdo,
   numero_filas,
   filaTrasera
) {
   let strTrasero = "";
   let strEspacio = "";
   let asientos_traseros;
   let miMapa = [];
   for (let index = 0; index < numero_filas; index++) {
      miMapa.push(strFila);
   }
   if (filaTrasera) {
      asientos_traseros =
         parseInt(asientos_derecho) + parseInt(asientos_izquierdo) + 1;
      for (let index = 0; index < asientos_traseros; index++) {
         strEspacio += "_";
         strTrasero += "e";
      }
      miMapa.push(strEspacio);
      miMapa.push(strTrasero);
   }
   return miMapa;
}
function bloquearAsientosInavilitados(asientosBloqueados) {
   let arreglo = asientosBloqueados.split(",");
   seat_charts.get(arreglo).status("unavailable");
}
function bloquearAsientosOcupados(ocupados) {
   seat_charts.get(ocupados).status("ocupado");
}
