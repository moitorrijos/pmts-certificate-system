var send_application_obj;jQuery.noConflict(),function($){$(function(){function t(){var t=n.data("post_id");$.ajax({type:"POST",url:send_application_obj.ajaxurl,data:{action:"send_application_pmtscs",security:send_application_obj.security,appPostID:t},success:function(t){t.success?(s.fadeOut("fast"),setTimeout(function(){i.slideDown("fast")},10)):(s.fadeOut("fast"),setTimeout(function(){o.slideDown("fast")},10))},error:function(){s.fadeOut("fast"),o.show(),o.addClass("translate-down")}})}var a=$(".duplicate-certificate-button"),n=$(".application-form"),i=$(".application-sent"),o=$(".application-sent-error"),s=$(".loader");a.on("click",t)})}(jQuery);