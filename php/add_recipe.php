<?php 
	include "config.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/croppic.css" />
	<link rel="stylesheet" href="../css/cropping.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/search.js" type="text/javascript"></script>
	<script src="../js/croppic.js" type="text/javascript"></script>
	<script src="../js/jquery.mousewheel.min.js" type="text/javascript"></script>
	<script src="../js/reg_valid.js" type="text/javascript"></script>
	<script src="../js/log_valid.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
</head>
<body>
	<div class="pict_menu">
		<div id="hamburger" class="hamburglar is-closed">
			<div class="burger-icon">
				<div class="burger-container">
					<span class="burger-bun-top"></span>
					<span class="burger-filling"></span>
					<span class="burger-bun-bot"></span>
				</div>
			</div>
						
			<!-- svg ring containter -->
			<div class="burger-ring">
				<svg class="svg-ring">
					<path class="path" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
				</svg>
			</div>
			<!-- the masked path that animates the fill to the ring -->
						
			<svg width="0" height="0">
				<mask id="mask">
					<path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
				</mask>
			</svg>
			<div class="path-burger">
				<div class="animate-path">
					<div class="path-rotation"></div>
				</div>
			</div>				  
		</div>
	</div>


	<div id="log_dialog" class="back_dialog">
		<div class="content_dialog">
			<div class="nav_dialog">
				<div class="vxod">Вход</div>
				<div class="reg">Регистрация</div>
			</div>
			<a class="close_dialog" href="javascript: closeLogDialog()"></a>
			<div class="vxod_content">
				<div class="title_dialog">Войти в учётную запись</div>
				<div class="wrap_box">
					<input class="pole_log_log" name="pole_log" type="text" placeholder="Логин" /><div class="prov_log_log"></div>
					<input class="pole_log_pass" name="pole_pass" type="password" placeholder="Пароль"/><div class="prov_log_pass"></div>
					<input class="but_vxod" name="but_log" type="button" value="Войти" /><div class="total_log_prov"></div>
				</div>
			</div>
			<div class="reg_content">
				<div class="title_dialog">Регистрация</div>
				<div class="wrap_box">
					<input class="pole_last" name="reg_last" type="text" placeholder="Фамилия*" /><div class="prov_lastname"></div>
					<input class="pole_first" name="reg_first" type="text" placeholder="Имя*" /><div class="prov_firstname"></div>
					<input class="pole_log" name="reg_log" type="text" placeholder="Логин*" /><div class="prov_login"></div>
					<input class="pole_pass" name="reg_pass" type="password" placeholder="Пароль*"/><div class="prov_pass"></div>
					<input class="pole_pass2" name="reg_pass2" type="password" placeholder="Повторите пароль*"/><div class="prov_pass2"></div>
					<input class="but_reg" name="but_reg" type="button" value="Регистрация" /><div class="total_prov"></div>
				</div>
			</div>
		</div>
	</div>




	<div class="block_menu">
		<ul class="list_menu">
			<?php if(isset($_COOKIE['log'])){ ?><a href="diaries.php"><li>Личый дневник</li></a><?php }?>
			<a href="index.php"><li class="active_point_menu">Главная</li></a>
			<a href="recipes.php"><li>Рецепты</li></a>
			<li>Питание</li>
			<li>Калькулятор</li>
			<a href="contact.php"><li>Контакты</li></a>
			<?php if($_COOKIE['perm'] == 1){ ?><a href="admin_panel.php"><li>Панель администратора</li></a><?php }?>
		</ul>
	</div>

	<div class="container_sait">
		<div class="wrap_header">
			<div class="header">
				<div class="logo">
					<img src="../img/logo.png" />
				</div>
				<?php 
					if(isset($_COOKIE["name"])){
				?>
					<form action="#" method="post">
						<div class="wrap_login">
							<div class="welcome_text">Здравствуйте, <?php echo $_COOKIE['log'];?>!</div>
							<a href="cabinet.php"><input class="but_cabinet but_hov" name="but_cabinet" type="button" value="Личный кабинет" /></a>
							<input class="but_login but_hov" name="but_exit" type="submit" value="Выйти" />
						</div>
					</form>
				<?php
					}else{
				?>
					<div class="wrap_login">
						<input class="but_login but_hov" type="button" value="Войти" onclick="openLogDialog()" />
					</div>
				<?php 
					}
				?>
			</div>
		</div>

		<div class="wrap_main_part">
			<div class="main_part">
				<div class="section_title">
					<h1>Добавление рецепта</h1>
				</div>
				<div class="wrap_recip_name"><input class="recip_name" type="text" placeholder="Название рецепта" /></div>
				<div class="wrap_cat_recip">
					Тип блюда:
					<select class="cat_rec">
						<?php
							$res_cat_r = mysqli_query($mysqli, "SELECT * FROM recip_cat ORDER BY cname");
							while($row = mysqli_fetch_array($res_cat_r))
							{
								echo "<option value='".$row['cid']."'>".$row['cname']."</option>";
							}
						?>
					</select>
				</div>
				<div class="wrap_crop_pict">
					<div id="croppic"></div>
					<div class="but_crop" id="cropContainerHeaderButton">Загрузить</div>
				</div>
				<div class="wrap_list_ingred">
					<div class="title_add_ing">Добавление ингредиента</div>
					<select class="t_ing">
						<?php
							$res_cat = mysqli_query($mysqli, "SELECT * FROM cat_ingredient ORDER BY name");
							while($row = mysqli_fetch_array($res_cat))
							{
								$cid = $row['id'];
								echo "<optgroup label='".$row['name']."'>";
								$res_ing = mysqli_query($mysqli, "SELECT * FROM ingredients WHERE cat_ingredient_id = $cid ORDER BY name");
								while($row2 = mysqli_fetch_array($res_ing))
								{
									echo "<option value='".$row2['id']."'>".$row2['name']."</option>";
								}
								echo "</optgroup>";
							}
						?>
					</select>
					<div class="title_mass">Вес</div>
					<input class="val_mass" type="text" value="100"/><br />
					<input type="button" class="but_add_ing" value="Добавить" />
					<div class='stat_ing' style='display:none;'></div>
				</div>
				<div class="wrap_table_ing">
					<table id="t_ing">
						<tr style="font-size: 20px; background-color: #7ed42f; color: white;">
							<td>Ингредиент</td>
							<td>Масса</td>
							<td>Белки</td>
							<td>Жиры</td>
							<td>Углеводы</td>
							<td>Ккал</td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="wrap_stat_rec">
					<div class="title_time">
						Время приготовления: <input class="val_time" type="text" value="60"/>(мин)
					</div>
					<div class="title_portion">
						Кол-во порций: <input class="val_portion" type="text" value="1"/>
					</div>
					<div class="title_prepo">
						Способ приготовления:<textarea class="val_prepo" placeholder="Способ приготовления..."></textarea>
					</div>
				</div>				
				<div class="wrap_but_rec">
					<input class="but_add_rec" type="button" value="Добавить" />
					<div class="error_add_recip"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">

	</div>
		<script>
		var flag_img = 0;
		var flag_ing = 0;
		var croppicHeaderOptions = {
				//uploadUrl:'img_save_to_file.php',
				cropData:{
					"dummyData":1,
					"dummyData2":"asdas"
				},
				cropUrl:'img_crop_to_file.php',
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				processInline:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);	

		$(".but_add_rec").click(function(){
			var name_rec = $(".recip_name").val();
			var cat = $(".cat_rec").val();
			var time_prep = $(".val_time").val();
			var count_port = $(".val_portion").val();
			var prepo = $(".val_prepo").val();
			var n = [];
			var m = [];
			var p = [];
			var f = [];
			var c = [];
			var k = [];
			var i = [];
			var j = 0;
			var crop_img = $(".croppedImg").attr("src");
			$("#t_ing tbody .r").each(function(){
				n[j] = $(this).children(".n").text();
				m[j] = $(this).children(".m").text();
				p[j] = $(this).children(".p").text();
				f[j] = $(this).children(".f").text();
				c[j] = $(this).children(".c").text();
				k[j] = $(this).children(".k").text();
				i[j] = $(this).children(".i").text();
				j++;
			});

			var avgprot = 0;
			var avgfat = 0;
			var avgcarb = 0;
			var avgkkal = 0;
			var avgmass = 0;

			for(var a = 0; a < p.length; a++){
				avgprot += parseFloat(p[a]);
				avgfat += parseFloat(f[a]);
				avgcarb += parseFloat(c[a]);
				avgkkal += parseFloat(k[a]);
				avgmass += parseFloat(m[a]);
			}
			avgprot /= p.length;
			avgfat /= p.length;
			avgcarb /= p.length;
			avgkkal /= p.length;
			avgmass /= count_port;

			var str = "name_rec=" + encodeURIComponent(name_rec) + "&cat=" + cat + "&time=" + time_prep + "&count=" + count_port + "&prepo=" + prepo + "&n=" + encodeURIComponent(n) + "&m=" + m + "&am=" + avgmass.toFixed(2) + "&p=" + avgprot.toFixed(2) + "&f=" + avgfat.toFixed(2) + "&c=" + avgcarb.toFixed(2) + "&k=" + avgkkal.toFixed(2) + "&i=" + i + "&crop_img=" + crop_img;
			send_request_add_rec(str);
		});

		$(".t_ing").change(function(){
			$t_ing = $(".t_ing").val();
			$str = "t=" + $t_ing;
			$('.stat_ing').remove();
			send_request_add_ing($str);
		});

		$('.but_add_ing').click(function(){
			insert_tr();
		});
		function insert_tr(){
			var id_ing = $('.id_ing').text();
			var name_ing = $('.name_ing').text();
			var mass_ing = $('.val_mass').val();
			var prot_ing = $('.prot_ing').text();
			var fat_ing = $('.fat_ing').text();
			var car_ing = $('.car_ing').text();
			var kkal_ing = $('.kkal_ing').text();

			$('#t_ing tr:last').after("<tr class='r'><td class='n'>"+name_ing+"</td><td class='m'>"+mass_ing+"</td><td class='p'>"+(mass_ing/100*prot_ing).toFixed(2)+"</td><td class='f'>"+(mass_ing/100*fat_ing).toFixed(2)+"</td><td class='c'>"+(mass_ing/100*car_ing).toFixed(2)+"</td><td class='k'>"+(mass_ing/100*kkal_ing).toFixed(2)+"</td><td class='i'><div style='display:none;'>"+id_ing+"</div></td></tr>");
		}
		function send_request_add_ing(str)
		{
			var r = new XMLHttpRequest();
			var url = "sel_ing.php";
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
				$(".wrap_list_ingred").append(r.responseText);
			};
			r.send(vars);
		}

		function send_request_add_rec(str)
		{
			var r = new XMLHttpRequest();
			var url = "sel_rec.php";
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
				if(this.responseText == "Не указано название рецепта!"){
					$(".error_add_recip").text("Не указано название рецепта!");
				}
				else{
					document.location = "index.php";
				}
			};
			r.send(vars);
		}
		$(document).ready(function(){
			$t_ing = $(".t_ing").val();
			$str = "t=" + $t_ing;
			$('.stat_ing').remove();
			send_request_add_ing($str);
		});
	</script>

</body>
</html>