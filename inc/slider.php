<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestBobui = $product->getLastestBobui();
				if($getLastestBobui){
					while($resultbobui = $getLastestBobui->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultbobui['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>BOBUI</h2>
						<p><?php echo $resultbobui['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultbobui['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php 
					}
				}
			   ?>		
			   <?php
				$getLastestDirtycoin = $product->getLastestDirtycoin();
				if($getLastestDirtycoin){
					while($resultdirtycoin = $getLastestDirtycoin->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultdirtycoin['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>DIRTYCOIN</h2>
						  <p><?php echo $resultdirtycoin['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultdirtycoin['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
					}
				}
			   ?>
			</div>
			<div class="section group">
			<?php
				$getLastestSwe = $product->getLastestSwe();
				if($getLastestSwe){
					while($resultswe = $getLastestSwe->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultswe['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>SWE</h2>
						<p><?php echo $resultswe['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultswe['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>			
			   <?php 
					}
				}
			   ?>
			   <?php
				$getLastestDegrey = $product->getLastestDegrey();
				if($getLastestDegrey){
					while($resultdegrey = $getLastestDegrey->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultdegrey['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>DEGREY</h2>
						  <p><?php echo $resultdegrey['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultdegrey['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
					}
				}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.png" alt=""/></li>
						<li><img src="images/2.png" alt=""/></li>
						<li><img src="images/3.png" alt=""/></li>
						<li><img src="images/4.png" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>