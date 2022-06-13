$(document).ready(function () {
    let explorer = $("#kv-explorer");
    let idPromo;
    let promo = [];


    inicializarPromocion();

    //BOTON DE MOSTRAR CARACTERISTICAS
    $(document).on('click', '.btn-primary', function () {

        idPromo = $(this).attr("name");
        let data = obtenerPromocion(idPromo);
        console.log(data);

        $('#fechaR').text(data.fechaDisponible_promocion);
        $('#pais').text(data.pais_promocion);
        $('#lugar').text(data.nombre_promocion);
        $('#lugard').text(data.nombre_promocion);
        $('#saliendo').text(data.lugarSalida_promocion);
        $('#precioP').text(data.precio_promocion);
        $('#aerolineav').text(data.nombre_aerolinea);
        $('#tipoClase').text(data.nombre_clase);

        console.log("entrando en la funcion");
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

    });


    function inicializarPromocion() {
        $.ajax({
            url: URL_SERVIDOR + "promocionVuelo/promocion",
            method: "GET"
        }).done(function (response) {
            let contenedor = $('#contenedorPromociones');
            if (response.promociones) {


                if (response.promociones.length == 0) {
                    let html = "";
                    html += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;>';
                    html += '    <div class="mx-auto">';
                    html += `        <img  src="${URL_PAGINA}assets/img/error.png" />`;
                    html += '    </div>';
                    html += '</div>';
                    contenedor.append(html);
                }

                promo = response.promociones;
                for (let index = 0; index < promo.length; index++) {
                    let html = "";
                    html += '<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"  style="padding: 0px;" >';
                    html += '    <div class="fall-item fall-effect mx-auto">';
                    html += '        <img  src="' + promo[index].foto + '"/>';
                    html += '        <div class="mask">';
                    html += '            <h2 id="">' + promo[index].pais_promocion + '</h2>';
                    html += '            <br>';
                    html += '            <div> Promoci贸n: ' + promo[index].nombre_promocion + '</div>';
                    html += '            <p> Precio Vuelo: $' + promo[index].precio_promocion + '</p>';
                    html += '           <button type="button" name="' + promo[index].idpromocion_vuelo + '" class="btn btn-primary" data-toggle="modal"';
                    html += '            data-target="#modal-editar">Detalles</button>';
                    html += '        </div>';
                    html += '    </div>';
                    html += '    <h4 class="text-center"></h4>';
                    html += '</div>';

                    contenedor.append(html);
                }
            }
        }).fail(function (response) {
            console.log(response);

        });
    }
    
      // CLICK EN LA IMAGEN PEQUE;A
    $(document).on('click', '.product-image-thumb', function () {
       let $image_element = $(this).find('img')
       $('.product-image').prop('src', $image_element.attr('src'))
       $('.product-image-thumb.active').removeClass('active')
       $(this).addClass('active')
    });

    function obtenerPromocion(idBuscado) {
        console.log(promo);
        console.log(idBuscado);
        return promo.find((promocion_vuelo) => promocion_vuelo.idpromocion_vuelo == idBuscado);
    }

    function name(params) {
        document.getElementById("addToDo").addEventListener("keyup", function todoList() {
            var item = document.getElementById("addToDo").value;
            var text = document.createTextNode(item);
            var newItem = document.createElement("li");
            var span = document.createElement("span");
            var itag = document.createElement("i");
            itag.className = "fa fa-trash";
            span.appendChild(itag);
            newItem.appendChild(span);
            newItem.appendChild(text);

            if (event.keyCode === 13) { //keycode de tecla enter
                document.querySelector("ul").appendChild(newItem);
            }
        });
    }

});
