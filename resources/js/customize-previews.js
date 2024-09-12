( function( $ ) {

    // Update the background color in real-time...
    wp.customize( 'theme_footer_background_color', function( value ) {
        value.bind( function( newval ) {
            // Update the CSS for the site footer
            $('.site-footer').css('background-color', newval);
        });
    });

    // Update the background color in real-time...
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( newval ) {
            // Update the CSS for the site footer
            $('.site-title-link').css('color', newval);
        });
    });

} )( jQuery );
