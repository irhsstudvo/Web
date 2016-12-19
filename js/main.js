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
        
    // green arrow on hover, else white
    $('#downArrow').hover(function() {
        fadeImage($(this), 150, 'img/icons/redArrow.png');
    }, function() {
        fadeImage($(this), 150, 'img/icons/whiteArrow.png');
    });

    // scroll to second section if arrow clicked
    $('#downArrow').on("click", function() {
        scrollToAnchor($('.second'));
    });
});
