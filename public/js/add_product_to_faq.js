(function ( window, document, $, undefined ) {
    
    $(".no_products").hide();
    $counter = $('.product_select').length;
    
    $(".add_product").click(function() {
        $counter++;
        $amount_of_products = $('.product_select.first option').length-1;
        //check whether there are more selects than products
        if($counter <= $amount_of_products) {
            $product_select = $('.product_select.first').clone();

            $product_select.removeClass("first");

            $(".products").append($product_select);
        }
        else {
            $(".no_products").show();
        }
    });
    
    $( ".products" ).on( "click", ".btn_remove", function() {
        $clicked_parent = $( this ).parent().parent();
        if(!$clicked_parent.hasClass('first')) {
            $clicked_parent.remove();
        }
    });
    
    
})(window, window.document, window.jQuery);