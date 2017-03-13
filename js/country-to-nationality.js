var countryNationality;

; (function( $ ) {
$(function() {

var $placeOfBirthField = $('#acf-field_58839d88e115f'),
	$nationalityField = $('#acf-field_58839da3e1160');

function capitalizeFirstLetter(stringy) {
	// var stringyArray = ;
	return stringy.split(' ').map(function(word){
		if ( word.toLowerCase() === 'of' || word.toLowerCase() === 'and' || word.toLowerCase === 'the' ) {
			return word.toLowerCase();
		} else {
			return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
		}
	}).join(' ');
}


$placeOfBirthField.parent('div').on('change', function(){
	var placeOfBirth = $placeOfBirthField.val();
	var capitalizePlaceOfBirth = capitalizeFirstLetter(placeOfBirth);
	countryNationality.map(function(countryArray){
		if (capitalizePlaceOfBirth === countryArray[0]) {
			$nationalityField.val( countryArray[1] );
		}
	});
});

});
})(jQuery);  