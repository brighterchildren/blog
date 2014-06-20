<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Brighter Children
 */

get_header(); ?>

<!-- Hero Start -->

<div class="parallax-model-three hero">
	<div class="caption">
		Original photo by <a href="http://laughingsquid.com/">Scott Beale / Laughing Squid</a>
	</div>
	<div class="container">
		<div class="heading shadow">
			<h2>Come join us at <br />Frying Pan</h2>
			<h3>for the summer's best day party</h3>
			<h3>Sat, June 28 1:00-4:30pm</h3>
			<a href="http://www.eventbrite.com/e/the-summers-best-day-party-at-frying-pan-tickets-11811734215?aff=ws" class="btn btn-danger btn-lg btn-attend"><div class="join-large"></div>Buy a ticket</a>
			<span class="cantjoin">Can't join? <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=J3JNX5R96KSHA&lc=US&item_name=Brighter%20Children&no_note=0&cn=Add%20special%20instructions%20to%20the%20seller%3a&no_shipping=1&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted">Donate</a></span>
		</div>
		<div class="purpose">
			<h3>Raise money for the education of children by having a good time with friends </h3>
		</div>
		<span class="fa fa-angle-down nav-down"></span>
		<div class="event-hosts">
			<h3>Hosts</h3>
			<ul>
				<li>Edwin Cherian</li>
				<li>Joyce Chung</li>
				<li>Jeremy Epstein</li>
				<li>Ting Yu Hu</li>
				<li>Courtney Leblanc</li>
				<li>Dennis Lee</li>
				<li>Rae Ravich</li>
				<li>Devon Rinker</li>
				<li>Caitlin Stevens</li>
				<li>Jennifer Tung</li>
			</ul>
		</div>
	</div>
</div>

<!-- Hero End -->

<!-- Mission Start -->

<div class="mission">
	<div class="container">
		<div class="mission-heading heading">
			<!-- Missio Heading -->
			<h1 class="animated">Brighter Children is a <strong>non-profit</strong> that funds <strong>education</strong> for kids in need.</h1>
			<h1>Our events allow you to <strong>do good</strong> and <strong>have fun</strong>. It's a way to <strong>enjoy</strong> yourself and <strong>help</strong> others.</h1>
			<hr />
		</div>
		<div id="carousel-children" class="carousel slide" data-ride="carousel">
			
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<div class="testimonial-content">
						<div class="row">
							<div class="col-md-2 col-sm-2">
								<!-- User Image -->
								<img src="wp-content/themes/brighter-children/img/Ishrat-256x189.jpg" width="189" height="189" class="img-responsive img-circle" alt="user" />
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="t-content-details">
									<!-- User Message -->
									<h2>Ishrat<span>, India</span></h2>
									<!-- User's comment -->
									<blockquote>
										<p>Even though I live far I am never late to school because I want to learn.  When I grow up I want to be an engineer.</p>
									</blockquote>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<!-- User Image -->
								<img src="wp-content/themes/brighter-children/img/Tayabba-21.jpg" width="189" height="189" class="img-responsive img-circle" alt="user" />
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="t-content-details">
									<!-- User Message -->
									<h2>Tayyabba<span>, Colombia</span></h2>
									<!-- User's comment -->
									<blockquote>
										<p>I have always been known as an obedient and good student. I like to sing and when I grow up I want to become a teacher.</p>
									</blockquote>
								</div>
								<a id="learn-more" href="#"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Mission End -->

<!-- Impact Start -->

<div class="model-three parallax-model-three impact">
	<div class="caption">
		Original photo by <a href="https://www.flickr.com/photos/waagsociety/8888906414/">waagsociety</a>
	</div>
	<div class="container">
		<div class="heading shadow">
			<h2>Our impact</h2>
			<h3>Here's what we are doing</h3>
		</div>
		<div class="m-three-content">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<!-- Model Three Item -->
					<div class="m-three-item">
						<!-- Icon -->
						<i class="fa fa-user red"></i>
						<!-- Model Counter -->
						<span class="m-counter" data-from="0" data-to="12" data-speed="2000" data-refresh-interval="100">12</span>
						<!-- Paragraph -->
						<p>children sponsored</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!-- Model Three Item -->
					<div class="m-three-item">
						<!-- Icon -->
						<i class="fa fa-money green"></i>
						<span class="dollar">$</span>
						<!-- Model Counter -->
						<span class="m-counter" data-from="0" data-to="4475" data-speed="2000" data-refresh-interval="100">4475</span>
						<!-- Paragraph -->
						<p>in sponsored education</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!-- Model Three Item -->
					<div class="m-three-item">
						<!-- Icon -->
						<i class="fa fa-thumbs-up lblue"></i>
						<!-- Model Counter -->
						<span class="m-counter" data-from="0" data-to="175" data-speed="2000" data-refresh-interval="100">175</span>
						<!-- Paragraph -->
						<p>supporters</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!-- Model Three Item -->
					<div class="m-three-item">
						<!-- Icon -->
						<i class="fa fa-group purple"></i>
						<!-- Model Counter -->
						<span class="m-counter" data-from="0" data-to="4" data-speed="2000" data-refresh-interval="100">4</span>
						<!-- Paragraph -->
						<p>partner organizations</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Impact End -->

