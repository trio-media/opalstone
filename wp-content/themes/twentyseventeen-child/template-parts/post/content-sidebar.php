<aside class="sidebar-section">
	<span class="title">get in touch with us</span>
    
    <div class="contact-meta">
    	<a href="tel:<?php echo the_field('main_telephone_number','option');?>">
        	<i class="fa fa-phone"></i>
            <span class="vertical"><?php echo the_field('main_telephone_number','option');?></span>
        </a>
    	<a href="mailto:<?php echo the_field('main_email_address','option');?>">
        	<i class="fa fa-envelope"></i>
            <span class="vertical"><?php echo the_field('main_email_address','option');?></span>
        </a>
    	<a href="<?php echo the_field('google_map_link','option');?>" target="_blank" class="address">
        	<i class="fa fa-home"></i>
            <span class="address"><?php the_field('address', 'option', false, false); ?></span>
        </a>
        
        <ul class="social-media">
   			<?php
			   // loop through the rows of data
                while ( have_rows('social_media','option') ) : the_row();?>
            
                   <li>
                       <a href="<?php echo the_sub_field('social_media_link','option');?>" target="blank">
                            <i class="fa fa-<?php echo the_sub_field('social_media_type','option');?>"></i>
                        </a>
                    </li>
            
             <?php   
     			endwhile;
            ?>
        </ul>
    </div>    
</aside>

<aside class="sidebar-section">
	<span class="title">useful links</span>
    <?php wp_nav_menu( array('menu' => 'Sidebar Menu') );?>
</aside>