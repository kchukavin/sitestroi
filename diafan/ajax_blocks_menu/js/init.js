

$('#carousel').carousel({
	interval: 4000
});


//Stack menu when collapsed
$('.navbar-collapse').on('show.bs.collapse', function() {
	$(this).children('.nav-pills').addClass('nav-pills_vertical');
});

//Unstack menu when not collapsed
$('.navbar-collapse').on('hide.bs.collapse', function() {
    $(this).children('.nav-pills').removeClass('nav-pills_vertical');
});


$('.ajax-block').each(function(index) {
	var ajaxDataBlock = $(this);
	var dataLink = '';
	
	if ($(this).data('block-id')) {
		dataLink = '/app/ajax_blocks.php?block=' + $(this).data('block-id');
	} else if ($(this).data('block-url')) {
		dataLink = $(this).data('block-url') + '?ajax=1';
	}
	
	$.get(dataLink, function (data) {
		ajaxDataBlock.html(data);
	}, 'text');
});


/*
$.get("/app/", function(data){
	$("#ajax_ankor").html(data);
	}, "text");
	*/