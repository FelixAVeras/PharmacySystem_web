$(document).ready(function () {
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
6;
