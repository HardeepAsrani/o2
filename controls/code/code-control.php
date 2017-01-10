<?php
/**
 * Code Highlighter Customizer Control - O2 Customizer Library
 *
 * This control adds a Font Awesome icon picker which allows you
 * to easily pick icons from Font Awesome.
 *
 * Code Highlighter is a part of O2 library, which is a
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
 * @subpackage Code Highlighter
 * @since 0.1
 */
function o2_add_code_control( $wp_customize ) {
	class O2_Customizer_Code_Control extends WP_Customize_Control {

		public $type = 'o2-code-editor';

		public function to_json() {
			$this->json['choices'] = $this->choices;
			parent::to_json();
		}

		public function enqueue() {
			if ( empty( $this->choices['language'] ) ) {
				$this->choices['language'] = 'css';
			}
			if ( empty( $this->choices['theme'] ) ) {
				$this->choices['theme'] = 'default';
			}

			wp_enqueue_script( 'codemirror-js', O2_DIRECTORY_URI . 'assets/codemirror/lib/codemirror.js', array( 'jquery' ) );

			if ( in_array( $this->choices['language'], array( 'html', 'htmlmixed' ) ) ) {
				wp_enqueue_script( 'codemirror-multiplex', O2_DIRECTORY_URI . 'assets/codemirror/addon/mode/multiplex.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-xml', O2_DIRECTORY_URI . 'assets/codemirror/mode/xml/xml.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-css', O2_DIRECTORY_URI . 'assets/codemirror/mode/css/css.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-javascript', O2_DIRECTORY_URI . 'assets/codemirror/mode/javascript/javascript.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-htmlmixed', O2_DIRECTORY_URI . 'assets/codemirror/mode/htmlmixed/htmlmixed.js', array( 'jquery', 'codemirror-js', 'codemirror-multiplex', 'codemirror-language-xml', 'codemirror-language-css', 'codemirror-language-javascript' ) );
			} elseif ( $this->choices['language'] === 'php' ) {
				wp_enqueue_script( 'codemirror-language-xml', O2_DIRECTORY_URI . 'assets/codemirror/mode/xml/xml.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-clike', O2_DIRECTORY_URI . 'assets/codemirror/mode/clike/clike.js', array( 'jquery', 'codemirror-js' ) );
				wp_enqueue_script( 'codemirror-language-php', O2_DIRECTORY_URI . 'assets/codemirror/mode/php/php.js', array( 'jquery', 'codemirror-js' ) );
			} else {
				wp_enqueue_script( 'codemirror-language-' . $this->choices['language'], O2_DIRECTORY_URI . 'assets/codemirror/mode/' . $this->choices['language'] . '/' . $this->choices['language'] . '.js', array( 'codemirror-js' ) );
			}

			wp_enqueue_script( 'o2-code-control', O2_DIRECTORY_URI . 'controls/code/assets/js/code-control.js', array( 'jquery', 'codemirror-js' ), '', true );

			wp_enqueue_style( 'codemirror-css', O2_DIRECTORY_URI . 'assets/codemirror/lib/codemirror.css' );

			if ( $this->choices['theme'] !== 'default' ) {
				wp_enqueue_style( 'codemirror-theme-' . $this->choices['theme'], O2_DIRECTORY_URI . 'assets/codemirror/theme/' . $this->choices['theme'] . '.css' );
			}
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
				<textarea <?php $this->link(); ?> class="o2-code-control-render"></textarea>
			</label>
		<?php }

	}
}
add_action( 'customize_register', 'o2_add_code_control' );
