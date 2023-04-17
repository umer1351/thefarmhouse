<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Presentup 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'presentup_author_bio_avatar_size', 100 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h2 class="author-title"><span class="author-heading"><?php esc_attr_e( 'Author:', 'presentup' ); ?></span> <?php echo get_the_author(); ?></h2>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( esc_attr__( 'View all posts by %s', 'presentup' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->
		
		
	</div><!-- .author-description -->
	
	<?php echo themetechmount_author_social_links(); ?>
	
</div><!-- .author-info -->
