var passport_obj_app,moment;jQuery.noConflict(),function($){$(function(){function a(){$.ajax({url:passport_obj_app.ajaxurl,type:"POST",dataType:"json",data:{action:"search_passport_app",security:passport_obj_app.security,passport_no:e.val().toString()},success:function(a){if(console.log(a.data),0!==a.data.length&&a.success){var e,_,s,l,r;a.data.student_info.forEach(function(a){"participants_name_app"===a.meta_key||"students_name"===a.meta_key?e=a.meta_value:"passport_id_app"===a.meta_key||"passport_id"===a.meta_key?_=a.meta_value:"place_of_birth_app"===a.meta_key||"place_of_birth"===a.meta_key?s=a.meta_value:"nationality_app"===a.meta_key||"student_nationality"===a.meta_key?l=a.meta_value:"date_of_birth_app"!==a.meta_key&&"date_of_birth"!==a.meta_key||(r=a.meta_value)}),a.data.app_permalink&&(t.html(""),t.append('<p>The Application for <span id="participant-name">'+e+'</span> already exists. <a href="'+a.data.app_permalink+'">Click here to go to the last application</a>, or continue creating a new application below.</p>'),setTimeout(function(){t.velocity("slideDown",{easing:"easeInOut"},{duration:100})},10)),p.val(e),n.val(s),i.val(l),o.val(r),o.next("input").val(moment(r).format("D MMMM YYYY"))}},error:function(){}})}var t=$(".application-exists"),e=$("input#acf-field_58839d6ee115e"),p=$("input#acf-field_58839d5ae115d"),n=$("input#acf-field_58839d88e115f"),i=$("input#acf-field_58839da3e1160"),o=$("input#acf-field_58839db4e1161");e.on("change",a)})}(jQuery);