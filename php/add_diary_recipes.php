<?php
	include "config.php";

	if(isset($_POST["diaryname"])){
		$ddname = $_POST["diaryname"];
		if($ddname == ""){
			echo "Не указано название дневника!";
		}
		else{
			$logres = $_COOKIE['log'];
			$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
			$info_client = mysqli_fetch_assoc($result_clients);

			$cl_id = $info_client['id'];
			mysqli_query($mysqli, "INSERT INTO diary (clients_id, name, week_kkal, diary_type) VALUES ($cl_id, '$ddname', 0, 0)");

			$result_diaries = mysqli_query($mysqli, "SELECT MAX(id) AS id FROM diary WHERE clients_id = $cl_id");
			$info_diary = mysqli_fetch_assoc($result_diaries);

			$d_id = $info_diary['id'];
			echo $d_id;
		}
	}
?>