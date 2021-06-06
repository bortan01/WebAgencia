$(document).ready(function () {

	//CACHANDO LOS VALORES DEL URL
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    let ID_ENCOMIENDA = urlParams.get('ac');
    let tabla;
    let contadorTabla = 0;

    mostrarHistorial();
    mostrarDatos();
    inicializarTabla();

function mostrarDatos() {
        $.ajax({
            url: URL_SERVIDOR + 'Encomienda/encomiendaModificar?id_encomienda=' + ID_ENCOMIENDA,
            method: "GET"
        }).done(function (response) {
            $.each(response.Encomiendas, function (i, index) {
                $('#nombre_cliente').text(index.nombre);
                $('#cliente').text(index.id_usuario);
                $('#telefono').text(index.celular);
                $('#ciudad').text(index.ciudad_origen);
                $('#codigo').text(index.codigo_postal_origen);
                $('#fecha').text(index.fecha);

                if (index.estado=='Entregado') {
                	$('#btn-informacion').prop('disabled',true);
                	$('#btn-entregar').prop('disabled',true);
                }else{
                	$('#btn-informacion').prop('disabled',false);
                	$('#btn-entregar').prop('disabled',false);
                }
            });

            //.each para los datos destino

            $.each(response.Detalles_destino, function (i,pivote) {
                $('#cliente_des').text(pivote.nombre_cliente_destini);
                $('#telefono_des').text(pivote.telefono);
                $('#ciudad_des').text(pivote.ciudad_destino);
                $('#codigo_des').text(pivote.codigo_postal_destino);
                $('#direccion').text(pivote.direccion_destino);
                $('#direccion_alterna').text(pivote.alterna_destino);
            });


        }).fail(function (response) {
            console.log(response);

        });

}

function inicializarTabla() {
        tabla = $("#add-tabla").DataTable({
            "responsive": true,
            "autoWidth": false,
            "deferRender": true,
            "columnDefs":[
            {"className":"dt-center","targets":"_all"},
            {"targets":[4], "visible":false},
            {"targets":[5], "visible":false},
            {"targets":[6], "visible":false},
            ],
            "ajax": {
                "url": URL_SERVIDOR + "Detalle_Encomienda/detalles?id_encomienda=" + ID_ENCOMIENDA,
                "method": "GET",
                "dataSrc": function (json) {
                    //console.log(json.preguntas);

                    if (json.detalles) {
                        for (let i = 0, ien = json.detalles.length; i < ien; i++) {
                            //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                            html = "";
                            html += '<td>';
                            html += '    <div class="btn-group">';
                            html += '        <button type="button" name="' + json.detalles[i].id_encomienda + '" class="btn btn-danger" data-toggle="modal"';
                            html += '            data-target="#modal-eliminar">';
                            html += '            <i class="fas fa-trash" style="color: white"></i>';
                            html += '        </button>';
                            html += '    </div>';
                            html += '</td>';
                            json.detalles[i]["botones"] = html;

                            json.detalles[i]["contador"] = contadorTabla;
                            contadorTabla ++;



                        }
                        $('#loading').hide();
                        return json.detalles;
                    } else {
                        $('#loading').hide();
                        return [];
                    }
                }
            },
            columns: [
                { data: "nombre_producto" },
                { data: "tarifa" },
                { data: "cantidad" },
                { data: "sub_total" },
                { data: "botones" },
                { data: "id_producto" },
                { data: "contador" },
            ]
        });

}

function mostrarHistorial(){
    	//mostrar informacion
         $.ajax({
            type: "GET",
            url: URL_SERVIDOR+"Detalle_envio/detalleEnvio?id_encomienda="+ID_ENCOMIENDA,
            success: function(data) {
            	//alert('estoy aqui');
                if (data.detalles.length > 0) {
                	//crear el boton cuando ya ayan registros
                	let entregarDiv = $('#entregar-div');
                	$('#entregar-div').empty();
                    entregarDiv.append('<button name="btn-entregar" id="btn-entregar" class="btn btn-warning btn-sm"'+
                            'style="color: white">Entregar</button>');

                	//alert('entre');
                for (let i = 0, ien = data.detalles.length; i < ien; i++) {
                   // alert('paso');
                     var $select = $('#historias');
                    $select.append('<div class="row">'+
                                        '<div class="col-sm-12">'+
                                               
                                                '<div class="input-group">'+
                                                '<label class="far fa-marker"></label>'+
                                                 '<label class="text-success">'+data.detalles[i].descripcion+'</label>&nbsp'+
                                                 '<label class="text-success">'+data.detalles[i].fecha+'</label>&nbsp'+
                                                 '<label class="text-success">'+data.detalles[i].hora+'</label>'+
                                                '</div>'+
                                        '</div>'+
                                      '</div>');

                    
                }
            }else{
            	//vamos a poner un mensaje

            	 var $select = $('#historias');
                    $select.append('<div class="row">'+
                                        '<div class="col-sm-12">'+
                                               
                                                '<div class="input-group">'+
                                                '<label class="far fa-marker"></label>'+
                                                 '<label class="text-success">No hay Registros</label>&nbsp'+
                                                
                                                '</div>'+
                                        '</div>'+
                                      '</div>');
                  $('#entregar-div').empty();

            }

            },
            error: function(err) {
                const Toast = Swal.mixin();
            Toast.fire({
                title: 'Error',
                icon: 'error',
                text:'No hay preguntas registradas..!',
                showConfirmButton: true,
            });
            }
        });

        ///ESTA PARTE ES PARA EL USUARIO PARA MOSTRARLOS
}

});