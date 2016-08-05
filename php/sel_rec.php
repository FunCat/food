<?php

	include "config.php";

	if(isset($_POST['name_rec'])){
		$name_rec = $_POST['name_rec'];
		if($name_rec != ""){
			$cat = $_POST['cat'];
			$time = $_POST['time'];
			$count = $_POST['count'];
			$prepo = $_POST['prepo'];
			$name = $_POST['n'];
			$mname = explode(',', $name);
			$mass = $_POST['count_mass'];
			$mmass = explode(',', $mass);
			$unit = $_POST['u'];
			$munit = explode(',', $unit);
			$avgmass = $_POST['am'];
			$avgprot = $_POST['p'];
			$avgfat = $_POST['f'];
			$avgcarb = $_POST["c"];
			$avgkkal = $_POST["k"];
			$id = $_POST["i"];
			$mid = explode(',', $id);
			$crop_img = $_POST['crop_img'];


			mysqli_query($mysqli, "INSERT INTO recipes (name, proteins, fats, carboh, kkal, count_portion, portion_mass, main_ingredients, recip_cat_id, text_preporation, time, data_creation,main_foto) VALUES ('$name_rec', $avgprot, $avgfat, $avgcarb, $avgkkal, $count, $avgmass, '$name', $cat, '$prepo', $time, CURDATE(), '$crop_img')");

			$result_rec = mysqli_query($mysqli, "SELECT id FROM recipes WHERE name = '$name_rec'");
			$info_rec = mysqli_fetch_assoc($result_rec);
			$rid = $info_rec['id'];

			for($j = 0; $j < count($mname); $j++){
				$bid = $mid[$j]; $bmass = $mmass[$j]; $bunit = $munit[$j];
				mysqli_query($mysqli, "INSERT INTO recip_ingredients (recipes_id, ingred_id, mass, units) VALUES ($rid, $bid, $bmass, '$bunit')");
			}
		}
		else{
			echo "Не указано название рецепта!";
		}
	}
?>