jQuery(document).ready(function($) {

    $('.eq-height').each(function(){
        heightCenter($(this));
    });

    if ($('#products-main-banner-slides').length) {
        heightCenter($('#products-main-banner-slides'));
    }

    function heightCenter(container) {
        var outerHeight = container.height();

        var inner = $('.container', container);

        var innerHeight = inner.height();

        var distance = outerHeight - innerHeight;

        var topBottomPadding = distance / 2;
        var padCss = topBottomPadding + 'px';

        inner.css('padding-top', padCss);
        inner.css('padding-bottom', padCss);
    }
});