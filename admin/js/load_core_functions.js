function remove_try_on_image_dressfit(){
    jQuery('#dressfit_try_on_image_URL').val('');
    jQuery('#dressfit_picsrc').hide();
}
function upload_try_on_image_dressfit() {
            var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            jQuery('#dressfit_try_on_image_URL').val(attachment.url);
            jQuery('#dressfit_picsrc').css("display", "block");
            jQuery('#dressfit_picsrc').attr('src',attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
    wp.media.editor.open();
    }