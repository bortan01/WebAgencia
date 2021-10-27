$(document).ready(function() {

    let id = localStorage.getItem('id_cliente');

    inicializarTabla();

    function inicializarTabla() {
        tablaCotizaciones = $("#tabla_cotizaciones").DataTable({
            responsive: true,
            autoWidth: false,
            deferRender: true,
            columns: [

                { data: "ciudad_partida" },
                { data: "ciudad_llegada" },
                { data: "nombre_aerolinea" },
                { data: "opc_avanzadas" },
                { data: "total" },
                { data: "botones" }
            ],
            columnDefs: [
                { "className": "text-center", "targets": "_all" },

                { targets: [5], visible: false },
            ]
        });

        $.ajax({
            type: "GET",
            url: URL_SERVIDOR + "cotizarVuelo/cotizar?id_cliente=" + id,

            dataType: "json",
            success: function(response) {


                for (let i = 0, ien = response.informacion.length; i < ien; i++) {
                    //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                    html = "";
                    html += '<td>';
                    html += '    <div class="btn-group">';
                    html += '        <button type="button" name="' + response.informacion[i].id_cotizacion + '" class="btn btn-success" data-toggle="modal"';
                    html += '         data-target="#modal-editar">';
                    html += '            <i class="fas fa-map-marked-alt" style="color: white"></i>';
                    html += '        </button>';
                    html += '    </div>';
                    html += '</td>';
                    response.informacion[i]["botones"] = html;

                    let nuevoDetalle = {

                        ciudad_partida: response.informacion[i].ciudad_partida,
                        ciudad_llegada: response.informacion[i].ciudad_llegada,
                        nombre_aerolinea: response.informacion[i].nombre_aerolinea,
                        opc_avanzadas: response.informacion[i].opc_avanzadas,
                        total: response.informacion[i].total,

                        botones: html,
                    };
                    tablaCotizaciones.row.add(nuevoDetalle).draw(false);
                }
                $('#loading').hide();
                return response.informacion;


            },
            error: function(err) {}
        });
    }
});