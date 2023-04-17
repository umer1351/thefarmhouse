<?php

/* Options for ThemetechMount Servicebox */
$bgcolor_custom = array();
$bgcolor_custom[__( 'Transparent', 'presentup' )] = 'transparent';
$bgcolor_custom[__( 'Skin color', 'presentup' )]  = 'skincolor';
$boxcolor =   array_merge( $bgcolor_custom , themetechmount_getVcShared( 'colors-dashed' ) ) ;

$params = array_merge(
	
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon position', 'presentup' ),
			'description' => esc_attr__( 'Icon position in the Service box.', 'presentup' ),
			'param_name'  => 'add_icon',
			'std'         => 'left-spacing',
			'value'       => array(
				esc_attr__( 'Before Heading', 'presentup' )           => 'before-heading',
				esc_attr__( 'Top Center', 'presentup' )               => 'top-center',
				esc_attr__( 'Top Left', 'presentup' )                 => 'top-left',
				esc_attr__( 'Left with spacing', 'presentup' )        => 'left-spacing',
				esc_attr__( 'Bottom Center', 'presentup' )            => 'bottom-center',
				esc_attr__( 'Top Right (RTL)', 'presentup' )          => 'top-right',
				esc_attr__( 'Right with spacing (RTL)', 'presentup' ) => 'right-spacing',
				esc_attr__( 'After Heading (RTL)', 'presentup' )      => 'after-heading',
			),
		),
	),
	
	themetechmount_vc_heading_params(),
	array(
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_attr__( 'Text', 'presentup' ),
			'param_name' => 'content',
			'value'      => esc_attr__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'presentup' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Background Color', 'presentup' ),
			'param_name' => 'bgcolor',
			'value'      => array( 'Transparent' => 'transparent' ) + themetechmount_getVcShared('pre-bg-colors'),
			'std'         => 'transparent',
			'description' => esc_attr__( 'Select Service Box display style.', 'presentup' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Text Color', 'presentup' ),
			'param_name' => 'textcolor',
			'value'      => array( esc_attr__('Default', 'presentup') => '' ) + themetechmount_getVcShared('pre-text-colors'),
			'std'         => '',
			'description' => esc_attr__( 'Select Service Box display style.', 'presentup' ),
		)
	),
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Add button', 'presentup' ) . '?',
			'description' => esc_attr__( 'Add button to Service Box.', 'presentup' ),
			'param_name'  => 'add_button',
			'value'       => array(
				esc_attr__( 'No', 'presentup' )  => '',
				esc_attr__( 'Yes', 'presentup' ) => 'bottom',
			),
			'std' 		  => '',
			
		),
	),
	vc_map_integrate_shortcode( 'tm-btn', 'btn_', esc_attr__( 'Button', 'presentup' ),
		array(
		'exclude' => array(
			'align',
			'button_block',
			'el_class',
			'css_animation',
			'css',
		),
	),
		array(
			'element' => 'add_button',
			'not_empty' => true,
		)
	),
	
	vc_map_integrate_shortcode( 'tm-icon', 'i_', esc_attr__( 'Icon', 'presentup' ),
		array(
			'exclude' => array( 'align', 'el_class', 'css_animation', 'link', 'css' ),
		)
	),
	
	array(
		
		array(
			"type"       => "dropdown",
			"heading"    => esc_attr__("Box Hover Effect",'presentup'),
			"param_name" => "hover",
			"value"      => array(
				esc_attr__('None','presentup')                   => 'none',
				esc_attr__('Float Shadow','presentup')           => 'hvr-float-shadow',
				esc_attr__('Grow','presentup')                   => 'hvr-grow',
				esc_attr__('Shrink','presentup')                 => 'hvr-shrink',
				esc_attr__('Pulse','presentup')                  => 'hvr-pulse',
				esc_attr__('Pulse Grow','presentup')             => 'hvr-pulse-grow',
				esc_attr__('Pulse Shrink','presentup')           => 'hvr-pulse-shrink',
				esc_attr__('Push','presentup')                   => 'hvr-push',
				esc_attr__('Pop','presentup')                    => 'hvr-pop',
				esc_attr__('Bounce In','presentup')              => 'hvr-bounce-in',
				esc_attr__('Bounce Out','presentup')             => 'hvr-bounce-out',
				esc_attr__('Rotate','presentup')                 => 'hvr-rotate',
				esc_attr__('Grow Rotate','presentup')            => 'hvr-grow-rotate',
				esc_attr__('Float','presentup')                  => 'hvr-float',
				esc_attr__('Sink','presentup')                   => 'hvr-sink',
				esc_attr__('Bob','presentup')                    => 'hvr-bob',
				esc_attr__('Hang','presentup')                   => 'hvr-hang',
				esc_attr__('Skew','presentup')                   => 'hvr-skew',
				esc_attr__('Skew Forward','presentup')           => 'hvr-skew-forward',
				esc_attr__('Wobble Horizontal','presentup')      => 'hvr-wobble-horizontal',
				esc_attr__('Wobble Vertical','presentup')        => 'hvr-wobble-vertical',
				esc_attr__('Wobble To Bottom Right','presentup') => 'hvr-wobble-to-bottom-right',
				esc_attr__('Wobble To Top Right','presentup')    => 'hvr-wobble-to-top-right',
				esc_attr__('Wobble Top','presentup')             => 'hvr-wobble-top',
				esc_attr__('Wobble Bottom','presentup')          => 'hvr-wobble-bottom',
				esc_attr__('Wobble Skew','presentup')            => 'hvr-wobble-skew',
				esc_attr__('Buzz','presentup')                   => 'hvr-buzz',
				esc_attr__('Buzz Out','presentup')               => 'hvr-buzz-out',
			),
			"description"      => esc_attr__("Select hover effect.",'presentup') . ' <a href="' . esc_url('http://ianlunn.github.io/Hover/') . '" target="_blank">' . esc_attr__("Click here to view sample animation of each.",'presentup') . '</a>',
			'std'              => 'none',
			'group'            => esc_attr__( 'Animations', 'presentup' ),
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_attr__("Box Hover Effect: For Background Image",'presentup'),
			"param_name" => "hover_bg_effect",
			"value"      => array(
				esc_attr__('None','presentup')                    => '',
				esc_attr__('Zoom-in image','presentup')           => 'zoomin',
				esc_attr__('Zoom-out image','presentup')          => 'zoomout',
			),
			"description" => esc_attr__("Select hover effect for background image only.",'presentup') . '<br>' . '<strong>' . esc_attr__("NOTE:",'presentup') . '</strong>' . esc_attr__("This will work with \"Top Center\", \"Top Left\" and \"Top Right\" icon position only.",'presentup'),
			'dependency'  => array(
				'element'   => 'add_icon',
				'value'     => array( 'top-center', 'top-left', 'top-right', 'bottom-center' ),
			),
			'std'              => '',
			'group'            => esc_attr__( 'Animations', 'presentup' ),
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_attr__( 'Rotate background on hover?', 'presentup' ),
			'param_name'       => 'hover_bg_rotate',
			'description'      => esc_attr__( 'Rotate background on hover?', 'presentup' ),
			"value"      => array(
				esc_attr__('No','presentup')  => 'no',
				esc_attr__('Yes','presentup') => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => array(
				'element'        => 'hover_bg_effect',
				//'value_not_equal_to' => ''
				'value'          => array('zoomin','zoomout'),
			),
			'group'            => esc_attr__( 'Animations', 'presentup' ),
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_attr__( 'Blur background on hover?', 'presentup' ),
			'param_name'       => 'hover_bg_blur',
			'description'      => esc_attr__( 'Blur background on hover?', 'presentup' ),
			"value"      => array(
				esc_attr__('No','presentup')  => 'no',
				esc_attr__('Yes','presentup') => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'dependency'  => array(
				'element'            => 'hover_bg_effect',
				'value'          => array('zoomin','zoomout'),
			),
			'group'            => esc_attr__( 'Animations', 'presentup' ),
		),
		
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_attr__("Box Hover Effect: Select content animation style",'presentup'),
			"param_name"	=> "box_effect",
			"value"			=> array(
				esc_attr__('None','presentup')                => '',
				esc_attr__('Animate from bottom','presentup') => 'one',
			),
			"description"	=> esc_attr__("Select hover effect for content only.",'presentup') . '<br>' . '<strong>' . esc_attr__("NOTE:",'presentup') . '</strong> ' . esc_attr__("This will work with \"Top Center\", \"Top Left\" and \"Top Right\" icon position only.",'presentup'),
			'std'			=> '',
			'group'			=> esc_attr__( 'Animations', 'presentup' ),
			'dependency'	=> array(
				'element'		=> 'add_icon',
				'value'			=> array('top-center','top-left','top-right', 'bottom-center'),
			),
		),
		
	),
	
	array(
		/// cta3
		vc_map_add_css_animation(),
		themetechmount_vc_ele_extra_class_option(),
		themetechmount_vc_ele_css_editor_option(),
	)
	
	
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'txt_align' ){ // Remove Text Alignment option
		$params[$i]['dependency'] = array(  // This is to hide this option forever
			'element'  => 'btn_style',
			'value'    => array( 'abcdefg' )
		);
		
	} else if( $param_name == 'btn_style' ){
		$style = $param['value'];
		if( is_array($style) ){
			$params[$i]['std']   = 'text';
		}
		
	} else if( $param_name == 'btn_color' ){
		$colors = $param['value'];
		if( is_array($colors) ){
			$params[$i]['std']   = 'skincolor';
		}
	
	} else if( $param_name == 'color' ){
		$colors = $param['value'];
		if( is_array($colors) ){
			$colors = array_reverse($colors);
			$colors[__( 'Skin color', 'presentup' )] = 'skincolor';
			$params[$i]['value'] = array_reverse($colors);
			$params[$i]['std']   = 'grey';
		}
	
	} else if( $param_name == 'btn_shape' ){
		$params[$i]['dependency'] = array(
			'element'            => 'btn_style',
			'value_not_equal_to' => array( 'text' )
		);
	} else if( $param_name == 'btn_title' ){
		$params[$i]['std'] = esc_attr__( 'Read More', 'presentup' );
	
	} else if( $param_name == 'btn_add_icon' ){
		$params[$i]['std']   = false;
	
	} else if( $param_name == 'i_background_style' ){
		$params[$i]['value'][__( 'None', 'presentup' )] = 'none';
		$params[$i]['std'] = 'none';
		
	} else if( $param_name == 'i_background_color' ){
		$params[$i]['value'][__( 'None', 'presentup' )] = 'none';
		$params[$i]['std'] = 'grey';
		$params[$i]['dependency'] = array(
			'element'               => 'i_background_style',
			'value_not_equal_to'    => array( 'none' )
		);
		
	} else if( $param_name == 'separator' ){
		$params[$i]['dependency'] = array(
			'element'  => 'i_type',
			'value'    => array( 'notavailablevalue' ),
		);
	
	
	} else if( $param_name == 'i_size' ){
		$params[$i]['std'] = 'md';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h2_google_fonts' ){
		$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
	
	} else if( $param_name == 'h4_google_fonts' ){
		$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
	
	} else if( $param_name == 'css_animation' ){
		$params[$i]['group'] = esc_attr__( 'Animations', 'presentup' );
	
	}
	
	$i++;
} // Foreach


global $tm_sc_params_servicebox;
$tm_sc_params_servicebox = $params;




vc_map( array(
	'name'        => esc_attr__( 'ThemetechMount Service Box', 'presentup' ),
	'base'        => 'tm-servicebox',
	"icon"        => "icon-themetechmount-vc",
	'category'    => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	'params'      => $params,
) );