<?php
	// Getting data of the  Facts in Digits box
	global $tm_global_ptbox_element_values;
	
	if( is_array($tm_global_ptbox_element_values) ) :	
?>


<div class="tm-ptablebox tm-ptablebox-<?php echo themetechmount_sanitize_html_classes($tm_global_ptbox_element_values['boxstyle']); ?> <?php echo themetechmount_sanitize_html_classes($tm_global_ptbox_element_values['main-class']); ?>">
	
	<div class="themetechmount-ptable-main">
		<div class="themetechmount-ptable-icon">
			<?php echo themetechmount_wp_kses($tm_global_ptbox_element_values['icon_html']); ?>
		</div>
		<h3 class="tm-ptablebox-title"><?php echo esc_attr($tm_global_ptbox_element_values['heading']); ?></h3>
		
		<div class="ttm-ptablebox-price-w">
			<div class="tm-ptablebox-frequency"><?php echo esc_attr($tm_global_ptbox_element_values['price_frequency']); ?></div>
			<?php echo themetechmount_wp_kses($tm_global_ptbox_element_values['cur_symbol_before']); ?>
			<div class="tm-ptablebox-price"><?php echo esc_attr($tm_global_ptbox_element_values['price']); ?></div>
			<?php echo themetechmount_wp_kses($tm_global_ptbox_element_values['cur_symbol_after']); ?>					
		</div>
	</div>


	<div class="tm-ptablebox-features">
		<?php echo themetechmount_wp_kses($tm_global_ptbox_element_values['lines_html']); ?>
	</div>
	
	<?php if( !empty($tm_global_ptbox_element_values['btn_title']) ){ ?>
		<?php echo do_shortcode('[tm-btn color="black" style="outline" shape="rounded" size="md" title="'. esc_attr($tm_global_ptbox_element_values['btn_title']).'" link="'.esc_attr($tm_global_ptbox_element_values['btn_link']).'"]'); ?>
	<?php } ?>
	
</div>


<?php
	endif;
	$tm_global_ptbox_element_values = '';
?>