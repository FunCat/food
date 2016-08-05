<?php 
	include "config.php";
	$logres = $_COOKIE["log"];
	$result_clients = mysqli_query($mysqli, "SELECT id FROM clients WHERE login =  '$logres'");
	$bol_enter_client = mysqli_fetch_assoc($result_clients);
	$client_id = $bol_enter_client['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM favourite_recipes WHERE clients_id = $client_id");

	while($row = mysqli_fetch_array($result)){
		$rid = $row['recipes_id'];
		$res = mysqli_query($mysqli, "SELECT * FROM recipes AS r JOIN recip_cat AS rc ON r.recip_cat_id = rc.cid WHERE r.id = $rid");
		$r = mysqli_fetch_assoc($res);
		echo "<div class='receipe_block ".$r['desc']."' data-cat='".$r['desc']."'>
				<div class='receipe_block_wrapper'>
					<img src='".$r['main_foto']."' alt='' />
					<div class='kkal'>".$r['kkal']."<br />KKal</div>
					<div class='label'>
						<div class='label_text'>
							<div class='text_title'>".$r['name']."</div>
							<span class='text_category'>".$r['cname']."</span>
						</div>
						<div class='label_bg'></div>
					</div>
				</div>
				<div class='receipe_block_info'>
					<div class='hr_pad'>
						<hr class='recipe_hr' />
					</div>
					<div class='recipe_stats_left'>
						<img src='../img/b.png' class='icon_stat' /> ".$r['proteins']." г<br />
						<img src='../img/zh.png' class='icon_stat' /> ".$r['fats']." г<br />
						<img src='../img/y.png' class='icon_stat' /> ".$r['carboh']." г<br />
					</div>
					<div class='recipe_stats_right'>
						<img src='../img/k.png' class='icon_stat' /> ".$r['kkal']." К<br />
						<img src='../img/p.png' class='icon_stat' /> ".$r['count_portion']."<br />
						<img src='../img/v.png' class='icon_stat' /> ".$r['time']." м<br />
					</div>
					<div class='recipe_add_act' onclick='send_apple_dislike(\"".$_COOKIE['log']."\",".$r['id'].")'>
						<img src='../img/apple_like_hov.png' class='app_like' /> Like
					</div>
					<a href='recipe.php?r=".$r['id']."'>
						<div class='recipe_more'>
							Подробнее ->
						</div>
					</a>
				</div>
			</div>";
		}
?>