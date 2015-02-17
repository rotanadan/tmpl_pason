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

    /*
     * tracks the carousel slider indicators and assigns an active class
     * to the title indicator
     */
    $('#home-slides').on('slid.bs.carousel', function() {
        // get the active carousel indicator index
        var index = $('.carousel-indicators .active').index();

        // remove active class from all titles
        $(".indicator-titles li").removeClass('active');

        // add the active class back to just the one which is active
        $(".indicator-titles li:eq(" + index + ")").addClass('active');
    });

    // add indicators to our carousel
    $("#home-slides .item").each(function(index, value) {
        var classParam = '';

        // if its the first one add the active class
        if (index === 0)
        {
            classParam = 'class="active"';
        }

        var indicators = $('.carousel-indicators');
        var indicatorTitles = $('.indicator-titles');

        if (indicatorTitles)
        {
            var title = $(this).attr('data-slide-title');
            // for each slide push in a indicator button
            indicatorTitles.append('<li data-target="#home-slides" data-slide-to="' + index + '" ' + classParam + '>' + title + '</li>');
        }

        // for each slide push in a indicator button
        indicators.append('<li data-target="#home-slides" data-slide-to="' + index + '" ' + classParam + '></li>');

    });
});