$(document).ready(function() {

        $.ajax({
            type: "POST",
            url: URL_SERVIDOR+"Asesoria/preguntaAutomatica",
            dataType: "json",
            success: function(data) {
                
            },
            error: function(err) {
            }
        });

    });