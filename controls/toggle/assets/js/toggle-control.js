wp.customize.controlConstructor['o2-toggle'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			button = control.container.find( '.o2-btn-toggle' ),
			checkbox = control.container.find( '.o2-toggle-checkbox' );

		button[0].onclick = function() {
			checkbox[0].checked = !checkbox[0].checked;
			control.setting.set( checkbox[0].checked );
		};
	}

});