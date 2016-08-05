					<?php 
						include "config.php";

						$logres = $_COOKIE["log"];
						$result_clients = mysqli_query($mysqli, "SELECT id FROM clients WHERE login =  '$logres'");
						$bol_enter_client = mysqli_fetch_assoc($result_clients);
						$client_id = $bol_enter_client['id'];
						$result = mysqli_query($mysqli, "SELECT * FROM recipes AS r JOIN recip_cat AS rc ON r.recip_cat_id = rc.cid ORDER BY r.watchs DESC LIMIT 12");
						while($row = mysqli_fetch_array($result))
						{
							$rid = $row['id'];
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
										</div>";
							if(isset($_COOKIE['log'])){
								$res = mysqli_query($mysqli, "SELECT COUNT(*) AS fl FROM favourite_recipes WHERE clients_id = $client_id AND recipes_id = $rid");	
								$a = mysqli_fetch_assoc($res);
								if($a['fl'] == 1){
									echo "<div class='recipe_add_act' onclick='send_apple_dislike(\"".$_COOKIE['log']."\",".$row['id'].")'>
											<img src='../img/apple_like_hov.png' class='app_like' /> Like
										</div>";
								}
								else
								{
									echo "<div class='recipe_add' onclick='send_apple_like(\"".$_COOKIE['log']."\",".$row['id'].")'>
											<img src='../img/apple_like.png' class='app_like' /> Like
										</div>";
								}
							}
									echo "<a href='recipe.php?r=".$row['id']."'>
											<div class='recipe_more'>
												Подробнее ->
											</div>
										</a>
								</div>
							</div>";
						}
					?>