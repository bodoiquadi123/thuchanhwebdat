<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?> 	

<!-- <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?> -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Details Ordered</h2>
				
						<table class="tblone">
							<tr>
							  	<th width="20%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								
								<th width="10%">Action</th>
							</tr>
							<?php
                            $customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>		
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' '.'VND' ?></td>
								<td>
															
									<?php echo $result['quantity'] ?>
												
								</td>
								<td></td>
								<td><a onclick="return confirm('Are you want to delete?');" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
						<?php 
							
							}
						}
						?>
						
						</table>
					
						
					  
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php
	include 'inc/footer.php';

?>