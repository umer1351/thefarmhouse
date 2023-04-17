<?php

/**
 *  ThemetechMount: Step Box
 */

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	)
);

	$param_group = array(
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Box Title', 'presentup' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
						'dependency' => array(
							'element' => 'tm_stps_style',
							'value' => array( 'steps-style1' ),
							),
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Box Content', 'presentup' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'presentup' ),
						'group'       => esc_attr__( 'Content', 'presentup' ),
						'admin_label' => true,
				),
				
			);
// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );	

	$params =
		array(
			array(
				'type'			=> 'themetechmount_style_selector',
				'heading'		=> esc_attr__( 'Steps Box Style', 'presentup' ),
				'description'	=> esc_attr__( 'Select Menu Table box style.', 'presentup' ),
				'param_name'	=> 'tm_stps_style',				
				'value'			=> array(
								array(
									'label'	=> esc_attr('Steps Style 1','presentup'),
									'value'	=> 'steps-style1',
									'thumb'	=> get_template_directory_uri() . '/inc/images/steps-view-style1.png',
								),														
							),
				'std'			=> 'steps-style1',
				'group'			=> esc_attr__( 'Boxes Appearance', 'presentup' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'presentup' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'presentup' ),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_attr__( 'Steps Item Content', 'presentup' ),
				'param_name' => 'box_content',
				'group'       => esc_attr__( 'Content', 'presentup' ),
				'description' => esc_attr__( 'Set Steps Item content', 'presentup' ),
				'params' => $param_group,
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
$params    = array_merge( $heading_element, $params, $boxParams );

	
	global $tm_vc_custom_element_stepbox;
	$tm_vc_custom_element_stepbox = $params;

	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Steps Box', 'presentup	' ),
		'base'        => 'tm-stepbox',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
		'params'      => $params,
	) );