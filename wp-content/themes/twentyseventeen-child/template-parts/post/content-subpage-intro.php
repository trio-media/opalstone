<?php 
	if( have_rows('intro_block') ):
	while( have_rows('intro_block') ): the_row(); 
?>
		<div class="container-fluid subpage-intro-block">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php if (get_sub_field('title')) { ?>
							<?php if (get_field('hide_hero')) { ?>
								<h1><?php echo the_sub_field('title'); ?></h1>
							<?php } else { ?>
								<h2><?php echo the_sub_field('title'); ?></h2>
							<?php } ?>
						<?php } ?>
	
						<?php echo the_sub_field('text'); ?>
					</div>
				</div>
			</div>
		</div>
<?php 
	endwhile; 
	endif;
?>