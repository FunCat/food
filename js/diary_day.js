var maxheight = 0;
$(document).ready(function(){ 	
	$('.added_recipe').css({"width": $(".week_day_d_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_d_block").width() / 3 + "px"});
	$("div.week_day_d_block").each(function() {
		if($(this).height() > maxheight)
			maxheight = $(this).height();
	});

	$("div.week_day_d_block").height(maxheight);
});

