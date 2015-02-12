/**
 * Created by chadwindnagle on 2/5/15.
 */

jQuery(document).ready(function($){

    // execute the parallax effect
    $('.img-holder').each(function() {
        var maxheight = $(this).attr('data-max-height');
        var className = $(this).attr('id');

        $(this).imageScroll({
            holderMaxHeight: maxheight,
            holderClass: className
        });
    });


    // add indicators to our carousel
    $("#home-slides .item").each(function(index, value) {
        var classParam = '';

        // if its the first one add the active class
        if (index === 0)
        {
            classParam = 'class="active"';
        }

        // for each slide push in a indicator button
        $('.carousel-indicators').append('<li data-target="#home-slides" data-slide-to="' + index + '" ' + classParam + '></li>');
    });


});