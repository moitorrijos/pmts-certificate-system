var create_certificate_obj;

jQuery.noConflict();
(function( $ ) {
$(function() {

var $createCertificateBtn = $('.create-certificate-button'),
	applicationFormID = $('.application-form').data('post_id'),

	$loader = $('.loader');

function createThisCertificate(event){
	event.preventDefault();
	var $this = $(this),
		courseID = $this.closest('tr').find('td.course-name').data('course_id'),
		instructorID = $this.closest('tr').find('td.course-instructor').data('instructor_id'),
		startDate = $this.closest('tr').find('td.course-start-date').data('start_date'),
		endDate = $this.closest('tr').find('td.course-end-date').data('end_date'),
		$applicationSentErrorDiv = $('.application-sent-error');
	
	$.ajax({
		type: 'POST',
		async: false,
		url: create_certificate_obj.ajaxurl,
		data: {
			action: 'create_certificate_pmtscs',
			security: create_certificate_obj.security,
			appID: applicationFormID,
			courseID: courseID,
			instructorID: instructorID,
			startDate: startDate,
			endDate: endDate,
		},
		success: function(response){
			if (response.success) {

		        window.open(create_certificate_obj.new_certificate_url);

			} else {
				$loader.fadeOut('fast');
				$applicationSentErrorDiv.show();
				setTimeout( function(){ $applicationSentErrorDiv.addClass('translate-down'); }, 100);
			}
		},
		error: function(){
				$loader.fadeOut('fast');
				$applicationSentErrorDiv.show();
				setTimeout( function(){ $applicationSentErrorDiv.addClass('translate-down'); }, 100);
		},
		timeout: 6000,
	});

}

$createCertificateBtn.on('click', createThisCertificate);

});
})(jQuery); 	