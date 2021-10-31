$("#login-btn").on("click", function () { login(); });

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

function initPreferencias(resp) {

  localStorage.setItem("id_cliente", resp.id_cliente);
  localStorage.setItem("nombre", resp.nombre);
  localStorage.setItem("correo", resp.correo);
  localStorage.setItem("nivel", resp.nivel);
  localStorage.setItem("celular", resp.celular);
  localStorage.setItem("dui", resp.dui);
  localStorage.setItem("foto", resp.foto);
  localStorage.setItem("user_uuid", resp.user_uuid);
}

function login() {

  let btnHTML = $("#login-btn").html();
  $("#login-btn").html("<img id='loader' src='assets/img/loader.svg' alt='Loading...!' />");
  $("#login-btn").prop('disabled', true);
  const Toast = Swal.mixin();
  $.ajax({
    url: URL_SERVIDOR + "Usuario/loginUser",
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
            initPreferencias(resp);

            if (data.user.uid != "") {
              $.post("servicios/client/session.php", {
                action: "start"
              }, function (data) {
                location = 'index.php';
              });
            }
          }).catch(function (error) {
            $("#login-btn").prop('disabled', false);
            $("#login-btn").html(btnHTML);
            // Handle Errors here.
            let errorCode = error.code;
            let errorMessage = error.message;
            alert(errorMessage);
          });
      } else {
        $("#login-btn").prop('disabled', false);
        $("#login-btn").html(btnHTML);
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'No tienes los permisos necesarios',
          showConfirmButton: true,
        });
      }
    } else {
      $("#login-btn").prop('disabled', false);
      $("#login-btn").html(btnHTML);
      Toast.fire({
        title: 'Oops...',
        icon: 'error',
        text: 'Credenciales no validas',
        showConfirmButton: true,
      });
    }

  }).fail(function (resp) {
    $("#login-btn").prop('disabled', false);
    $("#login-btn").html(btnHTML);
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
      else if (resp.responseJSON.mensaje == 'INVALID_PASSWORD') {
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'Contraseña Incorrecta',
          showConfirmButton: true,
        });
      }
      else if (resp.responseJSON.mensaje == 'TOO_MANY_ATTEMPTS_TRY_LATER : Access to this account has been temporarily disabled due to many failed login attempts. You can immediately restore it by resetting your password or you can try again later.') {
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'acceso a esta cuenta se ha inhabilitado temporalmente debido a muchos intentos fallidos de inicio de sesión. Puede restaurarlo inmediatamente restableciendo su contraseña o puede intentarlo de nuevo más tarde.',
          showConfirmButton: true,
        });
      } else {
        Toast.fire({
          title: 'Oops...',
          icon: 'error',
          text: 'Credenciales no validas',
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

  });

}
$('#password').keypress(function (e) {
  var keycode = (e.keyCode ? e.keyCode : e.which);
  if (keycode == '13') {
    login();
    e.preventDefault();
    return false;
  }
});