(function ( window, document, $, undefined ) {
    var hamburger_open = false;

    $('label[for="hamburger"]').click(function () {

        hamburger_open = !hamburger_open;

        if(hamburger_open) {
            setTimeout((function() {
                $(".text").show();
                $(".logo a").addClass( "show_full" );
            }), 200);
        }
        else {
            setTimeout((function() {
                $(".text").hide();
                $(".logo a").removeClass( "show_full" );
            }), 100);
        }

    });
    
    
})(window, window.document, window.jQuery);