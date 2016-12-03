
var hamburger_open = false;

$('label[for="hamburger"]').click(function () {

    hamburger_open = !hamburger_open;
    
    if(hamburger_open) {
        setTimeout((function() {
            $(".text").show();
        }), 200);
    }
    else {
        setTimeout((function() {
            $(".text").hide();
        }), 100);
    }

})