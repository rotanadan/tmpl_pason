jQuery(document).ready(function($) {

    $('.eq-height').each(function(){
        heightCenter($(this));
    })

    function heightCenter(container) {
        var outerHeight = container.height();

        var inner = $('div', container).first();

        var innerHeight = inner.height();

        var distance = outerHeight - innerHeight;

        var topBottomPadding = distance / 2;
        var padCss = topBottomPadding + 'px';

        inner.css('padding-top', padCss);
        inner.css('padding-bottom', padCss);
    }
});