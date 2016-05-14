jQuery(document).ready(function($) {

	function o2_iconpicker_value() {
		$('.o2-social-icon-control').each(function() {
			var icon = $(this).find('.dd-selected-value').val();
			$(this).find('.o2-social-icon-control-render').val(icon);
		});
	}

	$('.o2-social-icon-control').each(function() {
		var id = $(this).find('select').attr('id');
		$('#' + id).ddslick();
		$('#' + id).on('click', function() {
			o2_iconpicker_value();
			$('.o2-social-icon-control-render').trigger('change');
		});
		o2_iconpicker_value();
	});

})();