<?php if( have_rows('featured_pages') ): ?>
	<div class="container-fluid coloured-cta-block featured-pages">
		<div class="container">
			<div class="row">	
				<?php 
				while ( have_rows('featured_pages') ) : the_row();

				$id = get_sub_field('page');
				$temp = $post;
				$post = get_post( $id );
				setup_postdata( $post );

				$thumbnail_id = get_post_thumbnail_id( $id ); 
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
				$postImage = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'newsImage');
				?>
					<div class="col-12 col-sm-6 col-md-4">
						<a href="<?php echo the_permalink(); ?>" class="coloured-cta-container <?php echo the_title(); ?>">
							<div class="image-container">
								<img src="<?php echo $postImage[0];?>" alt="<?php echo $alt; ?>" class="horizontal" />
							</div>

							<span class="title horizontal">
								<?php 
								if (get_sub_field('overwrite_page_title')) {
									echo the_sub_field('overwrite_page_title');
								} else { 
									echo the_title(); 
								}
								?>
							</span>
						</a>
					</div>
				<?php 
				wp_reset_postdata();
				$post = $temp;
				endwhile; 
				?>
			</div>
		</div>
	</div>
<?php endif; ?>