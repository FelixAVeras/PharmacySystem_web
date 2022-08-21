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


function editProduct() {
    $("#editProductModal").modal("show");
}

function detailProduct(id) {
    console.log('hice click');

    const request = new XMLHttpRequest();
    request.open('GET', `detalleproducto.php?=${id}`);
    request.responseType = 'json';
    request.onload = () => {
        const data = request.response 
        console.log(data);
    };
    
    request.send();
}

deleteProduct();

function deleteProduct() {
    $(document).delegate('#btnDelete', 'click', function() {
        //debugger;

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