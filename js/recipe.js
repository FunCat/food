$(document).ready(function(){
	$('.list_ingredients').css({"height": ($(".foto_recipe").height() - 70) + "px"});
});

function change_main_foto(src_foto){
	$(".main_foto_f").hide("slow", function(){
		$(".main_foto_f").attr({ src: src_foto});
		$(".main_foto_f").show("slow");
	});
}