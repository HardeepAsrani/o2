<?php
/**
 * Range Slider Customizer Control - O2 Customizer Library
 *
 * This control adds range slider to the Customizer which allows
 * you to choose number from a range slider.
 *
 * Range Slider is a part of O2 library, which is a
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
 * @subpackage Range Slider
 * @since 0.1
 */
function o2_add_range_slider_control( $wp_customize ) {
	class O2_Customizer_Range_Slider_Control extends WP_Customize_Control {

		public $type = 'o2-range-slider';

		public function to_json() {
			if ( ! empty( $this->setting->default ) ) {
				$this->json['default'] = $this->setting->default;
			} else {
				$this->json['default'] = false;
			}
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'o2-range-slider', O2_DIRECTORY_URI . 'controls/range-slider/assets/js/range-slider-control.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'o2-range-slider', O2_DIRECTORY_URI . 'controls/range-slider/assets/css/range-slider-control.css' );
		}

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<div id="<?php echo esc_attr( $this->id ); ?>">
					<div class="o2-range-slider">
						<input class="o2-range-slider-range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<input class="o2-range-slider-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<?php if ( ! empty( $this->setting->default ) ) : ?>
							<span class="o2-range-reset-slider" title="<?php _e( 'Reset', 'o2' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
						<?php endif;?>
					</div>
				</div>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_range_slider_control' );
