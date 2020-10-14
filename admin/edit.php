<?php
 include('header.php'); 
 include('sidebar.php'); 
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
  $error=array();
  $id = $_REQUEST["id"];
  echo $id;
  $sql = "SELECT * FROM addproduct WHERE id=$id";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
      $name = $row['name'];
      echo $name;
      $price = $row['price'];
      $image = $row['image'];
      $ldescript = $row['ldescript'];

  }
      if (isset($_POST['submit'])) {
        $name = isset($_POST['name'])?$_POST['name']:'';
        echo $name;
        $price = isset($_POST['price'])?$_POST['price']:'';
		$image = isset($_POST['image'])?$_POST['image']:'';
		
		

        if (sizeof($error)==0) {
            $sql="UPDATE addproduct SET `name`='$name', `price`='$price', `image`='$image' WHERE `id`=$id";
        if ($conn->query($sql) === true) {
            echo "Record Updated successfully";
            
        } else {
        echo "Error deleting record: " . $conn->error;
    }


        }
    }
	$conn->close();
?>


<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						
						<li><a href="#tab2" class="default-tab">Edit</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				
					
					<div class="tab-content default-tab" id="tab2">
					
					<form  method = "POST">
					
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							<p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="name" value="<?php echo $name?>" /> 
										<br /><small>Please Product Name</small>
								</p>
								
								<p>
									<label>Price</label>
                                    <input class="text-input small-input datepicker" type="text" id="small-input" name="price" value="<?php echo $price?>"/>
                                    <br /><small>Please Product Price</small>
								</p>

								<p>
								<label>Image File: </label><br>
									<input class="text-input medium-input" type="file" name="image" id="medium-input" value="<?php echo $image?>" />
								</p>
								
								<p>
									<label>Category</label>
									<select name="category" class="small-input">
										<option value="Men">Men</option>
										<option value="Women">Women</option>
										<option value="Kids">Kids</option>
										<option value="Electronics">Electronics</option>
										<option value="Sports">Sports</option>
									</select> 
								</p>
								
								<p>
									<label>Tags</label>
									<input type="checkbox" name="techno[]" value="Fashion"/>Fashion
									<input type="checkbox" name="techno[]" value="Ecommerce"/> Ecommerce
									<input type="checkbox" name="techno[]" value="Shop"/>Shop
									<input type="checkbox" name="techno[]" value="Hand Bags"/>Hand Bags 
									<input type="checkbox" name="techno[]" value="Laptop"/> Laptop 
									<input type="checkbox" name="techno[]" value="Headphone"/> Headphone
								</p>
								
								<p>
									<label>Detail Description</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="ldescript" cols="79" rows="15" avlue="<?php echo $ldescript ?>"></textarea>
								</p>
									<input class="button" type="submit" name="submit" value="Update" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>-->
			
			<!-- End Notifications -->
<?php include('footer.php') ?>
