var maxheight = 0;
$(document).ready(function(){ 	
	$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$("div.week_day_block").each(function() {
		if($(this).height() > maxheight)
			maxheight = $(this).height();
	});

	$("div.week_day_block").height(maxheight);

	$(".week_day_block").each(function(){
		sp_kkal = 0;
		sp_prot = 0;
		sp_fats = 0;
		sp_carb = 0;
		$(this).children(".added_recipe").each(function(){
			sp_kkal += Number($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text());
			sp_prot += Number($(this).children(".total_kkal_to_eat").children(".tot_prot").text());
			sp_fats += Number($(this).children(".total_kkal_to_eat").children(".tot_fats").text());
			sp_carb += Number($(this).children(".total_kkal_to_eat").children(".tot_carb").text());
		});
		$(this).children(".title_day").children(".avg_kkal").text(sp_kkal);
		$(this).children(".title_day").children(".avg_prot").text(sp_prot);
		$(this).children(".title_day").children(".avg_fats").text(sp_fats);
		$(this).children(".title_day").children(".avg_carboh").text(sp_carb);		
	});
});

