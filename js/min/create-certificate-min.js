var create_certificate_obj;jQuery.noConflict(),function($){$(function(){function t(){location.reload()}function e(e){e.preventDefault();var a=$(this),r=a.closest("tr").find("td.course-name").data("course_id"),i=a.closest("tr").find("td.course-instructor").data("instructor_id"),n=a.closest("tr").find("td.course-start-date").data("start_date"),s=a.closest("tr").find("td.course-end-date").data("end_date"),u=$(".application-sent-error");$.ajax({type:"POST",async:!1,url:create_certificate_obj.ajaxurl,data:{action:"create_certificate_pmtscs",security:create_certificate_obj.security,appID:c,courseID:r,instructorID:i,startDate:n,endDate:s},success:function(e){e.success?(setTimeout(function(){window.open(create_certificate_obj.new_certificate_url)}),setTimeout(function(){$(window).one("focus",t)},100)):(o.fadeOut("fast"),u.show(),setTimeout(function(){u.addClass("translate-down")}))},error:function(){o.fadeOut("fast"),u.show(),setTimeout(function(){u.addClass("translate-down")})},timeout:6e3})}var a=$(".create-certificate-button"),c=$(".application-form").data("post_id"),o=$(".loader");a.on("click",e)})}(jQuery);