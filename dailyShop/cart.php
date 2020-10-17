<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'config.php';
session_start();
require 'header1.php';
?> 

<?php


if (isset($_POST["add_to_cart"])) { 
     
    if (isset($_SESSION["shopping_cart"])) {  
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_name");
        
       
        if (!in_array($_POST["hidden_name"], $item_array_id)) {  
            $count = count($_SESSION["shopping_cart"]);  
            $item_array = array(  
                     
                     'item_name'  =>  $_POST["hidden_name"],  
                     'item_price'   =>  $_POST["hidden_price"],
                     'item_image'  =>  $_POST["hidden_image"],
                     'item_quantity' => $_POST["quantity"]    
                      
                );  
                $_SESSION["shopping_cart"][$count] = $item_array; 
                echo '<script>alert("Product Added")</script>';  
        } else { 
               echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="product.php"</script>';  
        }  
    } else {  
           $item_array = array(  
                
                'item_name'   =>  $_POST["hidden_name"],
                'item_image'  =>  $_POST["hidden_image"],  
                'item_price'  =>  $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]    
                
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
    }  
      
}  
if (isset($_GET["action"])) {  
    if ($_GET["action"] == "delete") {  
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {  
            if ($values["item_name"] == $_GET["id"]) {  
                unset($_SESSION["shopping_cart"][$keys]);  
                echo '<script>alert("Item Removed")</script>';  
                echo '<script>window.location="cart.php"</script>';  
            }  
        }  
    }  
}
 //session_destroy();
?>  


  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
           
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php  
                    $sql = 'SELECT * FROM addproduct ' ; 
                if (!empty($_SESSION["shopping_cart"])) {  
                    $total = 0;  
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {  
                        ?> 
                      <form method="post" action="product.php?action=<?php echo $row["id"]; ?>" >
                      <tr>
                      
                        <td><a class="remove" href="product.php?action=delete&id=<?php echo $values["item_name"];?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="images/<?php echo $values["item_image"];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?php echo $values["item_name"]; ?></a></td>
                        <td><?php echo $values["item_price"]; ?></td>
                        <td><input class="aa-cart-quantity" type="number" name="quantity" value="1"></td>
                        
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />    
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                        <td><?php echo number_format( 1 * $values["item_price"], 2);?></td>
                      </tr>
                    <?php $total = $total + (  1* $values["item_price"]); }
                } ?>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          
                          <input type="submit" name='add_to_cart' class="aa-cart-view-btn" value="Update Cart"/>
                        </td>
                      </tr></form>
                      </tbody>
                  </table>
                </div>
             
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td><?php echo number_format($total, 2); ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo number_format($total, 2); ?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


 <?php include('footer.php'); ?>

    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>  
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>  
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script> 

  </body>
</html>