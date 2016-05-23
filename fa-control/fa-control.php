<?php
/**
 * Font Awesome Icon Picker Customizer Control - O2 Customizer Library
 *
 * This control adds a Font Awesome icon picker which allows you
 * to easily pick icons from Font Awesome.
 *
 * Font Awesome Icon Picker is a part of O2 library, which is a 
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
 * @subpackage Font Awesome Icon Picker
 * @since 0.1
 */
function o2_add_font_awesome_control( $wp_customize ) {
	class O2_Customzer_Font_Awesome_Control extends WP_Customize_Control {

		public $type = 'icon-picker';

		public function enqueue() {
			wp_enqueue_script( 'o2-fa-ddslick-min', O2_DIRECTORY_URI . 'fa-control/assets/js/jquery.ddslick.min.js', array("jquery"),'1.0.0', true  );
			wp_enqueue_script( 'o2-fa-contro', O2_DIRECTORY_URI . 'fa-control/assets/js/fa-control.js', array("jquery", "o2-fa-ddslick-min"),'1.0.0', true);
			wp_enqueue_style( 'o2-fa-min', O2_DIRECTORY_URI . 'fa-control/assets/font-awesome/css/font-awesome.min.css', NULL, NULL, 'all' );
		}

		protected function render() {
			if ( empty( $this->choices ) ) {
				require O2_DIRECTORY . 'fa-control/fa-icons.php';
				$this->choices = o2_font_awesome_list();
			}
			$id = str_replace( '[', '-', str_replace( ']', '', $this->id ) );
			$class = 'customize-control customize-control-' . $this->type; ?>
			<li class="<?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $id ); ?>">
				<?php $this->render_content(); ?>
			</li>
		<?php }

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
				<select class="o2-fa-icon-control" id="o2-fa-icon-container">
					<?php foreach ( $this->choices as $value => $label ): ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( $this->value(), $value, false ); ?> data-iconsrc="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_font_awesome_control' );

?>