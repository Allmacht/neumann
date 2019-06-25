$(window).resize(function(){
  $('#sidenav').width(0);
  $('#main').css("margin-left", 0);
});

$(document).ready(function(){
    $('#btn-sidenav-toggle').click(function(){
        if($('#sidenav').width() > 0){
          $('#sidenav').width(0);
          if(window.matchMedia("(min-width:992px)").matches){
            $('#main').css("margin-left", 0);
          }
        }else {
          $('#sidenav').width(250);
          if(window.matchMedia("(min-width:991px)").matches){
            $('#main').css("margin-left", 255);
          }
        }
    });
});
