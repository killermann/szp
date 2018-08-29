// OutdatedBrowser.js
//call plugin function after DOM ready
addLoadEvent(function(){
	outdatedBrowser({
		bgColor: '#f25648',
		color: '#ffffff',
		lowerThan: 'transform',
		languagePath: 'https://thesafezoneproject.com/wp-content/themes/szptheme/library/outdatedbrowser/en.html'
	})
});

// Call Outdated Browser
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
// Mobile Menu Show/Hide

function toggleHeight() {
	var status = document.getElementById("hamburger-nav").style.maxHeight;

	if (status == "1000px") {
		document.getElementById("hamburger-nav").style.maxHeight = "0px";
		document.getElementById("mobile-menu").classList.remove('opened');

	} else {
		document.getElementById("hamburger-nav").style.maxHeight = "1000px";
		document.getElementById("mobile-menu").classList.add('opened');
	}
}

function downloadCurriculumModal() {
	var downloadModalStatus = document.getElementById("downloadModal-bg").classList;

	if (downloadModalStatus == "active") {
		document.getElementById("downloadModal-bg").classList.remove('active');
		document.getElementById("downloadModal").classList.remove('active');
	} else {
		document.getElementById("downloadModal-bg").classList.add('active');
		document.getElementById("downloadModal").classList.add('active');
	}
}

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {
	// Google Download Event Tracking
	// var filetypes = /\.(zip|exe|dmg|gdoc|pdf|doc.*|xls.*|ppt.*|mp3|txt|rar|wma|mov|avi|wmv|flv|wav)$/i;
    // var baseHref = '';
    // if (jQuery('base').attr('href') != undefined) baseHref = jQuery('base').attr('href');
	//
    // jQuery('a').on('click', function(event) {
	//       var el = jQuery(this);
	//       var track = true;
	//       var href = (typeof(el.attr('href')) != 'undefined' ) ? el.attr('href') :"";
	//       var isThisDomain = href.match(document.domain.split('.').reverse()[1] + '.' + document.domain.split('.').reverse()[0]);
	//       if (!href.match(/^javascript:/i)) {
	// 	    	var elEv = []; elEv.value=0, elEv.non_i=false;
	// 	        if (href.match(/^mailto\:/i)) {
	// 	          elEv.category = "email";
	// 	          elEv.action = "click";
	// 	          elEv.label = href.replace(/^mailto\:/i, '');
	// 	          elEv.loc = href;
	// 	        }
	// 	        else if (href.match(filetypes)) {
	// 	          var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
	// 	          elEv.category = "download";
	// 	          elEv.action = "click-" + extension[0];
	// 	          elEv.label = href.replace(/ /g,"-");
	// 	          elEv.loc = baseHref + href;
	// 	        }
	// 	        else if (href.match(/^https?\:/i) && !isThisDomain) {
	// 	          elEv.category = "external";
	// 	          elEv.action = "click";
	// 	          elEv.label = href.replace(/^https?\:\/\//i, '');
	// 	          elEv.non_i = true;
	// 	          elEv.loc = href;
	// 	        }
	// 	        else if (href.match(/^tel\:/i)) {
	// 	          elEv.category = "telephone";
	// 	          elEv.action = "click";
	// 	          elEv.label = href.replace(/^tel\:/i, '');
	// 	          elEv.loc = href;
	// 	        }
	// 	        else track = false;
	//
	// 	       	if (track) {
	// 	          _gaq.push(['_trackEvent', elEv.category.toLowerCase(), elEv.action.toLowerCase(), elEv.label.toLowerCase(), elEv.value, elEv.non_i]);
	// 	          if ( el.attr('target') == undefined || el.attr('target').toLowerCase() != '_blank') {
	// 	            setTimeout(function() { location.href = elEv.loc; }, 400);
	// 	            return false;
	// 		  }
	// 		}
	// 	}
    // });


	// Call Tippy
	tippy('.tip', {
		animation: 'perspective',
		arrow: true,
		delay: 200,
		theme: 'light',
		size: 'large',
		placement: 'bottom',
		arrowType:'round',
		distance: 17,
	});

	tippy('.guess-the-present', {
		animation: 'perspective',
		arrow: true,
		arrowType:'round',
		delay: 200,
		theme: 'light',
		html: '#guess-whats-in-the-box',
		interactivity: true,
	})

	$('.sticky').stickybits({
		useStickyClasses: true
	});

	$('.tabs .tab').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.tabs .tab').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

	$('.hrf-title').click(function(){
	   var my_content_id = $(this).attr('data-content-id');
	   $('#' + my_content_id ).slideToggle();
	   $(this).toggleClass(function(){
		  if( $(this).is('.open')){
			  $(this).removeClass('open');
			  return 'closed';
			  removeClass('open');
		  } else if ($(this).is('.closed')){
			  $(this).removeClass('closed');
			  return 'open';
		  } else{
			 return 'open';
		  }
	   });
	}); //.hrf-title click

	$('.accordion').click(function(){
	   var my_content_id = $(this).attr('data-content-id');
	   $('#' + my_content_id ).slideToggle();
	   $(this).toggleClass(function(){
			if( $(this).is('.open')){
				$(this).removeClass('open');
				return 'closed';
				removeClass('open');
			} else if ($(this).is('.closed')){
				$(this).removeClass('closed');
				return 'open';
			}
	   });
	}); //.hrf-title click

}); /* end of as page load scripts */

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
