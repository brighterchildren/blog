<?php

add_action('lp_head','lp_library_shareme_js');

function lp_library_shareme_js()
{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function () {
	jQuery('#shareme').sharrre({
	  share: {
		googlePlus: true,
		twitter: true,
		linkedin: true,
		pinterest: true,
		facebook: true
	  },
	  buttons: {
		googlePlus: {size: 'medium'},
		twitter: {count: 'horizontal'},
		linkedin: {counter: 'right'},
		pinterest: {media: 'http://placekitten.com/200/300', description: '<?php the_title();?>', layout: 'horizontal'},
		facebook: {layout: 'like_count', width: '50', colorscheme: 'dark' }
	  },
	  enableHover: false,
	  enableCounter: false,
	  enableTracking: true
	});
	 });
	</script>
	<?php
}

add_action('lp_head','lp_library_shareme_css');

function lp_library_shareme_css()
{
}