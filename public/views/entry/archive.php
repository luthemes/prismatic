<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<source media="(max-width: 768px)" srcset="<?php the_post_thumbnail_url( 'creativity-medium' ); ?>">
			<?php the_post_thumbnail( 'creativity-small' ); ?>
		</picture>
	<?php } ?>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title( [ 'tag' => 'h2' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Theme\Entry\display_author(); ?>
			<?php Backdrop\Theme\Entry\display_date( [ 'before' => Prismatic\sep() ] ); ?>
			<?php Backdrop\Theme\Entry\display_comments_link( [ 'before' => Prismatic\sep() ] ); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>