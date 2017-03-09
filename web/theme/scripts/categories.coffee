jQuery ($)->
  if window.location.hash
    newHash = window.location.hash
    subOriginalHash = "#" + newHash.substring(1)
    $(document.body).animate { 'scrollTop': $(subOriginalHash).offset().top }, 2000
