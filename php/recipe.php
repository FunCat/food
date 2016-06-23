<?php 
	include "config.php";
	include "cookie.php";
	include "reg_script.php";
	include "all_script.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../css/recipe_list.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
	<script src="../js/reg_valid.js" type="text/javascript"></script>
	<script src="../js/log_valid.js" type="text/javascript"></script>
	<script src="../js/recipe.js" type="text/javascript"></script>
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
			$rid = $_GET['r'];
			$result = mysqli_query($mysqli, "SELECT * FROM recipes WHERE id = $rid");
			$row = mysqli_fetch_array($result);
		?>


		<div class="wrap_main_part">
			<div class="main_part">
				<div class="section_title">
					<h1><?php echo $row['name']; ?></h1>
				</div>

				<div class="foto_recipe">
					<div class="main_foto"><img class="main_foto_f" src="<?php echo $row['main_foto']; ?>" /></div>
					<div class="wrap_fotos">
						<div class="fotos">
							<div class="wrap_small_foto"><?php if($row['main_foto'] != "") echo "<img class='small_foto'  src='".$row['main_foto']."' onclick='change_main_foto(\"".$row['main_foto']."\")'/>"; ?></div>
							<div class="wrap_small_foto"><?php if($row['foto1'] != "") echo "<img class='small_foto'  src='".$row['foto1']."' onclick='change_main_foto(\"".$row['foto1']."\")'/>"; ?></div>
							<div class="wrap_small_foto"><?php if($row['foto2'] != "") echo "<img class='small_foto'  src='".$row['foto2']."' onclick='change_main_foto(\"".$row['foto2']."\")'/>"; ?></div>
							<div class="wrap_small_foto"><?php if($row['foto3'] != "") echo "<img class='small_foto'  src='".$row['foto3']."' onclick='change_main_foto(\"".$row['foto3']."\")'/>"; ?></div>
						</div>
					</div>
				</div>

				<div class="wrap_recipe_ingred">
					<div class="recipe_ingred">
						Ингредиенты
					</div>
					<div class="list_ingredients">
						<ul>
							<table>
							<?php
								$result_ingred = mysqli_query($mysqli, "SELECT * FROM recip_ingredients AS ri JOIN ingredients AS i ON ri.ingred_id = i.id WHERE ri.recipes_id = $rid");
								while($row_ingred = mysqli_fetch_array($result_ingred))
								{
									echo "<tr><td><li>".$row_ingred['name']."</li></td><td class='mass_units'>".$row_ingred['mass'].$row_ingred['units']."</td></tr>";
								}
							?>
							</table>
						</ul>

					</div>
				</div>


				<div class="stats">
					<div class="small_block_stat"><img src="../img/b.png" /><?php echo $row['proteins']; ?>г</div>
					<div class="small_block_stat"><img src="../img/zh.png" /><?php echo $row['fats']; ?>г</div>
					<div class="small_block_stat"><img src="../img/y.png" /><?php echo $row['carboh']; ?>г</div>
					<div class="small_block_stat"><img src="../img/k.png" /><?php echo $row['kkal']; ?>К</div>
					<div class="small_block_stat"><img src="../img/p.png" /><?php echo $row['count_portion']; ?></div>
					<div class="small_block_stat"><img src="../img/v.png" /><?php echo $row['time']; ?>м</div>
				</div>

				<div class="prepare_title">
					<h1>Способ приготовления</h1>
				</div>
				<div class="list_preparing">
					<div class="content_preparing">
						<?php echo $row['text_preporation']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">

	</div>
</body>
</html>