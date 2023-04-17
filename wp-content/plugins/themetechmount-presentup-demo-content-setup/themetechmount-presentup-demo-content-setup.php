<?php
/*
 * Plugin Name: ThemetechMount Presentup Demo Content Setup
 * Plugin URI: https://www.themetechmount.com
 * Description: Presentup Demo Content Setup Plugin By ThemetechMount
 * Version: 1.0
 * Author: ThemetechMount
 * Author URI: https://www.themetechmount.com
 * Text Domain: presentup-demosetup
 * Domain Path: /languages
 */
 
 
 
/**
 *  Version and directory
 */
define( 'PRESENTUP_TMDC_VERSION', '1.0' );
define( 'PRESENTUP_TMDC_DIR', plugin_dir_path( __FILE__ ) );
define( 'PRESENTUP_TMDC_URI', plugins_url( '', __FILE__ ) );



/**
 *  Demo Content setup
 */
require_once PRESENTUP_TMDC_DIR . 'one-click-demo/demo-content.php';



/**
 *  Translation
 */
function presentup_demosetup_load_plugin_textdomain() {
	$domain = 'presentup-demo-content-setup';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( 'presentup-demosetup', trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		load_plugin_textdomain( 'presentup-demosetup', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'presentup_demosetup_load_plugin_textdomain' );



/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function presentup_demosetup_load_textdomain() {
	load_plugin_textdomain( 'presentup-demosetup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'presentup_demosetup_load_textdomain' );







function presentup_demo_content_scripts_styles(){

	wp_enqueue_style(
		'tm-one-click-demo-style',
		plugin_dir_url( __FILE__ ) . 'style.css',
		time(),
		true
	);
	wp_enqueue_script(
		'tm-one-click-demo-set-js',
		plugin_dir_url( __FILE__ ) . 'functions.js',
		array( 'jquery' ),
		time(),
		true
	);
	


}
add_action( 'admin_enqueue_scripts', 'presentup_demo_content_scripts_styles', 20 );



/**
 * HTML Output for the one click demo setup
 *
 * @since 1.0.0
 */
if( !function_exists('themetechmount_presentup_one_click_html') ){
function themetechmount_presentup_one_click_html() {
	?>
	
	<div id="import-demo-data-results">
				
		<div class="import-demo-data-text-w">
		
			<div class="import-demo-data-layout">
				<!-- <h3>Select demo data type  <small>(select below)</small>: </h3> -->
				
				<div class="tm-import-demo-left">
					<div class="tm-import-demo-left-inner">
						
						<select id="import-layout-type" name="import-layout-type">
							<option value="Overlay">Overlay Site</option>
							<option value="Classic">Classic Site</option>
							<option value="Elegant">Elegant Site</option>
							<option value="RTL">RTL Site</option>	
						</select>
						
						<br><br><hr>
						
						<div class="import-demo-data-text">
						
							<strong><?php esc_attr_e('NOTE:', 'presentup'); ?></strong>
							<?php esc_attr_e('This process may overwrite your existing content or settings. So please do this on fresh WordPress setup only.', 'presentup'); ?>
							<br /><br />
							<?php esc_attr_e('Also if you already included demo data than this will add multiple menu links and you need to remove the repeated menu items by going to "Admin > Appearance > menus" section.', 'presentup'); ?>
							
						</div>

						
					</div>
				</div>
				
				<div class="tm-import-demo-right">
				
					<!-- overlay -->
					<span class="import-demo-thumb-w import-demo-thumb-overlay">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://presentup.themetechmount.com" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-overlay.png" alt="Overlay">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
									
					<!-- Multi purpose -->
					<span class="import-demo-thumb-w import-demo-thumb-classic" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://presentup.themetechmount.com/presentup-classic/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-classic.png" alt="Classic">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- elegant -->
					<span class="import-demo-thumb-w import-demo-thumb-elegant" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="https://presentup.themetechmount.com/presentup-elegant" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-elegant.png" alt="Elegant">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- rtl -->
					<span class="import-demo-thumb-w import-demo-thumb-rtl" style="display:none;">
						<div class="tm-import-demo-preview-text">Preview:</div>
						<a href="http://presentup.themetechmount.com/presentup-rtl" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-rtl.png" alt="RTL">
							<span class="tm-import-demo-link-text">View demo online</span>
						</a>
					</span>

					
				</div>
				
				<div class="clear clr"></div>
				
			</div>
		
			
			<br /><br />
			<input type="button" class="button button-primary" id="themetechmount_one_click_demo_content" value="<?php esc_attr_e('I agree, continue demo content setup', 'presentup'); ?>" /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<a href="#" class="tm-one-click-error-close"><?php esc_attr_e('Cancel', 'presentup' ); ?></a>
		</div>
	
	</div>
	
	<div class="clear"></div>
	
	<?php
}
}