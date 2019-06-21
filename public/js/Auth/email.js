$(document).ready(function() {
    var email = false;
    $('#email').keyup(function() {
      var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if ($('#email').val().trim().length > 0 && regex.test($('#email').val().trim())) {
        email = true;
      }else{
        email = false;
      }
    });
    $('#submit-email').click(function() {
        if (email == true) {
            $(this).empty().addClass('btn-login').append('<i class="fas fa-spinner fa-pulse fa-2x"></i>');
            $('#cancel-link').attr('hidden', true);
        }
    });
});
