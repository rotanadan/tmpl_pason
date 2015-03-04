jQuery(document).ready(function($) {

    $('.eq-height').each(function(){
        heightCenter($(this));
    })

    function heightCenter(container) {
        var outerHeight = container.height();

        console.log(container);

        var inner = $('div', container).first();

        console.log(inner);

        var innerHeight = inner.height();

        var distance = outerHeight - innerHeight;

        var topBottomPadding = distance / 2;
        var padCss = topBottomPadding + 'px';

        console.log(padCss);
        inner.css('padding-top', padCss);
        inner.css('padding-bottom', padCss);
    }
});