wp.customize.controlConstructor['o2-select'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			element = this.container.find( 'select' );

		jQuery( element ).selectize();

		this.container.on( 'change', 'select', function() {
			selectValue = jQuery( this ).val();
			control.setting.set( selectValue );
		});
	}

});
