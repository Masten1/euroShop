jQuery ($) ->
  $('.item-slider-product').magnificPopup
    delegate: 'a'
    type: 'image'
    gallery: {
      enabled: true
    }

  $('.wrap').on "click", ".product-btn", ->
    $(".buy-product-wrapper").show(200)
    $('.close-form').show(200)

  $('.wrap').on "click", ".close-form", ->
    $(@).slideToggle(200)
    $(".buy-product-wrapper").hide(200)

  $("#customer-phone").mask("380(99) 999-99-99");

  $("#callback-phone-product").mask("380(99) 999-99-99");

  actionDate = $('#getting-started').data "date"

  $('#getting-started').countdown actionDate, (event) ->
    $('.getting-day').html event.strftime('%D')
    $('.getting-hour').html event.strftime('%H')
    $('.getting-minute').html event.strftime('%M')
    $('.getting-second').html event.strftime('%S')