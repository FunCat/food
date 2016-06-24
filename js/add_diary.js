var flag_block = 0;

$(document).ready(function(){ 	
	$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	$("#add_recipe_dialog").hide(); //скрываем блок при запуске страницы
	$('.but_add').click(function(){
		var img_src = $(this).parent().parent().parent().find(".small_img").find("img").attr("src");
		var rec_id = $(this).parent().parent().parent().find(".rec_id").text();
		var rec_name = $(this).parent().parent().find(".title_rec_name").text();
		var rec_prot = $(this).parent().parent().find(".rec_prot").text();
		var rec_fats = $(this).parent().parent().find(".rec_fats").text();
		var rec_car = $(this).parent().parent().find(".rec_car").text();
		var rec_kkal = $(this).parent().parent().find(".rec_kkal").text();
		var portion_mass = $(this).parent().parent().find(".rec_portion_mass").text();
		var buf_name = "<div class='added_recipe'>";
			buf_name +=		"<div class='rec_id' style='display: none;'>" + rec_id + "</div>";
			buf_name +=		"<div class='recipe_foto'><img src='" + img_src + "' /></div>";
			buf_name +=		"<div class='recipe_name'>" + rec_name + "</div>";
			buf_name +=		"<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='09:00' /></div>";
			buf_name +=		"<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' onchange='changeKkal(this)' value='" + portion_mass + "' /></div>";
			buf_name +=		"<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'>" + rec_kkal + "<br/>ККал</div><div class='one_portion' style='display: none;'>" + rec_kkal/portion_mass+ "</div></div>";
			buf_name +=	"</div>";
		if(flag_block == 1)
		{
			$(".week_day_block.monday .add_recipe").remove();
			$(".week_day_block.monday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(1)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.monday").append(buf_name);
		} 
		else if(flag_block == 2){
			$(".week_day_block.tuesday .add_recipe").remove();
			$(".week_day_block.tuesday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(2)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.tuesday").append(buf_name);
		}
		else if(flag_block == 3){
			$(".week_day_block.wednesday .add_recipe").remove();
			$(".week_day_block.wednesday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(3)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.wednesday").append(buf_name);
		}
		else if(flag_block == 4){
			$(".week_day_block.thursday .add_recipe").remove();
			$(".week_day_block.thursday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(4)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.thursday").append(buf_name);
		}
		else if(flag_block == 5){
			$(".week_day_block.friday .add_recipe").remove();
			$(".week_day_block.friday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(5)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.friday").append(buf_name);
		}
		else if(flag_block == 6){
			$(".week_day_block.saturday .add_recipe").remove();
			$(".week_day_block.saturday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(6)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.saturday").append(buf_name);
		}
		else if(flag_block == 7){
			$(".week_day_block.sunday .add_recipe").remove();
			$(".week_day_block.sunday").append(buf_name);
			buf_name = "<div class='add_recipe' onclick='openRecipeDialog(7)'><img src='../img/plus.png' /><br/><div class='add_text'>Добавить<br/>рецепт</div></div>";
			$(".week_day_block.sunday").append(buf_name);
		}
		closeRecipeDialog();
		$('.added_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
		$('.add_recipe').css({"width": $(".week_day_block").width() / 3 + "px"});
	});
	$(".create_diary").click(function(){
		$i = 0;
		$buf = 0;
		$flag = 0;
		var recip_id = [];
		var mon = [];
		var tu = [];
		var wed = [];
		var thu = [];
		var fri = [];
		var sat = [];
		var su = [];
		var time = [];
		var mass = [];
		$(".monday").children(".added_recipe").each(function(){
			recip_id[$i] = $(this).children(".rec_id").text();
			mon[$i] = 1;
			tu[$i] = 0;
			wed[$i] = 0;
			thu[$i] = 0;
			fri[$i] = 0;
			sat[$i] = 0;
			su[$i] = 0;
			time[$i] = $(this).children(".time_to_eat").children("input").val();
			mass[$i] = $(this).children(".count_to_eat").children("input").val();
			$i++;
		});

		$(".tuesday").children(".added_recipe").each(function(){
			$buf = $(this).children(".rec_id").text();
			for($j = 0; $j < recip_id.length; $j++){
				if(recip_id[$j] == $buf){
					tu[$j] = 1;
					$flag = 1;
				}
			}
			if($flag == 1){
				recip_id[$i] = $(this).children(".rec_id").text();
				mon[$i] = 0;
				tu[$i] = 1;
				wed[$i] = 0;
				thu[$i] = 0;
				fri[$i] = 0;
				sat[$i] = 0;
				su[$i] = 0;
				time[$i] = $(this).children(".time_to_eat").children("input").val();
				mass[$i] = $(this).children(".count_to_eat").children("input").val();
				$i++;
			}
			$flag = 0;
		});

		$(".wednesday").children(".added_recipe").each(function(){
			$buf = $(this).children(".rec_id").text();
			for($j = 0; $j < recip_id.length; $j++){
				if(recip_id[$j] == $buf){
					wed[$j] = 1;
					$flag = 1;
				}
			}
			if($flag == 1){
				recip_id[$i] = $(this).children(".rec_id").text();
				mon[$i] = 0;
				tu[$i] = 0;
				wed[$i] = 1;
				thu[$i] = 0;
				fri[$i] = 0;
				sat[$i] = 0;
				su[$i] = 0;
				time[$i] = $(this).children(".time_to_eat").children("input").val();
				mass[$i] = $(this).children(".count_to_eat").children("input").val();
				$i++;
			}
			$flag = 0;
		});

		for($j = 0; $j < recip_id.length; $j++){
			console.log(recip_id[$j]);
		}

	});
});

function openRecipeDialog(flag){ 		//плавное появление диалогового окна
	$("#add_recipe_dialog").fadeIn();
	flag_block = flag;
}
function closeRecipeDialog(){		//плавное исчезновение диалогового окна
	$("#add_recipe_dialog").fadeOut();
}
function changeKkal(t){
	$one_g = $(t).parent().parent().find(".total_kkal_to_eat").find(".one_portion").text();
	$mass_p = $(t).parent().find("input").val();
	$total_mass = Math.round($one_g * $mass_p).toFixed(2);
	$(t).parent().parent().find(".total_kkal_to_eat").find(".wrap_kkal_to_eat").text($total_mass + " Ккал");
}
