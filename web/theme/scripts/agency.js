$(document).ready(function () {
    $(document).on("scroll");

    //smoothscroll
    $('.header-nav-right-item').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top-130
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll");
        });
    });
});