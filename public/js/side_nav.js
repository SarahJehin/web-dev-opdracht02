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
    
    
    //faq overlay -> not necessary anymore, will be in different blade
    /*
    $('nav a').click(function () {
        $(".faq_overlay").hide();
        $(".general .faq_link").removeClass( "active" );
    });
    
    var faq_open = false;
    
    $('.faq_link').click(function () {

        if(faq_open) {
            $(".faq_overlay").hide();
            $(".general .faq_link").removeClass( "active" );
        }
        else {
            $(".faq_overlay").show();
            $(".general .faq_link").addClass( "active" );
        }
        faq_open = !faq_open;

    });*/
    
})(window, window.document, window.jQuery);