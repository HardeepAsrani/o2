<?php
/**
 * Radio Buttons Customizer Control - O2 Customizer Library
 *
 * This control adds a radio buttonset to the Customizer which allows
 * you to pick an option from the buttonset.
 *
 * Radio Buttons is a part of O2 library, which is a
 * free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this library. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package O2 Customizer Library
 * @subpackage Radio Buttons
 * @since 0.1
 */
function o2_add_radio_buttons_control( $wp_customize ) {
	class O2_Customizer_Radio_Buttons_Control extends WP_Customize_Control {

		public $type = 'radio-buttons';

		public function enqueue() {
			wp_enqueue_style( 'o2-radio-buttons', O2_DIRECTORY_URI . 'controls/radio-buttons/assets/css/radio-buttons-control.css' );
		}

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input type="radio" class="o2-radio-buttons" id="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<label for="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></label>
				<?php endforeach; ?>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_radio_buttons_control' );
