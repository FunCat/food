<?php
	include "config.php";

if(isset($_POST["sname"])){
	$sname = $_POST['sname'];
	$scat = $_POST['scat'];
	$req = "SELECT * FROM recipes WHERE name LIKE '%$sname%'";
	if($scat != 0) $req = "$req AND recip_cat_id = $scat";

	$res=mysqli_query($mysqli, $req); 
	while($row=mysqli_fetch_array($res)){
		echo "<div class='rec'>
				<div class='rec_id' style='display:none;'>".$row['id']."</div>
				<div class='small_img'><img src='".$row['main_foto']."' /></div>
				<div class='rec_info'>
					<div class='title_rec_name'>".$row['name']."</div>
					<div class='rec_stat_block rec_left_block rec_prot'><img src='../img/b.png' /> ".$row['proteins']."г</div>
					<div class='rec_stat_block rec_fats'><img src='../img/zh.png' /> ".$row['fats']."г</div>
					<div class='rec_stat_block rec_car'><img src='../img/y.png' /> ".$row['carboh']."г</div>
					<div class='rec_stat_block rec_kkal'><img src='../img/k.png' /> ".$row['kkal']."</div>
					<div class='rec_stat_unblock rec_portion_mass'>".$row['portion_mass']."</div>
					<div class='rec_stat_block'><input class='but_add' type='button' onclick='clickAddRecipe(this)' value='Добавить' /></div>
				</div>
			</div>";
	}
}
?>