<?php if ( has_nav_menu( $data->location ) ) : ?>
	<nav id="social" class="social-menu">
	<?php wp_nav_menu( [
		'theme_location' => $data->location,
		'depth'          => 1,
		'container'      => '',
		'menu_id'        => '',
		'menu_class'     => 'menu-items',
		'link_before'    => '<span class="screen-reader-text">',
		'link_after'     => '</span>',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'item_spacing'   => 'discard'
	] ) ?>
	</nav>
<?php endif ?>