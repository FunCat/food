var h_content_reg = 470;
var h_content_vxod = 300;

$(document).ready(function(){ 	//скрываем блок при запуске страницы
	$("#log_dialog").hide();
	$(".nav_dialog .vxod").click(function(){openDialogVxod()});
	$(".nav_dialog .reg").click(function(){openDialogReg()});
});

function openLogDialog(){ 		//плавное появление диалогового окна
	$("#log_dialog").fadeIn();
}
function closeLogDialog(){		//плавное исчезновение диалогового окна
	$("#log_dialog").fadeOut();
}

function openDialogVxod(){
	h_content_reg = $('.content_dialog').height();
	$(".reg_content").animate({"left": "100%"}, 500);
	$(".vxod_content").animate({"left": "0%"}, 500, function(){
		$(".reg_content").hide();
		$('.content_dialog').animate({"height": h_content_vxod + "px"}, 200);
	});
}
function openDialogReg(){
	h_content_vxod = $('.content_dialog').height();
	$('.content_dialog').animate({"height": h_content_reg + "px"}, 200, function(){
		$(".reg_content").show();
		$(".reg_content").animate({"left": "0%"}, 500);
		$(".vxod_content").animate({"left": "-100%"}, 500);
	});
	$(".reg_content").animate({"height": h_content_reg - 43 + "px"}, 500);
}