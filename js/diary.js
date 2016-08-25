 $(document).ready(function(){  
 	$(window).resize(function(){resize_calculation();});
	show_diary(0, $('.monday'));
	$('.monday').click(function(){
		show_diary(0, this);
	});
	$('.tuesday').click(function(){
		show_diary(1, this);
	});
	$('.wednesday').click(function(){
		show_diary(2, this);
	});
	$('.thursday').click(function(){
		show_diary(3, this);
	});
	$('.friday').click(function(){
		show_diary(4, this);
	});
	$('.saturday').click(function(){
		show_diary(5, this);
	});
	$('.sunday').click(function(){
		show_diary(6, this);
	});
}); 

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


function show_diary(day, t){  
	$('.rec').remove();
	$('.day_line_active').removeClass("day_line_active").addClass("day_line");
	$(t).addClass("day_line_active");
	$.ajax({
		url: "list_diary_rec.php",  
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