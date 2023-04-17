<?php
global $presentup_theme_options;

$search_input = ( !empty($presentup_theme_options['search_input']) ) ? esc_attr($presentup_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'presentup');

$searchform_title = ( isset($presentup_theme_options['searchform_title']) ) ? esc_attr($presentup_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'presentup');

if( !empty($searchform_title) ){
	$searchform_title = '<div class="tm-form-title">' . $searchform_title . '</div>';
}

if( !empty( $presentup_theme_options['header_search'] ) && $presentup_theme_options['header_search'] == true ){

?>

<div class="tm-search-overlay">
	<div class="tm-search-outer">
		<?php echo themetechmount_wp_kses($searchform_title); ?>
		<form method="get" class="tm-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="tm-presentup-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>