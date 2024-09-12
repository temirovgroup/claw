jQuery(document).ready(function ($) {

    /*MENU
    ------------------------------------*/
    $('#main-menu').metisMenu();

    $(window).bind("load resize", function () {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    });

    /**
     * Удалить изображение товара
     */
    $('.product-images-js').on('click', 'img', function (e) {
        e.preventDefault();

        if (confirm('Вы уверены?')) {
            $(this).remove();

            $.ajax({
                url: '/admin/product/delete-image',
                data: {
                    product_id: $(this).data('product-id'),
                    image_id: $(this).data('image-id'),
                },
                type: 'POST',
                success: function (res) {
                },
                error: function () {

                },
            });
        }
    });

    /**
     * Dynamic table
     * @param destroy
     */
    function dataTables(destroy) {
        let dataTables = $('.dynamic-table');

        if (dataTables.length > 0) {
            /**
             * DataTable - русификатор
             */
            _anyNumberSort = function(a, b, high) {
                var reg = /[+-]?((\d+(\.\d*)?)|\.\d+)([eE][+-]?[0-9]+)?/;
                a = a.replace(',','.').match(reg);
                a = a !== null ? parseFloat(a[0]) : high;
                b = b.replace(',','.').match(reg);
                b = b !== null ? parseFloat(b[0]) : high;
                return ((a < b) ? -1 : ((a > b) ? 1 : 0));
            };

            jQuery.extend( jQuery.fn.dataTableExt.oSort, {
                "any-number-asc": function (a, b) {
                    return _anyNumberSort(a, b, Number.POSITIVE_INFINITY);
                },
                "any-number-desc": function (a, b) {
                    return _anyNumberSort(a, b, Number.NEGATIVE_INFINITY) * -1;
                }
            });

            if (destroy) {
                dataTables.destroy();
            }

            dataTables.DataTable({
                "oLanguage": {
                    "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                },
                "ordering": true,
                "bRetrieve" : false, //могут ли опции быть изменены после инициализации. true - не могут, false - могут
                "bInfo": false,
                "bAutoWidth": true,
                "sDom": '<fi><"#clear"><t><prl>',
                "columnDefs": [{
                    "type": 'any-number',
                    "targets": 0
                }],
                stateSave: true,
                "order": [],
            });
        }
    } dataTables();

});
