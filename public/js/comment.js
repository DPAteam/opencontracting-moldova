(function () {
    const login = () => {
        const refreshPage = () => {
            window.location.reload();
        };

        const handleLoginInNewWindow = redirectUrl => {
            const currentPageUrl = window.document.URL;
            const win = window.open(`${redirectUrl}?intended-url=${currentPageUrl}`, "Social Login", 'width=800, height=600');

            const pollTimer = window.setInterval(function () {
                try {
                    if (win.document.URL.replace(/[^A-Za-z0-9: \/]/g,'') === currentPageUrl) {
                        window.clearInterval(pollTimer);
                        win.close();
                        refreshPage();
                    }
                } catch (e) {
                }
            }, 500);
        };

        const loginWithFacebook = e => {
            handleLoginInNewWindow('/social/redirect/facebook');
        };

        const loginWithGoogle = e => {
            handleLoginInNewWindow('/social/redirect/google')
        };

        return {
            handle(){
                $('a.facebook-login').on('click', loginWithFacebook);
                $('a.google-login').on('click', loginWithGoogle);
            }
        }
    };

    login().handle();
}());

/*!
	Autosize 3.0.18
	license: MIT
	http://www.jacklmoore.com/autosize
*/
!function(e,t){if("function"==typeof define&&define.amd)define(["exports","module"],t);else if("undefined"!=typeof exports&&"undefined"!=typeof module)t(exports,module);else{var n={exports:{}};t(n.exports,n),e.autosize=n.exports}}(this,function(e,t){"use strict";function n(e){function t(){var t=window.getComputedStyle(e,null);"vertical"===t.resize?e.style.resize="none":"both"===t.resize&&(e.style.resize="horizontal"),l="content-box"===t.boxSizing?-(parseFloat(t.paddingTop)+parseFloat(t.paddingBottom)):parseFloat(t.borderTopWidth)+parseFloat(t.borderBottomWidth),isNaN(l)&&(l=0),s()}function n(t){var n=e.style.width;e.style.width="0px",e.offsetWidth,e.style.width=n,e.style.overflowY=t,r()}function o(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push({node:e.parentNode,scrollTop:e.parentNode.scrollTop}),e=e.parentNode;return t}function r(){var t=e.style.height,n=o(e),r=document.documentElement&&document.documentElement.scrollTop;e.style.height="auto";var i=e.scrollHeight+l;return 0===e.scrollHeight?void(e.style.height=t):(e.style.height=i+"px",u=e.clientWidth,n.forEach(function(e){e.node.scrollTop=e.scrollTop}),void(r&&(document.documentElement.scrollTop=r)))}function s(){r();var t=window.getComputedStyle(e,null),o=Math.round(parseFloat(t.height)),i=Math.round(parseFloat(e.style.height));if(o!==i?"visible"!==t.overflowY&&n("visible"):"hidden"!==t.overflowY&&n("hidden"),a!==o){a=o;var s=d("autosize:resized");try{e.dispatchEvent(s)}catch(l){}}}if(e&&e.nodeName&&"TEXTAREA"===e.nodeName&&!i.has(e)){var l=null,u=e.clientWidth,a=null,c=function(){e.clientWidth!==u&&s()},p=function(t){window.removeEventListener("resize",c,!1),e.removeEventListener("input",s,!1),e.removeEventListener("keyup",s,!1),e.removeEventListener("autosize:destroy",p,!1),e.removeEventListener("autosize:update",s,!1),Object.keys(t).forEach(function(n){e.style[n]=t[n]}),i["delete"](e)}.bind(e,{height:e.style.height,resize:e.style.resize,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",p,!1),"onpropertychange"in e&&"oninput"in e&&e.addEventListener("keyup",s,!1),window.addEventListener("resize",c,!1),e.addEventListener("input",s,!1),e.addEventListener("autosize:update",s,!1),e.style.overflowX="hidden",e.style.wordWrap="break-word",i.set(e,{destroy:p,update:s}),t()}}function o(e){var t=i.get(e);t&&t.destroy()}function r(e){var t=i.get(e);t&&t.update()}var i="function"==typeof Map?new Map:function(){var e=[],t=[];return{has:function(t){return e.indexOf(t)>-1},get:function(n){return t[e.indexOf(n)]},set:function(n,o){-1===e.indexOf(n)&&(e.push(n),t.push(o))},"delete":function(n){var o=e.indexOf(n);o>-1&&(e.splice(o,1),t.splice(o,1))}}}(),d=function(e){return new Event(e)};try{new Event("test")}catch(s){d=function(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!1),t}}var l=null;"undefined"==typeof window||"function"!=typeof window.getComputedStyle?(l=function(e){return e},l.destroy=function(e){return e},l.update=function(e){return e}):(l=function(e,t){return e&&Array.prototype.forEach.call(e.length?e:[e],function(e){return n(e,t)}),e},l.destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],o),e},l.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],r),e}),t.exports=l});
//# sourceMappingURL=comment.js.map
