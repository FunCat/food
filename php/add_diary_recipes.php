<?php
	include "config.php";

	if(isset($_POST["diaryname"])){
		$ddname = $_POST["diaryname"];
		$name = $_POST['rec'];
		$mname = explode(',', $name);
		$day = $_POST['day'];
		$mday = explode(',', $day);
		$time = $_POST['time'];
		$mtime = explode(',', $time);
		$mass = $_POST['mass'];
		$mmass = explode(',', $mass);

		$logres = $_COOKIE['log'];
		$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
		$info_client = mysqli_fetch_assoc($result_clients);

		$cl_id = $info_client['id'];
		mysqli_query($mysqli, "INSERT INTO diary (clients_id, name) VALUES ($cl_id, '$ddname')");

		$result_diaries = mysqli_query($mysqli, "SELECT MAX(id) AS id FROM diary WHERE clients_id = $cl_id");
		$info_diary = mysqli_fetch_assoc($result_diaries);

		$d_id = $info_diary['id'];

		for($j = 0; $j < count($mname); $j++){
			$bname = $mname[$j]; $bday = $mday[$j]; $btime = $mtime[$j]; $bmass = $mmass[$j];
			mysqli_query($mysqli, "INSERT INTO diary_recipes (diary_id, recipes_id, day, time, portions) VALUES ($d_id, $bname, $bday, '$btime', $bmass)");
		}
		header('location: http://dailyfood.online/php/diary.php');
	}
?>