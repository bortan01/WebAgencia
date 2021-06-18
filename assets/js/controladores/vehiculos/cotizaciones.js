$(document).ready(function() {
    let idCotizarAuto;
    let id = localStorage.getItem('id_cliente');

    inicializarTabla();

    function inicializarTabla() {
        tablaCotizaciones = $("#tabla_cotizaciones").DataTable({
            responsive: true,
            autoWidth: false,
            deferRender: true,
            columns: [

                { data: "modelo" },
                { data: "anio" },
                { data: "totalCotizacion" },
                { data: "fechaRecogida" },
                { data: "fechaDevolucion" },
                { data: "respuestaCotizacion" },
                { data: "botones" }
            ],
            columnDefs: [
                { "className": "dt-center", "targets": "_all" },

            ]
        });

        $.ajax({
            type: "GET",
            url: URL_SERVIDOR + "cotizarVehiculo/cotizar?id_usuario=" + id,

            dataType: "json",
            success: function(response) {


                for (let i = 0, ien = response.cotizacion.length; i < ien; i++) {
                    //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                    html = "";
                    html += '<td>';
                    html += '    <div class="btn-group">';
                    html += '        <button type="button" name="' + +response.cotizacion[i].idcotizarVehiculo + '" class="btn btn-secondary" data-toggle="modal"';
                    html += '            data-target="#modal-cotizacion">';
                    html += '            <i class="fas fa-eye" style="color: white"></i>';
                    html += '        </button>';
                    html += '    </div>';
                    html += '</td>';
                    response.cotizacion[i]["botones"] = html;

                    let nuevoDetalle = {

                        modelo: response.cotizacion[i].modelo,
                        anio: response.cotizacion[i].anio,
                        totalCotizacion: response.cotizacion[i].totalCotizacion,
                        fechaRecogida: response.cotizacion[i].fechaRecogida,
                        fechaDevolucion: response.cotizacion[i].fechaDevolucion,
                        respuestaCotizacion: response.cotizacion[i].respuestaCotizacion,
                        botones: html,
                    };
                    tablaCotizaciones.row.add(nuevoDetalle).draw(false);
                }
                $('#loading').hide();
                return response.cotizacion;


            },
            error: function(err) {}
        });
    }


    //BOTON MOSTRAR 
    $(document).on('click', '.btn-group .btn-secondary', function() {

        idCotizarAuto = $(this).attr("name");

        $('#loadingActualizar').show();
        $.ajax({
            url: "http://localhost/API-REST-PHP/cotizarVehiculo/cotizar?idcotizarVehiculo=" + idCotizarAuto,
            method: "GET"
        }).done(function(response) {
            //MANDALOS LOS VALORES AL MODAL
            for (let i = 0, ien = response.cotizacion.length; i < ien; i++) {

                $('#nombreC').text(response.cotizacion[i].nombre);
                $('#emailC').text(response.cotizacion[i].correo);
                $('#telefonoC').text(response.cotizacion[i].celular);
                $('#dui-cliente').text(response.cotizacion[i].dui);

                $('#nombreVehiculoC').text(response.cotizacion[i].modelo);
                $('#anioC').text(response.cotizacion[i].anio);
                $('#caracteristicasC').text(response.cotizacion[i].caracteristicas);

                $('#direccion_recogidaC').text(response.cotizacion[i].direccion_recogida);
                $('#fechaRecogidaC').text(response.cotizacion[i].fechaRecogida);
                $('#HoraRecogidaC').text(response.cotizacion[i].HoraRecogida);

                $('#direccion_devolucionC').text(response.cotizacion[i].direccion_devolucion);
                $('#fechaDevolucionC').text(response.cotizacion[i].fechaDevolucion);
                $('#HoraDevolucionC').text(response.cotizacion[i].HoraDevolucion);

                $('#descuent').text(response.cotizacion[i].descuentosCotizacion);
                $('#tot').text(response.cotizacion[i].totalCotizacion);
            }

        }).fail(function(response) {

        }).always(function(xhr, opts) {
            $('#modal-cotizacion').modal('show');

        });
    });

});