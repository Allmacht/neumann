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

    $('.btn-logout').hover(function(){
        $('.dropdown-menu-user').css('border-style','solid');
        $('.dropdown-menu-user').css('border-color','#DC3545');
        $('.dropdown-menu-user').css('transition','0.5s');
    }, function(){
        $('.dropdown-menu-user').css('border-style','solid');
        $('.dropdown-menu-user').css('border-color','#D4D3D8');
    });

    $('.btn-profile').hover(function(){
        $('.dropdown-menu-user').css('border-style','solid');
        $('.dropdown-menu-user').css('border-color','#2B91FF');
        $('.dropdown-menu-user').css('transition','0.5s');
    },function(){
        $('.dropdown-menu-user').css('border-style','solid');
        $('.dropdown-menu-user').css('border-color','#D4D3D8');
    });

});
