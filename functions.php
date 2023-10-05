<?php
/**
 * Sagartask functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sagartask
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sagartask_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Sagartask, use a find and replace
		* to change 'sagartask' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sagartask', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sagartask' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sagartask_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Registering new image sizes
	 */

	 add_image_size('binu_image', '200', '250', true);
	//  add_image_size('binas', '287', '190', true);
}
add_action( 'after_setup_theme', 'sagartask_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sagartask_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sagartask_content_width', 640 );
}
add_action( 'after_setup_theme', 'sagartask_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sagartask_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sagartask' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sagartask' ),
			'before_widget' => '<section id="%1$s" class="p-4 mb-3 bg-light rounded widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	//prac

	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar1', 'sagartask' ),
	// 		'id'            => 'sidebar1-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'sagartask' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h4 class="widget-title">',
	// 		'after_title'   => '</h4>',
	// 	)
	// );

	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar2', 'sagartask' ),
	// 		'id'            => 'sidebar2-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'sagartask' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h4 class="widget-title">',
	// 		'after_title'   => '</h4>',
	// 	)
	// );

	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar3', 'sagartask' ),
	// 		'id'            => 'sidebar3-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'sagartask' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h4 class="widget-title">',
	// 		'after_title'   => '</h4>',
	// 	)
	// );
	//prac end
}
add_action( 'widgets_init', 'sagartask_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sagartask_scripts() {
	wp_enqueue_style( 'sagartask-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sagartask-style', 'rtl', 'replace' );
	//enqueue prac
	wp_enqueue_style('sagartask-styles', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION, false);
	wp_enqueue_style('sagartask-bootstrap.min', get_template_directory_uri() .'/assets/bootstrap.min.css', array(), _S_VERSION, false);

    wp_enqueue_script( 'sagartask-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	//enqueue prac
	wp_enqueue_script('sagartask-bootstrap-bundle', get_template_directory_uri() .'/assets/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	//wp_enqueue_script('sagartask-jquery', get_template_directory_uri() . '/assets/jquery.slim.min.js', array(), _S_VERSION, true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'sagartask_scripts' );

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

/**
 * load sanitization-functions
 */
require get_template_directory() . '/inc/sanitization-functions.php';

/**
 * making custom-post-type named students and taxonomy named places
 */
function students_post_type() {
    $labels = array(
        'name'               => _x( 'Students', 'post type general name', 'sagartask' ),
        'singular_name'      => _x( 'Student', 'post type singular name', 'sagartask' ),
        'menu_name'          => _x( 'Students', 'admin menu', 'sagartask' ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar', 'sagartask' ),
        'add_new'            => _x( 'Add New', 'student', 'sagartask' ),
        'add_new_item'       => __( 'Add New Student', 'sagartask' ),
        'new_item'           => __( 'New Student', 'sagartask' ),
        'edit_item'          => __( 'Edit Student', 'sagartask' ),
        'view_item'          => __( 'View Student', 'sagartask' ),
        'all_items'          => __( 'All Students', 'sagartask' ),
        'search_items'       => __( 'Search Students', 'sagartask' ),
        'parent_item_colon'  => __( 'Parent Students:', 'sagartask' ),
        'not_found'          => __( 'No students found.', 'sagartask' ),
        'not_found_in_trash' => __( 'No students found in Trash.', 'sagartask' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'sagartask' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'show_in_rest'       => true
    );

    register_post_type( 'student', $args );
}
add_action( 'init', 'students_post_type' );

/***
 * registering taxonomy named places
*/

function places_taxonomy() {
	
	$labels = array(
		'name'                       => _x( 'Places', 'Taxonomy General Name', 'sagartask' ),
		'singular_name'              => _x( 'Place', 'Taxonomy Singular Name', 'sagartask' ),
		'menu_name'                  => __( 'Place', 'sagartask' ),
		'all_items'                  => __( 'All Places', 'sagartask' ),
		'parent_item'                => __( 'Parent Place', 'sagartask' ),
		'parent_item_colon'          => __( 'Parent Place:', 'sagartask' ),
		'new_item_name'              => __( 'New Place Name', 'sagartask' ),
		'add_new_item'               => __( 'Add New Place', 'sagartask' ),
		'edit_item'                  => __( 'Edit Place', 'sagartask' ),
		'update_item'                => __( 'Update Place', 'sagartask' ),
		'view_item'                  => __( 'View Place', 'sagartask' ),
		'separate_items_with_commas' => __( 'Separate Places with commas', 'sagartask' ),
		'add_or_remove_items'        => __( 'Add or remove Places', 'sagartask' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sagartask' ),
		'popular_items'              => __( 'Popular Places', 'sagartask' ),
		'search_items'               => __( 'Search Places', 'sagartask' ),
		'not_found'                  => __( 'Not Found', 'sagartask' ),
		'no_terms'                   => __( 'No Places', 'sagartask' ),
		'items_list'                 => __( 'Places list', 'sagartask' ),
		'items_list_navigation'      => __( 'Places list navigation', 'sagartask' ),
	);
	$args = array(
		'labels'            		 => $labels,
		'hierarchical'       		 => true,
		'show_in_rest'				 => true,	
		'public'            		 => true,
		'show_ui'           		 => true,
		'show_admin_column' 		 => true,
		'show_in_nav_menus' 		 => true,
		'show_tagcloud'     		 => true,
	);
	register_taxonomy( 'places', 'student', $args );
}
add_action( 'init', 'places_taxonomy' );

/**
 * creating metas for the wordpress
*/

function bina_metadata(){
	add_meta_box(
		'students_subtitle', //id
		__('Students Subtitle', 'sagartask'), //title
		'bina_students_subtitle', //callback_function
		array('student', 'post'), //screen means where to show metadata post lekhe post ma dekhauxa, or anywhere
		//'side' //context is for placement kata ko side ma rakhne vanera
	);

}
add_action('add_meta_boxes', 'bina_metadata');

function bina_students_subtitle(){
	$student_title	= get_post_meta(get_the_ID(), 'students_subtitle', true );
	$custom_prac_textarea = get_post_meta(get_the_ID(), 'custom_prac_textarea', true);
	$custom_prac_radio = get_post_meta( get_the_ID(), 'custom_prac_radio', true);
	$custom_checkbox = get_post_meta( get_the_ID(), 'custom_checkbox', true);
	$custom_select = get_post_meta(get_the_ID(), 'custom_select', true);
	$select_options = array(
        'bina' => 'Bina',
        'sandy' => 'Sandy',
        'sagar' => 'Sagar',
    );
	?>
	<div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .hcf_field{
            display: contents;
        }
    </style>
		<p class="meta-options hcf_field">
			<label for="subtitle"><?php echo __('Subtitle', 'sagartask');?></label>
			<input id="subtitle" type="text" name="students_subtitle" value="<?php echo esc_attr($student_title);?>">
		</p>
	</div>
	<br />
	<label for="custom_prac_textarea">Custom Textarea</label>
	<textarea name="custom_prac_textarea" id="custom_prac_textarea" rows="10" cols="50"><?php echo esc_attr($custom_prac_textarea); ?></textarea>
	<br />
	<label for="custom_prac_radio">Custom Radio</label>
	<span>Option 1</span>
	<input type="radio" name="custom_prac_radio" id="custom_prac_radio" value="option1" <?php checked($custom_prac_radio, 'option1'); ?>>
	<span>Option 2</span>
	<input type="radio" name="custom_prac_radio" id="custom_prac_radio" value="option2" <?php checked($custom_prac_radio, 'option2'); ?>>
	<span>Option 3</span>
	<input type="radio" name="custom_prac_radio" id="custom_prac_radio" value="option3" <?php checked($custom_prac_radio, 'option3'); ?>>

	<br />
	<label for="custom_checkbox">Custom Checkbox</label>
	<input type="checkbox" name="custom_checkbox" id="custom_checkbox" value="1" <?php echo checked($custom_checkbox, '1', false); ?> />
	<!-- <input type="checkbox" name="custom_checkbox" id="custom_checkbox" value="2" <?php echo checked($custom_checkbox, '2', false); ?> /> -->

	<br />
	<label for="custom_select">Custom Select</label>
	<select name="custom_select" id="custom_select">
		<option value="bina" <?php echo selected( $custom_select, 'bina',false ); ?>>Bina</option>
		<option value="sandy" <?php echo selected( $custom_select, 'sandy',false ); ?>>Sandy</option>
		<option value="sagar" <?php echo selected( $custom_select, 'sagar',false ); ?>>Sagar</option>
		
	</select>

<?php	
}

/**
 * for saving the metadata
*/
function bina_save_student_title($post_id){
	if(isset($_POST['post_type']) && 'student'=== $_POST['post_type']){

	$key ="students_subtitle";
	if ( isset( $_POST['students_subtitle'] ) ) {
		update_post_meta( $post_id, 'students_subtitle', sanitize_text_field($_POST['students_subtitle'] ));
	}

	if (isset($_POST['custom_prac_textarea'])) {
		// Save the custom meta value.
		update_post_meta($post_id, 'custom_prac_textarea', sanitize_textarea_field($_POST['custom_prac_textarea']));
	}

	if (isset($_POST['custom_prac_radio'])) {
		// Save the custom meta value.
		update_post_meta($post_id, 'custom_prac_radio', $_POST['custom_prac_radio']);
	}

	if (isset($_POST['custom_checkbox'])) {
		$checkedtest = ($_POST['custom_checkbox'] === '1') ? '1' : '0';
		// Save the custom meta value.
		update_post_meta($post_id, 'custom_checkbox', $checkedtest );
	} else {
        delete_post_meta($post_id, 'custom_checkbox');
    }

	if (isset($_POST['custom_select'])) {
		// Save the custom meta value.
		update_post_meta($post_id, 'custom_select', $_POST['custom_select']);
	}

}
}
add_action('save_post', 'bina_save_student_title');







