<?php


/******************* Helper Functions ************************/

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
	function cs_encode_string( $string ) {
		return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
	}
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}



/*************** Demo Content Settings *******************/
function themetechmount_action_rss2_head(){
	// Get theme configuration
	$sidebars = get_option('sidebars_widgets');
	// Get Widgests configuration
	$sidebars_config = array();
	foreach ($sidebars as $sidebar => $widget) {
		if ($widget && is_array($widget)) {
			foreach ($widget as $name) {
				$name = preg_replace('/-\d+$/','',$name);
				$sidebars_config[$name] = get_option('widget_'.$name);
			}
		}
	}
	
	// Get Menus
	$locations = get_nav_menu_locations();
	$menus     = wp_get_nav_menus();
	$menuList  = array();
	foreach( $locations as $location => $menuid ){
		if( $menuid!=0 && $menuid!='' && $menuid!=false ){
			if( is_array($menus) && count($menus)>0 ){
				foreach( $menus as $menu ){
					if( $menu->term_id == $menuid ){
						$menuList[$location] = $menu->name;
					}
				}
			}
		}
	}
	
	$config = array(
			'page_for_posts'   => get_the_title( get_option('page_for_posts') ),
			'show_on_front'    => get_option('show_on_front'),
			'page_on_front'    => get_the_title( get_option('page_on_front') ),
			'posts_per_page'   => get_option('posts_per_page'),
			'sidebars_widgets' => $sidebars,
			'sidebars_config'  => $sidebars_config,
			'menu_list'        => $menuList,
		);            
	if ( defined('THEMETECHMOUNT_THEME_DEVELOPMENT') ) {
		echo sprintf('<wp:theme_custom>%s</wp:theme_custom>', base64_encode(serialize($config)));
	}
}

if ( defined('THEMETECHMOUNT_THEME_DEVELOPMENT') ) {
	add_action('rss2_head', 'themetechmount_action_rss2_head');
}

/**********************************************************/




