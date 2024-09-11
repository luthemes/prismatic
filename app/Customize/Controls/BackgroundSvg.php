<?php
/**
 * Radio SVG customize control.
 *
 * This control allows developers to create a list of SVG radio inputs.
 *
 * @package   Prismatic Customize
 */

namespace Prismatic\Customize\Controls;

/**
 * Radio SVG customize control.
 *
 * @since  1.0.0
 * @access public
 */
class BackgroundSvg extends \WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @since  1.0.0
     * @var    string
     */
    public $type = 'prismatic-radio-svg';

    /**
     * Loads the template for SVG radio control
     *
     * @return void
     */
    protected function render_content() {
        if ( empty( $this->choices ) ) {
            return;
        }

        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>
        <?php if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php endif; ?>

        <div id="input_<?php echo esc_attr( $this->id ); ?>" class="svg-patterns">
            <?php foreach ( $this->choices as $value => $svg ) : ?>
                <label for="<?php echo esc_attr( $this->id . '_' . $value ); ?>">
                    <input class="svg-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . '_' . $value ); ?>" name="<?php echo esc_attr( $name ); ?>"
                        <?php
                        $this->link();
                        checked( $this->value(), esc_attr( $value ) );
                        ?>
                    >
                    <!-- Display the SVG directly -->
                    <span class="svg-preview">
                        <?php echo $svg; // Output the SVG directly, no escaping ?>
                    </span>
                </label>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
