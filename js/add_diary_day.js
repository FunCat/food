$(document).ready(function(){ 	
	$('.start_generate').click(function(){
		document.location.href = 'http://dailyfood.online/php/diary_add_day_menu.php?r=' + $('.diary_count_portion').val();
	});
	$(".added_recipe").click(function(){
		$(".week_day_block").animate({
			opacity: "0"
		}, 700);
	});
});