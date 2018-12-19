/**
 * @fileoverview
 * - Using the 'QRCode for Javascript library'
 * - Fixed dataset of 'QRCode for Javascript library' for support full-spec.
 * - this library has no dependencies.
 * 
 * @author davidshimjs
 * @see <a href="http://www.d-project.com/" target="_blank">http://www.d-project.com/</a>
 * @see <a href="http://jeromeetienne.github.com/jquery-qrcode/" target="_blank">http://jeromeetienne.github.com/jquery-qrcode/</a>
 */
var QRCode,QRCode,qrcode_obj;!function(){
//---------------------------------------------------------------------
// QRCode for JavaScript
//
// Copyright (c) 2009 Kazuhiko Arase
//
// URL: http://www.d-project.com/
//
// Licensed under the MIT license:
//   http://www.opensource.org/licenses/mit-license.php
//
// The word "QR Code" is registered trademark of 
// DENSO WAVE INCORPORATED
//   http://www.denso-wave.com/qrcode/faqpatent-e.html
//
//---------------------------------------------------------------------
function r(t){this.mode=n.MODE_8BIT_BYTE,this.data=t,this.parsedData=[];
// Added to support UTF-8 Characters
for(var e=0,r=this.data.length;e<r;e++){var o=[],i=this.data.charCodeAt(e);65536<i?(o[0]=240|(1835008&i)>>>18,o[1]=128|(258048&i)>>>12,o[2]=128|(4032&i)>>>6,o[3]=128|63&i):2048<i?(o[0]=224|(61440&i)>>>12,o[1]=128|(4032&i)>>>6,o[2]=128|63&i):128<i?(o[0]=192|(1984&i)>>>6,o[1]=128|63&i):o[0]=i,this.parsedData.push(o)}this.parsedData=Array.prototype.concat.apply([],this.parsedData),this.parsedData.length!=this.data.length&&(this.parsedData.unshift(191),this.parsedData.unshift(187),this.parsedData.unshift(239))}function h(t,e){this.typeNumber=t,this.errorCorrectLevel=e,this.modules=null,this.moduleCount=0,this.dataCache=null,this.dataList=[]}function _(t,e){if(null==t.length)throw new Error(t.length+"/"+e);for(var r=0;r<t.length&&0==t[r];)r++;this.num=new Array(t.length-r+e);for(var o=0;o<t.length-r;o++)this.num[o]=t[o+r]}function u(t,e){this.totalCount=t,this.dataCount=e}function l(){this.buffer=[],this.length=0}function t(){return"undefined"!=typeof CanvasRenderingContext2D}
// android 2.x doesn't support Data-URI spec
function o(){var t=!1,e=navigator.userAgent;if(/android/i.test(e)){// android
t=!0;var r=e.toString().match(/android ([0-9]\.[0-9])/i);r&&r[1]&&(t=parseFloat(r[1]))}return t}
/**
	 * Get the type by string length
	 * 
	 * @private
	 * @param {String} sText
	 * @param {Number} nCorrectLevel
	 * @return {Number} type
	 */
function e(t,e){for(var r=1,o=s(t),i=0,n=A.length;i<=n;i++){var a=0;switch(e){case f.L:a=A[i][0];break;case f.M:a=A[i][1];break;case f.Q:a=A[i][2];break;case f.H:a=A[i][3];break}if(o<=a)break;r++}if(r>A.length)throw new Error("Too long data");return r}function s(t){var e=encodeURI(t).toString().replace(/\%[0-9a-fA-F]{2}/g,"a");return e.length+(e.length!=t?3:0)}
/**
	 * @class QRCode
	 * @constructor
	 * @example 
	 * new QRCode(document.getElementById("test"), "http://jindo.dev.naver.com/collie");
	 *
	 * @example
	 * var oQRCode = new QRCode("test", {
	 *    text : "http://naver.com",
	 *    width : 128,
	 *    height : 128
	 * });
	 * 
	 * oQRCode.clear(); // Clear the QRCode.
	 * oQRCode.makeCode("http://map.naver.com"); // Re-create the QRCode.
	 *
	 * @param {HTMLElement|String} el target element or 'id' attribute of element.
	 * @param {Object|String} vOption
	 * @param {String} vOption.text QRCode link data
	 * @param {Number} [vOption.width=256]
	 * @param {Number} [vOption.height=256]
	 * @param {String} [vOption.colorDark="#000000"]
	 * @param {String} [vOption.colorLight="#ffffff"]
	 * @param {QRCode.CorrectLevel} [vOption.correctLevel=QRCode.CorrectLevel.H] [L|M|Q|H] 
	 */r.prototype={getLength:function(t){return this.parsedData.length},write:function(t){for(var e=0,r=this.parsedData.length;e<r;e++)t.put(this.parsedData[e],8)}},h.prototype={addData:function(t){var e=new r(t);this.dataList.push(e),this.dataCache=null},isDark:function(t,e){if(t<0||this.moduleCount<=t||e<0||this.moduleCount<=e)throw new Error(t+","+e);return this.modules[t][e]},getModuleCount:function(){return this.moduleCount},make:function(){this.makeImpl(!1,this.getBestMaskPattern())},makeImpl:function(t,e){this.moduleCount=4*this.typeNumber+17,this.modules=new Array(this.moduleCount);for(var r=0;r<this.moduleCount;r++){this.modules[r]=new Array(this.moduleCount);for(var o=0;o<this.moduleCount;o++)this.modules[r][o]=null}this.setupPositionProbePattern(0,0),this.setupPositionProbePattern(this.moduleCount-7,0),this.setupPositionProbePattern(0,this.moduleCount-7),this.setupPositionAdjustPattern(),this.setupTimingPattern(),this.setupTypeInfo(t,e),7<=this.typeNumber&&this.setupTypeNumber(t),null==this.dataCache&&(this.dataCache=h.createData(this.typeNumber,this.errorCorrectLevel,this.dataList)),this.mapData(this.dataCache,e)},setupPositionProbePattern:function(t,e){for(var r=-1;r<=7;r++)if(!(t+r<=-1||this.moduleCount<=t+r))for(var o=-1;o<=7;o++)e+o<=-1||this.moduleCount<=e+o||(this.modules[t+r][e+o]=0<=r&&r<=6&&(0==o||6==o)||0<=o&&o<=6&&(0==r||6==r)||2<=r&&r<=4&&2<=o&&o<=4)},getBestMaskPattern:function(){for(var t=0,e=0,r=0;r<8;r++){this.makeImpl(!0,r);var o=C.getLostPoint(this);(0==r||o<t)&&(t=o,e=r)}return e},createMovieClip:function(t,e,r){var o=t.createEmptyMovieClip(e,r),i=1;this.make();for(var n=0;n<this.modules.length;n++)for(var a=1*n,s=0;s<this.modules[n].length;s++){var h=1*s,l;this.modules[n][s]&&(o.beginFill(0,100),o.moveTo(h,a),o.lineTo(h+1,a),o.lineTo(h+1,a+1),o.lineTo(h,a+1),o.endFill())}return o},setupTimingPattern:function(){for(var t=8;t<this.moduleCount-8;t++)null==this.modules[t][6]&&(this.modules[t][6]=t%2==0);for(var e=8;e<this.moduleCount-8;e++)null==this.modules[6][e]&&(this.modules[6][e]=e%2==0)},setupPositionAdjustPattern:function(){for(var t=C.getPatternPosition(this.typeNumber),e=0;e<t.length;e++)for(var r=0;r<t.length;r++){var o=t[e],i=t[r];if(null==this.modules[o][i])for(var n=-2;n<=2;n++)for(var a=-2;a<=2;a++)this.modules[o+n][i+a]=-2==n||2==n||-2==a||2==a||0==n&&0==a}},setupTypeNumber:function(t){for(var e=C.getBCHTypeNumber(this.typeNumber),r=0;r<18;r++){var o=!t&&1==(e>>r&1);this.modules[Math.floor(r/3)][r%3+this.moduleCount-8-3]=o}for(var r=0;r<18;r++){var o=!t&&1==(e>>r&1);this.modules[r%3+this.moduleCount-8-3][Math.floor(r/3)]=o}},setupTypeInfo:function(t,e){for(var r=this.errorCorrectLevel<<3|e,o=C.getBCHTypeInfo(r),i=0;i<15;i++){var n=!t&&1==(o>>i&1);i<6?this.modules[i][8]=n:i<8?this.modules[i+1][8]=n:this.modules[this.moduleCount-15+i][8]=n}for(var i=0;i<15;i++){var n=!t&&1==(o>>i&1);i<8?this.modules[8][this.moduleCount-i-1]=n:i<9?this.modules[8][15-i-1+1]=n:this.modules[8][15-i-1]=n}this.modules[this.moduleCount-8][8]=!t},mapData:function(t,e){for(var r=-1,o=this.moduleCount-1,i=7,n=0,a=this.moduleCount-1;0<a;a-=2)for(6==a&&a--;;){for(var s=0;s<2;s++)if(null==this.modules[o][a-s]){var h=!1,l;n<t.length&&(h=1==(t[n]>>>i&1)),C.getMask(e,o,a-s)&&(h=!h),this.modules[o][a-s]=h,-1==--i&&(n++,i=7)}if((o+=r)<0||this.moduleCount<=o){o-=r,r=-r;break}}}},h.PAD0=236,h.PAD1=17,h.createData=function(t,e,r){for(var o=u.getRSBlocks(t,e),i=new l,n=0;n<r.length;n++){var a=r[n];i.put(a.mode,4),i.put(a.getLength(),C.getLengthInBits(a.mode,t)),a.write(i)}for(var s=0,n=0;n<o.length;n++)s+=o[n].dataCount;if(i.getLengthInBits()>8*s)throw new Error("code length overflow. ("+i.getLengthInBits()+">"+8*s+")");for(i.getLengthInBits()+4<=8*s&&i.put(0,4);i.getLengthInBits()%8!=0;)i.putBit(!1);for(;!(i.getLengthInBits()>=8*s||(i.put(h.PAD0,8),i.getLengthInBits()>=8*s));)i.put(h.PAD1,8);return h.createBytes(i,o)},h.createBytes=function(t,e){for(var r=0,o=0,i=0,n=new Array(e.length),a=new Array(e.length),s=0;s<e.length;s++){var h=e[s].dataCount,l=e[s].totalCount-h;o=Math.max(o,h),i=Math.max(i,l),n[s]=new Array(h);for(var u=0;u<n[s].length;u++)n[s][u]=255&t.buffer[u+r];r+=h;var f=C.getErrorCorrectPolynomial(l),g,d=new _(n[s],f.getLength()-1).mod(f);a[s]=new Array(f.getLength()-1);for(var u=0;u<a[s].length;u++){var c=u+d.getLength()-a[s].length;a[s][u]=0<=c?d.get(c):0}}for(var p=0,u=0;u<e.length;u++)p+=e[u].totalCount;for(var m=new Array(p),v=0,u=0;u<o;u++)for(var s=0;s<e.length;s++)u<n[s].length&&(m[v++]=n[s][u]);for(var u=0;u<i;u++)for(var s=0;s<e.length;s++)u<a[s].length&&(m[v++]=a[s][u]);return m};for(var n={MODE_NUMBER:1,MODE_ALPHA_NUM:2,MODE_8BIT_BYTE:4,MODE_KANJI:8},f={L:1,M:0,Q:3,H:2},i=0,a=1,g=2,d=3,c=4,p=5,m=6,v=7,C={PATTERN_POSITION_TABLE:[[],[6,18],[6,22],[6,26],[6,30],[6,34],[6,22,38],[6,24,42],[6,26,46],[6,28,50],[6,30,54],[6,32,58],[6,34,62],[6,26,46,66],[6,26,48,70],[6,26,50,74],[6,30,54,78],[6,30,56,82],[6,30,58,86],[6,34,62,90],[6,28,50,72,94],[6,26,50,74,98],[6,30,54,78,102],[6,28,54,80,106],[6,32,58,84,110],[6,30,58,86,114],[6,34,62,90,118],[6,26,50,74,98,122],[6,30,54,78,102,126],[6,26,52,78,104,130],[6,30,56,82,108,134],[6,34,60,86,112,138],[6,30,58,86,114,142],[6,34,62,90,118,146],[6,30,54,78,102,126,150],[6,24,50,76,102,128,154],[6,28,54,80,106,132,158],[6,32,58,84,110,136,162],[6,26,54,82,110,138,166],[6,30,58,86,114,142,170]],G15:1335,G18:7973,G15_MASK:21522,getBCHTypeInfo:function(t){for(var e=t<<10;0<=C.getBCHDigit(e)-C.getBCHDigit(C.G15);)e^=C.G15<<C.getBCHDigit(e)-C.getBCHDigit(C.G15);return(t<<10|e)^C.G15_MASK},getBCHTypeNumber:function(t){for(var e=t<<12;0<=C.getBCHDigit(e)-C.getBCHDigit(C.G18);)e^=C.G18<<C.getBCHDigit(e)-C.getBCHDigit(C.G18);return t<<12|e},getBCHDigit:function(t){for(var e=0;0!=t;)e++,t>>>=1;return e},getPatternPosition:function(t){return C.PATTERN_POSITION_TABLE[t-1]},getMask:function(t,e,r){switch(t){case i:return(e+r)%2==0;case a:return e%2==0;case g:return r%3==0;case d:return(e+r)%3==0;case c:return(Math.floor(e/2)+Math.floor(r/3))%2==0;case p:return e*r%2+e*r%3==0;case m:return(e*r%2+e*r%3)%2==0;case v:return(e*r%3+(e+r)%2)%2==0;default:throw new Error("bad maskPattern:"+t)}},getErrorCorrectPolynomial:function(t){for(var e=new _([1],0),r=0;r<t;r++)e=e.multiply(new _([1,w.gexp(r)],0));return e},getLengthInBits:function(t,e){if(1<=e&&e<10)switch(t){case n.MODE_NUMBER:return 10;case n.MODE_ALPHA_NUM:return 9;case n.MODE_8BIT_BYTE:return 8;case n.MODE_KANJI:return 8;default:throw new Error("mode:"+t)}else if(e<27)switch(t){case n.MODE_NUMBER:return 12;case n.MODE_ALPHA_NUM:return 11;case n.MODE_8BIT_BYTE:return 16;case n.MODE_KANJI:return 10;default:throw new Error("mode:"+t)}else{if(!(e<41))throw new Error("type:"+e);switch(t){case n.MODE_NUMBER:return 14;case n.MODE_ALPHA_NUM:return 13;case n.MODE_8BIT_BYTE:return 16;case n.MODE_KANJI:return 12;default:throw new Error("mode:"+t)}}},getLostPoint:function(t){for(var e=t.getModuleCount(),r=0,o=0;o<e;o++)for(var i=0;i<e;i++){for(var n=0,a=t.isDark(o,i),s=-1;s<=1;s++)if(!(o+s<0||e<=o+s))for(var h=-1;h<=1;h++)i+h<0||e<=i+h||0==s&&0==h||a==t.isDark(o+s,i+h)&&n++;5<n&&(r+=3+n-5)}for(var o=0;o<e-1;o++)for(var i=0;i<e-1;i++){var l=0;t.isDark(o,i)&&l++,t.isDark(o+1,i)&&l++,t.isDark(o,i+1)&&l++,t.isDark(o+1,i+1)&&l++,0!=l&&4!=l||(r+=3)}for(var o=0;o<e;o++)for(var i=0;i<e-6;i++)t.isDark(o,i)&&!t.isDark(o,i+1)&&t.isDark(o,i+2)&&t.isDark(o,i+3)&&t.isDark(o,i+4)&&!t.isDark(o,i+5)&&t.isDark(o,i+6)&&(r+=40);for(var i=0;i<e;i++)for(var o=0;o<e-6;o++)t.isDark(o,i)&&!t.isDark(o+1,i)&&t.isDark(o+2,i)&&t.isDark(o+3,i)&&t.isDark(o+4,i)&&!t.isDark(o+5,i)&&t.isDark(o+6,i)&&(r+=40);for(var u=0,i=0;i<e;i++)for(var o=0;o<e;o++)t.isDark(o,i)&&u++;var f;return r+=10*(Math.abs(100*u/e/e-50)/5)}},w={glog:function(t){if(t<1)throw new Error("glog("+t+")");return w.LOG_TABLE[t]},gexp:function(t){for(;t<0;)t+=255;for(;256<=t;)t-=255;return w.EXP_TABLE[t]},EXP_TABLE:new Array(256),LOG_TABLE:new Array(256)},D=0;D<8;D++)w.EXP_TABLE[D]=1<<D;for(var D=8;D<256;D++)w.EXP_TABLE[D]=w.EXP_TABLE[D-4]^w.EXP_TABLE[D-5]^w.EXP_TABLE[D-6]^w.EXP_TABLE[D-8];for(var D=0;D<255;D++)w.LOG_TABLE[w.EXP_TABLE[D]]=D;_.prototype={get:function(t){return this.num[t]},getLength:function(){return this.num.length},multiply:function(t){for(var e=new Array(this.getLength()+t.getLength()-1),r=0;r<this.getLength();r++)for(var o=0;o<t.getLength();o++)e[r+o]^=w.gexp(w.glog(this.get(r))+w.glog(t.get(o)));return new _(e,0)},mod:function(t){if(this.getLength()-t.getLength()<0)return this;for(var e=w.glog(this.get(0))-w.glog(t.get(0)),r=new Array(this.getLength()),o=0;o<this.getLength();o++)r[o]=this.get(o);for(var o=0;o<t.getLength();o++)r[o]^=w.gexp(w.glog(t.get(o))+e);return new _(r,0).mod(t)}},u.RS_BLOCK_TABLE=[[1,26,19],[1,26,16],[1,26,13],[1,26,9],[1,44,34],[1,44,28],[1,44,22],[1,44,16],[1,70,55],[1,70,44],[2,35,17],[2,35,13],[1,100,80],[2,50,32],[2,50,24],[4,25,9],[1,134,108],[2,67,43],[2,33,15,2,34,16],[2,33,11,2,34,12],[2,86,68],[4,43,27],[4,43,19],[4,43,15],[2,98,78],[4,49,31],[2,32,14,4,33,15],[4,39,13,1,40,14],[2,121,97],[2,60,38,2,61,39],[4,40,18,2,41,19],[4,40,14,2,41,15],[2,146,116],[3,58,36,2,59,37],[4,36,16,4,37,17],[4,36,12,4,37,13],[2,86,68,2,87,69],[4,69,43,1,70,44],[6,43,19,2,44,20],[6,43,15,2,44,16],[4,101,81],[1,80,50,4,81,51],[4,50,22,4,51,23],[3,36,12,8,37,13],[2,116,92,2,117,93],[6,58,36,2,59,37],[4,46,20,6,47,21],[7,42,14,4,43,15],[4,133,107],[8,59,37,1,60,38],[8,44,20,4,45,21],[12,33,11,4,34,12],[3,145,115,1,146,116],[4,64,40,5,65,41],[11,36,16,5,37,17],[11,36,12,5,37,13],[5,109,87,1,110,88],[5,65,41,5,66,42],[5,54,24,7,55,25],[11,36,12],[5,122,98,1,123,99],[7,73,45,3,74,46],[15,43,19,2,44,20],[3,45,15,13,46,16],[1,135,107,5,136,108],[10,74,46,1,75,47],[1,50,22,15,51,23],[2,42,14,17,43,15],[5,150,120,1,151,121],[9,69,43,4,70,44],[17,50,22,1,51,23],[2,42,14,19,43,15],[3,141,113,4,142,114],[3,70,44,11,71,45],[17,47,21,4,48,22],[9,39,13,16,40,14],[3,135,107,5,136,108],[3,67,41,13,68,42],[15,54,24,5,55,25],[15,43,15,10,44,16],[4,144,116,4,145,117],[17,68,42],[17,50,22,6,51,23],[19,46,16,6,47,17],[2,139,111,7,140,112],[17,74,46],[7,54,24,16,55,25],[34,37,13],[4,151,121,5,152,122],[4,75,47,14,76,48],[11,54,24,14,55,25],[16,45,15,14,46,16],[6,147,117,4,148,118],[6,73,45,14,74,46],[11,54,24,16,55,25],[30,46,16,2,47,17],[8,132,106,4,133,107],[8,75,47,13,76,48],[7,54,24,22,55,25],[22,45,15,13,46,16],[10,142,114,2,143,115],[19,74,46,4,75,47],[28,50,22,6,51,23],[33,46,16,4,47,17],[8,152,122,4,153,123],[22,73,45,3,74,46],[8,53,23,26,54,24],[12,45,15,28,46,16],[3,147,117,10,148,118],[3,73,45,23,74,46],[4,54,24,31,55,25],[11,45,15,31,46,16],[7,146,116,7,147,117],[21,73,45,7,74,46],[1,53,23,37,54,24],[19,45,15,26,46,16],[5,145,115,10,146,116],[19,75,47,10,76,48],[15,54,24,25,55,25],[23,45,15,25,46,16],[13,145,115,3,146,116],[2,74,46,29,75,47],[42,54,24,1,55,25],[23,45,15,28,46,16],[17,145,115],[10,74,46,23,75,47],[10,54,24,35,55,25],[19,45,15,35,46,16],[17,145,115,1,146,116],[14,74,46,21,75,47],[29,54,24,19,55,25],[11,45,15,46,46,16],[13,145,115,6,146,116],[14,74,46,23,75,47],[44,54,24,7,55,25],[59,46,16,1,47,17],[12,151,121,7,152,122],[12,75,47,26,76,48],[39,54,24,14,55,25],[22,45,15,41,46,16],[6,151,121,14,152,122],[6,75,47,34,76,48],[46,54,24,10,55,25],[2,45,15,64,46,16],[17,152,122,4,153,123],[29,74,46,14,75,47],[49,54,24,10,55,25],[24,45,15,46,46,16],[4,152,122,18,153,123],[13,74,46,32,75,47],[48,54,24,14,55,25],[42,45,15,32,46,16],[20,147,117,4,148,118],[40,75,47,7,76,48],[43,54,24,22,55,25],[10,45,15,67,46,16],[19,148,118,6,149,119],[18,75,47,31,76,48],[34,54,24,34,55,25],[20,45,15,61,46,16]],u.getRSBlocks=function(t,e){var r=u.getRsBlockTable(t,e);if(null==r)throw new Error("bad rs block @ typeNumber:"+t+"/errorCorrectLevel:"+e);for(var o=r.length/3,i=[],n=0;n<o;n++)for(var a=r[3*n+0],s=r[3*n+1],h=r[3*n+2],l=0;l<a;l++)i.push(new u(s,h));return i},u.getRsBlockTable=function(t,e){switch(e){case f.L:return u.RS_BLOCK_TABLE[4*(t-1)+0];case f.M:return u.RS_BLOCK_TABLE[4*(t-1)+1];case f.Q:return u.RS_BLOCK_TABLE[4*(t-1)+2];case f.H:return u.RS_BLOCK_TABLE[4*(t-1)+3];default:return}},l.prototype={get:function(t){var e=Math.floor(t/8);return 1==(this.buffer[e]>>>7-t%8&1)},put:function(t,e){for(var r=0;r<e;r++)this.putBit(1==(t>>>e-r-1&1))},getLengthInBits:function(){return this.length},putBit:function(t){var e=Math.floor(this.length/8);this.buffer.length<=e&&this.buffer.push(0),t&&(this.buffer[e]|=128>>>this.length%8),this.length++}};var A=[[17,14,11,7],[32,26,20,14],[53,42,32,24],[78,62,46,34],[106,84,60,44],[134,106,74,58],[154,122,86,64],[192,152,108,84],[230,180,130,98],[271,213,151,119],[321,251,177,137],[367,287,203,155],[425,331,241,177],[458,362,258,194],[520,412,292,220],[586,450,322,250],[644,504,364,280],[718,560,394,310],[792,624,442,338],[858,666,482,382],[929,711,509,403],[1003,779,565,439],[1091,857,611,461],[1171,911,661,511],[1273,997,715,535],[1367,1059,751,593],[1465,1125,805,625],[1528,1190,868,658],[1628,1264,908,698],[1732,1370,982,742],[1840,1452,1030,790],[1952,1538,1112,842],[2068,1628,1168,898],[2188,1722,1228,958],[2303,1809,1283,983],[2431,1911,1351,1051],[2563,1989,1423,1093],[2699,2099,1499,1139],[2809,2213,1579,1219],[2953,2331,1663,1273]],L=((E=function(t,e){this._el=t,this._htOption=e}).prototype.draw=function(t){function e(t,e){var r=document.createElementNS("http://www.w3.org/2000/svg",t);for(var o in e)e.hasOwnProperty(o)&&r.setAttribute(o,e[o]);return r}var r=this._htOption,o=this._el,i=t.getModuleCount(),n=Math.floor(r.width/i),a=Math.floor(r.height/i);this.clear();var s=e("svg",{viewBox:"0 0 "+String(i)+" "+String(i),width:"100%",height:"100%",fill:r.colorLight});s.setAttributeNS("http://www.w3.org/2000/xmlns/","xmlns:xlink","http://www.w3.org/1999/xlink"),o.appendChild(s),s.appendChild(e("rect",{fill:r.colorLight,width:"100%",height:"100%"})),s.appendChild(e("rect",{fill:r.colorDark,width:"1",height:"1",id:"template"}));for(var h=0;h<i;h++)for(var l=0;l<i;l++)if(t.isDark(h,l)){var u=e("use",{x:String(l),y:String(h)});u.setAttributeNS("http://www.w3.org/1999/xlink","href","#template"),s.appendChild(u)}},E.prototype.clear=function(){for(;this._el.hasChildNodes();)this._el.removeChild(this._el.lastChild)},E),E,y,B="svg"===document.documentElement.tagName.toLowerCase()?L:t()?function(){// Drawing in Canvas
function t(){this._elImage.src=this._elCanvas.toDataURL("image/png"),this._elImage.style.display="block",this._elCanvas.style.display="none"}
// Android 2.1 bug workaround
// http://code.google.com/p/android/issues/detail?id=5141
/**
		 * Check whether the user's browser supports Data URI or not
		 * 
		 * @private
		 * @param {Function} fSuccess Occurs if it supports Data URI
		 * @param {Function} fFail Occurs if it doesn't support Data URI
		 */
function e(t,e){var r=this;
// Check it just once
if(r._fFail=e,r._fSuccess=t,null===r._bSupportDataURI){var o=document.createElement("img"),i=function(){r._bSupportDataURI=!1,r._fFail&&r._fFail.call(r)},n=function(){r._bSupportDataURI=!0,r._fSuccess&&r._fSuccess.call(r)};// the Image contains 1px data.
return o.onabort=i,o.onerror=i,o.onload=n,void(o.src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==")}!0===r._bSupportDataURI&&r._fSuccess?r._fSuccess.call(r):!1===r._bSupportDataURI&&r._fFail&&r._fFail.call(r)}if(this._android&&this._android<=2.1){var u=1/window.devicePixelRatio,f=CanvasRenderingContext2D.prototype.drawImage;CanvasRenderingContext2D.prototype.drawImage=function(t,e,r,o,i,n,a,s,h){if("nodeName"in t&&/img/i.test(t.nodeName))for(var l=arguments.length-1;1<=l;l--)arguments[l]=arguments[l]*u;else void 0===s&&(e*=u,r*=u,o*=u,i*=u);f.apply(this,arguments)}}
/**
		 * Drawing QRCode by using canvas
		 * 
		 * @constructor
		 * @param {HTMLElement} el
		 * @param {Object} htOption QRCode Options 
		 */
var r=function(t,e){this._bIsPainted=!1,this._android=o(),this._htOption=e,this._elCanvas=document.createElement("canvas"),this._elCanvas.width=e.width,this._elCanvas.height=e.height,t.appendChild(this._elCanvas),this._el=t,this._oContext=this._elCanvas.getContext("2d"),this._bIsPainted=!1,this._elImage=document.createElement("img"),this._elImage.alt="Scan me!",this._elImage.style.display="none",this._el.appendChild(this._elImage),this._bSupportDataURI=null};
/**
		 * Draw the QRCode
		 * 
		 * @param {QRCode} oQRCode 
		 */return r.prototype.draw=function(t){var e=this._elImage,r=this._oContext,o=this._htOption,i=t.getModuleCount(),n=o.width/i,a=o.height/i,s=Math.round(n),h=Math.round(a);e.style.display="none",this.clear();for(var l=0;l<i;l++)for(var u=0;u<i;u++){var f=t.isDark(l,u),g=u*n,d=l*a;r.strokeStyle=f?o.colorDark:o.colorLight,r.lineWidth=1,r.fillStyle=f?o.colorDark:o.colorLight,r.fillRect(g,d,n,a),
// 안티 앨리어싱 방지 처리
r.strokeRect(Math.floor(g)+.5,Math.floor(d)+.5,s,h),r.strokeRect(Math.ceil(g)-.5,Math.ceil(d)-.5,s,h)}this._bIsPainted=!0},
/**
		 * Make the image from Canvas if the browser supports Data URI.
		 */
r.prototype.makeImage=function(){this._bIsPainted&&e.call(this,t)},
/**
		 * Return whether the QRCode is painted or not
		 * 
		 * @return {Boolean}
		 */
r.prototype.isPainted=function(){return this._bIsPainted},
/**
		 * Clear the QRCode
		 */
r.prototype.clear=function(){this._oContext.clearRect(0,0,this._elCanvas.width,this._elCanvas.height),this._bIsPainted=!1},
/**
		 * @private
		 * @param {Number} nNumber
		 */
r.prototype.round=function(t){return t?Math.floor(1e3*t)/1e3:t},r}():(
/**
		 * Draw the QRCode
		 * 
		 * @param {QRCode} oQRCode
		 */
(k=function(t,e){this._el=t,this._htOption=e}).prototype.draw=function(t){for(var e=this._htOption,r=this._el,o=t.getModuleCount(),i=Math.floor(e.width/o),n=Math.floor(e.height/o),a=['<table style="border:0;border-collapse:collapse;">'],s=0;s<o;s++){a.push("<tr>");for(var h=0;h<o;h++)a.push('<td style="border:0;border-collapse:collapse;padding:0;margin:0;width:'+i+"px;height:"+n+"px;background-color:"+(t.isDark(s,h)?e.colorDark:e.colorLight)+';"></td>');a.push("</tr>")}a.push("</table>"),r.innerHTML=a.join("");
// Fix the margin values as real size.
var l=r.childNodes[0],u=(e.width-l.offsetWidth)/2,f=(e.height-l.offsetHeight)/2;0<u&&0<f&&(l.style.margin=f+"px "+u+"px")},
/**
		 * Clear the QRCode
		 */
k.prototype.clear=function(){this._el.innerHTML=""},k),k;
/**
	 * Make the QRCode
	 * 
	 * @param {String} sText link data
	 */
(QRCode=function(t,e){
// Overwrites options
if(this._htOption={width:256,height:256,typeNumber:4,colorDark:"#000000",colorLight:"#ffffff",correctLevel:f.H},"string"==typeof e&&(e={text:e}),e)for(var r in e)this._htOption[r]=e[r];"string"==typeof t&&(t=document.getElementById(t)),this._htOption.useSVG&&(B=L),this._android=o(),this._el=t,this._oQRCode=null,this._oDrawing=new B(this._el,this._htOption),this._htOption.text&&this.makeCode(this._htOption.text)}).prototype.makeCode=function(t){this._oQRCode=new h(e(t,this._htOption.correctLevel),this._htOption.correctLevel),this._oQRCode.addData(t),this._oQRCode.make(),this._el.title=t,this._oDrawing.draw(this._oQRCode),this.makeImage()},
/**
	 * Make the Image from Canvas element
	 * - It occurs automatically
	 * - Android below 3 doesn't support Data-URI spec.
	 * 
	 * @private
	 */
QRCode.prototype.makeImage=function(){"function"==typeof this._oDrawing.makeImage&&(!this._android||3<=this._android)&&this._oDrawing.makeImage()},
/**
	 * Clear the QRCode
	 */
QRCode.prototype.clear=function(){this._oDrawing.clear()},
/**
	 * @name QRCode.CorrectLevel
	 */
QRCode.CorrectLevel=f}(),function(){var t,e=document.getElementById("the-certificate").dataset.certificateId,r=document.getElementById("qr-code");new QRCode(r,{text:qrcode_obj.qr_url+"?certificateId="+e,width:110,height:110,colorDark:"#000000",colorLight:"#ffffff",correctLevel:QRCode.CorrectLevel.H})}();