/**
 * Created by chadwindnagle on 2/5/15.
 */

jQuery(document).ready(function($){
    $('.img-holder').each(function() {
        var maxheight = $(this).attr('data-max-height');
        var className = $(this).attr('id');

        $(this).imageScroll({
            holderMaxHeight: maxheight,
            holderClass: className
        });
    });
});