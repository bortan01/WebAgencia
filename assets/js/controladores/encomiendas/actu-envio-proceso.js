$(document).ready(function () {

	//CACHANDO LOS VALORES DEL URL
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    let ID_ENCOMIENDA = urlParams.get('ac');
    let tabla;
    let contadorTabla = 0;

   // inicializarValidaciones();
    mostrarHistorial();
    mostrarDatos();
    inicializarTabla();



 //BOTON PARA AGREGAR
$(document).on('click', '#btn-informacion', function (evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        let form = $("#informacion-form");  
       form.validate();
         if (form.valid()) {
            add_actualizacion();
        }  
        
});

//BOTON PARA ENTREGAR LA ENCOMIENDA
$(document).on('click', '#btn-entregar', function (evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        entregar();  
        
});

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

function entregar() {

    	let data = {
         "descripcion":         'Entregado',
         "id_encomienda":        ID_ENCOMIENDA,
         "fecha":                document.getElementById("fecha_actu").value,
         "hora":                 document.getElementById("hora_actu").value
         }; 

        $.ajax({
            url: URL_SERVIDOR+"Detalle_envio/entregar",
            method: 'POST',
            data: data

        }).done(function (response) {
        	 $('#historias').empty();
                mostrarHistorial();
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: response.mensaje,
                showConfirmButton: true,
            }).then((result) => {
                //desabilitado temporal en el momento que se ejecuto la acción
                //cuando vuelva a cargar la pagina en el mostrarDatos()
                //en esa funcion se va ha validar sengun el estado de la encomienda
                $('#btn-informacion').prop('disabled',true);
                 $('#entregar-div').empty();
            });

        }).fail(function (response) {
            //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
            let respuestaDecodificada = JSON.parse(response.responseText);
            let listaErrores = "";

            if (respuestaDecodificada.errores) {
                ///ARREGLO DE ERRORES 
                let erroresEnvioDatos = respuestaDecodificada.errores;
                for (mensaje in erroresEnvioDatos) {
                    listaErrores += erroresEnvioDatos[mensaje] + "\n";
                     //toastr.error(erroresEnvioDatos[mensaje]);
                };
            } else {
                listaErrores = respuestaDecodificada.mensaje
            }
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Oops...',
                icon: 'error',
                text: listaErrores,
                showConfirmButton: true,
            });

        });


}

function add_actualizacion() {

    	let data = {
         "descripcion":          document.getElementById("titulo_actu").value,
         "id_encomienda":        ID_ENCOMIENDA,
         "fecha":                document.getElementById("fecha_actu").value,
         "hora":                 document.getElementById("hora_actu").value
         }; 

        $.ajax({
            url: URL_SERVIDOR+"Detalle_envio/detalleEnvios",
            method: 'POST',
            data: data

        }).done(function (response) {
        //document.getElementById("informacion-form").reset();
        $('#titulo_actu').val('');

            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: response.mensaje,
                showConfirmButton: true,
            }).then((result) => {
                $('#historias').empty();
                mostrarHistorial();
            });
        }).fail(function (response) {
            //SI HUBO UN ERROR EN LA RESPUETA REST_Controller::HTTP_BAD_REQUEST
            let respuestaDecodificada = JSON.parse(response.responseText);
            let listaErrores = "";

            if (respuestaDecodificada.errores) {
                ///ARREGLO DE ERRORES 
                let erroresEnvioDatos = respuestaDecodificada.errores;
                for (mensaje in erroresEnvioDatos) {
                    listaErrores += erroresEnvioDatos[mensaje] + "\n";
                     //toastr.error(erroresEnvioDatos[mensaje]);
                };
            } else {
                listaErrores = respuestaDecodificada.mensaje
            }
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Oops...',
                icon: 'error',
                text: listaErrores,
                showConfirmButton: true,
            });

        });


}
    
function inicializarValidaciones() {

        $('#informacion-form').validate({

            rules: {
               
                titulo_actu:{
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                
                titulo_actu:{
                    required:"Digite el titulo de la actualización",
                    minlength:"El titulo debe tener una longitud minima de 8"
                }

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');

            }
        });

}

});