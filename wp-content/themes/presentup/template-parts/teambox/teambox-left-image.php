<article class="themetechmount-box themetechmount-box-team themetechmount-box-view-left-image themetechmount-team-box-view-left-image">
	<div class="col-md-6 themetechmount-box-img-left">
			<div class="tm-box-overlay-content">
				<?php echo themetechmount_wp_kses(themetechmount_featured_image('themetechmount-img-team-member')); ?>
			</div>
	</div>
	<div class="col-md-6 themetechmount-box-img-right themetechmount-box-content">
		<div class="themetechmount-box-content-inner">
			<?php echo themetechmount_box_title(); ?>
			<div class="themetechmount-team-position"><?php echo themetechmount_get_meta( 'themetechmount_team_member_details', 'tm_team_info' , 'team_details_line_position' ); ?></div>
				<?php if( has_excerpt() ){ ?>
				<div class="tm-short-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
				</div>
			<?php } ?>
			 <div class="themetechmount-box-social-links"><?php echo themetechmount_box_team_social_links(); ?></div>
			 <div class="tm-team-details-wrapper">
				<?php $email = themetechmount_get_meta( 'themetechmount_team_member_details', 'tm_team_info' , 'team_details_line_email' );
					if( !empty($email) ){ ?>
						<a href="mailto:<?php echo trim(esc_attr($email)); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr($email); ?></a>
					<?php } ?>
			 </div>	
		</div>
	</div>
</article>
	