        <div class="container-fluid flexible-row-block full-width-image">
        	<div class="row">
            	<div class="col no-padding">
                	<div class="image-container">
                    	<?php 
                        $fullAttachmentId = get_sub_field('image');
                        $fullSize = 'fullWidthHeaderImage';
                        $fullImage = wp_get_attachment_image_src($fullAttachmentId, $fullSize); 
						?>
                        
                        <img src="<?php echo $fullImage[0];?>" alt="<?php echo get_post_meta($fullAttachmentId, '_wp_attachment_image_alt', true) ?>"/>
                    </div>
                </div>
            </div>
        </div>