<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-post-thumbnail">
		<?php the_post_thumbnail( 'creativity-large' ); ?>
	</div>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
