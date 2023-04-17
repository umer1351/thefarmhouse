<article class="themetechmount-box themetechmount-box-blog themetechmount-box-topimage themetechmount-blogbox-format-<?php echo get_post_format() ?> <?php echo themetechmount_sanitize_html_classes(themetechmount_post_class()); ?>">
	<div class="post-item">
		<div class="themetechmount-box-content">		
			<div class="tm-featured-outer-wrapper tm-post-featured-outer-wrapper">
				<?php echo themetechmount_get_featured_media( '', 'themetechmount-img-blog-top' ); // Featured content ?>
			</div>		
			<div class="themetechmount-box-desc">
				<div class="tm-post-entry-header">
					<div class="tm-post-left">
						<?php themetechmount_entry_date(); ?>
					</div>
					<div class="entry-header">
						<?php echo themetechmount_box_title(); ?>
						<?php echo presentup_entry_meta(); ?>
					</div>
				</div>		
				<div class="themetechmount-box-desc-text"><?php echo themetechmount_blogbox_description(); ?></div>
			   <div class="themetechmount-box-desc-footer">
					<div class="themetechmount-blogbox-desc-footer">
					<?php echo themetechmount_blogbox_readmore(); ?>
					</div>
				</div>		
			</div>
        </div>
	</div>
</article>
