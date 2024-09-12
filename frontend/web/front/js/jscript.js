jQuery(document).ready(function ($) {

    const $body = $('body');

    /**
     * Кол-во товара
     */
    $('.add').on('click', function () {
        let q = toInt($(this).prev().val());

        if (q) {
            $(this).prev().val(+q + 1);
        }

        if ($('.product-quantity-cart-js').length > 0) {
            updateCountCart('/cart/add', $(this).data('product-id'), $(this));
        }
    });

    $('.sub').on('click', function () {
        let q = toInt($(this).next().val());

        if (q > 1) {
            $(this).next().val(+q - 1);

            if ($('.product-quantity-cart-js').length > 0) {
                updateCountCart('/cart/reduce', $(this).data('product-id'), $(this));
            }
        }
    });

    /**
     * Удалить товар
     */
    $('.remove').on('click', function (e) {
        e.preventDefault();

        $(this).parents('tr').remove();

        $.ajax({
            url: '/cart/delete',
            type: 'GET',
            data: {
                product_id: $(this).data('product-id'),
            },
            success: function (res) {
                $('.cart-modal-btn-wrap').html(res.cartModal);

                if (res.cartCount < 1) {
                    location.href = '/';
                }
            },
            error: function () {

            },
        })
    });

    /**
     * Добавить в корзину
     */
    $body.on('click', '.add-to-cart-js', function (e) {
        e.preventDefault();

        let quantity = toInt($('.quantity-product-js').val().trim());

        $.ajax({
            url: '/cart/add',
            type: 'GET',
            data: {
                product_id: $(this).data('product-id'),
                quantity: quantity,
            },
            success: function (res) {
                $('.cart-modal-btn-wrap').html(res.cartModal);
            },
            error: function () {

            },
        });
    });

    /**
     * Работа с кол-вом в корзине
     * @param url
     * @param product_id
     */
    function updateCountCart(url, product_id, $context) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                product_id: product_id,
            },
            success: function (res) {
                $('.cart-modal-btn-wrap').html(res.cartModal);
                $context.parents('tr').find('.price').html(`${res.itemSum} &#8381;`);
            },
            error: function () {
            }
        });
    }

});

/**
 * Оставить только цифры
 *
 * @param text
 * @returns {*}
 */
function toInt(text) {
    return text.replace(/[^0-9]/gim, '');
}

/**
 * Форматировать сумму
 *
 * @param text
 * @returns {*}
 */
function numberFormat(text) {
    return text.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
}
