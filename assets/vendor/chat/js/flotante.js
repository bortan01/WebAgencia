/* Cookies */
$(document).ready(function(){
    $("#cookies").addClass("display");
     $("#close-cookies").click(function(){ 
      event.preventDefault();
      $("#cookies").addClass("close-cookies");
    });
  });