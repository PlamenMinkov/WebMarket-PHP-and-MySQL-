/*
 * 
 * Part of article How to detect screen size and apply a CSS style
 * http://www.ilovecolors.com.ar/detect-screen-size-css-style/
 *
 */
var type="";
$(document).ready(function() {

	if ((screen.width>=1024) && (screen.width<1280))
	{
		$("link[rel=stylesheet]:not(:first)").attr({href : "styles/Over1024.css"});
		
	}
	if(screen.width>=1280)
	{
		$("link[rel=stylesheet]:not(:first)").attr({href : "styles/Over1280.css"});
		
	}
	if(screen.width>=800&&screen.width<1024) {
	$("link[rel=stylesheet]:not(:first)").attr({href : "styles/Over800.css"});
	}
	switch(type){
	case "Blind":$(".nav-list1").addClass("blindirani");break;
	case "Interior":$("#inter").addClass("interiorni");break;
	case "Garg":$("#garg").addClass("garajni");break;
	}
});

