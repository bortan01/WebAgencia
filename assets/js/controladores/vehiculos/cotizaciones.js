$(document).ready(function () {

    let id = localStorage.getItem('id_cliente');
 
    inicializarTabla();
  
    function inicializarTabla() {
        tablaCotizaciones= $("#tabla_cotizaciones").DataTable({
           responsive: true,
           autoWidth: false,
           deferRender: true,
           columns: [
         
            { data: "modelo" },
            { data: "anio" },
            { data: "totalCotizacion" },
            { data: "fechaRecogida"},
            { data: "fechaDevolucion"},
            { data: "respuestaCotizacion" },
            { data: "botones" }
           ], 
           columnDefs: [
            { "className": "dt-center", "targets": "_all" },
           
            { targets: [6], visible: false },
        ]
        });

        $.ajax({
            type: "GET",
            url: URL_SERVIDOR +"cotizarVehiculo/cotizar?id_usuario="+id,
            
            dataType: "json",
            success: function (response) {
               
       
                for (let i = 0, ien = response.cotizacion.length; i < ien; i++) {
                    //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                    html = "";
                    html += '<td>';
                    html += '    <div class="btn-group">';
                    html += '        <button type="button" name="' + response.cotizacion[i].idcotizarVehiculo +'" class="btn btn-success" data-toggle="modal"';
                    html += '         data-target="#modal-editar">';
                    html += '            <i class="fas fa-map-marked-alt" style="color: white"></i>';
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
            error: function (err) {  
            } 
        });
     }
});