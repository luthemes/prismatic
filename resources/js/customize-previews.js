( function( $ ) {

    // Function to update CSS for any selector and property
    function updateCSS( control, selector, property ) {
        wp.customize( control, function( value ) {
            value.bind( function( newval ) {
                $( selector ).css( property, newval );
            });
        });
    }

    // Update background colors in real-time
    updateCSS( 'theme_header_background_color', '.site-header', 'background-color' );
    updateCSS( 'theme_footer_background_color', '.site-footer', 'background-color' );
    updateCSS( 'header_textcolor', '.site-title-link', 'color' );

} )( jQuery );
