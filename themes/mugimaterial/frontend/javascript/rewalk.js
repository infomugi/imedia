/* 
 * @author: Darwin Themes
 */

$(document).ready(function() {
    $("#contact-form").submit(function() {
        rewalk.send_contact_email();
    });
    $("#gaq-form").submit(function() {
        rewalk.send_gaq_email();
    });
    $('.slider-tweet').each(function() {
        $(this).bxSlider({pager: true, controls: true, useCSS: false, adaptiveHeight: true});
    });
    $("#tw-container .bx-wrapper").addClass("slider-a");
});



var rewalk = (function($) {
    "use strict";
    var url = "functions.php";
    function upload_file(id) {
        $("#gaq-form button").attr("disabled","disabled");
        var input = document.getElementById(id), file, reader;
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData();
        }
        if (window.FileReader) {
            reader = new FileReader();
            file = input.files[0];
            reader.readAsDataURL(file);
        }
        formdata.append('file', file);
        formdata.append('ajaxFct', 'ajx_save_file');
        $.ajax({
            url: url,
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                if (data['status'] == true) {
                    $("#gaq-form button").removeAttr("disabled");
                    console.log("#" + id + " span");
                    $("#" + id).parent().find("span").text(data.filepath);
                } else {
                    alert(data['details']);
                }
            }
        });
    }


    function send_contact_email() {
        $("#confirm-message").remove();

        var send = true;
        $("#contact-form").find('[required]').each(function() {
            if ($(this).val() == "") {
                send = false;
            }
        });
        if (send) {
            $.post(
                    url,
                    {
                        ajaxFct: "ajx_send_contact_email",
                        name: $("#contact-form").find("#ca").val(),
                        email: $("#contact-form").find("#cb").val(),
                        phone: $("#contact-form").find("#cc").val(),
                        company: $("#contact-form").find("#cd").val(),
                        message: $("#contact-form").find("#ce").val(),
                    },
                    function(response) {
                        if (response['status'] == true)
                        {
                            $("label").removeAttr("style");
                            $("#contact-form").find("#ca").val("");
                            $("#contact-form").find("#cb").val("");
                            $("#contact-form").find("#cc").val("");
                            $("#contact-form").find("#cd").val("");
                            $("#contact-form").find("#ce").val("");
                            $("#contact-form").parent().find("header").append('<p id="confirm-message"><span style="padding-left:20px;">Your message has been sent.</span></p>');
                        } else {
                            $("#contact-form").parent().find("header").append('<p id="confirm-message"><span style="padding-left:20px;">'+response.details+'</span></p>');
                        }
                    }, 'json');
        }
    }

    function send_gaq_email() {
        $("#confirm-message").remove();
        var send = true;
        $("#gaq-form").find('[required]').each(function() {
            if ($(this).val() == "") {
                send = false;
            }
        });
        if (send) {
            $.post(
                    url,
                    {
                        ajaxFct: "ajx_send_gaq_email",
                        name: $("#gaq-form").find("#fba").val(),
                        email: $("#gaq-form").find("#fbb").val(),
                        phone: $("#gaq-form").find("#fbc").val(),
                        company: $("#gaq-form").find("#fbd").val(),
                        message: $("#gaq-form").find("#fbe").val(),
                        file: $("#gaq-form").find("#fbf").val(),
                    },
                    function(response) {
                        if (response['status'] == true)
                        {
                            $("label").removeAttr("style");
                            $("#gaq-form").find("#fba").val("");
                            $("#gaq-form").find("#fbb").val("");
                            $("#gaq-form").find("#fbc").val("");
                            $("#gaq-form").find("#fbd").val("");
                            $("#gaq-form").find("#fbe").val("");
                            $("#fbf").parent().find("span").text("Attach a file");
                            $("#gaq-form").parent().find(".file-a").after('<p id="confirm-message"><span style="padding-left:20px;">Your message has been sent.</span></p>');
                        } else {
                            $("#gaq-form").parent().find(".file-a").after('<p id="confirm-message"><span style="padding-left:20px;">'+response.details+'</span></p>');
                        }
                    }, 'json');
        }
    }

    return {
        send_contact_email: send_contact_email,
        send_gaq_email: send_gaq_email,
        upload_file: upload_file
    };
})(jQuery);

