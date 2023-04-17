<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


// Get current theme name and vesion
$tm_theme = wp_get_theme();
$tm_theme_name = $tm_theme->get( 'Name' );
$tm_theme_ver  = $tm_theme->get( 'Version' );


// Getting all theme options again if variable is not defined
global $presentup_theme_options;
if( empty($presentup_theme_options) || !is_array($presentup_theme_options) ){
	if( function_exists('themetechmount_load_default_theme_options') ){
		themetechmount_load_default_theme_options();
	} else {
		$presentup_theme_options = get_option('presentup_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($presentup_theme_options['team_type_title']) ) ? esc_attr($presentup_theme_options['team_type_title']) : esc_attr__('Team Members', 'presentup') ;
$team_member_title_singular = ( !empty($presentup_theme_options['team_type_title_singular']) ) ? esc_attr($presentup_theme_options['team_type_title_singular']) : esc_attr__('Team Member', 'presentup') ;
$team_group_title           = ( !empty($presentup_theme_options['team_group_title']) ) ? esc_attr($presentup_theme_options['team_group_title']) : esc_attr__('Team Groups', 'presentup') ;
$team_group_title_singular  = ( !empty($presentup_theme_options['team_group_title_singular']) ) ? esc_attr($presentup_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'presentup') ;

$pf_title               = ( !empty($presentup_theme_options['pf_type_title']) ) ? esc_attr($presentup_theme_options['pf_type_title']) : esc_attr__('Portfolio', 'presentup') ;
$pf_title_singular      = ( !empty($presentup_theme_options['pf_type_title_singular']) ) ? esc_attr($presentup_theme_options['pf_type_title_singular']) : esc_attr__('Portfolio', 'presentup') ;
$pf_cat_title           = ( !empty($presentup_theme_options['pf_cat_title']) ) ? esc_attr($presentup_theme_options['pf_cat_title']) : esc_attr__('Portfolio Categories', 'presentup') ;
$pf_cat_title_singular  = ( !empty($presentup_theme_options['pf_cat_title_singular']) ) ? esc_attr($presentup_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'presentup') ;




/**
 *  FRAMEWORK SETTINGS
 */
$tm_framework_settings = array(
	'menu_title' 	  => esc_attr__('Presentup Options', 'presentup'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'themetechmount-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($tm_theme_name).'  <small>'.esc_attr($tm_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
	/*
	Default: bottom of menu structure #Default: bottom of menu structure
	2 – Dashboard
	4 – Separator
	5 – Posts
	10 – Media
	15 – Links
	20 – Pages
	25 – Comments
	59 – Separator
	60 – Appearance
	65 – Plugins
	70 – Users
	75 – Tools
	80 – Settings
	99 – Separator
	For the Network Admin menu, the values are different: #For the Network Admin menu, the values are different:
	2 – Dashboard
	4 – Separator
	5 – Sites
	10 – Users
	15 – Themes
	20 – Plugins
	25 – Settings
	30 – Updates
	99 – Separator
	*/
);



/**
 *  FRAMEWORK OPTIONS
 */
$tm_framework_options = array();


// Layout Settings
$tm_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'presentup'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		
		array(
			'type'    	=> 'heading',
			'content'		=> esc_attr__('Specify theme pages layout, the skin coloring and background', 	'presentup'),
        ),
		array(
			'id'      => 'skincolor',
			'type'    => 'themetechmount_skin_color',
			'title'   => esc_attr__( 'Select Skin Color', 'presentup' ),
			'default' => '#ff3d55',
			'options' => array(
				'Lima'				=> '#ff3d55', /* Default skin color */
				'Science Blue'		=> '#caaf5e',
				'Red Orange'		=> '#fd972e',
				'Vivid Violet'		=> '#af33bb',
				'Tan Hide'			=> '#f9a861',
				'Selective Yellow'	=> '#ffb901',
				'Red'				=> '#ff0b09',
				'Purple Heart'		=> '#6c33bb',
				'Azure Radiance'	=> '#0095eb',
				'Mountain Meadow'	=> '#18c47c',
				
			),
			'rgba'    => false,
        ),
		array(
			'id'     	=> 'tm_one_click_demo_setup', //themetechmount_one_click_demo_content
			'type'    	=> 'themetechmount_one_click_demo_content',//themetechmount_one_click_demo_content
			'title'  	=> esc_attr__('Demo Content Setup', 'presentup'),
        ),
		array(
			'id'        => 'layout',
			'type'      => 'radio',
			'title'     => esc_attr__('Pages Layout', 'presentup'), 
			'options'  	=> array(
							'wide'     => esc_attr__('Wide', 'presentup'),
							'boxed'    => esc_attr__('Boxed', 'presentup'),
							'framed'   => esc_attr__('Framed', 'presentup'),
							'rounded'  => esc_attr__('Rounded', 'presentup'),
							'fullwide' => esc_attr__('Full Wide', 'presentup'),
						),
			'default'   => 'wide',
			'after'   	=> '<small>'.esc_attr__('Specify the layout for the pages', 'presentup').'</small>',
        ),
		array(
			'id'        => 'full_wide_elements',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'presentup'),
			'options'   => array(
					'floatingbar' => esc_attr__('Floating Bar', 'presentup'),
					'topbar'      => esc_attr__('Topbar', 'presentup'),
					'header'      => esc_attr__('Header', 'presentup'),
					'content'     => esc_attr__('Content Area', 'presentup'),
					'footer'      => esc_attr__('Footer', 'presentup'),
					),
			'default'    => array( 'header' ),
			'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'presentup').'</small>',
			'dependency' => array( 'layout_fullwide', '==', 'true' ),
		),
		
		array(
			'type'      	=> 'heading',
			'content'     	=> esc_attr__('Background Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'global_background',
			'type'   		=> 'themetechmount_background',
			'title' 		=> esc_attr__('Body Background Properties', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'presentup').'</div>',
			'default'		=> array(
			'color'			=> '#f9f9f9',
			),
			'output'        => 'body',
        ),
		array(
			'id'     		=> 'inner_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Content Area Background Properties', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for content area', 'presentup').'</div>',
			'default' 		=> array(
				'color' 	=> '#f9f9f9',
			),
			'output'        => 'body #main',
        ),
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Pre-loader Image', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'preloader_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Pre-loader animation', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'presentup') . '</div>',
		),
		array(
			'id'          => 'loaderimg',
			'type'        => 'image_select',
			'title'       => esc_attr__('Page-loader Image', 'presentup'), 
			'options'     => array(
					''   	=> get_template_directory_uri() . '/images/loader-none.gif',
					'1'   	=> get_template_directory_uri() . '/images/loader1.gif',
					'2'   	=> get_template_directory_uri() . '/images/loader2.gif',
					'3'   	=> get_template_directory_uri() . '/images/loader3.gif',
					'4'   	=> get_template_directory_uri() . '/images/loader4.gif',
					'5'   	=> get_template_directory_uri() . '/images/loader5.gif',
					'6'   	=> get_template_directory_uri() . '/images/loader6.gif',
					'7'   	=> get_template_directory_uri() . '/images/loader7.gif',
					'8'   	=> get_template_directory_uri() . '/images/loader8.gif',
					'9'   	=> get_template_directory_uri() . '/images/loader9.gif',
					'10'   	=> get_template_directory_uri() . '/images/loader10.gif',
					'11'   	=> get_template_directory_uri() . '/images/loader11.gif',
					'12'   	=> get_template_directory_uri() . '/images/loader12.gif',
					'13'   	=> get_template_directory_uri() . '/images/loader13.gif',
					'14'   	=> get_template_directory_uri() . '/images/loader14.gif',
					'15'   	=> get_template_directory_uri() . '/images/loader15.gif',
					'16'   	=> get_template_directory_uri() . '/images/loader16.gif',
					'17'   	=> get_template_directory_uri() . '/images/loader17.gif',
					'18'   	=> get_template_directory_uri() . '/images/loader18.gif',
					'custom'=> get_template_directory_uri() . '/images/loader-custom.gif',
				),
			'radio'       => true,
			'default'     => '',
			'after'   	  => '<div class="cs-text-muted">' . esc_attr__('Please select site pre-loader image.', 'presentup') . '<br/><br/><em><strong>' . esc_attr__( 'NOTE:', 'presentup' ) . '</strong> ' . esc_attr__( 'Please note that if you uploaded pre-loader image (in below option) than this pre-defined loader image will be ignored.', 'presentup' ) . '</em></div>',
			'dependency' => array( 'preloader_show', '==', 'true' ),
        ),
		array(
			'id'       		=> 'loaderimage_custom',
			'type'      	=> 'image',
			'title'    		=> esc_attr__('Upload Page-loader Image', 'presentup'),
			'add_title' 	=> 'Select/Upload Page-loader image',
			'after'  		=> '<div class="cs-text-muted">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'presentup') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_attr__('Click here to go to Anmizer website.', 'presentup') . '</a><br/><br/><em><strong>' . esc_attr__('NOTE:', 'presentup') . '</strong>' . esc_attr__('Please note that if you selected image here than the pre-defined loader image (in above option) will be ignored.', 'presentup') . '</em></div>',
			'dependency'    => array( 'loaderimg_custom', '==', 'true' ),
        ),
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'presentup'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'presentup').'</small>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'presentup'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted">'.esc_attr__('Set this option "ON" if your site is one page website', 'presentup').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'presentup').'</a></div>',
        ),
		
	),
	
);


// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($presentup_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $presentup_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	$tm_framework_options_inner = $tm_framework_options[0];
	foreach( $tm_framework_options_inner['fields'] as $index => $option ){
		if( !empty($option['type']) && $option['type'] == 'themetechmount_one_click_demo_content' ){
			unset($tm_framework_options[0]['fields'][$index]);
		}
	}
}










// Font Settings
$tm_framework_options[] = array(
	'name'   => 'font_settings', // like ID
	'title'  => esc_attr__('Font Settings', 'presentup'),
	'icon'   => 'fa fa-text-height',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Font Settings', 'presentup'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts', 'presentup').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('General Font', 'presentup'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'presentup'),
			'default'        => array (
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#828c96',
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
		),
		
		
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'presentup'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'presentup'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'presentup'),
				'custom'    => esc_attr__('Custom color (select below)', 'presentup'),
				
			),
			'default'   => 'darkhover',
			'std'       => 'default',
			'after'   	=> '<div class="cs-text-muted">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'presentup') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'presentup' ),
			'default'    => '#000',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'presentup' ),
			'default'    => '#7eba03',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		
		
		
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '40',
				'line-height'		=> '45',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'presentup').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '35',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'presentup').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'themetechmount_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'presentup'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '30',
				'line-height'		=> '35',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'presentup').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '25',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'presentup').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '20',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'presentup').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '15',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'presentup').'</div>',
		),
		
		
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'presentup'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc', 'presentup').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Heading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-content-header h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Playball',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '48',
				'line-height'		=> '55',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'presentup').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Subheading Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,							
			'output'         => '.tm-element-heading-wrapper .tm-vc_general .tm-vc_cta3_content-container .tm-vc_cta3-content .tm-vc_cta3-content-header h4, .tm-vc_general.tm-vc_cta3.tm-vc_cta3-color-transparent.tm-cta3-only .tm-vc_cta3-content .tm-vc_cta3-headers h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '50',
				'line-height'		=> '50',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0',
				'color'				=> '#eff1f3',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'presentup').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Content Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.tm-element-heading-wrapper .tm-vc_general.tm-vc_cta3 .tm-vc_cta3-content p', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'line-height'		=> '25',
				'letter-spacing'	=> '0',
				'color'				=> '#57616b',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for content', 'presentup').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'presentup'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'presentup').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'themetechmount_typography', 
			'title'       => esc_attr__('Widget Title Font', 'presentup'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .themetechmount-portfolio-details h2, .themetechmount-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '22',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#273f5b',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for widget title', 'presentup').'</div>',
		),
		
		
		array(
			'id'             => 'button_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Button Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.main-holder .site-content ul.products li.product .add_to_wishlist, .main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"], .woocommerce button.button, .woocommerce-page button.button, input, .tm-vc_btn, .tm-vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .themetechmount-post-readmore a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'letter-spacing'	=> '0',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'presentup').'</div>',
		),
		array(
			'id'             => 'element_title',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Element Title Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a, .vc_toggle_title > h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'		=> 'Open Sans',
				'backup-family'	=> 'Arial, Helvetica, sans-serif',
				'variant'		=> '600',
				'font-size'		=> '17',
				'font'			=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'presentup').'</div>',
		),	
	)
);


