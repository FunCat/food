<?php 

	if(isset($_REQUEST["but_exit"]))
	{
		SetCookie("name","",time()-4800);
		SetCookie("log","",time()-4800);
		SetCookie("perm", "", time()-4800);
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

?>