$(document).ready(function(){
	$(".search_button").click(function(){
		var r_name = $('.pole_search').val();
		var r_kkal_s = $('#kkal_min').val();
		var r_kkal_b = $('#kkal_max').val();
		var r_prot_s = $('#proteins_min').val();
		var r_prot_b = $('#proteins_max').val();
		var r_fats_s = $('#fats_min').val();
		var r_fats_b = $('#fats_max').val();
		var r_carb_s = $('#carboh_min').val();
		var r_carb_b = $('#carboh_max').val();
		var str = "SELECT * FROM recipes AS r JOIN recip_cat AS rc ON r.recip_cat_id = rc.cid WHERE r.name LIKE '%" + r_name + "%' AND r.proteins BETWEEN " + r_prot_s + " AND " + r_prot_b + " AND r.fats BETWEEN " + r_fats_s + " AND " + r_fats_b + " AND r.carboh BETWEEN " + r_carb_s + " AND " + r_carb_b + " AND r.kkal BETWEEN " + r_kkal_s + " AND " + r_kkal_b + " ORDER BY r.watchs DESC";
		show_likes(str);
	});
	$('.pole_search').bind("change input", function(){
		var r_name = $('.pole_search').val();
		var r_kkal_s = $('#kkal_min').val();
		var r_kkal_b = $('#kkal_max').val();
		var r_prot_s = $('#proteins_min').val();
		var r_prot_b = $('#proteins_max').val();
		var r_fats_s = $('#fats_min').val();
		var r_fats_b = $('#fats_max').val();
		var r_carb_s = $('#carboh_min').val();
		var r_carb_b = $('#carboh_max').val();
		var str = "SELECT * FROM recipes AS r JOIN recip_cat AS rc ON r.recip_cat_id = rc.cid WHERE r.name LIKE '%" + r_name + "%' AND r.proteins BETWEEN " + r_prot_s + " AND " + r_prot_b + " AND r.fats BETWEEN " + r_fats_s + " AND " + r_fats_b + " AND r.carboh BETWEEN " + r_carb_s + " AND " + r_carb_b + " AND r.kkal BETWEEN " + r_kkal_s + " AND " + r_kkal_b + " ORDER BY r.watchs DESC";
		show_likes(str);
	});
});