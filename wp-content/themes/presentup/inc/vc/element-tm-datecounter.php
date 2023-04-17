<?php

/**
 *  ThemetechMount: Date Counter Box
 */


	$params = array_merge(
		themetechmount_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Counter Date', 'presentup' ),
				'param_name'  => 'el_class',
				'param_name'  => 'counterdate',
				'description' => esc_attr__( 'You can enter the counter days. Example: 2019-10-25 18:30:00', 'presentup' ),
				"value"		  => "",
				'group'       => esc_attr__( 'Content', 'presentup' ),
			),
			array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Counter Box Alignment', 'presentup' ),
			'param_name' => 'box_align',
			'description' => esc_attr__( 'Select counter box alignment.', 'presentup' ),
			'value' => array(
				esc_attr__( 'Inline', 'presentup' ) => 'inline',
				esc_attr__( 'Left', 'presentup' ) => 'left',
				esc_attr__( 'Right', 'presentup' ) => 'right',
				esc_attr__( 'Center', 'presentup' ) => 'center'
				),
			'group'       => esc_attr__( 'Content', 'presentup' ),
			),
	
		)
	);
	

	
	global $tm_vc_custom_element_datecounterbox;
	$tm_vc_custom_element_datecounterbox = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'ThemetechMount Date Counter', 'presentup' ),
		'base'        => 'tm-datecounter',
		"class"    => "",
		"icon"        => "icon-themetechmount-vc",
		'category'    => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
		'params'      => $params,
	) );