<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid error-404 no-padding no-margin">
	
	<div class="overlay rellax" data-rellax-speed="2" style="
			background-image:url(/wp-content/uploads/2020/07/Layer-1@2x.png);"
			data-imageLoad="/wp-content/uploads/2020/07/Layer-1@2x.png"></div>
	
	<div class="container vertical">
    	<div class="row">
        	<div class="col-xs-12 col-sm-0 col-md-2 col-lg-3">
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            	<div class="error-404-inner">
                	<h1>404</h1>
                    <b class="title">Something has gone wrong</b>
                    
                    <span class="main"><?php echo the_field('404_page_message','option');?></span>
                    
                    <p>To go back to the homepage, <a href="<?php echo get_home_url(); ?>">click here</a>.</p>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-0 col-md-2 col-lg-3">
            </div>
        </div>
    </div>
</div>

<?php get_footer();
