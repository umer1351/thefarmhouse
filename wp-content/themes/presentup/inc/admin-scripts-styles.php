<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since Presentup 1.0
 *
 * @return void
 */
if( !function_exists('presentup_wp_admin_scripts_styles') ){
function presentup_wp_admin_scripts_styles() {
	
	/* Core files of the theme */
	wp_enqueue_style( 'presentup_custom_wp_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false, '1.0.0' );
	wp_enqueue_script( 'presentup_custom_js', get_template_directory_uri() . '/inc/admin-custom.js', array( 'jquery' ) );
	
	
	
	/* ThemetechMount Icon Picker - JS files */
	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/inc/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap-iconpicker', get_template_directory_uri().'/inc/assets/bootstrap-iconpicker/js/bootstrap-iconpicker.js', array( 'bootstrap', 'iconset-fontawesome', 'iconset-linecons', 'iconset-themify' ) );
	
	
	/* ThemetechMount Icon Picker - CSS files */
	
	// Bootstrap icon picker - CSS
	wp_enqueue_style( 'bootstrap-iconpicker', get_template_directory_uri() . '/inc/assets/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css' );
	
	// iconset-fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css' );
	
	// iconset-fontawesome
	wp_enqueue_style( 'vc_linecons', get_template_directory_uri().'/assets/vc-linecons/vc_linecons_icons.min.css' );
	
	// iconset-themify
	wp_enqueue_style( 'themify', get_template_directory_uri().'/assets/themify-icons/themify-icons.css' );
	
	// ThemetechMount admin icons CSS library
	wp_enqueue_style( 'themetechmount-admin-icons', get_template_directory_uri() . '/inc/assets/themetechmount-admin-icons/css/themetechmount-admin-icon.css' );
	
	// Sticky Kit library
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/inc/assets/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );
	
	// Twemoji Awesome
	wp_enqueue_style( 'twemojiawesome' );
	
	// themify
	wp_enqueue_style( 'themify' );
	
}
}
add_action( 'admin_enqueue_scripts', 'presentup_wp_admin_scripts_styles' );


