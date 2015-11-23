!function(){function e(t,r,n){var s=e.resolve(t);if(null==s){n=n||t,r=r||"root";var i=new Error('Failed to require "'+n+'" from "'+r+'"');throw i.path=n,i.parent=r,i.require=!0,i}var a=e.modules[s];if(!a._resolving&&!a.exports){var o={};o.exports={},o.client=o.component=!0,a._resolving=!0,a.call(this,o.exports,e.relative(s),o),delete a._resolving,a.exports=o.exports}return a.exports}e.modules={},e.aliases={},e.resolve=function(t){"/"===t.charAt(0)&&(t=t.slice(1));for(var r=[t,t+".js",t+".json",t+"/index.js",t+"/index.json"],n=0;n<r.length;n++){var t=r[n];if(e.modules.hasOwnProperty(t))return t;if(e.aliases.hasOwnProperty(t))return e.aliases[t]}},e.normalize=function(e,t){var r=[];if("."!=t.charAt(0))return t;e=e.split("/"),t=t.split("/");for(var n=0;n<t.length;++n)".."==t[n]?e.pop():"."!=t[n]&&""!=t[n]&&r.push(t[n]);return e.concat(r).join("/")},e.register=function(t,r){e.modules[t]=r},e.alias=function(t,r){if(!e.modules.hasOwnProperty(t))throw new Error('Failed to alias "'+t+'", it does not exist');e.aliases[r]=t},e.relative=function(t){function r(e,t){for(var r=e.length;r--;)if(e[r]===t)return r;return-1}function n(r){var s=n.resolve(r);return e(s,t,r)}var s=e.normalize(t,"..");return n.resolve=function(n){var i=n.charAt(0);if("/"==i)return n.slice(1);if("."==i)return e.normalize(s,n);var a=t.split("/"),o=r(a,"deps")+1;return o||(o=0),n=a.slice(0,o+1).join("/")+"/deps/"+n},n.exists=function(t){return e.modules.hasOwnProperty(n.resolve(t))},n},e.register("component-classes/index.js",function(e,t,r){function n(e){if(!e)throw new Error("A DOM element reference is required");this.el=e,this.list=e.classList}var s=t("indexof"),i=/\s+/,a=Object.prototype.toString;r.exports=function(e){return new n(e)},n.prototype.add=function(e){if(this.list)return this.list.add(e),this;var t=this.array(),r=s(t,e);return~r||t.push(e),this.el.className=t.join(" "),this},n.prototype.remove=function(e){if("[object RegExp]"==a.call(e))return this.removeMatching(e);if(this.list)return this.list.remove(e),this;var t=this.array(),r=s(t,e);return~r&&t.splice(r,1),this.el.className=t.join(" "),this},n.prototype.removeMatching=function(e){for(var t=this.array(),r=0;r<t.length;r++)e.test(t[r])&&this.remove(t[r]);return this},n.prototype.toggle=function(e,t){return this.list?("undefined"!=typeof t?t!==this.list.toggle(e,t)&&this.list.toggle(e):this.list.toggle(e),this):("undefined"!=typeof t?t?this.add(e):this.remove(e):this.has(e)?this.remove(e):this.add(e),this)},n.prototype.array=function(){var e=this.el.className.replace(/^\s+|\s+$/g,""),t=e.split(i);return""===t[0]&&t.shift(),t},n.prototype.has=n.prototype.contains=function(e){return this.list?this.list.contains(e):!!~s(this.array(),e)}}),e.register("segmentio-extend/index.js",function(e,t,r){r.exports=function n(e){for(var t=Array.prototype.slice.call(arguments,1),r=0,n;n=t[r];r++)if(n)for(var s in n)e[s]=n[s];return e}}),e.register("component-indexof/index.js",function(e,t,r){r.exports=function(e,t){if(e.indexOf)return e.indexOf(t);for(var r=0;r<e.length;++r)if(e[r]===t)return r;return-1}}),e.register("component-event/index.js",function(e,t,r){var n=window.addEventListener?"addEventListener":"attachEvent",s=window.removeEventListener?"removeEventListener":"detachEvent",i="addEventListener"!==n?"on":"";e.bind=function(e,t,r,s){return e[n](i+t,r,s||!1),r},e.unbind=function(e,t,r,n){return e[s](i+t,r,n||!1),r}}),e.register("timoxley-to-array/index.js",function(e,t,r){function n(e){return"[object Array]"===Object.prototype.toString.call(e)}r.exports=function s(e){if("undefined"==typeof e)return[];if(null===e)return[null];if(e===window)return[window];if("string"==typeof e)return[e];if(n(e))return e;if("number"!=typeof e.length)return[e];if("function"==typeof e&&e instanceof Function)return[e];for(var t=[],r=0;r<e.length;r++)(Object.prototype.hasOwnProperty.call(e,r)||r in e)&&t.push(e[r]);return t.length?t:[]}}),e.register("javve-events/index.js",function(e,t,r){var n=t("event"),s=t("to-array");e.bind=function(e,t,r,i){e=s(e);for(var a=0;a<e.length;a++)n.bind(e[a],t,r,i)},e.unbind=function(e,t,r,i){e=s(e);for(var a=0;a<e.length;a++)n.unbind(e[a],t,r,i)}}),e.register("javve-get-by-class/index.js",function(e,t,r){r.exports=function(){return document.getElementsByClassName?function(e,t,r){return r?e.getElementsByClassName(t)[0]:e.getElementsByClassName(t)}:document.querySelector?function(e,t,r){return t="."+t,r?e.querySelector(t):e.querySelectorAll(t)}:function(e,t,r){var n=[],s="*";null==e&&(e=document);for(var i=e.getElementsByTagName(s),a=i.length,o=new RegExp("(^|\\s)"+t+"(\\s|$)"),l=0,u=0;a>l;l++)if(o.test(i[l].className)){if(r)return i[l];n[u]=i[l],u++}return n}}()}),e.register("javve-get-attribute/index.js",function(e,t,r){r.exports=function(e,t){var r=e.getAttribute&&e.getAttribute(t)||null;if(!r)for(var n=e.attributes,s=n.length,i=0;s>i;i++)void 0!==t[i]&&t[i].nodeName===t&&(r=t[i].nodeValue);return r}}),e.register("javve-natural-sort/index.js",function(e,t,r){r.exports=function(e,t,r){var n=/(^-?[0-9]+(\.?[0-9]*)[df]?e?[0-9]?$|^0x[0-9a-f]+$|[0-9]+)/gi,s=/(^[ ]*|[ ]*$)/g,i=/(^([\w ]+,?[\w ]+)?[\w ]+,?[\w ]+\d+:\d+(:\d+)?[\w ]?|^\d{1,4}[\/\-]\d{1,4}[\/\-]\d{1,4}|^\w+, \w+ \d+, \d{4})/,a=/^0x[0-9a-f]+$/i,o=/^0/,r=r||{},l=function(e){return r.insensitive&&(""+e).toLowerCase()||""+e},u=l(e).replace(s,"")||"",c=l(t).replace(s,"")||"",d=u.replace(n,"\x00$1\x00").replace(/\0$/,"").replace(/^\0/,"").split("\x00"),f=c.replace(n,"\x00$1\x00").replace(/\0$/,"").replace(/^\0/,"").split("\x00"),v=parseInt(u.match(a))||1!=d.length&&u.match(i)&&Date.parse(u),h=parseInt(c.match(a))||v&&c.match(i)&&Date.parse(c)||null,p,m,g=r.desc?-1:1;if(h){if(h>v)return-1*g;if(v>h)return 1*g}for(var j=0,x=Math.max(d.length,f.length);x>j;j++){if(p=!(d[j]||"").match(o)&&parseFloat(d[j])||d[j]||0,m=!(f[j]||"").match(o)&&parseFloat(f[j])||f[j]||0,isNaN(p)!==isNaN(m))return isNaN(p)?1:-1;if(typeof p!=typeof m&&(p+="",m+=""),m>p)return-1*g;if(p>m)return 1*g}return 0}}),e.register("javve-to-string/index.js",function(e,t,r){r.exports=function(e){return e=void 0===e?"":e,e=null===e?"":e,e=e.toString()}}),e.register("component-type/index.js",function(e,t,r){var n=Object.prototype.toString;r.exports=function(e){switch(n.call(e)){case"[object Date]":return"date";case"[object RegExp]":return"regexp";case"[object Arguments]":return"arguments";case"[object Array]":return"array";case"[object Error]":return"error"}return null===e?"null":void 0===e?"undefined":e!==e?"nan":e&&1===e.nodeType?"element":typeof e.valueOf()}}),e.register("list.js/index.js",function(e,t,r){!function(e,n){"use strict";var s=e.document,i=t("get-by-class"),a=t("extend"),o=t("indexof"),l=function(e,r,l){var u=this,c,d=t("./src/item")(u),f=t("./src/add-async")(u),v=t("./src/parse")(u);c={start:function(){u.listClass="list",u.searchClass="search",u.sortClass="sort",u.page=200,u.i=1,u.items=[],u.visibleItems=[],u.matchingItems=[],u.searched=!1,u.filtered=!1,u.handlers={updated:[]},u.plugins={},u.helpers={getByClass:i,extend:a,indexOf:o},a(u,r),u.listContainer="string"==typeof e?s.getElementById(e):e,u.listContainer&&(u.list=i(u.listContainer,u.listClass,!0),u.templater=t("./src/templater")(u),u.search=t("./src/search")(u),u.filter=t("./src/filter")(u),u.sort=t("./src/sort")(u),this.items(),u.update(),this.plugins())},items:function(){v(u.list),l!==n&&u.add(l)},plugins:function(){for(var e=0;e<u.plugins.length;e++){var t=u.plugins[e];u[t.name]=t,t.init(u)}}},this.add=function(e,t){if(t)return void f(e,t);var r=[],s=!1;e[0]===n&&(e=[e]);for(var i=0,a=e.length;a>i;i++){var o=null;e[i]instanceof d?(o=e[i],o.reload()):(s=u.items.length>u.page?!0:!1,o=new d(e[i],n,s)),u.items.push(o),r.push(o)}return u.update(),r},this.show=function(e,t){return this.i=e,this.page=t,u.update(),u},this.remove=function(e,t,r){for(var n=0,s=0,i=u.items.length;i>s;s++)u.items[s].values()[e]==t&&(u.templater.remove(u.items[s],r),u.items.splice(s,1),i--,s--,n++);return u.update(),n},this.get=function(e,t){for(var r=[],n=0,s=u.items.length;s>n;n++){var i=u.items[n];i.values()[e]==t&&r.push(i)}return r},this.size=function(){return u.items.length},this.clear=function(){return u.templater.clear(),u.items=[],u},this.on=function(e,t){return u.handlers[e].push(t),u},this.off=function(e,t){var r=u.handlers[e],n=o(r,t);return n>-1&&r.splice(n,1),u},this.trigger=function(e){for(var t=u.handlers[e].length;t--;)u.handlers[e][t](u);return u},this.reset={filter:function(){for(var e=u.items,t=e.length;t--;)e[t].filtered=!1;return u},search:function(){for(var e=u.items,t=e.length;t--;)e[t].found=!1;return u}},this.update=function(){var e=u.items,t=e.length;u.visibleItems=[],u.matchingItems=[],u.templater.clear();for(var r=0;t>r;r++)e[r].matching()&&u.matchingItems.length+1>=u.i&&u.visibleItems.length<u.page?(e[r].show(),u.visibleItems.push(e[r]),u.matchingItems.push(e[r])):e[r].matching()?(u.matchingItems.push(e[r]),e[r].hide()):e[r].hide();return u.trigger("updated"),u},c.start()};r.exports=l}(window)}),e.register("list.js/src/search.js",function(e,t,r){var n=t("events"),s=t("get-by-class"),i=t("to-string");r.exports=function(e){var t,r,a,o,l,u={resetList:function(){e.i=1,e.templater.clear(),l=void 0},setOptions:function(e){2==e.length&&e[1]instanceof Array?a=e[1]:2==e.length&&"function"==typeof e[1]?l=e[1]:3==e.length&&(a=e[1],l=e[2])},setColumns:function(){a=void 0===a?u.toArray(e.items[0].values()):a},setSearchString:function(e){e=i(e).toLowerCase(),e=e.replace(/[-[\]{}()*+?.,\\^$|#]/g,"\\$&"),o=e},toArray:function(e){var t=[];for(var r in e)t.push(r);return t}},c={list:function(){for(var t=0,r=e.items.length;r>t;t++)c.item(e.items[t])},item:function(e){e.found=!1;for(var t=0,r=a.length;r>t;t++)if(c.values(e.values(),a[t]))return void(e.found=!0)},values:function(e,t){return e.hasOwnProperty(t)&&(r=i(e[t]).toLowerCase(),""!==o&&r.search(o)>-1)?!0:!1},reset:function(){e.reset.search(),e.searched=!1}},d=function(t){return e.trigger("searchStart"),u.resetList(),u.setSearchString(t),u.setOptions(arguments),u.setColumns(),""===o?c.reset():(e.searched=!0,l?l(o,a):c.list()),e.update(),e.trigger("searchComplete"),e.visibleItems};return e.handlers.searchStart=e.handlers.searchStart||[],e.handlers.searchComplete=e.handlers.searchComplete||[],n.bind(s(e.listContainer,e.searchClass),"keyup",function(t){var r=t.target||t.srcElement,n=""===r.value&&!e.searched;n||d(r.value)}),n.bind(s(e.listContainer,e.searchClass),"input",function(e){var t=e.target||e.srcElement;""===t.value&&d("")}),e.helpers.toString=i,d}}),e.register("list.js/src/sort.js",function(e,t,r){var n=t("natural-sort"),s=t("classes"),i=t("events"),a=t("get-by-class"),o=t("get-attribute");r.exports=function(e){e.sortFunction=e.sortFunction||function(e,t,r){return r.desc="desc"==r.order?!0:!1,n(e.values()[r.valueName],t.values()[r.valueName],r)};var t={els:void 0,clear:function(){for(var e=0,r=t.els.length;r>e;e++)s(t.els[e]).remove("asc"),s(t.els[e]).remove("desc")},getOrder:function(e){var t=o(e,"data-order");return"asc"==t||"desc"==t?t:s(e).has("desc")?"asc":s(e).has("asc")?"desc":"asc"},getInSensitive:function(e,t){var r=o(e,"data-insensitive");"true"===r?t.insensitive=!0:t.insensitive=!1},setOrder:function(e){for(var r=0,n=t.els.length;n>r;r++){var i=t.els[r];if(o(i,"data-sort")===e.valueName){var a=o(i,"data-order");"asc"==a||"desc"==a?a==e.order&&s(i).add(e.order):s(i).add(e.order)}}}},r=function(){e.trigger("sortStart"),options={};var r=arguments[0].currentTarget||arguments[0].srcElement||void 0;r?(options.valueName=o(r,"data-sort"),t.getInSensitive(r,options),options.order=t.getOrder(r)):(options=arguments[1]||options,options.valueName=arguments[0],options.order=options.order||"asc",options.insensitive="undefined"==typeof options.insensitive?!0:options.insensitive),t.clear(),t.setOrder(options),options.sortFunction=options.sortFunction||e.sortFunction,e.items.sort(function(e,t){return options.sortFunction(e,t,options)}),e.update(),e.trigger("sortComplete")};return e.handlers.sortStart=e.handlers.sortStart||[],e.handlers.sortComplete=e.handlers.sortComplete||[],t.els=a(e.listContainer,e.sortClass),i.bind(t.els,"click",r),e.on("searchStart",t.clear),e.on("filterStart",t.clear),e.helpers.classes=s,e.helpers.naturalSort=n,e.helpers.events=i,e.helpers.getAttribute=o,r}}),e.register("list.js/src/item.js",function(e,t,r){r.exports=function(e){return function(t,r,n){var s=this;this._values={},this.found=!1,this.filtered=!1;var i=function(t,r,n){if(void 0===r)n?s.values(t,n):s.values(t);else{s.elm=r;var i=e.templater.get(s,t);s.values(i)}};this.values=function(t,r){if(void 0===t)return s._values;for(var n in t)s._values[n]=t[n];r!==!0&&e.templater.set(s,s.values())},this.show=function(){e.templater.show(s)},this.hide=function(){e.templater.hide(s)},this.matching=function(){return e.filtered&&e.searched&&s.found&&s.filtered||e.filtered&&!e.searched&&s.filtered||!e.filtered&&e.searched&&s.found||!e.filtered&&!e.searched},this.visible=function(){return s.elm.parentNode==e.list?!0:!1},i(t,r,n)}}}),e.register("list.js/src/templater.js",function(e,t,r){var n=t("get-by-class"),s=function(e){function t(t){if(void 0===t){for(var r=e.list.childNodes,n=[],s=0,i=r.length;i>s;s++)if(void 0===r[s].data)return r[s];return null}if(-1!==t.indexOf("<")){var a=document.createElement("div");return a.innerHTML=t,a.firstChild}return document.getElementById(e.item)}var r=t(e.item),s=this;this.get=function(e,t){s.create(e);for(var r={},i=0,a=t.length;a>i;i++){var o=n(e.elm,t[i],!0);r[t[i]]=o?o.innerHTML:""}return r},this.set=function(e,t){if(!s.create(e))for(var r in t)if(t.hasOwnProperty(r)){var i=n(e.elm,r,!0);i&&("IMG"===i.tagName&&""!==t[r]?i.src=t[r]:i.innerHTML=t[r])}},this.create=function(e){if(void 0!==e.elm)return!1;var t=r.cloneNode(!0);return t.removeAttribute("id"),e.elm=t,s.set(e,e.values()),!0},this.remove=function(t){e.list.removeChild(t.elm)},this.show=function(t){s.create(t),e.list.appendChild(t.elm)},this.hide=function(t){void 0!==t.elm&&t.elm.parentNode===e.list&&e.list.removeChild(t.elm)},this.clear=function(){if(e.list.hasChildNodes())for(;e.list.childNodes.length>=1;)e.list.removeChild(e.list.firstChild)}};r.exports=function(e){return new s(e)}}),e.register("list.js/src/filter.js",function(e,t,r){r.exports=function(e){return e.handlers.filterStart=e.handlers.filterStart||[],e.handlers.filterComplete=e.handlers.filterComplete||[],function(t){if(e.trigger("filterStart"),e.i=1,e.reset.filter(),void 0===t)e.filtered=!1;else{e.filtered=!0;for(var r=e.items,n=0,s=r.length;s>n;n++){var i=r[n];t(i)?i.filtered=!0:i.filtered=!1}}return e.update(),e.trigger("filterComplete"),e.visibleItems}}}),e.register("list.js/src/add-async.js",function(e,t,r){r.exports=function(e){return function(t,r,n){var s=t.splice(0,100);n=n||[],n=n.concat(e.add(s)),t.length>0?setTimeout(function(){addAsync(t,r,n)},10):(e.update(),r(n))}}}),e.register("list.js/src/parse.js",function(e,t,r){r.exports=function(e){var r=t("./item")(e),n=function(e){for(var t=e.childNodes,r=[],n=0,s=t.length;s>n;n++)void 0===t[n].data&&r.push(t[n]);return r},s=function(t,n){for(var s=0,i=t.length;i>s;s++)e.items.push(new r(n,t[s]))},i=function(t,r){var n=t.splice(0,100);s(n,r),t.length>0?setTimeout(function(){init.items.indexAsync(t,r)},10):e.update()};return function(){var t=n(e.list),r=e.valueNames;e.indexAsync?i(t,r):s(t,r)}}}),e.alias("component-classes/index.js","list.js/deps/classes/index.js"),e.alias("component-classes/index.js","classes/index.js"),e.alias("component-indexof/index.js","component-classes/deps/indexof/index.js"),e.alias("segmentio-extend/index.js","list.js/deps/extend/index.js"),e.alias("segmentio-extend/index.js","extend/index.js"),e.alias("component-indexof/index.js","list.js/deps/indexof/index.js"),e.alias("component-indexof/index.js","indexof/index.js"),e.alias("javve-events/index.js","list.js/deps/events/index.js"),e.alias("javve-events/index.js","events/index.js"),e.alias("component-event/index.js","javve-events/deps/event/index.js"),e.alias("timoxley-to-array/index.js","javve-events/deps/to-array/index.js"),e.alias("javve-get-by-class/index.js","list.js/deps/get-by-class/index.js"),e.alias("javve-get-by-class/index.js","get-by-class/index.js"),e.alias("javve-get-attribute/index.js","list.js/deps/get-attribute/index.js"),e.alias("javve-get-attribute/index.js","get-attribute/index.js"),e.alias("javve-natural-sort/index.js","list.js/deps/natural-sort/index.js"),e.alias("javve-natural-sort/index.js","natural-sort/index.js"),e.alias("javve-to-string/index.js","list.js/deps/to-string/index.js"),e.alias("javve-to-string/index.js","list.js/deps/to-string/index.js"),e.alias("javve-to-string/index.js","to-string/index.js"),e.alias("javve-to-string/index.js","javve-to-string/index.js"),e.alias("component-type/index.js","list.js/deps/type/index.js"),e.alias("component-type/index.js","type/index.js"),"object"==typeof exports?module.exports=e("list.js"):"function"==typeof define&&define.amd?define(function(){return e("list.js")}):this.List=e("list.js")}();