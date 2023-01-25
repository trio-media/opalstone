<div class="container-fluid image-content-block <?php if (get_sub_field('image_position')) { echo the_sub_field('image_position'); } else { echo 'left'; } ?>-image">
	<div class="container">
		<div class="row vertical-center">
			<div class="col-12 col-md-4 image">
				<div class="image-container <?php if (get_sub_field('show_outline') == 'yes') { echo 'with-outline'; } ?>">
					<?php 
						$contentImageAttachmentId = get_sub_field('image');
						$contentImageSize = 'textImageSplitImage';
						$contentImage = wp_get_attachment_image_src($contentImageAttachmentId, $contentImageSize);
						$alt = get_post_meta($contentImageAttachmentId , '_wp_attachment_image_alt', true);
					?>

					<img src="<?php echo $contentImage[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
				</div>
			</div>

			<div class="col-12 col-md-8 text">
				<div class="float-left">
					<?php if (get_sub_field('title')) { ?>
						<h2><?php the_sub_field('title');?></h2>
					<?php } ?>
					
					<?php the_sub_field('text');?>

					<?php 
						if( have_rows('download_buttons') ):
						while( have_rows('download_buttons') ): the_row(); 
					?>
						<a href="<?php echo the_sub_field('link'); ?>" class="cta-button">
							<i class="fas fa-download"></i>

							<?php echo the_sub_field('text'); ?>
						</a>
					<?php 
						endwhile; 
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>