(function($){

var $certificateAuthorDiv = $('.certificate-author');

function animateAuthorDiv(){
	$(this).addClass('info-display');
	$certificateAuthorDiv.off('mouseenter');
	setTimeout(function(){ 
		$certificateAuthorDiv.find('span').addClass('appear'); 
	}, 300);
	setTimeout(function(){
		$certificateAuthorDiv.removeClass('info-display');
		$certificateAuthorDiv.find('span').removeClass('appear');
	}, 3000);
	setTimeout(function(){
		$certificateAuthorDiv.on('mouseenter', animateAuthorDiv);
	}, 4000);
}

$certificateAuthorDiv.on('mouseenter', animateAuthorDiv);

})(jQuery);