// Floating Bar Settings
$tm_framework_options[] = array(
	'name'   => 'floatingbar_settings', // like ID
	'title'  => esc_attr__('Floating Bar Settings', 'presentup'),
	'icon'   => 'fa fa-arrow-circle-o-up',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Floating Bar Settings', 'presentup'),
        ),
		array(
			'id'     		=> 'fbar_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Floating Bar', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Floating Bar', 'presentup').'</div>',
        ),
		array(
			'id'      => 'fbar-position',
			'type'    => 'radio',
			'title'   => esc_attr__('Floating bar position', 'presentup'),
			'options' => array(
				'default' => esc_attr__('Top','presentup'),
				'right'   => esc_attr__('Right', 'presentup'),
			),
			'default'    => 'default',
			'after'      => '<div class="cs-text-muted"><br>'.esc_attr__('Position for Floating bar', 'presentup').'</div>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'            => 'fbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Background Color', 'presentup'),
			'options'  		=> array(
				'darkgrey'    => esc_attr__('Dark grey', 'presentup'),
				'grey'        => esc_attr__('Grey', 'presentup'),
				'white'       => esc_attr__('White', 'presentup'),
				'skincolor'   => esc_attr__('Skincolor', 'presentup'),
				'custom'      => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'darkgrey',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Floating Bar background color', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'fbar_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Floating Bar Background Properties', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'presentup').'</div>',
			'color'			=> true,
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'left top',
				'attachment'	=> 'scroll',
				'color'			=> '#7eba03',
				'size'		  	=> 'cover',
			),
			'output' 	        => '.themetechmount-fbar-box-w',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
			
        ),
		array(
			'id'            => 'fbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Text Color', 'presentup'),
			'options' 		=> array(
				'white'			=> esc_attr__('White', 'presentup'),
				'darkgrey'		=> esc_attr__('Dark', 'presentup'),
				'custom'		=> esc_attr__('Custom color', 'presentup'),
							),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'fbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Custom Color for text', 'presentup' ),
			'default'		 => '#dd3333',
			'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar', 'presentup').'</div>',
        ),
		
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Floating Bar Open/Close Button Settings', 'presentup'),
			'after'		=> '<small>' . esc_attr__('Settings for Floating Bar Open/Close Button', 'presentup') . '</small>',
			
        ),
		array(
			'id'      => 'fbar_handler_icon',
			'type'    => 'themetechmount_iconpicker',
			'title'   => esc_attr__('Open Link Icon', 'presentup' ),
			'default' => array(
				'library'				=> 'themify',
				'library_fontawesome'	=> 'fa fa-arrow-down',
				'library_linecons'		=> 'vc_li vc_li-bubble',
				'library_themify'		=> 'themifyicon ti-menu',
			),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'      => 'fbar_handler_icon_close',
			'type'    => 'themetechmount_iconpicker',
			'title'   => esc_attr__('Close Link Icon', 'presentup' ),
			'default' => array(
				'library'				=> 'themify',
				'library_fontawesome'	=> 'fa fa-arrow-up',
				'library_linecons'		=> 'vc_li vc_li-bubble',
				'library_themify'		=> 'themifyicon ti-close',
			),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		
		array(
			'id'            => 'fbar_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open Icon Color', 'presentup'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'presentup'),
					'grey'       => esc_attr__('Grey', 'presentup'),
					'white'      => esc_attr__('White', 'presentup'),
					'skincolor'  => esc_attr__('Skincolor', 'presentup'),
			),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'presentup').'</div>',
        ),
		
		array(
			'id'            => 'fbar_icon_color_close',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Close Icon Color', 'presentup'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'presentup'),
					'grey'       => esc_attr__('Grey', 'presentup'),
					'white'      => esc_attr__('White', 'presentup'),
					'skincolor'  => esc_attr__('Skincolor', 'presentup'),
			),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'presentup').'</div>',
        ),
		
		
		
		array(
			'type'    	 => 'heading',
			'content'	 => esc_attr__('Floating Bar Widget Settings', 'presentup'),
			'after'		 => '<small>' . esc_attr__('Settings for Floating Bar Widgets', 'presentup') . '</small>',
			'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
        ),
		array(
			'id'			=> 'fbar_widget_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Floating Bar Widget Columns', 'presentup'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '6_6',
			'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Floating Bar Column layout View for widgets.', 'presentup').'</div>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Floating Bar in Small Devices', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Floating Bar in small devices like mobile, tablet etc.', 'presentup').'</small>',
			'dependency'     => array('fbar_show','==','true'),
		),
		array(
			'id'       => 'floatingbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Floating Bar in Responsive Mode', 'presentup'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Floating Bar.', 'presentup'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','presentup'),
				'1200'     => esc_attr__('Show only on large devices','presentup').' <small>'.esc_attr__('show only on desktops (>1200px)', 'presentup').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','presentup').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'presentup').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','presentup').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'presentup').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'presentup'),
			),
			'dependency' => array('fbar_show','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'floatingbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Floating Bar (in pixel)', 'presentup' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Floating Bar will be hidden.', 'presentup' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Topbar Settings
$tm_framework_options[] = array(
	'name'   => 'topbar_settings', // like ID
	'title'  => esc_attr__('Topbar Settings', 'presentup'),
	'icon'   => 'fa fa-tasks',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Topbar settings', 'presentup'),
        ),
		array(
			'id'     		=> 'show_topbar',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Topbar', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Topbar', 'presentup').'</div>',
        ),
		array(
			'id'            => 'topbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Background Color', 'presentup'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
								'grey'       => esc_attr__('Grey', 'presentup'),
								'white'      => esc_attr__('White', 'presentup'),
								'skincolor'  => esc_attr__('Skincolor', 'presentup'),
								'custom'     => esc_attr__('Custom Color', 'presentup'),
							),
			'default'       => 'skincolor',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Topbar background color', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'topbar_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(0,234,35,0.98)',
			'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Topbar', 'presentup').'</div>',
        ),
		array(
			'id'            => 'topbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Text Color', 'presentup'),
			'options'  => array(
							'white'     => esc_attr__('White', 'presentup'),
							'dark'      => esc_attr__('Dark', 'presentup'),
							'skincolor' => esc_attr__('Skin Color', 'presentup'),
							'custom'    => esc_attr__('Custom color', 'presentup'),
						),
			'default'       => 'white',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'topbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Color for text', 'presentup' ),
			'default'		 => 'rgba(0, 0, 255, 0.25)',
			'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for Topbar Text', 'presentup').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Topbar Content Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Content for Topbar', 'presentup').'</small>',
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
		),
		array(
			'id'       		 => 'topbar_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Left Content', 'presentup'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of Topbar area', 'presentup').'</div>',
			'default'        => '<ul class="top-contact"><li><i class="fa fa-map-marker"></i>206 South Marion Avenue, Florida</li>
<li><i class="fa fa-phone"></i><strong>Call</strong> : +1 (143) 456-7897</li></ul>',
        ),
		array(
			'id'       		 => 'topbar_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Right Content', 'presentup'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of Topbar area', 'presentup').'</div>',
			'after'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('HTML tags and shortcodes are allowed', 'presentup') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','presentup') , '<a href="'. esc_url('http://presentup.themetechmountthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
			'default'  => '<ul class="top-contact"><li><i class="fa fa-envelope-o"></i> <strong>Email: </strong><a href="mailto:info@example.com.com">info@example.com</a></li></ul>[tm-btn title="Book Event" style="text" shape="square" color="white" add_icon="true" i_type="fontawesome" i_icon_fontawesome="fa fa-caret-right" link="url:%23|||"][tm-social-links]',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Topbar Bar in Small Devices', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Topbar Bar in small devices like mobile, tablet etc.', 'presentup').'</small>',
			'dependency'     => array('show_topbar','==','true'),
		),
		array(
			'id'       => 'topbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Topbar Bar in Responsive Mode', 'presentup'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Topbar Bar.', 'presentup'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','presentup'),
				'1200'     => esc_attr__('Show only on large devices','presentup').' <small>'.esc_attr__('show only on desktops (>1200px)', 'presentup').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','presentup').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'presentup').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','presentup').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'presentup').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'presentup'),
			),
			'dependency' => array('show_topbar','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'topbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Topbar (in pixel)', 'presentup' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Topbar will be hidden.', 'presentup' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Titlebar Settings
$tm_framework_options[] = array(
	'name'   => 'titlebar_settings', // like ID
	'title'  => esc_attr__('Titlebar Settings', 'presentup'),
	'icon'   => 'fa fa-align-justify',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Background Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'presentup').'</small>',
		),
		array(
			'id'            => 'titlebar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Background Color', 'presentup'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
							'grey'       => esc_attr__('Grey', 'presentup'),
							'white'      => esc_attr__('White', 'presentup'),
							'skincolor'  => esc_attr__('Skincolor', 'presentup'),
							'custom'     => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'custom',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'titlebar_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Titlebar Background Image', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'presentup').'</div>',
			'color'			=> true,
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/titlebar-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center bottom',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> 'rgba(0,0,0,0.01)',
			),
			'output' 	    => 'div.tm-titlebar-wrapper',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Font Settings', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'presentup').'</small>',
		),
		array(
			'id'            => 'titlebar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Color', 'presentup'),
			'options'  => array(
							'white'  => esc_attr__('White', 'presentup'),
							'dark'   => esc_attr__('Dark', 'presentup'),
							'custom' => esc_attr__('Custom Color', 'presentup'),
						),
			'default'       => 'custom',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),
		array(
			'id'             => 'titlebar_heading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Heading Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar h1.entry-title, .tm-titlebar-textcolor-custom .tm-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '46',
				'line-height'		=> '56',
				'letter-spacing'	=> '0',
				'text-transform'	=> 'uppercase',
				'color'				=> '#ffffff',
				'font'				=> 'google',
			),
			'after'			=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'presentup').'</div>',
		),
		array(
			'id'             => 'titlebar_subheading_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Sub-heading Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar .entry-subtitle, .tm-titlebar-textcolor-custom .tm-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
			'units'			 => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#ffffff',
				'font'				=> 'google',
			),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'presentup').'</div>',
		),
		array(
			'id'             => 'titlebar_breadcrumb_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Breadcrumb Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.tm-titlebar .breadcrumb-wrapper, .tm-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '14',
				'line-height'		=> '18',
				'letter-spacing'	=> '0',
				'color'				=> '#ffffff',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'presentup').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Content Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'presentup').'</small>',
		),
		array(
			'id'            => 'titlebar_view',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Align', 'presentup'),
			'options'       => array(
							'default'  => esc_attr__('All Center (default)', 'presentup'),
							'left'     => esc_attr__('Title Left / Breadcrumb Right', 'presentup'),
							'right'    => esc_attr__('Title Right / Breadcrumb Left', 'presentup'),
							'allleft'  => esc_attr__('All Left', 'presentup'),
							'allright' => esc_attr__('All Right', 'presentup'),
			),
			'default'       => 'default',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select text align in Titlebar', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'titlebar_height',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Titlebar Height', 'presentup' ),
			'after'  	  	 => ' px<br><div class="cs-text-muted">'.esc_attr__('Set height of the Titlebar. In pixel only', 'presentup').'</div>',
			'default'		 => '335',
        ),
		array(
			'id'        	=> 'breadcrumb_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'presentup'),
			'label'     	=> esc_attr__('YES', 'presentup'),
			'default'   	=> true,
			'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'presentup').'</div>',
		),
		array(
			'id'            => 'breadcum_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Breadcrumb Background Color', 'presentup'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
							'grey'       => esc_attr__('Grey', 'presentup'),
							'white'      => esc_attr__('White', 'presentup'),
							'skincolor'  => esc_attr__('Skincolor', 'presentup'),
							'custom'     => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'custom',
			'dependency' 	=> array( 'breadcrumb_on_bottom', '==|==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for breadcrumb background color', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'breadcrumb_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Breadcrumb Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(0,0,0,0.25)',
			'dependency'  	 => array( 'breadcrumb_on_bottom|breadcum_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Breadcrumb', 'presentup').'</div>',
        ),
		array(
			'id'            => 'titlebar_hide_breadcrumb',
			'type'          => 'select',
			'title'         =>  esc_attr__('Hide Breadcrumb', 'presentup'),
			'options'  => array(
							'no'   => esc_attr__('NO, show the breadcrumb', 'presentup'),
							'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'presentup'),
			),
			'default'       => 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'presentup').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Extra Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'presentup').'</small>',
		),
		array(
			'id'      => 'adv_tbar_catarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'presentup'),
			'default' => esc_attr__('Category Archives: ', 'presentup'),
		),
		array(
			'id'      => 'adv_tbar_tagarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'presentup'),
			'default' => esc_attr__('Tag Archives: ', 'presentup'),
		),
		array(
			'id'      => 'adv_tbar_postclassified',
			'type'    => 'text',
			'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'presentup'),
			'default' => esc_attr__('Posts classified under: ', 'presentup'),
		),
		array(
			'id'      => 'adv_tbar_authorarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'presentup'),
			'default' => esc_attr__('Author Archives: ', 'presentup'),
		),

	)
);


