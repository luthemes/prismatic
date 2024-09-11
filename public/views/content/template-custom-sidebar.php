<section id="content" class="site-content">
	<div id="global-layout" class="right-sidebar">
		<main id="main" class="content-area">
			<?php if ( have_posts() ) : ?>
				<?php while( have_posts() ) : the_post(); ?>
					<?php Backdrop\View\display( 'entry/page' ); ?>
				<?php endwhile; ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</main>
		<?php Backdrop\View\display( 'sidebar','custom', [ 'location' => 'custom' ] ); ?>
	</div>
</section>
