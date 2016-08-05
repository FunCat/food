function send_apple_like(name, id)
{
	var r = new XMLHttpRequest();
	var url = "add_apple_like.php";
	var str = "log="+name+"&id="+id;
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
			show_likes(); 
		}
	};
	r.send(vars);
}
function send_apple_dislike(name, id)
{
	var r = new XMLHttpRequest();
	var url = "add_apple_dislike.php";
	var str = "log="+name+"&id="+id;
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
			show_likes(); 
		}
	};
	r.send(vars);
}