// x1, y1, x2, y2 - Координаты для обрезки изображения
// crop - Папка для обрезанных изображений
var x1, y1, x2, y2, crop = '../temp/';
var jcrop_api;

var w1000, h1000;

$(function($){             
	$(document).ready(function(){
		$(".crop_off").css({"display": "none"});
		$(".wrap_list_ingred").css({"height": $(".wrap_crop_pict").height() + 3});
	});
	function showFile(e) {
	var files = e.target.files;
	for (var i = 0, f; f = files[i]; i++) {
		if (!f.type.match('image.*')) continue;
		var fr = new FileReader();
		fr.onload = (function(theFile) {
			return function(e) {
				$("#target").attr('src',e.target.result);
				$(".file_upload").css({"display":"none"});
				$(".crop_off").css({"display":"block"});
				$(".wrap_crop_off").css({"display": "none"});
				if($('#target').width() > $(".wrap_crop_pict").width()){
					var kof = $(".wrap_crop_pict").width() / $("#target").width();
					w1000 = $("#target").width() * kof;
					h1000 = $("#target").height() * kof;
					$("#target").css({
						"width": w1000,
						"height": h1000
					});
				}
				else{
			  		w1000 = $("#target").width();
					h1000 = $("#target").height();
				}
				$(".wrap_list_ingred").css({"height": $(".wrap_crop_pict").height() + 3});
				$('#target').Jcrop({      
					onChange:   showCoords,
					onSelect:   showCoords
				},function(){       
					jcrop_api = this; 
					jcrop_api.setOptions({ aspectRatio: 1.84/1 });
					jcrop_api.focus();      
				});
			};
		})(f);
 
	  fr.readAsDataURL(f);
	  
	}
  }
 
  document.getElementById('files').addEventListener('change', showFile, false);

	
	// Снять выделение	
	$('#release').click(function(e) {		
		release();
	});   

		

   // Установка минимальной/максимальной ширины и высоты
   /*$('#size_lock').change(function(e) {
		jcrop_api.setOptions(this.checked? {
			minSize: [ 80, 80 ],
			maxSize: [ 350, 350 ]
		}: {
			minSize: [ 0, 0 ],
			maxSize: [ 0, 0 ]
		});
		jcrop_api.focus();
	});*/
	// Изменение координат
	function showCoords(c){

		x1 = c.x; $('#x1').val(c.x);		
		y1 = c.y; $('#y1').val(c.y);		
		x2 = c.x2; $('#x2').val(c.x2);		
		y2 = c.y2; $('#y2').val(c.y2);
		
		$('#w').val(c.w);
		$('#h').val(c.h);
		
		if(c.w > 0 && c.h > 0){
			$('#crop').show();
		}else{
			$('#crop').hide();
		}
		
	}	
});

function release(){
	jcrop_api.release();
	$('#crop').hide();
}
// Обрезка изображение и вывод результата
$(function($){
	$('#crop').click(function(e) {
		var img = $('#target').attr('src');
		$.post('action_crop.php', {'x1': x1, 'x2': x2, 'y1': y1, 'y2': y2, 'img': img, 'crop': crop, 'w': w1000, 'h': h1000}, function(file) {
			$("#target").attr('src', crop + file);
			$(".jcrop-holder").css({"display": "none"});
			$("#target").css({"display": "block", "visibility": "", "width": "", "height": "", "margin": "0px auto", "border": "2px solid #7ed42f", "padding": "5px"});
			$("#release").css({"display": "none"});
			release();
		});
		
	});   
});