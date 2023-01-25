<div class="container-fluid flexible-row-block subpage-intro-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php 
				if (get_sub_field('centre')) {
					$heading = "3";
				} else {
					$heading = "2";
				}
				if (get_sub_field('title')) { ?>
				<h<?php echo $heading; ?>>
					<?php if (get_sub_field('link')) { echo "<a href='".get_sub_field('link')."'>"; } ?>
					
					<?php echo the_sub_field('title'); ?>

					<?php if (get_sub_field('link')) { echo "</a>"; } ?>
				</h<?php echo $heading; ?>>
				<?php } ?>
				<?php echo the_sub_field('text'); ?>
			</div>
		</div>
	</div>
</div>