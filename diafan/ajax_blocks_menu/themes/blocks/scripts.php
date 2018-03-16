
<insert name="show_js">

<!-- bxSlider Javascript file -->
  <script src="<insert name="custom" absolute="true" path="vendor/bxslider/jquery.bxslider.min.js" >"></script>
  
  <script>
	$('.animated.onhover').mouseover(function() {
		$(this).addClass('infinite');
	});

	$('.animated.onhover').mouseleave(function() {
		$(this).removeClass('infinite');
	});
	
	$('.bxslider').bxSlider({
		pager: false
	});
  </script>