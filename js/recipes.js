var fullsearch = false;
$(document).ready(function(){
	$("input#kkal_min").val(0);
	$("input#kkal_max").val(1000);
	$("input#proteins_min").val(0);
	$("input#proteins_max").val(100);
	$("input#fats_min").val(0);
	$("input#fats_max").val(100);
	$("input#carboh_min").val(0);
	$("input#carboh_max").val(100);

	$(".fullsearch_button").click(function(){
		if(fullsearch == false){
			$(".search_panel").animate({
				"width": "100%",
				"height": "250px"
			}, 300);
			fullsearch = true;
		}
		else{
			$(".search_panel").animate({
				"width": "500px",
				"height": "75px"
			}, 300);
			fullsearch = false;
		}
	});

//Trackbar kkal_kol с текстовыми полями kkal_min и kkal_max

	$("#kkal_kol").slider({
		animate: 300,
		min: 0,
		max: 1000,
		values: [0,1000],
		range: true,	
		stop: function(event, ui) {
			$("input#kkal_min").val($("#kkal_kol").slider("values",0));
			$("input#kkal_max").val($("#kkal_kol").slider("values",1));
		},
		slide: function(event, ui){
			$("input#kkal_min").val($("#kkal_kol").slider("values",0));
			$("input#kkal_max").val($("#kkal_kol").slider("values",1));
		}
	});

	$("input#kkal_min").change(function(){
		var value1 = $("input#kkal_min").val();
		var value2 = $("input#kkal_max").val();

		if(parseInt(value1) > parseInt(value2)){
			value1 = value2;
			$("input#kkal_min").val(value1);
		}
		$("#kkal_kol").slider("values",0,value1);    
	});

	$("input#kkal_max").change(function(){

		var value1 = $("input#kkal_min").val();
		var value2 = $("input#kkal_max").val();

		if (value2 > 1000) { value2 = 1000; $("input#kkal_max").val(1000)}

		if(parseInt(value1) > parseInt(value2)){
			value2 = value1;
			$("input#kkal_max").val(value2);
		}
		$("#kkal_kol").slider("values",1,value2);
	});

//Конец trackbar kkal_kol


//Trackbar proteins_kol с текстовыми полями proteins_min и proteins_max

	$("#proteins_kol").slider({
		animate: 300,
		min: 0,
		max: 1000,
		values: [0,1000],
		range: true,	
		stop: function(event, ui) {
			$("input#proteins_min").val($("#proteins_kol").slider("values",0));
			$("input#proteins_max").val($("#proteins_kol").slider("values",1));
		},
		slide: function(event, ui){
			$("input#proteins_min").val($("#proteins_kol").slider("values",0));
			$("input#proteins_max").val($("#proteins_kol").slider("values",1));
		}
	});

	$("input#proteins_min").change(function(){
		var value1 = $("input#proteins_min").val();
		var value2 = $("input#proteins_max").val();

		if(parseInt(value1) > parseInt(value2)){
			value1 = value2;
			$("input#proteins_min").val(value1);
		}
		$("#proteins_kol").slider("values",0,value1);    
	});

	$("input#proteins_max").change(function(){

		var value1 = $("input#proteins_min").val();
		var value2 = $("input#proteins_max").val();

		if (value2 > 1000) { value2 = 1000; $("input#proteins_max").val(1000)}

		if(parseInt(value1) > parseInt(value2)){
			value2 = value1;
			$("input#proteins_max").val(value2);
		}
		$("#proteins_kol").slider("values",1,value2);
	});

//Конец trackbar proteins_kol

//Trackbar fats_kol с текстовыми полями fats_min и fats_max

	$("#fats_kol").slider({
		animate: 300,
		min: 0,
		max: 1000,
		values: [0,1000],
		range: true,	
		stop: function(event, ui) {
			$("input#fats_min").val($("#fats_kol").slider("values",0));
			$("input#fats_max").val($("#fats_kol").slider("values",1));
		},
		slide: function(event, ui){
			$("input#fats_min").val($("#fats_kol").slider("values",0));
			$("input#fats_max").val($("#fats_kol").slider("values",1));
		}
	});

	$("input#fats_min").change(function(){
		var value1 = $("input#fats_min").val();
		var value2 = $("input#fats_max").val();

		if(parseInt(value1) > parseInt(value2)){
			value1 = value2;
			$("input#fats_min").val(value1);
		}
		$("#fats_kol").slider("values",0,value1);    
	});

	$("input#fats_max").change(function(){

		var value1 = $("input#fats_min").val();
		var value2 = $("input#fats_max").val();

		if (value2 > 1000) { value2 = 1000; $("input#fats_max").val(1000)}

		if(parseInt(value1) > parseInt(value2)){
			value2 = value1;
			$("input#fats_max").val(value2);
		}
		$("#fats_kol").slider("values",1,value2);
	});

//Конец trackbar fats_kol

//Trackbar carboh_kol с текстовыми полями carboh_min и carboh_max

	$("#carboh_kol").slider({
		animate: 300,
		min: 0,
		max: 1000,
		values: [0,1000],
		range: true,	
		stop: function(event, ui) {
			$("input#carboh_min").val($("#carboh_kol").slider("values",0));
			$("input#carboh_max").val($("#carboh_kol").slider("values",1));
		},
		slide: function(event, ui){
			$("input#carboh_min").val($("#carboh_kol").slider("values",0));
			$("input#carboh_max").val($("#carboh_kol").slider("values",1));
		}
	});

	$("input#carboh_min").change(function(){
		var value1 = $("input#carboh_min").val();
		var value2 = $("input#carboh_max").val();

		if(parseInt(value1) > parseInt(value2)){
			value1 = value2;
			$("input#carboh_min").val(value1);
		}
		$("#carboh_kol").slider("values",0,value1);    
	});

	$("input#carboh_max").change(function(){

		var value1 = $("input#carboh_min").val();
		var value2 = $("input#carboh_max").val();

		if (value2 > 1000) { value2 = 1000; $("input#carboh_max").val(1000)}

		if(parseInt(value1) > parseInt(value2)){
			value2 = value1;
			$("input#carboh_max").val(value2);
		}
		$("#carboh_kol").slider("values",1,value2);
	});

//Конец trackbar carboh_kol


});
