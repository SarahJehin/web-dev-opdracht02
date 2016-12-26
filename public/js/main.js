(function ( window, document, $, undefined ) {

    //faq
    $('.clear i, .clear span').click(function () {
        $('#searchword').val("");
    });
    
    //product details - enlarge image
    $('.small_img').click(function(){
        $new_src = $(this).find( "img" ).attr('src');
        $('.big_img img').attr('src', $new_src);
    });
    
})(window, window.document, window.jQuery);