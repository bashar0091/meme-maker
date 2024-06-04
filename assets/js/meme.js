jQuery(document).ready(function($){

    $('.image_parts').on('click', function(){
        var get_group_id = $(this).parents('.image_parts_group').attr('id');
        $(`#${get_group_id} .image_parts`).removeClass('border-4')
        $(`#${get_group_id} .removeButton`).removeClass('meme_acitve')
        $(this).addClass('border-4');
    });

});