(function($){

var $certificateAuthorDiv = $('.certificate-author-mask');

function animateAuthorDiv(){

	var $this = $(this),
		pSmallWidth = $this.siblings('.certificate-author').find('p.small').width() + 18,
		mask = $this.closest('.certificate').find('.certificate-author-mask'),
		originalMaskWidth = mask.width();

	mask.velocity(
		{width: pSmallWidth}, 
		{easing: "easeInOut"},
		{duration: 200}
	);

	$certificateAuthorDiv.off('mouseenter');

	setTimeout(function(){
		mask.velocity(
			{width: originalMaskWidth}, 
			{easing: "easeInOut"},
			{duration: 250}
		);
	}, 3000);

	setTimeout(function(){
		$certificateAuthorDiv.on('mouseenter', animateAuthorDiv);
	}, 3300);

}

$certificateAuthorDiv.on('mouseenter', animateAuthorDiv);

})(jQuery);