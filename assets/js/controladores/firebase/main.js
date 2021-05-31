$("#login-btn").on("click", function () {
  let btnHTML = $(this).html();
  $(this).html("<img id='loader' src='assets/img/loader.svg' alt='Loading...!' />");
  const Toast = Swal.mixin();

  $.ajax({
    url: "http://localhost/API-REST-PHP/Usuario/loginUser",
    method: "POST",
    data: $("#login-form").serialize()
  }).done(function (resp) {

    //NUESTRO SERVICIO RETORNARA UN TOKEN QUE ES EL
    // QUE OCUPAREMOS PARA MANEJAR LA SESION DEL USUARIO
    if (!resp.err) {
      if (resp.nivel == 'CLIENTE') {
        //aqui estamos guardando la foto de perfil del usuario          
        let token = resp.token;
        firebase
          .auth()
          .signInWithCustomToken(token)
          .then(function (data) {
            $("#login-btn").html(btnHTML);
            if (data.user.uid != "") {

              $.post("servicios/client/session.php", {
                action: "start",
                id_cliente: resp.id_cliente,
                nombre: resp.nombre,
                correo: resp.correo,
                nivel: resp.nivel,
                celular: resp.celular,
                dui: resp.dui,
                foto: resp.foto,
                user_uuid: resp.user_uuid,
              }, function (data) {
                location = 'index.php';
              });
            }
          }).catch(function (error) {
            // Handle Errors here.
            let errorCode = error.code;
            let errorMessage = error.message;
            alert(errorMessage);
          });
      } else {
        $("#login-btn").html(btnHTML);
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'No tienes los permisos necesarios',
          showConfirmButton: true,
        });
      }
    } else {
      Toast.fire({
        title: 'Oops...',
        icon: 'error',
        text: 'Credenciales no validas',
        showConfirmButton: true,
      });
    }

  }).fail(function (resp) {

    if (resp.responseJSON.err) {
      if (resp.responseJSON.mensaje == 'EMAIL_NOT_FOUND') {
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'Correo electrónico no registrado',
          showConfirmButton: true,
        });
      }
      else if (resp.responseJSON.mensaje == 'INVALID_EMAIL') {
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'Correo electrónico no valido',
          showConfirmButton: true,
        });
      }
    } else {

      Toast.fire({
        title: 'Oops...',
        icon: 'error',
        text: 'Credenciales no validas',
        showConfirmButton: true,
      });
    }
    $("#login-btn").html(btnHTML);

  });;
});

$(".login-register-btn").on("click", function () {
  changeForm(this);
});

function changeForm($this) {
  $($this).children("span").toggleClass("active");

  $(".content").toggleClass("active");
}
$(".card input").on("focus blur", function () {
  $(".card").toggleClass("active");
});
