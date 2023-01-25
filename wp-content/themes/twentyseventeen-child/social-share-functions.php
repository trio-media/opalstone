<?php
//social share function file

function social_sharing_buttons() {
	
	global $post;
	
		// Get current page URL 
		$socialURL = urlencode(get_permalink());
 
		// Get current page title
		$socialTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $socialShareTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		 // Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$socialTitle.'&amp;url='.$socialURL.'';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialURL;
		$googleURL = 'https://plus.google.com/share?url='.$socialURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$socialURL.'&amp;text='.$socialTitle;
		$linkedInURL = 'https://www.linkedin.com/sharing/share-offsite/?url='.$socialURL.'';
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$socialURL.'&amp;media='.$socialThumbnail[0].'&amp;description='.$socialTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<div class="social-share">';
		$content .= '<a class="social-link fab fa-linkedin-in" href="'. $linkedInURL .'" target="_blank"></a>';
		$content .= '<a class="social-link social-twitter" href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '</div>';
		
		return $content;
};

add_shortcode('social_share', 'social_sharing_buttons');

?>