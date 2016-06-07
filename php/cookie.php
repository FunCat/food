<?php

if (isset($_REQUEST["but_log"]))
{
	$logres = $_REQUEST["pole_log"];
	$pasres = $_REQUEST["pole_pass"];
	$bul = strpbrk($logres, "'");
	$bul2 = strpbrk($pasres, "'");

	if($bul == FALSE && $bul2 == FALSE)
	{
		$pasres = md5(md5(trim($pasres)));
		echo $logres; echo $pasres;

		$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres' AND pass =  '$pasres'");
		$bol_enter_client = mysqli_num_rows($result_clients);

		$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres' AND pass =  '$pasres'");
		$bol_enter_master = mysqli_num_rows($result_masters);

		if($bol_enter_master == 1){
			$resul = mysqli_query($mysqli, "SELECT firstname FROM masters WHERE login =  '$logres'");	
		}
		else if($bol_enter_client == 1){
			$resul = mysqli_query($mysqli, "SELECT firstname FROM clients WHERE login =  '$logres'");
		}

		if($bol_enter_client == 1 || $bol_enter_master == 1)
		{
			$info = mysqli_fetch_assoc($resul);
			$nameres = $info["firstname"];
			SetCookie("name", "$nameres", time()+4800);
			SetCookie("log", "$logres", time()+4800);
			$prov_in = "Вы успешно вошли"; 
			header('location:'.$_SERVER['HTTP_REFERER']);
		} 
		else
		{
			$prov_in = "Вы неправильно ввели данные";
			header('location:'.$_SERVER['HTTP_REFERER']);
		}
	}
	else
	{
		$prov_in = "Вы неправильно ввели данные"; 
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}

if(isset($_REQUEST["but_exit"]))
{
	$nameres = $_COOKIE['name'];
	$logres = $_COOKIE['log'];
	
	$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
	$bol_enter_client = mysqli_num_rows($result_clients);

	$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres'");
	$bol_enter_master = mysqli_num_rows($result_masters);

	SetCookie("name","$nameres",time()-4800);
	SetCookie("log","$logres",time()-4800);
	header('location:'.$_SERVER['HTTP_REFERER']);
}
?>