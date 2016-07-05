<?php

	include "config.php";

	if(isset($_POST['t'])){
		$t = $_POST['t'];
		$result_ing = mysqli_query($mysqli, "SELECT * FROM ingredients WHERE id = $t");
		$info_ing = mysqli_fetch_assoc($result_ing);
		$id = $info_ing['id'];
		$name = $info_ing['name'];
		$prot = $info_ing['proteins'];
		$fat = $info_ing['fats'];
		$car = $info_ing['carboh'];
		$kkal = $info_ing['kkal'];

		echo 	"<div class='stat_ing' style='display:none;'>
					<div class='id_ing'>$id</div>
					<div class='name_ing'>$name</div>
					<div class='prot_ing'>$prot</div>
					<div class='fat_ing'>$fat</div>
					<div class='car_ing'>$car</div>
					<div class='kkal_ing'>$kkal</div>
				</div>";

	}
?>