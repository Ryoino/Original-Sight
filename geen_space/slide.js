// JavaScript Document
$(function(){
//スライドショー
$("ul.image_area").hide().fadeIn(1000);
	setInterval(function(){
		var $active_image = $("ul.image_area li.active");
		var $next_image = $active_image.next().length > 0 ? $active_image.next() : $("ul.image_area li:first");
		$next_image
		.addClass("next")
		.css({opacity:0})
		.animate({opacity:1},2000,function(){
			$active_image.removeClass("active");
			$next_image.removeClass("next").addClass("active");
		});
	},5000);

	//拡大画像
	$("#tab_content p.img a").lightBox();

});