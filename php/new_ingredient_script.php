<?php
	
	if(isset($_REQUEST['ing_add'])){
		$name = $_REQUEST['ing_name'];
		$pro = $_REQUEST['ing_pro'];
		$fat = $_REQUEST['ing_fat'];
		$car = $_REQUEST['ing_car'];
		$kkal = $_REQUEST['ing_kkal'];
		$cat = $_REQUEST['ing_cat'];

		$pro = str_replace(",",".",$pro);
		$fat = str_replace(",",".",$fat);
		$car = str_replace(",",".",$car);
		$kkal = str_replace(",",".",$kkal);

		mysqli_query($mysqli, "INSERT INTO ingredients (name, proteins, fats, carboh, kkal, cat_ingredient_id) VALUES ('$name', $pro, $fat, $car, $kkal, $cat)");
	}


?>