<?php
/**
 * Sanitization Functions
 * 
 * @package Sagartask
*/
if( ! function_exists( 'sanitize_radio' ) ) :
    function sanitize_radio( $input, $setting ){
          
		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);

		//get the list of possible radio box options 
		$choices = $setting->manager->get_control( $setting->id )->choices;
						  
		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		  
	}
endif;

//sanitization validation doing
if( ! function_exists( 'absint' ) ) :

    function absint( $number, $setting ) {
        // Ensure $number is an absolute integer (whole number, zero or greater).
        $number = absint( $number );
        
        // If the input is an absolute integer, return it; otherwise, return the default
        return ( $number ? $number : $setting->default );
    }
endif;

//select

if( ! function_exists( 'sanitize_select' ) ) :

    function sanitize_select( $value ){    
        if ( is_array( $value ) ) {
            foreach ( $value as $key => $subvalue ) {
                $value[ $key ] = sanitize_text_field( $subvalue );
            }
            return $value;
        }
        return sanitize_text_field( $value );    
    }
    endif;

    //sanitize-file

    if( ! function_exists( 'sanitize_file' ) ) :
    function sanitize_file( $file, $setting ) {
          
		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);
		  
		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );
		  
		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
endif;

//validating email
if( ! function_exists( 'validate_and_sanitize_email' ) ) :
    function validate_and_sanitize_email( $email ) {
        // Sanitize the email address
        $sanitized_email = sanitize_email( $email );
    
        // Check if the email is valid after sanitization
        if ( is_email( $sanitized_email ) ) {
            // The email is valid
            return $sanitized_email;
        } else {
            // The email is not valid; you can handle the error here
            return false;
        }
    }
    endif;
    

