<div class="container">
	<div class="check">	 
		<div class="col-md-6 col-md-offset-3 cart-total">
			<p class="text-success">
			<?php 
				if($this->session->flashdata('successful'))
				{
					echo $this->session->flashdata('successful');
				}
			?>
			</p>
			<?php 
				if($order == null)
				{
					echo "Currently not any order placed in your account.";
				}
				else
				{
			?>
					<div class="price-details">
						<h3>Order Details</h3>
						<span>Order no</span>
						<span class="total1"><?php echo $order['order_no'] ?></span>
						<span>Order Date</span>
						<span class="total1"><?php echo $order['order_date'] ?></span>
						<span>Total Price</span>
						<span class="total1"><?php echo 'total' ?></span>
						<span>Delivery Charges</span>
						<span class="total1"><?php echo $order['shipping_cost'] ?></span>
						<div class="clearfix"></div>				 
					</div>	
					<ul class="total_price">
					   <li class="last_price"> <h4>TOTAL</h4></li>	
					   <li class="last_price"><span><?php echo 'ltotal= $total + 150.00' ?></span></li>
					   <div class="clearfix"> </div>
					</ul>
					<br/><br/>
					<span>Delivery status:</span>
					<span class="total1">  <?php echo $order['status'] ?></span>
					<div class="clearfix"></div>
			<?php 
				}
			?>
			<!-- <a class="order" href="cart/place_order">Place Order</a> -->
		</div>
	</div>
</div>