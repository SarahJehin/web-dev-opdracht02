(function ( window, document, $, undefined ) {
    
    //faq_overview
    $(".delete_alert").hide();
    
    $(".delete_question").click(function(){
        $faq_id = $(this).attr("faq_id");
        $question = $(this).parent().parent().find(">:first-child").text();
        $(".question_to_delete").text('"' + $question + '"');
        $(".delete_alert .btn").attr("href", APP_URL + "/admin/delete_faq/" + $faq_id);
        $(".delete_alert").show();
    });
    $(".delete_alert .close").click(function() {
        $(".delete_alert").hide();
    });
    
    //product_overview
    $(".delete_product").click(function(){
        $product_id = $(this).attr("product_id");
        $product = $(this).parent().parent().find(">:nth-child(2)").text();
        $(".product_to_delete").text('"' + $product + '"');
        $(".delete_alert .btn").attr("href", APP_URL + "/admin/delete_product/" + $product_id);
        $(".delete_alert").show();
    });
    
    
})(window, window.document, window.jQuery);