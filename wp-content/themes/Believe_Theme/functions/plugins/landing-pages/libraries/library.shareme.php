<?php
//echo 1; exit;
add_action('lp_init','lp_library_shareme_enqueue');
function lp_library_shareme_enqueue()
{
	wp_enqueue_script('sharrre', LANDINGPAGES_URLPATH . 'libraries/shareme/sharrre/jquery.sharrre-1.3.3.min.js', array('jquery'));
}

function lp_library_shareme_js($nature)
{
global $post;
if(has_post_thumbnail()) {
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
}
else {
	$thumb = "http://placekitten.com/200/300";
}
	$page_title = get_the_title();
	$new_page_title = str_replace('"', '\"', $page_title);
	$newest_page_title = str_replace("'", "\'", $new_page_title);
	if ($nature!='vertical')
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
				pinterest: {media: '<?php echo $thumb;?>', description: '<?php echo $newest_page_title;?>', layout: 'horizontal'},
				facebook: {layout: 'like_count', width: '50', colorscheme: 'light' }
			  },
			  enableHover: false,
			  enableCounter: false,
			  enableTracking: true
			});
		});
		</script>
	<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('#shareme').sharrre({
			  share: {
				googlePlus: true,
				facebook: true,
				twitter: true,
				linkedin: true,
				pinterest: true
			  },
			  buttons: {
				googlePlus: {size: 'medium'},
				facebook: {layout: 'like_count', width: '45'},
				twitter: {count: 'horizontal'},
				linkedin: {counter: 'right'},
				pinterest: {media: '<?php echo $thumb;?>', description: '<?php echo $newest_page_title;?>', layout: 'horizontal'}
			  },
			  enableHover: false,
			  enableCounter: false,
			  enableTracking: true
			});
		 });
		</script>
		<?php
	}
}

function lp_library_shareme_css($nature)
{
	?>
<style type="text/css">

<?php if ($nature=='vertical') {?>
	#lp-social-buttons{
		position: absolute;
		top: 70px;
		width: 70px;
		left: 990px;
		padding: 10px;
		overflow: hidden;
		background: transparent;
		z-index: 999;}

	#lp-social-buttons iframe {
		width:85px !important;}

	#lp-social-buttons {
		margin: 0 auto;
		text-align: left;}
	.linkedin {margin-bottom: -20px;}
<?php } else { ?>
	.sharrre .button {
		width: 95px;
		display: inline-block;
		vertical-align: top;
		margin-top: 10px;}
	.linkedin {margin-right: -15px;}
<?php } ?>

	</style>
	<?php
}

function lp_social_media($nature=null)
{
	lp_library_shareme_js($nature);
	lp_library_shareme_css($nature);
	?>
	<div id="lp-social-buttons">
	  <div id="shareme" data-url="<?php the_permalink();?>" data-text="<?php the_title();?>"></div>
	</div>
	<?php
}
