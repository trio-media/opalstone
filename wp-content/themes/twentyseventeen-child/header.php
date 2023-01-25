<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script>
  window.Tether = {};
</script>
<?php wp_head(); ?>
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) { ?>
	<!---- Drop your analytics coe in here to avoid it being detected and marked down by google pagespeed/gtmetrix ---->
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KSNXRQ7');</script>
	<!-- End Google Tag Manager -->
<?php } ?>
</head>
 
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KSNXRQ7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	

<div id="scrollToTop"></div>
 
<header class="container-fluid header">
    <div class="container header-top">
        <div class="row">
            <div class="col-12 col-md-2">
				<a href="#" class="vertical mobile-only float-left burgerMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
				
                <a href="<?php echo get_home_url(); ?>" id="logo-main">
                    <?php 
                        $logoAttachmentId = get_field('main_logo', 'option');
                        $logoSize = 'logoMainImage';
                        $logoImage = wp_get_attachment_image_src($logoAttachmentId, $logoSize); 
                    ?> 
                   
                    <img src="<?php echo $logoImage[0];?>" alt="Opalstone Logo"/>
                </a>
				
				<a href="tel:<?php echo the_field('main_telephone_number','option');?>" class="vertical mobile-only float-right">
					<i class="fas fa-phone"></i>
				</a>
            </div>
        
            <div class="col-0 col-md-10">

            	<a href="<?php echo the_permalink(706); ?>" class="risk-assessment">Arrange a risk assessment</a>

				<a href="tel:<?php echo the_field('main_telephone_number','option');?>" class="call-today">
					<?php echo the_field('main_telephone_number','option');?>
				</a>
				
				<a href="mailto:<?php echo the_field('main_email_address','option');?>" class="email">
					<?php echo the_field('main_email_address','option');?>
				</a>
 
                <a href="#" class="vertical" id="burgerMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>

                <div id="new-nav-bar" class="float-right">
					<?php wp_nav_menu( array('menu' => 'Main Menu') );?>
				</div>
            </div>

        </div>
    </div>

</header>
	
<div class="mobile-menu-container">

	<a href="#" class="vertical mobile-only float-left burgerMenu">
        <span></span>
        <span></span>
        <span></span>
    </a>

	<?php wp_nav_menu( array('menu' => 'Mobile Menu') );?>

	<div class="menu-meta">
		<a href="<?php echo the_permalink(706); ?>">Arrange a risk assessment</a>

		<a href="tel:<?php echo the_field('main_telephone_number','option');?>">
			<?php echo the_field('main_telephone_number','option');?>
		</a>

		<a href="mailto:<?php echo the_field('main_email_address','option');?>">
			<?php echo the_field('main_email_address','option');?>
		</a>
	</div>
</div>