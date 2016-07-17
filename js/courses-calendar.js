; (function( $ ) {
$(function() {

var $coursesCalendar = $('#courses-calendar');

$coursesCalendar.fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,basicWeek,basicDay'
	},
	defaultDate: '2016-05-12',
	height: 950,
	start: '8:00', // a start time (10am in this example)
    end: '16:00', // an end time (6pm in this example)

    dow: [ 1, 2, 3, 4 ],
    editable: true,
	eventLimit: true, // allow "more" link when too many events
	events: [
		{
			title: 'Medical Care',
			start: '2016-05-01'
		},
		{
			title: 'Long Event',
			start: '2016-05-07',
			end: '2016-05-10'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2016-05-09T16:00:00'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2016-05-16T16:00:00'
		},
		{
			title: 'Conference',
			start: '2016-05-11',
			end: '2016-05-13'
		},
		{
			title: 'Meeting',
			start: '2016-05-12T10:30:00',
			end: '2016-05-12T12:30:00'
		},
		{
			title: 'Lunch',
			start: '2016-05-12T12:00:00'
		},
		{
			title: 'Meeting',
			start: '2016-05-12T14:30:00'
		},
		{
			title: 'Happy Hour',
			start: '2016-05-12T17:30:00'
		},
		{
			title: 'Dinner',
			start: '2016-05-12T20:00:00'
		},
		{
			title: 'Birthday Party',
			start: '2016-05-13T07:00:00'
		},
		{
			title: 'Click for Google',
			url: 'http://google.com/',
			start: '2016-05-28'
		}
	]
	});

});
})(jQuery);