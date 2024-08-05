<li id="comment-<?php comment_ID(); ?>" class="comments">

	<header class="comment-meta">
		<?php Backdrop\Theme\Comment\display_parent_link( [
			// Translators: %s is the parent comment link.
			'text'   => __( 'In reply to %s', 'prismatic' ),
			'depth'  => 3,
			'class'  => 'comment__parent-link inline-block mb-2',
			'after'  => '<br /></div>',
		] ) ?>

		<?php echo get_avatar( $data->comment, $data->args['avatar_size'], '', '', [
			'class' => 'comment-avatar'
		] ) ?>

		<?php Backdrop\Theme\Comment\display_author_link( [
			'class' => 'comment-author-link',
			'after' => '<br />',
		] ) ?>

		<?php
		Backdrop\Theme\Comment\display_permalink( [
			'text' => Backdrop\Theme\Comment\render_date()
		] );
		?>
		<?php Backdrop\Theme\Comment\display_edit_link() ?>
		<?php Backdrop\Theme\Comment\display_reply_link() ?>
	</header>

	<div class="comment-content">

		<?php if ( ! Backdrop\Theme\Comment\is_approved() ) : ?>

			<p class="comment-moderation">
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'prismatic' ) ?>
			</p>

		<?php endif ?>

		<?php comment_text() ?>
	</div>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>