<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

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
include('config.php');
    $error  = array();
    $message = '';

if (isset($_POST['submit'])) {
        $name = isset($_POST['name'])?$_POST['name']:'';
        $price = isset($_POST['price'])?$_POST['price']:'';
		$image = isset($_POST['image'])?$_POST['image']:'';
		$sdescript = isset($_POST['sdescript'])?$_POST['sdescript']:'';
        $ldescript = isset($_POST['ldescript'])?$_POST['ldescript']:'';


    if (empty($_POST['name']) || empty($_POST['image']) || empty($_POST['price'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
	}
	
	if (sizeof($error)==0) {
        $sql = 'INSERT INTO addproduct (`name`, `price`,`image`,`sdescript`,`ldescript`) 
        VALUES("'.$name.'" , "'.$price.'" , "'.$image.'", "'.$sdescript.'","'.$ldescript.'")';
   
        if ($conn->query($sql) === true) {
             echo "New record created successfully";
        } else {
            $error[] = array('input'=>'form','msg'=>$conn->error);
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
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
						<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
					<?php  
                        $sql = 'SELECT * FROM addproduct';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                    ?>	
						
						<table>
							
							<thead>
								<tr>
								   
								   <th>Product Id</th>
								   <th>Product Name</th>
								   <th>Product Price</th>
								   <th>Product Image</th>
								   <th>Product Short Description</th>
								   <th>Product Detail Description</th>
								   <th>Action</th>
								</tr>
								
							</thead>
							<?php
				while ($row = $result->fetch_assoc()) {
                    
        ?>  
							
						 
							<tbody>
								<tr>
									
									<td><?php echo $row["id"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["price"]; ?></td>
									<td><img src="images/<?php echo $row["image"]; ?>" /></td>
									<td><?php echo $row["sdescript"]; ?></td>
									<td><?php echo $row["ldescript"]; ?></td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
							</tbody>
							<?php  
                }    
        }?> 
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
					<form id="Products Form" action = "products.php" method = "POST">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							<p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="name" /> 
										<br /><small>Please Product Name</small>
								</p>
								
								<p>
									<label>Price</label>
                                    <input class="text-input small-input datepicker" type="text" id="small-input" name="price" />
                                    <br /><small>Please Product Price</small>
								</p>

								<p>
								<label>File: </label><br>
									<input class="text-input medium-input" type="file" name="image" id="medium-input" />
								</p>
								
								<p>
									<label>Short Description</label>
									<input class="text-input medium-input" type="text" id="medium-input" name="sdescript" />
								</p>
								
								<p>
									<label>Long Description</label>
									<input class="text-input large-input" type="text" id="large-input" name="ldescript" />
                                </p>
									<input class="button" type="submit" name="submit" value="Submit" />
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