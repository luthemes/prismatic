<section id="home-portfolio" class="site-portfolio">
    <div class="portfolio-header">
        <h1 class="portfolio-header-title"><?php echo esc_html( get_theme_mod( 'theme_home_portfolio_title' , 'Portfolio' ) ); ?></h1>
        <div class="portfolio-header-description"><?php echo esc_html( get_theme_mod( 'theme_home_portfolio_description' , 'Some of my recent works!' ) ); ?></div>
    </div>
    <div class="portfolio-content">
    <ul class="portfolio-items">
				<?php
				$posts_per_page = get_theme_mod( 'custom_portfolio_items', 9 );
				$query          = new WP_Query( array(
					'post_type'      => 'backdrop-portfolio',
					'posts_per_page' => $posts_per_page,
				) );

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						if ( has_post_thumbnail() ) {
							?>
							<li class="portfolio-item">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php the_post_thumbnail( 'camaraderie-large-thumbnails' ); ?>
								</a>
								<div class="wp-caption">
									<h3 class="wp-caption-text"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail_caption(); ?></a></h3>
									<span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); // phpcs:ignore ?></span>
								</div>
							</li>
							<?php
						}
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</ul>
    </div>
</section>