var moment, countryNationality

; (function( $ ) {
$(function() {

var $endDateField = $('#acf-field_56130098acfc9'),
	$issueDateField = $('#acf-field_5619b16e70c02'),
	$placeOfBirthField = $('#acf-field_5612fef2fdc33'),
	$nationalityField = $('#acf-field_5728ffb5d7616'),
	$acfForm = $('form.acf-form');

function capitalizeFirstLetter(string) {
	return string.split(' ').map(function(word){
		if ( word.toLowerCase() === 'of' || word.toLowerCase() === 'and' || word.toLowerCase === 'the' ) {
			return word.toLowerCase();
		} else {
			return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
		}
	}).join(' ');
}

$endDateField.parent('div').on('change', function(){

	var endDate = $endDateField.val();
	$issueDateField.val(endDate);
	$issueDateField.next('input').val( moment(endDate).format('D MMMM YYYY') );

});

$placeOfBirthField.parent('div').on('change', function(){
	var placeOfBirth = $placeOfBirthField.val();
	var capitalizePlaceOfBirth = capitalizeFirstLetter(placeOfBirth);
	countryNationality.map(function(countryArray){
		if (capitalizePlaceOfBirth === countryArray[0]) {
			$nationalityField.val( countryArray[1] );
		}
	});
});

if ($('body').hasClass('page-template-new_panama_certificate')) {
	setTimeout(function(){
		$acfForm.trigger('submit');
	});
}

});
})(jQuery);