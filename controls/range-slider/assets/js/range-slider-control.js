wp.customize.controlConstructor['o2-range-slider'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			slider = control.container.find( '.o2-range-slider-range' ),
			output = control.container.find( '.o2-range-slider-value' );

		output[0].value = slider[0].value;

		slider[0].oninput = function() {
			output[0].value = this.value;
		}

		if ( control.params.default !== false ) {
			var reset = control.container.find( '.o2-range-reset-slider' );

			reset[0].onclick = function() {
				slider[0].value = control.params.default;
				output[0].value = control.params.default;
			}
		}
	}

});