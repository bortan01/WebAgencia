$(document).ready(function () {
    let tabla;
    let id = localStorage.getItem('id_cliente');

   
    inicializarTabla();
  

    function inicializarTabla() {
        tabla = $("#tabla_historial").DataTable({
            "responsive": true,
            "autoWidth": false,
            "deferRender": true,
            "ajax": {
                "url": URL_SERVIDOR +"vehiculo/historial?id_cliente="+id,
                "method": "GET",
                "dataSrc": function (json) {
                    //console.log(json.preguntas);

                    if (json.historialDetalles) {
                        for (let i = 0, ien = json.historialDetalles.length; i < ien; i++) {
                            //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                            html = "";
                            html += '<td>';
                            html += '    <div class="btn-group">';
                            html += '        <button type="button" name="' + json.historialDetalles[i].id_detalle+'" class="btn btn-success" data-toggle="modal"';
                            html += '         data-target="#modal-editar">';
                            html += '            <i class="fas fa-map-marked-alt" style="color: white"></i>';
                            html += '        </button>';
                            html += '    </div>';
                            html += '</td>';
                            json.historialDetalles[i]["botones"] = html;

                        }
                        $('#loading').hide();
                        return json.historialDetalles;
                    } else {
                        $('#loading').hide();
                        return [];
                    }
                }
            },
            columns: [
                { data: "id_detalle" },
                { data: "modelo" },
                { data: "anio" },
                { data: "fecha_reserva" },
                { data: "totalDevolucion" },
                { data: "botones" }
            ],
             
         
        });

    }

});