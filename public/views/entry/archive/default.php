<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<source media="(max-width: 768px)" srcset="<?php the_post_thumbnail_url( 'medium_large' ); ?>">
			<?php the_post_thumbnail( 'full' ); ?>
		</picture>
	<?php } ?>
	<header class="entry-header">
		<?php Backdrop\Post\display_title( [ 'class' => 'entry-title', 'tag' => 'h2' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_author( [ 'class' => 'entry-author' ] ); ?>
			<?php Backdrop\Post\display_date( [ 'class' => 'entry-published', 'before' => Prismatic\sep() ] ); ?>
			<?php Backdrop\Post\display_comments_link( [ 'class' => 'entry-comments', 'before' => Prismatic\sep() ] ); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>