if( !class_exists( 'themetechmount_presentup_one_click_demo_setup' ) ) {
	

	class themetechmount_presentup_one_click_demo_setup{
		
		
		function __construct(){
			add_action( 'wp_ajax_presentup_install_demo_data', array( &$this , 'ajax_install_demo_data' ) );
		}
		
		
		/**
		 * Decide if the given meta key maps to information we will want to import
		 *
		 * @param string $key The meta key to check
		 * @return string|bool The key if we do want to import, false if not
		 */
		function is_valid_meta_key( $key ) {
			// skip attachment metadata since we'll regenerate it from scratch
			// skip _edit_lock as not relevant for import
			if ( in_array( $key, array( '_wp_attached_file', '_wp_attachment_metadata', '_edit_lock' ) ) )
				return false;
			return $key;
		}
		
		
		
		
		/**
		 * Added to http_request_timeout filter to force timeout at 60 seconds during import
		 * @return int 60
		 */
		function bump_request_timeout() {
			return 600;
		}
		
		
		
		/**
		 * Map old author logins to local user IDs based on decisions made
		 * in import options form. Can map to an existing user, create a new user
		 * or falls back to the current user in case of error with either of the previous
		 */
		function get_author_mapping() {
			
			if ( ! isset( $_POST['imported_authors'] ) )
				return;

			$create_users = $this->allow_create_users();

			foreach ( (array) $_POST['imported_authors'] as $i => $old_login ) {
				// Multisite adds strtolower to sanitize_user. Need to sanitize here to stop breakage in process_posts.
				$santized_old_login = sanitize_user( $old_login, true );
				$old_id = isset( $this->authors[$old_login]['author_id'] ) ? intval($this->authors[$old_login]['author_id']) : false;

				if ( ! empty( $_POST['user_map'][$i] ) ) {
					$user = get_userdata( intval($_POST['user_map'][$i]) );
					if ( isset( $user->ID ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user->ID;
						$this->author_mapping[$santized_old_login] = $user->ID;
					}
				} else if ( $create_users ) {
					if ( ! empty($_POST['user_new'][$i]) ) {
						$user_id = wp_create_user( $_POST['user_new'][$i], wp_generate_password() );
					} else if ( $this->version != '1.0' ) {
						$user_data = array(
							'user_login' => $old_login,
							'user_pass' => wp_generate_password(),
							'user_email' => isset( $this->authors[$old_login]['author_email'] ) ? $this->authors[$old_login]['author_email'] : '',
							'display_name' => $this->authors[$old_login]['author_display_name'],
							'first_name' => isset( $this->authors[$old_login]['author_first_name'] ) ? $this->authors[$old_login]['author_first_name'] : '',
							'last_name' => isset( $this->authors[$old_login]['author_last_name'] ) ? $this->authors[$old_login]['author_last_name'] : '',
						);
						$user_id = wp_insert_user( $user_data );
					}

					if ( ! is_wp_error( $user_id ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user_id;
						$this->author_mapping[$santized_old_login] = $user_id;
					} else {
						printf( __( 'Failed to create new user for %s. Their posts will be attributed to the current user.', 'presentup-demosetup' ), esc_html($this->authors[$old_login]['author_display_name']) );
						if ( defined('IMPORT_DEBUG') && IMPORT_DEBUG )
							echo ' ' . $user_id->get_error_message();
						echo '<br />';
					}
				}

				// failsafe: if the user_id was invalid, default to the current user
				if ( ! isset( $this->author_mapping[$santized_old_login] ) ) {
					if ( $old_id )
						$this->processed_authors[$old_id] = (int) get_current_user_id();
					$this->author_mapping[$santized_old_login] = (int) get_current_user_id();
				}
			}
		}
		
		
		
		/**
		 * Install demo data
		 **/
		function ajax_install_demo_data() {
		
			// Maximum execution time
			@ini_set('max_execution_time', 60000);
			@set_time_limit(60000);

			define('WP_LOAD_IMPORTERS', true);
			include_once( PRESENTUP_TMDC_DIR .'one-click-demo/wordpress-importer/wordpress-importer.php' );
			$included_files = get_included_files();


			$WP_Import = new themetechmount_WP_Import;
			
			$WP_Import->fetch_attachments = true;
			
			// Getting layout type
			$layout_type = 'default';

			$filename = 'demo.xml';
			if( !empty($_POST['layout_type']) && $_POST['layout_type']=='rtl' ){
				$filename = 'rtl-demo.xml';
			}
			
			$WP_Import->import_start( PRESENTUP_TMDC_DIR .'one-click-demo/'.$filename );
			
			
			$_POST     = stripslashes_deep( $_POST );
			$subaction = $_POST['subaction'];
			if( !empty($_POST['layout_type']) ){
				$layout_type = $_POST['layout_type'];
				$layout_type = strtolower($layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
			}
			$data      = isset( $_POST['data'] ) ? unserialize( base64_decode( $_POST['data'] ) ) : array();
			$answer    = array();
			echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
			
			
			switch( $subaction ) {
				
				case( 'start' ):
				
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_cat';
					$answer['message']        = __('Inserting Categories...', 'presentup-demosetup');
					$answer['data']           = '';
					$answer['layout_type']	  = $layout_type;
				
					die( json_encode( $answer ) );
				
				break;
				
				
				case( 'install_demo_cat' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_categories();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_tags';
					$answer['message']        = __('All Categories were inserted successfully. Inserting Tags...', 'presentup-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				case( 'install_demo_tags' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_tags();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_terms';
					$answer['message']        = __('All Tags were inserted successfully. Inserting Terms...', 'presentup-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				case( 'install_demo_terms' ):
					
					wp_suspend_cache_invalidation( true );
					ob_start();
					$WP_Import->process_terms();
					ob_end_clean();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_posts';
					$answer['message']        = __('All Terms were inserted successfully. Inserting Posts...', 'presentup-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				
				case( 'install_demo_posts' ):
					//wp_suspend_cache_invalidation( true );
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					ob_start();
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					$WP_Import->process_posts();
					ob_end_clean();
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_images';
					$answer['message']        = __('All Posts were inserted successfully. Importing images...', 'presentup-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					$answer['missing_menu_items']   = base64_encode( serialize( $WP_Import->missing_menu_items ) );
					$answer['processed_terms']      = base64_encode( serialize( $WP_Import->processed_terms ) );
					$answer['processed_posts']      = base64_encode( serialize( $WP_Import->processed_posts ) );
					$answer['processed_menu_items'] = base64_encode( serialize( $WP_Import->processed_menu_items ) );
					$answer['menu_item_orphans']    = base64_encode( serialize( $WP_Import->menu_item_orphans ) );
					$answer['url_remap']            = base64_encode( serialize( $WP_Import->url_remap ) );
					$answer['featured_images']      = base64_encode( serialize( $WP_Import->featured_images ) );
					
					die( json_encode( $answer ) );
				break;
				
				
				
				case( 'install_demo_images' ):
					$WP_Import->missing_menu_items   = unserialize( base64_decode( $_POST['missing_menu_items'] ) );
					$WP_Import->processed_terms      = unserialize( base64_decode( $_POST['processed_terms'] ) );
					$WP_Import->processed_posts      = unserialize( base64_decode( $_POST['processed_posts'] ) );
					$WP_Import->processed_menu_items = unserialize( base64_decode( $_POST['processed_menu_items'] ) );
					$WP_Import->menu_item_orphans    = unserialize( base64_decode( $_POST['menu_item_orphans'] ) );
					$WP_Import->url_remap            = unserialize( base64_decode( $_POST['url_remap'] ) );
					$WP_Import->featured_images      = unserialize( base64_decode( $_POST['featured_images'] ) );
					
					
					ob_start();
					$WP_Import->backfill_parents();
					$WP_Import->backfill_attachment_urls();
					$WP_Import->remap_featured_images();
					$WP_Import->import_end();
					ob_end_clean();
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_slider';
					$answer['message']        = __('All Images were inserted successfully. Inserting demo sliders...', 'presentup-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				
				
				
				case( 'install_demo_slider' ):
					
					$json_message		= __('RevSlider plugin not found. Setting the widgets and options...', 'presentup-demosetup');
					
					if ( class_exists( 'RevSlider' ) ){
						$json_message	= __('All demo sliders inserted successfully. Setting the widgets and options...', 'presentup-demosetup');
						
						// List of slider backup ZIP that we will import
						$slider_array	= array(
							PRESENTUP_TMDC_DIR . 'sliders/presentup-overlay-mainslider.zip',
							PRESENTUP_TMDC_DIR . 'sliders/presentup-elegant-mainslider.zip',
							PRESENTUP_TMDC_DIR . 'sliders/presentup-classic-mainslider.zip',
							PRESENTUP_TMDC_DIR . 'sliders/presentup-shop-mainslider.zip',
							PRESENTUP_TMDC_DIR . 'sliders/home-classic-2slider.zip',
						);
						
						$slider			= new RevSlider();
						foreach($slider_array as $filepath){
							if( file_exists($filepath) ){
								$result = $slider->importSliderFromPost(true,true,$filepath);  
							}
						}

					}
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_settings';
					$answer['message']        = $json_message;
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
					
				break;
				
				
				
				
				
				case( 'install_demo_settings' ):
					
					
					/**** Breacrumb NavXT related changes ****/
					$breadcrumb_navxt_settings						= array();
					$breadcrumb_navxt_settings['hseparator']		= '<span class="tm-bread-sep"> &nbsp; &#047; &nbsp;</span> ';  // General > Breadcrumb Separator
					$breadcrumb_navxt_settings['Hhome_template']	= '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to %title%." href="%link%" class="%type%"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home<span class="hide">%htitle%</span></a></span>';  // General > Home Template
					$breadcrumb_navxt_settings['Hhome_template_no_anchor']	= '<span property="itemListElement" typeof="ListItem"><span property="name">%htitle%</span><meta property="position" content="%position%"></span>';  // General > Home Template
					
					// Getting existing settings
					$bcn_options    = get_option('bcn_options');
					if( !empty($bcn_options) && is_array($bcn_options) ){
						// options already exists... so merging changes with existing options
						$breadcrumb_navxt_settings = array_merge($bcn_options, $breadcrumb_navxt_settings);
					}
					update_option( 'bcn_options', $breadcrumb_navxt_settings );
					
					/**** Finish Breadcrumb NavXT changes ****/
					
					
					
					/**** START CodeStart theme options import ****/
					
					$theme_options = array();
					
					$theme_options['classic']	= 'eNrdPGtz3DaS313l_4CblLeiijhcIjmcpyXdah1nN1V5eG2n9q6uXFxTGBIzg4gkGIKUrHX8368bD77mIcmWbGkjKxqCjUZ3o9HobjSGzvzBcPZBzqaznjznaShikfeey9l41vtmuRxEwyE-jWa9mF6JssCHYNa75BHDj95k1luWcTzHhjmLWcLSQvae05k3-8Bnru66ZjRigPUjdFwwvKtYLGg8X9DwfJWLMo0QfoxEDGc9ntCVQu3OeoYO1cSjRiPgzFnGaNFoA0oyIXnBRdpo9eAvLQoarpGyxgtgQvJ_N0eCwdvcT_FHUw0D8jRl-WNcIhpmNBYoeJ6smshcJ3U7kDgPS1mIpAngwxQxYBbmaClwfIoUfVAcLGnC4ysEA_S_Ziwlb2gqVbfBrIfSKTOnBvKhy1u6Fgk9JH8HnBfwV0IHR8LwS0P0Bc051XyOUUarMqaKIQ_4Ldj7wily6LMUeZNMGB-pc6xAgGpP6arnAYM8Zc6a8dW6MO_8kcUYs6JguSMzGvJUSQY6uNuEOfFcJ-F0ZGVC49hBUrWGK6R61gJNiZnjlRCrmGm1cRUl506FFYiOaH6-FhcsryajgnAavAPSb1xcV5GF2tdcMKo6I4ljtqDuQEEB9WtvjmsN2KpmbvqJEweEncG0xIfkHyy-YAUPr5k6wDIy9N5y2gJ397QFw9tPmz8BszXZPzMoLP8xCmuwR8cD9_6ENXiUwtqjWYN71KzgMQrL36NZg3vUrOGjFJb7dYQ1eozC2rsv35OwfO127pcUyOAV-LXgjcZ3KKjPc2KCyW5hDe_PZsly8TU1a7xPs2DYMstYHlLJdkhtuGc9Dj9Bxdhy6S0H16pYCG_AH_zyXCL7TEd5tGdBfoKODccjb7TYLy1PRY0rVjwqM-_fbUThjwfL4fWCWpRFIdJKUKMHqFX7-d7NHRBq0gTzghfY-gX5-4wtbHwtW8sFzZ1mNA9jR2xJy7iwLCDIfLGaVzox0fHgKmdXNobTMHeUZlwwTlLh1M-fnm9QmmwCz65W2yD0Y4MDFG7NXCe0Xq55oaXpt0BU-mHewhdFA_hPUTY2sGuaRjHL5zxEyilQ9kHBxnyR0_zK9CzWLOFLLcpp9VKtI3rJpEiYjaeXlCypQ_NcXFxcOpG4TOs4W3fB5Q5DSRukX4TQRNT_nUW5WMTMzpft0RnbPFwivaTgDgi2VALyB1s4moexkOyz-QrafJXZnXLluxtcXBmym_Ou2dk6794GiOW7A2hxmf0CQMskndcJSFxcxvNRpUuxoAXYH1xcfouc0fNM8NQmKj1fr3d_ugvQqRNgDXi0wnItLueFyBZoDhczz4hGt7SWcTd5imQ1wDoqjlOYAxXfuof-IDgcDA_d_nRyYPXddNyzgIIOUAc_CtrgXCfwzx8O4W_fHx5YdTCdY7YsFAatDtDruIxJGFMpTxDGQe-GhkXv9Djmp8fcvtI6ltAMfvNzMAmnx0f81HdH5A1M0Jr8DAYX9OPsAnSeHZIfgCwe0eMjQPL0yTZU2VqkTGM5lkUu0tXpC3DJj4_MA5mR7zzyrRcMDkgwHDnjyXSs0B0flfFpR245btEVW2BHbscWSy9YLDLmCE0QsRS9TCiPZ6RcIuqYknXOllwnPWwvxIynS_FX9p4mWcz6oUjwt3fabT0-oqc16f9XJM6iwKUEO-FJ729CnJOXF2iDiSyusEnxQeSaZvAg_yhpznpEzfSJUQhCo0gtKVwwzkt45vPiCqGb1gEa1aprtFmGQ0BZOEpqPYJpxpNemcezZ_7gzz__7L1DEqUIYZd18KV81xb3nhUXbIHZsdgQHYqgu65AV-sOyqpWUPs3SM_F-K8oMjk7OspyJkGmZdZH88UKBvsc9CxwPuqXTkQLenSp1QNajhSwrAGOFHZ5ZGlwFqv-79nqTjZidA5CGIXlZCEKy_BnbMu4zI0NUD991zvQhropxbaNaUkbjUgF95gjw2BPrDP8BBd-qf7b6w0q1bey-5qB9cM6Trmt5NBsRGFeJouHKTlcXJ8hzXhBYyO0bUIMdgvRm9yLEFEElRAvOLvcEowMW6vb0gQdBzovjs5eQ_6wdVi7ZByhsX1fJrtNNh7_NbBs84W6dsq4KS1FWOPhco3HSC8VlhMaXcwLBAzBhOeh3Sxe0IKtRH5FzvJwzS-YnJGNHgVd2R4BHlWuOsDorlfAYLEL5SzwJWeRJfMVtEpStxPYlFhuxpo0ulNwjkRuhwMBnqmGLnkDe2DenhjPHVbHfPp1U-zdXDCrAbLL-0S_0P66B3a6YC_B1RHPLYaHcuB9650OPT_YuzOId0C685tIxDvU_8AfHx1Yw2E6NlDtjnHU2fpKoANmXlWSsq-MYwpjvrKehXnG13ss3VDZsEQ8mP3B35dFHH9CcszFn72mbaylpCoaKKyKD2qwltap2BushANerHoe3ptcJ4ik9DPNlCmE-aKjmrhb6U1C389bMzByraJIUITzq7mtwtEGHA18y8zMNZjpPXatJWn13m1zptsgb77QlKboma0IueEE15alOQGq9aNmoSOgNqeB27G6koGJXlcbHYpAtcx5mun8A-J8C0uc_EvkEXm7BvfjJfru_b41SLoHLiGb5axtnWdHUiGe3Qv0_hE6a6AwttNYw1YBrcHit9_M6QJso04y7YRZQGB72YWp1Vww38ybxhnmN68UysUKqCVsdWB1bEYGo3ZFPghPxYksv-AhW4j3ZO2f9F7-fPbjT3U8alNJNhY1z1wn3aQSw4AaodDUQNCb9Mg6OOl1I2lsndfxqo7Cnw3OcNXBn2f-D_APOz0L3EY3FdTu5Ki41OYVN6QtHL04--mnWwfYOruxwc933mBAIFwwJt4EXCKcd1avNkla50yLeTDdLub0Asy5IP_4XCfxA_IDXxZrXCKL_uGtCW1kdMgGuT8JSc7SFYuZPCS_vTnbJkTF6YamBpWGmXze_tRwQxspuHwdozbcprR7Mur-eBP0Ohd04B3Yrm2Tdt1gg2Bnj26KzjVjev4U7ODwcDSCgccHZitEgyWZsK7R2lvDNIk0rg4JNN5dqRe0XCcJW1GEctBnylW5pjH8_kb3HVkZBKQ8ReAHd2R3s9hrdMend9cfpfvVftsU3Q4s6G9bsDkNC_Qt0aLVehLoxLLOZO4C3nKCUkeJqN1RLjI85HiQM7lcJ_-wL3T-hOkbRqPheLR_-oy0ds9IK77FOdkOvn9Opo1uX-ioTy0YnWEsRHYXp36WH6P1Vsm0zZMsozktKi2u7LFXm6ZqP7DnwI9BXCdHX7yUCUW2RVvm3sOrQK-c7h0k-4-P5MHjIzl4fCQPHx_Jo8dH8vjxkTx5fCRPHzDJ_o6txH3ANLvmitlSiKKTgcJ9WG3c4GwY3NWNtBpcXFX3bj0kdu8tSadHv6cjYv3nLnw4f4I_leu75LksrOQ2ym7Q_fGrSp4m6HVzMt2E3zUpd-bv3vWJOorLZfhT13E1edqT1cBEAtZdRTtFCxCDufqp0q6tDtcIGNfIRod7l7Bv8oO31Mcta71KDHvuof7n9v3pQXUk3OZtf_5Iz_YtBLfR4Quq5j7JYRUcf6_PGa-_-NlUzaDL1B6J4VK2Spld6eIpLAzT4S1QfhzxC1tcIgW2MKPplYMpvx4Wc22-m2Puqnd6zJMVkXl4cjMD27CoZYa3U-WR73qTI8-tjzsIjYsTQ6wahOjo66QXBD1ydHp8BNTsICpiMuydnhUEFrYgTEjCCkJDCNNpUqoHjhE7EREXJOKrlEvJE1wwi8qQI8QfJVwni5imEcxcIpckyymTJSOhyPMyKzi8R2CUMFPo_iipJImImSw4lRVp6m9VuNiVe5Vt99yRSfU2K6-ePnlhQclfsNdzgkJcIlUlmuoBE4tnIO96p9WjCrDfYelZn5zFMVEoJMEJyS9YVJ1agFR5el1CYjq9z5Mtnt7pnnmfSQ_Mwy6AZL26Yp7wohnpDzz92hzszFU1KchFlb6nZbKoz-LQZ1GYsMQhARWaN06JX0Mb-RkazbMCbFR1GPw29YCvF-K92WJMssMe1Pj1e4tB3VGG9e7UbtGkhmqzhlUInmvLXCKwGmKuFRSYo0i1PeoCybzBFmthmnJcMDWhgFKqLKRvyp1ZShcxi6ozP5hkXS1hZvysekDbSQtLuSnx4ExaaWgBG114oZ-kmi9M1nNZjaOGDjCBry0hfPzefMT6GboyjW_pCvt_1Pv4Blwn2B3TRrR75rEBCShxHVd5-G0wwFoLZtuIWjBNMG9cXM9YS7we8tjhe2hEvktS-0W8RTT7ZmubfD8a76lF8XYxuh2orgi777vi646yKTqsNc9EXixFzMU8y8XvLCxguygoj2UziJk24XDxVKe3A1Xnao16DaQWfM5i4CxqUlRDmJf1ukEj_Fo3kleaFrmJ2HazS3iqCKgXMGrWJnRtELD2yx4qbseMpBtbVn23QLa0YlHXCMxlBfyOD3tO721cMNWcNVYXzloX7i6udaBDTp19Vx5G5saDs-eWg6qdc5TB0MpLO1n_jxxm8iYs46pSfVj-n8G2f2O2TeHdXCewrb8Po76k8hD4HtyIbzTCL2ADx0Mg8j3PYe2K_4iJNztfx7A1N_7Kuk1aYNe6BgO3Bc_TVczwws18UaQbdTP-dA-wNumtlFO2hN1gp41EV0hDbLeLNYaGLZxWlamMJnNwjXLamlZp_IqmUZzuhK45BGm_Oeex3nBQiLt63IXaXDCXLMmKq7u98eYrNVqAm7DUtfg3s583kQ7iPotcIggWJPkRA89PF5LnzXrdS3M3uVwn2KiM-VpSMxfOkemmXpubZkqvHR30myirPt3UPXboeQNnV9PRorE8F3ngBvMFX92hZKdWsqqSTzri2kuYdmXvkKSqZ3diAXxA7OdkWDPxcQsLjcAKmsjL169_fW2NdAWYsIiXSQWL5W1v1xj1g5BJQq_ImoKNXzCWQogPATQROYlYDPFv1Fwnf2NEljmDgJOEaxaekytR5kRmLAZ2Vn1LbTVYu9wQrUv1Csf7mjedgAZcJ1OK9YDT2NVtx1Y9e99edwpsMWaKqRl7_QE7Ha8Hp7-IYg2zQpYo3-MjaDnOTt-IPL86JIuyIKl5D3EJTGZk5lLhI0B7XCL75FXMYOmSXCK_XCJ0RXlKLjkW4IGmk4gvlwxTjeScXV2KPJL946Ps1K47ySNmrxV06y1b781Ut95P6_fKECZMZxSUzGwCD6ObLVBz1KesA4tLpabI7LOtqxZ4QrABgTFX5ew10QU1sFXx5rWNBv2XQqhgNA832WwwsFiggsoNkMZA7MLGsC0I5Ew7I2jBZBUeV_GLygUokozPoiss5ylNrE-7pFhxKc4r4tuQ1gEBvfqm2uOuQ4t7NmiLXQQ3wOrfXDAr7loxD89vjHRwMwlgPzCM6TVo9bmdWXqXoaMrIR29d9T5rsakO_XWZANOvwMBgXlUhoWTASa7HCqHzFfjaI_QwU3M6UbdQRPCvNw26mA7XFyZFq1oGG8dolwiFTnQxEXDV8Wkn9oqMO9K4O9veBeIvGhcMFtPoY1hXSSxXrF-O-Vepg5W_Wk7bLf2Tpa73P5aJYAxU_5uW2pcXLJMxfF13nzt2XfmwmLv9Ldfvn_5mrz49Zc3b1__9uLtj7_-AkbSU8BBhai64NgD0wm7jrKYZrdcJwVK4xL2TJhLBubyTQGfizJl0X8BqqBKireS40FXPNduguN72wRbhHzp5PSOM6CbluX5XTmGUoIjqL-7dTqArn_lCZpyUubxt5UE0VuTfV2CRjMuleSg63_rmrsTLMn7DkvyIIJzD-GXHwbwIcAPI_gwwg9j-Fwwv7x38Pzpk4WIrj48fZLRCPVkRlxcaAOHesVT_fkjefqkb7TokPRrlfpcMC9UDZ4eekZ6jYLAQ7Kv7K-D9oNBhDKckZGbvQeARhEftA2hDXq0q_dmxFOgTXL1Z-Nvz54-QWSk3Ui8ieqmxry0I7jYu4vfV4BqEmfEVARCA1HUN0TRYsAfbDIwcFuY9NeXPr8JQy0qU8zDxlZ82wwQzopV5RmhCwmmtGBqpCUgGLrP4DMo9YwEQ_zonKN9q2ssZ0R9RPv6P986XDB-UDf8r27AXon49-36EOwkbz2OuG2PW4KTjyBHPIwLlTlG6XWUJdAzF3GZxRS0nKdqYhcQ0JzjRFjPOVuqKx31hoPXCFvOmt8BUpkSe8OvC-01oGVcXK4MTLYFBgPEalSMlipEpH1CYJJkFXyLXDDc-DY6VgGk6WYp8ZrpJKfpZ6pwD_3ZtjCQ1LfQTH5Wbq5spWt2iATHbfRpRs1tuajqAWh1ak9bfZcKAip_ukGHxfl3bJfWE--Ctulwm31aTOouFR2uoaNy4vEWAU9VJGz8qwHuTStlKVCH6suSQ_UlbMW6c9VDfUd3467xxLXXMMNcXG9N0HjF9DkaTksLu6N9_i1D4Nc3TLaOMNo7wrg7gtogbzXAcHpTFhravmMEfwcLwe4R1MUoO0JLbbaPEYy2cxHs4wKvi-FdrioPU2UfO4l0rtSimVwiNOfX9p5Cwy1ofL-befv75suqK9p1ddmpc2zXeIt7vyxoXnS-hLwDwtKoc3dRlyPsIXG6wcDceFK1O6b9mw5j4OTpr0A3Oa-FEpmnT8p12kWqAhn9Ymq-j6oFXFxdjdVlHLYdg-TNk3ETJEkLhXHCjkx5F7QxTSbMbeXDBh0Xr6IDr93h9yZELIEg3XxPpchqmI__D4cRDw4';
					$theme_options['elegant']	= 'eNrdPGtz2ziS31OV_4DTVLbGNaZMUtQztm-9mczuVM0jm2Rq7-oqpYJISMKYXCI5BGjHm8l_v248-BIl24md2DuOx1wi2Gh0NxqN7kZDdOYPhrMPYjad9cQ5T8I0TvPeczEbz3rfLJeDaDjEp9GsF9OrtJD4EMx6lzxi-NGbzHrLXCKO59gwZzHbsESK3nM682Yf-MzVXdeMRgywfoQOgHcVpwsazxc0PF_laZFECD9GXCKGsx7f0JVC7c56hg7VxKNaI-DMWcaorLUBJVkquORpUmv14C-VkoZrpKz2ApgQ_N_1kWDwJvdT_NFUw4A8SVj-mIiGGY1TFDzfrOrIXCdVO5A4Dwsh000dwIcpYsAszNEyxfEpUvRBcbCkGx5fIRig_zVjCXlDE6G6DWY9lE6RORWQD13e0nW6oYfk74DzAv4K6OAIGH5piL6gOaeazzHKaFXEVDHkAb-SvZeOzKHPMs3rZML4SJ1jBQJUe0pXPQ8Y5Alz1oyv1tK880cWY8ykZLkjMhryREkGOrhdwpz4k3A6sjKhcewgqVrDFVI9a4GmxMzxKk1XMdNq4ypKzp0SKxAd0fx8nV6wvJyMEsKp8Q5Iv3FdRRZqXw2o7IwkjtmCugMFBdSvvTmuNWCrnLnpXCdOHBB2BtMSH5J_sPiCSR5eM3WAZWToveW0Be7uaQuGt582fwJma7J_ZlBY_mMU1mCPjgfu_Qlr8CiFtUezBveoWcFjFJa_R7MG96hZw0cpLPfrCGv0GIW1d1--XCdh-drt3C8pkMEr8GvBG43vUFCf58QEk93CGt6fzRLF4mtq1nifZsGwRZaxPKSC7ZDacM96HH6CirHl0lsOrlWxEN6AP_jlRfaZjvJoz4L8BB0bjkfeaLFfWp6KGldMPioz799tROGPB8vh9YJaFFKmSSmo0QPUqv187-YOCDVpgrnkElu_IH-fsYWNr2VruaC5U4_mYeyILWkRS8sCgswXq3mpExMdD65ydmVjOA1zR2kG4CRJner50_MNSpNN4NnWahuEfqxxgMKt-ITWyzWXWpp-A0SlH-YNfFE0gP8UZWMDu6ZJFLN8zkOknAJlHxRszBc5za9MT7lmG77UopyWL9U6opdMpBtm4-klJUvq0DxPL50ovUyqOFt3weUOQwkbpF-E0ETU_51FsVjEzM6X7dEa2zxcIr1EcgcEWygB-YMOjuZhnAr22XwFTb6K7E658t0trgzZ9XnX7HTOu7cFYvluAVpcXGa_XDDQYpPMqwQkLuP5qNSlOKUS7A8uv0XO6HmW8sQmKj1fr3d_ugvQqRJgNXi0wmKdXs5lmi3QHC5mnhGNbmks43byFMmqgbVUHKcwByq-dQ_9QXA4GB66_enkwOq76bhnAQUtoBZ-FLTBT-CfPxzC374_PLDqYDrHbCkVBj0y6MNxEZMwpkKcIIyD3g0NZe_0OOanx9y-0jq2oRn85udgEk6Pj_ip747IG5igNfkZDC7ox9kF6Dw7JD9cMFk8osdHiKQDUbZOE6ZxHAuZp8nq9AU45MdH5mFGvvPIt14wOCDBcOSMXCfTscZ1VMSnLaHluD-XPIERuR1PLLlgcZoxXCfV9BBL0MsN5fGMlDQdU7LO2fKkh-0ynfFkmf6VvaebLGb9MN3gb--03Xp8RE8r0v9PbpyFxHUE2-BJ729pek5eXqABJkJeYZPig4g1zeBB_FHQnPWImuYTow2ERpFaT1wwnBfwzOfyCqHrpgEa1ZKrtVmGQ0ApHSW1HsEc40mvyOPZM3_w559_9t4hiVwiDWGLdfCleNcU957lFnTA7FhpiA5F0F5UoKhVB2VSS6j9u6PnYvBcJ2UmZkdHWc4EyLTI-mi7mGSwyUFPifNRvXRcIirp0aVWD2g5UsCiAjhS2MWRpcFZrPq_Z6s72YXRMwhhFJaTRSotw5-xXCfjGjcGQP30Xe9AW-m6FJsGpiFttCAl3GMOC4M9gc7wE_z3pfpvryuoVN_K7mtG1Q_rLOW2kkOzEYV5sVk8TMnh-gxpxiWNjdC6hBjsFqI3uRchoghKIV5wdtkRiQwbq9vSBB0HI9d6ejX5w9Zh7ZLxgsb2fbHZbbLx7K-GpcsRatsp46M0FGGNXCfLFR4jvSS1nNDoYi4RMAQTnod2s3hBJVul-RU5y8M1v2BiRrZ6SLqyPQI8p1xctYDRVy-BwWJL5SzwJWeRJfMVtApStRPYlFhuxprUulPwjNLcDgcCPFMNbfIG9rS8OTGeOyzP-PTrutjb0VUNZJfriU6h_XUP7HTBXoKrI55bDA_ltPvWOx16frB3ZxDsgHTnN5GId6j_gTM-OrCGw3Ssodod4KiD9VWKDph5VUrKvjKOKYz5ynoW5hlf77F0Q2XDNumD2R_8fSnE8VwnZMZcXPzZa9rGWkqqnIHCqvigBmtonQq8wUo44MWq5-G9eYJISj_TTJkqmC86qgm6ld5s6Pt510EBKIpcMEU4v5rbEhxtwNHAN8zMXFyDmd5j11qSRu_dNmfaBXnzhaY0Rc9sScgNXCe4siz1CVCtHzULLQE1OTVcJ-aV1RUMTPS63OhQBKplzpNMXCcfEOdbWOLkX2kekbdrcD9eou_e71uDpHvgErIpzsrWeXYkFeJZuej9I3QW6XsHzVxcTK-a0GVIa_D4zTdzuoBuOse0E2YBoe1lG6ZSBHwzr5tnmOG8VCkXC6CWsNmB3bEJGQzb1WYG4lORXCLLL3jIgAmy9k96L38--_GnKlwitZkkG42a55N2TolhSI1QaGwg7N30yDo46bVjaWydVxGrjsOfDc5w3cGfZ_4P8A87PQvcWjcV1u7kSF5qA4tbUgdHL85--unWIbZOb2zx8503GBAIgYk3gRjnndWsbZLWOdNiHky7xZxcXIBBT8k__kn8gPzAl3JNhOwf3prQWkKHbJH7UyrIWbJiMROH5Lc3Z11CVJxuaWpQaphJ5-3PDNe0kYLT1zRro2GX0u5JqPvjbdDrnNCBd2C7No3adYMNgp092hk614zp-VOwhMPD0QgGHh-YzRBNlmCpdY7W3hqmKU3i8oxA492VfEHvcsNWFKGUOclVtaYx_f5W9x15GQSkPEHgB3did7Poa3THh3fXn6T75Y5bF90OLOhxW7A5DSV6l2jRKj0JdF5Z5zJ3AXccoFRxXCJqd5SnGZ5xPMiZ3JOB2Bc8f8L0udQNXbZ_-oy0ds9II8LFOekG3z9cJ9Naty900qcWjM4xyjS7i0M_y4_Reqtk2uYJltGcylKLS3vsVaap3A_sMfBj0MnRF69kQpF1aMvce3gF6KXbvYNk__GRPHh8JAePj-Th4yN59PhIHj8-klwnj4_k6QMm2d-xlbgPmGbX3DBbpqls5aBwH1YbNzgbBnd5Ia0CV8W9ncfE7r2l6fTo93RIrP_chQ_nT_CndH2XPBfSSm6r6gbdH78s5KmDXjdcJ9Nt-F2Tcmf-7l2fqasIguFPVcZV52lPVgMTCVh2Fe0ULUAM5uqnTLw2OlxcI2BcXCNbHe5dwr7JD95SHzvWepka9txD_c_t-9OD8lC4ydv-_JGe7VsIbqvDF1TNfZLDXCI4_l6fNF5_77OumkGbqT0Sw6VslTK70uVTWBemw1ssCYv4hS2SAluY0eTKwZRf7_Tpk453c8xd9U6P-WZFRB6e3MzA1ixqkeHlVHHku97kyHOrAw9CY3liiFWDEB19nfSCoEeOTo-PgJodREVMhL3TM0lgYaeEpYIwSWgIYTrdFOqBY8RO0oinJOKrhAvBN1wwFhUhR4g_Ck4WMU1cIphFLkiWUyYKRsI0z4tMcniPwChhptD9UVBBNmnMhORUlKSpv2XdYlvuZbbdc0cm1VuvvXr65IUFJX_BXs8JComUtWiqB0wsnoK8652WjyrAfofFZ31yFsdEoRAEXCckv2BReW4BUuXJdQmJ6fQ-z7Z4cqd75n0mPTAPu1wwkvXqivmGy3qkP_D0a3O0M1fFpCAXVfmeFJtFdRqHPovChEUOG1Chee2c-DW0kZ-h0TwrwFpdh8FvUw_4epG-N1uMSXbYgxq_em8xqCvKsN6dyi2aVFBN1rAOwXNtYQTWQ8y1ggJzFKm2h10gmTfYYi1MXQ6gJhRQCpWF9E21M0voXCJmUXnqB5Os6yXMjJ-VD2g7qbSUm1wiD86ElYYWsNGFF_pJqPnCZD0X5Thq6FwwE_jS5gS_Nx-xgoauTONbusL-H_U-vsUJdse0EW2feWxBAkpcXMdlHr4LBlhrwHSNqAVTB_PG1Yw1xOshjy2-h0bkuyS1X8Qdotk3W13y_Wi8pwbF3WJ0W1BtEbbft8XXHmVbdFhqnqW5XFymMU_nWZ7-zkIJ24WkPBb1IGZah8PFU57fDlSlqzXqFZBa8DmLgbOoTlEFYV5W6waN8GvdSF5pWsQ2YtvNLuGpXCKgWsCoWdvQlUHA6i97qNiNGUk3tqz8aoFsacWibhGYuwr4FR_2pN7bAqo4q60unLU23F3c6kCHnDr7bjyMzIUHZ88lB1U95yiDoZWXtrL-HznM5E1YxlWl-rD8P4Nt_8Zsm9K7T2Bbfx1GdUflIfA9uBHfaIRfwAaOh0Dke57D2k3_Iybe7Hwtw1bf-EvrNmmAXesaDNwGPE9WMcP7NvOFTLYqZ_zpHmBt0hspp2wJu8FOG4mukIbotosVhpotnJa1qYxu5uAa5bQxrcL4FXWjON0JXXEI0n5zzmO94aAQd_W4C7UBLtkmk1d3e-HNV2q0XDA3Yamr8W9mP29cIh3EfRZFECwI8iMGnp8uJM-b9dp35m5yTbBWGfO1pGbumyPTdb02F82UXjs66DdRVnW6qXvs0PMazramo0VjeZ7mgRvMF3x1h5KdWsmqWj7hpNfewbQre4ckVUW7E6fAB8R-ToY1Ex87WKgFVtBEXr5-_etra6RLwA2LeLEpYbG87e0ao34QMtnQK7KmYOMXjCUQ4kNcME3SnEQshvg36pO_MVwiipxBwEnCNQvPyVVa5ERkLAZ2Vn1LbTlYs-AQrUv5Csf7mnedgAZcJ1OK9YDT2OVlx0ZFe99eeApsOWaCqRl7AQI7Ha8Hp7-kcg2zQpYo3-MjaDnOTt-keX51SBaFJIl5D3EJTGZk5lLhI0D7RvTJq5jB0iUyv1widEV5Qi45FuCBppOIL5cMU43knF1dpnkk-sdH2aldd4JHzF4saNdbNt6bqW68n1bvlSHcMJ1RUDKzCTyMbjqg5qhPWQsWl0pFkdlnG5ct8IRgCwJjrtLZq6MLKmCr4vWLGzX6L9NUBaN5uM1mjYHFAhVUbIHUBmIXNoZtQCBn2hlBCybK8LiMX1QuQJFkfBZdYTlP6Mb6tEuKFZfpeUl8E9I6IKBX35R73HVocc8GbbGL4AZY_RtgxV0r5uH5jZEObiYB7AeGMbkGrT63M0vvMnR0JaSj944q31WbdKfammzA6bcgIDCPilA6GWCyy6F0yHw1jvYIHdzEnHbUHdQhzMuuUQfdcEVcIhvRMN47REWSOdDE05qvikk_tVVg3pXA39_wNhB5UQO2nkITw1puYr1i_WbKvUgcrPrTdthu7a0sd9H9WiWAMVP-ris1Llim4vgqb7727DtzZbF3-tsv3798TV78-subt69_e_H2x19_ASPpKeCgRFReceyB6YRdR1lMs9sTidK4hD0T5pKBuXwj4bMsEhb9F6AKyqR4IzketMVz7SY4vrdNsEHIl05O7zgDumlZnt-WYygEOIL6q1unA-j6V75BU06KPP62lCB6a6KvS9BoxoWSHHT9b11zd4Iled9hSR5EcO4h_PLDXDA-BPhhBB9G-GEMH-CX9w6eP32ySKOrD0-fZDRCPZkRF9rAoV7xRH_-SJ4-6RstOiT9SqU-wAtVg6eHnpFerSDwkOwr-2uh_WAQoQxnZORm7wGgVsQHbUNogx7N6r0Z8RRonVxc_dn427OnTxAZaTYSb6K6qTEv7Qgu9m7j9xWgmsQZMRWB0EAU9TVRNBjwB9sMDNwGJv3tpc9vwlCDygTzsLEVX5cBwlmxqjwjdCHAlEqmRloCgqH7DD6DUs9IMMSPzjnat6rGckbUR7Sv__OtA-AHVcP_6gbstUn_fbs-BDuJW4-T3rbHLcHJR5AjHsaFyhyj9FrKEuiZi7jIYgpazhM1sQsIaM5xXCKs55wt1ZWOasPBi4QNZ81vAalMib3j14b2atBcIi5WBibrgMFcMLEcFaOlEhFpnhCYJFkJ3yBcMDe-rY5lXDBpullKvHo6yan7mSrcQ3-2KQwk9S00k5-Vmysa6ZodXCLBcWt96lFzUy6qelwwWp3K01ZfpYKAyp-u0WFx_h3bhfXE26BNOtx6nwaTuktJh2voKJ14vEXAExUJG_9qgHvTSlkK1KHquuRQfQebXFy3rnqor-iu3TaeuPZcImaY660JGq-YPkfDaWlgd7TP3zEEfoHDpHOE0d4Rxu0R1AZ5qwGG05uyUNP2HSP4O1gIdo-gLkbZERpq0z1GMOrmXCLYxwVeF8O7XFxlHqbMPrYS6VxcqUU9RWjOr-09hZpbUPt6N_P29-2XZVe06-qyU-vYrvYW934haS5b30HeAmFJ1Lq7qMsR9pA43WJgbjypyh3T_k2LMXDy9Degm5zXQonM01wn5TrtXCJUgYx-MTVfR9VcMC4vx-oyDtuOQfL2ybgJkoSFwjhhR6a8DVqbJhPmNvJhg5aLV9KB1-7wmxNcIraBIN18TWWaVTAf_x9OLQ_p';
					$theme_options['overlay']	= 'eNrdPGtz3DaS313l_4CblLeiijhcIjmcpyXdah1nN1V5eG2n9q6uXFxTGBIzg4gkGIKUrHX8368bD77mIcmWbGkjK5oBG0C_0OhuNEhn_mA4-yBn01lPnvM0FLHIe8_lbDzrfbNcXA6i4RC_jWa9mF6JssAvwax3ySOGH73JrLcs43iODXMWs4Slhew9pzNv9oHPXFzddc1oxGDUj9ABxl3FYkHj-YKG56tcXJRphPBjRGI46_GErtTQ7qxn8FBNPGo0wpg5yxgtGm2ASSYkL7hIG60e_KVFQcM1YtZ4XDBESP7v5kwweZv6Kf5orGFCnqYsf0xIg0RjgYznyao5-KRuBxTnYSkLkTQBfBARA2JBRkuB81PE6IOiYEkTHl8hGAz_a8ZS8oamUnUbzHrInTJzaiAfuryla5HQQ_J3GPMC_kro4EiYfmmQvqA5p5rOMfJoVcZUEeQBvQV7XzhFDn2WXCJvognzI3aOZQhg7Sld9TwgkKfMWTO-WhfmmT-yI8asKFjuyIyGPFWcgQ7uNmZO_Ek4HVme0Dh2EFWt4WpQLbVAY2JkvBJiFTOtNq7C5NypRgWkI5qfr8UFyythVBBOg3YY9BvXVWih9jWAqs6I4pgtqDtQUID92pvjWgOyKslNP1FwgNgZiCU-JP9g8QUreHiN6GCUkcH3lmIL3N1iC4a3F5s_AbM12S8ZZJb_GJk12KPjgXt_zBo8Smbt0azBPWpW8BiZ5e_RrME9atbwUTLL_TrMGj1GZu3dl--JWb52O_dzCnjwCvxa8EbjO2TU5zkxwWQ3s4b3Z7NkufiamjXep1kwbZllLA-pZDu4NtyzHoefoGJsufSWg2tVLIRcJ-APfnmWfaajPNqzID9Bx4bjkTda7OeWp6LGFSselZn37zai8MeD5fB6Ri3KohBpxajRA9Sq_XTvpg4QNWmCecELbP2C9H3GFja-lqzlguZOM5qHuSO2pGVcXFgSEGS-WM0rnZjoeHCVsysbw2mYO0ozXDAlqXDq75-eb1CabALPrlbbIPRjgwJkbk1cJ7Rernmhuem3QFT6Yd4aL4oG8J_CbGxg1zSNYpbPeYiYU8Dsg4KN-Vwip_mV6VmsWcKXmpXT6qFaR_SSSZEwG08vKVlSh-a5uHRcInGZ1nG27oLLHaaSNki_CKGJqP87i3KxiJmVl-3Rmdt8RXxJwR1gbKkY5A-2UDQPYyHZZ9MVtOkqszulync3qDJoN-Wuydkqd28DxNLdAbRjmf0CQMskndcJSFxcxvNRpUuxoAXYH1xcfouc0fNM8NQmKj1fr3d_ugvQqRNgDXikpxBZd712s6Q4fwOso8soqxym-9Y99AfB4WB46PankwOr2KbjnpUSdIA64yNHzfgE_vnDIfzt-8MDK3fTOWbLQo2gZwbBH5cxCWMq5QnCOOjG0LDonR7H_PSY20damRKawW9-Dmv_9PiIn_ruiLwBSazJz2BZQRHOLkC52SH5AdDiET0-wkG2DJStRcr0GMeyyEW6On0BnvfxkfkyI9955FsvGByQYDhyxpPpWI91VManHabluBFXNIG1uB1NLL1gsciYIzQ-xFwi9DKhPJ6RCqdjStY5W570sL0QM54uxV_Ze5pkMeuHXCLB395pt_X4iJ7WqP9fkTiLAhcM7HdcJ72_CXFOXl6gpSWyuMImRQeRa5rBF_lHSXPWI0rMXCdGGwiNXCK1cFwwOC_hO58XVwjdtAHQqNZWo80SHMKQhaO41iOYTDzplXk8e-YP_vzzz947RFGKEPZSBx_Kd21271lXwRaYHUsKh0MWdBcVKGrdQdnOCmr_Nui5GOUVRSZnR0dZziTwtMz6aKRYwWA3g54FyqN-6ES0oEeXWj2g5UgByxrgSI0ujywOzmLV_z1b3cl2iy5ACLOwnCxEYQn-jM0X17gxXDDqp-96B9ocN7nYNjAtbqMFqeAec_wX7Ilohp_gqC_Vf3t9PqX6lndfM3x-WIcmt-Ucmo0ozMtk8TA5h-szpBkvaGyYto2JwW4mepN7YVwisqBi4gVnl1tCjmFrdVucoONQHxWgS9fgP2wd1i4tZp4x2fp5mew22XjI1xhlmyPUtVPGR2kpwhqPkOtxDPdSYSmh0cW8QMAQTHge2s3iBS3YSuRX5CwP1_yCyRnZ6FHQle0R4IHkqgOMTnkFDBa7UM4CX3IWWTRfQaskdTuBTYnlZq5JozsFz0jkdjpg4Jlq6KI3sMfibcF4OtBUuV79eE-46PstqF3eXCf6hfbXPbASg-0EF0g8tyM8lJPtW2926PzB9p1BYAMMnt-EI96h_gf--OjA2g7TsTHU7mBGHaKvBPpg5lHFKfvI-KYw5yvrXFyY7_h4j7EbKjOWiAezRfj70oXjT8iCufiz17qNNZdU6QKFhfFBTdbSOhVkg6FwwJHVuuXdmzeIuDhK-P1M02YKX77G5CbcVlqU0PfzljxGrlUbCWpxfjW3xTfaoqPFb9mduQYzvceutSut3nuN0HQb8M1XnlIdLeoKlxtKvDY1TVGo1o-aig6P2sQGbscSSwZme11tfsgF1TLnaaYzDzjmW1jz5F9cIo_I2zW4JC_Rn-_3rYXSPXBN2fxmbfw8O5MK-6yd13tK6KDNi-lVG7IKcc0YfvvJnC6gm04u7YRZQKh72YWp9Vwwn8ybthpwyiuNcrHyaQmbHxghm4nBMF5tbsA6FTmy_IKHbCHek7V_0nv589mPP9URqk0h2ejUfD_pJpMYhtgIhZYHwuCkR9bBSa8bW2PrvI5gdVxc_mxwhosP_jzzf4B_2OlZ4Da6qTB3XCdFxaW2trg_baHoxdlPP9065Nbpjg16vvMGAwIhMfEmEPO8s1q1idI6Z5rNg-l2NqcXYN0F-cc_iR-QH_iyWBNZ9A9vjWgjwUM20P1JSHKWrljM5CH57c3ZNiYqSjc0Nag0zOTx9qeEG9pIwQnsWLXhNqXdZ5XGm6DXOaUD78B2bRu06yYbBDt7dDN2rpnT86dgBYeHoxFMPD4wOyOaK8mE9ZTW3hrEJNK4OhzQ4-5KxqC3mbAVRShlTnJVpmksv7_RfUeeBgEpTxH4wR3V3SwaG335kLbacJus2zEKut8WbE7DAl1NtGi1ngQ6z6xzm7uAt5yc1HOgdke5yPBw40FKck9GYl8w_QniG0aj4Xi0X3yGW7sl0op4USbbwffLZNro9oWO-NSC0TnHQmR3cdpn6TFab5VM2zzJMprTotLiyh57tWmq9gN7_vsYdHL0xUuYkGVbtGXuPbzK88rl3oGy__hQHjw-lIPHh_Lw8aE8enwojx8fypPHh_L0AaPs79hK3AeMs2uuli2FKDopKNyH1cYNzoYZu7qJVoOrqt6tx8buveXq9Oz3dGis_9yFD-dP8KdyfZc8l4Xl3Ea5Dbo_flXB0wS9TibTTfhdQrkzf_euz9iRXS7Dn7p-q0nTnqwGJhKw3irayVqAGMzVT5V3bXW4hsG4RjY63DuHfZMfvKU-blnrVVrYcw_1P7fvTw-qQ-I2bfvzR1rat2DcRocvqJr7OIfVb_y9Pnm8_sJnUzWDLlF7OIZL2SpldqXLqbBOTIe3WFwiFvELWzQFtjCj6ZWDKb_e6dNcJ1uezTF31Ts95smKyDw8uZmBbVjUMsNbqfLId73JkeeqUw913kFoXFycGGTVJERHX1wnvSDokaPT4yPAZgdSEZNh7_SsILCwBWFCElYQGkKYTpNSfeEYsRMRcUFcIr5KuZQ8AbCoDDlC_FFysohpGoEUuSRZTpksGQlFnpdZweE5AiOHmRruj5JKkoiYyYJTWaGm_lYFi12-V9l2zx2ZVG-zFuvpkxcWlPwFez1cJ8gkUtWmqR4gWDwBedc7rb6qXDD7HRaj9clZHBM1hCQokPyCRdWZBXCVp9clJKbT-zzg4umd7pn3mfTAPOwCUNarK-YJL5qR_sDTj82xzlxcrsUlyDpRJe9pmSzqwzj0WdRIWPSQgArNG4fGr6GN_AyN5rsCbNR5mPFt6gEfL8R7s8WYZIc9qPHr53YEdTcZ1rtTu0WTGqpNmqpLcG2hBNZHzLWCAnEUsbYHXcCZN9hiLUyTD6AmFIaUKgvpmzJnltJFzKLqxA-ErOtcJ4zEz6ovaDtpYTE3RR-cScsNzWCjCy_0N6nkhcl6Lqt51NQBJvC1JYSP35uPWFFDV6bxLV1h_496H9-gBLtj2oh2zzw2IGFIXFzHVR5-GwyQ1oLZNqNmTBPMG9cSa7HXQxo7dA8Ny3dxaj-Lt7Bmn7S28fej8Z5aGG9no9uB6rKw-7zLvu4sm6zDGvNM5MVSxFxczLNcXPzOwgK2i4LyWDaDmGkTDhdPdXY7UJWv1qjXQGrB5ywGyqImRjWEeVivGzTCr3UjeaVxkZsD2252CU8VAvUCRs3ahK4NAlaD2UPF7SMj6saWVe8UyJaWLer6gLmkgO_2sKf03gZQTVljdaHUunB3cZ0DHXLq7LvqMDI3HZw9txtUNZ2jDIZWXtrJ-n_kIMmbkIyrSvVh-X8G2f6NyTaleJ9Atn4PRn055SHQPbgR3WiEX8AGjodA5Huew9oV_xGCNztfx7A1N_7Kuk1aYNe6BgO3Bc_TVQyQXCKbL4p0o2rGn-4B1ia9lXLKlrAb7LSR6AppiO12sR6hYQunVa0qo8kcXFyjnLbEKo1f0TSK053QNYXA7TfnPNYbDjJxV4-7UBugkiVZcXW3N918pUYLcBOWujr_ZvbzJtzBsc-iCIIFSX7EwPPTmeR5s173stxN7gc2KmO-FtfMRXMkuqnX5uKZ0mtHB_0myqpPN3WPHXreGLOr6WjRWJ6LPHCD-YKv7pCzU8tZVcdcJx1x7eVLu7J3cFJVuDuxXDA6IPZzMqyZ-LiFhEZgBU3k5evXv762RroCTFjEy6SCxfK2t2uM-oHJJKFXZE3Bxi8YSyHEh1wwmoicRCyG-Dfqk78xXCLLnEHAScI1C8_JlShzXCIzFgM5q77FtpqsXWyI1qV6hPN9zbtPgIOTKcV6wGns6vJjq7y9by9ABbYUM8XUjL0QgZ2O14PTX0SxBqmQJfL3-AhajrPTN1wiz68OyaIsSGqeQ1xcAsKMjCzVeARwT2SfvIoZLF1S5FeErihPySXHAjzQdBLx5ZJhqpGcs6tLkUeyf3yUndp1XCd5xOxFg269Zeu5EXXr-bR-rgxhwnRGQfHMJvAwutkCNUd9yjqwuFRqjMw-27p8gVwnBBsQGHNVzl5zuKAGtirevMjRwP9SCBWM5uEmmQ0CFgtUULkB0piIXdgYtgWBlGlnBC2YrMLjKn5RuVwwhZLxWXSF5TylifVplxQrLsV5hXwb0jogoFffVHvcdcPing3aYhfBDUb1bzAq7loxD89vPOjgZhzAfmAY02uG1ed2Zuldho6uhHT03lHnuxpCd-qtyQacfgcCAvOoDAtcJ4OR7HKoHDJfzaM9Qgc3MacbdQdNCPNw26yD7XBlWrSiYbyHiIpU5IATFw1fFZN-aqvAvCuBv7_h7SDyogFsPYX2COtcIon1ivXbKfcydbDqT9thu7V3stzl9scqAYyZ8nfbUuOSZSqOr_Pma88-M1cYe6e__fL9y9fkxa-_vHn7-rcXb3_89Rcwkp4CDqqBqiuPPTCdsOsoi2l2e1IgNy5hzwRZMjCXbwr4XFyUKYv-C4YKqqR4KzkedNlz7SY4vrdNsIXIl05O7zgDumlZnt_lYyglOIL6na3TAXT9K0_QlJMyj7-tOIjemuzrEjSacak4B13_W9fcnWBJ3ndYkgcRnHsIv_wwgA8BfhjBhxF-GMMH-OW9g-dPnyxEdPXh6ZOMRqhcJzPiQhs41Cue6s8fydNcJ32jRYekX6vUB3igavD01DPSaxQEHpJ9ZX-dYT-YgZCHMzJys_dcMNAo4oO2IbRBj3b13ox4CrSJrv5s_O3Z01wnOBhpNxJvorqpOS_tDC727o7vK0AlxBkxFYHQQBT2DVa0CPAHmwQM3NZI-rWlz29CUAvLFPOwsWXfNgOEUrGqPCN0IcGUFkzNtIQBhu4z-AxKPSPBED8652jf6hrLGVEf0b7-z7cOgB_UDf-rG7BXXCL-fbs-BDvJW88jbtvjluDkI_ARD-NCZY6Rex1lCbTkXCIus5iClvNUCXYBAc05CsJ6ztlSXemoNxy8Vdhy1vwOkMqU2At_XWivAS3jcmVgsi0wGCBWs2K0VA1E2lwnBCZJVsG3EMCNb6NjFUCabhYTr5lOcpp-pgr30J9tMwNRfQvN5Gfl5spWumYHS3DeRp9m1Nzmi6oegFan9rTVq1UQUPnTDTzsmH_Hdmk98S5oGw-32adFpO5S4eEaPCpcJx5vEfBURcLGvxrg3rRSlgJ1qL47OVQvXyvWnase6t3cjdvHE9feygxzvTVB4xXT52goltbojvb5t0yBL3SYbJ1htHeGcXcGtUHeaoLh9KYkNLR9xwz-DhKC3TOoi1F2hpbabJ8jGG2nXCLYRwVeF8O7XFxVHqbKPnYS6VxcqUUzRWjOr-09hYZb0Hivm3n6--bDqivadXXZqXNs13iKe78saF50Xj7eAWFp1Lm7qMsR9qA43SBgbjyp2h3T_k2HMHDy9KvPTc5roVjm6ZNynXaRqkBGP5ia91C1gAFBlQjXb72pmqsrs7q6w7Zj7Lx5YG5iXCdpoTB82JFA74I2pGei31aabNDx_Co88DYevmAhYgnE7ua1lVwiq2E-_j9Cexdr';
					$theme_options['rtl']	=  'eNrVPGtzG8eR31Wl_zCBy2WxwgX3hadIJirFsVPl2E5EVy6VUqEGwFwwWHOxu7W7IMTI-iDJsh1X_kROF0t-W3d2-fz1fgXwb657HvvCYglSpE2KpLCY6enp7unp6enpWdo1rWb3ftRtdGshi1hcXLsZdQ27W1s8W_zP4ovFT_D57fJjLO10a9Gh4w181w_xe6tbe2U0soaNBn5rdmsuPfZnHAG0nztDxnG1u7XRzHV7WNBjLpsyL45qN2nX6N53urpoOmF0yFww6wNoXDB4x67fp26vTweH49CfeUOEb0kynSkdc9R6tybp4EXOMFPYRHYCRuNMGVAS-JETO76XKTXgk8YxHUyQskwFMBE5f8_2BJ3nue_gj6AaOnQ8j4VXiWgYUddHwTvTcRZ5Oy0HEnuDWRT70yyACUPEgFkYo5GP_VOk6D7nYESnjnssFeadgHnkDvVcIt7M6tZQOrNAS4FMaHJAXCf-lG6TN1ww5xF8RtBAi6D7kST6iIYOFXy2UEbjmUtDpakxuxdrcQhtRn6YJRP6R-o0JRCg2uC6ahjAoOMxbcKc8SSWdWZTYXRZHLNQiwI6cDwuGWiglwmzbbYHnaaSCXVdDUkVGs6RilGzBSVyjMe-P3aZUBudU3KoJViB6CEND1wn_hELk8FIILQM74D0FV3nZKH2ZYCSxkhii_WpbnEooH5i9HCuAVvJyHXOOHBA2C0YFnebvMncIxY7gxOGDrA0Jb2nHDZbXz9sduP0w2a2wWy1q0cGhWVeRWFZFTpu6xdcJyzrSgqrQrOsC9Qs-yoKy6zQLOsCNatxJYWl_zLCal5FYVWuyxckLFO4ndWSAhm8C34teKPuOQrq5ZwYu71eWI2Ls1nRrP9LalarSrOg21kQsHBAI7ZGao2K-dg4g4qx0cgYWVwnqthcMGrAH_z5RfaSjnKzYkKeQccarabR7FdLy-C7xjGLr5SZN893R2G2rFHjZEH1Z3Hse4mgmpdMUNU8r-cM0MsQQS92Yiy9fLyVzZbWiWyN-jTUsjt56HvIRnTmxooFBOn1x71EH9piLzgO2bHavwmY6hBDG92AOA66OzuuP6DuxI_inVwwoztePAt25oEmjdJOPAFZR5k6jiPawf0jrHoaHwMkvD-uvx-MNwtcXIB8PF9Lv589gsHnhtzKFueJ2tY-yMgFhyyVHpTOXCdOLMbIzIHwgEYvh284tOAfp6wlYVwn1Bu6LOw5A6ScAmX3Oazr9EMaHsuWKENnJAaok1TymUnnLPKnTO3QR5SMqEbD0J9rQ3_upTt30QQNCHQVqW3_0Vwwigj_X-vP-n2XKS1QLQp9y69IL4kdDQQ74wIyrRKOegPXj9hL82Xn-ZoF58qVqa9wJcnOjrtgp3TcjRUQxXcBUOGSKxCAzqZeLw1ponHoNRNdcn0ag1XjcyNk9DDwHU-FPg1TWBGzsw5QS0NqGXjkXCf2g6IVKMZdsf8MWEGXcaxC6O6Gvm1a9rbV2NbrnfaWUmzZsGKm2AWgAn6UqMRP4NdsNOCzbja21LjLxi4bxRwDV1wn6Hl35pKBS6NoD0G4CaKDuLa_6zr7f_VnITkIoSs2JKZN3oTvEbnDwiNnwMi7oX_kDFn4q90dgN3dmbn7BXZCXFx0k96MFgzW3-KpFvkDsP8aRsaiu-X9E1wwm0Brly_bnJjdKA59b7y_6yh4oeDBxPcYgOw4-wfUPSQHPnn9HvicMenu7sg2ZBeWOy_ph7ma59f2dXLDsK0tYjeapNXutFwwHKD217FToVF2CcwaZUJ00nzn1AmGKG3ArUYCdcKy0hLLSgTrSrJi1PkSEjMw49Awrg_86SYLzEUsLLiEDqAXFpK-HysGX2KZQW2Wqs5_6rqxJQxPVmr5qZSTLs6VBO4q753sit1A4wxO7oj_q_SZuKor2f2SW8_LdeBwWsmhmRgOwtm0fzklh_NzQANcJ6auFFqZEO31QjTaF1wiRBRBXCLEI4fNS1xc9kZudiuaoGHDTkywkP9sut4E4wFYZpTKlvSiHZKrbW6gXCd4vJrikdKB1UdSSodHvRgBBzSm4UD1vHy4-GzxOVk8W364fLL4evlw-cnifxfPFl90VxrGdCwbWoB58XTxYvH98lNAXDDQHMHi34vv4cuLpDn6nUlzMNUxXxedkcO4jbdaeMwMHYsuP1s-VHT8sPwI8AJZXyy-VqS0M7joLJ74oWLDzlKjUPwX_P-wq7RZnC_nR8kQuzYeNBXVFXsv08xBrXO6DHu70dzu2Oh0WVtKyLC24GxxewrDZTlcIj71ymdZPE0gXDB_3jlivQ0kYhrb4hck0txShkQ2zKBa78Pz0-ixHx8HiubUJZFV0vGDPt9Vnob8jtUVlq_BbdrUvzTrhVkVd2udIZyk40-lqWsJKfEcXDAKE-M-70xoHYikY9mS1ngChkWbhTwS3tZP7w3OAkwriHZM3WjvGPoOdqsZDf2eYZn1QDBcItNFVDct83y6EejlppErxZTe6-XE29SVFkQwyofHPZWU0u8aciuaMyM9ASZbt3RlJnKtK21Kpwx484nENUGMXFxCS3FcMFNNy41eajmywualDwQXBRnlmW3oBcMaMTDGEyUqjHuLkp7jBXL_zHOKlo_BpD9cJ8vH3EaDgf9y-YSA8f528c3yQ1KvK-MjWuN0UXHA1K4ZqtcoPk6DB2JpGWgydJWHTLaGEoeZr-nRPjQT4ZK1MH3m-vNcIkyqE1jTy5phTKhKtEvH7KARrIBgX1RsAXeTfPky5G5VbHf7_j0yMfdqr__x1h_eqhGnh4ZvLwnHQAE3lfL7XjE8wqbUcREqXWR6XFxQezX-hQ01fxajcSlcMHGN28uEGqAaDRMUTWtkYu9xDn7L7tFp4DKcc1iK4Z3DvRooUBc7jv1XrVs4X-HjVfP38IuNXrX1TLMPPvigdnetVOK5MMatdqlUbt96KyOUbDBKCSZTlt-5X4hMfm1YFoEtNzHasMe6q2zAKluTkInh1pvlw-0dwQLikzf_hAGQ3zujeEKiuL59amanNIC_8JCFF8PxW35Ebnlj5rJom7x351bZWHKBXCeTzsToDyUggdFe7ZXa_huvH5Bb5E_vvXPw-u4O3Vc-nJxIMlwwVx3LzUw6Cj5vwZA3yuZm1hDn0LVW4U5ywC1jSzXNG_DKntAErgEvBtl05U-aHTD5je1mE3ptbclVHW1zxHzl5U2MCYy_77nJKYHAuy6KhPuSKRtThOL2MuS5mnKZM1earwkwISB1PAS-dOd1m20rm2fbm0Pner1x1t154l9khbcGC24eFFiPDmJ0lNHgpppii-AwXCfLWgdcXHLckfaByj0M_VwwTyQu5VhWBFeq4gJnCK409EarWX2UZ0pprR-R3OYex6QcvHpMOplm57VbPCl8qlwn4dPYD87jiE7xI7VeKZmwehELaEjjRIsTp9hIjVOyFqij4FWdRB08XDAeXFzXmU3JX1j_cihm85zTmWz8qVZMo1Rlesbly0JPthlrSDavHsnW1SPZvnokN64eyc2rR3Lr6pHcvnokdy4xyeaapUS_xDTr8prZyPfjQtgN12G-cIPHIXFcJ7fSUnCe4Vt27G29fARS9KL1xxpHW37knWRWnvHQW3ych-OmDywLj3WlvztywihWklpJjEF3x0xybbKgXCeNQWcVft0gnJuTe945AlxcXFwMf9JMqyxPFWEMDB5gZtRwrWgBwurxnyS2nGtwgoBxTqw0uHAJmzLueUp9LJnb6amavi1-9brZ2UoOufO8VQeMxGifQnArDX5G1aySHOapOffEAerJlz2zqmkXmaqQGE5lpZTBsUivwowu3msD5Lk7dI5UmhMYv4B6xxrG_2r716-V1PUwZFXb33WmYxKFg73zO9Mh1I33JLG8E1widlt7NduukZ393R2gZg1RQxYNavvLjxZfLz9cIvDxYvFs-fHyCVk-4Xefv14-Wn4KNYt_kuVcJ6Li08UX-FwwX6H4KXx8uPhs-Vicfn_HgeG_x4sXXDDEQbD86eI5PxN_IRF9uHwskT5cXH4qQERPj_BABEGgk1wn2BAJ-R4PTaDNx4tnsvIpgCpi8H42wpLF8-VDIPrZ4lts9BMB-O-WHwvs_wl_z_Cc5Z-JMPhnksxYHOnk3MLQ2yWZdNevcYI_WT4Sh-0fAZEvyP99ThByMAtxGmnHjIZ3Rf9fXDBn3wLRT0gdWUlZRgyZrIPPSXL-AyPpeIXIR7M48wx906U5qdTC2NWGNKabJKlxXCIyGWrnHU3ha8W9swVUMMrbBwLFJHadqRNnAwiWIarlqVgvmvhzGOApz6z3ZtN-eq6JrhDHhLkjUz9kmTxKfmT3CLT3KWr748WXixeSd95cIpMXIztSoQ2s7vv35JImmZUHXrhCqHqFgd-DBvuipYPbTqHyPPLUDV3ll2BaSU-oXCdwSZF8dWAIGERCyvKxCqauQstjmEgenYo3EqB3SPFsxj-s3XS4mDCdcu7E3C47XVOMzjhwZ1Hi5mcFDhpIgeSIh1JNmWDNPNp32TApAoJEJovUrlvJF5SoGC3JyG3xTXSG58hOlODiXCe-mK9Ex1KZDug4ko-g7Ew-_k4-4kJDYyX221A69kMHRfDggfBLVjhBLBj2yjnypl0CCUSglUiOE8pgoPccTFmPQjBZMKOVakROvAbyX5BJA8vK2T-T1KukVir8B9IbzFFcXC5GvVwwVRRhsb4ovmIvq6LD7PbAD-OR7zp-Lwj999kghuUvpo4bZTdhnSwcTs7kjN0WGya1ZqRQ3LSEzAXWhlmSUghZmU5Mnnj2RM7NT2G1WnxcJ5LIfoCF4fPVLhQCZS06PAs6tRWoZKvQqe3BRL3k_LUUMzIh7WfyqoRgpCTE7zDImxJoIFSShbEClPKISgLrs-DwGzXORfBzuVqSXFzBiGZOrLJ4117BaOavYHh-XFx1AQNK2TSIj7ndEfOJFk45HqCB3Egkpsj3W_w3eCvgHl2oUHQllD5jYaVAGnmByIn8UvIwN1cRdKB4DuYZpCFeDZJyspE4aBhViSNlcP1VI574quHdMnR3tFwwzx-rxGFtJo4WtwrfgLvxFbqFzxffLn66SB1pK5ngKl-hIK28ggxcXH82fEkVketswYpmHZPElLZzYJs4Ouj8rWlydm9HvoaGDeVgW3quE8cbu0CRH_T6sbeSs2V2KoDFQpULBAYjUK215h7tiIAoN_EphoxZ7yQZ04xOe-BQhjSnUZH0yrL2vbMWOm_UYAf2sUp8VkeN6xqeh-Lm5ui5XSA0-azug08zEovIZhZ_EyEhEG5LMdcbPpOE8Z-WH8HO75lcXArOJjXD6NaK1m6Te5iZPKkKMfK-elEss3nXiI7f89EG1GXekIZcJ0x8LmjgM6vi8k4fV3FNRGnk7jQ9fhYt1qh8BmdR6dF-sTD0Q1u3e31nfI7C7Chh8uTSSPNPvNeqJvnpVpYVFpItqo7vNLIJrBo_Lp6qxVwiAZ2CuZpNM9CAH6bpc9RBglEWAgr4aPlhLlxc8gOsx19jKObp8hMCT98tH-L0ruNtBNwEY4RFxXZEkOhRtgRgv8L1vK4YSqjJXCfJoi1KqgJ8z9rPeP8O-tQCrmsXcv_ufI5cIpKrpnjJVP3pdXUJz1Zpwp4P7KlLOR3AsDux9sGufAUOBBia78EB_wzGe3cHineD_cVPsN14IcNpXCIYhwEyAfgvDKv9CBbqOUa3vocl9ZPFj2Jkn4MufCkevwGAH1BFni8f1wm_fPIVKou8RQOfGBn8HL2YF1xck9CrWf4D4Bf_5qHFb4A0DMnJRGhuEBVQfXdcJ9hXkzpyhkzdnilmFefqpZLk6jtpPTesUyYCP1xc-iqci3vDEqgeamJQgMV5mFIk1_PcVSPc2q1A4I4Vd8vH-VtJdgqqpka2OkP93Pf5xjwcrDKZIb_fR0WPVkAyHbEjtZ_PQSBfwk9C4xgloYVkw8fjNZwk6U4JR6rn0YwvqXyoUkjl5oBSv5IsoVwnoc36YZthNTfA2sFcXF1Y08YhnW6K19qMWjy6mvXZCVjFqa2cxPOBJtJhNbEwpWHJzLBr6bqn9uhmAVwiCP3hbBBrAWBS0yFx_Ezej_A8NVxcIbViyMLOQsjKsl6tcriZF-cCCHirFlUpDoEmx8_4xOieH0yciIDpZAQ-3_OAeXI7A6wcuDyGSTwV8ZfiAczM0zDxU1h05TcUzjxm5dX7GLPHc5O7ZQclEQt46CM9RZkYqk5eyK3tv_f2717_M7n9ztt3Dv783u2DP7zzNlhagwPbCaLkAm9t_w54D_EEHol0JUiM0pjTYwJjyaI6uRPDczzz2PBXgMpODixyBxd2UTxcJy2f5su-FSXX3alWzvLMh7NlXFyue61rJtnSLIpmEEXgOIoX8nZagOy3zhStM5mF7o3EqUDvLqqLnEIaOBF3JqDpb0QS5d67flwwDhlSiYexurNtwoOJDxY8WPhgw4ONDw14aOBDEx6a-NCChxY-tOGhjQ8deIA_p7Z18_q169f6_vD4_vVrAR2innSJDqXgoI8dTzw_uH6tLpVom9RTjYI2PP9SUNklNUlnbZtU5XvmMSokKOUuaerBPajPJG9CWUOU5ZI2u8TkpVk6xbP04qEoA5AUGm1eyrucyw5AXFwl-FscECld5VgQa1qrxFqiV64hXfJKu93eiPQcPR4Gql3ROf7Uy8wMDphU6S6h_QjsZcx4XyPO0qvwTOAfKHj2q3aIxixNp-0S_ojG9D9uaFwwt5UW_FUUqJZT_-9naxedqZl_llanbIKji4esA26J769oiy1Gc-hEgUtBwx2PD3Yf7NghNlfedzDiV4XSpQYvxObcNLNcMMRjMequahHayEBH7mwsYYISGNx3prt9PYOI5E9KZAQwgc8RgEveSsNkXyqbKUqMbGBMy3qYfBeJnmxeGEjqARSTP3IHN8oFhNaIBPvNtMluxvNy4SFcMCjVUh-bvwwHAblcJ52hQ-F8A8sj5YMXQfN06Nk2OSZFk4QOXdKRuO94hcTx-AZbelYWrldjbj1Qh9Jrvw3-Ar54Urjpw9_Pnrk439bVheJBKNYtKDxm4mwShyWHXRObh5Iu8MUk7dIempU9tIo98NXzVB00OpuykNH2NT2Ya1iw1_fAb8upHnJqU96H3Sznwq7iAq8h4h3BJLyTxDcLXCcHachXRWJkgoG6pJLxHjLv95O1769WJk3RyPO7bkLJoX43GoROEBMaHXuDfCrQfD6XzgfsTKbUg1Um5C7IGL7vvB_9xhnu3fqL1rKaht1o6yZ6pQIbvnZJPswdb-jP6xh6e4seg2e1t1r0wQfkb3dvktHM494RQfw3tu5cJ1ww9WAWTW6ACZ7xw9-tmw8EyGvvR69tE4_NCR4l39jauinLQYwjZwx1r2Xpew3qEwqvX1OWMSMZ9HgwtBgXXr5fXDBh3rBwL1mkx1QMT2dl8HrSxUzdU-ECFgYVnF7x6n8ZRuxzdTFE9oYIU0U8SUxUdORb03LAQCA_zhBvqlLF_Bg7fc8JOuwyA1M2S67Oi3ykpDxVRLmJzwUSrYKvm3SHN0rxnShDNvV76i2sfpDCPPh_0-Ik1Q';
				
					
					if ( !function_exists( 'tm_cs_decode_string' ) ) {
						function tm_cs_decode_string( $string ) {
							
							// decode the encrypted theme opitons
							$options = unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
							
							
							// Getting layout type
							$layout_type = 'default';
							if( isset($_POST['layout_type']) && !empty($_POST['layout_type']) ){
								$layout_type = strtolower($_POST['layout_type']);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
							}
							
							// changing image path with client website url so image will be fetched from client server directly
							$demo_domains = array(
									'http://presentup.themetechmount.com/presentup-data/',
									'http://presentup.themetechmount.com/presentup-classic/',
									'http://presentup.themetechmount.com/presentup-elegant/',
									'http://presentup.themetechmount.com/',
								);
								
								// getting current site URL
							$current_url = get_site_url() . '/';
								
								foreach( $options as $key=>$val ){
									if( !empty($val) && is_string($val) ){
										if( substr($val,0,7) == 'http://' ){
											$val = str_replace( $demo_domains, $current_url, $val );
											$options[$key] = $val;
										}
									}
								}
						
							return $options;
						}
					}
					
					
					
					// Update theme options according to selected layout
					if( !empty($theme_options[$layout_type]) ){
						$new_options = tm_cs_decode_string( $theme_options[$layout_type] );
						
						// Image path URL change is pending
						// we need to replace image path with correct path 
						
						update_option('presentup_theme_options', $new_options);
					}
					
					/**** END CodeStart theme options import ****/
					
					
					
					
					
					/**** START - Edit "Hello World" post and change *****/
					$hello_world_post = get_post(1);
					if( !empty($hello_world_post) ){
						$newDate = array(
							'ID'		=> '1',
							'post_date'	=> "2014-12-10 0:0:0" // [ Y-m-d H:i:s ]
						);
						
						wp_update_post($newDate);
					}
					/**** END - Edit "Hello World" post and change *****/
					
					
					
					
				
			        // Import custom configuration
					$content = file_get_contents( PRESENTUP_TMDC_DIR .'one-click-demo/'.$filename );
					
					if ( false !== strpos( $content, '<wp:theme_custom>' ) ) {
						preg_match('|<wp:theme_custom>(.*?)</wp:theme_custom>|is', $content, $config);
						if ($config && is_array($config) && count($config) > 1){
							$config = unserialize(base64_decode($config[1]));
							if (is_array($config)){
								$configs = array(
										'page_for_posts',
										'show_on_front',
										'page_on_front',
										'posts_per_page',
										'sidebars_widgets',
									);
								foreach ($configs as $item){
									if (isset($config[$item])){
										if( $item=='page_for_posts' || $item=='page_on_front' ){
											$page = get_page_by_title( $config[$item] );
											if( isset($page->ID) ){
												$config[$item] = $page->ID;
											}
										}
										update_option($item, $config[$item]);
									}
								}
								if (isset($config['sidebars_widgets'])){
									$sidebars = $config['sidebars_widgets'];
									update_option('sidebars_widgets', $sidebars);
									// read config
									$sidebars_config = array();
									if (isset($config['sidebars_config'])){
										$sidebars_config = $config['sidebars_config'];
										if (is_array($sidebars_config)){
											foreach ($sidebars_config as $name => $widget){
												update_option('widget_'.$name, $widget);
											}
										}
									}
								}
								
								if ( isset($config['menu_list']) && is_array($config['menu_list']) && count($config['menu_list'])>0 ){
									foreach( $config['menu_list'] as $location=>$menu_name ){
										$locations = get_theme_mod('nav_menu_locations'); // Get all menu Locations of current theme
										
										// Get menu name by id
										$term = get_term_by('name', $menu_name, 'nav_menu');
										$menu_id = $term->term_id;
										
										$locations[$location] = $menu_id;  //$foo is term_id of menu
										set_theme_mod('nav_menu_locations', $locations); // Set menu locations
									}
								}
								
							}
						}
					}
					
					
					// Overlay - change homepage slider
					if( !empty($layout_type) && $layout_type=='overlay' ){
						$show_on_front  = get_option( 'show_on_front' );
						$page_on_front  = get_option( 'page_on_front' );
						$page           = get_page( $page_on_front );
						$theme_options = get_option('presentup_theme_options');
						update_option('presentup_theme_options', $theme_options);
						if( $show_on_front == 'page' && !empty($page) ){
							$post_meta = get_post_meta( $page_on_front, '_themetechmount_metabox_group', true );
							$post_meta['revslider'] = 'presentup-overlay-mainslider';
							update_post_meta( $page_on_front, '_themetechmount_metabox_group', $post_meta );
						}
					}
					
					
					
					
					// Infostack - Change Topbar right content and remove phone number area
					if( !empty($layout_type) && ($layout_type=='infostack' || $layout_type=='classic-infostack') ){
						$theme_options = get_option('presentup_theme_options');
						update_option('presentup_theme_options', $theme_options);
					}
					

					
					// Update term count in admin section
					tm_update_term_count();
					flush_rewrite_rules(); // flush rewrite rule
					
					$answer['answer'] = 'finished';
					$answer['reload'] = 'yes';
					die( json_encode( $answer ) );
					
				break;
				
			}
			die;
		}
		
		
		
		/**
		 * Fetch and save image
		 **/
		function grab_image($url,$saveto){
			$ch = curl_init ($url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
			$raw=curl_exec($ch);
			curl_close ($ch);
			if(file_exists($saveto)){
				unlink($saveto);
			}
			$fp = fopen($saveto,'x');
			fwrite($fp, $raw);
			fclose($fp);
		}



	} // END class

} // END if



if( !function_exists('tm_update_term_count') ){
function tm_update_term_count(){
	$get_taxonomies = get_taxonomies();
	foreach( $get_taxonomies as $taxonomy=>$taxonomy2 ){
		$terms = get_terms( $taxonomy, 'hide_empty=0' );
		$terms_array = array();
		foreach( $terms as $term ){
			$terms_array[] = $term->term_id;
		}
		if( !empty($terms_array) && count($terms_array)>0 ){
			$output = wp_update_term_count_now( $terms_array, $taxonomy );
		}
	}
}
}




// For AJAX callback
$themetechmount_presentup_one_click_demo_setup = new themetechmount_presentup_one_click_demo_setup;



