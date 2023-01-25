<?php
/**
 * Template Name: Sector Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

get_header(); ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-hero.php');?>

<?php
	while ( have_rows('flexible_content') ) : the_row();

		if(get_row_layout() == 'standard_content'){

			include(get_stylesheet_directory() . '/template-parts/modular-blocks/standard-content.php');

		} elseif(get_row_layout() == 'blockquote_row'){

			include(get_stylesheet_directory() . '/template-parts/modular-blocks/blockquote-row.php');

		} elseif(get_row_layout() == 'image_content_split_block'){

			include( get_stylesheet_directory() . '/template-parts/post/content-image-text-split.php');

		}

	endwhile;
?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-contact.php');?>

<?php get_footer();