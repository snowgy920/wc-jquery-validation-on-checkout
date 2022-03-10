(function($) {
  $(document).ready(function() {
    $("form.woocommerce-checkout").validate({
      rules: {
        billing_first_name: {
          required: true
        },
        billing_last_name: {
          required: true
        },
        billing_address_1: {
          required: true
        },
        billing_phone: {
          required: true,
          number: true,
          rangelength: [10, 10]
        },
        billing_email: {
          required: true,
          email: true
        }
      },
      messages: {
        billing_phone: {
          rangelength: "Should be 10 numbers"
        },
        billing_email: {
          email: "The email should be in the format: abc@domain.tld"
        }
      }
    });
    $.extend($.validator.messages, {
      required: "This field is required."
    });
    $('form.woocommerce-checkout').valid();
  });
  $('body').on('click', '#place_order', function(e){
    if ($("form.woocommerce-checkout label.error:visible").length > 0) {
      e.preventDefault();
      return false;
    }
  });
}).apply(this, [jQuery]);