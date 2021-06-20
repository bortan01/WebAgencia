$("#logout").on("click", function () {
   firebase.auth().signOut().then(() => {
      console.log("cerrando sesion");
   }).catch((error) => {
      console.log(error);
   });
   $.post("servicios/client/session.php", {
      action: "logout"
   }, function (data) {
      localStorage.clear();
      location = 'index.php';
   });
});