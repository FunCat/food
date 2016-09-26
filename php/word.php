<?php 
	include "config.php";
		header("Content-Type: application/vnd.msword");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("content-disposition: attachment; filename = recipe_list.doc");
	$i = $_GET['r'];
	echo "<html>";
	$result_word = mysqli_query($mysqli, "SELECT ing.name AS name, ring.mass AS mass, ring.units AS units FROM ingredients AS ing INNER JOIN recip_ingredients AS ring ON ring.ingred_id = ing.id INNER JOIN recipes AS rec ON ring.recipes_id = rec.id INNER JOIN diary_recipes AS dir ON dir.recipes_id = rec.id INNER JOIN diary AS d ON d.id = dir.diary_id WHERE d.id = $i ORDER BY ing.name");
	echo "<table>";
	while($row_word = mysqli_fetch_array($result_word))
	{
		echo "<tr><td>".$row_word['name']."</td><td class='mass_units'>".$row_word['mass']." ".$row_word['units']."</td></tr>";
	}
	echo "</table>";
	echo "</html>";

	echo  "<script type='text/javascript'>";
	echo "window.close();";
	echo "</script>";;
?>

