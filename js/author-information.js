(function($){

var $certificateAuthorDiv = $('.certificate-author');

$certificateAuthorDiv.on('mouseenter', function(){
	$(this).addClass('info-display');
	setTimeout(function(){ 
		$certificateAuthorDiv.find('span').addClass('appear'); 
	}, 300);
});

$certificateAuthorDiv.on('mouseleave', function(){
	setTimeout(function(){
		$certificateAuthorDiv.removeClass('info-display');
		$certificateAuthorDiv.find('span').removeClass('appear');
	}, 600);
});

})(jQuery);