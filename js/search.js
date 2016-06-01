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
					//$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
				},
				function () {
					$(this).find('.label').stop().animate({bottom: - $(this).find('.label').height() + "px"}, 200, 'easeInQuad');
					//$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
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
});

