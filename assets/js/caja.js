$(document).ready(function () {
  // AJAX Method for search Products 
  $("#inputBuscarProducto").keyup(function () {
    var query = $(this).val();

    if (query != "") {
      $.ajax({
        url: "./searchProductToSell.php",
        method: "POST",
        data: {
          query: query,
        },
        success: function (data) {
          $("#search_result").fadeIn();
          $("#search_result").html(data);
        },
      });
    } else {
      $("#search_result").css("display", "none");
    }
  });

  $(document).on("click", "li", function () {
    $("#inputBuscarProducto").val($(this).text());
    $("#search_result").fadeOut();

    console.log($(this).attr("id"));
    $("#precio").val($(this).attr("id"));
  });
});

// Calculate total amount by quantity of product
function totalByQuantity(price, quantity) {
  var result = price * quantity;
  
  return result;
}

// Method for add shoping product list in localStorage
let productList = localStorage.getItem('productList') ? JSON.parse(localStorage.getItem('productList')) : [];
localStorage.setItem('productsList', JSON.stringify(productList));

const productData = JSON.parse(localStorage.getItem('productList'));

console.log(productData);

// 
document.getElementById('btnAgregar').addEventListener('click', function(){
  var precio = document.getElementById('precio').value;
  var cantidad = document.getElementById('cantidad').value;

  document.getElementById('vendedor').value = totalByQuantity(precio, cantidad);

  var productToBuy = {
    productName: document.getElementById('inputBuscarProducto').value,
    productPrice: document.getElementById('precio').value,
    quantity: document.getElementById('cantidad').value
  };

  productList.push(productToBuy);
  localStorage.setItem('productList', JSON.stringify(productList));

  document.getElementById('inputBuscarProducto').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('cantidad').value = '';

  console.log(localStorage.getItem('productList'));
});