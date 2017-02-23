// Generated by CoffeeScript 1.11.1
(function() {
  jQuery(function($) {
    var actionDate;
    $('.item-slider-product').magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: {
        enabled: true
      }
    });
    $('.wrap').on("click", ".product-btn", function() {
      $(".buy-product-wrapper").show(200);
      return $('.close-form').show(200);
    });
    $('.wrap').on("click", ".close-form", function() {
      $(this).slideToggle(200);
      return $(".buy-product-wrapper").hide(200);
    });
    $("#customer-phone").mask("380(99) 999-99-99");
    $("#callback-phone-product").mask("380(99) 999-99-99");
    actionDate = $('#getting-started').data("date");
    return $('#getting-started').countdown(actionDate, function(event) {
      $('.getting-day').html(event.strftime('%D'));
      $('.getting-hour').html(event.strftime('%H'));
      $('.getting-minute').html(event.strftime('%M'));
      return $('.getting-second').html(event.strftime('%S'));
    });
  });

}).call(this);

//# sourceMappingURL=products.js.map
