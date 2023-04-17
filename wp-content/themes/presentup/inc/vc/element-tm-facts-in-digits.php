<?php

/* Options */



$allParams1 =  array(
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Header (optional)', 'presentup'),
		'param_name'	=> 'title',
		'std'			=> esc_attr__('Title Text', 'presentup'),
		'description'	=> esc_attr__('Enter text for the title. Leave blank if no title is needed.', 'presentup')
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"class"			=> "",
		"heading"		=> esc_attr__("Design", 'presentup'),
		"param_name"	=> "view",
		"description"	=> esc_attr__('Select box design.' , 'presentup'),
		'value' => array(
			esc_attr__( 'Top Center icon', 'presentup' )           => 'topicon',
			esc_attr__( 'Left icon', 'presentup' )                 => 'lefticon',
			esc_attr__( 'Right icon', 'presentup' )                => 'righticon',
			esc_attr__( 'Left icon with separator', 'presentup' )  => 'lefticon-border',
			esc_attr__( 'Right icon with separator', 'presentup' ) => 'righticon-border',
		),
		'std'           => 'topicon',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_attr__( 'Add icon?', 'presentup' ),
		'param_name' => 'add_icon',
		'std'        => 'true',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_attr__( 'Add border?', 'presentup' ),
		'param_name' => 'add_border',
		'std'        => 'true',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	

	
);


$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '', array(
	'include_only_regex' => '/^(type|icon_\w*)/',
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'add_icon',
	'value' => 'true',
) );

$icons_params_new = array();

/* Adding class for two column */
foreach( $icons_params as $param ){
	$param['edit_field_class'] = 'vc_col-sm-6 vc_column';
	$icons_params_new[] = $param;
}



$allParams2 = array(
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Rotating Number', 'presentup'),
				'param_name'		=> 'digit',
				'std'				=> '100',
				'description'		=> esc_attr__('Enter rotating number digit here.', 'presentup'),
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'heading'			=> esc_attr__('Text Before Number', 'presentup'),
				'param_name'		=> 'before',
				'description'		=> esc_attr__('Enter text which appear just before the rotating numbers.', 'presentup'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"heading"		=> esc_attr__("Text Style",'presentup'),
				"param_name"	=> "beforetextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'presentup') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','presentup') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','presentup'),
				'value' => array(
					esc_attr__( 'Superscript', 'presentup' ) => 'sup',
					esc_attr__( 'Subscript', 'presentup' )   => 'sub',
					esc_attr__( 'Normal', 'presentup' )      => 'span',
				),
				'std' => 'sup',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Text After Number', 'presentup'),
				'param_name'		=> 'after',
				'description'		=> esc_attr__('Enter text which appear just after the rotating numbers.', 'presentup'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> esc_attr__("Text Style",'presentup'),
				"param_name"	=> "aftertextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'presentup') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','presentup') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','presentup'),
				'value' => array(
					esc_attr__( 'Superscript', 'presentup' ) => 'sup',
					esc_attr__( 'Subscript', 'presentup' )   => 'sub',
					esc_attr__( 'Normal', 'presentup' )      => 'span',
				),
				'std' => 'sub',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class'			=> '',
				'heading'		=> esc_attr__('Rotating digit Interval', 'presentup'),
				'param_name'	=> 'interval',
				'std'			=> '5',
				'description'	=> esc_attr__('Enter rotating interval number here.', 'presentup')
			)
);



// merging all options
$params = array_merge( $allParams1, $icons_params_new, $allParams2 );

// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( themetechmount_vc_ele_extra_class_option() ),
	array( themetechmount_vc_ele_css_editor_option() )
);




global $tm_sc_params_facts_in_digits;
$tm_sc_params_facts_in_digits = $params;






vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount Facts in digits', 'presentup' ),
	'base'		=> 'tm-facts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	'params'	=> $params
) );

