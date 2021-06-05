<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link rel="stylesheet" href="../../assets/vendor/chat/css/style.css">
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<div class="main-wrapper" style="margin-top: 80px;">

   <div class="flex-box">
      <div class="box-2">
         <div class="chat-container">
            <div class="heading"><i class="fas fa-user"></i>&nbsp;<span class="name"></span></div>
            <div class="messages">
               <div class="chats" id="chats">
                  <div class="message-container">

                  </div>
               </div>
               <div class="write-message">
                  <div class="message-area">
                     <textarea class="message-input" id="message-input" placeholder="Escribe tu mensaje"></textarea>
                     <button id="btn-enviar" class="send-btn"><i class="fab fa-telegram-plane"></i>&nbsp;Enviar</button>
                  </div>
               </div>

            </div>

         </div>
      </div>
   </div>
</div>

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<!-- Firebase App is always required and must be first -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>
<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-firestore.js"></script>
<script src="../../assets/js/controladores/firebase/firestore-config.js"></script>
<script src="../../assets/vendor/chat/js/chat.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>