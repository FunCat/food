var flag_block = 0;
var maxheight = 0;

$(document).ready(function(){ 	
	$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$("div.week_day_block").each(function() {
		if($(this).height() > maxheight)
			maxheight = $(this).height();
	});

	$("div.week_day_block").height(maxheight);
	$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$("#add_recipe_dialog").hide(); //скрываем блок при запуске страницы
	$(".save_diary").click(function(){
		$i = 0;
		var did = $(".did").text();
		var recip_id = [];
		var day = [];
		var time = [];
		var mass = [];
		var week_kkal = 0;
		$(".monday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 0;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$(".tuesday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 1;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$(".wednesday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 2;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$(".thursday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 3;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$(".friday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 4;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$(".saturday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 5;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});
		$(".sunday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			day[$i] = 6;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			week_kkal += parseInt($(this).children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text(), 10);
			$i++;
		});

		$dname = $(".diary_name").val();
		$str = "t=" + Math.random() + "&did=" + did + "&diaryname=" + $dname + "&rec=" + recip_id + "&day=" + day + "&time=" + time + "&mass=" + mass + "&week_mass=" + week_kkal;
		send_request_diary_recipes($str);
	});
});

function openRecipeDialog(flag){ 		//плавное появление диалогового окна
	$("#add_recipe_dialog").fadeIn();
	flag_block = flag;
}
function closeRecipeDialog(){			//плавное исчезновение диалогового окна
	$("#add_recipe_dialog").fadeOut();
}
function removeRecipe(t){
	var r = $(t).parent().parent().children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text();
	var sp_kkal = Number($(t).parent().parent().parent().children(".title_day").children(".avg_kkal").text()) - Number(r);
	$(t).parent().parent().parent().children(".title_day").children(".avg_kkal").text(sp_kkal);

	r = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_prot").text();
	var sp_prot = Number($(t).parent().parent().parent().children(".title_day").children(".avg_prot").text()) - Number(r);
	$(t).parent().parent().parent().children(".title_day").children(".avg_prot").text(sp_prot);

	r = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_fats").text();
	var sp_fats = Number($(t).parent().parent().parent().children(".title_day").children(".avg_fats").text()) - Number(r);
	$(t).parent().parent().parent().children(".title_day").children(".avg_fats").text(sp_fats);

	r = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_carb").text();
	var sp_carb = Number($(t).parent().parent().parent().children(".title_day").children(".avg_carboh").text()) - Number(r);
	$(t).parent().parent().parent().children(".title_day").children(".avg_carboh").text(sp_carb);


	$(t).parent().parent().remove();
}
function changeKkal(t){
	var k = $(t).parent().parent().children(".total_kkal_to_eat").children(".wrap_kkal_to_eat").children("span").text();
	var p = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_prot").text();
	var f = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_fats").text();
	var c = $(t).parent().parent().children(".total_kkal_to_eat").children(".tot_carb").text();

	var sp_kkal = Number($(t).parent().parent().parent().children(".title_day").children(".avg_kkal").text()) - Number(k);
	var sp_prot = Number($(t).parent().parent().parent().children(".title_day").children(".avg_prot").text()) - Number(p);
	var sp_fats = Number($(t).parent().parent().parent().children(".title_day").children(".avg_fats").text()) - Number(f);
	var sp_carb = Number($(t).parent().parent().parent().children(".title_day").children(".avg_carboh").text()) - Number(c);

	$one_g = $(t).parent().parent().find(".total_kkal_to_eat").find(".one_portion").text();
	$one_g_prot = $(t).parent().parent().find(".total_kkal_to_eat").find(".one_portion_proteins").text();
	$one_g_fats = $(t).parent().parent().find(".total_kkal_to_eat").find(".one_portion_fats").text();
	$one_g_carb = $(t).parent().parent().find(".total_kkal_to_eat").find(".one_portion_carboh").text();

	$mass_p = $(t).parent().find("input").val();

	$total_mass = Math.round($one_g * $mass_p);
	$total_prop = Math.round($one_g_prot * $mass_p);
	$total_fats = Math.round($one_g_fats * $mass_p);
	$total_carb = Math.round($one_g_carb * $mass_p);

	$(t).parent().parent().find(".total_kkal_to_eat").find(".wrap_kkal_to_eat").html("<span>" + $total_mass + "</span> Ккал");
	sp_kkal += Number($total_mass);
	$(t).parent().parent().parent().children(".title_day").children(".avg_kkal").text(sp_kkal);

	$(t).parent().parent().children(".total_kkal_to_eat").children(".tot_prot").text($total_prop);
	sp_prot += Number($total_prop);
	$(t).parent().parent().parent().children(".title_day").children(".avg_prot").text(sp_prot);

	$(t).parent().parent().children(".total_kkal_to_eat").children(".tot_fats").text($total_fats);
	sp_fats += Number($total_fats);
	$(t).parent().parent().parent().children(".title_day").children(".avg_fats").text(sp_fats);

	$(t).parent().parent().children(".total_kkal_to_eat").children(".tot_carb").text($total_carb);
	sp_carb += Number($total_carb);
	$(t).parent().parent().parent().children(".title_day").children(".avg_carboh").text(sp_carb);
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
function clickAddRecipe(t){
	var img_src = $(t).parent().parent().parent().find(".small_img").find("img").attr("src");
	var rec_id = $(t).parent().parent().parent().find(".rec_id").text();
	var rec_name = $(t).parent().parent().find(".title_rec_name").text();
	var rec_prot = $(t).parent().parent().find(".rec_prot").text().slice(0, -1);
	var rec_fats = $(t).parent().parent().find(".rec_fats").text().slice(0, -1);
	var rec_car = $(t).parent().parent().find(".rec_car").text().slice(0, -1);
	var rec_kkal = $(t).parent().parent().find(".rec_kkal").text();
	var portion_mass = $(t).parent().parent().find(".rec_portion_mass").text();
	var buf_name = "<div class='added_recipe'>";
		buf_name +=		"<div class='close_img'><img class='cl_img' src='../img/close.png' onclick='removeRecipe(this)' /></div>";
		buf_name +=		"<div class='rec_id' style='display: none;'>" + rec_id + "</div>";
		buf_name +=		"<div class='recipe_foto'><img src='" + img_src + "' /></div>";
		buf_name +=		"<div class='recipe_name'>" + rec_name + "</div>";
		buf_name +=		"<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='09:00' /></div>";
		buf_name +=		"<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' onchange='changeKkal(this)' value='" + portion_mass + "' /></div>";
		buf_name +=		"<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>" + rec_kkal + "</span><br/>ККал</div><div class='one_portion' style='display: none;'>" + rec_kkal/portion_mass+ "</div><div class='one_portion_proteins' style='display: none;'>" + rec_prot/portion_mass + "</div><div class='tot_prot' style='display: none;'>" + rec_prot + "</div><div class='one_portion_fats' style='display: none;'>" + rec_fats/portion_mass + "</div><div class='tot_fats' style='display: none;'>" + rec_fats + "</div><div class='one_portion_carboh' style='display: none;'>" + rec_car/portion_mass + "</div><div class='tot_carb' style='display: none;'>" + rec_car + "</div></div>";
		buf_name +=	"</div>";
	if(flag_block == 1)
	{
		$(".week_day_block.monday .add_recipe").remove();
		$(".week_day_block.monday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(1)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.monday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.monday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.monday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
		var sp_fats = Number($(".week_day_block.monday .title_day .avg_fats").text());
		sp_fats += Math.round(rec_fats);
		$(".week_day_block.monday .title_day .avg_fats").text(sp_fats);
		var sp_carb = Number($(".week_day_block.monday .title_day .avg_carboh").text());
		sp_carb += Math.round(rec_car);
		$(".week_day_block.monday .title_day .avg_carboh").text(sp_carb);
	} 
	else if(flag_block == 2){
		$(".week_day_block.tuesday .add_recipe").remove();
		$(".week_day_block.tuesday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(2)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.tuesday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.tuesday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.tuesday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	else if(flag_block == 3){
		$(".week_day_block.wednesday .add_recipe").remove();
		$(".week_day_block.wednesday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(3)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.wednesday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.wednesday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.wednesday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	else if(flag_block == 4){
		$(".week_day_block.thursday .add_recipe").remove();
		$(".week_day_block.thursday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(4)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.thursday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.thursday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.thursday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	else if(flag_block == 5){
		$(".week_day_block.friday .add_recipe").remove();
		$(".week_day_block.friday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(5)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.friday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.friday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.friday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	else if(flag_block == 6){
		$(".week_day_block.saturday .add_recipe").remove();
		$(".week_day_block.saturday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(6)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.saturday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.saturday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.saturday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	else if(flag_block == 7){
		$(".week_day_block.sunday .add_recipe").remove();
		$(".week_day_block.sunday").append(buf_name);
		buf_name = "<div class='add_recipe' onclick='openRecipeDialog(7)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
		$(".week_day_block.sunday").append(buf_name);
		var sp_kkal = Number($(".week_day_block.sunday .title_day .avg_kkal").text());
		sp_kkal += Number(rec_kkal);
		$(".week_day_block.sunday .title_day .avg_kkal").text(sp_kkal);
		var sp_proteins = Number($(".week_day_block.monday .title_day .avg_prot").text());
		sp_proteins += Math.round(rec_prot);
		$(".week_day_block.monday .title_day .avg_prot").text(sp_proteins);
	}
	closeRecipeDialog();
	$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
}


