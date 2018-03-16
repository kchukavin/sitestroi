function DisplayState() {
    this.current = 'desktop';
    var displayState = this;
    
    this.stateByWidth = function(width) {
        if (width < 700) return 'mobile';
        if (width < 992) return 'tablet';
        return 'desktop';
    };
    this.switchTo = function(newState) {
        if (displayState.current !== newState) {
            displayState.current = newState;
            switch(newState) {
                case 'desktop': displayState.onDesktop(); break;
                case 'tablet': displayState.onTablet(); break;
                case 'mobile': displayState.onMobile(); break;
            }
        }
    };
    this.switchToByWidth = function(width) {
        var state = displayState.stateByWidth(width);
        return displayState.switchTo(state);
    };
    this.adopt = function() {
        displayState.switchToByWidth($(window).width());
    };

    this.onDesktop = function() {
        console.log('desktop now');
    };
    this.onTablet = function() {
        console.log('tablet now');
    };
    this.onMobile = function() {
        console.log('mobile now');
    };
};

var displayState = new DisplayState();
var listDoneSlider = null;
displayState.onMobile = function() {
    listDoneSlider = $('.list_done').bxSlider();

    $('.header_top .logo').removeAttr('style');
    $('.header_top .right_header').removeAttr('style');
}
displayState.onDesktop = function() {
    if (listDoneSlider !== null) {
        listDoneSlider.destroySlider();
        listDoneSlider.removeAttr('style');
    }

    $('.header_top .logo').show();
    $('.header_top .right_header').show();
}

displayState.adopt();

$(window).resize(function() {
    displayState.adopt();
});
