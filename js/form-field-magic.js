var moment, countryNationality, key

; (function( $ ) {
$(function() {

var $endDateField = $('#acf-field_56130098acfc9'),
	$issueDateField = $('#acf-field_5619b16e70c02'),
	$placeOfBirthField = $('#acf-field_5612fef2fdc33'),
	$nationalityField = $('#acf-field_5728ffb5d7616'),
	$select2chosen3 = $('#select2-chosen-3'),
	$courseInput = $('#acf-field_5612ff11fdc34-input'),
	$instructorInput = $('#acf-field_5613068549b90-input'),
	$loader 		= 	$('.loader'),
	// $newCertPage = $('body.page-template-new_panama_certificate'),
	$acfForm = $('form.acf-form'),
	$createNewCertificate = $('.new-certificate-button');

function capitalizeFirstLetter(string) {
	return string.split(' ').map(function(word){
		if ( word.toLowerCase() === 'of' || word.toLowerCase() === 'and' || word.toLowerCase === 'the' ) {
			return word.toLowerCase();
		} else {
			return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
		}
	}).join(' ');
}

function changeInstructor(){

	var $courseID = $(this).val();

	if ($courseID === '69' || $courseID === '96' || $courseID === '91') { // Básicos menos first aid

		$instructorInput.val('121');
		$select2chosen3.html('Hector Mojica');

	} else if($courseID === '47' || $courseID === '76') { // Tanqueros

		$instructorInput.val('122');
		$select2chosen3.html('Juan C. Caballero');

	} else if ($courseID === '68') { // Ship's Cook

		$instructorInput.val('110');
		$select2chosen3.html('Billy Oro');

	} else if ($courseID === '92' || $courseID === '75' || $courseID === '78') { // Basic First Aid, Medical First Aid, Medical Care

		$instructorInput.val('131');
		$select2chosen3.html('Moises Torrijos');

	} 

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

$courseInput.on('change', changeInstructor);

key('⌘+e, ctrl+e', function(){
	var newCertificateLink = $createNewCertificate.attr('href');
	$loader.show();
	window.location = newCertificateLink;
});

if ($('body').hasClass('page-template-new_panama_certificate')) {
	setTimeout(function(){
		$acfForm.trigger('submit');
		$loader.show();
		// console.log('new certificate page');
	});
}
	
});
})(jQuery);