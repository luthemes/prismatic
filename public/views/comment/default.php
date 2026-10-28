<li id="comment-<?php comment_ID(); ?>" class="comments">

	<header class="comment-meta">
		<?php Backdrop\Comment\display_parent_link( [
			// Translators: %s is the parent comment link.
			'text'   => __( 'In reply to %s', 'prismatic' ),
			'depth'  => 3,
			'class'  => 'comment__parent-link inline-block mb-2',
			'after'  => '<br /></div>',
		] ) ?>

		<?php echo get_avatar( $data->comment, $data->args['avatar_size'], '', '', [
			'class' => 'comment-avatar'
		] ) ?>

		<?php Backdrop\Comment\display_author_link( [
			'class' => 'comment-author-link',
			'after' => '<br />',
		] ) ?>

		<?php
		Backdrop\Comment\display_permalink( [
			'text' => Backdrop\Comment\render_date()
		] );
		?>
		<?php Backdrop\Comment\display_edit_link( [ 'before' => Prismatic\sep() ] ) ?>
		<?php Backdrop\Comment\display_reply_link( [ 'before' => Prismatic\sep() ] ) ?>
	</header>

	<div class="comment-content">

		<?php if ( ! Backdrop\Comment\is_approved() ) : ?>

			<p class="comment-moderation">
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'prismatic' ) ?>
			</p>

		<?php endif ?>

		<?php comment_text() ?>
	</div>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>