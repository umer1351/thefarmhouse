<?php

/* Options */

$allParams = array(
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Pagination",'presentup'),
		"description" => esc_attr__("Show pagination links below Event boxes.",'presentup'),
		"param_name"  => "pagination",
		"value"       => array(
			esc_attr__('No','presentup')  => 'no',
			esc_attr__('Yes','presentup') => 'yes',
		),
		"std"         => "no",
		'dependency'  => array(
			'element'    => 'sortable',
			'value_not_equal_to' => array( 'yes' ),
		),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Events Item",'presentup'),
		"description" => esc_attr__("How many events you want to show.",'presentup'),
		"param_name"  => "show",
		"value"       => array(
			esc_attr__('All','presentup') => '-1',
			esc_attr__('1','presentup')  => '1',
			esc_attr__('2','presentup') => '2',
			esc_attr__('3','presentup')=>'3',
			esc_attr__('4','presentup')=>'4',
			esc_attr__('5','presentup')=>'5',
			esc_attr__('6','presentup')=>'6',
			esc_attr__('7','presentup')=>'7',
			esc_attr__('8','presentup')=>'8',
			esc_attr__('9','presentup')=>'9',
			esc_attr__('10','presentup')=>'10',
			esc_attr__('11','presentup')=>'11',
			esc_attr__('12','presentup')=>'12',
			esc_attr__('13','presentup')=>'13',
			esc_attr__('14','presentup')=>'14',
			esc_attr__('15','presentup')=>'15',
			esc_attr__('16','presentup')=>'16',
			esc_attr__('17','presentup')=>'17',
			esc_attr__('18','presentup')=>'18',
			esc_attr__('19','presentup')=>'19',
			esc_attr__('20','presentup')=>'20',
			esc_attr__('21','presentup')=>'21',
			esc_attr__('22','presentup')=>'22',
			esc_attr__('23','presentup')=>'23',
			esc_attr__('24','presentup')=>'24',
		),
		"std"  => "3",
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Style", "presentup"),
		"description" => esc_attr__("Select box style.", "presentup"),
		"group"       => esc_attr__( "Box Design", "presentup" ),
		"param_name"  => "view",
		"value"       => array(
			esc_attr__("Default Style", "presentup")  => "top-image",
			esc_attr__("Detailed Style", "presentup") => "top-image-details",
		),
		"std"         => "default",
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Spacing", "presentup"),
		"param_name"  => "box_spacing",
		"description" => esc_attr__("Spacing between each box.", "presentup"),
		"value"       => array(
			esc_attr__("Default", "presentup")                        => "",
			esc_attr__("0 pixel spacing (joint boxes)", "presentup")  => "0px",
			esc_attr__("5 pixel spacing", "presentup")                => "5px",
			esc_attr__("10 pixel spacing", "presentup")               => "10px",
		),
		"std"  => "",
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


// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Latest Events';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	}
	$i++;
}


global $tm_sc_params_eventsbox;
$tm_sc_params_eventsbox = $params;


vc_map( array(
	"name"     => esc_attr__("ThemetechMount Events Box", "presentup"),
	"base"     => "tm-eventsbox",
	"icon"     => "icon-themetechmount-vc",
	'category' => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	"params"   => $params
) );

