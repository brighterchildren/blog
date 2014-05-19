
/* ******************************************** */
/* Style Switcher js */
/* *************************************** */  

$(document).ready(function() {
	$('.style-switcher').styleSwitcher({
		preview:false
	});
});
		
/* ******************************************** */
/* Navigation Menu js */
/* *************************************** */  

$(function(){ 
	
	var $navMain = $(".navbar-collapse");

	$(window).resize(function(){
		if($(window).width() <= 765){
			$navMain.on("click", "a", null, function () {
				if(!$(this).hasClass("dd-menu"))
					$navMain.collapse('hide');
			});
		}
	});
});
		
/* *************************************** */  
/* Parallax */
/* *************************************** */  

$(document).ready(function(){
	$('.parallax-feature').parallax("50%", 0.05);
	$('.parallax-testimonial').parallax("50%", 0.05);
	$('.parallax-service').parallax("50%", 0.2);
	$('.parallax-cta').parallax("50%", 0.2);
	$('.parallax-sponsor').parallax("50%", 0.2);
	$('.parallax-model-two').parallax("50%", 0.3);
	$('.parallax-model-three').parallax("50%", 0.6);
	$('.parallax-video').parallax("50%", 0.3);
	$('.parallax-model-five').parallax("50%", 0.2);
});

/* *************************************** */  
/* JS for Portfolio Image Caption */
/* *************************************** */  

$(document).ready(function(){
	$(".p-img-container > a").hover(function(){
		$(this).children(".pf-caption").slideDown(400); 
		}, function(){
		$(this).children(".pf-caption").slideUp(400);
	});
 });

/* ******************************************** */
/* JS for Service */
/* *************************************** */  

$(document).ready(function(){
	$(".service-item").hover(function(){
		$(this).children(".service-details").slideDown(400); 
		}, function(){
		$(this).children(".service-details").slideUp(400);
	});
 });

        	 
/* *************************************** */  
/* Way Points JS */
/* *************************************** */  

$(document).ready(function(){
	
	// Hero's Way Points
	$('.hero-logo').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceInDown');
	}, { 
		offset: '70%' 
	});
	
	$('.hero-heading h1').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '75%' 
	});
		
	// Feature Way Points
	$('.feature-item').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { 
		offset: '65%' 
	});
	
	// Author Content Way Points 
	$('.author-content').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { 
		offset: '75%' 
	});
	
	// Model Way Points
	$('.model-container h3').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceInLeft');
	}, { 
		offset: '80%' 
	});
	
	$('.model-container p').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceInRight');
	}, { 
		offset: '80%'
	});
	
	$('.model-container a').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceInRight');
	}, { 
		offset: '75%' 
	});
	
	// Service Way Points
	$('.service-item').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '70%' 
	});
	
	// Company Way Points
	$('.company-content').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { 
		offset: '50%' 
	});
	
	// Blog Way Points
	$('.blog-post').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '60%' 
	});
	
	// About Us Way Points
	$('.about-member').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { 
		offset: '70%' 
	});
	
	// Model Two Way Points
	$('.model-two p').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeIn');
	}, { 
		offset: '60%' 
	});
	
	// Model Three Way Points With Count To()
	$('.m-counter').waypoint(function(down){
		if(!$(this).hasClass('stop-counter'))
		{
			$(this).countTo();
			$(this).addClass('stop-counter');
		}
	}, { 
		offset: '80%' 
	});
	
	// Pricing Way Points
	$('.pricing-item').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '75%' 
	});
	
	// Branch Information and Map Location Way Points 
	$('.branch-info').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('flipInY');
	}, { 
		offset: '75%' 
	});
	
	$('.branch-map-area i').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '75%' 
	});
	
	$('.branch-map-area span').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '75%' 
	});
	
	// Video Caption and Video Way Points 
	$('.video-cap-container').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('slideInLeft');
	}, { 
		offset: '70%' 
	});
	
	$('.video-container').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('slideInRight');
	}, { 
		offset: '70%' 
	});
	
	// Model Five Item Way Points 
	$('.m-five-item').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('bounceIn');
	}, { 
		offset: '75%' 
	});
	
	// Grid Item Way Points
	$('.grid .grid-entry').waypoint(function(down){
		$(this).addClass('animation');
		$(this).addClass('fadeInUp');
	}, { 
		offset: '90%' 
	});
	
});

/* ******************************************** */
/* Tool Tip JS */
/* ******************************************** */ 

$('.grid-tooltip').tooltip();

/* *************************************** */ 
/* PrettyPhoto for Grid Image */
/* *************************************** */  

	$(".grid-img-link").prettyPhoto({
	   overlay_gallery: false, social_tools: false
	});
	
/* *************************************** */ 
/* Progress Bar [About Us] JS */
/* *************************************** */  

$('.about-skill-progress .progress-bar').waypoint(function(down) {
	
	if(!$(this).hasClass('progress-stop')){
		
		setTimeout(function(){

			$('.about-skill-progress .progress-bar').each(function() {
				var me = $(this);
				var perc = me.attr("data-end");
				var current_perc = 0;
				var progress = setInterval(function() {

					if (current_perc>=perc) {
						clearInterval(progress);
					} else {
						current_perc +=1;
						me.css('width', (current_perc)+'%');
						me.children('span').html(current_perc+'%');
					}
					
				}, 40);

			});

		},40);  
		
		$(this).addClass('progress-stop');
	}
	
},{ offset: '100%' });

/* *************************************** */ 
/* PrettyPhoto for Recent Post */
/* *************************************** */  

	// Portfolio
	$(".p-img-link").prettyPhoto({
	   overlay_gallery: false, social_tools: false
	});
	
	// Blog
	$(".blog-img-link").prettyPhoto({
	   overlay_gallery: false, social_tools: false
	});
		
/* *************************************** */ 
/* Scroll to Top */
/* *************************************** */  
	 
$(".scroll-to-top").hide();

$(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop()>300)
		{
			$('.scroll-to-top').fadeIn();
		} 
		else
		{
			$('.scroll-to-top').fadeOut();
		}
	});

	$('.scroll-to-top a').click(function(e) {
		e.preventDefault();
		$('body,html').animate({scrollTop: 0}, 700);
	});
});

/* *************************************** */ 