// Header Settings
$tm_framework_options[] = array(
	'name'   => 'header_settings', // like ID
	'title'  => esc_attr__('Header Settings', 'presentup'),
	'icon'   => 'fa fa-arrow-up',
	'fields' => array( // begin: fields
	
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Header Settings', 'presentup'),
        ),
		array(
			'id'     		 => 'header_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Header Height (in pixel)', 'presentup' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area from here', 'presentup').'</div>',
			'default'		 => '105',
        ),
		array(
			'id'            => 'header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Background Color', 'presentup'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
							'grey'       => esc_attr__('Grey', 'presentup'),
							'white'      => esc_attr__('White', 'presentup'),
							'skincolor'  => esc_attr__('Skincolor', 'presentup'),
							'custom'     => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Header background color', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(255,255,255,0)',
			'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'vertical_header_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Header Background Properties', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Header. You can set color or image and also set other background related properties', 'presentup').'</div>',
			'dependency'  	=> array( 'header_style', 'any', 'classic-vertical' ),
			'default'		=> array(
				'image'			=> '',
				'size'			=> 'cover',
				'color'			=> 'rgba(0,0,0,0.01)',
			),
			'output' 	    => '.tm-header-style-classic-vertical .site-header',
        ),
		array(
			'id'     		 => 'responsive_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(21,21,21,0.96)',
			'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|classic-overlay,centerlogo-overlay,toplogo-overlay,classic-box-overlay,classic-box-overlay-rtl,classic-overlay-rtl,infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'presentup').'</div>',
        ),
		array(
			'id'            => 'header_responsive_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Responsive Icon Color', 'presentup'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'presentup'),
							'white'  => esc_attr__('White', 'presentup'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'presentup').'</div>',
			'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
        ),
		array(
          'id'      	 	 => 'logotype',
          'type'     		 => 'radio',
          'title'    		 => esc_attr__('Logo type', 'presentup'), 
          'options' 		 => array( 
								'text' => esc_attr__('Logo as Text', 'presentup'), 
								'image' => esc_attr__('Logo as Image', 'presentup') 
							),
          'default'  		 => 'image',
          'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'logotext',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Logo Text', 'presentup'),
			'default' 		 => 'Presentup',
			'dependency'  	 => array( 'logotype_text', '==', 'true' ),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'presentup').'</div>',
		),
		array(
			'id'             => 'logo_font',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Logo Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
			'default'        => array(
				'family'		 => 'Arimo',
				'backup-family'	 => 'Arial, Helvetica, sans-serif',
				'variant'		 => 'regular',
				'font-size'		 => '26',
				'line-height'	 => '27',
				'letter-spacing' => '0',
				'color'			 => '#202020',
				'font'			 => 'google',
			),
			'dependency'  	=> array( 'logotype_text', '==', 'true' ),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'presentup').'</div>',
		),
		
		array(
			'id'       		 => 'logoimg',
			'type'     		 => 'themetechmount_image',
			'title'    		 => esc_attr__('Logo Image', 'presentup'),
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'presentup') . sprintf(__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'presentup'),'<strong>', '</strong>').'</div>',
			'add_title'		 => esc_attr__('Upload Site Logo','presentup'),
			'default'		 => array(
					'thumb-url'	=> get_template_directory_uri() . '/images/logo.png',
					'full-url'	=> get_template_directory_uri() . '/images/logo.png',
			),
        ),
		array(
			'id'     		 => 'logo_max_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height', 'presentup' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'presentup').'</div>',
			'default'		 => '60',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Sticky Header', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'sticky_header',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Enable Sticky Header', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'header_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Sticky Header Height (in pixel)', 'presentup' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'presentup').'</div>',
			'default'		 => '70',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		array(
			'id'            => 'sticky_header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Background Color', 'presentup'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
							'grey'       => esc_attr__('Grey', 'presentup'),
							'white'      => esc_attr__('White', 'presentup'),
							'skincolor'  => esc_attr__('Skincolor', 'presentup'),
							'custom'     => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'white',
			'dependency'    => array( 'sticky_header', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(21,21,21,0.96)',
			'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Sticky Header', 'presentup').'</div>',
        ),
		array(
			'id'       		 => 'logoimg_sticky',
			'type'     		 => 'themetechmount_image',
			'title'    		 => esc_attr__('Logo Image for Sticky Header', 'presentup'),
			'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for sticky header', 'presentup').'</div>',
			'add_title'		 => esc_attr__('Upload Sticky Logo','presentup'),
		),
		array(
			'id'     		 => 'logo_max_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height when Sticky Header', 'presentup' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set logo when the header is sticky', 'presentup').'</div>',
			'default'		 => '40',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Search Button in Header', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'header_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Button', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'search_input',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Input Word', 'presentup'),
			'default' 		 => esc_attr__('Type Word Then Enter..', 'presentup'),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'presentup').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'id'     		 => 'searchform_title',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Title', 'presentup'),
			'default' 		 => '',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'presentup').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Header Style', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change header style', 'presentup').'</small>',
		),
		array(
			'id'			=> 'headerstyle',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Select Header Style', 'presentup'),
			'desc'     		=> esc_attr__('Please select header style', 'presentup'),
			'wrap_class'    => 'tm-header-style',
			'options'      	=> array(
				'classic-highlight'       => get_template_directory_uri() . '/inc/images/header-classic.png',
				'classic-overlay'         => get_template_directory_uri() . '/inc/images/header-classic-overlay.png',
				'classic-box-overlay'     => get_template_directory_uri() . '/inc/images/header-elegant.png',	
				'elegant-box-overlay'     => get_template_directory_uri() . '/inc/images/header-elegant-overllay.png',
				'infostack'               => get_template_directory_uri() . '/inc/images/header-infostack.png',				
			),
			'default'		=> 'classic-highlight',
			'attributes' 	=> array(
			'data-depend-id' => 'header_style'
			),
			'radio' 		=> true,//This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Special options for selected header', 'presentup'),
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic2,classic-overlay,classic-box-overlay,classic-rtl,classic-overlay-rtl,toplogo,toplogo-overlay,centerlogo,centerlogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl,classic-vertical,classic-highlight' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'presentup').'</small>',
        ),
		array(
			'id'       		 => 'header_text',
			'type'     		 => 'wysiwyg',
			'title'    		 =>  esc_attr__('Header Text Area', 'presentup'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic,classic2,classic-overlay,classic-box-overlay,classic-rtl,classic-overlay-rtl,classic-highlight' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear before Search/Cart icon in header area. This option will work for currently selected header style only', 'presentup').'</div>',
			'default'        => '',
        ),
		array(
			'id'       		 => 'header_text_abovemenu',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Text Area Above Menu', 'presentup'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic2' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear above menu in header area. This option will work for currently selected header style only', 'presentup').'</div>',
			'default'        => '',
        ),
		array(
			'id'       		 => 'header_text_belowmenu',
			'type'     		 => 'wysiwyg',
			'title'    		 =>  esc_attr__('Header Text Area Below Menu', 'presentup'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'classic-vertical' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear below menu in header area. This option will work for currently selected header style only', 'presentup').'</div>',
			'default'        => '',
        ),
		array(
			'id'            => 'header_menu_position',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Position', 'presentup'),
			'options'  		=> array(
								'left'		=> esc_attr__('Left Align', 'presentup'),
								'right'		=> esc_attr__('Right Align', 'presentup'),
								'center'	=> esc_attr__('Center Align', 'presentup'),
							),
			'default'       => 'right',
			'dependency'  	=> array( 'header_style', 'any', 'classic,classic-overlay,classic-highlight' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'presentup').'</div>',
        ),
		
		array(
			'id'       		 => 'infostack_column_one',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack First Column Content', 'presentup'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on first column', 'presentup').'</div>',
			'default'        => '[tm-servicebox h2="EMAIL" i_type="themify" i_icon_themify="themifyicon ti-email" i_size="sm" h4="info@example.com" h4_link="url:mailto%3Ahttp%3A%2F%2Finfo%40example.com|||"]',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_two',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Second Column Content', 'presentup'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on second column', 'presentup').'</div>',
			'default'        => '[tm-servicebox h2="CALL" i_type="fontawesome" i_icon_fontawesome="fa fa-phone" i_size="sm" h4="+133 200 1800"]',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_three',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Third Column Content', 'presentup'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on third column', 'presentup').'</div>',
			'default'        => '[tm-servicebox h2="Envanto HQ 24 Fifth st.," i_type="fontawesome" i_icon_fontawesome="fa fa-map-marker"  i_size="sm" h4="Los Angeles, USA"]',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_phone_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Right Content', 'presentup'),
			'shortcode'		 => true,
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear after menu', 'presentup').'</div>',
			'default'        => '',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		
		
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('Change widget content of the header', 'presentup') . '</strong> <br> ' . esc_attr__('You can change widgets content in the header area from Widgets section. Just go to "Appearance > Widgets" and modify widgets under "InfoStack header widgets" position.', 'presentup') . '</p>',
			'dependency'  	 => array( 'header_style', 'any', 'infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'id'            => 'header_widget_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Widget Text Color', 'presentup'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'presentup'),
							'white'  => esc_attr__('White', 'presentup'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for Widgets text for Overlay header style. This is because the background is transparent so you should set it.', 'presentup').'</div>',
			'dependency'    => array( 'header_bg_color|header_style', '==|any', 'custom|infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
        ),
		array(
			'id'     		 => 'header_menuarea_height',
			'type'    		 => 'number',
			'title'   		 => esc_attr__('Menu area height', 'presentup'),
			'default' 		 => '65',
			'after'          => esc_attr(' px'),
			'attributes'     => array(
			'min'       	 => 40,
			),
			'subtitle'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Height for menu area only', 'presentup').'</div>',
			'dependency'     => array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
		),		
		array(
			'id'            => 'header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Background Color', 'presentup'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
								'grey'       => esc_attr__('Grey', 'presentup'),
								'white'      => esc_attr__('White', 'presentup'),
								'skincolor'  => esc_attr__('Skincolor', 'presentup'),
								'custom'     => esc_attr__('Custom Color', 'presentup'),
							),
			'default'       => 'darkgrey',
			'dependency'	=> array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(0,0,0,0.31)',
			'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area', 'presentup').'</div>',
        ),
        array(
			'id'            => 'sticky_header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'presentup'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'presentup'),
								'grey'       => esc_attr__('Grey', 'presentup'),
								'white'      => esc_attr__('White', 'presentup'),
								'skincolor'  => esc_attr__('Skincolor', 'presentup'),
								'custom'     => esc_attr__('Custom Color', 'presentup'),
							),
			'default'       => 'darkgrey',
			'dependency'	=> array( 'header_style', 'any', 'toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'presentup').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'presentup' ),
			'default'		 => 'rgba(129,215,66,0.7)',
			'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|toplogo,toplogo-overlay,infostack,infostack-rtl,infostack-overlay,infostack-overlay-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'presentup').'</div>',
        ),
			
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Logo SEO', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'presentup').'</small>',
		),
		array(
			'id'      		=> 'logoseo',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Logo Tag for SEO', 'presentup'),
			'options' 		=> array(
								'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'presentup'),
								'allh1'      => esc_attr__('H1 tag everywhere', 'presentup'),
							),
			'default'		=> 'h1homeonly',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select logo tag for SEO purpose', 'presentup').'</div>',
        ),
	
		
	)
);


