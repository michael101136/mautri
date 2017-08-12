
jQuery(document).ready(function($){
	$('.color-changer').iris({
		hide: true,
		width: 180,
		change: function(event, ui) {
			$(this).children().eq(0).css('background-color', ui.color.toString());
			var color = ui.color.toString();
			
			if($(this).children()[0].getAttribute('data-target') == "scheme"){
				jQuery(".sub-menu li").css("background-color",color);
				jQuery(".navi > li").hover(
					function () {
						$(this).children().eq(0).css("border-bottom", "3px solid "+color);
					}, 
					function () {
						$(this).children().eq(0).css("border-bottom", "3px solid #232323");
					}
				);
				jQuery(".content h2 a, .content h3 a, .panel h3 a, .read-more, .header a.logo, .article-icons a, .pager a, li.search input[type='submit'], .back-to-top, .carousel-box .carousel-left, .carousel-box .carousel-right, .upper-title-right a, .sponsored-advert, a.text-button, .main-content div.about-author-content .social-icons a, .plain-text .social-icons a, .plain-text a").data('color', '#232323').hover(
					function () {
						$(this).css("color", color);
					}, 
					function () {
						$(this).css("color", "#232323");
					}
				);
				jQuery(".navi > li").children("a").data('color', '#232323').hover(
					function () {
						$(this).css("color", color);
					}, 
					function () {
						$(this).css("color", "#232323");
					}
				);
				jQuery(".content input[type='submit'], .panel .tagcloud a").data('background', '#232323').hover(
					function () {
						$(this).css("background", color);
					}, 
					function () {
						$(this).css("background", "#232323");
					}
				);
				jQuery(".sexyslider-control.active").css("background",color);
				jQuery("h2 .title-marker").css("background",color);
				jQuery("h2 .title-marker .right-arrow").css("background",color);
				jQuery(".carousel-box .image-list li.active .image-border img").css("border","5px solid "+color);
			}else
			if($(this).children()[0].getAttribute('data-target') == "background"){
				jQuery("body").css("background-color",color);
			}
			
		}
	});
	
	$(".color-changer").click(function (){
		$(this).iris('toggle');
	});
});