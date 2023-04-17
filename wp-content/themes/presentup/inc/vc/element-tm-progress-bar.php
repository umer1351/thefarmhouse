<?php



// Icon picker
$icons_params = vc_map_integrate_shortcode( 'tm-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);

// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'presentup' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'presentup' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Value', 'presentup' ),
		'param_name' => 'value',
		'description' => esc_attr__( 'Enter value of bar.', 'presentup' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'presentup' ),
		'param_name' => 'color',
		'value' => array(
				esc_attr__( 'Default', 'presentup' ) => '',
			) + array(
				esc_attr__( 'Classic Grey', 'presentup' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'presentup' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'presentup' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'presentup' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'presentup' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'presentup' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'presentup' ) => 'bar_black',
			) + themetechmount_getVcShared( 'colors-dashed' ) /*+ array(
				esc_attr__( 'Custom Color', 'presentup' ) => 'custom',
			)*/,
		'description' => esc_attr__( 'Select single bar background color.', 'presentup' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	
	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Show Icon?', 'presentup' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_attr__( 'Yes', 'presentup' ) => 'true',
			esc_attr__( 'No', 'presentup' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_attr__( 'Want to show icon with the progress bar.', 'presentup' ),
	)
);



// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );






$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Widget title', 'presentup' ),
		'param_name' => 'title',
		'description' => esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'presentup' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Values', 'presentup' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'presentup' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_attr__( 'Development', 'presentup' ),
				'value' => '90',
			),
			array(
				'label' => esc_attr__( 'Design', 'presentup' ),
				'value' => '80',
			),
			array(
				'label' => esc_attr__( 'Marketing', 'presentup' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Units', 'presentup' ),
		'param_name' => 'units',
		'description' => esc_attr__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'presentup' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'presentup' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_attr__( 'Classic Grey', 'presentup' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'presentup' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'presentup' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'presentup' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'presentup' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'presentup' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'presentup' ) => 'bar_black',
			) + themetechmount_getVcShared( 'colors-dashed' ) /* + array(
				esc_attr__( 'Custom Color', 'presentup' ) => 'custom',
			)*/ ,
		'description' => esc_attr__( 'Select bar background color.', 'presentup' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Options', 'presentup' ),
		'param_name' => 'options',
		'value' => array(
			esc_attr__( 'Add stripes', 'presentup' ) => 'striped',
			esc_attr__( 'Add animation (Note: visible only with striped bar).', 'presentup' ) => 'animated',
		),
	),
);



$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( themetechmount_vc_ele_extra_class_option() ),
	array( themetechmount_vc_ele_css_editor_option() )
);
		


global $tm_sc_params_progressbar;
$tm_sc_params_progressbar = $params;


vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount Progress Bar', 'presentup' ),
	'base'		=> 'tm-progress-bar',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	'params'	=> $params
) );
