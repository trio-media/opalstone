<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-slider.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-intro.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-coloured-ctas.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-featured-pages.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-cta-block.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-testimonials.php');?>

<?php 
while( have_rows('working_with', 'option') ): the_row(); 
	
$images = get_sub_field('images');
?>
<div class="container-fluid working-with">
	<div class="container">
		<div class="row">
			<h2 class="float-left w-100"><?php echo the_sub_field('title'); ?></h2>
			
			<div class="logos-slider float-left w-100">
				<?php 
				foreach ($images as $image) { 
				$AttachmentId = $image;
				$Size = 'accreditationLogo';		
				$Image = wp_get_attachment_image_src($AttachmentId, $Size);
				$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
				?>
					<div class="logo-contaier float-left">
						<img src="<?php echo $Image[0]; ?>" alt="<?php echo $alt; ?>">
					</div>

				<?php } ?>
			</div>
		</div>
	</div>
     
</div>
<?php include( get_stylesheet_directory() . '/template-parts/post/content-accreditations.php');?>


<div class="container-fluid post-list">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Latest news</h2>
				
				<a href="<?php echo get_post_type_archive_link( 'news' ); ?>" class="view-all">Read all news</a>
			</div>

			<?php
				global $post;
				$args = array( 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'post_type' => 'news' );

				$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post );

					include( get_stylesheet_directory() . '/template-parts/post/content-news.php');

					endforeach; 
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>


<?php endwhile; ?>