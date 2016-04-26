<!-- check-out -->
<div class="container">
	<div class="check">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?php echo site_url('user_products/index').'/0'?>">Continue to basket</a>
		<?php 
			if($cart == null)
			{
		?>
			</div>
			<div class="col-md-6">
				<span> Currently you don't have any item in your cart. </span>
				<br/>
				<span> First add some items in your cart. </span>
			</div>
		<?php
			}
			else
			{
		?>
			<?php echo form_open('order/checkout');?>
			<div class="price-details">
				<h3>Price Details</h3>
				<span>Total</span>
				<span class="total1"><?php echo $total ?></span>
				<span>Delivery Charges</span>
				<span class="total1">00.00</span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php echo $ltotal= $total + 00.00 ?></span></li>
			   <div class="clearfix"> </div>
			</ul> 
			<div class="clearfix"></div>
			<div class="fgh">
			<input type="submit" class="btn-block" value="Place Order">
			</div>
		</div>
		<?php echo form_close();?>
		<div class="col-md-9 cart-items">
			<h1>My Shopping Bag (<?php echo sizeof($cart) ?>)</h1>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<p class="text-success">
			<?php 
				if($this->session->flashdata('successful'))
				{
					echo $this->session->flashdata('successful');
				}
			?></p>
			<label class="text-danger" style="font-size: 13px;">
			   	<?php echo form_error('quantity'); ?>
			</label>
			
			<?php foreach($cart as $row):?>
			<?php
	            $data = array(
	                  'name'  => 'update_cart',
	                  'id' => 'update_cart'
	                );
	        ?> 
	        <?php echo form_open('cart/update_cart', $data);?>
			<div class="cart-header">
				<div class="cart-sec simpleCart_shelfItem">
					<div class="col-md-4 col-sm-4 col-xs-12 cart_img">
						<img src="<?php echo base_url('assets/images/products') .'/'. $row->product_img ?>" class="img-responsive" alt="" style=" height: 100%; width:90%"/>
					</div>
					<div class="col-md-8 col-sm-8 col-md-8 col-xs-12">
					   <div class="cart-item-info">
					   		<w class="details-left-info">
					   			<h3><?php echo $row->product_name ?></h3>
					   		</w>
					   		<br/><br/><br/>
					   		<p>Price : <?php echo $row->product_price ?></p>
					   		
							<ul class="qty">
								<li><p>Qty :<input max="10" min="1" type="number" id="quantity" name="quantity" class="form-control input-small" value="<?php echo $row->quantity?>"></p></li>
								<input type="hidden" name="cart_id" id="cart_id" value="<?php echo $row->cart_id ?>">
							</ul>
							<div class="delivery">
								<span>Delivered in 2-3 bussiness days</span>
							</div>	
							<div class="fgh">
								<a onclick="return confirm('Are you sure you want to delete \'<?php echo $row->product_name ?> \' from your cart?');" href="<?php echo site_url('cart/remove').'/'.$row->cart_id?>">Remove</a>
								<input type="submit" value="Update">
							</div>
							<?php echo form_close();?>
					   </div>
					</div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			<?php endforeach ?>
			 <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>	
		</div>
		<?php
			} 
		?>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check-out -->