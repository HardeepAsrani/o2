<?php
/**
 * Toggle Customizer Control - O2 Customizer Library
 *
 * This control adds a toggle box to the Customizer which allows
 * you to have a checkbox field with toggle control.
 *
 * Toggle is a part of O2 library, which is a
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
 * @subpackage Toggle
 * @since 0.1
 */
function o2_add_toggle_control( $wp_customize ) {
	class O2_Customizer_Toggle_Control extends WP_Customize_Control {

		public $type = 'o2-toggle';

		public function enqueue() {
			wp_enqueue_script( 'o2-toggle', O2_DIRECTORY_URI . 'controls/toggle/assets/js/toggle-control.js', '', '', true );
			wp_enqueue_style( 'o2-toggle', O2_DIRECTORY_URI . 'controls/toggle/assets/css/toggle-control.css' );
		}

		public function render_content() {
		?>
			<label>
				<div id="<?php echo esc_attr( $this->id ); ?>" class="o2-toggle">
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif; ?>
					<input type="checkbox" class="o2-toggle-checkbox" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
					<button type="button" class="o2-btn-toggle" for="<?php echo esc_attr( $this->id ); ?>">
						<div class="handle"></div>
					</button>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php endif; ?>
				</div>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_toggle_control' );
