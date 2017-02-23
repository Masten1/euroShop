jQuery ($) ->
  form = $ "#feedback-form"
  form.submit (e) ->
    e.preventDefault()
    $.post(
      form.attr('action')
      form.serialize()
      (resp) ->
        if resp.type is 'success'
          form.get(0).reset()
          $('.feedback-form-submit').hide(200)
          $('.feedback-message').addClass 'active'
        else
          $.each resp.errors, (key, value) ->
            $.each value, (key2) ->
              $(".feedback-form-#{key2}").addClass 'error'
      'json'
    )

  form.on 'focus', '.error', ->
    $(@).removeClass 'error'


  formCustomer = $ "#form-product-buy"
  formCustomer.submit (e) ->
    e.preventDefault()
    innerForm = $ @
    btn = innerForm.find('button')
    phoneUnmask = innerForm.find("#customer-phone").val()
    phoneSpaces = phoneUnmask.replace ' ', ''
    phoneScope = phoneSpaces.replace '(', ''
    phoneScope2 = phoneScope.replace ')', ''
    phoneLine = phoneScope2.replace '-', ''
    phoneLine2 = phoneLine.replace '-', ''
    customerName = $("#customer-name").val()
    customerMail = $("#customer-mail").val()
    customerText = $("#customer-text").val()
    productPk = $("#product-pk").val()
    $.ajax
      url: "/product/buy"
      type: "POST"
      dataType: "json"
      data:
        name: customerName
        phone: phoneLine2
        mail: customerMail
        text: customerText
        productId: productPk
      success: (resp) ->
        if resp.type is 'success'
          formCustomer.get(0).reset()
          btn.hide(200)
          $('.customer-message').show(200)
          setTimeout(
            ->
              $(".buy-product-wrapper").hide(200)
              $(".customer-message").hide(200)
              btn.show()
            4000
          )
        else
          $.each resp.errors, (key, value) ->
            $.each value, (key2) ->
              $("#customer-#{key2}").addClass 'error'

  formCustomer.on 'focus', '.error', ->
    $(@).removeClass 'error'


  formCallback = $ "#callback-form"
  formCallback.submit (e) ->
    e.preventDefault()
    innerForm = $ @
    btn = innerForm.find('button')
    phoneUnmask = innerForm.find("#callback-phone").val()
    phoneSpaces = phoneUnmask.replace ' ', ''
    phoneScope = phoneSpaces.replace '(', ''
    phoneScope2 = phoneScope.replace ')', ''
    phoneLine = phoneScope2.replace '-', ''
    phoneLine2 = phoneLine.replace '-', ''
    $.ajax
      url: "/callback/save"
      type: "POST"
      dataType: "json"
      data:
        phone: phoneLine2
      success: (resp) ->
        if resp.type is 'success'
          formCallback.get(0).reset()
          btn.hide(200)
          $('.callback-message').show(200)
          setTimeout(
            ->
              $(".callbackForm").hide(200)
              $(".callback-message").hide(200)
              btn.show()
            4000
          )
        else
          $.each resp.errors, (key, value) ->
            $.each value, (key2) ->
              $("#callback-#{key2}").addClass 'error'

  formCallback.on 'focus', '.error', ->
    $(@).removeClass 'error'


  formCallbackProduct = $ "#callback-form-product-one"
  formCallbackProduct.submit (e) ->
    e.preventDefault()
    innerForm = $ @
    phoneUnmask = innerForm.find("#callback-phone-product").val()
    phoneSpaces = phoneUnmask.replace ' ', ''
    phoneScope = phoneSpaces.replace '(', ''
    phoneScope2 = phoneScope.replace ')', ''
    phoneLine = phoneScope2.replace '-', ''
    phoneLine2 = phoneLine.replace '-', ''
    $.ajax
      url: "/callback/save"
      type: "POST"
      dataType: "json"
      data:
        phone: phoneLine2
      success: (resp) ->
        if resp.type is 'success'
          formCallbackProduct.get(0).reset()
          $('.callback-message-product').show(200)
          setTimeout(
            ->
              $(".product-buy-click").hide(200)
              $(".callback-message-product").hide(200)
              btn.show()
            4000
          )
        else
          $("#callback-phone-product").addClass 'error'

  formCallbackProduct.on 'focus', '.error', ->
    $(@).removeClass 'error'