<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../assets/qs/font.css">
  <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
  <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
  <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">

  <title>Document</title>
</head>

<body class=" blue-grey lighten-5">
  <?php require "partials/nav.php"; ?>
  <?php require "partials/side_nav2.php";?>
  <main>
    <div class="row">

      <div class="col s12 m12 l12" id="list_order">
        <!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>My Orders</h5>
          </div>
          <div class="col s12 m6 l6">
            <label>Search</label>
            <input type="text" class="search">
          </div>
        </div>



        <table class="bordered centered striped responsive-table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Cart List</th>
              <th>Address</th>
              <th>Total</th>
              <th>Date Ordered</th>
            </tr>
          </thead>
          <!--end of thead-->

          <tbody class="list" id="tbl_order"></tbody>
          <!--end of tbody-->
        </table>
        <!--end of table-->

        <tfoot>
          <tr>
            <td>
              <ul class="pagination center"></ul>
            </td>
          </tr>
        </tfoot>
        <!--end of tfoot-->
      </div>
      <!--end of col s12-->

      <div class="not-found" style="display:none">
          <br>
          <br>
          <h1 class="center">Sorry no results found</h1>
          <br>
      </div>
      
    </div>


  </main>
</body>

<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/jquery/jquery.validate.min.js"></script>
<script src="../../assets/jquery/jquery.additionalMethod.min.js"></script>
<script src="../../assets/materialize/js/materialize.min.js"></script>
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<script src="../../assets/listjs/list.min.js"></script>
<script src="../../assets/listjs/list.pagination.min.js"></script>
<script src="../../assets/shoppingcart/shoppingCart.js"></script>
<script src="../../controller/init.js"></script>

<script>
  $(function () {
  
    $('.search').on('keyup', function (event) { // Fired on 'keyup' event
      if ($('.list').children().length === 0) { // Checking if list is empty
        $('.not-found').css('display', 'block'); // Display the Not Found message
      } else {
        $('.not-found').css('display', 'none'); // Hide the Not Found message
      }
    });

    select_order("../../model/tbl_order/select/select_order.php", "#tbl_order");
  }); //end of doc.ready

  //Functions
  function select_order(model_url, html_class_OR_id) {
    $.ajax({
      url: model_url,
      method: "GET",
      success: function (Result) {
        //push the result on id or class
        $(html_class_OR_id).html(Result);
      }, //end of success function
      complete: function () {
        //initialize pagination after data loaded
        var monkeyList = new List('list_order', {
          valueNames: ['name', 'date'],
          page: 7,
          plugins: [ListPagination({})]
        });
      } //end of complete function
    }) //end of ajax
  } //end of function
</script>

</html>