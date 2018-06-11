jQuery.noConflict();
(function( $ ) {
$(function() {

var fullClass = $('.full-class');

if (fullClass) {
	fullClass.closest('table.system').after('<p class="warning-full"><i class="fa fa-ban"></i> This classroom is full, please edit and select different course dates.</p>');
}

});
})(jQuery); 	