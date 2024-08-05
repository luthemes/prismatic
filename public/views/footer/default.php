<footer id="colophon" class="site-footer">
	<?php Backdrop\View\display( 'menu', 'social', [ 'location' => 'social' ] ); ?>
	<div class="site-info">
		<?php
		printf(
		// Translators: 1 = Date, 2 = Site Link.
			esc_html__( '&#169; %1$s. %2$s', 'prismatic' ),
			absint( date_i18n( 'Y' ) ),
			Backdrop\Theme\Site\render_site_link() // phpcs:ignore
		);
		?>
		<br />
		<?php
		printf(
		// Translators: 1 = WordPress Link, 2 = Theme Link.
			esc_html__( 'Powered By %1$s and %2$s', 'prismatic' ),
			Backdrop\Theme\Site\render_cp_link(), // phpcs:ignore
			Backdrop\Theme\Site\render_theme_link() // phpcs:ignore
		);
		?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
