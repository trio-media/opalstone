<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article class="col-12 col-sm-6 col-md-4">
	<div class="news-post" id="news-post-<?php the_ID(); ?>">
    	<a href="<?php the_permalink();?>" class="post-thumbnail-outer">
        	<?php if (has_post_thumbnail( $post->ID ) ) { ?>
            <?php 
			$thumbnail_id = get_post_thumbnail_id( $post->ID ); 
			$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        	$postImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'newsImage');
			?>
        	<img class="horizontal" src="<?php echo $postImage[0];?>" alt="<?php echo $alt; ?>" />
            <?php } else { ?>
            	<div class="vertical missing-img title">
                	Sorry, we don't currently have an image for this post
                </div>
            <?php } ?>
        </a>
        
        <div class="post-content">
        	<h3 title="<?php the_title();?>">
            	<a href="<?php the_permalink();?>">
					<?php
                    $thetitle = get_the_title($post->ID);
                    $getlength = strlen($thetitle);
                    $thelength = 70;
                    echo substr($thetitle, 0, $thelength);
                    if ($getlength > $thelength) echo "...";
                    ?>
                </a>
            </h3>
			
			<?php echo do_shortcode('[social_share]');?> 
        </div>
    </div>
</article>


