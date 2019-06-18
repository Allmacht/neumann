$(document).ready(function(){
    $('#password').keyup(function(){
        $('#confirm-password').val("").removeClass('is-invalid').removeClass('is-valid');
        $('#alert-password').attr('hidden', false);
        if($(this).val().length >= 8){
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#confirm-password').attr('disabled', false);
        }else{
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#alert-password').removeClass('alert-success').addClass('alert-danger');
            $('#confirm-password').attr('disabled', true);
        }
    });

    $('#confirm-password').keyup(function(){
        var password = $('#password').val();
        if($(this).val() === password){
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#alert-password').removeClass('alert-danger').addClass('alert-success');
            $('#btn-register-submit').attr('disabled', false);
        }else{
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#alert-password').removeClass('alert-success').addClass('alert-danger');
            $('#btn-register-submit').attr('disabled', true);
        }
    });
});