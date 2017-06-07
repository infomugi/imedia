jQuery(document).ready(function($) {  
    jQuery('.color').colorPicker();
    var fileInput = '';  
    jQuery('#upload-logo-live-chat').click(function() {
        fileInput = jQuery(this).prev('input');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });
    window.send_to_editor = function(html) {
     imgurl = jQuery('img',html).attr('src');
     fileInput.val(imgurl);
     tb_remove();
    }  
    $("#fb-checkall").change(function(){
        $(".live_chat_facebook_show").prop('checked', $(this).prop("checked"));
    }) 
});
