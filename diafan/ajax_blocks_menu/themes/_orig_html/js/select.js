
(function($) {
$(function() {

	$('select').selectbox();

	$('#add').click(function(e) {
		$(this).parents('div.section').append('<br /><br /><select><option>-- �������� --</option><option>����� 1</option><option>����� 2</option><option>����� 3</option><option>����� 4</option><option>����� 5</option></select>');
		$('select').selectbox();
		e.preventDefault();
	})

	$('#add2').click(function(e) {
		var options = '';
		for (i = 1; i <= 5; i++) {
			options += '<option>Option ' + i + '</option>';
		}
		$(this).parents('div.section').find('select').each(function() {
			$(this).append(options);
		})
		$('select').trigger('refresh');
		e.preventDefault();
	})

	$('#che').click(function(e) {
		$(this).parents('div.section').find('option:nth-child(5)').attr('selected', true);
		$('select').trigger('refresh');
		e.preventDefault();
	})

})
})(jQuery)
