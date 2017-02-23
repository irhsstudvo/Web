$(document).on("ready", function() {
    /*           */
    /* FUNCTIONS */
    /*           */

    //read variable from URL
    function getURLVar(variable) {
        var query = window.location.href;
        if (query.indexOf(variable) == -1){
          return false;
        }else{
          return query[query.indexOf(variable) + variable.length + 1];
        }
    }

    //scroll to anchor
    function scrollToAnchor(tag) {
        $('html,body').animate({
            scrollTop: tag.offset().top
        }, 1000);
    }

    // move slightly up while fading into view
    function fadeInAnimation(elem) {
        elem.css("top", "+=30px");
        elem.animate({
            'opacity': '1',
            'top': '-=30px'
        }, 1000);
    }

    //fade in object if scrolled to
    function checkFadeIn() {
        $('.fadeIn').each(function(i) {
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            if (bottom_of_window > bottom_of_object && $(this).css("opacity") == "0") {
                fadeInAnimation($(this));
                $(this).removeClass("fadeIn");
            }
        });
    }

    //remove background on scroll to prevent overlap
    function removeBG() {
        var height = $(".fullscreen-bg").outerHeight();
        var transitionTop = $('.transition').offset().top;
        //scroll past video
        if ($(window).scrollTop() > height) {
            $(".fullscreen-bg").hide();
        } else {
            $(".fullscreen-bg").show();
        }
        //scroll past transition
        if ($(window).scrollTop() > (height + transitionTop)) {
            $('body:before').css('background', 'none !important');
        } else {
            $('body:before').css('background', "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://bridgeday.000webhostapp.com/img/bridgeTeam.jpg') no-repeat center center fixed");
        }
    }

    // check if the user entered from a form submit
    function checkFormSubmit() {
        var errCode = getURLVar("error");
        if (errCode !== false) {
            if (errCode == "0") {
                $('#errorMSG').css("color", "green");
                $('#errorMSG').html('Successfully registered.');
            } else if (errCode == "1") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('You must complete all fields.');
            } else if (errCode == "2") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('Workshop choices must be different.');
            }
        }
    }

    /*            */
    /*    MAIN    */
    /*            */
    checkFadeIn();
    checkFormSubmit();

    // on window scroll, fade item if in view and remove background if passed
    $(window).scroll(function() {
        checkFadeIn();
        removeBG();
    });

    // red arrow and text on hover, else white
    $('#downArrowWrapper').hover(function() {
        $('#downArrow g path').css("fill", "red");
        $('figcaption').css("color", "red");
    }, function() {
        $('#downArrow g path').css("fill", "white");
        $('figcaption').css("color", "white");
    });

    // scroll to second section if arrow clicked
    $('#downArrowWrapper').on("click", function() {
        scrollToAnchor($('.second'));
    });
});
