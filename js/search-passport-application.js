var passport_obj_app, moment;

jQuery.noConflict();
(function( $ ) {
$(function() {

var $appExists = $('.application-exists'),
	$passportAppInput = $('input#acf-field_58839d6ee115e'),
	$nameAppInput = $('input#acf-field_58839d5ae115d'),
	$pobAppInput = $('input#acf-field_58839d88e115f'),
	$nationalityAppInput = $('input#acf-field_58839da3e1160'),
	$dobAppInput = $('input#acf-field_58839db4e1161');

function ajaxSearchId(){

	$.ajax({
		url : passport_obj_app.ajaxurl,
		type : 'POST',
		dataType : 'json',
		data : {
			action : 'search_passport_app',
			security : passport_obj_app.security,
			passport_no : $passportAppInput.val().toString()
		},

		success : function( response ) {

			console.log(response.data);

			if ( response.data.length === 0 ) {

				return; 

			} else if ( response.success ) {

				var studentsName, passportId, placeOfBirth, nationality, dateOfBirth;

				response.data.student_info.forEach(function(element){

					if ( element.meta_key === 'participants_name_app' || element.meta_key === 'students_name' ) {

						studentsName = element.meta_value;

					} else if ( element.meta_key === 'passport_id_app' || element.meta_key === 'passport_id' ) {

						passportId = element.meta_value;

					} else if ( element.meta_key  === 'place_of_birth_app' || element.meta_key === 'place_of_birth' ) {

						placeOfBirth = element.meta_value;

					} else if ( element.meta_key === 'nationality_app' || element.meta_key === 'student_nationality' ) {

						nationality = element.meta_value;

					} else if ( element.meta_key === 'date_of_birth_app' || element.meta_key === 'date_of_birth' ) {

						dateOfBirth = element.meta_value;

					}
				});

				if ( response.data.app_permalink ) {

					$appExists.html('');
					$appExists.append('<p>The Application for <span id="participant-name">'+studentsName+'</span> already exists. <a href="'+response.data.app_permalink+'">Click here to go to the last application</a>, or continue creating a new application below.</p>');
					setTimeout( function(){ $appExists.velocity(
						'slideDown',
						{ easing: 'easeInOut' },
						{ duration: 100 }
					); }, 10 );

				}

				$nameAppInput.val( studentsName );

				$pobAppInput.val( placeOfBirth );

				$nationalityAppInput.val( nationality );

				$dobAppInput.val( dateOfBirth );

				$dobAppInput.next('input').val( moment( dateOfBirth ).format('D MMMM YYYY') );


			} else {

				return;

			}

		},

		error : function() {
			return;
		}
	});
}

$passportAppInput.on('change', ajaxSearchId );

});
})(jQuery); 	