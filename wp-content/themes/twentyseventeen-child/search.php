<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid subpage-hero search" style="
background-image:url(<?php echo $postImage[0];?>);
background-position: center;
background-repeat: no-repeat;
background-size:cover;"
data-imageLoad="<?php echo $postImage[0];?>">

	<div class="container h-100">
		<div class="row vertical">
			<div class="col-12">
				<?php if ( have_posts() ) : ?>
					<h1>
						<b class="search-results">search results for :</b>
						<?php printf(  get_search_query() ); ?>
					</h1>
				<?php else : ?>
					<h1>Sorry, no results found</h1>
				<?php endif; ?>

				<?php if ( function_exists('yoast_breadcrumb') ) 
				{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			</div>
		</div>
	</div>
</div>   

<div class="container-fluid post-list">
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
