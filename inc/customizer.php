<?php
/**
 * Sagartask Theme Customizer
 *
 * @package Sagartask
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sagartask_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'sagartask_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'sagartask_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'sagartask_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sagartask_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sagartask_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sagartask_customize_preview_js() {
	wp_enqueue_script( 'sagartask-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'sagartask_customize_preview_js' );

/**
 * Adding customizer settings
 */

function sagartask_customize_learn($wp_customize){
	//this is panel
	$wp_customize ->add_panel('header_section',
		array(
			'priority'     => 10,
			'title'        => 'Header Section',
			'description'  => 'This is header panel'

		)
	);

	//adding header_settings section in panel
	$wp_customize ->add_section('title_settings',
		array(
			'priority'     => 10,
			'title'        => 'Title Settings',
			'description'  => 'This is title section',
			'panel'        => 'header_section'
		)
	);

	$wp_customize ->add_setting('Subscribe_us',
		array(
			'default'           => 'Subscribe Us',
			'sanitize_callback' => 'sanitize_text_field', //ask to sagar dai sanitize nagarda pani database ma save vairaxa 
			
		)
	);

	//settings ra control ko key same hunu parxa
	$wp_customize ->add_control('Subscribe_us',
		array(
			'title'       => 'Title',
			'description' => 'This is subscribe us description',
			'section'     => 'title_settings',
			'type'        => 'text'
		)
	);

	// including url in section so

	$wp_customize->add_setting('Subscribe_us_url',
		array(
			'default' 			=> '',
			// 'sanitize_callback' =>' esc_url_raw'
			
		)
	);

	$wp_customize->add_control('Subscribe_us_url',
		array(
			'title'   		=> 'URL',
			'description'	=> 'This is url',
			'section'		=> 'title_settings',
			'type' 			=> 'url'
		)
	);

	$wp_customize->add_section('header_settings',
		array(
			'title'			=> 'Header Settings',
			'description'	=> 'This is header section',
			'panel'			=> 'header_section'
		)
	);

	$wp_customize->add_setting('Social_media',
		array(
			'default' => 'Follow us'
		)
	);

	$wp_customize-> add_control('Social_media',
		array(
			'title'			=> 'Header Settings',
			'description'	=> 'This is header setting',
			'section'		=> 'header_settings',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting('facebook_url',
		array(
			'default'           => ' ',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('facebook_url',
		array(
			'title'			=> 'facebook url',
			'description'	=> 'This is facebook url',
			'section'		=> 'header_settings',
			'type'			=> 'esc_url_raw'
		)
	);

	//making new pannel as theme settings



}
add_action('customize_register', 'sagartask_customize_learn' );


//practice hai

function sagartask_customize_practice($wp_customize){
	//creating panel named as About Page Settings
	$wp_customize->add_panel('about_page',
		array(
			'priority'  	=> 10,
			'title'			=> 'About Page Settings',
			'description'	=> 'This is about page setting'
		)
	);

	//creating section for panel named Featured Section
	$wp_customize->add_section('about_section',
		array(
			'title'			=> 'Featured Section',
			'description'	=> 'This is featured section',
			'panel'			=> 'about_page'
		)
	);

	//creating settings and control

	$wp_customize->add_setting('email',
	array(
		'default'	   		=> '',
		'sanitize_callback' => 'sanitize_email'
		)
	);

	$wp_customize->add_control('email',
		array(
			'title'		  => 'Enter the email',
			'description' => 'Enter email here',
			'section'	  => 'about_section',
			'type'		  => 'email'
		)
	);

	//creating settings and control for number

	$wp_customize->add_setting('number',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('number',
		array(
			'title'		   => 'Enter the number',
			'description'  => 'Enter number here',
			'section'	   => 'about_section',
			'type'		   => 'number'
		)
	);

	//creating settings and control for dropdown-pages

	$wp_customize->add_setting('dropdown',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control('dropdown',
		array(
			'title'			=> 'Dropdown pages',
			'description'	=> 'Your setting with dropdown-pages input',
			'section'		=> 'about_section',
			'type'			=> 'dropdown-pages'
			
		)
	);

	//creating section for css

	$wp_customize->add_section('css_section',
		array(
			'title'			=> 'Your css section',
			'description'	=> 'This is your css section',
			'panel'			=> 'about_page'
		)
	);

	//creating setting and control for this section

	$wp_customize->add_setting('css_setting',
		array(
			'default'		    => '',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);

	$wp_customize->add_control('css_setting',
		array(
			
			'description'	=> 'This is css description',
			'section'		=> 'css_section',
			'type'			=> 'textarea'
		)
	);

	//creating setting and control for html color code in title named your css section part

	$wp_customize->add_setting('html_color_code',
		array(
			'default'		    => '#000000', //black
			'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,
		'html_color_code',
		array(
			'description'		=> 'Your hex color input',
			'section'			=> 'css_section'
		)
			)
		
	);

	//creating setting and control for html code in title named your css section part

	$wp_customize->add_setting('html_code',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wp_kses_post' //keeps only html tags that r allowed in post content
		)
	);

	$wp_customize->add_control('html_code',
		array(
			'label'		=> 'Your html code',
			'section'	=> 'css_section',
			'type'		=> 'textarea'
		)
	);

	//creating setting and control for checkbox in title named your css section part (ask confuse)

	function sanitize_checkbox( $input ){
              
		//returns true if checkbox is checked
		return ( isset( $input ) ? true : false );
	}
  

	$wp_customize->add_setting('checkbox_hobbies',
		array(
			'default'            => '',
			'sanitize_callback'  => 'sanitize_checkbox'
		)
	);

	$wp_customize->add_control('checkbox_hobbies',
		array(
			'label'		 => 'Hobbies',
			'section'	 => 'css_section',
			'type'		 => 'checkbox',
			'choices' => array(
				'one' => 'Riding',
				'two' => 'Writing',
				'three' => 'Singing'
			)
		)
	);
	// ask confuse end here

	//for radiobutton

	//radio box sanitization function
	
  // i wrote this radio sanitization function  in sanitization-functions.php
   //add setting to your section
	$wp_customize->add_setting( 
		'customizer_radio', 
		array(
			'sanitize_callback' => 'sanitize_radio'
		)
	);
	  
	$wp_customize->add_control( 
		'customizer_radio', 
		array(
			'label' => 'Your Setting with Radio Box',
			'section' => 'css_section',
			'type' => 'radio',
			'choices' => array(
				'male' => 'Male',
				'female' => 'female',
				            
			)
		)
	); 


	//for select option in css_section itself.....

	//select sanitization function
	//function making in sanitization-function.php with validation
//add setting to your section
	$wp_customize->add_setting( 
		'customizer_select', 
		array(
			'sanitize_callback' => 'sanitize_select'
		)
	);
	  
	$wp_customize->add_control( 
		'customizer_select', 
		array(
			'label'     => 'Your Setting with select', 
			'section'   => 'css_section',
			'type'      => 'select',
			'choices'   => array(
				''      => 'Select subject',
				'one'   => 'Advanced Database',
				'two'   => 'Cloud Computing',
				'three' => 'Advanced Java'              
			)
		)
	);  


	//for file input in css_section itself...
	        
    //file input sanitization function
//function in sanitization-funtion.php

	  
			  
//add select setting to your section
	$wp_customize->add_setting( 
		'customizer_file', 
		array(
			'sanitize_callback' => 'sanitize_file'
		)
	);
	  
	  
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control( 
			$wp_customize, 
			'customizer_file', 
			array(
				'label'      => 'Your Setting with file input', 
				'section'    => 'css_section'                   
			)
		) 
	);  

	//for js in css_section itself...

	  //script input sanitization function
	  function sanitize_js_code($input){
		return base64_encode($input); //to save script in database
	}
	  
	  
//output escape function    
	function escape_js_output($input){
		return esc_textarea( base64_decode($input) ); //to escape the script for textarea
	}
	  
			   
//add setting to your section
	$wp_customize->add_setting( 
		'customizer_js_code', 
		array(          
			'sanitize_callback' => 'sanitize_js_code', //encode for DB insert
			'sanitize_js_callback' => 'escape_js_output' //ecape script for the textarea
		)
	);
	  
	$wp_customize->add_control( 
		'customizer_js_code', 
		array(
			'label' => 'Your Setting with JS code', 
			'section' => 'css_section',
			'type' => 'textarea'
		)
	);  

	//image uploader

	$wp_customize->add_setting( 'bina_logo', array(
        'default' => '', // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bina_logo', array(
        'label' => 'Upload Logo',
        'priority' => 20,
        'section' => 'title_tagline',
        
    )));

	//default image passing

	$wp_customize->add_setting( 'binas_logo', array(
        'default' => get_template_directory_uri() ."/assets/p.jpg", // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'binas_logo', array(
        'label' => 'Upload Logo',
        'priority' => 20,
        'section' => 'colors',
        
    )));

}
add_action('customize_register', 'sagartask_customize_practice');

//making header setting panel
function sagartask_customize_preview($wp_customize){

	$wp_customize->add_panel('header_setting',
		array(
			'priority'		=> 10,
			'title'			=>__('Header Settings','sagartask'),
			'description'	=> __('This is header setting description','sagartask')
		)
	);

	//making section for header setting panel

	$wp_customize->add_section('header_title_section',
		array(
			'title'			=> __('Header section','sagartask'),
			'description'	=> __('This is header section description','sagartask'),
			'panel'			=> 'header_setting'
		)
	);

	//making settings and control for this header title section for subscribe title

	$wp_customize->add_setting('subscribe',
		array(
			'default'			=> 'Subscribe',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);

	//adding partial refresh

	$wp_customize->selective_refresh->add_partial(
        'subscribe',
        array(
            'selector'        => '.subscribe',
            'render_callback' => 'sagarprac'
		)
	);

	$wp_customize->add_control('subscribe',
		array(
			'label'		=> __('Subscribe','sagartask'),
			'section'	=> 'header_title_section',
			'type'		=> 'text'
		)
	);

	//making settings and control for this header title section for subscribe url

	$wp_customize->add_setting('subscribe_url',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('subscribe_url',
		array(
			'label'		=> __('This is subscribe url','sagartask'),
			'section'	=> 'header_title_section',
			'type'		=> 'url'
		)
	);

// now making section for signup i.e Signup section

	$wp_customize->add_section('signup',
		array(
			'title'			=> __('Signup Section','sagartask'),
			'description'	=> __('This is signup description','sagartask'),
			'panel'			=> 'header_setting'
		)
	);

	//making setting and control for signup title

	$wp_customize->add_setting('signup_title',
		array(
			'default'			=> 'Signup',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh for singnup

	$wp_customize->selective_refresh->add_partial(
        'signup_title',
        array(
            'selector'        => '.btn-outline-secondary',
            'render_callback' => 'sagarpractise'
		)
	);

	$wp_customize->add_control('signup_title',
		array(
			'label'		=> __('Signup','sagartask'),
			'section'	=> 'signup',
			'type'		=> 'text'
		)
	);

	//making setting and control for signup url

	$wp_customize->add_setting('signup_url',
		array(
			'default'			=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control('signup_url',
		array(
			'label'		=> __('Signup','sagartask'),
			'section'	=> 'signup',
			'type'		=> 'url'
		)
	);

}
add_action('customize_register', 'sagartask_customize_preview');

//calling render_callback funtion here
function sagarprac(){
	echo get_theme_mod('subscribe');
}

function sagarpractise(){
	echo get_theme_mode('signup_title');
}


//making frontpage settings panel

function sagartask_customize_review($wp_customize){

	$wp_customize->add_panel('frontpage_settings',
		array(
			'priority'	  => 10,
			'title'		  => __('FrontPage Settings','sagartask'),
			'description' => __('This is frontpage settings','sagartask')
		)
	);

	//making banner section as section in panel
	
	$wp_customize->add_section('banner_box_section',
		array(
			'title'			=> __('Banner Box Section','sagartask'),
			'description'	=> __('This is banner section description','sagartask'),
			'panel'			=> 'frontpage_settings'
		)
	);

	//enable section
	

	//making settings and control in banner box section of banner title

	$wp_customize->add_setting('banner_box_title',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh 

	$wp_customize->selective_refresh->add_partial(
        'banner_box_title',
        array(
            'selector'        => '.font-italic',
            'render_callback' => 'anishprac'
		)
	);


	$wp_customize->add_control('banner_box_title',
	array(
		'label'		=> __('Enter Title','sagartask'),
		'section'	=> 'banner_box_section',
		'type'		=> 'text'
		)
	);

	//making settings and control in banner box section of banner short description

	$wp_customize->add_setting('banner_description',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh for description

	$wp_customize->selective_refresh->add_partial(
        'banner_description',
        array(
            'selector'        => '.my-3',
            'render_callback' => 'anishpractise'
		)
	);


	$wp_customize->add_control('banner_description',
	array(
		'label'		=> __('Enter short description', 'sagartask'),
		'section'	=> 'banner_box_section',
		'type'		=> 'textarea'
		)
	);

	//making settings and control in banner box section of banner url title

	$wp_customize->add_setting('banner_title_url',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh for banner title url

	$wp_customize->selective_refresh->add_partial(
        'banner_title_url',
        array(
            'selector'        => '.banner',
            'render_callback' => 'uttamprac'
		)
	);


	$wp_customize->add_control('banner_title_url',
	array(
		'label'		=> __('Banner title url', 'sagartask'),
		'section'	=> 'banner_box_section',
		'type'		=> 'text'
		)
	);

	//making settings and control in banner box section of banner url 

	$wp_customize->add_setting('banner_url',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control('banner_url',
	array(
		'label'		=> __('Link url', 'sagartask'),
		'section'	=> 'banner_box_section',
		'type'		=> 'url'
		)
	);

	//creating banner section for background image and background default color black in frontpage settings panel

	$wp_customize->add_section('banner_section',
		array(
			'title'			=> __('Banner Section', 'sagartask'),
			'description'	=> __('This is banner section', 'sagartask'),
			'panel'			=> 'frontpage_settings'
		)
	);

	//creating setting and control for background image in banner_section

	$wp_customize->add_setting('banner_img',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'banner_img', 
			array(
				'label'      => __('Upload background image', 'sagartask'), //this is for string i.e __ or esc_html_e
				'section'    => 'banner_section',
			)
    	)
	);

	//creating setting and control for background color in banner_section

	$wp_customize->add_setting('background_colors',
	array(
		'default'		    => '#000000', //black
		'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,
			'background_colors',
			array(
				'description'		=> __('Upload background color', 'sagartask'),
				'section'			=> 'banner_section'
			)
		)
	
	);

	//creating postpage settings of panel

	$wp_customize->add_panel('postpage_settings',
		array(
			'priority'		=> 10,
			'title'			=> __('Postpage Settings', 'sagartask'),
			'description'	=> __('This is postpage description', 'sagartask')
		)
	);

	//creating section postpage_section in panel postpage settings

	$wp_customize->add_section('postpage_section',
		array(
			'title'			=> __('Post Section', 'sagartask'),
			'description'	=> __('This is post section', 'sagartask'),
			'panel'			=> 'postpage_settings'
		)
	);

	//creating section and control for post title

	$wp_customize->add_setting('post_title',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh in posttitle

	$wp_customize->selective_refresh->add_partial(
        'post_title',
        array(
            'selector'        => '.text-center',
            'render_callback' => 'binaprac'
		)
	);

	$wp_customize->add_control('post_title',
	array(
		'label'		=> __('Title', 'sagartask'),
		'section'	=> 'postpage_section',
		'type'		=> 'text'
		)
	);

	//creating section post_box_section in panel postpage settings

	$wp_customize->add_section('post_box_section',
		array(
			'title'			=> __('Post Box Section',  'sagartask'),
			'description'	=> __('This is post box section',  'sagartask'),
			'panel'			=> 'postpage_settings'
		)
	);

	//creating section and control for post box title

	$wp_customize->add_setting('post_box_title',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	//adding partial refresh for postbox title

	$wp_customize->selective_refresh->add_partial(
        'post_box_title',
        array(
            'selector'        => '.stretched-link',
            'render_callback' => 'sandyprac'
		)
	);


	$wp_customize->add_control('post_box_title',
	array(
		'label'		=> __('Post Box Title',  'sagartask'),
		'section'	=> 'post_box_section',
		'type'		=> 'text'
		)
	);

	//creating section and control for post box url

	$wp_customize->add_setting('post_box_url',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control('post_box_url',
	array(
		'label'		=> __('Post Box Url', 'sagartask'),
		'section'	=> 'post_box_section',
		'type'		=> 'url'
		)
	);

	//creating footer settings panel

	$wp_customize->add_panel('footer_settings',
		array(
			'priority'		=> 10,
			'title'			=> __('Footer Settings','sagartask'),
			'description'	=> __('This is footer settings','sagartask'),
		)
	);

	//creating footer section for panel footer settings

	$wp_customize->add_section('footer_section',
		array(
			'title'			=> __('Footer Section','sagartask'),
			'description'	=> __('This is footer section','sagartask'),
			'panel'			=> 'footer_settings'
		)
	);

	//creating setting and control
	$wp_customize->add_setting('footer_box',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wp_kses_post' //keeps only html tags that r allowed in post content
		)
	);

	//adding partial refresh for footer

	$wp_customize->selective_refresh->add_partial(
        'footer_box',
        array(
            'selector'        => '.blog-footer',
            'render_callback' => 'heyprac'
		)
	);


	$wp_customize->add_control('footer_box',
		array(
			'label'		=> __('Your footer box','sagartask'),
			'section'	=> 'footer_section',
			'type'		=> 'textarea'
		)
	);

	//for image and color radio button

	
$wp_customize->add_setting(
    'customizer_bg',
    array(
        'sanitize_callback' => 'theme_sanitize_radio',
        'default'           => 'color' // Default color option
    )
);

$wp_customize->add_control(
    'customizer_bg',
    array(
        'label'    => 'Choose between',
        'section'  => 'css_section',
        'type'     => 'radio',
        'choices'  => array(
			'color' => 'Color',
            'image'  => 'Image',
            
        )
    )
);





function theme_sanitize_radio($input, $setting)
{
    // Input must be a slug: lowercase alphanumeric characters, dashes, and underscores are allowed only
    $input = sanitize_key($input);

    // Get the list of possible radio box options
    $choices = $setting->manager->get_control($setting->id)->choices;

    // Return input if valid or return default option
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}


}
add_action('customize_register', 'sagartask_customize_review');

//calling render_callback function for below all

function anishprac(){
	echo get_theme_mod('banner_box_title');
}
function anishpractise(){
	echo get_theme_mod('banner_description');
}

function uttamprac(){
	echo get_theme_mod('banner_title_url');
}

function binaprac(){
	echo get_theme_mod('post_title');
}

function sandyprac(){
	echo get_theme_mod('post_box_title');
}

function heyprac(){
	echo get_theme_mod('footer_box');
}



