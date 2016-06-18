wp.customize.controlConstructor['o2-icon-picker'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			element = control.id,
			icons = control.params.iconset;

		if ( control.params.iconset === 'fontawesome' ) {
			icons = 'fa';
		} else if ( control.params.iconset === 'genericons' ) {
			icons = 'genericon';
		} else if ( control.params.iconset === 'dashicon' ) {
			icons = 'dashicons';
		}

		jQuery( '#' + element ).ddslick({
			iconset:icons
		});
		jQuery( '#' + element ).on( 'click', function() {
			var value = jQuery( this ).find( '.dd-selected-value' ).val();
			control.setting.set( value );
		});
	}

});
