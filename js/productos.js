function imagePreview(e) {
    const reader = new FileReader();

    reader.readAsDataURL(e.target.files[0]);
    reader.onload = () => {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
    }
}

document.getElementById('btnSubmit').addEventListener('click', function(e) {
    e.preventDefault();

    let productCode = document.getElementById('productCode').value;
    let productName = document.getElementById('productName').value;
    let productCategory = document.getElementById('productCategory');
    let productPrice = document.getElementById('productPrice').value;
    let productStock = document.getElementById('productStock').value;

    if (isNaN(productCode) || isNaN(productPrice) || isNaN(productStock)) {
        alert('Este campo solo admite valores numericos.');
        return false;
    }
    
    if (productCode == '' || productCode == null || productCode.length == 0) {
        alert('Debe asignar un codigo de producto.');
        return false;
    } 

    if (productName == '' || productName == null || productName.length == 0) {
        alert('El campo nombre de Producto esta vacio o es invalido.');
        return false;
    }
    
    if (productCategory.value == '' || productCategory.value == null) {
        alert('Debe elegir una categoria para este producto');
        return false;
    }

    if (productPrice == '' || productPrice == null || productPrice.length == 0) {
        alert('Debe asignar precio de venta a este producto.');
        return false;
    }

    if (productStock == '' || productStock == null || productStock.length == 0) {
        alert('Debe asignar una cantidad en almacen');
        return false;
    }

    var http = new XMLHttpRequest();
    var urlApi = 'productosController.php';

    let formData = new FormData(document.forms.formProductos);
    
    http.open('POST', urlApi);
    http.send(formData);
    
    window.location.reload();
});

detailProduct();

function detailProduct(id) {
    $(document).delegate('#btnDetail', 'click', function() {
		let productId = $(this).attr('data-id');
        
        $.ajax({
            type: "GET", //we are using GET method to get data from server side
            url: 'detalleproducto.php', // get the route value
            data: { idProducto: productId  }, //set data
            success: function (response) {//once the request successfully process to the server side it will return result here
                response = JSON.parse(response);
                // $("#edit-form [name=\"id\"]").val(response.id);
                // $("#edit-form [name=\"email\"]").val(response.email);
                // $("#edit-form [name=\"first_name\"]").val(response.first_name);
                // $("#edit-form [name=\"last_name\"]").val(response.last_name);
                // $("#edit-form [name=\"address\"]").val(response.address);

                $('#productCode').val(response.productCode);
                $('#productName').val(response.productName);
                $('#productCategory').val(response.productCategory);
                $('#productPrice').val(response.productPrice);
                $('#productStock').val(response.productStock);

            }
        });
    });
}

editProduct();

function editProduct() {
    $(document).delegate('#btnUpdate', 'click', function() {
        let productId = $(this).attr('data-id');

        $.ajax({
            type: "GET", //we are using GET method to get data from server side
            url: 'detalleproducto.php', // get the route value
            data: { idProducto: productId  }, //set data
            success: function (response) {//once the request successfully process to the server side it will return result here
                response = JSON.parse(response);
                // $("#edit-form [name=\"id\"]").val(response.id);
                // $("#edit-form [name=\"email\"]").val(response.email);
                // $("#edit-form [name=\"first_name\"]").val(response.first_name);
                // $("#edit-form [name=\"last_name\"]").val(response.last_name);
                // $("#edit-form [name=\"address\"]").val(response.address);

                $('#productCode').val(response.productCode);
                $('#productName').val(response.productName);
                $('#productCategory').val(response.productCategory);
                $('#productPrice').val(response.productPrice);
                $('#productStock').val(response.productStock);

            }
        });
        
        $("#editProductModal").modal("show");
    });
}

deleteProduct();

function deleteProduct() {
    $(document).delegate('#btnDelete', 'click', function() {
        if (confirm("Esta seguro que desea eliminar este producto?")) {
            let productId = $(this).attr('data-id');
            
            $.ajax({
                type: 'GET',
                url: 'deleteproducto.php',
                data: { idProducto: productId },
                success: function() {
                    window.location.reload();
                }
            });
        }
    });
}