// Menu Settings
$tm_framework_options[] = array(
	'name'   => 'menu_settings', // like ID
	'title'  => esc_attr__('Menu Settings', 'presentup'),
	'icon'   => 'fa fa-bars',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Menu Settings', 'presentup'),
			'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'presentup').'</small>',
		),
		array(
			'id'      		=> 'menu_breakpoint',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'presentup'),
			'options'  		=> array(
								'1200'   => esc_attr__('Large devices','presentup').' <small>'.esc_attr__('Desktops (>1200px)', 'presentup').'</small>',
								'992'    => esc_attr__('Medium devices','presentup').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'presentup').'</small>',
								'768'    => esc_attr__('Small devices','presentup').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'presentup').'</small>',
								'custom' => esc_attr__('Custom (select pixel below)', 'presentup'),
						),
			'default'		=> '1200',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'presentup').'</div>',
        ),
		
		array(
			'id'     		=> 'megamenu-override',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Override Max Mega Menu Style', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'presentup').'</div>',
        ),
		
		array(
			'id'     		 => 'menu_breakpoint-custom',
			'type'   		 => 'number',
			'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'presentup' ),
			'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
			'default'		 => '1200',
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'presentup').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Main Menu Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'presentup').'</small>',
		),
		array(
			'id'             => 'mainmenufont',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Main Menu Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '16',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select main menu font, color and size', 'presentup').'</div>',
		),
		
		
		
		array(
			'id'     		 => 'stickymainmenufontcolor',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'presentup' ),
			'default'		 => '#283d58',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'mainmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Main Menu Active Link Color', 'presentup'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'presentup'),
				'custom'		=> esc_attr__('Custom color (select below)', 'presentup'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>
									<strong>' . esc_attr__('Tips:', 'presentup') . '</strong>
									<ul>
										<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'presentup') . '</li>
										<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'presentup') . '</li>
									</ul>
								</div>',
        ),
		array(
			'id'     		 => 'mainmenu_active_link_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'presentup' ),
			'default'		 => '#ffffff',
			'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for main menu active active link', 'presentup').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Drop Down Menu Options', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'presentup').'</small>',
		),
		array(
			'id'             => 'dropdownmenufont',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('Dropdown Menu Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .tm-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '14',
				'line-height'		=> '16',
				'letter-spacing'	=> '0',
				'color'				=> '#5d6576',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select dropdown menu font, color and size', 'presentup').'</div>',
		),
		
		
		array(
			'id'           	=> 'dropmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'presentup'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'presentup'),
				'custom'		=> esc_attr__('Custom color (select below)', 'presentup'),
			),
			'default'      	=> 'custom',
			'after'  		=> '<div class="cs-text-muted"><br>' . '<strong>' . esc_attr__('Tips:', 'presentup') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'presentup') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'presentup') . '</li></ul></div>',
        ),
		array(
			'id'     		=> 'dropmenu_active_link_custom_color',
			'type'   		=> 'color_picker',
			'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'presentup' ),
			'default'		=> '#ffffff',
			'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'dropmenu_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'presentup').'</div>',
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output' 	    => '.tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
        ),
		array(
			'id'      		=> 'dropdown_menu_separator',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Separator line between dropdown menu links', 'presentup'),
			'options'  		=> array(
								'grey'  => esc_attr__('Grey color as border color (default)', 'presentup'),
								'white' => esc_attr__('White color as border color (for dark background color)', 'presentup'),
								'no'    => esc_attr__('No separator border', 'presentup'),
							),
			'default'		=> 'grey',
			'after'  	  	=> '<div class="cs-text-muted"><br> <strong>' . esc_attr__('Tips:', 'presentup') . '</strong>
								<ul>
									<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'presentup') . '</li>
									<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'presentup') . '</li>
									<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'presentup') . '</li>
								</ul></div>',
        ),
		array(
			'id'             => 'megamenu_widget_title',
			'type'           => 'themetechmount_typography', 
			'title'          => esc_attr__('MegaMenu Widget Title Font', 'presentup'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'all-varients'   => false,
			'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Open Sans',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '16',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#283d58',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Font settings for mega menu widget title. NOTE: This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'presentup').'</div>',
		),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => '',
			'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'presentup').'</strong>',
		),
		array(
			'id'      		=> 'dropmenu_background_1',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('First dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for first dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_2',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Second dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for second dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_3',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Third dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for third dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_4',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Fourth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_5',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Fifth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_6',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Sixth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_7',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Seventh dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_8',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Eighth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_9',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Ninth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_10',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Tenth dropdown menu background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'presentup') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .tm-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
        ),
		
	)
);





