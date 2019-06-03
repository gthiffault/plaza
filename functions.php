<?php


/**
 * Hôtel Plaza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hôtel_Plaza
 */

if ( ! function_exists( 'plaza_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function plaza_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hôtel Plaza, use a find and replace
		 * to change 'plaza' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'plaza', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'plaza' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'plaza_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'plaza_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function plaza_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'plaza_content_width', 640 );
}
add_action( 'after_setup_theme', 'plaza_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function plaza_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'plaza' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'plaza' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'plaza_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function plaza_scripts() {
	wp_enqueue_style( 'plaza-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'plaza_scripts' );


add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

function remove_pages_editor(){

        remove_post_type_support( 'page', 'editor' );

} // end remove_pages_editor
add_action( 'add_meta_boxes', 'remove_pages_editor' );


function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call

// Register Custom Post Type
function cptAccommodation() {

	$labels = array(
		'name'                  => _x( 'Hébergement', 'Post Type General Name', 'plaza' ),
		'singular_name'         => _x( 'Hébergement', 'Post Type Singular Name', 'plaza' ),
		'menu_name'             => __( 'Hébergement', 'plaza' ),
		'name_admin_bar'        => __( 'Hébergement', 'plaza' ),
		'archives'              => __( 'Archives de l\'hébergement', 'plaza' ),
		'attributes'            => __( 'Attributs d\'objet', 'plaza' ),
		'parent_item_colon'     => __( 'Article parent:', 'plaza' ),
		'all_items'             => __( 'Toutes les chambres', 'plaza' ),
		'add_new_item'          => __( 'Ajouter une nouvelle chambre', 'plaza' ),
		'add_new'               => __( 'Ajouter une nouvelle chambre', 'plaza' ),
		'new_item'              => __( 'Ajouter une nouvelle chambre', 'plaza' ),
		'edit_item'             => __( 'Modifier la chambre', 'plaza' ),
		'update_item'           => __( 'Mettre à jour la chambre', 'plaza' ),
		'view_item'             => __( 'Voir la chambre', 'plaza' ),
		'view_items'            => __( 'Voir la chambre', 'plaza' ),
		'search_items'          => __( 'Chercher une chambre', 'plaza' ),
		'not_found'             => __( 'Non-trouvée', 'plaza' ),
		'not_found_in_trash'    => __( 'Non-trouvée dans la corbeille', 'plaza' ),
		'featured_image'        => __( 'Image vedette', 'plaza' ),
		'set_featured_image'    => __( 'Définir l\'image vedette', 'plaza' ),
		'remove_featured_image' => __( 'Retirer l\'image vedette', 'plaza' ),
		'use_featured_image'    => __( 'Utiliser comme image vedette', 'plaza' ),
		'insert_into_item'      => __( 'Insert into item', 'plaza' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'plaza' ),
		'items_list'            => __( 'Items list', 'plaza' ),
		'items_list_navigation' => __( 'Items list navigation', 'plaza' ),
		'filter_items_list'     => __( 'Filter items list', 'plaza' ),
	);
	$args = array(
		'label'                 => __( 'Hébergement', 'plaza' ),
		'description'           => __( 'Hébergement', 'plaza' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
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
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'accommodation', $args );

}
add_action( 'init', 'cptAccommodation', 0 );

// Register Custom Post Type
function cptCareer() {

	$labels = array(
		'name'                  => _x( 'Postes disponibles', 'Post Type General Name', 'plaza' ),
		'singular_name'         => _x( 'Poste disponible', 'Post Type Singular Name', 'plaza' ),
		'menu_name'             => __( 'Carrière', 'plaza' ),
		'name_admin_bar'        => __( 'Carrière', 'plaza' ),
		'archives'              => __( 'Archives des postes disponibles', 'plaza' ),
		'attributes'            => __( 'Attributs d\'objet', 'plaza' ),
		'parent_item_colon'     => __( 'Article parent:', 'plaza' ),
		'all_items'             => __( 'Tous les postes disponibles', 'plaza' ),
		'add_new_item'          => __( 'Ajouter un poste', 'plaza' ),
		'add_new'               => __( 'Ajouter un poste', 'plaza' ),
		'new_item'              => __( 'Ajouter un poste', 'plaza' ),
		'edit_item'             => __( 'Modifier le poste', 'plaza' ),
		'update_item'           => __( 'Mettre à jour le poste', 'plaza' ),
		'view_item'             => __( 'Voir le poste', 'plaza' ),
		'view_items'            => __( 'Voir le poste', 'plaza' ),
		'search_items'          => __( 'Chercher un poste', 'plaza' ),
		'not_found'             => __( 'Non-trouvé', 'plaza' ),
		'not_found_in_trash'    => __( 'Non-trouvé dans la corbeille', 'plaza' ),
		'featured_image'        => __( 'Image vedette', 'plaza' ),
		'set_featured_image'    => __( 'Définir l\'image vedette', 'plaza' ),
		'remove_featured_image' => __( 'Retirer l\'image vedette', 'plaza' ),
		'use_featured_image'    => __( 'Utiliser comme image vedette', 'plaza' ),
		'insert_into_item'      => __( 'Insert into item', 'plaza' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'plaza' ),
		'items_list'            => __( 'Items list', 'plaza' ),
		'items_list_navigation' => __( 'Items list navigation', 'plaza' ),
		'filter_items_list'     => __( 'Filter items list', 'plaza' ),
	);
	$args = array(
		'label'                 => __( 'Poste disponible', 'plaza' ),
		'description'           => __( 'Poste disponible', 'plaza' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
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
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'career', $args );

}
add_action( 'init', 'cptCareer', 0 );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/*
 * -----------------------------------------------------------------------------
 * Advanced Custom Fields Modifications
 * -----------------------------------------------------------------------------
*/
function PREFIX_apply_acf_modifications() {
?>
  <style>
    .acf-editor-wrap iframe {
      min-height: 0;
    }
  </style>
  <script>
    (function($) {
      // (filter called before the tinyMCE instance is created)
      acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
        // enable autoresizing of the WYSIWYG editor
        mceInit.wp_autoresize_on = true;
        return mceInit;
      });
      // (action called when a WYSIWYG tinymce element has been initialized)
      acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
        // reduce tinymce's min-height settings
        ed.settings.autoresize_min_height = 200;
        // reduce iframe's 'height' style to match tinymce settings
        $('.acf-editor-wrap iframe').css('height', '200px');
      });
    })(jQuery)
  </script>
<?php
}

add_image_size( 'list-img', 564, 377, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'device-img', 564, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'banner-home', 1440,720, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'banner-page', 1440,560, array( 'center', 'center' ) ); // Hard crop left top

add_image_size( 'img-type-one', 411,569, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-type-two', 514,666, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-type-thr', 411,318, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-type-for', 368,472, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-type-fiv', 634,483, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-type-six', 465,343, array( 'center', 'center' ) ); // Hard crop left top

add_image_size( 'img-bg-one', 1440,500, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'img-bg-two', 1440,568, array( 'center', 'center' ) ); // Hard crop left top

add_image_size( 'img-type-men', 360,487, array( 'center', 'center' ) ); // Hard crop left top


add_filter( 'gform_pre_render_1', 'populate_posts' );
add_filter( 'gform_pre_validation_1', 'populate_posts' );
add_filter( 'gform_pre_submission_filter_1', 'populate_posts' );
add_filter( 'gform_admin_pre_render_1', 'populate_posts' );
function populate_posts( $form ) {
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( strpos( $field->cssClass, 'populate-posts' ) === false ) {
            continue;
        }
 
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=career' );
 
        $choices = array();
 
        foreach ( $posts as $post ) {
        	$post_language_information = wpml_get_language_information(get_the_ID());
        	if($post_language_information['language_code'] == ICL_LANGUAGE_CODE) {
            	$choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        	}
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Post';
        $field->choices = $choices;
 
    }
 
    return $form;
}

function sc_list_accommodation( $atts ) {
    $a = shortcode_atts( array(
        'count' => '',
    ), $atts );






	ob_start();?>
		<li class="c-accommodation_nb-<?php echo $a['count'];?>">
			<figure>
				<?php 
$image_id = get_post_thumbnail_id();

$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);?>		


<?php 

$images = get_field('accomodationImages');
$size = 'list-img'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
    <ul class="c-accommodation_slider">
        <?php foreach( $images as $image ): ?>
            <li>
            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>






				<figcaption>
					<h3><?php echo get_the_title();?></h3>
<!-- 					<ul class="c-accomodation_item">
						
						<?php // Declaration
						// $bed 	= "";
						// $space 	= "";
						// $people = "";
						// // Initialisation 
						// $bed 	= get_field('accomodationBed');
						// $space 	= get_field('accomodationLivingSpace');
						// $people = get_field('accomodationPeople');
						?>						

<!-- 						<li class="-bed"><?php //echo $bed;?></li>
						<li class="-area"><?php //echo $space . ' ';?><?php //echo __('ft','plaza');?><sup>2</sup></li>
						<li class="-people"><?php //echo $people . ' ';?><?php //echo __('ppl','plaza');?></li> -->
					<!-- </ul>  -->
					<div class="c-accomodation_item_content">
						<div class="c-accomodation_item_description">
						<?php echo get_field('accomodationContent');?>
						</div>
						<a href="<?php echo get_field('bookingLink','option')['url'];?>" target="_blank" class="c-btn c-btn--primary"><?php echo __('Reserve now','plaza');?></a>
					</div>
					<div class="c-icon"></div>

				</figcaption>
			</figure>
		</li>	

	<?php return ob_get_clean();
}

add_shortcode( 'list_accommodation', 'sc_list_accommodation' );

function sc_accordion( $atts ) {
    $a = shortcode_atts( array(
        'title' => '',
        'content' => '',
        'contentvisible' => '',
        'accordion' => '',
        'pagetype' => '',
        'accordiontitle' => '',
        'accordioncontent' => '',        
        'divtype' => '',
        'wrapper' => '',
        'gallery' => '',
        'id'=>''
    ), $atts );
	ob_start();?>
	<<?php echo $a['divtype'];?> 		 	<?php if (!empty(($a['id']))) { ?>
				id="packages"
			<?php } ?> class="o-section c-block-accordion <?php echo $a['pagetype']; ?>">
		<?php
		 	if (!empty(($a['wrapper']))) { ?>
				<div class="o-wrapper">
			<?php } ?>	
			<?php 
			if (!empty($a['contentvisible'])) {?>
			<div class="c-accordion_content">
				<h2><?php echo get_field($a['title']);?></h2>
				<?php echo get_field($a['content']);
				echo '</div>';
			}	?>
		<?php if (!empty($a['gallery'])) {	?>
		 	<?php if (!empty(($a['wrapper']))) { ?>
				</div>
			<?php } ?>			
<div class="c-activities-gallery">
	


<?php 

$images = get_field('activitiesSlider');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
    <ul class="c-activities-slider">
        <?php foreach( $images as $image ): ?>
            <li>
            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif;?>
</div>
		 	<?php if (!empty(($a['wrapper']))) { ?>
				<div class="o-wrapper">
			<?php } ?>			
		<?php }?>

			<div class="c-accordion_list">
				<?php if( have_rows($a['accordion']) ):
					echo '<ul class="c-accordion_list_ul">';
				    	while ( have_rows($a['accordion']) ) : the_row();?>
							<li>
	        					<h3><?php echo get_sub_field($a['accordiontitle']);?></h3>
								<div class="c-accordion_hidden">
									<?php echo get_sub_field($a['accordioncontent']); ?>
								</div>
								<div class="c-icon"></div>
							</li>
	    				<?php endwhile;
	    			echo '</ul>';
				endif;?>			
			</div>
		<?php if (!empty($a['wrapper'])) {?>			
			</div>
		<?php }?>
	</<?php echo $a['divtype'];?>>		
	<?php return ob_get_clean();
}

add_shortcode( 'accordion', 'sc_accordion' );


add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

// Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		// wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function myselector(){
    $languages = icl_get_languages('skip_missing=0');
 
    $items = "";
    if( ! empty( $languages ) ) {
        foreach( $languages as $l ){
            if( ! $l['active'] ) {
                $items .= '<li class="menu-item"><a href="' . $l['url'] . '">' . $l['language_code'] . '</a></li>';
            }
        }
    }
 
    return $items;
}

/*
 * -----------------------------------------------------------------------------
 * WordPress hooks
 * -----------------------------------------------------------------------------
*/
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

