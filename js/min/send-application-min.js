var send_application_obj;jQuery.noConflict(),function($){$(function(){function t(){var t=i.data("post_id");$.ajax({type:"POST",url:send_application_obj.ajaxurl,data:{action:"send_application_pmtscs",security:send_application_obj.security,appPostID:t},success:function(t){t.success?(e.fadeOut("fast"),setTimeout(function(){n.velocity("slideDown",{easing:"easeInOut"},{duration:100})},10)):(e.fadeOut("fast"),setTimeout(function(){o.velocity("slideDown",{easing:"easeInOut"},{duration:100})},10))},error:function(){e.fadeOut("fast"),o.velocity("slideDown",{duration:100})}})}var a=$(".duplicate-certificate-button"),i=$(".application-form"),n=$(".application-sent"),o=$(".application-sent-error"),e=$(".loader");a.on("click",t)})}(jQuery);