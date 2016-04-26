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
					<ul class="total_price">
						<li class="last_price"><h2>Order Details</h2></li>
						<div class="clearfix"></div>
						<li class="last_price">Order no</li>
						<li class="last_price"><span><?php echo $order['order_no'] ?></span></li>
						<li class="last_price">Order Date</li>
						<li class="last_price"><span><?php echo $order['order_date'] ?></span></li>
						<li class="last_price">Total amount</li>
						<li class="last_price"><span><?php echo $order['amount'] ?></span></li>
						<li class="last_price">Shipping address:</li>
						<li class="last_price"><span><?php echo $order['shipping_address'] ?></span></li>
					</ul>
						<div class="clearfix"></div>			 
					</div>	
					<br/><br/>
					<span>Delivery status:</span>
					<span class="total1">  
					<?php 
						if($order['delivery_date']=='0000-00-00')
						{
							echo "  not delivered";
						}
						else
						{
							echo "  delivered on " . $order['delivery_date'];
						}
					?></span>
					<div class="clearfix"></div>
			<?php 
				}
			?>
			<!-- <a class="order" href="cart/place_order">Place Order</a> -->
		</div>
	</div>
</div>