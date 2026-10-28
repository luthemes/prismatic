<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'prismatic' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="branding-navigation">
			<div class="site-branding">
				<?php Backdrop\Site\display_title( [ 'class' => 'site-title', 'link_class' => 'site-title-link' ] ); ?>
				<?php Backdrop\Site\display_description( [ 'class' => 'site-description' ] ); ?>
			</div>
			<?php Backdrop\View\display( 'menu', 'primary', [ 'location' => 'primary'] ); ?>
		</div>
	</header>
