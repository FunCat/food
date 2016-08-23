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
			$time = $_POST['time'];
			$mtime = explode(',', $time);
			$mass = $_POST['mass'];
			$mmass = explode(',', $mass);
			$mday = $_POST['flag'];
			$week_kkal = 0;

			$result_clients = mysqli_query($mysqli, "DELETE FROM diary_recipes WHERE diary_id = $did AND day = $mday");

			for($j = 0; $j < count($mname); $j++){
				$bname = $mname[$j]; $btime = $mtime[$j]; $bmass = $mmass[$j];
				mysqli_query($mysqli, "INSERT INTO diary_recipes (diary_id, recipes_id, day, time, portions) VALUES ($did, $bname, $mday, '$btime', $bmass)");
			}

			$wmonday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 0");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wmonday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wtuesday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 1");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wtuesday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wwednesday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 2");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wwednesday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wthursday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 3");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wthursday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wfriday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 4");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wfriday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wsaturday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 5");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wsaturday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$wsunday = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 6");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wsunday += $info_week_d['kkal'] / 100 * $info_week_d['port'];
			}
			$week_kkal = round(($wmonday + $wtuesday + $wwednesday + $wthursday + $wfriday + $wsaturday + $wsunday) / 7);
			$result_clients = mysqli_query($mysqli, "UPDATE diary SET name = '$ddname', week_kkal = $week_kkal WHERE id = $did");
		}
	}
?>