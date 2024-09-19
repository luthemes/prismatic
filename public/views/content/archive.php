<section id="content" class="site-content m-18">
	<main id="main" class="content-area">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<?php
				the_archive_title( '<h1 class="archive-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>
			<div class="loop">
				<ul class="grid-items grid-col-3">
					<?php while( have_posts() ) : the_post(); ?>
						<?php Backdrop\View\display( 'entry/archive' ); ?>
					<?php endwhile; ?>
				</ul>
				<?php Backdrop\View\display( 'nav/pagination', 'posts' ); ?>
			</div>
		<?php endif; ?>
	</main>
</section>