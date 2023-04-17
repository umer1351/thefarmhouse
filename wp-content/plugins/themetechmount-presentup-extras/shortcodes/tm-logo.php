<?php
// [tm-logo]
if( !function_exists('themetechmount_sc_logo') ){
function themetechmount_sc_logo( $atts, $content=NULL ){
	
	
	
	$presentup_theme_options = get_option('presentup_theme_options');
	
	if( !empty($presentup_theme_options['logotype']) ){
	
		$return = '<span class="tm-sc-logo tm-sc-logo-type-'.$presentup_theme_options['logotype'].'">';
		
		if( $presentup_theme_options['logotype']=='image' ){
			if( isset($presentup_theme_options['logoimg']) && is_array($presentup_theme_options['logoimg']) ){
				
				// standard logo
				if( isset($presentup_theme_options['logoimg']['full-url']) && trim($presentup_theme_options['logoimg']['full-url'])!='' ){
					$image = $presentup_theme_options['logoimg']['full-url'];
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$presentup_theme_options['logoimg']['full-url'].'">';
				
				} else if( isset($presentup_theme_options['logoimg']['thumb-url']) && trim($presentup_theme_options['logoimg']['thumb-url'])!='' ){
					$image = $presentup_theme_options['logoimg']['thumb-url'];
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$presentup_theme_options['logoimg']['thumb-url'].'">';

				} else if( isset($presentup_theme_options['logoimg']['id']) && trim($presentup_theme_options['logoimg']['id'])!='' ){
					$image   = wp_get_attachment_image_src( $presentup_theme_options['logoimg']['id'], 'full' );
					$return .= '<img class="themetechmount-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
					
					
				}
				
				
				// stikcy logo
				if( isset($presentup_theme_options['logoimg_sticky']) && is_array($presentup_theme_options['logoimg_sticky']) ){
					
					if( isset($presentup_theme_options['logoimg_sticky']['full-url']) && trim($presentup_theme_options['logoimg_sticky']['full-url'])!='' ){
						$sticky_image   = $presentup_theme_options['logoimg_sticky']['full-url'];
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$presentup_theme_options['logoimg_sticky']['full-url'].'">';
					
					} else if( isset($presentup_theme_options['logoimg_sticky']['thumb-url']) && trim($presentup_theme_options['logoimg_sticky']['thumb-url'])!='' ){
						$sticky_image   = $presentup_theme_options['logoimg_sticky']['thumb-url'];
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$presentup_theme_options['logoimg_sticky']['thumb-url'].'">';
					
					} else if( isset($presentup_theme_options['logoimg_sticky']['id']) && trim($presentup_theme_options['logoimg_sticky']['id'])!='' ){
						$sticky_image   = wp_get_attachment_image_src( $presentup_theme_options['logoimg_sticky']['id'], 'full' );
						$return .= '<img class="themetechmount-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$sticky_image[0].'" width="'.$sticky_image[1].'" height="'.$image[2].'">';
						
					}
					
				}
				
				
			}
		} else {
			if( !empty($presentup_theme_options['logotext']) ){
				$return = $presentup_theme_options['logotext'];
			}
		}
		
		$return .= '</span>';
		
	}
	
	return $return;
}
}
add_shortcode( 'tm-logo', 'themetechmount_sc_logo' );