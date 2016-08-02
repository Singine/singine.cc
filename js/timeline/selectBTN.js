/*
 HTML5 Shiv v3.7.0 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
*/
(function(l,f){function m(){var a=e.elements;return"string"==typeof a?a.split(" "):a}function i(a){var b=n[a[o]];b||(b={},h++,a[o]=h,n[h]=b);return b}function p(a,b,c){b||(b=f);if(g)return b.createElement(a);c||(c=i(b));b=c.cache[a]?c.cache[a].cloneNode():r.test(a)?(c.cache[a]=c.createElem(a)).cloneNode():c.createElem(a);return b.canHaveChildren&&!s.test(a)?c.frag.appendChild(b):b}function t(a,b){if(!b.cache)b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag();
a.createElement=function(c){return!e.shivMethods?b.createElem(c):p(c,a,b)};a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){b.createElem(a);b.frag.createElement(a);return'c("'+a+'")'})+");return n}")(e,b.frag)}function q(a){a||(a=f);var b=i(a);if(e.shivCSS&&!j&&!b.hasCSS){var c,d=a;c=d.createElement("p");d=d.getElementsByTagName("head")[0]||d.documentElement;c.innerHTML="x<style>article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}</style>";
c=d.insertBefore(c.lastChild,d.firstChild);b.hasCSS=!!c}g||t(a,b);return a}var k=l.html5||{},s=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,r=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,j,o="_html5shiv",h=0,n={},g;(function(){try{var a=f.createElement("a");a.innerHTML="<xyz></xyz>";j="hidden"in a;var b;if(!(b=1==a.childNodes.length)){f.createElement("a");var c=f.createDocumentFragment();b="undefined"==typeof c.cloneNode||
"undefined"==typeof c.createDocumentFragment||"undefined"==typeof c.createElement}g=b}catch(d){g=j=!0}})();var e={elements:k.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:"3.7.0",shivCSS:!1!==k.shivCSS,supportsUnknownElements:g,shivMethods:!1!==k.shivMethods,type:"default",shivDocument:q,createElement:p,createDocumentFragment:function(a,b){a||(a=f);
if(g)return a.createDocumentFragment();for(var b=b||i(a),c=b.frag.cloneNode(),d=0,e=m(),h=e.length;d<h;d++)c.createElement(e[d]);return c}};l.html5=e;q(f)})(this,document);

/*js only for demo*/
var wait;
function minidemo(x) {

	$('#addBox').removeClass();
	window.setTimeout( function(){
		$('#addBox').addClass(x);
	}, 1 );

	clearTimeout(wait);
	wait = window.setTimeout( function(){

		$('#addBox').removeClass()}, 1500 );
}
function minidemo2(s) {

	$('#searchBox').removeClass();
	window.setTimeout( function(){
		$('#searchBox').addClass(s);
	}, 1 );

	clearTimeout(wait);
	wait = window.setTimeout( function(){

		$('#searchBox').removeClass()}, 1500 );
}

$(document).ready(function() {
	var count = {
		addState : 0,
		searchState : 0,
		addT : 0,
		searchT : 0,
	};

	$('#addBtn').click(function(){
		if( count.addT == 1){

		}else {
			if ((count.addState || count.searchState) == 0) {
				$('#addBox').fadeIn();
				count.addState = 1;
				count.searchState = 0;
				count.addT = 0;
			} else {
				if (count.addState == 0) {
					$('#searchBox').fadeIn();
					$('#addBox').fadeIn();
					var anim1 = 'swap';
					var anim2 = 'swapOff';
					(function () {
						minidemo(anim1);
						minidemo2(anim2);
					})();

					count.addState = 1;
					count.searchState = 0;
					$('#searchBox').fadeOut();
					count.addT = 0;
				}
			}
			setTimeout(function () {
				count.addT = 0;
			},1000);
		}

	});
	$('#searchBtn').click(function(){
		if( count.searchT == 1){

		}else{
			if((count.addState || count.searchState) == 0){
				$('#searchBox').fadeIn();
				count.addState = 0;
				count.searchState = 1;
				count.searchT = 1;
			}else {
				if (count.searchState == 0) {
					$('#addBox').fadeIn();
					$('#searchBox').fadeIn();
					var anim1 = 'swapOff';
					var anim2 = 'swap';
					(function () {
						minidemo(anim1);
						minidemo2(anim2);
					})();
					count.addState = 0;
					count.searchState = 1;
					$('#addBox').fadeOut();
					count.searchT = 1;
				}
			}

			setTimeout(function () {
				count.searchT = 0;
			},1000);
		}

		});

});