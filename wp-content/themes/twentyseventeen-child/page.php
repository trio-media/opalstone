<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-hero.php');?>

<div class="container-fluid contact-block">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 content">
				
				<h2><?php echo the_field('contact_details_title'); ?></h2>
				
				<div class="meta-inner">
					<i class="fas fa-phone-alt"></i>
					<a href="tel:<?php echo the_field('main_telephone_number','option');?>">
						<?php echo the_field('main_telephone_number','option');?>
					</a>
				</div>

				<div class="meta-inner email">
					<i class="fas fa-envelope"></i>
					<a href="mailto:<?php echo the_field('main_email_address','option');?>">
						<?php echo the_field('main_email_address','option');?>
					</a>
				</div>   

				<div class="float-left w-100 d-flex justify-content-between">
					<div class="meta-inner address">
						<i class="fas fa-map-marker-alt"></i>
						<a href="<?php echo the_field('google_map_link','option');?>" target="_blank">
							<?php the_field('address', 'option'); ?>
						</a>
					</div>

					<?php if (get_field('other_address', 'option')) { ?>
					<div class="meta-inner address">
						<i class="fas fa-map-marker-alt"></i>
						<a href="<?php echo the_field('other_google_map_link','option');?>" target="_blank">
							<?php the_field('other_address', 'option'); ?>
						</a>
					</div>
					<?php } ?>
				</div>

				<?php 
				$location = get_field('map_location', 'option');
				$otherlocation = get_field('other_map_location', 'option');
				if( $location || $otherlocation ): ?>
					<div class="acf-map" data-zoom="16">
						<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
						
						<?php if ($otherlocation) { ?>
							<div class="marker" data-lat="<?php echo esc_attr($otherlocation['lat']); ?>" data-lng="<?php echo esc_attr($otherlocation['lng']); ?>"></div>
						<?php } ?>
					</div>
				<?php endif; ?>
				
				<ul class="social-media">
					<?php while ( have_rows('social_media','option') ) : the_row();?>
						<li>
							<a href="<?php echo the_sub_field('social_media_link','option');?>" class="fab fa-<?php echo the_sub_field('social_media_type','option');?>" target="blank">
							</a>
						</li>
					<?php endwhile; ?>
				</ul> 
			
				<div id="map"></div>
			</div>

			<div class="col-12 col-sm-6 col-md-6">
				<?php echo('<script type="text/javascript" src="https://form.jotform.com/jsform/220482145172348"></script>'); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer();
