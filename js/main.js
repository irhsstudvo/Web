$(document).on("ready", function() {
    /*           */
    /* FUNCTIONS */
    /*           */
    
    //scroll to anchor
    function scrollToAnchor(tag) {
        $('html,body').animate({
            scrollTop: tag.offset().top
        }, 1000);
    }

    // fade an image out and fade in a new image
    function fadeImage(item, delay, imgPath) {
        item.fadeOut(delay, function() {
            item.attr('src', imgPath);
            item.fadeIn(delay);
        });
    }

    // move slightly up while fading into view
    function fadeInAnimation(elem) {
        elem.css("top", "+=30px");
        elem.animate({
            'opacity': '1',
            'top': '-=30px'
        }, 1000);
    }

    function checkFadeIn(){
      $('.fadeIn').each(function(i) {
          var bottom_of_object = $(this).offset().top + $(this).outerHeight();
          var bottom_of_window = $(window).scrollTop() + $(window).height();

          if (bottom_of_window > bottom_of_object && $(this).css("opacity") == "0") {
              fadeInAnimation($(this));
              $(this).removeClass("fadeIn");
          }
      });
    }

    checkFadeIn();
    // on window scroll, fade item if in view
    $(window).scroll(function() {
        checkFadeIn();
    });

    // red arrow on hover, else white
    $('#downArrowWrapper').hover(function() {
        fadeImage($('#downArrow'), 150, 'img/icons/redArrow.png');
        $('figcaption').animate({ color: "red" }, 300);
    }, function() {
        fadeImage($('#downArrow'), 150, 'img/icons/whiteArrow.png');
        $('figcaption').animate({ color: "white" }, 300);
    });

    // scroll to second section if arrow clicked
    $('#downArrowWrapper').on("click", function() {
        scrollToAnchor($('.second'));
    });
});
