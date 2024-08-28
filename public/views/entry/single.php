<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-post-thumbnail">
		<?php the_post_thumbnail( 'creativity-large' ); ?>
	</div>
	<header class="entry-header">
		<?php Backdrop\Theme\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Backdrop\Theme\Entry\display_date(); ?>
			<?php Backdrop\Theme\Entry\display_author( [ 'before' => Prismatic\sep() ] ); ?>
			<?php Backdrop\Theme\Entry\display_comments_link( [ 'before' => Prismatic\sep() ] ); ?>
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
