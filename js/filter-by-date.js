var filter_object;

(function( $ ) {
$(function() {

var $startDateFilter = $('.start-date-filter'),
	$endDateFilter = $('.end-date-filter'),
	$loader = $('.loader'),
	$filterButton = $('button#filter-by-date'),
	$pagination = $('nav.custom-pagination'),
	$backLink = $('a.back-link'),
	$tbodytr = $('tbody tr'),
	$tbody 	= $('tbody');

$startDateFilter.datepicker({
	dateFormat: "dd/mm/yy"
});
$endDateFilter.datepicker({
	dateFormat: "dd/mm/yy"
});

function filterDates(){
	var startDate = $startDateFilter.val(),
		endDate = $endDateFilter.val(),
		startDateRegex = /^(3[01]|[12][0-9]|0?[1-9])\/(1[012]|0?[1-9])\/((?:19|20)\d{2})$/g,
		endDateRegex = /^(3[01]|[12][0-9]|0?[1-9])\/(1[012]|0?[1-9])\/((?:19|20)\d{2})$/g,
		validStartDate = startDateRegex.test(startDate),
		validEndDate = endDateRegex.test(endDate);
	
	$startDateFilter.removeAttr('style');
	$endDateFilter.removeAttr('style');

	if ( !validStartDate ) {
		$startDateFilter
			.css('border-bottom', '1px solid #C10000')
			.addClass('animated shake');
		setTimeout(function(){
			$startDateFilter.removeClass('animated shake');
		}, 1000);
	} else if ( !validEndDate ) {
		$endDateFilter
			.css('border-bottom', '1px solid #C10000')
			.addClass('animated shake');
		setTimeout(function(){
			$endDateFilter.removeClass('animated shake');
		}, 1000);
	} else {
		$loader.fadeIn('fast');
		$.ajax({
			url		 : filter_object.ajaxurl,
			type	 : 'POST',
			dataType : 'json' ,
			data 	 : {
				action 			 : 'filter_by_date',
				security 		 : filter_object.security,
				valid_start_date : startDate,
				valid_end_date 	 : endDate,
			},
			success: function(response) {
				if (response.data === '') {
					$loader.hide();
					$startDateFilter
						.css('border-bottom', '1px solid #C10000')
						.addClass('animated shake');
					$endDateFilter
						.css('border-bottom', '1px solid #C10000')
						.addClass('animated shake');
				} else {
					$loader.hide();
					$backLink.show();
					$pagination.remove();
					$tbodytr.remove();
					$tbody.html( response.data );
				}
			},

			error: function(){

			}
		});
	}

}

$filterButton.on('click', filterDates);

});
})(jQuery);  