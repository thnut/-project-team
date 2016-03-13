var activeElement = 0;//select default tab
$(function () {
    var items = $('.btn-nav');
    $(items[activeElement]).addClass('active');
    $(".btn-nav").click(function () {
        $(items[activeElement]).removeClass('active');
        $(this).addClass('active');
        activeElement = $(".btn-nav").index(this);
    });
});

     