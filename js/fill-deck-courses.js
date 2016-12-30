; (function( $ ) {
$(function() {

var fillDeck = $('#fill_deck_courses');

fillDeck.on('click', function(event){
	event.preventDefault();
	var url = 	window.location.hostname + 
				window.location.pathname + 
				'panama-quotations/new-panama-quotation/?action=fill_deck_courses';
	window.location.href = url; 

});

});
})(jQuery);