

$(document).ready(function() {
    $('#inputBuscarProducto').keyup(function() {
        var query = $(this).val();

        if (query != '') {
            $.ajax({
                url: './searchProductToSell.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');
                    $('#inputBuscarProducto').focusout(function() {
                        $('#search_result').css('display', 'none');
                    });
                    $('#inputBuscarProducto').focusout(function() {
                        $('#search_result').css('display', 'block');
                    });
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });
});