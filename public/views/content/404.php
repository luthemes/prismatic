<section id="content" class="site-content">
	<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
		<main id="main" class="content-area">
			<?php $error->setup(); ?>
			<article id="post-0" class="page">
				<header class="entry-header">
					<h1 class="entry-title"><?php $error->displayTitle(); ?></h1>
				</header>
				<div class="entry-content">
					<?php $error->displayContent(); ?>
				</div>
			</article>
			<?php $error->reset(); ?>
		</main>
		<?php Backdrop\View\display( 'sidebar', 'primary', [ 'location' => 'primary' ] ); ?>
	</div>
</section>

<section id="content" class="site-content">

</section>