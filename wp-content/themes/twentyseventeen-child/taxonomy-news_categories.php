<?php
/**
 * The template for displaying the news archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

		<?php if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {?>
			<?php $webPSupport = '.webp';?>
        <?php } else { ?>
			<?php $webPSupport = '';?>
        <?php } ?>

   <?php 
       $queried_object = get_queried_object(); 
       $taxonomy = $queried_object->taxonomy;
       $term_id = $queried_object->term_id; 
  ?>

<?php if( get_field('header_style', $taxonomy . '_' . $term_id) == 'full-width-image' ) { ?>

	 <?php 
        $categoryAttachmentId = get_field('background_image', $taxonomy . '_' . $term_id);
        $categorySize = 'fullWidthHeaderImage';
        $categoryImage = wp_get_attachment_image_src($categoryAttachmentId, $categorySize); 
     ?>    

	<div class="container-fluid standard-header-post no-padding" title="<?php echo get_post_meta($categoryImage, '_wp_attachment_image_alt', true) ?>" style="background:url(<?php echo $categoryImage[0];?><?php echo $webPSupport;?>) <?php echo the_field('background_position', $taxonomy . '_' . $term_id);?> no-repeat;" data-imageLoad="<?php echo $sliderImage[0];?><?php echo $webPSupport;?>">
		<?php 
            $color = get_field('overlay_colour', $taxonomy . '_' . $term_id);
            $rgba = hex2rgba($color, 0.7);
        ?>
    
    	<div class="overlay" style=" <?php if( get_field('overlay', $taxonomy . '_' . $term_id) == 'yes' ): ?>background:<?php echo $rgba;?><?php endif; ?>">
        
<?php } else if( get_field('header_style', $taxonomy . '_' . $term_id) == 'block-background-colour' ) { ?>
	<div class="container-fluid standard-header-post block-colour no-padding" title="<?php echo get_post_meta($categoryImage, '_wp_attachment_image_alt', true) ?>"  style="background:<?php echo the_field('background_block_colour', $taxonomy . '_' . $term_id);?>">
		<div class="overlay">
<?php } ?>

    	<div class="container vertical">
        	<div class="row">
            	<div class="col-12">
                    <?php if ( function_exists('yoast_breadcrumb') ) 
                    {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                    <h1><?php single_term_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid post-list reduce-header">
	<div class="container">
    	<div class="row">
		<?php
			if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
	
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					include( get_stylesheet_directory() . '/template-parts/post/content-news.php');
	
				endwhile; ?>
                
                <?php wp_pagination_nav();?>
		
			<?php else :
	
				include( get_stylesheet_directory() .'/template-parts/post/content-none.php' );

			endif; ?>
        </div>
    </div>
</div>


<?php get_footer();
