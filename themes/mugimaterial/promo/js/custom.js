jQuery(function () {
	"use strict";
    
    /*global jQuery, $*/
	jQuery(document).ready(function(){
		
		
		// Parallax 
		$('.home-area').parallax("50%", 0.1);
		$('.cta-area').parallax("50%", 0.1);
		$('.testimonial-innr').parallax("50%", 0.1);
		$('.contact-info-area').parallax("50%", 0.1);
		
		// OWL Carousel
		$("#owl-example").owlCarousel({
 
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			singleItem:true
 
		});
		
		// go-to-form
		jQuery(window).bind('scroll', function(e) {
			parallax();
		});
			
			jQuery('.more-feature').on('click', function() {
				jQuery('html, body').animate({ scrollTop:$('#more-feature').offset().top - 0 }, 1500,
				function() {
					parallax();
				});
				return false;
			});
			
			jQuery('.go-form').on('click', function() {
				jQuery('html, body').animate({ scrollTop:$('#form-area').offset().top - 0 }, 1500,
				function() {
					parallax();
				});
				return false;
			});

		function parallax() {
			var scrollPosition = $(window).scrollTop();
		}
		
	});
	
		
// Function for email address validation
	function isValidEmail(emailAddress) {

	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

		return pattern.test(emailAddress);

	};	
	/* =================================
	  CONTACT FORM         
	=================================== */
    $("#contactform").submit(function (e) {
        e.preventDefault();
        var name = $("#cf-name").val();
        var email = $("#cf-email").val();
        var message = $("#cf-phone").val();
        var dataString = 'name=' + name + '&email=' + email + '&phone=' + message;

        function isValidEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };
        if (isValidEmail(email) && (message.length > 1) && (name.length > 1)) {
            $.ajax({
                type: "POST",
                url: "sendmail.php",
                data: dataString,
                success: function () {
                    $('.success').fadeIn(1000);
                    $('.error').fadeOut(500);
                }
            });
        }
        else {
            $('.error').fadeIn(1000);
            $('.success').fadeOut(500);
        }
        return false;
    });	
	
}());