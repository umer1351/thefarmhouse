<?php

/******* Each Line (group) Options ********/

$group_params = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'presentup' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar. You can use STRONG tag to bold some texts.', 'presentup' ),
		'admin_label' => true,
	),
);

// Merging icon with other options
$param_group = array_merge( $group_params );

$params_boxstyle =  array(
	array(
		'type'			=> 'themetechmount_style_selector',
		'heading'		=> esc_attr__( 'Pricing Table Box Style', 'presentup' ),
		'description'	=> esc_attr__( 'Select Pricing Table box style.', 'presentup' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'table-style1',
		'value'			=> array(
					array(
						'label'	=> esc_attr('Team Member Box - Style 1','presentup'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/inc/images/table-style1.jpg',
					),
					),
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Featured Column', 'presentup' ),
		'param_name'		=> 'featured_col',
		//'std'				=> '',
		'value'				=> array(
			esc_attr__( 'None', 'presentup' )		=> '',
			esc_attr__( '1st Column', 'presentup' )	=> '1',
			esc_attr__( '2nd Column', 'presentup' )	=> '2',
			esc_attr__( '3rd Column', 'presentup' )	=> '3',
			esc_attr__( '4th Column', 'presentup' )	=> '4',
			esc_attr__( '5th Column', 'presentup' )	=> '5',
		),
		'description'		=> esc_attr__( 'Select whith column will be with featured style.', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),	
);



/*** Coumn Options ***/
$params_heading =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Heading', 'presentup' ),
		'param_name'	=> 'heading',
		'description'	=> esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'presentup' ),
		//'group'			=> esc_attr__( 'Content', 'presentup' ),
	)
);


// Main Icon picker
$main_icon = vc_map_integrate_shortcode( 'tm-icon', 'i_', esc_attr__( 'Content', 'presentup' ),
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	)
);



$params_price =  array(
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price', 'presentup' ),
		'param_name'		=> 'price',
		'std'				=> '100',
		'description'		=> esc_attr__( 'Enter Price.', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Currency symbol', 'presentup' ),
		'param_name'		=> 'cur_symbol',
		'std'				=> '$',
		'description'		=> esc_attr__( 'Enter currency symbol', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Currency Symbol position', 'presentup' ),
		'param_name'		=> 'cur_symbol_position',
		'std'				=> 'after',
		'value'				=> array(
			esc_attr__( 'Before price', 'presentup' )	=> 'before',
			esc_attr__( 'After price', 'presentup' )	=> 'after',
		),
		'description'		=> esc_attr__( 'Select currency position.', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price Frequency', 'presentup' ),
		'param_name'		=> 'price_frequency',
		'std'				=> esc_attr__( 'Monthly', 'presentup' ),
		'description'		=> esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
);

$params_btn = array(
	array(
		'type'       		=> 'textfield',
		'heading'    		=> esc_attr__( 'Button Text', 'presentup' ),
		'param_name' 		=> 'btn_title',
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'vc_link',
		'heading'			=> esc_attr__( 'Button URL (Link)', 'presentup' ),
		'param_name'		=> 'btn_link',
		'description'		=> esc_attr__( 'Add link to button.', 'presentup' ),
		'edit_field_class'	=> 'vc_col-sm-9 vc_column',
	),
);


$params_lines =  array(
	array(
		'type'			=> 'param_group',
		'heading'		=> esc_attr__( 'Each Line (Features)', 'presentup' ),
		'param_name'	=> 'values',
		'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'presentup' ),
		'value'			=> urlencode( json_encode( array(
			array(
				'label'		=> esc_attr__( 'This is label one', 'presentup' ),
				'value'		=> '90',
			),
			array(
				'label'		=> esc_attr__( 'This is label two', 'presentup' ),
				'value'		=> '80',
			),
			array(
				'label'		=> esc_attr__( 'This is label three', 'presentup' ),
				'value'		=> '70',
			),
		) ) ),
		'params'		=> $param_group,
	),
	
);



// CSS Animation
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Animation', 'presentup' );

// Extra Class
$extra_class = themetechmount_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Animation', 'presentup' );


$params_all = array_merge(
	//$params_boxstyle,
	$params_heading,
	$main_icon,
	$params_price,
	$params_btn,
	$params_lines
);



/**** Multiple Columns for pricing table ****/
$params = array();

for( $i=1; $i<=5; $i++ ){  // 3 column
	
	$tab_title = esc_attr__('First Column','presentup');
	switch( $i ){
		case 2:
			$tab_title = esc_attr__('Second Column','presentup');
			break;
		case 3:
			$tab_title = esc_attr__('Third Column','presentup');
			break;
		case 4:
			$tab_title = esc_attr__('Fourth Column','presentup');
			break;
		case 5:
			$tab_title = esc_attr__('Fifth Column','presentup');
			break;
	}
	
	foreach( $params_all as $param ){
		
		if( !empty($param['param_name']) ){
			$param['param_name'] = 'col'.$i.'_'.$param['param_name'];
		}
		$param['group']      = $tab_title;

		if( !empty($param['dependency']) && !empty($param['dependency']["element"]) ){
			$param['dependency']["element"] = 'col'.$i.'_'.$param['dependency']["element"];
		}
		
		$params[] = $param;
		
	}

} // for








$params = array_merge(
	$params_boxstyle,
	$params,
	array($css_animation),
	array($extra_class),
	array( themetechmount_vc_ele_css_editor_option() )
);



global $tm_sc_params_pricingtable;
$tm_sc_params_pricingtable = $params;


vc_map( array(
	'name'		=> esc_attr__( 'ThemetechMount Pricing Table', 'presentup' ),
	'base'		=> 'tm-pricing-table',
	'class'		=> '',
	'icon'		=> 'icon-themetechmount-vc',
	'category'	=> esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	'params'	=> $params
) );
