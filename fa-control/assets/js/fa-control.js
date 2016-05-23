wp.customize.controlConstructor['icon-picker'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			element = control.container.find( '#o2-fa-icon-container' ),
			container = control.id;

		jQuery(element).ddslick();
		jQuery('#' + element[0].id).on('click', function() {
			var value = jQuery(this).find('.dd-selected-value').val();
			control.setting.set(value);
		});
	}

});