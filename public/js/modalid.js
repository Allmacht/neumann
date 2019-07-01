$(document).ready(function(){
    $('.open-modal').click(function(){
        if($(this).data('action') == 'disable'){
            $('#modal-disable-id').val($(this).data('id'));
        }

        if($(this).data('action') == 'enable'){
            $('#modal-enable-id').val($(this).data('id'));
        }

        if($(this).data('action') == 'delete'){
            $('#modal-delete-id').val($(this).data('id'));
        }
    });
});