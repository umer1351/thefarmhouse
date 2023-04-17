<?php

/* Options for ThemetechMount Blogbox */


$portfolioCatList = array();
if( taxonomy_exists('tm_portfolio_category') ){
	$portfolioCatList_data = get_terms( 'tm_portfolio_category', array( 'hide_empty' => false ) );
	$portfolioCatList      = array();
	foreach($portfolioCatList_data as $cat){
		$portfolioCatList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}


// Getting Options
$presentup_theme_options   = get_option('presentup_theme_options');
$pf_type_title          = ( !empty($presentup_theme_options['pf_type_title']) ) ? $presentup_theme_options['pf_type_title'] : 'Portfolio' ;
$pf_type_title_singular = ( !empty($presentup_theme_options['pf_type_title_singular']) ) ? $presentup_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$pf_cat_title           = ( !empty($presentup_theme_options['pf_cat_title']) ) ? $presentup_theme_options['pf_cat_title'] : 'Portfolio Categories' ;
$pf_cat_title_singular  = ( !empty($presentup_theme_options['pf_cat_title_singular']) ) ? $presentup_theme_options['pf_cat_title_singular'] : 'Portfolio Category' ;


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

/**
 * Box Design options
 */
$boxParams = themetechmount_box_params();


$allParams = array_merge(
		
		$heading_element,
		array( 
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Sortable Category Links",'presentup'),
				"description" => sprintf( esc_attr__("Show sortable category links above %s items so user can sort by just single click.",'presentup'), $pf_type_title_singular ),
				"param_name"  => "sortable",
				"value"       => array(
					esc_attr__('No','presentup')  => 'no',
					esc_attr__('Yes','presentup') => 'yes',
				),
				"std"         => "no",
				'dependency'  => array(
					'element'            => 'boxview',
					'value_not_equal_to' => array( 'carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Replace ALL word', 'presentup' ),
				'param_name'  => 'allword',
				'description' => esc_attr__( 'Replace ALL word in sortable category links. Default is ALL word.', 'presentup' ),
				"std"         => "All",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'yes' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_attr__( 'Sortable Button Type', 'presentup' ),
				'description' => esc_attr__( 'Sortable Button type square or round', 'presentup' ),
				'param_name'  => 'sortable_buttontype',
				"value"       => array(
					esc_attr__('Square','presentup')  => 'square',
					esc_attr__('Round','presentup') => 'round',
				),
				"std"         => "square",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'yes' ),
				),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show Pagination",'presentup'),
				"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'presentup'), $pf_type_title ),
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
				"type"        => "checkbox",
				"heading"     => sprintf( esc_attr__("From %s", "presentup"), $pf_cat_title_singular ),
				"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', "presentup"), $pf_type_title, $pf_cat_title ),
				
				"param_name"  => "category",
				"value"       => $portfolioCatList,
			),
			
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Order by",'presentup'),
				"description" => esc_attr__("Sort retrieved portfolio by parameter.",'presentup'),
				"param_name"  => "orderby",
				"value"       => array(
					esc_attr__('No order (none)','presentup')           => 'none',
					esc_attr__('Order by post id (ID)','presentup')     => 'ID',
					esc_attr__('Order by author (author)','presentup')  => 'author',
					esc_attr__('Order by title (title)','presentup')    => 'title',
					esc_attr__('Order by slug (name)','presentup')      => 'name',
					esc_attr__('Order by date (date)','presentup')      => 'date',
					esc_attr__('Order by last modified date (modified)','presentup') => 'modified',
					esc_attr__('Random order (rand)','presentup')       => 'rand',
					esc_attr__('Order by number of comments (comment_count)','presentup') => 'comment_count',
					
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "date",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Order",'presentup'),
				"description" => esc_attr__("Designates the ascending or descending order of the 'orderby' parameter.",'presentup'),
				"param_name"  => "order",
				"value"       => array(
					esc_attr__('Ascending (1, 2, 3; a, b, c)','presentup')  => 'ASC',
					esc_attr__('Descending (3, 2, 1; c, b, a)','presentup') => 'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "DESC",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Show",'presentup'),
				"description" => sprintf( esc_attr__("How many %s item you want to show.", "presentup"), $pf_type_title ),
				"param_name"  => "show",
				"value"       => array(
					esc_attr__("All", "presentup") => "-1",
					esc_attr__('1', "presentup")   => "1",
					esc_attr__('2', "presentup")   => "2",
					esc_attr__('3','presentup')    =>'3',
					esc_attr__('4','presentup')    =>'4',
					esc_attr__('5','presentup')    =>'5',
					esc_attr__('6','presentup')    =>'6',
					esc_attr__('7','presentup')    =>'7',
					esc_attr__('8','presentup')    =>'8',
					esc_attr__('9','presentup')    =>'9',
					esc_attr__('10','presentup')   =>'10',
					esc_attr__('11','presentup')   =>'11',
					esc_attr__('12','presentup')   =>'12',
					esc_attr__('13','presentup')   =>'13',
					esc_attr__('14','presentup')   =>'14',
					esc_attr__('15','presentup')   =>'15',
					esc_attr__('16','presentup')   =>'16',
					esc_attr__('17','presentup')   =>'17',
					esc_attr__('18','presentup')   =>'18',
					esc_attr__('19','presentup')   =>'19',
					esc_attr__('20','presentup')   =>'20',
					esc_attr__('21','presentup')   =>'21',
					esc_attr__('22','presentup')   =>'22',
					esc_attr__('23','presentup')   =>'23',
					esc_attr__('24','presentup')   =>'24',
				),
				"std"  => "3",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_attr__("Box Design",'presentup'),
				"description" => esc_attr__("Select box design.",'presentup'),
				"param_name"  => "view",
				"value"       => themetechmount_global_portfolio_template_list( true ),
				"std"         => "overlay",
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
			)
		),
		$boxParams,
		array(
			themetechmount_vc_ele_css_editor_option(),
		)
		
	);



$params = $allParams;


// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Work';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}



global $tm_sc_params_portfoliobox;
$tm_sc_params_portfoliobox = $params;




vc_map( array(
	"name"     => sprintf( esc_attr__("ThemetechMount %s Box",'presentup'), $pf_type_title_singular ),
	"base"     => "tm-portfoliobox",
	"class"    => "",
	'category' => esc_attr__( 'ThemetechMount Special Elements', 'presentup' ),
	"icon"     => "icon-themetechmount-vc",
	"params"   => $params,
) );