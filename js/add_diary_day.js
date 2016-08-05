var priem_count = 0;
var id_rec = [];
var time_rec = [];
var kkal = [];
var tot_kkal = 0;
$(document).ready(function(){ 	
	$(".end_priem").parent().hide();
	$(".diary_name").parent().hide();
	$(".week_day_block").hide();
	$('.start_generate').click(function(){
		document.location.href = 'http://dailyfood.online/php/diary_add_day_menu.php?r=' + $('.diary_count_portion').val();
	});
	$(".added_recipe").click(function(){
		id_rec.push($(this).children(".rec_id").text());
		kkal.push(parseFloat($(this).children(".total_kkal_to_eat").children(".one_portion").text())*200).toFixed(2);

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

	$(".end_priem").click(function(){
		for(var i = 0; i < kkal.length; i++){
			tot_kkal += Number(kkal[i].toFixed(2));
		}
		var diary_name = $(".diary_name").val();
		var str = "diaryname=" + diary_name + "&rec=" + id_rec + "&kkal=" + tot_kkal + "&time=" + time_rec;
		send_request_diary_day_menu(str);
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

function send_request_diary_day_menu(str)
{
	var r = new XMLHttpRequest();
	var url = "add_diary_day_menu.php";
	var string = str;
	var vars = str;
	r.open("POST", url, true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	r.onreadystatechange = function(){
		if(r.readyState == 4 && r.status == 210){
			alert(r.responseText);
		}
	}
	r.onload = function () {
		if(this.responseText == "Не указано название дневника!"){
			$(".error_add_diary").text("Не указано название дневника!");
		}
		else{
			document.location.href = "http://dailyfood.online/php/diaries.php";
		}
	};
	r.send(vars);
}