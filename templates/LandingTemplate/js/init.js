
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplaySpeed: 5000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    });

    // From an element with ID #popup
    $('.popup-toggle').magnificPopup({
          type: 'inline',
          midClick: true
    });

    // GALLERY

    // From an element with ID #popup
    $('.gallery a').magnificPopup({
          type: 'image',
          midClick: true
    });


    // SHOWMORE //

    // Показываем надпись
    $('.showmore').each(function () {
        $(this).children().map(function (id) {
            if (id > $(this).parent('.showmore').data('count') - 1) {
                $(this).hide();
            }
        });

        $(this).after('<a class="showmore__open" href="#">' + $(this).data('text') + '</a>');
    });

    $('.showmore__open').click(function (e) {
        e.preventDefault();
        $(this).hide();
        $(this).prev('.showmore').children().show(300);
    });

});
