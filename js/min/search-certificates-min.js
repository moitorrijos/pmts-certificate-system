var certificates_object;!function($){$(function(){var e=$("tbody"),a=$("tbody tr"),s=$(".loader"),t=$("#search-by-id-no"),i=$("#search-student-form"),d=$("input#search_by_id_passport"),o=$("span.error-message"),r=$("span.not-found-message"),n=$("a.back-link"),c=$("span.search-spinner");t.on("submit",function(t){return t.preventDefault(),c.show(),s.fadeIn("fast"),d.removeClass("animated shake"),o.hide(),r.hide(),""===d.val()?(d.css("border","1px solid #C10000").addClass("animated shake"),c.hide(),void s.hide()):void $.ajax({url:certificates_object.ajaxurl,type:"POST",dataType:"json",data:{action:"search_certificates",security:certificates_object.security,passport_no:d.val().toString()},success:function(t){console.log(t),""===t.data?(c.hide(),s.hide(),r.fadeIn("fast"),d.css("border","1px solid #C10000").addClass("animated shake")):(i.fadeOut("slow"),c.hide(),s.hide(),a.remove(),e.html(t.data),n.show(),d.css("border","1px solid #3e94cc"),o.hide())},error:function(){s.fadeOut("fast"),c.hide(),o.fadeIn("fast")},timeout:12e3})})})}(jQuery);