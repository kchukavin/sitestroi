$(document).on('click', ".rel2_element_actions a", function() {
	var self = $(this);
	if (self.attr("action") != 'delete_rel2_element')
	{
		return true;
	}
	if (! confirm(self.attr("confirm")))
	{
		return false;
	}
	diafan_ajax.init({
		data:{
			action: 'delete_rel2_element',
			element_id : self.parents(".rel2_element").attr("element_id"),
			rel2_id : self.parents(".rel2_element").attr("rel2_id"),
			rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided")
		},
		success: function(response){
			self.parents(".rel2_element").remove();
		}
	});
	return false;
});
$('.rel2_module_plus').click(function() {
	var self = $(this);
	diafan_ajax.init({
		data:{
			action: 'show_rel2_elements',
			element_id: $('input[name=id]').val(),
			rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided")
		},
		success: function(response){
			if (response.data)
			{
				$("#ipopup").html(prepare(response.data));
				centralize($("#ipopup"));
			}
		}
	});
	return false;
});
$(document).on('click', '.rel2_module_navig a', function() {
	var self = $(this);
	diafan_ajax.init({
		data:{
			action: 'show_rel2_elements',
			element_id: $('input[name=id]').val(),
			rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided"),
			page: self.attr("page"),
			search: search,
			cat_id: cat_id
		},
		success: function(response){
			if (response.data)
			{
				$(".rel2_all_elements_container").html(prepare(response.data));
			}
		}
	});
	return false;
});
var search = '';
var cat_id = '';
$(document).on('keyup change', '.rel2_module_search, select.rel2_module_cat_id', function() {
	if($(this).is('.rel2_module_search'))
	{
		search = $(this).val();
	}
	if($(this).is('.rel2_module_cat_id'))
	{
		cat_id = $(this).val();
	}
	diafan_ajax.init({
		data:{
			action: 'show_rel2_elements',
			element_id: $('input[name=id]').val(),
			rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided"),
			search: search,
			cat_id: cat_id
		},
		success: function(response){
			if (response.data)
			{
				$(".rel2_all_elements_container").html(prepare(response.data));
			}
		}
	});
});
$(document).on('click', '.rel2_module a', function() {
	var self = $(this);
	if (! self.parents('.rel2_module').is('.rel2_module_selected'))
	{
		diafan_ajax.init({
			data:{
				action: 'rel2_elements',
				rel2_id: self.parents(".rel2_module").attr("element_id"),
				element_id: $('input[name=id]').val(),
				rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided")
			},
			success: function(response){
				self.parents('.rel2_module').addClass('rel2_module_selected');
				if (response.data)
				{
					$(".rel2_elements").html(prepare(response.data));
				}
				if (response.id)
				{
					$("input[name=id]").val(response.id);
				}
			}
		});
	}
	else
	{
		diafan_ajax.init({
			data:{
				action: 'delete_rel2_element',
				element_id : $('input[name=id]').val(),
				rel2_id : self.parents(".rel2_module").attr("element_id"),
				rel2_two_sided:  $("#rel2_elements").attr("rel2_two_sided")
			},
			success: function(response){
				self.parents('.rel2_module').removeClass('rel2_module_selected');
				$(".rel2_element[rel2_id="+self.parents(".rel2_module").attr("element_id")+"]").remove();
			}
		});
	}
	return false;
});