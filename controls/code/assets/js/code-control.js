wp.customize.controlConstructor['o2-code-editor'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			element = control.container.find( '.o2-code-control-render' ),
			language = control.params.choices.language,
			theme = control.params.choices.theme,
			editor;

		if ( control.params.choices.language === 'html' ) {
			language = 'htmlmixed';
		}

		if (typeof language === 'undefined' || language === null) {
			language = 'css';
		}

		if (typeof theme === 'undefined' || theme === null) {
			theme = 'default';
		}

		editor = CodeMirror.fromTextArea( element[0], {
			value: control.setting._value,
			mode: language,
			lineNumbers: true,
			theme: theme,
		});

		editor.on( 'change', function() {
			control.setting.set( editor.getValue() );
		});

		element.parents( '.accordion-section' ).on( 'click', function() {
		    editor.refresh();
		});
	}

});