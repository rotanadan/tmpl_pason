jQuery(document).ready(function($){

    // attach to the scroll function
    $(window).scroll(function() {

        if ($('.orange-ruler-bottom').length) {
            makeScroll($('.orange-ruler-bottom'), 'right', 'bottom');
        }

        if ($('.light-ruler-top').length) {
            makeScroll($('.light-ruler-top'), 'right', 'bottom');
        }

        if ($('.light-ruler-bottom').length) {
            makeScroll($('.light-ruler-bottom'), 'left', 'bottom');
        }

        if ($('.dark-ruler-top').length) {
            makeScroll($('.dark-ruler-top'), 'left', '0px');
        }

        if ($('.dark-ruler-bottom').length) {
            makeScroll($('.dark-ruler-bottom'), 'right', 'bottom');
        }

        if ($('.gray-ruler-top').length) {
            makeScroll($('.gray-ruler-top'), 'left', '0px');
        }


    });

    /*
     * takes an input element and a direction (left|right) and scrolls the background property in px
     */
    function makeScroll(element, direction, bottomPosition)
    {
        // our ruler is our element
        var rule = element;

        if (! rule )
        {
            return;
        }

        var ruler_css = rule.css('backgroundPosition');

        // position comes in as '0% 0%'
        var ruler_xy = ruler_css.split(" ");

        var ruler_y  = parseInt(ruler_xy[1]); // currently unused
        var ruler_x  = parseInt(ruler_xy[0]);

        // check if we are going left or right
        if (direction == 'right')
        {
            // right we add
            ruler_x = ruler_x + 1;
        }

        if (direction == 'left')
        {
            // left we subtract
            ruler_x = ruler_x - 1;
        }

        // build the position property
        var position = ruler_x + 'px ' + bottomPosition;

        // reset the css
        rule.css('background-position', position );
    }

});