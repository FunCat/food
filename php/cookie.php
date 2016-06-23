<?php

	include "config.php";
	if (isset($_POST["log_log"]))
	{
		$logres = $_POST["log_log"];
		$pasres = $_POST["log_pass"];
		$bul = strpbrk($logres, "'");
		$bul2 = strpbrk($pasres, "'");

		if($bul == FALSE && $bul2 == FALSE)
		{
			$pasres = md5(md5(trim($pasres)));

			$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres' AND pass =  '$pasres'");
			$bol_enter_client = mysqli_num_rows($result_clients);

			$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres' AND pass =  '$pasres'");
			$bol_enter_master = mysqli_num_rows($result_masters);

			if($bol_enter_master == 1){
				$resul = mysqli_query($mysqli, "SELECT firstname, permissions_id FROM masters WHERE login =  '$logres'");	
			}
			else if($bol_enter_client == 1){
				$resul = mysqli_query($mysqli, "SELECT firstname, permissions_id FROM clients WHERE login =  '$logres'");
			}

			if($bol_enter_client == 1 || $bol_enter_master == 1)
			{
				$info = mysqli_fetch_assoc($resul);
				$nameres = $info["firstname"];
				$permission = $info["permissions_id"];
				SetCookie("name", "$nameres", time()+4800);
				SetCookie("log", "$logres", time()+4800);
				SetCookie("perm", "$permission", time()+4800);
				header('location:'.$_SERVER['HTTP_REFERER']);
			} 
			else
			{
				echo 'Неправильный логин или пароль!';
			}
		}
		else
		{
			echo 'Неправильный логин или пароль!';
		}
	}
?>