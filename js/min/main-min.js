!function($,e,t,n){function a(e,t){this.element=e,this.settings=$.extend({},l,t),this._defaults=l,this._name=i,this.init()}function o(e){return(e.filename?e.filename:"table2excel")+".xls"}var i="table2excel",l={exclude:".noExl",name:"Table2Excel"};a.prototype={init:function(){var e=this;e.template={head:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>',sheet:{head:"<x:ExcelWorksheet><x:Name>",tail:"</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"},mid:"</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",table:{head:"<table>",tail:"</table>"},foot:"</body></html>"},e.tableRows=[],$(e.element).each(function(t,n){var a="";$(n).find("tr").not(e.settings.exclude).each(function(e,t){a+="<tr>"+$(t).html()+"</tr>"}),e.tableRows.push(a)}),e.tableToExcel(e.tableRows,e.settings.name)},tableToExcel:function(n,a){var i=this,l="",r,c,s;if(i.uri="data:application/vnd.ms-excel;base64,",i.base64=function(t){return e.btoa(unescape(encodeURIComponent(t)))},i.format=function(e,t){return e.replace(/{(\w+)}/g,function(e,n){return t[n]})},i.ctx={worksheet:a||"Worksheet",table:n},l=i.template.head,$.isArray(n))for(r in n)l+=i.template.sheet.head+"Table"+r+i.template.sheet.tail;if(l+=i.template.mid,$.isArray(n))for(r in n)l+=i.template.table.head+"{table"+r+"}"+i.template.table.tail;l+=i.template.foot;for(r in n)i.ctx["table"+r]=n[r];if(delete i.ctx.table,"undefined"!=typeof msie&&msie>0||navigator.userAgent.match(/Trident.*rv\:11\./))if("undefined"!=typeof Blob){l=[l];var f=new Blob(l,{type:"text/html"});e.navigator.msSaveBlob(f,o(i.settings))}else txtArea1.document.open("text/html","replace"),txtArea1.document.write(i.format(l,i.ctx)),txtArea1.document.close(),txtArea1.focus(),sa=txtArea1.document.execCommand("SaveAs",!0,o(i.settings));else c=i.uri+i.base64(i.format(l,i.ctx)),s=t.createElement("a"),s.download=o(i.settings),s.href=c,t.body.appendChild(s),s.click(),t.body.removeChild(s);return!0}},$.fn[i]=function(e){var t=this;return t.each(function(){$.data(t,"plugin_"+i)||$.data(t,"plugin_"+i,new a(this,e))}),t}}(jQuery,window,document),function($){$(function(){var e=$(".download-xls-button"),t=$(".download-xls-table"),n=$(".print-button");e.click(function(e){e.preventDefault();var n=new Date,a=n.getDate().toString()+"-"+n.getMonth().toString()+"-"+n.getFullYear().toString()+"-"+n.getMilliseconds().toString();t.table2excel({name:"Certificates Table",filename:"panama-certs-"+a})}),n.on("click",function(){window.print()})})}(jQuery),function($){$(function(){function e(){n.fadeOut("fast"),t.fadeIn()}var t=$(".edit-certificate-form"),n=$(".certificate"),a=$(".edit-button");a.on("click",e)})}(jQuery);