// Footer Settings
$tm_framework_options[] = array(
	'name'   => 'footer_settings', // like ID
	'title'  => esc_attr__('Footer Settings', 'presentup'),
	'icon'   => 'fa fa-arrow-down',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Sticky Footer', 'presentup'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'presentup').'</small>',
        ),
		array(
			'id'     		=> 'stickyfooter',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Sticky Footer', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'presentup').'</div>',
        ),
		
		// Footer common background
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Background (full footer elements)', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'presentup').'</small>',
		),
		array(
			'id'            => 'full_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color (all area)', 'presentup'),
			'options'		=> array(
				'transparent' => esc_attr__('Transparent', 'presentup'),
				'darkgrey'    => esc_attr__('Dark grey', 'presentup'),
				'grey'        => esc_attr__('Grey', 'presentup'),
				'white'       => esc_attr__('White', 'presentup'),
				'skincolor'   => esc_attr__('Skincolor', 'presentup'),
				'custom'      => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'presentup').'</div>',
        ),
		array(
			'id'      		 => 'full_footer_bg_all',
			'type'    		 => 'themetechmount_background',
			'title'  		 => esc_attr__('Footer Background (all area)', 'presentup' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'presentup').'</div>',
			'default'		 => array(
				'image'			=> get_template_directory_uri() . '/images/footer-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#282828',
			),
			'output' 	     => '.footer',
			'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('First Footer Widget Area', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'presentup').'</small>',
		),
		array(
			'id'			=> 'first_footer_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'presentup'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '12',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'presentup').'</div>',
        ),
		
		array(
			'id'            => 'first_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'presentup'),
			'options'  => array(
				'transparent' => esc_attr__('Transparent', 'presentup'),
				'darkgrey'    => esc_attr__('Dark grey', 'presentup'),
				'grey'        => esc_attr__('Grey', 'presentup'),
				'white'       => esc_attr__('White', 'presentup'),
				'skincolor'   => esc_attr__('Skincolor', 'presentup'),
				'custom'      => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'presentup').'</div>',
        ),
		array(
			'id'      			=> 'first_footer_bg_all',
			'type'    			=> 'themetechmount_background',
			'title'  			=> esc_attr__('Footer Background', 'presentup' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'presentup').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center bottom',
				'attachment'		=> 'scroll',
				'size'				=> 'cover',
				'color'				=> '#0e0e0e',
			),
			'output'			=> '.first-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'first_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'presentup'),
			'options'  		=> array(
								'white'  => esc_attr__('White', 'presentup'),
								'dark'   => esc_attr__('Dark', 'presentup'),
							),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),

		// Second Footer Widget Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Second Footer Widget Area', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'presentup').'</small>',
		),
		array(
			'id'			=> 'second_footer_column_layout',
			'type' 			=> 'image_select',//themetechmount_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'presentup'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '3_3_3_3',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'presentup').'</div>',
        ),
		array(
			'id'            => 'second_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'presentup'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'presentup'),
							'darkgrey'    => esc_attr__('Dark grey', 'presentup'),
							'grey'        => esc_attr__('Grey', 'presentup'),
							'white'       => esc_attr__('White', 'presentup'),
							'skincolor'   => esc_attr__('Skincolor', 'presentup'),
							'custom'      => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'second_footer_bg_all',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Footer Background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'presentup').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right center',
				'attachment'	=> 'scroll',
				'size'			=> 'auto',
				'color'			=> 'rgba(10,10,10,0.29)',
			),
			'output' 	    => '.second-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'second_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'presentup'),
			'options'  		=> array(
				'white'  		=> esc_attr__('White', 'presentup'),
				'dark'   		=> esc_attr__('Dark', 'presentup'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),

		// Footer Text Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Text Area', 'presentup'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'presentup').'</small>',
		),
		array(
			'id'            => 'bottom_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'presentup'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'presentup'),
							'darkgrey'    => esc_attr__('Dark grey', 'presentup'),
							'grey'        => esc_attr__('Grey', 'presentup'),
							'white'       => esc_attr__('White', 'presentup'),
							'skincolor'   => esc_attr__('Skincolor', 'presentup'),
							'custom'      => esc_attr__('Custom Color', 'presentup'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'bottom_footer_bg_all',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Footer Background', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'presentup').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'fixed',
				'color'			=> '#0e0e0e',
			),
			'output' 	    => '.bottom-footer-text',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'bottom_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'presentup'),
			'options'  		=> array(
				'white'			=> esc_attr__('White', 'presentup'),
				'dark'			=> esc_attr__('Dark', 'presentup'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'presentup').'</div>',
        ),
		array(
          'id'      		=> 'footer_copyright_left',
          'type'    		=> 'wysiwyg',
          'title'  			=>  esc_attr__('Footer Text Left', 'presentup'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'presentup')
		  . '<br>   <code>[tm-site-url]</code> <code>[tm-site-title]</code> <code>[tm-site-tagline]</code> <code>[tm-current-year]</code> <code>[tm-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','presentup') , '<a href="'. esc_url('http://presentup.themetechmountthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
		  'default'         => themetechmount_wp_kses('Copyright &copy; 2018 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
        ),
		array(
          'id'       		=> 'footer_copyright_right',
          'type'     		=> 'wysiwyg',
          'title'   		=>  esc_attr__('Footer Text Right', 'presentup'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'presentup')
		  . '<br>   <code>[tm-site-url]</code> <code>[tm-site-title]</code> <code>[tm-site-tagline]</code> <code>[tm-current-year]</code> <code>[tm-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s about details for each shortcode.','presentup') , '<a href="'. esc_url('http://presentup.themetechmountthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
        ),
		
	)
);


// Login Page Settings
$tm_framework_options[] = array(
	'name'   => 'login_page_settings', // like ID
	'title'  => esc_attr__('Login Page Settings', 'presentup'),
	'icon'   => 'fa fa-lock',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Login Page Settings', 'presentup'),
		),
		array(
			'id'      		=> 'login_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Background Properties', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of background object', 'presentup').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/login-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'fix',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output'   		=> '.loginpage',
        ),
	)
);


// Blog Settings
$tm_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'presentup'),
	'icon'   => 'fa fa-pencil',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Excerpt Limit (in words)', 'presentup' ),
			'default'		=> '0',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'presentup') . '<br><strong>' . esc_attr__('TIP:', 'presentup') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'presentup') . '</div>',
        ),
		array(
			'id'     		=> 'blogclassic_show_comment_number',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show "Total Comment" with icon', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Total Comment with icon. You can hide it if you don\'t want to show it.', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'presentup'),
			'default' 		=> esc_attr__('Read More', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'presentup').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'presentup'),
			'options'  		=> array(
				'classic'			=> get_template_directory_uri() . '/inc/images/blog-view-style1.png',
				'box'				=> get_template_directory_uri() . '/inc/images/blog-view-style4.png',
			),
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'presentup').'</div>',
			
        ),
		
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'presentup').'</small>',
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'presentup'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'presentup'),
				'two'			=> esc_attr__('Two Column view', 'presentup'),
				'three'			=> esc_attr__('Three Column view (default)', 'presentup'),
				'four'			=> esc_attr__('Four Column view', 'presentup'),
			),
			'default'      	=> 'one',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'presentup').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'           	=> 'blogbox_view',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box template', 'presentup'),
			'options'  		=> themetechmount_global_blog_template_list(),
			'default'      	=> 'left-image',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'presentup').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'     		=> 'blogbox_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blogbox Excerpt Limit (in words)', 'presentup' ),
			'default'		=> '110',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'presentup') . '<br><strong>' . esc_attr__('TIP:', 'presentup') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'presentup') . '</div>',
        ),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'presentup'),
			'default' 		=> esc_attr__('Share', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'presentup').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'presentup'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'presentup'),
					'twitter'     => esc_attr__('Twitter', 'presentup'),
					'gplus'       => esc_attr__('Google Plus', 'presentup'),
					'pinterest'   => esc_attr__('Pinterest', 'presentup'),
					'linkedin'    => esc_attr__('LinkedIn', 'presentup'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'presentup'),
					'tumblr'      => esc_attr__('Tumblr', 'presentup'),
					'reddit'      => esc_attr__('Reddit', 'presentup'),
					'digg'        => esc_attr__('Digg', 'presentup'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'presentup').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'presentup').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','presentup'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'presentup').'</div>',
			'default' => array(
				'enabled' => array(
					'author'	=> esc_attr__('Author', 'presentup'),
					'cat'     => esc_attr__('Categories', 'presentup'),
					'comment' => esc_attr__('Comments', 'presentup'),
				),
				'disabled' => array(
					'date'		=> esc_attr__('Date', 'presentup'),
					'tag'		=> esc_attr__('Tags', 'presentup'),	
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'presentup'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'presentup'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'presentup'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'presentup'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'presentup') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'presentup').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blogbox (Visual Composer element)', 'presentup').'</small>',
		),
		array(
			'id'      => 'blogbox_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','presentup'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'presentup').'</div>',
			'default' => array(
				'enabled' => array(
				),
				'disabled' => array(
					'comment'	=> esc_attr__('Comments', 'presentup'),					
					'cat'    	=> esc_attr__('Categories', 'presentup'),
					'tag'  		=> esc_attr__('Tags', 'presentup'),
					'author'  	=> esc_attr__('Author', 'presentup'),
					'date'    	=> esc_attr__('Date', 'presentup'),
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'presentup'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'presentup'),
		),
		array(
			'id'     		=> 'blogbox_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'presentup'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'presentup'). ' <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'presentup') . '</a></div>',
		),
		array(
			'id'     		=> 'blogbox_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'presentup').'</div>',
        ),
		
	)
);



