jQuery ($)->
  if window.location.hash
    newHash = window.location.hash
    subOriginalHash = newHash.substring(1)
    catId = document.getElementById(subOriginalHash)
    $('html, body').stop().animate { 'scrollTop': catId.top - 130 }, 500, 'swing', ->
      window.location.hash = catId
      $(document).on 'scroll'
