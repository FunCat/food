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
	$(".reg_content").animate({"left": "100%"}, 500);
	$(".vxod_content").animate({"left": "0%"}, 500, function(){
		$(".reg_content").hide();
		$('.content_dialog').animate({"height": "300px"}, 200);
	});
}
function openDialogReg(){
	$('.content_dialog').animate({"height": "510px"}, 200, function(){
		$(".reg_content").show();
		$(".reg_content").animate({"left": "0%"}, 500);
		$(".vxod_content").animate({"left": "-100%"}, 500);
	});
}