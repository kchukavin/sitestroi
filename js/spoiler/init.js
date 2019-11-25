$(document).ready(function () {
    $('.spoiler__toggle').click(function() {
        $(this).parents('.spoiler').toggleClass('spoiler_opened').find('.spoiler__content').toggle(400);
    });

    $('.spoiler__open').click(function() {
        $(this).parents('.spoiler').addClass('spoiler_opened').find('.spoiler__content').slideDown(400);
    });

    $('.spoiler__close').click(function() {
        $(this).parents('.spoiler').removeClass('spoiler_opened').find('.spoiler__content').slideUp(400);
    });
});