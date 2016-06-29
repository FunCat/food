<?php 
	include "config.php";
	include "exit.php";
	include "new_ingredient_script.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood - Добавление ингредиента</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
	<script src="../js/log_valid.js" type="text/javascript"></script>
	<script src="../js/reg_valid.js" type="text/javascript"></script>
	<style type="text/css">
		.ing_edition {
			margin: auto;
			font-size: 23px;
		}

		.ing_edition input[type='text'] {
			font-size: 23px;
			margin-bottom: 5px;
		}

		.ing_edition .ing_add {
			border: none;
			width: 200px;
			height: 40px;
			background-color: #7ed42f;
			color: white;
			font-size: 20px;
			margin-top: 20px;
		}

		.ing_edition .ing_add {
			cursor: pointer;
		}

		.ing_cat{
			font-size: 23px;
		}
	</style>
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
			<a href="index.php"><li>Главная</li></a>
			<a href="recipes.php"><li>Рецепты</li></a>
			<li>Питание</li>
			<li>Калькулятор</li>
			<li>Контакты</li>
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
					<div class="wrap_login">
						<div class="welcome_text">Здравствуйте, <?php echo $_COOKIE['log'];?>!</div>
						<a href="cabinet.php"><input class="but_cabinet but_hov" name="but_cabinet" type="button" value="Личный кабинет" /></a>
						<input class="but_login but_hov" name="but_exit" type="submit" value="Выйти" />
					</div>
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

		<?php 
			if(isset($_COOKIE['log']))
			{
				if($_COOKIE['perm'] == 1){
		?>
					<div class="wrap_main_part">
						<div class="main_part">
							<h1 class="title">Добавить ингредиент</h1>

							<form method="post" action="new_ingredient.php">
								<table class="ing_edition">
									<tr>
										<td>Название:</td>
										<td style="position: relative"><input class="ing_name" name="ing_name" type="text"/></td>
									</tr>
									<tr>
										<td>Белки:</td>
										<td style="position: relative"><input  class="ing_pro" name="ing_pro" type="text" /></td>
									</tr>
									<tr>
										<td>Жиры:</td>
										<td style="position: relative"><input  class="ing_fat" name="ing_fat" type="text" /></td>
									</tr>
									<tr>
										<td>Углеводы:</td>
										<td style="position: relative"><input  class="ing_car" name="ing_car" type="text"  /></td>
									</tr>
									<tr>
										<td>Ккал:</td>
										<td style="position: relative"><input  class="ing_kkal" name="ing_kkal" type="text" /></td>
									</tr>
									<tr>
										<td>Категория:</td>
										<td style="position: relative">
											<select class="ing_cat" name="ing_cat">
											<?php
												$result=mysqli_query($mysqli, "SELECT * FROM cat_ingredient"); 
												$i = 0;
												while($row=mysqli_fetch_array($result))
												{
													if($i == 14){
														echo "<option value='".$row['id']."' selected>".$row['name']."</option>";
													}
													else{
														echo "<option value='".$row['id']."'>".$row['name']."</option>";
													}
													$i++;
												}
											?>
											</select>
										</td>
									</tr>
									<tr>
										<td style="text-align: center" colspan="2"><input class="ing_add" name="ing_add" type="submit" value="Добавить"/></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
		<?php

				}
				else
				{
		?>
				<div class="mess_no_log">У вас нет прав!</div>
		<?php
				}
			}
			else
			{
		?>
			<div class="mess_no_log">Вы не авторизовались!</div>
		<?php
			}
		?>

	</div>

	<div class="footer">

	</div>
</body>
</html>