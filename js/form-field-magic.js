; (function( $ ) {
$(function() {

var $endDateField = $('#acf-field_56130098acfc9'),
	$issueDateField = $('#acf-field_5619b16e70c02'),
	$placeOfBirthField = $('#acf-field_5612fef2fdc33'),
	$nationalityField = $('#acf-field_5728ffb5d7616');

$endDateField.parent('div').on('change', function(){

	var endDate = $endDateField.val();
	$issueDateField.val(endDate);
	$issueDateField.next('input').val( moment(endDate).format('MMMM D, YYYY') );

});

$placeOfBirthField.parent('div').on('change', function(){

	var nationality = $placeOfBirthField.val();
	$nationalityField.val( nationality );
	
});

});
})(jQuery); 	