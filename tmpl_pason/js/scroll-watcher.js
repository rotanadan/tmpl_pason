jQuery(document).ready(function($){

    // attach to the scroll function
    $(window).scroll(function() {
        makeScroll($('.light-ruler-top'), 'right');
        makeScroll($('.light-ruler-bottom'), 'left');
    });

    /*
     * takes an input element and a direction (left|right) and scrolls the background property in px
     */
    function makeScroll(element, direction)
    {
        var rule = element;

        var ruler_css = rule.css('backgroundPosition');

        // position comes in as '0% 0%'
        var ruler_xy = ruler_css.split(" ");

        var ruler_x  = parseInt(ruler_xy[0]);

        if (direction == 'right')
        {
            ruler_x = ruler_x + 1;
        }

        if (direction == 'left')
        {
            ruler_x = ruler_x - 1;
        }

        // currently unused
        var ruler_y  = parseInt(ruler_xy[1]);

        var position = ruler_x + 'px ' + '0px';

        rule.css('background-position', position );
    }

});