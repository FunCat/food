var str;
var b_lastname = 0, b_firstname = 0, b_middlename = 0, b_telephone = 0, b_mail = 0;

function send_request(str)
{
	var r = new XMLHttpRequest();
	var url = "cabinet_script.php";
	var string = str;
	var vars = str;
	r.open("POST", url, true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	r.onreadystatechange = function(){
		if(r.readyState == 4 && r.status == 200){
			var return_data = r.responseText;
		}
	}
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

		$(".my_lastname").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_lastname').text("Обязательное поле!");
				b_lastname = 1;
			}
		});


		$(".my_lastname").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_rusletter(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_lastname').text("Только русские буквы!");
				b_lastname = 1;
				return;
			}
			$('.prov_lastname').text("");
			$(this).css({
				"border": "inherit",
				"border-width": "2px",
				"border-style": "inset",
				"border-color": "initial"
			});
			b_lastname = 0;
		});


		$(".my_firstname").focusout(function(){
			var val = $(this).val();
			if(val == '') {
				$(this).css({"border": "2px solid red"});
				$('.prov_firstname').text("Обязательное поле!");
				b_firstname = 1;
			}
		});


		$(".my_firstname").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_rusletter(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_firstname').text("Только русские буквы!");
				b_firstname = 1;
				return;
			}
			$('.prov_firstname').text("");
			$(this).css({
				"border": "inherit",
				"border-width": "2px",
				"border-style": "inset",
				"border-color": "initial"
			});
			b_firstname = 0;
		});


		$(".my_middlename").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_rusletter(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_middlename').text("Только русские буквы!");
				b_middlename = 1;
				return;
			}
			$('.prov_middlename').text("");
			$(this).css({
				"border": "inherit",
				"border-width": "2px",
				"border-style": "inset",
				"border-color": "initial"
			});
			b_middlename = 0;
		});


		$(".my_tel").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_number(val);

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_tel').text("Только цифры!");
				b_telephone = 1;
				return;
			}
			$('.prov_tel').text("");
			$(this).css({
				"border": "inherit",
				"border-width": "2px",
				"border-style": "inset",
				"border-color": "initial"
			});
			b_telephone = 0;
		});


		$(".my_mail").keyup(function(){
			var val = $(this).val();
			if(val == '') return;
			var newval = clearVal_mail(val);
			var i = 0;
			i = val.indexOf("@") + 1;

			if(i <= 0){
				$(this).css({"border": "2px solid red"});
				$('.prov_mail').text("Неправильный mail!");
				b_mail = 1;
				return;
			}

			if(val != newval){
				$(this).css({"border": "2px solid red"});
				$('.prov_mail').text("Неправильный mail!");
				b_mail = 1;
				return;
			}
			$('.prov_mail').text("");
			$(this).css({
				"border": "inherit",
				"border-width": "2px",
				"border-style": "inset",
				"border-color": "initial"
			});
			b_mail = 0;
		});




		$(".but_upd").click(function(){
			if(b_lastname == 1 || b_firstname == 1 || b_middlename == 1 || b_telephone == 1 || b_mail == 1)return;
			str = "my_lastname=" + $(".my_lastname").val() + "&my_firstname=" + $(".my_firstname").val() + "&my_middlename=" + $(".my_middlename").val() + "&my_tel=" + $(".my_tel").val()  + "&my_mail=" + $(".my_mail").val();
			send_request(str);
		});
});