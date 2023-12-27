function Le(e,t){return function(){return e.apply(t,arguments)}}const{toString:Ke}=Object.prototype,{getPrototypeOf:re}=Object,M=(e=>t=>{const n=Ke.call(t);return e[n]||(e[n]=n.slice(8,-1).toLowerCase())})(Object.create(null)),O=e=>(e=e.toLowerCase(),t=>M(t)===e),v=e=>t=>typeof t===e,{isArray:N}=Array,B=v("undefined");function Ge(e){return e!==null&&!B(e)&&e.constructor!==null&&!B(e.constructor)&&S(e.constructor.isBuffer)&&e.constructor.isBuffer(e)}const xe=O("ArrayBuffer");function Xe(e){let t;return typeof ArrayBuffer<"u"&&ArrayBuffer.isView?t=ArrayBuffer.isView(e):t=e&&e.buffer&&xe(e.buffer),t}const Qe=v("string"),S=v("function"),Ne=v("number"),z=e=>e!==null&&typeof e=="object",Ze=e=>e===!0||e===!1,I=e=>{if(M(e)!=="object")return!1;const t=re(e);return(t===null||t===Object.prototype||Object.getPrototypeOf(t)===null)&&!(Symbol.toStringTag in e)&&!(Symbol.iterator in e)},Ye=O("Date"),et=O("File"),tt=O("Blob"),nt=O("FileList"),rt=e=>z(e)&&S(e.pipe),st=e=>{let t;return e&&(typeof FormData=="function"&&e instanceof FormData||S(e.append)&&((t=M(e))==="formdata"||t==="object"&&S(e.toString)&&e.toString()==="[object FormData]"))},ot=O("URLSearchParams"),it=e=>e.trim?e.trim():e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"");function C(e,t,{allOwnKeys:n=!1}={}){if(e===null||typeof e>"u")return;let r,s;if(typeof e!="object"&&(e=[e]),N(e))for(r=0,s=e.length;r<s;r++)t.call(null,e[r],r,e);else{const o=n?Object.getOwnPropertyNames(e):Object.keys(e),i=o.length;let l;for(r=0;r<i;r++)l=o[r],t.call(null,e[l],l,e)}}function Pe(e,t){t=t.toLowerCase();const n=Object.keys(e);let r=n.length,s;for(;r-- >0;)if(s=n[r],t===s.toLowerCase())return s;return null}const Be=(()=>typeof globalThis<"u"?globalThis:typeof self<"u"?self:typeof window<"u"?window:global)(),Ce=e=>!B(e)&&e!==Be;function X(){const{caseless:e}=Ce(this)&&this||{},t={},n=(r,s)=>{const o=e&&Pe(t,s)||s;I(t[o])&&I(r)?t[o]=X(t[o],r):I(r)?t[o]=X({},r):N(r)?t[o]=r.slice():t[o]=r};for(let r=0,s=arguments.length;r<s;r++)arguments[r]&&C(arguments[r],n);return t}const at=(e,t,n,{allOwnKeys:r}={})=>(C(t,(s,o)=>{n&&S(s)?e[o]=Le(s,n):e[o]=s},{allOwnKeys:r}),e),ct=e=>(e.charCodeAt(0)===65279&&(e=e.slice(1)),e),lt=(e,t,n,r)=>{e.prototype=Object.create(t.prototype,r),e.prototype.constructor=e,Object.defineProperty(e,"super",{value:t.prototype}),n&&Object.assign(e.prototype,n)},ut=(e,t,n,r)=>{let s,o,i;const l={};if(t=t||{},e==null)return t;do{for(s=Object.getOwnPropertyNames(e),o=s.length;o-- >0;)i=s[o],(!r||r(i,e,t))&&!l[i]&&(t[i]=e[i],l[i]=!0);e=n!==!1&&re(e)}while(e&&(!n||n(e,t))&&e!==Object.prototype);return t},dt=(e,t,n)=>{e=String(e),(n===void 0||n>e.length)&&(n=e.length),n-=t.length;const r=e.indexOf(t,n);return r!==-1&&r===n},ft=e=>{if(!e)return null;if(N(e))return e;let t=e.length;if(!Ne(t))return null;const n=new Array(t);for(;t-- >0;)n[t]=e[t];return n},pt=(e=>t=>e&&t instanceof e)(typeof Uint8Array<"u"&&re(Uint8Array)),ht=(e,t)=>{const r=(e&&e[Symbol.iterator]).call(e);let s;for(;(s=r.next())&&!s.done;){const o=s.value;t.call(e,o[0],o[1])}},mt=(e,t)=>{let n;const r=[];for(;(n=e.exec(t))!==null;)r.push(n);return r},yt=O("HTMLFormElement"),Et=e=>e.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g,function(n,r,s){return r.toUpperCase()+s}),le=(({hasOwnProperty:e})=>(t,n)=>e.call(t,n))(Object.prototype),bt=O("RegExp"),ke=(e,t)=>{const n=Object.getOwnPropertyDescriptors(e),r={};C(n,(s,o)=>{let i;(i=t(s,o,e))!==!1&&(r[o]=i||s)}),Object.defineProperties(e,r)},wt=e=>{ke(e,(t,n)=>{if(S(e)&&["arguments","caller","callee"].indexOf(n)!==-1)return!1;const r=e[n];if(S(r)){if(t.enumerable=!1,"writable"in t){t.writable=!1;return}t.set||(t.set=()=>{throw Error("Can not rewrite read-only method '"+n+"'")})}})},St=(e,t)=>{const n={},r=s=>{s.forEach(o=>{n[o]=!0})};return N(e)?r(e):r(String(e).split(t)),n},Rt=()=>{},At=(e,t)=>(e=+e,Number.isFinite(e)?e:t),$="abcdefghijklmnopqrstuvwxyz",ue="0123456789",Fe={DIGIT:ue,ALPHA:$,ALPHA_DIGIT:$+$.toUpperCase()+ue},Ot=(e=16,t=Fe.ALPHA_DIGIT)=>{let n="";const{length:r}=t;for(;e--;)n+=t[Math.random()*r|0];return n};function gt(e){return!!(e&&S(e.append)&&e[Symbol.toStringTag]==="FormData"&&e[Symbol.iterator])}const Tt=e=>{const t=new Array(10),n=(r,s)=>{if(z(r)){if(t.indexOf(r)>=0)return;if(!("toJSON"in r)){t[s]=r;const o=N(r)?[]:{};return C(r,(i,l)=>{const d=n(i,s+1);!B(d)&&(o[l]=d)}),t[s]=void 0,o}}return r};return n(e,0)},Lt=O("AsyncFunction"),xt=e=>e&&(z(e)||S(e))&&S(e.then)&&S(e.catch),a={isArray:N,isArrayBuffer:xe,isBuffer:Ge,isFormData:st,isArrayBufferView:Xe,isString:Qe,isNumber:Ne,isBoolean:Ze,isObject:z,isPlainObject:I,isUndefined:B,isDate:Ye,isFile:et,isBlob:tt,isRegExp:bt,isFunction:S,isStream:rt,isURLSearchParams:ot,isTypedArray:pt,isFileList:nt,forEach:C,merge:X,extend:at,trim:it,stripBOM:ct,inherits:lt,toFlatObject:ut,kindOf:M,kindOfTest:O,endsWith:dt,toArray:ft,forEachEntry:ht,matchAll:mt,isHTMLForm:yt,hasOwnProperty:le,hasOwnProp:le,reduceDescriptors:ke,freezeMethods:wt,toObjectSet:St,toCamelCase:Et,noop:Rt,toFiniteNumber:At,findKey:Pe,global:Be,isContextDefined:Ce,ALPHABET:Fe,generateString:Ot,isSpecCompliantForm:gt,toJSONObject:Tt,isAsyncFn:Lt,isThenable:xt};function m(e,t,n,r,s){Error.call(this),Error.captureStackTrace?Error.captureStackTrace(this,this.constructor):this.stack=new Error().stack,this.message=e,this.name="AxiosError",t&&(this.code=t),n&&(this.config=n),r&&(this.request=r),s&&(this.response=s)}a.inherits(m,Error,{toJSON:function(){return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:a.toJSONObject(this.config),code:this.code,status:this.response&&this.response.status?this.response.status:null}}});const De=m.prototype,_e={};["ERR_BAD_OPTION_VALUE","ERR_BAD_OPTION","ECONNABORTED","ETIMEDOUT","ERR_NETWORK","ERR_FR_TOO_MANY_REDIRECTS","ERR_DEPRECATED","ERR_BAD_RESPONSE","ERR_BAD_REQUEST","ERR_CANCELED","ERR_NOT_SUPPORT","ERR_INVALID_URL"].forEach(e=>{_e[e]={value:e}});Object.defineProperties(m,_e);Object.defineProperty(De,"isAxiosError",{value:!0});m.from=(e,t,n,r,s,o)=>{const i=Object.create(De);return a.toFlatObject(e,i,function(d){return d!==Error.prototype},l=>l!=="isAxiosError"),m.call(i,e.message,t,n,r,s),i.cause=e,i.name=e.name,o&&Object.assign(i,o),i};const Nt=null;function Q(e){return a.isPlainObject(e)||a.isArray(e)}function Ue(e){return a.endsWith(e,"[]")?e.slice(0,-2):e}function de(e,t,n){return e?e.concat(t).map(function(s,o){return s=Ue(s),!n&&o?"["+s+"]":s}).join(n?".":""):t}function Pt(e){return a.isArray(e)&&!e.some(Q)}const Bt=a.toFlatObject(a,{},null,function(t){return/^is[A-Z]/.test(t)});function J(e,t,n){if(!a.isObject(e))throw new TypeError("target must be an object");t=t||new FormData,n=a.toFlatObject(n,{metaTokens:!0,dots:!1,indexes:!1},!1,function(h,w){return!a.isUndefined(w[h])});const r=n.metaTokens,s=n.visitor||c,o=n.dots,i=n.indexes,d=(n.Blob||typeof Blob<"u"&&Blob)&&a.isSpecCompliantForm(t);if(!a.isFunction(s))throw new TypeError("visitor must be a function");function f(u){if(u===null)return"";if(a.isDate(u))return u.toISOString();if(!d&&a.isBlob(u))throw new m("Blob is not supported. Use a Buffer instead.");return a.isArrayBuffer(u)||a.isTypedArray(u)?d&&typeof Blob=="function"?new Blob([u]):Buffer.from(u):u}function c(u,h,w){let g=u;if(u&&!w&&typeof u=="object"){if(a.endsWith(h,"{}"))h=r?h:h.slice(0,-2),u=JSON.stringify(u);else if(a.isArray(u)&&Pt(u)||(a.isFileList(u)||a.endsWith(h,"[]"))&&(g=a.toArray(u)))return h=Ue(h),g.forEach(function(F,Ve){!(a.isUndefined(F)||F===null)&&t.append(i===!0?de([h],Ve,o):i===null?h:h+"[]",f(F))}),!1}return Q(u)?!0:(t.append(de(w,h,o),f(u)),!1)}const p=[],E=Object.assign(Bt,{defaultVisitor:c,convertValue:f,isVisitable:Q});function b(u,h){if(!a.isUndefined(u)){if(p.indexOf(u)!==-1)throw Error("Circular reference detected in "+h.join("."));p.push(u),a.forEach(u,function(g,R){(!(a.isUndefined(g)||g===null)&&s.call(t,g,a.isString(R)?R.trim():R,h,E))===!0&&b(g,h?h.concat(R):[R])}),p.pop()}}if(!a.isObject(e))throw new TypeError("data must be an object");return b(e),t}function fe(e){const t={"!":"%21","'":"%27","(":"%28",")":"%29","~":"%7E","%20":"+","%00":"\0"};return encodeURIComponent(e).replace(/[!'()~]|%20|%00/g,function(r){return t[r]})}function se(e,t){this._pairs=[],e&&J(e,this,t)}const Ie=se.prototype;Ie.append=function(t,n){this._pairs.push([t,n])};Ie.toString=function(t){const n=t?function(r){return t.call(this,r,fe)}:fe;return this._pairs.map(function(s){return n(s[0])+"="+n(s[1])},"").join("&")};function Ct(e){return encodeURIComponent(e).replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}function je(e,t,n){if(!t)return e;const r=n&&n.encode||Ct,s=n&&n.serialize;let o;if(s?o=s(t,n):o=a.isURLSearchParams(t)?t.toString():new se(t,n).toString(r),o){const i=e.indexOf("#");i!==-1&&(e=e.slice(0,i)),e+=(e.indexOf("?")===-1?"?":"&")+o}return e}class kt{constructor(){this.handlers=[]}use(t,n,r){return this.handlers.push({fulfilled:t,rejected:n,synchronous:r?r.synchronous:!1,runWhen:r?r.runWhen:null}),this.handlers.length-1}eject(t){this.handlers[t]&&(this.handlers[t]=null)}clear(){this.handlers&&(this.handlers=[])}forEach(t){a.forEach(this.handlers,function(r){r!==null&&t(r)})}}const pe=kt,He={silentJSONParsing:!0,forcedJSONParsing:!0,clarifyTimeoutError:!1},Ft=typeof URLSearchParams<"u"?URLSearchParams:se,Dt=typeof FormData<"u"?FormData:null,_t=typeof Blob<"u"?Blob:null,Ut=(()=>{let e;return typeof navigator<"u"&&((e=navigator.product)==="ReactNative"||e==="NativeScript"||e==="NS")?!1:typeof window<"u"&&typeof document<"u"})(),It=(()=>typeof WorkerGlobalScope<"u"&&self instanceof WorkerGlobalScope&&typeof self.importScripts=="function")(),A={isBrowser:!0,classes:{URLSearchParams:Ft,FormData:Dt,Blob:_t},isStandardBrowserEnv:Ut,isStandardBrowserWebWorkerEnv:It,protocols:["http","https","file","blob","url","data"]};function jt(e,t){return J(e,new A.classes.URLSearchParams,Object.assign({visitor:function(n,r,s,o){return A.isNode&&a.isBuffer(n)?(this.append(r,n.toString("base64")),!1):o.defaultVisitor.apply(this,arguments)}},t))}function Ht(e){return a.matchAll(/\w+|\[(\w*)]/g,e).map(t=>t[0]==="[]"?"":t[1]||t[0])}function qt(e){const t={},n=Object.keys(e);let r;const s=n.length;let o;for(r=0;r<s;r++)o=n[r],t[o]=e[o];return t}function qe(e){function t(n,r,s,o){let i=n[o++];const l=Number.isFinite(+i),d=o>=n.length;return i=!i&&a.isArray(s)?s.length:i,d?(a.hasOwnProp(s,i)?s[i]=[s[i],r]:s[i]=r,!l):((!s[i]||!a.isObject(s[i]))&&(s[i]=[]),t(n,r,s[i],o)&&a.isArray(s[i])&&(s[i]=qt(s[i])),!l)}if(a.isFormData(e)&&a.isFunction(e.entries)){const n={};return a.forEachEntry(e,(r,s)=>{t(Ht(r),s,n,0)}),n}return null}function Mt(e,t,n){if(a.isString(e))try{return(t||JSON.parse)(e),a.trim(e)}catch(r){if(r.name!=="SyntaxError")throw r}return(n||JSON.stringify)(e)}const oe={transitional:He,adapter:["xhr","http"],transformRequest:[function(t,n){const r=n.getContentType()||"",s=r.indexOf("application/json")>-1,o=a.isObject(t);if(o&&a.isHTMLForm(t)&&(t=new FormData(t)),a.isFormData(t))return s&&s?JSON.stringify(qe(t)):t;if(a.isArrayBuffer(t)||a.isBuffer(t)||a.isStream(t)||a.isFile(t)||a.isBlob(t))return t;if(a.isArrayBufferView(t))return t.buffer;if(a.isURLSearchParams(t))return n.setContentType("application/x-www-form-urlencoded;charset=utf-8",!1),t.toString();let l;if(o){if(r.indexOf("application/x-www-form-urlencoded")>-1)return jt(t,this.formSerializer).toString();if((l=a.isFileList(t))||r.indexOf("multipart/form-data")>-1){const d=this.env&&this.env.FormData;return J(l?{"files[]":t}:t,d&&new d,this.formSerializer)}}return o||s?(n.setContentType("application/json",!1),Mt(t)):t}],transformResponse:[function(t){const n=this.transitional||oe.transitional,r=n&&n.forcedJSONParsing,s=this.responseType==="json";if(t&&a.isString(t)&&(r&&!this.responseType||s)){const i=!(n&&n.silentJSONParsing)&&s;try{return JSON.parse(t)}catch(l){if(i)throw l.name==="SyntaxError"?m.from(l,m.ERR_BAD_RESPONSE,this,null,this.response):l}}return t}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,maxBodyLength:-1,env:{FormData:A.classes.FormData,Blob:A.classes.Blob},validateStatus:function(t){return t>=200&&t<300},headers:{common:{Accept:"application/json, text/plain, */*","Content-Type":void 0}}};a.forEach(["delete","get","head","post","put","patch"],e=>{oe.headers[e]={}});const ie=oe,vt=a.toObjectSet(["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"]),zt=e=>{const t={};let n,r,s;return e&&e.split(`
`).forEach(function(i){s=i.indexOf(":"),n=i.substring(0,s).trim().toLowerCase(),r=i.substring(s+1).trim(),!(!n||t[n]&&vt[n])&&(n==="set-cookie"?t[n]?t[n].push(r):t[n]=[r]:t[n]=t[n]?t[n]+", "+r:r)}),t},he=Symbol("internals");function P(e){return e&&String(e).trim().toLowerCase()}function j(e){return e===!1||e==null?e:a.isArray(e)?e.map(j):String(e)}function Jt(e){const t=Object.create(null),n=/([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;let r;for(;r=n.exec(e);)t[r[1]]=r[2];return t}const Wt=e=>/^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(e.trim());function V(e,t,n,r,s){if(a.isFunction(r))return r.call(this,t,n);if(s&&(t=n),!!a.isString(t)){if(a.isString(r))return t.indexOf(r)!==-1;if(a.isRegExp(r))return r.test(t)}}function $t(e){return e.trim().toLowerCase().replace(/([a-z\d])(\w*)/g,(t,n,r)=>n.toUpperCase()+r)}function Vt(e,t){const n=a.toCamelCase(" "+t);["get","set","has"].forEach(r=>{Object.defineProperty(e,r+n,{value:function(s,o,i){return this[r].call(this,t,s,o,i)},configurable:!0})})}class W{constructor(t){t&&this.set(t)}set(t,n,r){const s=this;function o(l,d,f){const c=P(d);if(!c)throw new Error("header name must be a non-empty string");const p=a.findKey(s,c);(!p||s[p]===void 0||f===!0||f===void 0&&s[p]!==!1)&&(s[p||d]=j(l))}const i=(l,d)=>a.forEach(l,(f,c)=>o(f,c,d));return a.isPlainObject(t)||t instanceof this.constructor?i(t,n):a.isString(t)&&(t=t.trim())&&!Wt(t)?i(zt(t),n):t!=null&&o(n,t,r),this}get(t,n){if(t=P(t),t){const r=a.findKey(this,t);if(r){const s=this[r];if(!n)return s;if(n===!0)return Jt(s);if(a.isFunction(n))return n.call(this,s,r);if(a.isRegExp(n))return n.exec(s);throw new TypeError("parser must be boolean|regexp|function")}}}has(t,n){if(t=P(t),t){const r=a.findKey(this,t);return!!(r&&this[r]!==void 0&&(!n||V(this,this[r],r,n)))}return!1}delete(t,n){const r=this;let s=!1;function o(i){if(i=P(i),i){const l=a.findKey(r,i);l&&(!n||V(r,r[l],l,n))&&(delete r[l],s=!0)}}return a.isArray(t)?t.forEach(o):o(t),s}clear(t){const n=Object.keys(this);let r=n.length,s=!1;for(;r--;){const o=n[r];(!t||V(this,this[o],o,t,!0))&&(delete this[o],s=!0)}return s}normalize(t){const n=this,r={};return a.forEach(this,(s,o)=>{const i=a.findKey(r,o);if(i){n[i]=j(s),delete n[o];return}const l=t?$t(o):String(o).trim();l!==o&&delete n[o],n[l]=j(s),r[l]=!0}),this}concat(...t){return this.constructor.concat(this,...t)}toJSON(t){const n=Object.create(null);return a.forEach(this,(r,s)=>{r!=null&&r!==!1&&(n[s]=t&&a.isArray(r)?r.join(", "):r)}),n}[Symbol.iterator](){return Object.entries(this.toJSON())[Symbol.iterator]()}toString(){return Object.entries(this.toJSON()).map(([t,n])=>t+": "+n).join(`
`)}get[Symbol.toStringTag](){return"AxiosHeaders"}static from(t){return t instanceof this?t:new this(t)}static concat(t,...n){const r=new this(t);return n.forEach(s=>r.set(s)),r}static accessor(t){const r=(this[he]=this[he]={accessors:{}}).accessors,s=this.prototype;function o(i){const l=P(i);r[l]||(Vt(s,i),r[l]=!0)}return a.isArray(t)?t.forEach(o):o(t),this}}W.accessor(["Content-Type","Content-Length","Accept","Accept-Encoding","User-Agent","Authorization"]);a.reduceDescriptors(W.prototype,({value:e},t)=>{let n=t[0].toUpperCase()+t.slice(1);return{get:()=>e,set(r){this[n]=r}}});a.freezeMethods(W);const T=W;function K(e,t){const n=this||ie,r=t||n,s=T.from(r.headers);let o=r.data;return a.forEach(e,function(l){o=l.call(n,o,s.normalize(),t?t.status:void 0)}),s.normalize(),o}function Me(e){return!!(e&&e.__CANCEL__)}function k(e,t,n){m.call(this,e??"canceled",m.ERR_CANCELED,t,n),this.name="CanceledError"}a.inherits(k,m,{__CANCEL__:!0});function Kt(e,t,n){const r=n.config.validateStatus;!n.status||!r||r(n.status)?e(n):t(new m("Request failed with status code "+n.status,[m.ERR_BAD_REQUEST,m.ERR_BAD_RESPONSE][Math.floor(n.status/100)-4],n.config,n.request,n))}const Gt=A.isStandardBrowserEnv?function(){return{write:function(n,r,s,o,i,l){const d=[];d.push(n+"="+encodeURIComponent(r)),a.isNumber(s)&&d.push("expires="+new Date(s).toGMTString()),a.isString(o)&&d.push("path="+o),a.isString(i)&&d.push("domain="+i),l===!0&&d.push("secure"),document.cookie=d.join("; ")},read:function(n){const r=document.cookie.match(new RegExp("(^|;\\s*)("+n+")=([^;]*)"));return r?decodeURIComponent(r[3]):null},remove:function(n){this.write(n,"",Date.now()-864e5)}}}():function(){return{write:function(){},read:function(){return null},remove:function(){}}}();function Xt(e){return/^([a-z][a-z\d+\-.]*:)?\/\//i.test(e)}function Qt(e,t){return t?e.replace(/\/+$/,"")+"/"+t.replace(/^\/+/,""):e}function ve(e,t){return e&&!Xt(t)?Qt(e,t):t}const Zt=A.isStandardBrowserEnv?function(){const t=/(msie|trident)/i.test(navigator.userAgent),n=document.createElement("a");let r;function s(o){let i=o;return t&&(n.setAttribute("href",i),i=n.href),n.setAttribute("href",i),{href:n.href,protocol:n.protocol?n.protocol.replace(/:$/,""):"",host:n.host,search:n.search?n.search.replace(/^\?/,""):"",hash:n.hash?n.hash.replace(/^#/,""):"",hostname:n.hostname,port:n.port,pathname:n.pathname.charAt(0)==="/"?n.pathname:"/"+n.pathname}}return r=s(window.location.href),function(i){const l=a.isString(i)?s(i):i;return l.protocol===r.protocol&&l.host===r.host}}():function(){return function(){return!0}}();function Yt(e){const t=/^([-+\w]{1,25})(:?\/\/|:)/.exec(e);return t&&t[1]||""}function en(e,t){e=e||10;const n=new Array(e),r=new Array(e);let s=0,o=0,i;return t=t!==void 0?t:1e3,function(d){const f=Date.now(),c=r[o];i||(i=f),n[s]=d,r[s]=f;let p=o,E=0;for(;p!==s;)E+=n[p++],p=p%e;if(s=(s+1)%e,s===o&&(o=(o+1)%e),f-i<t)return;const b=c&&f-c;return b?Math.round(E*1e3/b):void 0}}function me(e,t){let n=0;const r=en(50,250);return s=>{const o=s.loaded,i=s.lengthComputable?s.total:void 0,l=o-n,d=r(l),f=o<=i;n=o;const c={loaded:o,total:i,progress:i?o/i:void 0,bytes:l,rate:d||void 0,estimated:d&&i&&f?(i-o)/d:void 0,event:s};c[t?"download":"upload"]=!0,e(c)}}const tn=typeof XMLHttpRequest<"u",nn=tn&&function(e){return new Promise(function(n,r){let s=e.data;const o=T.from(e.headers).normalize(),i=e.responseType;let l;function d(){e.cancelToken&&e.cancelToken.unsubscribe(l),e.signal&&e.signal.removeEventListener("abort",l)}let f;a.isFormData(s)&&(A.isStandardBrowserEnv||A.isStandardBrowserWebWorkerEnv?o.setContentType(!1):o.getContentType(/^\s*multipart\/form-data/)?a.isString(f=o.getContentType())&&o.setContentType(f.replace(/^\s*(multipart\/form-data);+/,"$1")):o.setContentType("multipart/form-data"));let c=new XMLHttpRequest;if(e.auth){const u=e.auth.username||"",h=e.auth.password?unescape(encodeURIComponent(e.auth.password)):"";o.set("Authorization","Basic "+btoa(u+":"+h))}const p=ve(e.baseURL,e.url);c.open(e.method.toUpperCase(),je(p,e.params,e.paramsSerializer),!0),c.timeout=e.timeout;function E(){if(!c)return;const u=T.from("getAllResponseHeaders"in c&&c.getAllResponseHeaders()),w={data:!i||i==="text"||i==="json"?c.responseText:c.response,status:c.status,statusText:c.statusText,headers:u,config:e,request:c};Kt(function(R){n(R),d()},function(R){r(R),d()},w),c=null}if("onloadend"in c?c.onloadend=E:c.onreadystatechange=function(){!c||c.readyState!==4||c.status===0&&!(c.responseURL&&c.responseURL.indexOf("file:")===0)||setTimeout(E)},c.onabort=function(){c&&(r(new m("Request aborted",m.ECONNABORTED,e,c)),c=null)},c.onerror=function(){r(new m("Network Error",m.ERR_NETWORK,e,c)),c=null},c.ontimeout=function(){let h=e.timeout?"timeout of "+e.timeout+"ms exceeded":"timeout exceeded";const w=e.transitional||He;e.timeoutErrorMessage&&(h=e.timeoutErrorMessage),r(new m(h,w.clarifyTimeoutError?m.ETIMEDOUT:m.ECONNABORTED,e,c)),c=null},A.isStandardBrowserEnv){const u=Zt(p)&&e.xsrfCookieName&&Gt.read(e.xsrfCookieName);u&&o.set(e.xsrfHeaderName,u)}s===void 0&&o.setContentType(null),"setRequestHeader"in c&&a.forEach(o.toJSON(),function(h,w){c.setRequestHeader(w,h)}),a.isUndefined(e.withCredentials)||(c.withCredentials=!!e.withCredentials),i&&i!=="json"&&(c.responseType=e.responseType),typeof e.onDownloadProgress=="function"&&c.addEventListener("progress",me(e.onDownloadProgress,!0)),typeof e.onUploadProgress=="function"&&c.upload&&c.upload.addEventListener("progress",me(e.onUploadProgress)),(e.cancelToken||e.signal)&&(l=u=>{c&&(r(!u||u.type?new k(null,e,c):u),c.abort(),c=null)},e.cancelToken&&e.cancelToken.subscribe(l),e.signal&&(e.signal.aborted?l():e.signal.addEventListener("abort",l)));const b=Yt(p);if(b&&A.protocols.indexOf(b)===-1){r(new m("Unsupported protocol "+b+":",m.ERR_BAD_REQUEST,e));return}c.send(s||null)})},Z={http:Nt,xhr:nn};a.forEach(Z,(e,t)=>{if(e){try{Object.defineProperty(e,"name",{value:t})}catch{}Object.defineProperty(e,"adapterName",{value:t})}});const ye=e=>`- ${e}`,rn=e=>a.isFunction(e)||e===null||e===!1,ze={getAdapter:e=>{e=a.isArray(e)?e:[e];const{length:t}=e;let n,r;const s={};for(let o=0;o<t;o++){n=e[o];let i;if(r=n,!rn(n)&&(r=Z[(i=String(n)).toLowerCase()],r===void 0))throw new m(`Unknown adapter '${i}'`);if(r)break;s[i||"#"+o]=r}if(!r){const o=Object.entries(s).map(([l,d])=>`adapter ${l} `+(d===!1?"is not supported by the environment":"is not available in the build"));let i=t?o.length>1?`since :
`+o.map(ye).join(`
`):" "+ye(o[0]):"as no adapter specified";throw new m("There is no suitable adapter to dispatch the request "+i,"ERR_NOT_SUPPORT")}return r},adapters:Z};function G(e){if(e.cancelToken&&e.cancelToken.throwIfRequested(),e.signal&&e.signal.aborted)throw new k(null,e)}function Ee(e){return G(e),e.headers=T.from(e.headers),e.data=K.call(e,e.transformRequest),["post","put","patch"].indexOf(e.method)!==-1&&e.headers.setContentType("application/x-www-form-urlencoded",!1),ze.getAdapter(e.adapter||ie.adapter)(e).then(function(r){return G(e),r.data=K.call(e,e.transformResponse,r),r.headers=T.from(r.headers),r},function(r){return Me(r)||(G(e),r&&r.response&&(r.response.data=K.call(e,e.transformResponse,r.response),r.response.headers=T.from(r.response.headers))),Promise.reject(r)})}const be=e=>e instanceof T?e.toJSON():e;function x(e,t){t=t||{};const n={};function r(f,c,p){return a.isPlainObject(f)&&a.isPlainObject(c)?a.merge.call({caseless:p},f,c):a.isPlainObject(c)?a.merge({},c):a.isArray(c)?c.slice():c}function s(f,c,p){if(a.isUndefined(c)){if(!a.isUndefined(f))return r(void 0,f,p)}else return r(f,c,p)}function o(f,c){if(!a.isUndefined(c))return r(void 0,c)}function i(f,c){if(a.isUndefined(c)){if(!a.isUndefined(f))return r(void 0,f)}else return r(void 0,c)}function l(f,c,p){if(p in t)return r(f,c);if(p in e)return r(void 0,f)}const d={url:o,method:o,data:o,baseURL:i,transformRequest:i,transformResponse:i,paramsSerializer:i,timeout:i,timeoutMessage:i,withCredentials:i,adapter:i,responseType:i,xsrfCookieName:i,xsrfHeaderName:i,onUploadProgress:i,onDownloadProgress:i,decompress:i,maxContentLength:i,maxBodyLength:i,beforeRedirect:i,transport:i,httpAgent:i,httpsAgent:i,cancelToken:i,socketPath:i,responseEncoding:i,validateStatus:l,headers:(f,c)=>s(be(f),be(c),!0)};return a.forEach(Object.keys(Object.assign({},e,t)),function(c){const p=d[c]||s,E=p(e[c],t[c],c);a.isUndefined(E)&&p!==l||(n[c]=E)}),n}const Je="1.6.0",ae={};["object","boolean","number","function","string","symbol"].forEach((e,t)=>{ae[e]=function(r){return typeof r===e||"a"+(t<1?"n ":" ")+e}});const we={};ae.transitional=function(t,n,r){function s(o,i){return"[Axios v"+Je+"] Transitional option '"+o+"'"+i+(r?". "+r:"")}return(o,i,l)=>{if(t===!1)throw new m(s(i," has been removed"+(n?" in "+n:"")),m.ERR_DEPRECATED);return n&&!we[i]&&(we[i]=!0,console.warn(s(i," has been deprecated since v"+n+" and will be removed in the near future"))),t?t(o,i,l):!0}};function sn(e,t,n){if(typeof e!="object")throw new m("options must be an object",m.ERR_BAD_OPTION_VALUE);const r=Object.keys(e);let s=r.length;for(;s-- >0;){const o=r[s],i=t[o];if(i){const l=e[o],d=l===void 0||i(l,o,e);if(d!==!0)throw new m("option "+o+" must be "+d,m.ERR_BAD_OPTION_VALUE);continue}if(n!==!0)throw new m("Unknown option "+o,m.ERR_BAD_OPTION)}}const Y={assertOptions:sn,validators:ae},L=Y.validators;class q{constructor(t){this.defaults=t,this.interceptors={request:new pe,response:new pe}}request(t,n){typeof t=="string"?(n=n||{},n.url=t):n=t||{},n=x(this.defaults,n);const{transitional:r,paramsSerializer:s,headers:o}=n;r!==void 0&&Y.assertOptions(r,{silentJSONParsing:L.transitional(L.boolean),forcedJSONParsing:L.transitional(L.boolean),clarifyTimeoutError:L.transitional(L.boolean)},!1),s!=null&&(a.isFunction(s)?n.paramsSerializer={serialize:s}:Y.assertOptions(s,{encode:L.function,serialize:L.function},!0)),n.method=(n.method||this.defaults.method||"get").toLowerCase();let i=o&&a.merge(o.common,o[n.method]);o&&a.forEach(["delete","get","head","post","put","patch","common"],u=>{delete o[u]}),n.headers=T.concat(i,o);const l=[];let d=!0;this.interceptors.request.forEach(function(h){typeof h.runWhen=="function"&&h.runWhen(n)===!1||(d=d&&h.synchronous,l.unshift(h.fulfilled,h.rejected))});const f=[];this.interceptors.response.forEach(function(h){f.push(h.fulfilled,h.rejected)});let c,p=0,E;if(!d){const u=[Ee.bind(this),void 0];for(u.unshift.apply(u,l),u.push.apply(u,f),E=u.length,c=Promise.resolve(n);p<E;)c=c.then(u[p++],u[p++]);return c}E=l.length;let b=n;for(p=0;p<E;){const u=l[p++],h=l[p++];try{b=u(b)}catch(w){h.call(this,w);break}}try{c=Ee.call(this,b)}catch(u){return Promise.reject(u)}for(p=0,E=f.length;p<E;)c=c.then(f[p++],f[p++]);return c}getUri(t){t=x(this.defaults,t);const n=ve(t.baseURL,t.url);return je(n,t.params,t.paramsSerializer)}}a.forEach(["delete","get","head","options"],function(t){q.prototype[t]=function(n,r){return this.request(x(r||{},{method:t,url:n,data:(r||{}).data}))}});a.forEach(["post","put","patch"],function(t){function n(r){return function(o,i,l){return this.request(x(l||{},{method:t,headers:r?{"Content-Type":"multipart/form-data"}:{},url:o,data:i}))}}q.prototype[t]=n(),q.prototype[t+"Form"]=n(!0)});const H=q;class ce{constructor(t){if(typeof t!="function")throw new TypeError("executor must be a function.");let n;this.promise=new Promise(function(o){n=o});const r=this;this.promise.then(s=>{if(!r._listeners)return;let o=r._listeners.length;for(;o-- >0;)r._listeners[o](s);r._listeners=null}),this.promise.then=s=>{let o;const i=new Promise(l=>{r.subscribe(l),o=l}).then(s);return i.cancel=function(){r.unsubscribe(o)},i},t(function(o,i,l){r.reason||(r.reason=new k(o,i,l),n(r.reason))})}throwIfRequested(){if(this.reason)throw this.reason}subscribe(t){if(this.reason){t(this.reason);return}this._listeners?this._listeners.push(t):this._listeners=[t]}unsubscribe(t){if(!this._listeners)return;const n=this._listeners.indexOf(t);n!==-1&&this._listeners.splice(n,1)}static source(){let t;return{token:new ce(function(s){t=s}),cancel:t}}}const on=ce;function an(e){return function(n){return e.apply(null,n)}}function cn(e){return a.isObject(e)&&e.isAxiosError===!0}const ee={Continue:100,SwitchingProtocols:101,Processing:102,EarlyHints:103,Ok:200,Created:201,Accepted:202,NonAuthoritativeInformation:203,NoContent:204,ResetContent:205,PartialContent:206,MultiStatus:207,AlreadyReported:208,ImUsed:226,MultipleChoices:300,MovedPermanently:301,Found:302,SeeOther:303,NotModified:304,UseProxy:305,Unused:306,TemporaryRedirect:307,PermanentRedirect:308,BadRequest:400,Unauthorized:401,PaymentRequired:402,Forbidden:403,NotFound:404,MethodNotAllowed:405,NotAcceptable:406,ProxyAuthenticationRequired:407,RequestTimeout:408,Conflict:409,Gone:410,LengthRequired:411,PreconditionFailed:412,PayloadTooLarge:413,UriTooLong:414,UnsupportedMediaType:415,RangeNotSatisfiable:416,ExpectationFailed:417,ImATeapot:418,MisdirectedRequest:421,UnprocessableEntity:422,Locked:423,FailedDependency:424,TooEarly:425,UpgradeRequired:426,PreconditionRequired:428,TooManyRequests:429,RequestHeaderFieldsTooLarge:431,UnavailableForLegalReasons:451,InternalServerError:500,NotImplemented:501,BadGateway:502,ServiceUnavailable:503,GatewayTimeout:504,HttpVersionNotSupported:505,VariantAlsoNegotiates:506,InsufficientStorage:507,LoopDetected:508,NotExtended:510,NetworkAuthenticationRequired:511};Object.entries(ee).forEach(([e,t])=>{ee[t]=e});const ln=ee;function We(e){const t=new H(e),n=Le(H.prototype.request,t);return a.extend(n,H.prototype,t,{allOwnKeys:!0}),a.extend(n,t,null,{allOwnKeys:!0}),n.create=function(s){return We(x(e,s))},n}const y=We(ie);y.Axios=H;y.CanceledError=k;y.CancelToken=on;y.isCancel=Me;y.VERSION=Je;y.toFormData=J;y.AxiosError=m;y.Cancel=y.CanceledError;y.all=function(t){return Promise.all(t)};y.spread=an;y.isAxiosError=cn;y.mergeConfig=x;y.AxiosHeaders=T;y.formToJSON=e=>qe(a.isHTMLForm(e)?new FormData(e):e);y.getAdapter=ze.getAdapter;y.HttpStatusCode=ln;y.default=y;const un=y;window.axios=un;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";var Se=document.getElementById("btn-list-walas"),dn=document.getElementById("btn-create-walas"),Re=document.getElementById("listAccWalas"),D=document.getElementById("createAccWalas"),Ae=document.getElementById("btn-list-Bk"),fn=document.getElementById("btn-create-Bk"),Oe=document.getElementById("listAccBk"),_=document.getElementById("createAccBk"),ge=document.getElementById("btn-list-Sekretaris"),pn=document.getElementById("btn-create-Sekretaris"),Te=document.getElementById("listAccSekretaris"),U=document.getElementById("createAccSekretaris"),$e=document.getElementById("sidebarPanel"),te=document.getElementById("sidebarButton"),ne=document.getElementById("sidebarButtonInsidePanel");Se&&(Se.addEventListener("click",function(){Re.classList.remove("hidden"),D.classList.remove("block"),D.classList.add("hidden")}),dn.addEventListener("click",function(){Re.classList.add("hidden"),D.classList.remove("hidden"),D.classList.add("block")}));Ae&&(Ae.addEventListener("click",function(){Oe.classList.remove("hidden"),_.classList.remove("block"),_.classList.add("hidden")}),fn.addEventListener("click",function(){Oe.classList.add("hidden"),_.classList.remove("hidden"),_.classList.add("block")}));ge&&(ge.addEventListener("click",function(){Te.classList.remove("hidden"),U.classList.remove("block"),U.classList.add("hidden")}),pn.addEventListener("click",function(){Te.classList.add("hidden"),U.classList.remove("hidden"),U.classList.add("block")}));ne.addEventListener("click",function(){ne.classList.toggle("hidden"),$e.classList.toggle("hidden"),te.classList.toggle("hidden")});te.addEventListener("click",function(){$e.classList.toggle("hidden"),te.classList.toggle("hidden"),ne.classList.toggle("hidden")});
