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
        // our ruler is our element
        var rule = element;

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
        var position = ruler_x + 'px ' + '0px';

        // reset the css
        rule.css('background-position', position );
    }

});