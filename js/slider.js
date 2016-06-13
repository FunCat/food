var img = 1;
var buf = 0;
var all = 2;
$(document).ready(function(){
	jQuery.easing.def = "easeOutQuad";
	$('.right_point').click(function(){
		$('.image_slide_'+img).animate({"margin-left": "1200px", "opacity" : "0"}, 1000,  function(){
			$('.image_slide_'+img).removeClass("active");
			buf = img;
			img++;
			if(img > all) img = 1;
			$('.image_slide_'+img).addClass("active");
			$('.image_slide_'+buf).css({"margin-left": "0px", "opacity": "1"});
		});
	});
	$('.left_point').click(function(){
		$('.image_slide_'+img).animate({"margin-left": "-1200px", "opacity" : "0"}, 1000,  function(){
			$('.image_slide_'+img).removeClass("active");
			buf = img;
			img--;
			if(img < 1) img = all;
			$('.image_slide_'+img).addClass("active");
			$('.image_slide_'+buf).css({"margin-left": "0px", "opacity": "1"});
		});
	});
});
