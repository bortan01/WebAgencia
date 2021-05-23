$(document).ready(function() {
    let explorer = $("#kv-explorer");
    let id_regunta;
    let tabla;
    let id;
    //inicializarValidaciones();
    inicializarComboRama();
    inicializarTabla();

    //BOTON EDITAR LA FOTO
    $(document).on('click', '.btn-group .btn-warning', function() {
        $('#modal-imagenesEncomienda').modal('show');
        let identificador = $(this).attr("name");
        let nombreTabla = 'cita';
        let informacionAdicional = { tipo: nombreTabla, identificador: identificador };
        let urlFotos = [];
        let infoFotos = [];

        $.ajax({
            url: URL_SERVIDOR + "Imagen/show?tipo=" + nombreTabla + "&identificador=" + identificador,
            method: "GET",

        }).done(function(response) {
            //REST_Controller::HTTP_OK
            console.log(URL_SERVIDOR + "Imagen/show?tipo=" + nombreTabla + "&identificador=" + identificador);
            response.forEach(element => {
                let informacion = {
                    url: URL_SERVIDOR + "Imagen/delete",
                    key: element.id_foto
                };
                infoFotos.push(informacion);
                urlFotos.push(element.foto_path);
            });
            explorer.fileinput({
                theme: 'fas',
                language: 'es',
                uploadUrl: URL_SERVIDOR + '/Imagen/save',
                uploadExtraData: informacionAdicional,
                overwriteInitial: false,
                initialPreviewAsData: true,
                initialPreview: urlFotos,
                initialPreviewConfig: infoFotos,
                required: true,
                maxFileSize: 2000,
                maxFilesNum: 10,
                allowedFileExtensions: ["jpg", "png", "gif"]

            });
        });
    });

    //BOTON DE EDITAR
    $(document).on('click', '.btn-group .btn-primary', function() {
        $('#loadingActualizar').hide();
        id = $(this).attr("name");
        fila = $(this).closest("tr");
        usuario = fila.find('td:eq(0)').text();
        document.getElementById("id_cita").value = id;
        document.getElementById("usuario").value = usuario;


        $.ajax({
            type: "GET",
            url: URL_SERVIDOR + "FormularioMigratorio/formulariosLlenos/" + id,
             dataType: "json",
            success: function(data) {

                //vacias los elementos
                for (let i = 0, ien = data.formulario.length; i < ien; i++) {
                    // alert('paso');
                    if (data.formulario[i].opcion == 'cerrada') {
                        $('#' + data.formulario[i].num_rama).empty();
                    } else {
                        if (data.formulario[i].mas_respuestas == 'Si') {
                            // alert('entre');
                            $('#' + data.formulario[i].num_rama).empty();


                        } else {
                            $('#' + data.formulario[i].num_rama).empty();
                        }
                    }
                }
                //*******************

                for (let i = 0, ien = data.formulario.length; i < ien; i++) {
                    // alert('paso');
                    if (data.formulario[i].opcion == 'cerrada') {
                        var $select = $('#' + data.formulario[i].num_rama);
                        $select.append('<input type="hidden" name="id_pregunta[]" value="' + data.formulario[i].id_pregunta + '" class="form-control">' +
                            '<label style="width: 400px;margin-left: 98px; margin-top:4px;">¿' + data.formulario[i].pregunta + '?</label>' +
                            '<select class="form-control respuesta" name="respuesta[]" id="combo' + data.formulario[i].id_pregunta + '" style="width: 400px;margin-left: 98px; margin-top:2px;">' +
                            '<option disabled>¿' + data.formulario[i].pregunta + '?</option>' +
                            '</select>&nbsp&nbsp');

                        //COMO YA CREE EL COMBO SELECCIONO EL ID Y CARGO EL COMBO
                        var $combo = $('#combo' + data.formulario[i].id_pregunta);
                        $combo.select();

                        //alert(data.preguntas[i].id_pregunta);
                        for (let j = 0, jen = data.opciones.length; j < jen; j++) {
                            //SOLO VA HA LLENAR EL COMBO CUANDO EL ID DE LA PREGUNTA SEA = AL ID 
                            //DE LA PREGUNTA DE LAS OPCIONES RESPUESTAS
                            if (data.formulario[i].id_pregunta == data.opciones[j].id_pregunta) {

                                $combo.append('<option value=' + data.opciones[j].opciones_respuestas + '>' + data.opciones[j].opciones_respuestas +
                                    '</option>');
                                document.getElementById("combo" + data.formulario[i].id_pregunta).value = data.formulario[i].respuesta;

                            }
                        }


                    } else {
                        if (data.formulario[i].mas_respuestas == 'Si') {
                            // alert('entre');
                            $select = $('#' + data.formulario[i].num_rama);
                            $select.append('<label style="width: 400px;margin-left: 98px; margin-top:4px;">¿' + data.formulario[i].pregunta + '?</label>' +
                                '<div class="form-group multiple-form-group input-group">' +
                                '<select name="id_pregunta_mas[]" style="height: 0px;width: 0px;visibility: hidden;">' +
                                '<option selected>' + data.formulario[i].id_pregunta + '</option>' +
                                '</select>' +
                                '<input type="text" name="respuesta_mas[]" value="' + data.formulario[i].respuesta + '" id="asistiran" class="form-control" placeholder="¿' + data.formulario[i].pregunta + '?"' +
                                'style="width: 368px;margin-left: 98px; margin-top:6px;">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-success btn-add" id="btn-asistiran" style="margin-top:2px;margin-right:55px;">+</button>' +
                                '</span>' +
                                '</div>&nbsp&nbsp');

                        } else {
                            var $select = $('#' + data.formulario[i].num_rama);
                            $select.append('<label style="width: 400px;margin-left: 98px; margin-top:4px;">¿' + data.formulario[i].pregunta + '?</label>' +
                                '<input type="hidden" name="id_pregunta1[]" value="' + data.formulario[i].id_pregunta + '" class="form-control">' +
                                '<input type="text" name="respuesta1[]" value="' + data.formulario[i].respuesta + '" class="form-control"' +
                                'placeholder="¿' + data.formulario[i].pregunta + '?"' +
                                'style="width: 400px;margin-left: 98px; margin-top:6px;">&nbsp&nbsp');
                        }
                    }
                }

            },
            error: function(err) {
                const Toast = Swal.mixin();
                Toast.fire({
                    title: 'Error',
                    icon: 'error',
                    text: 'No hay preguntas registradas..!',
                    showConfirmButton: true,
                });
            }
        });

        $('#modal-editar').modal('show');

    });

    //BOTON PARA ELIMINAR
    $(document).on('click', '.btn-group .btn-danger', function(evento) {
        idpregunta = $(this).attr("name");
        fila = $(this).closest("tr");

        const Toast = Swal.mixin();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se Eliminará este registro!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            console.log(result);
            if (result.value) {
                eliminar();
            }
        })
    });
    //BOTON PARA ACTUALIZAR
    $(document).on('click', '#btnActualizar', function(evento) {
        evento.preventDefault(); //para evitar que la pagina se recargue
        // let form = $("#editar");
        // form.validate();
        //if (form.valid()) {
        actualizar();
        //}
    });

    //CUANDO EL MODAL SE CIERRA
    $('#modal-imagenes').on('hidden.bs.modal', function(e) {
        console.log("cerrando modal")
        explorer.fileinput('destroy');
    })

    function inicializarTabla() {
        tabla = $("#formularios").DataTable({
            "responsive": true,
            "autoWidth": false,
            "deferRender": true,
            "ajax": {
                "url": URL_SERVIDOR + "Cita/Pasaportes",
                "method": "GET",
                "dataSrc": function(json) {
                    //console.log(json.preguntas);

                    if (json.citas) {
                        for (let i = 0, ien = json.citas.length; i < ien; i++) {
                            //CREAMOS UNA NUEVA PROPIEDAD LLAMADA BOTONES
                            html = "";
                            html += '<td>';
                            html += '    <div class="btn-group">';
                            html += '        <button type="button" name="' + json.citas[i].id_cita + '" class="btn btn-primary" data-toggle="modal"';
                            html += '            data-target="#modal-editar">';
                            html += '            <i class="fas fa-edit" style="color: white"></i>';
                            html += '        </button>';
                            html += '        <button type="button" name="' + json.citas[i].id_cita + '" class="btn btn-warning" data-toggle="modal"';
                            html += '            data-target="#modal-galeria">';
                            html += '            <i class="fas fa-image" style="color: white"></i>';
                            html += '        </button>';
                            html += '        <button type="button" name="' + json.citas[i].id_cita + '" class="btn btn-danger" data-toggle="modal"';
                            html += '            data-target="#modal-eliminar">';
                            html += '            <i class="fas fa-trash" style="color: white"></i>';
                            html += '        </button>';
                            html += '    </div>';
                            html += '</td>';
                            json.citas[i]["botones"] = html;

                        }
                        $('#loading').hide();
                        return json.citas;
                    } else {
                        $('#loading').hide();
                        return [];
                    }
                }
            },
            columns: [
                { data: "nombre" },
                { data: "fecha" },
                { data: "hora" },
                { data: "botones" },
            ]
        });

    }

    function inicializarValidaciones() {
        $('#editar').validate({
            rules: {
                id_rama: {
                    required: true,
                    number: true
                },
                pregunta: {
                    required: true,
                    minlength: 10,
                    maxlength: 40
                },
                mas_respuestas: {
                    required: true,
                    minlength: 2,
                }
            },
            messages: {
                id_rama: {
                    required: "Seleccione la rama de la pregunta",
                },
                pregunta: {
                    required: "Ingrese la pregunta",
                    minlength: "Debe de tener una longitud minima de 10",
                    maxlength: "Debe de tener una longitud maxima de 40"
                },
                mas_respuestas: {
                    required: "Seleccione si va a contener mas respuestas",

                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');

            }
        });

    }

    function actualizar() {
        $('#loadingActualizar').show();

        ///OCUPAR ESTA CONFIGURACION CUANDO SOLO SEA TEXTO
        $.ajax({
            url: URL_SERVIDOR + "FormularioMigratorio/updateFormulario",
            method: 'POST',
            data: $("#editar-form").serialize()
        }).done(function(response) {
            //REST_Controller::HTTP_OK
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: response.mensaje,
                showConfirmButton: true,
            }).then((result) => {
                $('#modal-editar').modal('hide');;
                tabla.ajax.reload(null, false);
            });
        }).fail(function(response) {
            console.log(response);

            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Error',
                icon: 'error',
                text: "ERROR EN ENVIO DE INFORMACION",
                showConfirmButton: true,
            });

        }).always(function(xhr, opts) {
            $('#loadingActualizar').hide();
        });
    }

    function eliminar() {
        let data = {
            "id_pregunta": idpregunta
        };
        $.ajax({
            url: URL_SERVIDOR + "Asesoria/deletePregunta",
            method: "DELETE",
            timeout: 0,
            data: data
        }).done(function(response) {
            //REST_Controller::HTTP_OK
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Exito...',
                icon: 'success',
                text: response.mensaje,
                showConfirmButton: true,
            }).then((result) => {
                tabla.ajax.reload(null, false);
            });
        }).fail(function(response) {

            console.log(response);
            const Toast = Swal.mixin();
            Toast.fire({
                title: 'Error',
                icon: 'error',
                text: "ERROR EN EL ENVIO DE INFORMACION",
                showConfirmButton: true,
            });

        }).always(function(xhr, opts) {
            $('#loadingActualizar').hide();
        });
    }

    function inicializarComboRama() {
        //COMBO DE CONTACTOS
        $.ajax({
            url: URL_SERVIDOR + "Asesoria/ramita",
            method: "GET"
        }).done(function(response) {
            //REST_Controller::HTTP_OK
            var $select = $('#id_rama');
            $.each(response.ramas, function(i, name) {
                $select.append('<option value=' + name.id_rama + '>' + name.categoria_rama +
                    '</option>');
            });
        }).fail(function(response) {
            var $select = $('#id_rama');
            $select.append('<option disabled="" selected>Seleccione</option>');

        }).always(function(xhr, opts) {
            $('#loading').hide();
        });
    }
});