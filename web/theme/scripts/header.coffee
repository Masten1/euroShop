jQuery ($)->

  headerphone = $ ".upper-phone-list"

  headerphone.click (e) ->
    e.stopPropagation()
    $(@).toggleClass "show"