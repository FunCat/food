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
	


	var trigger = $('#hamburger'),
        isClosed = true;

    trigger.click(function () {
      burgerTime();
    });

    function burgerTime() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
        $('.list_menu').css({
    		"margin-left" : "-600px",
    	});
         setTimeout(menuOut, 350);
       
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
        $(".block_menu").css({
        	"width": "300px",
        	"border-right": "5px solid white"
        });
        $("#hamburger").css({
        	"margin-left": "110px",
        });
        setTimeout(menuIn, 350);

      }
    }

    function menuIn(){
    	$('.list_menu').css({
    		"margin-left" : "0px",
    	});
    }
    function menuOut(){
    	 $(".block_menu").css({
        	"width": "0px",
        	"border-right": "0px solid white"
        });
		$("#hamburger").css({
        	"margin-left": "0px",
        });
    }

});
