var str;
var b_lastname = 0, b_firstname = 0, b_login = 0, b_pass = 0, b_pass2 = 0;

function send_request_reg(str)
{
	var r = new XMLHttpRequest();
	var url = "reg_script.php";
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
			document.location = "index.php";
		}
	};
	r.send(vars);
}

$(document).ready(function(){

		function clearVal_rusletter(val){
			var newval = val.replace(/[^а-яА-Я]+/g, '');
			if(newval == '') 
				return false;
			else 
				return newval;
		}

		function clearVal_login(val){
			var newval = val.replace(/[^а-яА-Яa-zA-Z0-9]+/g, '');
			if(newval == '') 
				return false;
			else 
				return newval;
		}

		function clearVal_mail(val){
			var newval = val.replace(/[^a-zA-Z-_.@]+/g, '');
			if(newval == '') 
				return false;
			else 
				return newval;
		}

		function clearVal_number(val){
			var newval = val.replace(/[^\d]+/g, '');
			if(newval == '') 
				return false;
			else 
				return newval;
		}

		$(".pole_last").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				if(b_lastname == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				$('.prov_lastname').text("Обязательное поле!");
				b_lastname = 1;
			}
		});


		$(".pole_last").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_rusletter(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				if(b_lastname == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				$('.prov_lastname').text("Только русские буквы!");
				b_lastname = 1;
				return;
			}
			$('.prov_lastname').text("");
			$(this).css({
				"border": "none"
			});
			if(b_lastname == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				$('.prov_lastname').text("");
			}
			b_lastname = 0;
		});


		$(".pole_first").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_firstname').text("Обязательное поле!");
				if(b_firstname == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_firstname = 1;
			}
		});


		$(".pole_first").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_rusletter(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_firstname').text("Только русские буквы!");
				if(b_firstname == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_firstname = 1;
				return;
			}
			$('.prov_firstname').text("");
			$(this).css({
				"border": "none"
			});
			if(b_firstname == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				$('.prov_firstname').text("");
			}
			b_firstname = 0;
		});

		$(".pole_log").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_login').text("Обязательное поле!");
				if(b_login == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_login = 1;
			}
		});

		$(".pole_log").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_login(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_login').text("Только русские, английские буквы и цифры!");
				if(b_login == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_login = 1;
				return;
			}
			$('.prov_login').text("");
			$(this).css({
				"border": "none"
			});
			if(b_login == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				$('.prov_login').text("");
			}
			b_login = 0;
		});

		var p1;
		var p2;
		$(".pole_pass").focusout(function(){
			var p1 = $(this).val();
			if(p1 == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_pass').text("Обязательное поле!");
				if(b_pass == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_pass = 1;
				return;
			}
			if(b_pass == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				$('.prov_pass').text("");
			}
			b_pass = 0;
		});

		$(".pole_pass2").focusout(function(){
			var p2 = $(this).val();
			if(p2 == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_pass2').text("Обязательное поле!");
				if(b_pass2 == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_pass2 = 1;
				return;
			}
			if(p1 != p2) {
				$(this).css({"border": "2px solid red"});
				$('.prov_pass2').text("Пароли не совпадают!");
				if(b_pass2 == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_pass2 = 1;
				return;
			}
			if(b_pass2 == 1){
				$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
				$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				$('.prov_pass2').text("");
			}
			b_pass2 = 0;
		});

		$(".pole_pass").keyup(function(){
			p1 = $(this).val();
			if(p1 != p2){
				$(".pole_pass2").css({"border": "2px solid red"});
				$('.prov_pass2').text("Пароли не совпадают!");
				if(b_pass2 == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_pass2 = 1;
				return;
			}
			if(p1 == p2) {
				if(b_pass == 1){
					$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);	
				}
				if(b_pass2 == 1){
					$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				}
				$(".pole_pass2").css({"border": "none"});
				$(".pole_pass").css({"border": "none"});
				$('.prov_pass').text("");
				$('.prov_pass2').text("");
				b_pass2 = 0;
				b_pass = 0;
			}
		});		

		$(".pole_pass2").keyup(function(){
			p2 = $(this).val();
			if(p2 != p1){
				$(".pole_pass2").css({"border": "2px solid red"});
				$('.prov_pass2').text("Пароли не совпадают!");
				if(b_pass == 0){
					$('.content_dialog').animate({"height": $('.content_dialog').height() + 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() + 21 +"px"}, 210);
				}
				b_pass = 1;
			}
			if(p2 == p1){
				if(b_pass == 1){
					$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				}
				if(b_pass2 == 1){
					$('.content_dialog').animate({"height": $('.content_dialog').height() - 21 +"px"}, 210);
					$('.reg_content').animate({"height": $('.reg_content').height() - 21 +"px"}, 210);
				}
				$(".pole_pass2").css({"border": "none"});
				$(".pole_pass").css({"border": "none"});
				$('.prov_pass').text("");
				$('.prov_pass2').text("");
				b_pass2 = 0;
				b_pass = 0;
			}
		});



		$(".but_reg").click(function(){
			$l = $(".pole_last").val();
			$f = $(".pole_first").val();
			$log = $(".pole_log").val();
			$p = $(".pole_pass").val();
			$p2 = $(".pole_pass2").val();
			if($l == "" || $f == "" || $log == "" || $p == "" || $p2 == ""){$(".total_prov").text("Не все поля заполнены!"); return;}
			if(b_lastname == 1 || b_firstname == 1 || b_login == 1 || b_pass == 1 || b_pass2 == 1)return;
			str = "my_lastname=" + $(".pole_last").val() + "&my_firstname=" + $(".pole_first").val() + "&my_log=" + $(".pole_log").val() + "&my_pass=" + $(".pole_pass").val()  + "&my_pass2=" + $(".pole_pass2").val();
			send_request_reg(str);
		});
});