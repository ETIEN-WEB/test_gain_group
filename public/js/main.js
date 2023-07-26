$(document).ready(function(){
    $('#ctn_photo').css('display','none');

    $("#type_persone").on('change',function(){
        var type_persone = $(this).val();
        if(type_persone ==2){
            $('#ctn_photo').css('display','block');

        }else{
            $('#ctn_photo').css('display','none');
        }

    });
});
