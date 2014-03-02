function contentAfterValidate (form, data, hasError) {
	$('#'+form.context.id).find('.control-group.error').removeClass('error');
	
	if (hasError) {
		for (var key in data) {
			$('#'+form.context.id).find('#'+key).parent().parent().addClass('error');
		}
		return false;
	}
	
	window.location = form.attr('rel');
}
	
function confirmDelete() {
	if (confirm('Вы действительно хотите удалить эту запись?'))
		return true;
	return false;
}