<?php

/* Options for ThemetechMount Icon */


/*
 * Icon Element
 * @since 4.4
 */


/**
 *  Show selected icon library only
 */
global $presentup_theme_options;

// Temporary new list of icon libraries
$icon_library_array = array( // all icon library list array
	'themify'        => array( esc_attr__( 'Themify icons', 'presentup' ),   'themifyicon ti-thumb-up'),
	'linecons'       => array( esc_attr__( 'Linecons', 'presentup' ), 'vc_li vc_li-star'),
	'kw_presentup'   => array( esc_attr__( 'Special Icons', 'presentup' ), 'flaticon-honey'),
);


$icon_library = array();
if( isset($presentup_theme_options['icon_library']) && is_array($presentup_theme_options['icon_library']) && count($presentup_theme_options['icon_library'])>0 ){
	// if selected icon library
	foreach( $presentup_theme_options['icon_library'] as $i_library ){
		$icon_library[$i_library] = $icon_library_array[$i_library];
	}
}



$icon_element_array  = array();
$icon_dropdown_array = array( esc_attr__( 'Font Awesome', 'presentup' )    => 'fontawesome' );   // Font Awesome icons
$icon_dropdown_array[ esc_attr__( 'Special Icons', 'presentup' ) ] = 'kw_presentup'; // Special icons

if( is_array($icon_library) && count($icon_library)>0 ){
foreach( $icon_library as $library_id=>$library ){
	
	$icon_dropdown_array[$library[0]] = $library_id;
	
	$icon_element_array[]  = array(
		'type'        => 'themetechmount_iconpicker',
		'heading'     => esc_attr__( 'Icon', 'presentup' ),
		'param_name'  => 'icon_'.$library_id,
		'value'       => $library[1], // default value to backend editor admin_label
		'settings'    => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => $library_id,
		),
		'dependency'  => array(
			'element'   => 'type',
			'value'     => $library_id,
		),
		'description' => esc_attr__( 'Select icon from library.', 'presentup' ),
		'edit_field_class' => 'vc_col-sm-9 vc_column',
	);
	
	
}
}
/* Select icon library code end here */




// All icon related elements
$icon_elements = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon library', 'presentup' ),
			'value'       => $icon_dropdown_array,
			'std'         => '',
			'admin_label' => true,
			'param_name'  => 'type',
			'description' => esc_attr__( 'Select icon library.', 'presentup' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		)
	),
	array(
		array(  // Font Awesome icons
			'type'       => 'themetechmount_iconpicker',
			'heading'    => esc_attr__( 'Icon', 'presentup' ),
			'param_name' => 'icon_fontawesome',
			'value'      => 'fa fa-thumbs-o-up', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'fontawesome',
			),
			'dependency' => array(
				'element'  => 'type',
				'value'    => 'fontawesome',
			),
			'description' => esc_attr__( 'Select icon from library.', 'presentup' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
	),
	
	array(
		array(  // Presentup special icons
			'type'       => 'themetechmount_iconpicker',
			'heading'    => esc_attr__( 'Icon', 'presentup' ),
			'param_name' => 'icon_kw_presentup',
			'value'      => 'flaticon-honey', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'kw_presentup',
			),
			'dependency' => array(
				'element'  => 'type',
				'value'    => 'kw_presentup',
			),
			'description' => esc_attr__( 'Select icon from library.', 'presentup' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		)
	),
	
	$icon_element_array
	
	
);


$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Icon color', 'presentup' ),
		'param_name'  => 'color',
		'value'       => array_merge( 
			themetechmount_getVcShared( 'colors' ),
			array(
				esc_attr__( 'Classic Grey', 'presentup' )      => 'bar_grey',
				esc_attr__( 'Classic Blue', 'presentup' )      => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'presentup' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'presentup' )     => 'bar_green',
				esc_attr__( 'Classic Orange', 'presentup' )    => 'bar_orange',
				esc_attr__( 'Classic Red', 'presentup' )       => 'bar_red',
				esc_attr__( 'Classic Black', 'presentup' )     => 'bar_black',
			),
			array( esc_attr__( 'Custom color', 'presentup' ) => 'custom' )
		),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'presentup' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom color', 'presentup' ),
		'param_name'  => 'custom_color',
		'description' => esc_attr__( 'Select custom icon color.', 'presentup' ),
		'dependency'  => array(
			'element'   => 'color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background shape', 'presentup' ),
		'param_name'  => 'background_style',
		'value'       => array(
			esc_attr__( 'None', 'presentup' ) => '',
			esc_attr__( 'Circle', 'presentup' ) => 'rounded',
			esc_attr__( 'Square', 'presentup' ) => 'boxed',
			esc_attr__( 'Rounded', 'presentup' ) => 'rounded-less',
			esc_attr__( 'Outline Circle', 'presentup' ) => 'rounded-outline',
			esc_attr__( 'Outline Square', 'presentup' ) => 'boxed-outline',
			esc_attr__( 'Outline Rounded', 'presentup' ) => 'rounded-less-outline',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select background shape and style for icon.', 'presentup' ),
		'param_holder_class' => 'tm-simplify-textarea',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background color', 'presentup' ),
		'param_name'  => 'background_color',
		'value'       => array_merge( array( esc_attr__( 'Transparent', 'presentup' ) => 'transparent' ), themetechmount_getVcShared( 'colors' ), array( esc_attr__( 'Custom color', 'presentup' ) => 'custom' ) ),
		'std'         => 'grey',
		'description' => esc_attr__( 'Select background color for icon.', 'presentup' ),
		'param_holder_class' => 'tm_vc_colored-dropdown',
		'dependency'  => array(
			'element'   => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom background color', 'presentup' ),
		'param_name'  => 'custom_background_color',
		'description' => esc_attr__( 'Select custom icon background color.', 'presentup' ),
		'dependency'  => array(
			'element'   => 'background_color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Size', 'presentup' ),
		'param_name'  => 'size',
		'value'       => array_merge( themetechmount_getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std'         => 'md',
		'description' => esc_attr__( 'Icon size.', 'presentup' )
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Icon alignment', 'presentup' ),
		'param_name' => 'align',
		'value'      => array(
			esc_attr__( 'Left', 'presentup' )   => 'left',
			esc_attr__( 'Right', 'presentup' )  => 'right',
			esc_attr__( 'Center', 'presentup' ) => 'center',
		),
		'std'         => 'left',
		'description' => esc_attr__( 'Select icon alignment.', 'presentup' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'presentup' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to icon.', 'presentup' )
	),
	vc_map_add_css_animation(),
	themetechmount_vc_ele_extra_class_option(),
	themetechmount_vc_ele_css_editor_option(),
);


// All params
$params = array_merge( $icon_elements, $allparams );

	
	
global $tm_sc_params_icon;
$tm_sc_params_icon = $params;

	
	

vc_map( array(
	'name'     => esc_attr__( 'ThemetechMount Icon', 'presentup' ),
	'base'     => 'tm-icon',
	'icon'     => 'icon-themetechmount-vc',
	'category' => array( esc_attr__( 'ThemetechMount Special Elements', 'presentup' ) ),
	'admin_enqueue_css' => array(get_template_directory_uri().'/assets/themify-icons/themify-icons.css', get_template_directory_uri().'/assets/twemoji-awesome/twemoji-awesome.css' ),
	'params'   => $params,
	'js_view'  => 'VcIconElementView_Backend',
) );
