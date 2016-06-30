<?php
	include "config.php";

	if(isset($_POST["diaryname"])){
		$ddname = $_POST["diaryname"];
		if($ddname == ""){
			echo "Не указано название дневника!";
			
		}
		else{
			$did = $_POST['did'];
			$name = $_POST['rec'];
			$mname = explode(',', $name);
			$day = $_POST['day'];
			$mday = explode(',', $day);
			$time = $_POST['time'];
			$mtime = explode(',', $time);
			$mass = $_POST['mass'];
			$mmass = explode(',', $mass);
			$week_kkal = $_POST["week_mass"];

			$result_clients = mysqli_query($mysqli, "UPDATE diary SET name = '$ddname', week_kkal = $week_kkal WHERE id = $did");

			$logres = $_COOKIE['log'];
			$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
			$info_client = mysqli_fetch_assoc($result_clients);

			$cl_id = $info_client['id'];
			
			$result_clients = mysqli_query($mysqli, "DELETE FROM diary_recipes WHERE diary_id = $did");

			for($j = 0; $j < count($mname); $j++){
				$bname = $mname[$j]; $bday = $mday[$j]; $btime = $mtime[$j]; $bmass = $mmass[$j];
				mysqli_query($mysqli, "INSERT INTO diary_recipes (diary_id, recipes_id, day, time, portions) VALUES ($did, $bname, $bday, '$btime', $bmass)");
			}
		}
	}
?>