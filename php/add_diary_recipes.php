<?php
	include "config.php";

	if(isset($_POST["diaryname"])){
		$ddname = $_POST["diaryname"];
		if($ddname == ""){
			echo "Не указано название дневника!";
			
		}
		else{
			$name = $_POST['rec'];
			$mname = explode(',', $name);
			$day = $_POST['day'];
			$mday = explode(',', $day);
			$time = $_POST['time'];
			$mtime = explode(',', $time);
			$mass = $_POST['mass'];
			$mmass = explode(',', $mass);
			$week_kkal = $_POST["week_mass"];

			$logres = $_COOKIE['log'];
			$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
			$info_client = mysqli_fetch_assoc($result_clients);

			$cl_id = $info_client['id'];
			mysqli_query($mysqli, "INSERT INTO diary (clients_id, name, week_kkal) VALUES ($cl_id, '$ddname', $week_kkal)");

			$result_diaries = mysqli_query($mysqli, "SELECT MAX(id) AS id FROM diary WHERE clients_id = $cl_id");
			$info_diary = mysqli_fetch_assoc($result_diaries);

			$d_id = $info_diary['id'];

			for($j = 0; $j < count($mname); $j++){
				$bname = $mname[$j]; $bday = $mday[$j]; $btime = $mtime[$j]; $bmass = $mmass[$j];
				mysqli_query($mysqli, "INSERT INTO diary_recipes (diary_id, recipes_id, day, time, portions) VALUES ($d_id, $bname, $bday, '$btime', $bmass)");
			}
		}
	}
?>