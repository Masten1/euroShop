jQuery ($) ->
  $('.wrap').on "click", "#callback-button", ->
    $(".callbackForm").show(200)
    $('.close-callback').show(200)

  $('.wrap').on "click", ".close-callback", ->
    $(@).slideToggle(200)
    $(".callbackForm").hide(200)

  $("#callback-phone").mask("380(99) 999-99-99");