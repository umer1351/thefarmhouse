				</div><!-- .site-content-inner -->
			</div><!-- .site-content -->
		</div><!-- .site-content-wrapper -->

		<footer id="colophon" class="site-footer">
			<div class="footer_inner_wrapper footer<?php echo themetechmount_sanitize_html_classes(themetechmount_footer_row_class( 'full' )); ?>">
				<div class="site-footer-bg-layer tm-bg-layer"></div>
				<div class="site-footer-w">
					<div class="footer-rows">
						<div class="footer-rows-inner">
							<?php get_sidebar( 'first-footer' ); ?>
							<?php get_sidebar( 'second-footer' ); ?>
						</div><!-- .footer-inner -->
					</div><!-- .footer -->
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- .footer-inner-wrapper -->
			</div><!-- .site-footer-inner -->
		</footer><!-- .site-footer -->

	</div><!-- #page .site -->

</div><!-- .main-holder -->

<!-- To Top -->
<a id="totop" href="#top"><i class="tm-presentup-icon-angle-up"></i></a>

<?php wp_footer(); ?>
</body>
</html>
