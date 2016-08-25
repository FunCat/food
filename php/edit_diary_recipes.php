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
			$week_prot = 0;
			$week_fats = 0;
			$week_carboh = 0;

			$result_clients = mysqli_query($mysqli, "DELETE FROM diary_recipes WHERE diary_id = $did AND day = $mday");

			for($j = 0; $j < count($mname); $j++){
				$bname = $mname[$j]; $btime = $mtime[$j]; $bmass = $mmass[$j];
				mysqli_query($mysqli, "INSERT INTO diary_recipes (diary_id, recipes_id, day, time, portions) VALUES ($did, $bname, $mday, '$btime', $bmass)");
			}

			$wmonday_k = 0;
			$wmonday_p = 0;
			$wmonday_f = 0;
			$wmonday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 0");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wmonday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wmonday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wmonday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wmonday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wtuesday_k = 0;
			$wtuesday_p = 0;
			$wtuesday_f = 0;
			$wtuesday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 1");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wtuesday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wtuesday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wtuesday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wtuesday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wwednesday_k = 0;
			$wwednesday_p = 0;
			$wwednesday_f = 0;
			$wwednesday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 2");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wwednesday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wwednesday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wwednesday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wwednesday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wthursday_k = 0;
			$wthursday_p = 0;
			$wthursday_f = 0;
			$wthursday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 3");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wthursday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wthursday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wthursday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wthursday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wfriday_k = 0;
			$wfriday_p = 0;
			$wfriday_f = 0;
			$wfriday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 4");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wfriday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wfriday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wfriday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wfriday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wsaturday_k = 0;
			$wsaturday_p = 0;
			$wsaturday_f = 0;
			$wsaturday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 5");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wsaturday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wsaturday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wsaturday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wsaturday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$wsunday_k = 0;
			$wsunday_p = 0;
			$wsunday_f = 0;
			$wsunday_c = 0;
			$week_d = mysqli_query($mysqli, "SELECT dr.portions AS port, r.kkal AS kkal, r.proteins AS proteins, r.fats AS fats, r.carboh AS carboh FROM diary_recipes AS dr JOIN recipes AS r ON r.id = dr.recipes_id WHERE dr.diary_id = $did AND dr.day = 6");
			while($info_week_d = mysqli_fetch_array($week_d)){
				$wsunday_k += $info_week_d['kkal'] / 100 * $info_week_d['port'];
				$wsunday_p += $info_week_d['proteins'] / 100 * $info_week_d['port'];
				$wsunday_f += $info_week_d['fats'] / 100 * $info_week_d['port'];
				$wsunday_c += $info_week_d['carboh'] / 100 * $info_week_d['port'];
			}
			$week_kkal = round(($wmonday_k + $wtuesday_k + $wwednesday_k + $wthursday_k + $wfriday_k + $wsaturday_k + $wsunday_k) / 7);
			$week_prot = round(($wmonday_p + $wtuesday_p + $wwednesday_p + $wthursday_p + $wfriday_p + $wsaturday_p + $wsunday_p) / 7);
			$week_fats = round(($wmonday_f + $wtuesday_f + $wwednesday_f + $wthursday_f + $wfriday_f + $wsaturday_f + $wsunday_f) / 7);
			$week_carboh = round(($wmonday_c + $wtuesday_c + $wwednesday_c + $wthursday_c + $wfriday_c + $wsaturday_c + $wsunday_c) / 7);
			$result_clients = mysqli_query($mysqli, "UPDATE diary SET name = '$ddname', week_kkal = $week_kkal, week_prot = $week_prot, week_fats = $week_fats, week_carboh = $week_carboh WHERE id = $did");
		}
	}
?>