<!-- Map Start -->

<div class="branch padd">
	<div class="container">
		<div class="heading shadow">
			<!-- Heading -->
			<h2>Sponsored Children</h2>
			<h3>This year our goal is to fund education for 30 students</h3>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<!-- Branch Information -->
				<div class="branch-info animated">
					<!-- Icon -->
					<i class="fa fa-map-marker orange"></i>
					<!-- Heading -->
					<h4>Colombia</h4>
					<!-- Number Counter -->
					<span>6</span>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!-- Branch Information -->
				<div class="branch-info animated">
					<!-- Icon -->
					<i class="fa fa-map-marker blue"></i>
					<!-- Heading -->
					<h4>Kenya</h4>
					<!-- Number Counter -->
					<span>9</span>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!-- Branch Information -->
				<div class="branch-info animated">
					<!-- Icon -->
					<i class="fa fa-map-marker red"></i>
					<!-- Heading -->
					<h4>India</h4>
					<!-- Number Counter -->
					<span>6</span>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<!-- Branch Information -->
				<div class="branch-info animated">
					<!-- Icon -->
					<i class="fa fa-map-marker green"></i>
					<!-- Heading -->
					<h4>Philippines</h4>
					<!-- Number Counter -->
					<span>9</span>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="branch-map-area">
			<!-- World Map Image -->
			<img src="wp-content/themes/brighter-children/img/world-map.png" width="1300" height="650" class="img-responsive" alt="World Map" />
			<!-- Branches Locations -->
			<!-- Location Icon and Name -->
			<i class="fa fa-map-marker india-icon red animated"></i>
			<span class="india animated">India</span>
			<!-- Location Icon and Name -->
			<i class="fa fa-map-marker africa-icon blue animated"></i>
			<span class="africa animated">Kenya</span>
			<!-- Location Icon and Name -->
			<i class="fa fa-map-marker us-icon orange animated"></i>
			<span class="us animated">Colombia</span>
			<!-- Location Icon and Name -->
			<i class="fa fa-map-marker ras-icon green animated"></i>
			<span class="ras animated">Philippines</span>
			</div>
	</div>
</div>

<!-- Map End -->

<!-- Sponsor Start -->

<div class="sponsor padd parallax-sponsor">
	<div class="caption">
		Original photo by <a href="https://www.flickr.com/photos/un_photo/6207680679/">un_photo</a>
	</div>
	<div class="container">
		<div class="heading shadow">
			<!-- Heading -->
			<h2>Partners</h2>
			<h3>We work closely with these organizations that are actively helping children get education in primary schools.</h3>
			<div class="border"></div>
		</div>
		<!-- Sponsors Content -->
		<div class="sponsor-content">
			<!-- Sponsors Image -->
			<div class="sponsor-img">
				<!-- Image -->
				<a href="http://www.akanksha.org/"><img src="wp-content/themes/brighter-children/img/partner/akanksha.png" width="150" height="55" class="img-responsive" alt="Akanksha" /></a>
				<!-- Image -->
				<a href="http://www.colombiachildcare.org"><img src="wp-content/themes/brighter-children/img/partner/colombia-childcare.png" width="150" height="55" class="img-responsive" alt="Colombia Childcare" /></a>
				<!-- Image -->
				<a href="http://villageprojectafrica.org/"><img src="wp-content/themes/brighter-children/img/partner/village-project-africa.jpg" width="150" height="55" class="img-responsive" alt="Village Project Africa" /></a>
				<!-- Image -->
				<a href="http://gridministries.org/"><img src="wp-content/themes/brighter-children/img/partner/grid-ministries.jpg" width="150" height="55" class="img-responsive" alt="Grid Ministries" /></a>
			</div>
		</div>
	</div>
</div>

<!-- Sponsor End -->


<?php get_footer(); ?>
