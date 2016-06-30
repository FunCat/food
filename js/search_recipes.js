function search_recipes(str)
{
	var r = new XMLHttpRequest();
	var url = "search_recipes.php";
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
		if(this.responseText == "Логин уже занят!"){
			$(".total_prov").text(this.responseText);
		}
		else{
			$(".rec_list").empty();
			$(".rec_list").css({"opacity":"0"});
			$(".rec_list").html(this.responseText);
			$(".rec_list").animate({opacity: 1}, 150);
		}
	};
	r.send(vars);
}
$(document).ready(function(){
	$s = "sname=" + $('.search_n').val() + "&scat=" + $(".rec_cat").val();
	search_recipes($s);
	$('.search_n').bind("change input", function(){
		$s = "sname=" + $('.search_n').val() + "&scat=" + $(".rec_cat").val();
		search_recipes($s);
	});
	$('.rec_cat').bind("change input", function(){
		$s = "sname=" + $('.search_n').val() + "&scat=" + $(".rec_cat").val();
		search_recipes($s);
	});
});
