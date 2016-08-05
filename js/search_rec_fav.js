 function show_likes()  
        {  
            $.ajax({  
                url: "list_fav_like.php",  
                cache: false,  
                success: function(html){  
                    $("#receipeslist").html(html);  
                    $(function () {
						var filterList = {
							init: function () {
								$('#receipeslist').mixitup({
									targetSelector: '.receipe_block',
									filterSelector: '.filter',
									effects: ['fade'],
									easing: 'snap',
									// call the hover effect
									onMixEnd: filterList.hoverEffect()
								});				
							},
							hoverEffect: function () {
								$('#receipeslist .receipe_block').hover(
									function () {
										$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
									},
									function () {
										$(this).find('.label').stop().animate({bottom: - $(this).find('.label').height() + "px"}, 200, 'easeInQuad');
										$(this).find('.receipe_block_info').hide();
										$(this).find('.receipe_block_info').stop().animate({height: "0px"}, 200, 'easeOutQuad');				
									}
								);
							}
						};
						filterList.init();
					});
                    $(document).ready(function(){
						$('.recipe_more').css({"left": $(".label").width() - 125 + "px"});
						$('.recs_label').css({"width": $(".recs_block_wrapper").width() - 350 + "px"});
						$(window).resize(function(){
							$('.recipe_more').css({"left": $(".label").width() - 125 + "px"});
							$('.recs_label').css({"width": $(".recs_block_wrapper").width() - 350 + "px"});
						});
						$('.receipe_block').click(
							function(){
								$(this).find('.receipe_block_info').show();
								$(this).find('.receipe_block_info').stop().animate({height: "170px"}, 200, 'easeInQuad');
							}
						);
						$(".recipe_add").hover(function(){
								$(this).children(".app_like").attr('src', '../img/apple_like_hov.png');
							}, function() {
								$(this).children(".app_like").attr('src', '../img/apple_like.png');
							});
							$(".recipe_add_act").hover(function(){
								$(this).children(".app_like").attr('src', '../img/apple_like.png');
							}, function() {
								$(this).children(".app_like").attr('src', '../img/apple_like_hov.png');
						});

					});

                }  
            });  
        }  

function send_apple_like(name, id)
{
	var r = new XMLHttpRequest();
	var url = "add_apple_like.php";
	var str = "log="+name+"&id="+id;
	var string = str;
	var vars = str;
	r.open("POST", url, true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	r.onreadystatechange = function(){
		if(r.readyState == 4 && r.status == 210){
			alert(r.responseText);
		}
	}
	r.onload = function () {
		if(this.responseText == "Не указано название дневника!"){
			$(".error_add_diary").text("Не указано название дневника!");
		}
		else{
			show_likes(); 
		}
	};
	r.send(vars);
}
function send_apple_dislike(name, id)
{
	var r = new XMLHttpRequest();
	var url = "add_apple_dislike.php";
	var str = "log="+name+"&id="+id;
	var string = str;
	var vars = str;
	r.open("POST", url, true);
	r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	r.onreadystatechange = function(){
		if(r.readyState == 4 && r.status == 210){
			alert(r.responseText);
		}
	}
	r.onload = function () {
		if(this.responseText == "Не указано название дневника!"){
			$(".error_add_diary").text("Не указано название дневника!");
		}
		else{
			show_likes(); 
		}
	};
	r.send(vars);
}