// Portfolio Settings
$tm_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'presentup'), $pf_title_singular ),
	'icon'   => 'fa fa-th-large',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'presentup'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'presentup'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'presentup'), $pf_title_singular ),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'presentup'), $pf_title_singular ) . '</div>',
		),
		array(
			'id'      		=> 'portfolio_viewstyle',
			'type'   		=> 'radio',
			'title'   		=> sprintf( esc_attr__('Single %s View Style', 'presentup'), $pf_title_singular ),
			'options' 		=> array( 
				'left'			=> esc_attr__('Left image and right content (default)', 'presentup'),
				'top'			=> esc_attr__('Top image and bottom content', 'presentup'),
				'full'			=> esc_attr__('No image and full-width content (without details box)', 'presentup'),
				'full-withimg'  => esc_attr__('Top image and full-width content (without details box)', 'presentup'),
			),
			'default'		=> 'top',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'presentup'), $pf_title_singular ) . '</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'presentup'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'presentup'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'presentup'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'presentup'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'presentup'), $pf_title ),
			'default' 		=> esc_attr__('Related Projects', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'presentup'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'presentup'), $pf_title ),
			'options'       => themetechmount_global_portfolio_template_list(),
			'default'      	=> 'top-image',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'presentup'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'presentup'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'presentup'),
					'three'   => esc_attr__('Three column', 'presentup'),
					'four'    => esc_attr__('Four column', 'presentup'),
					'five'    => esc_attr__('Five column', 'presentup'),
					'six'     => esc_attr__('Six column', 'presentup'),
				),
			//'class'        	=> 'chosen',
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'presentup'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'presentup'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'presentup'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'presentup'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'presentup'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'presentup'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'presentup'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'presentup'),
			'accordion_title' => esc_attr__('Details for the line', 'presentup'),
			
			'default'		 =>  array (
				array (
					'pf_details_line_title' => 'Date',
					'pf_details_line_icon'  => array (
						'library' => 'themify',
						'library_fontawesome' => 'fa-',
						'library_linecons'    => 'vc_li-',
						'library_themify'     => 'ti-',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => 'Customer',
					'pf_details_line_icon'  => array (
						'library'             => 'themify',
						'library_fontawesome' => 'fa-',
						'library_linecons'    => 'vc_li-',
						'library_themify'     => 'ti-',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => 'Category',
					'pf_details_line_icon'  => array (
						'library'             => 'linecons',
						'library_fontawesome' => 'fa-',
						'library_linecons'    => 'vc_li-',
						'library_themify'     => 'ti-',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => 'Creative Director',
					'pf_details_line_icon'  => array (
						'library'             => 'themify',
						'library_fontawesome' => 'fa-',
						'library_linecons'    => 'vc_li-',
						'library_themify'     => 'ti-',
					),
					'data' => 'custom',
				),
			),



			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'presentup'),
					'default' 		=> esc_attr__('Location', 'presentup'),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'presentup'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'presentup').'</div>',
				),
				array(
					'id'      => 'pf_details_line_icon',
					'type'    => 'themetechmount_iconpicker',
					'title'  		=> esc_attr__('Line Icon', 'presentup' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select icon for the first Line of the details in single %s', 'presentup'), $pf_title_singular ) . '</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'presentup'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'presentup'),
							'multiline'     => esc_attr__('Custom text with multiline', 'presentup'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'presentup'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'presentup'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'presentup'), $pf_title_singular ),
							'tag'           => sprintf( esc_attr__('Show Tags (without link) of the %s', 'presentup'), $pf_title_singular ),
							'tag_link'      => sprintf( esc_attr__('Show Tags (with link) of the %s', 'presentup'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'presentup'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'presentup'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'presentup'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide social share box.', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'presentup'),
			'default' 		=> esc_attr__('Share', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'presentup').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'presentup'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'presentup'),
					'twitter'     => esc_attr__('Twitter', 'presentup'),
					'gplus'       => esc_attr__('Google Plus', 'presentup'),
					'pinterest'   => esc_attr__('Pinterest', 'presentup'),
					'linkedin'    => esc_attr__('LinkedIn', 'presentup'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'presentup'),
					'tumblr'      => esc_attr__('Tumblr', 'presentup'),
					'reddit'      => esc_attr__('Reddit', 'presentup'),
					'digg'        => esc_attr__('Digg', 'presentup'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'presentup'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Title', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This button will appear after the social share links.', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Link', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This button will appear after the social share links.', 'presentup').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'presentup'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'presentup'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'presentup'), $pf_title_singular ),
			'options'       => themetechmount_global_portfolio_template_list(),
			'default'      	=> 'top-image',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'presentup'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'presentup'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'presentup'),
					'three'   => esc_attr__('Three column', 'presentup'),
					'four'    => esc_attr__('Four column', 'presentup'),
					'five'    => esc_attr__('Five column', 'presentup'),
					'six'     => esc_attr__('Six column', 'presentup'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'presentup'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'presentup' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'presentup'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);


// Team Member Settings
$tm_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'presentup'), $team_member_title_singular ),
	'icon'   => 'fa fa-users',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'presentup'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'presentup'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'presentup'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'presentup'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'presentup'),
			'accordion_title' => esc_attr__('Details for the line', 'presentup'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'presentup'),
					'default' 		=> esc_attr__('Experiance', 'presentup'),
					'after'  		=> '<div class="cs-text-muted"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'presentup'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'presentup').'</div>',
				),
				array(
					'id'      => 'team_extra_details_line_icon',
					'type'    => 'themetechmount_iconpicker',
					'title'   => esc_attr__('Line Icon', 'presentup' ),
					'after'   => '<div class="cs-text-muted"><br>' . sprintf( esc_attr_x('Select icon for the Line of the details in single %s', 'Team Member', 'presentup'), $team_member_title_singular ) . '</div>',
					'default' => array(
						'library'             => 'themify',
						'library_themify'	  => 'ti-calendar',
					),
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'presentup'),
					'options' 		=> array(
							'custom'  => esc_attr__('Custom text (add anything)', 'presentup'),
							'url'     => esc_attr__('URL link', 'presentup'),
							'email'   => esc_attr__('Email address', 'presentup'),
							'phone'   => esc_attr__('Phone number', 'presentup'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'presentup'), $team_member_title_singular ).'</div>',
				),
			),
			'default' =>   array (
				array (
					'team_extra_details_line_title' => 'Skills',
					'team_extra_details_line_icon' => array (
						'library' => 'themify',
						'library_fontawesome' => 'empty',
						'library_linecons' => 'vc_li vc_li-bubble',
						'library_themify' => 'ti-briefcase',
					),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Address Info',
					'team_extra_details_line_icon' => array (
						'library' => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
						'library_linecons' => 'vc_li vc_li-bubble',
						'library_themify' => 'ti-briefcase',
					),
					'data' => 'custom',
				),
				),
			
        ),
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'presentup'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'presentup'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'presentup'), $team_member_title_singular ),
			'options'       => themetechmount_global_team_member_template_list(),
			'default'      	=> 'topimage-bottomcontent',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'presentup'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'presentup'),
			'options'  => array(
					'two'   => esc_attr__('Two column', 'presentup'),
					'three' => esc_attr__('Three column', 'presentup'),
					'four'  => esc_attr__('Four column', 'presentup'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf(esc_attr__('Select column to show %s', 'presentup'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'presentup' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'presentup'), $team_member_title  ) . '</div>',
        ),
		
	)
);



// Creating Client Groups array 
$client_groups = array();
if( isset($presentup_theme_options['client_groups']) && is_array($presentup_theme_options['client_groups']) ){

foreach( $presentup_theme_options['client_groups'] as $key => $val ){

	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}

}




// Error 404 Page Settings
$tm_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'presentup'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'presentup').'</small>',
		),
		array(
			'id'      => 'error404_big_icon',
			'type'    => 'themetechmount_iconpicker',
			'title'  		=> esc_attr__('Big icon', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select icon that appear in top with big size', 'presentup').'</div>',
			'default' =>  array (
				'library'			  => 'fontawesome',
				'library_fontawesome' => 'fa fa-thumbs-o-down',
				'library_linecons'	  => '',
				'library_themify'	  => 'ti-location-pin',
			),
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Big heading text', 'presentup'),
			'default' 		=> esc_attr__('404 ERROR', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown with big font size below icon', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'presentup'),
			'default' 		=> esc_attr__('This page may have been moved or deleted. Be sure to check your spelling.', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'error404_page_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'presentup' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'presentup').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/404-page-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'size'			=> 'cover',
				'color'			=> 'rgba(255,255,255,0.1)',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),	
		
	)
);


// Search Page Settings
$tm_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'presentup'),
	'icon'   => 'fa fa-search',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'presentup'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'presentup'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'presentup') . '<br> ' . esc_attr__('HTML tags and shortcodes are allowed', 'presentup').'</div>',
			'default'  		 => themetechmount_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);


// Sidebar Settings
$tm_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'presentup'),
	'icon'   => 'fa fa-pause',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'presentup'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'presentup'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'presentup'),
			'button_title'    => esc_attr__('Add New Sidebar', 'presentup'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'presentup'),
			'fields'          => array(
					array(
						'id'     		=> 'custom_sidebar',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Custom Sidebar Name', 'presentup'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write custom sidebar name here', 'presentup').'</div>',
					),

			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'presentup'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'presentup').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for standard pages', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'presentup'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'presentup'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'presentup'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'presentup'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for search page', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for WooCommerce Shop and Single Product page', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('BBPress Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for BBPress pages', 'presentup').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_events',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Events Sidebar', 'presentup'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Events pages.', 'presentup') . ' ' . sprintf( esc_attr__('This is valid for %s plugin only','presentup') , '<a href="'. esc_url('https://wordpress.org/plugins/the-events-calendar/') .'" target="_blank">' . esc_attr__('The Events Calendar', 'presentup').'</a>' ).'</div>',
        ),
	)
);


