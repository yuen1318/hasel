<div class="navbar-fixed">
    <nav class="navbar-wrapper indigo lighten-1">
      <a href="#" data-activates="show-sidenav" class="button-collapse waves-effect">
        <i class="fa fa-bars" style="margin-left:10px;"></i>
      </a>


      <ul class="right">
        <?php
          if(isset($_SESSION["user_id"])){
            echo "<li>
                    <a href='order.php'>Hi $_SESSION[user_fn]</a>
                  </li>";
          }
          else{
            echo "<li>
                    <a href='login.php'>Login</a>
                  </li>";
          }
        ?>
        <li>
          <a href="signup.php">Sign Up</a>
        </li>
        
        <li>
          <a href="cart.php">
            <span class="fa fa-lg fa-shopping-cart " id="count-cart"></span>
          </a>
        </li>
 
      </ul>
    </nav>
    <!-- end of navbar-wrapper -->
  </div>
  <!-- end of navbar-fixed-->

