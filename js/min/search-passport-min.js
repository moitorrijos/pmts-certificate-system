!function($){$(function(){function a(a){return a.preventDefault(),u.show(),""===n.val()?(n.css("border","1px solid #C10000").addClass("animated shake"),void u.hide()):(n.removeClass("animated shake"),void $.ajax({url:pmtscs_ajax_object.ajaxurl,type:"POST",dataType:"json",data:{action:"search_by_id_passport",security:pmtscs_ajax_object.security,passport_no:n.val().toString()},success:function(a){if(a.success){u.hide(),t.val("Done"),s.fadeOut("slow");var e=a.data.student_info[6].meta_value;i.val(a.data.student_info[0].meta_value),o.val(a.data.passport_no),r.val(a.data.student_info[4].meta_value),d.next("input").val(moment(e).format("MMMM D, YYYY"))}else this.error(),c.slideDown("fast")},error:function(a){n.addClass("animated shake"),u.hide()}}))}var e=$("#search-by-id-no"),t=$("#search-by-id-submit"),s=$("#search-student-form"),n=$("input#search_by_id_passport"),i=$("input#acf-field_5618388c2ff51"),o=$("input#acf-field_5612fe8fe2a39"),r=$("input#acf-field_5612fef2fdc33"),d=$("input#acf-field_5619ac69b2aab"),c=$(".error-message"),u=$("span.search-spinner");e.on("submit",a)})}(jQuery);