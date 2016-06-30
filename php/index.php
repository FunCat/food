<?php 
	include "config.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/recipe.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/slider.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/search.js" type="text/javascript"></script>
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

		<div class="wrap_slider">
			<div class="slider">
				<div class='left_point'></div>
				<div class="slide">
					<div class="pict_slide image_slide_1 active"></div>
					<div class="pict_slide image_slide_2"></div>
					<!--<img class="image_slide_2" src="../img/2.jpg" width="1200" height="600" />-->
				</div>
				<div class='right_point'></div>
			</div>
		</div>

		<div class="wrap_main_part">
			<div class="main_part">
				<h1>Следи за своим здоровьем вместе с нами!</h1>

				<!--<div class="recipe recipe_border recipe_animation">Button</div>-->

				<ul id="filters" class="clearfix">
					<li><span class="filter active" data-filter="desert first breakfast salat soup snacks drinks sauces">Все</span></li>
					<li><span class="filter" data-filter="desert">Выпечка и десерты</span></li>
					<li><span class="filter" data-filter="first">Основное блюдо</span></li>
					<li><span class="filter" data-filter="breakfast">Завтрак</span></li>
					<li><span class="filter" data-filter="salat">Салаты</span></li>
					<li><span class="filter" data-filter="soup">Супы</span></li>
					<li><span class="filter" data-filter="snacks">Закуски</span></li>
					<li><span class="filter" data-filter="drinks">Напитки</span></li>
					<li><span class="filter" data-filter="sauces">Соусы</span></li>
				</ul>

				<div id="receipeslist">
					<?php 
						$result = mysqli_query($mysqli, "SELECT * FROM recipes AS r JOIN recip_cat AS rc ON r.recip_cat_id = rc.cid");
						while($row = mysqli_fetch_array($result))
						{
							echo "<div class='receipe_block ".$row['desc']."' data-cat='".$row['desc']."'>
								<div class='receipe_block_wrapper'>
									<img src='".$row['main_foto']."' alt='' />
									<div class='kkal'>
										".$row['kkal']."<br />ККал
									</div>
									<div class='label'>
										<div class='label_text'>
											<div class='text_title'>".$row['name']."</div>
											<span class='text_category'>".$row['cname']."</span>
										</div>
										<div class='label_bg'></div>
									</div>
								</div>
								<div class='receipe_block_info'>
									<div class='hr_pad'>
										<hr class='recipe_hr' />
									</div>
										<div class='recipe_stats_left'>
											<img src='../img/b.png' class='icon_stat' /> ".$row['proteins']." г<br />
											<img src='../img/zh.png' class='icon_stat' /> ".$row['fats']." г<br />
											<img src='../img/y.png' class='icon_stat' /> ".$row['carboh']." г<br />
										</div>
										<div class='recipe_stats_right'>
											<img src='../img/k.png' class='icon_stat' /> ".$row['kkal']." К<br />
											<img src='../img/p.png' class='icon_stat' /> ".$row['count_portion']."<br />
											<img src='../img/v.png' class='icon_stat' /> ".$row['time']." м<br />
										</div>
										<div class='recipe_add'>
											Добавить
										</div>
										<a href='recipe.php?r=".$row['id']."'>
											<div class='recipe_more'>
												Подробнее ->
											</div>
										</a>
								</div>
							</div>";
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">

	</div>
</body>
</html>