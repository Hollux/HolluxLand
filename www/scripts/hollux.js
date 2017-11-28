/*BOUTON SLIDEDOWN/UP*/

$('.content').slideDown(2000, function () {
});

$('.bSlideShow').click(function () {
    var current = $(this).attr('data-link');
    $('div[data-link=' + current + ']').addClass('active');
    if ($('div[data-link=' + current + ']').is(":visible")) {

        $('div[data-link=' + current + ']').slideUp('slow', function () {
        });
        $('div[data-link=' + current + ']').removeClass('active');
    }
    else {
        $('div[data-link=' + current + ']').slideDown('slow', function () {
        });
    }
});

/*RETOUR HAUT DE PAGE*/

//fais apparaitre quand scrollTop >2
//clic => animate scrollTop
ScrollToTop = function () {
    var s = $(window).scrollTop();
    if (s > 2) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
}

//arrète animate en cas de scroll etc(les bind)
StopAnimation = function () {
    $("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function () {
        $('html, body').stop();
    });
}

//lance les fonctions
$(window).scroll(function () {
    ScrollToTop();
});

// DOM ready
$(function () {
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 500);
        return false;
    });

    StopAnimation();

});

function onSubmit(token) {
    jQuery('.g-recaptcha-response').prop('value', token);
    jQuery('.g-recaptcha').closest('form').submit();
}

// SMASH UP INCLUDE

//sntn
//$('.container').height($(window).height() - $('footer').height())
