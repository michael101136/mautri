
var featuredCurrent = 0;
var featuredSize = 810;

function latestnews(direction){
	var featuredElements = jQuery(".news > div > div").size();
	var featuredSize = jQuery('.breaking .news').width();
	if(featuredElements <= 1)return;
	
	if(direction == "right"){
		if(featuredCurrent+1 == featuredElements){
			featuredCurrent = 0;
			jQuery(".news > div").css("left","0px");
		}else{
			featuredCurrent++;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}
	}else
	if(direction == "left"){
		if(featuredCurrent == 0){
			featuredCurrent = featuredElements-1;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}else{
			featuredCurrent--;
			jQuery(".news > div").css("left",featuredCurrent*featuredSize*(-1)+'px');
		}
	}
}

var carouselSize = 0;
var carouselCurrent = 0;

function carousel(direction){
	var carouselElements = jQuery(".carousel-box .image-list ul > li").size();
	carouselSize = parseInt(jQuery(".carousel-box .image-list").css('width'))+6;
	if(carouselElements <= 7)return;
	var carouselCurrentTemp = Math.ceil(carouselElements/(7));
	
	if(direction == "right"){
		if(carouselCurrent+1 >= carouselCurrentTemp){
			carouselCurrent=0;
			jQuery(".carousel-box .image-list ul").css("left","0px");
		}else{
			carouselCurrent++;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+'px');
		}
	}else
	if(direction == "left"){
		if(carouselCurrent <= 0){
			carouselCurrent=carouselCurrentTemp-1;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+"px");
		}else{
			carouselCurrent--;
			jQuery(".carousel-box .image-list ul").css("left",carouselCurrent*carouselSize*(-1)+'px');
		}
	}
}


$(document).scroll(function() {
	var position = $(window).scrollTop();
	if(position <= 500) {
		jQuery("a.back-to-top").fadeOut('fast');
	}else{
		jQuery("a.back-to-top").fadeIn('fast');
	}
});

function lightboxclose(){
	jQuery(".lightbox .lightcontent").fadeOut('fast');
	jQuery(".lightbox").fadeOut('slow');
	jQuery("body").css('overflow', 'auto');
}

$(document).ready(function() {
	var carouselElements = jQuery(".carousel-box .image-list ul > li").size();
	jQuery(".carousel-box .image-list ul").css("width", (carouselElements*129)+"px");
	
	jQuery(".navi").after("<a href='#' class='show-menu-button icon-text'>&#9776;</a><div class='phone-menu-line'></div>");
	
	jQuery(".show-menu-button").click(function(){
		jQuery("body").toggleClass("showmenu");
	});
	
	jQuery(".youtube-video").click(function(){
		var videoid = jQuery(this).attr('rel');
		jQuery('<iframe>', {
			src: 'http://www.youtube.com/embed/'+videoid+'?rel=0&autoplay=1&theme=light',
			id:  'youtube_video_'+videoid,
			width: 650,
			height: 366,
			frameborder: 0,
			scrolling: 'no',
			allowfullscreen: 'yes'
		}).insertBefore(this);
		jQuery(this).hide();
	});
	
	jQuery(".panel .right-top-panel a.icon-text").click(function(){
		var parseid = $(this).attr('id');
		if(parseid == "sidebar-icon-popular"){
			jQuery(this).parent().parent().parent().children().eq(0).html("Popular Articles");
			jQuery(this).addClass("active");
			jQuery("#sidebar-icon-comments").removeClass("active");
			jQuery("#sidebar-panel-comments").hide();
			jQuery("#sidebar-panel-popular").fadeIn('fast');
		}else
		if(parseid == "sidebar-icon-comments"){
			jQuery(this).parent().parent().parent().children().eq(0).html("Recent Comments");
			jQuery(this).addClass("active");
			jQuery("#sidebar-icon-popular").removeClass("active");
			jQuery("#sidebar-panel-popular").hide();
			jQuery("#sidebar-panel-comments").fadeIn('fast');
		}
	});
	
	jQuery("#icon-brush").click(function(){
		if(jQuery(this).parent().attr('class') == "active"){
			jQuery(this).parent().attr("class","");
			jQuery(".farbtastic").hide();
		}else{
			jQuery(this).parent().attr("class","active");
		}
	});

	jQuery("a.back-to-top").css("display","none");

	jQuery("a[href='#top']").click(function() {
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	jQuery(".width-changer").click(function(){
		if(jQuery(".boxed").hasClass("enableboxed")){
			jQuery(".change-width-stretched").css("display", "block");
			jQuery(".change-width-boxed").css("display", "none");
			jQuery("#bgcolor").css("display", "none");
			jQuery("body").css("background", "#fff");
		}else{
			jQuery(".change-width-stretched").css("display", "none");
			jQuery(".change-width-boxed").css("display", "block");
			jQuery("#bgcolor").css("display", "block");
		}
		jQuery(".boxed").toggleClass("enableboxed");
	});
	
	jQuery(".lightbox").click(function () {
		jQuery("body").css('overflow', 'auto');
		jQuery(".lightbox .lightcontent").fadeOut('fast');
		jQuery(".lightbox").fadeOut('slow');
    }).children().click(function(e) {
		return false;
	});
	jQuery(".light-show").click(function () {
		jQuery("body").css('overflow', 'hidden');
		var thecontent = jQuery(this).attr('href');
		jQuery(".lightbox").fadeIn('fast');
		
		jQuery(".lightbox .lightcontent").html('<h2 class="light-title">Test Title</h2><a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span>Close Window</a>'+thecontent);
		
		jQuery(".lightbox .lightcontent").fadeIn('slow');
		return false;
    });
});

function getImgSize(imgSrc) {
    var newImg = new Image();

    newImg.onload = function() {
    var height = newImg.height;
    var width = newImg.width;
		alert ('The image size is '+width+'*'+height);
    }

    newImg.src = imgSrc; // this must be done AFTER setting onload
}



// IE7 & IE8 Fix

jQuery(document).ready(function() {
	jQuery(":last-child").addClass('last-child');
	jQuery(":first-child").addClass('first-child');
});
