$(document).ready(function(){ 
	$(".save_diary").click(function(){
		$str = "diaryname=" + $(".diary_name").val();
		send_request_diary_recipes($str);
	});
});

function send_request_diary_recipes(str)
{
	var r = new XMLHttpRequest();
	var url = "add_diary_recipes.php";
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
			location.replace("http://dailyfood.online/php/diary_edit.php?r=" + this.responseText);
		}
	};
	r.send(vars);
}
