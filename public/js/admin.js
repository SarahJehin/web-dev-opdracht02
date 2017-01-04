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
    
    
    //add product
    $spec_counter = 1;
    $(".add_spec").click(function() {
        $spec_counter++;
        $spec_block = $('.spec_block.first').clone();
        $spec_block.removeClass("first");
        $spec_block.find("h4").text($spec_counter + ".");
        $spec_block.find("input[name='specs[1][name_nl]']").attr('name', "specs[" + $spec_counter + "][name_nl]");
        //after the h4 insert a remove button
        //$remove_button = $( '<div class=".btn_remove">Remove</div>');;
        //$remove_button.insertAfter($spec_block.find("h4"));
        $previous_spec = $('.spec_block').last();
        $spec_block.insertAfter($previous_spec);
    });
    
    
    
    $( ".specifications" ).on( "click", ".btn_remove", function() {
        $clicked_parent = $( this ).parent();
        if(!$clicked_parent.hasClass('first')) {
            $clicked_parent.remove();
            $spec_counter--;
        }
    });
    
    
    
    var file_upload_input = document.getElementById("images_to_upload");
    if(file_upload_input) {
        file_upload_input.onchange = function() {makeFileList()};
    }
    
    
    function makeFileList() {
		var input = document.getElementById("images_to_upload");
		var ul = document.getElementById("file_list");
		while (ul.hasChildNodes()) {
			ul.removeChild(ul.firstChild);
		}
		for (var i = 0; i < input.files.length; i++) {
			var li = document.createElement("li");
			li.innerHTML = input.files[i].name;
			ul.appendChild(li);
		}
		if(!ul.hasChildNodes()) {
			var li = document.createElement("li");
			li.innerHTML = 'No Files Selected';
			ul.appendChild(li);
		}
        $("#images_amount").val(input.files.length);
	}
    
    
    //edit product
    //remove images
    $(".existing_images .remove_img").click(function(){
        //
        $img_id = $(this).attr("img_id");
        console.log($img_id);
        //post to laravel delete_img
        $.post( '../delete_img', { '_token': $('meta[name=csrf-token]').attr('content'), image_id: $img_id }, function( data ) {
          console.log( data );
            //remove element
            $figure = $(this).parent();
            $figure.remove();

            //reduce the images amount
            $amount = $("#images_amount").val();
            $amount--;
            $("#images_amount").val($amount);
        }, "json");
        
        
        
    });
    
    
    
    
    
    
    
})(window, window.document, window.jQuery);