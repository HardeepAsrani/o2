<?php
/**
 * Color Palette Customizer Control - O2 Customizer Library
 *
 * This control adds a color pallette to the Customizer which allows
 * you to pick an option from the palette.
 *
 * Color Palette is a part of O2 library, which is a
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
 * @subpackage Color Palette
 * @since 0.1
 */
function o2_add_color_palette_control( $wp_customize ) {
	class O2_Customizer_Color_Palette_Control extends WP_Customize_Control {

		public $type = 'o2-color-palette';

		public function enqueue() {
			wp_enqueue_style( 'o2-color-palette', O2_DIRECTORY_URI . 'controls/color-palette/assets/css/color-palette-control.css' );
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
				<div class="o2-color-palette-group">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input name="o2_color_palette_<?php echo esc_attr( $this->id ); ?>" id="o2_color_palette_<?php echo esc_attr( $this->id ); ?>_<?php echo esc_attr( $value ); ?>" type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> >
						<label for="o2_color_palette_<?php echo esc_attr( $this->id ); ?>_<?php echo esc_attr( $value ); ?>" class="color-option">
							<span><?php echo esc_attr( $label[label] ); ?></span>
							<table class="color-palette">
								<tr>
								<?php foreach ( $label[colors] as $color ) : ?>
									<td style="background-color: <?php echo esc_attr( $color ); ?>">&nbsp;</td>
								<?php endforeach; ?>
								</tr>
							</table>
						</label>
					</input>
				<?php endforeach; ?>
				</div>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_color_palette_control' );
