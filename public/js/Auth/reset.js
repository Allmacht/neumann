$(document).ready(function(){
  var email = false;
  var verification = false;

  $('#email').keyup(function(){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ($(this).val().trim().length > 0 && regex.test($(this).val().trim())){
      email = true;
    }else{
      email = false;
    }
  });

  $('#password').keyup(function(){
    var password = $(this).val().trim();
    $('#password_confirmation').val('').removeClass('is-invalid').removeClass('is-valid');
    $('#alert-password').attr('hidden',false);
    $('#alert-password').removeClass('alert-success').addClass('alert-warning');
    if(password.length >= 8){
      $(this).removeClass('is-invalid').addClass('is-valid');
    }else{
      $(this).removeClass('is-valid').addClass('is-invalid');
    }
  });

  $('#password_confirmation').keyup(function(){
      var password_confirmation = $(this).val().trim();
      if (password_confirmation === $('#password').val().trim() && password_confirmation.length >= 8) {
        $(this).removeClass('is-invalid').addClass('is-valid');
        $('#alert-password').removeClass('alert-warning').addClass('alert-success');
        verification = true;
        $('#button-submit').prop('disabled',false);
      }else{
        $(this).removeClass('is-valid').addClass('is-invalid');
        $('#alert-password').removeClass('alert-success').addClass('alert-warning');
        verification = false;
        $('#button-submit').prop('disabled',true);
      }
  });

  $('#button-submit').click(function(){
      if(email == true && verification == true){
        $('#btn-cancel').attr('hidden', true);
        $(this).addClass('btn-login').empty().append('<i class="fas fa-spinner fa-pulse fa-2x"></i>');
      }
  });

});
