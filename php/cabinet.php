<?php 
	include "config.php";
	include "cookie.php";
	include "reg_script.php";
	include "cabinet_script.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Здоровое питание</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/cabinet.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/jqueryforchecking.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>

	
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
				<form method="post" action="index.php">
					<div class="title_dialog">Войти в учётную запись</div>
					<div class="wrap_box">
						<input class="pole_log" name="pole_log" type="text" placeholder="Логин" />
						<input class="pole_pass" name="pole_pass" type="password" placeholder="Пароль"/>
						<input class="but_vxod" name="but_log" type="submit" value="Войти" />
					</div>
				</form>
			</div>
			<div class="reg_content">
				<form method="post" action="index.php">
					<div class="title_dialog">Регистрация</div>
					<div class="wrap_box">
						<input class="pole_last" name="reg_last" type="text" placeholder="Фамилия" />
						<input class="pole_first" name="reg_first" type="text" placeholder="Имя" />
						<input class="pole_log" name="reg_log" type="text" placeholder="Логин" />
						<input class="pole_pass" name="reg_pass" type="password" placeholder="Пароль"/>
						<input class="pole_pass" name="reg_pass2" type="password" placeholder="Повторите пароль"/>
						<input class="but_reg" name="but_reg" type="submit" value="Регистрация" />
					</div>
				</form>
			</div>
		</div>
	</div>




	<div class="block_menu">
		<ul class="list_menu">
			<a href="index.php"><li>Главная</li></a>
			<a href="recipes.php"><li>Рецепты</li></a>
			<li>Диеты</li>
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
					<form method="post" action="index.php">
						<div class="wrap_login">
							<div class="welcome_text">Здравствуйте, <?php echo $_COOKIE['log'];?>!</div>
							<input class="but_cabinet but_hov" name="but_cabinet" type="submit" value="Личный кабинет" />
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

		<?php 
			if(isset($_COOKIE['log']))
			{
		?>
		<div class="wrap_main_part">
			<div class="main_part">
				<h1 class="title">Настройка аккаунта</h1>
					<?php 
						$logres = $_COOKIE["log"];

						$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
						$bol_enter_client = mysqli_num_rows($result_clients);

						$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres'");
						$bol_enter_master = mysqli_num_rows($result_masters);

						if($bol_enter_master == 1){
							$resul = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres'");	
						}
						else if($bol_enter_client == 1){
							$resul = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
						}

						if($bol_enter_client == 1 || $bol_enter_master == 1)
						{
							$info = mysqli_fetch_assoc($resul);
							$lastres = $info["lastname"];
							$nameres = $info["firstname"];
							$middres = $info["middlename"];
							$telres = $info["telephone"];
							$mailres = $info["mail"];
						} 
					 ?>
					<form method="post" action="#">
					<table class="acc_property">
						<tr>
							<td>Фамилия:</td>
							<td><input name="my_lastname" type="text" <?php  echo"value='$lastres'"; ?> /></td>
						</tr>
						<tr>
							<td>Имя:</td>
							<td><input name="my_firstname" type="text" <?php  echo"value='$nameres'"; ?> /></td>
						</tr>
						<tr>
							<td>Отчество:</td>
							<td><input name="my_middlename" type="text" <?php  echo"value='$middres'"; ?> /></td>
						</tr>
						<tr>
							<td>Телефон:</td>
							<td><input name="my_tel" type="text"  <?php  echo"value='$telres'"; ?> /></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input name="my_mail" type="text"  <?php  echo"value='$mailres'"; ?> /></td>
						</tr>
						<tr>
							<td style="text-align: center" colspan="2"><input class="but_upd" name="acc_update" type="submit" value="Изменить"/></td>
						</tr>
					</table>
					</form>
					<?php echo $prov; ?>
			</div>
		</div>

		<?php
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