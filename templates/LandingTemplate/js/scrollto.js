// Плавный скролл
$("a[href^='#'].scrollto").click(function (e) {
	e.preventDefault();
	var id = $(this).attr("href");
	var pos = $(id).position().top;

	var state = {"url": id};
	history.pushState(state, "Title", id);

	if (window.innerWidth > 480) {
		$("html, body").animate({
			scrollTop: pos // - 100
		}, 2000);
	} else {
		$("html, body").animate({
			scrollTop: pos // - 60
		}, 2000);
	}
});
