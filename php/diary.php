<?php 
	include "config.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood - Личный кабинет</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../css/diary.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
	<script src="../js/reg_valid.js" type="text/javascript"></script>
	<script src="../js/log_valid.js" type="text/javascript"></script>
	<script src="../js/diary.js" type="text/javascript"></script>
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

		<?php 
			if(isset($_COOKIE['log']))
			{
				$did = $_GET['r'];
				$resul = mysqli_query($mysqli, "SELECT name FROM diary WHERE id = $did");
				$info_d = mysqli_fetch_array($resul);
		?>
		<div class="wrap_main_part">
			<div class="main_part">
				<h1 class="title"><?php echo $info_d['name']; ?></h1>
					<form method="post" action="#">
						<div class="wrap_diary_block">
							<div class="week_day_block monday">
								<div class="title_day">Понедельник</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 0");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block tuesday">
								<div class="title_day">Вторник</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 1");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block wednesday">
								<div class="title_day">Среда</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 2");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block thursday">
								<div class="title_day">Четверг</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 3");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block friday">
								<div class="title_day">Пятница</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 4");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block saturday">
								<div class="title_day">Суббота</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 5");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>
							<div class="week_day_block sunday">
								<div class="title_day">Воскресенье</div>
								<?php
									$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = 6");
									while($row = mysqli_fetch_array($result))
									{
										echo 	"<div class='added_recipe'>
													<div class='recipe_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
													<div class='recipe_name'>".$row['name']."</div>
													<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' disabled/></div>
													<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' disabled/></div>
													<div class='total_kkal_to_eat'><div class='wrap_kkal_to_eat'><span>".round($row['portions']*$row['kkal']/$row['portion_mass'])."</span><br/>ККал</div></div>
												</div>";
									}
								?>
							</div>

						</div>
					</form>
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