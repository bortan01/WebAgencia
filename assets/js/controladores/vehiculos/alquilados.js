$(document).ready(function () {
   
    let id = localStorage.getItem('id_cliente');
 
    inicializarTabla();
  
    function inicializarTabla() {
        tablaDetalle= $("#tabla_historial").DataTable({
           responsive: true,
           autoWidth: false,
           deferRender: true,
           columns: [
            { data: "id_detalle" },
            { data: "modelo" },
            { data: "anio" },
            { data: "fechaHora_detalle" },
            { data: "monto" },
            { data: "botones" }
           ], 
           columnDefs: [
            { "className": "dt-center", "targets": "_all" },
           
            { targets: [5], visible: false },
        ]
        });

        $.ajax({
            type: "GET",
            url: URL_SERVIDOR +"vehiculo/historial?id_cliente="+id,
            
            dataType: "json",
            success: function (response) {
               
       
                for (let i = 0, ien = response.historialDetalles.length; i < ien; i++) {
                    //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                    html = "";
                    html += '<td>';
                    html += '    <div class="btn-group">';
                    html += '        <button type="button" name="' + response.historialDetalles[i].id_detalle +'" class="btn btn-success" data-toggle="modal"';
                    html += '         data-target="#modal-editar">';
                    html += '            <i class="fas fa-map-marked-alt" style="color: white"></i>';
                    html += '        </button>';
                    html += '    </div>';
                    html += '</td>';
                    response.historialDetalles[i]["botones"] = html;
                  
                    let nuevoDetalle = {
                        id_detalle: response.historialDetalles[i].id_detalle,
                        modelo: response.historialDetalles[i].modelo,
                        anio: response.historialDetalles[i].anio,
                        fechaHora_detalle: response.historialDetalles[i].fechaHora_detalle,
                        monto: response.historialDetalles[i].monto,
                        botones: html,
                     };  
                     tablaDetalle.row.add(nuevoDetalle).draw(false);
                }
                $('#loading').hide();
                return json.historialDetalles;
                
            
            },
            error: function (err) {  
            } 
        });
     }
});