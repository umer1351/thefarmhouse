<?php
// [tm-stepbox]
if( !function_exists('themetechmount_sc_stepbox') ){
function themetechmount_sc_stepbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $tm_vc_custom_element_stepbox;
	$options_list = themetechmount_create_options_list($tm_vc_custom_element_stepbox);
	
	extract( shortcode_atts($options_list, $atts ) );

				
		// Starting wrapper of the whole arear
		$return .= themetechmount_box_wrapper( 'start', 'steps', get_defined_vars() );
		
		// Heading element
		$return .= themetechmount_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = themetechmount_get_query_args( 'contentbox', get_defined_vars() );
		
		
		// image size
		$tm_stps_style   = ( !empty($tm_stps_style) ) ? $tm_stps_style : '' ;

		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );
				
				$return .= '<div class="row multi-columns-row themetechmount-boxes-row-wrapper">';
				foreach( $static_boxes as $tm_box ){
					
					$staticbox_desc  = ( !empty($tm_box['static_boxcontent']) ) ? '<div class="tm-item-desc">'.$tm_box['static_boxcontent'].'</div>' : '' ;
					
					$tm_box['static_boxstyle']=( !empty($tm_box['tm_stps_style']) ) ? $tm_box['tm_stps_style'] : '';

					$tm_bicon= do_shortcode('[tm-icon type="' . $tm_box['i_type'] . '" icon_linecons="' . $tm_box['i_icon_linecons'] . '" icon_themify="' . $tm_box['i_icon_themify'] . '" icon_fontawesome="' . $tm_box['i_icon_fontawesome'] . '" icon_kw_presentup ="' . $tm_box['i_icon_kw_presentup'] . '" ]');
				
					$static_boxtitle  = ( !empty($tm_box['static_boxtitle']) ) ? '<h3 class="tm-custom-heading">'.$tm_box['static_boxtitle'].'</h3>' : '' ;
					

					$return .= themetechmount_column_div('start', $column );
					
					if ( $tm_stps_style == 'steps-style1') {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box '. $tm_stps_style .'">
							<div class="tm-static-box-content" >
								<div class="tm-box-iconbox"> 
									<div class="tm-process-icon">
									' . $tm_bicon . '		
							        </div>
								</div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'	
																			
									</div>
								</div>
						</div>
						';
					} else if($tm_stps_style == 'steps-style3') {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box steps-style1 '. $tm_stps_style .'">
							<div class="tm-stepbox-content" >
								<div class="tm-box-iconbox"> 
									<div class="tm-process-icon">
									' . $tm_bicon . '		
							        </div>
							    </div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'		
									</div>
								</div>
						</div>
						';
					}
					else {
						$return .= '
						<div class="tm-static-box-wrapper tm-steps-box '. $tm_stps_style .'">
							<div class="tm-step-box-content" >
								<div class="tm-box-iconbox"> 
									<div class="tm-process-icon">
									' . $tm_bicon . '		
							        </div>
							    </div>
									<div class="tm-steps-desc">
									'.$static_boxtitle.'
									'.$staticbox_desc.'		
									</div>
								</div>
						</div>
						';	
					}	
						
					$return .= themetechmount_column_div('end', $column );
				} // end foreach
				$return .= '</div>';
				
			} // end if
			
		$return .= themetechmount_box_wrapper( 'end', 'static', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
	
} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;	
	
}
}
add_shortcode( 'tm-stepbox', 'themetechmount_sc_stepbox' );