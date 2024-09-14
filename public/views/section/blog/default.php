<section id="home-blog" class="site-blog">
    <div class="blog-header">
        <h1 class="blog-header-title"><?php echo esc_html( get_theme_mod( 'theme_home_blog_title' , 'Blog' ) ); ?></h1>
        <div class="blog-header-description"><?php echo esc_html( get_theme_mod( 'theme_home_blog_description' , 'Latest News!' ) ); ?></div>
    </div>
    <div class="blog-content">
			<ul class="blog-items">
				<?php
				$posts_per_page = get_theme_mod( 'custom_portfolio_items', 9 );
				$query          = new WP_Query( array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
				) );

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="blog-item">
                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <?php the_post_thumbnail( 'creativity-large' ); ?>
                            </a>
                            <header class="entry-header">
                                <?php Backdrop\Theme\Entry\display_title(); ?>
                                <span class="entry-metadata"><?php Backdrop\Theme\Entry\display_date(); ?></span>
                            </header>
                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </li>
                    <?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</ul>
		</div>
    </div>
</section>