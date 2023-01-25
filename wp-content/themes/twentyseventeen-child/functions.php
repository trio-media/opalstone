<?php
// All your custom theme functionality goes in here
 //leave this in as it strips out render blocking fonts from the parent theme
function wpse_dequeue_google_fonts() {
    wp_dequeue_style( 'twentyseventeen-fonts' );
}

add_action( 'wp_enqueue_scripts', 'wpse_dequeue_google_fonts', 20 ); 

//enables the use of wordpress ajax
add_action('wp_head', 'cms_ajaxurl');

function cms_ajaxurl() {
  echo '<script type="text/javascript">
          var ajaxurl = "' . admin_url('admin-ajax.php') . '";
        </script>';
}

// Google Maps API Key
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBo88Z56bEUiWW-eLmNsAdclYf__wse6Qw';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

 //enqueue all your custom scripts here
// PLEASE NOTE - IN ORDER TO AVOID FONTS BEING RENDER BLOCKING WE NOW LOAD THEM IN THE FOOTER. SEE FOOTER.PHP FOR REFERENCE
 function my_assets() {
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri().'/assets/css/fontawesome.min.css' );
	wp_enqueue_style( 'faBrandsCss', get_stylesheet_directory_uri().'/assets/css/fa-brands.min.css' );
	wp_enqueue_style( 'faBrandsLight', get_stylesheet_directory_uri().'/assets/css/fa-light.min.css' );
	wp_enqueue_style( 'faBrandsDuo', get_stylesheet_directory_uri().'/assets/css/fa-duotone.min.css' );
	wp_enqueue_style( 'faSolid', get_stylesheet_directory_uri().'/assets/css/fa-solid.min.css' );
	
	wp_enqueue_style( 'GoogleFonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	
	wp_enqueue_style( 'bootstrapCSS', get_stylesheet_directory_uri().'/assets/css/bootstrapnew.min.css' );
 	wp_enqueue_style( 'slick', get_stylesheet_directory_uri().'/assets/css/slick.css');
 	wp_enqueue_style( 'lightbox', get_stylesheet_directory_uri().'/assets/css/lightbox.css');
	wp_enqueue_style( 'selectize', get_stylesheet_directory_uri().'/assets/css/selectize.css');
	wp_enqueue_style( 'childStyle', get_stylesheet_directory_uri().'/custom.css');
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri().'/assets/css/responsive.css');
	 
    wp_register_script( 'bootstrapJS', get_stylesheet_directory_uri().'/assets/js/bootstrapnew.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'bootstrapJS' );
	wp_register_script( 'stickyfillJS', get_stylesheet_directory_uri().'/assets/js/stickyfill.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'stickyfillJS' );
	wp_register_script( 'selectizeJS', get_stylesheet_directory_uri().'/assets/js/selectize.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'selectizeJS' );
	wp_register_script( 'popperJS', get_stylesheet_directory_uri().'/assets/js/popper.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'popperJS' );
	wp_register_script( 'slickslider', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'slickslider' );
	wp_register_script( 'lightboxJS', get_stylesheet_directory_uri().'/assets/js/lightbox.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'lightboxJS' );
	wp_register_script( 'hoverIntent', get_stylesheet_directory_uri().'/assets/js/hoverIntent.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'hoverIntent' );
 	wp_register_script( 'customjs', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'customjs' );
	wp_register_script( 'rellaxJS', get_stylesheet_directory_uri().'/assets/js/rellax.min.js', array('jquery'),'',true  );
 	wp_enqueue_script( 'rellaxJS' );
	 
	wp_enqueue_style( 'cookiePolicy', get_stylesheet_directory_uri().'/assets/css/cookie-policy.css');
	
    //If is a page containing a map, load Google maps
	if(is_page(162)) {
		wp_register_script( 'google_maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyBo88Z56bEUiWW-eLmNsAdclYf__wse6Qw', array('jquery'),'',true  );
		wp_enqueue_script( 'google_maps' );
		wp_register_script( 'google_maps_js', get_stylesheet_directory_uri().'/assets/js/google-maps.js', array('jquery'),'',true  );
		wp_enqueue_script( 'google_maps_js' );
	}
 };
 add_action( 'wp_enqueue_scripts', 'my_assets' );

//custom image sizes PLEASE STICK TO CAMEL CASING
//PLEASE NOTE - FOR OPTIMAL SCALING PLEASE MAKE IMAGE SIZES TWICE WHAT YOU INITIALLY NEED
add_image_size( 'fullWidthHeaderImage', 1600, 0 ); //THIS IS FOR YOUR SLIDERS OR HERO IMAGES WHERE WE ARE ALLOWING CROPPING / SETTING POSITION WITH BACKGROUND IMAGE FIELDS
add_image_size( 'logoMainImage', 502, 0 );

add_image_size( 'accreditationLogo', 0, 162, false );
add_image_size( 'lightboxImageSize', 1170, 0, false );
add_image_size( 'colouredCTAImage', 0, 166, false );
add_image_size( 'mapImage', 0, 1440, false );
add_image_size( 'newsImage', 0, 460, false );
add_image_size( 'textImageSplitImage', 0, 750, false );
add_image_size( 'mapsMarker', 40, 0, false );
add_image_size( 'testimonialImage', 0, 900, false );

 // adds ACF options page
remove_filter ('acf_the_content', 'wpautop');
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
} 

//adds custom navigation to post archives
 function wp_pagination_nav() {
 	if( is_singular() )
 		return;
 	global $wp_query;
 	/** Stop execution if there's only 1 page */
 	if( $wp_query->max_num_pages <= 1 )
 		return;
 	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
 	$max   = intval( $wp_query->max_num_pages );
 	/**	Add current page to the array */
 	if ( $paged >= 1 )
 		$links[] = $paged;
 	/**	Add the pages around the current page to the array */
 	if ( $paged >= 3 ) {
 		$links[] = $paged - 1;
 		$links[] = $paged - 2;
 	}
 	if ( ( $paged + 2 ) <= $max ) {
 		$links[] = $paged + 2;
 		$links[] = $paged + 1;
 	}
 	echo '<div class="navigation"><ul>' . "\n";
 	/**	Link to first page, plus ellipses if necessary */
 	if ( ! in_array( 1, $links ) ) {
 		$class = 1 == $paged ? ' class="active"' : '';
 		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 		if ( ! in_array( 2, $links ) )
 			echo '<li>…</li>';
 	}
 	/**	Link to current page, plus 2 pages in either direction if necessary */
 	sort( $links );
 	foreach ( (array) $links as $link ) {
 		$class = $paged == $link ? ' class="active"' : '';
 		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
 	}
 	/**	Link to last page, plus ellipses if necessary */
 	if ( ! in_array( $max, $links ) ) {
 		if ( ! in_array( $max - 1, $links ) )
 			echo '<li>…</li>' . "\n";
 		$class = $paged == $max ? ' class="active"' : '';
 		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
 	} 
 	echo '</ul></div>' . "\n";
 }
 
//Loads custom post type for news
if ( ! function_exists('custom_post_news') ) {

// Register Custom Post Type
function custom_post_news() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News', 'text_domain' ),
		'name_admin_bar'        => __( 'News Type', 'text_domain' ),
		'archives'              => __( 'News Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent News:', 'text_domain' ),
		'all_items'             => __( 'All News', 'text_domain' ),
		'add_new_item'          => __( 'Add News Post', 'text_domain' ),
		'add_new'               => __( 'Add News Post', 'text_domain' ),
		'new_item'              => __( 'New Post ', 'text_domain' ),
		'edit_item'             => __( 'Edit Post', 'text_domain' ),
		'update_item'           => __( 'Update Post', 'text_domain' ),
		'view_item'             => __( 'View Post', 'text_domain' ),
		'search_items'          => __( 'Search News Posts', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into News Post', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News Post', 'text_domain' ),
		'items_list'            => __( 'News list', 'text_domain' ),
		'items_list_navigation' => __( 'News list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter News list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'News', 'text_domain' ),
		'description'           => __( 'News', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', 'post-formats'),
		'taxonomies'            => array( 'news_cat', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page'
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'custom_post_news', 0 );

function create_news_taxonomies() {
    $labels = array(
        'name'              => _x( 'News Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'News Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search News Categories' ),
        'all_items'         => __( 'All News Categories' ),
        'parent_item'       => __( 'Parent News Category' ),
        'parent_item_colon' => __( 'Parent News Category:' ),
        'edit_item'         => __( 'Edit News Category' ),
        'update_item'       => __( 'Update News Category' ),
        'add_new_item'      => __( 'Add New News Category' ),
        'new_item_name'     => __( 'New News Category Name' ),
        'menu_name'         => __( 'News Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'news-category' ),
    );

    register_taxonomy( 'news_categories', array( 'news' ), $args );
}
add_action( 'init', 'create_news_taxonomies', 0 );

}

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/assets/css/adminStyles.css' );
}
add_action('admin_enqueue_scripts', 'admin_style');
 
//hack back in the menu into the navbar
function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' ); 

//converts your hex code on overlay to rgba for overlays
/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

// custom paging category activate when necessary
/*add_filter('pre_get_posts', 'per_category_basis');
function per_category_basis($query){
if ($query->is_category) {
        // category named 'books' show 12 posts
        if (is_category('books')){
            $query->set('posts_per_page', -1);
        }
    }
    return $query;
}*/


//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'crunchify_disable_woocommerce_loading_css_js' );
 
function crunchify_disable_woocommerce_loading_css_js() {
 
	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){
 
		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) { 		
			
			## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout'); 
			wp_dequeue_style('woocommerce-general'); 
			wp_dequeue_style('woocommerce-smallscreen'); 	
 
			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce'); 
			wp_dequeue_script('wc-add-to-cart'); 
		
			wp_deregister_script( 'js-cookie' );
			wp_dequeue_script( 'js-cookie' );
 
		}
	}	
}

//allow SVGs
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//Hide themes, tools and customise from editor and shop managers
//Editor Roles
function hide_menu($page) {
    if (current_user_can('editor') || current_user_can('shop_manager')) {

        remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
        remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
        remove_menu_page( 'tools.php', 'tools.php' ); // hide the widgets submenu
		
		// Customize
		global $submenu;
        unset($submenu['themes.php'][6]); // Customize	
    }
}
add_action('admin_menu', 'hide_menu', 110);

// Move Yoast to bottom
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

//Add Excerpt to the pages also
add_post_type_support( 'page', 'excerpt' );



//Filter posts dynamically
function filter_posts_by_ajax() {

	// The $_REQUEST contains all the data sent via ajax
	if ( isset($_REQUEST) ) {

		//Post requested
		$response = array();
		$output = "";
		$terms = $_REQUEST['terms'];
		$post_type = $_REQUEST['post_type'];
		$taxonomy = $_REQUEST['taxonomy'];

		if($post_type == 'news'){
			//If we're finding all...
			if (in_array("all",$terms)) {

				// get all terms in the taxonomy
				$all_terms = get_terms( 'news_categories' );

				// convert array of term objects to array of term IDs
				$terms = wp_list_pluck( $all_terms, 'slug' );

			}
		}

		//Get categories
		$args = array(
			   'post_type' => $post_type,
				'orderby'   => 'title',
				'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'slug',
						'terms'    => $terms,
					),
				),

				'posts_per_page' => '-1',
				'post_status' => array('publish')
		);

	   $filtered_posts = new WP_Query( $args );

	   if($filtered_posts->have_posts()) :

	   		if($post_type == 'news'){

				while($filtered_posts->have_posts()) :
				$filtered_posts->the_post();

					include(get_stylesheet_directory().'/template-parts/post/content-news.php');

				endwhile;

			}

		endif;
	}

	//Die AJAX content
	die();

}
add_action( 'wp_ajax_filter_posts_by_ajax', 'filter_posts_by_ajax' );
add_action( 'wp_ajax_nopriv_filter_posts_by_ajax', 'filter_posts_by_ajax' );


// Changing excerpt more
function new_excerpt_more($more) {
  global $post;
  remove_filter('excerpt_more', 'new_excerpt_more'); 
  return '';
}
add_filter('excerpt_more','new_excerpt_more',11);

//custom excerpt length
function tn_custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

//Include social share function
include('social-share-functions.php');

//Only return news posts when searching
function search_filter($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
			$query->set( 'post_type', 'news' );
			
			$query->set( 'posts_per_page', 8 );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter' );
?>