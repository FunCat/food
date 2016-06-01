$(document).ready(function(){ 	//скрываем блок при запуске страницы
	$("#log_dialog").hide();
});

function openLogDialog(){ 		//плавное появление диалогового окна
	$("#log_dialog").fadeIn();
}
function closeLogDialog(){		//плавное исчезновение диалогового окна
	$("#log_dialog").fadeOut();
}