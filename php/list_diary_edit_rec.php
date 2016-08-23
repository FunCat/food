<?php 
	include "config.php";
	$did = $_GET['did'];
	$day = $_GET['day'];
	$result = mysqli_query($mysqli, "SELECT dr.*, r.id AS rid, r.kkal, r.proteins, r.fats, r.carboh, r.portion_mass, r.name, r.main_foto FROM diary_recipes AS dr JOIN recipes AS r ON dr.recipes_id = r.id WHERE dr.diary_id = $did AND dr.day = $day ORDER BY dr.time");
	echo "<div class='info_zone'>Ккал - <span class='avg_kkal'>0</span> / Б - <span class='avg_prot'>0</span> / Ж - <span class='avg_fats'>0</span> / У - <span class='avg_carboh'>0</span></div>";
	while($row = mysqli_fetch_array($result))
	{
		echo 	"<div class='rec'>
					<div class='close_img'><img class='cl_img' src='../img/close.png' onclick='removeRecipe(this)' /></div>
					<div class='rec_name'>".$row['name']."</div>
					<div class='rec_id' style='display:none;'>".$row['rid']."</div>
					<div class='left_column'>
						<div class='rec_foto'><a href='recipe.php?r=".$row['rid']."' target='_blank'><img src='".$row['main_foto']."' /></a></div>
						<div class='count_time'>
							<div class='time_to_eat'><img src='../img/eat.png' /> <input type='text' value='".substr($row['time'],0,5)."' /></div>
							<div class='count_to_eat'><img src='../img/mass.png' /> <input class='inp_text' type='text' value='".$row['portions']."' onChange='changeKkal(this)'/></div>
						</div>
						<div class='total_kkal_to_eat'>
							<div class='wrap_kkal_to_eat'>ККал<br/><span>".round($row['portions']*$row['kkal']/100)."</span><div class='hun_kkal' style='display: none;'>".($row['kkal']/100)."</div></div>
							<div class='wrap_proteins_to_eat'>Б<br/><span>".round($row['portions']*$row['proteins']/100)."</span><div class='hun_proteins' style='display: none;'>".($row['proteins']/100)."</div></div>
							<div class='wrap_fats_to_eat'>Ж<br/><span>".round($row['portions']*$row['fats']/100)."</span><div class='hun_fats' style='display: none;'>".($row['fats']/100)."</div></div>
							<div class='wrap_carboh_to_eat'>У<br/><span>".round($row['portions']*$row['carboh']/100)."</span><div class='hun_carboh' style='display: none;'>".($row['carboh']/100)."</div></div>
						</div>
					</div>
					<div class='right_column'>
						<div class='rec_ingred'>
							<table cellspacing='0'>
								<tr><td class='tab_name' colspan='2'>Основные ингредиенты</td></tr>";
								$rid_ing = $row['rid'];
								$result_ingred = mysqli_query($mysqli, "SELECT * FROM recip_ingredients AS ri JOIN ingredients AS i ON ri.ingred_id = i.id WHERE ri.recipes_id = $rid_ing ORDER BY ri.mass DESC LIMIT 5");
								while($row_ingred = mysqli_fetch_array($result_ingred))
								{
									echo "<tr><td><li>".$row_ingred['name']."</li></td><td class='mass_ing'>".$row_ingred['mass']." ".$row_ingred['units']."</td></tr>";
								}
							echo "</table>
						</div>
						<div class='rec_but_about'>
							<a href='recipe.php?r=".$row['rid']."'><div class='rec_about'>Подробнее-></div></a>
						</div>
					</div>
				</div>";
	}
?>