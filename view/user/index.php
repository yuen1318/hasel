<?php 
 session_start();
 require "../../model/class/QueryBuilder.php";
 if(isset($_GET["tag"])){
  $query = new QueryBuilder();
  $sql = "SELECT * FROM tbl_product WHERE tag=?";
  $input = [$_GET["tag"]];
  $table = $query->get_data($sql,$input);
 }
 else{
  $query = new QueryBuilder();
  $sql = "SELECT * FROM tbl_product";
  $table = $query->get_data($sql,null);
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../assets/qs/font.css">
  <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
  <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">

  <title>Document</title>
  <style>
   
  </style>
</head>

<body class="grey lighten-4">

<?php require "partials/nav.php";?>
<?php require "partials/side_nav.php";?>

  <main>
    <?php require "partials/carousel.php";?>


    <div class="row " id="list_product"><br><br>

 
    <div class="col s12 m12 l12">
      <input type="text" class=" sb search" placeholder="Search">
    </div>

    <div class="not-found" style="display:none"><br><br>
      <h1 class="center" >Sorry no results found</h1><br>
    </div>

    <div class="list">

    <?php 
      if(empty($table)){
        echo "<div class col='s12 m12 l12'>
                <br><br><br>
                <h1 class='center'>Sorry no results found</h1>
                <br><br><br><br><br>
              </div>";}?>
    <?php foreach ($table as $row) {?>
       
      <div class='col s12 m3 l3'>
           <div class='card'>
     
             <div class='card-image waves-effect waves-block waves-light'>
               <img class='activator' src='<?php echo "../../DB/img/$row[image]" ?>' style='height:210px !important;'>
             </div>
     
             <div class='card-content'>
               <b class='name'><?php echo $row["name"] ?></b>
               <p class='right'>&#8369; <?php echo $row["price"];?></p>
             </div>
     
             <div class='card-reveal'>
               <span class='card-title grey-text text-darken-4'><i class='right fa fa-times'></i></span><br>
               <p><?php echo $row["description"];?></p>
             </div>
     
             <div class='card-action'>
               <button 
               data-name='<?php echo $row["name"];?>' 
               data-price='<?php echo $row["price"];?>' 
               data-img='<?php echo $row["image"];?>' 
               class='add-to-cart btn waves-effect indigo' 
               style='width:100% !important'>Add to cart</button><br>
             </div>

           </div><!--end of card-->
      </div><!--end of col-->
 
    <?php } //end of foreach?>
    
    </div><!--end of list-->
     
 
    <div class="row">
      <ul class="col s12 m12 l12 center pagination"></ul>
    </div>
     
  
    </div><!--end of row-->
   



  </main>

  <?php require "partials/footer.php";?>

</body>

<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/materialize/js/materialize.min.js"></script>
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<script src="../../assets/listjs/list.min.js"></script>
<script src="../../assets/listjs/list.pagination.min.js"></script>
<script src="../../assets/shoppingcart/shoppingCart.js"></script>
<script src="../../controller/init.js"></script>
 
<script>
  $(document).ready(function () {

      //listjs
      var monkeyList = new List('list_product', {
          valueNames: ['name'],
          page: 4,
          plugins: [ListPagination({})]
        });
 
        $('.search').on('keyup', function(event) { // Fired on 'keyup' event
          if($('.list').children().length === 0) { // Checking if list is empty
            $('.not-found').css('display', 'block'); // Display the Not Found message
          } else {
            $('.not-found').css('display', 'none'); // Hide the Not Found message
          }
        });

    //shopping cart
    displayCart();
    $(document).on('click', '.add-to-cart', function () {
            var img = $(this).attr("data-img");
            var name = $(this).attr("data-name");
            var price = Number($(this).attr("data-price"));

            shoppingCart.addItemToCart(img,name, price, 1);
            displayCart();
    }); //end of onclick

  }); //end of document.ready

  function displayCart() {
        if(shoppingCart.countCart() == 0){
            $("#count-cart").html( "" );
          }
          else{
            $("#count-cart").html( "&nbsp;<span class='cart_icon'>&nbsp;" + shoppingCart.countCart() +"&nbsp;</span>" );
          }
    }
</script>

</html>