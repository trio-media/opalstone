        <div class="container-fluid flexible-row-block block-gallery">
        	<div class="container">
            	<div class="row block-gallery-listing">
                
                	<div class="col-0 col-sm-1"></div>
                    
                    <div class="col">
                    
                    	<div class="row">
                    
							<?php
                            // loop through the rows of data
                            while ( have_rows('images') ) : the_row(); ?>
                            
                                <div class="col col-sm-4">
                                    <div class="block-gallery-image">
                                        <?php 
                                        $galleryAttachmentId = get_sub_field('select_image');
                                        $gallerySize = 'largeTile';								
                                        $galleryLarge = 'lightboxImageSize';
                                        
                                        $galleryImage = wp_get_attachment_image_src($galleryAttachmentId, $gallerySize);
                                        $galleryLargeImage = wp_get_attachment_image_src($galleryAttachmentId, $galleryLarge);
                                        ?>
                                        <a href="<?php echo $galleryLargeImage[0];?>" data-lightbox="postImages">
                                            <img src="<?php echo $galleryImage[0];?>" alt="<?php echo get_post_meta($galleryAttachmentId, '_wp_attachment_image_alt', true) ?>"/>
                                        </a>
                                    </div>
                                </div>
                            
                            <?php endwhile;?>
                        
                        </div>
                    
                    </div>
                    
                    <div class="col-0 col-sm-1"></div>
                    
                </div>
            </div>
        </div>