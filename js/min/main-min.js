!function($,e,t,n){function o(e,t){this.element=e,this.settings=$.extend({},l,t),this._defaults=l,this._name=a,this.init()}function i(e){return(e.filename?e.filename:"table2excel")+".xls"}var a="table2excel",l={exclude:".noExl",name:"Table2Excel"};o.prototype={init:function(){var e=this;e.template={head:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>',sheet:{head:"<x:ExcelWorksheet><x:Name>",tail:"</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"},mid:"</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",table:{head:"<table>",tail:"</table>"},foot:"</body></html>"},e.tableRows=[],$(e.element).each(function(t,n){var o="";$(n).find("tr").not(e.settings.exclude).each(function(e,t){o+="<tr>"+$(t).html()+"</tr>"}),e.tableRows.push(o)}),e.tableToExcel(e.tableRows,e.settings.name)},tableToExcel:function(n,o){var a=this,l="",c,s,r;if(a.uri="data:application/vnd.ms-excel;base64,",a.base64=function(t){return e.btoa(unescape(encodeURIComponent(t)))},a.format=function(e,t){return e.replace(/{(\w+)}/g,function(e,n){return t[n]})},a.ctx={worksheet:o||"Worksheet",table:n},l=a.template.head,$.isArray(n))for(c in n)l+=a.template.sheet.head+"Table"+c+a.template.sheet.tail;if(l+=a.template.mid,$.isArray(n))for(c in n)l+=a.template.table.head+"{table"+c+"}"+a.template.table.tail;l+=a.template.foot;for(c in n)a.ctx["table"+c]=n[c];if(delete a.ctx.table,"undefined"!=typeof msie&&msie>0||navigator.userAgent.match(/Trident.*rv\:11\./))if("undefined"!=typeof Blob){l=[l];var f=new Blob(l,{type:"text/html"});e.navigator.msSaveBlob(f,i(a.settings))}else txtArea1.document.open("text/html","replace"),txtArea1.document.write(a.format(l,a.ctx)),txtArea1.document.close(),txtArea1.focus(),sa=txtArea1.document.execCommand("SaveAs",!0,i(a.settings));else s=a.uri+a.base64(a.format(l,a.ctx)),r=t.createElement("a"),r.download=i(a.settings),r.href=s,t.body.appendChild(r),r.click(),t.body.removeChild(r);return!0}},$.fn[a]=function(e){var t=this;return t.each(function(){$.data(t,"plugin_"+a)||$.data(t,"plugin_"+a,new o(this,e))}),t}}(jQuery,window,document),function($){$(function(){var e=$(".download-xls-button"),t=$(".download-xls-table");e.click(function(e){e.preventDefault();var n=new Date,o=n.getDate().toString()+"-"+n.getMonth().toString()+"-"+n.getFullYear().toString()+"-"+n.getMilliseconds().toString();t.table2excel({name:"Certificates Table",filename:"panama-certs-"+o})})})}(jQuery),function($){$(function(){function e(){c.hide(),u.hide(),s.hide(),l.fadeIn("fast"),h.css("display","inline-block")}function t(){h.hide(),c.fadeIn("fast"),l.hide(),u.css("display","inline-block"),s.css("display","inline-block")}function n(){f.toggleClass("show-menu"),r.toggleClass("hide-button")}function o(){b.fadeOut("fast")}function i(e){e.preventDefault(),b.fadeIn("fast")}function a(){f.removeClass("show-menu"),r.removeClass("hide-button"),d.fadeIn("fast"),setTimeout(function(){d.fadeOut("fast")},12e3)}var l=$(".edit-certificate-form"),c=$(".certificate"),s=$(".edit-button"),r=$("a.toggle-menu"),f=$("header"),d=$(".loader"),u=$(".print-button"),m=$(".nav").find("li").find("a"),h=$(".view-button"),x=$(".search-id-no-button"),b=$(".search-student-form"),p=$(".close-button"),g=window.location.href,k="acf-form",w=g.lastIndexOf(k),v=g.slice(w,g.length),y={valueNames:["list-col-1","list-col-2","list-col-3","list-col-4"]};s.on("click",e),h.on("click",t),u.on("click",function(){window.print()}),v===k&&(c.hide(),l.show(),u.hide(),h.css("display","inline-block"),s.hide()),r.on("click",n),$(document).on("click",function(e){$(e.target).closest("header").length||(f.removeClass("show-menu"),r.removeClass("hide-button"))}),p.on("click",o),x.on("click",i),m.on("click",a),$("a").not(".not-link, .acf-button, .select2-search-choice-close, a.acf-icon").on("click",a);var C=new List("search-list",y)})}(jQuery);