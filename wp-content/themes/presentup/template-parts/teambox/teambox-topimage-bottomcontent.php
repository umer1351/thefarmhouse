<article class="themetechmount-box themetechmount-box-team themetechmount-box-view-topimage-bottomcontent">
	<div class="themetechmount-post-item">
		<div class="themetechmount-team-image-box">
			<?php echo themetechmount_wp_kses(themetechmount_featured_image('themetechmount-img-team-member')); ?>
	        <div class="themetechmount-overlay">
				<a href="<?php the_permalink(); ?>"><span class="tm-hide"><?php the_title(); ?></span></a>
			</div>
			
			<div class="themetechmount-box-content">
				<div class="themetechmount-box-desc">
					<?php echo themetechmount_box_title(); ?>
					<?php $designation = themetechmount_get_meta( 'themetechmount_details_line_positions', 'tm_team_info' , 'team_details_line_position' ); ?>
					<div class="themetechmount-box-footer"><?php echo themetechmount_get_meta( 'themetechmount_team_member_details', 'tm_team_info' , 'team_details_line_position' ); ?></div>				
				</div>
			</div>
		
		</div>		
	</div>
</article>
 