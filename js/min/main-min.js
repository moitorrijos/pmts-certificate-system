//table2excel.js
!function(u,l,d,e){
// The actual plugin constructor
function n(e,t){this.element=e,
// jQuery has an extend method which merges the contents of two or
// more objects, storing the result in the first object. The first object
// is generally empty as we don't want to alter the default options for
// future instances of the plugin
//
this.settings=u.extend({},s,t),this._defaults=s,this._name=i,this.init()}function h(e){return(e.filename?e.filename:"table2excel")+".xls"}var i="table2excel",s={exclude:".noExl",name:"Table2Excel"};n.prototype={init:function(){var i=this;i.template={head:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head>\x3c!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>',sheet:{head:"<x:ExcelWorksheet><x:Name>",tail:"</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"},mid:"</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--\x3e</head><body>",table:{head:"<table>",tail:"</table>"},foot:"</body></html>"},i.tableRows=[],
// get contents of table except for exclude
u(i.element).each(function(e,t){var n="";u(t).find("tr").not(i.settings.exclude).each(function(e,t){n+="<tr>"+u(t).html()+"</tr>"}),i.tableRows.push(n)}),i.tableToExcel(i.tableRows,i.settings.name)},tableToExcel:function(e,t){var n=this,i="",s,r,a;if(n.uri="data:application/vnd.ms-excel;base64,",n.base64=function(e){return l.btoa(unescape(encodeURIComponent(e)))},n.format=function(e,n){return e.replace(/{(\w+)}/g,function(e,t){return n[t]})},n.ctx={worksheet:t||"Worksheet",table:e},i=n.template.head,u.isArray(e))for(s in e)
//fullTemplate += e.template.sheet.head + "{worksheet" + i + "}" + e.template.sheet.tail;
i+=n.template.sheet.head+"Table"+s+n.template.sheet.tail;if(i+=n.template.mid,u.isArray(e))for(s in e)i+=n.template.table.head+"{table"+s+"}"+n.template.table.tail;for(s in i+=n.template.foot,e)n.ctx["table"+s]=e[s];if(delete n.ctx.table,"undefined"!=typeof msie&&0<msie||navigator.userAgent.match(/Trident.*rv\:11\./))if("undefined"!=typeof Blob){
//use blobs if we can
i=[i];
//convert to array
var o=new Blob(i,{type:"text/html"});l.navigator.msSaveBlob(o,h(n.settings))}else
//otherwise use the iframe and save
//requires a blank iframe on page called txtArea1
txtArea1.document.open("text/html","replace"),txtArea1.document.write(n.format(i,n.ctx)),txtArea1.document.close(),txtArea1.focus(),sa=txtArea1.document.execCommand("SaveAs",!0,h(n.settings));else r=n.uri+n.base64(n.format(i,n.ctx)),(a=d.createElement("a")).download=h(n.settings),a.href=r,d.body.appendChild(a),a.click(),d.body.removeChild(a);return!0}},u.fn[i]=function(e){var t=this;
// chain jQuery functions
return t.each(function(){u.data(t,"plugin_"+i)||u.data(t,"plugin_"+i,new n(this,e))}),t}}(jQuery,window,document),function(t){t(function(){var e=t(".download-xls-button"),i=t(".download-xls-table");e.click(function(e){e.preventDefault();var t=new Date,n=t.getDate().toString()+"-"+t.getMonth().toString()+"-"+t.getFullYear().toString()+"-"+t.getMilliseconds().toString();i.table2excel({name:"Certificates Table",filename:"panama-certs-"+n})})})}(jQuery),function(t){
// IE doesn't support Array#indexOf, so have a simple replacement
function o(e,t){for(var n=e.length;n--;)if(e[n]===t)return n;return-1}
// for comparing mods before unassignment
function u(e,t){if(e.length!=t.length)return!1;for(var n=0;n<e.length;n++)if(e[n]!==t[n])return!1;return!0}function l(e){for(v in k)k[v]=e[b[v]]}
// handle keydown event
function n(e){var t,n,i,s,r,a;// right command on webkit, command on Gecko
if(t=e.keyCode,-1==o(x,t)&&x.push(t),
// if a modifier key, set the key.<modifierkeyname> property to true and return
93!=t&&224!=t||(t=91),t in k)
// 'assignKey' from inside this closure is exported to window.key
for(i in k[t]=!0,S)S[i]==t&&(d[i]=!0);else
// see if we need to ignore the keypress (filter() can can be overridden)
// by default ignore key presses if a select, textarea, or input is focused
if(l(e),d.filter.call(this,e)&&t in w)
// for each potential shortcut
for(a=f(),s=0;s<w[t].length;s++)
// see if it's in the current scope
if((n=w[t][s]).scope==a||"all"==n.scope){for(i in
// check if modifiers match if any
r=0<n.mods.length,k)(!k[i]&&-1<o(n.mods,+i)||k[i]&&-1==o(n.mods,+i))&&(r=!1);
// call the handler and stop the event if neccessary
(0!=n.mods.length||k[16]||k[18]||k[17]||k[91])&&!r||!1===n.method(e,n)&&(e.preventDefault?e.preventDefault():e.returnValue=!1,e.stopPropagation&&e.stopPropagation(),e.cancelBubble&&(e.cancelBubble=!0))}
// abort if no potentially matching shortcuts found
}
// unset modifier keys on keyup
function e(e){var t=e.keyCode,n,i=o(x,t);
// remove key from _downKeys
if(0<=i&&x.splice(i,1),93!=t&&224!=t||(t=91),t in k)for(n in k[t]=!1,S)S[n]==t&&(d[n]=!1)}function i(){for(v in k)k[v]=!1;for(v in S)d[v]=!1}
// parse and assign shortcut
function d(e,t,n){var i,s;i=_(e),void 0===n&&(n=t,t="all");
// for each shortcut
for(var r=0;r<i.length;r++)
// set modifier keys if any
s=[],1<(e=i[r].split("+")).length&&(s=y(e),e=[e[e.length-1]]),
// convert to keycode and...
e=e[0],
// ...store handler
(e=Y(e))in w||(w[e]=[]),w[e].push({shortcut:i[r],scope:t,method:n,key:i[r],mods:s})}
// unbind all handlers for given key in current scope
function s(e,t){var n,i,s=[],r,a,o;for(n=_(e),a=0;a<n.length;a++){if(1<(i=n[a].split("+")).length&&(s=y(i)),e=i[i.length-1],e=Y(e),void 0===t&&(t=f()),!w[e])return;for(r=0;r<w[e].length;r++)
// only clear handlers if correct scope and mods match
(o=w[e][r]).scope===t&&u(o.mods,s)&&(w[e][r]={})}}
// Returns true if the key with code 'keyCode' is currently down
// Converts strings into key codes.
function r(e){return"string"==typeof e&&(e=Y(e)),-1!=o(x,e)}function a(){return x.slice(0)}function h(e){var t=(e.target||e.srcElement).tagName;
// ignore keypressed in any elements that support keyboard data input
return!("INPUT"==t||"SELECT"==t||"TEXTAREA"==t)}
// initialize key.<modifier> to false
// set current scope (default 'all')
function c(e){M=e||"all"}function f(){return M||"all"}
// delete all handlers for a given scope
function m(e){var t,n,i;for(t in w)for(n=w[t],i=0;i<n.length;)n[i].scope===e?n.splice(i,1):i++}
// abstract key logic for assign and unassign
function _(e){var t;return""==(t=(e=e.replace(/\s/g,"")).split(","))[t.length-1]&&(t[t.length-2]+=","),t}
// abstract mods logic for assign and unassign
function y(e){for(var t=e.slice(0,e.length-1),n=0;n<t.length;n++)t[n]=S[t[n]];return t}
// cross-browser events
function g(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,function(){n(window.event)})}
// restore previously defined key and return reference to our key object
function p(){var e=t.key;return t.key=O,e}
// set window.key and window.key.set/get/deleteScope, and the default filter
var v,w={},k={16:!1,18:!1,17:!1,91:!1},M="all",
// modifier keys
S={"⇧":16,shift:16,"⌥":18,alt:18,option:18,"⌃":17,ctrl:17,control:17,"⌘":91,command:91},
// special keys
D={backspace:8,tab:9,clear:12,enter:13,return:13,esc:27,escape:27,space:32,left:37,up:38,right:39,down:40,del:46,delete:46,home:36,end:35,pageup:33,pagedown:34,",":188,".":190,"/":191,"`":192,"-":189,"=":187,";":186,"'":222,"[":219,"]":221,"\\":220},Y=function(e){return D[e]||e.toUpperCase().charCodeAt(0)},x=[];for(v=1;v<20;v++)D["f"+v]=111+v;var b={16:"shiftKey",18:"altKey",17:"ctrlKey",91:"metaKey"};for(v in S)d[v]=!1;
// set the handlers globally on document
g(document,"keydown",function(e){n(e)}),// Passing _scope to a callback to ensure it remains the same by execution. Fixes #48
g(document,"keyup",e),
// reset modifiers to false whenever the window is (re)focused.
g(window,"focus",i);
// store previously defined key
var O=t.key;t.key=d,t.key.setScope=c,t.key.getScope=f,t.key.deleteScope=m,t.key.filter=h,t.key.isPressed=r,t.key.getPressedKeyCodes=a,t.key.noConflict=p,t.key.unbind=s,"undefined"!=typeof module&&(module.exports=d)}(this),function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.moment=t()}(this,function(){"use strict";function l(){return ai.apply(null,arguments)}
// This is done to register the method called with moment()
// without creating circular dependencies.
function e(e){ai=e}function s(e){return e instanceof Array||"[object Array]"===Object.prototype.toString.call(e)}function r(e){return e instanceof Date||"[object Date]"===Object.prototype.toString.call(e)}function n(e,t){var n=[],i;for(i=0;i<e.length;++i)n.push(t(e[i],i));return n}function o(e,t){return Object.prototype.hasOwnProperty.call(e,t)}function a(e,t){for(var n in t)o(t,n)&&(e[n]=t[n]);return o(t,"toString")&&(e.toString=t.toString),o(t,"valueOf")&&(e.valueOf=t.valueOf),e}function d(e,t,n,i){return Le(e,t,n,i,!0).utc()}function t(){
// We need to deep clone this object.
return{empty:!1,unusedTokens:[],unusedInput:[],overflow:-2,charsLeftOver:0,nullInput:!1,invalidMonth:null,invalidFormat:!1,userInvalidated:!1,iso:!1,parsedDateParts:[],meridiem:null}}function h(e){return null==e._pf&&(e._pf={empty:!1,unusedTokens:[],unusedInput:[],overflow:-2,charsLeftOver:0,nullInput:!1,invalidMonth:null,invalidFormat:!1,userInvalidated:!1,iso:!1,parsedDateParts:[],meridiem:null}),e._pf}function u(e){if(null==e._isValid){var t=h(e),n=oi.call(t.parsedDateParts,function(e){return null!=e});e._isValid=!isNaN(e._d.getTime())&&t.overflow<0&&!t.empty&&!t.invalidMonth&&!t.invalidWeekday&&!t.nullInput&&!t.invalidFormat&&!t.userInvalidated&&(!t.meridiem||t.meridiem&&n),e._strict&&(e._isValid=e._isValid&&0===t.charsLeftOver&&0===t.unusedTokens.length&&void 0===t.bigHour)}return e._isValid}function i(e){var t=d(NaN);return null!=e?a(h(t),e):h(t).userInvalidated=!0,t}function c(e){return void 0===e}
// Plugins that add properties should also add the key here (null value),
// so we can properly clone ourselves.
function f(e,t){var n,i,s;if(c(t._isAMomentObject)||(e._isAMomentObject=t._isAMomentObject),c(t._i)||(e._i=t._i),c(t._f)||(e._f=t._f),c(t._l)||(e._l=t._l),c(t._strict)||(e._strict=t._strict),c(t._tzm)||(e._tzm=t._tzm),c(t._isUTC)||(e._isUTC=t._isUTC),c(t._offset)||(e._offset=t._offset),c(t._pf)||(e._pf=h(t)),c(t._locale)||(e._locale=t._locale),0<ui.length)for(n in ui)c(s=t[i=ui[n]])||(e[i]=s);return e}
// Moment prototype object
function m(e){f(this,e),this._d=new Date(null!=e._d?e._d.getTime():NaN),
// Prevent infinite loop in case updateOffset creates new moment
// objects.
!1===li&&(li=!0,l.updateOffset(this),li=!1)}function _(e){return e instanceof m||null!=e&&null!=e._isAMomentObject}function y(e){return e<0?Math.ceil(e):Math.floor(e)}function g(e){var t=+e,n=0;return 0!==t&&isFinite(t)&&(n=y(t)),n}
// compare two arrays, return the number of differences
function p(e,t,n){var i=Math.min(e.length,t.length),s=Math.abs(e.length-t.length),r=0,a;for(a=0;a<i;a++)(n&&e[a]!==t[a]||!n&&g(e[a])!==g(t[a]))&&r++;return r+s}function v(e){!1===l.suppressDeprecationWarnings&&"undefined"!=typeof console&&console.warn&&console.warn("Deprecation warning: "+e)}function w(e,t){var n=!0;return a(function(){return null!=l.deprecationHandler&&l.deprecationHandler(null,e),n&&(v(e+"\nArguments: "+Array.prototype.slice.call(arguments).join(", ")+"\n"+(new Error).stack),n=!1),t.apply(this,arguments)},t)}function k(e,t){null!=l.deprecationHandler&&l.deprecationHandler(e,t),di[e]||(v(t),di[e]=!0)}function M(e){return e instanceof Function||"[object Function]"===Object.prototype.toString.call(e)}function S(e){return"[object Object]"===Object.prototype.toString.call(e)}function D(e){var t,n;for(n in e)M(t=e[n])?this[n]=t:this["_"+n]=t;this._config=e,
// Lenient ordinal parsing accepts just a number in addition to
// number + (possibly) stuff coming from _ordinalParseLenient.
this._ordinalParseLenient=new RegExp(this._ordinalParse.source+"|"+/\d{1,2}/.source)}function Y(e,t){var n=a({},e),i;for(i in t)o(t,i)&&(S(e[i])&&S(t[i])?(n[i]={},a(n[i],e[i]),a(n[i],t[i])):null!=t[i]?n[i]=t[i]:delete n[i]);return n}function x(e){null!=e&&this.set(e)}function b(e){return e?e.toLowerCase().replace("_","-"):e}
// pick the locale from the array
// try ['en-au', 'en-gb'] as 'en-au', 'en-gb', 'en', as in move through the list trying each
// substring from most specific to least, but move to the next array item if it's a more specific variant than the current root
function O(e){for(var t=0,n,i,s,r;t<e.length;){for(n=(r=b(e[t]).split("-")).length,i=(i=b(e[t+1]))?i.split("-"):null;0<n;){if(s=T(r.slice(0,n).join("-")))return s;if(i&&i.length>=n&&p(r,i,!0)>=n-1)
//the next array item is better than a shallower substring of this one
break;n--}t++}return null}function T(e){var t=null;
// TODO: Find a better way to register and load all the locales in Node
if(!ci[e]&&"undefined"!=typeof module&&module&&module.exports)try{t=fi._abbr,require("./locale/"+e),
// because defineLocale currently also sets the global locale, we
// want to undo that for lazy loaded locales
P(t)}catch(e){}return ci[e]}
// This function will load locale and then set the global locale.  If
// no arguments are passed in, it will simply return the current global
// locale key.
function P(e,t){var n;return e&&(n=c(t)?R(e):W(e,t))&&(
// moment.duration._locale = moment._locale = data;
fi=n),fi._abbr}function W(e,t){return null!==t?(t.abbr=e,null!=ci[e]?(k("defineLocaleOverride","use moment.updateLocale(localeName, config) to change an existing locale. moment.defineLocale(localeName, config) should only be used for creating a new locale"),t=Y(ci[e]._config,t)):null!=t.parentLocale&&(null!=ci[t.parentLocale]?t=Y(ci[t.parentLocale]._config,t):
// treat as if there is no base config
k("parentLocaleUndefined","specified parentLocale is not defined yet")),ci[e]=new x(t),
// backwards compat for now: also set the locale
P(e),ci[e]):(
// useful for testing
delete ci[e],null)}function C(e,t){var n;null!=t?(null!=ci[e]&&(t=Y(ci[e]._config,t)),(n=new x(t)).parentLocale=ci[e],ci[e]=n,
// backwards compat for now: also set the locale
P(e)):
// pass null for config to unupdate, useful for tests
null!=ci[e]&&(null!=ci[e].parentLocale?ci[e]=ci[e].parentLocale:null!=ci[e]&&delete ci[e]);return ci[e]}
// returns locale data
function R(e){var t;if(e&&e._locale&&e._locale._abbr&&(e=e._locale._abbr),!e)return fi;if(!s(e)){if(
//short-circuit everything else
t=T(e))return t;e=[e]}return O(e)}function U(){return hi(ci)}function L(e,t){var n=e.toLowerCase();mi[n]=mi[n+"s"]=mi[t]=e}function H(e){return"string"==typeof e?mi[e]||mi[e.toLowerCase()]:void 0}function F(e){var t={},n,i;for(i in e)o(e,i)&&(n=H(i))&&(t[n]=e[i]);return t}function G(t,n){return function(e){return null!=e?(A(this,t,e),l.updateOffset(this,n),this):E(this,t)}}function E(e,t){return e.isValid()?e._d["get"+(e._isUTC?"UTC":"")+t]():NaN}function A(e,t,n){e.isValid()&&e._d["set"+(e._isUTC?"UTC":"")+t](n)}
// MOMENTS
function V(e,t){var n;if("object"==typeof e)for(n in e)this.set(n,e[n]);else if(M(this[e=H(e)]))return this[e](t);return this}function I(e,t,n){var i=""+Math.abs(e),s=t-i.length,r;return(0<=e?n?"+":"":"-")+Math.pow(10,Math.max(0,s)).toString().substr(1)+i}
// token:    'M'
// padded:   ['MM', 2]
// ordinal:  'Mo'
// callback: function () { this.month() + 1 }
function N(e,t,n,i){var s=i;"string"==typeof i&&(s=function(){return this[i]()}),e&&(pi[e]=s),t&&(pi[t[0]]=function(){return I(s.apply(this,arguments),t[1],t[2])}),n&&(pi[n]=function(){return this.localeData().ordinal(s.apply(this,arguments),e)})}function j(e){return e.match(/\[[\s\S]/)?e.replace(/^\[|\]$/g,""):e.replace(/\\/g,"")}function Z(i){var s=i.match(_i),e,r;for(e=0,r=s.length;e<r;e++)pi[s[e]]?s[e]=pi[s[e]]:s[e]=j(s[e]);return function(e){var t="",n;for(n=0;n<r;n++)t+=s[n]instanceof Function?s[n].call(e,i):s[n];return t}}
// format date using native date object
function z(e,t){return e.isValid()?(t=B(t,e.localeData()),gi[t]=gi[t]||Z(t),gi[t](e)):e.localeData().invalidDate()}function B(e,t){function n(e){return t.longDateFormat(e)||e}var i=5;for(yi.lastIndex=0;0<=i&&yi.test(e);)e=e.replace(yi,n),yi.lastIndex=0,i-=1;return e}function $(e,n,i){Hi[e]=M(n)?n:function(e,t){return e&&i?i:n}}function q(e,t){return o(Hi,e)?Hi[e](t._strict,t._locale):new RegExp(Q(e))}
// Code from http://stackoverflow.com/questions/3561493/is-there-a-regexp-escape-function-in-javascript
function Q(e){return J(e.replace("\\","").replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g,function(e,t,n,i,s){return t||n||i||s}))}function J(e){return e.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&")}function K(e,n){var t,i=n;for("string"==typeof e&&(e=[e]),"number"==typeof n&&(i=function(e,t){t[n]=g(e)}),t=0;t<e.length;t++)Fi[e[t]]=i}function X(e,s){K(e,function(e,t,n,i){n._w=n._w||{},s(e,n._w,n,i)})}function ee(e,t,n){null!=t&&o(Fi,e)&&Fi[e](t,n._a,n,e)}function te(e,t){return new Date(Date.UTC(e,t+1,0)).getUTCDate()}
// FORMATTING
function ne(e,t){return s(this._months)?this._months[e.month()]:this._months[$i.test(t)?"format":"standalone"][e.month()]}function ie(e,t){return s(this._monthsShort)?this._monthsShort[e.month()]:this._monthsShort[$i.test(t)?"format":"standalone"][e.month()]}function se(e,t,n){var i,s,r,a=e.toLocaleLowerCase();if(!this._monthsParse)for(
// this is not used
this._monthsParse=[],this._longMonthsParse=[],this._shortMonthsParse=[],i=0;i<12;++i)r=d([2e3,i]),this._shortMonthsParse[i]=this.monthsShort(r,"").toLocaleLowerCase(),this._longMonthsParse[i]=this.months(r,"").toLocaleLowerCase();return n?"MMM"===t?-1!==(s=Bi.call(this._shortMonthsParse,a))?s:null:-1!==(s=Bi.call(this._longMonthsParse,a))?s:null:"MMM"===t?-1!==(s=Bi.call(this._shortMonthsParse,a))?s:-1!==(s=Bi.call(this._longMonthsParse,a))?s:null:-1!==(s=Bi.call(this._longMonthsParse,a))?s:-1!==(s=Bi.call(this._shortMonthsParse,a))?s:null}function re(e,t,n){var i,s,r;if(this._monthsParseExact)return se.call(this,e,t,n);
// TODO: add sorting
// Sorting makes sure if one month (or abbr) is a prefix of another
// see sorting in computeMonthsParse
for(this._monthsParse||(this._monthsParse=[],this._longMonthsParse=[],this._shortMonthsParse=[]),i=0;i<12;i++){
// test the regex
if(
// make the regex if we don't have it already
s=d([2e3,i]),n&&!this._longMonthsParse[i]&&(this._longMonthsParse[i]=new RegExp("^"+this.months(s,"").replace(".","")+"$","i"),this._shortMonthsParse[i]=new RegExp("^"+this.monthsShort(s,"").replace(".","")+"$","i")),n||this._monthsParse[i]||(r="^"+this.months(s,"")+"|^"+this.monthsShort(s,""),this._monthsParse[i]=new RegExp(r.replace(".",""),"i")),n&&"MMMM"===t&&this._longMonthsParse[i].test(e))return i;if(n&&"MMM"===t&&this._shortMonthsParse[i].test(e))return i;if(!n&&this._monthsParse[i].test(e))return i}}
// MOMENTS
function ae(e,t){var n;if(!e.isValid())
// No op
return e;if("string"==typeof t)if(/^\d+$/.test(t))t=g(t);else
// TODO: Another silent failure?
if("number"!=typeof(t=e.localeData().monthsParse(t)))return e;return n=Math.min(e.date(),te(e.year(),t)),e._d["set"+(e._isUTC?"UTC":"")+"Month"](t,n),e}function oe(e){return null!=e?(ae(this,e),l.updateOffset(this,!0),this):E(this,"Month")}function ue(){return te(this.year(),this.month())}function le(e){return this._monthsParseExact?(o(this,"_monthsRegex")||he.call(this),e?this._monthsShortStrictRegex:this._monthsShortRegex):this._monthsShortStrictRegex&&e?this._monthsShortStrictRegex:this._monthsShortRegex}function de(e){return this._monthsParseExact?(o(this,"_monthsRegex")||he.call(this),e?this._monthsStrictRegex:this._monthsRegex):this._monthsStrictRegex&&e?this._monthsStrictRegex:this._monthsRegex}function he(){function e(e,t){return t.length-e.length}var t=[],n=[],i=[],s,r;for(s=0;s<12;s++)
// make the regex if we don't have it already
r=d([2e3,s]),t.push(this.monthsShort(r,"")),n.push(this.months(r,"")),i.push(this.months(r,"")),i.push(this.monthsShort(r,""));
// Sorting makes sure if one month (or abbr) is a prefix of another it
// will match the longer piece.
for(t.sort(e),n.sort(e),i.sort(e),s=0;s<12;s++)t[s]=J(t[s]),n[s]=J(n[s]),i[s]=J(i[s]);this._monthsRegex=new RegExp("^("+i.join("|")+")","i"),this._monthsShortRegex=this._monthsRegex,this._monthsStrictRegex=new RegExp("^("+n.join("|")+")","i"),this._monthsShortStrictRegex=new RegExp("^("+t.join("|")+")","i")}function ce(e){var t,n=e._a;return n&&-2===h(e).overflow&&(t=n[Ei]<0||11<n[Ei]?Ei:n[Ai]<1||n[Ai]>te(n[Gi],n[Ei])?Ai:n[Vi]<0||24<n[Vi]||24===n[Vi]&&(0!==n[Ii]||0!==n[Ni]||0!==n[ji])?Vi:n[Ii]<0||59<n[Ii]?Ii:n[Ni]<0||59<n[Ni]?Ni:n[ji]<0||999<n[ji]?ji:-1,h(e)._overflowDayOfYear&&(t<Gi||Ai<t)&&(t=Ai),h(e)._overflowWeeks&&-1===t&&(t=Zi),h(e)._overflowWeekday&&-1===t&&(t=zi),h(e).overflow=t),e}
// iso 8601 regex
// 0000-00-00 0000-W00 or 0000-W00-0 + T + 00 or 00:00 or 00:00:00 or 00:00:00.000 + +00:00 or +0000 or +00)
// date from iso format
function fe(e){var t,n,i=e._i,s=Xi.exec(i)||es.exec(i),r,a,o,u;if(s){for(h(e).iso=!0,t=0,n=ns.length;t<n;t++)if(ns[t][1].exec(s[1])){a=ns[t][0],r=!1!==ns[t][2];break}if(null==a)return void(e._isValid=!1);if(s[3]){for(t=0,n=is.length;t<n;t++)if(is[t][1].exec(s[3])){
// match[2] should be 'T' or space
o=(s[2]||" ")+is[t][0];break}if(null==o)return void(e._isValid=!1)}if(!r&&null!=o)return void(e._isValid=!1);if(s[4]){if(!ts.exec(s[4]))return void(e._isValid=!1);u="Z"}e._f=a+(o||"")+(u||""),Oe(e)}else e._isValid=!1}
// date from iso format or fallback
function me(e){var t=ss.exec(e._i);null===t?(fe(e),!1===e._isValid&&(delete e._isValid,l.createFromInputFallback(e))):e._d=new Date(+t[1])}function _e(e,t,n,i,s,r,a){
//can't just apply() to create a date:
//http://stackoverflow.com/questions/181348/instantiating-a-javascript-object-by-calling-prototype-constructor-apply
var o=new Date(e,t,n,i,s,r,a);
//the date constructor remaps years 0-99 to 1900-1999
return e<100&&0<=e&&isFinite(o.getFullYear())&&o.setFullYear(e),o}function ye(e){var t=new Date(Date.UTC.apply(null,arguments));
//the Date.UTC function remaps years 0-99 to 1900-1999
return e<100&&0<=e&&isFinite(t.getUTCFullYear())&&t.setUTCFullYear(e),t}
// FORMATTING
// HELPERS
function ge(e){return pe(e)?366:365}function pe(e){return e%4==0&&e%100!=0||e%400==0}
// HOOKS
function ve(){return pe(this.year())}
// start-of-first-week - start-of-year
function we(e,t,n){var// first-week day -- which january is always in the first week (4 for iso, 1 for other)
i=7+t-n,
// first-week day local weekday -- which local weekday is fwd
s;return-((7+ye(e,0,i).getUTCDay()-t)%7)+i-1}
//http://en.wikipedia.org/wiki/ISO_week_date#Calculating_a_date_given_the_year.2C_week_number_and_weekday
function ke(e,t,n,i,s){var r,a,o=1+7*(t-1)+(7+n-i)%7+we(e,i,s),u,l;return l=o<=0?ge(u=e-1)+o:o>ge(e)?(u=e+1,o-ge(e)):(u=e,o),{year:u,dayOfYear:l}}function Me(e,t,n){var i=we(e.year(),t,n),s=Math.floor((e.dayOfYear()-i-1)/7)+1,r,a;return s<1?r=s+Se(a=e.year()-1,t,n):s>Se(e.year(),t,n)?(r=s-Se(e.year(),t,n),a=e.year()+1):(a=e.year(),r=s),{week:r,year:a}}function Se(e,t,n){var i=we(e,t,n),s=we(e+1,t,n);return(ge(e)-i+s)/7}
// Pick the first defined of two or three arguments.
function De(e,t,n){return null!=e?e:null!=t?t:n}function Ye(e){
// hooks is actually the exported moment object
var t=new Date(l.now());return e._useUTC?[t.getUTCFullYear(),t.getUTCMonth(),t.getUTCDate()]:[t.getFullYear(),t.getMonth(),t.getDate()]}
// convert an array to a date.
// the array should mirror the parameters below
// note: all values past the year are optional and will default to the lowest possible value.
// [year, month, day , hour, minute, second, millisecond]
function xe(e){var t,n,i=[],s,r;if(!e._d){
// Default to current date.
// * if no year, month, day of month are given, default to today
// * if day of month is given, default month and year
// * if month is given, default only year
// * if year is given, don't default anything
for(s=Ye(e),
//compute day of the year from weeks and weekdays
e._w&&null==e._a[Ai]&&null==e._a[Ei]&&be(e),
//if the day of the year is set, figure out what it is
e._dayOfYear&&(r=De(e._a[Gi],s[Gi]),e._dayOfYear>ge(r)&&(h(e)._overflowDayOfYear=!0),n=ye(r,0,e._dayOfYear),e._a[Ei]=n.getUTCMonth(),e._a[Ai]=n.getUTCDate()),t=0;t<3&&null==e._a[t];++t)e._a[t]=i[t]=s[t];
// Zero out whatever was not defaulted, including time
for(;t<7;t++)e._a[t]=i[t]=null==e._a[t]?2===t?1:0:e._a[t];
// Check for 24:00:00.000
24===e._a[Vi]&&0===e._a[Ii]&&0===e._a[Ni]&&0===e._a[ji]&&(e._nextDay=!0,e._a[Vi]=0),e._d=(e._useUTC?ye:_e).apply(null,i),
// Apply timezone offset from input. The actual utcOffset can be changed
// with parseZone.
null!=e._tzm&&e._d.setUTCMinutes(e._d.getUTCMinutes()-e._tzm),e._nextDay&&(e._a[Vi]=24)}}function be(e){var t,n,i,s,r,a,o,u;null!=(t=e._w).GG||null!=t.W||null!=t.E?(r=1,a=4,
// TODO: We need to take the current isoWeekYear, but that depends on
// how we interpret now (local, utc, fixed offset). So create
// a now version of current config (take local/utc/offset flags, and
// create now).
n=De(t.GG,e._a[Gi],Me(He(),1,4).year),i=De(t.W,1),((s=De(t.E,1))<1||7<s)&&(u=!0)):(r=e._locale._week.dow,a=e._locale._week.doy,n=De(t.gg,e._a[Gi],Me(He(),r,a).year),i=De(t.w,1),null!=t.d?((
// weekday -- low day numbers are considered next week
s=t.d)<0||6<s)&&(u=!0):null!=t.e?(
// local weekday -- counting starts from begining of week
s=t.e+r,(t.e<0||6<t.e)&&(u=!0)):
// default to begining of week
s=r),i<1||i>Se(n,r,a)?h(e)._overflowWeeks=!0:null!=u?h(e)._overflowWeekday=!0:(o=ke(n,i,s,r,a),e._a[Gi]=o.year,e._dayOfYear=o.dayOfYear)}
// constant that refers to the ISO standard
// date from string and format string
function Oe(e){
// TODO: Move this to another part of the creation flow to prevent circular deps
if(e._f!==l.ISO_8601){e._a=[],h(e).empty=!0;
// This array is used to make a Date, either with `new Date` or `Date.UTC`
var t=""+e._i,n,i,s,r,a,o=t.length,u=0;for(s=B(e._f,e._locale).match(_i)||[],n=0;n<s.length;n++)r=s[n],
// console.log('token', token, 'parsedInput', parsedInput,
//         'regex', getParseRegexForToken(token, config));
(i=(t.match(q(r,e))||[])[0])&&(0<(a=t.substr(0,t.indexOf(i))).length&&h(e).unusedInput.push(a),t=t.slice(t.indexOf(i)+i.length),u+=i.length),
// don't parse if it's not a known token
pi[r]?(i?h(e).empty=!1:h(e).unusedTokens.push(r),ee(r,i,e)):e._strict&&!i&&h(e).unusedTokens.push(r);
// add remaining unparsed input length to the string
h(e).charsLeftOver=o-u,0<t.length&&h(e).unusedInput.push(t),
// clear _12h flag if hour is <= 12
!0===h(e).bigHour&&e._a[Vi]<=12&&0<e._a[Vi]&&(h(e).bigHour=void 0),h(e).parsedDateParts=e._a.slice(0),h(e).meridiem=e._meridiem,
// handle meridiem
e._a[Vi]=Te(e._locale,e._a[Vi],e._meridiem),xe(e),ce(e)}else fe(e)}function Te(e,t,n){var i;return null==n?t:null!=e.meridiemHour?e.meridiemHour(t,n):(null!=e.isPM&&(
// Fallback
(i=e.isPM(n))&&t<12&&(t+=12),i||12!==t||(t=0)),t)}
// date from string and array of format strings
function Pe(e){var t,n,i,s,r;if(0===e._f.length)return h(e).invalidFormat=!0,void(e._d=new Date(NaN));for(s=0;s<e._f.length;s++)r=0,t=f({},e),null!=e._useUTC&&(t._useUTC=e._useUTC),t._f=e._f[s],Oe(t),u(t)&&(
// if there is any input that was not parsed add a penalty for that format
r+=h(t).charsLeftOver,
//or tokens
r+=10*h(t).unusedTokens.length,h(t).score=r,(null==i||r<i)&&(i=r,n=t));a(e,n||t)}function We(e){if(!e._d){var t=F(e._i);e._a=n([t.year,t.month,t.day||t.date,t.hour,t.minute,t.second,t.millisecond],function(e){return e&&parseInt(e,10)}),xe(e)}}function Ce(e){var t=new m(ce(Re(e)));return t._nextDay&&(
// Adding is smart enough around DST
t.add(1,"d"),t._nextDay=void 0),t}function Re(e){var t=e._i,n=e._f;return e._locale=e._locale||R(e._l),null===t||void 0===n&&""===t?i({nullInput:!0}):("string"==typeof t&&(e._i=t=e._locale.preparse(t)),_(t)?new m(ce(t)):(s(n)?Pe(e):n?Oe(e):r(t)?e._d=t:Ue(e),u(e)||(e._d=null),e))}function Ue(e){var t=e._i;void 0===t?e._d=new Date(l.now()):r(t)?e._d=new Date(t.valueOf()):"string"==typeof t?me(e):s(t)?(e._a=n(t.slice(0),function(e){return parseInt(e,10)}),xe(e)):"object"==typeof t?We(e):"number"==typeof t?
// from milliseconds
e._d=new Date(t):l.createFromInputFallback(e)}function Le(e,t,n,i,s){var r={};return"boolean"==typeof n&&(i=n,n=void 0),
// object construction must be done this way.
// https://github.com/moment/moment/issues/1423
r._isAMomentObject=!0,r._useUTC=r._isUTC=s,r._l=n,r._i=e,r._f=t,r._strict=i,Ce(r)}function He(e,t,n,i){return Le(e,t,n,i,!1)}
// Pick a moment m from moments so that m[fn](other) is true for all
// other. This relies on the function fn to be transitive.
//
// moments should either be an array of moment objects or an array, whose
// first element is an array of moment objects.
function Fe(e,t){var n,i;if(1===t.length&&s(t[0])&&(t=t[0]),!t.length)return He();for(n=t[0],i=1;i<t.length;++i)t[i].isValid()&&!t[i][e](n)||(n=t[i]);return n}
// TODO: Use [].sort instead?
function Ge(){var e;return Fe("isBefore",[].slice.call(arguments,0))}function Ee(){var e;return Fe("isAfter",[].slice.call(arguments,0))}function Ae(e){var t=F(e),n=t.year||0,i=t.quarter||0,s=t.month||0,r=t.week||0,a=t.day||0,o=t.hour||0,u=t.minute||0,l=t.second||0,d=t.millisecond||0;
// representation for dateAddRemove
this._milliseconds=+d+1e3*l+// 1000
6e4*u+// 1000 * 60
1e3*o*60*60,//using 1000 * 60 * 60 instead of 36e5 to avoid floating point rounding errors https://github.com/moment/moment/issues/2978
// Because of dateAddRemove treats 24 hours as different from a
// day when working around DST, we need to store them separately
this._days=+a+7*r,
// It is impossible translate months into days without knowing
// which months you are are talking about, so we have to store
// it separately.
this._months=+s+3*i+12*n,this._data={},this._locale=R(),this._bubble()}function Ve(e){return e instanceof Ae}
// FORMATTING
function Ie(e,n){N(e,0,0,function(){var e=this.utcOffset(),t="+";return e<0&&(e=-e,t="-"),t+I(~~(e/60),2)+n+I(~~e%60,2)})}function Ne(e,t){var n=(t||"").match(e)||[],i,s=((n[n.length-1]||[])+"").match(ls)||["-",0,0],r=60*s[1]+g(s[2]);return"+"===s[0]?r:-r}
// Return a moment from input, that is local/utc/zone equivalent to model.
function je(e,t){var n,i;return t._isUTC?(n=t.clone(),i=(_(e)||r(e)?e.valueOf():He(e).valueOf())-n.valueOf(),
// Use low-level api, because this fn is low-level api.
n._d.setTime(n._d.valueOf()+i),l.updateOffset(n,!1),n):He(e).local()}function Ze(e){
// On Firefox.24 Date#getTimezoneOffset returns a floating point.
// https://github.com/moment/moment/pull/1871
return 15*-Math.round(e._d.getTimezoneOffset()/15)}
// HOOKS
// This function will be called whenever a moment is mutated.
// It is intended to keep the offset in sync with the timezone.
// MOMENTS
// keepLocalTime = true means only change the timezone, without
// affecting the local hour. So 5:31:26 +0300 --[utcOffset(2, true)]-->
// 5:31:26 +0200 It is possible that 5:31:26 doesn't exist with offset
// +0200, so we adjust the time as needed, to be valid.
//
// Keeping the time actually adds/subtracts (one hour)
// from the actual represented time. That is why we call updateOffset
// a second time. In case it wants us to change the offset again
// _changeInProgress == true case, then we have to adjust, because
// there is no such time in the given timezone.
function ze(e,t){var n=this._offset||0,i;return this.isValid()?null!=e?("string"==typeof e?e=Ne(Ri,e):Math.abs(e)<16&&(e*=60),!this._isUTC&&t&&(i=Ze(this)),this._offset=e,this._isUTC=!0,null!=i&&this.add(i,"m"),n!==e&&(!t||this._changeInProgress?lt(this,it(e-n,"m"),1,!1):this._changeInProgress||(this._changeInProgress=!0,l.updateOffset(this,!0),this._changeInProgress=null)),this):this._isUTC?n:Ze(this):null!=e?this:NaN}function Be(e,t){return null!=e?("string"!=typeof e&&(e=-e),this.utcOffset(e,t),this):-this.utcOffset()}function $e(e){return this.utcOffset(0,e)}function qe(e){return this._isUTC&&(this.utcOffset(0,e),this._isUTC=!1,e&&this.subtract(Ze(this),"m")),this}function Qe(){return this._tzm?this.utcOffset(this._tzm):"string"==typeof this._i&&this.utcOffset(Ne(Ci,this._i)),this}function Je(e){return!!this.isValid()&&(e=e?He(e).utcOffset():0,(this.utcOffset()-e)%60==0)}function Ke(){return this.utcOffset()>this.clone().month(0).utcOffset()||this.utcOffset()>this.clone().month(5).utcOffset()}function Xe(){if(!c(this._isDSTShifted))return this._isDSTShifted;var e={};if(f(e,this),(e=Re(e))._a){var t=e._isUTC?d(e._a):He(e._a);this._isDSTShifted=this.isValid()&&0<p(e._a,t.toArray())}else this._isDSTShifted=!1;return this._isDSTShifted}function et(){return!!this.isValid()&&!this._isUTC}function tt(){return!!this.isValid()&&this._isUTC}function nt(){return!!this.isValid()&&(this._isUTC&&0===this._offset)}
// ASP.NET json date format regex
function it(e,t){var n=e,
// matching against regexp is expensive, do it on demand
i=null,s,r,a;return Ve(e)?n={ms:e._milliseconds,d:e._days,M:e._months}:"number"==typeof e?(n={},t?n[t]=e:n.milliseconds=e):(i=ds.exec(e))?(s="-"===i[1]?-1:1,n={y:0,d:g(i[Ai])*s,h:g(i[Vi])*s,m:g(i[Ii])*s,s:g(i[Ni])*s,ms:g(i[ji])*s}):(i=hs.exec(e))?(s="-"===i[1]?-1:1,n={y:st(i[2],s),M:st(i[3],s),w:st(i[4],s),d:st(i[5],s),h:st(i[6],s),m:st(i[7],s),s:st(i[8],s)}):null==n?// checks for null or undefined
n={}:"object"==typeof n&&("from"in n||"to"in n)&&(a=at(He(n.from),He(n.to)),(n={}).ms=a.milliseconds,n.M=a.months),r=new Ae(n),Ve(e)&&o(e,"_locale")&&(r._locale=e._locale),r}function st(e,t){
// We'd normally use ~~inp for this, but unfortunately it also
// converts floats to ints.
// inp may be undefined, so careful calling replace on it.
var n=e&&parseFloat(e.replace(",","."));
// apply sign while we're at it
return(isNaN(n)?0:n)*t}function rt(e,t){var n={milliseconds:0,months:0};return n.months=t.month()-e.month()+12*(t.year()-e.year()),e.clone().add(n.months,"M").isAfter(t)&&--n.months,n.milliseconds=+t-+e.clone().add(n.months,"M"),n}function at(e,t){var n;return e.isValid()&&t.isValid()?(t=je(t,e),e.isBefore(t)?n=rt(e,t):((n=rt(t,e)).milliseconds=-n.milliseconds,n.months=-n.months),n):{milliseconds:0,months:0}}function ot(e){return e<0?-1*Math.round(-1*e):Math.round(e)}
// TODO: remove 'name' arg after deprecation is removed
function ut(s,r){return function(e,t){var n,i;
//invert the arguments, but complain about it
return null===t||isNaN(+t)||(k(r,"moment()."+r+"(period, number) is deprecated. Please use moment()."+r+"(number, period)."),i=e,e=t,t=i),lt(this,n=it(e="string"==typeof e?+e:e,t),s),this}}function lt(e,t,n,i){var s=t._milliseconds,r=ot(t._days),a=ot(t._months);e.isValid()&&(i=null==i||i,s&&e._d.setTime(e._d.valueOf()+s*n),r&&A(e,"Date",E(e,"Date")+r*n),a&&ae(e,E(e,"Month")+a*n),i&&l.updateOffset(e,r||a))}function dt(e,t){
// We want to compare the start of today, vs this.
// Getting start-of-today depends on whether we're local/utc/offset or not.
var n=e||He(),i=je(n,this).startOf("day"),s=this.diff(i,"days",!0),r=s<-6?"sameElse":s<-1?"lastWeek":s<0?"lastDay":s<1?"sameDay":s<2?"nextDay":s<7?"nextWeek":"sameElse",a=t&&(M(t[r])?t[r]():t[r]);return this.format(a||this.localeData().calendar(r,this,He(n)))}function ht(){return new m(this)}function ct(e,t){var n=_(e)?e:He(e);return!(!this.isValid()||!n.isValid())&&("millisecond"===(t=H(c(t)?"millisecond":t))?this.valueOf()>n.valueOf():n.valueOf()<this.clone().startOf(t).valueOf())}function ft(e,t){var n=_(e)?e:He(e);return!(!this.isValid()||!n.isValid())&&("millisecond"===(t=H(c(t)?"millisecond":t))?this.valueOf()<n.valueOf():this.clone().endOf(t).valueOf()<n.valueOf())}function mt(e,t,n,i){return("("===(i=i||"()")[0]?this.isAfter(e,n):!this.isBefore(e,n))&&(")"===i[1]?this.isBefore(t,n):!this.isAfter(t,n))}function _t(e,t){var n=_(e)?e:He(e),i;return!(!this.isValid()||!n.isValid())&&("millisecond"===(t=H(t||"millisecond"))?this.valueOf()===n.valueOf():(i=n.valueOf(),this.clone().startOf(t).valueOf()<=i&&i<=this.clone().endOf(t).valueOf()))}function yt(e,t){return this.isSame(e,t)||this.isAfter(e,t)}function gt(e,t){return this.isSame(e,t)||this.isBefore(e,t)}function pt(e,t,n){var i,s,r,a;return this.isValid()&&(i=je(e,this)).isValid()?(s=6e4*(i.utcOffset()-this.utcOffset()),"year"===(t=H(t))||"month"===t||"quarter"===t?(a=vt(this,i),"quarter"===t?a/=3:"year"===t&&(a/=12)):(r=this-i,a="second"===t?r/1e3:// 1000
"minute"===t?r/6e4:// 1000 * 60
"hour"===t?r/36e5:// 1000 * 60 * 60
"day"===t?(r-s)/864e5:// 1000 * 60 * 60 * 24, negate dst
"week"===t?(r-s)/6048e5:// 1000 * 60 * 60 * 24 * 7, negate dst
r),n?a:y(a)):NaN}function vt(e,t){
// difference in months
var n=12*(t.year()-e.year())+(t.month()-e.month()),
// b is in (anchor - 1 month, anchor + 1 month)
i=e.clone().add(n,"months"),s,r;
//check for negative zero, return zero if negative zero
return-(n+(
// linear across the month
r=t-i<0?(t-i)/(i-(s=e.clone().add(n-1,"months"))):(t-i)/((s=e.clone().add(n+1,"months"))-i)))||0}function wt(){return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")}function kt(){var e=this.clone().utc();return 0<e.year()&&e.year()<=9999?M(Date.prototype.toISOString)?this.toDate().toISOString():z(e,"YYYY-MM-DD[T]HH:mm:ss.SSS[Z]"):z(e,"YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]")}function Mt(e){e||(e=this.isUtc()?l.defaultFormatUtc:l.defaultFormat);var t=z(this,e);return this.localeData().postformat(t)}function St(e,t){return this.isValid()&&(_(e)&&e.isValid()||He(e).isValid())?it({to:this,from:e}).locale(this.locale()).humanize(!t):this.localeData().invalidDate()}function Dt(e){return this.from(He(),e)}function Yt(e,t){return this.isValid()&&(_(e)&&e.isValid()||He(e).isValid())?it({from:this,to:e}).locale(this.locale()).humanize(!t):this.localeData().invalidDate()}function xt(e){return this.to(He(),e)}
// If passed a locale key, it will set the locale for this
// instance.  Otherwise, it will return the locale configuration
// variables for this instance.
function bt(e){var t;return void 0===e?this._locale._abbr:(null!=(t=R(e))&&(this._locale=t),this)}function Ot(){return this._locale}function Tt(e){
// the following switch intentionally omits break keywords
// to utilize falling through the cases.
switch(e=H(e)){case"year":this.month(0);
/* falls through */case"quarter":case"month":this.date(1);
/* falls through */case"week":case"isoWeek":case"day":case"date":this.hours(0);
/* falls through */case"hour":this.minutes(0);
/* falls through */case"minute":this.seconds(0);
/* falls through */case"second":this.milliseconds(0)}
// weeks are a special case
return"week"===e&&this.weekday(0),"isoWeek"===e&&this.isoWeekday(1),
// quarters are also special
"quarter"===e&&this.month(3*Math.floor(this.month()/3)),this}function Pt(e){return void 0===(e=H(e))||"millisecond"===e?this:(
// 'date' is an alias for 'day', so it should be considered as such.
"date"===e&&(e="day"),this.startOf(e).add(1,"isoWeek"===e?"week":e).subtract(1,"ms"))}function Wt(){return this._d.valueOf()-6e4*(this._offset||0)}function Ct(){return Math.floor(this.valueOf()/1e3)}function Rt(){return this._offset?new Date(this.valueOf()):this._d}function Ut(){var e=this;return[e.year(),e.month(),e.date(),e.hour(),e.minute(),e.second(),e.millisecond()]}function Lt(){var e=this;return{years:e.year(),months:e.month(),date:e.date(),hours:e.hours(),minutes:e.minutes(),seconds:e.seconds(),milliseconds:e.milliseconds()}}function Ht(){
// new Date(NaN).toJSON() === null
return this.isValid()?this.toISOString():null}function Ft(){return u(this)}function Gt(){return a({},h(this))}function Et(){return h(this).overflow}function At(){return{input:this._i,format:this._f,locale:this._locale,isUTC:this._isUTC,strict:this._strict}}
// FORMATTING
function Vt(e,t){N(0,[e,e.length],0,t)}
// MOMENTS
function It(e){return zt.call(this,e,this.week(),this.weekday(),this.localeData()._week.dow,this.localeData()._week.doy)}function Nt(e){return zt.call(this,e,this.isoWeek(),this.isoWeekday(),1,4)}function jt(){return Se(this.year(),1,4)}function Zt(){var e=this.localeData()._week;return Se(this.year(),e.dow,e.doy)}function zt(e,t,n,i,s){var r;return null==e?Me(this,i,s).year:((r=Se(e,i,s))<t&&(t=r),Bt.call(this,e,t,n,i,s))}function Bt(e,t,n,i,s){var r=ke(e,t,n,i,s),a=ye(r.year,0,r.dayOfYear);return this.year(a.getUTCFullYear()),this.month(a.getUTCMonth()),this.date(a.getUTCDate()),this}
// FORMATTING
// MOMENTS
function $t(e){return null==e?Math.ceil((this.month()+1)/3):this.month(3*(e-1)+this.month()%3)}
// FORMATTING
// HELPERS
// LOCALES
function qt(e){return Me(e,this._week.dow,this._week.doy).week}function Qt(){return this._week.dow}function Jt(){return this._week.doy}
// MOMENTS
function Kt(e){var t=this.localeData().week(this);return null==e?t:this.add(7*(e-t),"d")}function Xt(e){var t=Me(this,1,4).week;return null==e?t:this.add(7*(e-t),"d")}
// FORMATTING
// HELPERS
function en(e,t){return"string"!=typeof e?e:isNaN(e)?"number"==typeof(e=t.weekdaysParse(e))?e:null:parseInt(e,10)}
// LOCALES
function tn(e,t){return s(this._weekdays)?this._weekdays[e.day()]:this._weekdays[this._weekdays.isFormat.test(t)?"format":"standalone"][e.day()]}function nn(e){return this._weekdaysShort[e.day()]}function sn(e){return this._weekdaysMin[e.day()]}function rn(e,t,n){var i,s,r,a=e.toLocaleLowerCase();if(!this._weekdaysParse)for(this._weekdaysParse=[],this._shortWeekdaysParse=[],this._minWeekdaysParse=[],i=0;i<7;++i)r=d([2e3,1]).day(i),this._minWeekdaysParse[i]=this.weekdaysMin(r,"").toLocaleLowerCase(),this._shortWeekdaysParse[i]=this.weekdaysShort(r,"").toLocaleLowerCase(),this._weekdaysParse[i]=this.weekdays(r,"").toLocaleLowerCase();return n?"dddd"===t?-1!==(s=Bi.call(this._weekdaysParse,a))?s:null:"ddd"===t?-1!==(s=Bi.call(this._shortWeekdaysParse,a))?s:null:-1!==(s=Bi.call(this._minWeekdaysParse,a))?s:null:"dddd"===t?-1!==(s=Bi.call(this._weekdaysParse,a))?s:-1!==(s=Bi.call(this._shortWeekdaysParse,a))?s:-1!==(s=Bi.call(this._minWeekdaysParse,a))?s:null:"ddd"===t?-1!==(s=Bi.call(this._shortWeekdaysParse,a))?s:-1!==(s=Bi.call(this._weekdaysParse,a))?s:-1!==(s=Bi.call(this._minWeekdaysParse,a))?s:null:-1!==(s=Bi.call(this._minWeekdaysParse,a))?s:-1!==(s=Bi.call(this._weekdaysParse,a))?s:-1!==(s=Bi.call(this._shortWeekdaysParse,a))?s:null}function an(e,t,n){var i,s,r;if(this._weekdaysParseExact)return rn.call(this,e,t,n);for(this._weekdaysParse||(this._weekdaysParse=[],this._minWeekdaysParse=[],this._shortWeekdaysParse=[],this._fullWeekdaysParse=[]),i=0;i<7;i++){
// test the regex
if(
// make the regex if we don't have it already
s=d([2e3,1]).day(i),n&&!this._fullWeekdaysParse[i]&&(this._fullWeekdaysParse[i]=new RegExp("^"+this.weekdays(s,"").replace(".",".?")+"$","i"),this._shortWeekdaysParse[i]=new RegExp("^"+this.weekdaysShort(s,"").replace(".",".?")+"$","i"),this._minWeekdaysParse[i]=new RegExp("^"+this.weekdaysMin(s,"").replace(".",".?")+"$","i")),this._weekdaysParse[i]||(r="^"+this.weekdays(s,"")+"|^"+this.weekdaysShort(s,"")+"|^"+this.weekdaysMin(s,""),this._weekdaysParse[i]=new RegExp(r.replace(".",""),"i")),n&&"dddd"===t&&this._fullWeekdaysParse[i].test(e))return i;if(n&&"ddd"===t&&this._shortWeekdaysParse[i].test(e))return i;if(n&&"dd"===t&&this._minWeekdaysParse[i].test(e))return i;if(!n&&this._weekdaysParse[i].test(e))return i}}
// MOMENTS
function on(e){if(!this.isValid())return null!=e?this:NaN;var t=this._isUTC?this._d.getUTCDay():this._d.getDay();return null!=e?(e=en(e,this.localeData()),this.add(e-t,"d")):t}function un(e){if(!this.isValid())return null!=e?this:NaN;var t=(this.day()+7-this.localeData()._week.dow)%7;return null==e?t:this.add(e-t,"d")}function ln(e){return this.isValid()?null==e?this.day()||7:this.day(this.day()%7?e:e-7):null!=e?this:NaN;
// behaves the same as moment#day except
// as a getter, returns 7 instead of 0 (1-7 range instead of 0-6)
// as a setter, sunday should belong to the previous week.
}function dn(e){return this._weekdaysParseExact?(o(this,"_weekdaysRegex")||fn.call(this),e?this._weekdaysStrictRegex:this._weekdaysRegex):this._weekdaysStrictRegex&&e?this._weekdaysStrictRegex:this._weekdaysRegex}function hn(e){return this._weekdaysParseExact?(o(this,"_weekdaysRegex")||fn.call(this),e?this._weekdaysShortStrictRegex:this._weekdaysShortRegex):this._weekdaysShortStrictRegex&&e?this._weekdaysShortStrictRegex:this._weekdaysShortRegex}function cn(e){return this._weekdaysParseExact?(o(this,"_weekdaysRegex")||fn.call(this),e?this._weekdaysMinStrictRegex:this._weekdaysMinRegex):this._weekdaysMinStrictRegex&&e?this._weekdaysMinStrictRegex:this._weekdaysMinRegex}function fn(){function e(e,t){return t.length-e.length}var t=[],n=[],i=[],s=[],r,a,o,u,l;for(r=0;r<7;r++)
// make the regex if we don't have it already
a=d([2e3,1]).day(r),o=this.weekdaysMin(a,""),u=this.weekdaysShort(a,""),l=this.weekdays(a,""),t.push(o),n.push(u),i.push(l),s.push(o),s.push(u),s.push(l);
// Sorting makes sure if one weekday (or abbr) is a prefix of another it
// will match the longer piece.
for(t.sort(e),n.sort(e),i.sort(e),s.sort(e),r=0;r<7;r++)n[r]=J(n[r]),i[r]=J(i[r]),s[r]=J(s[r]);this._weekdaysRegex=new RegExp("^("+s.join("|")+")","i"),this._weekdaysShortRegex=this._weekdaysRegex,this._weekdaysMinRegex=this._weekdaysRegex,this._weekdaysStrictRegex=new RegExp("^("+i.join("|")+")","i"),this._weekdaysShortStrictRegex=new RegExp("^("+n.join("|")+")","i"),this._weekdaysMinStrictRegex=new RegExp("^("+t.join("|")+")","i")}
// FORMATTING
// HELPERS
// MOMENTS
function mn(e){var t=Math.round((this.clone().startOf("day")-this.clone().startOf("year"))/864e5)+1;return null==e?t:this.add(e-t,"d")}
// FORMATTING
function _n(){return this.hours()%12||12}function yn(){return this.hours()||24}function gn(e,t){N(e,0,0,function(){return this.localeData().meridiem(this.hours(),this.minutes(),t)})}
// PARSING
function pn(e,t){return t._meridiemParse}
// LOCALES
function vn(e){
// IE8 Quirks Mode & IE7 Standards Mode do not allow accessing strings like arrays
// Using charAt should be more compatible.
return"p"===(e+"").toLowerCase().charAt(0)}function wn(e,t,n){return 11<e?n?"pm":"PM":n?"am":"AM"}
// MOMENTS
// Setting the hour should keep the time, because the user explicitly
// specified which hour he wants. So trying to maintain the same hour (in
// a new timezone) makes sense. Adding/subtracting hours does not follow
// this rule.
function kn(e,t){t[ji]=g(1e3*("0."+e))}
// MOMENTS
function Mn(){return this._isUTC?"UTC":""}function Sn(){return this._isUTC?"Coordinated Universal Time":""}function Dn(e){return He(1e3*e)}function Yn(){return He.apply(null,arguments).parseZone()}function xn(e,t,n){var i=this._calendar[e];return M(i)?i.call(t,n):i}function bn(e){var t=this._longDateFormat[e],n=this._longDateFormat[e.toUpperCase()];return t||!n?t:(this._longDateFormat[e]=n.replace(/MMMM|MM|DD|dddd/g,function(e){return e.slice(1)}),this._longDateFormat[e])}function On(){return this._invalidDate}function Tn(e){return this._ordinal.replace("%d",e)}function Pn(e){return e}function Wn(e,t,n,i){var s=this._relativeTime[n];return M(s)?s(e,t,n,i):s.replace(/%d/i,e)}function Cn(e,t){var n=this._relativeTime[0<e?"future":"past"];return M(n)?n(t):n.replace(/%s/i,t)}function Rn(e,t,n,i){var s=R(),r=d().set(i,t);return s[n](r,e)}function Un(e,t,n){if("number"==typeof e&&(t=e,e=void 0),e=e||"",null!=t)return Rn(e,t,n,"month");var i,s=[];for(i=0;i<12;i++)s[i]=Rn(e,i,n,"month");return s}
// ()
// (5)
// (fmt, 5)
// (fmt)
// (true)
// (true, 5)
// (true, fmt, 5)
// (true, fmt)
function Ln(e,t,n,i){t=("boolean"==typeof e?"number"==typeof t&&(n=t,t=void 0):(t=e,e=!1,"number"==typeof(n=t)&&(n=t,t=void 0)),t||"");var s=R(),r=e?s._week.dow:0,a;if(null!=n)return Rn(t,(n+r)%7,i,"day");var o=[];for(a=0;a<7;a++)o[a]=Rn(t,(a+r)%7,i,"day");return o}function Hn(e,t){return Un(e,t,"months")}function Fn(e,t){return Un(e,t,"monthsShort")}function Gn(e,t,n){return Ln(e,t,n,"weekdays")}function En(e,t,n){return Ln(e,t,n,"weekdaysShort")}function An(e,t,n){return Ln(e,t,n,"weekdaysMin")}function Vn(){var e=this._data;return this._milliseconds=Gs(this._milliseconds),this._days=Gs(this._days),this._months=Gs(this._months),e.milliseconds=Gs(e.milliseconds),e.seconds=Gs(e.seconds),e.minutes=Gs(e.minutes),e.hours=Gs(e.hours),e.months=Gs(e.months),e.years=Gs(e.years),this}function In(e,t,n,i){var s=it(t,n);return e._milliseconds+=i*s._milliseconds,e._days+=i*s._days,e._months+=i*s._months,e._bubble()}
// supports only 2.0-style add(1, 's') or add(duration)
function Nn(e,t){return In(this,e,t,1)}
// supports only 2.0-style subtract(1, 's') or subtract(duration)
function jn(e,t){return In(this,e,t,-1)}function Zn(e){return e<0?Math.floor(e):Math.ceil(e)}function zn(){var e=this._milliseconds,t=this._days,n=this._months,i=this._data,s,r,a,o,u;
// if we have a mix of positive and negative values, bubble down first
// check: https://github.com/moment/moment/issues/2166
return 0<=e&&0<=t&&0<=n||e<=0&&t<=0&&n<=0||(e+=864e5*Zn($n(n)+t),n=t=0),
// The following code bubbles up values, see the tests for
// examples of what that means.
i.milliseconds=e%1e3,s=y(e/1e3),i.seconds=s%60,r=y(s/60),i.minutes=r%60,a=y(r/60),i.hours=a%24,n+=
// convert days to months
u=y(Bn(t+=y(a/24))),t-=Zn($n(u)),
// 12 months -> 1 year
o=y(n/12),n%=12,i.days=t,i.months=n,i.years=o,this}function Bn(e){
// 400 years have 146097 days (taking into account leap year rules)
// 400 years have 12 months === 4800
return 4800*e/146097}function $n(e){
// the reverse of daysToMonths
return 146097*e/4800}function qn(e){var t,n,i=this._milliseconds;if("month"===(e=H(e))||"year"===e)return t=this._days+i/864e5,n=this._months+Bn(t),"month"===e?n:n/12;switch(
// handle milliseconds separately because of floating point math errors (issue #1867)
t=this._days+Math.round($n(this._months)),e){case"week":return t/7+i/6048e5;case"day":return t+i/864e5;case"hour":return 24*t+i/36e5;case"minute":return 1440*t+i/6e4;case"second":return 86400*t+i/1e3;
// Math.floor prevents floating point math errors here
case"millisecond":return Math.floor(864e5*t)+i;default:throw new Error("Unknown unit "+e)}}
// TODO: Use this.as('ms')?
function Qn(){return this._milliseconds+864e5*this._days+this._months%12*2592e6+31536e6*g(this._months/12)}function Jn(e){return function(){return this.as(e)}}function Kn(e){return this[(e=H(e))+"s"]()}function Xn(e){return function(){return this._data[e]}}function ei(){return y(this.days()/7)}
// helper function for moment.fn.from, moment.fn.fromNow, and moment.duration.fn.humanize
function ti(e,t,n,i,s){return s.relativeTime(t||1,!!n,e,i)}function ni(e,t,n){var i=it(e).abs(),s=er(i.as("s")),r=er(i.as("m")),a=er(i.as("h")),o=er(i.as("d")),u=er(i.as("M")),l=er(i.as("y")),d=s<tr.s&&["s",s]||r<=1&&["m"]||r<tr.m&&["mm",r]||a<=1&&["h"]||a<tr.h&&["hh",a]||o<=1&&["d"]||o<tr.d&&["dd",o]||u<=1&&["M"]||u<tr.M&&["MM",u]||l<=1&&["y"]||["yy",l];return d[2]=t,d[3]=0<+e,d[4]=n,ti.apply(null,d)}
// This function allows you to set a threshold for relative time strings
function ii(e,t){return void 0!==tr[e]&&(void 0===t?tr[e]:(tr[e]=t,!0))}function si(e){var t=this.localeData(),n=ni(this,!e,t);return e&&(n=t.pastFuture(+this,n)),t.postformat(n)}function ri(){
// for ISO strings we do not use the normal bubbling rules:
//  * milliseconds bubble up until they become hours
//  * days do not bubble at all
//  * months bubble up until they become years
// This is because there is no context-free conversion between hours and days
// (think of clock changes)
// and also not between days and months (28-31 days per month)
var e=nr(this._milliseconds)/1e3,t=nr(this._days),n=nr(this._months),i,s,r;s=y((
// 3600 seconds -> 60 minutes -> 1 hour
i=y(e/60))/60),e%=60,i%=60;
// inspired by https://github.com/dordille/moment-isoduration/blob/master/moment.isoduration.js
var a=
// 12 months -> 1 year
r=y(n/12),o=n%=12,u=t,l=s,d=i,h=e,c=this.asSeconds();return c?(c<0?"-":"")+"P"+(a?a+"Y":"")+(o?o+"M":"")+(u?u+"D":"")+(l||d||h?"T":"")+(l?l+"H":"")+(d?d+"M":"")+(h?h+"S":""):"P0D"}var ai,oi;oi=Array.prototype.some?Array.prototype.some:function(e){for(var t=Object(this),n=t.length>>>0,i=0;i<n;i++)if(i in t&&e.call(this,t[i],i,t))return!0;return!1};var ui=l.momentProperties=[],li=!1,di={},hi;l.suppressDeprecationWarnings=!1,l.deprecationHandler=null,hi=Object.keys?Object.keys:function(e){var t,n=[];for(t in e)o(e,t)&&n.push(t);return n};
// internal storage for locale config files
var ci={},fi,mi={},_i=/(\[[^\[]*\])|(\\)?([Hh]mm(ss)?|Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Qo?|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|kk?|mm?|ss?|S{1,9}|x|X|zz?|ZZ?|.)/g,yi=/(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,gi={},pi={},vi=/\d/,wi=/\d\d/,ki=/\d{3}/,Mi=/\d{4}/,Si=/[+-]?\d{6}/,Di=/\d\d?/,Yi=/\d\d\d\d?/,xi=/\d\d\d\d\d\d?/,bi=/\d{1,3}/,Oi=/\d{1,4}/,Ti=/[+-]?\d{1,6}/,Pi=/\d+/,Wi=/[+-]?\d+/,Ci=/Z|[+-]\d\d:?\d\d/gi,Ri=/Z|[+-]\d\d(?::?\d\d)?/gi,Ui=/[+-]?\d+(\.\d{1,3})?/,Li=/[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i,Hi={},Fi={},Gi=0,Ei=1,Ai=2,Vi=3,Ii=4,Ni=5,ji=6,Zi=7,zi=8,Bi;Bi=Array.prototype.indexOf?Array.prototype.indexOf:function(e){
// I know
var t;for(t=0;t<this.length;++t)if(this[t]===e)return t;return-1},N("M",["MM",2],"Mo",function(){return this.month()+1}),N("MMM",0,0,function(e){return this.localeData().monthsShort(this,e)}),N("MMMM",0,0,function(e){return this.localeData().months(this,e)}),
// ALIASES
L("month","M"),
// PARSING
$("M",Di),$("MM",Di,wi),$("MMM",function(e,t){return t.monthsShortRegex(e)}),$("MMMM",function(e,t){return t.monthsRegex(e)}),K(["M","MM"],function(e,t){t[Ei]=g(e)-1}),K(["MMM","MMMM"],function(e,t,n,i){var s=n._locale.monthsParse(e,i,n._strict);
// if we didn't find a month name, mark the date as invalid.
null!=s?t[Ei]=s:h(n).invalidMonth=e});
// LOCALES
var $i=/D[oD]?(\[[^\[\]]*\]|\s+)+MMMM?/,qi="January_February_March_April_May_June_July_August_September_October_November_December".split("_"),Qi="Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),Ji=Li,Ki=Li,Xi=/^\s*((?:[+-]\d{6}|\d{4})-(?:\d\d-\d\d|W\d\d-\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?::\d\d(?::\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?/,es=/^\s*((?:[+-]\d{6}|\d{4})(?:\d\d\d\d|W\d\d\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?:\d\d(?:\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?/,ts=/Z|[+-]\d\d(?::?\d\d)?/,ns=[["YYYYYY-MM-DD",/[+-]\d{6}-\d\d-\d\d/],["YYYY-MM-DD",/\d{4}-\d\d-\d\d/],["GGGG-[W]WW-E",/\d{4}-W\d\d-\d/],["GGGG-[W]WW",/\d{4}-W\d\d/,!1],["YYYY-DDD",/\d{4}-\d{3}/],["YYYY-MM",/\d{4}-\d\d/,!1],["YYYYYYMMDD",/[+-]\d{10}/],["YYYYMMDD",/\d{8}/],
// YYYYMM is NOT allowed by the standard
["GGGG[W]WWE",/\d{4}W\d{3}/],["GGGG[W]WW",/\d{4}W\d{2}/,!1],["YYYYDDD",/\d{7}/]],is=[["HH:mm:ss.SSSS",/\d\d:\d\d:\d\d\.\d+/],["HH:mm:ss,SSSS",/\d\d:\d\d:\d\d,\d+/],["HH:mm:ss",/\d\d:\d\d:\d\d/],["HH:mm",/\d\d:\d\d/],["HHmmss.SSSS",/\d\d\d\d\d\d\.\d+/],["HHmmss,SSSS",/\d\d\d\d\d\d,\d+/],["HHmmss",/\d\d\d\d\d\d/],["HHmm",/\d\d\d\d/],["HH",/\d\d/]],ss=/^\/?Date\((\-?\d+)/i;l.createFromInputFallback=w("moment construction falls back to js Date. This is discouraged and will be removed in upcoming major release. Please refer to https://github.com/moment/moment/issues/1407 for more info.",function(e){e._d=new Date(e._i+(e._useUTC?" UTC":""))}),N("Y",0,0,function(){var e=this.year();return e<=9999?""+e:"+"+e}),N(0,["YY",2],0,function(){return this.year()%100}),N(0,["YYYY",4],0,"year"),N(0,["YYYYY",5],0,"year"),N(0,["YYYYYY",6,!0],0,"year"),
// ALIASES
L("year","y"),
// PARSING
$("Y",Wi),$("YY",Di,wi),$("YYYY",Oi,Mi),$("YYYYY",Ti,Si),$("YYYYYY",Ti,Si),K(["YYYYY","YYYYYY"],Gi),K("YYYY",function(e,t){t[Gi]=2===e.length?l.parseTwoDigitYear(e):g(e)}),K("YY",function(e,t){t[Gi]=l.parseTwoDigitYear(e)}),K("Y",function(e,t){t[Gi]=parseInt(e,10)}),l.parseTwoDigitYear=function(e){return g(e)+(68<g(e)?1900:2e3)};
// MOMENTS
var rs=G("FullYear",!0);l.ISO_8601=function(){};var as=w("moment().min is deprecated, use moment.max instead. https://github.com/moment/moment/issues/1548",function(){var e=He.apply(null,arguments);return this.isValid()&&e.isValid()?e<this?this:e:i()}),os=w("moment().max is deprecated, use moment.min instead. https://github.com/moment/moment/issues/1548",function(){var e=He.apply(null,arguments);return this.isValid()&&e.isValid()?this<e?this:e:i()}),us=function(){return Date.now?Date.now():+new Date};Ie("Z",":"),Ie("ZZ",""),
// PARSING
$("Z",Ri),$("ZZ",Ri),K(["Z","ZZ"],function(e,t,n){n._useUTC=!0,n._tzm=Ne(Ri,e)});
// HELPERS
// timezone chunker
// '+10:00' > ['10',  '00']
// '-1530'  > ['-15', '30']
var ls=/([\+\-]|\d\d)/gi;l.updateOffset=function(){};var ds=/^(\-)?(?:(\d*)[. ])?(\d+)\:(\d+)(?:\:(\d+)\.?(\d{3})?\d*)?$/,hs=/^(-)?P(?:(-?[0-9,.]*)Y)?(?:(-?[0-9,.]*)M)?(?:(-?[0-9,.]*)W)?(?:(-?[0-9,.]*)D)?(?:T(?:(-?[0-9,.]*)H)?(?:(-?[0-9,.]*)M)?(?:(-?[0-9,.]*)S)?)?$/;
// from http://docs.closure-library.googlecode.com/git/closure_goog_date_date.js.source.html
// somewhat more in line with 4.4.3.2 2004 spec, but allows decimal anywhere
// and further modified to allow for strings containing both week and day
it.fn=Ae.prototype;var cs=ut(1,"add"),fs=ut(-1,"subtract");l.defaultFormat="YYYY-MM-DDTHH:mm:ssZ",l.defaultFormatUtc="YYYY-MM-DDTHH:mm:ss[Z]";var ms=w("moment().lang() is deprecated. Instead, use moment().localeData() to get the language configuration. Use moment().locale() to change languages.",function(e){return void 0===e?this.localeData():this.locale(e)});N(0,["gg",2],0,function(){return this.weekYear()%100}),N(0,["GG",2],0,function(){return this.isoWeekYear()%100}),Vt("gggg","weekYear"),Vt("ggggg","weekYear"),Vt("GGGG","isoWeekYear"),Vt("GGGGG","isoWeekYear"),
// ALIASES
L("weekYear","gg"),L("isoWeekYear","GG"),
// PARSING
$("G",Wi),$("g",Wi),$("GG",Di,wi),$("gg",Di,wi),$("GGGG",Oi,Mi),$("gggg",Oi,Mi),$("GGGGG",Ti,Si),$("ggggg",Ti,Si),X(["gggg","ggggg","GGGG","GGGGG"],function(e,t,n,i){t[i.substr(0,2)]=g(e)}),X(["gg","GG"],function(e,t,n,i){t[i]=l.parseTwoDigitYear(e)}),N("Q",0,"Qo","quarter"),
// ALIASES
L("quarter","Q"),
// PARSING
$("Q",vi),K("Q",function(e,t){t[Ei]=3*(g(e)-1)}),N("w",["ww",2],"wo","week"),N("W",["WW",2],"Wo","isoWeek"),
// ALIASES
L("week","w"),L("isoWeek","W"),
// PARSING
$("w",Di),$("ww",Di,wi),$("W",Di),$("WW",Di,wi),X(["w","ww","W","WW"],function(e,t,n,i){t[i.substr(0,1)]=g(e)});var _s={dow:0,// Sunday is the first day of the week.
doy:6};N("D",["DD",2],"Do","date"),
// ALIASES
L("date","D"),
// PARSING
$("D",Di),$("DD",Di,wi),$("Do",function(e,t){return e?t._ordinalParse:t._ordinalParseLenient}),K(["D","DD"],Ai),K("Do",function(e,t){t[Ai]=g(e.match(Di)[0],10)});
// MOMENTS
var ys=G("Date",!0);
// FORMATTING
N("d",0,"do","day"),N("dd",0,0,function(e){return this.localeData().weekdaysMin(this,e)}),N("ddd",0,0,function(e){return this.localeData().weekdaysShort(this,e)}),N("dddd",0,0,function(e){return this.localeData().weekdays(this,e)}),N("e",0,0,"weekday"),N("E",0,0,"isoWeekday"),
// ALIASES
L("day","d"),L("weekday","e"),L("isoWeekday","E"),
// PARSING
$("d",Di),$("e",Di),$("E",Di),$("dd",function(e,t){return t.weekdaysMinRegex(e)}),$("ddd",function(e,t){return t.weekdaysShortRegex(e)}),$("dddd",function(e,t){return t.weekdaysRegex(e)}),X(["dd","ddd","dddd"],function(e,t,n,i){var s=n._locale.weekdaysParse(e,i,n._strict);
// if we didn't get a weekday name, mark the date as invalid
null!=s?t.d=s:h(n).invalidWeekday=e}),X(["d","e","E"],function(e,t,n,i){t[i]=g(e)});var gs="Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),ps="Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),vs="Su_Mo_Tu_We_Th_Fr_Sa".split("_"),ws=Li,ks=Li,Ms=Li;N("DDD",["DDDD",3],"DDDo","dayOfYear"),
// ALIASES
L("dayOfYear","DDD"),
// PARSING
$("DDD",bi),$("DDDD",ki),K(["DDD","DDDD"],function(e,t,n){n._dayOfYear=g(e)}),N("H",["HH",2],0,"hour"),N("h",["hh",2],0,_n),N("k",["kk",2],0,yn),N("hmm",0,0,function(){return""+_n.apply(this)+I(this.minutes(),2)}),N("hmmss",0,0,function(){return""+_n.apply(this)+I(this.minutes(),2)+I(this.seconds(),2)}),N("Hmm",0,0,function(){return""+this.hours()+I(this.minutes(),2)}),N("Hmmss",0,0,function(){return""+this.hours()+I(this.minutes(),2)+I(this.seconds(),2)}),gn("a",!0),gn("A",!1),
// ALIASES
L("hour","h"),$("a",pn),$("A",pn),$("H",Di),$("h",Di),$("HH",Di,wi),$("hh",Di,wi),$("hmm",Yi),$("hmmss",xi),$("Hmm",Yi),$("Hmmss",xi),K(["H","HH"],Vi),K(["a","A"],function(e,t,n){n._isPm=n._locale.isPM(e),n._meridiem=e}),K(["h","hh"],function(e,t,n){t[Vi]=g(e),h(n).bigHour=!0}),K("hmm",function(e,t,n){var i=e.length-2;t[Vi]=g(e.substr(0,i)),t[Ii]=g(e.substr(i)),h(n).bigHour=!0}),K("hmmss",function(e,t,n){var i=e.length-4,s=e.length-2;t[Vi]=g(e.substr(0,i)),t[Ii]=g(e.substr(i,2)),t[Ni]=g(e.substr(s)),h(n).bigHour=!0}),K("Hmm",function(e,t,n){var i=e.length-2;t[Vi]=g(e.substr(0,i)),t[Ii]=g(e.substr(i))}),K("Hmmss",function(e,t,n){var i=e.length-4,s=e.length-2;t[Vi]=g(e.substr(0,i)),t[Ii]=g(e.substr(i,2)),t[Ni]=g(e.substr(s))});var Ss=/[ap]\.?m?\.?/i,Ds=G("Hours",!0);
// FORMATTING
N("m",["mm",2],0,"minute"),
// ALIASES
L("minute","m"),
// PARSING
$("m",Di),$("mm",Di,wi),K(["m","mm"],Ii);
// MOMENTS
var Ys=G("Minutes",!1);
// FORMATTING
N("s",["ss",2],0,"second"),
// ALIASES
L("second","s"),
// PARSING
$("s",Di),$("ss",Di,wi),K(["s","ss"],Ni);
// MOMENTS
var xs=G("Seconds",!1),bs;
// FORMATTING
for(N("S",0,0,function(){return~~(this.millisecond()/100)}),N(0,["SS",2],0,function(){return~~(this.millisecond()/10)}),N(0,["SSS",3],0,"millisecond"),N(0,["SSSS",4],0,function(){return 10*this.millisecond()}),N(0,["SSSSS",5],0,function(){return 100*this.millisecond()}),N(0,["SSSSSS",6],0,function(){return 1e3*this.millisecond()}),N(0,["SSSSSSS",7],0,function(){return 1e4*this.millisecond()}),N(0,["SSSSSSSS",8],0,function(){return 1e5*this.millisecond()}),N(0,["SSSSSSSSS",9],0,function(){return 1e6*this.millisecond()}),
// ALIASES
L("millisecond","ms"),
// PARSING
$("S",bi,vi),$("SS",bi,wi),$("SSS",bi,ki),bs="SSSS";bs.length<=9;bs+="S")$(bs,Pi);for(bs="S";bs.length<=9;bs+="S")K(bs,kn);
// MOMENTS
var Os=G("Milliseconds",!1);
// FORMATTING
N("z",0,0,"zoneAbbr"),N("zz",0,0,"zoneName");var Ts=m.prototype;Ts.add=cs,Ts.calendar=dt,Ts.clone=ht,Ts.diff=pt,Ts.endOf=Pt,Ts.format=Mt,Ts.from=St,Ts.fromNow=Dt,Ts.to=Yt,Ts.toNow=xt,Ts.get=V,Ts.invalidAt=Et,Ts.isAfter=ct,Ts.isBefore=ft,Ts.isBetween=mt,Ts.isSame=_t,Ts.isSameOrAfter=yt,Ts.isSameOrBefore=gt,Ts.isValid=Ft,Ts.lang=ms,Ts.locale=bt,Ts.localeData=Ot,Ts.max=os,Ts.min=as,Ts.parsingFlags=Gt,Ts.set=V,Ts.startOf=Tt,Ts.subtract=fs,Ts.toArray=Ut,Ts.toObject=Lt,Ts.toDate=Rt,Ts.toISOString=kt,Ts.toJSON=Ht,Ts.toString=wt,Ts.unix=Ct,Ts.valueOf=Wt,Ts.creationData=At,
// Year
Ts.year=rs,Ts.isLeapYear=ve,
// Week Year
Ts.weekYear=It,Ts.isoWeekYear=Nt,
// Quarter
Ts.quarter=Ts.quarters=$t,
// Month
Ts.month=oe,Ts.daysInMonth=ue,
// Week
Ts.week=Ts.weeks=Kt,Ts.isoWeek=Ts.isoWeeks=Xt,Ts.weeksInYear=Zt,Ts.isoWeeksInYear=jt,
// Day
Ts.date=ys,Ts.day=Ts.days=on,Ts.weekday=un,Ts.isoWeekday=ln,Ts.dayOfYear=mn,
// Hour
Ts.hour=Ts.hours=Ds,
// Minute
Ts.minute=Ts.minutes=Ys,
// Second
Ts.second=Ts.seconds=xs,
// Millisecond
Ts.millisecond=Ts.milliseconds=Os,
// Offset
Ts.utcOffset=ze,Ts.utc=$e,Ts.local=qe,Ts.parseZone=Qe,Ts.hasAlignedHourOffset=Je,Ts.isDST=Ke,Ts.isDSTShifted=Xe,Ts.isLocal=et,Ts.isUtcOffset=tt,Ts.isUtc=nt,Ts.isUTC=nt,
// Timezone
Ts.zoneAbbr=Mn,Ts.zoneName=Sn,
// Deprecations
Ts.dates=w("dates accessor is deprecated. Use date instead.",ys),Ts.months=w("months accessor is deprecated. Use month instead",oe),Ts.years=w("years accessor is deprecated. Use year instead",rs),Ts.zone=w("moment().zone is deprecated, use moment().utcOffset instead. https://github.com/moment/moment/issues/1779",Be);var Ps=Ts,Ws={sameDay:"[Today at] LT",nextDay:"[Tomorrow at] LT",nextWeek:"dddd [at] LT",lastDay:"[Yesterday at] LT",lastWeek:"[Last] dddd [at] LT",sameElse:"L"},Cs={LTS:"h:mm:ss A",LT:"h:mm A",L:"MM/DD/YYYY",LL:"MMMM D, YYYY",LLL:"MMMM D, YYYY h:mm A",LLLL:"dddd, MMMM D, YYYY h:mm A"},Rs="Invalid date",Us="%d",Ls=/\d{1,2}/,Hs={future:"in %s",past:"%s ago",s:"a few seconds",m:"a minute",mm:"%d minutes",h:"an hour",hh:"%d hours",d:"a day",dd:"%d days",M:"a month",MM:"%d months",y:"a year",yy:"%d years"},Fs=x.prototype;Fs._calendar=Ws,Fs.calendar=xn,Fs._longDateFormat=Cs,Fs.longDateFormat=bn,Fs._invalidDate=Rs,Fs.invalidDate=On,Fs._ordinal=Us,Fs.ordinal=Tn,Fs._ordinalParse=Ls,Fs.preparse=Pn,Fs.postformat=Pn,Fs._relativeTime=Hs,Fs.relativeTime=Wn,Fs.pastFuture=Cn,Fs.set=D,
// Month
Fs.months=ne,Fs._months=qi,Fs.monthsShort=ie,Fs._monthsShort=Qi,Fs.monthsParse=re,Fs._monthsRegex=Ki,Fs.monthsRegex=de,Fs._monthsShortRegex=Ji,Fs.monthsShortRegex=le,
// Week
Fs.week=qt,Fs._week=_s,Fs.firstDayOfYear=Jt,Fs.firstDayOfWeek=Qt,
// Day of Week
Fs.weekdays=tn,Fs._weekdays=gs,Fs.weekdaysMin=sn,Fs._weekdaysMin=vs,Fs.weekdaysShort=nn,Fs._weekdaysShort=ps,Fs.weekdaysParse=an,Fs._weekdaysRegex=ws,Fs.weekdaysRegex=dn,Fs._weekdaysShortRegex=ks,Fs.weekdaysShortRegex=hn,Fs._weekdaysMinRegex=Ms,Fs.weekdaysMinRegex=cn,
// Hours
Fs.isPM=vn,Fs._meridiemParse=Ss,Fs.meridiem=wn,P("en",{ordinalParse:/\d{1,2}(th|st|nd|rd)/,ordinal:function(e){var t=e%10,n;return e+(1===g(e%100/10)?"th":1===t?"st":2===t?"nd":3===t?"rd":"th")}}),
// Side effect imports
l.lang=w("moment.lang is deprecated. Use moment.locale instead.",P),l.langData=w("moment.langData is deprecated. Use moment.localeData instead.",R);var Gs=Math.abs,Es=Jn("ms"),As=Jn("s"),Vs=Jn("m"),Is=Jn("h"),Ns=Jn("d"),js=Jn("w"),Zs=Jn("M"),zs=Jn("y"),Bs=Xn("milliseconds"),$s=Xn("seconds"),qs=Xn("minutes"),Qs=Xn("hours"),Js=Xn("days"),Ks=Xn("months"),Xs=Xn("years"),er=Math.round,tr={s:45,// seconds to minute
m:45,// minutes to hour
h:22,// hours to day
d:26,// days to month
M:11},nr=Math.abs,ir=Ae.prototype,sr;return ir.abs=Vn,ir.add=Nn,ir.subtract=jn,ir.as=qn,ir.asMilliseconds=Es,ir.asSeconds=As,ir.asMinutes=Vs,ir.asHours=Is,ir.asDays=Ns,ir.asWeeks=js,ir.asMonths=Zs,ir.asYears=zs,ir.valueOf=Qn,ir._bubble=zn,ir.get=Kn,ir.milliseconds=Bs,ir.seconds=$s,ir.minutes=qs,ir.hours=Qs,ir.days=Js,ir.weeks=ei,ir.months=Ks,ir.years=Xs,ir.humanize=si,ir.toISOString=ri,ir.toString=ri,ir.toJSON=ri,ir.locale=bt,ir.localeData=Ot,
// Deprecations
ir.toIsoString=w("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)",ri),ir.lang=ms,
// Side effect imports
// FORMATTING
N("X",0,0,"unix"),N("x",0,0,"valueOf"),
// PARSING
$("x",Wi),$("X",Ui),K("X",function(e,t,n){n._d=new Date(1e3*parseFloat(e,10))}),K("x",function(e,t,n){n._d=new Date(g(e))}),
// Side effect imports
l.version="2.13.0",e(He),l.fn=Ps,l.min=Ge,l.max=Ee,l.now=us,l.utc=d,l.unix=Dn,l.months=Hn,l.isDate=r,l.locale=P,l.invalid=i,l.duration=it,l.isMoment=_,l.weekdays=Gn,l.parseZone=Yn,l.localeData=R,l.isDuration=Ve,l.monthsShort=Fn,l.weekdaysMin=An,l.defineLocale=W,l.updateLocale=C,l.locales=U,l.weekdaysShort=En,l.normalizeUnits=H,l.relativeTimeThreshold=ii,l.prototype=Ps,l}),function(S){S(function(){function e(){u.hide(),m.hide(),d.hide(),l.fadeIn("fast"),o.css("display","inline-block")}function t(){o.hide(),u.fadeIn("fast"),l.hide(),m.css("display","inline-block"),d.css("display","inline-block")}function n(){c.toggleClass("show-menu"),h.toggleClass("hide-button")}function i(){c.removeClass("show-menu"),h.removeClass("hide-button"),f.fadeIn("fast")}function s(){f.fadeOut("fast")}var r=S(".edit-section"),a=S(".certificate"),o=S(".view-button"),u=S(".view-section"),l=S(".edit-section"),d=S(".edit-button"),h=S("a.toggle-menu"),c=S("header"),f=S(".loader"),m=S(".print-button"),_=S(".nav").find("li").find("a"),y=S("h1.participant-name"),g=window.location.href,p="acf-form",v=g.lastIndexOf(p),w=g.slice(v,g.length),k={valueNames:["list-col-1","list-col-2","list-col-3","list-col-4"]};d.on("click",e),o.on("click",t),m.on("click",function(){window.print()}),w===p&&(a.hide(),r.show(),m.hide(),o.css("display","inline-block"),d.hide()),h.on("click",n),S(document).on("click",function(e){S(e.target).closest("header").length||(c.removeClass("show-menu"),h.removeClass("hide-button"))}),S("form.acf-form input:text").first().focus(),_.on("click",i),S(window).on("dblclick",s),S("a").not(".not-link, .acf-button, .select2-search-choice-close, a.acf-icon").on("click",i);var M=new List("search-list",k)})}(jQuery);