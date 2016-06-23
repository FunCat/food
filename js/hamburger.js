$(document).ready(function(){
	var trigger = $('#hamburger'),
        isClosed = false;

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