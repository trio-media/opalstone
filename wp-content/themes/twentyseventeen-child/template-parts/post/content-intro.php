<?php 
	if( have_rows('intro_block') ):
	while( have_rows('intro_block') ): the_row(); 
?>
		<div class="container-fluid intro-block">
			<div class="container">
				<div class="row text-center">
					<div class="col-0 col-lg-2"></div>
					<div class="col-12 col-lg-8">
						<h2><?php echo the_sub_field('title'); ?></h2>
					</div>
					<div class="col-0 col-lg-2"></div>

					<div class="col-0 col-lg-1"></div>
					<div class="col-12 col-lg-10">
						<?php echo the_sub_field('text'); ?>
					</div>
					<div class="col-0 col-lg-1"></div>
				</div>
			</div>
		</div>
<?php 
	endwhile; 
	endif;
?>