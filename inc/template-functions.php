<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Sagartask
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sagartask_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sagartask_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sagartask_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sagartask_pingback_header' );

function sagartask_banner(){
	$banner_box_title   = get_theme_mod('banner_box_title'); //default is blank so no next parameter is passed
	$banner_description = get_theme_mod('banner_description');
	$banner_title_url   = get_theme_mod('banner_title_url');
	$banner_url         = get_theme_mod('banner_url');
	$background_colors  = get_theme_mod('background_colors', '#000000');
	$background_image  = get_theme_mod('banner_img');
	$customizer_bg = get_theme_mod('customizer_bg', 'color');
	$style= " ";
	if($customizer_bg == "image" && $background_image){
    	$style= 'style="background-image:url('.$background_image.');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;"';
	}

	if($customizer_bg == "color" && $background_colors){
		$style= 'style="background-color:'.$background_colors.';"';
	}

	?>
	<div class="jumbotron p-4 p-md-5 text-white rounded" <?php echo $style;?>>
		<div class="col-md-6 px-0">
			<?php if($banner_box_title || $banner_description || $banner_title_url || $banner_url){ ?>
				<h1 class="display-4 font-italic">
					<?php echo esc_html_e($banner_box_title); ?>
				</h1>
				<p class="lead my-3">
					<?php echo __($banner_description); ?>
				</p>
				<p class="lead mb-0 banner">
					<a href="<?php echo esc_url($banner_url);?>" class="text-white font-weight-bold">
						<?php echo __($banner_title_url);?>
					</a>
				</p>
			<?php
			}
			?>
		</div>
	</div>
	<?php
}

//for post
function sagartask_post(){
$post_title     = get_theme_mod('post_title');
if($post_title){ ?>
  <h2 class="text-center">
    <?php echo esc_html_e($post_title);?>
  </h2>
<?php
	}
}

//for postbox url
function sagartask_postbox(){
	$post_box_title   = get_theme_mod('post_box_title');
        $post_box_url     = get_theme_mod('post_box_url');
        if($post_box_title||$post_box_url){?>
          <a href="<?php echo esc_url($post_box_url); ?>" class="stretched-link">
          <?php echo esc_html_e($post_box_title);?>
        </a>
        <?php
    }
}
