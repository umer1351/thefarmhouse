<?php

/* Options for ThemetechMount Custom Heading element */

$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Text source', 'presentup' ),
		'param_name'  => 'source',
		'value'       => array(
			esc_attr__( 'Custom text', 'presentup' )        => '',
			esc_attr__( 'Post or Page Title', 'presentup' ) => 'post_title'
		),
		'std'         => '',
		'description' => esc_attr__( 'Select text source.', 'presentup' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_attr__( 'Text', 'presentup' ),
		'param_name'  => 'text',
		'admin_label' => true,
		'value'       => esc_attr__( 'This is custom heading element', 'presentup' ),
		'description' => esc_attr__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'presentup' ),
		'dependency'  => array(
			'element'   => 'source',
			'is_empty'  => true,
		),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'presentup' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to custom heading.', 'presentup' ),
		// compatible with btn2 and converted from href{btn1}
	),
	array(
		'type'       => 'font_container',
		'param_name' => 'font_container',
		'value'      => 'tag:h2|text_align:left',
		'settings'   => array(
			'fields'   => array(
				'tag'                     => 'h2', // default value h2
				'text_align',
				'font_size',
				'line_height',
				'color',
				'tag_description'         => esc_attr__( 'Select element tag.', 'presentup' ),
				'text_align_description'  => esc_attr__( 'Select text alignment.', 'presentup' ),
				'font_size_description'   => esc_attr__( 'Enter font size.', 'presentup' ),
				'line_height_description' => esc_attr__( 'Enter line height.', 'presentup' ),
				'color_description'       => esc_attr__( 'Select heading color.', 'presentup' ),
			),
		),
		'std'        => 'tag:h2',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Use theme default font family?', 'presentup' ),
		'param_name'  => 'use_theme_fonts',
		//'value'       => array( esc_attr__( 'Yes', 'presentup' ) => 'yes' ),
		'value'       => array(
			esc_attr__( 'Yes, use default fonts', 'presentup' )               => 'yes',
			esc_attr__( 'No, use custom fonts (select below)', 'presentup' )  => 'no'
		),
		'std'         => array( esc_attr__( 'Yes', 'presentup' ) => 'yes' ),
		'description' => esc_attr__( 'Use font family from the theme.', 'presentup' ),
		'std'         => 'yes',
	),
	
	
	array(
		'type'       => 'google_fonts',
		'param_name' => 'google_fonts',
		'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'std'        => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'settings'   => array(
			'fields'   => array(
				'font_family_description' => esc_attr__( 'Select font family.', 'presentup' ),
				'font_style_description'  => esc_attr__( 'Select font styling.', 'presentup' )
			)
		),
		'dependency' => array(
			'element'            => 'use_theme_fonts',
			'value_not_equal_to' => 'yes',
		),
	)
	
);

$params = array_merge(
	$allparams,
	array(
		vc_map_add_css_animation(),
		themetechmount_vc_ele_extra_class_option(),
		themetechmount_vc_ele_css_editor_option(),
	)
);


global $tm_sc_params_custom_heading;
$tm_sc_params_custom_heading = $params;


vc_map( array(
	'name'     => esc_attr__( 'ThemetechMount Custom Heading', 'presentup' ),
	'base'     => 'tm-custom-heading',
	'icon'     => 'icon-themetechmount-vc',
	'show_settings_on_create' => true,
	'category' => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	'params'   => $params
) );
