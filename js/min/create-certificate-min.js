var create_certificate_obj;jQuery.noConflict(),function($){$(function(){function t(t){t.preventDefault();var e=$(this),a=e.closest("tr").find("td.course-name").data("course_id"),r=e.closest("tr").find("td.course-instructor").data("instructor_id"),i=e.closest("tr").find("td.course-start-date").data("start_date"),n=e.closest("tr").find("td.course-end-date").data("end_date"),s=$(".application-sent-error");$.ajax({type:"POST",async:!1,url:create_certificate_obj.ajaxurl,data:{action:"create_certificate_pmtscs",security:create_certificate_obj.security,appID:c,courseID:a,instructorID:r,startDate:i,endDate:n},success:function(t){t.success?(o.show(),setTimeout(function(){window.open(create_certificate_obj.new_certificate_url)},100)):(o.fadeOut("fast"),s.show(),setTimeout(function(){s.addClass("translate-down")},100))},error:function(){o.fadeOut("fast"),s.show(),setTimeout(function(){s.addClass("translate-down")},100)},timeout:6e3})}function e(){location.reload()}var a=$(".create-certificate-button"),c=$(".application-form").data("post_id"),o=$(".loader");a.on("click",t),$(window).on("focus",e)})}(jQuery);