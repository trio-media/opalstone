<div class="container-fluid contact-block">
	<div class="container">
		<div class="row">
			<?php 
			if( have_rows('contact_block_text') ):
			while ( have_rows('contact_block_text') ) : the_row();
			?>
			
			<?php if (get_sub_field('split_text')) { ?>
				<div class="col-12 col-md-4 bullets">
					<div class="float-left w-100 mb-3">
						<h2>Features: </h2>
						
						<?php echo the_sub_field('split_text'); ?>
					</div>
				</div>	
			
				<div class="col-12 col-md-8">
			<?php } else { ?>
				<div class="col-12">
			<?php 
				} 
			?>
					
				<?php 
					if (get_sub_field('title') || get_sub_field('text')) { 
				?>
						<h2><?php echo the_sub_field('title'); ?></h2>

						<?php echo the_sub_field('text'); ?>
				<?php 
					} else { 
						if( have_rows('contact_block', 'options') ): 
						while ( have_rows('contact_block', 'options') ) : the_row();
				?>
							<h2><?php echo the_sub_field('title'); ?></h2>

							<?php echo the_sub_field('text'); ?>
				<?php
						endwhile;
						endif;
					}

				endwhile;
				endif; 
				echo do_shortcode('<script type="text/javascript" src="https://form.jotform.com/jsform/220534444344349"></script>');
				?>
			</div>
		</div>
	</div>
</div>