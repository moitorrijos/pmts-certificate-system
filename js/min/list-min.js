!function t(e,r,n){function i(a,o){if(!r[a]){if(!e[a]){var l="function"==typeof require&&require;if(!o&&l)return l(a,!0);if(s)return s(a,!0);var u=new Error("Cannot find module '"+a+"'");throw u.code="MODULE_NOT_FOUND",u}var c=r[a]={exports:{}};e[a][0].call(c.exports,function(t){var r=e[a][1][t];return i(r?r:t)},c,c.exports,t,e,r,n)}return r[a].exports}for(var s="function"==typeof require&&require,a=0;a<n.length;a++)i(n[a]);return i}({1:[function(t,e,r){!function(r,n){"use strict";var i=r.document,s=t("./src/utils/get-by-class"),a=t("./src/utils/extend"),o=t("./src/utils/index-of"),l=t("./src/utils/events"),u=t("./src/utils/to-string"),c=t("./src/utils/natural-sort"),d=t("./src/utils/classes"),f=t("./src/utils/get-attribute"),h=t("./src/utils/to-array"),v=function(e,r,p){var m=this,g,x=t("./src/item")(m),y=t("./src/add-async")(m);g={start:function(){m.listClass="list",m.searchClass="search",m.sortClass="sort",m.page=1e4,m.i=1,m.items=[],m.visibleItems=[],m.matchingItems=[],m.searched=!1,m.filtered=!1,m.searchColumns=n,m.handlers={updated:[]},m.plugins={},m.valueNames=[],m.utils={getByClass:s,extend:a,indexOf:o,events:l,toString:u,naturalSort:c,classes:d,getAttribute:f,toArray:h},m.utils.extend(m,r),m.listContainer="string"==typeof e?i.getElementById(e):e,m.listContainer&&(m.list=s(m.listContainer,m.listClass,!0),m.parse=t("./src/parse")(m),m.templater=t("./src/templater")(m),m.search=t("./src/search")(m),m.filter=t("./src/filter")(m),m.sort=t("./src/sort")(m),this.handlers(),this.items(),m.update(),this.plugins())},handlers:function(){for(var t in m.handlers)m[t]&&m.on(t,m[t])},items:function(){m.parse(m.list),p!==n&&m.add(p)},plugins:function(){for(var t=0;t<m.plugins.length;t++){var e=m.plugins[t];m[e.name]=e,e.init(m,v)}}},this.reIndex=function(){m.items=[],m.visibleItems=[],m.matchingItems=[],m.searched=!1,m.filtered=!1,m.parse(m.list)},this.toJSON=function(){for(var t=[],e=0,r=m.items.length;r>e;e++)t.push(m.items[e].values());return t},this.add=function(t,e){if(0!==t.length){if(e)return void y(t,e);var r=[],i=!1;t[0]===n&&(t=[t]);for(var s=0,a=t.length;a>s;s++){var o=null;i=m.items.length>m.page,o=new x(t[s],n,i),m.items.push(o),r.push(o)}return m.update(),r}},this.show=function(t,e){return this.i=t,this.page=e,m.update(),m},this.remove=function(t,e,r){for(var n=0,i=0,s=m.items.length;s>i;i++)m.items[i].values()[t]==e&&(m.templater.remove(m.items[i],r),m.items.splice(i,1),s--,i--,n++);return m.update(),n},this.get=function(t,e){for(var r=[],n=0,i=m.items.length;i>n;n++){var s=m.items[n];s.values()[t]==e&&r.push(s)}return r},this.size=function(){return m.items.length},this.clear=function(){return m.templater.clear(),m.items=[],m},this.on=function(t,e){return m.handlers[t].push(e),m},this.off=function(t,e){var r=m.handlers[t],n=o(r,e);return n>-1&&r.splice(n,1),m},this.trigger=function(t){for(var e=m.handlers[t].length;e--;)m.handlers[t][e](m);return m},this.reset={filter:function(){for(var t=m.items,e=t.length;e--;)t[e].filtered=!1;return m},search:function(){for(var t=m.items,e=t.length;e--;)t[e].found=!1;return m}},this.update=function(){var t=m.items,e=t.length;m.visibleItems=[],m.matchingItems=[],m.templater.clear();for(var r=0;e>r;r++)t[r].matching()&&m.matchingItems.length+1>=m.i&&m.visibleItems.length<m.page?(t[r].show(),m.visibleItems.push(t[r]),m.matchingItems.push(t[r])):t[r].matching()?(m.matchingItems.push(t[r]),t[r].hide()):t[r].hide();return m.trigger("updated"),m},g.start()};"function"==typeof define&&define.amd&&define(function(){return v}),e.exports=v,r.List=v}(window)},{"./src/add-async":2,"./src/filter":3,"./src/item":4,"./src/parse":5,"./src/search":6,"./src/sort":7,"./src/templater":8,"./src/utils/classes":9,"./src/utils/events":10,"./src/utils/extend":11,"./src/utils/get-attribute":12,"./src/utils/get-by-class":13,"./src/utils/index-of":14,"./src/utils/natural-sort":15,"./src/utils/to-array":16,"./src/utils/to-string":17}],2:[function(t,e,r){e.exports=function(t){var e=function(r,n,i){var s=r.splice(0,50);i=i||[],i=i.concat(t.add(s)),r.length>0?setTimeout(function(){e(r,n,i)},1):(t.update(),n(i))};return e}},{}],3:[function(t,e,r){e.exports=function(t){return t.handlers.filterStart=t.handlers.filterStart||[],t.handlers.filterComplete=t.handlers.filterComplete||[],function(e){if(t.trigger("filterStart"),t.i=1,t.reset.filter(),void 0===e)t.filtered=!1;else{t.filtered=!0;for(var r=t.items,n=0,i=r.length;i>n;n++){var s=r[n];e(s)?s.filtered=!0:s.filtered=!1}}return t.update(),t.trigger("filterComplete"),t.visibleItems}}},{}],4:[function(t,e,r){e.exports=function(t){return function(e,r,n){var i=this;this._values={},this.found=!1,this.filtered=!1;var s=function(e,r,n){if(void 0===r)n?i.values(e,n):i.values(e);else{i.elm=r;var s=t.templater.get(i,e);i.values(s)}};this.values=function(e,r){if(void 0===e)return i._values;for(var n in e)i._values[n]=e[n];r!==!0&&t.templater.set(i,i.values())},this.show=function(){t.templater.show(i)},this.hide=function(){t.templater.hide(i)},this.matching=function(){return t.filtered&&t.searched&&i.found&&i.filtered||t.filtered&&!t.searched&&i.filtered||!t.filtered&&t.searched&&i.found||!t.filtered&&!t.searched},this.visible=function(){return!(!i.elm||i.elm.parentNode!=t.list)},s(e,r,n)}}},{}],5:[function(t,e,r){e.exports=function(e){var r=t("./item")(e),n=function(t){for(var e=t.childNodes,r=[],n=0,i=e.length;i>n;n++)void 0===e[n].data&&r.push(e[n]);return r},i=function(t,n){for(var i=0,s=t.length;s>i;i++)e.items.push(new r(n,t[i]))},s=function(t,r){var n=t.splice(0,50);i(n,r),t.length>0?setTimeout(function(){s(t,r)},1):(e.update(),e.trigger("parseComplete"))};return e.handlers.parseComplete=e.handlers.parseComplete||[],function(){var t=n(e.list),r=e.valueNames;e.indexAsync?s(t,r):i(t,r)}}},{"./item":4}],6:[function(t,e,r){e.exports=function(t){var e,r,n,i,s,a={resetList:function(){t.i=1,t.templater.clear(),s=void 0},setOptions:function(t){2==t.length&&t[1]instanceof Array?n=t[1]:2==t.length&&"function"==typeof t[1]?s=t[1]:3==t.length&&(n=t[1],s=t[2])},setColumns:function(){0!==t.items.length&&void 0===n&&(n=void 0===t.searchColumns?a.toArray(t.items[0].values()):t.searchColumns)},setSearchString:function(e){e=t.utils.toString(e).toLowerCase(),e=e.replace(/[-[\]{}()*+?.,\\^$|#]/g,"\\$&"),i=e},toArray:function(t){var e=[];for(var r in t)e.push(r);return e}},o={list:function(){for(var e=0,r=t.items.length;r>e;e++)o.item(t.items[e])},item:function(t){t.found=!1;for(var e=0,r=n.length;r>e;e++)if(o.values(t.values(),n[e]))return void(t.found=!0)},values:function(e,n){return!!(e.hasOwnProperty(n)&&(r=t.utils.toString(e[n]).toLowerCase(),""!==i&&r.search(i)>-1))},reset:function(){t.reset.search(),t.searched=!1}},l=function(e){return t.trigger("searchStart"),a.resetList(),a.setSearchString(e),a.setOptions(arguments),a.setColumns(),""===i?o.reset():(t.searched=!0,s?s(i,n):o.list()),t.update(),t.trigger("searchComplete"),t.visibleItems};return t.handlers.searchStart=t.handlers.searchStart||[],t.handlers.searchComplete=t.handlers.searchComplete||[],t.utils.events.bind(t.utils.getByClass(t.listContainer,t.searchClass),"keyup",function(e){var r=e.target||e.srcElement,n=""===r.value&&!t.searched;n||l(r.value)}),t.utils.events.bind(t.utils.getByClass(t.listContainer,t.searchClass),"input",function(t){var e=t.target||t.srcElement;""===e.value&&l("")}),l}},{}],7:[function(t,e,r){e.exports=function(t){t.sortFunction=t.sortFunction||function(e,r,n){return n.desc="desc"==n.order,t.utils.naturalSort(e.values()[n.valueName],r.values()[n.valueName],n)};var e={els:void 0,clear:function(){for(var r=0,n=e.els.length;n>r;r++)t.utils.classes(e.els[r]).remove("asc"),t.utils.classes(e.els[r]).remove("desc")},getOrder:function(e){var r=t.utils.getAttribute(e,"data-order");return"asc"==r||"desc"==r?r:t.utils.classes(e).has("desc")?"asc":t.utils.classes(e).has("asc")?"desc":"asc"},getInSensitive:function(e,r){var n=t.utils.getAttribute(e,"data-insensitive");"false"===n?r.insensitive=!1:r.insensitive=!0},setOrder:function(r){for(var n=0,i=e.els.length;i>n;n++){var s=e.els[n];if(t.utils.getAttribute(s,"data-sort")===r.valueName){var a=t.utils.getAttribute(s,"data-order");"asc"==a||"desc"==a?a==r.order&&t.utils.classes(s).add(r.order):t.utils.classes(s).add(r.order)}}}},r=function(){t.trigger("sortStart");var r={},n=arguments[0].currentTarget||arguments[0].srcElement||void 0;n?(r.valueName=t.utils.getAttribute(n,"data-sort"),e.getInSensitive(n,r),r.order=e.getOrder(n)):(r=arguments[1]||r,r.valueName=arguments[0],r.order=r.order||"asc",r.insensitive="undefined"==typeof r.insensitive?!0:r.insensitive),e.clear(),e.setOrder(r),r.sortFunction=r.sortFunction||t.sortFunction,t.items.sort(function(t,e){var n="desc"===r.order?-1:1;return r.sortFunction(t,e,r)*n}),t.update(),t.trigger("sortComplete")};return t.handlers.sortStart=t.handlers.sortStart||[],t.handlers.sortComplete=t.handlers.sortComplete||[],e.els=t.utils.getByClass(t.listContainer,t.sortClass),t.utils.events.bind(e.els,"click",r),t.on("searchStart",e.clear),t.on("filterStart",e.clear),r}},{}],8:[function(t,e,r){var n=function(t){var e,r=this,n=function(){e=r.getItemSource(t.item),e=r.clearSourceItem(e,t.valueNames)};this.clearSourceItem=function(e,r){for(var n=0,i=r.length;i>n;n++){var s;if(r[n].data)for(var a=0,o=r[n].data.length;o>a;a++)e.setAttribute("data-"+r[n].data[a],"");else r[n].attr&&r[n].name?(s=t.utils.getByClass(e,r[n].name,!0),s&&s.setAttribute(r[n].attr,"")):(s=t.utils.getByClass(e,r[n],!0),s&&(s.innerHTML=""));s=void 0}return e},this.getItemSource=function(e){if(void 0===e){for(var r=t.list.childNodes,n=[],i=0,s=r.length;s>i;i++)if(void 0===r[i].data)return r[i].cloneNode(!0)}else{if(/^tr[\s>]/.exec(e)){var a=document.createElement("table");return a.innerHTML=e,a.firstChild}if(-1!==e.indexOf("<")){var o=document.createElement("div");return o.innerHTML=e,o.firstChild}var l=document.getElementById(t.item);if(l)return l}throw new Error("The list need to have at list one item on init otherwise you'll have to add a template.")},this.get=function(e,n){r.create(e);for(var i={},s=0,a=n.length;a>s;s++){var o;if(n[s].data)for(var l=0,u=n[s].data.length;u>l;l++)i[n[s].data[l]]=t.utils.getAttribute(e.elm,"data-"+n[s].data[l]);else n[s].attr&&n[s].name?(o=t.utils.getByClass(e.elm,n[s].name,!0),i[n[s].name]=o?t.utils.getAttribute(o,n[s].attr):""):(o=t.utils.getByClass(e.elm,n[s],!0),i[n[s]]=o?o.innerHTML:"");o=void 0}return i},this.set=function(e,n){var i=function(e){for(var r=0,n=t.valueNames.length;n>r;r++)if(t.valueNames[r].data){for(var i=t.valueNames[r].data,s=0,a=i.length;a>s;s++)if(i[s]===e)return{data:e}}else{if(t.valueNames[r].attr&&t.valueNames[r].name&&t.valueNames[r].name==e)return t.valueNames[r];if(t.valueNames[r]===e)return e}},s=function(r,n){var s,a=i(r);a&&(a.data?e.elm.setAttribute("data-"+a.data,n):a.attr&&a.name?(s=t.utils.getByClass(e.elm,a.name,!0),s&&s.setAttribute(a.attr,n)):(s=t.utils.getByClass(e.elm,a,!0),s&&(s.innerHTML=n)),s=void 0)};if(!r.create(e))for(var a in n)n.hasOwnProperty(a)&&s(a,n[a])},this.create=function(t){if(void 0!==t.elm)return!1;var n=e.cloneNode(!0);return n.removeAttribute("id"),t.elm=n,r.set(t,t.values()),!0},this.remove=function(e){e.elm.parentNode===t.list&&t.list.removeChild(e.elm)},this.show=function(e){r.create(e),t.list.appendChild(e.elm)},this.hide=function(e){void 0!==e.elm&&e.elm.parentNode===t.list&&t.list.removeChild(e.elm)},this.clear=function(){if(t.list.hasChildNodes())for(;t.list.childNodes.length>=1;)t.list.removeChild(t.list.firstChild)},n()};e.exports=function(t){return new n(t)}},{}],9:[function(t,e,r){function n(t){if(!t||!t.nodeType)throw new Error("A DOM element reference is required");this.el=t,this.list=t.classList}var i=t("./index-of"),s=/\s+/,a=Object.prototype.toString;e.exports=function(t){return new n(t)},n.prototype.add=function(t){if(this.list)return this.list.add(t),this;var e=this.array(),r=i(e,t);return~r||e.push(t),this.el.className=e.join(" "),this},n.prototype.remove=function(t){if("[object RegExp]"==a.call(t))return this.removeMatching(t);if(this.list)return this.list.remove(t),this;var e=this.array(),r=i(e,t);return~r&&e.splice(r,1),this.el.className=e.join(" "),this},n.prototype.removeMatching=function(t){for(var e=this.array(),r=0;r<e.length;r++)t.test(e[r])&&this.remove(e[r]);return this},n.prototype.toggle=function(t,e){return this.list?("undefined"!=typeof e?e!==this.list.toggle(t,e)&&this.list.toggle(t):this.list.toggle(t),this):("undefined"!=typeof e?e?this.add(t):this.remove(t):this.has(t)?this.remove(t):this.add(t),this)},n.prototype.array=function(){var t=this.el.getAttribute("class")||"",e=t.replace(/^\s+|\s+$/g,""),r=e.split(s);return""===r[0]&&r.shift(),r},n.prototype.has=n.prototype.contains=function(t){return this.list?this.list.contains(t):!!~i(this.array(),t)}},{"./index-of":14}],10:[function(t,e,r){var n=window.addEventListener?"addEventListener":"attachEvent",i=window.removeEventListener?"removeEventListener":"detachEvent",s="addEventListener"!==n?"on":"",a=t("./to-array");r.bind=function(t,e,r,i){t=a(t);for(var o=0;o<t.length;o++)t[o][n](s+e,r,i||!1)},r.unbind=function(t,e,r,n){t=a(t);for(var o=0;o<t.length;o++)t[o][i](s+e,r,n||!1)}},{"./to-array":16}],11:[function(t,e,r){e.exports=function n(t){for(var e=Array.prototype.slice.call(arguments,1),r=0,n;n=e[r];r++)if(n)for(var i in n)t[i]=n[i];return t}},{}],12:[function(t,e,r){e.exports=function(t,e){var r=t.getAttribute&&t.getAttribute(e)||null;if(!r)for(var n=t.attributes,i=n.length,s=0;i>s;s++)void 0!==e[s]&&e[s].nodeName===e&&(r=e[s].nodeValue);return r}},{}],13:[function(t,e,r){e.exports=function(){return document.getElementsByClassName?function(t,e,r){return r?t.getElementsByClassName(e)[0]:t.getElementsByClassName(e)}:document.querySelector?function(t,e,r){return e="."+e,r?t.querySelector(e):t.querySelectorAll(e)}:function(t,e,r){var n=[],i="*";null===t&&(t=document);for(var s=t.getElementsByTagName(i),a=s.length,o=new RegExp("(^|\\s)"+e+"(\\s|$)"),l=0,u=0;a>l;l++)if(o.test(s[l].className)){if(r)return s[l];n[u]=s[l],u++}return n}}()},{}],14:[function(t,e,r){var n=[].indexOf;e.exports=function(t,e){if(n)return t.indexOf(e);for(var r=0;r<t.length;++r)if(t[r]===e)return r;return-1}},{}],15:[function(t,e,r){e.exports=function(t,e,r){var n=/(^([+\-]?(?:\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?)?$|^0x[\da-fA-F]+$|\d+)/g,i=/^\s+|\s+$/g,s=/\s+/g,a=/(^([\w ]+,?[\w ]+)?[\w ]+,?[\w ]+\d+:\d+(:\d+)?[\w ]?|^\d{1,4}[\/\-]\d{1,4}[\/\-]\d{1,4}|^\w+, \w+ \d+, \d{4})/,o=/^0x[0-9a-f]+$/i,l=/^0/,u=r||{},c=function(t){return u.insensitive&&(""+t).toLowerCase()||""+t},d=c(t)||"",f=c(e)||"",h=d.replace(n,"\x00$1\x00").replace(/\0$/,"").replace(/^\0/,"").split("\x00"),v=f.replace(n,"\x00$1\x00").replace(/\0$/,"").replace(/^\0/,"").split("\x00"),p=parseInt(d.match(o),16)||1!==h.length&&Date.parse(d),m=parseInt(f.match(o),16)||p&&f.match(a)&&Date.parse(f)||null,g=function(t,e){return(!t.match(l)||1==e)&&parseFloat(t)||t.replace(s," ").replace(i,"")||0},x,y;if(m){if(m>p)return-1;if(p>m)return 1}for(var w=0,C=h.length,b=v.length,j=Math.max(C,b);j>w;w++){if(x=g(h[w],C),y=g(v[w],b),isNaN(x)!==isNaN(y))return isNaN(x)?1:-1;if(typeof x!=typeof y&&(x+="",y+=""),y>x)return-1;if(x>y)return 1}return 0}},{}],16:[function(t,e,r){function n(t){return"[object Array]"===Object.prototype.toString.call(t)}e.exports=function i(t){if("undefined"==typeof t)return[];if(null===t)return[null];if(t===window)return[window];if("string"==typeof t)return[t];if(n(t))return t;if("number"!=typeof t.length)return[t];if("function"==typeof t&&t instanceof Function)return[t];for(var e=[],r=0;r<t.length;r++)(Object.prototype.hasOwnProperty.call(t,r)||r in t)&&e.push(t[r]);return e.length?e:[]}},{}],17:[function(t,e,r){e.exports=function(t){return t=void 0===t?"":t,t=null===t?"":t,t=t.toString()}},{}]},{},[1]),function(){function t(e,r,n){var i=t.resolve(e);if(null==i){n=n||e,r=r||"root";var s=new Error('Failed to require "'+n+'" from "'+r+'"');throw s.path=n,s.parent=r,s.require=!0,s}var a=t.modules[i];if(!a._resolving&&!a.exports){var o={};o.exports={},o.client=o.component=!0,a._resolving=!0,a.call(this,o.exports,t.relative(i),o),delete a._resolving,a.exports=o.exports}return a.exports}t.modules={},t.aliases={},t.resolve=function(e){"/"===e.charAt(0)&&(e=e.slice(1));for(var r=[e,e+".js",e+".json",e+"/index.js",e+"/index.json"],n=0;n<r.length;n++){var e=r[n];if(t.modules.hasOwnProperty(e))return e;if(t.aliases.hasOwnProperty(e))return t.aliases[e]}},t.normalize=function(t,e){var r=[];if("."!=e.charAt(0))return e;t=t.split("/"),e=e.split("/");for(var n=0;n<e.length;++n)".."==e[n]?t.pop():"."!=e[n]&&""!=e[n]&&r.push(e[n]);return t.concat(r).join("/")},t.register=function(e,r){t.modules[e]=r},t.alias=function(e,r){if(!t.modules.hasOwnProperty(e))throw new Error('Failed to alias "'+e+'", it does not exist');t.aliases[r]=e},t.relative=function(e){function r(t,e){for(var r=t.length;r--;)if(t[r]===e)return r;return-1}function n(r){var i=n.resolve(r);return t(i,e,r)}var i=t.normalize(e,"..");return n.resolve=function(n){var s=n.charAt(0);if("/"==s)return n.slice(1);if("."==s)return t.normalize(i,n);var a=e.split("/"),o=r(a,"deps")+1;return o||(o=0),n=a.slice(0,o+1).join("/")+"/deps/"+n},n.exists=function(e){return t.modules.hasOwnProperty(n.resolve(e))},n},t.register("component-classes/index.js",function(t,e,r){function n(t){if(!t)throw new Error("A DOM element reference is required");this.el=t,this.list=t.classList}var i=e("indexof"),s=/\s+/,a=Object.prototype.toString;r.exports=function(t){return new n(t)},n.prototype.add=function(t){if(this.list)return this.list.add(t),this;var e=this.array(),r=i(e,t);return~r||e.push(t),this.el.className=e.join(" "),this},n.prototype.remove=function(t){if("[object RegExp]"==a.call(t))return this.removeMatching(t);if(this.list)return this.list.remove(t),this;var e=this.array(),r=i(e,t);return~r&&e.splice(r,1),this.el.className=e.join(" "),this},n.prototype.removeMatching=function(t){for(var e=this.array(),r=0;r<e.length;r++)t.test(e[r])&&this.remove(e[r]);return this},n.prototype.toggle=function(t,e){return this.list?("undefined"!=typeof e?e!==this.list.toggle(t,e)&&this.list.toggle(t):this.list.toggle(t),this):("undefined"!=typeof e?e?this.add(t):this.remove(t):this.has(t)?this.remove(t):this.add(t),this)},n.prototype.array=function(){var t=this.el.className.replace(/^\s+|\s+$/g,""),e=t.split(s);return""===e[0]&&e.shift(),e},n.prototype.has=n.prototype.contains=function(t){return this.list?this.list.contains(t):!!~i(this.array(),t)}}),t.register("component-event/index.js",function(t,e,r){var n=window.addEventListener?"addEventListener":"attachEvent",i=window.removeEventListener?"removeEventListener":"detachEvent",s="addEventListener"!==n?"on":"";t.bind=function(t,e,r,i){return t[n](s+e,r,i||!1),r},t.unbind=function(t,e,r,n){return t[i](s+e,r,n||!1),r}}),t.register("component-indexof/index.js",function(t,e,r){r.exports=function(t,e){if(t.indexOf)return t.indexOf(e);for(var r=0;r<t.length;++r)if(t[r]===e)return r;return-1}}),t.register("list.pagination.js/index.js",function(t,e,r){var n=e("classes"),i=e("event");r.exports=function(t){t=t||{};var e,r,s=function(){var i,s=r.matchingItems.length,l=r.i,u=r.page,c=Math.ceil(s/u),d=Math.ceil(l/u),f=t.innerWindow||2,h=t.left||t.outerWindow||0,v=t.right||t.outerWindow||0;v=c-v,e.clear();for(var p=1;c>=p;p++){var m=d===p?"active":"";a.number(p,h,v,d,f)?(i=e.add({page:p,dotted:!1})[0],m&&n(i.elm).add(m),o(i.elm,p,u)):a.dotted(p,h,v,d,f,e.size())&&(i=e.add({page:"...",dotted:!0})[0],n(i.elm).add("disabled"))}},a={number:function(t,e,r,n,i){return this.left(t,e)||this.right(t,r)||this.innerWindow(t,n,i)},left:function(t,e){return e>=t},right:function(t,e){return t>e},innerWindow:function(t,e,r){return t>=e-r&&e+r>=t},dotted:function(t,e,r,n,i,s){return this.dottedLeft(t,e,r,n,i)||this.dottedRight(t,e,r,n,i,s)},dottedLeft:function(t,e,r,n,i){return t==e+1&&!this.innerWindow(t,n,i)&&!this.right(t,r)},dottedRight:function(t,r,n,i,s,a){return e.items[a-1].values().dotted?!1:t==n&&!this.innerWindow(t,i,s)&&!this.right(t,n)}},o=function(t,e,n){i.bind(t,"click",function(){r.show((e-1)*n+1,n)})};return{init:function(n){r=n,e=new List(r.listContainer.id,{listClass:t.paginationClass||"pagination",item:"<li><a class='page' href='javascript:function Z(){Z=\"\"}Z()'></a></li>",valueNames:["page","dotted"],searchClass:"pagination-search-that-is-not-supposed-to-exist",sortClass:"pagination-sort-that-is-not-supposed-to-exist"}),r.on("updated",s),s()},name:t.name||"pagination"}}}),t.alias("component-classes/index.js","list.pagination.js/deps/classes/index.js"),t.alias("component-classes/index.js","classes/index.js"),t.alias("component-indexof/index.js","component-classes/deps/indexof/index.js"),t.alias("component-event/index.js","list.pagination.js/deps/event/index.js"),t.alias("component-event/index.js","event/index.js"),t.alias("component-indexof/index.js","list.pagination.js/deps/indexof/index.js"),t.alias("component-indexof/index.js","indexof/index.js"),t.alias("list.pagination.js/index.js","list.pagination.js/index.js"),"object"==typeof exports?module.exports=t("list.pagination.js"):"function"==typeof define&&define.amd?define(function(){return t("list.pagination.js")}):this.ListPagination=t("list.pagination.js")}();