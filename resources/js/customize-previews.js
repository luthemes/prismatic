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

    /*
     * Background type and pattern.
     *
     * These settings use postMessage, so this rebuilds the theme's background CSS in
     * the preview as they change, without reloading it. It mirrors
     * Component::backgroundCss() in PHP, which prints the same CSS on the live site;
     * keep the two in step. Background Image is previewed by core, so it's watched
     * here too to keep the chosen type in charge.
     */
    var data     = window.prismaticCustomizePreview || {},
        selector = data.backgroundSelector || 'html body.custom-background',
        patterns = data.backgroundPatterns || {};

    function backgroundCss( type, pattern, image ) {

        if ( 'image' === type && image ) {
            return selector + ' { background-image: url("' + encodeURI( image ) + '"); background-size: cover; }';
        }

        if ( 'pattern' === type && patterns[ pattern ] ) {
            return selector + ' { background-color: rgba(255, 255, 255, 0.9); background-image: url("' + patterns[ pattern ] + '"); background-repeat: repeat; background-blend-mode: lighten; }';
        }

        if ( 'none' === type ) {
            return selector + ' { background-image: none; }';
        }

        return '';
    }

    function updateBackground() {
        var style = $( '#prismatic-background-inline-css' );

        if ( ! style.length ) {
            style = $( '<style id="prismatic-background-inline-css"></style>' ).appendTo( 'head' );
        }

        style.text( backgroundCss(
            wp.customize( 'theme_global_background_type' ).get(),
            wp.customize( 'theme_global_background_pattern' ).get(),
            wp.customize( 'background_image' ) ? wp.customize( 'background_image' ).get() : ''
        ) );
    }

    wp.customize( 'theme_global_background_type', 'theme_global_background_pattern', function( type, pattern ) {
        type.bind( updateBackground );
        pattern.bind( updateBackground );

        wp.customize( 'background_image', function( image ) {
            image.bind( updateBackground );
        } );
    } );

} )( jQuery );
