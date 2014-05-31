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
					<!-- Nav -->
					<div class="nav">
						<a href="/about">about</a>
						<a href="/about/team">team</a>
						<a href="/faq">faq</a>
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
		<script src="<?php echo SCRIPTDIR ?>/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?php echo SCRIPTDIR ?>/bootstrap.min.js"></script>
		<!-- jQuery prettyPhoto -->
		<script src="<?php echo SCRIPTDIR ?>/jquery.prettyPhoto.js"></script>
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.themepunch.plugins.min.js"></script>
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.themepunch.revolution.min.js"></script>
		<!-- jQuery flot -->
		<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo SCRIPTDIR ?>/excanvas.min.js"></script><![endif]-->
		<script src="<?php echo SCRIPTDIR ?>/jquery.flot.min.js"></script>     
		<script src="<?php echo SCRIPTDIR ?>/jquery.flot.resize.min.js"></script>
		<!-- Style Switcher JS -->
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.style-switcher.js"></script>
		<!-- Parallax JS -->
		<script src="<?php echo SCRIPTDIR ?>/jquery.parallax-1.1.3.js"></script>
		<!-- Arbitrary Anchor JS -->
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.arbitrary-anchor.js"></script>
		<!-- Count To JS  -->
		<script src="<?php echo SCRIPTDIR ?>/jquery.countTo.js"></script>
		<!-- WayPoints JS -->
		<script src="<?php echo SCRIPTDIR ?>/waypoints.min.js"></script>
		<!-- GMap JS -->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.ui.map.min.js"></script>
		<script type="text/javascript" src="<?php echo SCRIPTDIR ?>/jquery.ui.map.overlays.min.js"></script> 
		<!-- Respond JS for IE8 -->
		<script src="<?php echo SCRIPTDIR ?>/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="<?php echo SCRIPTDIR ?>/html5shiv.js"></script>
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

		<!-- GA -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-41555584-1', 'brighterchildren.org');
		  ga('send', 'pageview');

		</script>

		<!-- Custom JS -->
		<script src="wp-content/themes/brighter-children/js/custom.js"></script>
		
	</body>	
</html>