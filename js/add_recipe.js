$(document).ready(function(){
	$(".step").css({"width": $(".title_prepo").width() - 40 + "px"});

	$(".add_step").click(function(){
		var buf = "<div class='box'><textarea class='step' placeholder='Шаг " + ($(".step").length + 1) + "'></textarea><div class='del_step' onclick='rem_step(this)'>x</div></div>"; 
		$(".steps").append(buf);
		$(".step").css({"width": $(".title_prepo").width() - 40 + "px"});
	});
});

function rem_step(t){
	$(t).parent().remove();
	console.log("HHH");
	var i = 1;
	$(".step").each(function(){
		$(this).attr('placeholder', 'Шаг ' + i);
		i++;
	});
}