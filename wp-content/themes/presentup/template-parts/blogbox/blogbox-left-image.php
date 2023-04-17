<article class="themetechmount-box themetechmount-box-blog themetechmount-blogbox-format-<?php echo get_post_format() ?> <?php echo themetechmount_sanitize_html_classes(themetechmount_post_class()); ?> themetechmount-box-view-left-image themetechmount-blog-box-view-left-image">
	<div class="post-item">
        <div class="col-md-4 themetechmount-box-img-left">
			<div class="tm-featured-outer-wrapper tm-post-featured-outer-wrapper">
				<?php echo themetechmount_get_featured_media( '', 'themetechmount-img-blog-left' ); // Featured content ?>
			</div>
		</div>
        <div class="themetechmount-box-content col-md-8">
			<div class="themetechmount-box-content-inner">
				<div class="tm-post-entry-header">
					<div class="tm-post-left">
						<?php themetechmount_entry_date(); ?>
					</div>
					<div class="entry-header">
						<?php echo themetechmount_box_title(); ?>
						<?php echo presentup_entry_meta(); ?>
					</div>
				</div>				
				<div class="themetechmount-box-desc">
					<div class="themetechmount-box-desc-text"><?php echo themetechmount_blogbox_description(); ?></div>
				</div>
				<div class="themetechmount-box-desc-footer">
					<div class="themetechmount-blogbox-desc-footer">
					<?php echo themetechmount_blogbox_readmore(); ?>
					</div>
				</div>	
            </div>
        </div>
	</div>
</article>
