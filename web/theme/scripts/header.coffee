jQuery ($) ->
  $(window).scroll ->
    topHeader = $('.header-scroll-hide')
    scrollTop = $(@).scrollTop()
    threshold = $(".header-scroll-show").height() - 170
    topHeader.addClass('active') if scrollTop > threshold and not topHeader.hasClass 'active'
    topHeader.removeClass('active') if scrollTop < threshold and topHeader.hasClass 'active'

