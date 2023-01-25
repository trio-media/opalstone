<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<?php 
if (is_page(2) || is_page(90)) { 
	include( get_stylesheet_directory() . '/template-parts/post/content-accreditations.php');
}
?>

<footer>
    <div class="footer container-fluid no-margin no-scrolling">
        <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-6 col-md-4 col-lg-3">
                	<div class="footer-section">                        
						<span class="title">
                        	Find Us
                        </span>
						
						<div class="meta-inner">
							<i class="fas fa-phone-alt"></i>
							<a href="tel:<?php echo the_field('main_telephone_number','option');?>">
								<?php echo the_field('main_telephone_number','option');?>
							</a>
						</div>
						
						<div class="meta-inner email">
							<i class="fas fa-envelope"></i>
							<a href="mailto:<?php echo the_field('main_email_address','option');?>">
								<?php echo the_field('main_email_address','option');?>
							</a>
						</div>   
						
						<div class="meta-inner address">
							<i class="fas fa-map-marker-alt"></i>
							<a href="<?php echo the_field('google_map_link','option');?>" target="_blank">
								<?php the_field('address', 'option'); ?>
							</a>
						</div>
						
						<div class="meta-inner address d-block d-md-none mt-4">
							<i class="fas fa-map-marker-alt"></i>
							<a href="<?php echo the_field('other_google_map_link','option');?>" target="_blank">
								<?php the_field('other_address', 'option'); ?>
							</a>
						</div>
                    </div>
                </div>
				
				<div class="col-12 col-sm-6 col-md-3">
                	<div class="footer-section">
                    	<span class="title">
                        	Company Details
                        </span>
                        
                        <ul class="menu company-info">
							
							<li>Company Number: 12717919</li>
							<li>VAT Number: 352871976</li>

						</ul>
						
						<div class="meta-inner address d-none d-md-block">
							<i class="fas fa-map-marker-alt"></i>
							<a href="<?php echo the_field('other_google_map_link','option');?>" target="_blank">
								<?php the_field('other_address', 'option'); ?>
							</a>
						</div>

						
                    </div>
                </div>
               
				<div class="col-0 col-lg-1"></div>
				
            	<div class="col-6 col-md-2">
                	<div class="footer-section">
                    	<span class="title">
                        	Solutions
                        </span>
                        
						<?php wp_nav_menu( array('menu' => 'Footer Secure') );?>
                    </div>
                </div>
				
				<div class="col-0 col-md-1"></div>
				
            	<div class="col-6 col-md-3 col-lg-2">
                	<div class="footer-section">
                		<span class="title">
                        	Useful Links
                        </span>
                        
                        <?php wp_nav_menu( array('menu' => 'Footer Useful Links') );?>
                    </div>
                    	
                </div>
            </div>
        </div>
    </div>
	
   <div class="footer-bottom container-fluid no-margin">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-9">
					<p style="text-align:left;">
						&copy; Copyright <?php echo date("Y"); ?> <?php echo the_field('company_name', 'option');?> <span>|</span> all rights reserved
					</p>
				</div>
				<div class="col-12 col-sm-3 d-block">
					<ul class="social-media float-right w-auto no-margin">
						<?php while ( have_rows('social_media','option') ) : the_row();?>
							<li>
								<a href="<?php echo the_sub_field('social_media_link','option');?>" class="fab fa-<?php echo the_sub_field('social_media_type','option');?>" target="blank">
								</a>
							</li>
						<?php endwhile; ?>
					</ul> 
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
