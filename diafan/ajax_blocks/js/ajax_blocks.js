
$('.ajax-block').each(function(index) {
	var ajaxDataBlock = $(this);
	var dataLink = '';
	
	if ($(this).data('block-id')) {
		dataLink = '/app/ajax_blocks.php?block=' + $(this).data('block-id');
	} else if ($(this).data('block-url')) {
		dataLink = $(this).data('block-url');
	}
	
	$.get(dataLink, function (data) {
		ajaxDataBlock.html(data);
	}, 'text');
});
