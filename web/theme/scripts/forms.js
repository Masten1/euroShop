// Generated by CoffeeScript 1.11.1
(function() {
  jQuery(function($) {
    var form, formCallback, formCallbackProduct, formCustomer;
    form = $("#feedback-form");
    form.submit(function(e) {
      e.preventDefault();
      return $.post(form.attr('action'), form.serialize(), function(resp) {
        if (resp.type === 'success') {
          form.get(0).reset();
          $('.feedback-form-submit').hide(200);
          return $('.feedback-message').addClass('active');
        } else {
          return $.each(resp.errors, function(key, value) {
            return $.each(value, function(key2) {
              return $(".feedback-form-" + key2).addClass('error');
            });
          });
        }
      }, 'json');
    });
    form.on('focus', '.error', function() {
      return $(this).removeClass('error');
    });
    formCustomer = $("#form-product-buy");
    formCustomer.submit(function(e) {
      var btn, customerMail, customerName, customerText, innerForm, phoneLine, phoneLine2, phoneScope, phoneScope2, phoneSpaces, phoneUnmask, productPk;
      e.preventDefault();
      innerForm = $(this);
      btn = innerForm.find('button');
      phoneUnmask = innerForm.find("#customer-phone").val();
      phoneSpaces = phoneUnmask.replace(' ', '');
      phoneScope = phoneSpaces.replace('(', '');
      phoneScope2 = phoneScope.replace(')', '');
      phoneLine = phoneScope2.replace('-', '');
      phoneLine2 = phoneLine.replace('-', '');
      customerName = $("#customer-name").val();
      customerMail = $("#customer-mail").val();
      customerText = $("#customer-text").val();
      productPk = $("#product-pk").val();
      return $.ajax({
        url: "/product/buy",
        type: "POST",
        dataType: "json",
        data: {
          name: customerName,
          phone: phoneLine2,
          mail: customerMail,
          text: customerText,
          productId: productPk
        },
        success: function(resp) {
          if (resp.type === 'success') {
            formCustomer.get(0).reset();
            btn.hide(200);
            $('.customer-message').show(200);
            return setTimeout(function() {
              $(".buy-product-wrapper").hide(200);
              $(".customer-message").hide(200);
              return btn.show();
            }, 4000);
          } else {
            return $.each(resp.errors, function(key, value) {
              return $.each(value, function(key2) {
                return $("#customer-" + key2).addClass('error');
              });
            });
          }
        }
      });
    });
    formCustomer.on('focus', '.error', function() {
      return $(this).removeClass('error');
    });
    formCallback = $("#callback-form");
    formCallback.submit(function(e) {
      var btn, innerForm, phoneLine, phoneLine2, phoneScope, phoneScope2, phoneSpaces, phoneUnmask;
      e.preventDefault();
      innerForm = $(this);
      btn = innerForm.find('button');
      phoneUnmask = innerForm.find("#callback-phone").val();
      phoneSpaces = phoneUnmask.replace(' ', '');
      phoneScope = phoneSpaces.replace('(', '');
      phoneScope2 = phoneScope.replace(')', '');
      phoneLine = phoneScope2.replace('-', '');
      phoneLine2 = phoneLine.replace('-', '');
      return $.ajax({
        url: "/callback/save",
        type: "POST",
        dataType: "json",
        data: {
          phone: phoneLine2
        },
        success: function(resp) {
          if (resp.type === 'success') {
            formCallback.get(0).reset();
            btn.hide(200);
            $('.callback-message').show(200);
            return setTimeout(function() {
              $(".callbackForm").hide(200);
              $(".callback-message").hide(200);
              return btn.show();
            }, 4000);
          } else {
            return $.each(resp.errors, function(key, value) {
              return $.each(value, function(key2) {
                return $("#callback-" + key2).addClass('error');
              });
            });
          }
        }
      });
    });
    formCallback.on('focus', '.error', function() {
      return $(this).removeClass('error');
    });
    formCallbackProduct = $("#callback-form-product-one");
    formCallbackProduct.submit(function(e) {
      var innerForm, phoneLine, phoneLine2, phoneScope, phoneScope2, phoneSpaces, phoneUnmask;
      e.preventDefault();
      innerForm = $(this);
      phoneUnmask = innerForm.find("#callback-phone-product").val();
      phoneSpaces = phoneUnmask.replace(' ', '');
      phoneScope = phoneSpaces.replace('(', '');
      phoneScope2 = phoneScope.replace(')', '');
      phoneLine = phoneScope2.replace('-', '');
      phoneLine2 = phoneLine.replace('-', '');
      return $.ajax({
        url: "/callback/save",
        type: "POST",
        dataType: "json",
        data: {
          phone: phoneLine2
        },
        success: function(resp) {
          if (resp.type === 'success') {
            formCallbackProduct.get(0).reset();
            $('.callback-message-product').show(200);
            return setTimeout(function() {
              $(".product-buy-click").hide(200);
              $(".callback-message-product").hide(200);
              return btn.show();
            }, 4000);
          } else {
            return $("#callback-phone-product").addClass('error');
          }
        }
      });
    });
    return formCallbackProduct.on('focus', '.error', function() {
      return $(this).removeClass('error');
    });
  });

}).call(this);

//# sourceMappingURL=forms.js.map
