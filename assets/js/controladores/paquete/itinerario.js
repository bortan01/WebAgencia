const valores = window.location.search;
const urlParams = new URLSearchParams(valores);
const ID = urlParams.get("id");

$.ajax({
    url: "http://localhost/API-REST-PHP/Itinerario/itinerarioForApp?id_tours=" + ID,
    method: "GET",
}).done(function (response) {
    //REST_Controller::HTTP_OK
    console.log(response);
}).fail(function (response) {

}).always(function (xhr, opts) {

});