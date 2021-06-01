function getId() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "GetId"
   }, function (data) {
      respuesta = JSON.parse(data);
      console.log(respuesta)
   });
   return respuesta;
}
function getNombre() {
   let respuesta = '';
   return $.post("servicios/client/session.php", {
      action: "getNombre"
   }, function (data) {
      respuesta = JSON.parse(data);
      return respuesta;
   });
}
function getCorreo() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getCorreo"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}
function getNivel() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getNivel"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}
function getCelular() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getCelular"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}
function getDui() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getDui"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}
function getNombre() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getFoto"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}
function getNombre() {
   let respuesta = '';
   $.post("servicios/client/session.php", {
      action: "getUid"
   }, function (data) {
      respuesta = JSON.parse(data);
   });
   return respuesta;
}




