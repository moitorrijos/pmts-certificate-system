!function($){$(function(){var f=$("#acf-field_56130098acfc9"),a=$("#acf-field_5619b16e70c02"),n=$("#acf-field_5612fef2fdc33"),c=$("#acf-field_5728ffb5d7616");f.parent("div").on("change",function(){var n=f.val();a.next("input").val(moment(n).format("MMMM D, YYYY"))}),n.parent("div").on("change",function(){var f=n.val();c.val(f)})})}(jQuery);