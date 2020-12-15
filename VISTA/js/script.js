$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
});

function alertaMostrar(){
  $(".alerta").show();
  setTimeout(function(){
      $(".alerta").hide(); 
  }, 2000);
}