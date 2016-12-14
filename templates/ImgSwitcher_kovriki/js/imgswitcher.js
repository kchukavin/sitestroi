function colorSelectorChangeHandler() {
	var imgSrc = 'img/' + $(this).val();
	if (imgSrc.indexOf(('.png')) === -1 && imgSrc.indexOf(('.jpg')) === -1) {
		console.log('Bad file format : ' + imgSrc);
		console.log('Only .png and .jpg are supported.');
		return false;
	}
	$('#' + $(this).data('for')).attr('src', imgSrc);
}

$('.img-switcher__param').change(colorSelectorChangeHandler);
