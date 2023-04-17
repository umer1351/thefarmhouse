<?php

/**
 *  ThemetechMount: Static Content Box
 */


	$allParams =
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'presentup' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'presentup' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Box Image size', 'presentup' ),
				'param_name'  => 'boximg_size',
				'value'			=> 'full',
				'description' => esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full"). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'presentup' ),
				'group'       => esc_attr__( 'Content', 'presentup' ),
			),
			array(
			'type' => 'param_group',
			'heading' => esc_attr__( 'Box Content', 'presentup' ),
			'param_name' => 'box_content',
			'group'       => esc_attr__( 'Content', 'presentup' ),
			'description' => esc_attr__( 'Set box content', 'presentup' ),
			'params' => array(
				array(
						'type'        => 'attach_image',
						'heading'     => esc_attr__( 'Box Image', 'presentup' ),
						'param_name'  => 'static_boximage',
						'description' => esc_attr__( 'Select image', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Box Title', 'presentup' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Box Content', 'presentup' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
				),
				array(
						'type'        => 'vc_link',
						'heading'     => esc_attr__( 'Box URL (Link)', 'presentup' ),
						'param_name'  => 'static_boxlink',
						'description' => esc_attr__( 'Add link for box title and image', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
				),
				
			),
		),
			
	);
	
/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'tm-heading', '', '',
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = themetechmount_box_params();
$params    = array_merge( $heading_element, $allParams, $boxParams );

	
	global $tm_vc_custom_element_staticcontent_box;
	$tm_vc_custom_element_staticcontent_box = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Static Content Box', 'presentup' ),
		'base'        => 'tm-static-contentbox',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
		'params'      => $params,
	) );