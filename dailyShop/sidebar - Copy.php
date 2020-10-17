
<?php
$minimum_range = 100;
$maximum_range = 500;
?>

<script> 
$(document).ready(function(){  
    
    $( "#skipstep" ).slider({
      range: true,
      min: 100,
      max: 50000,
      values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
      slide:function(event, ui){
        $("#minimum_range").val(ui.values[0]);
        $("#maximum_range").val(ui.values[1]);
        load_product(ui.values[0], ui.values[1]);
      }
    });
    
    load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>);
    
    function load_product(minimum_range, maximum_range)
    {
      $.ajax({
        url:"product.php",
        method:"POST",
        data:{minimum_range:minimum_range, maximum_range:maximum_range},
        success:function(data)
        {
          $('#load_product').fadeIn('slow').html(data);
        }
      });
    }
    
  });  
  </script>
  

<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <li><a href="men.php">Men</a></li>
                <li><a href="Women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
                <li><a href="electronics.php">Electornics</a></li>
                <li><a href="sports.php">Sports</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="fashion.php">Fashion</a>
                <a href="ecommerce.php">Ecommerce</a>
                <a href="shop.php">Shop</a>
                <a href="handbag.php">Hand Bag</a>
                <a href="laptop.php">Laptop</a>
                <a href="headphone.php">Head Phone</a>
               
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>             

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="green.php"></a>
                <a class="aa-color-yellow" href="yellow.php"></a>
                <a class="aa-color-pink" href="pink.php"></a>
                <a class="aa-color-purple" href="purple.php"></a>
                <a class="aa-color-blue" href="navyblue.php"></a>
                <a class="aa-color-orange" href="mustard.php"></a>
                <a class="aa-color-gray" href="gray.php"></a>
                <a class="aa-color-black" href="black.php"></a>
                <a class="aa-color-white" href="white.php"></a>
                <a class="aa-color-cyan" href="blue.php"></a>
                <a class="aa-color-olive" href="blue.php"></a>
                <a class="aa-color-orchid" href="NoProduct.php"></a>
              </div>                            
            </div>
           
         
          </aside>
        </div>
       
      </div>
    </div>
  </section>