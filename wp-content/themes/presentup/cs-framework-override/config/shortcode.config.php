<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'ThemetechMount Special Shortcodes',
  'shortcodes' => array(
	
	//Site Tagline
	array(
		'name'      => 'tm-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'presentup'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'presentup'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'tm-site-title',
		'title'     => esc_attr__('Site Title', 'presentup'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'presentup'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'tm-site-url',
		'title'     => esc_attr__('Site URL', 'presentup'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'presentup'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'tm-logo',
		'title'     => esc_attr__('Site Logo', 'presentup'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'presentup'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'tm-current-year',
		'title'     => esc_attr__('Current Year', 'presentup'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'presentup'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'tm-footermenu',
		'title'     => esc_attr__('Footer Menu', 'presentup'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'presentup'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'tm-skincolor',
		'title'     => esc_attr__('Skin Color', 'presentup'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'presentup'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'presentup'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'presentup').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'tm-dropcap',
		'title'     => esc_attr__('Dropcap', 'presentup'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'presentup'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'presentup'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/inc/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/inc/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/inc/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/inc/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'presentup'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'presentup'),
									'skincolor'     => esc_attr__('Skin Color', 'presentup'),
									'grey' 			=> esc_attr__('Grey', 'presentup'),
									'dark' 		    => esc_attr__('Dark', 'presentup'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'presentup'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'presentup'),
									'white' 	    => esc_attr__('White', 'presentup'),
									'grey' 			=> esc_attr__('Grey', 'presentup'),
									'dark' 		    => esc_attr__('Dark', 'presentup'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'presentup'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'presentup').'</div>', 
			),

      ),
    ),
	
	
 
  ),
);



CSFramework_Shortcode_Manager::instance( $options );
