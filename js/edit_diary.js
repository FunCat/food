var flag_block = 0;

$(document).ready(function(){ 
	$(window).resize(function(){resize_calculation();});
	show_diary(0, $('.monday'));
	$('.monday').click(function(){
		show_diary(0, this);
		flag_block = 0;
	});
	$('.tuesday').click(function(){
		show_diary(1, this);
		flag_block = 1;
	});
	$('.wednesday').click(function(){
		show_diary(2, this);
		flag_block = 2;
	});
	$('.thursday').click(function(){
		show_diary(3, this);
		flag_block = 3;
	});
	$('.friday').click(function(){
		show_diary(4, this);
		flag_block = 4;
	});
	$('.saturday').click(function(){
		show_diary(5, this);
		flag_block = 5;
	});
	$('.sunday').click(function(){
		show_diary(6, this);
		flag_block = 6;
	});
	$("#add_recipe_dialog").hide(); //скрываем блок при запуске страницы
	$(".save_diary").click(function(){
		$i = 0;
		var did = $(".did").text();
		var recip_id = [];
		var time = [];
		var mass = [];
		$('.rec').each(function(){
			recip_id[$i] = parseInt($(this).children('.rec_id').text());
			time[$i] = $(this).children(".left_column").children(".count_time").children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".left_column").children(".count_time").children(".count_to_eat").children("input").val();
			$i++;
		});
		$dname = $(".diary_name").val();
		$str = "t=" + Math.random() + "&did=" + did + "&diaryname=" + $dname + "&rec=" + recip_id + "&time=" + time + "&mass=" + mass + "&flag=" + flag_block;
		send_request_diary_recipes($str);
	});
});
function openRecipeDialog(){ 		//плавное появление диалогового окна
	$("#add_recipe_dialog").fadeIn();
}
function closeRecipeDialog(){			//плавное исчезновение диалогового окна
	$("#add_recipe_dialog").fadeOut();
}
function changeKkal(t){
	var k = $(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text();
	var p = $(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_proteins_to_eat").children("span").text();
	var f = $(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_fats_to_eat").children("span").text();
	var c = $(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_carboh_to_eat").children("span").text();

	var sp_kkal = Number($(t).parent().parent().parent().parent().parent().children(".info_zone").children(".avg_kkal").text()) - Number(k);
	var sp_prot = Number($(t).parent().parent().parent().parent().parent().children(".info_zone").children(".avg_prot").text()) - Number(p);
	var sp_fats = Number($(t).parent().parent().parent().parent().parent().children(".info_zone").children(".avg_fats").text()) - Number(f);
	var sp_carb = Number($(t).parent().parent().parent().parent().parent().children(".info_zone").children(".avg_carboh").text()) - Number(c);

	$one_g = $(t).parent().parent().parent().find(".total_kkal_to_eat").find(".hun_kkal").text();
	$one_g_prot = $(t).parent().parent().parent().find(".total_kkal_to_eat").find(".hun_proteins").text();
	$one_g_fats = $(t).parent().parent().parent().find(".total_kkal_to_eat").find(".hun_fats").text();
	$one_g_carb = $(t).parent().parent().parent().find(".total_kkal_to_eat").find(".hun_carboh").text();

	$mass_p = $(t).val();

	$total_mass = Math.round($one_g * $mass_p);
	$total_prop = Math.round($one_g_prot * $mass_p);
	$total_fats = Math.round($one_g_fats * $mass_p);
	$total_carb = Math.round($one_g_carb * $mass_p);

	$(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text($total_mass);
	sp_kkal += Number($total_mass);
	$(".info_zone").children(".avg_kkal").text(sp_kkal);

	$(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_proteins_to_eat").children("span").text($total_prop);
	sp_prot += Number($total_prop);
	$(".info_zone").children(".avg_prot").text(sp_prot);

	$(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_fats_to_eat").children("span").text($total_fats);
	sp_fats += Number($total_fats);
	$(".info_zone").children(".avg_fats").text(sp_fats);

	$(t).parent().parent().parent().children(".total_kkal_to_eat").children(".wrap_carboh_to_eat").children("span").text($total_carb);
	sp_carb += Number($total_carb);
	$(".info_zone").children(".avg_carboh").text(sp_carb);
}
function clickAddRecipe(t){
	var img_src = $(t).parent().parent().parent().find(".small_img").find("img").attr("src");
	var rec_id = $(t).parent().parent().parent().find(".rec_id").text();
	var rec_name = $(t).parent().parent().find(".title_rec_name").text();
	var rec_prot = $(t).parent().parent().find(".rec_prot").text().slice(0, -1);
	var rec_fats = $(t).parent().parent().find(".rec_fats").text().slice(0, -1);
	var rec_car = $(t).parent().parent().find(".rec_car").text().slice(0, -1);
	var rec_kkal = $(t).parent().parent().find(".rec_kkal").text();
	var portion_mass = $(t).parent().parent().find(".rec_portion_mass").text();

	var k = Number($(".info_zone").children(".avg_kkal").text()) + Number(rec_kkal);
	var p = Number($(".info_zone").children(".avg_prot").text()) + Number(rec_prot);
	var f = Number($(".info_zone").children(".avg_fats").text()) + Number(rec_fats);
	var c = Number($(".info_zone").children(".avg_carboh").text()) + Number(rec_car);

	$(".info_zone").children(".avg_kkal").text(k);
	$(".info_zone").children(".avg_prot").text(p);
	$(".info_zone").children(".avg_fats").text(f);
	$(".info_zone").children(".avg_carboh").text(c);

	var ings_n = $(t).parent().parent().parent().children('.ingredients').children('.n').text();
	var ings_m = $(t).parent().parent().parent().children('.ingredients').children('.m').text();
	var ing_n = ings_n.split("|");
	var ing_m = ings_m.split("|");
	var buf_name = "<div class='rec'><div class='close_img'><img class='cl_img' src='../img/close.png' onclick='removeRecipe(this)' /></div><div class='rec_id' style='display:none;'>" + rec_id + "</div><div class='rec_name'>" + rec_name + "</div><div class='left_column'><div class='rec_foto'><a href='recipe.php?r=" + rec_id + "' target='_blank'><img src='" + img_src + "' /></a></div><div class='count_time'><div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='09:00' /></div><div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='100' onChange='changeKkal(this)'/></div></div><div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'>ККал<br/><span>" + rec_kkal + "</span><div class='hun_kkal' style='display: none;'>" + rec_kkal/100 + "</div>";
	buf_name += "</div><div class='wrap_proteins_to_eat'>Б<br/><span>" + rec_prot + "</span><div class='hun_proteins' style='display: none;'>" + rec_prot/100 + "</div></div><div class='wrap_fats_to_eat'>Ж<br/><span>" + rec_fats + "</span><div class='hun_fats' style='display: none;'>" + rec_fats/100 + "</div></div><div class='wrap_carboh_to_eat'>У<br/><span>" + rec_car + "</span><div class='hun_carboh' style='display: none;'>" + rec_car/100 + "</div></div></div></div>";
	buf_name += "<div class='right_column'><div class='rec_ingred'><table><tr><td class='tab_name' colspan='2'>Основные ингредиенты</td></tr>";
	for(i = 0; i < ing_n.length - 1; i++){
		buf_name += "<tr><td><li>" + ing_n[i] + "</li></td><td class='mass_ing'>" + ing_m[i] + "</td></tr>";
	}
	buf_name += "</table></div><div class='rec_but_about'><a href='recipe.php?r=" + rec_id + "'><div class='rec_about'>Подробнее-></div></a></div></div></div>";
	$('.day_block').append(buf_name);
	closeRecipeDialog();
	if($('.no_rec').length == 1){$('.no_rec').remove();}
	resize_calculation();
}
function removeRecipe(t){
	var r = $(t).parent().parent().children(".left_column").children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text();
	var sp_kkal = Number($(t).parent().parent().parent().children(".info_zone").children(".avg_kkal").text()) - Number(r);
	$(t).parent().parent().parent().children(".info_zone").children(".avg_kkal").text(sp_kkal);

	r = $(t).parent().parent().children(".left_column").children(".total_kkal_to_eat").children(".wrap_proteins_to_eat").children("span").text();
	var sp_prot = Number($(t).parent().parent().parent().children(".info_zone").children(".avg_prot").text()) - Number(r);
	$(t).parent().parent().parent().children(".info_zone").children(".avg_prot").text(sp_prot);

	r = $(t).parent().parent().children(".left_column").children(".total_kkal_to_eat").children(".wrap_fats_to_eat").children("span").text();
	var sp_fats = Number($(t).parent().parent().parent().children(".info_zone").children(".avg_fats").text()) - Number(r);
	$(t).parent().parent().parent().children(".info_zone").children(".avg_fats").text(sp_fats);

	r = $(t).parent().parent().children(".left_column").children(".total_kkal_to_eat").children(".wrap_carboh_to_eat").children("span").text();
	var sp_carb = Number($(t).parent().parent().parent().children(".info_zone").children(".avg_carboh").text()) - Number(r);
	$(t).parent().parent().parent().children(".info_zone").children(".avg_carboh").text(sp_carb);

	$(t).parent().parent().remove();
}
function send_request_diary_recipes(str)
{
	var r = new XMLHttpRequest();
	var url = "edit_diary_recipes.php";
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
function count_info_rec(){
	avg_kkal = 0;
	avg_prot = 0;
	avg_fats = 0;
	avg_carb = 0;
	$(".rec").each(function(){
		avg_kkal += Number($(this).children(".left_column").children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text());
		avg_prot += Number($(this).children(".left_column").children(".total_kkal_to_eat").children(".wrap_proteins_to_eat").children("span").text());
		avg_fats += Number($(this).children(".left_column").children(".total_kkal_to_eat").children(".wrap_fats_to_eat").children("span").text());
		avg_carb += Number($(this).children(".left_column").children(".total_kkal_to_eat").children(".wrap_carboh_to_eat").children("span").text());	
	});
	$(".info_zone").children(".avg_kkal").text(avg_kkal);
	$(".info_zone").children(".avg_prot").text(avg_prot);
	$(".info_zone").children(".avg_fats").text(avg_fats);
	$(".info_zone").children(".avg_carboh").text(avg_carb);	
}
function show_diary(day, t)  
{  
	$('.rec').remove();
	$('.day_line_active').removeClass("day_line_active").addClass("day_line");
	$(t).addClass("day_line_active");
	$.ajax({
		url: "list_diary_edit_rec.php",  
		cache: false,  
		data: { day: day, did: did},
		success: function(html){  
			$(".day_block").html(html);  
			$(document).ready(function(){
				count_info_rec();
				if($('.rec').length == 0){
					$('.day_block').append("<div class='no_rec'>No recipes!</div>");
				}
				 resize_calculation();
			});
		}  
	});  
}  
function resize_calculation(){
	$(".rec_foto").css({"height": $(".rec_foto").width() + "px"});
	$(".rec").css({"height": $(".rec_foto").width() + 60 + "px"});
	$(".left_column").css({"height": $(".rec").height() - $(".rec_name").height() + "px"});
	$(".right_column").css({"height": $(".rec").height() - $(".rec_name").height() + "px"});
	$(".rec_foto img").css({"height": $(".rec_foto").width() + "px"});
	$(".wrap_kkal_to_eat").css({"height": $(".wrap_kkal_to_eat").width() + "px", "padding-top": $(".wrap_kkal_to_eat").width() / 2 - $(".wrap_kkal_to_eat span").height() + "px"});
	$(".wrap_proteins_to_eat").css({"height": $(".wrap_proteins_to_eat").width() + "px", "padding-top": $(".wrap_proteins_to_eat").width() / 2 - $(".wrap_kkal_to_eat span").height() + "px"});
	$(".wrap_fats_to_eat").css({"height": $(".wrap_fats_to_eat").width() + "px", "padding-top": $(".wrap_fats_to_eat").width() / 2 - $(".wrap_kkal_to_eat span").height() + "px"});
	$(".wrap_carboh_to_eat").css({"height": $(".wrap_carboh_to_eat").width() + "px", "padding-top": $(".wrap_carboh_to_eat").width() / 2 - $(".wrap_kkal_to_eat span").height() + "px"});
	$(".total_kkal_to_eat").css({"margin-top": ($(".rec").height() - $(".rec_name").height()) / 2 - $(".total_kkal_to_eat").height() / 2 + "px"});
}