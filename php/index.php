<?php 
	include "config.php";
	include "cookie.php";
	include "reg_script.php";
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Здоровое питание</title>
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/recipe.css" />
	<link rel="stylesheet" href="../css/log_dialog.css" />
	<link rel="stylesheet" href="../fonts/font.css" />
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="../js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../js/index.js" type="text/javascript"></script>
	<script src="../js/slider.js" type="text/javascript"></script>
	<script src="../js/search.js" type="text/javascript"></script>
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

	<!--<div id="log_dialog" class="back_dialog">
		<div class="content_dialog">
			<a class="close_dialog" href="javascript: closeLogDialog()"></a>
			<div class="switch_form">
				<div class="vxod">Вход</div>
				<div class="reg">Регистрация</div>
			</div>
			<hr class="log_hr" />
			<table class="form_acc">
				<tr>
					<td class="text_log">Логин:</td>
					<td><input class="pole_log" type="text" /></td>
				</tr>
				<tr>
					<td class="text_pass">Пароль:</td>
					<td><input class="pole_pass" type="password" /></td>
				</tr>
			</table>
			<hr class="log_hr2" />
			<div class="but_log">Войти</div>
		</div>
	</div>-->



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
					<div class="title_dialog">Зарегистрироваться</div>
					<div class="wrap_box">
						<input class="pole_last" name="reg_last" type="text" placeholder="Фамилия" />
						<input class="pole_first" name="reg_first" type="text" placeholder="Имя" />
						<input class="pole_middle" name="reg_middle" type="text" placeholder="Отчество" />
						<input class="pole_log" name="reg_log" type="text" placeholder="Логин" />
						<input class="pole_pass" name="reg_pass" type="password" placeholder="Пароль"/>
						<input class="pole_pass" name="reg_pass2" type="password" placeholder="Повторите пароль"/>
						<input class="but_reg" name="but_reg" type="submit" value="Зарегистрироваться" />
					</div>
				</form>
			</div>
		</div>
	</div>




	<div class="block_menu">
		<ul class="list_menu">
			<li class="active_point_menu">Главная</li>
			<li>Рецепты</li>
			<li>Диеты</li>
			<li>Калькулятор</li>
			<li>Контакты</li>
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

			<!--<header>
				<div class="wrap_menu">
					<div class="header">
						<div class="wrap_point_menu">
							<div class="header_menu">
								<div class="point_menu">
									Gallery
								</div>
								<div class="point_menu">
									Projects
								</div>
								<div class="point_menu">
									About us
								</div>
								<div class="point_menu">
									Main
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>-->

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

				

				<!-- Прошлый блок
				<div class="wrap_recipe">
					<div class="wrapper_recipe">
						<div class="recipe_block">
							<div class="recipe_pict">
								<img class="recipe_img" src="../img/1_sq.jpg" />
							</div>
							<div class="recipe_title">
								Новый рецепт
							</div>
							<hr class="recipe_hr" />
							<div class="recipe_stats">
								Белки: 1.50 г<br />
								Жиры: 0.50 г<br />
								Углеводы: 21.00 г<br />
								Ккал: 89.30 ккал<br />
							</div>
							<div class="recipe_more">
								Добавить
							</div>
							<div class="recipe_more">
								Подробнее ->
							</div>
						</div>
					</div>
				</div>-->


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


				<div class="receipe_block desert" data-cat="desert">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="kkal">
							404<br />KKal
						</div>
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт Новый рецепт Новый рецепт Новый рецепт</div>
								<span class="text_category">Выпечка и десерт</span>
								<!--<div class="recipe_more">Подробнее -></div>-->
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info">
						<div class="hr_pad">
							<hr class="recipe_hr" />
						</div>
							<div class="recipe_stats">
								Белки: 1.50 г<br />
								Жиры: 0.50 г<br />
								Углеводы: 21.00 г<br />
								Ккал: 89.30 ккал<br />
							</div>
							<div class="recipe_add">
								Добавить
							</div>
							<div class="recipe_more">
								Подробнее ->
							</div>
					</div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>

				<div class="receipe_block first" data-cat="first">
					<div class="receipe_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="label">
							<div class="label_text">
								<div class="text_title">Новый рецепт</div>
								<span class="text_category">Основное блюдо</span>
							</div>
							<div class="label_bg"></div>
						</div>
					</div>
					<div class="receipe_block_info"></div>
				</div>
				


			</div>


				<!-- One of the varient of block

			<div id="recs">
				<div class="recs_block">
					<div class="recs_block_wrapper">
						<img src="../img/1.jpg" alt="" />
						<div class="recs_label">
							<div class="recs_label_text">
								<div class="recs_text_title">Новый рецепт</div>
								<span class="recs_text_category">Основное блюдо</span>
							</div>
							<div class="recs_ingredietns">
								<div>Ингредиенты:</div>
								<ul>
									<li>Картошка 5 шт.</li>
									<li>Морковка 1 шт.</li>
									<li>Луковица 1 шт.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
				-->
			</div>
		</div>
	</div>

	<div class="footer">

	</div>
</body>
</html>