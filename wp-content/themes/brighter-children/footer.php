<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Brighter Children
 */
?>

	</div><!-- #wrapper -->

			<!-- Footer Start -->
			
			<div class="footer">
				<div class="container">	
					<!-- Social Media -->
					<div class="social">
						<a href="https://www.facebook.com/BrighterChildren" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/BrighterC" class="twitter"><i class="fa fa-twitter"></i></a>
						<a href="https://www.linkedin.com/company/3075011" class="linkedin"><i class="fa fa-linkedin"></i></a>
					</div>
					<div class="organization">
						Brighter Children is a non-profit organization
					</div>
				</div>
			</div>
			
			<!-- Footer End -->
			
			
			<!-- Scroll to top -->
			<span class="scroll-to-top"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
			
		</div>

		
		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="wp-content/themes/brighter-children/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="wp-content/themes/brighter-children/js/bootstrap.min.js"></script>
		<!-- jQuery prettyPhoto -->
		<script src="wp-content/themes/brighter-children/js/jquery.prettyPhoto.js"></script>
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.themepunch.plugins.min.js"></script>
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.themepunch.revolution.min.js"></script>
		<!-- jQuery flot -->
		<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="wp-content/themes/brighter-children/js/excanvas.min.js"></script><![endif]-->
		<script src="wp-content/themes/brighter-children/js/jquery.flot.min.js"></script>     
		<script src="wp-content/themes/brighter-children/js/jquery.flot.resize.min.js"></script>
		<!-- Style Switcher JS -->
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.style-switcher.js"></script>
		<!-- Parallax JS -->
		<script src="wp-content/themes/brighter-children/js/jquery.parallax-1.1.3.js"></script>
		<!-- Arbitrary Anchor JS -->
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.arbitrary-anchor.js"></script>
		<!-- Count To JS  -->
		<script src="wp-content/themes/brighter-children/js/jquery.countTo.js"></script>
		<!-- WayPoints JS -->
		<script src="wp-content/themes/brighter-children/js/waypoints.min.js"></script>
		<!-- GMap JS -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.ui.map.min.js"></script>
		<script type="text/javascript" src="wp-content/themes/brighter-children/js/jquery.ui.map.overlays.min.js"></script> 
		<!-- Respond JS for IE8 -->
		<script src="wp-content/themes/brighter-children/js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="wp-content/themes/brighter-children/js/html5shiv.js"></script>
		<!-- This Page Java Script -->
		<script type="text/javascript">
		
		
		/* ******************************************** */
		/*  JS for Revolution slider  */
		/* ******************************************** */

		var slider;

		jQuery(document).ready(function() {

			   slider = jQuery('.banner').revolution(
				{
					delay:8000,
					startwidth:1170,
					startheight:550,
					
					hideThumbs:10,
					
					navigationType:"none",	
					
					
					hideArrowsOnMobile:"on",
					
					touchenabled:"on",
					onHoverStop:"on",
					
					navOffsetHorizontal:0,
					navOffsetVertical:20,
					
					stopAtSlide:-1,
					stopAfterLoops:-1,

					shadow:0,
					
					fullWidth:"on",
					fullScreen:"off"
				});

		});
				
				
			/* Code for GMap */
			$('#map').gmap({ 'center': '37.434538, -121.89970399999999', 'zoom': 10, 'scrollwheel': false }).bind('init', function() {	
				$('#map').gmap('loadFusion', { 'query': { 'from': 297050 } } );
			});
			
			
			// code here...
		</script>
		<!-- Custom JS -->
		<script src="wp-content/themes/brighter-children/js/custom.js"></script>
		
	</body>	
</html>