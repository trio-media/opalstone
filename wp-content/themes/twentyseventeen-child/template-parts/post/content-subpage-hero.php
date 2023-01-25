<?php 
	if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
		$webPSupport = '.webp';
	} else {
		$webPSupport = '';
	} 

	$thumbnail_id = get_post_thumbnail_id( $post->ID ); 
	$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	$postImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullWidthHeaderImage');

	if (get_field('hide_hero')) {
?>
	<div class="subpage-top"></div>
<?php } else { ?>

	<div class="container-fluid subpage-hero" style="
	background-image:url(<?php echo $postImage[0];?>);
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;"
	data-imageLoad="<?php echo $postImage[0];?>">

		<div class="container h-100">
			<div class="row vertical">
				<?php if (is_singular( 'news' )) { ?> 
				<div class="col-12">
				<?php } else { ?>
				<div class="col-12 col-lg-6">
				<?php } ?>
					<h1><?php echo the_title(); ?></h1>

					<?php if ( function_exists('yoast_breadcrumb') ) 
				{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

					<?php
						if( have_rows('hero') ):
						while( have_rows('hero') ): the_row(); 
						while ( have_rows('buttons') ) : the_row(); 
					?>
						<a href="<?php echo the_sub_field('link'); ?>" class="cta-button"><?php echo the_sub_field('text'); ?></a>
					<?php 
						endwhile; 
						endwhile; 
						endif;
					?>
				</div>
			</div>
		</div>
	</div> 

<?php } ?>