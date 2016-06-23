var str;
var b_log_login = 0, b_log_pass = 0;

function send_request_vxod(str)
{
	var r = new XMLHttpRequest();
	var url = "cookie.php";
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
		if(this.responseText == "Неправильный логин или пароль!"){
			$(".total_log_prov").text("Неправильный логин или пароль!");
		}
		else{
			document.location.reload();
		}
	};
	r.send(vars);
}

$(document).ready(function(){


		function clearVal_login(val){
			var newval = val.replace(/[^а-яА-Яa-zA-Z0-9]+/g, '');
			if(newval == '') 
				return false;
			else 
				return newval;
		}

		$(".pole_log_log").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				if(b_log_login == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				$('.prov_log_log').text("Обязательное поле!");
				b_log_login = 1;
			}
		});


		$(".pole_log_log").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_login(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				if(b_log_login == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				$('.prov_log_log').text("Неправильный логин!");
				b_log_login = 1;
				return;
			}
			if(b_log_login == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
			}
			$('.prov_log_log').text("");
			$(this).css({"border": "none"});
			b_log_login = 0;
		});


		$(".pole_log_pass").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_log_pass').text("Обязательное поле!");
				if(b_log_pass == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_log_pass = 1;
			}
		});


		$(".pole_log_pass").keyup(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_log_pass').text("Обязательное поле!");
				if(b_log_pass == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_log_pass = 1;
				return;
			}
			if(b_log_pass == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
			}
			$('.prov_log_pass').text("");
			$(this).css({"border": "none"});
			b_log_pass = 0;
		});


		$(".but_vxod").click(function(){
			if(b_log_login == 1 || b_log_pass == 1) return;
			str = "log_log=" + $(".pole_log_log").val() + "&log_pass=" + $(".pole_log_pass").val();
			send_request_vxod(str);
		});
});