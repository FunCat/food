$(document).ready(function(){
	$(".but_calc").click(function() {
		if($(".pol_m").checked){
			int k = 10 * $(".p_weigth").val() + 6,25 * $(".p_height").val() – 5 * $(".p_age").val() + 5;
			$(".res_calc").val = k;
		}	
	});	
});