$(document).ready(function(){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $('#btn-send-email').click(function(){
        var subject = $('#subject').val().trim();
        var email = $('#email').val().trim();
        if(subject.length > 0 && regex.test(email)){
            $(this).empty();
            $(this).append(
                '<i class="fas fa-spinner fa-spin"></i> Enviando..'
            ).addClass('btn-block');
            $('#btn-send-cancel').attr('hidden',true);
        }
    });

    $('#table-info').on('hidden.bs.collapse', function(){
        $('#collapse-icon').removeClass('rotateDown').addClass('rotateUp');
    });
    $('#table-info').on('shown.bs.collapse', function(){
        $('#collapse-icon').removeClass('rotateUp').addClass('rotateDown');
    });
    $('#table-degrees').on('hidden.bs.collapse', function(){
        $('#collapse-icon-degrees').removeClass('rotateDown').addClass('rotateUp');
    });
    $('#table-degrees').on('shown.bs.collapse', function(){
        $('#collapse-icon-degrees').removeClass('rotateUp').addClass('rotateDown');
    });
});