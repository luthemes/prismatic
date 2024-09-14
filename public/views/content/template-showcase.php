<?php

$sections = [ 
    'theme_home_header_display' => 'section/header', 
    'theme_home_portfolio_display' => 'section/portfolio', 
    'theme_home_blog_display' => 'section/blog'
];

foreach ( $sections as $section_mod => $template ) {
    $display = get_theme_mod( $section_mod, false );
    
    if ( 0 != $display && isset( $display ) ) {
        Backdrop\View\display( $template );
    }
}
