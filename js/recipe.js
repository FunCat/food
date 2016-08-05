var fh = 0;
var wri = 0;
$(document).ready(function(){
	//$('.list_ingredients').css({"height": ($(".foto_recipe").height() - 70) + "px"});
	fh = $(".foto_recipe").height();
	wri = $(".wrap_recipe_ingred").height() + $(".list_ingredients").height();
	if(fh > wri) wri = fh;
	$(".hei_block").css({"height": wri + "px"});
});

function change_main_foto(src_foto){
	$(".main_foto_f").hide("slow", function(){
		$(".main_foto_f").attr({ src: src_foto});
		$(".main_foto_f").show("slow");
	});
}