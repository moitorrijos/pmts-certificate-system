; (function( $ ) {
$(function() {

var $downloadXlsBtn = $('.download-xls-button'),
	$downloadXlsTable = $('.download-xls-table'),
	$printBtn = $('.print-button');

$downloadXlsBtn.click(function(e){

	e.preventDefault();

	var downloadTime = new Date(),
		timeStamp = downloadTime.getDate().toString() + '-' + downloadTime.getMonth().toString() + '-' + downloadTime.getFullYear().toString() + '-' + downloadTime.getMilliseconds().toString();

	$downloadXlsTable.table2excel({
		name: "Certificates Table",
		filename: "panama-certs-" + timeStamp,
	});

});

$printBtn.on('click', function(){
	window.print();
});

});
})(jQuery);