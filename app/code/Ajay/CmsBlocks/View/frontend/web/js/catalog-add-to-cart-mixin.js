define([
    'jquery'
], function ($) {
    'use strict';

    return function (widget) {
        $.widget('mage.catalogAddToCart', widget, {

            submitForm: function (form) {
                this.ajaxSubmit(form);
                this.getTotal();
            },
            getTotal: function () {
                $(document).ajaxComplete(function (event, xhr, settings) {
                    if (settings.url.indexOf("customer/section/load/?sections=cart") > 0 && settings.type === "GET") {
                        let cartObj = xhr.responseJSON;
                    }
                });
            },

        });
        return $.mage.catalogAddToCart;
        console.log('cart total', cartObj);
    }
});
