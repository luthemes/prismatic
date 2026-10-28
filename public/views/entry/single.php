<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-post-thumbnail">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
	<header class="entry-header">
		<?php Backdrop\Post\display_title( [ 'class' => 'entry-title' ] ); ?>
		<div class="entry-metadata">
			<?php Backdrop\Post\display_date( [ 'class' => 'entry-published' ] ); ?>
			<?php Backdrop\Post\display_author( [ 'class' => 'entry-author', 'before' => Prismatic\sep() ] ); ?>
			<?php Backdrop\Post\display_comments_link( [ 'class' => 'entry-comments', 'before' => Prismatic\sep() ] ); ?>
			<?php Prismatic\display_reading_time( [  'before' => Prismatic\sep() ] ); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( [
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'prismatic' ),
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'prismatic' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">,</span> ',
		] );
		?>
	</div>
</article>
