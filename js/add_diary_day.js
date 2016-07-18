var priem_count = 0;
var id_rec = [];
var time_rec = [];
var kkal_rec= [];
$(document).ready(function(){ 	
	$(".end_priem").parent().hide();
	$(".diary_name").parent().hide();
	$(".week_day_block").hide();
	$('.start_generate').click(function(){
		document.location.href = 'http://dailyfood.online/php/diary_add_day_menu.php?r=' + $('.diary_count_portion').val();
	});
	$(".added_recipe").click(function(){
		id_rec.push($(this).children(".rec_id").text());
		kkal_rec.push((parseFloat($(this).children(".total_kkal_to_eat").children(".one_portion").text())*200).toFixed(2));
		$(".block_day_"+priem_count).animate({
			opacity: "0"
		}, 700, function(){
			$(".block_day_"+priem_count).hide();
			priem_count++;
			$(".block_day_"+priem_count).show();
			$(".block_day_"+priem_count).animate({
				opacity: "1"
			}, 700);
		});
		if(priem_count == need_priem_count - 1)
			$(".end_priem").parent().show();
	});

	if(flag_but_next == 1){
		if(need_priem_count == 1) time_rec = ["08:00"];
		else if(need_priem_count == 2) time_rec = ["08:00", "13:00"];
		else if(need_priem_count == 3) time_rec = ["08:00", "13:00", "18:00"];
		else if(need_priem_count == 4) time_rec = ["08:00", "12:00", "15:00", "18:00"];
		else if(need_priem_count == 5) time_rec = ["08:00", "11:00", "13:00", "15:00", "18:00"];
		else time_rec = ["06:00", "08:00", "10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"];
		$(".next_priem").parent().show();
		$(".diary_name").parent().show();
		$(".start_generate").parent().hide();
		$(".diary_count_portion").parent().hide();
		$(".block_day_"+priem_count).show();
	}
	
});