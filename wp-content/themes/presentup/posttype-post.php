<?php


// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'themetechmount_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'themetechmount_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'themetechmount_post_set_featured_image_column' ) ) {
function themetechmount_post_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['themetechmount_featured_image'] = esc_attr__( 'Featured Image', 'presentup' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'themetechmount_post_set_featured_image_column_content' ) ) {
function themetechmount_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themetechmount_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img src="' . TMTE_URI . '/images/admin-no-image.png" />';
		}
	}
}
}