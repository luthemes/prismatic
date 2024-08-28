<?php

namespace Prismatic\Settings\Manager\Plugins;

class Plugin {

    protected $name;
    protected $label;
    protected $author;
    protected $download_url = '';
    protected $description = '';

    public function __construct( $name ) {
        if ( ! function_exists( 'plugins_api' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        }

        $this->name = $name;
        $this->fetchPluginData($name);
    }

    protected function fetchPluginData($slug) {
        $this->fetchWordPressPluginData($slug);

        if ( empty( $this->label ) ) {
            $this->fetchClassicPressPluginData($slug);
        }
    }

    protected function fetchWordPressPluginData($slug) {
        $api = plugins_api(
            'plugin_information',
            array(
                'slug'   => $slug,
                'fields' => array(
                    'short_description' => true,
                    'download_link' => true,
                    'author' => true,
                ),
            )
        );

        if ( ! is_wp_error( $api ) ) {
            $this->label = $api->name;
            if ( isset( $api->download_link ) ) {
                $this->download_url = $api->download_link;
            }
            if ( isset( $api->short_description ) ) {
                $this->description = $api->short_description;
            }

            if ( isset ( $api->author ) ) {
                $this->author = $api->author;
            }
        }
    }

    protected function fetchClassicPressPluginData($slug) {
        $response = wp_remote_get( "https://directory.classicpress.net/wp-json/wp/v2/plugins?byslug=$slug" );

        if ( is_wp_error( $response ) ) {
            return;
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body, true );

        if ( ! empty( $data ) && is_array( $data ) && isset( $data[0] ) ) {
            $plugin = $data[0];
            $this->label = $plugin['title']['rendered'] ?? '';
            $this->description = $plugin['excerpt']['rendered'] ?? '';
            $this->download_url = $plugin['meta']['download_url'] ?? '';
            $this->author = $plugin['meta']['developer_name'] ?? '';
        }
    }

    public function name() {
        return $this->name;
    }

    public function label() {
        return $this->label;
    }

    public function downloadUrl() {
        return $this->download_url;
    }

    public function description() {
        return $this->description;
    }

    public function author() {
        return $this->author;
    }

    public function displayCard() { 
            if ( $this->name === 'classicpress-directory-integration/classicpress-directory-integration.php' ) {
                return;
            }
        ?>
        <div class="plugin-card" aria-describedby="<?php echo esc_attr( sprintf( '%1$s-action %1$s-name', $this->name() ) ) ?>" data-slug="<?php echo esc_attr( $this->name() ) ?>">

            <div class="plugin-title" style="padding: 0 1rem">
                <h2 class="plugin-name" id="<?php echo esc_attr( sprintf( '%s-name', $this->name() ) ) ?>" style="margin-bottom: 0.25rem;">
                    <?php echo esc_html( $this->label() ) ?>
                </h2>
                <?php echo esc_html( wp_strip_all_tags( $this->author() ) ); ?>
            </div>

            <div class="plugin-description" style="padding: 1rem; margin-bottom: 1rem;">
                <p><?php echo esc_html( wp_strip_all_tags( $this->description() ) ); ?></p>
            </div>



        </div>
        <?php
    }
}