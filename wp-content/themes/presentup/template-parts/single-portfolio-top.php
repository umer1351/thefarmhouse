<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="tm-pf-single-content-wrapper tm-pf-view-top-image">
	
	<div class="tm-pf-single-content-wrapper-innerbox">
		<?php echo themetechmount_get_featured_media(); ?>
		
		<div class="row">
			<div class="themetechmount-pf-single-content-area col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<?php echo themetechmount_portfolio_description(); ?>
			</div><!-- .themetechmount-pf-single-content-area -->
			
			<div class="themetechmount-pf-single-details-area col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<div class="themetechmount-pf-single-detail-box">
					<?php echo themetechmount_portfolio_detailsbox(); ?>
				</div>
			</div><!-- .themetechmount-pf-single-details-area -->
			<div class="tm-social-bottom-wrapper col-md-12 col-lg-12">
				<?php echo themetechmount_social_share_box('portfolio'); /* Social share */ ?>
				<div class="tm-nextprev-bottom-nav">
					<?php echo themetechmount_portfolio_next_prev_btn(); /* Next/Prev button */ ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo themetechmount_portfolio_related(); ?>
</div>


<?php edit_post_link( esc_attr__( 'Edit', 'presentup' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

