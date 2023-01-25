<div class="container-fluid accreditation-block">
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-12">
				<h4>Accreditations &amp; memberships</h4>
			</div>

   				<?php 
					while ( have_rows('accreditations', 'option') ) : the_row();
				
						$AttachmentId = get_sub_field('image');
						$Size = 'accreditationLogo';		
						$Image = wp_get_attachment_image_src($AttachmentId, $Size);
						$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
				?>      
					<div class="col-6 col-md-3">
						<div class="accreditations-inner float-left w-100">    
							<a class="accred-logo-container w-auto horizontal mb-5" rel="external" <?php if (get_sub_field('link','option')) {?>href="<?php echo the_sub_field('link','option');?>"<?php } ?> target="_blank">
								<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
							</a>
						</div>
					</div>
				 <?php endwhile; ?>
        </div>
    </div>
</div>