// Getting social list
$global_social_list = themetechmount_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$tm_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'presentup'),
	'icon'   => 'fa fa-share-square-o',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'presentup'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[tm-social-links]%2$s shortcode to show social links.', 'presentup'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'presentup'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'presentup'),
			'button_title'    => esc_attr__('Add New Social Service', 'presentup'),
			'accordion_title' => esc_attr__('Social Service Properties', 'presentup'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'presentup'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Social icon from here', 'presentup').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'presentup'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'presentup').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
		
		
		
	),	
);

// WooCommerce Settings
$tm_framework_options[] = array(
	'name'   => 'woocommerce_settings', // like ID
	'title'  => esc_attr__('WooCommerce Settings', 'presentup'),
	'icon'   => 'fa fa-shopping-cart',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('WooCommerce Settings', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'wc-header-icon',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Cart Icon in Header', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'presentup') . ' <br><br> ' . '<strong>' . esc_attr__('NOTE:','presentup') . '</strong> ' . esc_attr__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('WooCommerce Product List Column', 'presentup'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'presentup'),
								'2' => esc_attr__('Two Columns', 'presentup'),
								'3' => esc_attr__('Three Columns', 'presentup'),
								'4' => esc_attr__('Four Columns', 'presentup'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list view', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-product-per-page',
			'type'   		=> 'number',
			'title'         => esc_attr__('Products Per Page', 'presentup' ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many product you want to show on SHOP page', 'presentup').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Single Product Page Settings', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Options for Single product page', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'wc-single-show-related',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Related Products', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "ON" to show Related Products below the product description on single page', 'presentup').'</div>',
        ),
		array(
			'id'     		=> 'wc-single-related-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('Column for Related Products', 'presentup'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'presentup'),
								'2' => esc_attr__('Two Columns', 'presentup'),
								'3' => esc_attr__('Three Columns', 'presentup'),
								'4' => esc_attr__('Four Columns', 'presentup'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list of related products', 'presentup').'</div>',
			'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'wc-single-related-count',
			'type'   		=> 'number',
			'title'         => esc_attr__('Related Products Show', 'presentup' ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many products you want to show in the Related prodcuts area on single product page', 'presentup').'</div>',
			'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
        ),
	)
);


// Under Construction
$tm_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'presentup'),
	'icon'   => 'fa fa-send',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'presentup'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'presentup'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'presentup'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'presentup'),
			'default'  		=> esc_attr__('This site is Under Construction', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'presentup').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'presentup'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => themetechmount_wp_kses( urldecode('%3Cdiv+class%3D%22un-main-page-content%22%3E%0D%0A%3Cdiv+class%3D%22un-page-content%22%3E%0D%0A%3Cdiv%3E%5Btm-logo%5D%3C%2Fdiv%3E%0D%0A%3Cdiv+class%3D%22sepline%22%3E%3C%2Fdiv%3E%0D%0A%3Ch1+class%3D%22heading%22%3EUNDER+CONSTRUCTION%3C%2Fh1%3E%0D%0A%3Ch4+class%3D%22subheading%22%3ESomething+awesome+this+way+comes.+Stay+tuned%21%3C%2Fh4%3E%0D%0A%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E') ),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your HTML code for Under Construction page body content', 'presentup').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'themetechmount_background',
			'title'  		=> esc_attr__('Background Properties', 'presentup' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background options. This is for main body background', 'presentup').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/uconstruction-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'fixed',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'presentup'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'presentup').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%22https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOpen%2BSans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%22%29%3B%0D%0Abody%7B%0D%0Apadding%3A+0%3B%0D%0Amargin%3A+0%3B%0D%0A%7D+%0D%0A.heading%2C+.subheading%7B+%0D%0Afont-family%3A+%22%22Open+Sans%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0A%7D+%0D%0A.heading%7B%0D%0Afont-size%3A+60px%3B%0D%0Aline-height%3A+65px%3B+%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Amargin-bottom%3A%0D%0A0px%3B+margin-bottom%3A+18px%3B%0D%0Afont-weight%3A+600%3B%0D%0Aletter-spacing%3A+2px%3B%0D%0Acolor%3A+%23283d58%3B%0D%0A+%7D+%0D%0A.subheading%7B%0D%0Afont-size%3A+23px%3B%0D%0Aline-height%3A+30px%3B%0D%0Acolor%3A+%23828c96%3B%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Afont-weight%3A+normal%3B%0D%0A%7D+%0D%0A.un-main-page-content%7B+%0D%0Aposition%3A+absolute%3B%0D%0Aleft%3A+50%25%3B%0D%0Atop%3A+45%25%3B%0D%0A-khtml-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-moz-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B+%0D%0A-ms-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-o-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0Atransform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A+%7D%0D%0A.tm-sc-logo%7B+%0D%0Amargin-bottom%3A+40px%3B%0D%0Adisplay%3A+inline-block%3B%0D%0A%7D'),
        ),
		
		
	)
);




// Seperator
$tm_framework_options[] = array(
	'name'   => 'tm_seperator_1',
	'title'  => esc_attr__('Advanced', 'presentup'),
	'icon'   => 'fa fa-ellipsis-h'
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;



// Advanced Settings
$tm_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'presentup'),
	'icon'   => 'fa fa-wrench',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'presentup'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'presentup'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'presentup'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'presentup'), $pf_title_singular ),
			'default'  		=> esc_attr('portfolio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'presentup'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Categories', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'presentup'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Category', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'presentup'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('portfolio-category', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'presentup').'</div>',
		),
		
	
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'presentup'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'presentup'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Members', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'presentup'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Member', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'presentup'), $team_member_title_singular ),
			'default'  		=> esc_attr__('team-member', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'presentup'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Groups', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'presentup'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Group', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'presentup').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'presentup'), $team_group_title_singular ),
			'default'  		=> esc_attr__('team-group', 'presentup'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'presentup').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Options to minify HTML/JS/CSS files', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'presentup'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'presentup').'</div>',
        ),
		
		// Thumb Image Size Options
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Box Image Size Options', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Set Image size for Portfolio, Team Member and Blog boxes.', 'presentup').'</small>',
		),
		array(
			'id'     	=> 'img-size-blog',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size', 'presentup' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'presentup' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'presentup') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'presentup') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'presentup') . '</a></p>',
			'default' 	=> array(
				'width'		=> '1200',
				'height'	=> '800',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-left',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Left Image and Right Content Only)', 'presentup' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'presentup' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'presentup') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'presentup') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'presentup') . '</a></p>',
			'default' 	=> array(
				'width'		=> '780',
				'height'	=> '600',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-top',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Top Image Bottom Content Content Only)', 'presentup' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'presentup' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'presentup') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'presentup') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'presentup') . '</a></p>',
			'default' 	=> array(
				'width'		=> '780',
				'height'	=> '590',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-portfolio',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Portfolio) Box - Thumb image size', 'presentup' ), $pf_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'presentup' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'presentup') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'presentup') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'presentup') . '</a></p>',
			'default' 	=> array(
				'width'		=> '720',
				'height'	=> '604',
				'crop'		=> 'yes',
			),
        ),
		array(
			'id'     	=> 'img-size-team-member',
			'type'    	=> 'themetechmount_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Team Member) Box - Thumb image size', 'presentup' ), $team_member_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'presentup' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'presentup') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'presentup') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'presentup') . '</a></p>',
			'default' 	=> array(
				'width'		=> '460',
				'height'	=> '540',
				'crop'		=> 'yes',
			),
        ),
		
		/* Icon library selector - Only selected libraries will be loaded in VC element */
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Enabled Icon Library', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Select icon library that you like to load in Visual Composer elements like "ThemetechMount Icon", "ThemetechMount Call to Action", "ThemetechMount Service Box" etc.', 'presentup').'</small>',
		),
		array(
			'id'        => 'icon_library',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select icon library to load', 'presentup'),
			'options'   => array(
					'linecons'       => esc_attr__( 'Linecons', 'presentup' ),
					'themify'        => esc_attr__( 'Themify icons', 'presentup' ),
			),
			'default'   => array( 'linecons', 'themify' ),
			'after'    	=> '<small>'.esc_attr__('Select icon library that you want to load. This will reduce load time of Visual Composer elements. But you can see only selected libraries in the icon dropdown.', 'presentup').'</small>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'presentup').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'presentup'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'presentup').'</div>',
        ),
		
		
	)
);


// Custom Code
$tm_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('Custom Code', 'presentup'),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'presentup').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'presentup'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'presentup').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'presentup'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('Paste your JS code here', 'presentup').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom HTML Code', 'presentup'),
			'after'  		=> '<small>'. sprintf(__('Custom HTML Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'presentup'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'presentup'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'presentup').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'presentup'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'presentup').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'presentup'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'presentup').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'presentup'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'presentup').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'presentup'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'presentup').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'presentup'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'presentup'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'presentup').'</div>',
        ),
		
		
	)
);


// Backup
$tm_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'presentup'),
	'icon'     => 'fa fa-shield',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'presentup'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
