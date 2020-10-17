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
require 'header.php';
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
                      
                );  
                $_SESSION["shopping_cart"][$count] = $item_array; 
                echo '<script>alert("Product Added")</script>';  
        } else { 
               echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="blue.php"</script>';  
        }  
    } else {  
           $item_array = array(  
                
                'item_name'   =>  $_POST["hidden_name"],
                'item_image'  =>  $_POST["hidden_image"],  
                'item_price'  =>  $_POST["hidden_price"],  
                
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
<style> 
        
        /* Styling the button */ 
        .btn { 
            cursor: pointer; 
            
            background-color: transparent; 
            height: 50px; 
            width: 200px; 
            color: #F08080 ; 
            font-size: 1.5em; 
           
        } 
    </style> 


  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div><div class="aa-product-catg-body">
              <ul class="aa-product-catg">
              <?php  
     $sql = "SELECT * FROM addproduct LIMIT 10";
     $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if($row["color"] == "Blue") {
        ?>  
       
                <!-- start single product item -->
                <li>
                
                  <figure>
               
                  <form method="post" action="blue.php?action=<?php echo $row["id"]; ?>" >
                    <a class="aa-product-img" href="product-detail.php?action=delete&id=<?php echo $row["id"];?>"><img src="images/<?php echo $row["image"]; ?>" style="width:400px;height:300px;"></a>
                    <a class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span><input type="submit"  name='add_to_cart' class="btn" value="Add To Cart"/></a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row["name"]; ?></a></h4>
                      <span class="aa-product-price"><a href="#"><?php echo $row["price"]; ?></span><span class="aa-product-price"></span>
                      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                      <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />    
                      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                      <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div> 
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                    </form>
                  </figure>                         
                 
                  <!-- product badge -->
                 
                </li>
        <?php  }
        
}?> <br/>  
                 
                
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
 
  <!-- / product category -->
  <?php include('sidebar.php'); ?>

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <?php include('footer.php'); ?>