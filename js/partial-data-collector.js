/*
    This file collects partial data from the client-form, in order to meet the following requirement:
    Leads may not fill out everything in the Landing page or they may leave the page before hitting submit.
    We want to be able to able to capture anything they may enter into the form without them submitting the form.
 */
$(document).ready(function(){
    /*
        Whenever something loses focus, we'll check for an email or phone number.
        No need to collect info unless at least one of those is present.
      */
    $('#lead_form input').blur(function(){
        if($('#email').val() || $('#phone').val()){
            var data = $('#lead_form').serialize() + '&ajax=true';

            $.post('src/lead-submit.php', data, function(response){
                console.log(response);
            });
        }
    });
});