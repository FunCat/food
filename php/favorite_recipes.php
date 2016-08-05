<?php 
	include "config.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>DailyFood - Рецепты</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/recipe.css" />
	<link rel="stylesheet" href="../css/trackbar.css" />
	<link rel="stylesheet" href="../css/recipes.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/jquery-1.6.1.min.js" type="text/javascript" ></script>
	<script src="../js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../js/jquery.ui-slider.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/recipes.js" type="text/javascript"></script>
	<script src="../js/hamburger.js" type="text/javascript"></script>
	<script src="../js/search_rec_fav.js" type="text/javascript"></script>
	<script src="../js/reg_valid.js" type="text/javascript"></script>
	<script src="../js/log_valid.js" type="text/javascript"></script>
	<script src="../js/log_dialog.js" type="text/javascript"></script>
	<script type="text/javascript">       
        $(document).ready(function(){  
            show_likes();  
        });  
    </script>
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
			<?php if(isset($_COOKIE['log'])){ ?>
			<a href="diaries.php"><li>Личый дневник</li></a>
			<a href="favorite_recipes.php"><li class="active_point_menu">Любимые рецепты</li></a>
			<?php }?>
			<a href="index.php"><li>Главная</li></a>
			<a href="recipes.php"><li>Рецепты</li></a>
			<?php
				$rc = mysqli_query($mysqli,'SELECT COUNT(*) AS c FROM recipes');
				$res_rc = mysqli_fetch_assoc($rc);
				$row_count = $res_rc['c'] - 1;
				$rand = range(1, $row_count);
				shuffle($rand);
				$res = mysqli_query($mysqli, "SELECT * FROM recipes LIMIT ".$rand[0].", 1");
				$rand_recip = mysqli_fetch_assoc($res);
				$ri = $rand_recip['id'];
				echo "<a href='recipe.php?r=".$ri."'><li>Случайный рецепт</li></a>"
			?>
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
					<h1>Любимые рецепты</h1>
				</div>

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

				<div id="receipeslist"></div>

			</div>
		</div>
	</div>

	<div class="footer">

	</div>
</body>
</html>