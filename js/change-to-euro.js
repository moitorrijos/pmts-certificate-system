; (function( $ ) {
    $(function() {
        var $toggleCurrencyBtn = $('a.toggle-currency');
        var $allCurrencies = $('span.currency');

        $toggleCurrencyBtn.on('click', function(){
            $allCurrencies.each(function(){
                $(this).html('€');
            });
        });
    });
})(jQuery);